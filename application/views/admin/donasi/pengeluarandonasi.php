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
                          <th>Tanggal Dibuat</th>
                          <th>Judul Pengeluaran</th>
                          <th>Jumlah Pengeluaran</th>
                          <th class='notexport'>Foto</th>
                          <th>Ket</th>
                          <th class='notexport'>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($pengeluaran as $p) { ?>
                        <tr>
                          <td><?= $p['id_pengeluaran'] ?></td>
                          <td><?= date('d-M-Y', strtotime($p['tanggal_pengeluaran'])) ?></td>
                          <td><?= $p['judul_pengeluaran'] ?></td>
                          <td><?= rupiah($p['jumlah_pengeluaran']) ?></td>
                          <td><img width="200px" src="<?= base_url('assets/images/pengeluarandonasi/'). $p['img_pengeluaran'] ?>"></td>
                          <td><?= limit_words($p['ket'],15) ?> .........</td>
                          

                          
                          <td><a style="margin-bottom: 5px" href="<?= base_url('Donasi/ubahpengeluaran/') . $p['id_pengeluaran'] ?>" class="btn btn-success">Ubah</a> <a style="color: white" onclick="confir()" class="btn btn-danger">Hapus</a></td>

                          
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
              window.location.href = "<?= base_url('Donasi/deletepengeluaran/') . $p['id_pengeluaran'] ?>";
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