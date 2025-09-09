@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Import Karyawan</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <!-- Form Upload Excel -->
    <form action="{{ route('karyawan.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <button type="submit" class="btn btn-primary">Import Excel</button>
    </form>

    <!-- Tombol Kembali -->
    <div style="margin-top: 15px;">
        <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Kembali ke Menu Utama</a>
    </div>
</div>
@endsection
