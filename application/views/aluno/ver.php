<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>Perfil do Aluno</title>
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
                        <li class="breadcrumb-item">De: <?= $alunos[0]->aluno_nome . ' ' . $alunos[0]->sobrenome ?></li>
                    </ol>
                </div>
                <!-- START PAGE CONTENT-->
                <div class="page-content fade-in-up">
                    <a href="#" class="btn btn-info btn-sm">Imprimir Cartão</a>
                    <div class="row">
                        <div class="col-md-6">
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
                                            <div class="media-heading">Nome:</div>
                                            <div class="font-13"><?= $alunos[0]->aluno_nome . ' ' . $alunos[0]->sobrenome ?></div>
                                        </div>
                                    </li>
                                    <br>
                                    <li class="media">
                                        <div class="media-img"><i class="ti-info-alt font-18 text-muted"></i></div>
                                        <div class="media-body">
                                            <div class="media-heading">BI:</div>
                                            <div class="font-13"><?= $alunos[0]->num_bi ?></div>
                                        </div>
                                    </li>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="ibox">
                                <div class="ibox-head">
                                    <div class="ibox-title">
                                        <h5 class="text-info m-b-20 m-t-20"><i class="fa fa-book"></i> Turmas Pré inscritas</h5>
                                    </div>
                                </div>
                                <div class="ibox-body">
                                    <li class="media">
                                        <div class="media-body">
                                            <table class="table table-striped table-bordered table-hover" id="example-table1" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Nome</th>
                                                        <th>Opções</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($turmas as $t) {
                                                        ?>
                                                        <tr>
                                                            <td><a href="<?= base_url('turma/ver/' . $t->id_turma) ?>"><?= $t->turma_nome ?></a></td>
                                                            <td>
                                                                <?php if ($this->session->userdata('nivel') == 1 || $this->session->userdata('nivel') == 3) { ?>
                                                                    <a class="btn btn-dark" href="<?= base_url('turma/anularMatricula/' . $t->id_turma . '/' . $alunos[0]->id_aluno) ?>">Anular</a>
                                                                <?php } ?>
                                                                <?php if ($this->session->userdata('nivel') == 4) { ?>
                                                                    <a target="_blank" href="<?= base_url('pagamento/add/' . $alunos[0]->id_aluno . '/' . $t->id_turma) ?>" 
                                                                       class="btn btn-info btn-sm">Pagar Matricula</a>
                                                                   <?php } ?>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="ibox">
                                <div class="ibox-head">
                                    <div class="ibox-title">
                                        <h5 class="text-info m-b-20 m-t-20"><i class="fa fa-book"></i> Turmas Inscritas</h5>
                                    </div>
                                </div>
                                <div class="ibox-body">
                                    <table class="table table-striped table-bordered table-hover" id="example-table1" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Opções</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($turmas2 as $t) {
                                                ?>
                                                <tr>
                                                    <td><a href="<?= base_url('turma/ver/' . $t->id_turma) ?>"><?= $t->turma_nome ?></a></td>
                                                    <td>
                                                        <?php if ($this->session->userdata('nivel') == 1 || $this->session->userdata('nivel') == 3) { ?>
                                                            <a class="btn btn-dark" href="<?= base_url('turma/anularMatricula/' . $t->id_turma . '/' . $alunos[0]->id_aluno) ?>">Anular</a>
                                                        <?php } ?>
                                                        <?php if ($this->session->userdata('nivel') == 4) { ?>
                                                            <a target="_blank" href="<?= base_url('pagamento/add/' . $alunos[0]->id_aluno . '/' . $t->id_turma) ?>" 
                                                               class="btn btn-info">Mensalidade</a>
                                                           <?php } ?>
                                                        <a target="_blank" href="<?= base_url('turma/fichaAluno/' . $alunos[0]->id_aluno . '/' . $t->id_turma) ?>" 
                                                           class="btn btn-info">Ficha</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="ibox">
                                <div class="ibox-head">
                                    <div class="ibox-title">
                                        <h5 class="text-info m-b-20 m-t-20"><i class="fa fa-book"></i> Cursos feitos</h5>
                                    </div>
                                </div>
                                <div class="ibox-body">
                                    <table class="table table-striped table-bordered table-hover" id="example-table1" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($cursos as $c) {
                                                ?>
                                                <tr>
                                                    <td><a href="<?= base_url('curso/ver/' . $c->id_curso) ?>"><?= $c->curso_nome ?></a></td>

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