<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Asrama Istana Yatim, Yayasan Keluarga Muslim The Castilla</title>
  <link rel="stylesheet" href="<?= base_url('assets/user/') ?>bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
  <link rel="stylesheet" href="<?= base_url('assets/user/') ?>fonts/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/user/') ?>fonts/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/user/') ?>css/styles.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
  <link rel="icon" href="<?= base_url('assets/images/logo/') ?>istanayatim.jpg" type="image/gif" sizes="16x16">

</head>

<body>
  <?php $this->load->view('user/template/nav'); ?>
  <div class="container" style="margin-top: 41px;">
    <div class="row">
      <div class="col" style="padding-top: 1px;">
        <h1 align="center">Cerita Santri</h1>
        <form method="POST" class="search-form" action="<?= base_url('Ceritasantri-Search') ?>" enctype="multipart/form-data">
          <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-search"></i></span></div>
            <input class="form-control" type="text" name="keyword" placeholder="Saya Mencari..">
            <div class="input-group-append"><button class="btn btn-light" type="submit" style="border-style: solid;border-color: rgb(136,144,152);">Cari</button></div>
          </div>
        </form>
      </div>
    </div>

    <?php function limit_text($text, $limit) {
        if (str_word_count($text, 0) > $limit) {
          $words = str_word_count($text, 2);
          $pos   = array_keys($words);
          $text  = substr($text, 0, $pos[$limit]) . '....';
        }
        return $text;
      } ?>

    <div class="row" style="padding-top: 0px;">
      <div class="col-md-9" style="margin-top: 56px;">
        <?php foreach ($ceritasantri as $c) { ?>
        <div class="row" style="padding-top: 10px;border-right: 2px solid rgb(172,174,177) ;">
          <div class="col-xl-9 offset-xl-1" style="padding-top: 0px;">
            <div class="card-group">
              <div class="card"><a href="<?= base_url('Ceritasantri-Detail/') . $c['slug_ceritasantri']  ?>"><img class="img-fluid card-img-top w-100 d-block"
                    src="<?= base_url('assets/images/ceritasantri/') . $c['img_ceritasantri'] ?>" style="height: 247.797px;"></a>
                <div class="card-body">
                  <a style="color: black" href="<?= base_url('Ceritasantri-Detail/') . $c['slug_ceritasantri']  ?>">
                    <h4 class="card-title"><?= $c['judul_ceritasantri'] ?></h4>
                  </a>
                  <p class="d-xl-flex justify-content-xl-end card-text"><?= limit_text($c['isi_ceritasantri'], 30) ?><a style="color: grey;"
                      href="<?= base_url('Ceritasantri-Detail//') . $c['slug_ceritasantri']  ?>">Selengkapnya</a></p><label class="d-xl-flex justify-content-xl-end align-items-xl-center"
                    style="text-align: right;">Penulis: <?= $c['penulis_ceritasantri'] ?></label><label class="d-xl-flex justify-content-xl-end align-items-xl-center"> Dilihat <i
                      class="fa fa-eye"></i>&nbsp; <?= $c['lihat_ceritasantri'] ?></label>
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
    <div class="row">
      <div class="col">
        <!--Tampilkan pagination-->
        <?php echo $pagination; ?>
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