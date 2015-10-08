<?php

//use metodos;

require_once 'controller/constantes.php';
require_once 'controller/metodos.php';
require_once './view/formAdesao.php';
require_once './view/slideShow.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
        
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <meta name="description" content="Rede Una Viva - Jornada Real">
        <meta name="keywords" content="rede una viva jornada real yoga">
        <meta name="robots" content="nofollow">
        <meta name="google" content="notranslate">        
	<title><?php echo TITULORUV;?></title>

        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        
        <link rel="shortcut icon" href="icon/ruv.ico">
        <link rel="icon" type="image/png" href="images/ruvicon.png">
  
        <link rel="stylesheet" href="css/bootstrap-submenu.css">
 	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap1.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.css">
	<link rel="stylesheet" href="css/estilo.css">
        
        <link rel="stylesheet" href="jscss/orbit-1.2.3.css">
        <script src="jscss/jquery.orbit-1.2.3.min.js"></script>

        <script src="https://code.jquery.com/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.min_1.js"></script>
        <script src="js/jquery-migrate.min_1.js"></script>
        <script src="js/bootstrap-submenu.js"></script>
        <script src="sistema/js/validaCampos.js"></script>
        
        <!-- Chamada para slide show -->

        <script src="jscss/jquery.min.js"></script>
        <script src="jscss/jquery.bxslider.min.js"></script>
        <link href="jscss/jquery.bxslider.css" rel="stylesheet" />
        <script type="text/javascript">
          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-36499930-1']);
          _gaq.push(['_trackPageview']);

          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();
        </script>    
        <!-- Fim da chamada para slide show -->
        
        <script>
            $('.dropdown-submenu > a').submenupicker();
        </script>
        <script type="text/javascript">
                jQuery(document).ready(function($) {
                        $('body').addClass('images');
                });
        </script>
        <style>
            body{padding-top: 80px; width: 98.8%;}
        </style>
        <link rel="author" href="autor.txt">
        <script type="text/javascript">
            $(window).load(function() {
                $('#featured').orbit({
                    animation: 'fade',
                    directionalNav: false,
                    bullets : true
                });
            });
        </script>
        
        <style type="text/css">
            .timer { display: none !important; }
            div.caption { background:transparent; filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000,endColorstr=#99000000);zoom: 1; }
        </style>
        
        
</head>
<body>
	<header id="header">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="navbar-text-top">
				<!--<div class="navbar-text-top">-->
                                            <?php
                                                $titulo = new slideShow();
                                                $titulo->telaTitulo();
                                            
                                            ?>


				<!--</div>-->
			</div>
		</nav>
	</header><!-- /header -->

        <!-- Meio da página -->
        <div id="content">
            <div class="row">
            <div class="col-xs-3 col-md-3">
            
            <?php
            $slide = new slideShow();
            $slide->telaLogoMarcas();

            ?>
            </div>
            

            <div class="col-xs-8 col-md-9">
                <script>
                    $(document).ready(function(){
                        $('.bxslider').bxSlider({
                          auto: true,
                          adaptiveHeight: true,
                          autoControls: true,
                          infiniteLoop: true,
                          responsive: true
                        });          
                    });
                </script>                    
                   

            <?php
                
                $slide->telaNovaSlide();
            ?>
                <!--<iframe src="view/slide.php" style="width: 100%; height: 100%; min-width: 800px; min-height: 830px; padding-top: 0px;" frameborder="1" scrolling="no"></iframe>-->
            </div>
                </div>

        </div>

<!-- Parte de baixo da página -->
	<footer id="footer">
            <!--<nav class="nav navbar-fixed-bottom navbar-header">-->
            <!--<div class="col-sm-12 col-md-12">-->
                <div class="navbar-wrapper">
                    <div class="container" id="topmenu">
                        <div class="navbar navbar-default navbar-fixed-bottom" role="navigation">
                            <!--<div class="navbar-header">-->
                                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </a>
                                <a class="brand" href="#">
                                    Teste
                                </a>
                                <div class="nav-collapse collapse">
                                    <ul class="nav">
                                        <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-16 active" id="menu-item-16">
                                            <a href="#">Início</a>
                                        </li>
                                        <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-17" id="menu-item-17">
                                            <a href="#">Teste1</a>
                                        </li>
                                        <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-18" id="menu-item-18">
                                            <a href="#">Teste2</a>
                                        </li>
                                        <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-19" id="menu-item-19">
                                            <a href="#">Teste3</a>
                                        </li>
                                        <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-20" id="menu-item-20">
                                            <a href="#">Teste4</a>
                                        </li>
                                        <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-21" id="menu-item-21">
                                            <a href="#">Teste5</a>
                                        </li>
                                    </ul>
                                <!--</div>-->
                            </div>
                        </div>
                    </div>
                </div>
            <!--</nav>-->

            <!--</div>-->
	</footer>
<?php
    $formAdesao = new formAdesao();
    
    $formAdesao->telaFormAdesao();

?>

<div id="topcontrol" title="Voltar ao topo" style="position: fixed; bottom: 55px; right: 4px; opacity: 0; cursor: pointer;">
    <img src="images/up.png" style="width:30px; height:30px"></div>
<div id="topcontrol" title="Voltar ao topo" style="position: fixed; bottom: 55px; right: 4px; opacity: 0; cursor: pointer;">
    <img src="images/up.png" style="width:30px; height:30px">
</div>
<!--<script>
$(document).ready(function(){
  $('.bxslider').bxSlider({
	auto: true,
  	mode: 'fade',
  	slideMargin: 0,
	controls:false,
	touchEnabled: true
	
	
  });
});
</script>-->

  <script type='text/javascript'>
  function _dmBootstrap(file) {
      var _dma = document.createElement('script');
      _dma.type = 'text/javascript';
      _dma.async = true;
      _dma.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + file;
      (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(_dma);
  }
  function _dmFollowup(file) { if (typeof DMAds === 'undefined') _dmBootstrap('cdn2.DeveloperMedia.com/a.min.js'); }
  (function () { _dmBootstrap('cdn1.DeveloperMedia.com/a.min.js'); setTimeout(_dmFollowup, 2000); })();
  </script>
<script type="text/javascript" src="jscss/navega.js"></script>        

</body>
</html>

