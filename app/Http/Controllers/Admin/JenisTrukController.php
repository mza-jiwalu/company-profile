<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisTrukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $truks = DB::table('jenis_truk')->orderBy('id', 'desc')->get();
        return view('admin.about.jenis_truk.index', ['truks' => $truks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.jenis_truk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jenisTruck = [
            'merek' => $request->merek,
            'jumlah' => $request->jumlah
        ];
        try {
            DB::table('jenis_truk')->insert($jenisTruck);
            return redirect()->route('jenis-truck.index')->with('success', 'Add Jenis Truck Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $truk = DB::table('jenis_truk')->where('id', $id)->get();
        return view('admin.about.jenis_truk.edit', ['truk' => $truk[0]]);
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
        $jenisTruck = [
            'merek' => $request->merek,
            'jumlah' => $request->jumlah
        ];
        try {
            DB::table('jenis_truk')->where('id', $id)->update($jenisTruck);
            return redirect()->route('jenis-truck.index')->with('success', 'Update Jenis Truck Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::table('jenis_truk')->where('id', $id)->delete();
            return redirect()->route('jenis-truck.index')->with('success', 'Delete Jenis Truck Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
