<?php
require_once 'view/formulario.php';
require_once 'controller/constantes.php';
require_once 'controller/metodos.php';
require_once 'view/slideShow.php';
require_once 'view/classFormAdesao.php';
require_once 'texto/classTexto.php';

$formulario = new formulario();
$texto = new classTexto();

error_reporting(0);
//echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=meditcrista.php'>";
//    $texto->modalDownload();

/* @var $_GET type */
    $sucesso = $_GET['s'];
    $download = $_GET['d'];

if($_GET){
    if($sucesso){
        $texto->preparaDownload($sucesso);
    }
    
    
    switch ($download){
        case "107":
            $texto->downloaPdf("MC107Paragem113.pdf");
            break;
        case "108":
            $texto->downloaPdf("MC108Paragem114.pdf");
            break;
        case "109":
            $texto->downloaPdf("MC109Paragem121.pdf");
            break;
        case "110":
            $texto->downloaPdf("MC110Paragem122.pdf");
            break;
        case "111":
            $texto->downloaPdf("MC111Paragem123.pdf");
            break;
        case "112":
            $texto->downloaPdf("MC112Paragem124.pdf");
            break;
        case "113":
            $texto->downloaPdf("MC113Paragem131.pdf");
            break;
        case "114":
            $texto->downloaPdf("MC114Paragem132.pdf");
            break;
        case "115":
            $texto->downloaPdf("MC115Paragem133.pdf");
            break;
        case "116":
            $texto->downloaPdf("MC116Paragem134.pdf");
            break;
        case "117":
            $texto->downloaPdf("MC117Paragem135.pdf");
            break;
        case "118":
            $texto->downloaPdf("MC118Paragem211.pdf");
            break;
        case "119":
            $texto->downloaPdf("MC119Paragem212.pdf");
            break;
        case "120":
            $texto->downloaPdf("MC120Paragem213.pdf");
            break;
        case "121":
            $texto->downloaPdf("MC121Paragem214.pdf");
            break;
        case "122":
            $texto->downloaPdf("MC122Paragem221.pdf");
            break;
        case "123":
            $texto->downloaPdf("MC123Paragem222.pdf");
            break;
        case "124":
            $texto->downloaPdf("MC124Paragem223.pdf");
            break;
        case "125":
            $texto->downloaPdf("MC125Paragem224.pdf");
            break;
        case "126":
            $texto->downloaPdf("MC126Paragem231.pdf");
            break;
        case "127":
            $texto->downloaPdf("MC127Paragem232.pdf");
            break;
        case "128":
            $texto->downloaPdf("MC128Paragem233.pdf");
            break;
        case "129":
            $texto->downloaPdf("MC129Paragem234.pdf");
            break;
        case "130":
            $texto->downloaPdf("MC130Paragem235.pdf");
            break;
        case "131":
            $texto->downloaPdf("MC131Paragem311.pdf");
            break;
        case "132":
            $texto->downloaPdf("MC132Paragem312.pdf");
            break;
        case "133":
            $texto->downloaPdf("MC133Paragem313.pdf");
            break;
        case "134":
            $texto->downloaPdf("MC134Paragem314.pdf");
            break;
        case "135":
            $texto->downloaPdf("MC135Paragem321.pdf");
            break;
        case "136":
            $texto->downloaPdf("MC136Paragem322.pdf");
            break;
        case "137":
            $texto->downloaPdf("MC137Paragem323.pdf");
            break;
        case "138":
            $texto->downloaPdf("MC138Paragem324.pdf");
            break;
        case "139":
            $texto->downloaPdf("MC139Paragem331.pdf");
            break;
        case "140":
            $texto->downloaPdf("MC140Paragem333.pdf");
            break;
    }
            echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=meditcrista.php'>";
    
//define('mTime', $texto->calculaTempo());
//
//$tempo = $texto->calculaTempo(mTime);
//
}

            
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->

        <meta name="viewport" content="width=device-width, user-scalable=no">
        <meta name="description" content="Meditação Cristã. Em todos os domingos nos encontramos na nossa sede para realizar nossa costumeira e nutridora Meditação Cristã (MC).">
        <meta name="keywords" content="Meditação cristã meditação cristã evangelho composição reunião dinâmica">
        <meta name="author" content="REDEUNAVIVA - MAPTI">
        <meta name="robots" content="nofollow">
        <meta name="google" content="notranslate">        
        <title><?php echo TITULORUV; ?></title>

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
        <script src="js/modal.js" defer=""></script>
        <script src="js/bootstrap.js" defer=""></script>
        <script src="js/highlight.min.js" defer=""></script>
        <script src="js/bootstrap-submenu.js" defer=""></script>
        <script src="js/docs.js" defer=""></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        
        <!--<script src="js/bootstrap-transition.js" defer=""></script>-->
        <!--<script src="js/bootstrap-collapse.js" defer=""></script>-->
        <!--<script src="js/control.js" defer=""></script>-->

        <script>
            $('.dropdown-submenu > a').submenupicker();
        </script>

        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $('body').addClass('images');
            });
        </script>

        <style>
            body
            {
                padding-top: 80px;
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

                    <div id="tituloPaginas" style="font-weight: normal; font-size: 33px;"> Meditação Cristã</div>
                    <br/>

                    <?php
                        $texto->textoMeditacaoCrista();
                    
                    ?>
                </div>
            </div>
        </div>
        <!-- Parte de baixo da página -->
        <footer id="footer">
            <p style="height: 150px;"></p>
            <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation" id="corAzulInfo" style="background-color: #BFE0F1;">
                <?php
                    $titulo->preparaMenu("meditacaoCrista");
                ?>

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