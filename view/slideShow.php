<?php

    define("TAMANHOTITULO","35px");
    define("TAMANHOTEXTO","30px");
    define("TAMANHOMENU","16px");


class slideShow {
    
    public function telaLogoMarcas(){
        echo "<ul class='list-inline' style='padding-left: 30px; text-align: center;'>";
        echo "  <li>";
        echo "      <div class='img-responsive' style='padding-left: 10px;'>";
        echo "          <a href='index.php'>";
        echo "              <img src='images/logoRedeUnaVida.png' title='".TITULORUVBAIXO."' width='600' height='570' class='img-responsive'>";
//        echo "              <img src='images/logoRedeUnaVida.png' title='".TITULORUVBAIXO."' width='230' height='200' class='img-responsive'>";
        echo "          </a>";
        echo "      </div>";
        echo "  </li>";
        echo "</ul>";
    }
    
    public function calendario($mensagem){
        $larguraColuna = 5;
        echo "      <div class='table-responsive' style='padding-left: 10px;'>";
        echo "          <table class='table' style='text-decoration: none;'>";
        echo "              <tr style='background-color: #FFFF00;'>";
        echo "                  <td colspan='7'>";
        echo "                      <b>Calendário - RUV</b>";
        echo "                  </td>";
        echo "              </tr>";
        //Segunda linha
        //Terceira linha
        echo "              <tr>";
        echo "                  <td>";
        echo "                      <label style='color: #FF0000;' for='ano'><b><div id='anoCalendario'></div></b></label>";
        echo "                  </td>";
        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <label><b><div id='estacao'>&nbsp;</div></b></label>";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <label for='mes'><b><div id='mesCalendario'></div></b></label>";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <label><b><div id='semana'>&nbsp;</div></b></label>";
        echo "                  </td>";
        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <label style='color: #0000FF' for='dias'><b><div id='diasCalendario'></div></b></label>";
        echo "                  </td>";
        echo "              </tr>";
        //Quarta linha
        echo "              <tr class='warning'>";
        echo "                  <td>";
        echo "                      <small>Ano</small>";
        echo "                  </td>";
        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <small>Estação</small>";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <small>Mês</small>";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <small>Semana</small>";
        echo "                  </td>";
        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <small>Dia</small>";
        echo "                  </td>";
        echo "              </tr>";
        //Quinta linha
        echo "              <tr>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td colspan='3'>";
        echo "                      <div id='hora'>&nbsp;</div>";
        echo "                  </td>";
        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "              </tr>";
        //Sexta linha
        echo "              <tr class='warning'>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td colspan='3'>";
        echo "                      <small>Hora</small>";
        echo "                  </td>";
        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "              </tr>";
        //Sétima linha
        echo "              <tr>";
        echo "                  <td colspan='7'>";
        echo "                      <div id='dataJava'>&nbsp;</div>";///date('d/m/Y');
        echo "                  </td>";
        echo "              </tr>";
        //Oitava linha
        echo "              <tr class='warning'>";
        echo "                  <td colspan='7'>";
        echo                        $mensagem;
        echo "                  </td>";
        echo "              </tr>";
        echo "          </table>";
        echo "      </div>";
        
        
        
    }
    
    public function telaLogoMarcasHorizontal(){
	echo "<nav class='navbar navbar-fixed-bottom' role='navigation'>";
        echo "  <div class='container-fluid'>";
        echo "            <div class='navbar-header'>";
        echo "              <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#menuImagens' aria-expanded='false'>";
        echo "                  <span class='sr-only'>Menu</span>";
        echo "                    <span class='icon-bar'></span>";
        echo "                    <span class='icon-bar'></span>";
        echo "                    <span class='icon-bar'></span>";
        echo "                </button>";
        echo "            </div>";
        echo "  <div class='collapse navbar-collapse' id='menuImagens'>";
        echo "      <ul class='nav navbar-nav navbar-right'>";
        echo "          <li class='col-xs-12 col-md-2' style='padding-left: 30px; padding-bottom: 50px;'>";
        echo "              <a href='index.php' class='navbar-brand'>";
        echo "                  <img src='images/logoRedeUnaVida.png' title='".TITULORUVBAIXO."' width='130' height='100' class='img-responsive'>";
        echo "              </a>";
        echo "          </li>";
        echo "      <li class='col-xs-12 col-md-2' style='padding-left: 30px; padding-bottom: 50px;'>";
        echo "          <a href='index.php'>";
        echo "              <img src='jr/jrLogomarca.png' title='".TITULOJRBAIXO."' width='130' height='100' class='img-responsive'>";
        echo "          </a>";
        echo "      </li>";
        echo "      <li class='col-xs-12 col-md-2' style='padding-left: 30px; padding-top: 20px; padding-bottom: 50px;'>";
        echo "      <a  href='#enviarAdesao' role='button' data-toggle='modal' style='text-decoration: none;' class='text-link'>";
        echo "          <button class='btn btn-primary btn-responsive'>";
        echo "              <i class='fa fa-user'></i> Cadastre-se";
        echo "          </button>";
        echo "      </a>";
        echo "      </li>";
        echo "      <li class='col-xs-12 col-md-2' style='padding-left: 30px; padding-top: 20px; padding-bottom: 50px;'>";
        echo "      <a href='sistema/' class='text-link'>";
        echo "          <button class='btn btn-warning btn-responsive'>";
        echo "              <i class='fa fa-th'></i> Acesso Sistema";
        echo "          </button>";
        echo "      </a>";
        echo "      </li>";
        echo "      </ul>";
        echo "  </div>";
        echo "  </div>";
        echo "</nav>";
    }
    
