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
        <div class="col-lg-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"><?= $title; ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="" method="post">
              <!-- <?php echo form_open_multipart('admin/useredit');?> -->
              <input type="hidden" id="id" name="id" value="<?= $quser['id'];?>">
              <div class="card-body">
                <div class="form-group">
                  <label for="nama_siswa">Nama</label>
                  <small class="form-text text-danger"><?= form_error('name'); ?></small>
                  <input type="text" class="form-control" id="name" name="name" value="<?= $quser['name'];?>">
                </div>
                <div class="form-group">
                  <label for="nisn">Username</label>
                  <small class="form-text text-danger"><?= form_error('username'); ?></small>
                  <input type="text" class="form-control" id="username" name="username"
                    value="<?= $quser['username'];?>">
                </div>
                <div class="form-group">
                  <label for="kelas">Role</label>
                  <small class="form-text text-danger"><?= form_error('role_id'); ?></small>
                  <select class="custom-select" id="role_id" name="role_id">
                    <?php foreach($role as $r): ?>
                    <?php if($r == $quser['role_id']): ?>
                    <option value="<?= $r;?>" selected><?= $r; ?></option>
                    <?php else : ?>
                    <option value="<?= $r;?>"><?= $r; ?></option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                  </select>

                </div>
                <div class="form-group">
                  <label for="kelas">Mapel</label>
                  <small class="form-text text-danger"><?= form_error('mapel_id'); ?></small>
                  <select class="custom-select" id="mapel_id" name="mapel_id">
                    <?php foreach($mapel as $m): ?>
                    <?php if($m == $quser['mapel_id']): ?>
                    <option value="<?= $m;?>" selected><?= $m; ?></option>
                    <?php else : ?>
                    <option value="<?= $m;?>"><?= $m; ?></option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                  </select>

                </div>
                <div class="form-group">
                  <label for="kelas">Wali Kelas</label>
                  <small class="form-text text-danger"><?= form_error('wali_id'); ?></small>
                  <select class="custom-select" id="wali_id" name="wali_id">
                    <?php foreach($wali as $w): ?>
                    <?php if($w == $quser['wali_id']): ?>
                    <option value="<?= $w;?>" selected><?= $w; ?></option>
                    <?php else : ?>
                    <option value="<?= $w;?>"><?= $w; ?></option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                  </select>

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
                  <!-- <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image">
                    <label class="custom-file-label" for="image">Choose file</label>
                  </div> -->
                  <img class="pt-3" src="<?= base_url('assets/dist/img/profile/').$quser['user_image'];?>"
                    class="img-thumbnail" alt="...">
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="<?= base_url('admin/tuser');?>" class="btn btn-secondary">Back</a>
                <button type="submit" name="edit" id="edit" class="btn btn-primary">Simpan</button>
              </div>

            </form>
          </div>
          <!-- /.card -->

        </div>

        <!-- INFORMASI -->
        <div class="col-lg-6">
          <!-- general form elements -->
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title text-bold">Informasi</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">

              <div class="form-group">
                <label for="kelas">Role : </label>
                <ol>
                  <?php foreach($urole as $ur): ?>
                  <li><?= $ur['role']; ?></li>
                  <?php endforeach; ?>
                </ol>
              </div>
              <div class="form-group">
                <label for="kelas">Mapel : </label>
                <ol>
                  <?php foreach($tmapel as $tm): ?>
                  <li><?= $tm['mapel']; ?></li>
                  <?php endforeach; ?>
                </ol>
              </div>
              <div class="form-group">
                <label for="kelas">Wali Kelas : </label>
                <ol>
                  <?php foreach($tkelas as $tkls): ?>
                  <li><?= $tkls['kelas']; ?></li>
                  <?php endforeach; ?>
                </ol>
              </div>


            </div>
            <!-- /.card-body -->

            <div class="card-footer">

            </div>

            </form>
          </div>
          <!-- /.card -->

        </div>

      </div>
  </section>
  <!-- /.content -->

</div>