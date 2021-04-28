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
            <h1>Bank</h1>
          </div>
          <div class="row">
              <div class="col">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah Bank</h4>
                  </div>
                  
                  <div class="card-body">

                    <form method="POST" id="myForm" action="<?= base_url('Cms/tambahbankAct') ?>" enctype="multipart/form-data">

                    <div class="form-group">
                      <label>Nama Bank</label>
                      <input type="" name="bank" class="form-control" required="">
                    </div>

                    <div class="form-group">
                      <label>Atas Nama</label>
                      <input type="" name="nama" class="form-control" required="">
                    </div>


                    <div class="form-group">
                      <label>No Rekening</label>
                      <input type="" name="norek" class="form-control">
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