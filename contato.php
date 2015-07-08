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
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">

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
							<a href="http://biblioteca.cetas.com.br" class="text-link">
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
				<h3 class="text-info"><i class="fa fa-envelope-o"></i> CONTATO</h3>
				<small>
                        <?php
                        $filename = "texto/contato.xml";
                        
                        @header("Content-Type: text/html; charset=utf-8");
                        $xml = simplexml_load_file($filename);

                        foreach($xml->texto as $texto)
                        {
                            echo $texto->contato;
                            echo "<br>";
                                              
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

                                                  
                                                    
<!--							Formulário:<br><br>
							<small>
								<strong>Rede Una Vida</strong><br>
								Universidade Estadual Paulista "Júlio de Mesquita Filho"<br>
								Rua Mário Pederneiras, 31 - Casa, Humaitá<br>
								Rio de Janeiro, RJ - Brasil<br>
								<abbr title="Phone">P:</abbr> (18) 3229-5388
								<abbr title="Fax">F:</abbr> (18) 3221-4391
							</small>-->
						</h4>
					</address>
				</div>
			</div>
		</div>
            <div align="center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3673.9310742494995!2d-43.1981977!3d-22.9527654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x997fdeba3125c1%3A0x1f24ab34f8ff4226!2sR.+Mario+Pederneiras%2C+31+-+Humait%C3%A1%2C+Rio+de+Janeiro+-+RJ%2C+22261-020!5e0!3m2!1spt-BR!2sbr!4v1436276979892" width="960" height="600" frameborder="0" style="border:0" align="middle" allowfullscreen></iframe>
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
                                                <li id="agenda">
                                                    <a href="agenda.php">
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
					<li class="active" id="contato">
						<a href="#">
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