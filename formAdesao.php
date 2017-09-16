<!DOCTYPE html>

<?php
require_once './view/formulario.php';
require_once './controller/constantes.php';
require_once './view/slideShow.php';
require_once './view/classFormAdesao.php';
require_once './texto/classTexto.php';
require_once './model/classLoginSite.php';

require_once './controller/metodos.php';
require_once './lib/phpmailer/class.phpmailer.php';
require_once './lib/phpmailer/class.smtp.php';
require_once './lib/phpmailer/class.pop3.php';
require_once './lib/phpmailer/class.phpmaileroauth.php';
require_once './lib/phpmailer/PHPMailerAutoload.php';


error_reporting(1);

$mensagem = filter_input(INPUT_GET, 'mensagem');


//$formulario = new formulario();
/*
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
*/
?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->

        <meta name="viewport" content="width=device-width, user-scalable=no">
        <meta name="description" content="Formulário de Adesão da Jornada de Meditação">
        <meta name="keywords" content="formulário formulario adesão adesao redeunaviva RUV RedeUnaViva">
        <meta name="author" content="autor.txt">
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

        <script src="sistema/js/jquery-ui.js" defer=""></script>
        <script src="sistema/js/metodos.js" defer=""></script>


        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
         
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript"></script>


        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
        <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>

        <script>
        $(function() {
            $("#calendario").datepicker({
                closeText: "Fechar", // Display text for close link
                prevText: "Mês Anterior", // Display text for previous month link
                nextText: "Próximo Mês", // Display text for next month link
                monthNames: [ "Janeiro","Fevereiro","Março","Abril","Maio","Junho",
                    "Julho","Agosto","Setembro","Outubro","Novembro","Dezembro" ], // Names of months for drop-down and formatting
                monthNamesShort: [ "Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez" ], // For formatting
                dayNames: [ "Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado" ], // For formatting
                dayNamesShort: [ "Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab" ], // For formatting
                dayNamesMin: [ "Dom","Seg","Ter","Qua","Qui","Sex","Sab" ], // Column headings for days starting at Sunday
                dateFormat: 'dd/mm/yy',
                language: 'pt-BR'
            });
        });
        </script>        



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
                margin: 0px;
                background-color: <?php echo AZULFUNDOCLARO; ?>;
            }
            @media only screen and (min-height : 1195px){
                body
                {
                    margin-top: 80px;
                    padding-top: 80px;
                }
                #espacamento
                {
                    height: 30px;
                }
            }
        </style>
        <link rel="author" href="autor.txt">      
    </head>
    <body>
    <?php require_once './analyticstracking.php'; ?>
        
        
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="corAzulInfo">
                <div class="navbar-text-top">
                    <!--<div class="navbar-text-top"> #D9EDF7-->
                    <?php
                    $titulo = new slideShow();
                    $titulo->telaTitulo();
                    ?>

                </div>
            </nav>


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
        <div id="espacamento">&nbsp;</div>
        <!-- Parte de baixo da página -->
        <footer id="footer">
            <nav class="navbar navbar-default navbar-fixed-bottom" id="corAzulInfo" style="background-color: #BFE0F1;">
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