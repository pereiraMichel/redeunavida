<?php


class Pesquisas{
	
	private $id_usuario;
	private $nome_usuario;
	private $dataRuv;
	private $semanaRuv;
	private $dataRegistro;
	private $inicio;
	private $termino;
	private $nivel;
	private $periodo;
	private $sonho;
	private $corpo;
	private $retro;
	private $parpres;
	private $status;
	private $descrTarefa;
	private $focalizacao;
	private $presenca;
	private $outros;
	private $tipoBusca;

	public function setTipoBusca($tipobusca){
		$this->tipoBusca = $tipobusca;
	}

	public function setDataRuv($dataruv){
		$hits->dataRuv = $dataruv;
	}

	public function setSemanaRuv($semanaruv){
		$this->semanaRuv = $semanaruv;
	}

	public function setDataRegistro($dataregistro){
		$this->dataRegistro = $dataregistro;
	}

	public function setInicio($inicio){
		$this->inicio = $inicio;
	}

	public function setTermino($termino){
		$this->termino = $termino;
	}

	public function setNivel($nivel){
		$this->nivel = $nivel;
	}

	public function setPeriodo($periodo){
		$this->periodo = $periodo;
	}

	public function setSonho($sonho){
		$this->sonho = $sonho;
	}

	public function setCorpo($corpo){
		$this->corpo = $corpo;
	}

	public function setRetro($retro){
		$this->retro = $retro;
	}

	public function setParpres($parpres){
		$this->parpres = $parpres;
	}

	public function setStatus($status){
		$this->status = $status;
	}

	public function setDescrTarefa($descrtarefa){
		$this->descrTarefa = $descrtarefa;
	}

	public function setFocalizacao($focalizacao){
		$this->focalizacao = $focalizacao;
	}

	public function setPresenca($presenca){
		$this->presenca = $presenca;
	}

	public function setOutros($outros){
		$this->outros = $outros;
	}


	public function setId_usuario($id_usuario){
		$this->id_usuario = $id_usuario;
	}

	public function setNome_usuario ($nome_usuario){
		$this->nome_usuario = $nome_usuario;
	}


