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
    <div class="container" style="margin-top: 41px;">
        <div class="row">
            <div class="col-md-9">
                <div class="row" style="padding-top: 12px;">
                    <div class="col" style="padding-top: 0px;">
                        <h1><?= $artikel->judul_artikel ?></h1>
                        <div><i class="fa fa-clock-o"></i><label style="margin-left: 6px;"><?= $artikel->tgl_artikel ?></label><i class="fa fa-user" style="margin-left: 14px;"></i><label style="margin-left: 6px;"><?= $artikel->penulis_artikel ?></label><i class="fa fa-folder" style="margin-left: 14px;"></i><label style="margin-left: 6px;"><?= $artikel->jenis_artikel ?></label><i class="fa fa-eye" style="margin-left: 14px;"></i><label style="margin-left: 6px;">Label</label><i class="fa fa-comment" style="margin-left: 14px;"></i><label style="margin-left: 6px;">Label</label></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="padding-top: 0px;"><img class="img-fluid" src="<?= base_url('assets/images/artikel/') . $artikel->img_artikel ?>" style="width: 671px;"></div>
                </div>
                <div class="row">
                    <div class="col" style="padding-top: 0px;">
                        <p><?= $artikel->isi_artikel ?></p>
                    </div>
                </div><label>Share:&nbsp;</label>
                <div class="row" style="padding-top: 10px;">
                    <div class="col-xl-1" style="margin-top: 5px;"><a href="#"><img src="<?= base_url('assets/user/') ?>img/twitter.png" style="width: 41px;margin-top: 0px;"></a></div>
                    <div class="col-xl-1" style="margin-top: 5px;"><a href="#"><img src="<?= base_url('assets/user/') ?>img/facebook.png" style="width: 41px;"></a></div>
                    <div class="col-xl-1" style="margin-top: 5px;"><a href="#"><img src="<?= base_url('assets/user/') ?>img/ig.png" style="width: 41px;"></a></div>
                </div>
            </div>
            <div class="col" style="padding-top: 0px;">
                <div class="row">
                    <div class="col" style="padding-top: 0px;border-bottom: 1px dashed rgb(97,99,101) ;">
                        <h3>Artikel Terbaru</h3>
                    </div>
                </div>
                <div class="row" style="padding-top: 0px;border-bottom: 1px solid rgb(163,164,164) ;">
                    <div class="col-xl-4" style="padding-top: 38px;"><img class="img-fluid" src="assets/img/hero-background-technology.jpg"></div>
                    <div class="col" style="padding-top: 15px;">
                        <h5>Cara Meningkatkan Iman dan Taqwa</h5>
                        <p>Paragraph</p>
                    </div>
                </div>
                <div class="row" style="padding-top: 0px;border-bottom: 1px solid rgb(163,164,164) ;">
                    <div class="col-xl-4" style="padding-top: 38px;"><img class="img-fluid" src="assets/img/hero-background-technology.jpg"></div>
                    <div class="col" style="padding-top: 15px;">
                        <h5>Cara Meningkatkan Iman dan Taqwa</h5>
                        <p>Paragraph</p>
                    </div>
                </div>
                <div class="row" style="padding-top: 0px;border-bottom: 1px solid rgb(163,164,164) ;">
                    <div class="col-xl-4" style="padding-top: 38px;"><img class="img-fluid" src="assets/img/hero-background-technology.jpg"></div>
                    <div class="col" style="padding-top: 15px;">
                        <h5>Cara Meningkatkan Iman dan Taqwa</h5>
                        <p>Paragraph</p>
                    </div>
                </div>
                <div class="row" style="padding-top: 0px;border-bottom: 1px solid rgb(163,164,164) ;">
                    <div class="col-xl-4" style="padding-top: 38px;"><img class="img-fluid" src="assets/img/hero-background-technology.jpg"></div>
                    <div class="col" style="padding-top: 15px;">
                        <h5>Cara Meningkatkan Iman dan Taqwa</h5>
                        <p>Paragraph</p>
                    </div>
                </div>
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