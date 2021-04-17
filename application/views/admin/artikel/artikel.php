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
            <h1>Artikel</h1>
          </div>
          <div class="row">
              <div class="col">
                <a style="margin-bottom: 20px" href="<?= base_url('Artikel/tambahartikel') ?>" class="btn btn-primary">Tambah Artikel</a>
                <div class="card">
                  <div class="card-header">
                    <h4>List Artikel</h4>
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
                          <th>Jenis Artikel</th>
                          <th>Penulis Artikel</th>
                          <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($artikel as $a) { ?>
                        <tr>
                          <td><?= $a['id_artikel'] ?></td>
                          <td><?= $a['judul_artikel'] ?></td>
                          <td><?= limit_words($a['isi_artikel'],15) ?> .........</td>
                          <td><img style="width: 200px" src="<?= base_url('assets/images/artikel/') . $a['img_artikel'] ?>"></td>
                          <td><?= $a['tgl_artikel'] ?></td>
                          <td><?= $a['jenis_artikel'] ?></td>
                          <td><?= $a['penulis_artikel'] ?></td>
                          <td><a href="#" class="btn btn-success">Ubah</a> <a href="<?= base_url('Artikel/deleteartikel/') . $a['id_artikel'] ?>" class="btn btn-danger">Hapus</a></td>
                          
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