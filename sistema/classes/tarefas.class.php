<?php

class tarefas{
	
	private $idtarefa;
	private $dataRuv;
	private $dataRegistro;
	private $semanaRuv;
	private $semanaRuf;
	private $tarefa;
	private $status;
	private $bonus;
	private $anoRuv;
	private $diaRuv;
	private $mesRuv;
	private $codUsuario;

	function getMesRuv(){
		return $this->mesRuv;
	}

	function setMesRuv($mesruv){
		$this->mesRuv = $mesruv;
	}

	function getAnoRuv(){
		return $this->anoRuv;
	}

	function getDiaRuv(){
		return $this->anoRuv;
	}

	function setAnoRuv($anoruv){
		$this->anoRuv = $anoruv;
	}

	function setDiaRuv($diaruv){
		$this->diaRuv = $diaruv;
	}
// ////////////////////////////////////////////////////////////////////
	function getCodUsuario(){
		return $this->codUsuario;
	}

	function setCodUsuario($cod_usuario){
		//echo "<script>alert('".$cod_usuario."')</script>";
		$this->codUsuario = $cod_usuario; //O valor está sendo repassado por aqui.
		//echo "<script>alert('".$this->codUsuario."')</script>";
	}
// ////////////////////////////////////////////////////////////////////
	function getIdTarefa(){
		return $this->idtarefa;
	}

	function getDataRuv(){
		return $this->dataRuv;
	}

	function getDataRegistro(){
		return $this->dataRegistro;
	}

	function getSemanaRuv(){
		return $this->semanaRuv;
	}

	function getSemanaRuf(){
		return $this->semanaRuf;
	}

	function getTarefa(){
		return $this->tarefa;
	}

	function getStatus(){
		return $this->status;
	}

	function getBonus(){
		return $this->bonus;
	}

	function setIdTarefa($idtarefa){
		$this->idtarefa = $idtarefa;
	}

	function setDataRuv($dataruv){
		$this->dataRuv = $dataruv;
	}

	function setDataRegistro($dataregistro){
		$this->dataRegistro = $dataregistro;
	}

	function setSemanaRuv($semanaruv){
		$this->semanaRuv = $semanaruv;
	}

	function setSemanaRuf($semanaruf){
		$this->semanaRuf = $semanaruf;
	}

	function setTarefa($tarefa){
		$this->tarefa = $tarefa;
	}

	function setStatus($status){
		$this->status = $status;
	}

	function setBonus($bonus){
		$this->bonus = $bonus;
	}


	public function telaTarefas(){
        $tab = filter_input(INPUT_GET, 'tab');
        
        switch($tab){
            default :
            	$tarActive = "class = 'active'";
                $regActive = "";
                $bonusActive = "";

                $taref = "btn-primary";
                $reg = "btn-default";
                $bns = "btn-default";
                break;
                
            case "tarefa":
            	$tarActive = "class = 'active'";
                $regActive = "";
                $bonusActive = "";

                $taref = "btn-primary";
                $reg = "btn-default";
                $bns = "btn-default";
                break;
            
            case "registros":
            	$tarActive = "";
                $regActive = "class = 'active'";
                $bonusActive = "";

                $taref = "btn-default";
                $reg = "btn-primary";
                $bns = "btn-default";
                break;
            
            case "bonus":
            	$tarActive = "";
                $regActive = "";
                $bonusActive = "class = 'active'";

                $taref = "btn-default";
                $reg = "btn-default";
                $bns = "btn-primary";
                break;
                
        }

        	//echo "Cód Usuário: ".$this->codUsuario."<br>"; //Não está passando para cá.
            echo "<p style='height: 20px;'>&nbsp;</p>";
            echo "<div class='col-sm-12'>";
            echo "  <div class='btn-group btn-group-justified' role='group'>";
            echo "          <a href='inicio.php?m=taref' class='btn $taref' style='width: 90px;'>";
            echo "              Tarefas";
            echo "          </a>";
            echo "          <a href='inicio.php?m=taref&tab=registros' class='btn $reg' style='width: 90px;'>";
            echo "              Registros";
            echo "          </a>";
            echo "          <a href='inicio.php?m=taref&tab=bonus' class='btn $bns' style='width: 90px;'>";
            echo "              Bônus";
            echo "          </a>";
            echo "  </div>";
            echo "  <p style='height: 20px;'>&nbsp;</p>";
            
            switch ($tab){
                default:
                    echo "<div id='tarefas'>";
                    $this->telaInicialTarefas();
                    echo "</div>";
                    break;

                case "registros":
                    $this->telaRegistroTarefas();
                    break;

                case "bonus":
                    $this->telaBonusTarefas();
                    break;
                    
            }
            echo "</div>";//fecha o col-sm-12
	}

