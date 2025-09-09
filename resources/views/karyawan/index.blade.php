@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Karyawan</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('karyawan.create') }}">Tambah Karyawan</a>

    <table border="3" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
        @foreach($karyawan as $k)
        <tr>
            <td>{{ $k->id }}</td>
            <td>{{ $k->nama }}</td>
            <td>{{ $k->jabatan }}</td>
            <td>{{ $k->email }}</td>
            <td>{{ $k->telepon }}</td>
            <td>
                <a href="{{ route('karyawan.edit', $k->id) }}">Edit</a> |
                <form action="{{ route('karyawan.destroy', $k->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
