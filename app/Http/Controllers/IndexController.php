<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $pelanggans = DB::table('pelanggan_kami')->get();
        $sliders = DB::table('slider')->get();
        return view('user.index', ['pelanggans' => $pelanggans, 'sliders' => $sliders]);
    }
}
