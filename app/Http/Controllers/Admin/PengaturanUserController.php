<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;

class PengaturanUserController extends Controller
{
    public function index()
    {
        $users = DB::table('user')->orderBy('id', 'desc')->get();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        try {
            DB::table('user')->insert(array_merge($data, ['password' => Hash::make($data['password'])]));
            return redirect()->route('user.index')->with('success', 'Berhasil tambah user');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function edit($id)
    {
        $user = DB::table('user')->where('id', $id)->get();
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
        if(!$data['password']) {
            unset($data['password']);
        } else {
            $data = array_merge($data, ['password' => Hash::make($data['password'])]);
        }
        try {
            DB::table('user')->where('id', $id)->update($data);
            return redirect()->route('user.index')->with('success', 'Berhasil udpate user');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::table('user')->where('id', $id)->delete();
            return redirect()->back()->with('success', 'Berhasil hapus user');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}