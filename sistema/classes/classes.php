<?php


class classes {

    public function telaSuperior(){
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
//        echo "                  <span><a href='index.php' style='text-decoration: none; color: #3F6CA1'>RedeUnaViva</a> </span><a style='font-family: Angelface, Cursive; font-size: 28px; text-decoration: none; color: #F2C700'>Por uma cultura de paz</a>";
        echo "              <img src='../images/logoRUV350x250.png' title='RedeUnaViva' width='70' height='50'>";
        echo "          </div>";
        echo "  </div>";
        echo "</div>";
        echo "<div class='collapse navbar-collapse' id='menu'>";
        echo "  <ul class='nav navbar-nav navbar-right' style='padding-right: 25px;'>";
        echo "      <li>";
        echo "          <a href='formAdesao.php' role='button' style='text-decoration: none;' class='text-link'>";
        echo "              <button class='btn btn-primary btn-sm btn-responsive'>";
        echo "                  Cadastre-se";//<i class='fa fa-user'></i> 
        echo "              </button>";
        echo "          </a>";
        echo "      </li>";
        echo "  </ul>";
        echo "</div>";
    }
    
    public function telaLogin(){
        echo "<form id='contact-form' name='contact-form' method='post' action='#'>";
        echo "  <div class='row wow fadeInUp' data-wow-duration='1000ms' data-wow-delay='300ms'>";
        echo "      <div class='col-sm-6' style='color: #fff'>";
        echo "          <div class='form-group'>";
        echo "              <input type='text' name='login' class='form-control' placeholder='Login' required='required' style='color: #fff'>";
        echo "          </div>";
        echo "      </div>";
        echo "      <div class='col-sm-6' style='color: #fff'>";
        echo "          <div class='form-group'>";
        echo "              <input type='password' name='senha' class='form-control' placeholder='senha' required='required' style='color: #fff'>";
        echo "          </div>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='form-group'>";
        echo "      <button type='submit' class='btn-submit'>Acessar</button>";
        echo "  </div>";
        echo "</form>";

    }
    
    
    
    
}
