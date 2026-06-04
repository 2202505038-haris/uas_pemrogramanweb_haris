@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
    <span>Data Alat</span>
    <div>
        <a href="{{ route('alat.pdf') }}" class="btn btn-danger btn-sm" target="_blank">
            Cetak PDF
        </a>
        <a href="{{ route('alat.create') }}" class="btn btn-primary btn-sm">
            Tambah Alat
        </a>
    </div>
</div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Alat</th>
                    <th>Tahun</th>
                    <th>Merek</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($alat as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_alat }}</td>
                    <td>{{ $item->tahun }}</td>
                    <td>{{ $item->merek }}</td>
                    <td>{{ $item->lokasi }}</td>
                    <td>
                        <form action="{{ route('alat.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                            <a href="{{ route('alat.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Data kosong.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
        {{ $alat->links() }}
    </div>
</div>
@endsection