<?php
    error_reporting(0);
    session_destroy();
    $erro = (int) $_GET['erro'];
    
//    use modelUsuario;

    /* @var $_POST type */
    $nomeMail = utf8_decode($_POST['login']);
    $senha = utf8_decode($_POST['senha']);
    
    if (strlen($nomeMail) != 0 || strlen($senha) != 0){
        require 'controller/controlUsuario.php';
        $controleUsuario = new controlUsuario();
        $controleUsuario->setUsuario($nomeMail);
        $controleUsuario->setSenha($senha);

        if($controleUsuario->validaUsuario()){
            require 'model/modelUsuario.php';
            $modelUsuario = new modelUsuario();
            $modelUsuario->validaUser($nomeMail, $senha);
        }
    }
    
    
    

?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>SISTEMA RUV</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" href="../icon/ruv.ico">
        <link rel="icon" type="image/png" href="../images/ruvicon.png">
        <link rel="stylesheet" href="slide.php" type="text/css" />
<?php
    if ($erro != ""){
        echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=index.php'>";
    }

?>
        <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>

  <body>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<form name="login" action="<?php $PHP_SELF; ?>" method="post">
<div id="logmsk" style="display: block;">
    <div id='close'>X</div>
    <div id="userbox">
        <h1 id="signupImg1" style="background-position: initial initial; background-repeat: initial initial;">
        <!--<h1 id="signupImg1" style="background-color: rgb(118, 171, 219); background-position: initial initial; background-repeat: initial initial;">-->
                        <img src="../images/logoRUV50x51.png">
        </h1>
        <h1 id="signup" style="background-position: initial initial; background-repeat: initial initial;">
        <!--<h1 id="signup" style="background-color: rgb(118, 171, 219); background-position: initial initial; background-repeat: initial initial;">-->
            Acesso ao sistema RUV
        </h1>
        
        <div id="sumsk" style="display: none;">Acessando...</div>
        <input id="name" name="login" placeholder="Login ou E-mail" style="opacity: 1; background-color: rgb(255, 255, 255); background-position: initial initial; background-repeat: initial initial;">
        <input id="pass" name="senha" type="password" placeholder="Senha" style="opacity: 1; background-color: rgb(255, 255, 255); background-position: initial initial; background-repeat: initial initial;">
        <p id="logint" style="opacity: 1;">
            Esqueci minha senha
                <br/><br/>
            <div class="g-recaptcha" data-sitekey="6Ler6goTAAAAAGUIPGZWQ6kNCp1g4UMD0EN_d3xY"></div>        
        </p>
        <?php

            switch ($erro){
                case 1: echo "<br><p id='logint'><font color='red'>Usuário e/ou senha inválido</font></p>";
                    break;
            }
        ?>
        <p id="nameal" style="display: none; opacity: 1;">LOGIN</p>
        <p id="passal" style="display: none; opacity: 1;">SENHA</p>
        <button id="signupb" style="opacity: 0.2; cursor: default;">Acessar</button>
    </div>
</div>
</form>    
        <script src="js/index.js"></script>

        
  </body>
</html>


