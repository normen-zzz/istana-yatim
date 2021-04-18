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
            <h1>Footer</h1>
          </div>
          <div class="row">
              <div class="col">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah Footer</h4>
                  </div>
                  
                  <div class="card-body">

                    <form method="POST" action="<?= base_url('cms/tambahmenuAct') ?>" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Judul</label>
                      <input type="text" name="judul" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Text</label>
                      <input type="text" name="text" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Text Tombol</label>
                      <input type="text" name="tombol" class="form-control">
                    </div>

                    <div class="alert alert-info">
                      <b>Perhatian!</b> Harap Masukan Foto Resolusi bla bla bla.
                    </div>
                    <div class="form-group">
                      <label>Logo</label>
                      <input type="file" name="filelogo" class="form-control">
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <!-- <button class="btn btn-secondary" type="reset">Reset</button> -->
                  </div>
                </form>
                </div>
              </div>
            </div>
        </section>
      </div>
      
  </div>

  <?php $this->load->view('admin/template/footer') ?>