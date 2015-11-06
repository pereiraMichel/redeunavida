<?php

//SISTEMA

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__).'/error_log.txt');
error_reporting(E_ALL);

require_once 'classes/classes.php';
require_once 'model/modelUsuario.php';


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
        $modelUsuario = new modelUsuario();
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

        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">

        <link rel="shortcut icon" href="../icon/ruv.ico">
        <link rel="icon" type="image/png" href="../images/ruvicon.png">

        <link rel="stylesheet" href="../css/bootstrap-submenu.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/bootstrap-responsive.css">
        <link rel="stylesheet" href="../css/estilo.css">

        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.js"></script>
        <script src="../js/bootstrap-submenu.js"></script>
        <script src="../js/jquery-migrate.min.js"></script>
        <script src="js/validaCampos.js"></script>        

        <!--<link rel="stylesheet" href="slide.php" type="text/css" />-->
        <?php
        if ($erro != "") {
            echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=index.php'>";
        }
        ?>
        <script src='https://www.google.com/recaptcha/api.js'></script>

        <style type="text/css">
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #f5f5f5;
            }

            .form-signin {
                max-width: 400px;
                padding: 19px 29px 29px;
                margin: 0 auto 20px;
                background-color: #fff;
                border: 1px solid #e5e5e5;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
            }
            .form-signin .form-signin-heading,
            .form-signin .checkbox {
                margin-bottom: 10px;
            }
            .form-signin input[type="text"],
            .form-signin input[type="password"] {
                font-size: 16px;
                height: auto;
                margin-bottom: 15px;
                padding: 7px 9px;
            }
        </style>        

    </head>

    <body>
        <!--    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
        <header id="header">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <?php
                $titulo = new classes();
                $titulo->telaSuperior();
                ?>

            </nav>
        </header><!-- /header -->
        <div id="content">
            <div class="row">
                <div class="col-sm-12 col-xs-12 col-md-12">

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
            </div>
            <div class="row">
                <div class="col-sm-12 col-xs-12 col-md-12">
                    <div class="text-center">
                        <a href="../" target="_self" style="text-decoration: none;">
                            <button class="btn btn-default btn-sm">
                                Voltar para o site
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            
        </div>

        <footer>

            <p style="height: 90px"></p>
            <hr/>
            <div class="col-sm-12 col-xs-12 col-md-12">
                <div class="text-center">
                    <label class="label label-primary">Acesso ao Sistema RUV</label>
                </div>
            </div>
        </footer>        

    </body>
</html>


