<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>REDE UNA VIDA</title>

        <link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" href="favicon.ico"> 

	<link rel="author" href="autor.txt">
</head>
<body>
	<header id="header">
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="text-center">
				<div class="navbar-text-top">
					<div class="col-sm-4">
						<figure class="navbar-logo navbar-left hidden-xs">
							<a href="index.html">
								<img src="assets/images/cetas_min.png" alt="Coletivo CETAS de Pesquisadores">
							</a>
						</figure><!-- /figure -->
					</div><!-- /col-sm-4 -->

					<div class="col-sm-4">
						<div class="hidden-sm"><span>REDE UNA VIDA</span></div>
						<div class="visible-sm"><span>REDE UNA VIDA</span></div>
						<div class="navbar-subtext-top hidden-sm">
							<!-- CENTRO DE ESTUDOS DO TRABALHO AMBIENTE E SA�DE -->
						</div><!-- /hidden-sm -->
						<div class="navbar-subtextsm-top visible-sm">
							<!-- CENTRO DE ESTUDOS DO TRABALHO AMBIENTE E SA�DE -->
						</div><!-- /visible-sm -->
					</div><!-- /col-sm-4 -->

					<hr class="visible-xs"><!-- /hr -->
					<br class="visible-xs">
					<div class="col-sm-4">
						<div class="navbar-text navbar-right">
							<a href="https://mail.cetas.com.br:8443" class="text-link">
								<button class="btn btn-primary">
									<i class="fa fa-envelope-o"></i> WebMail
								</button>
							</a><!--
							<a href="https://cetas.com.br/redmine" class="text-link">
								<button class="btn btn-danger">
									<i class="fa fa-users"></i> Redmine
								</button>
							</a>-->
							<a href="http://biblioteca.cetas.com.br" class="text-link">
                                                                <button class="btn btn-warning">
                                                                        <i class="fa fa-book"></i> Acesso ao Sistema
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
				<a class="navbar-brand" href="index.html">
					<img src="assets/images/unesp.png" alt="UNESP" class="hidden-sm hidden-xs">
					<img src="assets/images/unesp_sm.png" alt="UNESP" class="visible-sm visible-xs">
				</a><!-- /navbar-brand -->
			</div>
			<div class="collapse navbar-collapse" id="example-navbar-collapse">
				<ul class="nav navbar-nav navbar-right" id="menu">
					<li class="active" id="home">
						<a href="index.html">
							<i class="fa fa-home"></i> Home
						</a>
					</li>
					<li id="sobre">
						<a href="#">
							<i class="fa fa-quote-left"></i> Programação
						</a>
					</li>
					<li id="laboratorios">
						<a href="#">
							<i class="fa fa-puzzle-piece"></i> Agenda
						</a>
					</li>
					<li id="pessoas">
						<a href="#">
							<i class="fa fa-group"></i> Retiro
						</a>
					</li>
					<li id="pessoas">
						<a href="#">
							<i class="fa fa-group"></i> Calendário
						</a>
					</li>
					<li id="pessoas">
						<a href="#">
							<i class="fa fa-group"></i> Galeria
						</a>
					</li>
					<li id="pessoas">
						<a href="#">
							<i class="fa fa-group"></i> Sugestões
						</a>
					</li>
					<li id="pessoas">
						<a href="#">
							<i class="fa fa-group"></i> Quem Somos
						</a>
					</li>
					<li id="pessoas">
						<a href="#">
							<i class="fa fa-group"></i> Sistema
						</a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-globe"></i> Acompanhe
						</a>
					    <ul class="dropdown-menu">
					    	<li><a href="noticias.html"><i class="fa fa-rss"></i>&nbsp; Not�cias</a></li>
					    	<li><a href="eventos.html"><i class="fa fa-puzzle-piece"></i>&nbsp; Eventos</a></li>
					    	<li><a href="publicacao.html"><i class="fa fa-book"></i>&nbsp; Publica��es</a></li>
					    </ul>
					</li>
					<li id="contato">
						<a href="contato.html">
							<i class="fa fa-envelope-o"></i> Contato
						</a>
					</li>
				</ul>
			</div>
		</nav>
	</footer><!-- /footer -->

	<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('body').addClass('imagem');

      			/*$(this).on('click', 'li', function(event) {
      				event.preventDefault();

      				var url = $(this).attr('href');

      				$( "li" ).each(function( index ) {
					  	$(this).removeClass('active');
					});

					if(!$(this).is('index.htmlhome'))
					{
						$('body').removeClass('imagem');
					}
					else $('body').addClass('imagem');

      				$(this).addClass('active');
      			});*/
	});
</script>
</body>
</html>
<!-- EOF -->
