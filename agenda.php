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
        <style>
            body
            {
                padding-top: 80px;
                background-color: <?php echo AMARELOCLARO; ?>
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

        <div id="content">
            <div class="bs-docs-header bs-docs-first">
                <div class="container">
                    <div style="height: 30px">&nbsp;</div>

                    <div class='table-responsive' style='padding-left: 10px;'>				
                        <table  class="table table-condensed" style="font-family: Lato; font-size: 10px; text-align: center">
                            <tr style="background-color: #f1cd8b">
                                <td colspan="2"><div id="tituloPaginas" style="font-weight: normal;">Agenda</div></td>
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
                                                $periodo = filter_input(INPUT_GET, "periodo");
                                                if ($periodo == 91) {
                                                    $marcado = "selected='selected'";
                                                } else {
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

                            if ($periodo == "") {
                                $periodo = 0;
                            }



                            echo "<tr>";
                            echo "  <td colspan='2'>";

                            switch ($periodo) {
                                case 0: echo "<iframe src='view/agendaPadrao.php' frameborder='0' scrolling='yes' name='agendaPadrao' width='100%' height='529'></iframe>";
                                    break;
                                case 91: echo "<iframe src='view/setembro.php' width='100%' height='529' frameborder='0' scrolling='yes' style='padding-left: 0px;' name='slide'></iframe>";
                            }

                            echo "  </td>";
                            echo "</tr>";
                            ?>


                        </table>

                    </div>
                </div>
            </div>

        </div>

	<footer id="footer">
            <p style="height: 150px;"></p>
            <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation" id="corAzulInfo" style="border-color: #009ACD;">
                <?php
                    $titulo->preparaMenu("agenda");
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