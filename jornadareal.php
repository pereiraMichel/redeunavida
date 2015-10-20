<!DOCTYPE html>

<?php
require_once './view/formulario.php';
require_once './controller/constantes.php';
require_once './view/slideShow.php';
require_once './view/formAdesao.php';
require_once './texto/classTexto.php';

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
                    <h3 class="text-info"><i class="fa fa-book"></i> JORNADA REAL</h3>
                    <br/>
                    <div class="col-md-6">
                        <h3 style="font-size: 18px; padding-left: 10px">Texto Introdutório e Explicativo da Jornada Real</h3>
                    </div>
                    <div class="col-md-6 link-direita">
                        <a href="#">
                            <h3>
                                Programa JR - Download
                            </h3>
                        </a>
                    </div>
                    <div class="page-header"></div>

                    <small style="text-align: justify;">
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
                    </small>
                    <!--</div>-->
                </div>
            </div>
        </div>
        <!-- Parte de baixo da página -->
        <footer id="footer">
            <!--            <nav class="nav navbar-fixed-bottom navbar-header">
            <?php
//                    $titulo->telaLogoMarcasHorizontal();
            ?>
                        </nav>-->
            <p style="height: 150px;"></p>
            <nav class="nav navbar-fixed-bottom navbar-header">
                <?php
//                    $titulo->telaLogoMarcasHorizontal();
                ?>
            </nav>
            <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="contato.php" style="padding: 0px 0px 0px 10px;">
                        <small>
                            <h5>
                                <?php
                                echo ENDERECOORGAO;
                                echo "<br>" . TELEFONEORGAO;
                                ?>

                            </h5>
                        </small>
                    </a>
                </div>

                <div class="collapse navbar-collapse" style="padding-right: 10px;">
                    <ul class="nav navbar-nav navbar-right" id="menu">
                        <li id="home">
                            <a href="<?php echo HOMELINK; ?>">
                                <i class="fa icon-home"></i> Home
                            </a>
                        </li>
                        <li class="dropdown">
                            <a tabindex="0" data-toggle="dropdown"><i class="fa fa-puzzle-piece"></i> Programação<span class="caret"></span></a>

                            <!-- role="menu": fix moved by arrows (Bootstrap dropdown) -->
                            <ul class="dropdown-menu" role="menu">
                                <li class="active">
                                    <a tabindex="0" href="<?php echo "#"; ?>" target="_self">Jornada Real</a>

                                </li>

                                <li><a tabindex="0" href="<?php echo MEDITACAOLINK; ?>">Meditação</a></li>
                                <li><a tabindex="0" href="<?php echo MEDITCRISTALINK; ?>">Meditação Cristã</a></li>
                                <li><a tabindex="0" href="<?php echo RETIROLINK; ?>">Retiro</a></li>

                            </ul>
                        </li>
                        <li class="dropdown">
                            <a tabindex="0" data-toggle="dropdown"><i class="fa fa-clock-o"></i> Tempo<span class="caret"></span></a>

                            <!-- role="menu": fix moved by arrows (Bootstrap dropdown) -->
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a tabindex="0" href="<?php echo AGENDALINK; ?>" target="_self"><i class="fa fa-dashboard"></i> Agenda</a>
                                </li>
                                <li>
                                    <a tabindex="0" href="<?php echo CALENDARIOLINK; ?>" target="_self"><i class="fa fa-calendar"></i> Calendário</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a tabindex="0" data-toggle="dropdown"><i class="fa fa-ticket"></i> Sugestões<span class="caret"></span></a>

                            <!-- role="menu": fix moved by arrows (Bootstrap dropdown) -->
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a tabindex="0" href="<?php echo YOGALINK; ?>"> Yoga</a>
                                </li>
                                <li>
                                    <a tabindex="0" href="<?php echo RODASONHOSLINK; ?>"> Roda dos Sonhos</a>
                                </li>
                                <li>
                                    <a tabindex="0" href="<?php echo TRANSPESSOALLINK; ?>"> Transcurso Transpessoal</a>
                                </li>
                            </ul>
                        </li>
                        <li id="galeria">
                            <a href="<?php echo GALERIALINK; ?>">
                                <i class="fa fa-ticket"></i> Galeria
                            </a>
                        </li>
                        <li id="quemsomos">
                            <a href="<?php echo QUEMSOMOSLINK; ?>" target="_self">
                                <i class="fa fa-book"></i> Quem Somos
                            </a>
                        </li>
                        <li id="contato">
                            <a href="<?php echo CONTATOLINK; ?>">
                                <i class="fa fa-envelope-o"></i> Contato
                            </a>
                        </li>
                        <li id="blog">
                            <a href="<?php echo BLOGLINK; ?>">
                                <i class="fa fa-link"></i> Blog
                            </a>
                        </li>
                        <li id="">
                            <a href="#">
                                <i class="fa fa-2x"></i> &nbsp;
                            </a>
                        </li>
                    </ul>
                </div>
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