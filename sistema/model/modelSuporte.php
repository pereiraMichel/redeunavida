<?php
/*
 * Esse modelo será responsável pelo canal de comunicação para o desenvolvedor.
 * 
 * 
 */

class modelSuporte {

    public function telaContato(){
        echo "<div class='col-xs-3 col-md-3 col-sm-3'>&nbsp;</div>";
        echo "<div class='col-xs-8 col-md-8 col-sm-8'>";
        echo "<form class='form-horizontal' method='post' action='inicio.php?menu=suporte'>";
        echo "  <div class='form-group'>";
        echo "      <label class='col-md-3 control-label'>";
        echo "          Seu nome:";
        echo "      </label>";
        echo "      <div class='col-md-9'>";
        echo "          <input class='form-control col-xs-3' type='text' value='".$_SESSION['usuario']."' name='nomeusuario' id='nomeusuario'>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='form-group'>";
        echo "      <label class='col-md-3 control-label'>";
        echo "          Sua mensagem:";
        echo "      </label>";
        echo "      <div class='col-md-9'>";
        echo "          <textarea class='form-control' rows='5'></textarea>";
        echo "      </div>";
        echo "  </div>";
        echo "  <input type='hidden' value='".$_SESSION['idusuario']."' name='idusuario' id='idusuario'>";
        echo "  <input type='hidden' value='".$_SESSION['usuario']."' name='nomeusuario' id='nomeusuario'>";
        echo "</form>'";
        echo "</div>";
        echo "<div class='col-xs-3 col-md-3 col-sm-3'>&nbsp;</div>";
    }
    
    
    
    
    
}
