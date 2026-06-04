<html>
<head>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Laporan Inventaris Alat Medis</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Alat</th>
                <th>Merek</th>
                <th>Lokasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alat as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->nama_alat }}</td>
        <td>{{ $item->merek }}</td>
        <td>{{ $item->lokasi }}</td>
    </tr>
@endforeach
        </tbody>
    </table>
</body>
</html>