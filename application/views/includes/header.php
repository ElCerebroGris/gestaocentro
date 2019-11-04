<!-- START HEADER-->
<header class="header">
    <div class="page-brand">
        <a class="link" href="<?= base_url() ?>welcome">
            <span class="brand">CENTRO
                <span class="brand-tip"></span>
            </span>
            <span class="brand-mini">CF</span>
        </a>
    </div>
    <div class="flexbox flex-1">
        <!-- START TOP-LEFT TOOLBAR-->
        <ul class="nav navbar-toolbar">
            <li>
                <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
            </li>
            <?php if ($this->session->userdata('nivel') == 3 || $this->session->userdata('nivel') == 7) { ?>
                <li>
                    <a href="<?= base_url() ?>aluno/add">Novo Aluno</a>
                </li>
            <?php } ?>
            <?php if ($this->session->userdata('nivel') == 4) { ?>
                <li>
                    <a href="<?= base_url() ?>aluno/listar">Todos Alunos</a>
                </li>
            <?php } ?>

            <?php if ($this->session->userdata('nivel') == 6) { ?>
                <li>
                    <a href="<?= base_url() ?>hospedaria/cliente/add">Novo Cliente</a>
                </li>
            <?php } ?>
        </ul>
        <!-- END TOP-LEFT TOOLBAR-->
        <!-- START TOP-RIGHT TOOLBAR-->
        <ul class="nav navbar-toolbar">
            <li class="dropdown dropdown-user">
                <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                    <img src="<?= base_url() ?>/assets/img/admin-avatar.png" />
                    <span></span><?= $this->session->userdata('nome_usuario') ?><i class="fa fa-angle-down m-l-5"></i></a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <!--<a class="dropdown-item" href="#"><i class="fa fa-user"></i>Perfil</a>-->
                    <li class="dropdown-divider"></li>
                    <a class="dropdown-item" href="<?= base_url() ?>usuario/sair"><i class="fa fa-power-off"></i>Sair</a>
                </ul>
            </li>
        </ul>
        <!-- END TOP-RIGHT TOOLBAR-->
    </div>
</header>
<!-- END HEADER-->
<!-- START SIDEBAR-->
<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="<?= base_url() ?>assets/img/admin-avatar.png" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong"><?= $this->session->userdata('nome_usuario') ?></div>
                <small><?= $this->session->userdata('descricao') ?></small></div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="active" href="<?= base_url() ?>welcome/dashboard"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <!--
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                    <span class="nav-label">Eventos</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="<?= base_url() ?>evento/listar">Listar</a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>evento/add">Adicionar</a>
                    </li>
                </ul>
            </li>
            -->
            <?php if ($this->session->userdata('nivel') != 6) { ?>
                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                        <span class="nav-label">Alunos<span class="label label-primary">(<?= $this->session->userdata('pre') ?>)</span></span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="<?= base_url() ?>aluno/listar">Listar</a>
                        </li>
                        <?php if ($this->session->userdata('nivel') == 3 || $this->session->userdata('nivel') == 1) { ?>
                            <!--    
                            <li>
                                    <a href="<?= base_url() ?>aluno/listarPre">Listar Pré 
                                        <span class="label label-primary">(<?= $this->session->userdata('pre') ?>)</span></a>
                                </li>
                            -->
                            <li>
                                <a href="<?= base_url() ?>aluno/add">Adicionar</a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
            <?php if ($this->session->userdata('nivel') <= 4) { ?>
                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                        <span class="nav-label">Pagamentos</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="<?= base_url() ?>pagamento/listar">Listar</a>
                        </li>
                        <!--
                        <li>
                            <a href="<?= base_url() ?>pagamento/add">Novo</a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <span class="nav-label">Tipo</span><i class="fa fa-angle-left arrow"></i></a>
                            <ul class="nav-3-level collapse">
                                <li>
                                    <a href="javascript:;">Adicionar</a>
                                </li>
                                <li>
                                    <a href="javascript:;">Listar</a>
                                </li>
                            </ul>
                        </li>
                        -->
                    </ul>
                </li>
            <?php } ?>
            <?php if ($this->session->userdata('nivel') == 3 || $this->session->userdata('nivel') == 1) { ?>
                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                        <span class="nav-label">Turmas</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="<?= base_url() ?>turma/listar">Listar</a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>turma/add">Adicionar</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                        <span class="nav-label">Curso</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="<?= base_url() ?>curso/listar">Listar</a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>curso/add">Adicionar</a>
                        </li>
                        <li>
                            <a target="_blank" href="<?= base_url() ?>curso/relatoriomensal">Relatorio mensal</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                        <span class="nav-label">Salas de Aulas</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="<?= base_url() ?>salaaula/listar">Listar</a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>salaaula/add">Adicionar</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                        <span class="nav-label">Horarios</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="<?= base_url() ?>horario/listar">Listar</a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>horario/add">Adicionar</a>
                        </li>
                    </ul>
                </li>
                <?php if ($this->session->userdata('nivel') == 1) { ?>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                            <span class="nav-label">Usuários</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="<?= base_url() ?>usuario/listar">Listar</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>usuario/add">Adicionar</a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <li>
                    <a target="_blank" href="<?= base_url() ?>relatorio/gerar"><i class="sidebar-item-icon fa fa-th-large"></i>
                        <span class="nav-label">Relatorios</span>
                    </a>
                </li>
                <?php if ($this->session->userdata('nivel') == 1) { ?>
                    <li>
                        <a href="<?= base_url() ?>log/listar"><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Logs</span>
                        </a>
                    </li>
                <?php } ?>
            <?php } ?>
            <?php if ($this->session->userdata('nivel') == 5) { ?>
                <li>
                    <a href="<?= base_url() ?>turma/minhas"><i class="sidebar-item-icon fa fa-th-large"></i>
                        <span class="nav-label">Minhas Turmas</span>
                    </a>
                </li>
            <?php } ?>
            <?php if ($this->session->userdata('nivel') == 1 && $this->session->userdata('nivel') == 6) { ?>
                <li>
                    <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                        <span class="nav-label">Hospedaria</span><i class="fa fa-angle-left arrow"></i></a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                                <span class="nav-label">Clientes</span><i class="fa fa-angle-left arrow"></i></a>
                            <ul class="nav-2-level collapse">
                                <li>
                                    <a href="<?= base_url() ?>hospedaria/cliente/listar">Listar</a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>hospedaria/cliente/add">Adicionar</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                                <span class="nav-label">Quartos</span><i class="fa fa-angle-left arrow"></i></a>
                            <ul class="nav-2-level collapse">
                                <li>
                                    <a href="<?= base_url() ?>hospedaria/quarto/listar">Listar</a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>hospedaria/quarto/add">Adicionar</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                                <span class="nav-label">Tipos de Quartos</span><i class="fa fa-angle-left arrow"></i></a>
                            <ul class="nav-2-level collapse">
                                <li>
                                    <a href="<?= base_url() ?>hospedaria/tipoQuarto/listar">Listar</a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>hospedaria/tipoQuarto/add">Adicionar</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>