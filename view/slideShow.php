<?php

class slideShow {

//TELAS
    // telaLogoMarcas()
    // telaSlideShow()
    // telaTitulo()
    // telaNovaSlide()
    // telaMenuBaixo
    
    public function telaLogoMarcas(){
        echo "<ul class='list-inline' style='padding-left: 30px; text-align: center;'>";
        echo "  <li>";
        echo "      <div class='img-responsive' style='padding-left: 10px;'>";
        echo "          <a href='index.php'>";
        echo "              <img src='images/logoRedeUnaVida.png' title='".TITULORUVBAIXO."' width='230' height='200' class='img-responsive'>";
        echo "          </a>";
        echo "      </div>";
        echo "  </li>";
        echo "<div style='height: 30px;'></div>";
//        echo "  <li>";
//        $this->calendario("<small>Saiba mais em <a href='calendario.php' target='_self'>CALENDÁRIO</a></small>");
        
//        echo "          <a href='consultasetenio.php' style='text-decoration: none;'>";
//        echo "              <img src='images/setenio1.jpg' title='".SABERSETENIO."' class='img-responsive'>";
//        echo "              <label class='label label-warning'>Saiba o seu setênio</label>";
//        echo "          </a>";
        
        //echo "  </li>";
        
        
//        echo "  <li>";
//        echo "          <a href='index.php'>";
//        echo "              <img src='jr/jrLogomarca.png' title='".TITULOJRBAIXO."' width='130' height='100' class='img-responsive'>";
//        echo "          </a>";
//        echo "  </li>";
//        echo "<div style='height: 30px;'></div>";
//	echo "  <li>";
//        echo "      <a  href='#enviarAdesao' role='button' data-toggle='modal' style='text-decoration: none;' class='text-link'>";
//        echo "          <button class='btn btn-primary btn-responsive'>";
//        echo "              <i class='fa fa-user'></i> Cadastre-se";
//        echo "          </button>";
//        echo "      </a>";
//        echo "  </li>";
//        echo "<div style='height: 30px;'></div>";
//
//        echo "  <li>";
//        echo "      <a href='sistema/' class='text-link'>";
//        echo "          <button class='btn btn-warning btn-responsive'>";
//        echo "              <i class='fa fa-th'></i> Acesso Sistema";
//        echo "          </button>";
//        echo "      </a>";
////	echo "  <br class='visible-xs'>";
//        echo "</li>";
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
//        echo "              <tr class='warning'>";
//        echo "                  <td>";
//        echo "                      &nbsp;";
//        echo "                  </td>";
//        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
//        echo "                      &nbsp;";
//        echo "                  </td>";
//        echo "                  <td colspan='3'>";
//        echo "                      &nbsp;";
//        echo "                  </td>";
//        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
//        echo "                      &nbsp;";
//        echo "                  </td>";
//        echo "                  <td>";
//        echo "                      &nbsp;";
//        echo "                  </td>";
//        echo "              </tr>";
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
//        echo "                  <td>";
//        echo "                      &nbsp;";
//        echo "                  </td>";
//        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
//        echo "                      &nbsp;";
//        echo "                  </td>";
        echo "                  <td colspan='7'>";
        echo "                      <div id='dataJava'>&nbsp;</div>";///date('d/m/Y');
        echo "                  </td>";
//        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
//        echo "                      &nbsp;";
//        echo "                  </td>";
//        echo "                  <td>";
//        echo "                      &nbsp;";
//        echo "                  </td>";
        echo "              </tr>";
        //Oitava linha
        echo "              <tr class='warning'>";
//        echo "                  <td>";
//        echo "                      &nbsp;";
//        echo "                  </td>";
//        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
//        echo "                      &nbsp;";
//        echo "                  </td>";
        echo "                  <td colspan='7'>";
        echo                        $mensagem;
        echo "                  </td>";
//        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
//        echo "                      &nbsp;";
//        echo "                  </td>";
//        echo "                  <td>";
//        echo "                      &nbsp;";
//        echo "                  </td>";
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
//        echo "      <div class='navbar-header'>";
        echo "          <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#menu' aria-expanded='false'>";
        echo "              <span class='sr-only'>Menu</span>";
        echo "              <span class='icon-bar'></span>";
        echo "              <span class='icon-bar'></span>";
        echo "              <span class='icon-bar'></span>";
        echo "          </button>";
        echo "          <div class='navbar-subtext-top' style='padding-top: 5px; padding-left: 15px;'>";//padding-top: 15px; 
        echo "                  <span><a href='index.php' style='text-decoration: none; color: #3F6CA1'>REDE UNA VIVA</a> </span><a style='font-family: Angelface, Cursive; font-size: 28px; text-decoration: none; color: #F2C700'>Por uma cultura de paz</a>";
        echo "          </div>";
        echo "  </div>";
        echo "</div>";
        echo "<div class='collapse navbar-collapse' id='menu'>";
        echo "  <ul class='nav navbar-nav navbar-right' style='padding-right: 25px;'>";
        echo "      <li>";
	echo "          <a href='sistema/' class='text-link'>";
        echo "              <button class='btn btn-warning btn-sm btn-responsive'>";
        echo "                  <i class='fa fa-th'></i> Acesso ao Sistema";
        echo "              </button>";
        echo "          </a>";
        echo "      </li>";
        echo "      <li>";
        echo "          <a href='formAdesao.php' role='button' style='text-decoration: none;' class='text-link'>";
//        echo "          <a href='#enviarAdesao' role='button' data-toggle='modal' style='text-decoration: none;' class='text-link'>";
        echo "              <button class='btn btn-primary btn-sm btn-responsive'>";
        echo "                  <i class='fa fa-user'></i> Cadastre-se";
        echo "              </button>";
        echo "          </a>";
        echo "      </li>";
        echo "  </ul>";
        echo "</div>";
    }
    
