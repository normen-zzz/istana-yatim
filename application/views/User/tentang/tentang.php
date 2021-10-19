<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Asrama Istana Yatim, Yayasan Keluarga Muslim The Castilla</title>
  <link rel="stylesheet" href="<?= base_url('assets/user/') ?>bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/user/') ?>fonts/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/user/') ?>css/styles.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin="" />


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
    integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />

  <link rel="icon" href="<?= base_url('assets/images/logo/') ?>istanayatim.jpg" type="image/gif" sizes="16x16">


</head>

<body>

  <?php $this->load->view('user/template/nav'); ?>
  <section class="article-clean">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
          <div class="intro">
            <h1 class="text-center">Tentang Istana Yatim</h1><img class="img-fluid" src="<?= base_url('assets/images/tentang/'). $tentang->img_tentang ?>">
          </div>
          <div class="text">
            <?= $tentang->text_tentang ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="footer-basic">
    <div class="social"><a target="_blank" href="<?= $footer['link_instagram'] ?>"><i class="icon ion-social-instagram"></i></a><a target="_blank" href="<?= $footer['link_twitter'] ?>"><i
          class="icon ion-social-twitter"></i></a><a target="_blank" href="<?= $footer['link_facebook'] ?>"><i class="icon ion-social-facebook"></i></a></div>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="<?= base_url('User') ?>">Home</a></li>
      <li class="list-inline-item"><a href="<?= base_url('User/infodonasi') ?>">Donasi</a></li>
      <li class="list-inline-item"><a href="<?= base_url('User/tentang') ?>">Tentang</a></li>
      <p class="copyright"><?= $footer['text_copyright'] ?></p>
  </footer>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script src="assets/js/script.min.js"></script>
</body>

</html>