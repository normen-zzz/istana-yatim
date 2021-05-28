<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>sipena</title>
    <link rel="stylesheet" href="<?= base_url('assets/user/') ?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="<?= base_url('assets/user/') ?>fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/') ?>fonts/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/') ?>css/styles.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md fixed-top navigation-clean-button" style="padding-bottom: 0px;padding-top: 0px; border-bottom-style: solid;border-bottom-color: #EBF2F7;">
    <div class="container"><a class="navbar-brand" href="#"><img class="img-fluid pulse animated infinite" src="<?= base_url('assets/images/logo/') ?>istanayatim.png" style="width: 60px;"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
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
        <h1 style="text-align: center;">Acara</h1>
        <div class="row" style="padding-left: 0px;margin-left: 0px;">
            <?php foreach ($acara as $a) {?>
            <div class="col-xl-3" style="margin-bottom: 10px;">
                <div class="card"><img class="card-img-top w-100 d-block" src="<?= base_url('assets/images/acara/'). $a['img_acara'] ?>">
                    <div class="card-body" style="text-align: center;">
                        <h5 class="card-title" style="text-align: center;"><?= $a['nama_acara'] ?>&nbsp;</h5>
                        <p class="card-text" style="text-align: center;font-family: Aladin, cursive;"><?= strftime("%A %d-%h-%Y %T", strtotime($a['tgl_acara'])) ?></p><a href="<?= base_url('User/detailacara/'). $a['slug_acara'] ?>" class="btn btn-primary" style="text-align: center;">Selengkapnya</a>
                    </div>
                </div>
            </div>

        <?php } ?>
            
        </div>
    </div>
    <footer class="footer-basic">
        <div class="social"><a target="_blank" href="<?= $footer['link_instagram'] ?>"><i class="icon ion-social-instagram"></i></a><a target="_blank" href="<?= $footer['link_twitter'] ?>"><i class="icon ion-social-twitter"></i></a><a target="_blank" href="<?= $footer['link_facebook'] ?>"><i class="icon ion-social-facebook"></i></a></div>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Home</a></li>
          <li class="list-inline-item"><a href="#">Donasi</a></li>
          <li class="list-inline-item"><a href="#">Tentang</a></li>
        <p class="copyright"><?= $footer['text_copyright'] ?></p>
      </footer>
    <script src="<?= base_url('assets/user/') ?>js/jquery.min.js"></script>
    <script src="<?= base_url('assets/user/') ?>bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="<?= base_url('assets/user/') ?>js/script.min.js"></script>
</body>

</html>