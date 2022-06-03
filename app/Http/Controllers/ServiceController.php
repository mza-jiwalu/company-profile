<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index()
    {
        return view('user.service');
    }

    public function ritase()
    {
        $dataRitase = DB::table('ritase')->orderBy('tahun', 'asc')->get();
        $label = null;
        $data = null;
        for ($i=0; $i < count($dataRitase); $i++) { 
            $label[] = $dataRitase[$i]->tahun;
            $data[] = $dataRitase[$i]->jumlah;
        }
        return response()->json([
            'status' => 'success',
            'label' => $label,
            'data' => $data
        ]);
    }
}
