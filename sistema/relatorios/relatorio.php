<?php


ini_set('display_errors', 1);


//include_once "../classes/relatorios.class.php";
//include_once '../erros/erros.php';
//include_once '../conexao/conectaBanco.php';
//include_once '../constante/constanteSistema.php';
include_once '../lib/fpdf/fpdf.php';
include_once '../lib/phplot-6.2.0/phplot.php';

/*
pegar variáveis pelo get

*/

//$con = new conectaBanco();

//$r = new relatorios();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">

	<title>RELATÓRIO</title>

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
        <link rel="stylesheet" href="../css/simple-sidebar.css">
        <link rel="stylesheet" href="../css/jquery-ui.css">
        <link rel="stylesheet" href="../css/jquery-ui.mnin.css">
        <link rel="stylesheet" href="../css/jquery-ui.structure.css">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />


        <link rel="author" href="../../autor.txt">

       
</head>
    <body>
<?php

$porUsuario = filter_input(INPUT_GET, 'us');
$porTempo = filter_input(INPUT_GET, 'tempo');
$porGrupo = filter_input(INPUT_GET, 'gs');

$datas = "";


if(!empty($porUsuario)){

    $sql = "";

}else if(!empty($porTempo)){
    $sql = "";

}else{
    $sql = "";

}



    $resultado = mysql_query($sql) or die("Erro no comando SQL. Descrição: ".mysql_error());

    if(mysql_num_rows($resultado) > 0){

        while($dados = mysql_fetch_array($resultado)){
            $semana = $dados['semana'];
            $meditacao = $dados['totalMeditacao'];
            $portal = $dados['totalPortal'];
            $presparagem = $dados['totalPresParagem'];
            $tarefas = $dados['totalTarefas'];
            $servicos = $dados['totalServicos'];

            $datas = $semana;
            $datas .= $meditacao;
            $datas .= $portal;
            $datas .= $presparagem;
            $datas .= $tarefas;
            $datas .= $servicos;

        } // Fecha while

    } // fecha mysql_num_rows


    $relPDF = new fpdf();
    $relPDF->addPage('P','A4');
//    $relPDF->output();

    $grafico = new PHPlot(750,600);

    $grafico->SetFileFormat("png");

    $grafico->SetTitle("Registo de Anomalias!");
    $grafico->SetXTitle("Meses");
    $grafico->SetYTitle("Numero Anomalias");


//    $datas = getValues();

    $grafico->SetDataValues($datas);

    $grafico->DrawGraph();

    $relPDF->setFont('Times','b','16');
    $titulo = utf8_decode('RELATÓRIO ÍNDICE INVESTIMENTO');
    $relPDF->Cell(0 , 0, $titulo , 0, 5, 'C');

    $relPDF->ln(5);

    $relPDF->setFont('Times','b','14');

    $texto = utf8_decode('Relatório bimestral com apresentação das vendas dos meses de Janeiro e Fevereiro. O gráfico abaixo apresenta os valores de cada mês dos vendedores Pedro e Paulo.');

    $relPDF->multicell(0, 5, $texto , 0 , 'J');

    $relPDF->ln(10);

    $relPDF->Image('relatorio.php',60,30,null,null,'PNG');


    $relPDF->ln(80);
    $relPDF->setFont('Times','i','8');

    $relPDF->output();

?>
   
    </body>
</html>
