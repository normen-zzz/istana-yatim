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
          <h1>All Form</h1>
        </div>
        <div class="row">
          <div class="col">
            <button style="margin-bottom: 20px" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Kirim Pemberitahuan</button>
            <button style="margin-bottom: 20px" data-toggle="modal" data-target="#linkModal" class="btn btn-primary">Kirim Pemberitahuan + foto</button>
            <button style="margin-bottom: 20px" data-toggle="modal" data-target="#tambahformall" class="btn btn-primary">Tambah Data FormALL</button>
            <div class="card">
              <div class="card-header">
                <h4>List Form Acara</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-md">
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>Nomor</th>
                      <!-- <th>Action</th> -->
                    </tr>

                    <?php foreach ($form as $f) { ?>
                      <tr>
                        <td><?= $f['id_formall'] ?></td> 
                        <td><?= $f['nama_formall'] ?></td> 
                        <td><?= $f['nomor_formall'] ?></td>
                        <td><a href="<?= base_url('Form/deleteformall/').$f['id_formall'] ?>" style="color: white" onclick="return confirm('kamu yakin akan menghapus  ?');"   class="btn btn-danger" >Hapus</a></td>
                      </tr>
                    <?php } ?>

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
          <h5 class="modal-title text-center" id="exampleModalLabel">Pemberitahuan </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <?php echo form_open_multipart('Form/pemberitahuanall'); ?>

         <div class="form-group">
          <label>Teks</label>
          <p>Assalamu'alaikum warahmatullahi wabarakatuh, Yang terhormat Bp/ibu (nama)</p>
          <textarea style="height: 200px" name="text" class="form-control" placeholder="isi disini" ></textarea><br/>
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

<!-- Modal -->
<div class="modal fade" id="tambahformall" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center" id="exampleModalLabel">Tambah Form All </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <?php echo form_open_multipart('Form/tambahformallAct'); ?>

       <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required="">

      </div>

      <div class="form-group">
        <label>Nomor</label>
        <input type="text" name="nomor" class="form-control" required="">

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

<!-- Modal -->
<div class="modal fade" id="linkModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center" id="exampleModalLabel">Pemberitahuan </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <?php echo form_open_multipart('Form/pemberitahuanfileall'); ?>

       <div class="form-group">
        <label>Pesan</label>
        <p>Assalamu'alaikum warahmatullahi wabarakatuh, Yang terhormat Bp/ibu (nama)</p>
        <textarea style="height: 200px" name="pesan" class="form-control" placeholder="isi disini" ></textarea><br/>
      </div>

      <div class="form-group">
        <label for="filefoto">Masukan Foto</label>
        <input type="file" name="filefoto">
      </div>

             <!--  <div class="form-group">
                      <label>Link Foto</label>
                      <input type="text" name="link" placeholder="Http://...." class="form-control">
                    </div> -->


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

          <?php $this->load->view('admin/template/footer') ?>

          <script type="text/javascript">
            function confir(){
              swal({
                title: "Hapus Data Ini?",
                text: "Data Tidak bisa kembali jika sudah dihapus",
                icon: "warning",
                buttons: true,
                dangerMode: "true",
              })
              .then((willDelete) => {
                if (willDelete) {
                  swal({ title: "Hapus Data Berhasil",
                    icon: "success"}).then(okay => {
                      if (okay) {
                        window.location.href = "<?= base_url('Form/deleteform/') . $f['id_form'] ?>";
                      }
                    });

                  } else {
                    swal({
                      title: "Data Tidak Terhapus",
                      icon: "error",

                    });
                  }
                });
            }
          </script>

