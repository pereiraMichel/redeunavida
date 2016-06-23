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

        <div id="tituloPaginas" style="color: #fff;">Atividades da Rede Una Viva</div>
        <p style="height: 30px;">&nbsp;</p>
            <div class="content" style="margin: 0 auto; padding-left: 10%;">
                <div class="col-sm-12">

                    <div id="subTituloGaleria">
                        Jornada Real
                        <div class="imageRow">
                            <div class="set">
                                <div class="single first">
                                    <a href="slider/images/galeria/foto14.JPG" rel="lightbox[plants]" title="Jornada Real - Foto 1">
                                        <img src="slider/images/galeria/foto14.JPG" alt="Jornada Real - Foto 1 de 21" style="height: 90px; width: 135px;" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div id="subTituloGaleria">Retiro Anual</div>
                    <div id="subTituloGaleria">Jornada de Meditação</div>
                    <div id="subTituloGaleria">Yoga Iyengar</div>
                    <div id="subTituloGaleria">Meditação Cristã</div>
                    <div class="imageRow">
                        <div class="set">
                            <div class="single first">
                                <a href="slider/images/galeria/foto1.JPG" rel="lightbox[plants]" title="Foto 1">
                                    <img src="slider/images/galeria/foto1.JPG" alt="Foto 1 de 21" style="height: 90px; width: 135px;" />
                                </a>
                            </div>
                            <div class="single">
                                <a href="slider/images/galeria/foto2.JPG" rel="lightbox[plants]" title="Foto 2">
                                    <img src="slider/images/galeria/foto2.JPG" alt="Foto 2 de 21" style="height: 90px; width: 135px;" />
                                </a>
                            </div>
                            <div class="single">
                                <a href="slider/images/galeria/foto3.JPG" rel="lightbox[plants]" title="Foto 3">
                                    <img src="slider/images/galeria/foto3.JPG" alt="Foto 3 de 21" style="height: 90px; width: 135px;" />
                                </a>
                            </div>
                            <div class="single">
                                <a href="slider/images/galeria/foto4.JPG" rel="lightbox[plants]" title="Foto 4">
                                    <img src="slider/images/galeria/foto4.JPG" alt="Foto 16 de 21" width="135" height="90" />
                                </a>
                            </div>
                            <div class="single">
                                <a href="slider/images/galeria/foto5.JPG" rel="lightbox[plants]" title="Foto 5">
                                    <img src="slider/images/galeria/foto5.JPG" alt="Foto 5 de 21" style="height: 90px; width: 135px;" />
                                </a>
                            </div>
                            <div class="single">
                                <a href="slider/images/galeria/foto6.JPG" rel="lightbox[plants]" title="Foto 6">
                                    <img src="slider/images/galeria/foto6.JPG" alt="Foto 6 de 21" style="height: 90px; width: 135px;" />
                                </a>
                            </div>
                            <div class="single last">
                                <a href="slider/images/galeria/foto7.jpg" rel="lightbox[plants]" title="Foto 7">
                                    <img src="slider/images/galeria/foto7.jpg" alt="Foto 7 de 21" style="height: 90px; width: 135px;" />
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="imageRow"><!-- style="width: 150px; height: 100px;" -->
                        <div class="set">
                            <div class="single first">
                                <a href="slider/images/galeria/foto8.JPG" rel="lightbox[plants]" title="Foto 8">
                                    <img src="slider/images/galeria/foto8.JPG" alt="Foto 8 de 21" width="135" height="90" />
                                </a>
                            </div>
                            <div class="single">
                                <a href="slider/images/galeria/foto9.JPG" rel="lightbox[plants]" title="Foto 9">
                                    <img src="slider/images/galeria/foto9.JPG" alt="Foto 9 de 21" style="height: 90px; width: 135px;" />
                                </a>
                            </div>
                            <div class="single">
                                <a href="slider/images/galeria/foto10.JPG" rel="lightbox[plants]" title="Foto 10">
                                    <img src="slider/images/galeria/foto10.JPG" alt="Foto 10 de 21" style="height: 90px; width: 135px;" />
                                </a>
                            </div>
                            <div class="single">
                                <a href="slider/images/galeria/foto11.JPG" rel="lightbox[plants]" title="Foto 11">
                                    <img src="slider/images/galeria/foto11.JPG" alt="Foto 11 de 21" style="height: 90px; width: 135px;" />
                                </a>
                            </div>
                            <div class="single">
                                <a href="slider/images/galeria/foto12.JPG" rel="lightbox[plants]" title="Foto 12">
                                    <img src="slider/images/galeria/foto12.JPG" alt="Foto 12 de 21" width="135" height="90" />
                                </a>
                            </div>
                            <div class="single">
                                <a href="slider/images/galeria/foto13.JPG" rel="lightbox[plants]" title="Foto 13">
                                    <img src="slider/images/galeria/foto13.JPG" alt="Foto 13 de 21" style="height: 90px; width: 135px;" />
                                </a>
                            </div>
                            <div class="single last">
                                <a href="slider/images/galeria/foto14.JPG" rel="lightbox[plants]" title="Foto 14">
                                    <img src="slider/images/galeria/foto14.JPG" alt="Foto 14 de 21" style="height: 90px; width: 135px;" />
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="imageRow"><!-- style="width: 150px; height: 100px;" -->
                        <div class="set">
                            <div class="single first">
                                <a href="slider/images/galeria/foto15.JPG" rel="lightbox[plants]" title="Foto 15">
                                    <img src="slider/images/galeria/foto15.JPG" alt="Foto 15 de 21" style="height: 90px; width: 135px;" />
                                </a>
                            </div>
                            <div class="single">
                                <a href="slider/images/galeria/foto16.jpg" rel="lightbox[plants]" title="Foto 16">
                                    <img src="slider/images/galeria/foto16.jpg" alt="Foto 16 de 21" width="135" height="90" />
                                </a>
                            </div>
                            <div class="single">
                                <a href="slider/images/galeria/foto17.jpg" rel="lightbox[plants]" title="Foto 17">
                                    <img src="slider/images/galeria/foto17.jpg" alt="Foto 17 de 21" style="height: 90px; width: 135px;" />
                                </a>
                            </div>
                            <div class="single">
                                <a href="slider/images/galeria/foto18.jpg" rel="lightbox[plants]" title="Foto 18">
                                    <img src="slider/images/galeria/foto18.jpg" alt="Foto 18 de 21" style="height: 90px; width: 135px;" />
                                </a>
                            </div>
                            <div class="single">
                                <a href="slider/images/galeria/foto19.jpg" rel="lightbox[plants]" title="Foto 19">
                                    <img src="slider/images/galeria/foto19.jpg" alt="Foto 19 de 21" style="height: 90px; width: 135px;" />
                                </a>
                            </div>
                            <div class="single">
                                <a href="slider/images/galeria/foto20.JPG" rel="lightbox[plants]" title="Foto 20">
                                    <img src="slider/images/galeria/foto20.jpg" alt="Foto 20 de 21" style="height: 90px; width: 135px;" />
                                </a>
                            </div>
                            <div class="single last">
                                <a href="slider/images/galeria/foto21.jpg" rel="lightbox[plants]" title="Foto 21">
                                    <img src="slider/images/galeria/foto21.jpg" alt="Foto 21 de 21" style="height: 90px; width: 135px;" />
                                </a>
                            </div>
                        </div>
                    </div><!-- fecha o image row -->
                    
                    
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
            <p style="height: 50px;"></p>

<!-- Parte de baixo da página -->
	<footer id="footer">
            <p style="height: 150px;"></p>
            <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation" id="corAzulInfo" style="border-color: #009ACD;">
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