	public function telaPesquisas($classe){

		if($classe === "meditacao"){
			$link = "pp";
		}else
		if($classe === "portal"){
			$link = "port";
		}else
		if($classe === "presparagem"){
			$link = "para";
		}else
		if($classe === "tarefas"){
			$link = "taref";
		}else
		if($classe === "servicos"){
			$link = "serv";
		}

		$getTipo = filter_input(INPUT_GET, 'tpesq');

		//echo "<meta http-equiv='refresh' content='3;url=inicio.php?m=pesq'>";
		echo "<form class='form-horizontal' action='inicio.php?m=".$link."&tab=pesquisas' method='post' id='formPesquisa' name='formPesquisa'>";
		echo "	<div class='col-sm-1'>";
		echo "		&nbsp;";
		echo "	</div>";
		echo "	<div class='col-sm-10'>";
		echo "		<table class='table' style='text-align: justify;'>";
		echo "			<tr style='text-align: justify;'>";
		echo "				<td>";
		echo "					<label>Pesquisa por: </label>";
		echo "				</td>";
		echo "				<td>";
		echo "					<div class='span3' style='text-align: justify;'>";
		echo "					<select name='tpesq' class='form-control' onchange='preencheTipoPesquisa(this.value, \"$link\")'>";
		
		if(!empty($getTipo)){

			switch ($getTipo) {
				case 'dataRuv':
						$campoSelect = "Data RUV";
						$mascaraCampo = " onkeypress='mascaraDataRuv(this)'";
						$somenteNumeros = " onkeyup='somenteNumeros(this)'";
					break;
				case 'paragem':
						$campoSelect = "Semana RUV";
						$mascaraCampo = " onkeypress='mascaraSemana(this)'";
						$somenteNumeros = " onkeyup='somenteNumeros(this)'";
					break;
				case 'semana':
						$campoSelect = "Semana RUV";
						$mascaraCampo = " onkeypress='mascaraSemana(this)'";
						$somenteNumeros = " onkeyup='somenteNumeros(this)'";
					break;
				case 'semanaRuv':
						$campoSelect = "Semana RUV";
						$mascaraCampo = " onkeypress='mascaraSemana(this)'";
						$somenteNumeros = " onkeyup='somenteNumeros(this)'";
					break;
				case 'dataRegistro':
						$campoSelect = "Data Registro";
						$mascaraCampo = " onkeypress='mascaraData(this)'";
						$somenteNumeros = " onkeyup='somenteNumeros(this)'";
					break;
				case 'inicio':
						$campoSelect = "Início";
						$mascaraCampo = " onkeypress='mascara(this)'";
						$somenteNumeros = " onkeyup='somenteNumeros(this)'";
					break;
				case 'termino':
						$campoSelect = "Término";
						$mascaraCampo = " onkeypress='mascara(this)'";
						$somenteNumeros = " onkeyup='somenteNumeros(this)'";
					break;
				case 'nivel':
						$campoSelect = "Nível";
						$mascaraCampo = "";
						$somenteNumeros = " onkeyup='somenteNumeros(this)'";
					break;
				case 'periodo':
						$campoSelect = "Período";
						$mascaraCampo = "";
						$somenteNumeros = "";
					break;
					//Parte Portais
				case 'sonho':
						$campoSelect = "Sonho";
						$mascaraCampo = "";
						$somenteNumeros = "";
					break;
				case 'corpo':
						$campoSelect = "Corpo";
						$mascaraCampo = "";
						$somenteNumeros = "";
					break;
				case 'retro':
						$campoSelect = "Retrospectiva";
						$mascaraCampo = "";
						$somenteNumeros = "";
					break;
					//Parte Paragem-Presença
				case 'presenca':
						$campoSelect = "Presença-Paragem";
						$mascaraCampo = "";
						$somenteNumeros = "";
					break;
				case 'status':
						$campoSelect = "Status";
						$mascaraCampo = "";
						$somenteNumeros = "";
					break;
					//Parte Tarefas
				case 'tabela':
						$campoSelect = "Descrição da tabela";
						$mascaraCampo = "";
						$somenteNumeros = "";
					break;
					//Parte Serviços e Extras
				case 'servico':
						$campoSelect = "Serviços";
						$mascaraCampo = "";
						$somenteNumeros = "";
					break;
				case 'outros':
						$campoSelect = "Outros";
						$mascaraCampo = "";
						$somenteNumeros = "";
					break;

				
				default:
					# code...
					break;
			}


			echo "					<option value='".$getTipo."'>".$campoSelect."</option>";
		}

			echo "					<option value=''></option>";

		switch ($classe) {
			case 'meditacao':
			echo "					<option value='dataRuv'>Data RUV</option>";
			echo "					<option value='semana'>Semana RUV</option>";
			echo "					<option value='dataRegistro'>Data Registro</option>";
			echo "					<option value='inicio'>Início</option>";
			echo "					<option value='termino'>Término</option>";
			echo "					<option value='nivel'>Nível</option>";
			echo "					<option value='periodo'>Período</option>";
				break;
			
			case 'portal':
			echo "					<option value='dataRuv'>Data RUV</option>";
			echo "					<option value='semanaRuv'>Semana RUV</option>";
			echo "					<option value='dataRegistro'>Data Registro</option>";
			echo "					<option value='sonho'>Sonho</option>";
			echo "					<option value='corpo'>Corpo</option>";
			echo "					<option value='retro'>Retrospectiva</option>";
				break;

			case 'presparagem':
			echo "					<option value='dataRuv'>Data RUV</option>";
			echo "					<option value='semanaRuv'>Semana RUV</option>";
			echo "					<option value='dataRegistro'>Data Registro</option>";
			echo "					<option value='presenca'>Presença-Paragem</option>";
			echo "					<option value='status'>Status</option>";
				break;
			
			case 'tarefas':
			echo "					<option value='dataRuv'>Data RUV</option>";
			echo "					<option value='semanaRuv'>Semana RUV</option>";
			echo "					<option value='dataRegistro'>Data Registro</option>";
//			echo "					<option value='tabela'>Descrição da tabela</option>";
			echo "					<option value='status'>Status</option>";
				break;
			
			case 'servicos':
			echo "					<option value='dataRuv'>Data RUV</option>";
			echo "					<option value='semanaRuv'>Semana RUV</option>";
			echo "					<option value='dataRegistro'>Data Registro</option>";
			echo "					<option value='servico'>Serviços</option>";
//			echo "					<option value='servico'>Presença</option>";
			echo "					<option value='status'>Status</option>";
			echo "					<option value='outros'>Outros</option>";
				break;
			
			
			default:
			echo "					<option value='semregistro'>Sem Registro</option>";
				break;
		}

		echo "					</select>";
		echo "				</div>";
		echo "				</td>";
		echo "			</tr>";
		echo "			<tr style='text-align: justify;'>";
		echo "				<td>";
		echo "					<label>Campo: </label>";
		echo "				</td>";
		echo "				<td>";
		echo "					<div class='span5'>";
		echo "						<input type='text' name='campo' id='campo' class='form-control' $mascaraCampo $somenteNumeros>";
		echo "					</div>";
		echo "				</td>";
		echo "			</tr>";
		echo "			<tr style='text-align: justify;'>";
		echo "				<td colspan='2'>";
		echo "					&nbsp;";
		echo "				</td>";
		echo "			</tr>";
		echo "			<tr style='text-align: justify;'>";
		echo "				<td>";
        echo "                  <a class='btn btn-default' href='inicio.php?m=".$link."&tab=bonus'>";
        echo "                  	<img src='../img/btn_back.png' width='25' height='25'>";
        echo "                  </a>";
		echo "					<br><a href='inicio.php?m=".$link."&tab=bonus' style='padding-left: 8px; color: #000; text-decoration: none;'>Voltar</a>";
		echo "				</td>";
		echo "				<td>";
		echo "					<button type='submit' class='btn btn-default' style='margin-left: 4px;'>";
        echo "                  	<img src='../img/zoom.png' width='25' height='25'>";
		echo "					</button>";
		echo "					<br><a onclick='document.getElementById(\"formPesquisa\").submit()' href='#' style='color: #000; text-decoration: none;'>Pesquisar</a>";
		echo "				</td>";
		echo "			</tr>";

		echo "		</table>";
		echo "	</div>";
		echo "	<div class='col-sm-1'>";
		echo "		&nbsp;";
		echo "	</div>";
		echo "</form>";

		if($_POST){

			$registro = filter_input(INPUT_GET, 'm');

			$this->id_usuario = $_SESSION['idusuario'];

			$pesquisa = filter_input(INPUT_POST, 'tpesq');
			$campoPesquisa = filter_input(INPUT_POST, 'campo');

			if($pesquisa === "dataRegistro"){
	            $dataConvertida = implode("-", array_reverse(explode("/", filter_input(INPUT_POST, 'campo'))));
				$campoPesquisa = $dataConvertida;
			}

			switch($registro){
				case "pp":
					$this->pesquisaMeditacao($pesquisa, $campoPesquisa);
				break;
				case "port":
					$this->pesquisaPortal($pesquisa, $campoPesquisa);
				break;
				case "para":
					$this->pesquisaPresParagem($pesquisa, $campoPesquisa);
				break;
				case "taref":
					$this->pesquisaTarefas($pesquisa, $campoPesquisa);
				break;
				case "serv":
					$this->pesquisaServicos($pesquisa, $campoPesquisa);
				break;
			}

		}
	}


