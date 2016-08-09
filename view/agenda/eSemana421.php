<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once '../../lib/phpExcelReader/excel_reader2.php';
$data = new Spreadsheet_Excel_Reader("semana421.xls");

setlocale(LC_ALL,'pt_BR.UTF8');
mb_internal_encoding('UTF8'); 
mb_regex_encoding('UTF8');

//require_once '../../lib/lerPdf.class.php';

//require_once '../../lib/PHPExcel/Classes/PHPExcel.php';
//$data = new PHPExcel_Reader_Excel5();
//$data->setReadDataOnly(true);
//$dataPhp = $data->load("semana421.xls");
//$dataPhp->setActiveSheetIndex(0);
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
table.excel {
	border-style:ridge;
	border-width:1;
	border-collapse:collapse;
	font-family:sans-serif;
	font-size:12px;
}
table.excel thead th, table.excel tbody th {
	background:#CCCCCC;
	border-style:ridge;
	border-width:1;
	text-align: center;
	vertical-align:bottom;
}
table.excel tbody th {
	text-align:center;
	width:20px;
}
table.excel tbody td {
	vertical-align:bottom;
}
table.excel tbody td {
    padding: 0 3px;
	border: 1px solid #EEEEEE;
}
</style>
</head>

<body>
<?php 

//LEITURA EXCEL 2
//echo "<table border='0' class='table table-condensed' style='font-family: Lato; font-size: 15px; text-align: center'>";
//for($linha=1; $linha <= 50; $linha++){ //Navega na linha
//    echo "<tr>";
//    for($coluna=0; $coluna<=10; $coluna++){ //Navega na coluna
//        if($linha == 2){
//            echo "<th>".utf8_decode($dataPhp->getActiveSheet()->getCellByColumnAndRow($coluna, $linha)->getValue()); // Atualiza com caracteres especiais;
//            echo "</th>";
//        }else{
//            echo "<td>".utf8_decode($dataPhp->getActiveSheet()->getCellByColumnAndRow($coluna, $linha)->getValue()); // Atualiza com caracteres especiais;
//            echo "</td>";
//        }
////        $dataPhp->getActiveSheet()->getCellByColumnAndRow($coluna, $linha)->getValue();//Chama as linhas e colunas;
//    }
//    echo "</tr>";
//}
//echo "</table>";


//LEITURA EXCEL 1
echo utf8_decode($data->dump(true,true));


//LEITURA CSV

//$delimitador = ',';
//$cerca = '"';
//
//// Abrir arquivo para leitura
//$f = fopen('semana421.csv', 'r');
//if ($f) { 
//
//    // Ler cabecalho do arquivo
//    $cabecalho = fgetcsv($f, 0, $delimitador, $cerca);
//
//    // Enquanto nao terminar o arquivo
//    while (!feof($f)) { 
//
//        // Ler uma linha do arquivo
//        $linha = fgetcsv($f, 0, $delimitador, $cerca);
//        if (!$linha) {
//            continue;
//        }
//
//        // Montar registro com valores indexados pelo cabecalho
//        $registro = array_combine($cabecalho, $linha);
//
//        // Obtendo o nome
//        echo $registro['nome'].PHP_EOL;
//    }
//    fclose($f);
//}


//HTML 5
//echo "<object data='semana421.pdf' type='application/pdf'>";
//echo "  <p>Seu navegador não tem um plugin pra PDF</p>";
//echo "</object>";

//$url = "semana421.pdf";
//echo "<script>window.open('$url');</script>";


?>
</body>
</html>
