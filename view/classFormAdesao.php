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
        echo "<form name='form_adesao' id='form_adesao' action='formAdesao.php' method='post' class='form-horizontal'>";
//        echo "  <span aria-hidden='true'>&times;</span>";
        echo "      <h3 style='text-align: center; padding-left: 0; padding-right: 0;'>";
        echo "          <img src='images/JR_Image.png' width='32' height='32'/> FORMULÁRIO DE ADESÃO";
//        echo "          <img src='images/logoJrGraficoColor.png' width='32' height='32'/> FORMULÁRIO DE ADESÃO";
        echo "      </h3>";

        echo "<div id='erro' style='display: none; text-align: center;'>";
        echo "  <label class='alert alert-danger'>Formulário não enviado. Favor enviar as informações para o e-mail jornadameditacao@redeunaviva.rio. Grato pela compreensão.</label>";
        echo "</div>";
        echo "<div id='erro2' style='display: none; text-align: center;'>";
        echo "  <label class='alert alert-danger'>Formulário não enviado. Favor enviar as informações para o e-mail jrp@redeunaviva.rio. Grato pela compreensão.</label>";
        echo "</div>";
        echo "<div id='erro3' style='display: none; text-align: center;'>";
        echo "  <label class='alert alert-danger'>Formulário não enviado. Favor enviar as informações para o e-mail jornadareal@redeunaviva.rio. Grato pela compreensão.</label>";
        echo "</div>";

        echo "<div id='sucesso' style='display: none; text-align: center;'>";
        echo "  <label class='alert alert-success'>Formulário enviado com sucesso.</label>";
        echo "</div>";


