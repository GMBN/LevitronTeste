<?php
$_usuario = $this->auth()->getUsuario();
$img_usuario = !empty($_usuario['img'])? $_usuario['img']: "/img/avatar.png";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?= $this->getHead() ?>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="/admin/assets/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="/admin/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="/admin/assets/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="/admin/assets/dist/css/skins/_all-skins.min.css">
        <?= $this->renderCss() ?>


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->


        <!-- ./wrapper -->

        <!-- jQuery 2.2.3 -->
        <script src="/admin/assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="/admin/assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="/admin/assets/plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="/admin/assets/dist/js/app.min.js"></script>
        <!-- Sparkline -->
        <script src="/admin/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="/admin/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="/admin/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- SlimScroll 1.3.0 -->
        <script src="/admin/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- ChartJS 1.0.1 -->
        <!--<script src="/admin/assets/plugins/chartjs/Chart.min.js"></script>-->
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <!--<script src="/admin/assets/dist/js/pages/dashboard2.js"></script>-->
        <!-- AdminLTE for demo purposes -->
        <!--<script src="/admin/assets/dist/js/demo.js"></script>-->
        <?php
        $this->addJs('/assets/js/default.js');
        ?>
        <?= $this->renderJs() ?>
    </head>
    <body class="hold-transition skin-purple sidebar-mini">
        <div class="wrapper">

            <header class="main-header">

                <!-- Logo -->
                <a href="index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">SOS</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">SOS Casar</span>
                </a>

                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <li class="dropdown messages-menu">
                                <a href="javascript:void(0);" onclick="blogNotyListNew();" class="dropdown-toggle"  data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <?php
                                    $countNew = $this->countNotificacoes();
                                    if ($countNew > 0) {
                                        echo '<span class="label label-danger">' . $countNew . '</span>';
                                    }
                                    ?>              
                                </a>
                                <ul class="dropdown-menu" id="noty">
                                    <li class="header">Há <?= $countNew ?> Notificações</li>

                                </ul>
                            </li>
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?= $img_usuario ?>" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?= $_usuario['nome'] ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?= $img_usuario ?>" class="img-circle" alt="User Image">

                                        <p>
                                            <?= $_usuario['nome'] ?>
                                          <!--<small>Menbro </small>-->
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <!--                                    <li class="user-body">
                                                                            <div class="row">
                                                                                <div class="col-xs-4 text-center">
                                                                                    <a href="#">Followers</a>
                                                                                </div>
                                                                                <div class="col-xs-4 text-center">
                                                                                    <a href="#">Sales</a>
                                                                                </div>
                                                                                <div class="col-xs-4 text-center">
                                                                                    <a href="#">Friends</a>
                                                                                </div>
                                                                            </div>
                                                                             /.row 
                                                                        </li>-->
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="/admin/usuario/edit/<?= $_usuario['id'] ?>" class="btn btn-default btn-flat">Editar Perfil</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="/usuario/sair" class="btn btn-default btn-flat">Sair</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>

                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?= $img_usuario ?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?= $_usuario['nome'] ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <?php
                    $menu = [
                        [
                            'desc' => 'Blog',
                            'icon' => 'fa-refresh',
                            'sub' => [
                                ['desc' => 'Posts', 'url' => '/admin/blog/post'],
                                ['desc' => 'Galeria', 'url' => '/admin/blog/galeria'],
                                ['desc' => 'Comentários', 'url' => '/admin/blog/comentario'],
                                ['desc' => 'Categorias', 'url' => '/admin/blog/categoria']
                            ]
                        ],
                        [
                            'desc' => 'Usuários',
                            'icon' => 'fa-users',
                            'url' => '/admin/usuario'
                        ],
                        [
                            'desc' => 'Lista de E-mails',
                            'icon' => 'fa-envelope-o',
                            'url' => '/admin/blog/lista-email'
                        ],
                        [
                            'desc' => 'Configuração',
                            'icon' => 'fa-cog',
                            'url' => '/admin/config'
                        ]
                            ]
                    ?>
                    <?= $this->menuAdmin($menu); ?>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Administração
                        <small>Versão 0.1</small>
                    </h1>
                    <!--                    <ol class="breadcrumb">
                                            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                                            <li class="active">Dashboard</li>
                                        </ol>-->
                </section>

                <!-- Main content -->
                <section class="content">
                    <?= $_content; ?>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Versão</b> 0.1
                </div>
                <strong>Copyright &copy; 2016 <a href="">SOS Casar</a>.</strong> Todos os direitos reservados.
            </footer>
        </div>
    </body>
</html>
