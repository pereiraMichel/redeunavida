<!DOCTYPE html>

<?php
//    require_once './view/formulario.php';
    require_once './controller/constantes.php';
    require_once './view/slideShow.php';

    error_reporting(0);
    
//    $formulario = new formulario();

?>

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
	<link rel="stylesheet" href="css/estilo.css">
        
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
            body{padding-top: 80px;}

        </style>
    
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="view/dist/css/bootstrap-select.css">
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <!--<script type="text/javascript" src="js/bootstrap.min.js"></script>-->
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="view/dist/js/bootstrap-select.js"></script>
        <script type="text/javascript">
                jQuery(document).ready(function($) {
                        $('body').addClass('images');
                });
        </script>
        
        <script>
//            var mes = document.getElementById("selectAgenda").value;
            function validaMes(mes){
                window.location.href="agenda.php?periodo=" + mes;
            }
        </script>

<!--	<script type="text/javascript" src="./CETAS_files/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="./CETAS_files/back-to-top.js"></script>-->
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			scrolltotop.init();
		});
	</script>        
        
        <link rel="author" href="autor.txt">        
    </head>
<body>
	<header id="header">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="text-center">
				<div class="navbar-text-top">
                                            <?php
                                                $titulo = new slideShow();
                                                $titulo->telaTitulo();
                                            
                                            ?>


				</div>
			</div>
		</nav>
	</header><!-- /header -->

	<div id="content">
		<div class="bs-docs-header bs-docs-first">
			<div class="container">
				
                            <table  class="table table-condensed" style="font-family: Lato; font-size: 10px; text-align: center">
                                <tr class="danger">
                                    <td colspan="2"><h3 class="text-info"><i class="fa fa-dashboard"></i> AGENDA</h3></td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                </tr>
                                <tr style="font-family: Lato; font-size: 15px">
                                    <td style="text-align: right; padding-top: 10px; width: 50%;">Selecione o período </td>
                                    
                                    <td style="text-align: left; width: 50%;">
                                        <div class="row-fluid">
                                            <select name="selectAgenda" class="selectpicker" onchange="javascript:validaMes(this.value)">
                                                <option value="0">Selecione</option>
                                                <optgroup label="SETEMBRO">
                                                    <?php 
                                                    if($_GET['periodo'] == 91) { 
                                                        $marcado = "selected='selected'";
                                                    }else{
                                                        $marcado = "";
                                                    }
                                                    ?>
                                                    <option value="91" <?php echo $marcado; ?>>De 5 a 12</option>
                                                    <!--<option value="92">De 12 a 30</option>-->
                                                </optgroup>
<!--                                                <optgroup label="OUTUBRO">
                                                    <option value="101">1ª Quinzena</option>
                                                    <option value="102">2ª Quinzena</option>
                                                </optgroup>-->
                                            </select>
                                        </div>

                                    </td>
                                </tr>
                                <?php
                                /* @var $_GET type */
                                $periodo = utf8_decode($_GET['periodo']);
                                
                                if($periodo == ""){
                                    $periodo = 0;
                                }
                                
                                
                                
                                echo "<tr>";
                                echo "  <td colspan='2'>";
                                
                                switch($periodo){
                                    case 0: echo "<iframe src='view/agendaPadrao.php' frameborder='0' scrolling='yes' name='agendaPadrao' width='1000' height='529'></iframe>";
                                        break;
                                    case 91: echo "<iframe src='view/setembro.php' width='1000' height='529' frameborder='0' scrolling='yes' style='padding-left: 0px;' name='slide'></iframe>";
                                }
                                
                                echo "  </td>";
                                echo "</tr>";
                                
                                ?>
                                

                            </table>

			</div>
		</div>

        </div>

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
                                                echo "<br>".TELEFONEORGAO;
                                            ?>

                                        </h5>
                                    </small>
				</a>
  </div>

<div class="collapse navbar-collapse" style="padding-right: 10px;">
    <ul class="nav navbar-nav navbar-right" id="menu">
        <li id="home">
                <a href="<?php echo HOMELINK;  ?>">
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
            <li class="active">
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

<!-- EOF -->
<div id="topcontrol" title="Voltar ao topo" style="position: fixed; bottom: 55px; right: 4px; opacity: 0; cursor: pointer;">
    <img src="images/up.png" style="width:30px; height:30px"></div>
<div id="topcontrol" title="Voltar ao topo" style="position: fixed; bottom: 55px; right: 4px; opacity: 0; cursor: pointer;">
    <img src="images/up.png" style="width:30px; height:30px">
</div>


</body>
</html>