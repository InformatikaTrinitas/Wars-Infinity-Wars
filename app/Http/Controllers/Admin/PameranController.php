<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pameran;
use Illuminate\Http\Request;

class PameranController extends Controller
{
    public function index()
    {
        $pamerans = Pameran::latest()->paginate(10);
        return view('admin.pameran.index', compact('pamerans'));
    }

    public function create()
    {
        return view('admin.pameran.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nama_kelompok_pameran' => 'required|string|max:255']);
        Pameran::create(['nama_kelompok_pameran' => $request->nama_kelompok_pameran]);
        return redirect()->route('admin.pameran.index')->with('success', 'Pameran berhasil ditambahkan.');
    }

    public function edit(Pameran $pameran)
    {
        return view('admin.pameran.edit', compact('pameran'));
    }

    public function update(Request $request, Pameran $pameran)
    {
        $request->validate(['nama_kelompok_pameran' => 'required|string|max:255']);
        $pameran->update(['nama_kelompok_pameran' => $request->nama_kelompok_pameran]);
        return redirect()->route('admin.pameran.index')->with('success', 'Pameran berhasil diperbarui.');
    }

    public function destroy(Pameran $pameran)
    {
        $pameran->delete();
        return redirect()->route('admin.pameran.index')->with('success', 'Pameran berhasil dihapus.');
    }
}
