<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>Adicionar Pagamento</title>
        <!-- GLOBAL MAINLY STYLES-->
        <link href="<?= base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
        <!-- PLUGINS STYLES-->
        <link href="<?= base_url() ?>assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
        <!-- THEME STYLES-->
        <link href="<?= base_url() ?>assets/css/main.min.css" rel="stylesheet" />
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
                                    <div class="ibox-title">Adicionar Pagamento</div>
                                    <div class="ibox-tools">
                                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    </div>
                                </div>
                                <div class="ibox-body">
                                    <form action="<?= base_url() ?>pagamento/addPost" method="POST">
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label>Nome</label>
                                                <input value="<?= $alunos[0]->aluno_nome . ' ' . $alunos[0]->sobrenome ?>" class="form-control" disabled="" type="text" >
                                                <input name="id_aluno" type="hidden" value="<?= $alunos[0]->id_aluno ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label>Tipo de Pagamento</label>
                                                <select name="tipo" class="form-control">
                                                    <option value="1">Matricula</option>
                                                    <option value="2">Mensalidade</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label>Referencia</label>
                                                <select name="referencia" class="form-control">
                                                    <option value="TPA">TPA</option>
                                                    <option value="ATM">ATM</option>
                                                    <option value="Transferencia">Transferencia</option>
                                                    <option value="Deposito">Deposito</option>
                                                    <option value="Dinheiro">Dinheiro (Cash)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label>Valor a pagar (AKZ)</label>
                                                <input value="<?= $turma[0]->curso_preco ?>" class="form-control" type="number" disabled="">
                                                <input value="<?= $turma[0]->curso_preco ?>" type="hidden" name="valor">
                                            </div>
                                        </div>
                                        <div class="col-6 m-b-20">
                                            <label for="sel1">Com multa:</label>
                                            <div class="check-list2">
                                                <label class="ui-radio ui-radio-primary ui-checkbox-inline">
                                                    <input value="1" type="radio" name="multa">
                                                    <span class="input-span"></span>SIM</label>
                                                <label class="ui-radio ui-radio-primary ui-checkbox-inline">
                                                    <input value="0" type="radio" name="multa">
                                                    <span class="input-span"></span>NÃO</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label>Curso</label>
                                                <input value="<?= $turma[0]->curso_nome ?>" disabled="" class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label>Turma</label>
                                                <input value="<?= $turma[0]->turma_nome ?>" disabled="" class="form-control" type="text">
                                                <input type="hidden" name="id_turma" value="<?= $turma[0]->id_turma ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">Confirmar</button>
                                        </div>
                                    </form>
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
        <script src="<?= base_url() ?>/assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- PAGE LEVEL PLUGINS-->
        <script src="<?= base_url() ?>assets/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js" type="text/javascript"></script>
        <!-- CORE SCRIPTS-->
        <script src="<?= base_url() ?>assets/js/app.js" type="text/javascript"></script>
        <!-- PAGE LEVEL SCRIPTS-->
        <script src="<?= base_url() ?>assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
    </body>

</html>