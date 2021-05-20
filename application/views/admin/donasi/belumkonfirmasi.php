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

       <?php 

        function rupiah($angka){
  
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
 
        }

        ?>
      
      <?php $this->load->view('admin/template/sidebar') ?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Donasi</h1>
          </div>
          <div class="row">
            <div class="col">
              <button style="margin-bottom: 20px" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Tambah Donasi</button>
              <div class="card">
                <div class="card-header">
                  <h4>List Donasi Belum Terkonfirmasi</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-md" id="myTable">
                      <thead>
                        <tr>
                          <th>#</th>
                                     
                          <th>Tanggal Donasi</th>
                          <th>Nama</th>
                          <th>NO WA</th>
                          <th>Jumlah</th>
                          <th>Bank</th>
                          <th>Bukti Donasi</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php foreach ($donasi as $d) { ?>
                          <tr>
                            <td><?= $d['id_donasi'] ?></td>
                            <td><?= date('d-m-Y H:i:s', strtotime($d['tanggal'])) ?></td>
                            <td><?= $d['nama'] ?></td>
                            <td><?= $d['nowa'] ?></td>
                            <td><?= rupiah($d['jumlah']) ?></td>
                            <td><?= $d['bank'] ?></td>
                            <td><a href="" onclick="window.open('<?= base_url('assets/images/donasi/') . $d['bukti'] ?>','targetWindow', 'toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1090px, height=550px, top=25px left=120px'); return false;"><img style="width: 200px" src="<?= base_url('assets/images/donasi/') . $d['bukti'] ?>"></a> </td>
                            <!-- <td><img style="width: 200px" src="<?= base_url('assets/images/donasi/') . $d['bukti'] ?>"></td> -->
                            <td> <a href="<?= base_url('Donasi/konfirmasi/'). $d['id_donasi'] ?>" class="btn btn-success" onclick="return confirm('kamu yakin akan Konfirmasi Donasi  ?');">Konfirmasi</a> <a href="<?= base_url('Donasi/deletedonasi/') . $d['id_donasi'] ?>" class="btn btn-danger" onclick="return confirm('kamu yakin akan menghapus  ?');">Hapus</a>   </td>

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
              <h5 class="modal-title text-center" id="exampleModalLabel">Tambah DONASI</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <?php echo form_open_multipart('cms/tambahdonasiAct'); ?>
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
              <select name ="bank" class="form-control">
                <option selected>Pilih Bank</option>
                <?php foreach ($bank as $b) { ?>
                  <option value="<?= $b['id_bank'] ?>"><?= $b['bank'] ?> <?= $b['norek'] ?> A/n <?= $b['nama'] ?></option>
                <?php } ?>
              </select>

            </div>



                    <div class="form-group">
                      <label>Bukti Donasi</label>
                      <input type="file" name="filebukti" class="form-control">
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


  <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php if ($this->session->flashdata('success-konfirmasi')): ?>
  <script>
    swal({
      icon: 'success',
      title: 'Anda berhasil Konfirmasi',
      text: 'Anda Berhasil Melakukan Konfirmasi Donasi',
      showConfirmButton: false,
      timer: 2500
    })
  </script>
<?php endif;?>

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
              window.location.href = "<?= base_url('Donasi/deletedonasi/') . $d['id_donasi'] ?>";
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



