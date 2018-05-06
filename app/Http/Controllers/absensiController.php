<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absensi;
use App\Pegawai;

class absensiController extends Controller
{
    /**
     * mengabsensi pegawai
     *
     * @return notifikasi
     */
    public function absenPegawai(Request $request){
        // cek apakah ada pegawai dengan id tersebut
        $pegawai = Pegawai::find($request->id);
        if (!isset($pegawai)){
            return [
                'pesan' => 'tidak ada pegawai dengan id '.$request->id,
                'status' => 'error'
            ];
        }


        date_default_timezone_set('Asia/Jakarta');
        $absensi_ = Absensi::whereDate('tanggal', date('Y-m-d'))->where('pegawai_id', $request->id)->get();
        // cek apakah pegawai telah melakukan absen
        if (!$absensi_->isEmpty()){
            $absensi_ = $absensi_->first();
            // return response()->json($absensi_);
            return [
                'pesan' =>'Pegawai dengan id : '.$absensi_->pegawai_id.', dengan nama : '.$absensi_->nama.'telah melakukan absen hari ini',
                'status' => 'warning'
            ];
        }
        else {
            $absensi = new Absensi;
            $absensi->pegawai_id = $request->id;
            $absensi->tanggal = date('Y-m-d');
            $absensi->jam = date('H:i:s');
            $sukses = $absensi->save();

            // return redirect()->route('beranda');
            if ($sukses) {
              return [
                  'pesan' =>'Sukses !',
                  'status' => 'success'
              ];
            }
            return [
                'pesan' =>'Terjadi kesalahan ketika menyimpan pegawai ! !',
                'status' => 'error'
            ];
        }
    }

    /**
     * mengabsensi pegawai
     *
     * @return json
     */
    public function kehadiranPegawai($id){
        // dd(date("m"));
        $absensi_ = Absensi::whereMonth('tanggal', date("m"))->where('pegawai_id', $id)->get();
        // mengubah format tanggal menjadi "m/d/y"
        foreach ($absensi_ as $absensi) {
            $absensi->tanggal = date("m/d/Y", strtotime($absensi->tanggal));
        }
        // dd($absensi_);
        return response()->json($absensi_);
      }

    /**
     * mengabsensi pegawai
     *
     * @return json
     */
    public function kehadiran(){
      date_default_timezone_set('Asia/Jakarta');
      $absensi_ = Absensi::where('tanggal', date('Y-m-d'))->leftJoin('pegawai', 'pegawai_id', '=', 'pegawai.id')->get();
      // return response()->json();
      // dd($absensi_);
      return response()->json($absensi_);
    }

}
