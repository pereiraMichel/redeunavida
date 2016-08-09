<!DOCTYPE html>

<?php
    require_once './view/formulario.php';
    require_once './controller/constantes.php';
    require_once './controller/metodos.php';
    require_once './view/classFormAdesao.php';
    require_once './view/slideShow.php';
    require_once './texto/classTexto.php';

    $formulario = new formulario();
    
?>

<html lang="pt-br">
    <head>
	<meta charset="UTF-8">
	<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
        
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <meta name="description" content="Segundo Patanjali nos yogasutras, yoga citta vrtti nirodah traduz-se por 'yoga é pacificação das atividades da mente'.">
        <meta name="keywords" content="yoga Yoga eduardo quintella heiko roscheke">
        <meta name="author" content="Michel Pereira">
        <meta name="robots" content="nofollow">
        <meta name="google" content="notranslate">        
	<title><?php echo TITULORUV;?></title>

	<link rel="stylesheet" href="slider/css/screen_edit.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="slider/css/lightbox.css" type="text/css" media="screen" />
        <link href='http://fonts.googleapis.com/css?family=Fredoka+One|Open+Sans:400,700' rel='stylesheet' type='text/css'>
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
            /*html, body, div, iframe {margin: 0px; padding: 0px}*/
            iframe{width: 100%; border: none; position: absolute}
            body
            {
                padding-top: 80px;
            }

        </style>
        <link rel="author" href="autor.txt">      
    </head>
<body id="corAzulFundoClaro">
    <?php
        $metodo = new metodos();
        $metodo->modalAviso();
    ?>
    
	<header id="header">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="corAzulInfo">
				<div class="navbar-text-top">
                                            <?php
                                                $titulo = new slideShow();
                                                $titulo->telaTitulo();
                                            
                                            ?>


				</div>
		</nav>
	</header><!-- /header -->
            <!--<p style="height: 150px;"></p>-->

        <div id="content">
            <div class="bs-docs-header bs-docs-first">
                <div class="container">
                    <div class="col-sm-12">
                        <div id="tituloPaginas">Iyengar Yoga </div>
                        <br/>
                        <p style="text-align: justify; color: #1f226d;">
                            <?php
                            $quemsomos = new classTexto();

                            $quemsomos->textoYoga();
                            ?>
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>

<!-- Parte de baixo da página -->
	<footer id="footer">
            <p style="height: 150px;"></p>
            <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation" id="corAzulInfo" style="background-color: #BFE0F1;">
                <?php
                    $titulo->preparaMenu("yoga");
                ?>

            </nav>
	</footer>

<script src="slider/js/jquery-1.7.2.min.js"></script>
<script src="slider/js/jquery-ui-1.8.18.custom.min.js"></script>
<script src="slider/js/jquery.smooth-scroll.min.js"></script>
<script src="slider/js/lightbox.js"></script>

<!-- EOF -->
<div id="topcontrol" title="Voltar ao topo" style="position: fixed; bottom: 55px; right: 4px; opacity: 0; cursor: pointer;">
    <img src="images/up.png" style="width:30px; height:30px"></div>
<div id="topcontrol" title="Voltar ao topo" style="position: fixed; bottom: 55px; right: 4px; opacity: 0; cursor: pointer;">
    <img src="images/up.png" style="width:30px; height:30px">
</div>


</body>
</html>