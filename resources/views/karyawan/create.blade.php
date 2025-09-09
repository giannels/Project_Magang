@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Karyawan</h1>

    <form action="{{ route('karyawan.store') }}" method="POST">
        @csrf

        <label>Nama:</label>
        <input type="text" name="nama" value="{{ old('nama') }}">
        @error('nama') <div style="color:red">{{ $message }}</div> @enderror
        <br>

        <label>Jabatan:</label>
        <input type="text" name="jabatan" value="{{ old('jabatan') }}">
        @error('jabatan') <div style="color:red">{{ $message }}</div> @enderror
        <br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email') <div style="color:red">{{ $message }}</div> @enderror
        <br>

        <label>Telepon:</label>
        <input type="text" name="telepon" value="{{ old('telepon') }}">
        @error('telepon') <div style="color:red">{{ $message }}</div> @enderror
        <br>

        <button type="submit">Simpan</button>
        <a href="{{ route('karyawan.index') }}">Batal</a>
    </form>
</div>
@endsection
