<?php
//require_once '../controller/constantes.php';

class formulario {
    
    public function mensagemContato() {
        echo "<form name='form_contato' action='contato.php' method='post'>";
        echo "  <button type='button' class='close' aria-label='Close' data-toggle='collapse' href='#collapseExample' aria-expanded='false' aria-controls='collapseExample'>";
        echo "      &times;";
        echo "  </button>";
        echo "  <div class='page-header'>";
        echo "      <img src='images/logoRUV50x51.png'/> RedeUnaViva - <small style='color: #3F6CA1;'>Enviar mensagem</small>";
        echo "  </div>";
//        echo "  <div class='tab-pane active' id='tab1'>";
        echo "      <input type='hidden' name='dataInclusao' id='dataInclusao' value='" . date('Y/m/d') . "' size='10' readonly='readonly' />";
        echo "      <div class='col-sm-6'>";
        echo "          <div class='control-group'>";
        echo "              <label class='control-label'>" . NOME . "</label>";
        echo "              <div class='controls'>";
        echo "                  <input type='text' name='nome' id='nome'  placeholder='Nome' class='form-control' />";
        echo "              </div>";
        echo "          </div>";
        echo "          <br>";
        echo "          <div class='control-group'>";
        echo "              <label class='control-label'>" . EMAIL . "</label>";
        echo "              <div class='controls'>";
        echo "                  <input type='text' name='email' id='email'  placeholder='E-mail' class='form-control' />";
        echo "              </div>";
        echo "          </div>";
        echo "          <br>";

        echo "          <div class='form-group'>";
        echo "              <label class='control-label'>" . TELEFONE . "</label>";
        echo "              <div class='controls'>";
        echo "                  <input type='text' name='telefone' id='telefone' placeholder='Telefone' class='form-control' />";
        echo "              </div>";
        echo "          </div>";
        echo "      </div>";
        echo "      <div class='col-sm-6'>";
        echo "          <div class='form-group'>";
        echo "              <label class='control-label'>" . DEPARTAMENTO . "</label>";
        echo "              <div class='controls'>";
        echo "                  <select name='departamento' id='departamento' name='departamento' class='form-control'>";
        echo "                      <option name='atendimento'>Atendimento</option>";
        echo "                      <option name='yoga'>Yoga Iyengar</option>";
        echo "                      <option name='jornadareal'>Jornada Real</option>";
        echo "                  </select>";
        echo "               </div>";
        echo "           </div>";
        echo "           <div class='form-group'>";
        echo "              <label class='control-label'>" . MENSAGEM . "</label>";
        echo "              <div class='controls'>";
        echo "                  <textarea name='mensagem' id='mensagem' rows = '5' cols='50' class='form-control'></textarea>";
        echo "              </div>";
        echo "           </div>";
        echo "      </div>";//fecha o col-sm-6 (segunda parte)
        echo "      <div class='modal-footer' style='padding-right: 50px; border: 0;'>";
        echo "          <button type='button' class='btn btn-default' data-toggle='collapse' href='#collapseExample' aria-expanded='false' aria-controls='collapseExample'>";
        echo "              Fechar";
        echo "          </button>";
        echo "          <button type='submit' class='btn btn-primary'>";
        echo "              Enviar";
        echo "          </button>";
        echo "       </div>";//fecha o modal-footer
        echo "<br/>";
//        echo "  </div>";//fecha o tab1
        echo "</form>";
        
        if ($_POST) {

            $envia = new enviaMensagem();
            
            $dataInclusao = filter_input(INPUT_POST, 'dataInclusao');
            $nome = filter_input(INPUT_POST, 'nome');
            $email = filter_input(INPUT_POST, 'email');
            $telefone = filter_input(INPUT_POST, 'telefone');
            $departamento = filter_input(INPUT_POST, 'departamento');
            $mensagem = filter_input(INPUT_POST, 'mensagem');
            
//            
//            
//            echo "Campos preenchidos:<br>";
//            echo "Nome: ".$nome."<br>";
//            echo "E-mail: ".$email."<br>";
//            echo "Telefone: ".$telefone."<br>";
//            echo "Departamento: ".$departamento."<br>";
//            echo "Mensagem: ".$mensagem."<br>";
            
            $envia->setNome($nome);
            $envia->setEmail($email);
            $envia->setTelefone($telefone);
            $envia->setDepartamento($departamento);
            $envia->setMensagem($mensagem);
            $envia->enviarMensagem();

        }



        
    }

}