	public function telaBonusTarefas(){
	    echo "<div id='bonus'>";
	    $bonus = new bonus();
	    $bonus->setCodusuario($this->codUsuario);
	    $bonus->telaBonusTarefa();
	    echo "</div>";
	}

	public function telaRegistroTarefas(){
		$con = new conectaBanco();
		$con->conecta();

		$sqlRegistroTarefas = "	SELECT t.idtarefa, t.dataRuv, t.dataRegistro, t.semanaRuv, ts.tarefa, t.status, t.bonus, DATE_FORMAT(dataRuv, '%d/%m/%Y') AS dataRuvFormatada FROM tarefa t
								INNER JOIN tarefasistema ts ON ts.idtarefasistema = t.codTarefa
								WHERE t.codusuario = ".$this->codUsuario; //falta completar

		echo "<div class='col-sm-12'>";
		echo "	<table class='table'>";
		echo "		<tr>";
		echo "			<td>";
		echo "				Data RUV";
		echo "			</td>";
		echo "			<td>";
		echo "				Semana RUV";
		echo "			</td>";
		echo "			<td>";
		echo "				Tarefa";
		echo "			</td>";
		echo "			<td>";
		echo "				Status";
		echo "			</td>";
		echo "			<td>";
		echo "				Bônus";
		echo "			</td>";
		echo "			<td>";
		echo "				Operação";
		echo "			</td>";
		echo "		</tr>";

		try{

			//echo "Tabela: ".$sqlRegistroTarefas."<br>";
			$resultadoRegistrosTarefas = mysql_query($sqlRegistroTarefas) or die("Não foi possível efetuar a consulta de registros de tarefas. Erro: ".mysql_error());

			if(mysql_num_rows($resultadoRegistrosTarefas) >= 1){

				while($dadosTarefas = mysql_fetch_array($resultadoRegistrosTarefas)){

					echo "		<tr>";
					echo "			<td>";
					echo $dadosTarefas['dataRuvFormatada'];
					echo "			</td>";
					echo "			<td>";
					echo $dadosTarefas['semanaRuv'];
					echo "			</td>";
					echo "			<td>";
					echo $dadosTarefas['tarefa'];
					echo "			</td>";
					echo "			<td>";
					echo $dadosTarefas['status'];
					echo "			</td>";
					echo "			<td>";
					echo $dadosTarefas['bonus'];
					echo "			</td>";
					echo "			<td>";
                    $idtarefa = $dadosTarefas['idtarefa'];
                    echo "      <a href='inicio.php?m=taref&tab=registros&e=s&id=".$idtarefa."' alt='Excluir' title='Excluir'>";
                    echo "          <img src='../../images/botaoexcluir.png' id='excluir' title='Excluir'>";
                    echo "      </a>";
                    echo "      <input type='hidden' name='idtarefa' id='idtarefa' value='".$idtarefa."'>";
					echo "			</td>";
					echo "		</tr>";
				}

			}else{
					echo "		<tr>";
					echo "			<td colspan='6'>";
					echo "				<label>Sem registro na tabela</label>";
					echo "			</td>";
					echo "		</tr>";
			}

		}catch(Exception $ex){
			echo "Exception ativado na tabela de registros de tarefas. Descrição: ".$ex->getMessage();
		}


		echo "	</table>";

        if($this->excluiTarefa()){
            echo "<label class='alert alert-success'>Tarefa excluída com sucesso!</label>";
            echo "<meta http-equiv='refresh' content='3;url=inicio.php?m=taref&tab=registros'>";
        }

		echo "</div>";


	}

