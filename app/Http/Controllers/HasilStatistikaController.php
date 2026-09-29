<?php

namespace App\Http\Controllers;

use App\Models\HasilKuesionerStatistika;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class HasilStatistikaController extends Controller
{
    public function index()
    {
        return view('dashboard.statistika.hasil', [
            'hasil' => $this->hasil(),
        ]);
    }

    public function excel()
    {
        $hasil = $this->hasil();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Hasil Statistika');

        $headers = [
            'No',
            'Nama Lengkap',
            'Status Alumni',
            'Pekerjaan',
            'Tempat Bekerja',
            'Pendapatan / Gaji',
            'Tempat Lanjut Kuliah',
            'Bukti Dokumen',
            'Waktu Pengisian',
        ];

        $sheet->fromArray($headers, null, 'A1');
        $sheet->getStyle('A1:I1')->getFont()->setBold(true);

        foreach ($hasil as $index => $item) {
            $row = $index + 2;
            $sheet->fromArray([
                $index + 1,
                $item->namalengkap,
                $item->status_label,
                $item->pekerjaan ?: '-',
                $item->tempat_bekerja ?: '-',
                $item->pendapatan,
                $item->tempat_kuliah ?: '-',
                $item->bukti ?: '-',
                $item->created_at->format('d-m-Y H:i'),
            ], null, 'A'.$row);

            if ($item->pendapatan !== null) {
                $sheet->getStyle('F'.$row)->getNumberFormat()->setFormatCode('#,##0');
            }
        }

        foreach (range('A', 'I') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        return response()->streamDownload(function () use ($spreadsheet) {
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
        }, 'hasil-kuesioner-statistika.xlsx', [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ]);
    }

    public function pdf()
    {
        $pdf = Pdf::loadView('dashboard.statistika.pdf', [
            'hasil' => $this->hasil(),
        ])->setPaper('a4', 'landscape');

        return $pdf->download('hasil-kuesioner-statistika.pdf');
    }

    private function hasil()
    {
        return HasilKuesionerStatistika::query()->latest()->get();
    }
}
