    <!-- Content Wrapper. Contains page content -->
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
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <?php if (validation_errors()): ?>
            <div class="alert alert-danger" role="alert">
              <?= validation_errors(); ?>
            </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>
            <div class="row">
              <div class="col-lg-0 ml-2">
                <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#siswaModal"><i
                    class="fas fa-plus-circle"></i>
                  Add Siswa
                </button>
              </div>
              <!-- Import link -->

              <div class="col-lg-3">
                <div class="mb-1">
                  <div class="">
                    <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i
                        class="fas fa-file-import"></i>
                      Import</a>
                  </div>
                </div>
              </div>

              <!-- File upload form -->
              <div class="col-12 mb-1" id="importFrm" style="display: none;">
                <form action="<?php echo base_url('admin/importsis'); ?>" method="post" enctype="multipart/form-data">
                  <input type="file" name="file" />
                  <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
                </form>
              </div>

            </div>

            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Siswa</th>
                  <th>NISN</th>
                  <th>Kelas</th>
                  <th>Image</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach($tsiswa as $ts): ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $ts['nama_siswa']; ?>
                  </td>
                  <td><?= $ts['nisn']; ?></td>
                  <td><?= $ts['kelas']; ?></td>
                  <td><img src="<?= base_url('assets/dist/img/profile/'). $ts['image']; ?>" class="img-thumbnail"></img>
                  </td>
                  <td>
                    <a class="btn btn-danger" href="<?= base_url();?>admin/delete/<?= $ts['id'];?>"
                      onclick="return confirm('anda yakin?');"><i class="fas fa-fw fa-trash-alt"></i>
                    </a>
                    <a class="btn btn-warning" href="<?= base_url(); ?>admin/detail/<?= $ts['id'];?>"><i
                        class="fas fa-fw fa-info"></i></a>
                    <a class="btn btn-success" href="<?= base_url(); ?>admin/edit/<?= $ts['id'];?>"><i
                        class="fas fa-fw fa-edit"></i></a>
                  </td>
                  <?php $i++; ?>
                  <?php endforeach; ?>
                </tr>
              </tbody>


            </table>
          </div>
          <!-- /.card-body -->
        </div>

      </section>

      <!-- /.content -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="siswaModal" tabindex="-1" aria-labelledby="siswaModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="siswaModalLabel">Tambahkan Siswa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('admin/tsiswa'); ?>" method="post">
              <div class="form-group">
                <label for="formGroupExampleInput">Nama Siswa</label>
                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Nama Siswa">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">NISN</label>
                <input type="text" class="form-control" id="nisn" name="nisn" placeholder="NISN">
              </div>
              <label for="formGroupExampleInput2">Kelas</label>
              <select class="custom-select" id="kelas" name="kelas">
                <option selected disabled value="">Pilih Kelas...</option>
                <?php foreach($kelas as $kls) : ?>
                <option><?= $kls; ?></option>
                <?php endforeach; ?>

              </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i>Tambah</button>
          </div>
          </form>
        </div>
      </div>
    </div>