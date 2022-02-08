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
            <form action="" method="post">
              <input type="hidden" id="id" name="id" value="<?= $tabelsiswa['id'];?>">
              <div class="card-body">
                <div class="form-group">
                  <label for="nama_siswa">Nama</label>
                  <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                  <input type="text" class="form-control" id="nama_siswa" name="nama_siswa"
                    value="<?= $tabelsiswa['nama_siswa'];?>">
                </div>
                <div class="form-group">
                  <label for="nisn">NISN</label>
                  <small class="form-text text-danger"><?= form_error('nisn'); ?></small>
                  <input type="text" class="form-control" id="nisn" name="nisn" value="<?= $tabelsiswa['nisn'];?>">
                </div>
                <div class="form-group">
                  <label for="nisn">No. Induk</label>
                  <small class="form-text text-danger"><?= form_error('induk'); ?></small>
                  <input type="text" class="form-control" id="induk" name="induk" value="<?= $tabelsiswa['induk'];?>">
                </div>
                <div class="form-group">
                  <label for="kelas">Kelas</label>
                  <small class="form-text text-danger"><?= form_error('kelas'); ?></small>
                  <select class="custom-select" id="kelas" name="kelas">
                    <?php foreach($kelas as $kls): ?>
                    <?php if($kls == $tabelsiswa['kelas']): ?>
                    <option value="<?= $kls;?>" selected><?= $kls; ?></option>
                    <?php else : ?>
                    <option value="<?= $kls;?>"><?= $kls; ?></option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="form-group">
                  <img class="pt-3" src="<?= base_url('assets/dist/img/profile/').$tabelsiswa['image'];?>"
                    class="img-thumbnail" alt="...">
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="<?= base_url('admin/tsiswa');?>" class="btn btn-secondary">Back</a>
                <button type="submit" name="edit" id="edit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

        </div>


      </div>

  </section>
  <!-- /.content -->
</div>