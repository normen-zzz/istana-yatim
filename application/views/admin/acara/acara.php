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
                <a style="margin-bottom: 20px" href="<?= base_url('Acara/tambahacara') ?>" class="btn btn-primary">Tambah Acara</a>
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
                          <th>Poster</th>
                          <th>Action</th>
                        </tr>
                        
                        <?php foreach ($acara as $a) { ?>
                        <tr>
                          <td><?= $a['id_acara'] ?></td>
                          <td><?= $a['nama_acara'] ?></td>
                          <td><?= $a['tema_acara'] ?></td>
                          <td><?= $a['tgl_acara'] ?></td>
                          <td><img src="<?= base_url('assets/images/acara/'). $a['img_acara'] ?>"></td>
                          <td><a href="<?= base_url('Form/tampilform/'). $a['id_acara'] ?>" class="btn btn-primary">Form</a> <a href="" class="btn btn-success">Ubah</a> <a style="color: white" onclick="confir()"   class="btn btn-danger" >Hapus</a></td>
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