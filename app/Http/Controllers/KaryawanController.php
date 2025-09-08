<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('karyawan.index', compact('karyawan'));
    }

    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'email' => 'required|email|unique:karyawans,email',
            'telepon' => 'required',
        ]);

        Karyawan::create($request->all());
        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'email' => 'required|email|unique:karyawans,email,'.$id,
            'telepon' => 'required',
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update($request->all());
        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diupdate.');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();
        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil dihapus.');
    }
}
