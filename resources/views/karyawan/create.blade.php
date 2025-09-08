@extends('layouts.app')

@section('content')
<h1>Tambah Karyawan</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('karyawan.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
    </div>
    <div class="mb-3">
        <label>Jabatan</label>
        <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan') }}" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>
    <div class="mb-3">
        <label>Telepon</label>
        <input type="text" name="telepon" class="form-control" value="{{ old('telepon') }}" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
