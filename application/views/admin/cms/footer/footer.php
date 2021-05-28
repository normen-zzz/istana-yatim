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
                    <h4>List</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tr>
                          <th>#</th>
                          <th>Facebook</th>
                          <th>Twitter</th>
                          <th>Instagram</th>
                          <th>Copyright</th>
                          <th>Action</th>
                        </tr>
                      <?php foreach ($footer as $f) { ?>
                        <tr>
                          <td><?= $f['id_footer'] ?></td>
                          <td><?= $f['link_facebook'] ?></td>
                          <td><?= $f['link_twitter'] ?></td>
                          <td><?= $f['link_instagram'] ?></td>
                          <td><?= $f['text_copyright'] ?></td>
                          <td><a href="<?= base_url('Cms/ubahfooter/').$f['id_footer'] ?>" class="btn btn-success">Ubah</a></td>
                          
                        </tr>
                      <?php } ?> 
                        
                      </table>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <nav class="d-inline-block">
                      <ul class="pagination mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
        </section>
      </div>
      
  </div>


  

  <?php $this->load->view('admin/template/footer') ?>