	public function telaInicialTarefas(){

		//echo "<meta http-equiv='refresh' content='5;url=inicio.php?m=taref'>";

		$con = new conectaBanco();
		$con->conecta();

		$sqlTarefaSystem = "SELECT * FROM tarefasistema";

		echo "<div class='col-sm-12'>";
        $tar = filter_input(INPUT_GET, "t");
        $tab = filter_input(INPUT_GET, 'tab');
        $expRegHora = "__:__";
            
            if($tar === "auto"){
                $desativaData = " readonly='readonly' ";
                $desativaSemana = " readonly='readonly' ";
                $desativaDia = " readonly='readonly' ";
                $marcaInicio = " value='".date('H:i')."' ";
            }else{
                $desativaData = "";
                $desativaSemana = "";
                $desativaDia = "";
                $marcaInicio = "";
            }
            
            $semana = $this->anoRuv."-".$this->semanaRuv;
            $dataCompleta = "0".$this->diaRuv."/0".$this->mesRuv."/201".$this->anoRuv;

            echo "<form name='formTarefas' action='inicio.php?m=taref' method='post'>";
            echo "          <table class='table' style='text-align: justify; border: none;'>";
            echo "              <tr>";
            echo "                  <td width='30'>";
            echo "                      <label>Data RUV</label>";
            echo "					</td>";
            echo "					<td width='100'>";
            echo "                      <input type='text' name='dataRuv' id='dataRuv' value='".$dataCompleta."' class='form-control' style='width: 120px;' $desativaData placeholder='DD/MM/AAAA' required onchange='preencheDataRuv(this.value, \"dataRuv\" )' onkeypress='mascaraData(this)'>";
            echo "                      <input type='hidden' name='dia' id='dia' value='".$this->diaRuv."' class='form-control' style='width: 120px;' required>";
            echo "                      <input type='hidden' name='dataHoje' id='dataHoje' value='".date('d/m/Y')."' class='form-control' style='width: 120px;' $desativaData placeholder='DD/MM/AAAA' required>";

            echo "                  </td>";
            echo "                  <td width='30'>";
            echo "                      <label>Semana RUV</label>";
            echo "                  </td>";
            echo "                  <td width='100'>";
            echo "                      <input type='text' name='semana' id='semana' class='form-control' value='".$semana."' style='width: 80px;' required onchange='preencheDataRuv(this.value, \"semana\")' onkeypress='mascaraSemana(this)'>";
            echo "                  </td>";
            echo "				</tr>";
            echo "          </table>";

            echo "          <table class='table' style='text-align: justify;'>";
            echo "				<tr>";
            echo "                  <td>";
            echo "                      <label>Discriminação da Tarefa</label>";
            echo "                  </td>";
            echo "                  <td style='text-align: center;'>";
            echo "                      <label>Status</label>";
            echo "                  </td>";
            echo "                  <td colspan='2'>";
            echo "                      <label>Bônus</label>";
            echo "                  </td>";
            echo "              </tr>";

            echo "              <tr style='text-align: center;'>";
            echo "                  <td>";
           	echo "						<select name='tarefas' class='form-control'>";
           	echo "							<option name=''>Não selecionado</option>";
           	
           	try{

           		$resultTarefaSystem = mysql_query($sqlTarefaSystem) or die("Erro no comando SQL de consulta Tarefas do Sistema. Erro: ".mysql_error());

           		if(mysql_num_rows($resultTarefaSystem) > 0){

           			while($dadosTarefaSist = mysql_fetch_array($resultTarefaSystem)){
           				echo "<option value=".$dadosTarefaSist['idtarefasistema'].">".$dadosTarefaSist['tarefa']."</option>";
           			}


           		}

           	}catch(Exception $ex){
           		echo "Exception ativado. Descrição: ".$ex->getMessage();
           	}


           	echo "						</select>";
            echo "                  </td>";
            echo "                  <td>";

           	echo "						<input type='radio' name='status' value='Sim' onclick='calculaBonusTarefa(this.value)'> Sim   |   ";
           	echo "						<input type='radio' name='status' value='Não' onclick='calculaBonusTarefa(this.value)'> Não";
            echo "                  </td>";

            echo "                  <td colspan='3'>";
            echo "                      <input type='text' name='bonus' id='bonus' class='form-control' style='width: 80px;' required>";
            echo "                  </td>";
            echo "              </tr>";
            echo "              <tr>";
            echo "                  <td colspan='3'>";
            echo "                      <input type='hidden' id='codusuario' name='codusuario' value='".$_SESSION['idusuario']."'";
            echo "                  </td>";
            echo "              </tr>";
            echo "              <tr>";
            echo "                  <td colspan='3' style='text-align: right;'>";
            echo "                      <a href='inicio.php' class='btn btn-default'>Cancelar</a> ";
            echo "                      <button class='btn btn-primary' type='submit' style='width: 80px;'>Salvar</button>";
            echo "                  </td>";
            echo "              </tr>";
            echo "              <tr>";
            echo "                  <td colspan='3'>";
            echo "                      <div id='erro1' name='erro1' class='alert alert-danger' style='display: none;'>";
            echo "                          Hora do Início superior a Hora do Término";
            echo "                      </div>";
            echo "                      <div id='erro1' name='erro2' class='alert alert-danger' style='display: none;'>Não é permitido duração acima de 1 hora</div>";
            echo "                  </td>";
            echo "              </tr>";
            echo "          </table>";
            echo "</form>";

        if($_POST){
            $dataConvertida = implode("-", array_reverse(explode("/", filter_input(INPUT_POST, 'dataHoje'))));
            $dataRuvConvertida = implode("-", array_reverse(explode("/", filter_input(INPUT_POST, 'dataRuv'))));

            $this->dataRegistro = addslashes($dataConvertida);
            $this->dataRuv = addslashes($dataRuvConvertida);
            $this->diaRuv = addslashes(filter_input(INPUT_POST, 'dia'));
            $this->semanaRuv = addslashes(filter_input(INPUT_POST, 'semana'));
            $this->tarefa = addslashes(filter_input(INPUT_POST, 'tarefas'));
            $this->status = addslashes(filter_input(INPUT_POST, 'status'));
            $this->bonus = addslashes(filter_input(INPUT_POST, 'bonus'));
            $this->diaRuv = addslashes(filter_input(INPUT_POST, 'dia'));
            $this->codusuario = addslashes(filter_input(INPUT_POST, 'codusuario'));
            //$this->dataRuv = $dataRuvConvertida;
            //if($tab === "meditacao"){
            $this->incluiTarefa();
            //}
        }
		echo "</div>";//fecha a div col-sm-12
	}

