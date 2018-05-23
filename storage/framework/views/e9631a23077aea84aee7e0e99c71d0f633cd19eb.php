<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo e(env('APP_NAME')); ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo e(asset('vendors/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo e(asset('vendors/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo e(asset('vendors/nprogress/nprogress.css')); ?>" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo e(asset('vendors/animate.css/animate.min.css')); ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo e(asset('build/css/custom.min.css')); ?>" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="<?php echo e(route('login')); ?>" method="POST">
              <?php echo e(csrf_field()); ?>

              <h1>ISS E-Salary</h1>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <input class="btn btn-default submit" type="submit" value="Log in">
                <a class="reset_pass" href="#signup">Lupa password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Tidak bisa login ?
                  <a href="#signup" class="to_register"> klik di sini </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <img src="<?php echo e(asset('logo.png')); ?>" alt="">
                  <p>Creted by <a href="https://www.linkedin.com/in/syakir-ali/">Syakir Ali</a> ©2017<br>Using <a href="https://github.com/puikinsh/gentelella">Gentelella Alela</a> (front end) and <a href="http://laravel.com/">Laravel 5.5</a> (back end).</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Bantuan</h1>
              <p>Untuk demo aplikasi silahkan masukkan username : <strong>admin</strong> password : <strong>adminadmin</strong><br>Untuk informasi lebih lanjut silahkan hubungi <strong>mohammadalisyakir@gmail.com</strong></p>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Kembali ke
                  <a href="#signin" class="to_register"> Form Login </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <img src="<?php echo e(asset('logo.png')); ?>" alt="">
                  <p>Creted by <a href="https://www.linkedin.com/in/syakir-ali/">Syakir Ali</a> ©2017<br>Using <a href="https://colorlib.com">Colorlib</a> (front end) and <a href="http://laravel.com/">Laravel 5.5</a> (back end).</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
