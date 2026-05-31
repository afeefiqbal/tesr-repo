<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('web/images/logo.png')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(config('app.name')); ?> | <?php echo isset($title)?$title:'Custom Page'?></title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?php echo e(asset('app/plugins/fontawesome-free/css/all.min.css')); ?>">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('app/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('app/plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('app/plugins/jqvmap/jqvmap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('app/dist/css/adminlte.min.css')); ?>">    
    <link rel="stylesheet" href="<?php echo e(asset('app/plugins/select2/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('app/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('app/kartik-v-bootstrap/css/fileinput.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('app/kartik-v-bootstrap/themes/explorer-fas/theme.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('app/fancy_box/source/jquery.fancybox.css?v=2.1.5')); ?>" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('app/fancy_box/source/helpers/jquery.fancybox-buttons.css?v=1.0.5')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('app/fancy_box/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('app/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('app/dist/css/daterangepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('app/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('app/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('app/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('app/dist/css/sweetalert.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('app/dist/css/sweetalert-overrides.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('app/dist/css/custom.css')); ?>">
    <script src="<?php echo e(asset('app/plugins/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app/kartik-v-bootstrap/js/plugins/sortable.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('app/kartik-v-bootstrap/js/fileinput.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('app/kartik-v-bootstrap/js/locales/fr.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('app/kartik-v-bootstrap/js/locales/es.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('app/kartik-v-bootstrap/themes/fas/theme.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('app/kartik-v-bootstrap/themes/explorer-fas/theme.js')); ?>" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app/tooltipster/css/tooltipster.bundle.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('app/plugins/summernote/summernote-bs4.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app/tooltipster/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-punk.min.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="https://louisameline.github.io/tooltipster-follower/dist/css/tooltipster-follower.min.css" />
    <script type="text/javascript">
        var base_url = "<?php echo e(url('/admin/')); ?>";
        var fc_path = "<?php echo e(asset('/')); ?>";
        var token = "<?php echo e(csrf_token()); ?>";
    </script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo e(asset('app/dist/img/logo.png')); ?>" alt="<?php echo e(config('app.name')); ?>">
        </div>
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <picture>
                            <img src="<?php echo e(asset('app/dist/img/user-default.png')); ?>" class="user-image img-circle elevation-2" alt="default image">
                        </picture>
                        <span class="d-none d-md-inline"><?php echo e(loggedUserName()); ?></span>
                    </a>
                <ul class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header" style="margin-top: 10px;">
                        <picture>
                            <img src="<?php echo e(asset('app/dist/img/user-default.png')); ?>" style="height: 90px;width: 90px;border-radius: 50%;" class="img-circle elevation-2" alt="default image">
                        </picture>
                        <p>
                            <?php echo e(loggedUserName()); ?>

                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer d-flex justify-content-center">
                        <a href="<?php echo e(url(sitePrefix().'logout')); ?>" class="btn btn-default btn-flat">Sign out</a>
                    </li>
                </ul>
                </li>
            </ul>
        </nav>
        <?php echo $__env->make('app.includes.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <footer class="main-footer">
            <strong>© <?php echo e(date('Y')); ?> <?php echo e(config('app.name')); ?> All rights reserved. Design and Developed by 
                <a href="https://www.hexacodesmarketing.com">Hexacodes Marketing LLP</a>
            </strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer>
        <aside class="control-sidebar control-sidebar-dark"></aside>
        <div class="modal fade" id="modalWindow">
            <div class="modal-dialog" id="modalContent">

            </div>
        </div>
    </div>
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="<?php echo e(asset('app/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app/plugins/select2/js/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app/plugins/chart.js/Chart.min.js')); ?>"></script> 
    <script src="<?php echo e(asset('app/plugins/moment/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script> 
    <script src="<?php echo e(asset('app/dist/js/tinymce.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app/fancy_box/lib/jquery.mousewheel.pack.js?v=3.1.3')); ?>"></script>
    <script src="<?php echo e(asset('app/fancy_box/source/jquery.fancybox.pack.js?v=2.1.5')); ?>"></script>
    <script src="<?php echo e(asset('app/fancy_box/source/helpers/jquery.fancybox-buttons.js?v=1.0.5')); ?>"></script>
    <script src="<?php echo e(asset('app/fancy_box/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7')); ?>"></script>
    <script src="<?php echo e(asset('app/fancy_box/source/helpers/jquery.fancybox-media.js?v=1.0.6')); ?>"></script>
    <script src="<?php echo e(asset('app/plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app/plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app/plugins/jszip/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app/plugins/pdfmake/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app/plugins/pdfmake/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('app/plugins/datatables-buttons/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app/plugins/datatables-buttons/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app/plugins/datatables-buttons/js/buttons.colVis.min.js')); ?>"></script> 
    <script src="<?php echo e(asset('app/plugins/bootstrap-switch/js/bootstrap-switch.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app/dist/js/adminlte.js')); ?>"></script>
    <script src="<?php echo e(asset('app/dist/js/demo.js')); ?>"></script>
    <script src="<?php echo e(asset('app/dist/js/sweetalert.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app/dist/js/sweetalert-init.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('app/tooltipster/js/tooltipster.bundle.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.7.1/clipboard.min.js"></script>
    <script src="<?php echo e(asset('app/dist/js/daterangepicker.js')); ?>"></script>
    <script type="text/javascript" src="https://louisameline.github.io/tooltipster-follower/dist/js/tooltipster-follower.min.js"></script>
    <script type="text/javascript" src="https://louisameline.github.io/tooltipster-discovery/tooltipster-discovery.min.js"></script>
    <script src="<?php echo e(asset('app/dist/js/custom.js?v=1.3')); ?>"></script>
</body>
</html><?php /**PATH /home/u864165095/domains/medweuae.com/public_html/resources/views/app/layouts/main.blade.php ENDPATH**/ ?>