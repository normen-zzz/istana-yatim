 <div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">Sipena</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">Sp</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">CMS</li>
      <li class="nav-item dropdown active">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Index</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="<?= base_url('Cms') ?>">Slide Foto</a></li>
          <li><a class="nav-link" href="<?= base_url('Cms/menu') ?>">Menu</a></li>
          <li><a class="nav-link" href="index.html">Donasi</a></li>
          <li><a class="nav-link" href="<?= base_url('Cms/footer') ?>">Footer</a></li>
        </ul>
      </li>

      <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Artikel</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= base_url('Artikel') ?>">Artikel</a></li>
                  <li><a class="nav-link" href="<?= base_url('Ceritasantri') ?>">Cerita Santri</a></li>
                </ul>
              </li>


      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-rocket"></i> Documentation
        </a>
      </div>
    </aside>
  </div>