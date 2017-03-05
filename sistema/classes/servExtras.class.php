<?php

class servExtras{
	
	private $idservicos;
	private $dataRuv;
	private $dataRegistro;
	private $diaRuv;
	private $semanaRuv;
	private $focalizacao;
	private $opcaofocalizacao;
	private $presenca;
	private $opcaopresenca;
	private $outros;
	private $bonus;
	private $codusuario;

	function getDataRuv(){
		return $this->dataRuv;
	}
	
	function setDataRuv($dataRuv){
		$this->dataRuv = $dataRuv;
	}

	function getIdservicos(){
		return $this->idservicos;
	}

	function setIdservicos($idservicos){
		$this->idservicos = $idservicos;
	}

	function getDataRegistro(){
		return $this->dataRegistro;
	}

	function setDataRegistro($dataRegistro){
		$this->dataRegistro = $dataRegistro;
	}

	function getDiaRuv(){
		return $this->diaRuv;
	}

	function setDiaRuv($diaRuv){
		$this->diaRuv = $diaRuv;
	}

	function getSemanaRuv(){
		return $this->semanaRuv;
	}

	function setSemanaRuv($semanaruv){
		$this->semanaRuv = $semanaruv;
	}

	function getFocalizacao(){
		return $this->focalizacao;
	}

	function setFocalizacao($focalizacao){
		$this->focalizacao = $focalizacao;
	}

	function getOpcaofocalizacao(){
		return $this->opcaofocalizacao;
	}

	function setOpcaofocalizacao($opcaofocalizacao){
		$this->opcaofocalizacao = $opcaofocalizacao;
	}

	function getPresenca(){
		return $this->presenca;
	}

	function setPresenca($presenca){
		$this->presenca = $presenca;
	}

	function getOpcaopresenca(){
		return $this->opcaopresenca;
	}

	function setOpcaopresenca($opcaopresenca){
		$this->opcaopresenca = $opcaopresenca;
	}

	function getOutros(){
		return $this->outros;
	}

	function setOutros($outros){
		$this->outros = $outros;
	}

	function getBonus(){
		return $this->bonus;
	}

	function setBonus($bonus){
		$this->bonus = $bonus;
	}

	function getCodusuario(){
		return $this->codusuario;
	}

	function setCodusuario($codusuario){
		$this->codusuario = $codusuario;
	}


	public function telaInicialServ(){
        $tab = filter_input(INPUT_GET, 'tab');
        
        switch($tab){
            default :
            	$servActive = "class = 'active'";
                $regActive = "";
                $bonusActive = "";

                $serv = "btn-primary";
                $reg = "btn-default";
                $bns = "btn-default";
                break;
                
            case "tarefa":
            	$servActive = "class = 'active'";
                $regActive = "";
                $bonusActive = "";

                $serv = "btn-primary";
                $reg = "btn-default";
                $bns = "btn-default";
                break;
            
            case "registros":
            	$servActive = "";
                $regActive = "class = 'active'";
                $bonusActive = "";

                $serv = "btn-default";
                $reg = "btn-primary";
                $bns = "btn-default";
                break;
            
            case "bonus":
            	$servActive = "";
                $regActive = "";
                $bonusActive = "class = 'active'";

                $serv = "btn-default";
                $reg = "btn-default";
                $bns = "btn-primary";
                break;
                
        }
            echo "<p style='height: 20px;'>&nbsp;</p>";
            echo "<div class='col-sm-12'>";
            echo "  <div class='btn-group btn-group-justified' role='group'>";
            echo "          <a href='inicio.php?m=serv' class='btn $serv' style='width: 90px;'>";
            echo "              Serviços e Extras";
            echo "          </a>";
            echo "          <a href='inicio.php?m=serv&tab=registros' class='btn $reg' style='width: 90px;'>";
            echo "              Registros";
            echo "          </a>";
            echo "          <a href='inicio.php?m=serv&tab=bonus' class='btn $bns' style='width: 90px;'>";
            echo "              Bônus";
            echo "          </a>";
            echo "  </div>";
            echo "  <p style='height: 20px;'>&nbsp;</p>";
            
            switch ($tab){
                default:
                    echo "<div id='serv'>";
                    $this->telaServExtras();
                    echo "</div>";
                    break;

                case "registros":
                    $this->telaRegistroServ();
                    break;

                case "bonus":
                    $this->telaBonusServ();
                    break;
                    
            }
            echo "</div>";//fecha o col-sm-12

	}

	public function telaServExtras(){
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
            echo "          <table class='table' style='text-align: justify; border: none;'>";
            echo "              <tr>";
            echo "                  <td width='30'>";
            echo "                      <label>Data</label>";
            echo "					</td>";
            echo "					<td width='100'>";
            echo "                      <input type='text' name='dataRuv' id='dataRuv' value='".$this->dataRuv."' class='form-control' style='width: 120px;' $desativaData placeholder='DD/MM/AAAA' required onchange='preencheDataRuv(this.value, \"dataRuv\" )' onkeypress='mascaraData(this)'>";
            echo "                      <input type='hidden' name='diaRuv' id='diaRuv' value='".$this->diaRuv."' class='form-control' style='width: 120px;' required>";
            echo "                      <input type='hidden' name='dataHoje' id='dataHoje' value='".date('d/m/Y')."' class='form-control' style='width: 120px;' $desativaData placeholder='DD/MM/AAAA' required>";

            echo "                  </td>";
            echo "                  <td width='30'>";
            echo "                      <label>Semana RUV</label>";
            echo "                  </td>";
            echo "                  <td width='100'>";
            echo "                      <input type='text' name='semana' id='semana' class='form-control' value='".$semana."' style='width: 80px;' required onchange='preencheDataRuv(this.value, \"semana\")'>";
            echo "                  </td>";
            echo "				</tr>";
            echo "          </table>";

            echo "          <table class='table' style='text-align: justify;'>";
            echo "				<tr>";
            echo "                  <td>";
            echo "                      <label>Focalização</label>";
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

	public function telaRegistrosServ(){

		$con = new conectaBanco();
		$con->conecta();

		$sqlRegistro = "SELECT * FROM servicos WHERE codusuario = ".$this->codusuario;

		echo "<div class='col-sm-12'>";
		echo "	<table class='table'>";
		echo "		<tr>";
		echo "			<td>";
		echo "				";
		echo "			</td>";
		echo "		</tr>";
		echo "	</table>";
		echo "</div>";

	}

	public function telaBonusServ(){

	}

	public function novoServico(){

	}

	public function excluirServico(){

	}

	public function


}