	public function pesquisaMeditacao($pesquisa, $campo){

		$conecta = new conectaBanco();
		$conecta->conecta();

		$sqlBuscaMeditacao = "SELECT *, DATE_FORMAT(dataRuv, '%d/%m/%Y') AS dataRuvFormat, DATE_FORMAT(dataRegistro, '%d/%m/%Y') AS dataRegistroFormat 
							  FROM pp  WHERE $pesquisa LIKE '%".$campo."%' AND codusuario = ".$this->id_usuario;


			///echo "SQL: ".$sqlBuscaMeditacao."<br>";

		try{

			$resultadoBuscaMeditacao = mysql_query($sqlBuscaMeditacao) or die ("Houve um erro no comando SQL de busca. Erro: ".mysql_error());

			if(mysql_num_rows($resultadoBuscaMeditacao) > 0){

				echo "<table class='table'>";
				echo "	<tr>";
				echo "		<td>";
				echo "			Data RUV";
				echo "		</td>";
				echo "		<td>";
				echo "			Data Registro";
				echo "		</td>";
				echo "		<td>";
				echo "			Início";
				echo "		</td>";
				echo "		<td>";
				echo "			Término";
				echo "		</td>";
				echo "		<td>";
				echo "			Duração";
				echo "		</td>";
				echo "		<td>";
				echo "			Nível";
				echo "		</td>";
				echo "		<td>";
				echo "			Bônus";
				echo "		</td>";
				echo "		<td>";
				echo "			Período";
				echo "		</td>";
				echo "	</tr>";
				while($dadosBuscaMed = mysql_fetch_array($resultadoBuscaMeditacao)){ 
				echo "	<tr>";
				echo "		<td>";
				echo 			$dadosBuscaMed['dataRuv'];
				echo "		</td>";
				echo "		<td>";
				echo 			$dadosBuscaMed['dataRegistroFormat'];
				echo "		</td>";
				echo "		<td>";
				echo 			$dadosBuscaMed['inicio'];
				echo "		</td>";
				echo "		<td>";
				echo 			$dadosBuscaMed['termino'];
				echo "		</td>";
				echo "		<td>";
				echo 			$dadosBuscaMed['duracao'];
				echo "		</td>";
				echo "		<td>";
				echo 			$dadosBuscaMed['nivel'];
				echo "		</td>";
				echo "		<td>";
				echo 			$dadosBuscaMed['bonus'];
				echo "		</td>";
				echo "		<td>";
				echo 			$dadosBuscaMed['periodo'];
				echo "		</td>";
				echo "	</tr>";
				}
				echo "</table>";

			}else{

                        echo "<label class='alert alert-warning' style='text-align: center; width: 600px;'>";
                        echo "  Ops! Pesquisa não localizada.";
                        echo "  <button type='button' class='close' data-dismiss='alert' aria-label='Fechar'>";
                        echo "      <span aria-hidden='true'> &times;</span>";
                        echo "  </button>";
                        echo "</label><br>";

			}

		}catch(Exception $ex){
			echo "Exception ativado. Descrição: ".$ex->getMessage();
		}


	}

