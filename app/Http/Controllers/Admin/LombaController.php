<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lomba;
use Illuminate\Http\Request;

class LombaController extends Controller
{
    public function index()
    {
        $lombas = Lomba::latest()->paginate(10);
        return view('admin.lomba.index', compact('lombas'));
    }

    public function create()
    {
        return view('admin.lomba.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nama' => 'required|string|max:255']);
        Lomba::create(['nama' => $request->nama]);
        return redirect()->route('admin.lomba.index')->with('success', 'Lomba berhasil ditambahkan.');
    }

    public function edit(Lomba $lomba)
    {
        return view('admin.lomba.edit', compact('lomba'));
    }

    public function update(Request $request, Lomba $lomba)
    {
        $request->validate(['nama' => 'required|string|max:255']);
        $lomba->update(['nama' => $request->nama]);
        return redirect()->route('admin.lomba.index')->with('success', 'Lomba berhasil diperbarui.');
    }

    public function destroy(Lomba $lomba)
    {
        $lomba->delete();
        return redirect()->route('admin.lomba.index')->with('success', 'Lomba berhasil dihapus.');
    }
}
