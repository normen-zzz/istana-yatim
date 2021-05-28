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
                <button style="margin-bottom: 20px" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Tambah Slide Foto</button>
                <div class="card">
                  <div class="card-header">
                    <h4>List Slide Foto</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tr>
                          <th>#</th>
                          <th>Dibuat Tanggal</th>
                          <th>Foto</th>
                          <th>Action</th>
                        </tr>
                        <?php foreach ($slidefoto as $s) {?>
                        <tr>
                          <td><?= $s['id_slidefoto'] ?></td>
                          <td><?= strftime("%A | %d %h %Y %T", strtotime($s['tgl_slidefoto'])) ?></td>
                          <td><img style="width: 200px" src="<?= base_url('assets/images/slidefoto/') . $s['img_slidefoto'] ?>"></td>
                          <td><a href="<?= base_url('Cms/ubahslidefoto/') . $s['id_slidefoto'] ?>" class="btn btn-success">Ubah</a> <a href="<?= base_url('Cms/deleteslidefoto/') . $s['id_slidefoto'] ?>" class="btn btn-danger" onclick="return confirm('kamu yakin akan menghapus  ?');">Hapus</a></td>
                          
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


   <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h5 class="modal-title text-center" id="exampleModalLabel">Tambah Slide Foto</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <?php echo form_open_multipart('cms/tambahslidefotoAct'); ?>
             <div class="alert alert-info">
                      <b>Perhatian!</b> Harap Masukan Foto Dengan Maksimal Ukuran 1,8MB.
                    </div>
             <div class="form-group">
                      <label>File</label>
                      <input type="file" name="filefoto" class="form-control" required>
                    </div>


          </div>
          <div class="modal-footer">
            <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            <button type="submit" class="btn btn-primary">Simpan</button>
            <?php echo form_close() ?>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php $this->load->view('admin/template/footer') ?>