<?php

class servExtras{
	
	private $idservicos;
	private $dataRuv;
	private $dataRegistro;
	private $diaRuv;
	private $semanaRuv;
	private $servico;
	private $opcao;
	private $outros;
	private $bonus;
	private $codusuario;
    private $anoRuv;
    private $mesRuv;

    function setMesRuv($mesruv){
        $this->mesRuv = $mesruv;
    }

    function setAnoRuv($anoruv){
        $this->anoRuv = $anoruv;
    }

    function getMesRuv(){
        return $this->mesRuv;
    }

    function getAnoRuv(){
        return $this->anoRuv;
    }

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

	function getServico(){
		return $this->servico;
	}

	function setServico($servico){
		$this->servico = $servico;
	}

	function getOpcao(){
		return $this->opcao;
	}

	function setOpcao($opcao){
		$this->opcao = $opcao;
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
                $pes = "btn-default";
                break;
                
            case "tarefa":
            	$servActive = "class = 'active'";
                $regActive = "";
                $bonusActive = "";

                $serv = "btn-primary";
                $reg = "btn-default";
                $bns = "btn-default";
                $pes = "btn-default";
                break;
            
            case "registros":
            	$servActive = "";
                $regActive = "class = 'active'";
                $bonusActive = "";

                $serv = "btn-default";
                $reg = "btn-primary";
                $bns = "btn-default";
                $pes = "btn-default";
                break;
            
            case "bonus":
                $servActive = "";
                $regActive = "";
                $bonusActive = "class = 'active'";

                $serv = "btn-default";
                $reg = "btn-default";
                $bns = "btn-primary";
                $pes = "btn-default";
                break;

            case "pesquisas":
                $servActive = "";
                $regActive = "";
                $bonusActive = "class = 'active'";

                $serv = "btn-default";
                $reg = "btn-default";
                $bns = "btn-default";
                $pes = "btn-primary";
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
            echo "          <a href='inicio.php?m=serv&tab=pesquisas' class='btn $pes' style='width: 90px;'>";
            echo "              Pesquisas";
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
                    clearstatcache();
                    $b = new bonus();
                    $b->setCodusuario($_SESSION['idusuario']);
                    $b->telaBonusServExtras();
                    break;
                    
                case "pesquisas":
                    $pesq = new Pesquisas();
                    $pesq->telaPesquisas('servicos');
                    break;
            }
            echo "</div>";//fecha o col-sm-12

	}

	public function telaServExtras(){

        //define('', $_SERVER[]);

        //echo "<meta http-equiv='refresh' content='5;inicio.php?m=serv'>";

		//echo "<meta http-equiv='refresh' content='5;url=inicio.php?m=serv'>";
		$con = new conectaBanco();
		$con->conecta();

        $a = new atividades();

		echo "<div class='col-sm-12'>";
        $tar = filter_input(INPUT_GET, "t");
        $tab = filter_input(INPUT_GET, 'tab');
        $serv = filter_input(INPUT_GET, 'tipo');

        switch ($serv) {
        	case 'focal':
				$selectFocal = "selected";        		
				$selectPres = "";        		
				$bloFocal = 'block';
				$bloPres = 'none';        		
			break;
        	
        	case 'pres':
				$selectFocal = "";        		
				$selectPres = "selected";
				$bloFocal = 'none';
				$bloPres = 'block';        		
        		break;

    		case '':
				$selectFocal = "";        		
				$selectPres = "";
				$bloFocal = 'none';
				$bloPres = 'none';        		
    			break;
        }

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

            echo "<form name='formServExtras' id='formServExtras' action='inicio.php?m=serv' method='post'>";

            echo "          <table class='table'>";
            echo "              <tr>";
            echo "                  <td style='width: 160px;'>";
            echo "                      <label>Data";
            echo "                          <div class='input-group'>";
            echo "                              <input type='text' name='calendario' id='calendario' value='".$this->dataRegistro."' class='form-control' $desativaData placeholder='DD/MM/AAAA' required onkeyup='somenteNumeros(this)' onkeydown='enterTab(\"dataRuv\", event)' onchange='enterCampoRuv(\"data\", \"serv\", this.value);'><div class='input-group-addon'><i class='fa fa-calendar'></i></div>";

            echo "                          </div>";

//            echo "                          <input type='text' name='dataPortalHoje' id='dataPortalHoje' value='".date('d/m/Y')."' class='form-control' style='width: 120px;' $desativaData placeholder='DD/MM/AAAA' required onkeypress='mascaraData(this)' onkeydown='enterTab(\"dataRuv\", event)' onkeyup='somenteNumeros(this)' maxlength='10' $marcaAuto>";
            echo "                      </label>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <label>Data RUV";
            echo "                          <input type='text' name='dataRuv' id='dataRuv' value='".$this->dataRuv."' class='form-control' style='width: 120px;' $desativaData placeholder='A-EMS.D' required onchange='enterCampoRuv(\"dataRuv\", \"serv\", this.value);' onkeypress='mascaraDataRuv(this)' onkeydown='enterTab(\"semana\", event)' onkeyup='somenteNumeros(this)' maxlength='7'>";
            echo "                      </label>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <label>Semana";
            echo "                          <input type='text' name='semana' id='semana' class='form-control' value='".$this->semanaRuv."' style='width: 80px;' required onkeypress='mascaraSemana(this)' onkeydown='enterTab(\"dia\", event)' onchange='enterCampoRuv(\"semana\", \"serv\", this.value);' onkeyup='somenteNumeros(this)' maxlength='5'>";
            echo "                      </label>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <label>Dia";
            echo "                          <input type='text' name='dia' id='dia' class='form-control' value='".$this->diaRuv."' style='width: 50px;' onchange='enterCampoRuv(\"dia\", \"serv\", this.value);' required onkeydown='enterTab(\"sonho\", event)' onkeyup='somenteNumeros(this)'>"; // 
            echo "                      </label>";
            echo "                  </td>";
            echo "              </tr>";
            echo "          </table>";
            
//            echo "          <hr size='2'>";

            echo "          <table class='table' style='text-align: justify;'>";
            echo "				<tr>";
            echo "                  <td>";
            echo "                      <label>Tipo</label>";
            echo "                  </td>";
            echo "                  <td style='text-align: center;'>";
            echo "                      <label>Serviço</label>";
            echo "                  </td>";
            echo "                  <td style='text-align: center;'>";
            echo "                      <label>Status</label>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <label>Outros/ Extras</label>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <label>Bônus</label>";
            echo "                  </td>";
            echo "              </tr>";

            echo "              <tr style='text-align: center;'>";
            echo "                  <td>";
            //echo "Servidor: ".$_SERVER['REQUEST_URI'];
            //echo "Servidor: ".$_SERVER['SCRIPT_FILENAME'];
            $servidor = $_SERVER['REQUEST_URI'];
//            $servidor = $_SERVER['SERVER_NAME'];
           	echo "						<select name='tipo' id='tipo' class='form-control' onchange='validaServicos(\"$servidor\", this.value)'>";
           	echo "							<option value=''></option>";
           	echo "							<option value='focalizacao' $selectFocal>Focalização</option>";
           	echo "							<option value='presenca' $selectPres>Presença</option>";
           	echo "						</select>";
            if($serv === "focal"){
                $escolhaTipo = "Focalização";
            }else if($serv === "pres"){
                $escolhaTipo = "Presença";
            }
            echo "                      <input type='hidden' name='tipoServico' id='tipoServico' value='".$escolhaTipo."'>";
            echo "                  </td>";
            echo "                  <td>";
           	echo "						<select name='servico' id='servico' class='form-control'>";
           	echo "							<option value=''></option>";

           	switch ($serv) {
           		case 'focal':
					$sqlServFocal = "SELECT * FROM tabfocalizacao";

	           		try{
		           		$resultadoFocalizacao = mysql_query($sqlServFocal) or die("Erro no comando SQL do serviço de focalização. Erro: ".mysql_error());
		           		while($dadosFocalizacao = mysql_fetch_array($resultadoFocalizacao)){
		           			echo "<option value=".$dadosFocalizacao['idfocalizacao'].">".$dadosFocalizacao['descricao']."</option>";
		           		}
	           		}catch(Exception $ex){
	           			echo "Exception ativado no serviços de focalização. Descrição: ".$ex->getMessage();
	           		}
           			break;

           		case 'pres':
					$sqlServPres = "SELECT * FROM tabpresenca";
	           		try{
		           		$resultadoPresenca = mysql_query($sqlServPres) or die("Erro no comando SQL do serviço de focalização. Erro: ".mysql_error());
		           		while($dadosPresenca = mysql_fetch_array($resultadoPresenca)){
		           			echo "<option value=".$dadosPresenca['idpresenca'].">".$dadosPresenca['descricao']."</option>";
			       		}

	           		}catch(Exception $ex){
	           			echo "Exception ativado no serviços de presença. Descrição: ".$ex->getMessage();
	           		}
           			break;
           		default:
	           		echo "<option value='naoSelecionado'>Não selecionado</option>";
	           		break;
           	}


           	
           	echo "						</select>";
            echo "                  </td>";
            echo "                  <td>";
            echo "						<div id='foca' style='display: $bloFocal;'>";
           	echo "						<input type='radio' name='opcaoServ' id='opcaoServ' value='Individual' onchange='calculaBonusServ(this.value)'> Individual   |   ";
           	echo "						<input type='radio' name='opcaoServ' id='opcaoServ' value='Dupla' onchange='calculaBonusServ(this.value)'> Dupla";
           	echo "						</div>";

            echo "						<div id='pres' style='display: $bloPres;'>";
           	echo "						<input type='radio' name='opcaoServ' id='opcaoServ' value='Sim' onchange='calculaBonusServ(this.value)'> Sim   |   ";
           	echo "						<input type='radio' name='opcaoServ' id='opcaoServ' value='Não' onchange='calculaBonusServ(this.value)'> Não";
           	echo "						</div>";
            echo "                  </td>";

            echo "                  <td>";
            echo "                      <input type='text' name='outros' id='outros' class='form-control' style='width: 300px;' required onkeydown='enterTab(\"salvar\", event)'>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <input type='text' name='bonusServ' id='bonusServ' readonly class='form-control' style='width: 80px;' required>";
            echo "                  </td>";
            echo "              </tr>";

            echo "              <tr>";
            echo "                  <td colspan='3'>";
            echo "                      <input type='hidden' id='codusuario' name='codusuario' value='".$_SESSION['idusuario']."'>";
//            echo "                      &nbsp;";
            echo "                  </td>";
            echo "                  <td style='text-align: right;'>";
            echo "                      <a href='inicio.php' class='btn btn-default' title='Voltar' alt='Voltar'>";
            echo "                          <img src='../img/btn_back.png' width='25' height='25'>";
            echo "                      </a>";
            echo "                  </td>";
            echo "                  <td style='text-align: left;'>";
            echo "                      <button type='button' class='btn btn-default' href='#' id='salvar' name='salvar' onclick='enviaForm(\"formServExtras\")'>";
            echo "                          <img src='../img/save2.png' width='25' height='25'>";
            echo "                      </button>";
            echo "                  </td>";
            echo "              </tr>";
            echo "              <tr>";
            echo "                  <td colspan='3'>";
            echo "                      &nbsp;";
            echo "                  </td>";
            echo "                  <td style='text-align: right;'>";
            echo "                      <a href='inicio.php' title='Voltar' alt='Voltar'>";
            echo "                          <label>Voltar</label>";
            echo "                      </a>";
            echo "                  </td>";
            echo "                  <td style='text-align: left;'>";
            echo "                      <a href='#' onclick='enviaForm(\"formServExtras\")' title='Salvar' alt='Salvar'>";
            echo "                          <label>Salvar</label>";
            echo "                      </a>";
            echo "                  </td>";
            echo "              </tr>";

            /*
            echo "              <tr>";
            echo "                  <td colspan='5' style='text-align: right;'>";
            echo "                      <a href='inicio.php' class='btn btn-default'>Cancelar</a> ";
            echo "                      <button class='btn btn-primary' type='button' id='salvar' name='salvar' onclick='enviaForm(\"formServExtras\")' style='width: 80px;'>Salvar</button>";
            echo "                  </td>";
            echo "              </tr>";
            */
            echo "              <tr>";
            echo "                  <td colspan='5'>";
            echo "                      <div id='erro1' name='erro1' class='alert alert-danger' style='display: none;'>";
            echo "                          Tipo Inválido";
            echo "                      </div>";
            echo "                      <div id='erro2' name='erro2' class='alert alert-danger' style='display: none;'>";
            echo "                          Serviço Inválido";
            echo "                      </div>";
            echo "                      <div id='erro3' name='erro3' class='alert alert-danger' style='display: none;'>";
            echo "                          Status Inválido. Selecione o serviço.";
            echo "                      </div>";
            echo "                      <div id='erro4' name='erro4' class='alert alert-danger' style='display: none;'>";
            echo "                          Outros/ Extras inválido.";
            echo "                      </div>";
            echo "                      <div id='erro5' name='erro5' class='alert alert-danger' style='display: none;'>";
            echo "                          Bônus Inválido. Favor selecionar as opções para preenchimento.";
            echo "                      </div>";
            echo "                      <div id='erro6' name='erro6' class='alert alert-danger' style='display: none;'>";
            echo "                          Data Inválida.";
            echo "                      </div>";
            echo "                      <div id='erro7' name='erro7' class='alert alert-danger' style='display: none;'>";
            echo "                          Data RUV Inválida.";
            echo "                      </div>";
            echo "                      <div id='erro8' name='erro8' class='alert alert-danger' style='display: none;'>";
            echo "                          Semana RUV inválida. Preencha da Data-Ruv para completar a semana RUV, e somente números.";
            echo "                      </div>";
            echo "                      <div id='erro9' name='erro9' class='alert alert-danger' style='display: none;'>";
            echo "                          Dia RUV Inválido. Preencha corretamente e somente números.";
            echo "                      </div>";
            echo "                      <div id='erro10' name='erro10' class='alert alert-danger' style='display: none;'>";
            echo "                          Data de Registro inválida. Selecione ou digite, em números, a data para registro.";
            echo "                      </div>";
            if($error = filter_input(INPUT_GET, 'e')){
                if($error === "11"){
                    echo "<meta http-equiv='refresh' content='3;url=inicio.php?m=serv'>";
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
            $a = new atividades();

//            $novoNivel = str_replace(",",".", filter_input(INPUT_POST, 'nivel'));
            $dataConvertida = implode("-", array_reverse(explode("/", filter_input(INPUT_POST, 'calendario'))));
            $dataRuvConvertida = implode("-", array_reverse(explode("/", filter_input(INPUT_POST, 'dataRuv'))));

            $this->dataRegistro = addslashes($dataConvertida);
            $this->dataRuv = $dataRuvConvertida;
            $this->semanaRuv = addslashes(filter_input(INPUT_POST, 'semana'));
            $this->bonus = addslashes(filter_input(INPUT_POST, 'bonusServ'));
            $this->codusuario = addslashes(filter_input(INPUT_POST, 'codusuario'));
            $this->diaRuv = addslashes(filter_input(INPUT_POST, 'dia'));
            $this->outros = addslashes(filter_input(INPUT_POST, 'outros'));
            $this->servico = addslashes(filter_input(INPUT_POST, 'tipoServico'));
            $this->opcao = addslashes(filter_input(INPUT_POST, 'opcaoServ'));

            if ($this->insereServicos()){
                $a->writeLog($_SESSION['usuario'], "Inclusão de Serviços e Extras Data RUV: ".$this->dataRuv, "../controller/");
                echo "<label class='alert alert-success'>Serviço salvo com sucesso! Aguarde 2 segundos.</label>";
                echo "<meta http-equiv='refresh' content='2;url=inicio.php?m=serv'>";
            }

        }
		echo "</div>";//fecha a div col-sm-12
	}

    public function insereServicos(){
        $con = new conectaBanco();
        $con->conecta();

        $this->idservicos = ultimoId::ultimoIdBanco("idservicos", "servicos");

        $sqlInsereServicos = " INSERT INTO servicos (idservicos, dataRuv, dataRegistro, diaRuv, semanaRuv, servico, opcao, outros, bonus, codusuario) 
                            VALUES (".$this->idservicos.", '".$this->dataRuv."', '".$this->dataRegistro."', ".$this->diaRuv.", '".$this->semanaRuv."', '".$this->servico."', '".$this->opcao."', '".$this->outros."', ".$this->bonus.", ".$this->codusuario.")";

        try{
            //echo "SQL: ".$sqlInsereServicos;

            $resultadoInsereServicos = mysql_query($sqlInsereServicos) or die("Erro no comando SQL de inserir serviços. Erro: ".mysql_error());

            if($resultadoInsereServicos){
                return true;
            }
            
            return false;


        }catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }

    }

