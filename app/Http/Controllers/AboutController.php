<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function index()
    {
        $jumlahTruk = DB::table('jumlah_truk')->get();
        $pelanggans = DB::table('pelanggan_kami')->get();
        $penghargaans = DB::table('penghargaan')->where('rilis', 1)->paginate(3);
        for ($i=0; $i < count($jumlahTruk); $i++) { 
            $tahun[$i] = $jumlahTruk[$i]->tahun;
        }
        sort($tahun);
        return view('user.about', [
            'tahun' => $tahun, 
            'pelanggans' => $pelanggans,
            'penghargaans' => $penghargaans,
            'nextPage' => $penghargaans->nextPageUrl(),
            'prevPage' => $penghargaans->previousPageUrl(),
        ]);
    }

    public function grafikTruk()
    {
        $jumlahTruk = DB::table('jumlah_truk')->orderBy('tahun', 'asc')->get();
        $label = null;
        $data = null;
        for ($i=0; $i < count($jumlahTruk); $i++) { 
            $label[] = $jumlahTruk[$i]->tahun;
            $data[] = $jumlahTruk[$i]->total_truk;
        }
        return response()->json([
            'status' => 'success',
            'label' => $label,
            'data' => $data
        ]);
    }

    public function grafikPelanggan()
    {
        $pelanggans = DB::table('pelanggan_kami')->get();
        $label = null;
        $data = null;
        for ($i=0; $i < count($pelanggans); $i++) { 
            $label[] = $pelanggans[$i]->nama;
            $data[] = 1;
        }
        return response()->json([
            'status' => 'success',
            'label' => $label,
            'data' => $data
        ]);
    }

    public function grafikMerek()
    {
        $jenis = DB::table('jenis_truk')->get();
        $label = null;
        $data = null;
        for ($i=0; $i < count($jenis); $i++) { 
            $label[] = $jenis[$i]->merek;
            $data[] = intval($jenis[$i]->jumlah);
        }
        return response()->json([
            'status' => 'success',
            'label' => $label,
            'data' => $data
        ]);
    }

    public function grafikJumlahTruk()
    {
        $jumlahTruk = DB::table('jumlah_truk_jenis')->get();
        $label = null;
        $data = null;
        for ($i=0; $i < count($jumlahTruk); $i++) { 
            $label[] = $jumlahTruk[$i]->tipe;
            $data[] = intval($jumlahTruk[$i]->jumlah);
        }
        return response()->json([
            'status' => 'success',
            'label' => $label,
            'data' => $data
        ]);
    }

}
