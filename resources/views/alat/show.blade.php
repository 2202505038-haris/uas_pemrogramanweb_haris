@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Detail Inventaris Alat</h5>
                    <span class="badge bg-light text-primary">ID: {{ $alat->id }}</span>
                </div>
                <div class="card-body p-4">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th class="text-secondary" style="width: 30%">Nama Alat</th>
                                <td class="fw-bold">: {{ $alat->nama_alat }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Tahun Pengadaan</th>
                                <td>: {{ $alat->tahun }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Merek / Brand</th>
                                <td>: {{ $alat->merek }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Lokasi Penempatan</th>
                                <td>: <span class="badge bg-info text-dark">{{ $alat->lokasi }}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer bg-light d-flex justify-content-end">
                    <a href="{{ route('alat.index') }}" class="btn btn-secondary me-2">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <a href="{{ route('alat.edit', $alat->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit Data
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection