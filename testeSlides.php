<?php
//use metodos;
date_default_timezone_set('America/Sao_Paulo');

require_once 'controller/constantes.php';
require_once 'controller/metodos.php';
require_once './view/classFormAdesao.php';
require_once './view/slideShow.php';

$slide = new slideShow();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="Michel Pereira - MAP TI">
        <meta name="robots" content="nofollow">
        <meta name="google" content="notranslate">        
        <title><?php echo TITULORUV; ?></title>

        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">

        <link rel="shortcut icon" href="icon/ruv.ico">
        <link rel="icon" type="image/png" href="images/ruvicon.png">

        <link rel="stylesheet" href="css/bootstrap-submenu.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.css">
        <link rel="stylesheet" href="css/menuResponsive.css">
        <link rel="stylesheet" href="css/icone_slider.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/jquery.bxslider.css">
        <link href="jscss/jquery.bxslider.css" rel="stylesheet" />

        <link rel="stylesheet" href="css/bootstrap-submenu.css">
 	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!--<link rel="stylesheet" href="css/bootstrap.css"> Atrapalha o responsivo-->
        <link rel="stylesheet" href="css/bootstrap-responsive_1.css">
	<link rel="stylesheet" href="css/bootstrap1.css"> 

        <link rel="stylesheet" href="css/estilo.css">

        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->
        <script src="jscss/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-submenu.js"></script>
        <script src="js/jquery-migrate.min.js"></script>
        <script src="js/jquery.bxslider.min.js"></script>
        <script src="sistema/js/validaCampos.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script src="jscss/jquery.bxslider.min.js"></script>

        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-36499930-1']);
            _gaq.push(['_trackPageview']);

            (function () {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();

        </script>    
        <!-- Fim da chamada para slide show -->

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
                padding-top: 40px; 
                background-color: <?php echo AZULINFO; ?>;
            }

        </style>
       
        <script>
            
            function mudaCor(opcao){
                var imagem = document.getElementById('imagemRUVCorFundo');
                switch(opcao){
                    case "f1":
                        imagem.style.backgroundColor = "#1C86EE";
                        break;
                    case "f2":
                        imagem.style.backgroundColor = "#00BFFF";
                        break;
                    case "f3":
                        imagem.style.backgroundColor = "#4F94CD";
                        break;
                    case "f4":
                        imagem.style.backgroundColor = "#00CED1";
                        break;
                    case "f5":
                        imagem.style.backgroundColor = "#436EEE";
                        break;
                    case "c1":
                        imagem.style.backgroundColor = "#00CDCD";
                        break;
                    case "c2":
                        imagem.style.backgroundColor = "#00C5CD";
                        break;
                    case "c3":
                        imagem.style.backgroundColor = "#912CEE";
                        break;
                    case "c4":
                        imagem.style.backgroundColor = "#9F79EE";
                        break;
                    case "c5":
                        imagem.style.backgroundColor = "#87CEEB";
                        break;
                    case "c6":
                        imagem.style.backgroundColor = "#009ACD";
                        break;
                    case "c7":
                        imagem.style.backgroundColor = "#4682B4";
                        break;
                    case "c8":
                        imagem.style.backgroundColor = "#4169E1";
                        break;
                    case "c9":
                        imagem.style.backgroundColor = "#7B68EE";
                        break;
                    case "a1": //Chocolate
                        imagem.style.backgroundColor = "#D2691E";
                        break;
                    case "a2": // OliverDrab
                        imagem.style.backgroundColor = "#6B8E23";
                        break;
                    case "a3": // OliverDrab
                        imagem.style.backgroundColor = "#B03060";
                        break;
                    case "a4": // OliverDrab
                        imagem.style.backgroundColor = "#CD1076";
                        break;
                    case "a5": // OliverDrab
                        imagem.style.backgroundColor = "#EE0000";
                        break;
                    case "a6": // OliverDrab
                        imagem.style.backgroundColor = "#CD4F39";
                        break;
                    case "a7": // OliverDrab
                        imagem.style.backgroundColor = "#00CD66";
                        break;
                    case "a8": // OliverDrab
                        imagem.style.backgroundColor = "#8B5F65";
                        break;
                    case "a9": // OliverDrab
                        imagem.style.backgroundColor = "#CD6889";
                        break;
                    case "a10": // OliverDrab
                        imagem.style.backgroundColor = "#009ACD";
                        break;
                    case "a11": // OliverDrab
                        imagem.style.backgroundColor = "#00688B";
                        break;
                    case "a12": // OliverDrab
                        imagem.style.backgroundColor = "#1874CD";
                        break;
                    case "a13": // OliverDrab
                        imagem.style.backgroundColor = "#104E8B";
                        break;
                    case "a14": // OliverDrab
                        imagem.style.backgroundColor = "#6959CD";
                        break;
                    case "a15": // OliverDrab
                        imagem.style.backgroundColor = "#B22222";
                        break;
                    case "a16": // OliverDrab
                        imagem.style.backgroundColor = "#228B22";
                        break;
                    case "a17": // OliverDrab
                        imagem.style.backgroundColor = "#3CB371";
                        break;
                    case "a18": // OliverDrab
                        imagem.style.backgroundColor = "#8B2252";
                        break;
                    case "a19": // OliverDrab
                        imagem.style.backgroundColor = "#CD2626";
                        break;
                }
            }
        </script>
        
        <link rel="author" href="autor.txt">
        
    </head>
    <body>
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="corAzulInfo">
                <div class="navbar-text-top">
                    <!--<div class="navbar-text-top">-->
                    <?php
                    $titulo = new slideShow();
                    $titulo->telaTitulo();
                    
                    echo "<select name='cor' style='font-family: arial; font-size: 16px;' onchange='mudaCor(this.value)'>";
                    echo "  <option value=''></option>";

                    echo "  <option value=''>FLEXTOOL</option>";
                    echo "  <option value=''>============================</option>";
                    echo "  <option value='f1' style='background-color: #1C86EE; color: #fff;'>Doggerblue 2</option>";
                    echo "  <option value='f2' style='background-color: #00BFFF; color: #fff;'>Deepskyblue</option>";
                    echo "  <option value='f3' style='background-color: #4F94CD; color: #fff;'>Steelblue3</option>";
                    echo "  <option value='f4' style='background-color: #00CED1; color: #fff;'>Darkturquoise</option>";
                    echo "  <option value='f5' style='background-color: #436EEE; color: #fff;'>Royalblue2</option>";

                    echo "  <option value=''></option>";

                    echo "  <option value=''>CSRO</option>";
                    echo "  <option value=''>============================</option>";
                    echo "  <option value='c1' style='background-color: #00CDCD; color: #fff;'>Cyan3</option>";
                    echo "  <option value='c2' style='background-color: #00C5CD; color: #fff;'>Turquesa3</option>";
                    echo "  <option value='c3' style='background-color: #912CEE; color: #fff;'>Roxo2</option>";
                    echo "  <option value='c4' style='background-color: #9F79EE; color: #fff;'>Medium Roxo2</option>";
                    echo "  <option value='c5' style='background-color: #87CEEB; color: #fff;'>Sky Azul3</option>";
                    echo "  <option value='c6' style='background-color: #009ACD; color: #fff;'>Deepskyazul3</option>";
                    echo "  <option value='c7' style='background-color: #4682B4; color: #fff;'>Steel Azul 2 e 3</option>";
                    echo "  <option value='c8' style='background-color: #4169E1; color: #fff;'>Royal Azul2</option>";
                    echo "  <option value='c9' style='background-color: #7B68EE; color: #fff;'>Medium Slate Azul</option>";

                    echo "  <option value=''></option>";

                    echo "  <option value=''>OUTROS</option>";
                    echo "  <option value=''>============================</option>";
                    echo "  <option value='a1' style='background-color: #D2691E; color: #fff;'>Chocolate</option>";
                    echo "  <option value='a2' style='background-color: #6B8E23; color: #fff;'>OliveDrab</option>";
                    echo "  <option value='a3' style='background-color: #B03060; color: #fff;'>Maroon</option>";
                    echo "  <option value='a4' style='background-color: #CD1076; color: #fff;'>DeepPink3</option>";
                    echo "  <option value='a5' style='background-color: #EE0000; color: #fff;'>Red2</option>";
                    echo "  <option value='a6' style='background-color: #CD4F39; color: #fff;'>Tomato3</option>";
                    echo "  <option value='a7' style='background-color: #00CD66; color: #fff;'>SpringGreen3</option>";
                    echo "  <option value='a8' style='background-color: #8B5F65; color: #fff;'>LightPink4</option>";
                    echo "  <option value='a9' style='background-color: #CD6889; color: #fff;'>PaleVioletRed3</option>";
                    echo "  <option value='a10' style='background-color: #009ACD; color: #fff;'>DeepSkyBlue3</option>";
                    echo "  <option value='a11' style='background-color: #00688B; color: #fff;'>DeepSkyBlue4</option>";
                    echo "  <option value='a12' style='background-color: #1874CD; color: #fff;'>DodgerBlue3</option>";
                    echo "  <option value='a13' style='background-color: #104E8B; color: #fff;'>DodgerBlue4</option>";
                    echo "  <option value='a14' style='background-color: #6959CD; color: #fff;'>SlateBlue3</option>";
                    echo "  <option value='a15' style='background-color: #B22222; color: #fff;'>Firebrick</option>";
                    echo "  <option value='a16' style='background-color: #228B22; color: #fff;'>ForestGreen</option>";
                    echo "  <option value='a17' style='background-color: #3CB371; color: #fff;'>MediumSeaGreen</option>";
                    echo "  <option value='a18' style='background-color: #8B2252; color: #fff;'>VioletRed4</option>";
                    echo "  <option value='a19' style='background-color: #CD2626; color: #fff;'>Firebrick3</option>";
                    echo "</select>";
                    
?>

                </div>
            </nav>
        <!-- Meio da página -->
        <div class="content">
            <!--<div class="container">-->
                <?php
                    $slide->telaNovaSlideTeste();
                ?>
            <!--</div>-->
        </div>

        <!-- Parte de baixo da página -->
        <footer id="footer">
            <nav class="navbar navbar-default navbar-fixed-bottom" id="corAzulInfo" style="border-color: #009ACD;">
                <?php
                    $slide->preparaMenu("home");
                ?>
            </nav>
        </footer>


        <div id="topcontrol" title="Voltar ao topo" style="position: fixed; bottom: 55px; right: 4px; opacity: 0; cursor: pointer;">
            <img src="images/up.png" style="width:30px; height:30px"></div>
        <div id="topcontrol" title="Voltar ao topo" style="position: fixed; bottom: 55px; right: 4px; opacity: 0; cursor: pointer;">
            <img src="images/up.png" style="width:30px; height:30px">
        </div>

        <script>
            $(document).ready(function () {
                $('.bxslider').bxSlider({
                    auto: true,
                    mode: 'fade',
                    slideMargin: 0,
                    controls: true,
                    touchEnabled: true,
                    autoControls: true,
                    responsive: true


                });
            });
        </script>

        <script type='text/javascript'>
            function _dmBootstrap(file) {
                var _dma = document.createElement('script');
                _dma.type = 'text/javascript';
                _dma.async = true;
                _dma.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + file;
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(_dma);
            }
            function _dmFollowup(file) {
                if (typeof DMAds === 'undefined')
                    _dmBootstrap('cdn2.DeveloperMedia.com/a.min.js');
            }
            (function () {
                _dmBootstrap('cdn1.DeveloperMedia.com/a.min.js');
                setTimeout(_dmFollowup, 2000);
            })();
        </script>
        <script type="text/javascript" src="jscss/navega.js"></script>        
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-75468239-1', 'auto');
		  ga('send', 'pageview');

		</script>

    </body>
</html>

