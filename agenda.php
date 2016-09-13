<!DOCTYPE html>

<?php
//    require_once './view/formulario.php';
    require_once './controller/constantes.php';
    require_once './controller/metodos.php';
    require_once './view/slideShow.php';
    require_once './view/agenda/estacao.class.php';

    error_reporting(0);
    
    $e = new estacao();
//    $formulario = new formulario();
    $estacao = filter_input(INPUT_GET, 'e');
    
//    if(isset($estacao)){
//        $estacao = "";
//    }

?>

<html lang="pt-br">
    <head>
	<meta charset="UTF-8">
	<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
        
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <meta name="description" content="Agenda RUV - Próximos Eventos">
        <meta name="keywords" content="redeunaviva ruv RUV RedeUnaViva agenda eventos calendario semana">
        <meta name="author" content="Michel Pereira">
        <meta name="robots" content="nofollow">
        <meta name="google" content="notranslate">        
	<title><?php echo TITULORUV;?></title>

        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        
        
        <link rel="shortcut icon" href="icon/ruv.ico">
        <link rel="icon" type="image/png" href="images/ruvicon.png">
        
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap-submenu.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/docs.css">
        
	<!--<link rel="stylesheet" href="css/style.css">-->
        
        <script src="js/jquery.js" defer=""></script>
        <script src="js/bootstrap.js" defer=""></script>
        <script src="js/highlight.min.js" defer=""></script>
        <script src="js/bootstrap-submenu.js" defer=""></script>
        <script src="js/docs.js" defer=""></script>
        <!--<script src="js/control.js" defer=""></script>-->

        <script>
            $('.dropdown-submenu > a').submenupicker();
        </script>

        <script type="text/javascript">
                jQuery(document).ready(function($) {
                        $('body').addClass('images');
                });
        </script>
    
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="view/dist/css/bootstrap-select.css">
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <!--<script type="text/javascript" src="js/bootstrap.min.js"></script>-->
	<link rel="stylesheet" href="css/estilo.css">
        
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="view/dist/js/bootstrap-select.js"></script>
        <script type="text/javascript">
                jQuery(document).ready(function($) {
                        $('body').addClass('images');
                });
        </script>
        
        <script>
