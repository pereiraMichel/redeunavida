<?php
require_once '../../controller/constantes.php';
require_once '../../controller/metodos.php';
require_once '../model/modelUsuario.php';
require_once '../model/modelPerfil.php';
require_once '../conexao/conectaBanco.php';

error_reporting(0);

$modelUsuario = new modelUsuario();
$conectaBanco = new conectaBanco();
//session_cache_expire(30);//define o tempo para manter a sessão, em minutos
$conectaBanco->iniciaSessao();

$codAutoridade = (int) $_SESSION['codTipoUsuario'];

//if($_SESSION['idusuario'] === null){
//    header("Location: ../");
//}

$menu = $_GET['menu'];

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
        
        <link rel="stylesheet" href="../../css/font-awesome.min.css">
        <link rel="stylesheet" href="../../css/bootstrap-submenu.css">
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<link rel="stylesheet" href="../../css/docs.css">
        <link rel="stylesheet" href="../css/dashboard.css">
        <link rel="stylesheet" href="../css/styleme.css">
        <!--<link rel="stylesheet" href="../../css/style.css">-->
        
        <script src="../../js/jquery.js" defer=""></script>
        <script src="../../js/bootstrap.js" defer=""></script>
        <script src="../../js/highlight.min.js" defer=""></script>
        <script src="../../js/bootstrap-submenu.js" defer=""></script>
        <script src="../../js/docs.js" defer=""></script>
        <script src="../js/validaCampos.js" defer=""></script>

        <script>
            $('.dropdown-submenu > a').submenupicker();
        </script>

        <script type="text/javascript">
                jQuery(document).ready(function($) {
                        $('body').addClass('images');
                });
        </script>
        <link rel="author" href="../../autor.txt">

</head>
<body>
    <?php

        if($codAutoridade === 1 or $codAutoridade === 2 or $codAutoridade === 3){
            (boolean) $autoriza = true;
        }else{
            (boolean) $autoriza = false;
        }    
    ?>
    <!--<input onmo-->
	<header id="header">
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                    <div class="navbar-header navbar-text-top">
                        <div class="col-sm-2" style="height: 25px;">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Menu</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="hidden-sm" style="padding: 10px 100px 0px 0px;">
                            SISTEMA <span>RUV</span>
                        </div>
                        <div class="navbar-subtext-top hidden-sm">
                            <!--<span>RUV</span>-->
                        </div><!-- /hidden-sm -->
                        <div class="navbar-subtextsm-top visible-sm">
                            SISTEMA RUV
                        </div><!-- /visible-sm -->					

                    </div>
                    </div>

