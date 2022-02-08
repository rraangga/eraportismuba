<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>CodeIgniter CSV Import</title>

  <!-- Bootstrap library -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">

  <!-- Stylesheet file -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>

<body>
  <div class="container">
    <h2>Users List</h2>

    <!-- Display status message -->
    <?php if ($this->session->flashdata('success')) { ?>

    <div class="alert alert-success">
      <a href="#" class="close" data-dismiss="alert">&times;</a>
      <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
    </div>


    <?php } elseif ($this->session->flashdata('error')) { ?>
    <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert">&times;</a>
      <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
    </div>
    <?php }
?>

    <div class="row">

      <!-- File upload form -->
      <div class="col-md-12" id="importFrm">
        <form action="<?php echo base_url('users/import'); ?>" method="post" enctype="multipart/form-data">
          <input type="file" name="file" />
          <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
        </form>
      </div>

      <!-- Data list table -->
      <table class="table table-striped table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>#ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Password</th>
            <th>user_image</th>
            <th>mapel_id</th>
            <th>wali_id</th>
            <th>role_id</th>
            <th>active</th>
          </tr>
        </thead>
        <tbody>
          <?php if(!empty($users)){ foreach($users as $row){ ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['user_image']; ?></td>
            <td><?php echo $row['mapel_id']; ?></td>
            <td><?php echo $row['wali_id']; ?></td>
            <td><?php echo $row['role_id']; ?></td>
            <td><?php echo $row['active']; ?></td>
          </tr>
          <?php } }else{ ?>
          <tr>
            <td colspan="5">No member(s) found...</td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

</body>

</html>