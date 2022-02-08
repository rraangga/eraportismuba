<!-- Sidebar Menu -->
<nav class="mt-2">
  <span class="text-secondary text-uppercase font-weight-bold">Menu Guru</span>
  <?php foreach($tmenu as $tm) : ?>
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
    <li class="nav-item">
      <a href="<?= base_url().$tm['url']; ?>" class="nav-link">
        <i class="nav-icon <?= $tm['icon'];?>"></i>
        <p>
          <?= $tm['nama_menu_g']; ?>
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