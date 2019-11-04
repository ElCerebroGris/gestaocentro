<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>Lista de Eventos</title>
        <!-- GLOBAL MAINLY STYLES-->
        <link href="<?= base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
        <!-- PLUGINS STYLES-->
        <link href="<?= base_url() ?>assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
        <!-- PLUGINS STYLES-->
        <link href="<?= base_url() ?>assets/vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/vendors/fullcalendar/dist/fullcalendar.print.min.css" rel="stylesheet" media="print" />
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
                <div class="page-heading">
                    <h1 class="page-title">Calendario</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html"><i class="la la-home font-20"></i></a>
                        </li>
                        <li class="breadcrumb-item">Eventos</li>
                    </ol>
                </div>
                <div class="page-content fade-in-up">
                    <div class="row">
                        <div class="col-md-3">
                            <div id="external-events">
                                <h5 class="m-b-10">Lista de Eventos</h5>
                                <div class="ex-event bg-green" data-class="bg-green">Evento 1</div>
                                <div class="ex-event bg-blue" data-class="bg-blue">Evento 2</div>
                                <div class="ex-event bg-orange" data-class="bg-orange">Evento 3</div>
                                <div class="ex-event bg-red" data-class="bg-red">Evento 4</div>
                                <div class="ex-event bg-silver" data-class="bg-silver">Evento 5</div>
                                <button type="button" class="btn btn-info" 
                                        data-toggle="modal" data-target="#new-event-modal">Novo</button>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="ibox">
                                <div class="ibox-body">
                                    <div id="calendar"></div>
                                    <!-- New Event Dialog-->
                                    <div class="modal fade" id="new-event-modal" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <form class="modal-content form-horizontal" action="javascript:;">
                                                <div class="modal-header bg-silver-100">
                                                    <h4 class="modal-title">Novo Evento</h4>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Titulo:</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" id="new-event-title" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" id="date_1">
                                                        <label class="col-sm-2 col-form-label">Inicio:</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group datepicker date">
                                                                <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                                                                <input class="form-control" id="new-event-start" type="text" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Fim:</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group datepicker date">
                                                                <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                                                                <input class="form-control" id="new-event-end" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Cor:</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control" id="new-event-color">
                                                                <option value="bg-blue">Blue</option>
                                                                <option value="bg-red">Red</option>
                                                                <option value="bg-green">Green</option>
                                                                <option value="bg-orange">Orange</option>
                                                                <option value="bg-silver">Silver</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-10 ml-sm-auto">
                                                            <label class="ui-checkbox ui-checkbox-info">
                                                                <input id="new-event-allDay" type="checkbox">
                                                                <span class="input-span"></span>Todo dia</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
                                                    <button class="btn btn-info" id="addEventButton" type="submit">Add event</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- End New Event Dialog-->
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
        <script src="<?= base_url() ?>assets/vendors/moment/min/moment.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendors/fullcalendar/dist/fullcalendar.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/vendors/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>

        <script src="<?= base_url() ?>assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
        <!-- CORE SCRIPTS-->
        <script src="<?= base_url() ?>assets/js/app.js" type="text/javascript"></script>
        <!-- PAGE LEVEL SCRIPTS-->
        <script src="<?= base_url() ?>assets/js/scripts/calendar-demo.js" type="text/javascript"></script>
    </body>

</html>