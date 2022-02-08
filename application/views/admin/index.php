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
        </div>
        <!-- /.container-fluid -->
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">

                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <div class="inner">

                  <h3><?= $this->db->count_all_results('user'); ?></h3>
                  <p>User</p>
                </div>
                <a href="<?= base_url('admin/tuser'); ?>" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?= $this->db->count_all_results('tabel_siswa'); ?></h3>

                  <p>Daftar Siswa</p>
                </div>
                <div class="">
                  <i class="fas fa-user-graduate"></i>
                </div>
                <a href="<?= base_url('admin/tsiswa');?>" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3 class="text-white">44</h3>

                  <p class="text-white">Daftar Guru ISMUBA</p>
                </div>
                <div class="icon">
                  <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>65</h3>

                  <p>Daftar Walikelas</p>
                </div>
                <div class="icon">
                  <i class="fas fa-school "></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
          <!-- Main row -->

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

    <!-- /.content -->