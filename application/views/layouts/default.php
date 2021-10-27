<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?= $template['metadata'] ?>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- Bootstrap 5 Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css" />

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet" />

    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>/css/style.css" />
    <!-- <?= $template['css'] ?> -->
    <!-- <?= $template['js'] ?> -->
    <title><?= $title; ?></title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top" id="navbar">
        <div class="container">
            <a class="navbar-brand fw-bolder" href="#">SIPENA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link bt active" aria-current="page" href="<?= base_url('home_page') ?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bt" href="<?= base_url('tentang') ?>">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bt" href="">Donasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bt" href="<?= base_url('ceritasantri') ?>">Cerita santri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bt" href="<?= base_url('event') ?>">Event</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link bt" aria-current="page" href="#"><i class="bi bi-telephone-fill"></i> (0351) 1117-555</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <?= $template['body'] ?>


    <!-- Footer -->
    <footer style="background-color: #0f111d" id="footer">
        <div class="container py-5">
            <div class="row text-white">
                <div class="col-lg-2">
                    <p>Tentang</p>
                    <p>Tata cara</p>
                    <p>Patner kami</p>
                    <p>Event</p>
                </div>
                <div class="col-lg-2">
                    <p>Cerita Santri</p>
                    <p>Bantuan</p>
                    <p>Kerja sama</p>
                </div>
                <div class="col-lg text-end">
                    <p>Alamat Istana Yatim</p>
                    <p>Jalan Jakara No 98, Jakarta Barat Tangeran Selatan</p>
                    <p>2021 © Wigman Studio.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->
</body>

<!-- Jquery -->
<script type="text/javascript" src="<?= base_url('assets/frontend/') ?>js/jquery-3.3.1.slim.min.js"></script>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- My JS -->
<script src="<?= base_url('assets/frontend/') ?>js/script.js"></script>

</html>