<!DOCTYPE html>
<html lang="id">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css' )}}">

    <title>ISS</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ff9500;">
      <div class="container">
        <a class="navbar-brand" href="{{ route('beranda') }}">
          <img src="{{ asset('logo.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">
          E-Salary
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <div class="ml-auto mr-auto">
              <div id="jam" class="text-center">
                  7:27 AM
              </div>
              <div id="tanggal" class="text-center">
                  Kamis, 7 September 2017
              </div>
          </div>
          <ul class="navbar-nav mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('beranda') }}">Absensi <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pegawai
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{ route('pegawai') }}">Tampil</a>
                <a class="dropdown-item" href="{{ route('formPegawai') }}">Tambah</a>
                <a class="dropdown-item" href="{{ route('halamanEditPegawai') }}">Edit</a>
              </div>
              <li class="nav-item active">
                <a  class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </li>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="content container">
        @yield('content')
    </div>
    <footer class="footer" style="background-color: #ff9500;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="text-right">(031) 3095786</div>
                    <div class="text-right">Jalan Raya Ketengan No. 67A</div>
                    <div class="text-right">Burneh - Bangkalan</div>
                    <div class="text-right">Jawa Timur</div>
                </div>
                <div class="col align-self-start">
                    <div class="text-left">@facebook-iss</div>
                    <div class="text-left">@tw-iss</div>
                    <div class="text-left">@ins-iss</div>
                </div>
            </div>
        </div>
    </footer>

    <style media="screen">
        .content {
            margin-top: 12px;
            margin-bottom: 12px;
            /*overflow-y: scroll;*/
            /*min-height: inherit;*/
            /*position:absolute;*/
        }
        .footer{
            padding: 10px;
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: #f5f5f5;
        }
    </style>

    <!-- Load JavaScript -->
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script>
        function tambahnol(a){
            if (a < 10) {
                return "0"+a;
            } else {
                return a;
            }
        }

        function updateClock() {
            var sekarang = new Date(), bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus','September','Oktober','November','Desember'];
            var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

            var jam = tambahnol(sekarang.getHours()) + ':' + tambahnol(sekarang.getMinutes())+':'+tambahnol(sekarang.getSeconds());
            var h = sekarang.getDay();
            var tanggal = [sekarang.getDate(),
                        bulan[sekarang.getMonth()],
                        sekarang.getFullYear()].join(' ');


            document.getElementById('tanggal').innerHTML = hari[h]+", "+tanggal;
            document.getElementById('jam').innerHTML = jam;
            setTimeout(updateClock, 1000);
        }
        updateClock(); // initial call
    </script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/tether.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  </body>
</html>