    public function telaNovaSlide(){
        echo "<div class='featured'>";
        echo "  <ul class='bxslider' style='width: 100%;'>";
        // data-options='slideMargin:0, slides:4' data-breaks='[{screen:460, slides:2, pager:false},{screen:768, slides:3, pager:true},{screen:768, slides:3, pager:true}']
        echo "      <li>";
        echo "          <img src='view/dummy-images/foto1TextoNovo.png' title='Nova comunidade conspirada em silêncio' class='img-responsive' />";
        echo "      </li>";
        echo "      <li>";
        echo "          <img src='view/dummy-images/foto2TextoNovo.png' title='Um caminho espiritual de prática individual diária e encontros semanais em grupo afim' class='img-responsive' />";
        echo "      </li>";
        echo "      <li>";
        echo "          <img src='view/dummy-images/foto3TextoNovo.png' title='Grupos semanais prática e partilha' class='img-responsive' />";
        echo "      </li>";
        echo "      <li>";
        echo "          <img src='view/dummy-images/foto4TextoNovo.png' title='Lugar aprazível com natureza pródiga alimentação saudável durante 7 dias' class='img-responsive' />";
        echo "      </li>";
        echo "  </ul>";
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
                $marcaRetiro = "";
                $marcaAgenda = "";
                $marcaCalendario = "";
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
                $marcaRetiro = "";
                $marcaAgenda = "";
                $marcaCalendario = "";
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
                $marcaRetiro = "";
                $marcaAgenda = "";
                $marcaCalendario = "";
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
                $marcaRetiro = "";
                $marcaAgenda = "";
                $marcaCalendario = "";
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
                $marcaRetiro = "class='active'";
                $marcaAgenda = "";
                $marcaCalendario = "";
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
                $marcaRetiro = "";
                $marcaAgenda = "class='active'";
                $marcaCalendario = "";
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
                $marcaRetiro = "";
                $marcaAgenda = "";
                $marcaCalendario = "class='active'";
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
                $marcaRetiro = "";
                $marcaAgenda = "";
                $marcaCalendario = "";
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
                $marcaRetiro = "";
                $marcaAgenda = "";
                $marcaCalendario = "";
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
                $marcaRetiro = "";
                $marcaAgenda = "";
                $marcaCalendario = "";
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
                $marcaRetiro = "";
                $marcaAgenda = "";
                $marcaCalendario = "";
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
                $marcaRetiro = "";
                $marcaAgenda = "";
                $marcaCalendario = "";
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
                $marcaRetiro = "";
                $marcaAgenda = "";
                $marcaCalendario = "";
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
                $marcaRetiro = "";
                $marcaAgenda = "";
                $marcaCalendario = "";
                $marcaYoga = "";
                $marcaRodaSonhos = "";
                $marcaTranscurso = "";
                $marcaGaleria = "";
                $marcaQuemSomos = "";
                $marcaContato = "";
                break;
        }
        $this->telaMenuBaixo($marcaHome, $marcaJR, $marcaMeditacao, $marcaMeditacaoCrista, $marcaRetiro, $marcaAgenda, $marcaCalendario, $marcaYoga, $marcaRodaSonhos, $marcaTranscurso, $marcaGaleria, $marcaQuemSomos, $marcaContato);
    }
    
    public function telaMenuBaixo($marcaHome, $marcaJR, $marcaMeditacao, $marcaMeditacaoCrista, $marcaRetiro, $marcaAgenda, $marcaCalendario, $marcaYoga, $marcaRodaSonhos, $marcaTranscurso, $marcaGaleria, $marcaQuemSomos, $marcaContato){
        
        echo "<div class='container-fluid'>";
        echo "  <div class='navbar-header'>";
        echo "      <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#menuBaixo' aria-expanded='false'>";
        echo "          <span class='sr-only'>Menu</span>";
        echo "          <span class='icon-bar'></span>";
        echo "          <span class='icon-bar'></span>";
        echo "          <span class='icon-bar'></span>";
        echo "      </button>";
        echo "      <a class='navbar-brand' href='contato.php' style='padding: 0px 0px 0px 10px;'>";
        echo "          <small>";
        echo "              <h5>";
        echo                    ENDERECOORGAO;
        echo "              <br>" . TELEFONEORGAO;
        echo "              </h5>";
        echo "          </small>";
        echo "      </a>";
        echo "  </div>"; //Fecha o navbar-header
        echo "  <div class='navbar-collapse collapse' id='menuBaixo' style='padding-right: 10px;'>";
        echo "      <ul class='nav navbar-nav navbar-right'>";
        echo "          <li id='home' ".$marcaHome.">";
        echo "              <a href='".HOMELINK."'>";
        echo "                  Home"; //<i class="fa icon-home"></i> Home
        echo "              </a>";
        echo "          </li>";
        echo "          <li class='dropdown'>";
        echo "              <a data-toggle='dropdown' class='dropdown-toggle'>";
        echo "                  Programação";
        echo "                  <span class='caret'></span>";
        echo "              </a>"; //<i class="fa fa-puzzle-piece"></i> 
        echo "              <ul class='dropdown-menu' role='menu'>";
        echo "          <li ".$marcaJR.">";
        echo "              <a tabindex='0' href='".JORNADAREALLINK."' target='_self'>";
        echo "                  Jornada Real";
        echo "              </a>";
        echo "          </li>";
        echo "          <li ".$marcaMeditacao.">";
        echo "              <a tabindex='0' href='".MEDITACAOLINK."'>";
        echo "                  Meditação";
        echo "              </a>";
        echo "          </li>";
        echo "          <li ".$marcaMeditacaoCrista.">";
        echo "              <a tabindex='0' href='".MEDITCRISTALINK."'>";
        echo "                  Meditação Cristã";
        echo "              </a>";
        echo "          </li>";
        echo "          <li ".$marcaRetiro.">";
        echo "              <a tabindex='0' href='".RETIROLINK."'>";
        echo "                  Retiro";
        echo "              </a>";
        echo "          </li>";
        echo "      </ul>";
//        echo "  </li>";
        echo "  <li class='dropdown'>";
        echo "      <a tabindex='0' data-toggle='dropdown'>";
        echo "          Tempo";
        echo "          <span class='caret'></span>";
        echo "      </a>"; //<i class="fa fa-clock-o"></i> 
        echo "      <ul class='dropdown-menu' role='menu'>";
        echo "          <li ".$marcaAgenda.">";
        echo "              <a tabindex='0' href='".AGENDALINK."' target='_self'>";
        echo "                  Agenda";
        echo "              </a>"; // <i class="fa fa-dashboard"></i> 
        echo "          </li>";
        echo "          <li ".$marcaCalendario.">";
        echo "              <a tabindex='0' href='".CALENDARIOLINK."' target='_self'>";
        echo "                  Calendário";
        echo "              </a>"; // <i class="fa fa-calendar"></i> 
        echo "          </li>";
        echo "      </ul>";
        echo "  </li>";
        echo "  <li class='dropdown'>";
        echo "      <a tabindex='0' data-toggle='dropdown'>";
        echo "          ".MENU4."<span class='caret'></span>";
        echo "      </a>"; // <i class="fa fa-ticket"></i> 
        echo "          <ul class='dropdown-menu' role='menu'>";
        echo "              <li ".$marcaYoga.">";
        echo "                  <a tabindex='0' href='".YOGALINK."'>";
        echo "                      Yoga";
        echo "                  </a>";
        echo "              </li>";
        echo "              <li ".$marcaRodaSonhos.">";
        echo "                  <a tabindex='0' href='".RODASONHOSLINK."'>";
        echo "                      Roda dos Sonhos";
        echo "                  </a>";
        echo "              </li>";
        echo "              <li ".$marcaTranscurso.">";
        echo "                  <a tabindex='0' href='".TRANSPESSOALLINK."'>";
        echo "                      Transcurso Transpessoal";
        echo "                  </a>";
        echo "              </li>";
        echo "          </ul>";
        echo "  </li>";
        echo "  <li id='galeria' ".$marcaGaleria.">";
        echo "      <a href='".GALERIALINK."'>";
        echo "          Galeria"; // <i class="fa fa-ticket"></i> 
        echo "      </a>";
        echo "  </li>";
        echo "  <li id='quemsomos' ".$marcaQuemSomos.">";
        echo "      <a href='".QUEMSOMOSLINK."' target='_self'>";
        echo "          Quem Somos"; // <i class="fa fa-book"></i> 
        echo "      </a>";
        echo "  </li>";
        echo "  <li id='contato' ".$marcaContato.">";
        echo "      <a href='".CONTATOLINK."'>";
        echo "          Contato"; // <i class="fa fa-envelope-o"></i> 
        echo "      </a>";
        echo "  </li>";
        echo "  <li id='blog'>";
        echo "      <a href='".BLOGLINK."'>";
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
