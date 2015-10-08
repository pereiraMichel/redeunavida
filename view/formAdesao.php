<?php


class formAdesao {
    
    public function telaFormAdesao(){
        echo "<form name='form_adesao' action='view/' method='post' class='form-horizontal'>";
        echo "    <div class='modal fade' id='enviarAdesao' tabindex='-1' role='dialog' aria-labelledby='modalAdesao'>";
        echo "        <div class='modal-dialog' role='document'>";
        echo "            <div class='modal-content'>";
        echo "                <div class='modal-header'>";
        echo "                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "                        <span aria-hidden='true'>&times;</span>";
        echo "                    </button>";
        echo "                    <h4 class='modal-title' id='modalAdesao'><img src='images/logoRUV50x51.png'/> Rede Una Vida - <small>Formulário de Adesão</small></h4>";
        echo "                </div>";
        echo "                <div class='modal-body'>";
                                $this->formularioAdesao();
        echo "                </div>";
        echo "                <div class='modal-footer' style='padding-right: 50px'>";
        echo "                    <button type='button' class='btn btn-default' data-dismiss='modal'>Fechar</button>";
        echo "                    <button type='button' class='btn btn-primary'>Enviar</button>";
        echo "                </div>";
        echo "                <br/>";
        echo "            </div>";
        echo "        </div>";
        echo "    </div>";
        echo "</form>";
        
    }
    
    public function formularioAdesao(){
        echo "<div class='tab-pane active' id='tab1'>";
        echo "<input type='hidden' name='data' id='data' value='" . date('Y/m/d') . "' size='10' readonly='readonly' />";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-2 control-label' style='font-size: 11px;'>" . NOME . "</label>";
        echo "   <div class='col-sm-10'>";
        echo "      <input type='text' name='nome' id='nome'  placeholder='Nome' class='form-control' />";
        echo "   </div>";
        echo "</div>";
        
        echo "<div class='form-group'>";
        echo "   <label class='col-sm-2 control-label' style='font-size: 11px;'>" . NASCIMENTO . "</label>";
        echo "   <div class='col-sm-10'>";
        echo "      <input type='date' name='nascimento' id='nascimento' class='form-control' onkeyup='javascript:calculaIdade(this.value)' onmouseout='javascript:calculaIdade(this.value)' />";
        echo "      <input type='hidden' name='idade' id='idade' class='form-control' />";
        echo "   </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-2 control-label' style='font-size: 11px;'>" . SETENIO . "</label>";
        echo "   <div class='col-sm-10'>";
        echo "      <input type='text' name='setenio' id='setenio'  placeholder='Setênio' class='form-control' readonly />";
        echo "      <input type='hidden' name='codSetenio' id='codSetenio' class='form-control'/>";
        echo "   </div>";
        echo "</div>";
        
        echo "<div class='form-group'>";
        echo "   <label class='col-sm-2 control-label' style='font-size: 11px;'>" . ESTCIVIL . "</label>";
        echo "   <div class='col-sm-10'>";
        echo "      <select name='estcivil' class='form-control'>";
        echo "          <option value='Solteiro(a)'>Solteiro(a)</option>";
        echo "          <option value='Casado(a)'>Casado(a)</option>";
        echo "          <option value='Divorciado(a)'>Divorciado(a)</option>";
        echo "          <option value='Desquitado(a)'>Desquitado(a)</option>";
        echo "          <option value='Viúvo(a)'>Viúvo(a)</option>";
        echo "      </select>";
//        echo "      <input type='hiden' name='estcivil' id='estcivil'  placeholder='Estado Civil' class='form-control' />";
        echo "   </div>";
        echo "</div>";
        
        echo "<div class='form-group'>";
        echo "   <label class='col-sm-2 control-label' style='font-size: 11px;'>" . PROFISSAO . "</label>";
        echo "   <div class='col-sm-10'>";
        echo "      <input type='text' name='profissao' id='profissao'  placeholder='Profissão' class='form-control' />";
        echo "   </div>";
        echo "</div>";
        
        echo "<div class='form-group'>";
        echo "   <label class='col-sm-2 control-label' style='font-size: 11px;'>" . ENDERECO . "</label>";
        echo "   <div class='col-sm-10'>";
        echo "      <input type='text' name='profissao' id='profissao'  placeholder='Profissão' class='form-control' />";
        echo "   </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-2 control-label' style='font-size: 11px;'>" . TELEFONE . "</label>";
        echo "   <div class='col-sm-10'>";
        echo "      <input type='tel' name='telefone' id='telefone' placeholder='Telefone' class='form-control' />";
        echo "   </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-2 control-label' style='font-size: 11px;'>" . EMAIL . "</label>";
        echo "   <div class='col-sm-10'>";
        echo "      <input type='email' name='email' id='email' placeholder='E-mail' class='form-control' />";
        echo "   </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-2 control-label' style='font-size: 11px;'>" . DATA . "</label>";
        echo "   <div class='col-sm-10'>";
        echo "      <input type='text' name='data' id='data' value='".date("d/m/Y")."' class='form-control' readonly />";
        echo "   </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-2 control-label' style='font-size: 11px;'>" . ASSINATURA . "</label>";
        echo "   <div class='col-sm-10'>";
//        echo "      <textarea name='mensagem' id='mensagem' rows = '5' cols='50' class='form-control'></textarea>";
        echo "<label style='font-size:10px; text-align: justify;'><i>(dispensável no caso de inscrição via e-mail)</i></label>";
        echo "   </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-2 control-label' style='font-size: 11px;'>" . VAZIO . "</label>";
        echo "   <div class='col-sm-10'>";
        echo "      <label style='font-size:10px; text-align: justify;'><i>* O ano do nascimento serve para definir a idade e com isto relacioná-la com o setênio, o que será útil, posteriormente, na elaboração da sua Roda das Estações da Vida.  Mas se você não quiser revelar sua idade o ano do nascimento é dispensável.</i></label>";
        echo "   </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-2 control-label' style='font-size: 11px;'>" . VAZIO . "</label>";
        echo "   <div class='col-sm-10'>";
        echo "      <label style='font-size:10px; text-align: justify;'>* Caso deseje realizar o download do formulário, <a href='../texto/' target='_blank'>clique aqui</a> para realizar o download.</label>";
        echo "      <label style='font-size:10px; text-align: justify;'>*<a href='../texto/' target='_blank'>Clique aqui</a> para ver o quadro de correspondência.</label>";
        echo "   </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-2 control-label' style='font-size: 11px;'>" . PERGUNTA1 . "</label>";
        echo "   <div class='col-sm-10'>";
        echo "      <textarea name='referencias' cols='50' rows='5'></textarea>";
        echo "   </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-2 control-label' style='font-size: 11px;'>" . PERGUNTA2 . "</label>";
        echo "   <div class='col-sm-10'>";
        echo "      <label class='radio-inline'>";
        echo "          <input type='radio' name='referencia' id='muitomotivado' value='Muito motivado'> Muito motivado<br/>";
        echo "          <input type='radio' name='referencia' id='motivado' value='Motivado'> Motivado<br/>";
        echo "          <input type='radio' name='referencia' id='interessado' value='Interessado'> Interessado<br/>";
        echo "          <input type='radio' name='referencia' id='porcuriosidade' value='Por curiosidade'> Por curiosidade<br/>";
        echo "      </label>";
        echo "   </div>";
        echo "</div>";

        echo "</div>";
        
    }
    
    
}
