<!DOCTYPE html>
<?php

    require_once "./metodos/metodos.class.php";

    $telas = new metodos();
    
?>

<html>
    <head>
        <meta charset="UTF-8">
	<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <meta name="description" content="painel RUV">
        <meta name="keywords" content="">
        <meta name="author" content="Michel Pereira">
        <meta name="robots" content="nofollow">
        <meta name="google" content="notranslate">
        
        <!-- CSS -->
        <link rel="stylesheet" href="../css/bootstrap-responsive.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/estilo.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="stylesheet" href="css/estiloPainel.css">
        
        <link rel="shortcut icon" href="../icon/ruv.ico">
        <link rel="icon" type="image/png" href="../images/ruvicon.png">
        
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <style>
            body
            {
                padding-top: 80px;
            }
            
        </style>
        
        <title>Painel RUV - Site</title>
    </head>
    <body>
        <header id="header">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="corAzulInfo">
                <div class="navbar-text-top">
                    <?php
                    //Preenche o cabeçalho
                    $telas->telaAcima();
                    ?>
                </div>
            </nav>
        </header><!-- /header -->
        <div id="content">
            <div id="titulo">
                Painel RUV - Uso Restrito
            </div>
            <p style="height: 30px;">&nbsp;</p>
            <div class="col-sm-3">&nbsp;</div>
            <div class="col-sm-6">
                <?php
                //Autorizado
                $a = filter_input(INPUT_GET, "a");
                $e = filter_input(INPUT_GET, "e");
                
                switch ($a){
                    default :
                        $telas->login();
                        break;
                    case "s":
                        $telas->BoasVindas();
                        break;
                }
                echo "<p style='height: 30px;'>&nbsp;</p>";
                switch ($e){
                    case "c":
                        $telas->criaEvento();
                        break;
                    case "l":
                        $telas->listaEvento();
                        break;
                }
                
                ?>
            </div>
            <div class="col-sm-3">&nbsp;</div>
        </div>
        
        <?php
        // put your code here
        ?>
        
        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        
    </body>
</html>
