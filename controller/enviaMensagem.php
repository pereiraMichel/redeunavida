<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnviaMensagem
 *
 * @author Debug
 */
class enviaMensagem {

    private $nome;
    private $email;
    private $telefone;
    private $departamento;
    private $mensagem;
    private $protocolo;
    
    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getDepartamento() {
        return $this->departamento;
    }

    function getMensagem() {
        return $this->mensagem;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setDepartamento($departamento) {
        $this->departamento = $departamento;
    }

    function setMensagem($mensagem) {
        $this->mensagem = $mensagem;
    }
    
    function setProtocolo($protocolo){
        $this->protocolo = $protocolo;
    }
    
    function getProtocolo(){
        return $this->protocolo;
    }
    
    public function geraLogErro($message, $level = 'info', $file = 'logErro.log'){
        $data = date("Y-m-d H:i:s");
        $levelStr = "";
        $path = "log/".$file;
        switch($level){
            case "info":
                $levelStr = "[INFO]";
                break;
            case "warning":
                $levelStr = "[WARNING]";
                break;
            case "error":
                $levelStr = "[ERROR]";
                break;
        }
        
        $msg = sprintf("[%s] [%s]: %s%s", $data, $levelStr, $message, PHP_EOL);

        file_put_contents($path, $msg, FILE_APPEND);
        
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
    
    public function enviarMensagem(){

        $this->geraProtocolo();
        
        $pop = new POP3();
        $pop->authorise("mbox.redeunaviva.rio", 110, 30, "contato=redeunaviva.rio", "redeunaviva", 1);
        
        $mail = new PHPMailer();
        $mail->SetLanguage("br");
//        $mail->IsMail();
        $mail->IsSMTP();
        $mail->IsHTML(true);
        $mail->SMTPSecure = "tls";
        $mail->SMTPAuth = "true";
        $mail->Host = "smtp.redeunaviva.rio"; //Seu servidor SMTP
        $mail->Mailer = "smtp";     //Usando protocolo SMTP
//        $mail->SMTPDebug = 1;
        $mail->Username = "contato=redeunaviva.rio";
        $mail->Password = "redeunaviva";
        $mail->Port = 587;

        $to = 'contato@redeunaviva.rio'; //seu e-mail
        $mail->From = $to;  //email do remetente
        $mail->Sender = $to;  //email do remetente
        $mail->FromName = "REDEUNAVIVA";   //Nome de formatado do remetente

        $mail->AddAddress($to);     //O destino do email
        $mail->AddBCC($this->email);      //Envio com cópia oculta
        $mail->Subject = "REDEUNAVIVA - CONTATO ";// . $this->titulo; //Assunto do email
        
        $font = "arial";
        $tamanho = 2;
        $tamanhoSub = 1;
        $mail->CharSet = "UTF-8";
        $mail->Body = "<br>"; //Body of the message
        $mail->Body .= "<font face=$font size='$tamanho'>";
        $mail->Body .= "<font face=$font size='3'><b>REDEUNAVIVA - ATENDIMENTO";// . $this->titulo . "</b></font>";
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
//            $this->geraLogErro($mail->ErrorInfo, "error");

        } else {
            echo "<script>document.getElementById('erro').style.display='none'</script>";
            echo "<script>document.getElementById('sucesso').style.display='block'</script>";
            echo "<meta http-equiv='refresh' content='5;url=contato.php'>";
//            echo "<meta http-equiv='refresh' content='5;url=http://www.redeunaviva.rio/'>";
            
        }

        $mail->ClearAllRecipients();
        
        die;
        
        
        
    }
    
}
