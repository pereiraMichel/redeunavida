<?php


class classformAdesao {
    
    private $dataFormatada;
    private $nome;
    private $senha;
    private $dataNascimento;
    private $setenio;
    private $estadoCivil;
    private $profissao;
    private $endereco;
    private $telefone;
    private $email;
    private $dataCadastro;
    private $resumo;
    private $motivacao;

    function getDataFormatada() {
        return $this->dataFormatada;
    }

    function getNome() {
        return $this->nome;
    }

    function getSenha() {
        return $this->senha;
    }

    function getDataNascimento() {
        return $this->dataNascimento;
    }

    function getSetenio() {
        return $this->setenio;
    }

    function getEstadoCivil() {
        return $this->estadoCivil;
    }

    function getProfissao() {
        return $this->profissao;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getEmail() {
        return $this->email;
    }

    function getDataCadastro() {
        return $this->dataCadastro;
    }

    function getResumo() {
        return $this->resumo;
    }

    function getMotivacao() {
        return $this->motivacao;
    }

    function setDataFormatada($dataFormatada) {
        $this->dataFormatada = $dataFormatada;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    function setSetenio($setenio) {
        $this->setenio = $setenio;
    }

    function setEstadoCivil($estadoCivil) {
        $this->estadoCivil = $estadoCivil;
    }

    function setProfissao($profissao) {
        $this->profissao = $profissao;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    function setResumo($resumo) {
        $this->resumo = $resumo;
    }

    function setMotivacao($motivacao) {
        $this->motivacao = $motivacao;
    }

        
    public function telaFormAdesaoModal(){
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
    public function telaFormAdesao(){
        echo "<form name='form_adesao' action='formAdesao.php' method='post' class='form-horizontal'>";
//        echo "  <span aria-hidden='true'>&times;</span>";
        echo "      <h3 style='text-align: center; padding-left: 0; padding-right: 0;'>";
        echo "          <img src='images/logoJrGraficoColor.png' width='32' height='32'/> FORMULÁRIO DE ADESÃO";
        echo "      </h3>";
        echo "<p class='alert alert-danger' style='text-align: center;'>Momentaneamente, o formulário não está disponível. Grato pela atenção e compreensão.</p>";
        echo "      <p style='height: 30px;'>&nbsp;</p>";
        $this->formularioAdesao();
        echo "<div align='right'>";
        echo "  <a href='javascript: history.go(-1);'><button type='button' class='btn btn-default'>Sair</button></a>";
        echo "  <button type='submit' class='btn btn-primary'>Enviar</button>";
        echo "</div>";
        echo "      <p style='height: 30px;'>&nbsp;</p>";
        echo "</form>";
        
        
        if($_POST){
            $dataFormatada = filter_input(INPUT_POST, 'dataFormatada');
            $nome = filter_input(INPUT_POST, 'nome');
            $senha = filter_input(INPUT_POST, 'senha');
            $dataNascimento = filter_input(INPUT_POST, 'dataNascimento');
            $setenio = filter_input(INPUT_POST, 'setenio');
            $estadoCivil = filter_input(INPUT_POST, 'estadoCivil');
            $profissao = filter_input(INPUT_POST, 'profissao');
            $endereco = filter_input(INPUT_POST, 'endereco');
            $telefone = filter_input(INPUT_POST, 'telefone');
            $email = filter_input(INPUT_POST, 'email');
            $dataCadastro = filter_input(INPUT_POST, 'dataCadastro');
            $resumo = filter_input(INPUT_POST, 'resumo');
            $motivacao = filter_input(INPUT_POST, 'motivacao');
            
            $this->enviarFormAdesao($dataFormatada, $nome, $senha, $dataNascimento, $setenio, $estadoCivil, $profissao, $endereco, $telefone, $email, $dataCadastro, $resumo, $motivacao);
            
        }
    }
    
    public function geraProtocolo(){
        date_default_timezone_set('UTC');
        date_default_timezone_set('America/Sao_Paulo');
        
        $ano = date('Y');
        $mes = date('m');
        $dia = date('d');
        $hora = date('H');
        $min = date('i');
        $codMap = "015";
        
        $protocolo = $ano.$mes.$dia.$codMap.$hora.$min;
        
        $this->protocolo = $protocolo;
        
    }
    
    public function configuracaoSMTP(){
        $pop = new POP3();
        $pop->authorise("mbox.redeunaviva.rio", 110, 30, "formulario.adesao=redeunaviva.rio", "redeunaviva", 1);
        $mail = new PHPMailer();
        $mail->SetLanguage("br");
        $mail->IsSMTP();
        $mail->IsHTML(true);
        $mail->SMTPSecure = "tls";
        $mail->SMTPAuth = "true";
        $mail->Host = "smtp.redeunaviva.rio"; //Seu servidor SMTP
        $mail->Mailer = "smtp";     //Usando protocolo SMTP
//        $mail->SMTPDebug = 1;
        $mail->Username = "formulario.adesao=redeunaviva.rio";
        $mail->Password = "redeunaviva";
        $mail->Port = 587;

        $to = 'formulario.adesao@redeunaviva.rio'; //seu e-mail
        $mail->From = $to;  //email do remetente
        $mail->Sender = $to;  //email do remetente
        $mail->FromName = "RedeUnaViva";   //Nome de formatado do remetente

        $mail->AddAddress($to);     //O destino do email
        $mail->AddBCC($this->email);      //Envio com cópia oculta
        $mail->Subject = "RedeUnaViva - Formulário de Adesão - Web ";// . $this->titulo; //Assunto do email
        $mail->CharSet = "UTF-8";
        
    }
    
    public function enviarFormAdesao($dataFormatada, $nome, $senha, $dataNascimento, $setenio, $estadoCivil, $profissao, $endereco, $telefone, $email, $dataCadastro, $resumo, $motivacao){

        $font = "arial";
        $tamanho = 2;
        $tamanhoSub = 1;

        $this->geraProtocolo();
        
        $this->configuracaoSMTP();
        
        $mail->Body = "<br>"; //Body of the message
        $mail->Body .= "<font face=$font size='$tamanho'>";
        $mail->Body .= "<font face=$font size='3'><b>RedeUnaViva - Formulário de Adesão";// . $this->titulo . "</b></font>";
        $mail->Body .= "<br/><hr>";
        $mail->Body .= "<div align='right'><font face='$font' size='".$tamanhoSub."'>Protocolo: ".$this->protocolo."</font></div>";
        $mail->Body .= "<br/><br/>";
        $mail->Body .= "Prezado Sr(a) " . $this->nome.", ";
        $mail->Body .= "<br/><br/>";
        $mail->Body .= "Agradecemos pelo seu contato. Retornaremos o mais rápido possível. Segue abaixo os dados informados: ";
        $mail->Body .= "<br/><br/>";
        $mail->Body .= "<br/><font face=$font size='$tamanho'><b>Nome</b>: " . $this->nome . "</font><br>";
        $mail->Body .= "<br/><font face=$font size='$tamanho'><b>E-mail</b>: " . $this->email . "</font><br>";
        $mail->Body .= "<br/><font face=$font size='$tamanho'><b>Mensagem</b>: <br/><br/>" . $this->mensagem . "</font><br>";
        $mail->Body .= "<br><br>";
        $mail->Body .= "<font face=$font size='$tamanho'>Atenciosamente,</font><br><br>";
        $mail->Body .= "<br><hr size='2'>";
        $mail->Body .= "<tr>";
        $mail->Body .= "    <td valign='top'>";
        $mail->Body .= "        <a href='http://www.redeunaviva.rio' target='_blank' title='Acesse o site'><img src='http://www.redeunaviva.rio/images/logoRUV350x250.png' width='80' height='50'></a>";
        $mail->Body .= "    </td>";
        $mail->Body .= "    <td valign='top'>";
        $mail->Body .= "<font face=$font size='$tamanho'>RedeUnaViva / Jornada Real</font><br>";
        $mail->Body .= "    </td>";
        $mail->Body .= "</tr>";
        $mail->Body .= "<tr>";
        $mail->Body .= "    <td>";
        $mail->Body .= "        <br><br>";
        $mail->Body .= "    </td>";
        $mail->Body .= "    <td valign='top'>";
        $mail->Body .= "        <img src='http://www.redeunaviva.rio/images/ico_telefone.png'><font size='$tamanhoSub'> (21) 2266-5690<br/>";
        $mail->Body .= "        <img src='http://www.redeunaviva.rio/images/blackWorld.png'><a href='http://www.redeunaviva.rio' target='_blank'><font size='1'> http://www.redeunaviva.rio</font></a><br>";
        $mail->Body .= "    </td>";
        $mail->Body .= "</tr>";
        $mail->Body .= "<br><br>";
        $mail->Body.='</font>';

        if (!$mail->Send()) {
            echo "<script>document.getElementById('sucesso').style.display='none'</script>";
            echo "<script>document.getElementById('erro').style.display='block'</script>";
            $this->geraLogErro($mail->ErrorInfo, "error");

        } else {
            echo "<script>document.getElementById('erro').style.display='none'</script>";
            echo "<script>document.getElementById('sucesso').style.display='block'</script>";
            echo "<meta http-equiv='refresh' content='5;url=contato.php'>";
//            echo "<meta http-equiv='refresh' content='5;url=http://www.redeunaviva.rio/'>";
            
        }
        $mail->ClearAllRecipients();
        die;
    }

    public function formularioAdesao(){
        $medidaEsquerda = 3;
        $medidaDireita = 7;
        echo "<div class='tab-pane active' id='tab1'>";
        echo "<input type='hidden' name='dataFormatada' id='dataFormatada' value='".date('Y-m-d') . "' size='10' readonly='readonly' />";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-".$medidaEsquerda." control-label' style='font-size: 11px;'>" . OPCAOJORNADA . "</label>";
        echo "   <div class='col-sm-".$medidaDireita."'>";
        echo "      <label class='radio'>";
        echo "          <input type='radio' name='jornada' id='jornada' value='JornadaReal' />";
        echo "              Jornada Real";
        echo "      </label>";
        echo "      <label class='radio'>";
        echo "          <input type='radio' name='jornada' id='jornada' value='JornadaMeditacao' />";
        echo "              Jornada de Meditação";
        echo "      </label>";
        echo "   </div>";
        echo "</div>";
        
        echo "<div class='form-group'>";
        echo "   <label class='col-sm-".$medidaEsquerda." control-label' style='font-size: 11px;'>" . NOME . "</label>";
        echo "   <div class='col-sm-".$medidaDireita."'>";
        echo "      <input type='text' name='nome' id='nome'  placeholder='Nome' class='form-control' />";
        echo "   </div>";
        echo "</div>";
        
        echo "<div class='form-group'>";
        echo "   <label class='col-sm-".$medidaEsquerda." control-label' style='font-size: 11px;'>" . SENHA . "</label>";
        echo "   <div class='col-sm-".$medidaDireita."'>";
        echo "      <input type='password' name='senha' id='senha' class='form-control' maxlength='8' readonly />";
        echo "   </div>";
        echo "</div>";
        
        echo "<div class='form-group'>";
        echo "   <label class='col-sm-".$medidaEsquerda." control-label' style='font-size: 11px;'>" . NASCIMENTO . "</label>";
        echo "   <div class='col-sm-".$medidaDireita."'>";
        echo "      <input type='date' name='dataNascimento' id='dataNascimento' class='form-control' onkeyup='javascript:calculaIdade(this.value)' onmouseout='javascript:calculaIdade(this.value)' />";
        echo "      <input type='hidden' name='idade' id='idade' class='form-control' />";
        echo "   </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-".$medidaEsquerda." control-label' style='font-size: 11px;'>" . SETENIO . "</label>";
        echo "   <div class='col-sm-".$medidaDireita."'>";
        echo "      <input type='text' name='setenio' id='setenio'  placeholder='Setênio' class='form-control' readonly />";
        echo "      <input type='hidden' name='codSetenio' id='codSetenio' class='form-control'/>";
        echo "   </div>";
        echo "</div>";
        
        echo "<div class='form-group'>";
        echo "   <label class='col-sm-".$medidaEsquerda." control-label' style='font-size: 11px;'>" . ESTCIVIL . "</label>";
        echo "   <div class='col-sm-".$medidaDireita."'>";
        echo "      <select name='estadoCivil' id='estadoCivil' class='form-control'>";
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
        echo "   <label class='col-sm-".$medidaEsquerda." control-label' style='font-size: 11px;'>" . PROFISSAO . "</label>";
        echo "   <div class='col-sm-".$medidaDireita."'>";
        echo "      <input type='text' name='profissao' id='profissao'  placeholder='Profissão' class='form-control' />";
        echo "   </div>";
        echo "</div>";
        
        echo "<div class='form-group'>";
        echo "   <label class='col-sm-".$medidaEsquerda." control-label' style='font-size: 11px;'>" . ENDERECO . "</label>";
        echo "   <div class='col-sm-".$medidaDireita."'>";
        echo "      <input type='text' name='enderecoAdesao' id='enderecoAdesao'  placeholder='Endereço' class='form-control' />";
        echo "   </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-".$medidaEsquerda." control-label' style='font-size: 11px;'>" . TELEFONE . "</label>";
        echo "   <div class='col-sm-".$medidaDireita."'>";
        echo "      <input type='tel' name='telefone' id='telefone' placeholder='Telefone' class='form-control' />";
        echo "   </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-".$medidaEsquerda." control-label' style='font-size: 11px;'>" . EMAIL . "</label>";
        echo "   <div class='col-sm-".$medidaDireita."'>";
        echo "      <input type='email' name='email' id='email' placeholder='E-mail' class='form-control' />";
        echo "   </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-".$medidaEsquerda." control-label' style='font-size: 11px;'>" . DATA . "</label>";
        echo "   <div class='col-sm-".$medidaDireita."'>";
        echo "      <input type='text' name='dataCadastro' id='dataCadastro' value='".date("d/m/Y")."' class='form-control' readonly />";
        echo "   </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-".$medidaEsquerda." control-label' style='font-size: 11px;'>" . ASSINATURA . "</label>";
        echo "   <div class='col-sm-".$medidaDireita."'>";
//        echo "      <textarea name='mensagem' id='mensagem' rows = '5' cols='50' class='form-control'></textarea>";
        echo "<label style='font-size:10px; text-align: justify;'><i>(dispensável no caso de inscrição via e-mail)</i></label>";
        echo "   </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-".$medidaEsquerda." control-label' style='font-size: 11px;'>" . VAZIO . "</label>";
        echo "   <div class='col-sm-".$medidaDireita."'>";
        echo "      <label style='font-size:10px; text-align: justify;'><i>* O ano do nascimento serve para definir a idade e com isto relacioná-la com o setênio, o que será útil, posteriormente, na elaboração da sua Roda das Estações da Vida.  Mas se você não quiser revelar sua idade o ano do nascimento é dispensável.</i></label>";
        echo "   </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-".$medidaEsquerda." control-label' style='font-size: 11px;'>" . VAZIO . "</label>";
        echo "   <div class='col-sm-".$medidaDireita."'>";
        echo "      <label style='font-size:10px; text-align: justify;'>*<a href='#quadro' data-toggle='collapse' target='_self'>Clique aqui</a> para ver o quadro de correspondência.</label>";
        echo "   </div>";
        echo "</div>";
        
        echo "<div class='collapse' id='quadro'>";
        echo "  <div class='form-group'>";
        echo "      <div class='table-responsive'>";
        echo "      <div class='text-center'>";
        echo "          <table class='table'>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      <b>Idade</b>";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <b>Setênio</b>";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      De 0 até 6";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      1º";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      De 7 até 13";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      2º";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      De 14 até 20";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      3º";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      De 21 até 27";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      4º";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      De 28 até 34";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      5º";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      De 35 até 41";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      6º";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      De 42 até 48";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      7º";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      De 49 até 55";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      8º";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      De 56 até 62";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      9º";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      De 63 até 69";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      10º";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      De 70 até 76";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      11º";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      De 77 até 83";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      12º";
        echo "                  </td>";
        echo "              </tr>";
        echo "          </table>";
        echo "      </div>";
        echo "      </div>";
        echo "  </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-".$medidaEsquerda." control-label' style='font-size: 11px;'>" . PERGUNTA1 . "</label>";
        echo "   <div class='col-sm-".$medidaDireita."'>";
        echo "      <textarea name='resumo' cols='50' rows='5'></textarea>";
        echo "   </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-".$medidaEsquerda." control-label' style='font-size: 11px;'>" . PERGUNTA2 . "</label>";
        echo "   <div class='col-sm-".$medidaDireita."'>";
        echo "      <label class='radio-inline'>";
        echo "          <input type='radio' name='motivacao' id='muitomotivado' value='Muito motivado'> Muito motivado<br/>";
        echo "          <input type='radio' name='motivacao' id='motivado' value='Motivado'> Motivado<br/>";
        echo "          <input type='radio' name='motivacao' id='interessado' value='Interessado'> Interessado<br/>";
        echo "          <input type='radio' name='motivacao' id='porcuriosidade' value='Por curiosidade'> Por curiosidade<br/>";
        echo "      </label>";
        echo "   </div>";
        echo "</div>";

        echo "</div>";
        
    }
    
    
}