/*    public function insereFocalizacao(){
        $con = new conectaBanco();
        $con->conecta();

        $this->idservicos = ultimoId::ultimoIdBanco("idservicos", "servfocalizacao");

        $sqlInsereFocal = " INSERT INTO servfocalizacao (idservicos, dataRuv, dataRegistro, diaRuv, semanaRuv, servico, opcaofocalizacao, outros, bonus, codusuario) 
                            VALUES (".$this->idservicos.", '".$this->dataRuv."', '".$this->dataRegistro."', ".$this->diaRuv.", '".$this->semanaRuv."', '".$this->focalizacao."', '".$this->opcaofocalizacao."', '".$this->outros."', ".$this->bonus.", ".$this->codusuario.")";

        try{
            //echo "SQL: ".$sqlInsereFocal;

            $resultadoInsereFocalizacao = mysql_query($sqlInsereFocal) or die("Erro no comando SQL de inserir focalização. Erro: ".mysql_error());

            if($resultadoInsereFocalizacao){
                return true;
            }
            
            return false;


        }catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }
        
    }

    public function inserePresenca(){
        $con = new conectaBanco();
        $con->conecta();

        $this->idservicos = ultimoId::ultimoIdBanco("idpresenca", "servpresenca");

        $sqlInserePresenca = "  INSERT INTO servpresenca (idpresenca, dataRuv, dataregistro, semanaRuv, servico, opcaopresenca, outros, bonus, codusuario)
                                VALUES (".$this->idservicos.", '".$this->dataRuv."', '".$this->dataRegistro."', '".$this->semanaRuv."', '".$this->presenca."', '".$this->opcaopresenca."', '".$this->outros."', ".$this->bonus.", ".$this->codusuario.")";

        try{
            //echo "SQL: ".$sqlInserePresenca."<br>";

            $resultadoInserePresenca = mysql_query($sqlInserePresenca) or die ("Erro no comando SQL de inserir presença. Erro: ".mysql_error());

            if($resultadoInserePresenca){
                return true;
            }
            return false;

        }catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }
        
    }
*/
	public function telaRegistroServ(){


        $this->setCodusuario($_SESSION['idusuario']);

        $con = new conectaBanco();
		$con->conecta();

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
                        $selecionaOrdem = " ORDER BY dataRegistro";
                    break;
                case 'dataruv':
                        $selecionaOrdem = " ORDER BY dataRuv";
                    break;
                case 'servico':
                        $selecionaOrdem = " ORDER BY servico";
                    break;
                case 'status':
                        $selecionaOrdem = " ORDER BY opcao";
                    break;
                case 'outros':
                        $selecionaOrdem = " ORDER BY outros";
                    break;
                case 'bonus':
                        $selecionaOrdem = " ORDER BY bonus";
                    break;
                
                default:
                        $selecionaOrdem = " ORDER BY dataRuv";
                    break;
            }//fim do switch
