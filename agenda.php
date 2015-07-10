<!DOCTYPE html>

<?php
    require_once './view/formulario.php';
    require_once './controller/constantes.php';

    $formulario = new formulario();

?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>REDE UNA VIDA</title>

        <link rel="stylesheet" href="css/font-awesome.min.css">
        
        <link rel="shortcut icon" href="icon/ruv.ico">
        
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript">
                jQuery(document).ready(function($) {
                        $('body').addClass('images');
                });
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
					<div class="col-sm-4">
						<figure class="navbar-logo navbar-left hidden-xs">
							<a href="index.php">
								<img src="images/logoRUV50x51.png" title="Rede Una Vida">
							</a>
						</figure><!-- /figure -->
					</div><!-- /col-sm-4 -->

					<div class="col-sm-4">
						<div class="hidden-sm"><span>RUV</span></div>
						<div class="visible-sm"><span>RUV</span></div>
						<div class="navbar-subtext-top hidden-sm">
							 REDE UNA VIDA 
						</div><!-- /hidden-sm -->
						<div class="navbar-subtextsm-top visible-sm">
							 REDE UNA VIDA 
						</div><!-- /visible-sm -->
					</div><!-- /col-sm-4 -->

					<hr class="visible-xs"><!-- /hr -->
					<br class="visible-xs">
					<div class="col-sm-4">
						<div class="navbar-text navbar-right">
							<!--<a href="https://mail.cetas.com.br:8443" class="text-link">
								<button class="btn btn-primary">
									<i class="fa fa-envelope-o"></i> WebMail
								</button>
							</a>
							<a href="https://cetas.com.br/redmine" class="text-link">
								<button class="btn btn-danger">
									<i class="fa fa-users"></i> Redmine
								</button>
							</a>-->
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

	<div id="content">
		<div class="bs-docs-header bs-docs-first">
			<div class="container">
				<h3 class="text-info"><i class="fa fa-dashboard"></i> AGENDA</h3>
				<small>
                        <?php
                        $filename = "texto/agenda.xml";
                        
                        @header("Content-Type: text/html; charset=utf-8");
                        $xml = simplexml_load_file($filename);

                        foreach($xml->texto as $texto)
                        {
                            echo $texto->agenda;
                            echo "<br>";
                        }                        
                        ?>
				</small>
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
<!--				<a class="navbar-brand" href="index.php">
					<img src="assets/images/unesp.png" alt="UNESP" class="hidden-sm hidden-xs">
					<img src="assets/images/unesp_sm.png" alt="UNESP" class="visible-sm visible-xs">
				</a> /navbar-brand -->
			</div>
			<div class="collapse navbar-collapse" id="example-navbar-collapse">
				<ul class="nav navbar-nav navbar-right" id="menu">
					<li id="home">
						<a href="index.php">
							<i class="fa icon-home"></i> Home
						</a>
					</li>
					<li id="quemsomos">
                                            <a href="quemsomos.php">
							<i class="fa fa-book"></i> Quem Somos
						</a>
					</li>
					<li id="programacao">
                                            <a href="programacao.php">
							<i class="fa fa-puzzle-piece"></i> Programação
						</a>
					</li>
					<li id="galeria">
                                            <a href="galeria.php">
							<i class="fa fa-ticket"></i> Galeria
						</a>
					</li>
					<li id="sugestoes">
                                            <a href="sugestoes.php">
							<i class="fa fa-comment"></i> Sugestões
						</a>
					</li>
					<li id="sistema">
                                            <a href="sistema/">
							<i class="fa fa-th"></i> Sistema
						</a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-globe"></i> Acompanhe
						</a>
					    <ul class="dropdown-menu">
                                                <li class="active" id="agenda">
                                                    <a href="#">
                                                                <i class="fa fa-dashboard"></i> Agenda
                                                        </a>
                                                </li>
                                                <li id="retiro">
                                                    <a href="retiro.php">
                                                                <i class="fa fa-group"></i> Retiro
                                                        </a>
                                                </li>
                                                <li id="calendario">
                                                    <a href="calendario.php">
                                                                <i class="fa fa-calendar"></i> Calendário
                                                        </a>
                                                </li>
					    </ul>
					</li>
					<li id="contato">
						<a href="contato.php">
							<i class="fa fa-envelope-o"></i> Contato
						</a>
					</li>
				</ul>
			</div>
		</nav>
	</footer>

<!-- EOF -->
<div id="topcontrol" title="Voltar ao topo" style="position: fixed; bottom: 55px; right: 4px; opacity: 0; cursor: pointer;">
    <img src="images/up.png" style="width:30px; height:30px"></div>
<div id="topcontrol" title="Voltar ao topo" style="position: fixed; bottom: 55px; right: 4px; opacity: 0; cursor: pointer;">
    <img src="images/up.png" style="width:30px; height:30px">
</div>


</body>
</html>