<div class="collapse navbar-collapse" style="padding-right: 20px;">
    <ul  class="nav navbar-nav navbar-right" id="menu" style="font-size: 12px;">
        <li id="home">
                <a href="inicio.php">
                        <i class="fa icon-home"></i> Início
                </a>
        </li>
        <li id="perfil">
            <a href="inicio.php?menu=perfil">
                        <i class="fa fa-user"></i> Perfil
                </a>
        </li>
        <li class="dropdown" id="mensagem">
            <a tabindex="0" data-toggle="dropdown">
            <i class="fa fa-envelope"></i> Mensagens
            <span class="caret"></span>
        </a>

        <!-- role="menu": fix moved by arrows (Bootstrap dropdown) -->
        <ul class="dropdown-menu" role="menu" style="font-size: 12px;">
            <li><a tabindex="0" data-toggle="dropdown" href="inicio.php?menu=msgenviar"><i class="fa fa-keyboard-o"></i> Enviar mensagem</a></li>
            <li><a tabindex="0" href="inicio.php?menu=msgenviada">Mensagens enviadas</a></li>
            <li><a tabindex="0" href="inicio.php?menu=msgrecebida">Mensagens recebidas</a></li>
        </ul>
      </li>
      <li class="dropdown" id="atividade">
        <a tabindex="0" data-toggle="dropdown">
            <i class="fa fa-archive"></i> Atividades
            <span class="caret"></span>
        </a>

        <!-- role="menu": fix moved by arrows (Bootstrap dropdown) -->
        <ul class="dropdown-menu" role="menu" style="font-size: 12px;">
            <li><a tabindex="0" href="inicio.php?menu=bonus"><i class="fa fa-group"></i> Bônus</a></li>
            <li><a tabindex="0" href="inicio.php?menu=tarefa"><i class="fa fa-clock-o"></i> Tarefas</a></li>
            <li><a tabindex="0" href="inicio.php?menu=jornada"><i class="fa fa-flag"></i> Jornadas</a></li>
            <li><a tabindex="0" href="inicio.php?menu=paragem"><i class="fa fa-share"></i> Paragem</a></li>

        </ul>
      </li>
        <li id="relatorio">
            <a tabindex="0" data-toggle="dropdown">
                <i class="fa fa-list"></i> Relatórios
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu" style="font-size: 12px;">
                <li class="dropdown-submenu">
                <li><a tabindex="0" href="inicio.php?menu=relbonus">Bônus</a></li>
                <li><a tabindex="0" href="inicio.php?menu=reltarefas">Tarefas</a></li>
                <li><a tabindex="0" href="inicio.php?menu=reljornadas">Jornadas</a></li>
                <li><a tabindex="0" href="inicio.php?menu=relparagem">Paragem</a></li>
                <li><a tabindex="0" href="inicio.php?menu=relusuarios">Usuários</a></li>
            </ul>
        </li>

            <?php
                if($autoriza){
                    echo "<li><a tabindex='0' data-toggle='dropdown'><i class='fa fa-windows'></i> Configurações</a></li>";
                }
            
            ?>
        <li id="relatorio">
            <a href="inicio.php?menu=suporte">
                <i class="fa fa-cloud"></i> Suporte
            </a>
        </li>

    </ul>


  </div>
</nav>
	</header>

        <!-- Meio da página -->
        
        <div id="content" style="padding: 30px 0px 0px 20px;">

            <div class="container-fluid">
                <div class="row"><!--  col-md-1 sidebar -->
                    <div class="col-sm-3 col-md-2 sidebar" style="padding-left: 40px;">
                        <ul class="nav nav-sidebar" style="font-size: 11px;">
                            <li>&nbsp;</li>
                            <li class="active">
                                <img src="../../images/User-blue.png" width="150" height="150" title="<?php echo $_SESSION['usuario']; ?>" class="img-circle">
                            </li>
                            <li>&nbsp;</li>
                            <li>E-mail: <?php echo $_SESSION['email']; ?></li>
                            <li>&nbsp;</li>
                                <?php
                                $modelUsuario->setIdUsuario($_SESSION['idusuario']);
                                $modelUsuario->consultaUsuarioPerfil();
                                ?>
                        </ul>
                    </div><!--  col-sm-offset-3 col-md-10 col-md-offset-2 main -->
                    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <?php
                        switch ($menu){
                            case "": echo "<h3 class='page-header'>Acessos</h3>";
                                break;
                            case "perfil": echo "<h3 class='page-header'>".PERFIL."</h3>";
                                break;
                            case "mensagem": echo "<h3 class='page-header'>".MENSAGENS."</h3>";
                                break;
                            case "bonus": echo "<h3 class='page-header'>".BONUS."</h3>";
                                break;
                            case "tarefa": echo "<h3 class='page-header'>".TAREFAS."</h3>";
                                break;
                        }
                    ?>
                        

                        <div class="row placeholders">
                            <!-- altere a parte de baixo em cada menu -->
                            <?php
                            
                                switch ($menu){
                                    case "":
                                                    

                            ?>
                            
                            <div class="col-xs-6 col-sm-3 placeholder">
                                <a href="inicio.php?menu=perfil" class="acesso" target="_self">
                                    <img src="../../images/usuario.png" title="Perfil" class="img-responsive" width="100" height="100">
                                    <h4>Perfil</h4>
                                    <span class="text-muted">Altere o seu perfil.</span>
                                </a>
                            </div>
                            <div class="col-xs-6 col-sm-3 placeholder">
                                <a href="#" class="acesso">
                                    <img src="../../images/mail_logo.png" class="img-responsive" title="Mensagens" width="100" height="100">
                                    <h4>Mensagens</h4>
                                    <span class="text-muted">Verifique suas mensagens.</span>
                                </a>
                            </div>
                            <div class="col-xs-6 col-sm-3 placeholder">
                                <a href="#" class="acesso">
                                    <img src="../../images/tasks.png" class="img-responsive" title="Bônus" width="100" height="100">
                                    <h4>Bônus</h4>
                                    <span class="text-muted">Preencha seus bônus.</span>
                                </a>
                            </div>
                            <div class="col-xs-6 col-sm-3 placeholder">
                                <a href="#" class="acesso">
                                    <img src="../../images/tarefas.png" class="img-responsive" title="Tarefas" width="100" height="100">
                                    <h4>Tarefas</h4>
                                    <span class="text-muted">Verifique suas tarefas.</span>
                                </a>
                            </div>
                            <?php
                                        break;
                                    case "perfil":  $perfil = new modelPerfil();
                                                    $perfil->telaPerfil();
                                                    break;
                                        
                                    
                                }//fecha o switch
                            
                            ?>
                            <!-- fim da alteração da parte de baixo -->
                        </div>


                </div> <!-- fecha a coluna 9 -->
            </div> <!-- fecha o row -->
            
        </div> <!-- fecha o container fluid -->


