<?php
$months = array("JANEIRO", "FEVEREIRO", "MARÇO", "ABRIL", "MAIO", "JUNHO", "JULHO", "AGOSTO", "SETEMBRO",
    "OUTUBRO", "NOVEMBRO", "DEZEMBRO");
$ciclo = array("I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX",
    "X", "XII", "XII");
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>Adicionar Turma</title>
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
                                    <div class="ibox-title">Adicionar Turma</div>
                                    <div class="ibox-tools">
                                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>

                                    </div>
                                </div>
                                <div class="ibox-body">
                                    <form action="<?= base_url() ?>turma/addPost" method="POST">
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label>Ciclo Formativo</label>
                                                <input value="" class="form-control" type="text" name="nome">
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label for="sel1">Curso:</label>
                                                <select name="id_curso" class="form-control" id="sel1">
                                                    <?php foreach ($cursos as $c) {
                                                        ?>
                                                        <option value="<?= $c->id_curso ?>">
                                                            <?= $c->curso_nome ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="col-sm-6 form-group">
                                                <label for="sel1">Sala de Aula:</label>
                                                <select name="id_sala" class="form-control" id="sel1">
                                                    <?php foreach ($salas as $s) {
                                                        ?>
                                                        <option value="<?= $s->id_sala_de_aula ?>">
                                                            <?= $s->nome ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label for="sel1">Horário:</label>
                                                <select name="id_horario" class="form-control" id="sel1">
                                                    <?php foreach ($horarios as $h) {
                                                        ?>
                                                        <option value="<?= $h->id_horario ?>">
                                                            <?= $h->horario_descricao ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label for="sel1">Formador:</label>
                                                <select name="id_usuario" class="form-control" id="sel1">
                                                    <?php foreach ($usuarios as $u) {
                                                        ?>
                                                        <option value="<?= $u->id_usuario ?>">
                                                            <?= $u->nome_completo ?></option>
                                                    <?php } ?>
                                                </select>
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