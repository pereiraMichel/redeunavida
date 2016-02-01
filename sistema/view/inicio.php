<?php

ini_set('display_errors', 1);

include_once '../../controller/constantes.php';
include_once '../../controller/metodos.php';
include_once '../model/modelUsuario.php';
include_once '../model/modelPerfil.php';
include_once '../model/modelTelefone.php';
include_once '../model/modelEndereco.php';
include_once '../model/modelConfig.php';
include_once '../model/modelSuporte.php';
include_once '../model/modelBonus.php';
include_once '../model/modelAtividades.php';
include_once '../erros/erros.php';
include_once '../conexao/conectaBanco.php';
require_once 'telas.php';

//error_reporting(0);

$modeloTelas = new telas();

$modelUsuario = new modelUsuario();
$conectaBanco = new conectaBanco();
$conectaBanco->iniciaSessao();
//if(session_cache_expire(10)){//define o tempo para manter a sessão, em minutos
//    $_SESSION['logado'] = false;
//    session_destroy();
//    header("Location: ../index.php");
//    
//}
$codAutoridade = (int) $_SESSION['codTipoUsuario'];

$saida = filter_input(INPUT_GET, 'saida');

if($saida == "sim"){
    $_SESSION['logado'] = false;
    unset($_SESSION['idusuario']);
    unset($_SESSION['usuario']);
    unset($_SESSION['email']);
    unset($_SESSION['codTipoUsuario']);
    session_destroy();
    header("Location: ../index.php");
}

if($_SESSION['logado'] == false){
    header("Location: ../index.php");
}

$menu = filter_input(INPUT_GET, 'menu');
$tarefa = filter_input(INPUT_GET, 'tarefa');

$codigoUsuario = base64_decode(filter_input(INPUT_GET, 'usuario'));
$codigoUsuarioCodificado = filter_input(INPUT_GET, 'usuario');

//$modelUsuario->setIdUsuario($_SESSION['idusuario']);
//$modelUsuario->consultaUsuarioPerfil();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">

	<title><?php echo TITULOSISTEMA;?></title>

        <link rel="stylesheet" href="../../assets/css/font-awesome.min.css"> <!-- Responsável por emitir figuras -->
        <link rel="stylesheet" href="../../css/font-awesome.min.css"> <!-- Responsável por emitir figuras -->
        
        
        <link rel="shortcut icon" href="../../icon/ruv.ico">
        <link rel="icon" type="image/png" href="../../images/ruvicon.png">
        
        <link rel="stylesheet" href="../../css/bootstrap-responsive_1.css">
	<!--<link rel="stylesheet" href="../../css/bootstrap.min.css">-->
	<link rel="stylesheet" href="../../css/docs.css">
	<link rel="stylesheet" href="../../css/bootstrap.css">
        <link rel="stylesheet" href="../css/dashboard.css">
        <link rel="stylesheet" href="../css/styleme.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/estiloMenu.css">
        <!--<link rel="stylesheet" href="../../css/bootstrap-submenu.css">-->
        
<!--        <script src="../../js/jquery.js" defer=""></script>-->
        <!--<script src="../../js/highlight.min.js" defer=""></script>-->
        <!--<script src="../../js/docs.js" defer=""></script>-->
        <script src="../js/validaCampos.js" defer=""></script>
        <script src="../../js/modal.js" defer=""></script>
        <script src="../../js/bootstrap-submenu.js" defer=""></script>

        
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
 
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript"></script>
  

        <script>
            $('.dropdown-submenu > a').submenupicker();
        </script>

        <script type="text/javascript">
                jQuery(document).ready(function($) {
                        $('body').addClass('images');
                });
        </script>
        <link rel="author" href="../../autor.txt">

        <script type="text/javascript">
            function excluirTelefone(id, telefone){
                $(open("inicio.php?id="+id+"&telefone="+telefone));

            }        
        </script>
        
</head>
<body>

    <?php

        if($codAutoridade === 1 or $codAutoridade === 2 or $codAutoridade === 3){
            (boolean) $autoriza = true;
        }else{
            (boolean) $autoriza = false;
        }    
    ?>

	<header id="header">
            
            <?php
                $modeloTelas->menuSuperior($autoriza, $_SESSION['usuario'], $_SESSION['idusuario']);
            
            ?>
	</header>

        <!-- Meio da página -->
        <div id="content" style="padding: 15px 20px 0px 20px;">

            <div class="container-fluid">
                <div class="row">

