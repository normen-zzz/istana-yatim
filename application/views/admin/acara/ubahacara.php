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
            <h1>acara</h1>
          </div>
          <div class="row">
              <div class="col">
                <div class="card">
                  <div class="card-header">
                    <h4>Ubah acara</h4>
                  </div>
                  
                  <div class="card-body">

                    <form method="POST" id="myForm" action="<?= base_url('acara/ubahacaraAct') ?>" enctype="multipart/form-data">
                      <input type="number" name="id" value="<?= $acara['id_acara'] ?>" hidden>
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="nama" value="<?= $acara['nama_acara'] ?>" class="form-control">
                    </div>


                     <div class="form-group">
                      <label>Tema</label>
                      <input type="text" name="tema" value="<?= $acara['tema_acara'] ?>" class="form-control">
                    </div>


                     <div class="form-group">
                      <label>Tanggal dan Waktu</label>
                      <input type="datetime-local" name="date" value="<?= date('Y-m-d\TH:i:s', strtotime($acara['tgl_acara'])) ?>" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Foto Acara</label>
                      <img width="200px" style="margin-bottom: 5px" src="<?= base_url('assets/images/acara/'). $acara['img_acara'] ?>">
                      <input type="file" name="fileposter" class="form-control">
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