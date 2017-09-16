<!DOCTYPE html>

<?php

$erro = (int) filter_input(INPUT_GET, 'erro');

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
     
                        <form name="primeirousuario" method="post" action="<?php $PHP_SELF; ?>">
                                <label>Informe o seu e-mail e siga as intruções no seu e-mail.</label>
                                <p style="height: 20px;">&nbsp;</p>
                                <label style="color: #fff;">E-mail: </label>
                                <input type="email" name="email" id="email" class="form-control" style="background-color: #fff; width: 200px;">
                            </p>
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

                </div>

            </div>
        </div>


    </body>
</html>
