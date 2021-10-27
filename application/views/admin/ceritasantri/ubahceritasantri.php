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
            <h1>ceritasantri</h1>
          </div>
          <div class="row">
              <div class="col">
                <div class="card">
                  <div class="card-header">
                    <h4>Ubah ceritasantri</h4>
                  </div>
                  
                  <div class="card-body">

                    <form method="POST" id="myForm" action="<?= base_url('Ceritasantri/ubahceritasantriAct') ?>" enctype="multipart/form-data">
                      <input type="number" name="id" value="<?= $ceritasantri['id_ceritasantri'] ?>" hidden>
                    <div class="form-group">
                      <label>Judul</label>
                      <input type="text" name="judul" value="<?= $ceritasantri['judul_ceritasantri'] ?>" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>isi</label>
                      <textarea id="ckeditor" name="ceritasantri" class="form-control"  ><?= $ceritasantri['isi_ceritasantri'] ?></textarea><br/>
                    </div>

                    <div class="form-group">
                      <label>Foto ceritasantri</label>
                      <img width="200px" style="margin-bottom: 5px" src="<?= base_url('assets/images/ceritasantri/'). $ceritasantri['img_ceritasantri'] ?>">
                      <input type="file" name="filefoto" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Jenis ceritasantri</label>
                      <input type="text" name="jenis" value="<?= $ceritasantri['jenis_ceritasantri'] ?>" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Penulis</label>
                      <input type="text" name="penulis" value="<?= $ceritasantri['penulis_ceritasantri'] ?>" class="form-control">
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1 tambah" type="submit">Ubah</button>
                    <!-- <button class="btn btn-secondary" type="reset">Reset</button> -->
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

  $('.tambah').click(function (e){
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