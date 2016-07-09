<!DOCTYPE html>

<?php

    $_SERVER['PATH_INFO'] = "redeunaviva.mapti.com.br/";
    
    require_once './view/formulario.php';
    require_once './controller/constantes.php';
    require_once './controller/metodos.php';
    require_once './view/slideShow.php';
    require_once './view/classFormAdesao.php';

    $formulario = new formulario();

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
        
	<link rel="stylesheet" href="slider/css/screen.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="slider/css/lightbox.css" type="text/css" media="screen" />
        <link href='http://fonts.googleapis.com/css?family=Fredoka+One|Open+Sans:400,700' rel='stylesheet' type='text/css'>
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
        

        <script src="js/bootstrap-submenu.js" defer=""></script>
        <script src="js/docs.js" defer=""></script>
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

        </style>
        <link rel="author" href="autor.txt">
    </head>
<body id="corAzulInfo">
    <?php
//        $metodo = new metodos();
//        $metodo->modalAviso();
    $margemImagens = "style='height: 110px; width: 170px;'";
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

        <div id="tituloPaginas" style="color: #fff;">Atividades da Rede Una Viva</div>
        <p style="height: 30px;">&nbsp;</p>
            <div class="content" style="margin: 0 auto; padding-left: 1%; padding-right: 1%;">
                <div class="col-sm-12">

                    <div class="col-sm-2" id="subTituloGaleria">
                        Jornada Real
                        <div class="imageRow">
                            <div class="set">
                                <div class="single first">
                                    <a href="slider/images/galeria/foto14.JPG" rel="lightbox[plants]" title="Jornada Real - Foto 1">
                                        <img src="slider/images/galeria/foto14.JPG" alt="Jornada Real - Foto 1 de 8" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/galeria/foto3.JPG" rel="lightbox[plants]" title="Jornada Real - Foto 2">
                                        <img src="slider/images/galeria/foto3.JPG" alt="Foto 2 de 8" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/galeria/foto19.jpg" rel="lightbox[plants]" title="Jornada Real - Foto 3">
                                        <img src="slider/images/galeria/foto19.jpg" alt="Foto 3 de 8" <?php echo $margemImagens; ?> title="Jornada Real - Foto 3" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/jornadaReal/foto1.jpg" rel="lightbox[plants]" title="Jornada Real - Foto 4">
                                        <img src="slider/images/jornadaReal/foto1.jpg" alt="Foto 4 de 8" <?php echo $margemImagens; ?> title="Jornada Real - Foto 4" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/jornadaReal/foto2.jpg" rel="lightbox[plants]" title="Jornada Real - Foto 5">
                                        <img src="slider/images/jornadaReal/foto2.jpg" alt="Foto 5 de 8" <?php echo $margemImagens; ?> title="Jornada Real - Foto 5" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/jornadaReal/foto3.jpg" rel="lightbox[plants]" title="Jornada Real - Foto 6">
                                        <img src="slider/images/jornadaReal/foto3.jpg" alt="Foto 6 de 8" <?php echo $margemImagens; ?> title="Jornada Real - Foto 6" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/jornadaReal/foto4.jpg" rel="lightbox[plants]" title="Jornada Real - Foto 7">
                                        <img src="slider/images/jornadaReal/foto4.jpg" alt="Foto 7 de 8" <?php echo $margemImagens; ?> title="Jornada Real - Foto 7" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/jornadaReal/foto5.jpg" rel="lightbox[plants]" title="Jornada Real - Foto 8">
                                        <img src="slider/images/jornadaReal/foto5.jpg" alt="Foto 8 de 8" <?php echo $margemImagens; ?> title="Jornada Real - Foto 8" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div style="height: 200px;">&nbsp;</div>
                    </div>
                    
                    <div class="col-sm-2" id="subTituloGaleria">
                        Jornada de Meditação
                        <div class="imageRow">
                            <div class="set">
                                <div class="single first">
                                    <a href="slider/images/galeria/foto7.jpg" rel="lightbox[plants]" title="Foto 7">
                                        <img src="slider/images/galeria/foto7.jpg" alt="Foto 7 de 21" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/galeria/foto8.JPG" rel="lightbox[plants]" title="Foto 8">
                                        <img src="slider/images/galeria/foto8.JPG" alt="Foto 8 de 21" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                        <div style="height: 200px;">&nbsp;</div>
                        
                    </div>
                    <div class="col-sm-2" id="subTituloGaleria">
                        <?php $textoTitulo = "Meditação Cristã"; ?>
                        Meditação Cristã
                        <div class="imageRow">
                            <div class="set">
                                <div class="single first">
                                    <a href="slider/images/galeria/foto1.JPG" rel="lightbox[plants]" title="<?php echo $textoTitulo; ?> - Foto 1">
                                        <img src="slider/images/galeria/foto1.JPG" title="<?php echo $textoTitulo; ?> - Foto 1 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/galeria/foto5.JPG" rel="lightbox[plants]" title="<?php echo $textoTitulo; ?> - Foto 2">
                                        <img src="slider/images/galeria/foto5.JPG" title="<?php echo $textoTitulo; ?> - Foto 2 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/galeria/foto9.JPG" rel="lightbox[plants]" title="<?php echo $textoTitulo; ?> - Foto 3">
                                        <img src="slider/images/galeria/foto9.JPG" title="<?php echo $textoTitulo; ?> - Foto 3 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/galeria/foto18.jpg" rel="lightbox[plants]" title="<?php echo $textoTitulo; ?> - Foto 4">
                                        <img src="slider/images/galeria/foto18.jpg" title="Foto 4 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/meditacaoCrista/foto1.jpg" rel="lightbox[plants]" title="<?php echo $textoTitulo; ?> - Foto 5">
                                        <img src="slider/images/meditacaoCrista/foto1.jpg" title="<?php echo $textoTitulo; ?> - Foto 5 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/meditacaoCrista/foto2.jpg" rel="lightbox[plants]" title="<?php echo $textoTitulo; ?> -Foto 6">
                                        <img src="slider/images/meditacaoCrista/foto2.jpg" title="<?php echo $textoTitulo; ?> - Foto 6 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/meditacaoCrista/foto3.jpg" rel="lightbox[plants]" title="<?php echo $textoTitulo; ?> - Foto 7">
                                        <img src="slider/images/meditacaoCrista/foto3.jpg" title="<?php echo $textoTitulo; ?> - Foto 7 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/meditacaoCrista/foto4.jpg" rel="lightbox[plants]" title="<?php echo $textoTitulo; ?> - Foto 8">
                                        <img src="slider/images/meditacaoCrista/foto4.jpg" title="<?php echo $textoTitulo; ?> - Foto 8 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/meditacaoCrista/foto5.jpg" rel="lightbox[plants]" title="<?php echo $textoTitulo; ?> - Foto 9">
                                        <img src="slider/images/meditacaoCrista/foto5.jpg" title="<?php echo $textoTitulo; ?> - Foto 9 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/meditacaoCrista/foto6.jpg" rel="lightbox[plants]" title="<?php echo $textoTitulo; ?> - Foto 10">
                                        <img src="slider/images/meditacaoCrista/foto6.jpg" title="<?php echo $textoTitulo; ?> - Foto 10 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/meditacaoCrista/foto7.jpg" rel="lightbox[plants]" title="<?php echo $textoTitulo; ?> - Foto 11">
                                        <img src="slider/images/meditacaoCrista/foto7.jpg" title="<?php echo $textoTitulo; ?> - Foto 11 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/meditacaoCrista/foto8.jpg" rel="lightbox[plants]" title="<?php echo $textoTitulo; ?> - Foto 12">
                                        <img src="slider/images/meditacaoCrista/foto8.jpg" title="<?php echo $textoTitulo; ?> - Foto 12 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/meditacaoCrista/foto9.jpg" rel="lightbox[plants]" title="<?php echo $textoTitulo; ?> - Foto 13">
                                        <img src="slider/images/meditacaoCrista/foto9.jpg" title="<?php echo $textoTitulo; ?> - Foto 13 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/meditacaoCrista/foto10.jpg" rel="lightbox[plants]" title="<?php echo $textoTitulo; ?> - Foto 14">
                                        <img src="slider/images/meditacaoCrista/foto10.jpg" title="<?php echo $textoTitulo; ?> - Foto 14 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/meditacaoCrista/foto11.jpg" rel="lightbox[plants]" title="<?php echo $textoTitulo; ?> - Foto 15">
                                        <img src="slider/images/meditacaoCrista/foto11.jpg" title="<?php echo $textoTitulo; ?> - Foto 15 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/meditacaoCrista/foto12.jpg" rel="lightbox[plants]" title="<?php echo $textoTitulo; ?> - Foto 16">
                                        <img src="slider/images/meditacaoCrista/foto12.jpg" title="<?php echo $textoTitulo; ?> - Foto 16 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/meditacaoCrista/foto13.jpg" rel="lightbox[plants]" title="<?php echo $textoTitulo; ?> - Foto 17">
                                        <img src="slider/images/meditacaoCrista/foto13.jpg" title="<?php echo $textoTitulo; ?> - Foto 17 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/meditacaoCrista/foto14.jpg" rel="lightbox[plants]" title="<?php echo $textoTitulo; ?> - Foto 18">
                                        <img src="slider/images/meditacaoCrista/foto14.jpg" title="<?php echo $textoTitulo; ?> - Foto 18 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/meditacaoCrista/foto15.jpg" rel="lightbox[plants]" title="<?php echo $textoTitulo; ?> - Foto 19">
                                        <img src="slider/images/meditacaoCrista/foto15.jpg" title="<?php echo $textoTitulo; ?> - Foto 19 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/meditacaoCrista/foto16.jpg" rel="lightbox[plants]" title="<?php echo $textoTitulo; ?> - Foto 20">
                                        <img src="slider/images/meditacaoCrista/foto16.jpg" title="<?php echo $textoTitulo; ?> - Foto 20 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/meditacaoCrista/foto17.jpg" rel="lightbox[plants]" title="<?php echo $textoTitulo; ?> - Foto 21">
                                        <img src="slider/images/meditacaoCrista/foto17.jpg" title="<?php echo $textoTitulo; ?> - Foto 21 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/meditacaoCrista/foto18.jpg" rel="lightbox[plants]" title="<?php echo $textoTitulo; ?> - Foto 22">
                                        <img src="slider/images/meditacaoCrista/foto18.jpg" title="<?php echo $textoTitulo; ?> - Foto 22 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/meditacaoCrista/foto19.jpg" rel="lightbox[plants]" title="<?php echo $textoTitulo; ?> - Foto 23">
                                        <img src="slider/images/meditacaoCrista/foto19.jpg" title="<?php echo $textoTitulo; ?> - Foto 23 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/meditacaoCrista/foto20.jpg" rel="lightbox[plants]" title="<?php echo $textoTitulo; ?> - Foto 24">
                                        <img src="slider/images/meditacaoCrista/foto20.jpg" alt="<?php echo $textoTitulo; ?> - Foto 24 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single last">
                                    <a href="slider/images/meditacaoCrista/foto21.jpg" rel="lightbox[plants]" title="<?php echo $textoTitulo; ?> - Foto 25">
                                        <img src="slider/images/meditacaoCrista/foto21.jpg" alt="<?php echo $textoTitulo; ?> - Foto 25 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                        <div style="height: 200px;">&nbsp;</div>
                    </div>
                    <div class="col-sm-2" id="subTituloGaleria">
                        <?php $retiroAnual = "Retiro Anual"; ?>
                        Retiro Anual
                        <div class="imageRow">
                            <div class="set">
                                <div class="single first">
                                    <a href="slider/images/galeria/foto2.JPG" rel="lightbox[plants]" title="<?php echo $retiroAnual; ?> - Foto 1">
                                        <img src="slider/images/galeria/foto2.JPG" alt="<?php echo $retiroAnual; ?> - Foto 1 de 11" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/galeria/foto4.JPG" rel="lightbox[plants]" title="Foto 2">
                                        <img src="slider/images/galeria/foto4.JPG" alt="<?php echo $retiroAnual; ?> - Foto 2 de 11" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/galeria/foto6.JPG" rel="lightbox[plants]" title="<?php echo $retiroAnual; ?> - Foto 3">
                                        <img src="slider/images/galeria/foto6.JPG" alt="<?php echo $retiroAnual; ?> - Foto 3 de 11" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/galeria/foto10.JPG" rel="lightbox[plants]" title="<?php echo $retiroAnual; ?> - Foto 4">
                                        <img src="slider/images/galeria/foto10.JPG" alt="<?php echo $retiroAnual; ?> - Foto 4 de 11" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/galeria/foto11.JPG" rel="lightbox[plants]" title="<?php echo $retiroAnual; ?> - Foto 5">
                                        <img src="slider/images/galeria/foto11.JPG" alt="<?php echo $retiroAnual; ?> - Foto 5 de 11" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/galeria/foto12.JPG" rel="lightbox[plants]" title="<?php echo $retiroAnual; ?> - Foto 6">
                                        <img src="slider/images/galeria/foto12.JPG" alt="<?php echo $retiroAnual; ?> - Foto 6 de 11" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/galeria/foto15.JPG" rel="lightbox[plants]" title="<?php echo $retiroAnual; ?> - Foto 7">
                                        <img src="slider/images/galeria/foto15.JPG" alt="<?php echo $retiroAnual; ?> - Foto 7 de 11" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/galeria/foto16.jpg" rel="lightbox[plants]" title="<?php echo $retiroAnual; ?> - Foto 8">
                                        <img src="slider/images/galeria/foto16.jpg" alt="<?php echo $retiroAnual; ?> - Foto 8 de 11" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/galeria/foto17.jpg" rel="lightbox[plants]" title="<?php echo $retiroAnual; ?> - Foto 9">
                                        <img src="slider/images/galeria/foto17.jpg" alt="<?php echo $retiroAnual; ?> - Foto 9 de 11" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/galeria/foto20.JPG" rel="lightbox[plants]" title="<?php echo $retiroAnual; ?> - Foto 10">
                                        <img src="slider/images/galeria/foto20.jpg" alt="<?php echo $retiroAnual; ?> - Foto 10 de 11" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single last">
                                    <a href="slider/images/galeria/foto21.jpg" rel="lightbox[plants]" title="<?php echo $retiroAnual; ?> - Foto 11">
                                        <img src="slider/images/galeria/foto21.jpg" alt="<?php echo $retiroAnual; ?> - Foto 11 de 11" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                        <div style="height: 200px;">&nbsp;</div>

                    </div>
                    <div class="col-sm-2" id="subTituloGaleria">
                        <?php $yogaIyengar = "Yoga Iyengar"; ?>
                        Yoga Iyengar
                        <div class="imageRow">
                            <div class="set">
                                <div class="single first">
                                    <a href="slider/images/galeria/foto13.JPG" rel="lightbox[plants]" title="Yoga Iyengar - Foto 1">
                                        <img src="slider/images/galeria/foto13.JPG" title="Yoga Iyengar - Foto 1 de 13" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/yoga/foto6.jpg" rel="lightbox[plants]" title="Yoga Iyengar - Foto 2">
                                        <img src="slider/images/yoga/foto6.jpg" alt="Yoga Iyengar - Foto 2 de 13" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/yoga/foto1.jpg" rel="lightbox[plants]" title="Yoga Iyengar - Foto 3">
                                        <img src="slider/images/yoga/foto1.jpg" title="Yoga Iyengar - Foto 3 de 13" alt="Yoga Iyengar - Foto 2 de 14" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/yoga/foto2.jpg" rel="lightbox[plants]" title="Yoga Iyengar - Foto 4">
                                        <img src="slider/images/yoga/foto2.jpg" title="Yoga Iyengar - Foto 4 de 13" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/yoga/foto3.jpg" rel="lightbox[plants]" title="Yoga Iyengar - Foto 5">
                                        <img src="slider/images/yoga/foto3.jpg" title="Yoga Iyengar - Foto 5 de 13" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/yoga/foto4.jpg" rel="lightbox[plants]" title="Yoga Iyengar - Foto 6">
                                        <img src="slider/images/yoga/foto4.jpg" title="Yoga Iyengar - Foto 6 de 13" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/yoga/foto5.jpg" rel="lightbox[plants]" title="Yoga Iyengar - Foto 7">
                                        <img src="slider/images/yoga/foto5.jpg" alt="Yoga Iyengar - Foto 7 de 13" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/yoga/foto8.jpg" rel="lightbox[plants]" title="Yoga Iyengar - Foto 8">
                                        <img src="slider/images/yoga/foto8.jpg" alt="Yoga Iyengar - Foto 8 de 13" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/yoga/foto9.jpg" rel="lightbox[plants]" title="Yoga Iyengar - Foto 9">
                                        <img src="slider/images/yoga/foto9.jpg" alt="Yoga Iyengar - Foto 9 de 13" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/yoga/foto10.jpg" rel="lightbox[plants]" title="Yoga Iyengar - Foto 10">
                                        <img src="slider/images/yoga/foto10.jpg" alt="Yoga Iyengar - Foto 10 de 13" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/yoga/foto11.jpg" rel="lightbox[plants]" title="Yoga Iyengar - Foto 11">
                                        <img src="slider/images/yoga/foto11.jpg" alt="Yoga Iyengar - Foto 11 de 13" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/yoga/foto12.jpg" rel="lightbox[plants]" title="Yoga Iyengar - Foto 12">
                                        <img src="slider/images/yoga/foto12.jpg" alt="Yoga Iyengar - Foto 12 de 13" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single last">
                                    <a href="slider/images/yoga/foto13.jpg" rel="lightbox[plants]" title="Yoga Iyengar - Foto 13">
                                        <img src="slider/images/yoga/foto13.jpg" alt="Yoga Iyengar - Foto 13 de 13" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                        <div style="height: 200px;">&nbsp;</div>
                    </div>
                    <div class="col-sm-2" id="subTituloGaleria">
                        Espaço RUV
                        <div class="imageRow">
                            <div class="set">
                                <div class="single first">
                                    <a href="slider/images/espacoRuv/foto1.jpg" rel="lightbox[plants]" title="Espaço RUV - Foto 1">
                                        <img src="slider/images/espacoRuv/foto1.jpg" alt="Foto 1 de 6" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/espacoRuv/foto2.jpg" rel="lightbox[plants]" title="Espaço RUV - Foto 2">
                                        <img src="slider/images/espacoRuv/foto2.jpg" alt="Foto 2 de 6" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/espacoRuv/foto3.jpg" rel="lightbox[plants]" title="Espaço RUV - Foto 3">
                                        <img src="slider/images/espacoRuv/foto3.jpg" alt="Foto 3 de 6" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/espacoRuv/foto4.jpg" rel="lightbox[plants]" title="Espaço RUV - Foto 4">
                                        <img src="slider/images/espacoRuv/foto4.jpg" alt="Foto 4 de 6" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="slider/images/espacoRuv/foto5.jpg" rel="lightbox[plants]" title="Espaço RUV - Foto 5">
                                        <img src="slider/images/espacoRuv/foto5.jpg" alt="Foto 5 de 6" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single last">
                                    <a href="slider/images/espacoRuv/foto6.jpg" rel="lightbox[plants]" title="Espaço RUV - Foto 6">
                                        <img src="slider/images/espacoRuv/foto6.jpg" alt="Foto 6 de 6" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                        <div style="height: 200px;">&nbsp;</div>
                    </div>
                    
                    
                    </div>

                    <?php
//                        $filename = "texto/galeria.xml";
//                        
//                        @header("Content-Type: text/html; charset=utf-8");
//                        $xml = simplexml_load_file($filename);
//
//                        foreach($xml->texto as $texto)
//                        {
//                            echo $texto->galeria;
//                            echo "<br>";
//                        }                        
                    ?>
                    <!--</p>-->
                <!--</div>-->
            </div>

        <!--</div>-->
        <!--<div style="height: 850px;">&nbsp;</div>-->

<!-- Parte de baixo da página -->
	<footer id="footer">
            <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation" id="corAzulInfo" style="background-color: #BFE0F1;">
                <?php
                    $titulo->preparaMenu("galeria");
                ?>

            </nav>
	</footer>

<?php
//    $formAdesao = new formAdesao();
//    
//    $formAdesao->telaFormAdesao();

?>

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