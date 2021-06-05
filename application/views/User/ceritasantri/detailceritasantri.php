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
    <?php function limit_text($text, $limit) {
        if (str_word_count($text, 0) > $limit) {
          $words = str_word_count($text, 2);
          $pos   = array_keys($words);
          $text  = substr($text, 0, $pos[$limit]) . '....';
        }
        return $text;
      } ?>
    <?php $this->load->view('user/template/nav'); ?>
    <div class="container" style="margin-top: 41px;">
        <div class="row">
            <div class="col-md-9">
                <div class="row" style="padding-top: 12px;">
                    <div class="col" style="padding-top: 0px;">
                        <h1><?= $ceritasantri->judul_ceritasantri ?></h1>
                        <div><i class="fa fa-clock-o"></i><label style="margin-left: 6px;"><?= strftime("%A %d-%h-%Y %T", strtotime($ceritasantri->tgl_ceritasantri)) ?></label><i class="fa fa-user" style="margin-left: 14px;"></i><label style="margin-left: 6px;"><?= $ceritasantri->penulis_ceritasantri ?></label><i class="fa fa-folder" style="margin-left: 14px;"></i><label style="margin-left: 6px;"><?= $ceritasantri->jenis_ceritasantri ?></label><i class="fa fa-eye" style="margin-left: 14px;"></i><label style="margin-left: 6px;"><?= $ceritasantri->lihat_ceritasantri ?></label><i class="fa fa-comment" style="margin-left: 14px;"></i><label style="margin-left: 6px;">Label</label></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="padding-top: 0px;"><img class="img-fluid" src="<?= base_url('assets/images/ceritasantri/') . $ceritasantri->img_ceritasantri ?>" style="width: 671px;"></div>
                </div>
                <div class="row">
                    <div class="col" style="padding-top: 0px;">
                        <p><?= $ceritasantri->isi_ceritasantri ?></p>
                    </div>
                </div><label>Share:&nbsp;</label>
                <div class="row" style="padding-top: 10px;">
                    <div class="col-xl-1" style="margin-top: 5px;"><a href="#"><img src="<?= base_url('assets/user/') ?>img/twitter.png" style="width: 41px;margin-top: 0px;"></a></div>
                    <div class="col-xl-1" style="margin-top: 5px;"><a href="#"><img src="<?= base_url('assets/user/') ?>img/facebook.png" style="width: 41px;"></a></div>
                    <div class="col-xl-1" style="margin-top: 5px;"><a href="#"><img src="<?= base_url('assets/user/') ?>img/ig.png" style="width: 41px;"></a></div>
                </div>
            </div>
            <div class="col" style="padding-top: 0px">
                <div class="row">
                    <div class="col" style="padding-top: 0px;border-bottom: 1px dashed rgb(97,99,101) ;">
                        <h3>Cerita Santri Terpopuler</h3>
                    </div>
                </div>
                <?php foreach ($ceritasantripopuler as $p) { ?>

                <div class="row" style="padding-top: 0px;border-bottom: 1px solid rgb(163,164,164) ;">
                    <div class="col-xl-4" style="padding-top: 38px;"><img class="img-fluid" src="<?= base_url('assets/images/ceritasantri/'). $p['img_ceritasantri'] ?>"></div>
                    <div class="col" style="padding-top: 15px;">
                        <h5><?= limit_text($p['judul_ceritasantri'], 5) ?></h5>
                        <p style="color: grey">Dibaca <?= $p['lihat_ceritasantri'] ?> kali</p>
                    </div>
                </div>

            <?php } ?>

            </div>
        </div>
    </div>
    <?php $this->load->view('user/template/footer'); ?>
    <script src="<?= base_url('assets/user/') ?>js/jquery.min.js"></script>
    <script src="<?= base_url('assets/user/') ?>bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="<?= base_url('assets/user/') ?>js/script.min.js"></script>
</body>

</html>