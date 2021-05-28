<?php $this->load->view('admin/template/header') ?>

<?php $this->load->view('admin/template/sidebar') ?>
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
                  <h4>List Donasi Sudah Terkonfirmasi</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table border="0" cellspacing="5" cellpadding="5">
                      <tbody><tr>
                        <td>Minimum date:</td>
                        <td><input type="text" id="min" name="min"></td>
                      </tr>
                      <tr>
                        <td>Maximum date:</td>
                        <td><input type="text" id="max" name="max"></td>
                      </tr>
                    </tbody></table>
                    <table class="table table-bordered table-md" id="myTable">
                      <thead>
                        <tr>
                          <th>#</th>
                          
                          <th>Tanggal Donasi</th>
                          <th>Nama</th>
                          <th>NO WA</th>
                          <th>Jumlah</th>
                          <th>Bank</th>
                          <th class='notexport'>Bukti Donasi</th>
                          <th class='notexport'>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php foreach ($donasi as $d) { ?>
                          <tr>
                            <td><?= $d['id_donasi'] ?></td>
                            <td><?= date('d-M-Y', strtotime($d['tanggal'])) ?></td>
                            <td><?= $d['nama'] ?></td>
                            <td><?= $d['nowa'] ?></td>
                            <td><?= rupiah($d['jumlah']) ?></td>
                            <td><?= $d['bank'] ?></td>
                            <td><a href="" onclick="window.open('<?= base_url('assets/images/donasi/') . $d['bukti'] ?>','targetWindow', 'toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1090px, height=550px, top=25px left=120px'); return false;"><img style="width: 200px" src="<?= base_url('assets/images/donasi/') . $d['bukti'] ?>"></a> </td>
                            <!-- <td><img style="width: 200px" src="<?= base_url('assets/images/donasi/') . $d['bukti'] ?>"></td> -->
                            <td> <a href="<?= base_url('Donasi/konfirmasi/'). $d['id_donasi'] ?>" class="btn btn-success">Konfirmasi</a> <a href="<?= base_url('Donasi/deletedonasi/') . $d['id_donasi'] ?>" class="btn btn-danger" onclick="return confirm('kamu yakin akan menghapus  ?');">Hapus</a>   </td>

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
           <?php echo form_open_multipart('donasi/tambahdonasiAct'); ?>
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

<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/datetime/1.0.3/js/dataTables.dateTime.min.js"></script>



<script type="text/javascript">
  $(document).ready(function() {
    $('#myTable').DataTable( {
      dom: 'Bfrtip',
      buttons: [
      {
        extend: 'excel',
        text: 'excel',
        className: 'btn btn-primary',
        exportOptions: {
          columns: ':not(.notexport)'
        }
      },

      {
        extend: 'pdf',
        text: 'pdf',
        className: 'btn btn-primary',
        exportOptions: {
          columns: ':not(.notexport)'
        }
      },

      {
        extend: 'csv',
        text: 'csv',
        className: 'btn btn-primary',
        exportOptions: {
          columns: ':not(.notexport)'
        }
      }




      ]

    } );
  } );
</script>

<script type="text/javascript">
  var minDate, maxDate;
  
// Custom filtering function which will search data in column four between two values
$.fn.dataTable.ext.search.push(
  function( settings, data, dataIndex ) {
    var min = minDate.val();
    var max = maxDate.val();
    var date = new Date( data[1] );
    
    if (
      ( min === null && max === null ) ||
      ( min === null && date <= max ) ||
      ( min <= date   && max === null ) ||
      ( min <= date   && date <= max )
      ) {
      return true;
  }
  return false;
}
);

$(document).ready(function() {
    // Create date inputs
    minDate = new DateTime($('#min'), {
      format: 'D MMM YYYY'
    });
    maxDate = new DateTime($('#max'), {
      format: 'D MMM YYYY'
    });
    
    // DataTables initialisation
    var table = $('#myTable').DataTable();
    
    // Refilter the table
    $('#min, #max').on('change', function () {
      table.draw();
    });
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


