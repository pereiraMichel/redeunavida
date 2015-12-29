<?php

//use metodos;

require_once 'controller/constantes.php';
require_once 'controller/metodos.php';
//require_once './view/formAdesao.php';
require_once 'view/slideShow.php';
//require_once './formAdesao.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="REDE UNA VIVA">
        <meta name="keywords" content="rede una viva ruv jr jornada real">
        <meta name="author" content="Michel Pereira - MAP TI">
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
        <link rel="stylesheet" href="css/bootstrap-responsive_1.css">
	<link rel="stylesheet" href="css/bootstrap1.css"> 
        <!--Apresenta o slideshow sem borda-->
	<!--<link rel="stylesheet" href="css/docs.css">-->
	<link rel="stylesheet" href="css/estilo.css">
        <!--<link rel="stylesheet" href="css/style.css">-->
        
        <link rel="stylesheet" href="jscss/orbit-1.2.3.css">
        <script src="jscss/jquery.orbit-1.2.3.min.js"></script>


        <script src="js/jquery.js"></script>
        <!--<script src="https://code.jquery.com/jquery.js"></script>-->
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
            body{width: 98.8%;}
        </style>
        <!-- Verifica se o bxslider está funcionando ! -->
<!--        <script> 
            $(document).ready(function(){
                $('.bxslider').bxSlider({
                  onSliderLoad: function(){
                    // do funky JS stuff here
                    alert('Slider has finished loading. Click OK to continue!');
                  },
                  onSlideAfter: function(){
                    // do mind-blowing JS stuff here
                    alert('A slide has finished transitioning. Bravo. Click OK to continue!');
                  }
                });
            });
        </script>-->
        

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
	<!--<header id="header">-->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">

            <div class="navbar-text-top">
            <?php
            $slide = new slideShow();
            $slide->telaTitulo();
            ?>


            </div>
        </nav>
        <!--</header> /header -->

        <!-- Meio da página -->
        <div id="content">
            <!--<div style="padding-top: 80px;">-->
            
<!--            <div class='hidden-sm' style='padding: 15px 30px 50px 0px;'>
                <span>
                    <a href='index.php' style='text-decoration: none;'>REDE UNA VIVA</a> </span>POR UMA CULTURA DE PAZ
            </div>
            <div class='navbar-subtext-top hidden-sm'></div> /hidden-sm 
            <div class='navbar-subtextsm-top visible-sm' style='padding: 15px 30px 20px 0px;'>
                <span>
                    <a href='index.php' style='text-decoration: none;'>REDE UNA VIVA</a> </span>POR UMA CULTURA DE PAZ
            </div>-->


            <div class="row">
                
                    <div class="col-xs-3 col-md-3">

                        <?php
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
                                  infiniteLoop: true
                                });          
                            });
                        </script>                    

                        <?php
                        $slide->telaNovaSlide();
                        ?>
                <!--<iframe src="view/slide.php" style="width: 100%; height: 100%; min-width: 800px; min-height: 830px; padding-top: 0px;" frameborder="1" scrolling="no"></iframe>-->
                    </div>
                <!--</div>-->
            </div>
        </div>

<!--<div  class = "wrapper"> 
  <div  class = "content-main"> teste </div>
  <div  class = "content-secundária"> teste2 </div> 
</div>        -->
        
<!-- Parte de baixo da página -->
	<footer id="footer">
		<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Menu</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="contato.php" style="padding: 0px 0px 0px 10px;">
                            <small>
                                <h5>
                                    <?php
                                    echo ENDERECOORGAO;
                                    echo "<br>" . TELEFONEORGAO;
                                    ?>

                                </h5>
                            </small>
                        </a>
                    </div>

<div class="collapse navbar-collapse" style="padding-right: 10px;">
    <ul class="nav navbar-nav navbar-right" id="menu">
        <li id="home" class="active">
                <a href="<?php echo "";  ?>">
                        <i class="fa icon-home"></i> Home
                </a>
        </li>
      <li class="dropdown">
        <a tabindex="0" data-toggle="dropdown"><i class="fa fa-puzzle-piece"></i> Programação<span class="caret"></span></a>

        <!-- role="menu": fix moved by arrows (Bootstrap dropdown) -->
        <ul class="dropdown-menu" role="menu">
          <li>
              <a tabindex="0" href="<?php echo JORNADAREALLINK; ?>" target="_self">Jornada Real</a>

          </li>

          <li><a tabindex="0" href="<?php echo MEDITACAOLINK;  ?>">Meditação</a></li>
          <li><a tabindex="0" href="<?php echo MEDITCRISTALINK;  ?>">Meditação Cristã</a></li>
          <li><a tabindex="0" href="<?php echo RETIROLINK;  ?>">Retiro</a></li>

        </ul>
      </li>
      <li class="dropdown">
        <a tabindex="0" data-toggle="dropdown"><i class="fa fa-clock-o"></i> Tempo<span class="caret"></span></a>

        <!-- role="menu": fix moved by arrows (Bootstrap dropdown) -->
        <ul class="dropdown-menu" role="menu">
            <li>
                <a tabindex="0" href="<?php echo AGENDALINK;  ?>" target="_self"><i class="fa fa-dashboard"></i> Agenda</a>
            </li>
            <li>
                <a tabindex="0" href="<?php echo CALENDARIOLINK;  ?>" target="_self"><i class="fa fa-calendar"></i> Calendário</a>
            </li>
        </ul>
      </li>
      <li class="dropdown">
        <a tabindex="0" data-toggle="dropdown"><i class="fa fa-ticket"></i> Sugestões<span class="caret"></span></a>

        <!-- role="menu": fix moved by arrows (Bootstrap dropdown) -->
        <ul class="dropdown-menu" role="menu">
            <li>
              <a tabindex="0" href="<?php echo YOGALINK;  ?>"> Yoga</a>
            </li>
            <li>
                <a tabindex="0" href="<?php echo RODASONHOSLINK;  ?>"> Roda dos Sonhos</a>
            </li>
            <li>
                <a tabindex="0" href="<?php echo TRANSPESSOALLINK;  ?>"> Transcurso Transpessoal</a>
            </li>
        </ul>
      </li>
        <li id="galeria">
            <a href="<?php echo GALERIALINK;  ?>">
                        <i class="fa fa-ticket"></i> Galeria
                </a>
        </li>
        <li id="quemsomos">
            <a href="<?php echo QUEMSOMOSLINK;  ?>" target="_self">
                        <i class="fa fa-book"></i> Quem Somos
                </a>
        </li>
        <li id="contato">
                <a href="<?php echo CONTATOLINK;  ?>">
                        <i class="fa fa-envelope-o"></i> Contato
                </a>
        </li>
        <li id="blog">
                <a href="<?php echo BLOGLINK;  ?>">
                        <i class="fa fa-link"></i> Blog
                </a>
        </li>
        <li id="">
                <a href="#">
                        <i class="fa fa-2x"></i> &nbsp;
                </a>
        </li>
    </ul>
  </div>
</nav>
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

