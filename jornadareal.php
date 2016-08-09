<!DOCTYPE html>

<?php
require_once './view/formulario.php';
require_once './controller/constantes.php';
require_once './controller/metodos.php';
require_once './view/slideShow.php';
require_once './view/classFormAdesao.php';
require_once './texto/classTexto.php';

$formulario = new formulario();
?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->

        <meta name="viewport" content="width=device-width, user-scalable=no">
        <meta name="description" content="Jornada Real é um programa de autoconhecimento transmitido através de encontros semanais em grupo no período de um ano">
        <meta name="keywords" content="jornada real jr">
        <meta name="author" content="Michel Pereira">
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
        <script src="js/bootstrap.js" defer=""></script>
        <script src="js/highlight.min.js" defer=""></script>
        <script src="js/bootstrap-submenu.js" defer=""></script>
        <script src="js/docs.js" defer=""></script>
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
            /*html, body, div, iframe {margin: 0px; padding: 0px}*/
            /*iframe{width: 100%; border: none; position: absolute}*/
            body
            {
                padding-top: 80px;
                background-color: <?php echo AZULFUNDOCLARO; ?>
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

                    <h3 class="text-info" style='text-align: center; font-family: garamond; font-size: 30px; font-weight: bold; color: #1f226d;'>
                        <img src="images/logoJrGraficoColor.png" width="32" height="32" title="Jornada Real">
                         Jornada Real
                    </h3>
                    <br/>
                    <div class="col-md-12">

                        <div class="table-responsive" style="font-family: garamond; font-size: 20px; color: #1f226d;">
                            <div class="col-md-3"></div>
                            <div class="col-md-6 text-center">
                                <table class="table">
                                    <tr colspan="2">
                                        <td style="border-color: #1874CD;">Jornada Real é um programa de autoconhecimento transmitido através de encontros semanais em grupo no período de um ano.</td>
                                    </tr>
                                    <tr class="warning">
                                        <td colspan="2" style="background-color: #fff; border-color: #1874CD;">
                                            <!--  opacity:.65;filter:alpha(opacity=65);-webkit-box-shadow:none; -->
                                            <a href="#textoIntrodutorio" style="text-decoration: none; color: #1f226d;">
                                                <abbr title="Leia o texto abaixo">Mais detalhes, ler abaixo.</abbr>
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-3"></div>

                        </div>
                    </div>
                    
                    <p style="height: 120px">&nbsp;</p>
                    <div class="col-md-6">
                        <h3 style="font-size: 20px; padding-left: 10px; font-family: garamond; font-weight: bold; color: #1f226d;" id="textoIntrodutorio">Texto Introdutório e Explicativo da Jornada Real</h3>
                    </div>
                    <div class="col-md-6" style="text-align: right;">
                        <a href="downloads.php" target="_self">
                            <button class="btn btn-default" style="color: #1f226d;">
                                <img src="images/logoJrGraficoColor.png" width="16" height="16" title="Jornada Real">
                                Programa JR - Download
                            </button>
                            <!--</h3>-->
                        </a>
                    </div>
                    <div class="page-header">&nbsp;</div>

                    <div class="col-md-12">
                        <p style="text-align: justify;">
                            <?php
                            $textoJR = new classTexto();

                            $textoJR->textoJornadaReal();
//                        $filename = "texto/quemsomos.xml";
//                        
//                        @header("Content-Type: text/html; charset=utf-8");
//                        $xml = simplexml_load_file($filename);
//
//                        foreach($xml->texto as $texto)
//                        {
//                            echo $texto->quemsomos;
//                            echo "<br>";
//                        }
                            ?>
                        </p>
                    </div>

                    <!--</div>-->
                </div>
            </div>
            <div style="height: 40px;">&nbsp;</div>
            <div class="alert alert-info" role="alert">
                <div class="text-center" style="font-family: garamond; font-size: 18px;">
                    Faça o seu cadastro, telefone ou envie um e-mail para marcar uma entrevista.
                </div>
            </div>
        </div>
        <!-- Parte de baixo da página -->
        <footer id="footer">

            <p style="height: 150px;"></p>
            <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation" id="corAzulInfo" style="background-color: #BFE0F1;">
                <?php
                    $titulo->preparaMenu("jornadaReal");
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