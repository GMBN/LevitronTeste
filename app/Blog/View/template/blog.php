<!DOCTYPE html>
<html lang="pt-BR" prefix="og: http://ogp.me/ns#">
    <head>

        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <meta name="author" content="SOS Casar" />

        <!-- Page Title -->
        <?= $this->_head ?>

        <!-- Favicon and Touch Icons -->
        <link href="/site/images/favicon.png" rel="shortcut icon" type="image/png">
        <link href="/site/images/apple-touch-icon.png" rel="apple-touch-icon">
        <link href="/site/images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
        <link href="/site/images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
        <link href="/site/images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

        <!-- Stylesheet -->
        <link href="/site/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="/site/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
        <link href="/site/css/animate.css" rel="stylesheet" type="text/css">
        <link href="/site/css/css-plugin-collections.css" rel="stylesheet"/>
        <!-- CSS | menuzord megamenu skins -->
        <link id="menuzord-menu-skins" href="/site/css/menuzord-skins/menuzord-bottom-trace.css" rel="stylesheet"/>
        <!-- CSS | Main style file -->
        <link href="/site/css/style-main.css" rel="stylesheet" type="text/css">
        <!-- CSS | Theme Color -->
        <link href="/site/css/colors/theme-skin-deep-pink.css" rel="stylesheet" type="text/css">
        <!-- CSS | Preloader Styles -->
        <link href="/site/css/preloader.css" rel="stylesheet" type="text/css">
        <!-- CSS | Custom Margin Padding Collection -->
        <link href="/site/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
        <!-- CSS | Responsive media queries -->
        <link href="/site/css/responsive.css" rel="stylesheet" type="text/css">
        <link href="/assets/css/app.css" rel="stylesheet" type="text/css">
        <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
        <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

        <!-- external javascripts -->
        <script src="/site/js/jquery-2.2.0.min.js"></script>
        <script src="/site/js/jquery-ui.min.js"></script>
        <script src="/site/js/bootstrap.min.js"></script>
        <!-- JS | jquery plugin collection for this theme -->
        <script src="/site/js/jquery-plugin-collection.js"></script>
        <?= $this->renderJs() ?>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="">
        <div id="wrapper">
            <!-- preloader -->
            <div id="preloader">
                <div id="spinner">
                    <div class="heart-preloader">
                        <i class="fa fa-heart font-36 infinite animated pulse"></i>
                    </div>
                </div>
                <!--<div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>-->
            </div>

            <!-- Header -->
            <header id="header" class="header">
                <div class="header-nav navbar-fixed-top header-dark navbar-white navbar-transparent navbar-sticky-animated animated-active">
                    <div class="header-nav-wrapper">
                        <div class="container">
                            <nav>
                                <div id="menuzord-right" class="menuzord red"> <a class="menuzord-brand pull-left flip font-playball text-theme-colored font-32" href="javascript:void(0)">SOS <i class="fa fa-heart-o font-25"></i> CASAR</a>

                                    <?php
                                    $menu = [
                                        [
                                            'desc' => 'Página Principal',
                                            'url' => '/'
                                        ],
                                        [
                                            'desc' => 'Blog',
                                            'url' => '/blog'
                                        ],
                                        [
                                            'desc' => 'Quem Somos',
                                            'url' => '/quem-somos'
                                        ],
//                                        [
//                                            'desc' => 'Contato',
//                                            'url' => '/contato'
//                                        ]
                                            ]
                                    ?>
                                    <?= $this->menuSite($menu); ?>
                                    <!-- <ul class="menuzord-menu">
                                                                            <li class=""><a href="/">Página Principal</a></li> 
                                                                            <li class=""><a href="/">Blog</a></li> 
                                                                            <li class=""><a href="/">Quem Somos</a></li>
                                                                            <li class=""><a href="/">Contato</a></li>   
                                                                        </ul>-->
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Start main-content -->
            <div class="main-content">
                <?= $_content; ?>
            </div>

            <!-- Footer -->
            <footer id="footer" class="footer pb-0 bg-black-111">  
                <div class="container pb-20">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center">
                            <a class="text-white font-playball font-32" href="#">SOS <i class="fa fa-heart-o font-25"></i> CASAR</a>
                            <p class="font-12 mt-20 mb-20">
                            <?= $this->getConfig('textoRodape');  ?>
                            </p>
                            <ul class="social-icons flat medium list-inline mb-0">
                                <li><a href="#"><i class="fa fa-facebook"></i></a> </li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a> </li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a> </li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a> </li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-nav bg-light text-center p-20">
                    <div id="flipclock1" class="clock" style="margin:2em; width: auto; display: inline-block;"></div>
                    <div class="col-md-6 col-md-offset-3">
                        <form id="formListaEmail" class="newsletter-form" >
                            <label>Inscreva-se</label>
                            <div class="input-group">
                                <input type="email" data-height="45px" class="form-control input-lg" placeholder="Seu E-mail" name="email" value="" style="height: 45px;" required="">
                                <span class="input-group-btn">
                                    <button type="submit" id="btnAddEmail" class="btn btn-dark btn-lg m-0 hvr-sweep-to-right" data-height="45px" style="height: 45px;">Inscrever-se</button>
                                </span>
                            </div>
                        </form>
                        <div class="alert alert-success" style="display: none" id="msgSucessoListaEmail">
                            <span class="fa fa-check"></span> Obrigado! O E-mail <b id="listaEmailCadastrado"></b> foi cadastrado com sucesso!
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <p class="font-11 m-0">Copyright &copy;2016 SOS Casar. Todos os direitos reservados</p>
                        </div>
                    </div>
                </div>
            </footer>
            <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
        </div>
        <!-- end wrapper -->

        <!-- Footer Scripts -->
        <!-- JS | Custom script for all pages -->
        <script src="/site/js/custom.js"></script>

    </body>
</html>
<script type="text/javascript">
<?php
$lancamento = $this->getConfig('dataLancamento');
$secLan = strtotime(str_replace('/', '-', $lancamento));
$secAtual = strtotime('now');
$diff = $secLan - $secAtual;
?>
    var clock;
    $(document).ready(function () {
        // Instantiate a coutdown FlipClock
        clock = $('#flipclock1').FlipClock(<?= $diff ?>, {
            clockFace: 'DailyCounter',
            countdown: true,
            language: 'pt-br'
        });
    });

    $("#formListaEmail").on('submit', function () {
        $("#btnAddEmail").attr('disabled', true);
        var email = $(this).find('[name="email"]').val();
        $.ajax({
            url: '/blog/lista-email/save',
            type: 'POST',
            data: {email: email},
            dataType: 'json',
            success: function (obj) {
                if (obj.success) {
                    $("#listaEmailCadastrado").text(email);
                    $("#formListaEmail").slideUp();
                    $("#msgSucessoListaEmail").slideDown();
                }
            }
        });
        return false;
    });
</script>
