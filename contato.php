<!DOCTYPE html>

<?php
    require_once './view/formulario.php';
    require_once './controller/constantes.php';
    require_once './view/classFormAdesao.php';
    require_once './view/slideShow.php';
    

    $formulario = new formulario();

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

        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="shortcut icon" href="icon/ruv.ico">
        <link rel="icon" type="image/png" href="images/ruvicon.png">

        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!--<link rel="stylesheet" href="css/style.css">-->
        <link rel="stylesheet" href="css/estilo.css">

        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <!--<script src="js/bootstrap.js"></script>-->
        <script src="js/modal.js"></script>
        
        <script type="text/javascript">
                jQuery(document).ready(function($) {
                        $('body').addClass('images');
                });
        </script>

	<script type="text/javascript">
		jQuery(document).ready(function($) {
			scrolltotop.init();
		});
	</script>  
        <style>
            /*html, body, div, iframe {margin: 0px; padding: 0px}*/
            /*iframe{width: 100%; border: none; position: absolute}*/
            body{padding-top: 80px;}

        </style>
       
        
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
				<h3 class="text-info"><i class="fa fa-envelope-o"></i> CONTATO</h3>
                                <p style="height: 20px;"></p>

				<small>
                        <?php
                        $filename = "texto/contato.xml";
                        
                        @header("Content-Type: text/html; charset=utf-8");
                        $xml = simplexml_load_file($filename);

                        foreach($xml->texto as $texto)
                        {
                            echo $texto->contato;
                            echo "<p style='height: 20px;'></p>";
                                              
                        ?>
				</small>
			</div>
		</div>
		<div class="bs-docs-header bs-color-inverse">
			<div class="container">
				<div class="col-sm-12 text-left">
					<address class="well">
						<h4>
							Informações de Contato<br><br>
							<small>
								<strong>
                                                                    
                                                                <?php
                                                                
                                                                echo $texto->informacoes1;
                                                                
                                                                ?>
                                                                </strong><br>
                                                                <?php
								
								echo $texto->informacoes2;
                                                                echo "<br>";
								echo $texto->informacoes3;
                                                                echo "<br>";
                                                                echo $texto->informacoes4;



                                                            
                                                                }
                                                            ?>
							</small>
						</h4>
					</address>
				</div>
				<div class="col-sm-12 text-left">
					<address class="well">
						<h4>
                                                        <a href='#enviarMensagem' role='button' data-toggle='modal' style="text-decoration: none;">
                                                            <b>Quero enviar uma mensagem</b>
                                                        </a>

                                                  

						</h4>
					</address>
				</div>
			</div>
		</div>
            <div align="center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3673.9310742494995!2d-43.1981977!3d-22.9527654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x997fdeba3125c1%3A0x1f24ab34f8ff4226!2sR.+Mario+Pederneiras%2C+31+-+Humait%C3%A1%2C+Rio+de+Janeiro+-+RJ%2C+22261-020!5e0!3m2!1spt-BR!2sbr!4v1436276979892" width="960" height="600" frameborder="0" style="border:0" align="middle" allowfullscreen id="mapa"></iframe>
            </div>
        </div>
            <p style="height: 150px;"></p>

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
            <li>
                <a tabindex="0" href="<?php echo AGENDALINK;  ?>" target="_self"><i class="fa fa-dashboard"></i> Agenda</a>
            </li>
            <li>
                <a tabindex="0" href="<?php echo CALENDARIOLINK;  ?>" target="_self"><i class="fa fa-calendar"></i> Calendário</a>
            </li>
        </ul>
      </li>
      <li class="dropdown">
        <a tabindex="0" data-toggle="dropdown"><i class="fa fa-ticket"></i> <?php echo MENU4; ?><span class="caret"></span></a>

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
        <li id="contato" class="active">
                <a href="<?php echo "#";  ?>">
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
//    $formAdesao = new formAdesao();
//    
//    $formAdesao->telaFormAdesao();

?>



<!-- EOF -->
<div id="topcontrol" title="Voltar ao topo" style="position: fixed; bottom: 55px; right: 4px; opacity: 0; cursor: pointer;">
    <img src="images/up.png" style="width:30px; height:30px"></div>
<div id="topcontrol" title="Voltar ao topo" style="position: fixed; bottom: 55px; right: 4px; opacity: 0; cursor: pointer;">
    <img src="images/up.png" style="width:30px; height:30px">
</div>

<!-- Modal -->
<form name="form_contato" action="view/" method="post">
    <div class="modal fade" id="enviarMensagem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"><img src="images/logoRUV50x51.png"/> Rede Una Vida - <small>Enviar mensagem</small></h4>
                </div>
                <div class="modal-body">
                    <?php
                        $formulario->mensagemContato();
                    ?>
                </div>
                <div class="modal-footer" style="padding-right: 50px">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Enviar</button>
                </div>
                <br/>
            </div>
        </div>
    </div>
</form>


</body>
</html>