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

                    <?php
                        $pathJR = "galeria/jornadaReal/";
                        $pathJORM = "galeria/jornadaMeditacao/";
                        $pathMED = "galeria/meditacaoCrista/";
                        $pathRET = "galeria/retiro/";
                        $pathYOG = "galeria/yoga/";
                        $pathESPRUV = "galeria/espacoRuv/";
                    
                    ?>
                    
                    <div class="col-sm-2" id="subTituloGaleria">
                        Jornada Real
                        <div class="imageRow">
                            <div class="set">
                                <div class="single first">
                                    <a href="<?php echo $pathJR; ?>fotoJR01.jpg" rel="lightbox[]" title="Jornada Real - Foto 1">
                                        <img src="<?php echo $pathJR; ?>fotoJR01.jpg" alt="Jornada Real - Foto 1 de 28" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>fotoJR02.jpg" rel="lightbox[]" title="Jornada Real - Foto 2">
                                        <img src="<?php echo $pathJR; ?>fotoJR02.jpg" alt="Foto 2 de 28" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>fotoJR03.jpg" rel="lightbox[]" title="Jornada Real - Foto 3">
                                        <img src="<?php echo $pathJR; ?>fotoJR03.jpg" alt="Foto 3 de 28" <?php echo $margemImagens; ?> title="Jornada Real - Foto 3" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>foto1.jpg" rel="lightbox[]" title="Jornada Real - Foto 4">
                                        <img src="<?php echo $pathJR; ?>foto1.jpg" alt="Foto 4 de 28" <?php echo $margemImagens; ?> title="Jornada Real - Foto 4" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>foto2.jpg" rel="lightbox[]" title="Jornada Real - Foto 5">
                                        <img src="<?php echo $pathJR; ?>foto2.jpg" alt="Foto 5 de 28" <?php echo $margemImagens; ?> title="Jornada Real - Foto 5" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>foto3.jpg" rel="lightbox[]" title="Jornada Real - Foto 6">
                                        <img src="<?php echo $pathJR; ?>foto3.jpg" alt="Foto 6 de 28" <?php echo $margemImagens; ?> title="Jornada Real - Foto 6" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>foto4.jpg" rel="lightbox[]" title="Jornada Real - Foto 7">
                                        <img src="<?php echo $pathJR; ?>foto4.jpg" alt="Foto 7 de 28" <?php echo $margemImagens; ?> title="Jornada Real - Foto 7" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>foto5.jpg" rel="lightbox[]" title="Jornada Real - Foto 8">
                                        <img src="<?php echo $pathJR; ?>foto5.jpg" alt="Foto 8 de 28" <?php echo $margemImagens; ?> title="Jornada Real - Foto 8" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>fotoJR01.png" rel="lightbox[]" title="Jornada Real - Foto 9">
                                        <img src="<?php echo $pathJR; ?>fotoJR01.png" alt="Foto 9 de 28" <?php echo $margemImagens; ?> title="Jornada Real - Foto 9" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>fotoJR02.png" rel="lightbox[]" title="Jornada Real - Foto 10">
                                        <img src="<?php echo $pathJR; ?>fotoJR02.png" alt="Foto 10 de 28" <?php echo $margemImagens; ?> title="Jornada Real - Foto 10" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>fotoJR03.png" rel="lightbox[]" title="Jornada Real - Foto 11">
                                        <img src="<?php echo $pathJR; ?>fotoJR03.png" alt="Foto 11 de 28" <?php echo $margemImagens; ?> title="Jornada Real - Foto 11" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>fotoJR04.png" rel="lightbox[]" title="Jornada Real - Foto 12">
                                        <img src="<?php echo $pathJR; ?>fotoJR04.png" alt="Foto 12 de 28" <?php echo $margemImagens; ?> title="Jornada Real - Foto 12" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>fotoJR05.png" rel="lightbox[]" title="Jornada Real - Foto 13">
                                        <img src="<?php echo $pathJR; ?>fotoJR05.png" alt="Foto 13 de 28" <?php echo $margemImagens; ?> title="Jornada Real - Foto 13" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>fotoJR06.png" rel="lightbox[]" title="Jornada Real - Foto 14">
                                        <img src="<?php echo $pathJR; ?>fotoJR06.png" alt="Foto 14 de 28" <?php echo $margemImagens; ?> title="Jornada Real - Foto 14" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>fotoJR07.png" rel="lightbox[]" title="Jornada Real - Foto 15">
                                        <img src="<?php echo $pathJR; ?>fotoJR07.png" alt="Foto 15 de 28" <?php echo $margemImagens; ?> title="Jornada Real - Foto 15" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>fotoJR08.png" rel="lightbox[]" title="Jornada Real - Foto 16">
                                        <img src="<?php echo $pathJR; ?>fotoJR08.png" alt="Foto 16 de 28" <?php echo $margemImagens; ?> title="Jornada Real - Foto 16" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>fotoJR09.png" rel="lightbox[]" title="Jornada Real - Foto 17">
                                        <img src="<?php echo $pathJR; ?>fotoJR09.png" alt="Foto 17 de 28" <?php echo $margemImagens; ?> title="Jornada Real - Foto 17" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>fotoJR10.png" rel="lightbox[]" title="Jornada Real - Foto 18">
                                        <img src="<?php echo $pathJR; ?>fotoJR10.png" alt="Foto 18 de 28" <?php echo $margemImagens; ?> title="Jornada Real - Foto 18" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>fotoJR11.png" rel="lightbox[]" title="Jornada Real - Foto 19">
                                        <img src="<?php echo $pathJR; ?>fotoJR11.png" alt="Foto 19 de 28" <?php echo $margemImagens; ?> title="Jornada Real - Foto 19" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>fotoJR12.png" rel="lightbox[]" title="Jornada Real - Foto 20">
                                        <img src="<?php echo $pathJR; ?>fotoJR12.png" alt="Foto 20 de 28" <?php echo $margemImagens; ?> title="Jornada Real - Foto 20" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>fotoJR13.png" rel="lightbox[]" title="Jornada Real - Foto 21">
                                        <img src="<?php echo $pathJR; ?>fotoJR13.png" alt="Foto 21 de 28" <?php echo $margemImagens; ?> title="Jornada Real - Foto 21" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>fotoJR14.png" rel="lightbox[]" title="Jornada Real - Foto 22">
                                        <img src="<?php echo $pathJR; ?>fotoJR14.png" alt="Foto 22 de 28" <?php echo $margemImagens; ?> title="Jornada Real - Foto 22" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>fotoJR15.png" rel="lightbox[]" title="Jornada Real - Foto 23">
                                        <img src="<?php echo $pathJR; ?>fotoJR15.png" alt="Foto 23 de 28" <?php echo $margemImagens; ?> title="Jornada Real - Foto 23" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>fotoJR16.png" rel="lightbox[]" title="Jornada Real - Foto 24">
                                        <img src="<?php echo $pathJR; ?>fotoJR16.png" alt="Foto 24 de 28" <?php echo $margemImagens; ?> title="Jornada Real - Foto 24" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>fotoJR17.png" rel="lightbox[]" title="Jornada Real - Foto 25">
                                        <img src="<?php echo $pathJR; ?>fotoJR17.png" alt="Foto 25 de 28" <?php echo $margemImagens; ?> title="Jornada Real - Foto 25" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>fotoJR18.png" rel="lightbox[]" title="Jornada Real - Foto 26">
                                        <img src="<?php echo $pathJR; ?>fotoJR18.png" alt="Foto 26 de 28" <?php echo $margemImagens; ?> title="Jornada Real - Foto 26" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>fotoJR19.png" rel="lightbox[]" title="Jornada Real - Foto 27">
                                        <img src="<?php echo $pathJR; ?>fotoJR19.png" alt="Foto 27 de 28" <?php echo $margemImagens; ?> title="Jornada Real - Foto 27" />
                                    </a>
                                </div>
                                <div class="single last">
                                    <a href="<?php echo $pathJR; ?>fotoJR20.png" rel="lightbox[]" title="Jornada Real - Foto 28">
                                        <img src="<?php echo $pathJR; ?>fotoJR20.png" alt="Foto 28 de 28" <?php echo $margemImagens; ?> title="Jornada Real - Foto 28" />
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
                                    <a href="<?php echo $pathJORM; ?>fotoJM01.jpg" rel="lightbox[]" title="Meditação Cristã - Foto 1">
                                        <img src="<?php echo $pathJORM; ?>fotoJM01.jpg" alt="Foto 1 de 2" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single last">
                                    <a href="<?php echo $pathJORM; ?>fotoJM02.jpg" rel="lightbox[]" title="Meditação Cristã - Foto 2">
                                        <img src="<?php echo $pathJORM; ?>fotoJM02.jpg" alt="Foto 2 de 2" <?php echo $margemImagens; ?> />
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
                                    <a href="<?php echo $pathMED; ?>fotoMC01.jpg" rel="lightbox[]" title="<?php echo $textoTitulo; ?> - Foto 1">
                                        <img src="<?php echo $pathMED; ?>fotoMC01.jpg" title="<?php echo $textoTitulo; ?> - Foto 1 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathMED; ?>fotoMC02.jpg" rel="lightbox[]" title="<?php echo $textoTitulo; ?> - Foto 2">
                                        <img src="<?php echo $pathMED; ?>fotoMC02.jpg" title="<?php echo $textoTitulo; ?> - Foto 2 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathMED; ?>fotoMC03.jpg" rel="lightbox[]" title="<?php echo $textoTitulo; ?> - Foto 3">
                                        <img src="<?php echo $pathMED; ?>fotoMC03.jpg" title="<?php echo $textoTitulo; ?> - Foto 3 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathMED; ?>fotoMC04.jpg" rel="lightbox[]" title="<?php echo $textoTitulo; ?> - Foto 4">
                                        <img src="<?php echo $pathMED; ?>fotoMC04.jpg" title="Foto 4 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathMED; ?>foto1.jpg" rel="lightbox[]" title="<?php echo $textoTitulo; ?> - Foto 5">
                                        <img src="<?php echo $pathMED; ?>foto1.jpg" title="<?php echo $textoTitulo; ?> - Foto 5 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathMED; ?>foto2.jpg" rel="lightbox[]" title="<?php echo $textoTitulo; ?> - Foto 6">
                                        <img src="<?php echo $pathMED; ?>foto2.jpg" title="<?php echo $textoTitulo; ?> - Foto 6 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathMED; ?>foto3.jpg" rel="lightbox[]" title="<?php echo $textoTitulo; ?> - Foto 7">
                                        <img src="<?php echo $pathMED; ?>foto3.jpg" title="<?php echo $textoTitulo; ?> - Foto 7 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathMED; ?>foto4.jpg" rel="lightbox[]" title="<?php echo $textoTitulo; ?> - Foto 8">
                                        <img src="<?php echo $pathMED; ?>foto4.jpg" title="<?php echo $textoTitulo; ?> - Foto 8 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathMED; ?>foto5.jpg" rel="lightbox[]" title="<?php echo $textoTitulo; ?> - Foto 9">
                                        <img src="<?php echo $pathMED; ?>foto5.jpg" title="<?php echo $textoTitulo; ?> - Foto 9 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathMED; ?>foto6.jpg" rel="lightbox[]" title="<?php echo $textoTitulo; ?> - Foto 10">
                                        <img src="<?php echo $pathMED; ?>foto6.jpg" title="<?php echo $textoTitulo; ?> - Foto 10 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathMED; ?>foto7.jpg" rel="lightbox[]" title="<?php echo $textoTitulo; ?> - Foto 11">
                                        <img src="<?php echo $pathMED; ?>foto7.jpg" title="<?php echo $textoTitulo; ?> - Foto 11 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathMED; ?>foto8.jpg" rel="lightbox[]" title="<?php echo $textoTitulo; ?> - Foto 12">
                                        <img src="<?php echo $pathMED; ?>foto8.jpg" title="<?php echo $textoTitulo; ?> - Foto 12 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathMED; ?>foto9.jpg" rel="lightbox[]" title="<?php echo $textoTitulo; ?> - Foto 13">
                                        <img src="<?php echo $pathMED; ?>foto9.jpg" title="<?php echo $textoTitulo; ?> - Foto 13 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathMED; ?>foto10.jpg" rel="lightbox[]" title="<?php echo $textoTitulo; ?> - Foto 14">
                                        <img src="<?php echo $pathMED; ?>foto10.jpg" title="<?php echo $textoTitulo; ?> - Foto 14 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathMED; ?>foto11.jpg" rel="lightbox[]" title="<?php echo $textoTitulo; ?> - Foto 15">
                                        <img src="<?php echo $pathMED; ?>foto11.jpg" title="<?php echo $textoTitulo; ?> - Foto 15 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathMED; ?>foto12.jpg" rel="lightbox[]" title="<?php echo $textoTitulo; ?> - Foto 16">
                                        <img src="<?php echo $pathMED; ?>foto12.jpg" title="<?php echo $textoTitulo; ?> - Foto 16 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathMED; ?>foto13.jpg" rel="lightbox[]" title="<?php echo $textoTitulo; ?> - Foto 17">
                                        <img src="<?php echo $pathMED; ?>foto13.jpg" title="<?php echo $textoTitulo; ?> - Foto 17 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathMED; ?>foto14.jpg" rel="lightbox[]" title="<?php echo $textoTitulo; ?> - Foto 18">
                                        <img src="<?php echo $pathMED; ?>foto14.jpg" title="<?php echo $textoTitulo; ?> - Foto 18 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathMED; ?>foto15.jpg" rel="lightbox[]" title="<?php echo $textoTitulo; ?> - Foto 19">
                                        <img src="<?php echo $pathMED; ?>foto15.jpg" title="<?php echo $textoTitulo; ?> - Foto 19 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathMED; ?>foto16.jpg" rel="lightbox[]" title="<?php echo $textoTitulo; ?> - Foto 20">
                                        <img src="<?php echo $pathMED; ?>foto16.jpg" title="<?php echo $textoTitulo; ?> - Foto 20 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathMED; ?>foto17.jpg" rel="lightbox[]" title="<?php echo $textoTitulo; ?> - Foto 21">
                                        <img src="<?php echo $pathMED; ?>foto17.jpg" title="<?php echo $textoTitulo; ?> - Foto 21 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathMED; ?>foto18.jpg" rel="lightbox[]" title="<?php echo $textoTitulo; ?> - Foto 22">
                                        <img src="<?php echo $pathMED; ?>foto18.jpg" title="<?php echo $textoTitulo; ?> - Foto 22 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathMED; ?>foto19.jpg" rel="lightbox[]" title="<?php echo $textoTitulo; ?> - Foto 23">
                                        <img src="<?php echo $pathMED; ?>foto19.jpg" title="<?php echo $textoTitulo; ?> - Foto 23 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathMED; ?>foto20.jpg" rel="lightbox[]" title="<?php echo $textoTitulo; ?> - Foto 24">
                                        <img src="<?php echo $pathMED; ?>foto20.jpg" alt="<?php echo $textoTitulo; ?> - Foto 24 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single last">
                                    <a href="<?php echo $pathMED; ?>foto21.jpg" rel="lightbox[]" title="<?php echo $textoTitulo; ?> - Foto 25">
                                        <img src="<?php echo $pathMED; ?>foto21.jpg" alt="<?php echo $textoTitulo; ?> - Foto 25 de 25" <?php echo $margemImagens; ?> />
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
                                    <a href="<?php echo $pathRET; ?>fotoRET101.jpg" rel="lightbox[]" title="<?php echo $retiroAnual; ?> - Foto 1">
                                        <img src="<?php echo $pathRET; ?>fotoRET101.jpg" alt="<?php echo $retiroAnual; ?> - Foto 1 de 11" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathRET; ?>fotoRET102.jpg" rel="lightbox[]" title="Retiro Anual - Foto 2">
                                        <img src="<?php echo $pathRET; ?>fotoRET102.jpg" alt="<?php echo $retiroAnual; ?> - Foto 2 de 11" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathRET; ?>fotoRET103.jpg" rel="lightbox[]" title="<?php echo $retiroAnual; ?> - Foto 3">
                                        <img src="<?php echo $pathRET; ?>fotoRET103.jpg" alt="<?php echo $retiroAnual; ?> - Foto 3 de 11" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathRET; ?>fotoRET104.jpg" rel="lightbox[]" title="<?php echo $retiroAnual; ?> - Foto 4">
                                        <img src="<?php echo $pathRET; ?>fotoRET104.jpg" alt="<?php echo $retiroAnual; ?> - Foto 4 de 11" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathRET; ?>fotoRET105.jpg" rel="lightbox[]" title="<?php echo $retiroAnual; ?> - Foto 5">
                                        <img src="<?php echo $pathRET; ?>fotoRET105.jpg" alt="<?php echo $retiroAnual; ?> - Foto 5 de 11" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathRET; ?>fotoRET106.jpg" rel="lightbox[]" title="<?php echo $retiroAnual; ?> - Foto 6">
                                        <img src="<?php echo $pathRET; ?>fotoRET106.jpg" alt="<?php echo $retiroAnual; ?> - Foto 6 de 11" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathRET; ?>fotoRET107.jpg" rel="lightbox[]" title="<?php echo $retiroAnual; ?> - Foto 7">
                                        <img src="<?php echo $pathRET; ?>fotoRET107.jpg" alt="<?php echo $retiroAnual; ?> - Foto 7 de 11" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathRET; ?>fotoRET108.jpg" rel="lightbox[]" title="<?php echo $retiroAnual; ?> - Foto 8">
                                        <img src="<?php echo $pathRET; ?>fotoRET108.jpg" alt="<?php echo $retiroAnual; ?> - Foto 8 de 11" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathRET; ?>fotoRET109.jpg" rel="lightbox[]" title="<?php echo $retiroAnual; ?> - Foto 9">
                                        <img src="<?php echo $pathRET; ?>fotoRET109.jpg" alt="<?php echo $retiroAnual; ?> - Foto 9 de 11" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathRET; ?>fotoRET110.jpg" rel="lightbox[]" title="<?php echo $retiroAnual; ?> - Foto 10">
                                        <img src="<?php echo $pathRET; ?>fotoRET110.jpg" alt="<?php echo $retiroAnual; ?> - Foto 10 de 11" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single last">
                                    <a href="<?php echo $pathRET; ?>fotoRET111.jpg" rel="lightbox[]" title="<?php echo $retiroAnual; ?> - Foto 11">
                                        <img src="<?php echo $pathRET; ?>fotoRET111.jpg" alt="<?php echo $retiroAnual; ?> - Foto 11 de 11" <?php echo $margemImagens; ?> />
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
                                    <a href="<?php echo $pathYOG; ?>foto7.jpg" rel="lightbox[]" title="<?php echo $yogaIyengar; ?> - Foto 1">
                                        <img src="<?php echo $pathYOG; ?>foto7.jpg" title="Yoga Iyengar - Foto 1 de 13" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathYOG; ?>foto6.jpg" rel="lightbox[]" title="<?php echo $yogaIyengar; ?> - Foto 2">
                                        <img src="<?php echo $pathYOG; ?>foto6.jpg" alt="Yoga Iyengar - Foto 2 de 13" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathYOG; ?>foto1.jpg" rel="lightbox[]" title="<?php echo $yogaIyengar; ?> - Foto 3">
                                        <img src="<?php echo $pathYOG; ?>foto1.jpg" title="Yoga Iyengar - Foto 3 de 13" alt="Yoga Iyengar - Foto 2 de 14" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathYOG; ?>foto2.jpg" rel="lightbox[]" title="<?php echo $yogaIyengar; ?> - Foto 4">
                                        <img src="<?php echo $pathYOG; ?>foto2.jpg" title="Yoga Iyengar - Foto 4 de 13" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathYOG; ?>foto3.jpg" rel="lightbox[]" title="<?php echo $yogaIyengar; ?> - Foto 5">
                                        <img src="<?php echo $pathYOG; ?>foto3.jpg" title="Yoga Iyengar - Foto 5 de 13" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathYOG; ?>foto4.jpg" rel="lightbox[]" title="<?php echo $yogaIyengar; ?> - Foto 6">
                                        <img src="<?php echo $pathYOG; ?>foto4.jpg" title="Yoga Iyengar - Foto 6 de 13" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathYOG; ?>foto5.jpg" rel="lightbox[]" title="<?php echo $yogaIyengar; ?> - Foto 7">
                                        <img src="<?php echo $pathYOG; ?>foto5.jpg" alt="Yoga Iyengar - Foto 7 de 13" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathYOG; ?>foto8.jpg" rel="lightbox[]" title="<?php echo $yogaIyengar; ?> - Foto 8">
                                        <img src="<?php echo $pathYOG; ?>foto8.jpg" alt="Yoga Iyengar - Foto 8 de 13" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathYOG; ?>foto9.jpg" rel="lightbox[]" title="<?php echo $yogaIyengar; ?> - Foto 9">
                                        <img src="<?php echo $pathYOG; ?>foto9.jpg" alt="Yoga Iyengar - Foto 9 de 13" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathYOG; ?>foto10.jpg" rel="lightbox[]" title="<?php echo $yogaIyengar; ?> - Foto 10">
                                        <img src="<?php echo $pathYOG; ?>foto10.jpg" alt="Yoga Iyengar - Foto 10 de 13" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathYOG; ?>foto11.jpg" rel="lightbox[]" title="<?php echo $yogaIyengar; ?> - Foto 11">
                                        <img src="<?php echo $pathYOG; ?>foto11.jpg" alt="Yoga Iyengar - Foto 11 de 13" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathYOG; ?>foto12.jpg" rel="lightbox[]" title="<?php echo $yogaIyengar; ?> - Foto 12">
                                        <img src="<?php echo $pathYOG; ?>foto12.jpg" alt="Yoga Iyengar - Foto 12 de 13" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single last">
                                    <a href="<?php echo $pathYOG; ?>foto13.jpg" rel="lightbox[]" title="<?php echo $yogaIyengar; ?> - Foto 13">
                                        <img src="<?php echo $pathYOG; ?>foto13.jpg" alt="Yoga Iyengar - Foto 13 de 13" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                        <div style="height: 200px;">&nbsp;</div>
                    </div>
                    <div class="col-sm-2" id="subTituloGaleria">
                        <?php $espacoRuvTexto = "Espaço RUV"; ?>
                        Espaço RUV
                        <div class="imageRow">
                            <div class="set">
                                <div class="single first">
                                    <a href="<?php echo $pathESPRUV; ?>foto1.jpg" rel="lightbox[]" title="<?php echo $espacoRuvTexto; ?> - Foto 1">
                                        <img src="<?php echo $pathESPRUV; ?>foto1.jpg" alt="Foto 1 de 6" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathESPRUV; ?>foto2.jpg" rel="lightbox[]" title="<?php echo $espacoRuvTexto; ?> - Foto 2">
                                        <img src="<?php echo $pathESPRUV; ?>foto2.jpg" alt="Foto 2 de 6" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathESPRUV; ?>foto3.jpg" rel="lightbox[]" title="<?php echo $espacoRuvTexto; ?> - Foto 3">
                                        <img src="<?php echo $pathESPRUV; ?>foto3.jpg" alt="Foto 3 de 6" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathESPRUV; ?>foto4.jpg" rel="lightbox[]" title="<?php echo $espacoRuvTexto; ?> - Foto 4">
                                        <img src="<?php echo $pathESPRUV; ?>foto4.jpg" alt="Foto 4 de 6" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathESPRUV; ?>foto5.jpg" rel="lightbox[]" title="<?php echo $espacoRuvTexto; ?> - Foto 5">
                                        <img src="<?php echo $pathESPRUV; ?>foto5.jpg" alt="Foto 5 de 6" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single last">
                                    <a href="<?php echo $pathESPRUV; ?>foto6.jpg" rel="lightbox[]" title="<?php echo $espacoRuvTexto; ?> - Foto 6">
                                        <img src="<?php echo $pathESPRUV; ?>foto6.jpg" alt="Foto 6 de 6" <?php echo $margemImagens; ?> />
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