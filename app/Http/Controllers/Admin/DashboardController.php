<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuestStar;
use App\Models\Sponsor;
use App\Models\Lomba;
use App\Models\Penampilan;
use App\Models\Pameran;
use App\Models\FotoKegiatan;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalGuestStar'    => GuestStar::count(),
            'totalSponsor'      => Sponsor::count(),
            'totalLomba'        => Lomba::count(),
            'totalPenampilan'   => Penampilan::count(),
            'totalPameran'      => Pameran::count(),
            'totalFotoKegiatan' => FotoKegiatan::count(),
        ]);
    }
}
