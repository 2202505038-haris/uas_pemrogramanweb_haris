@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        Edit Alat
    </div>

    <div class="card-body">

        <form action="{{ route('alat.update', $alat->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            @include('alat.form')

            <button class="btn btn-primary">
                Update
            </button>

            <a href="{{ route('alat.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

@endsection