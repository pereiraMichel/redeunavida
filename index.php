<?php
//use metodos;
date_default_timezone_set('America/Sao_Paulo');

require_once 'controller/constantes.php';
require_once 'controller/metodos.php';
require_once './view/classFormAdesao.php';
require_once './view/slideShow.php';

$slide = new slideShow();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <meta name="description" content="REDE UNA VIVA">
        <meta name="keywords" content="rede una viva ruv jr jornada real">
        <meta name="author" content="Michel Pereira - MAP TI">
        <meta name="robots" content="nofollow">
        <meta name="google" content="notranslate">        
        <title><?php echo TITULORUV; ?></title>

        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">

        <link rel="shortcut icon" href="icon/ruv.ico">
        <link rel="icon" type="image/png" href="images/ruvicon.png">

        <link rel="stylesheet" href="css/bootstrap-submenu.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.css">
        <link rel="stylesheet" href="css/menuResponsive.css">
        <link rel="stylesheet" href="css/icone_slider.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/jquery.bxslider.css">
        <link href="jscss/jquery.bxslider.css" rel="stylesheet" />

        <link rel="stylesheet" href="css/bootstrap-submenu.css">
 	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!--<link rel="stylesheet" href="css/bootstrap.css"> Atrapalha o responsivo-->
        <link rel="stylesheet" href="css/bootstrap-responsive_1.css">
	<link rel="stylesheet" href="css/bootstrap1.css"> 

        <link rel="stylesheet" href="css/estilo.css">

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <!--<script src="jscss/jquery.min.js"></script>-->
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-submenu.js"></script>
        <script src="js/jquery-migrate.min.js"></script>
        <script src="js/jquery.bxslider.min.js"></script>
        <script src="sistema/js/validaCampos.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script src="jscss/jquery.bxslider.min.js"></script>

        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-36499930-1']);
            _gaq.push(['_trackPageview']);

            (function () {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();

        </script>    
        <!-- Fim da chamada para slide show -->

        <script>
            $('.dropdown-submenu > a').submenupicker();
        </script>


        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $('body').addClass('images');
            });
        </script>
        
        <style>
            body
            {
                padding-top: 40px; 
                background-color: <?php echo AZULINFO; ?>;
            }

        </style>
       
        <link rel="author" href="autor.txt">
        
    </head>
    <body>
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="corAzulInfo">
                <div class="navbar-text-top">
                    <!--<div class="navbar-text-top">-->
                    <?php
                    $titulo = new slideShow();
                    $titulo->telaTitulo();
                    ?>

                </div>
            </nav>
        <!-- Meio da página -->
        <div class="content">
            <!--<div class="container">-->
                <?php
                    $slide->telaNovaSlide();
                ?>
            <!--</div>-->
        </div>
        <!-- Parte de baixo da página -->
        <footer id="footer">
            <nav class="navbar navbar-default navbar-fixed-bottom" id="corAzulInfo">

                <?php
                    $slide->preparaMenu("home");
                ?>
            </nav>
        </footer>


        <div id="topcontrol" title="Voltar ao topo" style="position: fixed; bottom: 55px; right: 4px; opacity: 0; cursor: pointer;">
            <img src="images/up.png" style="width:30px; height:30px"></div>
        <div id="topcontrol" title="Voltar ao topo" style="position: fixed; bottom: 55px; right: 4px; opacity: 0; cursor: pointer;">
            <img src="images/up.png" style="width:30px; height:30px">
        </div>

        <script>
            $(document).ready(function () {
                $('.bxslider').bxSlider({
                    auto: true,
                    mode: 'fade',
                    slideMargin: 0,
                    controls: true,
                    touchEnabled: true,
                    autoControls: true,
                    responsive: true


                });
            });
        </script>

        <script type='text/javascript'>
            function _dmBootstrap(file) {
                var _dma = document.createElement('script');
                _dma.type = 'text/javascript';
                _dma.async = true;
                _dma.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + file;
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(_dma);
            }
            function _dmFollowup(file) {
                if (typeof DMAds === 'undefined')
                    _dmBootstrap('cdn2.DeveloperMedia.com/a.min.js');
            }
            (function () {
                _dmBootstrap('cdn1.DeveloperMedia.com/a.min.js');
                setTimeout(_dmFollowup, 2000);
            })();
        </script>
        <script type="text/javascript" src="jscss/navega.js"></script>        


    </body>
</html>

