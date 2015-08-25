<?php

//use metodos;

require_once 'controller/constantes.php';
require_once 'controller/metodos.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
        
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <meta name="description" content="Bootstrap Sub-Menus">
        <meta name="keywords" content="bootstrap dropdown jquery-plugin submenu">
        <meta name="author" content="Vasily A.">
        <meta name="robots" content="nofollow">
        <meta name="google" content="notranslate">        
	<title><?php echo TITULORUV;?></title>

        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        
        
        <link rel="shortcut icon" href="icon/ruv.ico">
        <link rel="icon" type="image/png" href="images/ruvicon.png">
        
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap-submenu.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/docs.css">
	<!--<link rel="stylesheet" href="css/style.css">-->
        
        <script src="js/jquery.js" defer=""></script>
        <script src="js/bootstrap.js" defer=""></script>
        <script src="js/highlight.min.js" defer=""></script>
        <script src="js/bootstrap-submenu.js" defer=""></script>
        <script src="js/docs.js" defer=""></script>
        <!--<script src="js/control.js" defer=""></script>-->

        <script>
            $('.dropdown-submenu > a').submenupicker();
        </script>

        <script type="text/javascript">
                jQuery(document).ready(function($) {
                        $('body').addClass('images');
                });
        </script>
        <style>
            /*html, body, div, iframe {margin: 0px; padding: 0px}*/
            iframe{width: 100%; border: none; position: absolute}
            body{padding-top: 80px;}

        </style>
        <link rel="author" href="autor.txt">
</head>
<body id="frameSlide">
	<header id="header">
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="text-center">
				<div class="navbar-text-top">
					<div class="col-sm-4" style='padding-left: 150px'>
						<figure class="navbar-logo navbar-left hidden-xs">
							<a href="index.php">
                                                            <img src="images/logoRedeUnaVida.png" title="<?php echo TITULORUVBAIXO; ?>" width="75" height="61">
							</a>
						</figure><!-- /figure -->
					</div><!-- /col-sm-4 -->
                                        
<!--                                        <div class="col-sm-2">
                                            <ul class="nav navbar-nav navbar-right" id="menu">
                                                <li id="agenda">
						<div class="navbar-text navbar-right">
                                                    <a href="agenda.php" class="text-link">
                                                            <button class="btn btn-default">
                                                                <i class="fa fa-dashboard"></i> Agenda
                                                            </button>
                                                    </a>
						</div>
                                        </div>-->

                                        <div class="col-sm-3">
                                            <div class="hidden-sm">
                                                <span>
                                                    <a href="">
                                                        <img src="jr/jrLogomarca.png" title="<?php echo TITULOJRBAIXO; ?>" width="75" height="61" />                                      
                                                    </a>
                                                </span>
                                            </div>
                                            <div class="visible-sm">
                                                <span>
                                                    <a href="">
                                                        <img src="jr/jrLogomarca.png" title="<?php echo TITULOJRBAIXO; ?>" width="75" height="61" />                                      
                                                    </a>
                                                </span>
                                            </div>
                                            <figure class="navbar-logo navbar-left hidden-xs">
                                                    <a href="" style="text-align: center">

                                                    </a>
                                            </figure>
					</div>

					<hr class="visible-xs"><!-- /hr -->
					<br class="visible-xs">
					<div class="col-sm-4" style="padding-right: 10px">
						<div class="navbar-text navbar-right">
                                                    <a href="#" class="text-link">
                                                        <button class="btn btn-primary">
                                                            <i class="fa fa-user"></i> Cadastre-se
                                                        </button>
                                                    </a>
                                                    <a href="sistema/" class="text-link">
                                                            <button class="btn btn-warning">
                                                                    <i class="fa fa-th"></i> Acesso ao Sistema
                                                            </button>
                                                    </a>
						</div>
						<br class="visible-xs">
					</div><!-- /col-sm-4 -->
				</div>
			</div>
		</nav>
	</header><!-- /header -->

        <!-- Meio da página -->
        
        <div id="content">

            <iframe src="view/slide.php" style="width: 100%; height: 90%;" frameborder="1" scrolling="no"></iframe>
            <!--<iframe src="view/slide.php" frameborder="0" scrolling="no" name="slide" style="margin-top: 30px; padding: 0px 0px 0px 150px; margin" id="frameSlide"></iframe>-->
        </div>