	public function incluiTarefa(){
		$con = new conectaBanco();
		$con->conecta();

        $this->idtarefa = ultimoId::ultimoIdBanco("idtarefa", "tarefa");

        $this->semanaRuf = 0;

		$sqlIncluiTarefa = "INSERT INTO tarefa (idtarefa, dataRuv, dataRegistro, semanaRuv, semanaRuf, codTarefa, status, bonus, codusuario) VALUES (".$this->idtarefa.", '".$this->dataRuv."', '".$this->dataRegistro."', '".$this->semanaRuv."', ".$this->semanaRuf.", ".$this->tarefa.", '".$this->status."', ".$this->bonus.", ".$this->codusuario.")";

		//echo "SQL: ".$sqlIncluiTarefa."<br>";
		try{
			$resultadoIncluiTarefa = mysql_query($sqlIncluiTarefa) or die("Erro no comando SQL de inclusão de tarefa. Erro: ".mysql_error());

			if($resultadoIncluiTarefa){
				echo "<label class='alert alert-success'>Incluso com sucesso!</label>";
			}


		}catch(Exception $ex){
			echo "Exception ativado na inclusão de tarefas. Descrição: ".$ex->getMessage();
		}


	}

	function tarefaCheck(){
            $tar = filter_input(INPUT_GET, "t");
            
            $dataMarcada = "checked";
            $nivelMarcado = "";

            if($tar === "auto"){
                $auto = "active";
                $manual = "";
                $check = "checked";
            }else if ($tar === "manual"){
                $manual = "active";
                $auto = "";
                $check = "";
            }else{
                $manual = "active";
                $auto = "";
                $check = "";
            }
            
//            echo "<div role='tabpanel' class='tab-pane active' id='meditacao'>";
            echo "<div class='col-sm-8'>";
            echo "  <table>";
            echo "      <tr>";
            echo "          <td>";
            echo "          <div class='btn-group' data-toggle='buttons'>";// btn-group-justified  role='group'
            echo "              <label class='btn btn-default $auto'>";
            echo "                  <input type='radio' name='opcao' id='auto' name='auto' onclick='preencheAutoManualTarefas()'> Automático";
            echo "              </label>";
            echo "              <label class='btn btn-default $manual' style='width: 95px;'>";
            echo "                  <input type='radio' name='opcao' id='manual' name='manual' onclick='preencheAutoManualTarefas()'> Manual";
            echo "              </label>";
            echo "          </div>";
            echo "          </td>";
            echo "          <td>";
            echo "              &nbsp;";
            echo "          </td>";
            echo "          <td>";
            echo "              &nbsp;";
            echo "          </td>";
            echo "          <td>";
            echo "              &nbsp;";
            echo "          </td>";
            echo "          <td>";
            echo "              &nbsp;";
            echo "          </td>";
            echo "          <td>";
            echo "              &nbsp;";
            echo "          </td>";
            echo "			<td>";
            echo "				Semana RUV: ".$this->semanaRuv;
            echo "			</td>";
            echo "      </tr>";
            echo "      <tr>";
            echo "          <td colspan='7'>";
            echo "              &nbsp;";
            echo "          </td>";
            echo "      </tr>";
            echo "  </table>";
            echo "</div>";

	}

	public function excluiTarefa(){
        $e = filter_input(INPUT_GET, 'e');
        $id = filter_input(INPUT_GET, 'id');
        
            if($e === "s"){
                $conecta = new conectaBanco();
                $conecta->conecta();

                $sqlDeletaTarefa = "DELETE FROM tarefa WHERE idtarefa=".$id;

                try{

                    $resultadoDeletaTarefa = mysql_query($sqlDeletaTarefa) or die ("Erro no comando de exclusão. Descrição: ".mysql_error());

                    if($resultadoDeletaTarefa){
                        return true;
                    }else{
                        return false;
                    }

                } catch (Exception $ex) {
                    echo "Exception ativado. Descrição: ".$ex->getMessage();
                }

            }

	}

}