//            var mes = document.getElementById("selectAgenda").value;
            
            function validaTipoPesquisa(semana, pesquisa){
                if(pesquisa === 0){
                    window.location.href="agenda.php";
                }else{
                    window.location.href="agenda.php?s="+semana+"&p="+pesquisa;
                }
            }
            
            function buscaEstacao(estacao){
                if(estacao === ""){
                    window.location.href="agenda.php";
                }else{
                    window.location.href="agenda.php?e="+estacao;
                }
            }
            
            function prev(estacao, semana){
                
                if(estacao === "0" && semana === 0){
                    estacao = "inverno";
                    semana = 436;
                }
                
                var prevSemana = semana - 1;
                
                if(estacao === "primavera"){
                    if (prevSemana > 114 && prevSemana < 121){
                        prevSemana = 114;
                    }else if(prevSemana > 124 && prevSemana < 131){
                        prevSemana = 124;
                    }else{
                        prevSemana = semana - 1;
                    }
                    
                }else if(estacao === "verao"){
                    if(prevSemana > 214 && prevSemana < 221 ){
                        prevSemana = 214;
                    }else if(prevSemana > 224 && prevSemana < 231){
                        prevSemana = 224;
                    }else{
                        prevSemana = semana - 1;
                    }
                }else if(estacao === "outono"){
                    if(prevSemana > 314 && prevSemana < 321 ){
                        prevSemana = 314;
                    }else if(prevSemana > 324 && prevSemana < 331){
                        prevSemana = 324;
                    }else{
                        prevSemana = semana - 1;
                    }
                    
                }else if(estacao === "inverno"){
                    if(prevSemana > 414 && prevSemana < 421 ){
                        prevSemana = 414;
                    }else if(prevSemana > 424 && prevSemana < 431){
                        prevSemana = 424;
                    }else{
                        prevSemana = semana - 1;
                    }
                }

                if(prevSemana === 110){//aqui era primavera
                    validaMes("inverno", 435);//passa para inverno
                }else if(prevSemana === 410){//aqui era inverno
                    validaMes("outono", 335);//passa para outono
                }else if(prevSemana === 310){//aqui era outono
                    validaMes("verao", 235);//passa para o verão
                }else if(prevSemana === 210){//aqui era verão
                    validaMes("primavera", 135);//passa para primavera
                }else{
                    window.location.href="agenda.php?e="+estacao+"&s="+prevSemana;
                }
            }
            
            function next(estacao, semana){
                if(estacao === "0" && semana === 0){
                    estacao = "primavera";
                    semana = 110;
                }
                
                var nextSemana = semana + 1;
                
                if(estacao === "primavera"){
                    if(nextSemana > 114 && nextSemana < 121 ){
                        nextSemana = 121;
                    }else if(nextSemana > 124 && nextSemana < 131){
                        nextSemana = 131;
                    }else{
                        nextSemana = semana + 1;
                    }
                }else if(estacao === "verao"){
                    if(nextSemana > 214 && nextSemana < 221 ){
                        nextSemana = 221;
                    }else if(nextSemana > 224 && nextSemana < 231){
                        nextSemana = 231;
                    }else{
                        nextSemana = semana + 1;
                    }
                }else if(estacao === "outono"){
                    if(nextSemana > 314 && nextSemana < 321 ){
                        nextSemana = 321;
                    }else if(nextSemana > 324 && nextSemana < 331){
                        nextSemana = 331;
                    }else{
                        nextSemana = semana + 1;
                    }
                    
                }else if(estacao === "inverno"){
                    if(nextSemana > 414 && nextSemana < 421 ){
                        nextSemana = 421;
                    }else if(nextSemana > 424 && nextSemana < 431){
                        nextSemana = 431;
                    }else{
                        nextSemana = semana + 1;
                    }
                    
                }

                if(nextSemana === 136){//aqui era primavera
                    validaMes("verao", 211);//passa para verão
                }else if(nextSemana === 236){//aqui era verão
                    validaMes("outono", 311);//passa para outono
                }else if(nextSemana === 336){//aqui era outono
                    validaMes("inverno", 411);//passa para inverno
                }else if(nextSemana === 436){//aqui era inverno
                    validaMes("primavera", 111);//passa para primavera
                }else{
                    window.location.href="agenda.php?e="+estacao+"&s="+nextSemana;
                }
            }
            
            function validaMes(estacao, semana){
                if(semana === 0){
                    window.location.href="agenda.php";
                }else{
                    window.location.href="agenda.php?e=" + estacao + "&s=" + semana;
                }
            }
            
        </script>


	<script type="text/javascript">
		jQuery(document).ready(function($) {
			scrolltotop.init();
		});
	</script>        
        <style>
            body
            {
                padding-top: 80px;
                background-color: <?php echo AMARELOCLARO; ?>
            }

        </style>
        
        <link rel="author" href="autor.txt">        
    </head>
