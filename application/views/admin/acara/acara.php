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
            <h1>Acara</h1>
          </div>
          <div class="row">
              <div class="col">
               <button style="margin-bottom: 20px" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Tambah Acara</button>
                <div class="card">
                  <div class="card-header">
                    <h4>List Acara</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tr>
                          <th>#</th>
                          <th>Nama</th>
                          <th>Tema</th>
                          <th>Tanggal</th>
                          <td>Slug</td>
                          <th>Poster</th>
                          <th>Action</th>
                        </tr>
                        
                        <?php foreach ($acara as $a) { ?>
                        <tr>
                          <td><?= $a['id_acara'] ?></td>
                          <td><?= $a['nama_acara'] ?></td>
                          <td><?= $a['tema_acara'] ?></td>
                          <td><?= strftime("%A | %d %B %Y %T", strtotime($a['tgl_acara'])) ?></td>
                          <td><?= $a['slug_acara'] ?></td>
                          <td><img style="width: 200px" src="<?= base_url('assets/images/acara/'). $a['img_acara'] ?>"></td>
                          <td><a href="<?= base_url('Form/tampilform/'). $a['id_acara'] ?>" class="btn btn-primary">Form</a> <a href="<?= base_url('acara/ubahacara/'). $a['id_acara'] ?>" class="btn btn-success">Ubah</a> <a style="color: white" onclick="confir()"   class="btn btn-danger" >Hapus</a></td>
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
              <h5 class="modal-title text-center" id="exampleModalLabel">Tambah Acara</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <?php echo form_open_multipart('Acara/tambahacaraAct'); ?>

              <div class="form-group">
                      <label>Nama Acara</label>
                      <input type="text" name="nama" class="form-control">
                    </div>

                   <div class="form-group">
                      <label>Tanggal dan Waktu</label>
                      <input type="datetime-local" name="date" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Tema</label>
                      <input type="text" name="tema" class="form-control">
                    </div>

             <div class="form-group">
                      <label>Poster</label>
                      <input type="file" name="fileposter" class="form-control">
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
  <!-- END MODAL -->



  <?php $this->load->view('admin/template/footer') ?>

  <script type="text/javascript">
  function confir(){
    swal({
      title: "Hapus Data Ini?",
      text: "Data Tidak bisa kembali jika sudah dihapus",
      icon: "warning",
      buttons: true,
      dangerMode: "true",
    })
    .then((willDelete) => {
      if (willDelete) {
        swal({ title: "Hapus Data Berhasil",
          icon: "success"}).then(okay => {
            if (okay) {
              window.location.href = "<?= base_url('Acara/deleteacara/') . $a['id_acara'] ?>";
            }
          });

        } else {
          swal({
            title: "Data Tidak Terhapus",
            icon: "error",

          });
        }
      });
  }
</script>