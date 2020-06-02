
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas bg-dark" id="sidebar">
        <div class="user-profile">
          <div class="user-image">
            <img src="<?= base_url('asset/img/').$user['img']; ?>">
          </div>
          <div class="user-name">
              <?= $user['nama'] ?>
          </div>
          <div class="user-designation">
              Admin
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/index'); ?>">
              <i class="icon-box menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/kelas'); ?>">
              <i class="icon-marquee menu-icon"></i>
              <span class="menu-title">Kelas</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/calon'); ?>">
              <i class="fa fa-user menu-icon"></i>
              <span class="menu-title">Calon</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/progres'); ?>">
              <i class="icon-globe menu-icon"></i>
              <span class="menu-title">Progres</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/settings'); ?>">
              <i class="icon-cog menu-icon"></i>
              <span class="menu-title">Settings</span>
            </a>
          </li>
        </ul>
      </nav>