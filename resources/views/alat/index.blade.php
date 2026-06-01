@extends('layouts.app')

@section('content')
<style>
    /* CSS untuk memberikan latar belakang bertema medis */
    .medis-bg-table {
        background-image: url('https://img.freepik.com/free-vector/clean-medical-background_53876-116875.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
    }
    
    /* Membuat baris tabel sedikit transparan agar gambar di belakangnya terlihat samar-samar */
    .medis-bg-table table tbody tr {
        background-color: rgba(255, 255, 255, 0.85) !important;
    }
</style>
<div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
    <span>Data Alat</span>

    <div class="d-flex align-items-center gap-2">
        <form action="{{ route('alat.index') }}" method="GET" class="d-flex gap-2">
            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   class="form-control form-control-sm"
                   placeholder="Cari alat atau lokasi..."
                   style="width: 200px;">
            <button type="submit" class="btn btn-secondary btn-sm">Cari</button>
            @if(request('search'))
                <a href="{{ route('alat.index') }}" class="btn btn-light btn-sm">Reset</a>
            @endif
        </form>
    </div>

    <a href="{{ route('alat.pdf') }}" class="btn btn-danger btn-sm" target="_blank">
        Cetak PDF
    </a>
</div>

<div class="card-body">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

   <div class="table-responsive medis-bg-table">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Alat</th>
                    <th>Foto</th>
                    <th>Tahun</th>
                    <th>Merek</th>
                    <th>Lokasi</th>
                    <th>Status</th> <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($alat as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_alat }}</td>
                    <td>
                        @if($item->foto)
                            <img src="{{ $item->foto }}" alt="Foto Alat" style="width: 65px; height: 65px; object-fit: cover; border-radius: 8px;">
                        @else
                            <img src="https://placehold.co/65x65?text=No+Image" alt="No Image" style="border-radius: 8px;">
                        @endif
                    </td>
                    <td>{{ $item->tahun }}</td>
                    <td>{{ $item->merek }}</td>
                    <td>{{ $item->lokasi }}</td>
                    <td>
                        @if($item->status == 'Siap Pakai')
                            <span class="badge bg-success">Siap Pakai</span>
                        @elseif($item->status == 'Sedang Rusak')
                            <span class="badge bg-danger">Sedang Rusak</span>
                        @else
                            <span class="badge bg-warning text-dark">Dalam Kalibrasi</span>
                        @endif
                    </td>
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
                    <td colspan="8" class="text-center">Data kosong.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $alat->links() }}
</div>
@endsection
