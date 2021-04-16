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
                    <h4>Ubah Slide Foto</h4>
                  </div>
                  
                  <div class="card-body">
                    <div class="alert alert-info">
                      <b>Perhatian!</b> Harap Masukan Foto Resolusi bla bla bla.
                    </div>
                    <label>Foto Sebelumnya: </label>
                    <img style="width: 200px; margin-bottom: 20px;" src="<?= base_url('assets/user/') ?>img/building.jpg">
                    <div class="form-group">

                      <label>File</label>
                      <input type="file" class="form-control">
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                </div>
              </div>
            </div>
        </section>
      </div>
      
  </div>

  <?php $this->load->view('admin/template/footer') ?>