<!DOCTYPE html>

<?php

    $_SERVER['PATH_INFO'] = "redeunaviva.rio/";
    
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
                        <?php $yogaIyengar = "Yoga Iyengar"; ?>
                    
                    <div class="col-sm-2" id="subTituloGaleria">
                        Jornada Real
                        <div class="imageRow">
                            <div class="set">
                                <div class="single first">
                                    <a href="<?php echo $pathJR; ?>fotoJR01.jpg" rel="lightbox[]" title="Jornada Real - Foto 1">
                                        <img src="<?php echo $pathJR; ?>fotoJR01.jpg" alt="Jornada Real - Foto 1 de 7" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>fotoJR02.jpg" rel="lightbox[]" title="Jornada Real - Foto 2">
                                        <img src="<?php echo $pathJR; ?>fotoJR02.jpg" alt="Foto 2 de 7" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>fotoJR04.png" rel="lightbox[]" title="Jornada Real - Foto 12">
                                        <img src="<?php echo $pathJR; ?>fotoJR04.png" alt="Foto 4 de 7" <?php echo $margemImagens; ?> title="Jornada Real - Foto 12" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>fotoJR06.png" rel="lightbox[]" title="Jornada Real - Foto 14">
                                        <img src="<?php echo $pathJR; ?>fotoJR06.png" alt="Foto 5 de 7" <?php echo $margemImagens; ?> title="Jornada Real - Foto 14" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>fotoJR18.png" rel="lightbox[]" title="Jornada Real - Foto 26">
                                        <img src="<?php echo $pathJR; ?>fotoJR18.png" alt="Foto 6 de 7" <?php echo $margemImagens; ?> title="Jornada Real - Foto 26" />
                                    </a>
                                </div>
                                <div class="single last">
                                    <a href="<?php echo $pathJR; ?>fotoJR20.png" rel="lightbox[]" title="Jornada Real - Foto 28">
                                        <img src="<?php echo $pathJR; ?>fotoJR20.png" alt="Foto 7 de 7" <?php echo $margemImagens; ?> title="Jornada Real - Foto 28" />
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
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>foto1.jpg" rel="lightbox[]" title="Jornada Real - Foto 4">
                                        <img src="<?php echo $pathJR; ?>foto1.jpg" alt="Foto 3 de 7" <?php echo $margemImagens; ?> title="Jornada Real - Foto 4" />
                                    </a>
                                </div>
                                
                                <div class="single last">
                                    <a href="<?php echo $pathJR; ?>fotoJR13.png" rel="lightbox[]" title="Jornada Real - Foto 21">
                                        <img src="<?php echo $pathJR; ?>fotoJR13.png" alt="Foto 2 de 2" <?php echo $margemImagens; ?> title="Jornada Real - Foto 21" />
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
                                    <a href="<?php echo $pathJR; ?>fotoJR14.png" rel="lightbox[]" title="Jornada Real - Foto 22">
                                        <img src="<?php echo $pathJR; ?>fotoJR14.png" alt="Foto 22 de 28" <?php echo $margemImagens; ?> title="Jornada Real - Foto 22" />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathMED; ?>foto1.jpg" rel="lightbox[]" title="<?php echo $textoTitulo; ?> - Foto 5">
                                        <img src="<?php echo $pathMED; ?>foto1.jpg" title="<?php echo $textoTitulo; ?> - Foto 5 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single last">
                                    <a href="<?php echo $pathMED; ?>foto11.jpg" rel="lightbox[]" title="<?php echo $textoTitulo; ?> - Foto 15">
                                        <img src="<?php echo $pathMED; ?>foto11.jpg" title="<?php echo $textoTitulo; ?> - Foto 15 de 25" <?php echo $margemImagens; ?> />
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
                                <div class="single">
                                    <a href="<?php echo $pathMED; ?>foto4.jpg" rel="lightbox[]" title="<?php echo $textoTitulo; ?> - Foto 8">
                                        <img src="<?php echo $pathMED; ?>foto4.jpg" title="<?php echo $textoTitulo; ?> - Foto 8 de 25" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single first">
                                    <a href="<?php echo $pathRET; ?>fotoRET101.jpg" rel="lightbox[]" title="<?php echo $retiroAnual; ?> - Foto 1">
                                        <img src="<?php echo $pathRET; ?>fotoRET101.jpg" alt="<?php echo $retiroAnual; ?> - Foto 1 de 11" <?php echo $margemImagens; ?> />
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
                                    <a href="<?php echo $pathRET; ?>fotoRET109.jpg" rel="lightbox[]" title="<?php echo $retiroAnual; ?> - Foto 9">
                                        <img src="<?php echo $pathRET; ?>fotoRET109.jpg" alt="<?php echo $retiroAnual; ?> - Foto 9 de 11" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathRET; ?>fotoRET111.jpg" rel="lightbox[]" title="<?php echo $retiroAnual; ?> - Foto 11">
                                        <img src="<?php echo $pathRET; ?>fotoRET111.jpg" alt="<?php echo $retiroAnual; ?> - Foto 11 de 11" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathJR; ?>fotoJR10.png" rel="lightbox[]" title="Jornada Real - Foto 18">
                                        <img src="<?php echo $pathJR; ?>fotoJR10.png" alt="Foto 18 de 28" <?php echo $margemImagens; ?> title="Jornada Real - Foto 18" />
                                    </a>
                                </div>
                                <div class="single last">
                                    <a href="<?php echo $pathYOG; ?>foto6.jpg" rel="lightbox[]" title="<?php echo $yogaIyengar; ?> - Foto 2">
                                        <img src="<?php echo $pathYOG; ?>foto6.jpg" alt="Yoga Iyengar - Foto 2 de 13" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                        <div style="height: 200px;">&nbsp;</div>

                    </div>
                    <div class="col-sm-2" id="subTituloGaleria">
                        Yoga Iyengar
                        <div class="imageRow">
                            <div class="set">
                                <div class="single">
                                    <a href="<?php echo $pathMED; ?>foto7.jpg" rel="lightbox[]" title="<?php echo $textoTitulo; ?> - Foto 11">
                                        <img src="<?php echo $pathMED; ?>foto7.jpg" title="<?php echo $textoTitulo; ?> - Foto 11 de 25" <?php echo $margemImagens; ?> />
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
                                    <a href="<?php echo $pathESPRUV; ?>foto3.jpg" rel="lightbox[]" title="<?php echo $espacoRuvTexto; ?> - Foto 3">
                                        <img src="<?php echo $pathESPRUV; ?>foto3.jpg" alt="Foto 3 de 6" <?php echo $margemImagens; ?> />
                                    </a>
                                </div>
                                <div class="single">
                                    <a href="<?php echo $pathESPRUV; ?>foto4.jpg" rel="lightbox[]" title="<?php echo $espacoRuvTexto; ?> - Foto 4">
                                        <img src="<?php echo $pathESPRUV; ?>foto4.jpg" alt="Foto 4 de 6" <?php echo $margemImagens; ?> />
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