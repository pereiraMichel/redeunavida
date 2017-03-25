<?php


class atividades{
	
	private $usuario;
	private $registro;
	private $data;
	private $hora;

	function setUsuario($usuario){
		$this->usuario = $usuario;
	}

	function setRegistro($registro){
		$this->registro = $registro;
	}

	function setData($data){
		$this->data = $data;
	}

	function setHora($hora){
		$this->hora = $hora;
	}


	public function setArquivo($arquivo){
		$this->arquivo = $arquivo;
	}

	public function readUsuarioXml($usuario){

        $filename = "controller/".$usuario."_activity.xml";
        
        @header("Content-Type: text/html; charset=utf-8");
        $xml = simplexml_load_file($filename);
        foreach($xml->texto as $texto)
        {
            echo $texto->data." - ".$texto->hora;
            echo "<br>";
            echo $texto->atividade;
        }                        
	}

	public function readLog($usuario){
		$nome_usuario = $usuario;
		$path = "../controller/".$usuario."_activity.log";
		$arquivo = fopen($path, "r");

		if(file_exists($path)){
			while (!feof ($arquivo)) {
				$valor = fgets($arquivo, 4096);
				echo $valor;
//				echo $valor."<br>";
			}
			fclose($arquivo);
		}else{
			$this->writeLog($usuario, date('d/m/Y'), "Recadastramento");
		}

	}

	public function baixarLog($usuario){
		$arquivo = $usuario."_activity.log";
        define('DIR_DOWNLOAD', '../controller/');

        $path = "../controller/".$arquivo;
        
        if(!file_exists($path)){
        	echo "Arquivo inexistente.";
            //echo "<br>Caminho: ".$path;
        }else{
        	//echo "O arquivo e o caminho existe.";
	    	header("Content-Disposition: attachment; filename=\"".$arquivo."\"");
	        header('Content-Type: text/plain');
	        header('Content-Length: ' . filesize($path));

	        ob_clean();
	        flush($path);
	        readfile($path);
        }


	}


	public function writeLog($usuario, $registro, $path){
		date_default_timezone_set("America/Sao_Paulo"); 
		$arquivo = fopen($path.$usuario."_activity.log", "ab");
		//echo "<script>alert('Marcado');</script>";
		$data = date("d/m/Y");
		$hora = date("H:i:s");
		fwrite($arquivo, "$data | $hora - $registro\r\n================================================\r\n\n");
		fclose($arquivo);
	}

	public function writeUsuarioXml($usuario, $registro, $data, $hora){

		$arquivo = "controller/".$usuario."_activity.xml";

		if(is_file($arquivo)){
			$dom = new DOMDocument("1.0", "UTF-8");
			$dom->load($arquivo);

			$dados = $dom->createElement("dados"); // Criando nó filho (dados)

			$dataXml = $dom->createElement("data", $data." - ".$hora);
			$registroXml = $dom->createElement("registro", $registro);

			$dados->appendChild($dataXml);
			$dados->appendChild($registroXml);

			$root = $dados;

		}else{

			$dom = new DOMDocument("1.0", "UTF-8"); // Versão do encoding xml //ISO-8859-1
			$dom->preserveWhiteSpace = false; // retira os espaços em branco
			$dom->formatOutput = true; // gerar o código

			$root = $dom->createElement("atividade"); // Criando o nó principal root

			$dados = $dom->createElement("dados"); // Criando nó filho (dados)
//			$nome_usuario = $dom->createElement("usuario", $usuario);
			$dataHora = $dom->createElement("data", $data." - ".$hora);
			$registro = $dom->createElement("registro", $registro);

			// Adiciona as informações aos dados
//			$dados->appendChild($nome_usuario);
			$dados->appendChild($dataHora);
			$dados->appendChild($registro);

			// Adciona os dados ao nó principal
			$root->appendChild($dados);
		}

			$dom->appendChild($root); // Adiciona o root para o dom

			$dom->save("controller/".$usuario."_activity.xml");

	}



	public function telaRegistroAtividades(){

		echo "<div class='col-sm-2'>";
		echo "	&nbsp;";
		echo "</div>";
		echo "<div class='col-sm-8'>";
		echo "	<textarea cols='80' rows='20' style='text-align: center;' class='form-control'>";
		echo 		$this->readLog($this->usuario);
//		echo "		<label style='text-align: center;'>".$this->readLog($this->usuario)."</label>";
		echo "	</textarea>";
		echo "</div>";
		echo "<div class='col-sm-2'>";
		echo "	&nbsp;";
		echo "</div>";

		echo "<div class='col-sm-12'>";
		echo "	&nbsp;";
		echo "</div>";

		echo "<div class='col-sm-12'>";
		echo "	<a href='inicio.php?m=config' class='btn btn-default' alt='Voltar' title='Voltar'>Voltar</a>";
		echo "	<a href='inicio.php?m=config&t=ativ&u=$this->usuario' class='btn btn-primary' alt='Baixar' title='Baixar'>Baixar</a>";
		echo "</div>";

		$u = filter_input(INPUT_GET, 'u');

		if($u){

			$this->baixarLog($this->usuario);
		}

	}