    public function telaTitulo(){
        
        echo "<div class='navbar-header navbar-text-top'>";
        echo "  <div class='container-fluid'>";
        echo "          <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#menu' aria-expanded='false'>";
        echo "              <span class='sr-only'>Menu</span>";
        echo "              <span class='icon-bar'></span>";
        echo "              <span class='icon-bar'></span>";
        echo "              <span class='icon-bar'></span>";
        echo "          </button>";
        echo "          <div class='navbar-subtext-top' style='padding-top: 5px; padding-left: 15px;'>";//padding-top: 15px;
        echo "                  <span>";
        echo "                      <img src='images/logoRUV50x51.png' width='40' height='41'>";
        echo "                  <a href='index.php' style='text-decoration: none; color: #3F6CA1; font-family: arial; font-size: ".TAMANHOTITULO.";' id='tituloRuv'><img src='images/letraRUV.png' title='RedeUnaViva' width='150' height='40' style='width: 16%; height: 8%'></a> ";
//        echo "                  <a href='index.php' style='text-decoration: none; color: #3F6CA1; font-family: arial; font-size: ".TAMANHOTITULO.";' id='tituloRuv'>RedeUnaViva</a> ";
        echo "                  </span>";
        echo "                  <img src='images/hanzipenImage.png' width='230' height='23' class='image-responsive' style='width: 20%; height: 20%; padding-bottom: 0px;'>";
        
//        echo "                  <span><a href='index.php' style='text-decoration: none; color: #3F6CA1; font-family: times new roman; font-weight: bold;'>RedeUnaViva</a> </span><a style='font-family: Arial Unicode MS, Cursive; font-size: 20px; text-decoration: none; color: #F2C700'><b><i>por uma cultura de paz</i></b></a>";
        echo "          </div>";
        echo "  </div>";
        echo "</div>";
        echo "<div class='collapse navbar-collapse navbar-right' id='menu'>";
        echo "  <ul class='nav navbar-nav' style='padding-right: 25px;'>";
//        echo "  <ul class='nav navbar-nav navbar-right' style='padding-right: 25px;'>";
        echo "      <li>";
	echo "          <a href='sistema/' class='text-link'>";
        echo "              <button class='btn btn-warning btn-sm btn-responsive' style='border-radius: 4px; border: none; font-size: 14px;'>";// width: 85px;
        echo "                  Entrar";//<i class='fa fa-th'></i>
        echo "              </button>";
        echo "          </a>";
        echo "      </li>";
        echo "      <li>";
        echo "          <a href='formAdesao.php' role='button' style='text-decoration: none;' class='text-link'>";
        echo "              <button class='btn btn-primary btn-sm btn-responsive' style='border-radius: 4px; border: none; font-size: 14px;'>";
        echo "                  Cadastre-se";//<i class='fa fa-user'></i> 
        echo "              </button>";
        echo "          </a>";
        echo "      </li>";
        echo "  </ul>";
        echo "</div>";
    }
    
