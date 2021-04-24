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
                <a style="margin-bottom: 20px" href="<?= base_url('cms/tambahslidefoto') ?>" class="btn btn-primary">Tambah Slide Foto</a>
                <div class="card">
                  <div class="card-header">
                    <h4>List Slide Foto</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tr>
                          <th>#</th>
                          <th>Created At</th>
                          <th>Foto</th>
                          <th>Action</th>
                        </tr>
                        <?php foreach ($slidefoto as $s) {?>
                        <tr>
                          <td><?= $s['id_slidefoto'] ?></td>
                          <td><?= $s['tgl_slidefoto'] ?></td>
                          <td><img style="width: 200px" src="<?= base_url('assets/images/slidefoto/') . $s['img_slidefoto'] ?>"></td>
                          <td><a href="#" class="btn btn-success">Ubah</a> <a href="<?= base_url('Cms/deleteslidefoto/') . $s['id_slidefoto'] ?>" class="btn btn-danger" onclick="return confirm('kamu yakin akan menghapus  ?');">Hapus</a></td>
                          
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