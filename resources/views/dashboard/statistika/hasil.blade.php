<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Statistika | Tracer Study FMIPA</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        body { background: #f4f0fa; }
    </style>
</head>

<body class="min-h-screen font-poppins text-navy">
    <div class="mx-auto max-w-6xl px-4 py-8 sm:py-12">
        <div class="overflow-hidden rounded-3xl bg-white shadow-xl shadow-primary/10">
            <div class="flex flex-col gap-4 bg-primary px-6 py-8 text-white sm:flex-row sm:items-end sm:justify-between sm:px-10">
                <div>
                    <p class="text-sm font-medium text-secondary">Tracer Study STATISTIKA FMIPA UNSULBAR</p>
                    <h1 class="mt-1 text-2xl font-bold sm:text-3xl">Hasil Kuesioner Statistika</h1>
                    <p class="mt-2 text-sm text-white/80">{{ $hasil->count() }} jawaban tersimpan.</p>
                </div>
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('hasil-statistika.excel') }}"
                        class="rounded-xl bg-white px-4 py-2.5 text-sm font-semibold text-primary">Ekspor Excel</a>
                    <a href="{{ route('hasil-statistika.pdf') }}"
                        class="rounded-xl bg-secondary px-4 py-2.5 text-sm font-semibold text-white">Ekspor PDF</a>
                </div>
            </div>

            <div class="overflow-x-auto px-4 py-6 sm:px-8">
                <table class="w-full min-w-[960px] text-left text-sm text-gray-600">
                    <thead class="bg-gray-50 text-xs uppercase text-gray-700">
                        <tr>
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Nama Lengkap</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Pekerjaan</th>
                            <th class="px-4 py-3">Tempat Bekerja</th>
                            <th class="px-4 py-3">Pendapatan / Gaji</th>
                            <th class="px-4 py-3">Tempat Lanjut Kuliah</th>
                            <th class="px-4 py-3">Bukti</th>
                            <th class="px-4 py-3">Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($hasil as $item)
                            <tr class="border-b">
                                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3 font-medium text-gray-900">{{ $item->namalengkap }}</td>
                                <td class="px-4 py-3">{{ $item->status_label }}</td>
                                <td class="px-4 py-3">{{ $item->pekerjaan ?: '-' }}</td>
                                <td class="px-4 py-3">{{ $item->tempat_bekerja ?: '-' }}</td>
                                <td class="px-4 py-3">{{ $item->pendapatan_format }}</td>
                                <td class="px-4 py-3">{{ $item->tempat_kuliah ?: '-' }}</td>
                                <td class="px-4 py-3">
                                    @if ($item->bukti)
                                        <a href="{{ asset('bukti-statistika/'.$item->bukti) }}" target="_blank"
                                            class="font-medium text-primary underline">Lihat</a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="px-4 py-3">{{ $item->created_at->format('d-m-Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="px-4 py-8 text-center text-gray-500">Belum ada hasil kuesioner.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
