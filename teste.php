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
                        document.getElementById('tituloRuv').style.fontFamily="sans-serif";
                        document.getElementById('fonteRuv').style.fontFamily="sans-serif";
                        document.getElementById('fontePaz').style.fontFamily="sans-serif";
                        document.getElementById('abecedario').style.fontFamily="sans-serif";
                        document.getElementById('texto').style.fontFamily="sans-serif";
                    }else
                    if(fonte === "fonte1"){
                        document.getElementById('tituloRuv').style.fontFamily="Malayalam";
                        document.getElementById('fonteRuv').style.fontFamily="Malayalam";
                        document.getElementById('fontePaz').style.fontFamily="Malayalam";
                        document.getElementById('abecedario').style.fontFamily="Malayalam";
                        document.getElementById('texto').style.fontFamily="Malayalam";
                    }else
                    if(fonte === "fonte2"){
                        document.getElementById('tituloRuv').style.fontFamily="Kannada";
                        document.getElementById('fonteRuv').style.fontFamily="Kannada";
                        document.getElementById('fontePaz').style.fontFamily="Kannada";
                        document.getElementById('abecedario').style.fontFamily="Kannada";
                        document.getElementById('texto').style.fontFamily="Kannada";
                    }else
                    if(fonte === "fonte3"){
                        document.getElementById('tituloRuv').style.fontFamily="Cambria";
                        document.getElementById('fonteRuv').style.fontFamily="Cambria";
                        document.getElementById('fontePaz').style.fontFamily="Cambria";
                        document.getElementById('abecedario').style.fontFamily="Cambria";
                        document.getElementById('texto').style.fontFamily="Cambria";
                    }else
                    if(fonte === "fonte4"){
                        document.getElementById('tituloRuv').style.fontFamily="Baskerville";
                        document.getElementById('fonteRuv').style.fontFamily="Baskerville";
                        document.getElementById('fontePaz').style.fontFamily="Baskerville";
                        document.getElementById('abecedario').style.fontFamily="Baskerville";
                        document.getElementById('texto').style.fontFamily="Baskerville";
                    }else
                    if(fonte === "fonte5"){
                        document.getElementById('tituloRuv').style.fontFamily="Arial Unicode MS";
                        document.getElementById('fonteRuv').style.fontFamily="Arial Unicode MS";
                        document.getElementById('fontePaz').style.fontFamily="Arial Unicode MS";
                        document.getElementById('abecedario').style.fontFamily="Arial Unicode MS";
                        document.getElementById('texto').style.fontFamily="Arial Unicode MS";
                    }else
                    if(fonte === "fonte6"){
                        document.getElementById('tituloRuv').style.fontFamily="verdana";
                        document.getElementById('fonteRuv').style.fontFamily="verdana";
                        document.getElementById('fontePaz').style.fontFamily="verdana";
                        document.getElementById('abecedario').style.fontFamily="verdana";
                        document.getElementById('texto').style.fontFamily="verdana";
                    }else
                    if(fonte === "fonte7"){
                        document.getElementById('tituloRuv').style.fontFamily="helvetica";
                        document.getElementById('fonteRuv').style.fontFamily="helvetica";
                        document.getElementById('fontePaz').style.fontFamily="helvetica";
                        document.getElementById('abecedario').style.fontFamily="helvetica";
                        document.getElementById('texto').style.fontFamily="helvetica";
                    }else
                    if(fonte === "fonte8"){
                        document.getElementById('tituloRuv').style.fontFamily="serif";
                        document.getElementById('fonteRuv').style.fontFamily="serif";
                        document.getElementById('fontePaz').style.fontFamily="serif";
                        document.getElementById('abecedario').style.fontFamily="serif";
                        document.getElementById('texto').style.fontFamily="serif";
                    }else
                    if(fonte === "fonte9"){
                        document.getElementById('tituloRuv').style.fontFamily="times new roman";
                        document.getElementById('fonteRuv').style.fontFamily="times new roman";
                        document.getElementById('fontePaz').style.fontFamily="times new roman";
                        document.getElementById('abecedario').style.fontFamily="times new roman";
                        document.getElementById('texto').style.fontFamily="times new roman";
                    }else
                    if(fonte === "fonte10"){
                        document.getElementById('tituloRuv').style.fontFamily="Arial";
                        document.getElementById('fonteRuv').style.fontFamily="Arial";
                        document.getElementById('fontePaz').style.fontFamily="Arial";
                        document.getElementById('abecedario').style.fontFamily="Arial";
                        document.getElementById('texto').style.fontFamily="Arial";
                    }
                
                
                }
