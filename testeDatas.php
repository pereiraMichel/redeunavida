<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
        <meta name="description" content="REDE UNA VIVA">
        <meta name="keywords" content="rede una viva ruv jr jornada real">
        <meta name="author" content="Michel Pereira - MAP TI">
        <meta name="robots" content="nofollow">
        <meta name="google" content="notranslate">        
        <title>Teste de Datas</title>

        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">

        <link rel="shortcut icon" href="icon/ruv.ico">
        <link rel="icon" type="image/png" href="images/ruvicon.png">

        <link rel="stylesheet" href="css/bootstrap-submenu.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.css">
        <link rel="stylesheet" href="css/estilo.css">

        <link rel="stylesheet" href="jscss/orbit-1.2.3.css">
        <script src="jscss/jquery.orbit-1.2.3.min.js"></script>


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="js/jquery.js"></script>
        <!--<script src="jscss/jquery.min.js"></script>-->
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-submenu.js"></script>
        <script src="js/jquery-migrate.min.js"></script>
        <script src="sistema/js/validaCampos.js"></script>

        <!-- Chamada para slide show -->


<!--        <script src="jscss/jquery.min.js"></script>-->
        <script src="jscss/jquery.bxslider.min.js"></script>

        <link href="jscss/jquery.bxslider.css" rel="stylesheet" />


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
            var tempo = "<?= time(); ?>";
        </script>

        <script>
            $('.dropdown-submenu > a').submenupicker();
        </script>

        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $('body').addClass('images');
            });
        </script>
        <style>
            body{padding-top: 80px; width: 98.8%;}
        </style>

        <link rel="author" href="autor.txt">
        <script type="text/javascript">
            $(window).load(function () {
                $('#featured').orbit({
                    animation: 'fade',
                    directionalNav: false,
                    bullets: true
                });
            });
        </script>
        <script>
            $(document).ready(function () {
                $('.bxslider').bxSlider({
                    auto: true,
                    adaptiveHeight: true,
                    autoControls: true,
//                   infiniteLoop: true,
                    startSlide: 0,
                    responsive: true,
                    mode: "horizontal",
                    slides: 4,
                    screen: 768,
                    pager: true
                });
            });
        </script>        

        <style type="text/css">
            .timer { display: none !important; }
            div.caption { background:transparent; filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000,endColorstr=#99000000);zoom: 1; }
        </style>        

    </head>
    <body>
        <?php
                //Teste Data
        
                date_default_timezone_set('America/Sao_Paulo');
        
        $estacao = 0;
        $codEstacao = 0;

        echo "      <div class='table-responsive' style='padding-left: 10px;'>";
        echo "          <table class='table' style='text-decoration: none;'>";
        echo "              <tr style='background-color: #FFFF00;'>";
        echo "                  <td colspan='2'>";
        echo "                      <b>Teste data</b>";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      <b>Dia Semana:</b>";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <b>".date('W')."</b>";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      <b>Número de dias de um dado mês:</b>";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <b>".date('t', mktime(0,0,0,1,1,2015))."</b>";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      <b>Dia do mês, 2 digitos com preenchimento de zero:</b>";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <b>".date('d')."</b>";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      <b>Representação numérica ISO-8601 do dia da semana:</b>";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <b>".date('N')."</b>";
        echo "                  </td>";
        echo "              </tr>";
//        echo "              <tr>";
//        echo "                  <td>";
//        echo "                      <b>Se está em um ano bissexto:</b>";
//        echo "                  </td>";
//        echo "                  <td>";
//        echo "                      <b>".date('L')."</b>";
//        echo "                  </td>";
//        echo "              </tr>";

        $mes = date('m');
        $dia = date('d');
        $ano = date('Y');

        
        $dataInicio = "09/20/".date('Y');
        $dataFim = date('m/d/Y');
        $calculoData = round((strtotime($dataFim) - strtotime($dataInicio))/(24*60*60), 0) + 1;
/*
- Outono: de 21 de março a 21 de junho
- Inverno: de 21 de junho a 23 de setembro
- Primavera: de 23 de setembro a 21 de dezembro
- Verão: de 21 de dezembro a 21 de março
*/
                if($calculoData >= 1 && $calculoData <= 7){
                    $semana = 1;
                }else if($calculoData >= 8 && $calculoData <= 14){
                    $semana = 2;
                }else if($calculoData >= 15 && $calculoData <= 21){
                    $semana = 3;
                }else if($calculoData >= 22 && $calculoData <= 28){
                    $semana = 4;
                }
                else if($calculoData >= 29 && $calculoData <= 35){
                    $semana = 1;
                }else if($calculoData >= 36 && $calculoData <= 42){
                    $semana = 2;
                }else if($calculoData >= 43 && $calculoData <= 49){
                    $semana = 3;
                }else if($calculoData >= 50 && $calculoData <= 56){
                    $semana = 4;
                }
                else if($calculoData >= 57 && $calculoData <= 63){
                    $semana = 1;
                }else if($calculoData >= 64 && $calculoData <= 70){
                    $semana = 2;
                }else if($calculoData >= 71 && $calculoData <= 77){
                    $semana = 3;
                }else if($calculoData >= 78 && $calculoData <= 91){
                    $semana = 4;
                }
                //Verão, de 92 a 182
                else if($calculoData >= 92 && $calculoData <= 98){
                    $semana = 1;
                }else if($calculoData >= 99 && $calculoData <= 105){
                    $semana = 2;
                }else if($calculoData >= 106 && $calculoData <= 112){
                    $semana = 3;
                }else if($calculoData >= 113 && $calculoData <= 119){
                    $semana = 4;
                }
                else if($calculoData >= 120 && $calculoData <= 126){
                    $semana = 1;
                }else if($calculoData >= 127 && $calculoData <= 133){
                    $semana = 2;
                }else if($calculoData >= 134 && $calculoData <= 140){
                    $semana = 3;
                }else if($calculoData >= 141 && $calculoData <= 147){
                    $semana = 4;
                }
                else if($calculoData >= 148 && $calculoData <= 154){
                    $semana = 1;
                }else if($calculoData >= 155 && $calculoData <= 161){
                    $semana = 2;
                }else if($calculoData >= 162 && $calculoData <= 168){
                    $semana = 3;
                }else if($calculoData >= 169 && $calculoData <= 182){
                    $semana = 4;
                }
                //Outono, de 183 a 273
                else if($calculoData >= 183 && $calculoData <= 189){
                    $semana = 1;
                }else if($calculoData >= 190 && $calculoData <= 196){
                    $semana = 2;
                }else if($calculoData >= 197 && $calculoData <= 203){
                    $semana = 3;
                }else if($calculoData >= 204 && $calculoData <= 210){
                    $semana = 4;
                }
                else if($calculoData >= 211 && $calculoData <= 217){
                    $semana = 1;
                }else if($calculoData >= 218 && $calculoData <= 224){
                    $semana = 2;
                }else if($calculoData >= 225 && $calculoData <= 231){
                    $semana = 3;
                }else if($calculoData >= 232 && $calculoData <= 238){
                    $semana = 4;
                }
                else if($calculoData >= 239 && $calculoData <= 245){
                    $semana = 1;
                }else if($calculoData >= 246 && $calculoData <= 252){
                    $semana = 2;
                }else if($calculoData >= 253 && $calculoData <= 259){
                    $semana = 3;
                }else if($calculoData >= 260 && $calculoData <= 273){
                    $semana = 4;
                }
                //Inverno, de 274 a 364
                else if($calculoData >= 274 && $calculoData <= 280){
                    $semana = 1;
                }else if($calculoData >= 281 && $calculoData <= 287){
                    $semana = 2;
                }else if($calculoData >= 288 && $calculoData <= 294){
                    $semana = 3;
                }else if($calculoData >= 295 && $calculoData <= 301){
                    $semana = 4;
                }
                else if($calculoData >= 302 && $calculoData <= 308){
                    $semana = 1;
                }else if($calculoData >= 309 && $calculoData <= 315){
                    $semana = 2;
                }else if($calculoData >= 316 && $calculoData <= 322){
                    $semana = 3;
                }else if($calculoData >= 323 && $calculoData <= 329){
                    $semana = 4;
                }
                else if($calculoData >= 330 && $calculoData <= 336){
                    $semana = 1;
                }else if($calculoData >= 337 && $calculoData <= 343){
                    $semana = 2;
                }else if($calculoData >= 344 && $calculoData <= 350){
                    $semana = 3;
                }else if($calculoData >= 351 && $calculoData <= 364){
                    $semana = 4;
                }

//        $semana = "Teste";
        
        echo "              <tr>";
        echo "                  <td>";
        echo "                      <b>Estação: (Fechado)</b>";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <b>".$estacao."</b><br/>";
        echo "                      <b>Código: ".$codEstacao."</b>";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      <b>Dia do ano (começando dia 20/09/2015): (Fechado)</b>";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <b>".$calculoData."</b>";
//        echo "                      <b>".date('z')."</b>";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      <b>Ano: (Fechado)</b>";
        echo "                  </td>";
        echo "                  <td>";
        $anoLetivo = 5;
        if ((date('y') >= "15" || $mes >= "09") || (date('y') == "16" || $mes <= "09")){
            $anoLetivo = 5;
        }else{
            $anoLetivo++;
        }
        echo "                      <b>".$anoLetivo."</b>";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      <b>Semana: (tem que ser 3)</b>";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <b>".$semana."</b>";
        echo "                  </td>";
        echo "              </tr>";
//        echo "              <tr>";
//        echo "                  <td>";
//        echo "                      <b>TimeZone: </b>";
//        echo "                  </td>";
//        echo "                  <td>";
//        echo "                      <b>".date('r')."</b>";
//        echo "                  </td>";
//        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      <b>Mês Ruv: (tem que ser 2)</b>";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <b>".$mesRuv."</b>";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td colspan='2'>";
        echo "                      ========================================";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      <b>Da tabela, foram fechados</b>";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <b>Ano, dia do ano, estação e mês</b>";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      <b>Restam</b>";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <b>semana.</b>";
        echo "                  </td>";
        echo "              </tr>";
        echo "          </table>";
        echo "      </div>";
        
        // put your code here
        ?>
    </body>
</html>
