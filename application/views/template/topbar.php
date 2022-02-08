  <body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Navbar Search -->
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout');?>" role="button">
              <i class="fas fa-sign-out-alt"></i>
            </a>
          </li>
        </ul>
      </nav>


      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <div class="bg-primary">

          <a href="../../index3.html" class="brand-link">
            <img src="<?= base_url('assets/dist/img/logo_ueu.png');?>" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">E-Raport | <b>ISMUBA<b></span>
          </a>
        </div>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image mt-2">
              <img src="<?= base_url('assets/dist/img/profile/');?><?= $user['user_image'];?>"
                class="img-circle elevation-2" alt="User Image">
            </div>

            <div class="info">
              <a href="#" class="d-block"><?= $user['name'];?></a>
              <?php foreach($userr as $ur):?>
              <small class="text-muted font-italic"><?= $ur['role']; ?></small>
              <?php endforeach;?>
            </div>
          </div>