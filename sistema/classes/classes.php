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
        echo "                  <i class='fa fa-user'></i> Cadastre-se";
        echo "              </button>";
        echo "          </a>";
        echo "      </li>";
        echo "  </ul>";
        echo "</div>";
    }
    
    public function telaLogin(){
       echo "<p style='height: 80px;>&nbsp;</p>'";
       echo "<div class='form-group'>";
       echo "   <form class='form-signin' name='formlogin' action='index.php' enctype='multipart/form-data' method='post' style='border-radius: 10px;'>";
       echo "       <h4 style='text-align: center;'>Acesso ao Sistema</h4>";
       echo "           <input type='text' class='form-control' placeholder='Login' id='login' name='login' required/>";
       echo "           <input type='password' class='form-control' placeholder='Senha' id='senha' name='senha' required/>";
       echo "       <a href='#' class='label label-primary'>Esqueci minha senha</a><br/>";
       echo "       <p style='height: 30px'></p>";
       echo "           <div class='text-center'>";
       echo "               <input type='submit' value='Entrar' class='btn btn-default' />";
       echo "           </div>";
       echo "   </form>";
       echo "</div>";
    }
    
    
    
    
}