//        echo "<p class='alert alert-warning' style='text-align: center;'>Momentaneamente, o formulário está disponível para cadastro na Jornada de Meditação e Jornada Real preliminar. Grato pela atenção e compreensão.</p>";
        echo "      <p style='height: 30px;'>&nbsp;</p>";
        $this->formularioAdesao();
        echo "<div align='right'>";
        echo "  <a href='http://www.redeunaviva.rio'><button type='button' class='btn btn-default'>Sair</button></a>";
        echo "  <button type='button' class='btn btn-primary' onclick='enviaForm(\"form_adesao\")'>Enviar</button>";
        echo "</div>";
        echo "      <p style='height: 30px;'>&nbsp;</p>";
        echo "</form>";

        
        if($_POST){
            $opcao = filter_input(INPUT_POST, 'jornada');
            $dataFormatada = filter_input(INPUT_POST, 'dataFormatada');
            $nome = filter_input(INPUT_POST, 'nome');
//            $senha = filter_input(INPUT_POST, 'senha');
            $dataNascimento = filter_input(INPUT_POST, 'calendario');
//            $setenio = filter_input(INPUT_POST, 'setenio');
            $estadoCivil = filter_input(INPUT_POST, 'estadoCivil');
            $profissao = filter_input(INPUT_POST, 'profissao');
            $endereco = filter_input(INPUT_POST, 'enderecoAdesao');
            $telefone = filter_input(INPUT_POST, 'telefone');
            $email = filter_input(INPUT_POST, 'email');
            $dataCadastro = filter_input(INPUT_POST, 'dataCadastro');
            $resumo = filter_input(INPUT_POST, 'resumo');
            $motivacao = filter_input(INPUT_POST, 'motivacao');
            
//            echo "Data: ".$dataFormatada."<br>";
/*            echo "Nome: ".$nome."<br>";
            echo "Data de Nascimento: ".$dataNascimento."<br>";
            echo "Estado Civil: ".$estadoCivil."<br>";
            echo "Profissão: ".$profissao."<br>";
            echo "Endereço: ".$endereco."<br>";
            echo "E-mail: ".$email."<br>";
            echo "Data Cadastro: ".$dataCadastro."<br>";
            echo "Resumo: ".$resumo."<br>";
            echo "Motivação: ".$motivacao."<br><br><br>";
*/
            $this->enviarFormAdesao($opcao, $nome, $dataNascimento, $estadoCivil, $profissao, $endereco, $telefone, $email, $dataCadastro, $resumo, $motivacao);
//            $this->enviarFormAdesao($dataFormatada, $nome, $senha, $dataNascimento, $setenio, $estadoCivil, $profissao, $endereco, $telefone, $email, $dataCadastro, $resumo, $motivacao);
            
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
        $pop->authorise("mbox.redeunaviva.rio", 110, 30, "contato=redeunaviva.rio", "redeunaviva", 1);
        
        $mail = new PHPMailer();
        $mail->SetLanguage("br");
        $mail->IsSMTP();
        $mail->IsHTML(true);
        $mail->SMTPSecure = "tls";
        $mail->SMTPAuth = "true";
        $mail->Host = "smtp.redeunaviva.rio"; //Seu servidor SMTP
        $mail->Mailer = "smtp";     //Usando protocolo SMTP
        $mail->Username = "contato=redeunaviva.rio";
        $mail->Password = "redeunaviva";
        $mail->Port = 587;

        $to = 'jornadameditacao@redeunaviva.rio'; //seu e-mail
        $mail->From = $to;  //email do remetente
        $mail->Sender = $to;  //email do remetente
        $mail->FromName = "RedeUnaViva";   //Nome de formatado do remetente

        $mail->AddAddress($to);     //O destino do email
        $mail->AddBCC($this->email);      //Envio com cópia oculta
        $mail->Subject = "RedeUnaViva | Jornada Real - Formulário de Adesão - Jornada de Meditação ";// . $this->titulo; //Assunto do email
        $mail->CharSet = "UTF-8";
        
    }
    
    public function enviarFormAdesao($opcao, $nome, $dataNascimento, $estadoCivil, $profissao, $endereco, $telefone, $email, $dataCadastro, $resumo, $motivacao){
//    public function enviarFormAdesao($dataFormatada, $nome, $senha, $dataNascimento, $setenio, $estadoCivil, $profissao, $endereco, $telefone, $email, $dataCadastro, $resumo, $motivacao){


        $font = "arial";
        $tamanho = 2;
        $tamanhoSub = 1;

        $this->geraProtocolo();
        
        $pop = new POP3();
        //mboxf.f1.ultramail.com.br
        if($opcao === "JornadaRealPreliminar"){
            $pop->authorise("mboxf.f1.ultramail.com.br", 110, 30, "jrp=redeunaviva.rio", "r3d3un4v1v4", 1);
//            $pop->authorise("mbox.redeunaviva.rio", 110, 30, "jrp=redeunaviva.rio", "r3d3un4v1v4", 1);

        }else if ($opcao === "JornadaReal"){
            $pop->authorise("mboxf.f1.ultramail.com.br", 110, 30, "jornadareal=redeunaviva.rio", "r3d3un4v1v4", 1);
//            $pop->authorise("mbox.redeunaviva.rio", 110, 30, "jornadareal=redeunaviva.rio", "r3d3un4v1v4", 1);

        }else{
            $pop->authorise("mboxf.f1.ultramail.com.br", 110, 30, "jornadameditacao=redeunaviva.rio", "r3d3un4v1v4", 1);
//            $pop->authorise("mbox.redeunaviva.rio", 110, 30, "jornadameditacao=redeunaviva.rio", "r3d3un4v1v4", 1);

        }
        
        $mail = new PHPMailer();
        $mail->SetLanguage("br");
        $mail->IsSMTP();
        $mail->IsHTML(true);
        $mail->SMTPDebug = 0;
        $mail->SMTPSecure = "tls";
        $mail->SMTPAuth = true;
        //smtpr.f1.ultramail.com.br | smtp.redeunaviva.rio
        $mail->Host = "smtpr.f1.ultramail.com.br"; //Seu servidor SMTP
//        $mail->Mailer = "smtp";     //Usando protocolo SMTP

        if($opcao === "JornadaRealPreliminar"){
            $mail->Username = "jrp=redeunaviva.rio";
        }else if($opcao === "JornadaReal"){
            $mail->Username = "jornadareal=redeunaviva.rio";
        }else{
            $mail->Username = "jornadameditacao=redeunaviva.rio";
        }

        $mail->Password = "r3d3un4v1v4";
        $mail->Port = 587;
//        $mail->Port = 587;

        if($opcao === "JornadaRealPreliminar"){
            $to = 'jrp@redeunaviva.rio';
        }else if($opcao === "JornadaReal"){
            $to = 'jornadareal@redeunaviva.rio';
        }else{
            $to = 'jornadameditacao@redeunaviva.rio';
        }

//        $to = 'jornadameditacao@redeunaviva.rio'; //seu e-mail
        $mail->From = $to;  //email do remetente
        $mail->Sender = $to;  //email do remetente
        $mail->FromName = "RedeUnaViva | Jornada Real";   //Nome de formatado do remetente

        $mail->AddAddress($to);     //O destino do email
        $mail->AddBCC($email);      //Envio com cópia oculta
        if($opcao === "JornadaRealPreliminar"){
            $mail->Subject = "RedeUnaViva | Jornada Real On-line - Jornada Real preliminar ";// . $this->titulo; //Assunto do email
        }else if($opcao === "JornadaReal"){
            $mail->Subject = "RedeUnaViva | Jornada Real On-line - Jornada Real ";// . $this->titulo; //Assunto do email
        }else{
            $mail->Subject = "RedeUnaViva | Jornada Real On-line - Jornada de Meditação ";// . $this->titulo; //Assunto do email
        }
        $mail->CharSet = "UTF-8";
        
        $mail->Body = "<br>"; //Body of the message
        $mail->Body .= "<font face=$font size='$tamanho'>";
        $mail->Body .= "<font face=$font size='3'><b>RedeUnaViva | Jornada Real - Formulário de Adesão On-line";// . $this->titulo . "</b></font>";
        $mail->Body .= "<br/><hr>";
        $mail->Body .= "<div align='right'><font face='$font' size='".$tamanhoSub."'>Protocolo: ".$this->protocolo."</font></div>";
        $mail->Body .= "<br/><br/>";
        $mail->Body .= "Prezado Sr(a) " . $nome.", ";
        $mail->Body .= "<br/><br/>";
        $mail->Body .= "Agradecemos o seu cadastro. Segue abaixo os dados informados: ";
        $mail->Body .= "<br/><br/>";
        $mail->Body .= "<table>";
        $mail->Body .= "    <tr>";
        $mail->Body .= "        <td>";
        $mail->Body .= "            <font face=$font size='$tamanho'><b>Data do Formulário</b>:</font>";
        $mail->Body .= "        </td>";
        $mail->Body .= "        <td>";
        $mail->Body .= "            <font face=$font size='$tamanho'>" . $dataCadastro . "</font>";
        $mail->Body .= "        </td>";
        $mail->Body .= "    </tr>";
        $mail->Body .= "    <tr>";
        $mail->Body .= "        <td>";
        $mail->Body .= "            <font face=$font size='$tamanho'><b>Nome</b>: </font>";
        $mail->Body .= "        </td>";
        $mail->Body .= "        <td>";
        $mail->Body .= "            <font face=$font size='$tamanho'>" . $nome . "</font>";
        $mail->Body .= "        </td>";
        $mail->Body .= "    </tr>";
        $mail->Body .= "    <tr>";
        $mail->Body .= "        <td>";
        $mail->Body .= "            <font face=$font size='$tamanho'><b>Data de Nascimento</b>: </font>";
        $mail->Body .= "        </td>";
        $mail->Body .= "        <td>";
        $mail->Body .= "            <font face=$font size='$tamanho'>" . $dataNascimento . "</font>";
        $mail->Body .= "        </td>";
        $mail->Body .= "    </tr>";
        $mail->Body .= "    <tr>";
        $mail->Body .= "        <td>";
        $mail->Body .= "            <font face=$font size='$tamanho'><b>Estado Civil</b>: </font>";
        $mail->Body .= "        </td>";
        $mail->Body .= "        <td>";
        $mail->Body .= "            <font face=$font size='$tamanho'>" . $estadoCivil . "</font>";
        $mail->Body .= "        </td>";
        $mail->Body .= "    </tr>";
        $mail->Body .= "    <tr>";
        $mail->Body .= "        <td>";
        $mail->Body .= "            <font face=$font size='$tamanho'><b>Profissão</b>: </font>";
        $mail->Body .= "        </td>";
        $mail->Body .= "        <td>";
        $mail->Body .= "            <font face=$font size='$tamanho'>" . $profissao . "</font>";
        $mail->Body .= "        </td>";
        $mail->Body .= "    </tr>";
        $mail->Body .= "    <tr>";
        $mail->Body .= "        <td>";
        $mail->Body .= "            <font face=$font size='$tamanho'><b>Endereço</b>: </font>";
        $mail->Body .= "        </td>";
        $mail->Body .= "        <td>";
        $mail->Body .= "            <font face=$font size='$tamanho'>" . $endereco . "</font>";
        $mail->Body .= "        </td>";
        $mail->Body .= "    </tr>";
        $mail->Body .= "    <tr>";
        $mail->Body .= "        <td>";
        $mail->Body .= "            <font face=$font size='$tamanho'><b>Telefone</b>: </font>";
        $mail->Body .= "        </td>";
        $mail->Body .= "        <td>";
        $mail->Body .= "            <font face=$font size='$tamanho'>" . $telefone . "</font>";
        $mail->Body .= "        </td>";
        $mail->Body .= "    </tr>";
        $mail->Body .= "    <tr>";
        $mail->Body .= "        <td>";
        $mail->Body .= "            <font face=$font size='$tamanho'><b>E-mail</b>: </font>";
        $mail->Body .= "        </td>";
        $mail->Body .= "        <td>";
        $mail->Body .= "            <font face=$font size='$tamanho'>" . $email . "</font>";
        $mail->Body .= "        </td>";
        $mail->Body .= "    </tr>";
        $mail->Body .= "    <tr>";
        $mail->Body .= "        <td>";
        $mail->Body .= "            <font face=$font size='$tamanho'><b>Resumo</b>: </font>";
        $mail->Body .= "        </td>";
        $mail->Body .= "        <td>";
        $mail->Body .= "            <font face=$font size='$tamanho'>" . $resumo . "</font>";
        $mail->Body .= "        </td>";
        $mail->Body .= "    </tr>";
        $mail->Body .= "    <tr>";
        $mail->Body .= "        <td>";
        $mail->Body .= "            <font face=$font size='$tamanho'><b>Motivação</b>: </font>";
        $mail->Body .= "        </td>";
        $mail->Body .= "        <td>";
        $mail->Body .= "            <font face=$font size='$tamanho'>" . $motivacao . "</font>";
        $mail->Body .= "        </td>";
        $mail->Body .= "    </tr>";
        $mail->Body .= "</table>";
        $mail->Body .= "<br><br>";
        $mail->Body .= "<font face=$font size='$tamanho'>Atenciosamente,</font><br><br>";
        $mail->Body .= "<br><hr size='2'>";
        $mail->Body .= "<tr>";
        $mail->Body .= "    <td valign='top'>";
        $mail->Body .= "        <a href='http://www.redeunaviva.rio' target='_blank' title='Acesse o site'><img src='http://www.redeunaviva.rio/images/logoRUV350x250.png' width='80' height='50'></a>";
        $mail->Body .= "    </td>";
        $mail->Body .= "    <td valign='top'>";
        $mail->Body .= "<font face=$font size='$tamanho'>RedeUnaViva / Jornada de Meditação</font><br>";
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

//        echo "<br>Opção: ".$opcao."<br>";

        if (!$mail->Send()) {
            echo "<script>document.getElementById('sucesso').style.display='none'</script>";

            if($opcao === "JornadaRealPreliminar"){
                echo "<script>document.getElementById('erro2').style.display='block'</script>";
            }else if($opcao === "JornadaReal"){
                echo "<script>document.getElementById('erro3').style.display='block'</script>";
            }else{
                echo "<script>document.getElementById('erro').style.display='block'</script>";
            }
            //echo "<br>Erro: ".$mail->ErrorInfo."<br>";
//            echo "<br>Para: ".$to;

            echo "<meta http-equiv='refresh' content='5;url=formAdesao.php'>";
            //$this->geraLogErro($mail->ErrorInfo, "error");

        } else {
            $this->enviandoRespostaAutomatica($this->protocolo);
            
        }
        $mail->ClearAllRecipients();
        die;
    }

    public function enviandoRespostaAutomatica($protocolo){

        $hora = date('H:i');

        if($hora >= strtotime('06:00') and $hora <= strtotime('11:59')){
            $saudacao = "Bom dia.";
        }else if($hora > strtotime('12:00') and $hora <= strtotime('17:59')){
            $saudacao = "Boa tarde.";
        }else if($hora >= strtotime('18:00') and $hora <= strtotime('05:59')){
            $saudacao = "Boa noite.";
        }

        $font = "arial";
        $tamanho = 2;
        $tamanhoSub = 1;

        $pop = new POP3();
        $pop->authorise("mboxf.f1.ultramail.com.br", 110, 30, "jornadareal=redeunaviva.rio", "r3d3un4v1v4", 1);

        $mail = new PHPMailer();
        $mail->SetLanguage("br");
        $mail->IsSMTP();
        $mail->IsHTML(true);
        $mail->SMTPDebug = 0;
        $mail->SMTPSecure = "tls";
        $mail->SMTPAuth = true;
        $mail->Host = "smtpr.f1.ultramail.com.br"; //Seu servidor SMTP
        $mail->Username = "jornadareal=redeunaviva.rio";

        $mail->Password = "r3d3un4v1v4";
        $mail->Port = 587;

        $to = 'jornadareal@redeunaviva.rio';
        $email = "luiz.bernal@gmail.com";
        $ccopia = "fernandacappelli@hotmail.com";
//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta        

        $mail->From = $to;  //email do remetente
        $mail->Sender = $to;  //email do remetente
        $mail->FromName = "RedeUnaViva | Jornada Real";   //Nome de formatado do remetente

        $mail->AddAddress($email);     //O destino do email
        $mail->AddCC($ccopia);      //Envio com cópia oculta
        $mail->Subject = "MSG AUTORUV: RedeUnaViva | Jornada Real On-line - Jornada Real - Não responder";// . $this->titulo; //Assunto do email
        $mail->CharSet = "UTF-8";
        
        $mail->Body = "<br>"; //Body of the message
        $mail->Body .= "<font face=$font size='$tamanho'>";
        $mail->Body .= "<font face=$font size='3'><b>RedeUnaViva | Jornada Real - Formulário de Adesão On-line";// . $this->titulo . "</b></font>";
        $mail->Body .= "<br/><hr>";
        $mail->Body .= "<div align='right'><font face='$font' size='".$tamanhoSub."'>Protocolo: ".$protocolo."</font></div>";
        $mail->Body .= "<br/>";
//        $mail->Body .= "<font face=$font size='2'>".$saudacao." </font>";
//        $mail->Body .= "<br/>";
        $mail->Body .= "<font face=$font size='2'>Prezados Senhores, </font>";
        $mail->Body .= "<br/><br/>";
        $mail->Body .= "<font face=$font size='2'>Informo que há uma mensagem no e-mail jornadareal@redeunaviva.rio.</font>";
        $mail->Body .= "<br><br>";
        $mail->Body .= "<font face=$font size='$tamanho'>Atenciosamente,</font><br><br>";
        $mail->Body .= "<br><hr size='2'>";
        $mail->Body .= "<font face=$font size='$tamanho'>AutoRUV - Mensagem Automática</font><br><br>";
        $mail->Body .= "<br><hr size='2'>";
        $mail->Body.='</font>';

        if($mail->Send()){
            echo "<script>document.getElementById('erro').style.display='none'</script>";
            echo "<script>document.getElementById('sucesso').style.display='block'</script>";
            echo "<meta http-equiv='refresh' content='5;url=formAdesao.php'>";
        }
/*
        if(!$mail->Send()){
            echo "<br>Problemas no envio automático. Erro: ".$mail->ErrorInfo;
        }else{
            echo "<br>Sucesso!";
        }
        */
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
        echo "          <input type='radio' name='jornada' id='jornada' value='JornadaReal' checked='checked' />";
        echo "              Jornada Real";
        echo "      </label>";
        echo "      <label class='radio'>";
        echo "          <input type='radio' name='jornada' id='jornada' value='JornadaRealPreliminar' />";
        echo "              Jornada Real preliminar";
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
        echo "      <input type='text' name='nome' id='nome' class='form-control' onkeydown='enterTab(\"calendario\", event)' />";
        echo "   </div>";
        echo "  <div id='error1' name='error1' style='display: none;'>";
        echo "      <label class='label label-danger'>O Nome não pode ser vazio</label>";
        echo "  </div>";
        echo "</div>";

/*        
        echo "<div class='form-group'>";
        echo "   <label class='col-sm-".$medidaEsquerda." control-label' style='font-size: 11px;'>" . SENHA . "</label>";
        echo "   <div class='col-sm-".$medidaDireita."'>";
        echo "      <input type='password' name='senha' id='senha' class='form-control' maxlength='8' readonly />";
        echo "   </div>";
        echo "</div>";
*/        
        echo "<div class='form-group'>";
        echo "   <label class='col-sm-".$medidaEsquerda." control-label' style='font-size: 11px;'>" . NASCIMENTO . "</label>";
        echo "   <div class='col-sm-".$medidaDireita."'>";
        echo "                  <div class='input-group'>";
        echo "                      <input type='text' id='calendario' name='calendario' class='form-control' onkeypress='mascaraData(this)' onkeydown='enterTab(\"estadoCivil\", event)'><div class='input-group-addon'><i class='fa fa-calendar'></i></div>";
        echo "                  </div>";
/*

        echo "      <input type='date' name='dataNascimento' id='dataNascimento' class='form-control' onkeyup='javascript:calculaIdade(this.value)' onmouseout='javascript:calculaIdade(this.value)' />";
        echo "      <input type='hidden' name='idade' id='idade' class='form-control' />";
        */
        echo "   </div>";
        echo "  <div id='error2' name='error2' style='display: none;'>";
        echo "      <label class='label label-danger'>A Data de Nascimento não poderá ficar vazia</label>";
        echo "  </div>";
        echo "</div>";
/*
        echo "<div class='form-group'>";
        echo "   <label class='col-sm-".$medidaEsquerda." control-label' style='font-size: 11px;'>" . SETENIO . "</label>";
        echo "   <div class='col-sm-".$medidaDireita."'>";
        echo "      <input type='text' name='setenio' id='setenio'  placeholder='Setênio' class='form-control' readonly />";
        echo "      <input type='hidden' name='codSetenio' id='codSetenio' class='form-control'/>";
        echo "   </div>";
        echo "</div>";
*/        
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
        echo "  <div id='error3' name='error3' style='display: none;'>";
        echo "      <label class='label label-danger'>Selecione o Estado Civil</label>";
        echo "  </div>";
        echo "</div>";
        
        echo "<div class='form-group'>";
        echo "   <label class='col-sm-".$medidaEsquerda." control-label' style='font-size: 11px;'>" . PROFISSAO . "</label>";
        echo "   <div class='col-sm-".$medidaDireita."'>";
        echo "      <input type='text' name='profissao' id='profissao' class='form-control' onkeydown='enterTab(\"enderecoAdesao\", event)' />";
        echo "   </div>";
        echo "  <div id='error4' name='error4' style='display: none;'>";
        echo "      <label class='label label-danger'>Profissão ou ocupação não pode(m) ser vazio(s)</label>";
        echo "  </div>";
        echo "</div>";
        
        echo "<div class='form-group'>";
        echo "   <label class='col-sm-".$medidaEsquerda." control-label' style='font-size: 11px;'>" . ENDERECO . "</label>";
        echo "   <div class='col-sm-".$medidaDireita."'>";
        echo "      <input type='text' name='enderecoAdesao' id='enderecoAdesao' class='form-control' onkeydown='enterTab(\"telefone\", event)' />";
        echo "   </div>";
        echo "  <div id='error5' name='error5' style='display: none;'>";
        echo "      <label class='label label-danger'>Endereço não poderá ser vazio</label>";
        echo "  </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-".$medidaEsquerda." control-label' style='font-size: 11px;'>" . TELEFONE . "</label>";
        echo "   <div class='col-sm-".$medidaDireita."'>";
        echo "      <input type='tel' name='telefone' id='telefone' class='form-control' onkeypress='mascaraTelefone(this)' onkeydown='enterTab(\"email\", event)' />";
        echo "   </div>";
        echo "  <div id='error6' name='error6' style='display: none;'>";
        echo "      <label class='label label-danger'>Telefone não pode ser vazio</label>";
        echo "  </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-".$medidaEsquerda." control-label' style='font-size: 11px;'>" . EMAIL . "</label>";
        echo "   <div class='col-sm-".$medidaDireita."'>";
        echo "      <input type='email' name='email' id='email' class='form-control' onkeydown='enterTab(\"resumo\", event)' />";
        echo "   </div>";
        echo "  <div id='error7' name='error7' style='display: none;'>";
        echo "      <label class='label label-danger'>O E-mail não pode ser vazio</label>";
        echo "  </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-".$medidaEsquerda." control-label' style='font-size: 11px;'>" . DATA . "</label>";
        echo "   <div class='col-sm-".$medidaDireita."'>";
        echo "      <input type='text' name='dataCadastro' id='dataCadastro' value='".date("d/m/Y")."' class='form-control' readonly />";
        echo "   </div>";
        echo "  <div id='error8' name='error8' style='display: none;'>";
        echo "      <label class='label label-danger'>A Data não pode ser vazia</label>";
        echo "  </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-".$medidaEsquerda." control-label' style='font-size: 11px;'>" . ASSINATURA . "</label>";
        echo "   <div class='col-sm-".$medidaDireita."'>";
//        echo "      <textarea name='mensagem' id='mensagem' rows = '5' cols='50' class='form-control'></textarea>";
        echo "      <label style='font-size:10px; text-align: justify;'><i>(dispensável no caso de inscrição via e-mail)</i></label>";
        echo "   </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-".$medidaEsquerda." control-label' style='font-size: 11px;'>" . VAZIO . "</label>";
        echo "   <div class='col-sm-".$medidaDireita."'>";
        echo "      <label style='font-size:10px; text-align: justify;'><i>* O ano do nascimento serve para definir a idade e com isto relacioná-la com o setênio, o que será útil, posteriormente, na elaboração da sua Roda das Estações da Vida.  Mas se você não quiser revelar sua idade o ano do nascimento é dispensável.</i></label>";
        echo "   </div>";
        echo "</div>";
/*
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
*/
        echo "<div class='form-group'>";
        echo "   <label class='col-sm-".$medidaEsquerda." control-label' style='font-size: 11px;'>" . PERGUNTA1 . "</label>";
        echo "   <div class='col-sm-".$medidaDireita."'>";
        echo "      <table>";
        echo "          <tr>";
        echo "              <td>";
        echo "      <textarea name='resumo' id='resumo' cols='50' rows='6'></textarea>";
        echo "              </td>";
        echo "              <td>";
        echo "      <label control-label' style='font-size: 10px; padding-left: 10px;'>Se preferir, use as seguintes referências:<br>- Qual é o seu interesse pelo conhecimento e prátida da meditação?<br>- Qual é a sua relação com as tradições espirituais?<br>- Você tem alguma prática religiosa?<br>- Há interesse profissional para fazer esta jornada de meditação?<br>- Submete-se ou já se submeteu a alguma psicoterapia? Qual(is)?</label>";
        echo "              <td>";
        echo "          </tr>";
        echo "      </table>";
        echo "   </div>";
        echo "  <div id='error9' name='error9' style='display: none;'>";
        echo "      <label class='label label-danger'>Resumo não pode ser vazio</label>";
        echo "  </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-".$medidaEsquerda." control-label' style='font-size: 11px;'>" . PERGUNTA2 . "</label>";
        echo "   <div class='col-sm-".$medidaDireita."'>";
        echo "      <label class='radio-inline'>";
        echo "          <input type='radio' name='motivacao' id='motivacao' value='Muito motivado'> Muito motivado<br/>";
        echo "          <input type='radio' name='motivacao' id='motivacao' value='Motivado'> Motivado<br/>";
        echo "          <input type='radio' name='motivacao' id='motivacao' value='Interessado'> Interessado<br/>";
        echo "          <input type='radio' name='motivacao' id='motivacao' value='Por curiosidade'> Por curiosidade<br/>";
        echo "      </label>";
        echo "   </div>";
        echo "  <div id='error10' name='error10' style='display: none;'>";
        echo "      <label class='label label-danger'>Selecione a Motivação</label>";
        echo "  </div>";

        echo "</div>";

//        $m = filter_input(INPUT_GET, 'm');
//        if(!empty($m)){
        /*
            echo "<div id='erro' style='display: none; text-align: center;'>";
            echo "  <label class='alert alert-danger'>Formulário não enviado. Favor enviar as informações para o e-mail jornadameditacao@redeunaviva.rio. Grato pela compreensão.</label>";
            echo "</div>";
            echo "<div id='erro2' style='display: none; text-align: center;'>";
            echo "  <label class='alert alert-danger'>Formulário não enviado. Favor enviar as informações para o e-mail jrp@redeunaviva.rio. Grato pela compreensão.</label>";
            echo "</div>";
            echo "<div id='erro3' style='display: none; text-align: center;'>";
            echo "  <label class='alert alert-danger'>Formulário não enviado. Favor enviar as informações para o e-mail jornadareal@redeunaviva.rio. Grato pela compreensão.</label>";
            echo "</div>";

            echo "<div id='sucesso' style='display: none; text-align: center;'>";
            echo "  <label class='alert alert-success'>Formulário enviado com sucesso.</label>";
            echo "</div>";
//        }
*/

        echo "</div>";
        
    }
    
    
}
