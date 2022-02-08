<!-- Sidebar Menu -->
<!-- ADMIN -->
<nav class="mt-2">
  <span class="text-secondary text-uppercase font-weight-bold">Menu Admin</span>
  <!-- <li class="nav-header">EXAMPLES</li> -->
  <?php foreach($tmenu as $tm) : ?>
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
      with font-awesome or any other icon font library -->

    <li class="nav-item">

      <?php if($title == $tm['nama_menu_a']): ?>
      <a href="<?= base_url(). $tm['url'] ?>" class="nav-link active">
        <?php else: ?>
        <a href="<?= base_url(). $tm['url'] ?>" class="nav-link">
          <?php endif; ?>
          <i class="nav-icon <?= $tm['icon'];?>"></i>
          <p>
            <?= $tm['nama_menu_a']; ?>
          </p>
        </a>
    </li>
  </ul>

  <?php endforeach; ?>

  <!-- GURU -->
  <span class="text-secondary text-uppercase font-weight-bold">Menu Guru</span>
  <?php foreach($tmenu2 as $tm2) : ?>
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
    <li class="nav-item">
      <?php if($title == $tm2['nama_menu_a2']): ?>
      <a href="<?= base_url(). $tm2['url'] ?>" class="nav-link active">
        <?php else: ?>
        <a href="<?= base_url(). $tm2['url'] ?>" class="nav-link">
          <?php endif; ?>
          <i class="nav-icon <?= $tm2['icon'];?>"></i>
          <p>
            <?= $tm2['nama_menu_a2']; ?>
          </p>
        </a>
    </li>
  </ul>
  <?php endforeach; ?>
  <!-- WALIKELAS -->
  <span class="text-secondary text-uppercase font-weight-bold text-wrap">Menu Walikelas</span>
  <?php foreach($tmenu3 as $tm3) : ?>
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
    <li class="nav-item">
      <?php if($title == $tm3['nama_menu_a3']): ?>
      <a href="<?= base_url().$tm3['url'] ?>" class="nav-link active">
        <?php else: ?>
        <a href="<?= base_url().$tm3['url'] ?>" class="nav-link">
          <?php endif; ?>
          <i class="nav-icon <?= $tm3['icon'];?>"></i>
          <p>
            <?= $tm3['nama_menu_a3']; ?>
          </p>
        </a>
    </li>
  </ul>
  <?php endforeach; ?>

</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>