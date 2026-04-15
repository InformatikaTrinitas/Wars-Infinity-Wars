<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penampilan;
use Illuminate\Http\Request;

class PenampilanController extends Controller
{
    public function index()
    {
        $penampilans = Penampilan::latest()->paginate(10);
        return view('admin.penampilan.index', compact('penampilans'));
    }

    public function create()
    {
        return view('admin.penampilan.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nama' => 'required|string|max:255']);
        Penampilan::create(['nama' => $request->nama]);
        return redirect()->route('admin.penampilan.index')->with('success', 'Penampilan berhasil ditambahkan.');
    }

    public function edit(Penampilan $penampilan)
    {
        return view('admin.penampilan.edit', compact('penampilan'));
    }

    public function update(Request $request, Penampilan $penampilan)
    {
        $request->validate(['nama' => 'required|string|max:255']);
        $penampilan->update(['nama' => $request->nama]);
        return redirect()->route('admin.penampilan.index')->with('success', 'Penampilan berhasil diperbarui.');
    }

    public function destroy(Penampilan $penampilan)
    {
        $penampilan->delete();
        return redirect()->route('admin.penampilan.index')->with('success', 'Penampilan berhasil dihapus.');
    }
}
