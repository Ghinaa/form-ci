<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?= base_url('template') ?>/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

              <?php if (session()->get('message')) : ?> 
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-header="true"> &times; </span>
                      </button>
                      Anda Telah melakukan <strong><?= session()->getFlashdata('message'); ?></strong>
                      </div>

                      <script> $(".alert").alert(); </script>
                      <?php endif; ?>

              <div class="card-body">
                <form method="POST" action="#" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <a href="auth-forgot-password.html" class="text-small">
                          Forgot Password?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                  <div class="mt-5 text-muted text-center">
                    Don't have an account? <a href="<?= base_url('user/register') ?>">Create Now</a>
                  </div>
                </form>
              <?php 
                  if (isset($_POST['login'])){
                      include"../koneksi.php";
                      $email  = $_POST['email'];
                      $password     = $_POST['password'];

                      //pengecekan username yang diinput dengan di database
                      $cek_email  = mysqli_query( $conn," Select * FROM user WHERE    email ='$email'");
                      $row    = mysqli_num_rows($cek_email);

                  if ( $row === 1 ) {
                      //jalankan prosedur seleksi password
                      $fetch_password = mysqli_fetch_assoc($cek_email); 
                      $cek_password   = $fetch_password['password'];

                      //pengecekan inputan password dengan database
                      if ( $cek_password <> $password ) {
                          echo"<script>alert('Kata Sandi Salah')</script>";
                      } else {
                          echo"<script>document,location.href='mhs.php'</script>";
                      }

                  } else {
                      //alert username salah
                      echo"<script> alert('Email salah atau Email tidak terdaftar')</script>";
                  }
                }
              ?>  

              </div>
            </div>
            
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  