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
            <h1>Pengeluaran Donasi</h1>
          </div>
          <div class="row">
              <div class="col">
                <a style="margin-bottom: 20px" href="<?= base_url('Donasi/tambahpengeluaran') ?>" class="btn btn-primary">Tambah Pengeluaran</a>
                <div class="card">
                  <div class="card-header">
                    <h4>List Pengeluaran</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md" id="myTable">
                        <thead>
                        <tr>
                          <th>#</th>
                          <th>Tanggal Dibuat</th>
                          <th>Judul Pengeluaran</th>
                          <th>Jumlah Pengeluaran</th>
                          <th>Ket</th>
                          <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($pengeluaran as $p) { ?>
                        <tr>
                          <td><?= $p['id_pengeluaran'] ?></td>
                          <td><?= $p['tanggal'] ?></td>
                          <td><?= $p['judul_pengeluaran'] ?></td>
                          <td><?= $p['jumlah_pengeluaran'] ?></td>
                          <td><?= limit_words($p['ket'],15) ?> .........</td>
                          

                          
                          <td><a style="margin-bottom: 5px" href="<?= base_url('Ceritasantri/ubahceritasantri/') . $p['id_pengeluaran'] ?>" class="btn btn-success">Ubah</a> <a style="color: white" onclick="confir()" class="btn btn-danger">Hapus</a></td>

                          
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
      title: "Hapus Cerita Santri?",
      text: "Data Tidak bisa kembali jika sudah dihapus",
      icon: "warning",
      buttons: true,
      dangerMode: "true",
    })
    .then((willDelete) => {
      if (willDelete) {
        swal({ title: "Hapus Cerita Santri Berhasil",
          icon: "success"}).then(okay => {
            if (okay) {
              window.location.href = "<?= base_url('Ceritasantri/deleteceritasantri/') . $c['slug_ceritasantri'] ?>";
            }
          });

        } else {
          swal({
            title: "Cerita Santri Tidak Terhapus",
            icon: "error",

          });
        }
      });
  }
</script>