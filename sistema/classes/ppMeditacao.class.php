<?php

/*
 * Paragem Presença
 */

class ppMeditacao {

    private $idpp;
    private $diaAnoRuv;
    private $paragem;
    private $diaRuv;
    private $dataRegistro;
    private $duracao;
    private $nivel;
    private $bonus;
    private $periodo;
    private $inicio;
    private $termino;
    private $codusuario;
    private $dataRuv;
    private $dataSelecionada;

    function getDataSelecionada(){
        return $this->dataSelecionada;
    }

    function setDataSelecionada($data_selecionada){
        $this->dataSelecionada = $data_selecionada;
    }
    
    
    function getDataRuv(){
        return $this->dataRuv;
    }

    function setDataRuv($dataRuv){
        $this->dataRuv = $dataRuv;
    }

    function getInicio() {
        return $this->inicio;
    }

    function getTermino() {
        return $this->termino;
    }

    function setInicio($inicio) {
        $this->inicio = $inicio;
    }

    function setTermino($termino) {
        $this->termino = $termino;
    }

    function getDuracao() {
        return $this->duracao;
    }

    function getNivel() {
        return $this->nivel;
    }

    function getBonus() {
        return $this->bonus;
    }

    function getPeriodo() {
        return $this->periodo;
    }

    function setDuracao($duracao) {
        $this->duracao = $duracao;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function setBonus($bonus) {
        $this->bonus = $bonus;
    }

    function setPeriodo($periodo) {
        $this->periodo = $periodo;
    }

    function getDataRegistro() {
        return $this->dataRegistro;
    }

    function setDataRegistro($dataRegistro) {
        $this->dataRegistro = $dataRegistro;
    }

    function getDiaRuv() {
        return $this->diaRuv;
    }

    function setDiaRuv($diaRuv) {
        $this->diaRuv = $diaRuv;
    }

    function setIdpp($idpp) {
        $this->idpp = $idpp;
    }

    function setDiaAnoRuv($diaAnoRuv) {
        $this->diaAnoRuv = $diaAnoRuv; // Normal
//        echo "<br>Estou dentro do set. Valor: ".$diaAnoRuv;
    }

    function setParagem($paragem) {
        $this->paragem = $paragem;
    }

    function setCodusuario($codusuario) {
        $this->codusuario = $codusuario;
    }

    function getIdpp() {
        return $this->idpp;
    }

    function getDiaAnoRuv() {
        return $this->diaAnoRuv;
    }

    function getParagem() {
        return $this->paragem;
    }

    function getCodusuario() {
        return $this->codusuario;
    }

    public function verificaPP(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $sqlVerificaPP = "SELECT 
                          COUNT(idpp) as quantidade,
                          (SELECT COUNT(periodo) FROM pp WHERE codusuario = ".$this->codusuario." 
                                                         AND semana = '".$this->paragem."' 
                                                         AND diaRuv = ".$this->diaRuv.") AS quant
                          FROM pp WHERE codusuario = ".$this->codusuario." 
                          AND semana = '".$this->paragem."' 
                          AND periodo = '".$this->periodo."' 
                          AND diaRuv = ".$this->diaRuv;
//        echo "SQL: ".$sqlVerificaPP."<br>";
        try{
            $resultadoVerificaPP = mysql_query($sqlVerificaPP) or die ("Comando SQL não executado. Erro: ".mysql_error());

            $dadosVerificaPP = mysql_fetch_array($resultadoVerificaPP);
//            if($dadosVerificaPP['quantidade'] > 0){ //duplicidade para o mesmo dia, mesma paragem e mesmo período
            
//                echo "<label class='alert alert-danger'>Não é possível incluir mais de um lançamento para a mesma semana, dia e período. Se necessário, exclua um e insira outro.</label>";
//            }else{
                
                $this->incluiPP();
//            }
            
        } catch (Exception $ex) {
            echo "Não foi possível efetuar a transação. Exception: ".$ex->getMessage();
        }
        
    }
    
    public function incluiPP(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $this->idpp = ultimoId::ultimoIdBanco("idpp", "pp");
        
        $sqlInserePP = "INSERT INTO pp (idpp, diaAnoRuv, diaRuv, semana, dataRegistro, duracao, nivel, bonus, periodo, inicio, termino, codusuario, dataRuv) 
                        VALUES (".$this->idpp.", ".$this->diaAnoRuv.", ".$this->diaRuv.", '".$this->paragem."', '".$this->dataRegistro."', ".$this->duracao.", ".$this->nivel.", ".$this->bonus.", '".$this->periodo."', '".$this->inicio."', '".$this->termino."', ".$this->codusuario.", '".$this->dataRuv."')";
//        echo $sqlInserePP."<br>";
        try{
            $resultadoInserePP = mysql_query($sqlInserePP) or die ("Erro comando SQL (Inclusão PP). Descrição: ".mysql_error());
            if($resultadoInserePP){
                echo "<label class='alert alert-success'>Meditação salvo com sucesso! Aguarde 2 segundos.</label>";
                echo "<meta http-equiv='refresh' content='2;url=inicio.php?m=pp&tab=meditacao'>";
                $atividade = new atividades();
                $atividade->writeLog($_SESSION['usuario'], "Inclusão da Meditação. Data RUV: ".$this->dataRuv, "../controller/");
                return true;
            }
            return false;
        } catch (Exception $ex) {
            echo "Chamada de exception ativada. Não foi possível inserir. Exepction: ".$ex->getMessage();
        }
        
    }
    
    public function alteraPP(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $sqlAlteraPP = "UPDATE pp 
                        SET diaAnoRuv = ".$this->diaAnoRuv.", diaMesRuv = ".$this->diaMesRuv.", semana = ".$this->paragem." 
                        WHERE idpp = ".$this->idpp;
//        echo $sqlAlteraPP;
        try{
            $resultadoAlteraPP = mysql_query($sqlAlteraPP) or die ("Erro comando SQL (Alteração PP). Descrição: ".mysql_error());
            if($resultadoAlteraPP){
                echo "Alterado com sucesso !";
                $atividade = new atividades();
                $atividade->writeLog($_SESSION['usuario'], "Alteração da Meditação. Semana: ".$this->dataRuv, "../controller/");

                return true;
            }
            return false;
        } catch (Exception $ex) {
            echo "Chamada de exception ativada. Não foi possível alterar. Exepction: ".$ex->getMessage();
        }
        
        
    }

    public function telaPP(){
            
        $tab = filter_input(INPUT_GET, 'tab');
        
        switch($tab){
            default :
                $med = "btn-primary";
                $prt = "btn-default";
                $reg = "btn-default";
                $bns = "btn-default";
                $pes = "btn-default";
                break;
                
            case "meditacao":
                $med = "btn-primary";
                $prt = "btn-default";
                $reg = "btn-default";
                $bns = "btn-default";
                $pes = "btn-default";
                break;
            
            case "portal":
                $med = "btn-default";
                $prt = "btn-primary";
                $reg = "btn-default";
                $bns = "btn-default";
                $pes = "btn-default";
                break;
                
            case "registros":
                $med = "btn-default";
                $prt = "btn-default";
                $reg = "btn-primary";
                $bns = "btn-default";
                $pes = "btn-default";
                break;
            
            case "bonus":
                $med = "btn-default";
                $prt = "btn-default";
                $reg = "btn-default";
                $bns = "btn-primary";
                $pes = "btn-default";
                break;
                
            case "pesquisas":
                $med = "btn-default";
                $prt = "btn-default";
                $reg = "btn-default";
                $bns = "btn-default";
                $pes = "btn-primary";
                break;
                
        }
            echo "<p style='height: 20px;'>&nbsp;</p>";
            echo "<div class='col-sm-12'>";
            echo "  <div class='btn-group btn-group-justified' role='group'>";
            echo "          <a href='inicio.php?m=pp&tab=meditacao' class='btn $med' style='width: 90px;'>";
            echo "              Meditação";
            echo "          </a>";
            echo "          <a href='inicio.php?m=pp&tab=registros' class='btn $reg' style='width: 90px;'>";
            echo "              Registros";
            echo "          </a>";
            echo "          <a href='inicio.php?m=pp&tab=bonus' class='btn $bns' style='width: 90px;'>";
            echo "              Bônus";
            echo "          </a>";
            echo "          <a href='inicio.php?m=pp&tab=pesquisas' class='btn $pes' style='width: 90px;'>";
            echo "              Pesquisas";
            echo "          </a>";
            echo "  </div>";
            echo "  <p style='height: 20px;'>&nbsp;</p>";
            
            switch ($tab){
                default:
                    echo "<div id='meditacao'>";
                    $this->telaMeditacao();
                    echo "</div>";
                    break;

                case "registros":
                    $this->telaRegistros();
                    break;

                case "bonus":
                    echo "<div id='bonus'>";
                    $bonus = new bonus();
                    $bonus->setCodusuario($this->codusuario);
                    $bonus->telaBonusMeditacao();
                    echo "</div>";
                    break;
                    
                case "pesquisas":
                    $pesq = new Pesquisas();
                    $pesq->telaPesquisas('meditacao');
                    break;
                    
            }
            echo "</div>";//fecha o col-sm-12
            
            
            echo "</div>"; // ?
            
    }

    
    public function meditacaoBotao(){
        
            echo "      <div role='tabpanel' class='tab-pane active' id='meditacao'>";
            echo "          <div class='btn-group' data-toggle='buttons' aria-label='auto'>";// btn-group-justified  role='group'
            echo "              <div class='btn-group' role='group'>";
            echo "                  <button type='button' class='btn btn-default'>Automático</button>";
            echo "              </div>";
            echo "              <div class='btn-group' role='group'>";
            echo "                  <button type='button' class='btn btn-default' style='width: 131px;'>Início Agora</button>";
            echo "              </div>";
            echo "              <div class='btn-group' role='group'>";
            echo "                  <button type='button' class='btn btn-default' style='width: 146px;'>Término Agora</button>";
            echo "              </div>";
            echo "              <div class='btn-group' role='group'>";
            echo "                  <button type='button' class='btn btn-default'>Nível</button>";
            echo "              </div>";
            echo "          </div>";
            echo "<br>";
            echo "          <div class='btn-group' data-toggle='buttons' aria-label='manual'>";// btn-group-justified  role='group'
            echo "              <div class='btn-group' role='group'>";
            echo "                  <button type='button' class='btn btn-default' style='width: 96px;'>Manual</button>";
            echo "              </div>";
            echo "              <div class='btn-group' role='group'>";
            echo "                  <button type='button' class='btn btn-default'>Início a Escolher</button>";
            echo "              </div>";
            echo "              <div class='btn-group' role='group'>";
            echo "                  <button type='button' class='btn btn-default'>Término a Escolher</button>";
            echo "              </div>";
            echo "              <div class='btn-group' role='group'>";
            echo "                  <button type='button' class='btn btn-default'>Nível</button>";
            echo "              </div>";
            echo "              <div class='btn-group' role='group'>";
            echo "                  <button type='button' class='btn btn-default'>Data</button>";
            echo "              </div>";
            echo "          </div>";
            echo "      <p style='height: 20px;'>&nbsp;</p>";
    }
    
    public function meditacaoCheck(){
        
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
            echo "                  <input type='radio' name='opcao' id='auto' name='auto' onchange='preencheAutoManualPP()'> Automático";
            echo "              </label>";
            echo "              <label class='btn btn-default $manual' style='width: 95px;'>";
            echo "                  <input type='radio' name='opcao' id='manual' name='manual' onchange='preencheAutoManualPP()'> Manual";
            echo "              </label>";
            echo "          </div>";
            echo "          </td>";
            echo "          <td style='width: 40px;'>";
            echo "              &nbsp;";
            echo "          </td>";
            echo "          <td style='width: 80px;'>";
            echo "              <input type='checkbox' name='checkInicio' id='checkInicio' $check onclick='javascript:confereCheckMeditacao();'> Início";
            echo "          </td>";
            echo "          <td style='width: 90px;'>";
            echo "              <input type='checkbox' name='checkTermino' id='checkTermino' onclick='confereCheckMeditacao()'> Término";
            echo "          </td>";
            echo "          <td style='width: 80px;'>";
            echo "              <input type='checkbox' name='checkNivel' id='checkNivel' $nivelMarcado onclick='confereCheckMeditacao()'> Nìvel";
            echo "          </td>";
            echo "          <td style='width: 80px;'>";
            echo "              <input type='checkbox' name='checkData' id='checkData' $dataMarcada onclick='confereCheckMeditacao()'> Data";
            echo "          </td>";
            echo "      </tr>";
            echo "      <tr>";
            echo "          <td colspan='6'>";
            echo "              &nbsp;";
            echo "          </td>";
            echo "      </tr>";
            echo "  </table>";
            echo "</div>";
    }
    
    public function telaRegistros(){
        echo "<div class='col-sm-12'>";
            $this->telaConsultaMeditacao();

        echo "</div>";
    }
    
    public function telaConsultaMeditacao(){
        //$a = new atividades();
        $conecta = new conectaBanco();
        $conecta->conecta();

        $a = new atividades();

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
                case 'diaruv':
                        $selecionaOrdem = " ORDER BY diaRuv";
                    break;
                case 'dataregistro':
                        $selecionaOrdem = " ORDER BY dataRegistro";
                    break;
                case 'inicio':
                        $selecionaOrdem = " ORDER BY inicio";
                    break;
                case 'termino':
                        $selecionaOrdem = " ORDER BY termino";
                    break;
                case 'duracao':
                        $selecionaOrdem = " ORDER BY duracao";
                    break;
                case 'nivel':
                        $selecionaOrdem = " ORDER BY nivel";
                    break;
                case 'bonus':
                        $selecionaOrdem = " ORDER BY bonus";
                    break;
                case 'periodo':
                        $selecionaOrdem = " ORDER BY periodo";
                    break;
                
                default:
                        $selecionaOrdem = " ORDER BY dataRuv";
                    break;
            }//fim do switch
//        }

        echo "<div class='col-sm-12'>";

        $sqlPP = "SELECT *, DATE_FORMAT(`dataRegistro`, '%d/%m/%Y') AS dataMeditacao
                  FROM pp
                  WHERE codusuario = ".$this->codusuario.$selecionaDataRuv.$selecionaOrdem; // DATE_FORMAT(`dataRuv`, '%d/%m/%Y') AS dataRuvFormnat
//" AND dataRegistro = ".date('Y-m-d').
        $sqlResumoDataRuv = "SELECT dataRuv, diaRuv FROM pp WHERE codusuario = ".$this->codusuario." GROUP BY dataRuv ORDER BY dataRuv";
        
        //echo "SQL: ".$sqlPP."<br>";

        $tipousuario = $_SESSION['codTipoUsuario'];

        try{
            $resultadoPP = mysql_query($sqlPP) or die("Erro na execução do comando SQL de consulta meditação. Descrição: ".mysql_error());

            $resultadoResumo = mysql_query($sqlResumoDataRuv) or die("Erro na execução do comando SQL do resumo. Descrição: ".mysql_error());

/*                if($tipousuario === "1" or $tipousuario === "3"){
                    $sqlUsuario = "SELECT * FROM tblusuario";

                    try{

                        $resultadoSqlUsuario = mysql_query($sqlUsuario) or die("Erro no comando SQL de consulta do usuário. Descrição: ".mysql_error());

                        if(mysql_num_rows($resultadoSqlUsuario) > 0){
                            echo "<table class='table table-striped'>";
                            echo "  <tr>";
                            echo "      <td colspan='2'>";
                            echo "          <label>Usuário: </label>";
                            echo "      </td>";
                            echo "      <td colspan='2'>";
                            echo "          <select name='selectUsuario' id='selectUsuario' class='form-control' onchange='preencheConsultaUsuario()'>";
                            echo "              <option value=''></option>";

                            while($dadosResultadoUsuario = mysql_fetch_array($resultadoSqlUsuario)){
                                echo "<option value='".$dadosResultadoUsuario['idUsuario']."'>".$dadosResultadoUsuario['nomeUsuario']."</option>";
                            }

                            echo "          </select>";
                            echo "      </td>";
                            echo "  </tr>";
                            echo "</table>";

                        }

                    }catch(Exception $ex){
                        echo "Exception de usuário ativado. Descrição: ".$ex->getMessage();
                    }
//                    echo "Tipo usuário: ".$tipousuario;
                }
            */
                    echo "<table class='table table-striped'>";
                    echo "  <tr>";
                    echo "      <td>";
                    echo "          <label>Selecionar Data RUV</label>";
                    echo "      </td>";
                    echo "      <td>";
                    echo "          <select name='sDataRuv' id='sDataRuv' class='form-control' onchange='registroSelecao(this.value, \"pp\")'>";
                    if(!empty($s)){
                        echo "<option value='".$s."'>".$s."</option>";
                    }
                    echo "              <option value='todos'></option>";
                    echo "              <option value='Todos'>Todos</option>";

                    while($dadosResumo = mysql_fetch_array($resultadoResumo)){
                    echo "              <option value='".$dadosResumo['dataRuv']."'>".$dadosResumo['dataRuv']."</option>";
                    }
                    echo "          </select>";
                    echo "      </td>";
//                    echo "  </tr>";
//                    echo "  <tr>";
                    echo "      <td>";
                    echo "          <label>Classificar por: </label>";
                    echo "      </td>";
                    echo "      <td>";
                    //$dominio = null;
                    $servidor = $_SERVER['REQUEST_URI'];
                    echo "          <select name='classificacao' class='form-control' onchange='ordemSQL(this.value, \"$servidor\", \"meditacao\")'>"; // disabled
                    echo "              <option value=''></option>";
                    echo "              <option value='diaruv'>Dia RUV</option>";
                    echo "              <option value='dataregistro'>Data Registro</option>";
                    echo "              <option value='inicio'>Início</option>";
                    echo "              <option value='termino'>Término</option>";
                    echo "              <option value='duracao'>Duração</option>";
                    echo "              <option value='nivel'>Nível</option>";
                    echo "              <option value='bonus'>Bônus</option>";
                    echo "              <option value='periodo'>Período</option>";
                    echo "          </select>";
                    echo "      </td>";
                    echo "  </tr>";
                    echo "</table>";

                if(mysql_num_rows($resultadoPP) > 0){
                    echo "<table class='table table-striped'>";
                    echo "              <tr>";
                    echo "                  <td>";
                    echo "                      <label>Data RUV</label>";
                    echo "                  </td>";
                    echo "                  <td>";
                    echo "                      <label>Data</label>";
                    echo "                  </td>";
                    echo "                  <td>";
                    echo "                      <label>Dia</label>";
                    echo "                  </td>";
                    echo "                  <td>";
                    echo "                      <label>Início</label>";
                    echo "                  </td>";
                    echo "                  <td>";
                    echo "                      <label>Término</label>";
                    echo "                  </td>";
                    echo "                  <td>";
                    echo "                      <label>Duração</label>";
                    echo "                  </td>";
                    echo "                  <td>";
                    echo "                      <label>Nível</label>";
                    echo "                  </td>";
                    echo "                  <td>";
                    echo "                      <label>Bônus</label>";
                    echo "                  </td>";
                    echo "                  <td>";
                    echo "                      <label>Período</label>";
                    echo "                  </td>";
                    echo "                  <td>";
                    echo "                      <label>&nbsp;</label>";
                    echo "                  </td>";
                    echo "              </tr>";
                    while($dadosPP = mysql_fetch_array($resultadoPP)){
                        echo "  <tr>";
                        echo "      <td>";
                        echo            $dadosPP['dataRuv'];
                        echo "      </td>";
                        echo "      <td>";
                        echo            $dadosPP['dataMeditacao'];
                        echo "      </td>";
                        echo "      <td>";
                        echo            $dadosPP['diaRuv'];
                        echo "      </td>";
                        echo "      <td>";
                        echo            $dadosPP['inicio'];
                        echo "      </td>";
                        echo "      <td>";
                        echo            $dadosPP['termino'];
                        echo "      </td>";
                        echo "      <td>";
                        echo            $dadosPP['duracao'];
                        echo "      </td>";
                        echo "      <td>";
                        echo            $dadosPP['nivel'];
                        echo "      </td>";
                        echo "      <td>";
                        echo            $dadosPP['bonus'];
                        echo "      </td>";
                        echo "      <td>";
                        echo            $dadosPP['periodo'];
                        echo "      </td>";
                        echo "      <td>";
                                        $idpp = $dadosPP['idpp'];
                        echo "          <a href='inicio.php?m=pp&tab=registros&e=med&id=".$idpp."' alt='Excluir' title='Excluir'>";
                        echo "              <img src='../../images/botaoexcluir.png' id='excluir' title='Excluir'>";
                        echo "          </a>";
                        echo "          <input type='hidden' name='idpp' id='idpp' value='".$idpp."'>";
                        echo "      </td>";
                        echo "  </tr>";
                    }
                    echo "</table>";
                }else{
                        echo "<label class='alert alert-warning' style='text-align: center; width: 600px;'>";
                        echo "  Ops! Sem meditação do dia ".date('d/m/Y').". Selecione a data RUV acima, para demais consultas.";
                        echo "  <button type='button' class='close' data-dismiss='alert' aria-label='Fechar'>";
                        echo "      <span aria-hidden='true'> &times;</span>";
                        echo "  </button>";
                        echo "</label><br>";
                }
                echo "</div>";
                //$a = new atividades();
                //$a->writeLog($_SESSION['usuario'], "Consulta de registros de Meditação.", "../controller/");

                if($this->excluirMeditacao()){
                    $a->writeLog($_SESSION['usuario'], "Exclusão da Meditação. Data RUV: ".$this->dataRuv, "../controller/");
                    echo "<label class='alert alert-success'>Meditação excluída com sucesso! Aguarde 2 segundos</label>";
                    echo "<meta http-equiv='refresh' content='2;url=inicio.php?m=pp&tab=registros'>";
                }
            
        } catch (Exception $ex) {
            echo "Chamada de exception. Descrição: ".$ex->getMessage();
        }
        
    }

