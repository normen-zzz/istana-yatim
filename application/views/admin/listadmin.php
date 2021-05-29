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
            <h1>Admin</h1>
          </div>
          <div class="row">
            <div class="col">
              <button style="margin-bottom: 20px" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Tambah Admin</button>
              <div class="card">
                <div class="card-header">
                  <h4>List Admin</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-md" id="myTable">
                      <thead>
                        <tr>
                          <th>#</th>            
                          <th>Nama</th>
                          <th>Umur</th>
                          <th>Alamat</th>
                          <th>No Telp</th>
                          <th>Email</th>
                          <th>Foto</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php foreach ($admin as $a) { ?>
                          <tr>
                            <td><?= $a['id_pengurus'] ?></td>
                            <td><?= $a['nm_pengurus'] ?></td>
                            <td><?= intval(substr(date('Ymd') - date('Ymd', strtotime($a['tgllahir_pengurus'])), 0, -4)) ?></td>
                            <td><?= $a['alamat_pengurus'] ?></td>
                            <td><?= $a['no_telp'] ?></td>
                            <td><?= $a['email_pengurus'] ?></td>
                            <td><img style="width: 200px" src="<?= base_url('assets/images/admin/') . $a['foto_pengurus'] ?>"></td>
                            <td><!-- <a href="" class="btn btn-success">Ubah</a> --> <a href="<?= base_url('Admin/deleteadmin/'). $a['id_pengurus'] ?>" class="btn btn-danger" onclick="return confirm('kamu yakin akan menghapus  ?');">Hapus</a></td>

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







    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h5 class="modal-title text-center" id="exampleModalLabel">Tambah admin</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <?php echo form_open_multipart('Admin/adminregistrationAct'); ?>

           <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control">
            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
          </div>

          <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal" class="form-control">
            <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
          </div>

          <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control">
            <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
          </div>

          <div class="form-group">
            <label>no telp</label>
            <input type="number" name="nomor" class="form-control">
            <?= form_error('nomor', '<small class="text-danger">', '</small>'); ?>
          </div>

          <div class="form-group">
            <label>Foto</label>
            <input type="file" name="filefoto" class="form-control" required>

          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
          </div>

          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
          </div>

          <div class="form-group">
            <label>Retype Password</label>
            <input type="password" name="retype_password" id="retype_password" class="form-control">
            <?= form_error('retype_password', '<small class="text-danger">', '</small>'); ?>
          </div>

        </div>
        <div class="modal-footer">
          <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
          <button type="submit" class="btn btn-primary">Simpan</button>
          <?php echo form_close() ?>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- END MODAL -->

<?php $this->load->view('admin/template/footer') ?>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
  } );
</script>

<script type="text/javascript">
    $(window).on('load', function() {
        <?= $modal; ?>
    });
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




