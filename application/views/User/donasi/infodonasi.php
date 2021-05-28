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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aladin">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allan">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Almendra">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amaranth">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Artifika">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bebas+Neue">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Belgrano">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comic+Neue">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<?php 

        function rupiah($angka){
  
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
 
        }

        ?>

<body>
    <nav class="navbar navbar-light navbar-expand-md fixed-top navigation-clean-button" style="padding-bottom: 0px;padding-top: 0px; border-bottom-style: solid;border-bottom-color: #EBF2F7;">
    <div class="container"><a class="navbar-brand" href="<?= base_url('User') ?>"><img class="img-fluid pulse animated infinite" src="<?= base_url('assets/images/logo/') ?>istanayatim.png" style="width: 60px;"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navcol-1">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item"></li>
          <li class="nav-item"></li>
          <li class="nav-item"></li>
          <li class="nav-item"></li>
        </ul><span class="navbar-text actions"> <a target="_blank" data-bss-hover-animate="pulse" class="login" href="<?= base_url('Auth/admin') ?>">Masuk</a><a class="btn btn-light action-button pulse animated infinite action-button" role="button"  href="#donasi">Donasi</a></span>
      </div>
    </div>
  </nav>
    <div class="container" style="margin-top: 110px;">
        <h1 style="text-align: center;">Info Donasi</h1>
        <h3 style="text-align: center;">Saldo Donasi Terkini : <?= rupiah($infodonasi['jumlah_update']) ?></h3>
        <h5 style="text-align: center;color: rgb(151,153,156);font-family: Acme, sans-serif;"><?= strftime("%A %d %h %Y", strtotime($infodonasi['tanggal_update'])) ?></h5>
        <div class="row" style="padding-left: 0px;margin-left: 0px;">
            <?php foreach ($pengeluarandonasi as $p) {
                ?>
            <div class="col-11 col-lg-4 col-xl-3" style="margin-bottom: 10px;">
                <div class="card"><img class="img-fluid card-img-top w-100 d-block" src="<?= base_url('assets/images/pengeluarandonasi/'). $p['img_pengeluaran'] ?>">
                    <div class="card-body" style="text-align: center;">
                        <h5 class="card-title" style="text-align: center;margin-bottom: 7px;"><?= $p['judul_pengeluaran'] ?></h5>
                        <p class="card-text" style="text-align: center;font-family: Aladin, cursive;margin-bottom: 5px;"><?= strftime("%A %d %h %Y", strtotime($p['tanggal_pengeluaran'])) ?></p>
                        <p class="card-text" style="text-align: center;font-family: 'Bebas Neue', cursive;margin-bottom: 2px;color: #f2f2f2;border-width: 1px;border-style: solid;border-radius: 21px;background: #28a745;"><?= rupiah($p['jumlah_pengeluaran']) ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
    <footer class="footer-basic">
        <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Home</a></li>
            <li class="list-inline-item"><a href="#">Services</a></li>
            <li class="list-inline-item"><a href="#">About</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
        </ul>
        <p class="copyright">Company Name © 2017</p>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>