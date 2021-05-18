<?php $this->load->view('admin/template/header') ?>

<?php $this->load->view('admin/template/topbar') ?>

<body>
  <div id="app">
    <div class="main-wrapper">

      <?php
      function limit_words($string, $word_limit){
        $words = explode(" "  ,$string);
        return implode(" ",array_splice($words,0,$word_limit));
      } ?>
      
      <?php $this->load->view('admin/template/sidebar') ?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Bank</h1>
          </div>
          <div class="row">
            <div class="col">
              <a style="margin-bottom: 20px" href="<?= base_url('Cms/tambahbank') ?>" class="btn btn-primary">Tambah Bank</a>
              <div class="card">
                <div class="card-header">
                  <h4>List Bank</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-md" id="myTable">
                      <thead>
                        <tr>
                          <th>#</th>
                                     
                          <th>Nama Bank</th>
                          <th>Atas Nama</th>
                          <th>No Rekening</th>
                          <th>Action</th>
                        
                        </tr>
                      </thead>

                      <tbody>
                        <?php foreach ($bank as $b) { ?>
                          <tr>
                            <td><?= $b['id_bank'] ?></td>
                            <td><?= $b['bank'] ?></td>
                            <td><?= $b['nama_bank'] ?></td>
                            <td><?= $b['norek'] ?></td>
                            
                            <!--<td><img style="width: 200px" src="<?= base_url('assets/images/donasi/') . $d['bukti'] ?>"></td> -->
                            <td><a href="<?= base_url('Cms/ubahbank/'). $b['id_bank'] ?>" class="btn btn-success">Ubah</a> <a href="<?= base_url('Cms/deletebank/') . $b['id_bank'] ?>" class="btn btn-danger" onclick="return confirm('kamu yakin akan menghapus  ?');">Hapus</a></td>

              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>
</div>
</section>
</div>

</div>

<?php $this->load->view('admin/template/footer') ?>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
  } );
</script>

<script type="text/javascript">
  function confir(){
    swal({
      title: "Hapus Data Donasi?",
      text: "Data Tidak bisa kembali jika sudah dihapus",
      icon: "warning",
      buttons: true,
      dangerMode: "true",
    })
    .then((willDelete) => {
      if (willDelete) {
        swal({ title: "Hapus Donasi Berhasil",
          icon: "success"}).then(okay => {
            if (okay) {
              window.location.href = "<?= base_url('Cms/deletedonasi/') . $d['id_donasi'] ?>";
            }
          });

        } else {
          swal({
            title: "Donasi Tidak Terhapus",
            icon: "error",

          });
        }
      });
  }
</script>

