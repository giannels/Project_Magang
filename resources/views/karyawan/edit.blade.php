@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Karyawan</h1>

    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama:</label>
        <input type="text" name="nama" value="{{ old('nama', $karyawan->nama) }}">
        @error('nama') <div style="color:red">{{ $message }}</div> @enderror
        <br>

        <label>Jabatan:</label>
        <input type="text" name="jabatan" value="{{ old('jabatan', $karyawan->jabatan) }}">
        @error('jabatan') <div style="color:red">{{ $message }}</div> @enderror
        <br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $karyawan->email) }}">
        @error('email') <div style="color:red">{{ $message }}</div> @enderror
        <br>

        <label>Telepon:</label>
        <input type="text" name="telepon" value="{{ old('telepon', $karyawan->telepon) }}">
        @error('telepon') <div style="color:red">{{ $message }}</div> @enderror
        <br>

        <button type="submit">Update</button>
        <a href="{{ route('karyawan.index') }}">Batal</a>
    </form>
</div>
@endsection
