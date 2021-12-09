 <div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?= base_url('Admin') ?>">Sipena</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="<?= base_url('Admin') ?>">Sp</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Master CMS</li>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Master Cms</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="<?= base_url('admin/cms') ?>">Slide Foto</a></li>
          <!-- <li><a class="nav-link" href="<?= base_url('admin/cms/donasi') ?>">Donasi</a></li> -->
          <li><a class="nav-link" href="<?= base_url('admin/cms/bank') ?>">Bank</a></li>
           <li><a class="nav-link" href="<?= base_url('admin/cms/youtube') ?>">Youtube</a></li>
           <li><a class="nav-link" href="<?= base_url('admin/cms/tentang') ?>">Tentang</a></li>
          <li><a class="nav-link" href="<?= base_url('admin/cms/footer') ?>">Footer</a></li>
        </ul>
      </li>

     


      <li class="menu-header">Master Artikel</li>
       <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-columns"></i><span>Master Artikel</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="<?= base_url('admin/berkah') ?>">Berkah</a></li>
          <li><a class="nav-link" href="<?= base_url('admin/ceritasantri') ?>">Cerita Santri</a></li>
        </ul>
      </li>

      <li class="menu-header">Master Donasi</li>
       <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Master Donasi</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="<?= base_url('admin/donasi/belumkonfirmasi') ?>">Belum Terkonfirmasi</a></li>
          <li><a class="nav-link" href="<?= base_url('admin/donasi/sudahkonfirmasi') ?>">Sudah Terkonfirmasi</a></li>
          <!-- <li><a class="nav-link" href="#">Grafik</a></li> -->
          <li><a class="nav-link" href="<?= base_url('admin/donasi/pengeluaran_donasi') ?>">Pengeluaran</a></li>

        </ul>
      </li>




      <li class="menu-header">Master Event</li>
      <li><a class="nav-link" href="<?= base_url('admin/acara') ?>"><i class="fas fa-pencil-ruler"></i> <span>Master Acara</span></a></li>
      <!-- <li><a class="nav-link" href="<?= base_url('admin/form') ?>"><i class="fas fa-pencil-ruler"></i> <span>Master Form Acara</span></a></li> -->

      <li class="menu-header">Master Form</li>
      <li><a class="nav-link" href="<?= base_url('admin/form') ?>"><i class="fas fa-pencil-ruler"></i> <span>Master Form Acara</span></a></li>
      <li><a class="nav-link" href="<?= base_url('admin/form/formdonasi') ?>"><i class="fas fa-pencil-ruler"></i> <span>Master Form Donasi</span></a></li>
      <li><a class="nav-link" href="<?= base_url('admin/form/formall') ?>"><i class="fas fa-pencil-ruler"></i> <span>Master All Form</span></a></li>



      <li class="menu-header">Master Administrator</li>
      <li><a class="nav-link" href="<?= base_url('admin/admin/listadmin') ?>"><i class="fas fa-pencil-ruler"></i> <span>Master Admin</span></a></li>


      
    </aside>
  </div>