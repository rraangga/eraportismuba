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
          <h3 class="card-title text-bold text-uppercase"><?= $tabelsiswa['nama_siswa']; ?></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="<?= base_url('assets/dist/img/').$tabelsiswa['image'];?>" class="img-thumbnail" alt="...">
              </div>
              <div class="col">
                <div class="card-body">
                  <h5 class="card-title text-bold text-uppercase">NISN : </h5>
                  <h5 class="card-title ml-2 text-muted"><?= $tabelsiswa['nisn']; ?></h5>
                  <br>
                  <h5 class="card-title text-bold text-uppercase pt-2">Kelas :</h5>
                  <h5 class="card-title ml-2 text-muted pt-2"><?= $tabelsiswa['kelas']; ?></h5>
                  <br>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <small class="text-muted font-italic"> date : <?= date('d M Y'); ?></small>
          <a class="btn btn-success float-right" href="<?= base_url(); ?>admin/edit/<?= $tabelsiswa['id'];?>"><i
              class="fas fa-fw fa-info"></i>Edit</a>
          <a class="btn btn-primary float-right mr-2" href="<?= base_url('admin/tsiswa');?>">Back
          </a>
        </div>
        <!-- /.card-footer-->
      </div>
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>