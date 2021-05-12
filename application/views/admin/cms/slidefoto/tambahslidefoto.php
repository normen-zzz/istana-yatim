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
            <h1>Slide Foto</h1>
          </div>
          <div class="row">
              <div class="col">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah Slide Foto</h4>
                  </div>
                  
                  <div class="card-body">
                    <div class="alert alert-info">
                      <b>Perhatian!</b> Harap Masukan Foto Dengan Maksimal Ukuran 1,8MB.
                    </div>
                    <form method="POST" action="<?= base_url('cms/tambahslidefotoAct') ?>" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>File</label>
                      <input type="file" name="filefoto" class="form-control">
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