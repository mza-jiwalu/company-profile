<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator;

class ContactController extends Controller
{
    public function index()
    {
        return view('user.contact');
    }
    public function store(Request $request)
    {
      $data = $request->all();
      unset($data['_token']);
      try {
        DB::table('kontak')->insert($data);
        return redirect()->back()->with('success', 'Pesan terkirim!');
      } catch (\Throwable $th) {
        return redirect()->back()->with('error', $th->getMessage());
      }
    }
}