    public function validaDataRuv($dataRuv){
        $dataS = explode("-", $dataRuv);

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

        //echo "Mês: ".$mes."<br>";

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

        $sqlData = "SELECT * FROM calendario 
                    WHERE ano = ".$ano." 
                    AND semana = ".$mesLetivo." 
                    AND diaSemana = '".$ano."' 
                    AND estacao = ".$estacao." 
                    AND diaDoMes = ".$diaMes;

        //echo $sqlData;

        try{

            $resultadoCalendario = mysql_query($sqlData) or die("Houve um erro no comando SQL de calendario. Erro: ".mysql_error());

            if(mysql_num_rows($resultadoCalendario) > 0){
                $dadosCalendario = mysql_fetch_array($resultadoCalendario);

                $this->setDataRuv($this->diaAnoRuv."-".$dadosCalendario['estacao'].$dadosCalendario['diaDoMes'].$dadosCalendario['diaSemana'].".".$dadosCalendario['semana']);
                $this->setParagem($this->diaAnoRuv."-".$dadosCalendario['estacao'].$dadosCalendario['diaDoMes'].$dadosCalendario['diaSemana']);
                $this->setDiaRuv($dadosCalendario['semana']);
                echo "<script>document.getElementById('inicio').focus();</script>";
            }

        }catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
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
            echo "<script> window.location.href='inicio.php?m=pp&".$dataruv_selecionada."&e=11' </script>";
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

                $this->setDataRuv($this->diaAnoRuv."-".$dadosCalendario['estacao'].$dadosCalendario['diaDoMes'].$dadosCalendario['diaSemana'].".".$dadosCalendario['semana']);
                $this->setParagem($this->diaAnoRuv."-".$dadosCalendario['estacao'].$dadosCalendario['diaDoMes'].$dadosCalendario['diaSemana']);
                $this->setDiaRuv($dadosCalendario['semana']);
                $this->setDataSelecionada($diaCalendario."/".$mesLetivo."/".$anoCalendario);
//                echo "Data selecionada: ".$dataSelecionada;
                echo "<script>document.getElementById('inicio').focus();</script>";
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
                $this->setParagem($dadosCalendario['ano']."-".$dadosCalendario['estacao'].$dadosCalendario['diaDoMes'].$dadosCalendario['diaSemana']);
                $this->setDiaRuv($dadosCalendario['semana']);
                echo "<script>document.getElementById('inicio').focus();</script>";
            }

        }catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }


    }
    
    public function telaMeditacao(){

        $data = filter_input(INPUT_GET, 'd');
        $dataruv_selecionada = filter_input(INPUT_GET, 'dr');
        $dia_selecionado = filter_input(INPUT_GET, 'dia');
        $semana_selecionada = filter_input(INPUT_GET, 'sem');

        $a = new atividades();

        $conecta = new conectaBanco();
        $conecta->conecta();
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
            
            echo "<form name='formMeditacao' id='formMeditacao' action='inicio.php?m=pp&tab=meditacao' method='post'>";

            if(!empty($data)){
                $this->validaData($data);
                $this->setDataSelecionada($data);
            }

            if(!empty($dataruv_selecionada)){
                $this->setDataRuv($dataruv_selecionada);
                $this->validaDiaDataRuv($dataruv_selecionada);
            }

            echo "  <table class='table'>";
            echo "              <tr>";
            echo "                  <td style='width: 165px;'>";
            echo "                      <label>Data";
            echo "                          <div class='input-group'>";
            echo "                              <input type='text' name='calendario' id='calendario' class='form-control' value='".$this->dataSelecionada."' $desativaData placeholder='DD/MM/AAAA' required onkeyup='somenteNumeros(this)'  onchange='enterCampoRuv(\"data\", \"pp\", this.value);'><div class='input-group-addon'><i class='fa fa-calendar'></i></div>"; //value='".date('d/m/Y')."'  onmouseup='enterTabData(\"inicio\", \"pp\", this.value, event)'
// onkeydown='enterTabData(\"inicio\", \"pp\", this.value, event)'
            // onkeydown='enterTabData(\"inicio\", \"pp\", this.value, event)'
            echo "                          </div>";
            echo "                          <input type='hidden' id='pegaData' name='pegaData'>";
            echo "                      </label>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <label>Semana";
            echo "                      <input type='text' name='semanaRuvMed' id='semanaRuvMed' class='form-control' value='".$this->paragem."' style='width: 80px;' required onkeypress='mascaraSemana(this)' onchange='enterCampoRuv(\"semana\", \"pp\", this.value);' onkeydown='enterTab(\"dia\", event)' onkeyup='somenteNumeros(this)' maxlength='5'>";
            echo "                      </label>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <label>Dia";
            echo "                      <input type='text' name='dia' id='dia' class='form-control' value='".$this->diaRuv."'  onchange='enterCampoRuv(\"dia\", \"pp\", this.value)' style='width: 50px;' required onkeydown='enterTab(\"dataRuv\", event)' onkeyup='somenteNumeros(this)' maxlength='2'>"; 
            echo "                      </label>"; //enterTab(\"dataRuv\", event) //preencheDataRuv(this.value, \"dia\", \"meditacao\")
            echo "                  </td>";//
            echo "                  <td>";
            echo "                      &nbsp;";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      &nbsp;";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      &nbsp;";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <label>Data RUV";
            echo "                      <input type='text' name='dataRuv' id='dataRuv' value='".$this->dataRuv."' class='form-control' style='width: 120px;' $desativaData placeholder='A-EMS.D' required onchange='enterCampoRuv(\"dataRuv\", \"pp\", this.value)' onkeypress='mascaraDataRuv(this)' onkeydown='enterTab(\"inicio\", event)' onkeyup='somenteNumeros(this)' maxlength='7'>";
            echo "                      </label>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      &nbsp;";
            echo "                  </td>";
            echo "              </tr>";

            echo "  </table>";
            echo "<hr size='2'>";
            $this->meditacaoCheck();

            echo "          <table class='table' style='text-align: justify;'>";
            echo "              <tr>";
            echo "                  <td>";
            echo "                      <label>Início";
            echo "                      <input type='text' name='inicio' id='inicio' class='form-control' $marcaInicio required onkeypress='mascara(this)' onkeydown='enterTab(\"termino\", event)' onkeyup='somenteNumeros(this)' maxlength='5'>";
            echo "                      </label>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <label>Término";
            echo "                      <input type='text' name='termino' id='termino' class='form-control' onblur='calculaTempo()' required onkeypress='mascara(this)' onkeydown='enterTab(\"duracao\", event)' onkeyup='somenteNumeros(this)' maxlength='5'>"; // onchange='calculaTempo()' onkeyup='calculaTempo()'
            echo "                      </label>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <label>Duração";
            echo "                      <input type='text' name='duracao' id='duracao' class='form-control' style='width: 80px;' readonly='readonly' required onkeydown='enterTab(\"nivel\", event)' onkeyup='somenteNumeros(this)' maxlength='2' onchange='calculaBonusMeditacao(this.value);'>";
            echo "                      </label>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <label>Nível";
            echo "                      <input type='text' name='nivel' id='nivel' class='form-control' style='width: 80px;' required  onkeydown='enterTab(\"salvar\", event)'>";
            echo "                      </label>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <label>Bônus";
            echo "                      <input type='text' name='bonus' id='bonus' class='form-control' style='width: 80px;' required readonly>";
            echo "                      </label>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <label>Período";
            echo "                      <input type='text' name='periodo' id='periodo' class='form-control' style='width: 150px;' readonly='readonly' required>";
            echo "                      </label>";
            echo "                  </td>";
            echo "              </tr>";
            echo "              <tr>";
            echo "                  <td colspan='7'>";
            echo "                      <input type='hidden' id='codusuario' name='codusuario' value='".$_SESSION['idusuario']."'";
            echo "                  </td>";
            echo "              </tr>";

            echo "              <tr>";
            echo "                  <td colspan='5'>";
            echo "                      &nbsp;";
            echo "                  </td>";
            echo "                  <td style='text-align: right;'>";
            echo "                      <a href='inicio.php' class='btn btn-default' title='Voltar' alt='Voltar'>";
            echo "                          <img src='../img/btn_back.png' width='25' height='25'>";
            echo "                      </a>";
            echo "                  </td>";
            echo "                  <td style='text-align: left;'>";
            echo "                      <button type='button' class='btn btn-default' id='salvar' name='salvar' onclick='enviaForm(\"formMeditacao\")'>";
            echo "                          <img src='../img/save2.png' width='25' height='25'>";
            echo "                      </button>";
            echo "                  </td>";
            echo "              </tr>";
            echo "              <tr>";
            echo "                  <td colspan='5'>";
            echo "                      &nbsp;";
            echo "                  </td>";
            echo "                  <td style='text-align: right;'>";
            echo "                      <a href='inicio.php' title='Voltar' alt='Voltar'>";
            echo "                          <label>Voltar</label>";
            echo "                      </a>";
            echo "                  </td>";
            echo "                  <td style='text-align: left;'>";
            echo "                      <a href='#' onclick='enviaForm(\"formMeditacao\")' title='Salvar' alt='Salvar'>";
            echo "                          <label>Salvar</label>";
            echo "                      </a>";
            echo "                  </td>";
            echo "              </tr>";

/*            echo "              <tr>";
            echo "                  <td colspan='7' style='text-align: right;'>";
            echo "                      <a href='inicio.php' class='btn btn-default'>Cancelar</a> ";
            echo "                      <button class='btn btn-primary' type='button' onclick='enviaForm(\"formMeditacao\")' id='salvar' name='salvar' style='width: 80px;'>Salvar</button>";
            echo "                  </td>";
            echo "              </tr>";*/
            echo "              <tr>";
            echo "                  <td colspan='7'>";
            echo "                      <div id='erro1' name='erro1' class='alert alert-danger' style='display: none;'>";
            echo "                          Data Inválida";
            echo "                      </div>";
            echo "                      <div id='erro2' name='erro2' class='alert alert-danger' style='display: none;'>";
            echo "                          Início Inválido";
            echo "                      </div>";
            echo "                      <div id='erro3' name='erro3' class='alert alert-danger' style='display: none;'>";
            echo "                          Término Inválido";
            echo "                      </div>";
            echo "                      <div id='erro4' name='erro4' class='alert alert-danger' style='display: none;'>";
            echo "                          Duração Inválida. Preencha corretamente o início e o término.";
            echo "                      </div>";
            echo "                      <div id='erro5' name='erro5' class='alert alert-danger' style='display: none;'>";
            echo "                          Nível Inválido.";
            echo "                      </div>";
            echo "                      <div id='erro6' name='erro6' class='alert alert-danger' style='display: none;'>";
            echo "                          Bônus Inválido. Preencha corretamente o início e o término.";
            echo "                      </div>";
            echo "                      <div id='erro7' name='erro7' class='alert alert-danger' style='display: none;'>";
            echo "                          Período Inválido. Preencha corretamente o início e o término.";
            echo "                      </div>";
            echo "                      <div id='erro8' name='erro8' class='alert alert-danger' style='display: none;'>";
            echo "                          Semana RUV Inválido. Preencha corretamente e somente números.";
            echo "                      </div>";
            echo "                      <div id='erro9' name='erro9' class='alert alert-danger' style='display: none;'>";
            echo "                          Dia RUV Inválido. Preencha corretamente e somente números.";
            echo "                      </div>";
            echo "                      <div id='erro10' name='erro10' class='alert alert-danger' style='display: none;'>";
            echo "                          Data RUV Inválida. Preencha corretamente e somente números.";
            echo "                      </div>";
            if($error = filter_input(INPUT_GET, 'e')){
                if($error === "11"){
                    echo "<meta http-equiv='refresh' content='3;url=inicio.php?m=pp'>";
            echo "                      <div id='erro11' name='erro11' class='alert alert-danger'>";
            echo "                          A semana não pode ser maior que 8.";
            echo "                      </div>";
                }
            }
            echo "                  </td>";
            echo "              </tr>";
            echo "          </table>";
            echo "</form>";

        if($_POST){
            $novoNivel = str_replace(",",".", filter_input(INPUT_POST, 'nivel'));
            $dataConvertida = implode("-", array_reverse(explode("/", filter_input(INPUT_POST, 'calendario'))));
            $dataRuvConvertida = implode("-", array_reverse(explode("/", filter_input(INPUT_POST, 'dataRuv'))));

            $this->dataRegistro = addslashes($dataConvertida);
            $this->paragem = addslashes(filter_input(INPUT_POST, 'semanaRuvMed'));
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
                //$a->writeLog($_SESSION['usuario'], "Inclusão da Meditação. Data RUV: ".$this->paragem." | Data Inclusão: ".date('d/m/Y'), "../controller/");
//                $a->writeLog($_SESSION['usuario'], "Inclusão de Meditação.", "../controller/");
                //$this->verificaPP();

                $this->incluiPP();
            }
        }
        
    }
    
    public function excluirMeditacao(){
        $e = filter_input(INPUT_GET, 'e');
        $id = filter_input(INPUT_GET, 'id');
        $a = new atividades();
        
//        if($tabela === "meditacao"){
            if($e === "med"){
                $conecta = new conectaBanco();
                $conecta->conecta();

                $sqlDeletaPP = "DELETE FROM pp WHERE idpp=".$id;

                try{

                    $resultadoDeletaPP = mysql_query($sqlDeletaPP) or die ("Erro no comando de exclusão. Descrição: ".mysql_error());

                    if($resultadoDeletaPP){
                        $a->writeLog($_SESSION['usuario'], "Exclusão de Meditação. Data RUV: ".$this->dataRuv, "../controller/");
                        return true;
                    }else{
                        return false;
                    }

                } catch (Exception $ex) {
                    echo "Exception acionado. Descrição: ".$ex->getMessage();
                }

            }
//        }
        
    }
    //put your code here
}
