@extends('layouts.app')

@section('content')
<h1>Edit Karyawan</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ $karyawan->nama }}" required>
    </div>
    <div class="mb-3">
        <label>Jabatan</label>
        <input type="text" name="jabatan" class="form-control" value="{{ $karyawan->jabatan }}" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $karyawan->email }}" required>
    </div>
    <div class="mb-3">
        <label>Telepon</label>
        <input type="text" name="telepon" class="form-control" value="{{ $karyawan->telepon }}" required>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