//        }

        echo "<div class='col-sm-12'>";


        $sqlServicos = "SELECT *, DATE_FORMAT(dataRegistro, '%d/%m/%Y') as dataRegFormatada FROM servicos WHERE codusuario=".$this->codusuario.$selecionaDataRuv.$selecionaOrdem;

        $sqlResumoServicos = "SELECT dataRuv, diaRuv FROM servicos WHERE codusuario = ".$this->codusuario." GROUP BY dataRuv ORDER BY diaRuv";

        //echo "SQL: ".$sqlServicos."<br>";

        try{

        $resultadoSQLServicos = mysql_query($sqlServicos) or die("Erro no comando SQL. Descrição: ".mysql_error());

        $resultadoResumoServicos = mysql_query($sqlResumoServicos) or die("Erro na execução do comando SQL do resumo. Descrição: ".mysql_error());

            echo "<table class='table table-striped'>";
            echo "  <tr>";
            echo "      <td>";
            echo "          <label>Selecionar Data-RUV</label>";
            echo "      </td>";
            echo "      <td>";
            echo "          <select name='sDataRuv' id='sDataRuv' class='form-control' onchange='registroSelecao(this.value, \"serv\")'>";
/*                if(!empty($s)){
                    echo "<option value='".$s."'>".$s."</option>";
                }*/
            echo "              <option value='Todos'></option>";
            echo "              <option value='Todos'>Todos</option>";

            while($dadosResumoServicos = mysql_fetch_array($resultadoResumoServicos)){
                echo "          <option value='".$dadosResumoServicos['dataRuv']."'>".$dadosResumoServicos['dataRuv']."</option>";
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
                            echo "<option value='diaruv'>Data Registro</option>";
                        }
                        else if($ordem == "dataruv"){
                            echo "<option value='sonho'>Data RUV</option>";
                        }
                        else if($ordem == "servico"){
                            echo "<option value='servico'>Serviço</option>";
                        }
                        else if($ordem == "status"){
                            echo "<option value='status'>Status</option>";
                        }else 
                        if($ordem == "outros"){
                            echo "<option value='outros'>Outros/ Extras</option>";
                        }else 
                        if($ordem == "bonus"){
                            echo "<option value='bonus'>Bônus</option>";
                        }
                    }
                    echo "              <option value=''></option>";
                    echo "              <option value='dataregistro'>Data Registro</option>";
                    echo "              <option value='dataruv'>Data RUV</option>";
                    echo "              <option value='servico'>Serviço</option>";
                    echo "              <option value='status'>Status</option>";
                    echo "              <option value='outros'>Outros/ Extras</option>";
                    echo "              <option value='bonus'>Bônus</option>";
                    echo "          </select>";
                    echo "      </td>";
                    echo "  </tr>";
                    echo "</table>";

        if(mysql_num_rows($resultadoSQLServicos) > 0){

            echo "          <table class='table'>";
            echo "              <tr style='font-weight: bold;'>";
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

                while($dadosServicos = mysql_fetch_array($resultadoSQLServicos)){
                    echo "              <tr>";
                    echo "                  <td>";
                    echo                        $dadosServicos['dataRuv'];
                    echo "                  </td>";
                    echo "                  <td>";
                    echo                        $dadosServicos['dataRegFormatada'];
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
                    echo "                  <td>";
                    $idservicos = $dadosServicos['idservicos'];
                    echo "      <a href='inicio.php?m=serv&tab=registros&e=s&id=".$idservicos."' alt='Excluir' title='Excluir'>";//&s=focal
                    echo "          <img src='../../images/botaoexcluir.png' id='excluir' title='Excluir'>";
                    echo "      </a>";
                    echo "      <input type='hidden' name='idservicos' id='idservicos' value='".$idservicos."'>";
                    echo "                  </td>";
                    echo "              </tr>";
                }

                    echo "          </table>";

            }else{
                        echo "<label class='alert alert-warning' style='text-align: center; width: 600px;'>";
                        echo "  Ops! Sem Serviços do dia ".date('d/m/Y').". Selecione a data RUV acima, para demais consultas.";
                        echo "  <button type='button' class='close' data-dismiss='alert' aria-label='Fechar'>";
                        echo "      <span aria-hidden='true'> &times;</span>";
                        echo "  </button>";
                        echo "</label><br>";
            }

            if($this->excluiServ()){
                echo "<br><br>";
                echo "<label class='alert alert-success'>Serviço excluído com sucesso! Aguarde 2 segundos.</label>";
                echo "<meta http-equiv='refresh' content='2;url=inicio.php?m=serv&tab=registros'>";
            }

        }catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }

        echo "  </div>";
	}

	public function telaBonusServ(){
		echo "<div class='col-sm-12'>";
		echo "	<table class='table'>";
		echo "		<tr>";
		echo "			<td>";
		echo "				Bônus";
		echo "			</td>";
		echo "		</tr>";
		echo "	</table>";
		echo "</div>";
	}

	public function excluiServ(){

        $conecta = new conectaBanco();
        $conecta->conecta();

        $id = filter_input(INPUT_GET, 'id');
        $t = filter_input(INPUT_GET, 's');

        if(!empty($id)){

//            if($t === "focal"){
                $tabela = "servicos";
                $idTabela = "idservicos";
//            }else if($t === "pres"){
//                $tabela = "servpresenca";
//                $idTabela = "idpresenca";
//            }

            $sqlExcluiParPres = "DELETE FROM ".$tabela." WHERE ".$idTabela." = ".$id;

            try{
                
                $resultadoExclusaoParPres = mysql_query($sqlExcluiParPres) or die("Problemas na exclusão, no comando SQL. Erro: ".mysql_error());
                
                if($resultadoExclusaoParPres){
                    return true;
                }
                return false;
            } catch (Exception $ex) {
                echo "Exception ativado (Excluir Paragem-Presença). Erro: ".$ex->getMessage();
            }
        }


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
            echo "<script> window.location.href='inicio.php?m=serv&".$dataruv_selecionada."&e=11' </script>";
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


}