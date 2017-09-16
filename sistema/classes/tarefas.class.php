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
		$this->codUsuario = $cod_usuario; //O valor está sendo repassado por aqui.
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

    public function validaDiaDataRuv($dataruv_selecionada){

        $dataRuvS = explode("-", implode("", explode(".", $dataruv_selecionada)));

        $ano = $dataRuvS[0];
        $estacao = substr($dataRuvS[1], -4, -3); 
        $diaSemana = substr($dataRuvS[1], -2, -1); 
        $diaDoMes = substr($dataRuvS[1], -3, -2);
        $semana = substr($dataRuvS[1], -1); 
//        $semana = $dataRuvS[1]; 


        $con = new conectaBanco();
        $con->conecta();

        $semanaMes = array(
            "01" => 'Domingo',
            "02" => 'Segunda-feira',
            "03" => 'Terça-feira',
            "04" => 'Quarta-feira',
            "05" => 'Quinta-feira',
            "06" => 'Sexta-feira',
            "07" => 'Sábado'
        );

        //echo "Mês: ".$mes."<br>";

        $mesInverso = array(
            "Janeiro" => "01",
            "Fevereiro" => "02",
            "Março" => "03",
            "Abril" => "04",
            "Maio" => "05",
            "Junho" => "06",
            "Julho" => "07",
            "Agosto" => "08",
            "Setembro" => "09",
            "Outubro" => "10",
            "Novembro" => "11",
            "Dezembro" => "12"

            );

        if($semana > 7){
            echo "<script> window.location.href='inicio.php?m=para&".$dataruv_selecionada."&e=11' </script>";
            //echo "Retorna true";
        }

        $sqlData = "SELECT * FROM 
                    calendario 
                    WHERE 
                    estacao = ".$estacao."
                    AND diaSemana = ".$diaSemana." 
                    AND ano = ".$ano."
                    AND diaDoMes = ".$diaDoMes."
                    AND semana = ".$semana." 
                    ";

        //echo $sqlData;

        try{

            $resultadoCalendario = mysql_query($sqlData) or die("Houve um erro no comando SQL de calendario. Erro: ".mysql_error());

            if(mysql_num_rows($resultadoCalendario) > 0){
                $dadosCalendario = mysql_fetch_array($resultadoCalendario);

                $mes = $dadosCalendario['mesExtenso'];
                //echo "Mês pesquisado: ".$mes."<br>";
                $mesLetivo = $mesInverso[$mes];

                $diaCalendario = $dadosCalendario['diaMes'];
                $anoCalendario = $dadosCalendario['anoCompleto'];

                $this->setDataRuv($dadosCalendario['ano']."-".$dadosCalendario['estacao'].$dadosCalendario['diaDoMes'].$dadosCalendario['diaSemana'].".".$dadosCalendario['semana']);
                $this->setSemanaRuv($dadosCalendario['ano']."-".$dadosCalendario['estacao'].$dadosCalendario['diaDoMes'].$dadosCalendario['diaSemana']);
                $this->setDiaRuv($dadosCalendario['semana']);
                if(strlen($diaCalendario) < 2){
                    $diaCalendario = "0".$diaCalendario;
                }
                $this->setDataRegistro($diaCalendario."/".$mesLetivo."/".$anoCalendario);
                //echo "<script>document.getElementById('inicio').focus();</script>";
            }

        }catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }

    }


    public function validaData($dataRuv_select){

        $dataS = explode("/", $dataRuv_select);
//        $semanaS = preg_split("/ (-|.) /", $semana_select);

        $dia = $dataS[0];
        $mes = $dataS[1];
        $ano = $dataS[2];

        $con = new conectaBanco();
        $con->conecta();

        $semanaMes = array(
            "01" => 'Domingo',
            "02" => 'Segunda-feira',
            "03" => 'Terça-feira',
            "04" => 'Quarta-feira',
            "05" => 'Quinta-feira',
            "06" => 'Sexta-feira',
            "07" => 'Sábado'
        );

        $mesSelecionado = array(
            "01" => 'Janeiro',
            "02" => 'Fevereiro',
            "03" => 'Março',
            "04" => 'Abril',
            "05" => 'Maio',
            "06" => 'Junho',
            "07" => 'Julho',
            "08" => 'Agosto',
            "09" => 'Setembro',
            "10" => 'Outubro',
            "11" => 'Novembro',
            "12" => 'Dezembro'

            );
        $mesLetivo = $mesSelecionado[$mes];

        $sqlData = "SELECT * FROM 
                    calendario 
                    WHERE 
                    diaMes = ".$dia." 
                    AND mesExtenso = '".$mesLetivo."' 
                    AND anoCompleto = '".$ano."' 
                    ";

        //echo $sqlData;

        try{

            $resultadoCalendario = mysql_query($sqlData) or die("Houve um erro no comando SQL de calendario. Erro: ".mysql_error());

            if(mysql_num_rows($resultadoCalendario) > 0){
                $dadosCalendario = mysql_fetch_array($resultadoCalendario);

                $this->setDataRuv($dadosCalendario['ano']."-".$dadosCalendario['estacao'].$dadosCalendario['diaDoMes'].$dadosCalendario['diaSemana'].".".$dadosCalendario['semana']);
                $this->setSemanaRuv($dadosCalendario['ano']."-".$dadosCalendario['estacao'].$dadosCalendario['diaDoMes'].$dadosCalendario['diaSemana']);
                $this->setDiaRuv($dadosCalendario['semana']);
                //echo "<script>document.getElementById('inicio').focus();</script>";
            }

        }catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }


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
                $pes = "btn-default";
                break;
                
            case "tarefa":
            	$tarActive = "class = 'active'";
                $regActive = "";
                $bonusActive = "";

                $taref = "btn-primary";
                $reg = "btn-default";
                $bns = "btn-default";
                $pes = "btn-default";
                break;
            
            case "registros":
            	$tarActive = "";
                $regActive = "class = 'active'";
                $bonusActive = "";

                $taref = "btn-default";
                $reg = "btn-primary";
                $bns = "btn-default";
                $pes = "btn-default";
                break;
            
            case "bonus":
                $tarActive = "";
                $regActive = "";
                $bonusActive = "class = 'active'";

                $taref = "btn-default";
                $reg = "btn-default";
                $bns = "btn-primary";
                $pes = "btn-default";
                break;

            case "pesquisas":
                $tarActive = "";
                $regActive = "";
                $bonusActive = "";

                $taref = "btn-default";
                $reg = "btn-default";
                $bns = "btn-default";
                $pes = "btn-primary";
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
            echo "          <a href='inicio.php?m=taref&tab=pesquisas' class='btn $pes' style='width: 90px;'>";
            echo "              Pesquisas";
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
                    
                case "pesquisas":
                    $pesq = new Pesquisas();
                    $pesq->telaPesquisas('tarefas');
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

        $s = filter_input(INPUT_GET, 's');
        $ordem = filter_input(INPUT_GET, 'o');

        if(!empty($s)){
            if($s == "Todos"){
                $selecionaDataRuv = "";
            }else{
                $selecionaDataRuv = " AND dataRuv = '".$s."' ";
            }
        }else{
            $selecionaDataRuv = " AND dataRuv = '".$this->dataRuv."'";
        }

