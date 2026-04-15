<?php

namespace App\Http\Controllers;

use App\Models\GuestStar;
use App\Models\Sponsor;
use App\Models\Lomba;
use App\Models\Penampilan;
use App\Models\Pameran;
use App\Models\FotoKegiatan;
use App\Models\KontakSponsorship;
use App\Models\StandMakanan;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing', [
            'guestStars'         => GuestStar::all(),
            'sponsors'           => Sponsor::all(),
            'lombas'             => Lomba::all(),
            'penampilans'        => Penampilan::all(),
            'pamerans'           => Pameran::all(),
            'fotoKegiatans'      => FotoKegiatan::orderBy('tahun', 'desc')->get()->groupBy('tahun'),
            'kontakSponsorships' => KontakSponsorship::all(),
            'standMakanans'      => StandMakanan::all(),
        ]);
    }
}
