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
            <h1>Footer</h1>
          </div>
          <div class="row">
              <div class="col">
                <div class="card">
                  <div class="card-header">
                    <h4>Ubah Footer</h4>
                  </div>
                  
                  <div class="card-body">

                    <form method="POST" id="myForm" action="<?= base_url('Cms/ubahfooterAct') ?>" enctype="multipart/form-data">
                      <input type="number" name="id" value="<?= $footer['id_footer'] ?>" hidden>
                    <div class="form-group">
                    <div class="form-group">
                      <label>Link Facebook</label>
                      <input type="text" name="link_facebook" class="form-control" value="<?= $footer['link_facebook'] ?>">
                    </div>

                    <div class="form-group">
                      <label>Link Twiiter</label>
                      <input type="text" name="link_twitter" class="form-control" value="<?= $footer['link_twitter'] ?>">
                    </div>

                    <div class="form-group">
                      <label>Link Instagramr</label>
                      <input type="text" name="link_instagram" class="form-control" value="<?= $footer['link_instagram'] ?>">
                    </div>

                    <div class="form-group">
                      <label>Copyright</label>
                      <input type="text" name="text_copyright" class="form-control" value="<?= $footer['text_copyright'] ?>">
                    </div>


                    
                    
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
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