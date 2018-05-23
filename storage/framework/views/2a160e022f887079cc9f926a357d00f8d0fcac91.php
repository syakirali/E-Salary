<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>E-Salary</title>
    <!-- Bootstrap -->
    <link href="<?php echo e(asset('vendors/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo e(asset('vendors/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo e(asset('vendors/nprogress/nprogress.css')); ?>" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo e(asset('vendors/iCheck/skins/flat/green.css')); ?>" rel="stylesheet">
    <!-- Datatables -->
    <link href="<?php echo e(asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- PNotify -->
    <link href="<?php echo e(asset('vendors/pnotify/dist/pnotify.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendors/pnotify/dist/pnotify.buttons.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendors/pnotify/dist/pnotify.nonblock.css')); ?>" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo e(asset('vendors/bootstrap-daterangepicker/daterangepicker.css')); ?>" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="<?php echo e(asset('vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css')); ?>" rel="stylesheet">
    <!-- alertify -->
    <link rel="stylesheet" href="<?php echo e(asset('vendors/alertify/css/alertify.css')); ?>">

    <!-- Custom Theme Style -->
    <link href="<?php echo e(asset('build/css/custom.min.css')); ?>" rel="stylesheet">
    <style media="screen">
      .dataTables_filter{
        width: unset;
      }
      .pecari{
        padding-left: 0px;
      }
    </style>

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="/" class="site_title"><i class="fa fa-paw"></i> <span>E-Salary</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo e(asset('images/img.jpg')); ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2><?php echo e(Auth::id()); ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                  <li><a onclick="tampilAbsen();"><i class="fa fa-check-square-o" aria-hidden="true"></i> Absensi </a></li>
                  <li><a><i class="fa fa-users" aria-hidden="true"></i> Pegawai <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a onclick="tampilPegawai()">Tampil</a></li>
                      <li><a onclick="tampilForm()">Form</a></li>
                      <li><a onclick="tampilEditor()">Edit</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Lain-lain</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-sign-out"></i> Pengguna <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                        <a href="<?php echo e(route('logout')); ?>"
                            onclick="
                            event.preventDefault();
                            alertify.confirm('Dibutuhkan login kembali jika keluar. Yakin ingin keluar ?', function(){
                              document.getElementById('logout-form').submit();
                            });
                        ">
                            Keluar
                        </a>

                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field()); ?>

                        </form>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Keluar" href="<?php echo e(route('logout')); ?>"
                  onclick="
                    event.preventDefault();
                    alertify.confirm('Dibutuhkan login kembali jika keluar. Yakin ingin keluar ?', function(){
                      document.getElementById('logout-form').submit();
                    });
                  ">
                  <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu" style="padding-bottom:12px;">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- PEGAWAI -->
          <div id="pegawai" style="display:none">
            <div class="page-title">
              <div class="title_left">
                <h3>Pegawai</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
            <!-- LIST PEGAWAI -->
            <div id="masterListPegawai" class="row" style="display:none">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Pegawai <small>terupdate</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      * Klik nama pegawai untuk menampilkan kehadiran dalam satu bulan terakhir
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nama</th>
                          <th>Jabatan</th>
                          <th>Nomor Telepon</th>
                          <th>Alamat</th>
                          <th>Tanggal Lahir</th>
                          <th>Gaji</th>
                          <th>Email</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>

                      <style media="screen">
                        .aksi{
                          display: flex;
                        }

                        .tengah{
                          margin-left: auto;
                          margin-right: auto;
                        }
                      </style>
                      <tbody id="listPegawai">
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <!-- Form Pegawai Baru -->
            <div id="masterFormPegawai" class="row" style="display:none">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Pegawai Baru</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form onsubmit="false" action="<?php echo e(route('tambahPegawai')); ?>" method="post" id="idForm" class="form-horizontal form-label-left idForm" novalidate>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nama" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Confirm Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email2" name="confirm_email" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Nomor Telepon <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="tel" id="telephone" name="no_telp" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lahir">Tanggal Lahir <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="input-group date" id="myDatepicker">
                              <input id="lahir" name="lahir" class="form-control" type="text">
                              <span class="input-group-addon" style="">
                                 <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jabatan">Jabatan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="jabatan" name="jabatan" class="form-control">
                            <option value="null">Choose option</option>
                            <?php $__currentLoopData = $jabatan_; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jabatan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($jabatan->id); ?>"><?php echo e($jabatan->nama); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="alamat" required="required" name="alamat" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="reset" onclick="" class="btn btn-danger">Hapus</button>
                          <button id="send" type="submit" class="btn btn-success">Tambah</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- EDITOR -->
            <div id="masterEditPegawai" class="row" style="display:none">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Pegawai</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form onsubmit="false" action="<?php echo e(route('tambahPegawai')); ?>" method="post" id="form_edit" class="form-horizontal form-label-left" novalidate>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_edit">ID <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="id_edit" name="id" class="form-control">
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="e_name">Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="e_name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nama" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="e_email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="e_email" name="email_edit" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="e_confirm_email">Confirm Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="e_confirm_email" name="confirm_email_edit" data-validate-linked="email_edit" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="e_telephone">Nomor Telepon <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="tel" id="e_telephone" name="no_telp" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="e_lahir">Tanggal Lahir <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="input-group date" id="myDatepicker2">
                              <input id="e_lahir" name="lahir" class="form-control" type="text">
                              <span class="input-group-addon" style="">
                                 <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="e_jabatan">Jabatan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="e_jabatan" name="jabatan" class="form-control">
                            <option value="null">Choose option</option>
                            <?php $__currentLoopData = $jabatan_; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jabatan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($jabatan->id); ?>"><?php echo e($jabatan->nama); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="e_alamat">Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="e_alamat" required="required" name="alamat" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="reset" onclick="" class="btn btn-danger">Hapus</button>
                          <button id="send" type="submit" class="btn btn-success">Edit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- KEHADIRAN -->
            <div id="KehadiranPegawai" class="row">
              <div id="master_kehadiran" class="col-md-4 col-sm-6 col-xs-12" style="display:none">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 class="judul_kehadiran">Kehadiran Pegawai</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30 center-block" style="align:center">
                      Berikut kehadiran pegawai
                    </p>
                    <div class="row center-block">
                        <div class="col-md-12 col-sm-12 col-xs-12 center-block">
                            <div class="penampilKehadiran center-block"></div>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <button id="tombol_cetak" type="button" class="btn btn-sm btn-primary">cetak slip gaji</button>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <!-- ABSENSI -->
          <div class="absensi">
            <div class="page-title">
              <div class="title_left">
                <h3>Absensi <small></small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row absensi">
              <div class="col-md-5 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Absensi Pegawai</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <form id="form_absensi" action="" method="post" class="form-horizontal form-label-left" novalidate="">
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID Pegawai <span class="required"></span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="first-name" name="id" required="required" data-validate-minmax="0," class="form-control col-md-7 col-xs-12" type="number">

                          </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div id="form_absen" class="item form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-danger" type="reset">Batal</button>
                            <button type="submit" class="btn btn-primary">Absen</button>
                          </div>
                        </div>
                      </form>
                  </div>
                </div>
              </div>
              <div class="col-md-7 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kehadiran <small>Hari ini</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama</th>
                          <th>Kedatangan</th>
                        </tr>
                      </thead>
                      <tbody id="tabelKehadiran">
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            E-Salary - Sistem Penggajian Elektronik. Created by <a href="https://www.linkedin.com/in/syakir-ali/">Syakir Ali</a> ©2017
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>


    <!-- jQuery -->
    <script src="<?php echo e(asset('vendors/jquery/dist/jquery.min.js')); ?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo e(asset('vendors/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo e(asset('vendors/fastclick/lib/fastclick.js')); ?>"></script>
    <!-- NProgress -->
    <script src="<?php echo e(asset('vendors/nprogress/nprogress.js')); ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo e(asset('vendors/iCheck/icheck.min.js')); ?>"></script>
    <!-- Datatables -->
    <script src="<?php echo e(asset('vendors/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/datatables.net-buttons/js/buttons.flash.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/datatables.net-buttons/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/jszip/dist/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/pdfmake/build/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/pdfmake/build/vfs_fonts.js')); ?>"></script>

    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo e(asset('vendors/moment/min/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
    <!-- bootstrap-datetimepicker -->
    <script src="<?php echo e(asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')); ?>"></script>

    <!-- validator -->
    <script src="<?php echo e(asset('vendors/validator/validator.js')); ?>"></script>
    <!-- PNotify -->
    <script src="<?php echo e(asset('vendors/pnotify/dist/pnotify.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/pnotify/dist/pnotify.buttons.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/pnotify/dist/pnotify.nonblock.js')); ?>"></script>
    <!-- alertifi -->
    <script src="<?php echo e(asset('vendors/alertify/js/alertify.js')); ?>" charset="utf-8"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo e(asset('build/js/custom.min.js')); ?>"></script>

    <!-- my own script -->
    <script type="text/javascript">
    var tamp_list = false, tamp_form = false, tamp_edit = false;

    $(document).ready(function(){
        updateKehadiran();
        updatePegawai();
        $('#myDatepicker').datetimepicker({format:'YYYY-MM-DD'});
        $('#myDatepicker2').datetimepicker({format:'YYYY-MM-DD'});
    });

    function update_pegawai_edit(id){
        console.log('mengupdate pegawai edit');
        var a = document.getElementById('id_edit');
        var tabel = $('#datatable-buttons').dataTable().api();
        var index;
        while (a.firstChild) {
            a.removeChild(a.firstChild);
        }
        a.appendChild(document.createElement('option'));
        // var tabel.column(0).row(0).data();
        console.log('tabel data');
        tabel.rows().every(function(rowIdx, tableLoop, rowLoop){
            var option = document.createElement('option');
            option.value = tabel.column(0).data()[rowLoop];
            var text = document.createTextNode(tabel.column(0).data()[rowLoop]);
            option.appendChild(text);
            a.appendChild(option);
        });
    }

    $('#id_edit').change(function(){
        var tabel = $('#datatable-buttons').dataTable().api();
        var id = $(this).val();
        console.log('mencari : '+ id);
        var index;
        tabel.rows().every(function(rowIdx, tableLoop, rowLoop){
            if (tabel.column(0).data()[rowLoop] == id) {
                console.log('adanya '+ tabel.column(0).data()[rowLoop]);
                index = rowIdx;
            }
        });
        document.getElementById('e_name').value = tabel.row(index).node().childNodes[1].childNodes[0].innerHTML;
        console.log('jabatan : ');
        console.log(tabel.row(index).node().childNodes[2].innerHTML);
        console.log('value jabatan : ' + $('#e_jabatan option:contains("'+ tabel.row(index).node().childNodes[2].innerHTML +'")').attr('value'));
        $('#e_jabatan').val($('#e_jabatan option:contains("'+ tabel.row(index).node().childNodes[2].innerHTML +'")').attr('value'));
        document.getElementById('e_telephone').value = tabel.row(index).node().childNodes[3].innerHTML;
        document.getElementById('e_alamat').value = tabel.row(index).node().childNodes[4].innerHTML;
        document.getElementById('e_lahir').value = tabel.row(index).node().childNodes[5].innerHTML;
        document.getElementById('e_email').value = tabel.row(index).node().childNodes[7].innerHTML;
        document.getElementById('e_confirm_email').value = tabel.row(index).node().childNodes[7].innerHTML;
        console.log(index);
        console.log('terpilih :');
        console.log(tabel.row(index).node());
    });

    function editPegawai(id){
        $('#id_edit').val(id);
        $('#id_edit').trigger("change");
        $('#masterEditPegawai').removeAttr('style');
        $('html, body').animate({
            scrollTop: $('#id_edit').offset().top
        }, 500);
        $('#name').focus();
    }

    function getKehadiran(id, nama) {
        var url = 'http://localhost:8000/absensi/'.concat(id);
        console.log('getKehadiran');
        var master = $('#master_kehadiran').clone();
        master.find('.judul_kehadiran').html('Kehadiran Pegawai <small>ID : ' + id + '</small>');
        master.find('.text-muted').html('<strong>' + nama + '</strong>');
        master.find('.penampilKehadiran').datetimepicker({
          inline: true,
          format: "DD/MM/YYYY",
          enabledDates: [new Date()]
        });
        master.find('.close-link').click(function() {
          var a = $(this).closest(".x_panel").parent();
          a.remove()
        });
        master.find('.collapse-link').on("click",function(){
          var a=$(this).closest(".x_panel"),b=$(this).find("i"),c=a.find(".x_content");
          a.attr("style")?
          c.slideToggle(200,function(){
            a.removeAttr("style")
          })
          :
          (c.slideToggle(200),a.css("height","auto")),
          b.toggleClass("fa-chevron-up fa-chevron-down")
        });
        master.find('#tombol_cetak').click(function(){
          var win = window.open('/pegawai/CetakSlipGaji/'+id, '_blank');
          win.focus();
        });
        // $('#pegawai').append(master);
        master.attr('id', '');
        master.css('display', 'block');
        $.ajax({
            type: "GET",
            url: url,
            success: function(respon)
            {
                for(i in respon) {
                    var cell = master.find('td[data-day="'.concat(respon[i].tanggal,'"]'));
                    cell.css('background-color', 'green');
                    cell.css('color', 'white');
                }
                console.log('data :');
                console.log(respon);
            },
            error: function(respon)
            {
                console.log('gagal mengambil absensi');
            }
        });
        master.appendTo('#KehadiranPegawai');
        $('html, body').animate({
            scrollTop: master.offset().top
        }, 500);
        console.log('getKehadiran selesai');
    }

    function hapus(id) {
      // if (confirm('hapus id : ' + id + ' ?'))
      alertify
        .okBtn("Iya")
        .cancelBtn("Batal")
        .confirm("Yakin ingin menghapus " + id + " ?", function()
        {
          $.ajax({
                 type: "POST",
                 url: 'http://localhost:8000/pegawai/hapus',
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
                 data: {id : id}, // serializes the form's elements.
                 success: function(status)
                 {
                      // console.log('status : '.concat(status));
                      //  alert(data);
                      // show response from the php script.
                      if (status === 'sukses') {
                          new PNotify({
                              title: 'Sukses',
                              text: 'Pegawai berhasil dihapus',
                              type: 'success',
                              styling: 'bootstrap3'
                          });
                          // alertify.success('Pegawai berhasi dihapus');
                      } else {
                          new PNotify({
                              title: 'Gagal !',
                              text: 'Pegawai tidak ada',
                              type: 'error',
                              styling: 'bootstrap3'
                          });
                          // alertify.error('Pegawai gagal dihapus !');
                      }

                      updatePegawai();
                 },
                 error: function(status){
                      console.log('gagal'.concat(status));
                      new PNotify({
                          title: 'Error !',
                          text: status.message,
                          type: 'error',
                          styling: 'bootstrap3'
                      });
                      // alertify.error('Pegawai gagal dihapus, cek koneksi !');
                 }
               });
         }, function() {
            // alertify
            //   .closeLogOnClick(true)
            //   .log("Batal menghapus pegawai dengan ID " + id);
            new PNotify({
                title: 'Batal',
                text: 'Batal menghapus ' + id,
                type: 'info',
                styling: 'bootstrap3'
            });
         }
      )
    }

    function updatePegawai(){
        $.ajax({
            type: "GET",
            url: '<?php echo e(route('dataPegawai')); ?>',
            success: function(respon)
            {
                var table = $('#datatable-buttons').DataTable();
                table.clear();
                for (i in respon) {
                     var aksi = '<button type="button" class="btn btn-xs btn-info" onclick="editPegawai('
                     .concat(respon[i].id,')" name="button">edit</button>','<button type="button" class="btn btn-xs btn-danger" onclick="hapus(',
                              respon[i].id,
                              ')" name="button">hapus</button>');

                     table.row.add([
                       respon[i].id,
                       '<a style="cursor:pointer" onclick="getKehadiran('.concat(
                         respon[i].id,
                         ',\'',
                         respon[i].nama,
                         '\')">',
                         respon[i].nama,
                         '</a>'
                       ),
                       respon[i].jabatan,
                       respon[i].no_telp,
                       respon[i].alamat,
                       respon[i].lahir,
                       respon[i].gaji,
                       respon[i].email,
                       aksi
                     ]);
                     table.draw();
                }
                console.log('sukses mengupdate pegawai');
                update_pegawai_edit(respon[0].id);
            },
            error: function(respon)
            {
                console.log('gagal mengupdate pegawai');
            }
        });
    }

    $("#form_absensi").submit(function(e) {
        // evaluate the form using generic validaing
        if (validator.checkAll($(this))) {
            var url = "<?php echo e(route('absen')); ?>"; // the script where you handle the form input.

            $.ajax({
                   type: "POST",
                   url: url,
                   headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   data: $("#form_absensi").serialize(), // serializes the form's elements.
                   success: function(respon)
                   {
                       // show response from the php script.
                       new PNotify({
                           title: respon.status + ' !',
                           text: respon.pesan,
                           type: respon.status,
                           styling: 'bootstrap3'
                       });
                       updateKehadiran();
                   },
                   error: function(status)
                   {
                     new PNotify({
                         title: 'Gagal !',
                         text: 'Gagal melakukan absensi',
                         type: 'error',
                         styling: 'bootstrap3'
                     });
                   }
                 });

            e.preventDefault(); // avoid to execute the actual submit of the form.
        }
        else return false;
    });

    //
    document.getElementById("form_absensi").onreset = function(){
        console.log($(this).find('.item.form-group.bad'));
        $(this).find('.item.form-group.bad').attr('class', 'item form-group');
        $(this).find('.alert').remove();
    };

    document.getElementById("form_edit").onreset = function(){
        console.log($(this).find('.item.form-group.bad'));
        $(this).find('.item.form-group.bad').attr('class', 'item form-group');
        $(this).find('.alert').remove();
    };

    document.getElementById("idForm").onreset = function(){
        console.log($(this).find('.item.form-group.bad'));
        $(this).find('.item.form-group.bad').attr('class', 'item form-group');
        $(this).find('.alert').remove();
    };

    $('#form_edit').submit(function(e){
        // evaluate the form using generic validaing
        if (validator.checkAll($(this))) {
            var url = "<?php echo e(route('editPegawai')); ?>"; // the script where you handle the form input.

            $.ajax({
                   type: "POST",
                   url: url,
                   headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   data: $(this).serialize(), // serializes the form's elements.
                   success: function(status)
                   {
                       //  alert(data);
                       // show response from the php script.
                       if (status !== 'gagal') {
                         new PNotify({
                                         title: 'Sukses',
                                         text: status,
                                         type: 'success',
                                         styling: 'bootstrap3'
                                     });

                       } else {
                         new PNotify({
                                         title: 'Error !',
                                         text: 'Terjadi kesalahan ketika mengedit ',
                                         type: 'warning',
                                         styling: 'bootstrap3'
                                     });
                       }
                       updatePegawai();
                       console.log('mereset');
                       $('#form_edit').trigger("reset");
                       $('html, body').animate({
                           scrollTop: $('#masterListPegawai').offset().top
                       }, 500);
                   },
                   error: function(error){
                       new PNotify({
                           title: 'Error !',
                           text: error,
                           type: 'error',
                           styling: 'bootstrap3'
                       });
                   }
                 });

            e.preventDefault(); // avoid to execute the actual submit of the form.
        } else {
            return false;
        }
    });

    $('#idForm').submit(function(e) {
        // evaluate the form using generic validaing
        if (validator.checkAll($(this))) {
            var url = "<?php echo e(route('tambahPegawai')); ?>"; // the script where you handle the form input.

            $.ajax({
                   type: "POST",
                   url: url,
                   headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   data: $(this).serialize(), // serializes the form's elements.
                   success: function(status)
                   {
                       //  alert(data);
                       // show response from the php script.
                       if (status === 'sukses') {
                         new PNotify({
                                         title: 'Sukses',
                                         text: 'Pegawai baru telah ditambahkan',
                                         type: 'success',
                                         styling: 'bootstrap3'
                                     });

                       } else {
                         new PNotify({
                                         title: 'Error !',
                                         text: 'Terjadi kesalahan ketika menambahkan pegawai baru ',
                                         type: 'error',
                                         styling: 'bootstrap3'
                                     });
                       }
                       updatePegawai();
                       $('#idForm').trigger('reset');
                       $('html, body').animate({
                           scrollTop: $('#masterListPegawai').offset().top
                       }, 500);
                   }
                 });

            e.preventDefault(); // avoid to execute the actual submit of the form.
        } else {
            return false;
        }
    });

    function tampilPegawai() {
      if(!tamp_list) {
          $('.absensi').css('display', 'none');
          $('#pegawai').removeAttr('style');
          $('#masterListPegawai').removeAttr('style');
          $('html, body').animate({
              scrollTop: $('#masterListPegawai').offset().top
          }, 500);
          tamp_list = true;
      } else {
          $('#masterListPegawai').find('.close-link').trigger('click');
          tamp_list = false;
      }
    }

    function tampilForm(){
      if (tamp_form){
          $('#masterFormPegawai').find('.close-link').trigger('click');
          tamp_form = false;
      } else {
          $('.absensi').css('display', 'none');
          $('#pegawai').removeAttr('style');
          $('#masterFormPegawai').removeAttr('style');
          $('html, body').animate({
              scrollTop: $('#masterFormPegawai').offset().top
          }, 500);
          $('#name').focus();
          tamp_form = true;
      }
    }

    function tampilEditor(){
      if (tamp_edit) {
          $('#masterEditPegawai').find('.close-link').trigger('click');
          tamp_edit = false;
      } else {
          // $('#absensi').css('display', 'none');
          $('#pegawai').removeAttr('style');
          $('.absensi').css('display', 'none');
          $('#masterEditPegawai').removeAttr('style');
          $('html, body').animate({
              scrollTop: $('#masterEditPegawai').offset().top
          }, 500);
          $('#id_edit').focus();
          tamp_edit = true;
      }
    }

    function tampilAbsen(){
        $('.absensi').removeAttr('style');
        $('#pegawai').css('display', 'none');
        $('#masterFormPegawai').css('display', 'none');
        $('#masterEditPegawai').css('display', 'none');
        $('#master_kehadiran').css('display', 'none');
        $('#masterListPegawai').css('display', 'none');
        updateKehadiran();
        $('#first-name').focus();
    }

    function updateKehadiran(){
      console.log('mengupdate kehadiran');
      $('#tabelKehadiran').html('');
      $.ajax({
             type: "GET",
             url: '<?php echo e(route('ambilKehadiran')); ?>',
             success: function(data)
             {
                 if (0 == data.length ) {
                   console.log('tidak ada data');
                 }
                 else {
                   // show response from the php script.

                   for (i in data) {
                        var num = 1 + parseInt(i);
                        var row = '<tr><td>'.concat(num, '</td><td>', data[i].nama, '</td><td>', data[i].jam, '</td></tr>');
                        $('#tabelKehadiran').append(row);
                   }
                 }
             }
           });
    }
    </script>
  </body>
</html>
