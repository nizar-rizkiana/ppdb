<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?= $title; ?></title>
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
    <link href="<?= base_url() ?>/vendors/@coreui/icons/css/free.min.css"></link:hr>
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <!-- data tables style -->
    <link rel="stylesheet" href="<?= base_url() ?>/DataTables/datatables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/2.1.2/css/searchPanes.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.6.2/css/select.dataTables.min.css">

  
</head>

<body>
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
        <div class="sidebar-brand d-none d-md-flex">
            <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="<?= base_url() ?>/vendors/@coreui/icons/svg/free.svg#cil-school"></use>
            </svg>
            <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
                <use xlink:href="<?= base_url() ?>/vendors/@coreui/icons/svg/free.svg#cil-school"></use>
            </svg>
        </div>
        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
            <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>/dashboard">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url() ?>/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                    </svg> Dashboard</a></li>
            <li class="nav-title">Data</li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>/peserta-baru">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url() ?>/vendors/@coreui/icons/svg/free.svg#cil-group"></use>
                    </svg>Peserta baru</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>/seleksi-berkas">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url() ?>/vendors/@coreui/icons/svg/free.svg#cil-file"></use>
                    </svg>Seleksi berkas</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>/peserta">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url() ?>/vendors/@coreui/icons/svg/free.svg#cil-school"></use>
                    </svg>Peserta</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>/tambah-admin">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url() ?>/vendors/@coreui/icons/svg/free.svg#cil-user-plus"></use>
                    </svg>Tambah admin</a></li>
            
        </ul>
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <header class="header header-sticky mb-4">
            <div class="container-fluid">
                <button class="header-toggler px-md-0 me-md-3" type="button"
                    onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                    <svg class="icon icon-lg">
                        <use xlink:href="<?= base_url() ?>/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
                    </svg>
                </button><a class="header-brand d-md-none" href="<?= base_url() ?>">
                    <svg width="118" height="46" alt="CoreUI Logo">
                        <use xlink:href="<?= base_url() ?>/vendors/@coreui/icons/svg/free.svg#cil-camera"></use>
                    </svg></a>
                <ul class="header-nav ms-3">
                    <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#"
                            role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-md"><img class="avatar-img" src="<?= base_url() ?>/assets/img/avatars/default-avatar.webp"
                                    alt="user@email.com">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <div class="dropdown-header bg-light py-2">
                                <div class="fw-semibold">Account</div>
                            </div>
                            <p class="dropdown-item">
                            <svg class="icon me-2">
                                <use xlink:href="<?= base_url() ?>/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                            </svg>
                            <?= session()->get('nama_admin') ?></p>
                            <a class="dropdown-item" href="<?= base_url() ?>/auth/logout">
                                <svg class="icon me-2">
                                    <use xlink:href="<?= base_url() ?>/vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                                </svg>
                            Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">

            <?= $this->renderSection('content'); ?>

            </div>
        </div>
        <footer class="footer">
            <div>© 2023
                Me</div>
                
        </footer>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="<?= base_url() ?>/js/jquery-3.5.1.js"></script>
    <script src="<?= base_url() ?>/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="<?= base_url() ?>/vendors/simplebar/js/simplebar.min.js"></script>
    <script src="<?= base_url() ?>/DataTables/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/searchpanes/2.1.2/js/dataTables.searchPanes.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.6.2/js/dataTables.select.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#table').DataTable();
            <?php if($title == 'Admin | Peserta Baru') : ?>
            $('#table-baru').DataTable({
                dom: 'Plfrtip',
                columnDefs: [
                    {
                        searchPanes: {
                            show: true
                        },
                        targets: [4]
                    },
                    {
                        searchPanes: {
                            show: false
                        },
                        targets: [2]
                    }
                ]
            });
            <?php endif; ?>
        });
    </script>

</body>

</html>