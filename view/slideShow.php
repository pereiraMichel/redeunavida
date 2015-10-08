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
//        echo "  <li>";
//        echo "          <a href='index.php'>";
//        echo "              <img src='jr/jrLogomarca.png' title='".TITULOJRBAIXO."' width='130' height='100' class='img-responsive'>";
//        echo "          </a>";
//        echo "  </li>";
//        echo "<div style='height: 30px;'></div>";
	echo "  <li>";
        echo "      <a  href='#enviarAdesao' role='button' data-toggle='modal' style='text-decoration: none;' class='text-link'>";
        echo "          <button class='btn btn-primary btn-responsive'>";
        echo "              <i class='fa fa-user'></i> Cadastre-se";
        echo "          </button>";
        echo "      </a>";
        echo "  </li>";
        echo "<div style='height: 30px;'></div>";

        echo "  <li>";
        echo "      <a href='sistema/' class='text-link'>";
        echo "          <button class='btn btn-warning btn-responsive'>";
        echo "              <i class='fa fa-th'></i> Acesso Sistema";
        echo "          </button>";
        echo "      </a>";
//	echo "  <br class='visible-xs'>";
        echo "</li>";
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
        echo "  <div class='col-sm-12' style='height: 25px;'>";
        echo "      <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>";
        echo "          <span class='sr-only'>Menu</span>";
        echo "          <span class='icon-bar'></span>";
        echo "          <span class='icon-bar'></span>";
        echo "          <span class='icon-bar'></span>";
        echo "      </button>";
        echo "          <div class='hidden-sm' style='padding: 15px 50px 0px 0px;'>";
        echo "              <span><a href='index.php' style='text-decoration: none;'>REDE UNA VIVA</a> </span>POR UMA CULTURA DE PAZ";
        echo "          </div>";
        echo "          <div class='navbar-subtext-top hidden-sm'>";
        echo "              <!--<span>RUV</span>-->";
        echo "          </div><!-- /hidden-sm -->";
        echo "          <div class='navbar-subtextsm-top visible-sm'>";
        echo "              REDE UNA VIVA";
        echo "          </div><!-- /visible-sm -->";
        echo "  </div>";
        echo "</div>";        
    }
    
    public function telaNovaSlide(){
        echo "<div class='featured'>";
        echo "<ul class='bxslider' style='width: 100%;'>";
        echo "  <li>";
        echo "      <img src='view/dummy-images/foto1TextoNovo.png' title='Nova comunidade conspirada em silêncio' />";
        echo "  </li>";
        echo "  <li>";
        echo "      <img src='view/dummy-images/foto2TextoNovo.png' title='Um caminho espiritual de prática individual diária e encontros semanais em grupo afim' />";
        echo "  </li>";
        echo "  <li>";
        echo "      <img src='view/dummy-images/foto3TextoNovo.png' title='Grupos semanais prática e partilha' />";
        echo "  </li>";
        echo "  <li>";
        echo "      <img src='view/dummy-images/foto4TextoNovo.png' title='Lugar aprazível com natureza pródiga alimentação saudável durante 7 dias' />";
        echo "  </li>";
        echo "</ul>";
        echo "</div>";

    }
    
}
