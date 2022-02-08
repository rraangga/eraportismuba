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
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"><?= $title; ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?= form_open_multipart('walikelas/waliedit'); ?>
            <!-- <form action="" method="post"> -->
            <input type="hidden" id="id" name="id" value="<?= $user['id'];?>">
            <div class="card-body">
              <div class="form-group">
                <label for="name">Nama</label>
                <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'];?>">
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <small class="form-text text-danger"><?= form_error('username'); ?></small>
                <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'];?>"
                  readonly>
              </div>
              <div class="form-group">
                <label for="role">Role</label>
                <small class="form-text text-danger"><?= form_error('role_id'); ?></small>
                <select class="custom-select" id="role_id" name="role_id" disabled>
                  <?php foreach ($userr as $u): ?>
                  <?php foreach($role as $r): ?>
                  <?php if($r == $u['role']): ?>
                  <option value="<?= $r;?>" selected><?= $r; ?></option>
                  <?php else : ?>
                  <option value="<?= $r;?>"><?= $r; ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                  <?php endforeach; ?>
                </select>

              </div>
              <div class="form-group">
                <label for="username">Wali Kelas</label>
                <small class="form-text text-danger"><?= form_error('walikelas'); ?></small>
                <?php foreach($kelas as $kls) : ?>
                <input type="text" class="form-control" id="walikelas" name="walikelas" value="<?= $kls['kelas'];?>"
                  readonly>
                <?php endforeach; ?>
              </div>

              <div class="form-group">
                <!-- <label for="image1">Pilih Foto</label> -->
                <!-- <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="image" name="image">
                      <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div> -->
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image" name="image">
                  <label class="custom-file-label" for="image">Choose file</label>
                </div>
                <img class="mt-3 img-thumbnail" src="<?= base_url('assets/dist/img/profile/').$user['user_image'];?>"
                  alt="...">
              </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <a href="<?= base_url('walikelas');?>" class="btn btn-secondary">Back</a>
              <button type="submit" name="editp" id="editp" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close(); ?>
            <!-- </form> -->
          </div>
          <!-- /.card -->

  </section>
  <!-- /.content -->
</div>