<?php

namespace App\Http\Controllers\superadmin;

use App\PemilikReklame;
use App\Produk;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pemilik;
use App\Penyewa;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pemilik()
    {
        $pemiliks = Pemilik::get();
        return view('pages.admin.users.pemilik.users', compact('pemiliks'));
    }

    public function penyewa()
    {
        $penyewas = Penyewa::get();
        return view('pages.admin.users.penyewa.users', compact('penyewas'));
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
        $rules = [
            'no_izin' => 'required|unique:pemiliks',
            'nama_perusahaan' => 'required',
            'alamat' => 'required'
        ];

        $message = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute sudah pernah di tambahkan',
        ];

        $this->validate($request, $rules, $message);

        $pemilik = new Pemilik();
        $pemilik->no_izin = $request->no_izin;
        $pemilik->nama_perusahaan = $request->nama_perusahaan;
        $pemilik->alamat = $request->alamat;
        $pemilik->save();

        return redirect()->route('user.pemilik')->with('success', 'berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pemilik = Pemilik::findOrFail($id);
        $produks = Produk::where('id_pemilik', $pemilik->id)->get();
        return view('pages.admin.users.pemilik.show', compact('pemilik', 'produks'));
    }

    public function showPenyewa($id)
    {
        $user = User::findOrFail($id);

        //$produks = Produk::where('id_user', $user->id)->get();
        return view('pages.admin.users.penyewa.show', compact('user'));
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
}