	public function writeXmlBonus($servico, $valor){

		$path = "../controller/";
		$nome_arquivo = $this->verificaNomeArquivo($servico);

		$arquivo = $path."bonus_".$nome_arquivo.".xml";


		$linha = "<";
		$linha.= "?xml version=\"1.0\" encoding=\"ISO-8859-1\"?";
		$linha.= ">\n";
		$linha.= "<atividade>\n";
		$linha.= "	<bonus>\n";
		$ler = simplexml_load_file($arquivo);
		foreach($ler as $info) {
			$linha.= "		<servico>".$servico."</servico>\n";
		}
		$linha.= "		<valor>".$valor."</valor>\n";
		$linha.= "	</bonus>\n";
		$linha.= "</atividade>\n";

		$abreArquivo = fopen($arquivo,'w+');
		fwrite($abreArquivo, $linha);
		fclose($abreArquivo);


/*
		$dom = new DOMDocument("1.0", "UTF-8");
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;

//			if(is_file($arquivo)){
		$dom->load($arquivo);

		$valorServico->nodeValue = $valor;

		$bonus->replaceChild('valor', $valorServico);

//		$atividade->replaceChild($bonus,$bonus);

		$root->replaceChild($bonus);

		$dom->replaceChild($root);

//			}*/

/*		$root = $dom->createElement("atividade");

		$bonus = $dom->createElement("bonus"); // Criando nó filho (dados)
		$servico = $dom->createElement("servico", $servico);
		$valor = $dom->createElement("valor", $valor);

		$bonus->appendChild($servico);
		$bonus->appendChild($valor);

		$root->appendChild($bonus);
//		}

		$dom->appendChild($root);

		$dom->save($arquivo);*/

/*<?php
// SALVANDO OS DADOS
if(isset($_POST['salvar'])=="salvar") {
$xml = "xml.xml";

$linha = "<";
$linha.= "?xml version=\"1.0\" encoding=\"ISO-8859-1\"?";
$linha.= ">\n";
$linha.= "<linhas>\n";
$ler = simplexml_load_file($xml);
foreach($ler as $info) {
$linha.= "<linha>".$info."</linha>\n";
}
$linha.= "<linha>".$_POST['linha']."</linha>\n";
$linha.= "</linhas>\n";

$arquivo = fopen($xml,'w+');
fwrite($arquivo,$linha);
fclose($arquivo);

echo "<script>
location.href='teste.php';
</script>";
}


// DELETANDO OS DADOS
if(isset($_POST['apagar'])=="apagar") {
$xml = "xml.xml";

$linha = "<";
$linha.= "?xml version=\"1.0\" encoding=\"ISO-8859-1\"?";
$linha.= ">\n";
$linha.= "<linhas>\n";
$ler = simplexml_load_file($xml);

foreach($ler as $info) {
if (in_array($info, $_POST['linha'])) {
} else {
$linha.= "<linha>".$info."</linha>\n";
}
}
$linha.= "</linhas>\n";

$arquivo = fopen($xml,'w+');
fwrite($arquivo,$linha);
fclose($arquivo);

echo "<script>
location.href='teste.php';
</script>";
}
?>

<form action="teste.php" method="post">
<?php
// EXIBINDO OS DADOS SALVO
$ler = simplexml_load_file('xml.xml');
foreach($ler as $dados) {
echo "<input type=\"checkbox\" name=\"linha[]\" value=\"$dados\">$dados <br>";
}
?>
*/		

	}

	public function verificaNomeArquivo($servico){

		switch ($servico) {
			case 'Meditação':
					return "meditacao";
				break;
			case 'Portal':
					return "portal";
				break;
			case 'Paragem-Presença':
					return "presencaparagem";
				break;
			case 'Tarefas':
					return "tarefa";
				break;
			case 'ServExtraFocal':
					return "servExtraFocalizacao";
				break;
			case 'servExtraPresenca':
					return "servExtraPresenca";
				break;
			
			default:
					return $servico;
				break;
				
		}


	}

