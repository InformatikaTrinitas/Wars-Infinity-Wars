<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FotoKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotoKegiatanController extends Controller
{
    public function index()
    {
        $fotoKegiatans = FotoKegiatan::latest()->paginate(12);
        return view('admin.foto-kegiatan.index', compact('fotoKegiatans'));
    }

    public function create()
    {
        return view('admin.foto-kegiatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|digits:4|integer',
            'foto'  => 'required|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $foto = $request->file('foto')->store('foto-kegiatan', 'public');

        FotoKegiatan::create([
            'tahun' => $request->tahun,
            'foto'  => $foto,
        ]);

        return redirect()->route('admin.foto-kegiatan.index')->with('success', 'Foto kegiatan berhasil ditambahkan.');
    }

    public function edit(FotoKegiatan $fotoKegiatan)
    {
        return view('admin.foto-kegiatan.edit', compact('fotoKegiatan'));
    }

    public function update(Request $request, FotoKegiatan $fotoKegiatan)
    {
        $request->validate([
            'tahun' => 'required|digits:4|integer',
            'foto'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $data = ['tahun' => $request->tahun];

        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($fotoKegiatan->foto);
            $data['foto'] = $request->file('foto')->store('foto-kegiatan', 'public');
        }

        $fotoKegiatan->update($data);

        return redirect()->route('admin.foto-kegiatan.index')->with('success', 'Foto kegiatan berhasil diperbarui.');
    }

    public function destroy(FotoKegiatan $fotoKegiatan)
    {
        Storage::disk('public')->delete($fotoKegiatan->foto);
        $fotoKegiatan->delete();
        return redirect()->route('admin.foto-kegiatan.index')->with('success', 'Foto kegiatan berhasil dihapus.');
    }
}
