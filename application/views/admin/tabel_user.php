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
            <!-- Import link -->
            <div class="row">
              <div class="col-lg-0 ml-2 mb-1">
                <div class="float-right">
                  <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i
                      class="fas fa-file-import"></i>
                    Import</a>
                </div>
              </div>

              <!-- File upload form -->
              <div class="col-12 mb-2" id="importFrm" style="display: none;">
                <form action="<?php echo base_url('admin/import'); ?>" method="post" enctype="multipart/form-data">
                  <input type="file" name="file" />
                  <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
                </form>
              </div>
            </div>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Role</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach($quser as $us): ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $us['name']; ?>
                  </td>
                  <td><?= $us['username']; ?></td>

                  <td><?= $us['role']; ?></td>

                  <td>
                    <a href="<?= base_url(); ?>admin/user/<?= $us['id'];?>" class="btn btn-warning"><i
                        class="fas fa-fw fa-info"></i>detail</a>
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