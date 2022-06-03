<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    public function index()
    {
        $foto=DB::table('gallery')->where('jenis','foto')->get();
        $video=DB::table('gallery')->where('jenis', 'video')
        ->paginate(4);
        return view('user.gallery', ['fotos' => $foto, 'videos' => $video]);
    }

    public function getGallery()
    {
        $foto=DB::table('gallery')->where('jenis','foto')->get();
        return response()->json(['sukses' => true, 'data' => $foto]);
    }
   
}
