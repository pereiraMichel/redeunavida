<!DOCTYPE html>

<?php
    require_once './view/formulario.php';
    require_once './controller/constantes.php';
    require_once './controller/metodos.php';
    require_once './texto/classTexto.php';
    require_once './view/slideShow.php';
    require_once './view/classFormAdesao.php';

    $texto = new classTexto();
    
?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo TITULORUV; ?></title>

        <link rel="stylesheet" href="css/font-awesome.min.css">
        
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
                background-color: <?php echo AZULMARINHO; ?>
            }
            
            @media only screen and (min-height : 1195px){
                body
                {
                    margin-top: 80px;
                    padding-top: 80px;
                }
                #espacamento
                {
                    height: 30px;
                }

        </style>
        <link rel="author" href="autor.txt">
    </head>
<body id="corAzulFundoClaro">
    <?php
    require_once './analyticstracking.php';

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

	<div id="content">
		<div class="bs-docs-header bs-docs-first">
			<div class="container">
<!--                            <p style="height: 20px;">&nbsp;</p>-->
                        <?php
                        
                        $texto->textoRedeSocialClinica();
//                        echo "<p style='height: 25px;'>&nbsp;</p>";
//                        $filename = "texto/redesocialclinica.xml";
//                        
//                        @header("Content-Type: text/html; charset=utf-8");
//                        $xml = simplexml_load_file($filename);
//
//                        foreach($xml->texto as $texto)
//                        {
//                            echo $texto->redesocialclinica;
//                            echo "<br>";
//                        }                        
                        ?>

			</div>
		</div>

        </div>

<!-- Parte de baixo da página -->
	<footer id="footer">
            <p style="height: 150px;"></p>
            <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation" id="corAzulInfo" style="background-color: #BFE0F1;">
                <?php
                    $titulo->preparaMenu("redeSocialClinica");
                ?>

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

</body>
</html>