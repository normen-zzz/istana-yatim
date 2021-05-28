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
            <h1>Berkah</h1>
          </div>
          <div class="row">
            <div class="col">
              <a style="margin-bottom: 20px" href="<?= base_url('berkah/tambahberkah') ?>" class="btn btn-primary">Tambah berkah</a>
              <div class="card">
                <div class="card-header">
                  <h4>List Berkah</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-md" id="myTable">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Judul</th>
                          <th>isi</th>
                          <th>Foto</th>
                          <th>Tanggal Dibuat</th>
                          <th>Jenis berkah</th>
                          <th>Penulis berkah</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php foreach ($berkah as $b) { ?>
                          <tr>
                            <td><?= $b['id_berkah'] ?></td>
                            <td><?= $b['judul_berkah'] ?></td>
                            <td><?= limit_words($b['isi_berkah'],15) ?> .........</td>
                            <td><img style="width: 200px" src="<?= base_url('assets/images/berkah/') . $b['img_berkah'] ?>"></td>
                            <td><?= strftime("%A | %d %h %Y %T", strtotime($b['tgl_berkah'])) ?></td>
                            <td><?= $b['jenis_berkah'] ?></td>
                            <td><?= $b['penulis_berkah'] ?></td>
                            <td><a href="<?= base_url('berkah/ubahberkah/'). $b['slug_berkah'] ?>" class="btn btn-success">Ubah</a> <a style="color: white" onclick="confir()"   class="btn btn-danger" >Hapus</a></td>

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
      title: "Hapus berkah Ini?",
      text: "Data Tidak bisa kembali jika sudah dihapus",
      icon: "warning",
      buttons: true,
      dangerMode: "true",
    })
    .then((willDelete) => {
      if (willDelete) {
        swal({ title: "Hapus berkah Berhasil",
          icon: "success"}).then(okay => {
            if (okay) {
              window.location.href = "<?= base_url('berkah/deleteberkah/') . $b['slug_berkah'] ?>";
            }
          });

        } else {
          swal({
            title: "berkah Tidak Terhapus",
            icon: "error",

          });
        }
      });
  }
</script>

