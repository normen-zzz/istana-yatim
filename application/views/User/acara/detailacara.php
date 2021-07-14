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
    <?php $this->load->view('user/template/nav'); ?>
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
                <p style="text-align: center;"><?= strftime("%A %d-%B-%Y %T", strtotime($acara->tgl_acara)) ?></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-10 offset-xl-1">
                <h1 class="text-center">Form Pendaftaran</h1>
                <form method="post" action="<?= base_url('User/tambahformAct') ?>" enctype="multipart/form-data" style="text-align: center;">
                    <input type="number" name="acara" value="<?= $acara->id_acara ?>" hidden>
                    <input type="text" name="judul" value="<?= $acara->tema_acara ?>" hidden>
                    <input type="text" name="slug" value="<?= $acara->slug_acara ?>" hidden>
                    <label for="nama" style="margin-right: 5px;"><strong>Nama</strong>
                        <input class="form-control" type="text" name="nama"></label>
                           <select name ="kelamin">
                            <option selected>Pilih Jenis Kelamin</option>
                                <option value="laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                      </select>
                      <label for="nomor" style="margin-right: 5px;"><strong>No. Whatsapp</strong><br>
                        <input class="form-control" type="text" placeholder="08123445xxx" name="nomor"></label>
                        <div class="form-row">
                            <div class="col" style="padding-top: 9px;"><button class="btn btn-primary" type="submit">Tambah</button></div>
                        </div>
                    </form>
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