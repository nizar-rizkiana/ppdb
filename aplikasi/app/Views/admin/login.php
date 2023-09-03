<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.1
* @link https://coreui.io
* Copyright (c) 2022 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="manifest" href="<?= base_url() ?>/assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= base_url() ?>/assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="<?= base_url() ?>/vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="<?= base_url() ?>/css/vendors/simplebar.css">
    <!-- Main styles for this application-->
    <link href="<?= base_url() ?>/css/style.css" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <link href="<?= base_url() ?>/css/examples.css" rel="stylesheet">
    <!-- icon -->
    <link href="<?= base_url() ?>/vendors/@coreui/icons/css/free.min.css">
    </link:hr>
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>

</head>

<body>
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
            <?php if(session()->getFlashdata('gagal')) : ?>
            <div class="alert alert-danger" role="alert"><?= session()->getFlashdata('gagal'); ?></div>
            <?php endif; ?>
            <?php if(session()->getFlashdata('berhasil')) : ?>
            <div class="alert alert-success" role="alert"><?= session()->getFlashdata('berhasil'); ?></div>
            <?php endif; ?>
                <div class="col-lg-5">
                    <div class="card-group d-block d-md-flex row">
                        <div class="card col-md-5 p-4 mb-0">
                            <div class="card-body">
                                <h1>Login</h1>
                                <p class="text-medium-emphasis">Masuk ke akun anda</p>
                                <form action="<?= base_url() ?>/admin/auth/login" method="post">
                                    <?php csrf_token(); ?>
                                    <div class="input-group mb-3"><span class="input-group-text">
                                            <svg class="icon">
                                                <use xlink:href="<?= base_url() ?>/vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                                            </svg></span>
                                        <input class="form-control" type="text" placeholder="Email" name="email" required>
                                    </div>
                                    <div class="input-group mb-4"><span class="input-group-text">
                                            <svg class="icon">
                                                <use xlink:href="<?= base_url() ?>/vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                            </svg></span>
                                        <input class="form-control" type="password" placeholder="Password" name="password" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-primary px-4" type="submit">Login</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="<?= base_url() ?>/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="<?= base_url() ?>/vendors/simplebar/js/simplebar.min.js"></script>
    <script>
    </script>

</body>

</html>