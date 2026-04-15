<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KontakSponsorship;
use Illuminate\Http\Request;

class KontakSponsorshipController extends Controller
{
    public function index()
    {
        $kontaks = KontakSponsorship::latest()->paginate(10);
        return view('admin.kontak-sponsorship.index', compact('kontaks'));
    }

    public function create()
    {
        return view('admin.kontak-sponsorship.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required|string|max:255',
            'nomor'  => 'required|string|max:50',
        ]);

        KontakSponsorship::create($request->only('nama', 'nomor'));

        return redirect()->route('admin.kontak-sponsorship.index')
            ->with('success', 'Kontak sponsorship berhasil ditambahkan.');
    }

    public function edit(KontakSponsorship $kontakSponsorship)
    {
        return view('admin.kontak-sponsorship.edit', compact('kontakSponsorship'));
    }

    public function update(Request $request, KontakSponsorship $kontakSponsorship)
    {
        $request->validate([
            'nama'   => 'required|string|max:255',
            'nomor'  => 'required|string|max:50',
        ]);

        $kontakSponsorship->update($request->only('nama', 'nomor'));

        return redirect()->route('admin.kontak-sponsorship.index')
            ->with('success', 'Kontak sponsorship berhasil diperbarui.');
    }

    public function destroy(KontakSponsorship $kontakSponsorship)
    {
        $kontakSponsorship->delete();
        return redirect()->route('admin.kontak-sponsorship.index')
            ->with('success', 'Kontak sponsorship berhasil dihapus.');
    }
}
