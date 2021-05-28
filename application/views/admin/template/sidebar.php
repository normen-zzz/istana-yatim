 <div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">Sipena</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">Sp</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Master CMS</li>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Master Cms</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="<?= base_url('Cms') ?>">Slide Foto</a></li>
          <!-- <li><a class="nav-link" href="<?= base_url('Cms/donasi') ?>">Donasi</a></li> -->
          <li><a class="nav-link" href="<?= base_url('Cms/bank') ?>">Bank</a></li>
          <li><a class="nav-link" href="<?= base_url('Cms/footer') ?>">Footer</a></li>
        </ul>
      </li>

     


      <li class="menu-header">Master Artikel</li>
       <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-columns"></i><span>Master Artikel</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="<?= base_url('Berkah') ?>">Berkah</a></li>
          <li><a class="nav-link" href="<?= base_url('Ceritasantri') ?>">Cerita Santri</a></li>
        </ul>
      </li>

      <li class="menu-header">Master Donasi</li>
       <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Master Donasi</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="<?= base_url('donasi/belumkonfirmasi') ?>">Belum Terkonfirmasi</a></li>
          <li><a class="nav-link" href="<?= base_url('donasi/sudahkonfirmasi') ?>">Sudah Terkonfirmasi</a></li>
          <!-- <li><a class="nav-link" href="#">Grafik</a></li> -->
          <li><a class="nav-link" href="<?= base_url('donasi/pengeluaran_donasi') ?>">Pengeluaran</a></li>
        </ul>
      </li>




      <li class="menu-header">Master Event</li>
      <li><a class="nav-link" href="<?= base_url('Acara') ?>"><i class="fas fa-pencil-ruler"></i> <span>Master Acara</span></a></li>
      <li><a class="nav-link" href="<?= base_url('Form') ?>"><i class="fas fa-pencil-ruler"></i> <span>Master Form</span></a></li>


      <li class="menu-header">Master Administrator</li>
      <li><a class="nav-link" href="<?= base_url('Admin/listadmin') ?>"><i class="fas fa-pencil-ruler"></i> <span>Master Admin</span></a></li>


      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-rocket"></i> Documentation
        </a>
      </div>
    </aside>
  </div>