	public function pesquisaPortal($pesquisa, $campo){

		$conecta = new conectaBanco();
		$conecta->conecta();

		$sqlBuscaPortal = "SELECT *, DATE_FORMAT(dataRegistro, '%d/%m/%Y') AS dataRegistroFormat 
							  FROM portal  WHERE $pesquisa LIKE '%".$campo."%' AND codusuario = ".$this->id_usuario;


			///echo "SQL: ".$sqlBuscaMeditacao."<br>";

		try{

			$resultadoBuscaPortal = mysql_query($sqlBuscaPortal) or die ("Houve um erro no comando SQL de busca. Erro: ".mysql_error());

			if(mysql_num_rows($resultadoBuscaPortal) > 0){

				echo "<table class='table'>";
				echo "	<tr>";
				echo "		<td>";
				echo "			Data RUV";
				echo "		</td>";
				echo "		<td>";
				echo "			Data Registro";
				echo "		</td>";
				echo "		<td>";
				echo "			Sonho";
				echo "		</td>";
				echo "		<td>";
				echo "			Completação";
				echo "		</td>";
				echo "		<td>";
				echo "			Corpo";
				echo "		</td>";
				echo "		<td>";
				echo "			Retrospectiva";
				echo "		</td>";
				echo "		<td>";
				echo "			Completação";
				echo "		</td>";
				echo "		<td>";
				echo "			Bônus";
				echo "		</td>";
				echo "	</tr>";
				while($dadosBuscaPort = mysql_fetch_array($resultadoBuscaPortal)){ 
				echo "	<tr>";
				echo "		<td>";
				echo 			$dadosBuscaPort['dataRuv'];
				echo "		</td>";
				echo "		<td>";
				echo 			$dadosBuscaPort['dataRegistroFormat'];
				echo "		</td>";
				echo "		<td>";
				echo 			$dadosBuscaPort['sonho'];
				echo "		</td>";
				echo "		<td>";
				echo 			$dadosBuscaPort['compSonho'];
				echo "		</td>";
				echo "		<td>";
				echo 			$dadosBuscaPort['corpo'];
				echo "		</td>";
				echo "		<td>";
				echo 			$dadosBuscaPort['retro'];
				echo "		</td>";
				echo "		<td>";
				echo 			$dadosBuscaPort['compRetro'];
				echo "		</td>";
				echo "		<td>";
				echo 			$dadosBuscaPort['bonus'];
				echo "		</td>";
				echo "	</tr>";
				}
				echo "</table>";

			}else{

                        echo "<label class='alert alert-warning' style='text-align: center; width: 600px;'>";
                        echo "  Ops! Pesquisa não localizada.";
                        echo "  <button type='button' class='close' data-dismiss='alert' aria-label='Fechar'>";
                        echo "      <span aria-hidden='true'> &times;</span>";
                        echo "  </button>";
                        echo "</label><br>";

			}

		}catch(Exception $ex){
			echo "Exception ativado. Descrição: ".$ex->getMessage();
		}


	}

