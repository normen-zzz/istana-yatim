<?php $this->load->view('admin/template/header') ?>
<?php $this->load->view('admin/template/topbar') ?>

<body>
  <div id="app">
    <div class="main-wrapper">
      
     <?php $this->load->view('admin/template/sidebar') ?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Menu</h1>
          </div>
          <div class="row">
              <div class="col">
                <div class="card">
                  <div class="card-header">
                    <h4>Ubah Menu</h4>
                  </div>
                  
                  <div class="card-body">
                    <form method="POST" id="myForm" action="<?= base_url('Cms/ubahmenuAct') ?>" enctype="multipart/form-data">
                    <input type="number" name="id" value="<?= $menu['id_menu'] ?>" hidden>
                    <div class="form-group">
                      <label>Judul</label>
                      <input type="text" name="judul_menu" class="form-control" value="<?= $menu['judul_menu'] ?>">
                    </div>

                    <div class="form-group">
                      <label>Text</label>
                      <input type="text" name="text_menu" class="form-control" value="<?= $menu['text_menu'] ?>">
                    </div>

                    <div class="form-group">
                      <label>Tombol</label>
                      <input type="text" name="tombol_menu" class="form-control" value="<?= $menu['tombol_menu'] ?>">
                    </div>

                    <div class="alert alert-info">
                      <b>Perhatian!</b> Harap Masukan Foto Resolusi bla bla bla.
                    </div>
                    <div class="form-group">
                      <label>Logo</label>
                      <img width="200px" style="margin-bottom: 5px" src="<?= base_url('assets/images/menu/'). $menu['img_menu'] ?>">
                      <input type="file" name="filefoto" class="form-control">
                    </div>
                  </div>

                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1 ubah"  type="submit">Ubah</button>
                    <!-- <button class="btn btn-secondary" type="reset">Reset</button> -->
                  </div>
                </div>
              </div>
            </div>
        </section>
      </div>
      
  </div>

  <?php $this->load->view('admin/template/footer') ?>