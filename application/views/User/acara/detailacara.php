<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/user/') ?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="<?= base_url('assets/user/') ?>fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/') ?>fonts/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/user/') ?>css/styles.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md fixed-top navigation-clean-button" style="padding-bottom: 3px;padding-top: 11px;">
        <div class="container"><a class="navbar-brand" href="#"><img class="img-fluid pulse animated infinite" src="assets/img/4849339.png" style="width: 72px;"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul><span class="navbar-text actions"> <a data-bss-hover-animate="pulse" class="login" href="#">Log In</a><a class="btn btn-light action-button" role="button" data-bss-hover-animate="pulse" href="#">Sign Up</a></span>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h1>Detail Event</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8 offset-xl-2"><img class="img-fluid" src="<?= base_url('assets/images/acara/'). $acara->img_acara ?>">
                <h1 class="text-center" style="padding-top: 21px;"><?= $acara->nama_acara ?></h1>
                <p style="text-align: center;"><?= $acara->tema_acara ?> </p>
                <p style="text-align: right;"><?= $acara->tgl_acara ?></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-10 offset-xl-1">
                <h1 class="text-center">Form Pendaftaran</h1>
                <form method="post" action="<?= base_url('Form/tambahformAct') ?>" enctype="multipart/form-data" style="text-align: center;">
                    <input type="number" name="acara" value="<?= $acara->id_acara ?>" hidden>
                    <input type="text" name="judul" value="<?= $acara->tema_acara ?>" hidden>
                    <label for="nama" style="margin-right: 5px;"><strong>Nama</strong>
                        <input class="form-control" type="text" name="nama"></label>
                    <label for="kelamin" style="margin-right: 5px;"><strong>Jenis Kelamin</strong>
                        <input class="form-control" type="text" name="kelamin"></label>
                    <label for="nomor" style="margin-right: 5px;"><strong>No. Whatsapp</strong><br>
                        <p>Harap Ganti Awalan 0 dengan Angka 62</p>
                        <input class="form-control" type="text" placeholder="628123445xxx" name="nomor"></label>
                    <div class="form-row">
                        <div class="col" style="padding-top: 9px;"><button class="btn btn-primary" type="submit">Tambah</button></div>
                    </div>
                </form>
            </div>
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
    <script src="<?= base_url('assets/user/') ?>js/jquery.min.js"></script>
    <script src="<?= base_url('assets/user/') ?>bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="<?= base_url('assets/user/') ?>js/script.min.js"></script>
</body>

</html>