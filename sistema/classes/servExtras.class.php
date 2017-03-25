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
                    clearstatcache();
                    $b = new bonus();
                    $b->setCodusuario($_SESSION['idusuario']);
                    $b->telaBonusServExtras();
                    break;
                    
            }
            echo "</div>";//fecha o col-sm-12

	}

	public function telaServExtras(){

        //echo "<meta http-equiv='refresh' content='5;inicio.php?m=serv'>";

		//echo "<meta http-equiv='refresh' content='5;url=inicio.php?m=serv'>";
		$con = new conectaBanco();
		$con->conecta();

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
            
            //$semana = $this->anoRuv."-".$this->semanaRuv;

            echo "<form name='formTarefas' action='inicio.php?m=serv' method='post'>";
            echo "          <table class='table' style='text-align: justify; border: none;'>";
            echo "              <tr>";
            echo "                  <td width='30'>";
            echo "                      <label>Data RUV</label>";
            echo "					</td>";
            echo "					<td width='100'>";
            echo "                      <input type='text' name='dataRuv' id='dataRuv' value='".$this->dataRuv."' class='form-control' style='width: 120px;' $desativaData placeholder='DD/MM/AAAA' required onchange='preencheDataRuv(this.value, \"dataRuv\" )' onkeypress='mascaraData(this)'>";
//            echo "                      <input type='hidden' name='diaRuv' id='diaRuv' value='".$this->diaRuv."' class='form-control' style='width: 120px;' required>";
            echo "                      <input type='hidden' name='dataHoje' id='dataHoje' value='".date('d/m/Y')."' class='form-control' style='width: 120px;' $desativaData placeholder='DD/MM/AAAA' required>";

            echo "                  </td>";
            echo "                  <td width='30'>";
            echo "                      <label>Semana RUV</label>";
            echo "                  </td>";
            echo "                  <td width='100'>";
            echo "                      <input type='text' name='semana' id='semana' class='form-control' value='".$this->semanaRuv."' style='width: 80px;' required onchange='preencheDataRuv(this.value, \"semana\")'>";
            echo "                  </td>";
            echo "                  <td width='20'>";
            echo "                      <label>Dia RUV</label>";
            echo "                  </td>";
            echo "                  <td width='100'>";
            echo "                      <input type='text' name='dia' id='dia' class='form-control' value='".$this->diaRuv."' style='width: 50px;' required onchange='preencheDataRuv(this.value, \"dia\")'>";
            echo "                  </td>";

            echo "				</tr>";
            echo "          </table>";

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
           	echo "						<select name='tipo' class='form-control' onchange='validaServicos(this.value)'>";
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
           	echo "						<select name='servico' class='form-control'>";
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
           	echo "						<input type='radio' name='opcao' value='individual'> Individual   |   ";
           	echo "						<input type='radio' name='opcao' value='dupla'> Dupla";
           	echo "						</div>";

            echo "						<div id='pres' style='display: $bloPres;'>";
           	echo "						<input type='radio' name='opcao' value='sim'> Sim   |   ";
           	echo "						<input type='radio' name='opcao' value='nao'> Não";
           	echo "						</div>";
            echo "                  </td>";

            echo "                  <td>";
            echo "                      <input type='text' name='outros' id='outros' class='form-control' style='width: 300px;' required>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <input type='text' name='bonus' id='bonus' class='form-control' style='width: 80px;' required>";
            echo "                  </td>";
            echo "              </tr>";
            echo "              <tr>";
            echo "                  <td colspan='5' style='text-align: right;'>";
            echo "                      <input type='hidden' id='codusuario' name='codusuario' value='".$_SESSION['idusuario']."'>";
            echo "                      <a href='inicio.php' class='btn btn-default'>Cancelar</a> ";
            echo "                      <button class='btn btn-primary' type='submit' style='width: 80px;'>Salvar</button>";
            echo "                  </td>";
            echo "              </tr>";
            echo "              <tr>";
            echo "                  <td colspan='5'>";
            echo "                      <div id='erro1' name='erro1' class='alert alert-danger' style='display: none;'>";
            echo "                          Hora do Início superior a Hora do Término";
            echo "                      </div>";
            echo "                      <div id='erro1' name='erro2' class='alert alert-danger' style='display: none;'>Não é permitido duração acima de 1 hora</div>";
            echo "                  </td>";
            echo "              </tr>";
            echo "          </table>";
            echo "</form>";

        if($_POST){
//            $novoNivel = str_replace(",",".", filter_input(INPUT_POST, 'nivel'));
            $dataConvertida = implode("-", array_reverse(explode("/", filter_input(INPUT_POST, 'dataHoje'))));
            $dataRuvConvertida = implode("-", array_reverse(explode("/", filter_input(INPUT_POST, 'dataRuv'))));

            $this->dataRegistro = addslashes($dataConvertida);
            $this->dataRuv = $dataRuvConvertida;
            $this->semanaRuv = addslashes(filter_input(INPUT_POST, 'semana'));
            $this->bonus = addslashes(filter_input(INPUT_POST, 'bonus'));
            $this->codusuario = addslashes(filter_input(INPUT_POST, 'codusuario'));
            $this->diaRuv = addslashes(filter_input(INPUT_POST, 'dia'));
            $this->outros = addslashes(filter_input(INPUT_POST, 'outros'));

            $tipoServico = addslashes(filter_input(INPUT_POST, 'tipoServico'));

            //echo "Tipo de Serviço: ".$tipoServico;

            if($tipoServico === "Focalização"){
                $this->focalizacao = addslashes(filter_input(INPUT_POST, 'tipoServico'));
                $this->opcaofocalizacao = addslashes(filter_input(INPUT_POST, 'opcao'));

                if($this->insereFocalizacao()){
                    echo "<label class='alert alert-success'>Incluso com sucesso!</label>";
                    echo "<meta http-equiv='refresh' content='3;url=inicio.php?m=serv'>";
                }

            }else if($tipoServico === "Presença"){
                $this->presenca = addslashes(filter_input(INPUT_POST, 'tipoServico'));
                $this->opcaopresenca = addslashes(filter_input(INPUT_POST, 'opcao'));

                if($this->inserePresenca()){
                    echo "<label class='alert alert-success'>Incluso com sucesso!</label>";
                    echo "<meta http-equiv='refresh' content='3;url=inicio.php?m=serv'>";
                }
                

            }

        }
		echo "</div>";//fecha a div col-sm-12
	}

    public function insereFocalizacao(){
        $con = new conectaBanco();
        $con->conecta();

        $this->idservicos = ultimoId::ultimoIdBanco("idservicos", "servfocalizacao");

        $sqlInsereFocal = " INSERT INTO servfocalizacao (idservicos, dataRuv, dataRegistro, diaRuv, semanaRuv, focalizacao, opcaofocalizacao, outros, bonus, codusuario) 
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

        $sqlInserePresenca = "  INSERT INTO servpresenca (idpresenca, dataRuv, dataregistro, semanaRuv, presenca, opcaopresenca, outros, bonus, codusuario)
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

	public function telaRegistroServ(){

        //echo "<meta http-equiv='refresh' content='5;inicio.php?m=serv&tab=registros'>";


        $this->setCodusuario($_SESSION['idusuario']);

        $con = new conectaBanco();
		$con->conecta();

        //echo "SQL: ".$sqlFocalizacao."<br>";

        echo "<div class='col-sm-12'>";

        echo "  <ul class='nav nav-tabs' role='tablist'>";
        echo "      <li role='presentation'>";
        echo "          <a href='#focal' aria-controls='focal' role='tab' data-toggle='tab'>";
        echo "              Focalização";
        echo "          </a>";
        echo "      </li>";
        echo "      <li role='presentation'>";
        echo "          <a href='#pres' aria-controls='pres' role='tab' data-toggle='tab'>";
        echo "              Presença";
        echo "          </a>";
        echo "      </li>";
        echo "  </ul>";

        echo "<div class='tab-content'>";
        echo "  <div role='tabpanel' class='tab-pane fade active' id='focal'>";

        $sqlFocalizacao = "SELECT *, DATE_FORMAT(dataRuv, '%d/%m/%Y') as dataRuvFormatada FROM servfocalizacao WHERE codusuario=".$this->codusuario;

        echo "          <table class='table'>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      Data RUV";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      Semana RUV";
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

        // COMEÇA O CONTEÚDO DO BANCO DE DADOS DE FOCALIZAÇÃO

        try{

            $resultadoSQLFocalizacao = mysql_query($sqlFocalizacao) or die("Erro no comando SQL. Descrição: ".mysql_error());

            if(mysql_num_rows($resultadoSQLFocalizacao) > 0){

                while($dadosFocal = mysql_fetch_array($resultadoSQLFocalizacao)){
                    echo "              <tr>";
                    echo "                  <td>";
                    echo                        $dadosFocal['dataRuvFormatada'];
                    echo "                  </td>";
                    echo "                  <td>";
                    echo                        $dadosFocal['semanaRuv'];
                    echo "                  </td>";
                    echo "                  <td>";
                    echo                        $dadosFocal['focalizacao'];
                    echo "                  </td>";
                    echo "                  <td>";
                    echo                        $dadosFocal['opcaofocalizacao'];
                    echo "                  </td>";
                    echo "                  <td>";
                    echo                        $dadosFocal['outros'];
                    echo "                  </td>";
                    echo "                  <td>";
                    echo                        $dadosFocal['bonus'];
                    echo "                  </td>";
                    echo "                  <td>";
                    $idfocalizacao = $dadosFocal['idservicos'];
                    echo "      <a href='inicio.php?m=serv&tab=registros&e=s&id=".$idfocalizacao."&s=focal' alt='Excluir' title='Excluir'>";
                    echo "          <img src='../../images/botaoexcluir.png' id='excluir' title='Excluir'>";
                    echo "      </a>";
                    echo "      <input type='hidden' name='idfocalizacao' id='idfocalizacao' value='".$idfocalizacao."'>";
                    echo "                  </td>";
                    echo "              </tr>";
                }

            }else{
                echo "<tr>";
                echo "  <td colspan='7'>";
                echo "      Não possui informações de registros.";
                echo "  </td>";
                echo "</tr>";
            }

        }catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }

        echo "          </table>";
        echo "  </div>";

// ////////////////////////////////////////////////////////////////////// TAB PRESENÇA

        echo "  <div role='tabpanel' class='tab-pane fade' id='pres'>";

        $sqlPresenca = "SELECT *, DATE_FORMAT(dataRuv, '%d/%m/%Y') as dataRuvFormatada FROM servpresenca WHERE codusuario=".$this->codusuario;

        echo "          <table class='table'>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      Data RUV";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      Semana RUV";
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

        // COMEÇA O CONTEÚDO DO BANCO DE DADOS DE PRESENÇA

        try{

            $resultadoSQLPresenca = mysql_query($sqlPresenca) or die("Erro no comando SQL. Descrição: ".mysql_error());

            if(mysql_num_rows($resultadoSQLPresenca) > 0){

                while($dadosPresenca = mysql_fetch_array($resultadoSQLPresenca)){
                    echo "              <tr>";
                    echo "                  <td>";
                    echo                        $dadosPresenca['dataRuvFormatada'];
                    echo "                  </td>";
                    echo "                  <td>";
                    echo                        $dadosPresenca['semanaRuv'];
                    echo "                  </td>";
                    echo "                  <td>";
                    echo                        $dadosPresenca['presenca'];
                    echo "                  </td>";
                    echo "                  <td>";
                    echo                        $dadosPresenca['opcaopresenca'];
                    echo "                  </td>";
                    echo "                  <td>";
                    echo                        $dadosPresenca['outros'];
                    echo "                  </td>";
                    echo "                  <td>";
                    echo                        $dadosPresenca['bonus'];
                    echo "                  </td>";
                    echo "                  <td>";
                    $idpresenca = $dadosPresenca['idpresenca'];
                    echo "      <a href='inicio.php?m=serv&tab=registros&e=s&id=".$idpresenca."&s=pres' alt='Excluir' title='Excluir'>";
                    echo "          <img src='../../images/botaoexcluir.png' id='excluir' title='Excluir'>";
                    echo "      </a>";
                    echo "      <input type='hidden' name='idpresenca' id='idpresenca' value='".$idpresenca."'>";
                    echo "                  </td>";
                    echo "              </tr>";
                    
                }

            }else{
                echo "<tr>";
                echo "  <td colspan='7'>";
                echo "      Não possui informações de registros.";
                echo "  </td>";
                echo "</tr>";
            }

        }catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }



        echo "          </table>";

        echo "  </div>";


        echo "</div>"; // FECHA O TAB-CONTENT



//        echo "</div>";


        if($this->excluiServ()){
            echo "<br><br>";
            echo "<label class='alert alert-success'>Excluído com sucesso!.</label>";
            echo "<meta http-equiv='refresh' content='1;url=inicio.php?m=serv&tab=registros'>";
        }

        echo "</div>";//fecha a div col-sm-12*/

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

            if($t === "focal"){
                $tabela = "servfocalizacao";
                $idTabela = "idservicos";
            }else if($t === "pres"){
                $tabela = "servpresenca";
                $idTabela = "idpresenca";
            }

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

}