<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{{ 'slip gaji id_'.$pegawai->id.' '.date('Y-m-d') }}</title>
    <!-- <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8"> -->
    <link rel="stylesheet" href="{{ ltrim(elixir('vendors/bootstrap/dist/css/bootstrap.min.css'), '/') }}" />
    <!-- <link rel="stylesheet" href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style media="screen">
      body, html{
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
      }
      .baris::after{
        clear:both;
      }
      .baris::after, .baris::before{
        display: table;
        content: " ";
      }
      .titik-dua{
        padding-left: 10px;
        padding-right: 5px;
      }
      .garis-bawah{
        border-bottom: 1px solid black;
        padding-bottom: 5px;
        margin-bottom: 5px;
      }
      .kanan{
        margin-left: auto;
      }
      .sepertiga{
        width: 33.33333%;
        float: left;
      }
      .text-kanan{
        text-align: right;
      }
      .text-tengah{
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="baris" style="height:25px;"></div>
      <div class="baris" style="padding-left:15px;">
        <img src="{{ ltrim(elixir('logo3.png'), '/') }}" alt="" />
        <!-- <img class="logo" src="{{ asset('logo3.png') }}" alt="" /> -->
        <!-- <h2><strong>ISS</strong></h2> -->
      </div>
      <div class="baris" style="padding-left:15px;padding-right:15px;">
        <div class="sepertiga">
          <div class="baris">Information System Solution</div>
          <div class="baris">Jl. Surabaya No. 67A</div>
          <div class="baris">(031) 3095786</div>
        </div>
        <div class="sepertiga">
            <h1 style="margin-top:0px;margin-left:auto;margin-right:auto;">SLIP GAJI</h1>
        </div>
        <div class="sepertiga">
          <table style="margin-left:auto">
            <tr>
              <td>Tanggal </td>
              <td class="titik-dua">:</td>
              <td>{{ date('d/m/Y') }}</td>
            </tr>
            <tr>
              <td>No. Referensi </td>
              <td class="titik-dua">:</td>
              <td>GJ-{{ $pegawai->id }}-{{ date('dmY') }} </td>
            </tr>
            <tr>
              <td>Bulan </td>
              <td class="titik-dua">:</td>
              <td>{{$bulan[date('m')-1]}} </td>
            </tr>
          </table>
        </div>
      </div>
      <div class="baris" style="border:1px solid black;">
        <div class="col-xs-6">
          <table>
            <tr>
              <td>Nama </td>
              <td class="titik-dua">:</td>
              <td>{{ $pegawai->nama }}</td>
            </tr>
            <tr>
              <td>Jabatan </td>
              <td class="titik-dua">:</td>
              <td>{{ $pegawai->jabatan()->first()->nama }}</td>
            </tr>
          </table>
        </div>
        <div class="col-xs-6">
          <table>
            <tr>
              <td>Alamat </td>
              <td class="titik-dua">:</td>
              <td>{{ $pegawai->alamat }}</td>
            </tr>
            <tr>
              <td>Telepon </td>
              <td class="titik-dua">:</td>
              <td>{{ $pegawai->no_telp }}</td>
            </tr>
          </table>
        </div>
      </div>
      <div class="baris" style="border-left:1px solid black;border-bottom:1px solid black;border-right:1px solid black">
        <div>
          <table class="col-xs-12">
            <thead>
              <tr>
                <th class="text-tengah" style="width:40px">No</th>
                <th>Keterangan</th>
                <th class="text-kanan">Jumlah</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-tengah">1</td>
                <td>Gaji Pokok</td>
                <td class="text-kanan">{{ $pegawai->jabatan()->first()->gaji }}</td>
              </tr>
              <tr>
                <td class="text-tengah">2</td>
                <td>Potongan gaji ( absen sebanyak : {{ $banyak_hari-$kehadiran }} )</td>
                <td class="text-kanan">{{ $potongan }}</td>
              </tr>
              <tr>
                <td></td>
                <td><strong>Total</strong></td>
                <td class="text-kanan"><strong>{{ $pegawai->jabatan()->first()->gaji - $potongan }}</strong></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="container">
      <div style="float:right;">
        {{ date('d').' '.$bulan[date('m')-1].' '.date('Y') }}
      </div>
    </div>
    <div class="container">
      <div style="display:flex;margin-top:50px;">
        <!-- KANAN -->
        <div class="" style="">
          <div class="">
            Penerima
          </div>
          <div class="" style="margin-top:50px;text-decoration:underline;">
            <strong>{{ $pegawai->nama }}</strong>
          </div>
        </div>

        <!-- KIRI -->
        <div class="" style="float:right;">
          <div>
            CEO ISS
          </div>
          <div class="" style="margin-top:50px;text-decoration:underline;">
            <strong>Syakir Ali</strong>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
