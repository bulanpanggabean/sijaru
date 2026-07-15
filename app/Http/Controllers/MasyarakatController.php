<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    /**
     * Menampilkan semua data masyarakat
     */
    public function index()
    {
        $masyarakats = Masyarakat::latest()->get();

        return view('masyarakat.index', compact('masyarakats'));
    }

    /**
     * Form tambah masyarakat
     */
    public function create()
    {
        return view('masyarakat.create');
    }

    /**
     * Simpan data masyarakat
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:masyarakats',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'nullable|email',
        ]);

        Masyarakat::create($request->all());

        return redirect()->route('masyarakat.index')
            ->with('success', 'Data masyarakat berhasil ditambahkan.');
    }

    /**
     * Detail masyarakat
     */
    public function show(Masyarakat $masyarakat)
    {
        return view('masyarakat.show', compact('masyarakat'));
    }

    /**
     * Form edit masyarakat
     */
    public function edit(Masyarakat $masyarakat)
    {
        return view('masyarakat.edit', compact('masyarakat'));
    }

    /**
     * Update masyarakat
     */
    public function update(Request $request, Masyarakat $masyarakat)
    {
        $request->validate([
            'nik' => 'required|unique:masyarakats,nik,' . $masyarakat->id,
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'nullable|email',
        ]);

        $masyarakat->update($request->all());

        return redirect()->route('masyarakat.index')
            ->with('success', 'Data masyarakat berhasil diperbarui.');
    }

    /**
     * Hapus masyarakat
     */
    public function destroy(Masyarakat $masyarakat)
    {
        $masyarakat->delete();

        return redirect()->route('masyarakat.index')
            ->with('success', 'Data masyarakat berhasil dihapus.');
    }
}