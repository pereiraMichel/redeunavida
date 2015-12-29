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
        <meta name="description" content="REDE UNA VIVA">
        <meta name="keywords" content="rede una viva ruv jr jornada real">
        <meta name="author" content="Michel Pereira - MAP TI">
        <meta name="robots" content="nofollow">
        <meta name="google" content="notranslate">        
        <title><?php echo TITULORUV; ?></title>

        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">

        <link rel="shortcut icon" href="icon/ruv.ico">
        <link rel="icon" type="image/png" href="images/ruvicon.png">

        <link rel="stylesheet" href="css/bootstrap-submenu.css">
        <!--<link rel="stylesheet" href="css/bootstrap.css">-->
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

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <!--<script src="jscss/jquery.min.js"></script>-->
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
            function mudaFonte(fonte, classificacao){
                
                if(classificacao === "fonte1"){
                    if(fonte === "fonte0"){//Padrão
                        document.getElementById('fonteRuv').style.fontFamily="times new roman";
                    }else
                    if(fonte === "fonte1"){
                        document.getElementById('fonteRuv').style.fontFamily="Malayalam, Cursive";
                    }else
                    if(fonte === "fonte2"){
                        document.getElementById('fonteRuv').style.fontFamily="Kannada, Cursive";
                    }else
                    if(fonte === "fonte3"){
                        document.getElementById('fonteRuv').style.fontFamily="Cambria, Cursive";
                    }else
                    if(fonte === "fonte4"){
                        document.getElementById('fonteRuv').style.fontFamily="Baskerville, Cursive";
                    }
                }
                else if(classificacao === "fonte2"){
                    if(fonte === "fonte0"){
                        document.getElementById('fontePaz').style.fontFamily="Angelface, Cursive";
                    }else if(fonte === "fonte1"){
                        document.getElementById('fontePaz').style.fontFamily="Baskerville, Cursive";
                    }
                    else if(fonte === "fonte2"){
                        document.getElementById('fontePaz').style.fontFamily="times new roman, Cursive";
                    }
                    else if(fonte === "fonte3"){
                        document.getElementById('fontePaz').style.fontFamily="garamond, Cursive";
                    }
                    else if(fonte === "fonte4"){
                        document.getElementById('fontePaz').style.fontFamily="Cambria, Cursive";
                    }

                }
            }
            
            function mudaTamanho(tamanho, classificacao){
                if(classificacao === "fonte1"){
                    document.getElementById('fonteRuv').style.fontSize=tamanho+"px";
                }else if (classificacao === "fonte2"){
                    document.getElementById('fontePaz').style.fontSize=tamanho+"px";
                }
            }
            
            function mudaEstilo(estilo, classificacao){
                
                if(classificacao === "fonte1"){
                    document.getElementById('fonteRuv').style.fontStyle="normal";
                    document.getElementById('fonteRuv').style.fontWeight="normal";
                    document.getElementById('fonteRuv').style.fontStyle=estilo;
                }else if (classificacao === "fonte2"){
                    document.getElementById('fontePaz').style.fontStyle="normal";
                    document.getElementById('fontePaz').style.fontWeight="normal";
                    document.getElementById('fontePaz').style.fontStyle=estilo;
                }
            }
            
            function mudaEstiloNegrito(classificacao){
                var estilo = "bold";
                if(classificacao === "fonte1"){
                    document.getElementById('fonteRuv').style.fontWeight=estilo;
                }else if (classificacao === "fonte2"){
                    document.getElementById('fontePaz').style.fontWeight=estilo;
                }
            }

        
        </script>
       
        <link rel="author" href="autor.txt">
        
    </head>
    <body>

        <!--<header id="header">-->
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="corAzulInfo">
                <div class="navbar-text-top">
                    <!--<div class="navbar-text-top">-->
                    <?php
                    $titulo = new slideShow();
//                    $titulo->telaTitulo();
                    
        echo "<div class='navbar-header navbar-text-top'>";
        echo "  <div class='container-fluid'>";
        echo "          <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#menu' aria-expanded='false'>";
        echo "              <span class='sr-only'>Menu</span>";
        echo "              <span class='icon-bar'></span>";
        echo "              <span class='icon-bar'></span>";
        echo "              <span class='icon-bar'></span>";
        echo "          </button>";
        echo "          <div class='navbar-subtext-top' style='padding-top: 5px; padding-left: 15px;'>";//padding-top: 15px; 
        echo "                  <span><a href='index.php' style='text-decoration: none; color: #3F6CA1; font-family: times new roman; font-weight: bold;' id='fonteRuv'>RedeUnaViva</a> </span><a style='font-family: Angelface, Cursive; font-size: 28px; text-decoration: none; color: #F2C700' id='fontePaz'>Por uma cultura de paz</a>";
        echo "          </div>";
        echo "  </div>";
        echo "</div>";
        echo "<div class='collapse navbar-collapse navbar-right' id='menu'>";
        echo "  <ul class='nav navbar-nav' style='padding-right: 25px;'>";
