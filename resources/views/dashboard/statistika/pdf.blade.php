<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; color: #21304F; }
        h1 { font-size: 16px; margin: 0 0 4px; }
        p { margin: 0 0 12px; color: #5c6780; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #d9deea; padding: 6px 8px; text-align: left; vertical-align: top; }
        th { background: #4a2798; color: #fff; font-size: 10px; }
        tr:nth-child(even) td { background: #f7f5fb; }
    </style>
</head>

<body>
    <h1>Hasil Kuesioner Statistika</h1>
    <p>Tracer Study FMIPA UNSULBAR · {{ $hasil->count() }} jawaban</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Status</th>
                <th>Pekerjaan</th>
                <th>Tempat Bekerja</th>
                <th>Pendapatan</th>
                <th>Tempat Kuliah</th>
                <th>Bukti</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($hasil as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->namalengkap }}</td>
                    <td>{{ $item->status_label }}</td>
                    <td>{{ $item->pekerjaan ?: '-' }}</td>
                    <td>{{ $item->tempat_bekerja ?: '-' }}</td>
                    <td>{{ $item->pendapatan_format }}</td>
                    <td>{{ $item->tempat_kuliah ?: '-' }}</td>
                    <td>{{ $item->bukti ?: '-' }}</td>
                    <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">Belum ada hasil kuesioner.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
