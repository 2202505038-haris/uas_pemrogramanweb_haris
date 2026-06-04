@extends('layouts.app')

@section('content')
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

        <a href="{{ route('alat.pdf') }}" class="btn btn-danger btn-sm" target="_blank">
            Cetak PDF
        </a>
        <a href="{{ route('alat.create') }}" class="btn btn-primary btn-sm">
            Tambah Alat
        </a>
    </div>
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