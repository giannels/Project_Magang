{{-- filepath: resources/views/karyawan/index.blade.php --}}
{{-- Debug --}}
@extends('layouts.app')

@section('content')
<h1>Daftar Karyawan</h1>
<a href="{{ route('karyawan.create') }}" class="btn btn-primary mb-3">Tambah Karyawan</a>

@if($karyawan->count() > 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($karyawan as $karyawan)
            <tr>
                <td>{{ $karyawan->id }}</td>
                <td>{{ $karyawan->nama }}</td>
                <td>{{ $karyawan->jabatan }}</td>
                <td>{{ $karyawan->email }}</td>
                <td>{{ $karyawan->telepon }}</td>
                <td>
                    <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Tidak ada data karyawan.</p>
@endif
@endsection
