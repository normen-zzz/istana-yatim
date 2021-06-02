<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>sipena</title>
  <link rel="stylesheet" href="<?= base_url('assets/user/') ?>bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/user/') ?>fonts/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/user/') ?>css/styles.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />

  
</head>

<body>

  <?php $this->load->view('User/template/nav'); ?>


  
  <div style="margin-top: 75px;" class="carousel slide" data-ride="carousel" data-interval="2000" data-pause="false" id="carousel-1">
    <div class="carousel-inner">
      <?php $counter = 0; ?>
      <?php foreach ($slidefoto as $s) {?>
        <div class="carousel-item <?= ($counter == 0) ? "active" : "" ?>"><img class="img-fluid w-100 d-block" src="<?= base_url('assets/images/slidefoto/'). $s['img_slidefoto'] ?>" style="width: 1159px;height: 500px;"></div>

        <?php $counter++; } ?> 
      </div>

      <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
      <ol class="carousel-indicators">
        <?php $counterslide = 0; ?>
        <?php foreach ($slidefoto as $a) { ?>
          <li data-target="#carousel-1" data-slide-to="$counterslide" class="<?= ($counter == 0) ? "active" : "" ?>"></li>
          <?php $counterslide++; } ?>
        </ol>
      </div>



      


      <section>
        <div class="container">
          <div class="row" style="padding-top: 5px;">

            <div class="col text-center" style="padding-bottom: 20px;" data-aos="fade-up" data-aos-duration="850"><img src="<?= base_url('assets/images/menu/artikel.png') ?>" style="width: 150px;">
              <h3 style="padding-top: 20px;">Berkah</h3>
              <h4>"Bersemangat Sedekah"</h4>
              <p><?= $hitungberkah ?> berkah</p>
              <a class="btn btn-light action-button" role="button" href="<?= base_url('User/berkah') ?>" style="background: rgb(53,204,95);border-radius: 18px;color: rgb(254,254,254);"><strong>Selengkapnya</strong></a>
            </div>

            <div class="col text-center" style="padding-bottom: 20px;" data-aos="fade-up" data-aos-duration="850"><img src="<?= base_url('assets/images/menu/artikel.png') ?>" style="width: 150px;">
              <h3 style="padding-top: 20px;">Cerri</h3>
              <h4>"Cerita Santri"</h4>
              <p><?= $hitungceritasantri ?> Cerita</p>
              <a class="btn btn-light action-button" role="button" href="<?= base_url('User/ceritasantri') ?>" style="background: rgb(53,204,95);border-radius: 18px;color: rgb(254,254,254);"><strong>Selengkapnya</strong></a>
            </div>

            <div class="col text-center" style="padding-bottom: 20px;" data-aos="fade-up" data-aos-duration="850"><img src="<?= base_url('assets/images/menu/artikel.png') ?>" style="width: 150px;">
              <h3 style="padding-top: 20px;">ISI</h3>
              <h4>"Informasi Seputar Istana Yatim"</h4>
              <p><?= $hitungacara ?> Acara Aktif</p>
              <a class="btn btn-light action-button" role="button" href="<?= base_url('User/Acara') ?>" style="background: rgb(53,204,95);border-radius: 18px;color: rgb(254,254,254);"><strong>Selengkapnya</strong></a>
            </div>




          </div>
        </div>
        <div id="donasi"></div>

      </section>





      <?php 

      function rupiah($angka){

        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;

      }

      ?>
      <section >
        <div class="container-fluid" style=" margin-top: 70px; background: #1f7c4d;">
          <div class="row" data-aos="fade-up" data-aos-duration="800" style="background: rgba(31,124,77,0);">
            <div class="col text-center" style="color: rgb(255,255,255);padding: 73px 15px 0px;padding-top: 0px;">
              <marquee><?php foreach ($donasi as $d) {
                echo '  ' .$d['nama'] . ': ' . rupiah($d['jumlah']).' ||';
              } ?></marquee>
              <h1>Yuk Donasi</h1>

              <?php foreach ($bank as $b) {?>
                <p><?= $b['bank'] ?> <?= $b['norek'] ?> A/n <?= $b['nama_bank'] ?></p>
              <?php } ?>
            </div>

          </div>
          <div class="row" data-aos="fade-up" data-aos-duration="800" style="padding-top: 0px;padding-bottom: 5px;">
            <div class="col text-center" style="padding-top: 35px;">
              <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal">
                Konfirmasi Donasi
              </button>

              <!-- <a href="#" style="border-style: solid;border-color: rgb(255,255,255);color: rgb(255,255,255);border-radius: 10px;padding: 3px;margin: 5px;">Yuk Donasi...</a> -->
            </div>
          </div>

          <div class="row" data-aos="fade-up" data-aos-duration="800" style="padding-top: 0px;padding-bottom: 65px;">
            <div class="col text-center" style="padding-top: 0px;">
              <a class="btn btn-light" href="<?= base_url('User/infodonasi') ?>">
                Info Donasi
              </a>
              
              <!-- <a href="#" style="border-style: solid;border-color: rgb(255,255,255);color: rgb(255,255,255);border-radius: 10px;padding: 3px;margin: 5px;">Yuk Donasi...</a> -->
            </div>
          </div>
        </div>
      </section>


      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h5 class="modal-title text-center" id="exampleModalLabel">AYO DONASI</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <?php echo form_open_multipart('user/tambahdonasiAct'); ?>
             <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="form-group">
              <label>No Whatssapp</label>
              <input type="text" name="nowa" class="form-control" placeholder="" required>
            </div>

            <div class="form-group">
              <label>Jumlah</label>
              <input type="text" name="jumlah" class="form-control">
            </div>

            <div class="form-group">
              <label>Bank</label>
              <select name ="bank" class="form-control">
                <option selected>Pilih Bank</option>
                <?php foreach ($bank as $b) { ?>
                  <option value="<?= $b['id_bank'] ?>"><?= $b['bank'] ?> <?= $b['norek'] ?> A/n <?= $b['nama_bank'] ?></option>
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


  <?php function limit_text($text, $limit) {
    if (str_word_count($text, 0) > $limit) {
      $words = str_word_count($text, 2);
      $pos   = array_keys($words);
      $text  = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
  } ?>
  <!-- Set up your HTML -->
  <div class="container" data-aos="fade-up" data-aos-duration="500" data-aos-delay="500">
    <div class="row">
      <div class="col">
        <h1 align="center" style="color: rgb(106,110,115);"><strong>Berkah</strong></h1>
      </div>
    </div>
    <div class="row owl-carousel">
      <?php foreach ($berkah as $b) { ?>
        <!-- awal -->
        <div class="col" style=" background-color: white; box-shadow: 0px 0px 8px rgb(55,126,79);margin: 5px; padding-top: 0px;">
          <div class="row" style="padding-top: 0px;">
            <div class="col" style="padding-top: 0px;padding-right: 0px;padding-left: 0px;"><img class="img-fluid" src="<?= base_url('assets/images/berkah/'). $b['img_berkah'] ?>" style="border-radius: 0px;"></div>
          </div>
          <div class="row" style="padding-top: 8px;">
            <div class="col" style="padding-top: 0px;">
              <h6><?= limit_text($b['judul_berkah'], 5) ?></h6>
            </div>
          </div>
          <div class="row" style="padding-top: 0px;">
            <div class="col" style="padding-top: 0px;">
              <p><?= limit_text($b['isi_berkah'], 20) ?></p>
            </div>
          </div>
          <div class="row" style="padding-top: 0px;">
            <div class="col" style="padding-top: 0px;text-align: center;padding-bottom: 15px;"><a class="btn btn-secondary" href="<?= base_url('User/detailberkah/'). $b['slug_berkah'] ?>" style="width: 168.5px;background: rgba(4,143,131,0);color: rgb(17,156,15);border: 1px solid rgb(17,156,15);box-shadow: 0px 0px 4px 0px;border-radius: 24px;">Selengkapnya</a></div>
          </div>
        </div>
        <!-- akhir -->
      <?php } ?>
    </div>

     <section>
        <div class="container">
            <div class="row">
                <div class="col-xl-4 offset-xl-4 text-center" style="padding-top: 60px;">
                    <h1 style="font-family: Lora, serif;border-bottom-style: solid;border-bottom-color: rgb(0,157,26);">Istana Yatim Tv</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-8">
                    <div class="embed-responsive embed-responsive-16by9"><iframe width="560" height="315" src="<?= $youtube1['link_youtube'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                </div>
                <div class="col" style="padding-top: 0px;">
                    <div class="row" style="padding-top: 0px;">
                        <div class="col-xl-12 offset-xl-0" style="padding-top: 0px;">
                            <div class="embed-responsive embed-responsive-16by9"><iframe width="560" height="315" src="<?= $youtube2['link_youtube'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 16px;">
                        <div class="col-xl-12 offset-xl-0" style="padding-top: 0px;">
                            <div class="embed-responsive embed-responsive-16by9"><iframe width="560" height="315" src="<?= $youtube3['link_youtube'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    

    <section>
      <div class="container-fluid"data-aos="fade-up" data-aos-duration="500" data-aos-delay="500">
        <div class="row">
          <div class="col">
            <h1 data-aos="zoom-in" data-aos-duration="500" style="text-align: center;color: rgb(106,110,115);"><strong>Lokasi</strong></h1>
          </div>
        </div>
        <div class="row" style="padding-top: 12px;">
          <div id="mapid" class="col-md-10 offset-md-1 text-center"><?php echo $map['html'] ?>
        </div>
      </div>
    </div>
  </section>
  <?php $this->load->view('User/template/footer'); ?>






    <script src="<?= base_url('assets/user/') ?>js/jquery.min.js"></script>
    <script src="<?= base_url('assets/user/') ?>bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="<?= base_url('assets/user/') ?>js/script.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>

    <script type="text/javascript">
     var mymap = L.map('mapid').setView([-6.30261, 106.69035], 15);
     L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      maxZoom: 18,
      id: 'mapbox/streets-v11',
      tileSize: 512,
      zoomOffset: -1,
      accessToken: 'pk.eyJ1Ijoibm9ybWVuIiwiYSI6ImNrbzUyNW4zaTBubHgyb3F3OGpyN2M1dWEifQ.JfpjPDu_eSka-3diPLVtJw'
    }).addTo(mymap);

     var marker = L.marker([-6.30261, 106.69035]).addTo(mymap);
     marker.bindPopup("<b><center>Lokasi</center></b><br>Istana Yatim.").openPopup();
   </script>

   <script type="text/javascript">
     function onMapClick(e) {
    // window.location.href = "https://goo.gl/maps/ZmXqQVm6u4Xecis7A";
    window.open("https://goo.gl/maps/Hfo999DM2JNr6zXs8", '_blank').focus();
  }

  mymap.on('click', onMapClick);
