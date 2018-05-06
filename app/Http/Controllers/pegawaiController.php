<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use App\Jabatan;

class pegawaiController extends Controller
{

    public function pegawai(){
      $pegawai_ = Pegawai::leftJoin('jabatan', 'pegawai.jabatan', '=', 'jabatan.id')
      ->select('pegawai.id as id', 'pegawai.nama as nama', 'jabatan.nama as jabatan', 'lahir', 'no_telp', 'alamat', 'email', 'gaji')->get();

      return response()->json($pegawai_);
    }

    public function editPegawai(Request $request) {
      $pegawai = Pegawai::find($request->id);
      $pegawai->nama = $request->nama;
      $pegawai->lahir = $request->lahir;
      $pegawai->no_telp = $request->no_telp;
      $pegawai->alamat = $request->alamat;
      $pegawai->jabatan = $request->jabatan;
      $pegawai->email = $request->email_edit;
      $pegawai->save();
      // return 'nama : '.$pegawai->nama.', lahir : '.$pegawai->lahir.
      //        ', no_telp : '.$pegawai->no_telp.', alamat : '.$pegawai->alamat.
      //        ', jabatan : '.$pegawai->jabatan.', email : '.$pegawai->email;
      return $pegawai->nama.' berhasil diedit !';
    }

    public function hapusPegawai(Request $request) {
      // return 'halooo';
      // dd($request);
      $pegawai = Pegawai::find($request->id);
      if ($pegawai) {
        $pegawai->delete();
        return 'sukses';
      }

      return 'pegawai dengan id '.$request->id.'tidak ada';
      return response()->json($request->id);
      // return response()->json($request);
    }

    public function tambahPegawai(Request $request){
      // dd($request->all());
      // return json_encode($request->nama);
      // return response()->json($request);
      // return $request;
      $pegawai = new Pegawai;
      $pegawai->nama = $request->nama;
      $pegawai->lahir = $request->lahir;
      $pegawai->no_telp = $request->no_telp;
      $pegawai->alamat = $request->alamat;
      $pegawai->jabatan = $request->jabatan;
      $pegawai->email = $request->email;
      $sukses = $pegawai->save();
      if ($sukses) {
        return 'sukses';
      }
      return 'gagal';
      // return redirect()->route('formPegawai');
    }

}
