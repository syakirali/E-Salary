<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use App\Jabatan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return redirect()->route('beranda');
        $pegawai_ = Pegawai::all();
        $jabatan_ = Jabatan::all();
        // dd($pegawai_->first()->jabatan()->first()->nama);
        // return view('tampilPegawai', ['pegawai_' => $pegawai_]);
        return view('main_layout', ['pegawai_' => $pegawai_, 'jabatan_' => $jabatan_]);
    }
}
