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
    <?php $this->load->view('user/template/nav'); ?>

    <div class="container" style="margin-top: 110px;">
        <h1 style="text-align: center;">Acara</h1>
        <div class="row" style="padding-left: 0px;margin-left: 0px;">
            <?php foreach ($acara as $a) {?>
            <div class="col-xl-3" style="margin-bottom: 10px;">
                <div class="card"><img class="card-img-top w-100 d-block" src="<?= base_url('assets/images/acara/'). $a['img_acara'] ?>">
                    <div class="card-body" style="text-align: center;">
                        <h5 class="card-title" style="text-align: center;"><?= $a['nama_acara'] ?>&nbsp;</h5>
                        <p class="card-text" style="text-align: center;font-family: Aladin, cursive;"><?= strftime("%A %d-%B-%Y %T", strtotime($a['tgl_acara'])) ?></p><a href="<?= base_url('Acara-Detail/'). $a['slug_acara'] ?>" class="btn btn-primary" style="text-align: center;">Selengkapnya</a>
                    </div>
                </div>
            </div>

        <?php } ?>
            
        </div>
    </div>
    <?php $this->load->view('user/template/footer'); ?>
    <script src="<?= base_url('assets/user/') ?>js/jquery.min.js"></script>
    <script src="<?= base_url('assets/user/') ?>bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="<?= base_url('assets/user/') ?>js/script.min.js"></script>
</body>

</html>