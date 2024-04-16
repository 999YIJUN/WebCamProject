<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1D/2D Code掃描系統</title>
    <link href="assets/img/favicon.png" rel="icon">
    <?php $this->load->view('common/stylesheet'); ?>
    <!-- Template Main CSS File -->
    <link href="<?php echo base_url('theme/css/style.css'); ?>" rel="stylesheet">
</head>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <div href="" class="logo d-flex align-items-center">
                <img src="<?= base_url('theme/Logo.png') ?>" alt="">
                <span class="d-none d-lg-block">1D/2D Code掃描系統</span>
            </div>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->
    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= site_url('setting/index'); ?>">
                    <i class="bi bi-person-vcard"></i>
                    <span>URL</span>
                </a>
            </li><!-- End  Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= site_url('category/index'); ?>">
                    <i class="fa-solid fa-layer-group"></i><span>分類</span>
                </a>
            </li><!-- End  Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= site_url('web/index'); ?>">
                    <i class="bi bi-qr-code-scan"></i><span>QRCODE掃描</span>
                </a>
            </li><!-- End  Nav -->
        </ul>
    </aside><!-- End Sidebar-->

    <?php $this->load->view('common/script'); ?>
    <script src="<?php echo base_url('theme/js/main.js'); ?>"></script>
</body>

</html>