//                else if(classificacao === "fonte2"){
//                    if(fonte === "fonte0"){
//                        document.getElementById('fontePaz').style.fontFamily="Angelface, Cursive";
//                    }else if(fonte === "fonte1"){
//                        document.getElementById('fontePaz').style.fontFamily="Baskerville, Cursive";
//                    }
//                    else if(fonte === "fonte2"){
//                        document.getElementById('fontePaz').style.fontFamily="times new roman, Cursive";
//                    }
//                    else if(fonte === "fonte3"){
//                        document.getElementById('fontePaz').style.fontFamily="garamond, Cursive";
//                    }
//                    else if(fonte === "fonte4"){
//                        document.getElementById('fontePaz').style.fontFamily="Cambria, Cursive";
//                    }
//                    else if(fonte === "fonte5"){
//                        document.getElementById('fontePaz').style.fontFamily="Arial Unicode MS, Cursive";
//                    }
//
//                }
            }
            
            function mudaTamanho(tamanho, classificacao){
                if(classificacao === "fonte1"){
                    document.getElementById('tituloRuv').style.fontSize=tamanho+"px";
                    document.getElementById('fonteRuv').style.fontSize=tamanho+"px";
                    document.getElementById('fontePaz').style.fontSize=tamanho+"px";
                    document.getElementById('abecedario').style.fontSize=tamanho+"px";
                    document.getElementById('texto').style.fontSize=tamanho+"px";
//                }else if (classificacao === "fonte2"){
//                    document.getElementById('fontePaz').style.fontSize=tamanho+"px";
                }
            }
            
            function mudaEstilo(estilo, classificacao){
                
                if(classificacao === "fonte1"){
                    document.getElementById('tituloRuv').style.fontStyle="normal";
                    document.getElementById('tituloRuv').style.fontWeight="normal";
                    document.getElementById('tituloRuv').style.fontStyle=estilo;

                    document.getElementById('fonteRuv').style.fontStyle="normal";
                    document.getElementById('fonteRuv').style.fontWeight="normal";
                    document.getElementById('fonteRuv').style.fontStyle=estilo;

                    document.getElementById('fontePaz').style.fontStyle="normal";
                    document.getElementById('fontePaz').style.fontWeight="normal";
                    document.getElementById('fontePaz').style.fontStyle=estilo;

                    document.getElementById('abecedario').style.fontStyle="normal";
                    document.getElementById('abecedario').style.fontWeight="normal";
                    document.getElementById('abecedario').style.fontStyle=estilo;

                    document.getElementById('texto').style.fontStyle="normal";
                    document.getElementById('texto').style.fontWeight="normal";
                    document.getElementById('texto').style.fontStyle=estilo;
//                }else if (classificacao === "fonte2"){
//                    document.getElementById('fontePaz').style.fontStyle="normal";
//                    document.getElementById('fontePaz').style.fontWeight="normal";
//                    document.getElementById('fontePaz').style.fontStyle=estilo;
                }
            }
            
            function mudaEstiloNegrito(classificacao){
                var estilo = "bold";
                if(classificacao === "fonte1"){
                    document.getElementById('tituloRuv').style.fontWeight=estilo;
                    document.getElementById('fonteRuv').style.fontWeight=estilo;
                    document.getElementById('fontePaz').style.fontWeight=estilo;
                    document.getElementById('abecedario').style.fontWeight=estilo;
                    document.getElementById('texto').style.fontWeight=estilo;
//                }else if (classificacao === "fonte2"){
//                    document.getElementById('fontePaz').style.fontWeight=estilo;
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
                        $titulo->telaTitulo();
                    
                    ?>


                    <!--</div>-->
                </div>
            </nav>
        <!--</header> /header -->

        <!-- Meio da página -->


        <div class="content">
            
            <!--<div class="container">-->
            <p style="height: 80px;">&nbsp;</p>
            <div class="col-md-6">
            <form class="form-horizontal" name="formTeste" method="get" action="teste.php" style="padding-left: 15px;">
                <b>Teste de Fontes - RedeUnaViva</b><br/><br/>
                <div style="padding-left: 20px;">
                    <b>Fonte:</b> 
                <select name="fonte1" onclick="javascript: mudaFonte(this.value, 'fonte1')">
                    <option value="fonte0">Fonte 0 - Sans-serif</option>
                    <option value="fonte1">Fonte 1 - Malayalam</option>
                    <option value="fonte2">Fonte 2 - Kannada</option>
                    <option value="fonte3">Fonte 3 - Cambria</option>
                    <option value="fonte4">Fonte 4 - Baskerville</option>
                    <option value="fonte5">Fonte 5 - Arial Unicode</option>
                    <option value="fonte6">Fonte 6 - Verdana</option>
                    <option value="fonte7">Fonte 7 - Helvetica</option>
                    <option value="fonte8">Fonte 8 - Serif</option>
                    <option value="fonte9">Fonte 9 - Times New Roman</option>
                    <option value="fonte10">Fonte 10 - Arial</option>
                    
                   
                </select>
                    <br/><br/>
                    <b>Tamanho da fonte:</b> <input type="text" value="16" id="tamanhoFonte1" name="tamanhoFonte1" size="3" onkeyup="javascript: mudaTamanho(this.value, 'fonte1')"> 
                    <br/><br/>
                    <b>Estilo:</b> 
                        <input type="radio" id="italico1" name="radio1" onclick="javascript: mudaEstilo('italic', 'fonte1')"> Itálico 
                        <input type="radio" name="radio1" id="negrito1" onclick="javascript: mudaEstiloNegrito('fonte1')"> Negrito 
                        <input type="radio" name="radio1" id="normal1" onclick="javascript: mudaEstilo('normal', 'fonte1')"> Normal
                    <br/>
                </div>
                <br/>
                <br/>
<!--                <b>por uma cultura de paz</b><br/><br/>
                <div style="padding-left: 20px;">
                    <b>Fonte:</b> 
                <select name="fonte2" onclick="javascript: mudaFonte(this.value, 'fonte2')">
                    <option value="fonte0">Fonte Padrão - Angelface</option>
                    <option value="fonte1">Fonte 1 - Baskerville</option>
                    <option value="fonte2">Fonte 2 - Times New Roman</option>
                    <option value="fonte3">Fonte 3 - Garamond</option>
                    <option value="fonte4">Fonte 4 - Cambria</option>
                    <option value="fonte5">Fonte 5 - Arial Unicode MS</option>
                </select>
                    <br/>
                    <b>Tamanho da fonte:</b> <input type="text" value="28" id="tamanhoFonte2" name="tamanhoFonte2" size="3" onkeyup="javascript: mudaTamanho(this.value, 'fonte2')">
                    <br/>
                    <b>Estilo:</b> <input type="radio" id="italico2" name="radio2" onclick="javascript: mudaEstilo('italic', 'fonte2')"> Itálico <input type="radio" name="radio2" id="negrito2" onclick="javascript: mudaEstiloNegrito('fonte2')"> Negrito <input type="radio" name="radio2" id="normal2" onclick="javascript: mudaEstilo('normal', 'fonte2')"> Normal
                    <br/>
                </div>-->
            </form>
            </div> <!-- fecha o col-md-6 -->
            
            <div class="col-md-6" style="padding-right: 15px; font-size: 16px;">
                <p style="height: 20px">&nbsp;</p>
                <div id="fonteRuv">
                    RedeUnaViva
                </div>
                <br>
                <div id="fontePaz">
                    Por uma cultura de paz
                </div>
                <br>
                <div id="abecedario">
                    aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVxXwWyYzZ
                </div>
                <br>
                <div style="text-align: justify" id="texto">
                    A meditação compõe com a Jornada Real o projeto de ação da RedeUnaViva. Favorece o desenvolvimento espiritual e habilita cada pessoa a disponibilizar sua oferta de benefícios, em prol de um mundo melhor. Contribui sutil e efetivamente para a instalação da já vislumbrada cultura de paz. Embutida na Jornada Real, ela se entrelaça com o processo de autoconhecimento, em prática estendida ao longo de um ano.
                    
                </div>
                
                
            </div>
            
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