    public function telaNovaSlide(){
        $medidaTop = "padding-top: 200px";//medida do subtítulo no banner
        $medidaTopGruposSemanais = "padding-top: 170px";//medida do subtítulo no banner


//        echo "<script>";
//        echo "  $('.bxslider').bxslider({";
//        echo "      adaptiveHeight: true;";
//        echo "      mode: 'fade';";
//        echo "  });";
//        echo "</script>";
        
        echo "<div class='banner-box'>";
        echo "<div class='banner'>";
        echo "  <ul class='bxslider'>";
        echo "      <li class='icone_slider' id='imagemRUVCDoggerBlue3'>";
        echo "          <div class='imagemRUVCentro'>&nbsp;</div>";
        echo "      </li>";
        echo "      <li class='icone_slider' id='imagem1'>";
        echo "          <div class='banner_texto1'>";
        echo "              <p style='text-align: center; font-family: arial'>";
        echo "                  RedeUnaViva";
        echo "              </p>";
//        echo "              <p>";
//        echo "              <div align='center'>";
//        echo "                  <img src='images/hanzipenImageUnicaBranco.png' width='230' height='23' class='image-responsive' style='background-position: center; text-align: center;'>";
//        echo "              </div>";
//        echo "              </p>";
        echo "              <p style='text-align: center; font-size: 20px; font-family: arial;'>por uma cultura de paz</p>";
        echo "          </div>";
        echo "          <div class='banner_texto2' style='font-size: 24px; ".$medidaTop.";'>";
        echo "              <p>nova humanidade</p>";
        echo "              <p>conspirada</p>";
        echo "              <p>em silêncio</p>";
        echo "          </div>";
        echo "      </li>";
        echo "      <li class='icone_slider' id='imagem2'>";
        echo "          <div class='banner_texto1' style='text-align: center; font-family: arial;'>";
        echo "              <p style='text-align: center;'>Jornada Real</p>";
        echo "              <p style='font-size: 20px;'>para ser</p>";
        echo "          </div>";
        echo "          <div class='banner_texto2' style='font-size: 24px; ".$medidaTop.";'>";
        echo "              <p style='text-align: left;'>Um caminho espiritual</p>";
        echo "              <p style='text-align: left;'>de prática individual diária</p>";
        echo "              <p style='text-align: left;'>e encontros semanais em grupo afim</p>";
        echo "          </div>";
        echo "      </li>";
        // 
        echo "      <li class='icone_slider' id='imagem3'>";
        echo "          <div class='banner_texto1' style='text-align: center; font-family: arial;'>";
        echo "              <p style='text-align: center;'>Jornada de Meditação</p>";
        echo "              <p style='font-size: 20px;'>sentar em paz<br/>sob a mente una</p>";
        echo "          </div>";
        echo "          <br/><br/>";
        echo "          <div class='banner_texto2' style='font-size: 24px; ".$medidaTopGruposSemanais."; font-family: arial;'>";
        echo "              <p style='text-align: right;'>grupos semanais</p>";
        echo "              <p>prática e partilha</p>";
        echo "          </div>";
        echo "      </li>";
        echo "      <li class='icone_slider' id='imagem4'>";
        echo "          <div class='banner_texto1' style='text-align: center; font-family: arial;'>";
        echo "              <p style='text-align: center;'>Retiro Anual</p>";
        echo "              <p style='font-size: 20px;'>Morgenlicht</p>";
        echo "          </div>";
        echo "          <div class='banner_texto2' style='font-size: 24px; ".$medidaTop.";'>";
        echo "              <p style='text-align: left;'>jornada de autoconhecimento</p>";
        echo "              <p style='text-align: left;'>meditação</p>";
        echo "              <p style='text-align: left;'>roda dos sonhos</p>";
        echo "              <p style='text-align: left;'>yoga</p>";
        echo "          </div>";
        echo "      </li>";
        echo "  </ul>";
        echo "</div>";
        echo "</div>";

    }
    
