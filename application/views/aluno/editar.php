<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>Editar Aluno</title>
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
                                    <div class="ibox-title">Editar Aluno</div>
                                    <div class="ibox-tools">
                                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>

                                    </div>
                                </div>
                                <div class="ibox-body">
                                    <form action="<?= base_url() ?>aluno/editarPost" method="POST">
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label>Nome</label>
                                                <input name="id_aluno" type="hidden" value="<?= $alunos[0]->id_aluno ?>" />
                                                <input value="<?= $alunos[0]->aluno_nome ?>" class="form-control" type="text" name="nome" required="">
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Apelido</label>
                                                <input value="<?= $alunos[0]->sobrenome ?>" class="form-control" type="text" name="sobrenome" required="">
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Nº do BI:</label>
                                                <input value="<?= $alunos[0]->num_bi ?>" name="num_bi" class="form-control" type="text" required="">
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Residencia:</label>
                                                <input value="<?= $alunos[0]->residencia ?>" name="residencia" class="form-control" type="text" required="">
                                            </div>
                                            <div class="col-6 m-b-20">
                                                <label for="sel1">Sexo:</label>
                                                <div class="check-list2">
                                                    <label class="ui-radio ui-radio-primary ui-checkbox-inline">
                                                        <input value="M" type="radio" name="sexo">
                                                        <span class="input-span"></span>Masculino</label>
                                                    <label class="ui-radio ui-radio-primary ui-checkbox-inline">
                                                        <input value="F" type="radio" name="sexo">
                                                        <span class="input-span"></span>Femenino</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label for="sel1">Nivel Academico:</label>
                                                <select name="nivel_academico" class="form-control" id="sel1">
                                                    <option value="Secundario">Secundario</option>
                                                    <option value="Bacharelato">Bacharelato</option>
                                                    <option value="Licenciatura">Licenciatura</option>
                                                    <option value="Mestrado">Mestrado</option>
                                                    <option value="Doutoramento">Doutoramento</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Telefone:</label>
                                                <input value="<?= $alunos[0]->telefone ?>" name="telefone" class="form-control" type="text">
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Telefone 2:</label>
                                                <input value="<?= $alunos[0]->telefone2 ?>" name="telefone2" class="form-control" type="text">
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Email:</label>
                                                <input value="<?= $alunos[0]->email ?>" name="email" class="form-control" type="email">
                                            </div>
                                            <div class="col-6 m-b-20">
                                                <label for="sel1">Trabalhador:</label>
                                                <div class="check-list2">
                                                    <label class="ui-radio ui-radio-primary ui-checkbox-inline">
                                                        <input value="S" type="radio" name="trabalhador">
                                                        <span class="input-span"></span>SIM</label>
                                                    <label class="ui-radio ui-radio-primary ui-checkbox-inline">
                                                        <input value="N" type="radio" name="trabalhador">
                                                        <span class="input-span"></span>NÃO</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">Salvar</button>
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