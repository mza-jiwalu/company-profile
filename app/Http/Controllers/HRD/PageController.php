<?php

namespace App\Http\Controllers\HRD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function dashboard()
    {
        $totalLowongan = DB::table('lowongan_kerja')->count('id');
        $totalPelamar = DB::table('pelamar')->count('id');

        return view('hrd.dashboard', compact('totalLowongan', 'totalPelamar'));
    }

    public function profil()
    {
        return view('hrd.profil');
    }
}
