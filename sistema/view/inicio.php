<?php

//define('__ROOT__', dirname(dirname(__FILE__)));
//
//require_once __ROOT__.'/conexao/conectaBanco.php';
//

ini_set('display_errors', 1);

include_once '../classes/ultimoId.inc.php';
include_once '../classes/perfil.class.php';
include_once '../classes/Endereco.class.php';
include_once '../classes/telefone.inc.php';
include_once '../classes/setenio.inc.php';
include_once '../classes/tipotelefone.class.php';
include_once '../classes/tipousuario.inc.php';
include_once '../../controller/constantes.php';
include_once '../constante/constanteSistema.php';
include_once '../../controller/metodos.php';
//include_once '../model/modelUsuario.php';
//include_once '../model/modelPerfil.php';
//include_once '../model/modelTelefone.php';
//include_once '../model/modelEndereco.php';
include_once '../model/modelConfig.php';
include_once '../model/modelSuporte.php';
include_once '../model/modelBonus.php';
include_once '../model/modelAtividades.php';
include_once '../erros/erros.php';
include_once '../conexao/conectaBanco.php';
include_once '../classes/configuracao.class.php';
include_once '../classes/usuario.class.php';
require_once 'telas.php';

//error_reporting(0);

$modeloTelas = new telas();

//$modelUsuario = new modelUsuario();
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

$menu = filter_input(INPUT_GET, 'm');
$tarefa = filter_input(INPUT_GET, 't');
$m = filter_input(INPUT_GET, 'me');

$codigoUsuario = base64_decode(filter_input(INPUT_GET, 'usuario'));
$codigoUsuarioCodificado = filter_input(INPUT_GET, 'usuario');

$config = new configuracao();
$usuario_class = new usuario();

//$modelUsuario->setIdUsuario($_SESSION['idusuario']);
//$modelUsuario->consultaUsuarioPerfil();

