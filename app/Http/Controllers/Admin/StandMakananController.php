<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StandMakanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StandMakananController extends Controller
{
    public function index()
    {
        $standMakanans = StandMakanan::latest()->paginate(10);
        return view('admin.stand-makanan.index', compact('standMakanans'));
    }

    public function create()
    {
        return view('admin.stand-makanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $data = ['nama' => $request->nama];

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('stand-makanan', 'public');
        }

        StandMakanan::create($data);

        return redirect()->route('admin.stand-makanan.index')
            ->with('success', 'Stand makanan berhasil ditambahkan.');
    }

    public function edit(StandMakanan $standMakanan)
    {
        return view('admin.stand-makanan.edit', compact('standMakanan'));
    }

    public function update(Request $request, StandMakanan $standMakanan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $data = ['nama' => $request->nama];

        if ($request->hasFile('foto')) {
            if ($standMakanan->foto) {
                Storage::disk('public')->delete($standMakanan->foto);
            }
            $data['foto'] = $request->file('foto')->store('stand-makanan', 'public');
        }

        $standMakanan->update($data);

        return redirect()->route('admin.stand-makanan.index')
            ->with('success', 'Stand makanan berhasil diperbarui.');
    }

    public function destroy(StandMakanan $standMakanan)
    {
        if ($standMakanan->foto) {
            Storage::disk('public')->delete($standMakanan->foto);
        }
        $standMakanan->delete();
        return redirect()->route('admin.stand-makanan.index')
            ->with('success', 'Stand makanan berhasil dihapus.');
    }
}
