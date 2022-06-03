<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RitaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ritases = DB::table('ritase')->get();
        return view('admin.ritase.index', ['ritases' => $ritases]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ritase.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ritase = [
            'tahun' => $request->tahun,
            'jumlah' => $request->jumlah
        ];
        try {
            DB::table('ritase')->insert($ritase);
            return redirect()->route('ritase.index')->with('success', 'Add Ritase Successfully');
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
        $ritase = DB::table('ritase')->where('id', $id)->get();
        return view('admin.ritase.edit', ['ritase' => $ritase[0]]);
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
        $ritase = [
            'tahun' => $request->tahun,
            'jumlah' => $request->jumlah
        ];
        try {
            DB::table('ritase')
            ->where('id', $id)
            ->update($ritase);
            return redirect()->route('ritase.index')->with('success', 'Update Ritase Successfully');
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
            DB::table('ritase')->where('id', $id)->delete();
            return redirect()->route('ritase.index')->with('success', 'Delete Ritase Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