<div class="panel panel-info">
  <div class="panel-heading">
    <h5 class="panel-title">
                    <?php
                        switch ($menu){
                            case "": echo "<div align='center'><h5><b>Acessos</b></h5></div>";
                                break;
                            case "perfil": echo "<div align='center'><h5><b>".PERFIL."</b></h5></div>";
                                break;
                            case "perfilsv": echo "<div align='center'><h5><b>".PERFILSV."</b></h5></div>";
                                break;
//                            case "perfilend": echo "<div align='center'><h5><b>".PERFILEND."</b></h5></div>";
//                                break;
                            case "perfiltel": echo "<div align='center'><h5><b>".PERFILTEL."</b></h5></div>";
                                break;
                            case "trocasenha": echo "<div align='center'><h5><b>".PERFILTROCASENHA."</b></h5></div>";
                                break;
                            case "mensagem": echo "<div align='center'><h5><b>".MENSAGENS."</b></h5></div>";
                                break;
                            case "atividades": echo "<div align='center'><h5><b>".ATIVIDADES."</b></h5></div>";
                                break;
                            case "bonus": echo "<div align='center'><h5><b>".BONUS."</b></h5></div>";
                                break;
                            case "tarefa": echo "<div align='center'><h5><b>".TAREFAS."</b></h5></div>";
                                break;
                            case "configuracoes": 
                                
                                if($tarefa == ""){
                                    echo "<div align='center'><h5><b>".CONFIGURACAO."</b></h5></div>";
                                }else if ($tarefa == "usersistema"){
                                    echo "<div align='center'><h5><b>".CONFIGUSUARIO."</b></h5></div>";
                                }else if ($tarefa == "usersite"){
                                    echo "<div align='center'><h5><b>".CONFIGUSUARIOSITE."</b></h5></div>";
                                }
                                
                                break;
                            case "relbonus": echo "<div align='center'><h5><b>".RELATORIOBONUS."</b></h5></div>";
                                break;
                            case "reltarefas": echo "<div align='center'><h5><b>".RELATORIOTAREFAS."</b></h5></div>";
                                break;
                            case "reljornadas": echo "<div align='center'><h5><b>".RELATORIOJORNADAS."</b></h5></div>";
                                break;
                            case "relparagem": echo "<div align='center'><h5><b>".RELATORIOPARAGEM."</b></h5></div>";
                                break;
                            case "relusuarios": echo "<div align='center'><h5><b>".RELATORIOUSUARIOS."</b></h5></div>";
                                break;
                            case "relatorios": echo "<div align='center'><h5><b>".RELATORIOS."</b></h5></div>";
                                break;
                            case "suporte": echo "<div align='center'><h5><b>".SUPORTE."</b></h5></div>";
                                break;
                        }

                        
                    ?>
        
    
    </h5>
  </div>
  <div class="panel-body">

                        <div class="row placeholders">
                            <!-- altere a parte de baixo em cada menu -->
                            <?php
                            
                                switch ($menu){
                                    case "":
                                                    

                            ?>
                            
                            <div class="col-xs-6 col-sm-3 placeholder">
                                <a href="inicio.php?menu=perfil" class="acesso">
                                    <img src="../../images/usuario.png" title="Perfil" class="img-responsive" width="50" height="50">
                                    <h4>Perfil</h4>
                                    <span class="text-muted">Altere o seu perfil.</span>
                                </a>
                            </div>
<!--                            <div class="col-xs-6 col-sm-3 placeholder">
                                <a href="#" class="acesso">
                                    <img src="../../images/mail_logo.png" class="img-responsive" title="Mensagens" width="100" height="100">
                                    <h4>Mensagens</h4>
                                    <span class="text-muted">Verifique suas mensagens.</span>
                                </a>
                            </div>-->
<!--                            <div class="col-xs-6 col-sm-3 placeholder">
                                <a href="#" class="acesso">
                                    <img src="../../images/tasks.png" class="img-responsive" title="Bônus" width="100" height="100">
                                    <h4>Bônus</h4>
                                    <span class="text-muted">Preencha seus bônus.</span>
                                </a>
                            </div> -->
                            <div class="col-xs-6 col-sm-3 placeholder">
                                <a href="inicio.php?menu=tarefa" class="acesso">
                                    <img src="../../images/tarefas.png" class="img-responsive" title="Tarefas" width="50" height="50">
                                    <h4>Tarefas</h4>
                                    <span class="text-muted">Verifique suas tarefas.</span>
                                </a>
                            </div>
                            <div class="col-xs-6 col-sm-3 placeholder">
                                <a href="inicio.php?menu=relatorios" class="acesso">
                                    <img src="../../images/tarefa.png" class="img-responsive" title="Relatórios" width="53" height="53">
                                    <h4>Relatórios</h4>
                                    <span class="text-muted">Consulte os relatórios.</span>
                                </a>
                            </div>
                            <div class="col-xs-6 col-sm-3 placeholder">
                                <a href="inicio.php?menu=suporte" class="acesso">
                                    <img src="../../images/logoMapTI.png" class="img-responsive" title="Relatórios" width="83" height="83">
                                    <h4>Suporte</h4>
                                    <span class="text-muted">Encaminhe uma mensagem.</span>
                                </a>
                            </div>

                            <div class="col-xs-6 col-sm-3 placeholder">
                                <a href="inicio.php?menu=bonus" class="acesso">
                                    <img src="../img/bonus.jpg" class="img-responsive" title="Bônus" width="50" height="50">
                                    <h4>Tabuleta de Bônus</h4>
                                    <span class="text-muted">Preencha o bônus.</span>
                                </a>
                            </div>

                            <?php
                                        break;
                                    case "perfil":  $perfil = new modelPerfil();
                                                    $perfil->telaPerfilPrincipal();
                                                    break;
                                    case "perfilsv":  $perfilsv = new modelPerfil();
                                                    $perfilsv->telaPerfil();
                                                    break;
//                                    case "perfilend":  $perfilend = new modelEndereco();
//                                                    $perfilend->telaEndereco();
//                                                    break;
                                    case "perfiltel":  $perfiltel = new modelTelefone();
                                                    $perfiltel->telaTelefone();
                                                    break;
                                    case "trocasenha":  $trocaSenha = new modelConfig();
                                                    $trocaSenha->telaTrocaSenha();
                                                    break;
                                    case "configuracoes":  
                                        
                                        if($tarefa == ""){
                                            $configuracao = new modelConfig();
                                            $configuracao->telaInicialConfig();
                                        }else if ($tarefa == "usersistema"){
                                            $configUsuario = new modelConfig();
                                            $configUsuario->telaNovoUsuario();
                                        }else if ($tarefa == "usersite"){
                                            $configUsuario = new modelConfig();
                                            $configUsuario->telaNovoUsuarioSite();
                                        }
                                        
                                        break;
                                    case "relatorios":   $erro = new erros();
                                                            $erro->error404();
                                                            break;
                                    case "suporte":   $erro = new erros();
                                                            $erro->error404();
                                                            break;
                                    case "bonus":   $bonus = new modelBonus();
                                                            $bonus->telaBonus();
                                                            break;
                                    case "atividades":   $atividade = new modelAtividades();
                                                            $atividade->telaInicialAtividades();
                                                            break;
//                                    case "suporte":   $suporte = new modelSuporte();
//                                                            $suporte->telaContato();
//                                                            break;
                                        
                                    
                                }//fecha o switch
                            
                            ?>

  </div>
