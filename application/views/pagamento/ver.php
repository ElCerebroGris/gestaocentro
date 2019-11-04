<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>Ver Livro</title>
        <!-- GLOBAL MAINLY STYLES-->
        <link href="<?= base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
        <!-- PLUGINS STYLES-->
        <link href="<?= base_url() ?>assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
        <!-- THEME STYLES-->
        <link href="<?= base_url() ?>assets/css/main.min.css" rel="stylesheet" />
        <!-- PAGE LEVEL STYLES-->
        <link href="<?= base_url() ?>assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />
        <!-- PAGE LEVEL STYLES-->
        <link href='<?= base_url() ?>assets/css/themes/green-light.css' rel='stylesheet' id='theme-style' />
    </head>

    <body class="fixed-navbar">
        <div class="page-wrapper">
            <!--SIDEBAR-->
            <?php include APPPATH . 'views/includes/header.php'; ?>

            <div class="content-wrapper">

                <div class="page-heading">
                    <h1 class="page-title">Perfil de </h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html"><i class="la la-home font-20"></i></a>
                        </li>
                        <li class="breadcrumb-item">De: </li>
                    </ol>
                </div>
                <!-- START PAGE CONTENT-->
                <div class="page-content fade-in-up">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="ibox">
                                <div class="ibox-head">
                                    <div class="ibox-title">
                                        <h5 class="text-info m-b-20 m-t-20"><i class="fa fa-book"></i> Dados Pessoas</h5>
                                    </div>
                                </div>
                                <div class="ibox-body">
                                    <li class="media">
                                        <div class="media-img"><i class="ti-user font-18 text-muted"></i></div>
                                        <div class="media-body">
                                            <div class="media-heading">Nº de entrada</div>
                                            <div class="font-13"></div>
                                        </div>
                                    </li>
                                    <br>
                                    <li class="media">
                                        <div class="media-img"><i class="ti-info-alt font-18 text-muted"></i></div>
                                        <div class="media-body">
                                            <div class="media-heading">Data de entrada</div>
                                            <div class="font-13"></div>
                                        </div>
                                    </li>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="ibox">
                                <div class="ibox-head">
                                    <div class="ibox-title">
                                        <h5 class="text-info m-b-20 m-t-20"><i class="fa fa-book"></i> Formação</h5>
                                    </div>
                                </div>
                                <div class="ibox-body">
                                    <li class="media">
                                        <div class="media-img"><i class="ti-user font-18 text-muted"></i></div>
                                        <div class="media-body">
                                            <div class="media-heading">Autor</div>
                                            <div class="font-13"></div>
                                        </div>
                                    </li>
                                    <br>
                                    <li class="media">
                                        <div class="media-img"><i class="ti-book font-18 text-muted"></i></div>
                                        <div class="media-body">
                                            <div class="media-heading">Titulo</div>
                                            <div class="font-13"></div>
                                        </div>
                                    </li>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="ibox">
                                <div class="ibox-head">
                                    <div class="ibox-title">
                                        <h5 class="text-info m-b-20 m-t-20"><i class="fa fa-book"></i> Opções</h5>
                                    </div>
                                </div>
                                <div class="ibox-body">
                                    <li class="media">
                                        <div class="media-body">
                                            <div class="media-heading">
                                                <a href="#" class="btn btn-info btn-sm">Imprimir Cartão</a></div>
                                            <div class="font-13"></div>
                                        </div>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PAGE CONTENT-->
                <!-- FOOTER -->
                <?php include APPPATH . 'views/includes/footer.php'; ?>
            </div>
        </div>
        <!-- BEGIN PAGA BACKDROPS-->
        <div class="sidenav-backdrop backdrop"></div>
        <div class="preloader-backdrop">
            <div class="page-preloader">Loading</div>
        </div>
        <!-- END PAGA BACKDROPS-->
        <!-- CORE PLUGINS-->
        <script src="<?= base_url() ?>assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- PAGE LEVEL PLUGINS-->

        <!-- CORE SCRIPTS-->
        <script src="<?= base_url() ?>assets/js/app.js" type="text/javascript"></script>
        <!-- PAGE LEVEL SCRIPTS-->
        <script src="<?= base_url() ?>assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
    </body>

</html>