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
            body
            {
                padding-top: 70px;
                background-color: <?php echo AZULINFO; ?>;
            }
        </style>
       
        
        <link rel="author" href="autor.txt">        
    </head>
<body>
	<header id="header">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="corAzulInfo">
			<div class="text-center">
                                            <?php
                                                $titulo = new slideShow();
                                                $titulo->telaTitulo();
                                            
                                            ?>

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
                                                        <a href='#enviarMensagem' role='button' data-toggle='modal' style="text-decoration: none; color: #3F6CA1">
                                                            <b>Quero enviar uma mensagem</b>
                                                        </a>

                                                  

						</h4>
					</address>
				</div>
			</div>
		</div>
            <div align="center" id="mapa">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3673.9310742494995!2d-43.1981977!3d-22.9527654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x997fdeba3125c1%3A0x1f24ab34f8ff4226!2sR.+Mario+Pederneiras%2C+31+-+Humait%C3%A1%2C+Rio+de+Janeiro+-+RJ%2C+22261-020!5e0!3m2!1spt-BR!2sbr!4v1436276979892" width="960" height="600" frameborder="0" style="border:0" align="middle" allowfullscreen id="mapa"></iframe>
            </div>
        </div>
            <p style="height: 150px;"></p>

<!-- Parte de baixo da página -->
	<footer id="footer">
            <p style="height: 150px;"></p>
            <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation" id="corAzulInfo">
                <?php
                    $titulo->preparaMenu("contato");
                ?>

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
                    <h4 class="modal-title" id="myModalLabel" style="color: #3F6CA1;"><img src="images/logoRUV50x51.png"/> Rede Una Vida - <small style="color: #3F6CA1;">Enviar mensagem</small></h4>
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