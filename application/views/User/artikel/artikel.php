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
        <div class="container"><a class="navbar-brand" href="#"><img class="img-fluid pulse animated infinite" src="<?= base_url('assets/user/') ?>img/4849339.png" style="width: 72px;"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
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
            <div class="col" style="padding-top: 1px;">
                <h1 align="center">Artikel</h1>
                <form class="search-form">
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-search"></i></span></div><input class="form-control" type="text" placeholder="Saya Mencari..">
                        <div class="input-group-append"><button class="btn btn-light" type="button" style="border-style: solid;border-color: rgb(136,144,152);">Cari</button></div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row" style="padding-top: 0px;">
            <div class="col-md-9" style="margin-top: 56px;">
                <?php foreach ($artikel as $a) { ?>
                <div class="row"  style="padding-top: 10px;border-right: 2px solid rgb(172,174,177) ;">
                    <div class="col-xl-9 offset-xl-1" style="padding-top: 0px;">
                        <div class="card-group">
                            <div class="card"><a href="<?= base_url('User/detailartikel/') . $a['slug_artikel']  ?>"><img class="img-fluid card-img-top w-100 d-block" src="<?= base_url('assets/images/artikel/') . $a['img_artikel'] ?>" style="height: 247.797px;"></a>
                                <div class="card-body">
                                    <a style="color: black" href="<?= base_url('User/detailartikel/') . $a['slug_artikel']  ?>"><h4 class="card-title"><?= $a['judul_artikel'] ?></h4></a>
                                    <p class="d-xl-flex justify-content-xl-end card-text"><?= $a['isi_artikel'] ?></p><label class="d-xl-flex justify-content-xl-end align-items-xl-center" style="text-align: right;">Penulis: <?= $a['penulis_artikel'] ?></label><label class="d-xl-flex justify-content-xl-end align-items-xl-center"><i class="fa fa-eye"></i>&nbsp; 800</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            

            <?php } ?>
               
            </div>
            <div class="col" style="padding-top: 0px;padding-left: 21px;">
                <div class="row">
                    <div class="col" style="padding-top: 0px;border-bottom: 1px dashed rgb(97,99,101) ;">
                        <h3>Artikel Terbaru</h3>
                    </div>
                </div>
                <div class="row" style="padding-top: 0px;border-bottom: 1px solid rgb(163,164,164) ;">
                    <div class="col-xl-4" style="padding-top: 38px;"><img class="img-fluid" src="assets/img/hero-background-technology.jpg"></div>
                    <div class="col" style="padding-top: 15px;">
                        <h5>Cara Menjadi Yateam Yang baik dan benar</h5>
                        <p>Paragraph</p>
                    </div>
                </div>
                <div class="row" style="padding-top: 0px;border-bottom: 1px solid rgb(163,164,164) ;">
                    <div class="col-xl-4" style="padding-top: 38px;"><img class="img-fluid" src="assets/img/hero-background-technology.jpg"></div>
                    <div class="col" style="padding-top: 15px;">
                        <h5>Cara Menjadi Yateam Yang baik dan benar</h5>
                        <p>Paragraph</p>
                    </div>
                </div>
                <div class="row" style="padding-top: 0px;border-bottom: 1px solid rgb(163,164,164) ;">
                    <div class="col-xl-4" style="padding-top: 38px;"><img class="img-fluid" src="assets/img/hero-background-technology.jpg"></div>
                    <div class="col" style="padding-top: 15px;">
                        <h5>Cara Menjadi Yateam Yang baik dan benar</h5>
                        <p>Paragraph</p>
                    </div>
                </div>
                <div class="row" style="padding-top: 0px;border-bottom: 1px solid rgb(163,164,164) ;">
                    <div class="col-xl-4" style="padding-top: 38px;"><img class="img-fluid" src="assets/img/hero-background-technology.jpg"></div>
                    <div class="col" style="padding-top: 15px;">
                        <h5>Cara Menjadi Yateam Yang baik dan benar</h5>
                        <p>Paragraph</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 offset-xl-1" style="padding-top: 0px;">
                <nav>
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                    </ul>
                </nav>
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