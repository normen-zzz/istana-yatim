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
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md fixed-top pulse animated navigation-clean-button" style="padding-bottom: 3px;padding-top: 11px;">
        <div class="container"><a class="navbar-brand" href="#"><img class="img-fluid pulse animated infinite" src="<?= base_url('assets/user/') ?>img/4849339.png" style="width: 72px;"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul><span class="navbar-text actions"> <a data-bss-hover-animate="pulse" class="login" href="<?= base_url('Auth/admin') ?>">Log In</a><a class="btn btn-light action-button" role="button" data-bss-hover-animate="pulse" href="#">Sign Up</a></span>
            </div>
        </div>
    </nav>
    <div style="margin-top: 75px;" class="carousel slide" data-ride="carousel" id="carousel-1">
        <div class="carousel-inner">
            <?php $counter = 0; ?>
            <?php foreach ($slidefoto as $s) {?>
            <div class="carousel-item <?= ($counter == 0) ? "active" : "" ?>"><img class="img-fluid w-100 d-block" src="<?= base_url('assets/images/slidefoto/'). $s['img_slidefoto'] ?>" style="width: 1159px;height: 600px;"></div>

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
            <div class="row">
                <div class="col" data-aos="fade-up" data-aos-duration="500" style="text-align: center;">
                    <h1 style="text-align: center;">Menu</h1>
                    <p>Paragraph</p>
                </div>
            </div>
            <div class="row" style="padding-top: 20px;">
                <?php foreach ($menu as $m) { ?>

                <div class="col text-center" data-aos="fade-up" data-aos-duration="850"><img src="<?= base_url('assets/images/menu/') . $m['img_menu'] ?>" style="width: 150px;">
                    <h1><?= $m['judul_menu'] ?></h1>
                    <p><?= $m['text_menu'] ?></p><a class="btn btn-light action-button" role="button" href="#" style="background: rgb(53,204,95);border-radius: 18px;color: rgb(254,254,254);"><strong><?= $m['tombol_menu'] ?></strong></a>
                </div>

            <?php } ?>
                
            </div>
        </div>
    </section>
    <section style="margin-top: 37px;">
        <div class="container-fluid" style="background: #1f7c4d;">
            <div class="row" data-aos="fade-up" data-aos-duration="800" style="background: rgba(31,124,77,0);">
                <div class="col text-center" style="color: rgb(255,255,255);padding: 73px 15px 0px;padding-top: 0px;">
                    <h1>Donasi</h1>
                </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-duration="800" style="padding-top: 0px;padding-bottom: 65px;">
                <div class="col text-center" style="padding-top: 35px;"><a href="#" style="border-style: solid;border-color: rgb(255,255,255);color: rgb(255,255,255);border-radius: 10px;padding: 3px;margin: 5px;">Yuk Donasi...</a></div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1 data-aos="zoom-in" data-aos-duration="500" style="text-align: center;color: rgb(106,110,115);"><strong>Lokasi</strong></h1>
                </div>
            </div>
            <div class="row" style="padding-top: 12px;">
                <div class="col"><iframe allowfullscreen="" frameborder="0" src="https://cdn.bootstrapstudio.io/placeholders/map.html" data-aos="zoom-in" data-aos-delay="300" width="100%" height="400"></iframe></div>
            </div>
        </div>
    </section>
    <footer class="footer-clean" style="margin-top: 35px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-4 col-md-3 item">
                    <h3>Services</h3>
                    <ul>
                        <li><a href="#">Web design</a></li>
                        <li><a href="#">Development</a></li>
                        <li><a href="#">Hosting</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 item">
                    <h3>About</h3>
                    <ul>
                        <li><a href="#">Company</a></li>
                        <li><a href="#">Team</a></li>
                        <li><a href="#">Legacy</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 item">
                    <h3>Careers</h3>
                    <ul>
                        <li><a href="#">Job openings</a></li>
                        <li><a href="#">Employee success</a></li>
                        <li><a href="#">Benefits</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a>
                    <p class="copyright">Company Name © 2017</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="<?= base_url('assets/user/') ?>js/jquery.min.js"></script>
    <script src="<?= base_url('assets/user/') ?>bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="<?= base_url('assets/user/') ?>js/script.min.js"></script>
</body>

</html>