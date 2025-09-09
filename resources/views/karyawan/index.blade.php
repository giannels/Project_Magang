@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Karyawan</h1>

    <!-- Tabel Data Karyawan -->
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($karyawan as $k)
                    <tr>
                        <td>{{ $k->id }}</td>
                        <td>{{ $k->nama }}</td>
                        <td>{{ $k->jabatan }}</td>
                        <td>{{ $k->email }}</td>
                        <td>{{ $k->telepon }}</td>
                        <td>
                            <a href="{{ route('karyawan.edit', $k->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('karyawan.destroy', $k->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin mau hapus?')" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data karyawan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
