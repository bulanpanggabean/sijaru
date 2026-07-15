<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Tampilkan semua data admin
     */
    public function index()
    {
        $admins = Admin::latest()->get();

        return view('admin.index', compact('admins'));
    }

    /**
     * Form tambah admin
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Simpan admin
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required|max:255',
            'username' => 'required|unique:admins',
            'email'    => 'required|email|unique:admins',
            'no_hp'    => 'required',
            'password' => 'required|min:6',
        ]);

        Admin::create([
            'nama'     => $request->nama,
            'username' => $request->username,
            'email'    => $request->email,
            'no_hp'    => $request->no_hp,
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('admin.index')
            ->with('success', 'Admin berhasil ditambahkan.');
    }

    /**
     * Detail admin
     */
    public function show(Admin $admin)
    {
        return view('admin.show', compact('admin'));
    }

    /**
     * Form edit admin
     */
    public function edit(Admin $admin)
    {
        return view('admin.edit', compact('admin'));
    }

    /**
     * Update admin
     */
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'nama'     => 'required|max:255',
            'username' => 'required|unique:admins,username,' . $admin->id,
            'email'    => 'required|email|unique:admins,email,' . $admin->id,
            'no_hp'    => 'required',
        ]);

        $data = [
            'nama'     => $request->nama,
            'username' => $request->username,
            'email'    => $request->email,
            'no_hp'    => $request->no_hp,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $admin->update($data);

        return redirect()
            ->route('admin.index')
            ->with('success', 'Admin berhasil diperbarui.');
    }

    /**
     * Hapus admin
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();

        return redirect()
            ->route('admin.index')
            ->with('success', 'Admin berhasil dihapus.');
    }
}