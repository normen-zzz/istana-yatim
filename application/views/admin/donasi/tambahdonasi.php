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
            <h1>Donasi</h1>
          </div>
          <div class="row">
              <div class="col">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah Donasi</h4>
                  </div>
                  
                  <div class="card-body">

                    <form method="POST" id="myForm" action="<?= base_url('Cms/tambahdonasiAct') ?>" enctype="multipart/form-data">

                    <div class="form-group">
                      <label>Nama</label>
                      <input type="" name="nama" class="form-control" required="">
                    </div>

                    <div class="form-group">
                      <label>No Wa</label>
                      <input type="" name="nowa" class="form-control" required="">
                    </div>


                    <div class="form-group">
                      <label>Jumlah</label>
                      <input type="" name="jumlah" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Bank</label>
                      <select name ="" class="form-control" aria-label="">
                        <option selected>Pilih Bank</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                      
                    </div>



                    <div class="form-group">
                      <label>Bukti Donasi</label>
                      <input type="file" name="filebukti" class="form-control">
                    </div>

                    
                   
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1 tambah"  type="submit">Tambah</button>
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