$perfil = new perfil();
$endereco = new Endereco();
$telefone = new telefone();
$setenio = new setenio();
$tipotelefone = new tipotelefone();
$tipousuario = new tipousuario();

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
        
        <script>
            function pegaUsuarioSist(usuario){
                document.getElementById('idSelecionado').value = usuario;
                $('#altera').removeAttr('disabled');
                $('#exclui').removeAttr('disabled');
                $('#detalhes').removeAttr('disabled');
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
                            case "perf": echo "<div align='center'><h5><b>".PERFIL."</b></h5></div>";
                                break;
                            case "perfsv": echo "<div align='center'><h5><b>".PERFILSV."</b></h5></div>";
                                break;
                            case "perfend": echo "<div align='center'><h5><b>".PERFILEND."</b></h5></div>";
                                break;
                            case "perftel": echo "<div align='center'><h5><b>".PERFILTEL."</b></h5></div>";
                                break;
                            case "trocasenha": echo "<div align='center'><h5><b>".PERFILTROCASENHA."</b></h5></div>";
                                break;
                            case "mensagem": echo "<div align='center'><h5><b>".MENSAGENS."</b></h5></div>";
                                break;
                            case "ativ": echo "<div align='center'><h5><b>".ATIVIDADES."</b></h5></div>";
                                break;
                            case "bonu": echo "<div align='center'><h5><b>".BONUS."</b></h5></div>";
                                break;
                            case "tare": echo "<div align='center'><h5><b>".TAREFAS."</b></h5></div>";
                                break;
                            case "config": 
                                
                                if($tarefa == ""){
                                    echo "<div align='center'><h5><b>".CONFIGURACAO."</b></h5></div>";
                                }else if ($tarefa == "usis"){
                                    echo "<div align='center'><h5><b>".CONFIGUSUARIO."</b></h5></div>";
                                }else if ($tarefa == "usit"){
                                    echo "<div align='center'><h5><b>".CONFIGUSUARIOSITE."</b></h5></div>";
                                }else if ($tarefa === "set"){
                                    echo "<div align='center'><h5><b>".SETENIOMENU."</b></h5></div>";
                                }else if ($tarefa === "tipotelefone"){
                                    echo "<div align='center'><h5><b>".TIPOTELEFONEMENU."</b></h5></div>";
                                }else if ($tarefa === "tipousuario"){
                                    echo "<div align='center'><h5><b>".TIPOUSUARIOMENU."</b></h5></div>";
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
                            case "fina": echo "<div align='center'><h5><b>Financeiro</b></h5></div>";
                                break;
                            case "para": echo "<div align='center'><h5><b>Paragem</b></h5></div>";
                                break;
                        }

       4                
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
                            
                            <div class="col-xs-6 col-sm-4 placeholder">
                                <a href="inicio.php?m=perf" class="acesso">
                                    <img src="../img/usuario.png" title="Perfil" class="img-responsive" width="50" height="50">
                                    <h4>Seu Perfil</h4>
                                    <!--<span class="text-muted">Altere o seu perfil.</span>-->
                                </a>
                            </div>

                            <div class="col-xs-6 col-sm-4 placeholder">
                                <a href="inicio.php?m=para" class="acesso">
                                    <img src="../img/tarefas.png" class="img-responsive" title="Paragem" width="50" height="50">
                                    <h4>Paragem</h4>
                                    <!--<span class="text-muted">Preencha a Paragem-Presença.</span>-->
                                </a>
                            </div>
                            <div class="col-xs-6 col-sm-4 placeholder">
                                <a href="inicio.php?m=rela" class="acesso">
                                    <img src="../img/tarefa.png" class="img-responsive" title="Relatórios" width="53" height="53">
                                    <h4>Relatórios</h4>
                                    <!--<span class="text-muted">Consulte os relatórios.</span>-->
                                </a>
                            </div>

                            <div class="col-xs-6 col-sm-4 placeholder">
                                <a href="inicio.php?m=bonu" class="acesso">
                                    <img src="../img/bonus.jpg" class="img-responsive" title="Bônus" width="50" height="50">
                                    <h4>Tabuleta de Bônus</h4>
                                    <!--<span class="text-muted">Preencha o bônus.</span>-->
                                </a>
                            </div>

                            <div class="col-xs-6 col-sm-4 placeholder">
                                <a href="inicio.php?m=config" class="acesso">
                                    <img src="../img/servicos.png" class="img-responsive" title="Bônus" width="60" height="60">
                                    <h4>Configurações</h4>
                                    <!--<span class="text-muted">Preencha o bônus.</span>-->
                                </a>
                            </div>

                            <div class="col-xs-6 col-sm-4 placeholder">
                                <a href="inicio.php?m=fina" class="acesso">
                                    <!--<i class='fa fa-cloud'></i>-->
                                    <img src="../img/estatistica8.png" class="img-responsive" title="Financeiro" width="63" height="63">
                                    <h4>Financeiro</h4>
                                    <!--<span class="text-muted">Encaminhe uma mensagem.</span>-->
                                </a>
                            </div>
                            <?php
                                        break;
                                    case "perf":    $perfil->telaPerfilPrincipal();
                                                    break;
                                    case "perfsv":  $perfil->telaPerfil();
                                                    break;
                                    case "perfend": $endereco->preencheEndereco();
                                                    break;
                                    case "perftel": $telefone->telaTelefone(); 
                                                    break;
                                    case "trocasenha":  
                                                    $trocaSenha = new modelConfig();
                                                    $trocaSenha->telaTrocaSenha();
                                                    break;
                                    case "config":  
                                        
                                        if($tarefa == ""){
                                            $config->telaInicialConfig();
                                        }else if ($tarefa == "usis"){
                                            $funcao = filter_input(INPUT_GET, 'f');
                                            
                                            switch ($funcao){
                                                default :
                                                    $usuario_class->tabelaUsuarioSistema("SISTEMA");
                                                    break;
                                                case "n":
                                                    $usuario_class->telaNovoUsuario();
                                                    break;
                                                case "a":
                                                    $usuario_class->telaAlteraUsuario();
                                                    break;
                                                case "e":
                                                    $usuario_class->telaExcluiUsuario();
                                                    break;
                                                case "d":
                                                    $usuario_class->telaDetalhesUsuario();
                                                    break;
                                            }
                                            
                                        }else if ($tarefa == "usit"){
                                            $usuario_class->tabelaUsuarioSistema("SITE");
                                        }else if($tarefa === "set"){
                                            $setenio->tabelaSetenio();
                                        }else if($tarefa === "tipotelefone"){
                                            $tipotelefone->tabelaTipoTelefone();
                                        }else if($tarefa === "tipousuario"){
                                            $tipousuario->tabelaTipoUsuario();
                                        }
                                        
                                        break;
                                    case "relat":   $erro = new erros();
                                                            $erro->error404();
                                                            break;
                                    case "suporte":   $erro = new erros();
                                                            $erro->error404();
                                                            break;
                                    case "bonu":   $bonus = new modelBonus();
                                                    $bonus->telaBonus();
                                                    
//                                                    if($m === "auto"){
//                                                        $bonus->metodoAutomatico();
//                                                    }else if($m === "manual"){
//                                                        $bonus->metodoManual();
//                                                    }
                                                            break;
                                    case "atividades":   $atividade = new modelAtividades();
                                                            $atividade->telaInicialAtividades();
                                                            break;
                                    case "para":   $erro = new erros();
                                                            $erro->error404();
                                                            break;
                                    case "fina":   $erro = new erros();
                                                            $erro->error404();
                                                            break;
//                                    case "suporte":   $suporte = new modelSuporte();
//                                                            $suporte->telaContato();
//                                                            break;
                                        
                                    
                                }//fecha o switch
                            
                            ?>

  </div>
</div>
                    
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