	public function pesquisaPresParagem($pesquisa, $campo){

		$conecta = new conectaBanco();
		$conecta->conecta();

		$sqlBuscaPresParagem = "SELECT p.*, t.descricao, DATE_FORMAT(p.dataRegistro, '%d/%m/%Y') AS dataRegistroFormat 
							  FROM presparagem p
							  INNER JOIN tabpresparagem t ON p.pp = t.idtabpresparagem 
							  WHERE $pesquisa LIKE '%".$campo."%' AND codusuario = ".$this->id_usuario;


		//echo "SQL: ".$sqlBuscaPresParagem."<br>";

		try{

			$resultadoBuscaPresParagem = mysql_query($sqlBuscaPresParagem) or die ("Houve um erro no comando SQL de busca. Erro: ".mysql_error());

			if(mysql_num_rows($resultadoBuscaPresParagem) > 0){

				echo "<table class='table'>";
				echo "	<tr>";
				echo "		<td>";
				echo "			Data RUV";
				echo "		</td>";
				echo "		<td>";
				echo "			Data Registro";
				echo "		</td>";
				echo "		<td>";
				echo "			Presença-Paragem";
				echo "		</td>";
				echo "		<td>";
				echo "			Status";
				echo "		</td>";
				echo "		<td>";
				echo "			Bônus";
				echo "		</td>";
				echo "	</tr>";
				while($dadosBuscaPresParagem = mysql_fetch_array($resultadoBuscaPresParagem)){ 
				echo "	<tr>";
                echo "  <tr>";
                echo "      <td>";
                echo            $dadosBuscaPresParagem['dataRuv'];
                echo "      </td>";
                echo "      <td>";
                echo            $dadosBuscaPresParagem['dataRegistroFormat'];
                echo "      </td>";
                echo "      <td>";
                echo            $dadosBuscaPresParagem['descricao'];
                echo "      </td>";
                echo "      <td>";
                echo            $dadosBuscaPresParagem['status'];
                echo "      </td>";
                echo "      <td>";
                echo            $dadosBuscaPresParagem['bonus'];
                echo "      </td>";
				echo "	</tr>";
				}
				echo "</table>";

			}else{

                        echo "<label class='alert alert-warning' style='text-align: center; width: 600px;'>";
                        echo "  Ops! Pesquisa não localizada.";
                        echo "  <button type='button' class='close' data-dismiss='alert' aria-label='Fechar'>";
                        echo "      <span aria-hidden='true'> &times;</span>";
                        echo "  </button>";
                        echo "</label><br>";

			}

		}catch(Exception $ex){
			echo "Exception ativado. Descrição: ".$ex->getMessage();
		}


	}

