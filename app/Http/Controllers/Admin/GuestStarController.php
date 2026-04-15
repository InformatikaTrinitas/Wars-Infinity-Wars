<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuestStar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuestStarController extends Controller
{
    public function index()
    {
        $guestStars = GuestStar::latest()->paginate(10);
        return view('admin.guest-star.index', compact('guestStars'));
    }

    public function create()
    {
        return view('admin.guest-star.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $data = ['nama' => $request->nama];

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('guest-stars', 'public');
        }

        GuestStar::create($data);

        return redirect()->route('admin.guest-star.index')->with('success', 'Guest Star berhasil ditambahkan.');
    }

    public function edit(GuestStar $guestStar)
    {
        return view('admin.guest-star.edit', compact('guestStar'));
    }

    public function update(Request $request, GuestStar $guestStar)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $data = ['nama' => $request->nama];

        if ($request->hasFile('foto')) {
            if ($guestStar->foto) {
                Storage::disk('public')->delete($guestStar->foto);
            }
            $data['foto'] = $request->file('foto')->store('guest-stars', 'public');
        }

        $guestStar->update($data);

        return redirect()->route('admin.guest-star.index')->with('success', 'Guest Star berhasil diperbarui.');
    }

    public function destroy(GuestStar $guestStar)
    {
        if ($guestStar->foto) {
            Storage::disk('public')->delete($guestStar->foto);
        }
        $guestStar->delete();
        return redirect()->route('admin.guest-star.index')->with('success', 'Guest Star berhasil dihapus.');
    }
}
