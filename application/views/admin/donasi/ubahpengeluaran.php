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
            <h1>Pengeluaran</h1>
          </div>
          <div class="row">
              <div class="col">
                <div class="card">
                  <div class="card-header">
                    <h4>Ubah Pengeluaran</h4>
                  </div>
                  
                  <div class="card-body">

                    <form method="POST" id="myForm" action="<?= base_url('donasi/ubahpengeluaranAct') ?>" enctype="multipart/form-data">
                      <input type="number" name="id" value="<?= $pengeluaran['id_pengeluaran'] ?>" hidden>
                    <div class="form-group">
                      <label>Judul Pengeluaran</label>
                      <input type="text" name="judul" value="<?= $pengeluaran['judul_pengeluaran'] ?>" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>Jumlah Pengeluaran</label>
                      <input type="text" name="jumlah" value="<?= $pengeluaran['jumlah_pengeluaran'] ?>" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>Foto pengeluaran</label>
                      <img width="200px" style="margin-bottom: 5px" src="<?= base_url('assets/images/pengeluarandonasi/'). $pengeluaran['img_pengeluaran'] ?>" required>
                      <input type="file" name="filefoto" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Keterangan</label>
                      <input type="text" name="keterangan" value="<?= $pengeluaran['ket'] ?>" class="form-control" required>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <a href="<?= base_url('pengeluaran') ?>" class="btn btn-secondary">Cancel</a>
                    <button class="btn btn-primary mr-1 ubah"  type="submit">Ubah</button>
                    
                  </div>
                </form>
                </div>
              </div>
            </div>
        </section>
      </div>
      
  </div>

  <?php $this->load->view('admin/template/footer') ?>
  <script src="<?php echo base_url().'assets/ckeditor/ckeditor.js'?>"></script>
    <script type="text/javascript">
      $(function () {
        CKEDITOR.replace('ckeditor');
      });
    </script>

   <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">

  $('.ubah').click(function (e){
    e.preventDefault();
    let form = $(this).parents('form');
    swal({
        title: 'Apakah Anda yakin?',
        text: 'Sebelum submit pastikan data sudah terisi dan terisi dengan benar',
        icon: 'warning',
        buttons: ["Batal", "Submit!"],
    }).then(function(value) {
        if(value){
            $('#myForm').submit();
        }
    });
});
</script>