	public function pesquisaTarefas($pesquisa, $campo){

		$conecta = new conectaBanco();
		$conecta->conecta();

		$sqlBuscaTarefas = "SELECT t.*, ts.tarefa, DATE_FORMAT(t.dataRegistro, '%d/%m/%Y') AS dataRegistroFormat 
							  FROM tarefa t
							  INNER JOIN tarefasistema ts ON ts.idtarefasistema = t.codTarefa
							  WHERE $pesquisa LIKE '%".$campo."%' AND codusuario = ".$this->id_usuario;


		//echo "SQL: ".$sqlBuscaTarefas."<br>";

		try{

			$resultadoBuscaTarefas = mysql_query($sqlBuscaTarefas) or die ("Houve um erro no comando SQL de busca. Erro: ".mysql_error());

			if(mysql_num_rows($resultadoBuscaTarefas) > 0){

				echo "<table class='table'>";
				echo "	<tr>";
				echo "		<td>";
				echo "			Data RUV";
				echo "		</td>";
				echo "		<td>";
				echo "			Data Registro";
				echo "		</td>";
				echo "		<td>";
				echo "			Tarefa";
				echo "		</td>";
				echo "		<td>";
				echo "			Status";
				echo "		</td>";
				echo "		<td>";
				echo "			Bônus";
				echo "		</td>";
				echo "	</tr>";
				while($dadosTarefas = mysql_fetch_array($resultadoBuscaTarefas)){ 
				echo "	<tr>";
				echo "			<td>";
				echo 				$dadosTarefas['dataRuv'];
				echo "			</td>";
				echo "			<td>";
				echo 				$dadosTarefas['dataRegistroFormat'];
				echo "			</td>";
				echo "			<td>";
				echo 				$dadosTarefas['tarefa'];
				echo "			</td>";
				echo "			<td>";
				echo 				$dadosTarefas['status'];
				echo "			</td>";
				echo "			<td>";
				echo 				$dadosTarefas['bonus'];
				echo "			</td>";
				echo "	</tr>";
				}
				echo "</table>";

			}else{

                        echo "<label class='alert alert-warning' style='text-align: center; width: 600px;'>";
                        echo "  Ops! Pesquisa não localizada.";
                        echo "  <button type='button' class='close' data-dismiss='alert' aria-label='Fechar'>";
                        echo "      <span aria-hidden='true'> &times;</span>";
                        echo "  </button>";
                        echo "</label><br>";

			}

		}catch(Exception $ex){
			echo "Exception ativado. Descrição: ".$ex->getMessage();
		}


	}


	public function pesquisaServicos($pesquisa, $campo){

		$conecta = new conectaBanco();
		$conecta->conecta();

		$sqlBuscaServicos = "SELECT *, DATE_FORMAT(dataRegistro, '%d/%m/%Y') AS dataRegistroFormat 
							  FROM servicos
							  WHERE $pesquisa LIKE '%".$campo."%' AND codusuario = ".$this->id_usuario;


		//echo "SQL: ".$sqlBuscaTarefas."<br>";

		try{

			$resultadoBuscaServicos = mysql_query($sqlBuscaServicos) or die ("Houve um erro no comando SQL de busca. Erro: ".mysql_error());

			if(mysql_num_rows($resultadoBuscaServicos) > 0){

				echo "<table class='table'>";
            echo "              <tr>";
            echo "                  <td>";
            echo "                      Data RUV";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      Data Registro";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      Serviço";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      Status";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      Outros/ Extras";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      Bônus";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      &nbsp;";
            echo "                  </td>";
            echo "              </tr>";

            while($dadosServicos = mysql_fetch_array($resultadoBuscaServicos)){
                echo "              <tr>";
                echo "                  <td>";
                echo                        $dadosServicos['dataRuv'];
                echo "                  </td>";
                echo "                  <td>";
                echo                        $dadosServicos['dataRegistroFormat'];
                echo "                  </td>";
                echo "                  <td>";
                echo                        $dadosServicos['servico'];
                echo "                  </td>";
                echo "                  <td>";
                echo                        $dadosServicos['opcao'];
                echo "                  </td>";
                echo "                  <td>";
                echo                        $dadosServicos['outros'];
                echo "                  </td>";
                echo "                  <td>";
                echo                        $dadosServicos['bonus'];
                echo "                  </td>";
				echo "				</tr>";
				}
				echo "</table>";

			}else{

                        echo "<label class='alert alert-warning' style='text-align: center; width: 600px;'>";
                        echo "  Ops! Pesquisa não localizada.";
                        echo "  <button type='button' class='close' data-dismiss='alert' aria-label='Fechar'>";
                        echo "      <span aria-hidden='true'> &times;</span>";
                        echo "  </button>";
                        echo "</label><br>";

			}

		}catch(Exception $ex){
			echo "Exception ativado. Descrição: ".$ex->getMessage();
		}


	}


}