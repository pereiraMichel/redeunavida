<?php

class slideShow {

//TELAS
    // telaLogoMarcas()
    // telaSlideShow()
    // telaTitulo()
    // telaNovaSlide()
    
    public function telaLogoMarcas(){
        echo "<ul class='list-inline' style='padding-left: 30px; text-align: center;'>";
        echo "  <li>";
        echo "          <a href='index.php'>";
        echo "              <img src='images/logoRedeUnaVida.png' title='".TITULORUVBAIXO."' width='230' height='200' class='img-responsive'>";
        echo "          </a>";
        echo "  </li>";
        echo "<div style='height: 30px;'></div>";
        echo "  <li>";
        echo "          <a href='consultasetenio.php' style='text-decoration: none;'>";
        echo "              <img src='images/setenio1.jpg' title='".SABERSETENIO."' class='img-responsive'>";
        echo "              <label class='label label-warning'>Saiba o seu setênio</label>";
        echo "          </a>";
        echo "  </li>";
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
        echo "          <div class='navbar-subtext-top' style='padding-top: 15px; padding-left: 15px;'>";
//        echo "          <a class='navbar-brand' href='#'>";
        echo "                  <span><a href='index.php' style='text-decoration: none;'>REDE UNA VIVA</a> </span><i>POR UMA CULTURA DE PAZ</i>";
//        echo "          </a>";
        echo "          </div>";
//        echo "      </div>";
        echo "  </div>";
        echo "</div>";
        echo "<div class='collapse navbar-collapse' id='menu'>";
        echo "  <ul class='nav navbar-nav navbar-right' style='padding-right: 25px;'>";
//        echo "      <li>";
//	echo "          <a href='".LINKHOME."' class='text-link'>";//colocar o link completo
//        echo "              <img src='images/logoRedeUnaVida.png' title='Rede Una Viva' class='img-responsive' width='60' height='40'>";
//        echo "          </a>";
//        echo "      </li>";
        echo "      <li>";
	echo "          <a href='sistema/' class='text-link'>";
        echo "              <button class='btn btn-warning btn-sm btn-responsive'>";
        echo "                  <i class='fa fa-th'></i> Acesso ao Sistema";
        echo "              </button>";
        echo "          </a>";
        echo "      </li>";
        echo "      <li>";
        echo "          <a  href='#enviarAdesao' role='button' data-toggle='modal' style='text-decoration: none;' class='text-link'>";
        echo "              <button class='btn btn-primary btn-sm btn-responsive'>";
        echo "                  <i class='fa fa-user'></i> Cadastre-se";
        echo "              </button>";
        echo "          </a>";
        echo "      </li>";
        echo "  </ul>";
        echo "</div>";
//        echo "  <div class='col-xs-5 col-sm-7' style='height: 25px;'>";
//        echo "      <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>";
//        echo "          <span class='sr-only'>Menu</span>";
//        echo "          <span class='icon-bar'></span>";
//        echo "          <span class='icon-bar'></span>";
//        echo "          <span class='icon-bar'></span>";
//        echo "      </button>";
//        echo "          <div class='hidden-sm' style='padding: 15px 50px 0px 0px;'>";
//        echo "              <span><a href='index.php' style='text-decoration: none;'>REDE UNA VIVA</a> </span><i>POR UMA CULTURA DE PAZ</i>";
//        echo "          </div>";
//        echo "          <div class='navbar-subtext-top hidden-sm'>";
//        echo "              <!--<span>RUV</span>-->";
//        echo "          </div><!-- /hidden-sm -->";
//        echo "          <div class='navbar-subtextsm-top visible-sm'>";
//        echo "              REDE UNA VIVA";
//        echo "          </div><!-- /visible-sm -->";
//        echo "  </div>";
//	echo "  <div class='col-xs-7 col-sm-5'>";
//	echo "      <div class='navbar-text navbar-right'>";
//        echo "      <form class='form-inline'>";
//        echo "          <div class='form-group'>";
//	echo "          <a href='sistema/' class='text-link'>";
//        echo "              <img src='images/logoRedeUnaVida.png' title='Rede Una Viva' class='img-responsive' width='100' height='80'>";
//        echo "          </a>";
//        echo "          </div>";
//        echo "          <div class='form-group'>";
//	echo "          <a href='sistema/' class='text-link'>";
//        echo "              <button class='btn btn-warning'>";
//        echo "                  <i class='fa fa-th'></i> Acesso ao Sistema";
//        echo "              </button>";
//        echo "          </a>";
//        echo "          </div>";
//        echo "          <div class='form-group'>";
//        echo "          <a  href='#enviarAdesao' role='button' data-toggle='modal' style='text-decoration: none;' class='text-link'>";
//        echo "              <button class='btn btn-primary btn-responsive'>";
//        echo "                  <i class='fa fa-user'></i> Cadastre-se";
//        echo "              </button>";
//        echo "          </a>";
//        echo "          </div>";
//        echo "      </form>";
//	echo "      </div>";
//	echo "      <br class='visible-xs'>";
//	echo "  </div><!-- /col-sm-4 -->";
//        echo "</div>";        
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
    
}