</div>
                    
                    <!--  col-md-1 sidebar -->
                    <!--<div class="col-sm-3 col-md-2" style="padding-left: 40px;">-->
                    <!--<div class="col-sm-3 col-md-2 sidebar" style="padding-left: 40px;">-->
<!--                        <ul class="nav nav-sidebar" style="font-size: 11px;">
                            <li>&nbsp;</li>
                            <li class="active">
                                <img src="../../images/User-blue.png" width="150" height="150" title="<?php // echo $_SESSION['usuario']; ?>" class="img-circle">
                            </li>
                            <li>&nbsp;</li>
                            <li>E-mail: <?php // echo $_SESSION['email']; ?></li>
                            <li>&nbsp;</li>
                                <?php
//                                echo "Código do Usuário: ".$codigoUsuario;
//                                $modelUsuario->setIdUsuario($_SESSION['idusuario']);
//                                $modelUsuario->consultaUsuarioPerfil();
                                ?>
                        </ul>-->
&nbsp;

                    <!--</div>  col-sm-offset-3 col-md-10 col-md-offset-2 main -->
<!--                    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                             fim da alteração da parte de baixo 
                        </div>-->


                <!--</div>  fecha a coluna 9 -->
            </div> <!-- fecha o row -->
            
        </div> <!-- fecha o container fluid -->
        </div> <!-- fecha o container fluid -->
        </div> <!-- fecha o container fluid -->


<!-- Parte de baixo da página -->
<footer>
    <?php
        $modeloTelas->menuBaixo($_SESSION['usuario'])
    
    ?>
</footer>


<div id="topcontrol" title="Voltar ao topo" style="position: fixed; bottom: 55px; right: 4px; opacity: 0; cursor: pointer;">
    <img src="../../images/up.png" style="width:30px; height:30px"></div>
<div id="topcontrol" title="Voltar ao topo" style="position: fixed; bottom: 55px; right: 4px; opacity: 0; cursor: pointer;">
    <img src="../../images/up.png" style="width:30px; height:30px">
</div>

    <?php
//        if(filter_input(INPUT_GET, 'modal') === "sim"){
////         echo "<h1 style='text-align: right;'>Contém o parâmetro</h1>";
//         $perfiltel->deletaTelefone(filter_input(INPUT_GET, 'idtelefone'), filter_input(INPUT_GET, 'telefone'));
         
    ?>

        <?php
        
//        }
        
        ?>

<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript"> 
        $(document).ready(function(){
            $("#menuTopo li").hover(function(){
                $(this).find('ul:first').css('display', 'block');
            }, function(){
                $(this).find('ul:first').css('display', 'none');
            });
 
            });
    </script>
</body>
</html>
