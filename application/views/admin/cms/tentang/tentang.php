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
            <h1>tentang</h1>
          </div>
          <div class="row">
              <div class="col">
               <!-- <button style="margin-bottom: 20px" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Tambah tentang</button> -->
                <div class="card">
                  <div class="card-header">
                    <h4>List tentang</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tr>
                          <th>#</th>
                          <th>Text</th>
                          <th>Gambar</th>
                          <th>Action</th>
                        </tr>
                        
                        <?php foreach ($tentang as $t) { ?>
                        <tr>
                          <td><?= $t['id_tentang'] ?></td>
                          <td><?= $t['text_tentang'] ?></td>
                          <td><img style="width: 200px" src="<?= base_url('assets/images/tentang/'). $t['img_tentang'] ?>"></td>
                          <td><a href="<?= base_url('Cms/ubahtentang/'). $t['id_tentang'] ?>" class="btn btn-success">Ubah</a> <a style="color: white" onclick="confir()"   class="btn btn-danger" >Hapus</a></td>
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
              window.location.href = "<?= base_url('Cms/deletetentang/') . $t['id_tentang'] ?>";
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
<script src="<?php echo base_url().'assets/ckeditor/ckeditor.js'?>"></script>
    <script type="text/javascript">
      $(function () {
        CKEDITOR.replace('ckeditor');
      });
    </script>


     <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">