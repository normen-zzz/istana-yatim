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
                    <form method="POST" id="myForm" action="<?= base_url('Cms/ubahslidefotoAct') ?>" enctype="multipart/form-data">
                      <input type="number" name="id" value="<?= $slidefoto['id_slidefoto'] ?>" hidden>
                    <div class="alert alert-info">
                      <b>Perhatian!</b> Harap Masukan Foto Resolusi bla bla bla.
                    </div>
                    <label>Foto Sebelumnya: </label>
                    <img style="width: 200px; margin-bottom: 20px;" src="<?= base_url('assets/images/slidefoto/'). $slidefoto['img_slidefoto'] ?>">
                    <div class="form-group">

                      <label>File</label>
                      <input type="file" name="filefoto" class="form-control" required>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <a href="<?= base_url('Cms') ?>" class="btn btn-secondary" type="reset">Cancel</a>
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    
                  </div>
                </div>
              </div>
            </div>
        </section>
      </div>
      
  </div>

  <?php $this->load->view('admin/template/footer') ?>
  