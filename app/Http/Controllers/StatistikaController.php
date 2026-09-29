<?php

namespace App\Http\Controllers;

use App\Models\HasilKuesionerStatistika;
use App\Models\Kuesioner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StatistikaController extends Controller
{
    public function index()
    {
        $statusLabels = [
            1 => 'Bekerja (full time/part time)',
            2 => 'Wiraswasta',
            3 => 'Melanjutkan Pendidikan',
            4 => 'Tidak kerja tetapi sedang mencari kerja',
            5 => 'Belum memungkinkan bekerja',
        ];

        $prodiLabels = [
            1 => 'Statistika',
            2 => 'Matematika',
        ];

        $totalAlumni = User::where('role', 'alumni')->count();
        $totalResponden = Kuesioner::count();

        $statusCounts = Kuesioner::query()
            ->select('p1', DB::raw('count(*) as total'))
            ->groupBy('p1')
            ->pluck('total', 'p1');

        $status = collect($statusLabels)->map(function ($label, $value) use ($statusCounts, $totalResponden) {
            $jumlah = (int) ($statusCounts[$value] ?? 0);

            return [
                'label' => $label,
                'jumlah' => $jumlah,
                'persen' => $totalResponden > 0 ? round($jumlah / $totalResponden * 100, 1) : 0,
            ];
        })->values();

        $prodiCounts = Kuesioner::query()
            ->select('kodeprodi', DB::raw('count(*) as total'))
            ->groupBy('kodeprodi')
            ->pluck('total', 'kodeprodi');

        $prodi = collect($prodiLabels)->map(function ($label, $value) use ($prodiCounts, $totalResponden) {
            $jumlah = (int) ($prodiCounts[$value] ?? 0);

            return [
                'label' => $label,
                'jumlah' => $jumlah,
                'persen' => $totalResponden > 0 ? round($jumlah / $totalResponden * 100, 1) : 0,
            ];
        })->values();

        $tahun = Kuesioner::query()
            ->select('tahunlulus', DB::raw('count(*) as total'))
            ->groupBy('tahunlulus')
            ->orderBy('tahunlulus')
            ->get()
            ->map(function ($row) use ($totalResponden) {
                return [
                    'tahun' => $row->tahunlulus,
                    'jumlah' => (int) $row->total,
                    'persen' => $totalResponden > 0 ? round($row->total / $totalResponden * 100, 1) : 0,
                ];
            });

        return view('dashboard.statistika.index', [
            'title' => 'Statistika',
            'totalAlumni' => $totalAlumni,
            'totalResponden' => $totalResponden,
            'tingkatPengisian' => $totalAlumni > 0 ? round($totalResponden / $totalAlumni * 100, 1) : 0,
            'status' => $status,
            'prodi' => $prodi,
            'tahun' => $tahun,
        ]);
    }

    public function store(Request $request)
    {
        if ($request->filled('pendapatan')) {
            $request->merge([
                'pendapatan' => preg_replace('/\D/', '', $request->pendapatan),
            ]);
        }

        $data = $request->validate([
            'namalengkap' => 'required|string|max:255',
            'status' => 'required|in:bekerja,belum,kuliah',
            'pekerjaan' => 'nullable|required_if:status,bekerja|string|max:255',
            'tempat_bekerja' => 'nullable|required_if:status,bekerja|string|max:255',
            'pendapatan' => 'nullable|required_if:status,bekerja|integer|min:0',
            'tempat_kuliah' => 'nullable|required_if:status,kuliah|string|max:255',
            'bukti' => 'nullable|required_if:status,bekerja,kuliah|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ], [
            'namalengkap.required' => 'Nama lengkap wajib diisi.',
            'status.required' => 'Pilih status alumni.',
            'pekerjaan.required_if' => 'Pekerjaan wajib diisi.',
            'tempat_bekerja.required_if' => 'Tempat bekerja wajib diisi.',
            'pendapatan.required_if' => 'Pendapatan / gaji wajib diisi.',
            'pendapatan.integer' => 'Pendapatan / gaji harus berupa angka.',
            'tempat_kuliah.required_if' => 'Tempat lanjut kuliah wajib diisi.',
            'bukti.required_if' => 'Bukti dokumen wajib diunggah.',
            'bukti.mimes' => 'Bukti dokumen harus berupa PDF, JPG, atau PNG.',
            'bukti.max' => 'Ukuran bukti dokumen maksimal 2 MB.',
        ]);

        if ($data['status'] !== 'bekerja') {
            $data['pekerjaan'] = null;
            $data['tempat_bekerja'] = null;
            $data['pendapatan'] = null;
        }

        if ($data['status'] !== 'kuliah') {
            $data['tempat_kuliah'] = null;
        }

        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $directory = public_path('bukti-statistika');

            if (! is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            $filename = Str::uuid().'.'.$file->getClientOriginalExtension();
            $file->move($directory, $filename);
            $data['bukti'] = $filename;
        } else {
            $data['bukti'] = null;
        }

        HasilKuesionerStatistika::create($data);

        return redirect()->route('statistika')->with('berhasil', 'Kuesioner berhasil dikirim.');
    }
}
