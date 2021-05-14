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
            <h1>Form</h1>
          </div>
          <div class="row">
              <div class="col">
                <a onclick="return confirm('Apakah Anda Yakin Ingin Mengirim Pemberitahuan..?')" style="margin-bottom: 20px" href="<?= base_url('Form/pemberitahuan') ?>" class="btn btn-primary">Kirim Pemberitahuan</a>
                <div class="card">
                  <div class="card-header">
                    <h4>List All Form</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tr>
                          <th>#</th>
                          <th>Nama</th>
                          <th>Nomor</th>
                          <th>Jenis Kelamin</th>
                          <th>Action</th>
                        </tr>
                        
                        <?php foreach ($form as $f) { ?>
                        <tr>
                          <td><?= $f['id_form'] ?></td>
                          <td><?= $f['nama_form'] ?></td>
                          <td><?= $f['nomor_form'] ?></td>
                          <td><?= $f['kelamin_form'] ?></td>
                          <td> <a href="" class="btn btn-success">Ubah</a> <a style="color: white" onclick="confir()"   class="btn btn-danger" >Hapus</a></td>
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
              window.location.href = "<?= base_url('Form/deleteform/') . $f['id_form'] ?>";
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