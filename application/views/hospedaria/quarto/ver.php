<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>Perfil do Curso</title>
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
                    <h1 class="page-title">Perfil </h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html"><i class="la la-home font-20"></i></a>
                        </li>
                        <li class="breadcrumb-item">De: <?= $cursos[0]->curso_nome ?></li>
                    </ol>
                </div>
                <!-- START PAGE CONTENT-->
                <div class="page-content fade-in-up">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="ibox">
                                <div class="ibox-head">
                                    <div class="ibox-title">
                                        <h5 class="text-info m-b-20 m-t-20"><i class="fa fa-book"></i> Dados</h5>
                                    </div>
                                </div>
                                <div class="ibox-body">
                                    <li class="media">
                                        <div class="media-img"><i class="ti-user font-18 text-muted"></i></div>
                                        <div class="media-body">
                                            <div class="media-heading">Nome:</div>
                                            <div class="font-13"><?= $cursos[0]->curso_nome ?></div>
                                        </div>
                                    </li>
                                    <br>
                                    <li class="media">
                                        <div class="media-img"><i class="ti-info-alt font-18 text-muted"></i></div>
                                        <div class="media-body">
                                            <div class="media-heading">Codigo:</div>
                                            <div class="font-13"><?= $cursos[0]->curso_codigo ?></div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-img"><i class="ti-info-alt font-18 text-muted"></i></div>
                                        <div class="media-body">
                                            <div class="media-heading">Preço:</div>
                                            <div class="font-13"><?= $cursos[0]->curso_preco ?> Kz</div>
                                        </div>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ibox">
                                <div class="ibox-head">
                                    <div class="ibox-title">
                                        <h5 class="text-info m-b-20 m-t-20"><i class="fa fa-book"></i> Alunos</h5>
                                    </div>
                                </div>
                                <div class="ibox-body">
                                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Opções</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($alunos as $a) {
                                                ?>
                                                <tr>
                                                    <td><a href="<?= base_url('aluno/ver/'.$a->id_aluno) ?>">
                                                        <?= $a->aluno_nome.' '.$a->sobrenome ?>
                                                        </a></td>
                                                    <td><a href="#" 
                                                           class="btn btn-info btn-sm">Certificado</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
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
        <!-- PAGE LEVEL PLUGINS-->
        <script src="<?= base_url() ?>assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#example-table').DataTable({
                    responsive: true,

                    "language": {
                        "sProcessing": "Processando...",
                        "sLengthMenu": "Mostrar _MENU_ registros",
                        "sZeroRecords": "Não existe resultados",
                        "sEmptyTable": "Nenhum dado disponivel nesta tabela",
                        "sInfo": "Mostrando registros de _START_ à _END_ de um total de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando registros de 0 à 0 de um total de 0 registros",
                        "sInfoFiltered": "(filtrando de um total de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sSearch": "Buscar:",
                        "sUrl": "",
                        "sInfoThousands": ",",
                        "sLoadingRecords": "Carregando...",
                        "oPaginate": {
                            "sFirst": "Primeiro",
                            "sLast": "Último",
                            "sNext": "Seguinte",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending": ": Activar para ordenar a coluna de maneira ascendente",
                            "sSortDescending": ": Activar para ordenar a coluna de maneira descendente"
                        }
                    }
                });
            });
        </script>

        <!-- CORE SCRIPTS-->
        <script src="<?= base_url() ?>assets/js/app.js" type="text/javascript"></script>
    </body>

</html>