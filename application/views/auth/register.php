<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html">E-Raport | MUSASE</a>
      <b>ISMUBA</b>
    </div>

    <div class="card shadow p-3 mb-5 bg-white rounded">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>

        <form action="<?= base_url('auth/register');?>" method="post">
          <?= form_error('name', '<small class="text-danger ml-2">', '</small>'); ?>
          <div class="input-group mb-3">
            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap"
              value="<?= set_value('name');?>">
            <div class="input-group-append">
              <div class="input-group-text text-primary">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
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
          <div class="input-group mb-3">
            <input type="password" class="form-control" id="passwordconf" name="passwordconf"
              placeholder="Retype password">
            <div class="input-group-append">
              <div class="input-group-text text-primary">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">

              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <hr>

        <a href="<?= base_url('/auth');?>" class=" text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->