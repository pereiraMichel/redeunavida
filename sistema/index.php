<?php

//SISTEMA

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__).'/error_log.txt');
error_reporting(E_ALL);
//date_format_timezone_set('Ameria/Sao_paulo');


require_once 'classes/classes.php';
require_once 'classes/atividades.class.php';
require_once './classes/usuario.class.php';
require_once 'model/modelUsuario.php';
require_once '../controller/constantes.php';
include_once './classes/paragem.inc.php';


//error_reporting(0);
$erro = (int) filter_input(INPUT_GET, 'erro');

//    use modelUsuario;

/* @var $_POST type */
$nomeMail = utf8_decode(filter_input(INPUT_POST, 'login'));
$senha = utf8_decode(filter_input(INPUT_POST, 'senha'));

if (strlen($nomeMail) != 0 || strlen($senha) != 0) {
//    require 'controller/controlUsuario.php';
//    $controleUsuario = new controlUsuario();
//    $controleUsuario->setUsuario($nomeMail);
//    $controleUsuario->setSenha($senha);
//
//    if ($controleUsuario->validaUsuario()) {
        $modelUsuario = new usuario();
        $modelUsuario->setSenha($senha);
        $modelUsuario->validaUser($nomeMail);

//    }
}



?>

<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>Sistema RUV - Acesso Restrito</title>
        <!--<link rel="stylesheet" href="css/style.css">-->
        <link rel="shortcut icon" href="../icon/ruv.ico">
        <link rel="icon" type="image/png" href="../images/ruvicon.png">

        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="css/animate.min.css" rel="stylesheet"> 
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/lightbox.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/presets/preset1.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script src="js/validaCampos.js"></script>

        <script>
            function focus(){
                document.getElementById('login').focus();
            }
        </script>

        <!--<link rel="stylesheet" href="slide.php" type="text/css" />-->
        <?php
        if ($erro != "") {
            echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=index.php'>";
        }
        ?>
        <script src='https://www.google.com/recaptcha/api.js'></script>

        <style type="text/css">
            body {
                padding-top: 30px;
                padding-bottom: 30px;
/*                background-color: rgba(86, 96, 204, 0.9);*/
/*                background-color: <?php //echo AZULINFO; ?>;*/
/*                background-image: url(img/fundo_site.png); */
/*                background-image: url(img/quantum.jpg); */
/*                background-image: url(img/abstrato.png);*/
                background-color: rgba(255,255,255,.7);
                background-repeat: no-repeat;
            }

        </style>        

    </head>

    <body onload="focus()">

                <?php
                $titulo = new classes();
                
//                paragem::teste();
                        
                
                ?>

        <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms" style="background-color: rgba(30, 109, 255, 0.7); height: 550px; padding-top: 10px;">
            <div class="row">
                <div class="text-center">
                    <div class="col-sm-4">
                        &nbsp;
                    </div>
                    <div class="col-sm-4">

                        <!--<p style="height: 125px;">&nbsp;</p>-->
<!--                        <div style="background-image: url('../images/acessoRestritoMAPTI.png'); background-repeat: no-repeat; width: 250px;">&nbsp;</div>-->
                        <img src="../images/logoRUV350x250.png" width="240" height="180">
                        <!--<div style="color: #fff;">ACESSO RESTRITO</div>-->
                        <p style="height: 20px;">&nbsp;</p>
                        <?php
                        $titulo->telaLogin();
                        ?>

                        <br/>
                        <?php
                        switch ($erro) {
                            case 1: echo "<div class='text-center'><br><p id='logint'><font color='red'>Usuário e/ou senha inválido</font></p></div>";
                                break;
                        }
                        ?>


                    </div>
                    <div class="col-sm-4">
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


