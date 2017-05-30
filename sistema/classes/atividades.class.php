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

        //chmod($filename, 777);
        echo "Nome arquivo: ".$arquivo;

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

	public function readLogBackupVisualizacao($usuario){
		$path = "../controller/".$usuario."_activityBackup.log";
		$arquivo = $usuario."_activityBackup.log";

		if(file_exists($path)){
			echo "<br>";
			echo "<label style='text-align: left;'>Backup</label>";
			echo "<table class='table'>";
			echo "	<tr>";
			echo "		<td style='text-align: left;'>";
			echo 			$arquivo;
			echo "		</td>";
			echo "		<td width='30'>";
			echo "			<a href='inicio.php?m=config&t=ativ&u=$this->usuario&db=sim'>";
			echo "				<img src='../img/download4.png' width='20' height='20' title='Baixar' alt='Baixar'>";
			echo "			</a>";
			echo "		</td>";
			echo "		<td width='30'>";
			echo "			<a href='inicio.php?m=config&t=ativ&u=$this->usuario&dbe=sim'>";
			echo "				<img src='../img/botaoExcluir.png' width='15' height='15' title='Excluir' alt='Excluir'>";
			echo "			</a>";
			echo "		</td>";
			echo "	</tr>";
			echo "</table>";
//		}else{
//			echo "O arquivo não existe.";
		}

	}


	public function readLogBackup($usuario){
		$nome_usuario = $usuario;
		$path = "../controller/".$usuario."_activityBackup.log";
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

	public function baixarLog($usuario, $tipo){

		if($tipo === "backup"){
			$arquivo = $usuario."_activityBackup.log";
		}else{
			$arquivo = $usuario."_activity.log";
		}

        $path = "../controller/".$arquivo;
        
        if(!file_exists($path)){
        	echo "Arquivo inexistente.";
        }else{
	        header("Content-Type:text/plain"); //text/plain
	        header("Content-Length: ".filesize($path));
	    	header("Content-Disposition: attachment; filename=\"$arquivo\"");

	        ob_clean();
	        flush($arquivo);
	        readfile($path);
	    	exit();


/*
		     switch(strtolower(substr(strrchr(basename($arquivo),"."),1))){ // verifica a extensão do arquivo para pegar o tipo
		         case "pdf": $tipo="application/pdf"; break;
		         case "exe": $tipo="application/octet-stream"; break;
		         case "zip": $tipo="application/zip"; break;
		         case "doc": $tipo="application/msword"; break;
		         case "xls": $tipo="application/vnd.ms-excel"; break;
		         case "ppt": $tipo="application/vnd.ms-powerpoint"; break;
		         case "gif": $tipo="image/gif"; break;
		         case "png": $tipo="image/png"; break;
		         case "jpg": $tipo="image/jpg"; break;
		         case "mp3": $tipo="audio/mpeg"; break;
		         case "log": $tipo="text/plain"; break;
		         case "txt": $tipo="text/plain"; break;
		         case "html": // deixar vazio por segurança
		      }
		      header("Content-Type: ".$tipo); // informa o tipo do arquivo ao navegador
		      header("Content-Length: ".filesize($arquivo)); // informa o tamanho do arquivo ao navegador
		      header("Content-Disposition: attachment; filename=".basename($arquivo)); // informa ao navegador que é tipo anexo e faz abrir a janela de download, tambem informa o nome do arquivo
		      readfile($arquivo); // lê o arquivo
		      exit; // aborta pós-açõe

*/
        }
	}

	public function excluirLog($usuario, $tipo){

		if($tipo === "backup"){
			$arquivoBackup = $usuario."_activityBackup.log";
			$pathBackup = "../controller/".$arquivoBackup;

			echo unlink($pathBackup);
		}else{

			$arquivo = $usuario."_activity.log";
	        $path = "../controller/".$arquivo;

			$arquivoCopy = $usuario."_activityBackup.log";
	        $pathCopy = "../controller/".$arquivoCopy;

	        if(file_exists($path)){

		        if(!copy($path, $pathCopy)){
		        	echo "Erro ao gerar backup.";
		        }

	        	echo unlink($path);
				$this->writeLog($usuario, "Reinício das atividades", "../controller/");

	        }else{
				$this->writeLog($usuario, "Reinício das atividades", "../controller/");

	        }
		}
	}


	public function writeLog($usuario, $registro, $path){
		date_default_timezone_set("America/Sao_Paulo");

		//$path = "http://www.redeunaviva.rio/sistema/controller/"

		//echo $path;

		$arquivo = fopen($path.$usuario."_activity.log", "ab");

/*		if(!file_exists($arquivo)){
			$arquivo = fopen($path.$usuario."_activity.log", "ab");
			fwrite($arquivo);
		}
*/
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

        echo "              <table class='table'>";
        echo "              <tr>";
        echo "                  <td style='text-align: right;'>";
        echo "                      <a href='inicio.php?m=config' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "                          <img src='../img/btn_back.png' width='25' height='25'>";
        echo "                      </a>";
        echo "                  </td>";
        echo "                  <td style='text-align: center;'>";
        echo "                      <a href='inicio.php?m=config&t=ativ&u=$this->usuario&d=sim' class='btn btn-default' id='baixar' name='baixar'>";
        echo "                          <img src='../img/download4.png' width='25' height='25'>";
        echo "                      </a>";
        echo "                  </td>";
        echo "                  <td style='text-align: left;'>";
        echo "                      <a href='inicio.php?m=config&t=ativ&u=$this->usuario&e=sim' class='btn btn-default' id='apagar' name='apagar'>";
        echo "                          <img src='../img/btnExcluir.png' width='25' height='25'>";
        echo "                      </a>";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td style='text-align: right; padding-right: 12px;'>";
        echo "                      <a href='inicio.php?m=config' title='Voltar' alt='Voltar'>";
        echo "                          <label>Voltar</label>";
        echo "                      </a>";
        echo "                  </td>";
        echo "                  <td style='text-align: center; padding-left: 12px;'>";
        echo "                      <a href='inicio.php?m=config&t=ativ&u=$this->usuario&d=sim' id='txtBaixar' name='txtBaixar'>";
        echo "                          <label>Baixar</label>";
        echo "                      </a>";
        echo "                  </td>";
        echo "                  <td style='text-align: left; padding-left: 12px;'>";
        echo "                      <a href='inicio.php?m=config&t=ativ&u=$this->usuario&e=sim' id='txtBaixar' name='txtBaixar'>";
        echo "                          <label>Apagar</label>";
        echo "                      </a>";
        echo "                  </td>";
        echo "               </tr>";
        echo "               </table>";

		$this->readLogBackupVisualizacao($this->usuario);

//		echo "	<a href='inicio.php?m=config' class='btn btn-default' alt='Voltar' title='Voltar'>Voltar</a>";
//		echo "	<a href='inicio.php?m=config&t=ativ&u=$this->usuario' class='btn btn-primary' alt='Baixar' title='Baixar'>Baixar</a>";
		echo "</div>";




		$d = filter_input(INPUT_GET, 'd');
		$db = filter_input(INPUT_GET, 'db');
		$dbe = filter_input(INPUT_GET, 'dbe');
		$e = filter_input(INPUT_GET, 'e');

		if($d === "sim"){
			//echo "Usuário: ".$this->usuario."<br>";
			$this->baixarLog($this->usuario, "normal");
			//echo "<meta http-equiv='refresh' content='0;url=inicio.php?m=config&t=ativ'>";
		}
		if($db === "sim"){
			//echo "Usuário: ".$this->usuario."<br>";
			$this->baixarLog($this->usuario, "backup");
			//echo "<meta http-equiv='refresh' content='0;url=inicio.php?m=config&t=ativ'>";
		}
		if($e === "sim"){
			$this->excluirLog($this->usuario, "normal");
			echo "<meta http-equiv='refresh' content='0;url=inicio.php?m=config&t=ativ'>";
		}
		if($dbe === "sim"){
			$this->excluirLog($this->usuario, "backup");
			echo "<meta http-equiv='refresh' content='0;url=inicio.php?m=config&t=ativ'>";
		}

	}

	public function writeXmlBonus($servico, $valor){
//		echo "Recebeu serviço para escrita: ".$servico." e valor: ".$valor."<br>";

		$path = "../controller/";
		$nome_arquivo = $this->verificaNomeArquivo($servico);

		$arquivo = $path."bonus_".$nome_arquivo.".xml";
//		echo $arquivo."<br>";

//		if(file_exists($arquivo)){
//			echo "<br>O arquivo existe.<br>";
//		}

		chmod($arquivo,0777);

		//chmod($arquivo, 777);

		//echo "Nome do arquivo de escrita: ".$arquivo."<br>";

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
			case 'Portais':
					return "portal";
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
			case 'Serviços':
					return "servExtra";
				break;
			case 'ServExtra':
					return "servExtra";
				break;
/*			case 'servExtraPresenca':
					return "servExtraPresenca";
				break;*/
			
			default:
					return $servico;
				break;
				
		}


	}

	public function readXmlBonus($servico){

		$nome_arquivo = $this->verificaNomeArquivo($servico);
//		echo "Nome do Arquivo de leitura: ".$nome_arquivo."<br>";

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

		echo "<form class='form-horizontal' action='#' method='post' id='formConfigBonus' name='formConfigBonus'>";
/*		echo "<div class='col-sm-12'>";
		echo "	<label class='alert alert-danger'>Em teste</label>";
		echo "</div>";*/
		echo "	<div class='col-sm-3'>";
		echo "		<label>Meditação</label>";
		echo "		<input type='text' name='vMeditacao' id='vMeditacao' value='".$this->readXmlBonus("Meditação")."' class='form-control' onkeydown='enterTab(\"vPortal\", event)'>";
		echo "	</div>";
		echo "	<div class='col-sm-3'>";
		echo "		<label>Práticas dos Portais</label>";
		echo "		<input type='text' name='vPortal' id='vPortal' value='".$this->readXmlBonus("Portais")."' class='form-control' onkeydown='enterTab(\"vParPres\", event)'>";
		echo "	</div>";
		echo "	<div class='col-sm-3'>";
		echo "		<label>Paragem-Presença</label>";
		echo "		<input type='text' name='vParPres' id='vParPres' value='".$this->readXmlBonus("Paragem-Presença")."' class='form-control' onkeydown='enterTab(\"vTarefas\", event)'>";
		echo "	</div>";
		echo "	<div class='col-sm-3'>";
		echo "		<label>Tarefas</label>";
		echo "		<input type='text' name='vTarefas' id='vTarefas' value='".$this->readXmlBonus("Tarefas")."' class='form-control' onkeydown='enterTab(\"vServExtra\", event)'>";
		echo "	</div>";

		echo "	<div class='col-sm-12'>&nbsp;</div>";

		echo "	<div class='col-sm-3'>";
		echo "		&nbsp;";
		echo "	</div>";
		echo "	<div class='col-sm-3'>";
		echo "		<label>Serviços e Extras</label>";
		echo "		<input type='text' name='vServExtra' id='vServExtra' value='".$this->readXmlBonus("Serviços")."' class='form-control' onkeydown='enterTab(\"salvar\", event)'>";
		echo "	</div>";
/*		echo "	<div class='col-sm-3'>";
		echo "		<label>Serviços e Extras<br> (Presença)</label>";
		echo "		<input type='text' name='vServPres' id='vServPres' value='".$this->readXmlBonus("servExtraPresenca")."' class='form-control'>";
		echo "	</div>";*/
		echo "	<div class='col-sm-3'>";
		echo "		&nbsp;";
		echo "	</div>";

		echo "	<div class='col-sm-12' style='height: 30px;'>&nbsp;</div>";

		echo "	<div class='col-sm-12'>";

        echo "              <table class='table'>";
        echo "              <tr>";
        echo "                  <td style='text-align: right;'>";
        echo "                      <a href='inicio.php?m=config' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "                          <img src='../img/btn_back.png' width='25' height='25'>";
        echo "                      </a>";
        echo "                  </td>";
        echo "                  <td style='text-align: left;'>";
        echo "                      <button type='button' class='btn btn-default' id='salvar' name='salvar' onclick='enviaForm(\"formConfigBonus\")'>";
        echo "                          <img src='../img/save2.png' width='25' height='25'>";
        echo "                      </button>";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td style='text-align: right; padding-right: 12px;'>";
//        echo "                      <a href='inicio.php?m=config' title='Voltar' alt='Voltar'>";
        echo "                          <label>Voltar</label>";
//        echo "                      </a>";
        echo "                  </td>";
        echo "                  <td style='text-align: left; padding-left: 12px;'>";
//        echo "                      <a href='#' onclick='enviaForm(\"formTrocaSenha\")' title='Salvar' alt='Salvar' disabled>";
        echo "                          <label>Salvar</label>";
//        echo "                      </a>";
        echo "                  </td>";
        echo "               </tr>";
        echo "               </table>";

        echo "</div>";
/*
		echo "	<div class='col-sm-6' style='text-align: right;'>";
		echo "		<a href='inicio.php?m=config' class='btn btn-default'>Voltar</a>";
		echo "	</div>";
		echo "	<div class='col-sm-6' style='text-align: left;'>";
		echo "		<button type='submit' class='btn btn-primary'>Salvar</button>";
		echo "	</div>";
*/


		echo "	<div class='col-sm-12'>&nbsp;</div>";

		echo "</form>";

		if($_POST){

			$vMeditacao = addslashes(filter_input(INPUT_POST, 'vMeditacao'));
			$vPortais = addslashes(filter_input(INPUT_POST, 'vPortal'));
			$vParPresenca = addslashes(filter_input(INPUT_POST, 'vParPres'));
			$vTarefas = addslashes(filter_input(INPUT_POST, 'vTarefas'));
			$vServExtra = addslashes(filter_input(INPUT_POST, 'vServExtra'));
//			$vServFocal = addslashes(filter_input(INPUT_POST, 'vServFocal'));
//			$vServPres = addslashes(filter_input(INPUT_POST, 'vServPres'));

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
			$this->writeXmlBonus("ServExtra", $vServExtra);
//			$this->writeXmlBonus("ServExtraFocal", $vServFocal);
//			$this->writeXmlBonus("ServExtraPresenca", $vServPres);
			

			echo "<meta http-equiv='refresh' content='0;inicio.php?m=config&t=xb'>";

		}

	}

}