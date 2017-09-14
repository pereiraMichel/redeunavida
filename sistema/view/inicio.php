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

include_once '../classes/ultimoId.inc.php';
include_once '../classes/perfil.class.php';
include_once '../classes/Endereco.class.php';
include_once '../classes/telefone.inc.php';
include_once '../classes/setenio.inc.php';
include_once '../classes/tipotelefone.class.php';
include_once '../classes/tipousuario.inc.php';
include_once '../classes/ppMeditacao.class.php';
include_once '../classes/ppPortais.class.php';
include_once '../classes/bonus.class.php';
include_once '../classes/ParagemPresenca.class.php';
include_once '../classes/autoavaliacao.class.php';
include_once '../classes/relatorios.class.php';
include_once '../classes/tarefas.class.php';
include_once '../classes/servExtras.class.php';
include_once '../classes/atividades.class.php';
include_once '../classes/Pesquisas.class.php';
include_once '../classes/import.class.php';
include_once '../classes/grupos.class.php';
//include_once '../relatorios/relatorio.php';
include_once '../../controller/constantes.php';
include_once '../constante/constanteSistema.php';
include_once '../../controller/metodos.php';
include_once '../model/modelConfig.php';
include_once '../model/modelAtividades.php';
include_once '../erros/erros.php';
include_once '../conexao/conectaBanco.php';
include_once '../classes/configuracao.class.php';
include_once '../classes/usuario.class.php';
require_once 'telas.php';
require_once '../../controller/calendarioRuv.php';
require_once '../../lib/mpdf/mpdf.php';
require_once '../../lib/phplot-6.2.0/phplot.php';
require_once '../../lib/fpdf/fpdf.php';

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

$a = new atividades();
$saida = filter_input(INPUT_GET, 'saida');

