<?php
//require_once '../controller/constantes.php';

class formulario {
    
    public function mensagemContato() {
        echo "<div class='tab-pane active' id='tab1'>";
        echo "<input type='hidden' name='dataInclusao' id='dataInclusao' value='" . date('Y/m/d') . "' size='10' readonly='readonly' />";

        echo "<div class='control-group'>";
        echo "   <label class='control-label'>" . NOME . "</label>";
        echo "   <div class='controls'>";
        echo "      <input type='text' name='nome' id='nome'  placeholder='Nome' class='form-control' />";
        echo "   </div>";
        echo "</div>";

        echo "<div class='control-group'>";
        echo "   <label class='control-label'>" . EMAIL . "</label>";
        echo "   <div class='controls'>";
        echo "      <input type='text' name='email' id='email'  placeholder='E-mail' class='form-control' />";
        echo "   </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='control-label'>" . TELEFONE . "</label>";
        echo "   <div class='controls'>";
        echo "      <input type='text' name='telefone' id='telefone' placeholder='Telefone' class='form-control' />";
        echo "   </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='control-label'>" . MENSAGEM . "</label>";
        echo "   <div class='controls'>";
        echo "      <textarea name='mensagem' id='mensagem' rows = '5' cols='50' class='form-control'></textarea>";
        echo "   </div>";
        echo "</div>";

        echo "</div>";
        
    }

}