    public function telaNovaSlideTeste(){
        $medidaTop = "padding-top: 200px";//medida do subtítulo no banner
        $medidaTopGruposSemanais = "padding-top: 170px";//medida do subtítulo no banner
            
        /*
         *  Site flextool : cores - Dodgerblue 2; Deepskyblue; Steelblue3; darkturquoise;  e royalblue2;
         * Dodgerblue 2 = #1C86EE
         * Deepskyblue = #00BFFF
         * Steelblue3 = #4F94CD
         * darkturquoise = #00CED1
         * royalblue2 = #436EEE
         * 
         * csro : cores - Cyan3; Turquesa3; Roxo2; Medium Roxo2; Sky Azul3; Deepskyazul3; Steel azul 2 e 3; Royal Azul2; e Medium slate azul.
         * Cyan3 = #00CDCD
         * Turquesa3 = #00C5CD
         * Roxo2 = #912CEE
         * Medium Roxo2 = #9F79EE
         * Sky Azul3 = #87CEEB
         * Deepskyazul3 = #009ACD
         * Steel azul 2 e 3 = #4682B4
         * Royal Azul2 = #4169E1
         * Medium slate azul = #7B68EE
         * 
         */
        
        echo "<div class='banner-box'>";
        echo "<div class='banner'>";
        echo "  <ul class='bxslider'>";
        
//        echo "      <li class='icone_slider' id='imagemRUVWhite'>";
//        echo "          <div class='imagemRUVCentro'>&nbsp;</div>";
//        echo "      </li>";
        echo "      <li class='icone_slider' id='imagemRUVWhiteBlue'>";
        echo "          <div class='imagemRUVCentro'>&nbsp;</div>";
        echo "      </li>";
        echo "      <li class='icone_slider' id='imagemRUVCDoggerBlue3'>";
        echo "          <div class='imagemRUVCentro'>&nbsp;</div>";
        echo "      </li>";
        echo "      <li class='icone_slider' id='imagemRUVCDeepSkyBlue3'>";
        echo "          <div class='imagemRUVCentro'>&nbsp;</div>";
        echo "      </li>";
        echo "      <li class='icone_slider' id='imagemRUVCorFundo'>";
        echo "          <div class='imagemRUVCentro'>&nbsp;</div>";
        echo "      </li>";
//        echo "      <li class='icone_slider' id='imagemRUVWhiteImagem2'>";
//        echo "          <div class='imagemRUVCentro'>&nbsp;</div>";
//        echo "      </li>";
//        echo "      <li class='icone_slider' id='imagemRUVVerde'>";
//        echo "          <div class='imagemRUVCentro'>&nbsp;</div>";
//        echo "      </li>";
//        echo "      <li class='icone_slider' id='imagemRUVRoxo'>";
//        echo "          <div class='imagemRUVCentro'>&nbsp;</div>";
//        echo "      </li>";
//        echo "      <li class='icone_slider' id='imagemRUVAzul'>";
//        echo "          <div class='imagemRUVCentro'>&nbsp;</div>";
//        echo "      </li>";
        echo "  </ul>";
        echo "</div>";
        echo "</div>";

    }
    
    public function consultaSetenio(){
        echo "<div class='col-xs-6 col-md-6'>";
        echo "  <form method='get' action='consultaSetenio.php'>";
        echo "      <div class='form-group'>";
        echo "          <label>E-mail: </label>";
        echo "          <input type='email' class='form-control' name='email' id='email' placeholder='Email'>";
        echo "      </div>";
        echo "      <div class='form-group'>";
        echo "          <label>Data de nascimento: </label>";
        echo "          <input type='date' name='dataNascimento' id='dataNascimento' class='form-control' onkeyup='javascript: calculaIdade(this.value)' onmouseover='javascript: calculaIdade(this.value')>";
        echo "      </div>";
        echo "      <div class='form-group'>";
        echo "          <label>Idade: </label>";
        echo "          <input type='number' class='form-control' id='idade' name='idade' disabled>";
        echo "      </div>";
        echo "      <div class='checkbox'>";
        echo "          <label>";
        echo "              <input type='checkbox'> Desejo receber informações da Rede Una Viva";
        echo "          </label>";
        echo "      </div>";
        echo "      <div class='form-group'>";
        echo "              <button class='btn btn-default'>Calcular</button>";
        echo "      </div>";
        echo "      <div class='form-group'>";
        echo "          <label>O seu setênio é: </label>";
        echo "          <input type='text' class='form-control' id='setenio' name='setenio' disabled>";
        echo "      </div>";
        echo "  </form>";
        echo "</div>";
    }
    