</script>



<?php if ($this->session->flashdata('success-logout')): ?>
  <script>
    swal({
      icon: 'success',
      title: 'Anda berhasil Logout',
      text: 'Anda Berhasil logout',
      showConfirmButton: false,
      timer: 2500
    })
  </script>
<?php endif;?>

<?php if ($this->session->flashdata('success-donasi')): ?>
  <script>
    swal({
      icon: 'success',
      title: 'Anda berhasil Donasi',
      text: 'Anda Berhasil Melakukan Donasi',
      showConfirmButton: false,
      timer: 2500
    })
  </script>
<?php endif;?>
</body>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>

<script>
  $(document).ready(function() {
    var owl = $('.owl-carousel');
    owl.owlCarousel({
      items: 4,
      loop: true,
      margin: 10,
      responsiveClass:true,
      responsive:{
        0:{
          items:1,
          nav:false
        },
        600:{
          items:3,
          nav:false
        },
        1000:{
          items:4,
          nav:true,
          loop:true
        }
      },
      autoplay: true,
      autoplayTimeout: 2500,
      autoplayHoverPause: false
    });
    $('.play').on('click', function() {
      owl.trigger('play.owl.autoplay', [1000])
    })
    $('.stop').on('click', function() {
      owl.trigger('stop.owl.autoplay')
    })
  })
</script>

</html>

<!--Modal Untuk Tambah Data-->
<!-- Button trigger modal -->


