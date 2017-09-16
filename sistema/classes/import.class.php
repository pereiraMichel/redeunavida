<?php

class import{

	private $idcalendario;

	function setIdcalendario($idcalendario){
		$this->idcalendario = $idcalendario;
	}
	
	public function importaBanco($nome_arquivo, $tabela){
		$con = new conectaBanco();
		$con->conecta();

		$arquivo = fopen("../controller/".$nome_arquivo.".csv", "r");

//		while (($data = fgetcsv($arquivo, 1048576, ";"))){

		while(!feof($arquivo)){
			$linha = fgets($arquivo, 1048576);

			$dados = explode(';', $linha);

			//$dados = explode(';', (string)addslashes($linha));

			if($dados[0] != 'ID' && !empty($linha)){

				//while($dados){

				//$this->idcalendario = ultimoId::ultimoIdBanco("idcalendario", "calendario");

				$sqlImport = "INSERT INTO $tabela 
							(idcalendario, 
							estacaoExtenso, 
							ano, 
							diaAno, 
							estacao, 
							diaDoMes, 
							diaCadaMes, 
							diaSemana, 
							semana, 
							semanaExtensa, 
							diaMes, 
							mesExtenso, 
							anoCompleto) 
							VALUES (
							".$dados[0].", 
							'".$dados[1]."', 
							".$dados[2].", 
							".$dados[3].", 
							".$dados[4].", 
							".$dados[5].", 
							".$dados[6].", 
							".$dados[7].", 
							".$dados[8].", 
							'".$dados[9]."', 
							".$dados[10].", 
							'".$dados[11]."', 
							'".$dados[12]."')";

							//echo $sqlImport."<br>";

				$resultadoImport = mysql_query($sqlImport) or die ("Houve um problema no comando SQL. Descrição: ".mysql_error());

				if(!$resultado){
					return false;
				}
							//	}

			}

		}

		fclose($arquivo);
		return true;
	}

	public function telaImport(){

		echo "<div class='col-sm-12'>";
		echo "	Nome do arquivo: tabelaAnualRUV2016-2017.csv";
		echo "	<form name='import' method='post' action='inicio.php?m=import'>";
		echo "		<table class='table'>";
		echo "		<tr>";
		echo "			<td>";
		echo "				<label>Nome do arquivo: ";
		echo "					<input type='text' id='nome_arquivo' name='nome_arquivo' class='form-control'>";
		echo "				</label>";
		echo "			</td>";
		echo "		</tr>";
		echo "		<tr>";
		echo "			<td>";
		echo "				<label>Nome da tabela: ";
		echo "					<input type='text' id='nome_tabela' name='nome_tabela' class='form-control'>";
		echo "				</label>";
		echo "			</td>";
		echo "		</tr>";
		echo "		<tr>";
		echo "			<td>";
		echo "				&nbsp;";
		echo "			</td>";
		echo "		</tr>";
		echo "		<tr>";
		echo "			<td>";
		echo "				<button type='submit' class='btn btn-primary'>Salvar</button>";
		echo "			</td>";
		echo "		</tr>";
		echo "		</table>";
		echo "	</form>";

		if($_POST){
			if($this->importaBanco($_POST['nome_arquivo'], $_POST['nome_tabela'])){
				echo "<label class='alert alert-success'>Salvo com sucesso!</label>";
			}else{
//				echo $_POST['nome_arquivo']."<br>";
//				echo $_POST['nome_tabela']."<br>";
				echo "Houve um problema.";
			}
		}

//tabelaAnualRUV2016-2017

		echo "</div>";


	}

}