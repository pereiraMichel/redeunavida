<?php

$temp_dir = '../../lib/mpdf/ttfonts';
define('_MPDF_TTFONTDATAPATH',$temp_dir);
header("Cache-control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
clearstatcache();
//define('_MPDF_TTFONTDATAPATH',Yii::getAlias('@runtime/mpdf'));
//define('__ROOT__', dirname(dirname(__FILE__)));
//
//require_once __ROOT__.'/conexao/conectaBanco.php';
//
error_reporting(E_ALL);
ini_set('display_errors', 1);
//set_error_handler("var_dump");

ob_start();


require_once "../classes/usuario.class.php";
require_once "../conexao/conectaBanco.php";

require_once '../../lib/phpmailer/class.phpmailer.php';
require_once '../../lib/phpmailer/class.smtp.php';
require_once '../../lib/phpmailer/class.pop3.php';
require_once '../../lib/phpmailer/class.phpmaileroauth.php';
require_once '../../lib/phpmailer/PHPMailerAutoload.php';


$user = new usuario();

?>

<!DOCTYPE html>

<?php

$erro = (int) filter_input(INPUT_GET, 'erro');

if($_POST){

    $emailRecupera = filter_input(INPUT_POST, 'email');

    $user->setConfereEmail($emailRecupera);

    if($user->consultaEmailUsuario()){

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
        $email = $emailRecupera;
//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta        

        $mail->From = $to;  //email do remetente
        $mail->Sender = $to;  //email do remetente
        $mail->FromName = "RedeUnaViva | Jornada Real";   //Nome de formatado do remetente

        $mail->AddAddress($email);     //O destino do email
        $mail->Subject = "MSG AUTORUV: Recuperação de Senha - Não responder";// . $this->titulo; //Assunto do email
        $mail->CharSet = "UTF-8";
        
        $mail->Body = "<br>"; //Body of the message
        $mail->Body .= "<font face=$font size='$tamanho'>";
        $mail->Body .= "<font face=$font size='3'><b>RedeUnaViva | Jornada Real - Recuperação de Senha";// . $this->titulo . "</b></font>";
        $mail->Body .= "<br/><hr>";
        $mail->Body .= "<font face=$font size='2'>Prezados Senhores, </font>";
        $mail->Body .= "<br/><br/>";
        $mail->Body .= "<font face=$font size='2'>Foi informado o esquecimento da senha. Clique no link abaixo para alterar a sua senha:</font>";
        $mail->Body .= "<br><br>";
        $mail->Body .= "<a href='localhost:8080/redeunaviva/sistema/view/confirmaSenha.php?cemail=1&u=".base64_encode($email)."'>Alterar a senha</a>";
        $mail->Body .= "<br><br>";
        $mail->Body .= "<font face=$font size='$tamanho'>Atenciosamente,</font><br><br>";
        $mail->Body .= "<br><hr size='2'>";
        $mail->Body .= "<font face=$font size='$tamanho'>AutoRUV - Mensagem Automática</font><br><br>";
        $mail->Body .= "<br><hr size='2'>";
        $mail->Body.='</font>';

        if($mail->Send()){
            echo "<script>document.getElementById('erro').style.display='none'</script>";
            echo "<script>document.getElementById('sucesso').style.display='block'</script>";
            echo "<meta http-equiv='refresh' content='5;url=esqueciSenha.php'>";
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

    }else{
        echo "<script>";
        echo "  document.getElementById('erroEmail').style.display='block'";
        echo "</script>";
    }


}

/*
require_once "../classes/usuario.class.php";

    $identificacao = $_GET['usuario'];

    if($identificacao == ""){
        header("Location: ../index.php");
    }
    
    if($identificacao == '001001110'){
        $autorizaNovo = true;
    }
    
    $usuario = "michel";
//    $usuario = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS);
    $senha = "m1ch3l4p";
    $email = "pereira.michel@gmail.com";
    $dataCadastro = "2015-08-12";
//    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
//    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
//    $dataCadastro = filter_input(INPUT_POST, 'dataCadastro', FILTER_SANITIZE_SPECIAL_CHARS);
    $codTipoUsuario = 1;
    echo "Recebido informações...";
    $modeloUsuario = new modelUsuario();
    echo "<br>Chamada do modelo...";
    $modeloUsuario->setUsuario($usuario);
    $modeloUsuario->setSenha($senha);
    $modeloUsuario->setEmail($email);
    $modeloUsuario->setDataCadastro($dataCadastro);
    $modeloUsuario->setCodTipoUsuario($codTipoUsuario);
    $modeloUsuario->setDataUltimaAlteracao($dataCadastro);
    echo "<br>Setado as informações...";

    $modeloUsuario->ultimoRegistro();
    if($modeloUsuario->cadastraUsuario()){
        echo "Cadastro efetuado com sucesso";
    }else{
        echo "<br>Erro ao ser efetuado o cadastro";
    }*/
    
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>RUV - Esqueci a Senha</title>
        <link rel="shortcut icon" href="../../icon/ruv.ico">
        <link rel="icon" type="image/png" href="../../images/ruvicon.png">

        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link href="../css/animate.min.css" rel="stylesheet"> 
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <link href="../css/lightbox.css" rel="stylesheet">
        <link href="../css/main.css" rel="stylesheet">
        <link href="../css/presets/preset1.css" rel="stylesheet">
        <link href="../css/responsive.css" rel="stylesheet">

        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.min.js"></script>

        <script src="../js/validaCampos.js"></script>

        <script>
            function focus(){
                document.getElementById('email').focus();
            }
        </script>

        <?php
        if ($erro != "") {
            echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=../index.php'>";
        }
        ?>
        <script src='https://www.google.com/recaptcha/api.js'></script>

        <style type="text/css">
            body {
                padding-top: 30px;
                padding-bottom: 30px;
                background-color: rgba(255,255,255,.7);
                background-repeat: no-repeat;
            }

        </style>        

    </head>

    <body onload="focus()">

        <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms" style="background-color: rgba(30, 109, 255, 0.7); height: 550px; padding-top: 10px;">
            <div class="row">
                <div class="text-center">
                    <div class="col-sm-2">
                        &nbsp;
                    </div>
                    <div class="col-sm-8">
                        <img src="../../images/logoRUV350x250.png" width="240" height="180">
                        <p style="height: 20px;">&nbsp;</p>
     
                        <form name="primeirousuario" id="primeirousuario" method="post" action="<?php $PHP_SELF; ?>">
                                <label style="color: #fff;">Informe o seu e-mail e siga as intruções no seu e-mail.</label>
                                <p style="height: 20px;">&nbsp;</p>
                                <label style="color: #fff;">E-mail: </label>
                                <input type="email" name="email" id="email" class="form-control" style="background-color: #fff; right: 50%; left: 50%;">
                            </p>
                            <p style="height: 20px;">&nbsp;</p>
                            <input type="submit" value="Enviar" class="btn btn-default">
                            
                        </form>
                
                    </div>
                    <div class="col-sm-2">
                        &nbsp;
                    </div>

                    <div class="col-sm-12">
                        &nbsp;
                    </div>

                    <div class="col-sm-12 col-xs-12 col-md-12">
                        <div class="text-center">
                            <a href="../" target="_self" style="text-decoration: none;">
                                <button class="btn btn-default btn-sm">
                                    Voltar para o site
                                </button>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-12 col-xs-12 col-md-12">
                        &nbsp;
                    </div>
                    <!--<hr/>-->
                    <div class="col-sm-12 col-xs-12 col-md-12">
                        <div class="text-center">
                            <label class="label label-primary">Acesso ao Sistema RUV</label>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        &nbsp;
                    </div>

                    <div class="col-sm-12" id="erroEmail" name="erroEmail" style="display: none;">
                        <label class="label label-alert">E-mail não cadastrado.</label>
                    </div>


                </div>

            </div>
        </div>

    </body>
</html>
