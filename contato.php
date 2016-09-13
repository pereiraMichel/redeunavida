<!DOCTYPE html>

<?php

require_once './view/formulario.php';
require_once './controller/constantes.php';
require_once './controller/metodos.php';
require_once './view/classFormAdesao.php';
require_once './view/slideShow.php';
require_once './controller/enviaMensagem.php';
require_once './lib/phpmailer/class.phpmailer.php';
require_once './lib/phpmailer/class.smtp.php';
require_once './lib/phpmailer/class.pop3.php';
require_once './lib/phpmailer/class.phpmaileroauth.php';
require_once './lib/phpmailer/PHPMailerAutoload.php';


$formulario = new formulario();


?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <meta name="description" content="REDE UNA VIVA">
        <meta name="keywords" content="rede una viva ruv jr jornada real contato fale conosco">
        <meta name="author" href="autor.txt">
        <meta name="robots" content="nofollow">
        <meta name="google" content="notranslate">        
        <title><?php echo TITULORUV; ?></title>

        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        
        <link rel="shortcut icon" href="icon/ruv.ico">
        <link rel="icon" type="image/png" href="images/ruvicon.png">
        
        <!--<link rel="stylesheet" href="css/bootstrap-responsive.css">-->
        <!--<link rel="stylesheet" href="css/menuResponsive.css">-->
        <link rel="stylesheet" href="css/bootstrap-submenu.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-responsive_1.css">
        <link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/docs.css">
        <link rel="stylesheet" href="css/estilo.css">

        <script src="js/jquery.js" defer=""></script>
        <script src="js/bootstrap.js" defer=""></script>
        <script src="js/highlight.min.js" defer=""></script>
        <script src="js/bootstrap-submenu.js" defer=""></script>
        <script src="js/docs.js" defer=""></script>
        <script src="sistema/js/validaCampos.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="js/modal.js"></script>

        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $('body').addClass('images');
            });
        </script>

        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                scrolltotop.init();
            });
        </script>  
        <style>
            body
            {
                padding-top: 80px;
                background-color: <?php echo AZULFUNDOCLARO; ?>;
                
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
            }
            
        </style>
    </head>
    <body>
    <?php require_once './analyticstracking.php'; ?>

        
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
<!--                    <i class="fa fa-envelope-o" style="font-size: 25px; color: #1f226d;"></i>-->
                    <span id="tituloPaginas" style="text-align: left; color: #1f226d; font-weight: normal;"> Contato</span>
                    <p style="height: 20px;"></p>

                    <span style="color: #1f226d; font-size: 16px;">
                        <?php
                        echo "<p style='height: 15px;'>&nbsp;</p>";
                        $filename = "texto/contato.xml";

                        @header("Content-Type: text/html; charset=utf-8");
                        $xml = simplexml_load_file($filename);

                        foreach ($xml->texto as $texto) {
                            echo $texto->contato;
                            echo "<p style='height: 20px;'></p>";
                            ?>
                        </span>
                    </div>
                </div>
                <div class="bs-docs-header bs-color-inverse">
                    <div class="container" style="color: #1f226d;">
                        <div class="col-sm-12 text-left">
                            <address class="well">
                                <span style="font-size: 18px;">
                                    <b>Informações de Contato</b><br><br>
                                    <span style="font-size: 16px;">
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
                                </span>
                            </span>
                        </address>
                    </div>
                    <div class="col-sm-12 text-left">
                        <address class="well">
                            <h4>
                                <!--<a href='#enviarMensagem' role='button' data-toggle='modal' style="text-decoration: none; color: #3F6CA1">-->
                                    <!--<b>Quero enviar uma mensagem</b>-->
                                <!--</a>-->

                            <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                              Quero enviar uma mensagem
                            </a>
                                <p style="height: 10px;"></p>
                                <!--<div class="label label-info" id="mensagem" style="display: none;"></div>-->
                                <a class="alert alert-danger" id="erro" style="display: none;">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    Ocorreu um erro. Tente novamente mais tarde.
                                </a>
                                <a class="alert alert-success" id="sucesso" style="display: none;">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    Mensagem enviada com sucesso!
                                </a>
                            <div class="collapse" id="collapseExample">
                              <div class="well">
                                <?php
                                $formulario->mensagemContato();    
                                
                                ?>
                              </div>
                            </div>

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
            <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation" id="corAzulInfo" style="background-color: #BFE0F1;">
                <?php
                    $titulo->preparaMenu("contato");
                ?>

            </nav>
	</footer>
        
    </body>
</html>