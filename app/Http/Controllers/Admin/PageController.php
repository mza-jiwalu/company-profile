<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function pageNotFound()
    {
        return view('welcome');
    }

    public function index()
    {
        $totalBerita = DB::table('berita')->count('id');
        $totalPenghargaan = DB::table('penghargaan')->count('id');
        $totalTruk = DB::table('jumlah_truk')->orderBy('tahun', 'asc')->get();
        $total = count($totalTruk);
        $totalTruk = $totalTruk[$total - 1]->total_truk;
        $totalPelanggan = DB::table('pelanggan_kami')->count('id');

        //data hrd
        $totalLowongan = DB::table('lowongan_kerja')->count('id');
        $totalPelamar = DB::table('pelamar')->count('id');
        $visitor = DB::table('tb_visitor')->where('id', 1)->value('visitor');

        $data = [
            'total_berita' => $totalBerita,
            'total_penghargaan' => $totalPenghargaan,
            'total_truk' => $totalTruk,
            'total_pelanggan' => $totalPelanggan,
            'total_lowongan' => $totalLowongan,
            'total_pelamar' => $totalPelamar,
            'visitor' => $visitor
        ];
        return view('admin.dashboard', ['data' => $data]);
    }

    public function login()
    {
        if (session('login')) {
            return redirect('admin');
        }
        return view('admin.login');
    }
}
