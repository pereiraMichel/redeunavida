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
	private $codusuario;
	private $anoRuv;
	private $diaRuv;

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

	function getCodUsuario(){
		return $this->codusuario;
	}

	function setCodUsuario($codusuario){
		$this->codusuario = $codusuario;
	}

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
/*                    echo "<div id='bonus'>";
                    $bonus = new bonus();
                    $bonus->setCodusuario($this->codusuario);
                    $bonus->telaBonusTarefas();
                    echo "</div>";*/
                    break;
                    
            }
            echo "</div>";//fecha o col-sm-12
            
//            echo "</div>";

	}

	public function telaBonusTarefas(){
		echo "Bônus Tarefas";
	}

	public function telaRegistroTarefas(){
		echo "Registros";
	}

	public function telaInicialTarefas(){

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

            echo "<form name='formTarefas' action='inicio.php?m=taref' method='post'>";
//            $this->meditacaoBotao();
//            $this->tarefaCheck();

/*            echo "<table class='table' style='text-align: justify;'>";
            echo "	<tr>";
            echo "		<td width='90'>";
			echo "			<label>Data RUV</label>";
			echo "		</td>";
			echo"		<td>";
			echo "			<input type='text' name='dataRuv' id='dataRuv' value='".$this->dataRuv."' class='form-control' style='width: 120px;' $desativaData placeholder='DD/MM/AAAA' required onchange='preencheDataRuv(this.value, \"dataRuv\" )' onkeypress='mascaraData(this)'>";
			echo "		</td>";
			echo "	</tr>";*/

//			echo "<label>Semana<input type='text' name='semana' id='semana' class='form-control' value='".$semana."' style='width: 80px;' required onchange='preencheDataRuv(this.value, \"semana\")'></label>";

//			echo "</table>";

            echo "          <table class='table' style='text-align: justify; border: none;'>";

            echo "              <tr>";
            echo "                  <td width='30'>";
            echo "                      <label>Data</label>";
            echo "					</td>";
            echo "					<td width='100'>";
            echo "                      <input type='text' name='dataRuv' id='dataRuv' value='".$this->dataRuv."' class='form-control' style='width: 120px;' $desativaData placeholder='DD/MM/AAAA' required onchange='preencheDataRuv(this.value, \"dataRuv\" )' onkeypress='mascaraData(this)'>";
            echo "                      <input type='hidden' name='dataHoje' id='dataHoje' value='".date('d/m/Y')."' class='form-control' style='width: 120px;' $desativaData placeholder='DD/MM/AAAA' required>";

            echo "                  </td>";
            echo "                  <td width='30'>";
            echo "                      <label>Semana RUV</label>";
            echo "                  </td>";
            echo "                  <td width='100'>";
            echo "                      <input type='text' name='semana' id='semana' class='form-control' value='".$semana."' style='width: 80px;' required onchange='preencheDataRuv(this.value, \"semana\")'>";
            echo "                  </td>";
/*            echo "                  <td width='20'>";
            echo "                      <label>Dia RUV</label>";
            echo "                  </td>";
            echo "                  <td width='100'>";
            echo "                      <input type='text' name='dia' id='dia' class='form-control' value='".$this->diaRuv."' style='width: 50px;' required onchange='preencheDataRuv(this.value, \"dia\")'>";
            echo "                  </td>";*/
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

           	echo "						<input type='radio' name='opcao' value='sim'> Sim   |   ";
           	echo "						<input type='radio' name='opcao' value='nao'> Não";
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
            $novoNivel = str_replace(",",".", filter_input(INPUT_POST, 'nivel'));
            $dataConvertida = implode("-", array_reverse(explode("/", filter_input(INPUT_POST, 'dataHoje'))));
            $dataRuvConvertida = implode("-", array_reverse(explode("/", filter_input(INPUT_POST, 'dataRuv'))));

            $this->dataRegistro = addslashes($dataConvertida);
            $this->paragem = addslashes(filter_input(INPUT_POST, 'semana'));
            $this->duracao = addslashes(filter_input(INPUT_POST, 'duracao'));
            $this->nivel = addslashes($novoNivel);
            $this->bonus = addslashes(filter_input(INPUT_POST, 'bonus'));
            $this->periodo = addslashes(filter_input(INPUT_POST, 'periodo'));
            $this->inicio = addslashes(filter_input(INPUT_POST, 'inicio'));
            $this->termino = addslashes(filter_input(INPUT_POST, 'termino'));
            $this->diaRuv = addslashes(filter_input(INPUT_POST, 'dia'));
            $this->codusuario = addslashes(filter_input(INPUT_POST, 'codusuario'));
            $this->dataRuv = $dataRuvConvertida;
            if($tab === "meditacao"){
                $this->verificaPP();
            }
        }
		echo "</div>";//fecha a div col-sm-12
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

}