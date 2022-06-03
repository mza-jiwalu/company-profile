<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesans = DB::table('pesan')->orderBy('id', 'desc')->get();
        return view('admin.pesan.index', ['data' => $pesans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $email = 'info@armaslogistic.co.id';
        if(empty($request->nama) || empty($request->email) || empty($request->no_hp) || empty($request->pesan)) {
            return redirect()->back()->with('error', "Form tidak boleh kosong!");
        } else {
            unset($data['_token']);
            try {
                \Mail::to($email)
                ->send(new \App\Mail\KirimPesan($data['nama'], $data['email'], $data['no_hp'], $data['pesan']));
                DB::table('pesan')->insert(array_merge($data, ['status' => 0]));
                return redirect()->back()->with('success', 'Pesan Terkirim!');
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', $th->getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pesan = DB::table('pesan')
        ->where('id', $id)
        ->get();
        return view('admin.pesan.show', ['pesan' => $pesan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function check($id)
    {
        try {
            DB::table('pesan')->where('id', $id)->update(['status' => 1]);
            return redirect()->back()->with('success', 'Berhasil update status');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