<body id="corAzulFundoClaro">
    <?php 
        require_once './analyticstracking.php';

        $metodo = new metodos();
        $metodo->modalAviso();
    ?>
    
	<header id="header">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="corAzulInfo">
				<div class="navbar-text-top">
                                            <?php
                                                $titulo = new slideShow();
                                                $titulo->telaTitulo();
                                            
                                            ?>


				</div>
		</nav>
	</header><!-- /header -->

        <div id="content">
            <div class="bs-docs-header bs-docs-first">
                <div class="container">
                    <div style="height: 30px">&nbsp;</div>

                    <div class='table-responsive' style='padding-left: 10px;'>				
                        <table  class="table table-condensed" style="font-family: Lato; font-size: 10px; text-align: center">
                            <tr style="background-color: #f1cd8b">
                                <td colspan="3"><div id="tituloPaginas" style="font-weight: normal;">Agenda - próximos eventos</div></td>
                            </tr>
                            <tr class="warning">
                                <td colspan="3"><div id="subTituloGaleria" style="font-weight: normal; color: #1f226d;">Retiro - 3 a 10 de setembro de 2016</div></td>
                            </tr>
                            <tr class="warning">
                                <td colspan="3"><div id="subTituloGaleria" style="font-weight: normal; color: #1f226d;">Jornada Real - novos grupos - a partir de 18 de setembro de 2016</div></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div align="right">
                                        <table border="0" cellpadding="0" cellspacing="0" style="font-family: Garamond; font-size: 20px; text-align: center; font-weight: bold;">
                                            <tbody>
                                                <tr>
                                                    <td style="background-color: yellow;" id="selecaoTd">
                                                        <a href="javascript:buscaEstacao('primavera');" id="linkEstacao">
                                                            Primavera
                                                        </a>
                                                    </td>
                                                    <td style="background-color: orange;" id="selecaoTd">
                                                        <a href="javascript:buscaEstacao('verao');" id="linkEstacao">
                                                            Verão
                                                        </a>
                                                    </td>
                                                    <td style="background-color: yellowgreen;" id="selecaoTd">
                                                        <a href="javascript:buscaEstacao('outono');" id="linkEstacao">
                                                            Outono
                                                        </a>
                                                    </td>
                                                    <td style="background-color: violet;" id="selecaoTd">
                                                        <a href="javascript:buscaEstacao('inverno');" id="linkEstacao">
                                                            Inverno
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            <tr style="font-family: Lato; font-size: 15px">
                                <td colspan="3" style="text-align: center; padding-top: 10px; width: 100%; font-weight: bold;">
                                    <?php
                                        $semana = filter_input(INPUT_GET, "s");
//                                        $p = filter_input(INPUT_GET, "p");
                                        
                                        if($semana == "421"){
                                            $marcado1 = "selected";
                                        }
                                        
                                        
                                    ?>
                                    <table border="0" width="100%" cellpadding="0" cellspacing="0" height="50px">
                                        <tbody>
                                            <tr>
                                                <?php
//                                                if(!empty($estacao)){
                                                    $anteBloqueado = "title='Voltar'";
//                                                }
                                                    
                                                    if(empty($estacao)){
                                                        $estacao = 0;
                                                    }else if(empty($semana)){
                                                        $semana = 0;
                                                    }
                                                
                                                    echo "  <td style='width: 5px;'>";
//                                                    echo "  <ul class='pager'>";
//                                                    echo "  <li class='previous'>";
                                                    echo "      <a href='javascript:prev(\"$estacao\", ".$semana.")' $anteBloqueado>";
//                                                    echo "          &larr; Voltar";
                                                    echo "          <img src='slider/images/prev.png' id='prevAgenda' name='prevAgenda' style='width: 38px; height: 38px; padding-left: 0; padding-top: 10px;'>";
                                                    echo "      </a>";
//                                                    echo "  </li>";
//                                                    echo "  </ul>";
                                                    echo "  </td>";
                                                
                                                ?>
                                                <td width="100%" style="text-align: center; padding-right: 10px; font-size: 20px; font-family: garamond;">
                                                        <b>Semana</b>
<!--<select name="selectSemana" class="selectpicker" onclick="validaMes(this.value)" onchange="validaMes(this.value)">-->                                                    
<?php
//echo $estacao;
                                                            echo "<select name='selectSemana' class='selectpicker' onclick='validaMes(\"$estacao\", this.value)' onchange='validaMes(\"$estacao\", this.value)'>"; 

                                                            if(empty($estacao)){
                                                                echo "<option value='0'>Selecione a estação</option>";
                                                                
//                                                                $e->todasEstacoes();
                                                            }else{
                                                                echo "<option value='0'>Selecione a semana</option>";
                                                            }
                                                            
                                                            echo "<optgroup label='SEMANA'>";
                                                                    
                                                                    $e->relacaoEstacao($estacao);
                                                                
                                                            echo "</optgroup>";
                                                            echo "</select>";
                                                                ?>


                                                </td>
                                                <?php
