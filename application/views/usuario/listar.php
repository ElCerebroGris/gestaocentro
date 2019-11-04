<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>Lista de Usuario</title>
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
                <!-- START PAGE CONTENT-->
                <div class="page-content fade-in-up">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ibox">
                                <div class="ibox-head">
                                    <div class="ibox-title">Lista de Usuario</div>
                                    <div class="ibox-tools">
                                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    </div>
                                </div>
                                <div class="ibox-body">
                                    <table class="table table-striped table-bordered table-hover" id="example-table1" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Nome de Usuario</th>
                                                <th>Nivel</th>
                                                <th>Opções</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($usuarios as $u) {
                                                ?>
                                                <tr><td><?= $u->nome_completo ?></td>
                                                    <td><?= $u->nome_usuario ?></td>
                                                    <td><?= $u->descricao ?></td>

                                                    <td>
                                                        <?php if ($this->session->userdata('nivel') == 1) { ?>
                                                            <a class="btn btn-sm btn-danger" 
                                                               onclick="return confirm('Deseja realmente excluir?');"
                                                               href="<?= base_url('usuario/remover/' . $u->id_usuario) ?>">Eliminar</a>
                                                           <?php } ?>
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
        <!-- CORE PLUGINS-->
        <script src="<?= base_url() ?>assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
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
        <!-- PAGE LEVEL SCRIPTS-->
        <script src="<?= base_url() ?>assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
    </body>

</html>