    public function preparaMenu($pagina){
        switch($pagina){
            case "home":    
                $marcaHome = "class='active'";
                $marcaJR = "";
                $marcaMeditacao = "";
                $marcaMeditacaoCrista = "";
                $marcaRedeSocialClinica = "";
                $marcaRetiro = "";
                $marcaSemanaRuv = "";
                $marcaAgenda = "";
                $marcaCalendario = "";
                $marcaSobreMais = "";
                $marcaYoga = "";
                $marcaRodaSonhos = "";
                $marcaTranscurso = "";
                $marcaGaleria = "";
                $marcaQuemSomos = "";
                $marcaContato = "";
                break;
            case "jornadaReal": 
                $marcaHome = "";
                $marcaJR = "class='active'";
                $marcaMeditacao = "";
                $marcaMeditacaoCrista = "";
                $marcaRedeSocialClinica = "";
                $marcaRetiro = "";
                $marcaSemanaRuv = "";
                $marcaAgenda = "";
                $marcaCalendario = "";
                $marcaSobreMais = "";
                $marcaYoga = "";
                $marcaRodaSonhos = "";
                $marcaTranscurso = "";
                $marcaGaleria = "";
                $marcaQuemSomos = "";
                $marcaContato = "";
                break;
            case "meditacao": 
                $marcaHome = "";
                $marcaJR = "";
                $marcaMeditacao = "class='active'";
                $marcaMeditacaoCrista = "";
                $marcaRedeSocialClinica = "";
                $marcaRetiro = "";
                $marcaSemanaRuv = "";
                $marcaAgenda = "";
                $marcaCalendario = "";
                $marcaSobreMais = "";
                $marcaYoga = "";
                $marcaRodaSonhos = "";
                $marcaTranscurso = "";
                $marcaGaleria = "";
                $marcaQuemSomos = "";
                $marcaContato = "";
                break;
            case "meditacaoCrista": 
                $marcaHome = "";
                $marcaJR = "";
                $marcaMeditacao = "";
                $marcaMeditacaoCrista = "class='active'";
                $marcaRedeSocialClinica = "";
                $marcaRetiro = "";
                $marcaSemanaRuv = "";
                $marcaAgenda = "";
                $marcaCalendario = "";
                $marcaSobreMais = "";
                $marcaYoga = "";
                $marcaRodaSonhos = "";
                $marcaTranscurso = "";
                $marcaGaleria = "";
                $marcaQuemSomos = "";
                $marcaContato = "";
                break;
            case "redeSocialClinica": 
                $marcaHome = "";
                $marcaJR = "";
                $marcaMeditacao = "";
                $marcaMeditacaoCrista = "";
                $marcaRedeSocialClinica = "class='active'";
                $marcaRetiro = "";
                $marcaSemanaRuv = "";
                $marcaAgenda = "";
                $marcaCalendario = "";
                $marcaSobreMais = "";
                $marcaYoga = "";
                $marcaRodaSonhos = "";
                $marcaTranscurso = "";
                $marcaGaleria = "";
                $marcaQuemSomos = "";
                $marcaContato = "";
                break;
            case "retiro": 
                $marcaHome = "";
                $marcaJR = "";
                $marcaMeditacao = "";
                $marcaMeditacaoCrista = "";
                $marcaRedeSocialClinica = "";
                $marcaRetiro = "class='active'";
                $marcaSemanaRuv = "";
                $marcaAgenda = "";
                $marcaCalendario = "";
                $marcaSobreMais = "";
                $marcaYoga = "";
                $marcaRodaSonhos = "";
                $marcaTranscurso = "";
                $marcaGaleria = "";
                $marcaQuemSomos = "";
                $marcaContato = "";
                break;
            case "semanaruv": 
                $marcaHome = "";
                $marcaJR = "";
                $marcaMeditacao = "";
                $marcaMeditacaoCrista = "";
                $marcaRedeSocialClinica = "";
                $marcaRetiro = "";
                $marcaSemanaRuv = "class='active'";
                $marcaAgenda = "";
                $marcaCalendario = "";
                $marcaSobreMais = "";
                $marcaYoga = "";
                $marcaRodaSonhos = "";
                $marcaTranscurso = "";
                $marcaGaleria = "";
                $marcaQuemSomos = "";
                $marcaContato = "";
                break;
            case "agenda": 
                $marcaHome = "";
                $marcaJR = "";
                $marcaMeditacao = "";
                $marcaMeditacaoCrista = "";
                $marcaRedeSocialClinica = "";
                $marcaRetiro = "";
                $marcaSemanaRuv = "";
                $marcaAgenda = "class='active'";
                $marcaCalendario = "";
                $marcaSobreMais = "";
                $marcaYoga = "";
                $marcaRodaSonhos = "";
                $marcaTranscurso = "";
                $marcaGaleria = "";
                $marcaQuemSomos = "";
                $marcaContato = "";
                break;
            case "calendario": 
                $marcaHome = "";
                $marcaJR = "";
                $marcaMeditacao = "";
                $marcaMeditacaoCrista = "";
                $marcaRedeSocialClinica = "";
                $marcaRetiro = "";
                $marcaSemanaRuv = "";
                $marcaAgenda = "";
                $marcaCalendario = "class='active'";
                $marcaSobreMais = "";
                $marcaYoga = "";
                $marcaRodaSonhos = "";
                $marcaTranscurso = "";
                $marcaGaleria = "";
                $marcaQuemSomos = "";
                $marcaContato = "";
                break;
            case "sobremais": 
                $marcaHome = "";
                $marcaJR = "";
                $marcaMeditacao = "";
                $marcaMeditacaoCrista = "";
                $marcaRedeSocialClinica = "";
                $marcaRetiro = "";
                $marcaSemanaRuv = "";
                $marcaAgenda = "";
                $marcaCalendario = "";
                $marcaSobreMais = "class='active'";
                $marcaYoga = "";
                $marcaRodaSonhos = "";
                $marcaTranscurso = "";
                $marcaGaleria = "";
                $marcaQuemSomos = "";
                $marcaContato = "";
                break;
            case "yoga": 
                $marcaHome = "";
                $marcaJR = "";
                $marcaMeditacao = "";
                $marcaMeditacaoCrista = "";
                $marcaRedeSocialClinica = "";
                $marcaRetiro = "";
                $marcaSemanaRuv = "";
                $marcaAgenda = "";
                $marcaCalendario = "";
                $marcaSobreMais = "";
                $marcaYoga = "class='active'";
                $marcaRodaSonhos = "";
                $marcaTranscurso = "";
                $marcaGaleria = "";
                $marcaQuemSomos = "";
                $marcaContato = "";
                break;
            case "rodaSonhos": 
                $marcaHome = "";
                $marcaJR = "";
                $marcaMeditacao = "";
                $marcaMeditacaoCrista = "";
                $marcaRedeSocialClinica = "";
                $marcaRetiro = "";
                $marcaSemanaRuv = "";
                $marcaAgenda = "";
                $marcaCalendario = "";
                $marcaSobreMais = "";
                $marcaYoga = "";
                $marcaRodaSonhos = "class='active'";
                $marcaTranscurso = "";
                $marcaGaleria = "";
                $marcaQuemSomos = "";
                $marcaContato = "";
                break;
            case "transcurso": 
                $marcaHome = "";
                $marcaJR = "";
                $marcaMeditacao = "";
                $marcaMeditacaoCrista = "";
                $marcaRedeSocialClinica = "";
                $marcaRetiro = "";
                $marcaSemanaRuv = "";
                $marcaAgenda = "";
                $marcaCalendario = "";
                $marcaSobreMais = "";
                $marcaYoga = "";
                $marcaRodaSonhos = "";
                $marcaTranscurso = "class='active'";
                $marcaGaleria = "";
                $marcaQuemSomos = "";
                $marcaContato = "";
                break;
            case "galeria": 
                $marcaHome = "";
                $marcaJR = "";
                $marcaMeditacao = "";
                $marcaMeditacaoCrista = "";
                $marcaRedeSocialClinica = "";
                $marcaRetiro = "";
                $marcaSemanaRuv = "";
                $marcaAgenda = "";
                $marcaCalendario = "";
                $marcaSobreMais = "";
                $marcaYoga = "";
                $marcaRodaSonhos = "";
                $marcaTranscurso = "";
                $marcaGaleria = "class='active'";
                $marcaQuemSomos = "";
                $marcaContato = "";
                break;
            case "quemSomos": 
                $marcaHome = "";
                $marcaJR = "";
                $marcaMeditacao = "";
                $marcaMeditacaoCrista = "";
                $marcaRedeSocialClinica = "";
                $marcaRetiro = "";
                $marcaSemanaRuv = "";
                $marcaAgenda = "";
                $marcaCalendario = "";
                $marcaSobreMais = "";
                $marcaYoga = "";
                $marcaRodaSonhos = "";
                $marcaTranscurso = "";
                $marcaGaleria = "";
                $marcaQuemSomos = "class='active'";
                $marcaContato = "";
                break;
            case "contato": 
                $marcaHome = "";
                $marcaJR = "";
                $marcaMeditacao = "";
                $marcaMeditacaoCrista = "";
                $marcaRedeSocialClinica = "";
                $marcaRetiro = "";
                $marcaSemanaRuv = "";
                $marcaAgenda = "";
                $marcaCalendario = "";
                $marcaSobreMais = "";
                $marcaYoga = "";
                $marcaRodaSonhos = "";
                $marcaTranscurso = "";
                $marcaGaleria = "";
                $marcaQuemSomos = "";
                $marcaContato = "class='active'";
                break;
            case "formAdesao" || "downloads" || "arqVerao" || "arqOutono" || "arqInverno" || "arqPrimavera" || "meditCrista" || "consultaSetenio": 
                $marcaHome = "";
                $marcaJR = "";
                $marcaMeditacao = "";
                $marcaMeditacaoCrista = "";
                $marcaRedeSocialClinica = "";
                $marcaRetiro = "";
                $marcaSemanaRuv = "";
                $marcaAgenda = "";
                $marcaCalendario = "";
                $marcaSobreMais = "";
                $marcaYoga = "";
                $marcaRodaSonhos = "";
                $marcaTranscurso = "";
                $marcaGaleria = "";
                $marcaQuemSomos = "";
                $marcaContato = "";
                break;
        }
        $this->telaMenuBaixo($marcaHome, $marcaJR, $marcaMeditacao, $marcaMeditacaoCrista, $marcaRedeSocialClinica, $marcaRetiro, $marcaSemanaRuv, $marcaAgenda, $marcaCalendario, $marcaSobreMais, $marcaYoga, $marcaRodaSonhos, $marcaTranscurso, $marcaGaleria, $marcaQuemSomos, $marcaContato);
    }
    
