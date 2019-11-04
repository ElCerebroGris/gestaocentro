<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>Ver Turma</title>
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
                    <h1 class="page-title">Perfil de Turma </h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html"><i class="la la-home font-20"></i></a>
                        </li>
                        <li class="breadcrumb-item">De: <?= $turma[0]->turma_nome ?></li>
                    </ol>
                </div>
                <!-- START PAGE CONTENT-->
                <div class="page-content fade-in-up">
                    <a href="#" class="btn btn-info">Imprimir Pauta</a>
                    <?php if ($turma[0]->id_estado == 1) { ?>
                        <a href="<?= base_url('turma/fechar/' . $turma[0]->id_turma) ?>" class="btn btn-info">Fechar</a>
                    <?php } else if ($turma[0]->id_estado == 2) { ?>
                        <a href="<?= base_url('turma/abrir/' . $turma[0]->id_turma) ?>" class="btn btn-info">Abrir</a>
                        <a href="<?= base_url('turma/terminar/' . $turma[0]->id_turma) ?>" class="btn btn-primary">Terminar</a>
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="ibox">
                                <div class="ibox-head">
                                    <div class="ibox-title">
                                        <h5 class="text-info m-b-20 m-t-20"><i class="fa fa-book"></i> Dados</h5>
                                    </div>
                                </div>
                                <div class="ibox-body">
                                    <li class="media">
                                        <div class="media-body">
                                            <div class="media-heading">Nome: </div>
                                            <div class="font-16"><?= $turma[0]->turma_nome ?></div>
                                            <div class="media-heading">Curso: </div>
                                            <div class="font-16"><?= $turma[0]->curso_nome ?></div>
                                            <div class="media-heading">Formador: </div>
                                            <div class="font-16"><?= $turma[0]->nome_completo ?></div>
                                            <div class="media-heading">Sala de Aula: </div>
                                            <div class="font-16"><?= $turma[0]->sala_descricao ?></div>
                                            <div class="media-heading">Horario: </div>
                                            <div class="font-16"><?= $turma[0]->horario_descricao ?></div>
                                            <div class="media-heading">Estado: </div>
                                            <div class="font-16"><?= $turma[0]->estado_descricao ?></div>
                                        </div>
                                    </li>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="ibox">
                                <div class="ibox-head">
                                    <div class="ibox-title">
                                        <h5 class="text-info m-b-20 m-t-20"><i class="fa fa-book"></i> Alunos</h5>
                                    </div>
                                </div>
                                <div class="ibox-body">
                                    <table class="table table-striped table-bordered table-hover" id="example-table1" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Nome</th>
                                                <!--<th>Nota</th>-->
                                                <th>Opções</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($alunos2 as $a) {
                                                ?>
                                                <tr><td><?= $a->id_aluno ?></td>
                                                    <td><a href="<?= base_url('aluno/ver/' . $a->id_aluno) ?>"><?= $a->aluno_nome . ' ' . $a->sobrenome ?></a></td>
                                                    <!--<td>0</td>-->
                                                    <td>
                                                        <?php if ($this->session->userdata('nivel') == 1 || $this->session->userdata('nivel') == 3) { ?>
                                                            <a class="btn btn-dark" href="<?= base_url('turma/anularMatricula/' . $turma[0]->id_turma . '/' . $a->id_aluno) ?>">Anular</a>
                                                        <?php } ?>
                                                        <?php if ($this->session->userdata('nivel') == 5) { ?>
                                                            <!--<a class="btn btn-info" 
                                                               href="#">Atribuir Nota</a>-->
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
                    <div class="row">
                        <div class="col-md-7">
                            <div class="ibox">
                                <div class="ibox-head">
                                    <div class="ibox-title">
                                        <h5 class="text-info m-b-20 m-t-20"><i class="fa fa-book"></i> Alunos Pré Inscritos</h5>
                                    </div>
                                </div>
                                <div class="ibox-body">
                                    <table class="table table-striped table-bordered table-hover" id="example-table1" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Nome</th>
                                                <th>Opções</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($alunos1 as $a) {
                                                ?>
                                                <tr><td><?= $a->id_aluno ?></td>
                                                    <td><a href="<?= base_url('aluno/ver/' . $a->id_aluno) ?>"><?= $a->aluno_nome . ' ' . $a->sobrenome ?></a></td>

                                                    <td>
                                                        <?php if ($this->session->userdata('nivel') == 1 || $this->session->userdata('nivel') == 3) { ?>
                                                            <a class="btn btn-dark" href="<?= base_url('turma/anularMatricula/' . $turma[0]->id_turma . '/' . $a->id_aluno) ?>">Anular</a>
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