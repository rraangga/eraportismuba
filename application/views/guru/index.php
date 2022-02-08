<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= $title; ?></h1>
        </div>
        <div class="col-sm-6">
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content connectedSortable">
    <!-- Default box -->
    <div class="row pl-lg-4">

      <div class=" card col-md-6">
        <div class="card-header ui-sortable-handle" style="cursor: move;">
          <h3 class="card-title text-bold text-uppercase"><?= $user['name']; ?></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>

          </div>
        </div>

        <div class="card-body">
          <?= $this->session->flashdata('message'); ?>
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="<?= base_url('assets/dist/img/profile/').$user['user_image'];?>" class="img-thumbnail"
                  alt="...">
              </div>
              <div class="col">
                <div class="card-body">
                  <div class="list-group">

                    <h5 class="card-title text-bold text-uppercase">Username : </h5>
                    <h5 class="card-title ml-2 text-muted"><?= $user['username']; ?></h5>

                    <h5 class="card-title text-bold text-uppercase">Guru Mapel : </h5>
                    <?php foreach($mapel as $m) : ?>
                    <h5 class="card-title ml-2 text-muted"><?= $m['mapel']; ?></h5>
                    <?php endforeach; ?>
                    <h5 class="card-title text-bold text-uppercase">Role :</h5>
                    <?php foreach ($userr as $u) : ?>
                    <h5 class="card-title ml-2 text-muted"><?= $u['role']; ?></h5>
                    <?php endforeach; ?>


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <small class="text-muted font-italic"> date : <?= date('d M Y'); ?></small>
          <a class="btn btn-success float-right" href="<?= base_url('guru/guruedit'); ?>"><i
              class="fas fa-fw fa-info"></i>Edit</a>
          <button type="button" class="btn btn-danger float-right mr-2" data-toggle="modal" data-target="#gantiModal"><i
              class="fas fa-fw fa-info"></i>
            Ganti Password
          </button>
        </div>
        <!-- /.card-footer-->
      </div>
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- Modal -->
<div class="modal fade" id="gantiModal" tabindex="-1" aria-labelledby="gantiModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="gantiModalLabel">Ganti Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('guru'); ?>" method="post">
          <div class="form-group">
            <label for="passwordL">Password Lama</label>
            <input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="Password Lama">
            <?= form_error('oldpassword', '<small class="text-danger pl-2">','</small>'); ?>
          </div>
          <div class="form-group">
            <label for="passwordB">Password Baru</label>
            <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="Password Baru">
            <?= form_error('newpassword', '<small class="text-danger pl-2">','</small>'); ?>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Ulangi Password">
            <?= form_error('password', '<small class="text-danger pl-2">','</small>'); ?>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger"><i class="fas fa-plus-circle"></i> Ganti</button>
      </div>
      </form>
    </div>
  </div>
</div>