//        if(!empty($ordem)){

            switch ($ordem) {
                case 'dataregistro':
                        $selecionaOrdem = " ORDER BY t.dataRegistro";
                    break;
                case 'dataruv':
                        $selecionaOrdem = " ORDER BY t.dataRuv";
                    break;
                case 'tarefa':
                        $selecionaOrdem = " ORDER BY ts.tarefa";
                    break;
                case 'status':
                        $selecionaOrdem = " ORDER BY t.status";
                    break;
                case 'bonus':
                        $selecionaOrdem = " ORDER BY t.bonus";
                    break;
                
                default:
                        $selecionaOrdem = " ORDER BY dataRuv";
                    break;
            }//fim do switch
//        }

		$con = new conectaBanco();
		$con->conecta();

        $a = new atividades();

		$sqlRegistroTarefas = "	SELECT t.idtarefa, t.dataRuv, t.dataRegistro, t.semanaRuv, ts.tarefa, t.status, t.bonus, DATE_FORMAT(t.dataRegistro, '%d/%m/%Y') AS dataRegistroFormat FROM tarefa t
								INNER JOIN tarefasistema ts ON ts.idtarefasistema = t.codTarefa
								WHERE t.codusuario = ".$this->codUsuario.$selecionaDataRuv.$selecionaOrdem; //falta completar

        $sqlResumoTarefa = "SELECT dataRuv FROM tarefa WHERE codusuario = ".$this->codUsuario." GROUP BY dataRuv ORDER BY dataRuv";

        //echo $sqlRegistroTarefas."<br>";

		echo "<div class='col-sm-12'>";

        try{

            //echo "Tabela: ".$sqlRegistroTarefas."<br>";
            $resultadoRegistrosTarefas = mysql_query($sqlRegistroTarefas) or die("Não foi possível efetuar a consulta de registros de tarefas. Erro: ".mysql_error());

            $resultadoResumoTarefa = mysql_query($sqlResumoTarefa) or die ("Erro na execução do comando SQL de resumo. Descrição: ".mysql_error());

        echo "<table class='table table-striped'>";
        echo "  <tr>";
        echo "      <td>";
        echo "          <label>Selecionar Data-RUV</label>";
        echo "      </td>";
        echo "      <td>";
        echo "          <select name='sDataRuv' id='sDataRuv' class='form-control' onchange='registroSelecao(this.value, \"taref\")'>";
        if(!empty($s)){
            echo "          <option value='".$s."'>".$s."</option>";
        }
        echo "              <option value='Todos'></option>";
        echo "              <option value='Todos'>Todos</option>";

        while($dadosResumoTarefa = mysql_fetch_array($resultadoResumoTarefa)){
        echo "              <option value='".$dadosResumoTarefa['dataRuv']."'>".$dadosResumoTarefa['dataRuv']."</option>";
        }
        echo "          </select>";
        echo "      </td>";
                    echo "      <td>";
                    echo "          <label>Classificar por: </label>";
                    echo "      </td>";
                    echo "      <td>";
                    //$dominio = null;
                    $servidor = $_SERVER['REQUEST_URI'];
                    echo "          <select name='classificacao' class='form-control' onchange='ordemSQL(this.value, \"$servidor\", \"meditacao\")'>"; // disabled
                    if(!empty($ordem)){
                        if($ordem == "dataregistro"){
                            echo "<option value='dataregistro'>Data Registro</option>";
                        }
                        else if($ordem == "dataruv"){
                            echo "<option value='dataruv'>Data RUV</option>";
                        }
                        else if($ordem == "tarefa"){
                            echo "<option value='tarefa'>Tarefa</option>";
                        }
                        else if($ordem == "status"){
                            echo "<option value='status'>Status</option>";
                        }else 
                        if($ordem == "bonus"){
                            echo "<option value='bonus'>Bônus</option>";
                        }
                    }
                    echo "              <option value=''></option>";
                    echo "              <option value='dataregistro'>Data Registro</option>";
                    echo "              <option value='dataruv'>Data RUV</option>";
                    echo "              <option value='tarefa'>Tarefa</option>";
                    echo "              <option value='status'>Status</option>";
                    echo "              <option value='bonus'>Bônus</option>";
                    echo "          </select>";
                    echo "      </td>";
                    echo "  </tr>";
                    echo "</table>";


            if(mysql_num_rows($resultadoRegistrosTarefas) >= 1){


		echo "	<table class='table table-striped'>";
		echo "		<tr>";
		echo "			<td>";
		echo "				Data Registro";
		echo "			</td>";
		echo "			<td>";
		echo "				Data RUV";
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


				while($dadosTarefas = mysql_fetch_array($resultadoRegistrosTarefas)){

					echo "		<tr>";
					echo "			<td>";
					echo $dadosTarefas['dataRegistroFormat'];
					echo "			</td>";
					echo "			<td>";
					echo $dadosTarefas['dataRuv'];
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
                    echo "  </table>";
			}else{
                        echo "<label class='alert alert-warning' style='text-align: center; width: 600px;'>";
                        echo "  Ops! Sem tarefas do dia ".date('d/m/Y').". Selecione a data RUV acima, para demais consultas.";
                        echo "  <button type='button' class='close' data-dismiss='alert' aria-label='Fechar'>";
                        echo "      <span aria-hidden='true'> &times;</span>";
                        echo "  </button>";
                        echo "</label><br>";
			}

		}catch(Exception $ex){
			echo "Exception ativado na tabela de registros de tarefas. Descrição: ".$ex->getMessage();
		}


        if($this->excluiTarefa()){
            $a->writeLog($_SESSION['usuario'], "Exclusão da Tarefa. Data RUV: ".$this->dataRuv, "../controller/");
            echo "<label class='alert alert-success'>Tarefa excluída com sucesso! Aguarde 2 segundos.</label>";
            echo "<meta http-equiv='refresh' content='2;url=inicio.php?m=taref&tab=registros'>";
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

        $data = filter_input(INPUT_GET, 'd');
        $dataruv_selecionada = filter_input(INPUT_GET, 'dr');
        $dia_selecionado = filter_input(INPUT_GET, 'dia');
        $semana_selecionada = filter_input(INPUT_GET, 'sem');

        if(!empty($data)){
            $this->setDataRegistro($data);
            $this->validaData($this->dataRegistro);
        }
        if(!empty($dataruv_selecionada)){
            $this->setDataRuv($dataruv_selecionada);
            $this->validaDiaDataRuv($this->dataRuv);
        }

            
            $semana = $this->anoRuv."-".$this->semanaRuv;
//            $dataRuvCompleta = $this->anoRuv."-";

            echo "<form name='formTarefas' id='formTarefas' action='inicio.php?m=taref' method='post'>";
            echo "          <table class='table' style='text-align: justify; border: none;'>";
            echo "              <tr>";
            echo "                  <td style='width: 165px;'>";
            echo "                      <label>Data";
            echo "                          <div class='input-group'>";
            echo "                              <input type='text' name='calendario' id='calendario' value='".$this->dataRegistro."' class='form-control' $desativaData placeholder='DD/MM/AAAA' required onkeyup='somenteNumeros(this)' onkeydown='enterTab(\"dataRuv\", event)' onchange='enterCampoRuv(\"data\", \"taref\", this.value);'><div class='input-group-addon'><i class='fa fa-calendar'></i></div>";

//            echo "                              <input type='text' id='calendario' name='calendario' class='form-control' value='".date('d/m/Y')."'><div class='input-group-addon'><i class='fa fa-calendar'></i></div>";
            echo "                          </div>";

            echo "                      <input type='hidden' name='dia' id='dia' value='".$this->diaRuv."' class='form-control' style='width: 120px;' required>";
            echo "                      </label>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <label>Data RUV";
            echo "                          <input type='text' name='dataRuv' id='dataRuv' value='".$this->dataRuv."' class='form-control' style='width: 120px;' $desativaData placeholder='A-' required onchange='enterCampoRuv(\"dataRuv\", \"taref\", this.value);' onkeypress='mascaraDataRuv(this)' onkeyup='somenteNumeros(this)'  onkeydown='enterTab(\"semana\", event)' maxlength='7'>";
            echo "                      </label>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <label>Semana RUV";
            echo "                          <input type='text' name='semana' id='semana' class='form-control' value='".$this->semanaRuv."' style='width: 80px;' required onchange='enterCampoRuv(\"semana\", \"taref\", this.value);' onkeypress='mascaraSemana(this)' onkeyup='somenteNumeros(this)'  onkeydown='enterTab(\"descricaoTarefas\", event)' maxlength='5'>";
            echo "                      </label>";
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
           	echo "						<select name='descricaoTarefas' id='descricaoTarefas' class='form-control'  onkeydown='enterTab(\"status\", event)'>";
           	echo "							<option name=''></option>";
           	
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

           	echo "						<input type='radio' name='status' id='status' value='Sim' onclick='calculaBonusTarefa(this.value)'  onkeydown='enterTab(\"salvar\", event)'> Sim   |   ";
           	echo "						<input type='radio' name='status' id='status' value='Não' onclick='calculaBonusTarefa(this.value)'  onkeydown='enterTab(\"salvar\", event)'> Não";
            echo "                  </td>";

            echo "                  <td colspan='3'>";
            echo "                      <input type='text' name='bonus' id='bonus' class='form-control' style='width: 80px;' required readonly>";
            echo "                  </td>";
            echo "              </tr>";
            echo "              <tr>";
            echo "                  <td colspan='3'>";
            echo "                      <input type='hidden' id='codusuario' name='codusuario' value='".$_SESSION['idusuario']."'";
            echo "                  </td>";
            echo "              </tr>";
            echo "              <tr>";
            echo "                  <td>";
            echo "                      &nbsp;";
            echo "                  </td>";
            echo "                  <td style='text-align: right;'>";
            echo "                      <a href='inicio.php' class='btn btn-default' title='Voltar' alt='Voltar'>";
            echo "                          <img src='../img/btn_back.png' width='25' height='25'>";
            echo "                      </a>";
            echo "                  </td>";
            echo "                  <td style='text-align: left;'>";
            echo "                      <button type='submit' class='btn btn-default' href='#' id='salvar' name='salvar' onclick='enviaForm(\"formTarefas\")'>";
            echo "                          <img src='../img/save2.png' width='25' height='25'>";
            echo "                      </button>";
            echo "                  </td>";
            echo "              </tr>";
            echo "              <tr>";
            echo "                  <td>";
            echo "                      &nbsp;";
            echo "                  </td>";
            echo "                  <td style='text-align: right;'>";
            echo "                      <a href='inicio.php' title='Voltar' alt='Voltar'>";
            echo "                          <label>Voltar</label>";
            echo "                      </a>";
            echo "                  </td>";
            echo "                  <td style='text-align: left;'>";
            echo "                      <a href='inicio.php' title='Salvar' alt='Salvar'>";
            echo "                          <label>Salvar</label>";
            echo "                      </a>";
            echo "                  </td>";
            echo "              </tr>";
            echo "              <tr>";
            echo "                  <td colspan='3'>";
            echo "                      <div id='erro1' name='erro1' class='alert alert-danger' style='display: none;'>";
            echo "                          Data de registro vazia";
            echo "                      </div>";
            echo "                      <div id='erro2' name='erro2' class='alert alert-danger' style='display: none;'>";
            echo "                          Data RUV vazia";
            echo "                      </div>";
            echo "                      <div id='erro3' name='erro3' class='alert alert-danger' style='display: none;'>";
            echo "                          Semana RUV vazia";
            echo "                      </div>";
            echo "                      <div id='erro4' name='erro4' class='alert alert-danger' style='display: none;'>";
            echo "                          Discriminação não selecionada";
            echo "                      </div>";
            echo "                      <div id='erro5' name='erro5' class='alert alert-danger' style='display: none;'>";
            echo "                          Status não selecionado";
            echo "                      </div>";
            echo "                      <div id='erro6' name='erro6' class='alert alert-danger' style='display: none;'>";
            echo "                          Bônus não calculado. Selecione o Status";
            echo "                      </div>";
            if($error = filter_input(INPUT_GET, 'e')){
                if($error === "11"){
                    echo "<meta http-equiv='refresh' content='3;url=inicio.php?m=taref'>";
            echo "                      <div id='erro11' name='erro11' class='alert alert-danger'>";
            echo "                          O dia não pode ser maior que 8.";
            echo "                      </div>";
                }
            }
            echo "                  </td>";
            echo "              </tr>";
            echo "          </table>";
            echo "</form>";

        if($_POST){
            $dataConvertida = implode("-", array_reverse(explode("/", filter_input(INPUT_POST, 'calendario'))));
            $dataRuvConvertida = implode("-", array_reverse(explode("/", filter_input(INPUT_POST, 'dataRuv'))));

            $this->dataRegistro = addslashes($dataConvertida);
            $this->dataRuv = addslashes(filter_input(INPUT_POST, 'dataRuv'));
            $this->diaRuv = addslashes(filter_input(INPUT_POST, 'dia'));
            $this->semanaRuv = addslashes(filter_input(INPUT_POST, 'semana'));
            $this->tarefa = addslashes(filter_input(INPUT_POST, 'descricaoTarefas'));
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

        $a = new atividades();

        $this->idtarefa = ultimoId::ultimoIdBanco("idtarefa", "tarefa");

        $this->semanaRuf = 0;

		$sqlIncluiTarefa = "INSERT INTO tarefa (idtarefa, dataRuv, dataRegistro, semanaRuv, semanaRuf, codTarefa, status, bonus, codusuario) VALUES (".$this->idtarefa.", '".$this->dataRuv."', '".$this->dataRegistro."', '".$this->semanaRuv."', ".$this->semanaRuf.", ".$this->tarefa.", '".$this->status."', ".$this->bonus.", ".$this->codusuario.")";

		//echo "SQL: ".$sqlIncluiTarefa."<br>";
		try{
			$resultadoIncluiTarefa = mysql_query($sqlIncluiTarefa) or die("Erro no comando SQL de inclusão de tarefa. Erro: ".mysql_error());

			if($resultadoIncluiTarefa){
                $a->writeLog($_SESSION['usuario'], "Inclusão da Tarefa. Data RUV: ".$this->dataRuv, "../controller/");
				echo "<label class='alert alert-success'>Tarefa salva com sucesso! Aguarde 2 segundos</label>";
                echo "<meta http-equiv='refresh' content='2;url=inicio.php?m=taref'>";
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