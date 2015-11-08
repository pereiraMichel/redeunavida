<!DOCTYPE html>

<?php
require_once './view/formulario.php';
require_once './controller/constantes.php';
require_once './view/slideShow.php';
require_once './view/classFormAdesao.php';
require_once './texto/classTexto.php';

//if($_SESSION['logado'] == false){
//    header("Location: downloads.php");
//}
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
            body{padding-top: 80px;}

        </style>
        <link rel="author" href="autor.txt">      
    </head>
    <body>
        <header id="header">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="text-center">
                    <div class="navbar-text-top">
                        <?php
                        $titulo = new slideShow();
                        $titulo->telaTitulo();
                        ?>
                    </div>
                </div>
            </nav>
        </header><!-- /header -->

        <div id="content">
            <div class="bs-docs-header bs-docs-first">
                <div class="container">

                    <h3 class="text-info"><i class="fa fa-download"></i> DOWNLOADS - OUTONO</h3>
                    <br/>

                    <div class="col-md-12">
                            
                        <div class="table-responsive">
                            <div class="col-md-2"></div>
                            <div class="col-md-8 text-center">
                                <table class="table small">
                                    <tr>
                                        <td colspan="3" style="background-color: #FFCCFF;"><h4>JORNADA REAL - Programa</h4></td>
                                    </tr>
                                    <tr class="warning">
                                        <td colspan="3">Se você já tem o programa, verifique a data de atualização para saber se está atualizado.</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="success">17/10/2015</td>
                                    </tr>
                                    <tr class="warning">
                                        <td>
                                                Jornada Real - Livro de Programa outono 2015
                                            </a>
                                        </td>
                                        <td>
                                            <a href="downloads/outono/09 Jornada Real - Livro de Programa outono 2015.pdf" target="_blank">
                                                <img src="images/icon-pdf.png" title="Arquivo em formato PDF">
                                            </a>
                                            
                                        </td>
                                        <td>
                                            <a href="downloads/outono/09 Jornada Real - Livro de Programa outono 2015.doc">
                                                <img src="images/word_icon.png" title="Arquivo em formato Word 2007">
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                                <label class="label label-danger">Apenas quem está inscrito na JR.</label>
                            </div>
                            <div class="col-md-2"></div>

                        </div>
                    </div>


                    <p style="height: 120px">&nbsp;</p>
                    <!--</div>-->
                </div>
            </div>
            <br/><br/>
            <!--<div class="col-md-3"></div>-->
            <div class="col-md-12 text-center">
                <!--<a href="#enviarAdesao" role="button" data-toggle="modal" style="text-decoration: none;" class="btn btn-default">Ainda não é cadastrado? Clique aqui e cadastre!</a>-->

                <a href="javascript:history.go(-1);" class="btn btn-default">Voltar</a>
            </div>
            <!--<div class="col-md-3"></div>-->
            
        </div>
        <!-- Parte de baixo da página -->
        <footer id="footer">
            <p style="height: 150px;"></p>
            <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
                <?php
                    $titulo->preparaMenu("arqOutono");
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