<!-- Parte de baixo da página -->
<footer>
		<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
			<div class="text-center">
				<div class="navbar-text-top">

                                        <div class="col-sm-4">
                                            <div class="hidden-sm">
                                                <figure class="navbar-logo navbar-left hidden-xs">
                                                    <a href="inicio.php">
                                                            <img src="../../images/logoRedeUnaVida.png" title="<?php echo TITULORUVBAIXO; ?>" width="75" height="61">
                                                    </a>
						</figure><!-- /figure -->
                                                <figure class="navbar-logo navbar-left hidden-xs" style="padding-left: 20px;">
                                                    <a href="inicio.php">
                                                        <img src="../../jr/jrLogomarca.png" title="<?php echo TITULOJRBAIXO; ?>" width="75" height="61" />                                      
                                                    </a>
                                                </figure>
                                            </div>
					</div>
                                        <div class="col-sm-4">
                                            <div class="hidden-sm">
                                                <?php
                                                    echo "Bem-vindo, <span>".$_SESSION['usuario']."</span>";
//                                                    echo "Bem-vindo, <span>".$_SESSION['usuario']."</span>";
                                                ?>
                                                
                                            </div>
					</div>

					<hr class="visible-xs"><!-- /hr -->
					<br class="visible-xs">
					<div class="col-sm-4">
						<div class="navbar-text navbar-right">
<!--                                                    <a href="#" class="text-link">
                                                        <button class="btn btn-primary">
                                                            <i class="fa fa-user"></i> Cadastre-se
                                                        </button>
                                                    </a>-->
                                                    <a href="../../sistema/" class="text-danger" style="padding-right: 15px;">
                                                        <button class="btn btn-danger" onclick="<?php unset($_SESSION['idusuario']); ?>">
                                                                    <i class="fa fa-power-off"></i> Sair
                                                            </button>
                                                    </a>
						</div>
						<br class="visible-xs">
					</div><!-- /col-sm-4 -->
				</div>
			</div>
		</nav>
    
</footer>


<div id="topcontrol" title="Voltar ao topo" style="position: fixed; bottom: 55px; right: 4px; opacity: 0; cursor: pointer;">
    <img src="../../images/up.png" style="width:30px; height:30px"></div>
<div id="topcontrol" title="Voltar ao topo" style="position: fixed; bottom: 55px; right: 4px; opacity: 0; cursor: pointer;">
    <img src="../../images/up.png" style="width:30px; height:30px">
</div>

</body>
</html>
<!-- EOF -->
