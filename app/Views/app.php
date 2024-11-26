<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAFAMI</title>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">

    <!-- Site Metas -->
    <title>CAFAMI - One page HTML Responsive</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="<?= base_url('assets/images/image.ico'); ?>" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?= base_url('assets/images/apple-touch-icon.png'); ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">

    <!-- Site CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/responsive.css'); ?>">

    <!-- color -->
    <link id="changeable-colors" rel="stylesheet" href="<?= base_url('assets/colors/orange.css'); ?>">

    <!-- Modernizer -->
    <script src="<?= base_url('assets/js/modernizer.js'); ?>"></script>

    <!-- <link rel="stylesheet" href="<?= base_url('template2'); ?>/assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('template2'); ?>/assets/css/vendor/animate.min.css">
    <link rel="stylesheet" href="<?= base_url('template2'); ?>/assets/css/plugins/swiper.min.css">
    <link rel="stylesheet" href="<?= base_url('template2'); ?>/assets/css/vendor/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url('template2'); ?>/assets/css/vendor/fontawesome-pro.css">
    <link rel="stylesheet" href="<?= base_url('template2'); ?>/assets/css/vendor/spacing.css"> 
    <link rel="stylesheet" href="<?= base_url('template2'); ?>/assets/css/plugins/odometer-theme-default.css">
    <link rel="stylesheet" href="<?= base_url('template2'); ?>/assets/css/main.css"> -->
</head>

<body>
    <div id="loader">
        <div id="status"></div>
    </div>
</body>

<?= $this->include("layouts/header") ?>
<!-- end header -->

<!-- end site-header -->
<?= $this->renderSection('content') ?>

<!-- end banner -->
<?= $this->include("layouts/footer") ?>

<!-- ALL JS FILES -->
<script src="<?= base_url('assets/js/all.js'); ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>

<!-- ALL PLUGINS -->
<script src="<?= base_url('assets/js/custom.js'); ?>"></script>

<?= $this->renderSection('script') ?>

</html>