<!--width="1260" height="650"--> 

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

                                                Rua Mário Pederneiras, 31 - Casa, Humaitá<br>
                                                Telefones: (21) 2222-2222
                                        </h5>
                                    </small>
				</a>
  </div>

<div class="collapse navbar-collapse" style="padding-right: 10px;">
    <ul  class="nav navbar-nav navbar-right" id="menu">
        <li class="active" id="home">
                <a href="index.php">
                        <i class="fa icon-home"></i> Home
                </a>
        </li>
      <li class="dropdown">
        <a tabindex="0" data-toggle="dropdown"><i class="fa fa-puzzle-piece"></i> Programação<span class="caret"></span></a>

        <!-- role="menu": fix moved by arrows (Bootstrap dropdown) -->
        <ul class="dropdown-menu" role="menu">
          <li class="dropdown-submenu">
            <a tabindex="0" data-toggle="dropdown">Jornada Real</a>

            <ul class="dropdown-menu">
              <li><a tabindex="0">Primavera</a></li>
              <li><a tabindex="0">Verão</a></li>
              <li><a tabindex="0">Outono</a></li>
              <li><a tabindex="0">Inverno</a></li>

            </ul>
          </li>

            <li><a tabindex="0">Meditação</a></li>
            <li><a tabindex="0">Meditação Cristã</a></li>
            <li><a tabindex="0">Retiro</a></li>

        </ul>
      </li>
      <li class="dropdown">
        <a tabindex="0" data-toggle="dropdown"><i class="fa fa-clock-o"></i> Tempo<span class="caret"></span></a>

        <!-- role="menu": fix moved by arrows (Bootstrap dropdown) -->
        <ul class="dropdown-menu" role="menu">
            <li>
              <a tabindex="0"><i class="fa fa-dashboard"></i> Agenda</a>
            </li>
            <li>
                <a tabindex="0"><i class="fa fa-calendar"></i> Calendário</a>
            </li>
        </ul>
      </li>
      <li class="dropdown">
        <a tabindex="0" data-toggle="dropdown"><i class="fa fa-puzzle-piece"></i> Sugestões<span class="caret"></span></a>

        <!-- role="menu": fix moved by arrows (Bootstrap dropdown) -->
        <ul class="dropdown-menu" role="menu">
            <li>
              <a tabindex="0"> Yoga</a>
            </li>
            <li>
                <a tabindex="0"> Roda dos Sonhos</a>
            </li>
            <li>
                <a tabindex="0"> Transpessoal</a>
            </li>
        </ul>
      </li>
        <li id="galeria">
            <a href="galeria.php">
                        <i class="fa fa-ticket"></i> Galeria
                </a>
        </li>
        <li id="quemsomos">
            <a href="#">
                        <i class="fa fa-book"></i> Quem Somos
                </a>
        </li>
        <li id="contato">
                <a href="contato.php">
                        <i class="fa fa-envelope-o"></i> Contato
                </a>
        </li>
        <li id="blog">
                <a href="#">
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


<div id="topcontrol" title="Voltar ao topo" style="position: fixed; bottom: 55px; right: 4px; opacity: 0; cursor: pointer;">
    <img src="images/up.png" style="width:30px; height:30px"></div>
<div id="topcontrol" title="Voltar ao topo" style="position: fixed; bottom: 55px; right: 4px; opacity: 0; cursor: pointer;">
    <img src="images/up.png" style="width:30px; height:30px">
</div>

</body>
</html>