//                                                if(!empty($estacao)){
                                                    $postBloqueado = "title='Avançar'";
//                                                }
                                        echo "  <td style='width: 5px;'>";
                                        echo "      <a href='javascript:next(\"$estacao\", ".$semana.")' $posBloqueado>";
                                        echo "          <img src='slider/images/next.png' id='nextAgenda' name='nextAgenda' style='width: 38px; height: 38px; padding-right: 0; padding-top: 10px;'>";
                                        echo "      </a>";
                                        echo "  </td>";
                                                
                                                ?>
                                            </tr>
                                        </tbody>
                                    </table>

                                </td>
                            </tr>
                            <?php
                            /* @var $_GET type */
//                            $periodo = utf8_decode($_GET['p']);
//
//                            if ($p == "") {
//                                $p = 0;
//                            }


                            echo "<tr>";
                            echo "  <td colspan='3'>";

                            switch ($semana) {
                                case 0: echo "<iframe src='view/agendaPadrao.php' frameborder='0' scrolling='yes' name='agendaPadrao' width='100%' height='529'></iframe>";
                                    break;
                                case 421: echo "<iframe src='view/agenda/semana421.php' width='100%' height='529' frameborder='0' scrolling='yes' style='padding-left: 0px;' name='slide'></iframe>";
                                    break;
                                
                                default:
                                    echo "<iframe src='view/agendaPadrao.php' frameborder='0' scrolling='yes' name='agendaPadrao' width='100%' height='529'></iframe>";
                                    break;
                                
//                                case 170716: echo "<iframe src='view/agenda/170716.php' width='100%' height='529' frameborder='0' scrolling='yes' style='padding-left: 0px;' name='slide'></iframe>";
//                                    break;
//                                case 180716: echo "<iframe src='view/agenda/180716.php' width='100%' height='529' frameborder='0' scrolling='yes' style='padding-left: 0px;' name='slide'></iframe>";
//                                    break;
//                                case 190716: echo "<iframe src='view/agenda/190716.php' width='100%' height='529' frameborder='0' scrolling='yes' style='padding-left: 0px;' name='slide'></iframe>";
//                                    break;
//                                case 200716: echo "<iframe src='view/agenda/200716.php' width='100%' height='529' frameborder='0' scrolling='yes' style='padding-left: 0px;' name='slide'></iframe>";
//                                    break;
//                                case 210716: echo "<iframe src='view/agenda/210716.php' width='100%' height='529' frameborder='0' scrolling='yes' style='padding-left: 0px;' name='slide'></iframe>";
//                                    break;
                            }

                            echo "  </td>";
                            echo "</tr>";
                            ?>


                        </table>

                    </div>
                </div>
            </div>

        </div>

	<footer id="footer">
            <p style="height: 150px;"></p>
            <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation" id="corAzulInfo" style="background-color: #BFE0F1;">
                <?php
                    $titulo->preparaMenu("agenda");
                ?>

            </nav>
	</footer>

<?php
    $formAdesao = new formAdesao();
    
    $formAdesao->telaFormAdesao();

?>

<!-- EOF -->
<div id="topcontrol" title="Voltar ao topo" style="position: fixed; bottom: 55px; right: 4px; opacity: 0; cursor: pointer;">
    <img src="images/up.png" style="width:30px; height:30px"></div>
<div id="topcontrol" title="Voltar ao topo" style="position: fixed; bottom: 55px; right: 4px; opacity: 0; cursor: pointer;">
    <img src="images/up.png" style="width:30px; height:30px">
</div>


</body>
</html>