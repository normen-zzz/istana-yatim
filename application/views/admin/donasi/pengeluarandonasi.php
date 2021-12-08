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

        $hasil_rupiah = "Rp " . number_format($angka,2,'.',',');
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
							<button style="margin-bottom: 20px" data-toggle="modal" data-target="#exampleModal"
								class="btn btn-primary">Tambah Pengeluaran</button>
							<div class="card">
								<div class="card-header">
									<h4>List Pengeluaran</h4>
								</div>
								<div class="card-body">
									<form method="POST" id="myForm" action="<?= base_url('admin/donasi/pengeluaran_donasifilter') ?>"
										enctype="multipart/form-data">
										<div class="form-group">
											<label for="filter"> Bulan Dan Tahun </label>
											<input type="month" name="filter">
											<button type="submit" class="btn btn-primary">Filter</button>
										</div>
									</form>
									<div class="table-responsive">
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
													<td><img width="200px"
															src="<?= base_url('assets/images/pengeluarandonasi/'). $p['img_pengeluaran'] ?>"></td>
													<td><?= limit_words($p['ket'],15) ?> .........</td>



													<td><a style="margin-bottom: 5px"
															href="<?= base_url('admin/donasi//ubahpengeluaran/') . $p['id_pengeluaran'] ?>"
															class="btn btn-success">Ubah</a> <a style="color: white" onclick="confir()"
															class="btn btn-danger">Hapus</a></td>


												</tr>
												<?php } ?>
											</tbody>
											<tfoot>
												<tr>
													<th></th>
													<th></th>
													<th>Total:</th>
													<th></th>
													<th></th>
												</tr>
											</tfoot>
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
						<h5 class="modal-title text-center" id="exampleModalLabel">Tambah Pengeluaran</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<?php echo form_open_multipart('admin/donasi/tambahpengeluaranAct'); ?>

						<div class="form-group">
							<label>Judul</label>
							<input type="" name="judul_pengeluaran" class="form-control" required="">
							<?= form_error('judul_pengeluaran', '<small class="text-danger">', '</small>'); ?>
						</div>

						<div class="form-group">
							<label>Jumlah</label>
							<input type="" name="jumlah_pengeluaran" class="form-control" required="">
							<?= form_error('jumlah_pengeluaran', '<small class="text-danger">', '</small>'); ?>
						</div>

						<div class="form-group">
							<label>Foto</label>
							<input type="file" name="foto_pengeluaran" class="form-control" required="">
						</div>


						<div class="form-group">
							<label>Keterangan</label>
							<input type="text" name="ket" class="form-control">
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
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/datetime/1.0.3/js/dataTables.dateTime.min.js">
		</script>

		<script type="text/javascript">
			<?php
			if ($modal == 'ada') {
			?>
			$('#exampleModal').modal('show');
			<?php
} 
      ?>
		</script>


		<script>
			$(document).ready(function () {
				$('#myTable').DataTable({

					dom: 'Bfrtip',


					buttons: [{

							extend: 'excel',
							footer: true,
							text: 'excel',
							className: 'btn btn-primary',
							exportOptions: {
								columns: ':not(.notexport)'

							}
						},

						{
							extend: 'pdf',
							text: 'pdf',
							footer: true,
							className: 'btn btn-primary',
							exportOptions: {
								columns: ':not(.notexport)'
							}
						},

						{
							extend: 'csv',
							text: 'csv',
							footer: true,
							className: 'btn btn-primary',
							exportOptions: {
								columns: ':not(.notexport)'
							}
						}
					],
					"pageLength": 10000,
					"footerCallback": function (row, data, start, end, display) {
						var api = this.api(),
							data;

						// Remove the formatting to get integer data for summation
						var intVal = function (i) {
							return typeof i === 'string' ?
								i.replace(/[\Rp,]/g, '') * 1 :
								typeof i === 'number' ?
								i : 0;
						};

						// Total over all pages
						total = api
							.column(6)
							.data()
							.reduce(function (a, b) {
								return intVal(a) + intVal(b);
							}, 0);

						// Total over this page
						pageTotal = api
							.column(3, {
								page: 'current'
							})
							.data()
							.reduce(function (a, b) {
								return intVal(a) + intVal(b);
							}, 0);

						// Update footer
						$(api.column(3).footer()).html(
							'Rp.' + pageTotal
						);
					}
				});
			});
		</script>

		<!-- <script type="text/javascript">
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
</script> -->



		<script type="text/javascript">
			function confir() {
				swal({
						title: "Hapus Cerita Santri?",
						text: "Data Tidak bisa kembali jika sudah dihapus",
						icon: "warning",
						buttons: true,
						dangerMode: "true",
					})
					.then((willDelete) => {
						if (willDelete) {
							swal({
								title: "Hapus Cerita Santri Berhasil",
								icon: "success"
							}).then(okay => {
								if (okay) {
									window.location.href = "<?= base_url('admin/donasi/deletepengeluaran/') . $p['id_pengeluaran'] ?>";
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