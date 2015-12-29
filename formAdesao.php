<!DOCTYPE html>

<?php
require_once './view/formulario.php';
require_once './controller/constantes.php';
require_once './view/slideShow.php';
require_once './view/classFormAdesao.php';
require_once './texto/classTexto.php';
require_once './model/classLoginSite.php';

error_reporting(0);

$mensagem = filter_input(INPUT_GET, 'mensagem');


//$formulario = new formulario();

if($_POST){
    
    $login = new classLoginSite();
    
    $nome = filter_input(INPUT_POST, 'nome');
    $dataNascimento = filter_input(INPUT_POST, 'dataNascimento');
    $setenio = filter_input(INPUT_POST, 'setenio');
    $estadoCivil = filter_input(INPUT_POST, 'estadoCivil');
    $profissao = filter_input(INPUT_POST, 'profissao');
    $endereco = filter_input(INPUT_POST, 'endereco');
    $telefone = filter_input(INPUT_POST, 'telefone');
    $email = filter_input(INPUT_POST, 'email');
    $dataCadastroFormatada = filter_input(INPUT_POST, 'dataFormatada');
    $resumo = filter_input(INPUT_POST, 'resumo');
    $motivacao = filter_input(INPUT_POST, 'motivacao');
    $senha = filter_input(INPUT_POST, 'senha');
    $confirmEmail = "nao";
//    echo "Data de cadastro: ".$dataCadastroFormatada;
    
    $login->setNome($nome);
    $login->setDataNascimento($dataNascimento);
    $login->setSetenio($setenio);
    $login->setEstadoCivil($estadoCivil);
    $login->setProfissao($profissao);
    $login->setEndereco($endereco);
    $login->setTelefone($telefone);
    $login->setEmail($email);
    $login->setDataCadastro($dataCadastroFormatada);
    $login->setResumo($resumo);
    $login->setMotivacao($motivacao);
    $login->setSenha($senha);
    $login->setConfirmEmail($confirmEmail);
    
    if($login->verificaUsuarioEmail($nome, $email)){
        header("Location: formAdesao.php?mensagem=2");
    }else{
        $login->cadastraUsuario();
    }
    
}

?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->

        <meta name="viewport" content="width=device-width, user-scalable=no">
        <meta name="description" content="Bootstrap Sub-Menus">
        <meta name="keywords" content="bootstrap dropdown jquery-plugin submenu">
        <meta name="author" content="Vasily A.">
        <meta name="robots" content="nofollow">
        <meta name="google" content="notranslate">        
        <title><?php echo TITULORUV; ?></title>

        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">


        <link rel="shortcut icon" href="icon/ruv.ico">
        <link rel="icon" type="image/png" href="images/ruvicon.png">

        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap-submenu.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/docs.css">
        <link rel="stylesheet" href="css/estilo.css">
        <!--<link rel="stylesheet" href="css/style.css">-->

        <script src="js/jquery.js" defer=""></script>
        <script src="sistema/js/validaCampos.js" defer=""></script>
        <script src="js/bootstrap.js" defer=""></script>
        <script src="js/highlight.min.js" defer=""></script>
        <script src="js/bootstrap-submenu.js" defer=""></script>
        <script src="js/docs.js" defer=""></script>
        <!--<script src="js/control.js" defer=""></script>-->

        <script>
            $('.dropdown-submenu > a').submenupicker();
        </script>

        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $('body').addClass('images');
            });
        </script>
        <style>
            /*html, body, div, iframe {margin: 0px; padding: 0px}*/
            /*iframe{width: 100%; border: none; position: absolute}*/
            body
            {
                padding-top: 80px;
                background-color: <?php echo AMARELOCLARO; ?>
            }

        </style>
        <link rel="author" href="autor.txt">      
    </head>
    <body id="corAzulInfo">
        <header id="header">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="corAzulInfo">
                <div class="text-center">
                    <div class="navbar-text-top">
                        <?php
                        $titulo = new slideShow();
                        $titulo->telaTitulo();
                        ?>
                    </div>
                </div>
            </nav>
        </header><!-- /header -->

        <div id="content">
            <div class="bs-docs-header bs-docs-first">
                <div class="container">

                    <div class="col-md-12">
                            
                        <?php
                            $adesao = new classFormAdesao();
                            
                            $adesao->telaFormAdesao();
                            
                        ?>

                    </div>

                    <?php
                        if($mensagem == 1){
                            echo "<div class='text-center'>";
                            echo "  <label class='label label-success'>Cadastro efetuado com sucesso!</label>";
                            echo "</div>";
                            echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=formAdesao.php'>";
                        }else if($mensagem == 2){
                            echo "<div class='text-center'>";
                            echo "  <label class='label label-danger'>Usuário já cadastrado.</label>";
                            echo "</div>";
                            echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=formAdesao.php'>";
                        }
                    ?>
                    <p style="height: 120px">&nbsp;</p>
                    <!--</div>-->
                </div>
            </div>
            <br/><br/>

            <!--<div class="col-md-3"></div>-->
            
        </div>
        <!-- Parte de baixo da página -->
        <footer id="footer">
            <p style="height: 150px;"></p>
            <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation" id="corAzulInfo">
                <?php
                    $titulo->preparaMenu("formAdesao");
                ?>

            </nav>

        </footer>

        <!-- EOF -->
        <div id="topcontrol" title="Voltar ao topo" style="position: fixed; bottom: 55px; right: 4px; opacity: 0; cursor: pointer;">
            <img src="images/up.png" style="width:30px; height:30px"></div>
        <div id="topcontrol" title="Voltar ao topo" style="position: fixed; bottom: 55px; right: 4px; opacity: 0; cursor: pointer;">
            <img src="images/up.png" style="width:30px; height:30px">
        </div>


    </body>
</html>