//        echo "  <ul class='nav navbar-nav navbar-right' style='padding-right: 25px;'>";
        echo "      <li>";
	echo "          <a href='sistema/' class='text-link'>";
        echo "              <button class='btn btn-warning btn-sm btn-responsive' style='border-radius: 4px; border: none;'>";
        echo "                  <i class='fa fa-th'></i> Entrar";
        echo "              </button>";
        echo "          </a>";
        echo "      </li>";
        echo "      <li>";
        echo "          <a href='formAdesao.php' role='button' style='text-decoration: none;' class='text-link'>";
        echo "              <button class='btn btn-primary btn-sm btn-responsive' style='border-radius: 4px; border: none;>";
        echo "                  <i class='fa fa-user'></i> Cadastre-se";
        echo "              </button>";
        echo "          </a>";
        echo "      </li>";
        echo "  </ul>";
        echo "</div>";
                    
                    
                    ?>


                    <!--</div>-->
                </div>
            </nav>
        <!--</header> /header -->

        <!-- Meio da página -->


        <div class="content">
            <!--<div class="container">-->
            <p style="height: 80px;">&nbsp;</p>
            <form class="form-horizontal" name="formTeste" method="get" action="teste.php" style="padding-left: 15px;">
                <b>RedeUnaViva</b><br/><br/>
                <div style="padding-left: 20px;">
                    <b>Fonte:</b> 
                <select name="fonte1" onclick="javascript: mudaFonte(this.value, 'fonte1')">
                    <option value="fonte0">Fonte Padrão - Times New Roman</option>
                    <option value="fonte1">Fonte 1 - Malayalam</option>
                    <option value="fonte2">Fonte 2 - Kannada</option>
                    <option value="fonte3">Fonte 3 - Cambria</option>
                    <option value="fonte4">Fonte 4 - Baskerville</option>
                </select>
                    <br/>
                    <b>Tamanho da fonte:</b> <input type="text" value="36" id="tamanhoFonte1" name="tamanhoFonte1" size="3" onkeyup="javascript: mudaTamanho(this.value, 'fonte1')"> 
                    <br/>
                    <b>Estilo:</b> <input type="radio" id="italico1" name="radio1" onclick="javascript: mudaEstilo('italic', 'fonte1')"> Itálico <input type="radio" name="radio1" id="negrito1" onclick="javascript: mudaEstiloNegrito('fonte1')"> Negrito <input type="radio" name="radio1" id="normal1" onclick="javascript: mudaEstilo('normal', 'fonte1')"> Normal
                    <br/>
                </div>
                <br/><br/>
                <b>Por uma cultura de paz</b><br/><br/>
                <div style="padding-left: 20px;">
                    <b>Fonte:</b> 
                <select name="fonte2" onclick="javascript: mudaFonte(this.value, 'fonte2')">
                    <option value="fonte0">Fonte Padrão - Angelface</option>
                    <option value="fonte1">Fonte 1 - Baskerville</option>
                    <option value="fonte2">Fonte 2 - Times New Roman</option>
                    <option value="fonte3">Fonte 3 - Garamond</option>
                    <option value="fonte4">Fonte 4 - Cambria</option>
                </select>
                    <br/>
                    <b>Tamanho da fonte:</b> <input type="text" value="28" id="tamanhoFonte2" name="tamanhoFonte2" size="3" onkeyup="javascript: mudaTamanho(this.value, 'fonte2')">
                    <br/>
                    <b>Estilo:</b> <input type="radio" id="italico2" name="radio2" onclick="javascript: mudaEstilo('italic', 'fonte2')"> Itálico <input type="radio" name="radio2" id="negrito2" onclick="javascript: mudaEstiloNegrito('fonte2')"> Negrito <input type="radio" name="radio2" id="normal2" onclick="javascript: mudaEstilo('normal', 'fonte2')"> Normal
                    <br/>
                </div>
            </form>
            
                <?php
//                $slide->telaNovaSlide();
                ?>
            <!--</div>-->
        </div>
        <!-- Parte de baixo da página -->
        <footer id="footer">
            <nav class="navbar navbar-default navbar-fixed-bottom" id="corAzulInfo">

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


    </body>
</html>

