<!DOCTYPE html>

<?php
//    require_once './view/formulario.php';
    require_once './controller/constantes.php';
    require_once './controller/metodos.php';
    require_once './view/slideShow.php';

    error_reporting(0);
    
//    $formulario = new formulario();

?>

<html lang="pt-br">
    <head>
	<meta charset="UTF-8">
	<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
        
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <meta name="description" content="SEMANA RUV">
        <meta name="keywords" content="rede una viva redeunviva jornada real jr ruv semana">
        <meta name="author" content="Michel Pereira">
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
    
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="view/dist/css/bootstrap-select.css">
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <!--<script type="text/javascript" src="js/bootstrap.min.js"></script>-->
	<link rel="stylesheet" href="css/estilo.css">
        
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
                if(mes === 0){
                    window.location.href="agenda.php";
                }else{
                    window.location.href="agenda.php?periodo=" + mes;
                }
            }
        </script>

<!--	<script type="text/javascript" src="./CETAS_files/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="./CETAS_files/back-to-top.js"></script>-->
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			scrolltotop.init();
		});
	</script>        
        <style>
            body
            {
                padding-top: 80px;
                background-color: <?php echo AMARELOCLARO; ?>
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
    <?php require_once './analyticstracking.php';

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
                    <div style="height: 30px">&nbsp;</div>

                    <div class='table-responsive' style='padding-left: 10px;'>				
                        <table  class="table table-condensed" style="font-family: Lato; font-size: 10px; text-align: center">
                            <tr style="background-color: #fff; ">
                                <td colspan="2"><div id="tituloPaginas" style="font-weight: normal; color: #B22222">Jornada Real - novos grupos - a partir de 18 de setembro de 2016</div></td>
                            </tr>
                            <tr class="warning">
                                <td colspan="2"><div id="tituloPaginas" style="font-weight: normal;">Semana - RUV</div></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <table class="table table-condensed" style="font-family: Lato; font-size: 10px; text-align: center; padding: 0; margin-bottom: 0;">
                                        <tbody>
                                            <!-- Cabeçalho -->
                                            <tr style="font-size: 15px; text-align: center">
                                                <td class="active" style="width: 50px">&nbsp;</td>
                                                <td style="width: 150px"><b>Domingo</b></td>
                                                <td style="width: 150px"><b>2ª Feira</b></td>
                                                <td style="width: 150px"><b>3ª Feira</b></td>
                                                <td style="width: 150px"><b>4ª Feira</b></td>
                                                <td style="width: 150px"><b>5ª Feira</b></td>
                                                <td style="width: 150px"><b>6ª Feira</b></td>
                                                <td style="width: 150px"><b>Sábado</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
<?php                       
                            echo "<iframe src='view/iSemanaRuv.php' frameborder='0' scrolling='yes' name='agendaPadrao' width='100%' height='600'></iframe>";
                            ?>
                                </td>
                            </tr>
                            <?php
                            /* @var $_GET type */
//                            echo "<tr>";
//                            echo "  <td colspan='2'>";
//
//                            echo "<iframe src='view/iSemanaRuv.php' frameborder='0' scrolling='yes' name='agendaPadrao' width='100%' height='600'></iframe>";
//
//                            echo "  </td>";
//                            echo "</tr>";
                            ?>


                        </table>

                    </div>
                </div>
            </div>

        </div>

	<footer id="footer">
            <p style="height: 150px;"></p>
            <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation" id="corAzulInfo" style="background-color: #BFE0F1;">
                <?php
                    $titulo->preparaMenu("semanaruv");
                ?>

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