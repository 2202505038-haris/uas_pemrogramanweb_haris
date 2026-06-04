@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        Tambah Alat
    </div>

    <div class="card-body">

        <form action="{{ route('alat.store') }}" method="POST">

            @csrf

            @include('alat.form')

            <button class="btn btn-primary">
                Simpan
            </button>

            <a href="{{ route('alat.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

@endsection