	public function readXmlBonus($servico){

		$nome_arquivo = $this->verificaNomeArquivo($servico);

        $filename = "../controller/bonus_".$nome_arquivo.".xml";

        @header("Content-Type: text/html; charset=utf-8");
        $xml = simplexml_load_file($filename);
        foreach($xml->bonus as $texto)
        {
            return $texto->valor;
        }                        

	}

	public function telaConfigBonus(){

		//echo "<meta http-equiv='refresh' content='5;url=inicio.php?m=config&t=xb'>";

		echo "<form class='form-horizontal' action='' method='post'>";
		echo "	<div class='col-sm-3'>";
		echo "		<label>Meditação</label>";
		echo "		<input type='text' name='vMeditacao' id='vMeditacao' value='".$this->readXmlBonus("Meditação")."' class='form-control'>";
		echo "	</div>";
		echo "	<div class='col-sm-3'>";
		echo "		<label>Práticas dos Portais</label>";
		echo "		<input type='text' name='vPortal' id='vPortal' value='".$this->readXmlBonus("Portal")."' class='form-control'>";
		echo "	</div>";
		echo "	<div class='col-sm-3'>";
		echo "		<label>Paragem-Presença</label>";
		echo "		<input type='text' name='vParPres' id='vParPres' value='".$this->readXmlBonus("Paragem-Presença")."' class='form-control'>";
		echo "	</div>";
		echo "	<div class='col-sm-3'>";
		echo "		<label>Tarefas</label>";
		echo "		<input type='text' name='vTarefas' id='vTarefas' value='".$this->readXmlBonus("Tarefas")."' class='form-control'>";
		echo "	</div>";

		echo "	<div class='col-sm-12'>&nbsp;</div>";

		echo "	<div class='col-sm-3'>";
		echo "		&nbsp;";
		echo "	</div>";
		echo "	<div class='col-sm-3'>";
		echo "		<label>Serviços e Extras (Focalização)</label>";
		echo "		<input type='text' name='vServFocal' id='vServFocal' value='".$this->readXmlBonus("ServExtraFocal")."' class='form-control'>";
		echo "	</div>";
		echo "	<div class='col-sm-3'>";
		echo "		<label>Serviços e Extras<br> (Presença)</label>";
		echo "		<input type='text' name='vServPres' id='vServPres' value='".$this->readXmlBonus("servExtraPresenca")."' class='form-control'>";
		echo "	</div>";
		echo "	<div class='col-sm-3'>";
		echo "		&nbsp;";
		echo "	</div>";

		echo "	<div class='col-sm-12' style='height: 30px;'>&nbsp;</div>";

		echo "	<div class='col-sm-6' style='text-align: right;'>";
		echo "		<a href='inicio.php?m=config' class='btn btn-default'>Voltar</a>";
		echo "	</div>";
		echo "	<div class='col-sm-6' style='text-align: left;'>";
		echo "		<button type='submit' class='btn btn-primary'>Salvar</button>";
		echo "	</div>";

		echo "	<div class='col-sm-12'>&nbsp;</div>";

		echo "</form>";

		if($_POST){

			$vMeditacao = addslashes(filter_input(INPUT_POST, 'vMeditacao'));
			$vPortais = addslashes(filter_input(INPUT_POST, 'vPortal'));
			$vParPresenca = addslashes(filter_input(INPUT_POST, 'vParPres'));
			$vTarefas = addslashes(filter_input(INPUT_POST, 'vTarefas'));
			$vServFocal = addslashes(filter_input(INPUT_POST, 'vServFocal'));
			$vServPres = addslashes(filter_input(INPUT_POST, 'vServPres'));

/*			echo "Meditação: ".$vMeditacao."<br>";
			echo "Portais: ".$vPortais."<br>";
			echo "Paragem-Presença: ".$vParPresenca."<br>";
			echo "Tarefas: ".$vTarefas."<br>";
			echo "Serviço Focalização: ".$vServFocal."<br>";
			echo "Serviço Presença: ".$vServPres."<br>";*/


			$this->writeXmlBonus("Meditação", $vMeditacao);
			$this->writeXmlBonus("Portais", $vPortais);
			$this->writeXmlBonus("Paragem-Presença", $vParPresenca);
			$this->writeXmlBonus("Tarefas", $vTarefas);
			$this->writeXmlBonus("ServExtraFocal", $vServFocal);
			$this->writeXmlBonus("ServExtraPresenca", $vServPres);
			

			echo "<meta http-equiv='refresh' content='0;inicio.php?m=config&t=xb'>";

		}

	}


}