    public function telaMenuBaixo($marcaHome, $marcaJR, $marcaMeditacao, $marcaMeditacaoCrista, $marcaRedeSocialClinica, $marcaRetiro, $marcaSemanaRuv, $marcaAgenda, $marcaCalendario, $marcaSobreMais, $marcaYoga, $marcaRodaSonhos, $marcaTranscurso, $marcaGaleria, $marcaQuemSomos, $marcaContato){
        
        echo "<div class='container-fluid'>";
        echo "  <div class='navbar-header'>";
        echo "      <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#menuBaixo' aria-expanded='false'>";
        echo "          <span class='sr-only'>Menu</span>";
        echo "          <span class='icon-bar'></span>";
        echo "          <span class='icon-bar'></span>";
        echo "          <span class='icon-bar'></span>";
        echo "      </button>";
        echo "      <a class='navbar-brand' href='contato.php' style='padding: 6px 0px 0px 20px; color: rgba(184, 124, 4, 0.9);'>";
//        echo "          <small>";
//        echo "            <h5>";
        echo "              <span style='font-size: ".TAMANHOMENU.";'>";
        echo                    ENDERECOORGAO;
        echo "              <br><img src='images/telefone.png' width='20' height='20' alt='Telefone' title='Telefone'>" . TELEFONEORGAO;
        echo "              </span>";
//        echo "            </h5>";
//        echo "          </small>";
        echo "      </a>";
        echo "  </div>"; //Fecha o navbar-header
        echo "  <div class='navbar-collapse collapse' id='menuBaixo' style='padding-right: 10px; font-size: ".TAMANHOMENU.";'>";
        echo "      <ul class='nav navbar-nav navbar-right'>";
        echo "          <li id='home' ".$marcaHome.">";
        echo "              <a href='".HOMELINK."' style='color: rgba(184, 124, 4, 0.9);'>";
        echo "                  Home"; //<i class="fa icon-home"></i> Home
        echo "              </a>";
        echo "          </li>";
        echo "          <li class='dropdown'>";
        echo "              <a data-toggle='dropdown' class='dropdown-toggle' style='color: rgba(184, 124, 4, 0.9);'>";
        echo "                  Programação";
        echo "                  <span class='caret'></span>";
        echo "              </a>"; //<i class="fa fa-puzzle-piece"></i> 
        echo "              <ul class='dropdown-menu' role='menu'>";
        echo "          <li ".$marcaJR.">";
        echo "              <a tabindex='0' href='".JORNADAREALLINK."' target='_self' style='color: rgba(184, 124, 4, 0.9);'>";
        echo "                  Jornada Real";
        echo "              </a>";
        echo "          </li>";
        echo "          <li ".$marcaMeditacao.">";
        echo "              <a tabindex='0' href='".MEDITACAOLINK."' style='color: rgba(184, 124, 4, 0.9);'>";
        echo "                  Jornada de Meditação";
        echo "              </a>";
        echo "          </li>";
        echo "          <li ".$marcaMeditacaoCrista.">";
        echo "              <a tabindex='0' href='".MEDITCRISTALINK."' style='color: rgba(184, 124, 4, 0.9);'>";
        echo "                  Meditação Cristã";
        echo "              </a>";
        echo "          </li>";
        echo "          <li ".$marcaRedeSocialClinica.">";
        echo "              <a tabindex='0' href='".REDESOCIALCLINICA."' style='color: rgba(184, 124, 4, 0.9);'>";
        echo "                  Rede Social Clínica";
        echo "              </a>";
        echo "          </li>";
        echo "          <li ".$marcaRetiro.">";
        echo "              <a tabindex='0' href='".RETIROLINK."' style='color: rgba(184, 124, 4, 0.9);'>";
        echo "                  Retiro";
        echo "              </a>";
        echo "          </li>";
        echo "      </ul>";
//        echo "  </li>";
        echo "  <li class='dropdown'>";
        echo "      <a tabindex='0' data-toggle='dropdown' style='color: rgba(184, 124, 4, 0.9);'>";
        echo "          Tempo";
        echo "          <span class='caret'></span>";
        echo "      </a>"; //<i class="fa fa-clock-o"></i> 
        echo "      <ul class='dropdown-menu' role='menu'>";
        echo "          <li ".$marcaSemanaRuv.">";
        echo "              <a tabindex='0' href='".SEMANARUV."' target='_self' style='color: rgba(184, 124, 4, 0.9);'>";
        echo "                  Semana RUV";
        echo "              </a>"; // <i class="fa fa-dashboard"></i> 
        echo "          </li>";
        echo "          <li ".$marcaAgenda.">";
        echo "              <a tabindex='0' href='".AGENDALINK."' target='_self' style='color: rgba(184, 124, 4, 0.9);'>";
        echo "                  Agenda";
        echo "              </a>"; // <i class="fa fa-dashboard"></i> 
        echo "          </li>";
        echo "          <li ".$marcaCalendario.">";
        echo "              <a tabindex='0' href='".CALENDARIOLINK."' target='_self' style='color: rgba(184, 124, 4, 0.9);'>";
        echo "                  Calendário";
        echo "              </a>"; // <i class="fa fa-calendar"></i> 
        echo "          </li>";
        echo "      </ul>";
        echo "  </li>";
        echo "  <li class='dropdown'>";
        echo "      <a tabindex='0' data-toggle='dropdown' style='color: rgba(184, 124, 4, 0.9);'>";
        echo "          ".MENU4."<span class='caret'></span>";
        echo "      </a>"; // <i class="fa fa-ticket"></i> 
        echo "          <ul class='dropdown-menu' role='menu'>";
        echo "              <li ".$marcaSobreMais.">";
        echo "                  <a tabindex='0' href='".SOBREMAIS."' style='color: rgba(184, 124, 4, 0.9);'>";
        echo "                      Sobre MAIS...";
        echo "                  </a>";
        echo "              </li>";
        echo "              <li ".$marcaYoga.">";
        echo "                  <a tabindex='0' href='".YOGALINK."' style='color: rgba(184, 124, 4, 0.9);'>";
        echo "                      Yoga";
        echo "                  </a>";
        echo "              </li>";
        echo "              <li ".$marcaRodaSonhos.">";
        echo "                  <a tabindex='0' href='".RODASONHOSLINK."' style='color: rgba(184, 124, 4, 0.9);'>";
        echo "                      Roda dos Sonhos";
        echo "                  </a>";
        echo "              </li>";
        echo "              <li ".$marcaTranscurso.">";
        echo "                  <a tabindex='0' href='".TRANSPESSOALLINK."' style='color: rgba(184, 124, 4, 0.9);'>";
        echo "                      Transcurso Transpessoal";
        echo "                  </a>";
        echo "              </li>";
        echo "          </ul>";
        echo "  </li>";
        echo "  <li id='galeria' ".$marcaGaleria.">";
        echo "      <a href='".GALERIALINK."' style='color: rgba(184, 124, 4, 0.9);'>";
        echo "          Galeria"; // <i class="fa fa-ticket"></i> 
        echo "      </a>";
        echo "  </li>";
        echo "  <li id='quemsomos' ".$marcaQuemSomos.">";
        echo "      <a href='".QUEMSOMOSLINK."' target='_self' style='color: rgba(184, 124, 4, 0.9);'>";
        echo "          Quem Somos"; // <i class="fa fa-book"></i> 
        echo "      </a>";
        echo "  </li>";
        echo "  <li id='contato' ".$marcaContato.">";
        echo "      <a href='".CONTATOLINK."' target='_self' style='color: rgba(184, 124, 4, 0.9);'>";
        echo "          Contato"; // <i class="fa fa-envelope-o"></i> 
        echo "      </a>";
        echo "  </li>";
        echo "  <li id='blog'>";
        echo "      <a href='".BLOGLINK."' style='color: rgba(184, 124, 4, 0.9);'>";
        echo "          Blog"; // <i class="fa fa-link"></i> 
        echo "      </a>";
        echo "  </li>";
        echo "  <li id=''>";
        echo "      <a href='#'>";
        echo "          &nbsp"; // <i class="fa fa-link"></i> 
        echo "      </a>";
        echo "  </li>";
        echo "</ul>";
        echo "</div><!-- navbar-collapse -->";
        echo "</div> <!-- container-fluid -->";

        
    }
    
}