if($saida == "sim"){
    $_SESSION['logado'] = false;

    $a->writeLog($_SESSION['usuario'], "Saída do sistema", "../controller/");
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
$tarefas = new tarefas();
$servExtras = new servExtras();
$cal = new calendarioRuv();
$a = new atividades();
$pesquisa = new Pesquisas();
$bonus = new bonus();
$grupos = new grupos();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">

	<title>Sistema RUV</title>

        <link rel="stylesheet" href="../../assets/css/font-awesome.min.css"> <!-- Responsável por emitir figuras -->
        <link rel="stylesheet" href="../../css/font-awesome.min.css"> <!-- Responsável por emitir figuras -->
        <link rel="stylesheet" href="http://fontawesome.io/icons/">
        
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
        <link rel="stylesheet" href="../css/simple-sidebar.css">
        <link rel="stylesheet" href="../css/jquery-ui.css">
        <link rel="stylesheet" href="../css/jquery-ui.mnin.css">
        <link rel="stylesheet" href="../css/jquery-ui.structure.css">
        <!--<link rel="stylesheet" href="../../css/bootstrap-submenu.css">-->
        
        <!--<script src="../../js/jquery.js" defer=""></script>-->
        <!--<script src="../../js/highlight.min.js" defer=""></script>-->
        <!--<script src="../../js/docs.js" defer=""></script>-->
        <script src="../js/validaCampos.js" defer=""></script>
        <script src="../js/bootstrap-tab.js" defer=""></script>
        <script src="../../js/modal.js" defer=""></script>
        <script src="../../js/bootstrap-submenu.js" defer=""></script>
        <script src="../js/metodos.js" defer=""></script>
        <script src="../js/jquery-ui.js" defer=""></script>


        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
         
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript"></script>


        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
        <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>


        <script>
            $('.dropdown-submenu > a').submenupicker();
        </script>

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
            $("#calendarioInicial").datepicker({
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
            $("#calendarioFinal").datepicker({
//                showOn: "button",
//                buttonImage: "calendario.png",
//                showButtonPanel: true,
//                buttonImageOnly: true,
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
<!--
        <style type="text/css">
            body {
                /*overflow-x:hidden;
                overflow-y:hidden;*/
            }
        <style>        
       -->
</head>
<body onload="hora()">
<!-- <meta http-equiv="refresh" content="5;url=inicio.php"> -->

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
                    <div class="col-sm-2">
                        <div id="sidebar-wrapper" style="background-color: rgba(6, 151, 255, 1); width: 220px;">
                            <ul class="sidebar-nav" style="color: #1f226d; font-weight: bold;" id="menuRuv"> <!--  # -->
                                <li class="sidebar-brand">
                                    <a href='inicio.php' style="font-size: 12px; color: #fff;">
                                        <img src="../../images/logoRUV50x51.png" width="35" height="36">
                                        MENU RUV
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="collapse" data-target="#menuRegistro" data-parent="#menuRuv" class="collapsed" style="color: #000; font-size: 12px; font-weight: bold;">
                                        <img src="../img/registrar2.png" title="Registro" width="30" height="30">
                                        Registro 
                                            <span class="caret"></span>
                                            <span style="font-size: 12px;" class="pull-right hidden-xs showopacity"></span>
                                    </a>
                                    <div id="menuRegistro" class="collapse" style="height: 0px;">
                                        <ul class="nav nav-list">
                                            <li>
                                                <a href="inicio.php?m=pp" style="font-size: 12px; color: #1f226d;">
                                                    <img src='../img/meditacao.jpg' title='Meditação' width='20' height='20'>
                                                    Meditação
                                                </a>
                                            </li>
                                            <li>
                                                <a href="inicio.php?m=port" style="font-size: 12px; color: #1f226d;">
                                                    <img src='../img/portal_blue.png' title='Prática dos Portais' width='20' height='30'>
                                                    Prática dos Portais
                                                </a>
                                            </li>
                                            <li>
                                                <a href="inicio.php?m=para" style="font-size: 12px; color: #1f226d;">
                                                    <img src='../img/colaboradores.png' title='Serviços e Extras' width='20' height='20'>
                                                    Presença-Paragens
                                                </a>
                                            </li>
                                            <li>
                                                <a href="inicio.php?m=taref" style="font-size: 12px; color: #1f226d;">
                                                    <img src='../img/cupomFiscal.png' title='Tarefas' width='20' height='20' style='text-align: center;'>
                                                    Tarefas
                                                </a>
                                            </li>
                                            <li>
                                                <a href="inicio.php?m=serv" style="font-size: 12px; color: #1f226d;">
                                                    <img src='../img/text-icon.png' title='Serviços e Extras' width='20' height='20'> Serviços e Extras
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <!--<li>
                                    <a href="inicio.php?m=pesq" style="color: #000; font-size: 12px; font-weight: bold;">Pesquisas</a>
                                </li>-->
                                <li>
                                    <a href="inicio.php?m=rela" style="color: #000; font-size: 12px; font-weight: bold;">
                                    <img src='../img/tarefas2.png' title='Paragem' width='20' height='20'>
                                        Relatório
                                    </a>
                                </li>
                                <li>
                                    <a href="inicio.php?m=bonu" style="color: #000; font-size: 12px; font-weight: bold;">
                                    <img src="../img/tasks.png" title="Tabuleta de Bônus" width="20" height="20">
                                        Tabela de Bônus
                                    </a>
                                </li>
                                <li>
                                    <a href="inicio.php?m=config" style="color: #000; font-size: 12px; font-weight: bold;">
                                        <img src="../img/panelControl.png" title="Configurações" width="20" height="20">
                                        Configurações
                                    </a>
                                </li>
<!--                                <li>
                                    <a href="#">&nbsp;</a>
                                </li> -->
 <!--                               <li>
                                    <a href="#">Atividades</a>
                                </li>
                                <li>
                                    <?php 

                                        //$a->readLog($_SESSION['usuario']); 

                                    ?>
                                </li>-->
<!--                                <li>
                                    <a href="#">
                                    <?php
                                        //$variavel = "17:21";
                                        //echo substr($variavel, 0, 2); // pega somente 17

                                        //Identifica o navegador
                                        $navegador = $_SERVER['HTTP_USER_AGENT'];

                                        if(preg_match('/Firefox/i', $navegador)){
                                            //echo "É Firefox";
                                        }
                                    ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">&nbsp;</a>
                                </li> -->
<!--                                <li style="color: #1f226d; font-weight: bold;">
                                    Índice de Investimento: 
                                </li>
                                <li style="color: #1f226d; font-weight: bold;">
                                    Grau de Bônus: 
                                </li> -->
                            </ul>
                        </div>
                              </div>
                    <div class="col-sm-10">


<div class="panel panel-info">
  <div class="panel-heading"> <!--  style="background-color: rgba(111, 162, 255, 0.7);"  -->
    <h5 class="panel-title">
                    <?php
                        switch ($menu){
                            case "": 
                                echo "<div align='center'><h5><b>Tesouro de Bônus</b></h5></div>";
//                                echo "<div class='col-sm-12'>";
//                                echo "  <div align='right'><h5><b>Índice de Investimento: </b></h5></div>";
//                                echo "  <div align='right'><h5><b>Grau de Bônus: </b></h5></div>";
//                                echo "</div>";
                                break;
                            case "mensagem": echo "<div align='center'><h5><b>".MENSAGENS."</b></h5></div>";
                                break;
                            case "ativ": echo "<div align='center'><h5><b>".ATIVIDADES."</b></h5></div>";
                                break;
                            case "bonu": echo "<div align='center'><h5><b>Tabela de ".BONUS."</b></h5></div>";
                                break;
//                            case "tare": echo "<div align='center'><h5><b>".TAREFAS."</b></h5></div>";
//                                break;
                            case "config": 
                                
                                if($tarefa == ""){
                                    echo "<div align='center'><h5><b>".CONFIGURACAO."</b></h5></div>";
                                }else if ($tarefa == "usis"){
                                    echo "<div align='center'><h5><b>".CONFIGUSUARIO."</b></h5></div>";
                                }else if ($tarefa == "usit"){
                                    echo "<div align='center'><h5><b>".CONFIGUSUARIOSITE."</b></h5></div>";
                                }else if ($tarefa === "set"){
                                    echo "<div align='center'><h5><b>Setênio</b></h5></div>";
                                }else if ($tarefa === "tipotelefone"){
                                    echo "<div align='center'><h5><b>Tipo de Telefone</b></h5></div>";
                                }else if ($tarefa === "tipousuario"){
                                    echo "<div align='center'><h5><b>Tipo de Usuários</b></h5></div>";
                                }else if ($tarefa === "ativ"){
                                    echo "<div align='center'><h5><b>Registro de Atividades</b></h5></div>";
                                }else if ($tarefa === "xb"){
                                    echo "<div align='center'><h5><b>Configurações de Bônus</b></h5></div>";
                                }else if($tarefa === "perf"){
                                    echo "<div align='center'><h5><b>Perfil - Sobre Você</b></h5></div>";
                                }else if($tarefa === "perfsv"){
                                    echo "<div align='center'><h5><b>".PERFILSV."</b></h5></div>";    
                                }else if( $tarefa === "perfend"){
                                    echo "<div align='center'><h5><b>".PERFILEND."</b></h5></div>";
                                }else if($tarefa ===  "perftel"){
                                    echo "<div align='center'><h5><b>".PERFILTEL."</b></h5></div>";
                                }else if($tarefa === "trocasenha"){
                                    echo "<div align='center'><h5><b>".PERFILTROCASENHA."</b></h5></div>";
                                }else if($tarefa === "bon"){
                                    echo "<div align='center'>";
                                    echo "<img src='../img/estatistica6.png' class='img-responsive' title='Bonificação' alt='Bonificação' width='50' height='50'>";
                                    echo "<h5><b>Bonificação</b></h5>";
                                    echo "</div>";
                                }else if($tarefa === "grupos"){
                                    echo "<div align='center'><h5 style='font-weight: bold;'>GRUPOS</h5></div>";
                                }
                                
                                break;
                            case "rela":
                                echo "<div align='center'>";
                                echo "<img src='../img/tarefas2.png' class='img-responsive' width='40' height='40'>";
                                switch ($tarefa){
                                    default:
                                        echo "<h5><b>Relatórios</b></h5>";
                                        break;
                                    case "medit":
                                        echo "<h5><b>Relatórios - Meditação</b></h5>";
                                        break;
                                    case "port":
                                        echo "<h5><b>Relatórios - Prática dos Portais</b></h5>";
                                        break;
                                    case "para":
                                        echo "<h5><b>Relatórios - Paragem-Presença</b></h5>";
                                        break;
                                    case "tare":
                                        echo "<h5><b>Relatórios - Tarefas</b></h5>";
                                        break;
                                    case "serv":
                                        echo "<h5><b>Relatórios - Serviços e Extras</b></h5>";
                                        break;
                                    case "usu":
                                        echo "<h5><b>Relatórios - Usuários</b></h5>";
                                        break;
                                    case "ind":
                                        echo "<h5><b>Relatórios - Índice</b></h5>";
                                        break;
                                }
                                echo "</div>";
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
                            case "taref":
                                    echo "<table>";
                                    echo "  <tr>";
                                    echo "      <td width='12%'>";
                                    echo "          <div align='center'>";
                                    echo "              <a href='inicio.php?m=para' style='text-decoration: none'>";
                                    echo "                  <img src='../img/colaboradores.png' class='img-responsive' title='Presença-Paragens' width='20' height='20'>";
                                    echo "                  <h6><b>Presença-Paragens</b></h6>";
                                    echo "              </a>";
                                    echo "          </div>";
                                    echo "      </td>";
                                    echo "      <td width='12%'>";
                                    echo "          <div align='center'>";
                                    echo "              <a href='inicio.php?m=serv' style='text-decoration: none'>";
                                    echo "                  <img src='../img/text-icon.png' class='img-responsive' title='Serviços e Extras' width='20' height='20'>";
                                    echo "                  <h6><b>Serviços e Extras</b></h6>";
                                    echo "              </a>";
                                    echo "          </div>";
                                    echo "      </td>";
                                    echo "      <td width='30%' style='background-color: rgba(255,255,255,0.5);' valign='center'>";

                                    echo "<div align='center'>";
                                    echo "  <img src='../img/cupomFiscal.png' class='img-responsive' title='Tarefas' width='42' height='42' style='text-align: center;'>";
                                     echo " <div align='center'><h5><b>Tarefas</b></h5></div>";
                                     echo "</div>";

                                    echo "      </td>";
                                    echo "      <td width='12%'>";
                                    echo "          <div align='center'>";
                                    echo "              <a href='inicio.php?m=pp' style='text-decoration: none'>";
                                    echo "              <img src='../img/meditacao.jpg' class='img-responsive' title='Meditação' width='35' height='35'>";
                                    echo "              <div align='center'><h6><b>Meditação</b></h6></div>";
                                    echo "              </a>";
                                    echo "          </div>";
                                    echo "      </td>";
                                    echo "      <td width='12%'>";
                                    echo "          <div align='center'>";
                                    echo "              <a href='inicio.php?m=port' style='text-decoration: none'>";
                                    echo "              <img src='../img/portal_blue.png' class='img-responsive' title='Prática dos Portais' width='40' height='40'>";
                                    echo "              <h6><b>Prática dos Portais</b></h6>";
                                    echo "              </a>";
                                    echo "          </div>";
                                    echo "      </td>";
                                    echo "  </tr>";
                                    echo "</table>";

                                break;
                            case "para": 

                                    echo "<table>";
                                    echo "  <tr>";
                                    echo "      <td width='12%'>";
                                    echo "          <div align='center'>";
                                    echo "              <a href='inicio.php?m=taref' style='text-decoration: none'>";
                                    echo "                  <img src='../img/cupomFiscal.png' class='img-responsive' title='Tarefas' width='22' height='22' style='text-align: center;'>";
                                    echo "                  <div align='center'><h6><b>Tarefas</b></h6></div>";
                                    echo "              </a>";
                                    echo "          </div>";
                                    echo "      </td>";
                                    echo "      <td width='12%'>";
                                    echo "          <div align='center'>";
                                    echo "              <a href='inicio.php?m=serv' style='text-decoration: none'>";
                                    echo "                  <img src='../img/text-icon.png' class='img-responsive' title='Serviços e Extras' width='20' height='20'>";
                                    echo "                  <h6><b>Serviços e Extras</b></h6>";
                                    echo "              </a>";
                                    echo "          </div>";
                                    echo "      </td>";
                                    echo "      <td width='30%' style='background-color: rgba(255,255,255,0.5);' valign='center'>";

                                    echo "<div align='center'>";
                                    echo "<img src='../img/colaboradores.png' class='img-responsive' title='Paragem' width='40' height='40'>";
                                        echo "<h5><b>Presença-Paragens</b></h5>";
                                    echo "</div>";

                                    echo "      </td>";
                                    echo "      <td width='12%'>";
                                    echo "          <div align='center'>";
                                    echo "              <a href='inicio.php?m=pp' style='text-decoration: none'>";
                                    echo "              <img src='../img/meditacao.jpg' class='img-responsive' title='Meditação' width='35' height='35'>";
                                    echo "              <div align='center'><h6><b>Meditação</b></h6></div>";
                                    echo "              </a>";
                                    echo "          </div>";
                                    echo "      </td>";
                                    echo "      <td width='12%'>";
                                    echo "          <div align='center'>";
                                    echo "              <a href='inicio.php?m=port' style='text-decoration: none'>";
                                    echo "              <img src='../img/portal_blue.png' class='img-responsive' title='Prática dos Portais' width='40' height='40'>";
                                    echo "              <h6><b>Prática dos Portais</b></h6>";
                                    echo "              </a>";
                                    echo "          </div>";
                                    echo "      </td>";
                                    echo "  </tr>";
                                    echo "</table>";

                                break;
                            case "pp": 

                                    echo "<table>";
                                    echo "  <tr>";
                                    echo "      <td width='12%'>";
                                    echo "          <div align='center'>";
                                    echo "              <a href='inicio.php?m=taref' style='text-decoration: none'>";
                                    echo "                  <img src='../img/cupomFiscal.png' class='img-responsive' title='Tarefas' width='22' height='22' style='text-align: center;'>";
                                    echo "                  <div align='center'><h6><b>Tarefas</b></h6></div>";
                                    echo "              </a>";
                                    echo "          </div>";
                                    echo "      </td>";
                                    echo "      <td width='12%'>";
                                    echo "          <div align='center'>";
                                    echo "              <a href='inicio.php?m=serv' style='text-decoration: none'>";
                                    echo "                  <img src='../img/text-icon.png' class='img-responsive' title='Serviços e Extras' width='20' height='20'>";
                                    echo "                  <h6><b>Serviços e Extras</b></h6>";
                                    echo "              </a>";
                                    echo "          </div>";
                                    echo "      </td>";
                                    echo "      <td width='30%' style='background-color: rgba(255,255,255,0.5);' valign='center'>";

                                    echo "          <div align='center'>";
                                    echo "              <img src='../img/meditacao.jpg' class='img-responsive' title='Meditação' width='45' height='45'>";
                                            if($tarefa === "" or $tarefa === null){
                                                echo "<div align='center'><h5><b>Meditação</b></h5></div>";
                                            }else if ($tarefa === "npp"){
                                                echo "<div align='center'><h5><b>Novo PP</b></h5></div>";
                                            }else if ($tarefa === "p1"){
                                                echo "<div align='center'><h5><b>PP - Meditação</b></h5></div>";
                                            }else if($tarefa === "auto"){
                                                echo "<div align='center'><h5><b>Meditação - Automático</b></h5></div>";
                                            }else if($tarefa === "manual"){
                                                echo "<div align='center'><h5><b>Meditação - Manual</b></h5></div>";
                                            }
                                    echo "      </div>";

                                    echo "      </td>";
                                    echo "      <td width='12%'>";
                                    echo "          <div align='center'>";
                                    echo "              <a href='inicio.php?m=port' style='text-decoration: none'>";
                                    echo "              <img src='../img/portal_blue.png' class='img-responsive' title='Paragem' width='35' height='35'>";
                                    echo "              <div align='center'><h6><b>Prática dos Portais</b></h6></div>";
                                    echo "              </a>";
                                    echo "          </div>";
                                    echo "      </td>";
                                    echo "      <td width='12%'>";
                                    echo "          <div align='center'>";
                                    echo "              <a href='inicio.php?m=para' style='text-decoration: none'>";
                                    echo "              <img src='../img/colaboradores.png' class='img-responsive' title='Presença-Paragens' width='20' height='20'>";
                                    echo "              <h6><b>Presença-Paragens</b></h6>";
                                    echo "              </a>";
                                    echo "          </div>";
                                    echo "      </td>";
                                    echo "  </tr>";
                                    echo "</table>";
                                break;
                            case "port": 
                                    echo "<table>";
                                    echo "  <tr>";
                                    echo "      <td width='12%'>";
                                    echo "          <div align='center'>";
                                    echo "              <a href='inicio.php?m=taref' style='text-decoration: none'>";
                                    echo "                  <img src='../img/cupomFiscal.png' class='img-responsive' title='Tarefas' width='22' height='22' style='text-align: center;'>";
                                    echo "                  <div align='center'><h6><b>Tarefas</b></h6></div>";
                                    echo "              </a>";
                                    echo "          </div>";
                                    echo "      </td>";
                                    echo "      <td width='12%'>";
                                    echo "          <div align='center'>";
                                    echo "              <a href='inicio.php?m=serv' style='text-decoration: none'>";
                                    echo "                  <img src='../img/text-icon.png' class='img-responsive' title='Serviços e Extras' width='20' height='20'>";
                                    echo "                  <h6><b>Serviços e Extras</b></h6>";
                                    echo "              </a>";
                                    echo "          </div>";
                                    echo "      </td>";
                                    echo "      <td width='30%' style='background-color: rgba(255,255,255,0.5);' valign='center'>";

                                    echo "<div align='center'>";
                                    echo "<img src='../img/portal_blue.png' class='img-responsive' title='Prática dos Portais' width='45' height='45'>";
                                    if($tarefa === "" or $tarefa === null){
                                        echo "<div align='center'><h5><b>Prática dos Portais</b></h5></div>";
                                    }else if($tarefa === "auto"){
                                        echo "<div align='center'><h5><b>Prática dos Portais - Automático</b></h5></div>";
                                    }else if($tarefa === "manual"){
                                        echo "<div align='center'><h5><b>Prática dos Portais - Manual</b></h5></div>";
                                    }
                                    echo "</div>";

                                    echo "      </td>";
                                    echo "      <td width='12%'>";
                                    echo "          <div align='center'>";
                                    echo "              <a href='inicio.php?m=pp' style='text-decoration: none'>";
                                    echo "              <img src='../img/meditacao.jpg' class='img-responsive' title='Meditação' width='35' height='35'>";
                                    echo "              <div align='center'><h6><b>Meditação</b></h6></div>";
                                    echo "              </a>";
                                    echo "          </div>";
                                    echo "      </td>";
                                    echo "      <td width='12%'>";
                                    echo "          <div align='center'>";
                                    echo "              <a href='inicio.php?m=para' style='text-decoration: none'>";
                                    echo "              <img src='../img/colaboradores.png' class='img-responsive' title='Presença-Paragens' width='20' height='20'>";
                                    echo "              <h6><b>Presença-Paragens</b></h6>";
                                    echo "              </a>";
                                    echo "          </div>";
                                    echo "      </td>";
                                    echo "  </tr>";
                                    echo "</table>";

                                break;
                            case "serv": 
                                    echo "<table>";
                                    echo "  <tr>";
                                    echo "      <td width='12%'>";
                                    echo "          <div align='center'>";
                                    echo "              <a href='inicio.php?m=para' style='text-decoration: none'>";
                                    echo "                  <img src='../img/colaboradores.png' class='img-responsive' title='Presença-Paragem' width='20' height='20'>";
                                    echo "                  <h6><b>Presença-Paragens</b></h6>";
                                    echo "              </a>";
                                    echo "          </div>";
                                    echo "      </td>";
                                    echo "      <td width='12%'>";
                                    echo "          <div align='center'>";
                                    echo "              <a href='inicio.php?m=taref' style='text-decoration: none'>";
                                    echo "                  <img src='../img/cupomFiscal.png' class='img-responsive' title='Tarefas' width='22' height='22' style='text-align: center;'>";
                                    echo "                  <div align='center'><h6><b>Tarefas</b></h6></div>";
                                    echo "              </a>";
                                    echo "          </div>";
                                    echo "      </td>";
                                    echo "      <td width='30%' style='background-color: rgba(255,255,255,0.5);' valign='center'>";

                                    echo "<div align='center'>";
                                    echo "  <img src='../img/text-icon.png' class='img-responsive' title='Serviços e Extras' width='50' height='50'>";
                                    echo "  <h5><b>Serviços e Extras</b></h5>";
                                    echo "</div>";

                                    echo "      </td>";
                                    echo "      <td width='12%'>";
                                    echo "          <div align='center'>";
                                    echo "              <a href='inicio.php?m=pp' style='text-decoration: none'>";
                                    echo "              <img src='../img/meditacao.jpg' class='img-responsive' title='Meditação' width='35' height='35'>";
                                    echo "              <div align='center'><h6><b>Meditação</b></h6></div>";
                                    echo "              </a>";
                                    echo "          </div>";
                                    echo "      </td>";
                                    echo "      <td width='12%'>";
                                    echo "          <div align='center'>";
                                    echo "              <a href='inicio.php?m=port' style='text-decoration: none'>";
                                    echo "              <img src='../img/portal_blue.png' class='img-responsive' title='Prática dos Portais' width='40' height='40'>";
                                    echo "              <h6><b>Prática dos Portais</b></h6>";
                                    echo "              </a>";
                                    echo "          </div>";
                                    echo "      </td>";
                                    echo "  </tr>";
                                    echo "</table>";

                                break;
                            case "pesq": 
                                    echo "<div align='center'>";
                                    echo "  <img src='../img/zoom.png' class='img-responsive' title='Serviços e Extras' width='50' height='50'>";
                                    echo "  <h5><b>Pesquisas</b></h5>";
                                    echo "</div>";
                                break;
                        }

//                       echo "<meta http-equiv='refresh' content='5;url=inicio.php'>";
                    ?>
        
    
    </h5>
  </div>
  <div class="panel-body">
      <script>
        var tempo = "<?= time(); ?>";
      </script>


                        <div class="row placeholders">
                            <div class="col-sm-12">
                            <!-- altere a parte de baixo em cada menu -->
                            <?php
                            
                                switch ($menu){
                                    default:
                                                    

                            ?>

                            <div class="col-sm-12 placeholder">
                                <a role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="text-decoration: none;">
                                    <img src="../img/registrar2.png" class="img-responsive" title="Registro" width="45" height="45">
                                    <h5 style='font-weight: bold;'>
                                        Registro
                                    </h5>
                                </a>
                                <div class="collapse" id="collapseExample">
                                      <div> <!--  class="well" -->
                                        <table class='table'>
                                            <tr>
                                                <td>
                                                    <a href="inicio.php?m=pp" class="acesso">
                                                        <img src="../img/meditacao.jpg" class="img-responsive" title="Meditação" width="60" height="60">
                                                        <h5 style="font-weight: bold;">Meditação</h5>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="inicio.php?m=port" class="acesso">
                                                        <img src="../img/portal_blue.png" class="img-responsive" title="Portal" width="75" height="75">
                                                        <h5 style="font-weight: bold;">Prática dos Portais</h5>
                                                    </a>
                                                </td>
                                                <td>
                                                <a href="inicio.php?m=para" class="acesso">
                                                    <img src="../img/colaboradores.png" class="img-responsive" title="Presença-Paragens" width="43" height="43">
                                                    <h5 style="font-weight: bold;">Presença-Paragens</h5>
                                                </a>
                                                </td>
                                                <td>
                                                    <a href="inicio.php?m=taref" class="acesso">
                                                        <img src="../img/cupomFiscal.png" class="img-responsive" title="Tarefas" width="42" height="42">
                                                        <h5 style="font-weight: bold;">Tarefas</h5>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="inicio.php?m=serv" class="acesso">
                                                        <img src="../img/text-icon.png" class="img-responsive" title="Serviços e Extras" alt='Serviços e Extras' width="42" height="42">
                                                        <h5 style='font-weight: bold;'>
                                                            Serviços e Extras
                                                        </h5>
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                      </div>
                                </div>                            

                            </div>

                            <div class="col-sm-12 placeholder">
                                &nbsp;
                            </div>

                            <div class="col-sm-4 placeholder">
                                <a href="inicio.php?m=rela" class="acesso">
                                    <img src="../img/tarefas2.png" class="img-responsive" title="Relatórios" width="45" height="45">
                                    <h5 style="font-weight: bold;">Relatórios</h5>
                                </a>
                            </div>

                            <div class="col-sm-4 placeholder">
                                <a href="inicio.php?m=bonu" class="acesso">
                                    <img src="../img/tasks.png" class="img-responsive" title="Tabuleta de Bônus" width="45" height="45">
                                    <h5 style="font-weight: bold;">Tabela de Bônus</h5>
                                </a>
                            </div>
                            <div class="col-xs-4 col-sm-4 placeholder">
                                <a href="inicio.php?m=config" class="acesso">
                                    <img src="../img/panelControl.png" class="img-responsive" title="Configurações" width="45" height="45">
                                    <h5 style="font-weight: bold;">Configurações</h5>
                                </a>
                            </div>


                            <?php
                                        break;
                                    case "config":  
                                        
                                        if($tarefa == ""){
                                            $config->telaInicialConfig();

                                        }else if ($tarefa == "usis"){
                                            $funcao = filter_input(INPUT_GET, 'f');
                                            
                                            switch ($funcao){
                                                default :
                                                    $usuario_class->tabelaUsuarioSistema();
                                                    break;
                                                case "n":
                                                    $usuario_class->telaNovoUsuario();
                                                    break;
                                                case "a":
                                                    $usuario_class->telaAlteraUsuario();
                                                    break;
                                                case "e":
                                                    $usuario_class->deleteUsuario();
                                                    break;
                                            }
                                            
/*                                        }else if ($tarefa == "usit"){
                                            $funcao = filter_input(INPUT_GET, 'f');
                                            
                                            switch ($funcao){
                                                default :
                                                    $usuario_class->tabelaUsuarioSistema("SITE");
                                                    break;
                                                case "n":
                                                    $usuario_class->telaNovoUsuario("SITE");
                                                    break;
                                                case "a":
                                                    $usuario_class->telaAlteraUsuario();
                                                    break;
                                                case "e":
                                                    $usuario_class->deleteUsuario();
                                                    break;
                                            }*/
                                        }else if($tarefa === "set"){
                                            $setenio->tabelaSetenio();
                                        }else if($tarefa === "tipotelefone"){
                                            $tipotelefone->tabelaTipoTelefone();
                                        }else if($tarefa === "tipousuario"){
                                            $tipousuario->tabelaTipoUsuario();
                                        }else if($tarefa === "perf"){
                                            $perfil->telaPerfilPrincipal();
                                        }else if($tarefa === "perfsv"){
                                            $perfil->telaPerfil();
                                        }else if($tarefa === "perfend"){
                                            $endereco->preencheEndereco();
                                        }else if($tarefa === "perftel"){
                                            $telefone->telaTelefone();
                                        }else if($tarefa === "trocasenha"){
                                            $perfil->telaTrocaSenha();
                                        }else if($tarefa === "ativ"){
                                            $a->setUsuario($_SESSION['usuario']);
                                            $a->telaRegistroAtividades();
                                        }else if($tarefa === "xb"){
                                            $a->setUsuario($_SESSION['usuario']);
                                            $a->telaConfigBonus();
                                        }else if($tarefa === "perf"){
                                            $perfil->telaPerfilPrincipal();
                                        }else if ($tarefa === "perfsv"){
                                            $perfil->telaPerfil();   
                                        }else if($tarefa === "perfend"){
                                            $endereco->preencheEndereco();   
                                        }else if($tarefa === "perftel"){
                                            $telefone->telaTelefone();
//                                        }else if($tarefa === "trocasenha"){
                                            //$trocaSenha = new modelConfig();
//                                            $trocaSenha = new configuracao();
//                                            $trocaSenha->telaTrocaSenha();
                                        }else if($tarefa === "bon"){
                                            $bonus->telaBonificacao();
                                        }else if($tarefa === "grupos"){
                                            $grupos->telaGrupos();
                                        }

                                        break;
                                    case "pp":      $pp = new ppMeditacao();
                                                    $pp->setCodusuario($_SESSION['idusuario']);
                                                    $cal = new calendarioRuv();
                                                    
                                                    switch($tarefa){
                                                        default: 
                                                            $cal->setCodusuario($_SESSION['idusuario']);
                                                            $cal->configuracaoCalendario("ppMeditacao");
//                                                            $pp->telaPP();
                                                            break;
                                                        
                                                        case "mp":
                                                            $cal->setCodusuario($_SESSION['idusuario']);
                                                            $cal->configuracaoCalendario("ppMeditacao");
//                                                            $pp->telaNovoPP();
                                                            break;
                                                    }
                                                    
//                                                    $pp->telaPP();
                                                            break;
                                    case "port":      
                                                    $pp = new ppPortais();
                                                    $pp->setCodusuario($_SESSION['idusuario']);
                                                    $cal = new calendarioRuv();
                                                    
                                                    switch($tarefa){
                                                        default: 
                                                            $cal->setCodusuario($_SESSION['idusuario']);
                                                            $cal->configuracaoCalendario("ppPortal");
                                                            break;
                                                    }
                                                    
                                                    break;
                                    case "rela":   
                                            $r = new relatorios();
                                            $r->setCodusuario($_SESSION['idusuario']);
                                            $r->setNomeUsuario($_SESSION['usuario']);
                                            switch ($tarefa){
                                                default :
                                                    $r->telaRelatorios();
                                                break;
                                            
                                                case "medit":
                                                    $r->telaOpcoes("relmedit");
                                                break;
                                                case "port":
                                                    $r->telaOpcoes("relport");
                                                break;
                                                case "para":
                                                    $r->telaOpcoes("relpara");
                                                break;
                                                case "tare":
                                                    $r->telaOpcoes("reltare");
                                                break;
                                                case "serv":
                                                    $r->telaOpcoes("relserv");
                                                break;
                                                case "usu":
                                                    $r->telaOpcoes("relusu");
                                                break;
                                                case "ind":
                                                    $r->telaOpcoes("relind");
                                                break;
                                                
                                        }
                                                            break;
                                    case "suporte":   
                                            $erro = new erros();
                                            $erro->error404();
                                                            break;
                                    case "bonu":   
                                            $bonus = new bonus();
                                            $bonus->setCodusuario($_SESSION['idusuario']);
                                            $bonus->telaInicialBonus();
                                                    
                                                    break;
                                    case "atividades":   
                                            $atividade = new modelAtividades();
                                            $atividade->telaInicialAtividades();
                                                    break;
                                                        
                                    case "para":            
                                                        
                                                        //$paragemPresenca->setCodusuario($_SESSION['idusuario']);
                                                            switch ($tarefa){

                                                                default:
                                                                    $cal->setCodusuario($_SESSION['idusuario']);
                                                                    $cal->configuracaoCalendario("paragempresenca");
                                                                    //$paragemPresenca->telaParagemPresenca();
                                                                    break;
                                                                
                                                            }
                                                            break;
                                    case "aval":            
                                                        $cal = new calendarioRuv();
                                                        $autoavaliacao = new autoavaliacao();
                                                        
                                                        $autoavaliacao->setCodusuario($_SESSION['idusuario']);
                                                            switch ($tarefa){

                                                                default:
                                                                    $autoavaliacao->telaAutoAvaliacao();
                                                                    break;
                                                                
                                                                case "naval":
                                                                    $cal->configuracaoCalendario("autoavalicacao");
//                                                                    $paragemPresenca->telaNovaParagem();
                                                                    break;
                                                                
                                                                case "edaval":
                                                                    $paragemPresenca->telaEditAutoAvaliacao();
                                                                    break;

                                                                case "exaval":
                                                                    $paragemPresenca->telaExcluiAutoAvaliacao();
                                                                    break;

                                                            }
                                                            break;
                                    case "taref":
                                                    //echo "<script>alert('".$_SESSION['idusuario']."')</script>";
                                                    $cal->setCodusuario($_SESSION['idusuario']); 
                                                    $cal->configuracaoCalendario("tarefas");
                                                    //$tarefas->telaInicialTarefas();
                                                    break;
                                    case "serv":
                                                    $servExtras->setCodusuario($_SESSION['idusuario']); 
                                                    $cal->configuracaoCalendario("servicos");
                                                    break;
                                    case "pesq":
                                                    $pesquisa->setId_usuario($_SESSION['idusuario']); 
                                                    $pesquisa->telaPesquisas();
                                                    break;
                                    case "import":
                                                    $i = new import();
                                                    $i->telaImport();
                                                    break;
                                    
                                }//fecha o switch
                            
                            ?>

  </div>
</div>
                    
            </div> <!-- fecha o row -->
            </div> <!-- fecha o row -->
            
        </div> <!-- fecha o container fluid -->
        </div> <!-- fecha o container fluid -->
        </div> <!-- fecha o container fluid -->

        </div> <!-- fecha o col-sm-7 -->


<!-- Parte de baixo da página -->
<footer>
    <?php
        $modeloTelas->menuBaixo($_SESSION['usuario'])
    
    ?>
</footer>


<!-- <div id="topcontrol" title="Voltar ao topo" style="position: fixed; bottom: 55px; right: 4px; opacity: 0; cursor: pointer;">
    <img src="../../images/up.png" style="width:30px; height:30px"></div> -->
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
