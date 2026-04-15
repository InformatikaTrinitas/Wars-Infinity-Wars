<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::latest()->paginate(10);
        return view('admin.sponsor.index', compact('sponsors'));
    }

    public function create()
    {
        return view('admin.sponsor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $data = ['nama' => $request->nama];

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('sponsors', 'public');
        }

        Sponsor::create($data);

        return redirect()->route('admin.sponsor.index')->with('success', 'Sponsor berhasil ditambahkan.');
    }

    public function edit(Sponsor $sponsor)
    {
        return view('admin.sponsor.edit', compact('sponsor'));
    }

    public function update(Request $request, Sponsor $sponsor)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $data = ['nama' => $request->nama];

        if ($request->hasFile('foto')) {
            if ($sponsor->foto) {
                Storage::disk('public')->delete($sponsor->foto);
            }
            $data['foto'] = $request->file('foto')->store('sponsors', 'public');
        }

        $sponsor->update($data);

        return redirect()->route('admin.sponsor.index')->with('success', 'Sponsor berhasil diperbarui.');
    }

    public function destroy(Sponsor $sponsor)
    {
        if ($sponsor->foto) {
            Storage::disk('public')->delete($sponsor->foto);
        }
        $sponsor->delete();
        return redirect()->route('admin.sponsor.index')->with('success', 'Sponsor berhasil dihapus.');
    }
}
