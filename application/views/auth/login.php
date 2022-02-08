<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo" id="logoT">
      <a href="../../index2.html">E-Raport | MUSASE</a>
      <b>ISMUBA</b>
    </div>
    <!-- /.login-logo -->
    <div class="card shadow p-3 mb-5 rounded" id="card" name="card">
      <div class="card-body login-card-body">
        <?= $this->session->flashdata('message'); ?>
        <form action="#" method="post">
          <?= form_error('username', '<small class="text-danger ml-2">', '</small>'); ?>
          <div class="input-group mb-3">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username"
              value="<?= set_value('username');?>">
            <div class="input-group-append">
              <div class="input-group-text text-primary">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <?= form_error('password', '<small class="text-danger ml-2">', '</small>'); ?>
          <div class="input-group mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text text-primary">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <hr>
        <!-- /.social-auth-links -->


        <p class="mb-0">
          <a href="<?= base_url('auth/register');?>" class="text-center">Register a new membership</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
