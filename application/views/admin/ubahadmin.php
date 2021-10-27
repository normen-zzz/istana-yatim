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
          <h1>admin</h1>
        </div>
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <h4>Ubah admin</h4>
              </div>

              <div class="card-body">

                <form method="POST" id="myForm" action="<?= base_url('admin/ubahadminAct') ?>" enctype="multipart/form-data">
                  <input type="number" name="id" value="<?= $admin['id_pengurus'] ?>" hidden>
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" value="<?= $admin['nm_pengurus'] ?>" class="form-control">
                  </div>


                  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal" value="<?= $admin['tgllahir_pengurus'] ?>" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" value="<?= $admin['alamat_pengurus'] ?>" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>No Telp</label>
                    <input type="text" name="nomor" value="<?= $admin['no_telp'] ?>" class="form-control">
                  </div>

                 
                  

                  <div class="form-group">
                    <label>Foto admin</label>
                    <img width="200px" style="margin-bottom: 5px" src="<?= base_url('assets/images/admin/'). $admin['foto_pengurus'] ?>">
                    <input type="file" name="filefoto" class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="<?= $admin['email_pengurus'] ?>" class="form-control">
                  </div>

                  

                  <div class="alert alert-info">
                      <b>Perhatian!</b> Kosongkan Password Jika Tidak Ingin Mengubah Password.
                    </div>

                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                  </div>


                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary mr-1 ubah"  type="submit">Ubah</button>
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