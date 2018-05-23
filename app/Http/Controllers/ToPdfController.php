<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use PDF;
use Options;
use App\Absensi;

class ToPdfController extends Controller
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
     * Mencetak slip gaji pegawai
     */
    public function CetakSlipGaji($id){
      date_default_timezone_set('Asia/Jakarta');

      $pegawai = Pegawai::find($id);
      if (!isset($pegawai)) {
        return 'empty';
      }
      // $pdf = PDF::loadView('pdf');
      // return view('SlipGaji', ["pegawai" => $pegawai]);
      $absensi_ = Absensi::whereMonth('tanggal', date("m"))->where('pegawai_id', $id)->get();
      $banyak_hari = date('t');
      $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
      // dd(date('m'));
      // dd(date('d').' '.$bulan[date('m')].' '.date('Y'));

      // menghitung jumlah kehadiran
      $kehadiran = count($absensi_);
      $pdf = PDF::loadview('slip(writer)', [
        "pegawai" => $pegawai, 'kehadiran' => $kehadiran, 'banyak_hari' => $banyak_hari, 'potongan' => ($banyak_hari-$kehadiran)*15000, 'bulan' => $bulan
      ]);

      // dd($pdf);

      // $pdf = PDF::loadview('slip', [
      //   "pegawai" => $pegawai, 'kehadiran' => $kehadiran, 'banyak_hari' => $banyak_hari, 'potongan' => ($banyak_hari-$kehadiran)*15000, 'bulan' => $bulan
      // ]);
      return $pdf->stream('slip gaji id_'.$pegawai->id.' '.date('Y-m-d').'.pdf');
      // return response()->json($pegawai);
    }

    public function lab($id){
      date_default_timezone_set('Asia/Jakarta');

      $pegawai = Pegawai::find($id);
      if (!isset($pegawai)) {
        return 'empty';
      }
      // $pdf = PDF::loadView('pdf');
      // return view('SlipGaji', ["pegawai" => $pegawai]);
      $absensi_ = Absensi::whereMonth('tanggal', date("m"))->where('pegawai_id', $id)->get();
      $banyak_hari = date('t');
      $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
      // dd(date('m'));
      // dd(date('d').' '.$bulan[date('m')].' '.date('Y'));

      // menghitung jumlah kehadiran
      $kehadiran = count($absensi_);
      // return view('slip(writer)', [
      //   "pegawai" => $pegawai, 'kehadiran' => $kehadiran, 'banyak_hari' => $banyak_hari, 'potongan' => ($banyak_hari-$kehadiran)*15000, 'bulan' => $bulan
      // ]);
      // dd($pegawai);
      return view('slip(writer)', [
        "pegawai" => $pegawai, 'kehadiran' => $kehadiran, 'banyak_hari' => $banyak_hari, 'potongan' => ($banyak_hari-$kehadiran)*15000, 'bulan' => $bulan
      ]);
    }
}
