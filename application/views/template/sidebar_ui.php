<body style="font-family:sans-serif;font-size:small;font-weight:lighter" class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="<?php echo base_url() ?>assets/dist/img/JMTMLOGOKU.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <nav class="main-header navbar navbar-expand navbar-dark">
      <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tv"></i>
            <strong>..:: SISTEM INFORMASI MANAJEMEN KONTRAK [SIMAK-JMTM] ::..</strong>
          </a>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-user-lock"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">Alexander Pierce</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="far fa-user-circle mr-2"></i> Profile
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-user-edit mr-2"></i> Ganti Password
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-power-off mr-2"></i> Logout
            </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a class="brand-link">
        <img src="<?php echo base_url() ?>assets/dist/img/JMTMLOGOKU.png" alt="AdminLTE Logo" class="brand-image elevation-5" style="opacity: .8">
        <span class="brand-text font-weight-light"></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?= base_url('admin/dashboard') ?>" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="javascript:;" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  File Master
                  <i class="right fas fa-angle-double-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('admin/data_pengguna') ?>" class="nav-link">
                    <i class="fas fa-caret-right nav-icon"></i>
                    <p>
                      Data Pegawai
                    </p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="javascript:;" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Management Kontrak
                  <i class="right fas fa-angle-double-left right"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="<?= base_url('admin/data_kontrak') ?>" class="nav-link">
                    <i class="fas fa-caret-right nav-icon"></i>
                    <p>
                      Managemen Kontrak
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                <a href="<?= base_url('admin/data_kontrak_penyedia_jasa') ?>" class="nav-link">
                    <i class="fas fa-caret-right nav-icon"></i>
                    <p>
                    Managemen Mata Anggaran
                    </p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="javascript:;" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Administrasi Penyedia
                  <i class="right fas fa-angle-double-left right"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('admin/administrasi_penyedia') ?>" class="nav-link">
                    <i class="fas fa-caret-right nav-icon"></i>
                    <p>
                      Pra Pengadaan
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('administrasi_kontrak/administrasi_kontrak/pasca_pengadaan') ?>" class="nav-link">
                    <i class="fas fa-caret-right nav-icon"></i>
                    <p>
                      Pasca Pengadaan
                    </p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('administrasi_kontrak/administrasi_kontrak') ?>" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Administrasi Taggihan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('administrasi_kontrak/administrasi_kontrak/administrasi_dokumen') ?>" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Administrasi Kontrak
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('administrasi_kontrak/administrasi_kontrak') ?>" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Analisis Taggihan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('laporan_kinerja') ?>" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Laporan Kinerja
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('auth/logout') ?>" class="nav-link">
                <i class="nav-icon fa fa-arrow-left"></i>
                <p>Logout</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>