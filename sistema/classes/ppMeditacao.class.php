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
                                                         AND paragem = '".$this->paragem."' 
                                                         AND diaRuv = ".$this->diaRuv.") AS quant
                          FROM pp WHERE codusuario = ".$this->codusuario." 
                          AND paragem = '".$this->paragem."' 
                          AND periodo = '".$this->periodo."' 
                          AND diaRuv = ".$this->diaRuv;
//        echo "SQL: ".$sqlVerificaPP."<br>";
        try{
            $resultadoVerificaPP = mysql_query($sqlVerificaPP) or die ("Comando SQL não executado. Erro: ".mysql_error());

            $dadosVerificaPP = mysql_fetch_array($resultadoVerificaPP);
            if($dadosVerificaPP['quantidade'] > 0){ //duplicidade para o mesmo dia, mesma paragem e mesmo período
            
                echo "<label class='alert alert-danger'>Não é possível incluir mais de um lançamento para a mesma semana, dia e período. Se necessário, exclua um e insira outro.</label>";
            }else{
                
                $this->incluiPP();
            }
            
        } catch (Exception $ex) {
            echo "Não foi possível efetuar a transação. Exception: ".$ex->getMessage();
        }
        
    }
    
    public function incluiPP(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $this->idpp = ultimoId::ultimoIdBanco("idpp", "pp");
        
        $sqlInserePP = "INSERT INTO pp (idpp, diaAnoRuv, diaRuv, paragem, dataRegistro, duracao, nivel, bonus, periodo, inicio, termino, codusuario, dataRuv) 
                        VALUES (".$this->idpp.", ".$this->diaAnoRuv.", ".$this->diaRuv.", '".$this->paragem."', '".$this->dataRegistro."', ".$this->duracao.", ".$this->nivel.", ".$this->bonus.", '".$this->periodo."', '".$this->inicio."', '".$this->termino."', ".$this->codusuario.", '".$this->dataRuv."')";
//        echo $sqlInserePP."<br>";
        try{
            $resultadoInserePP = mysql_query($sqlInserePP) or die ("Erro comando SQL (Inclusão PP). Descrição: ".mysql_error());
            if($resultadoInserePP){
                echo "<label class='alert alert-success'>Salvo com sucesso!</label>";
                echo "<meta http-equiv='refresh' content='3;url=inicio.php?m=pp&tab=meditacao'>";
                $atividade = new atividades();
                $atividade->writeLog($_SESSION['usuario'], "Inclusão da Meditação. Semana: ".$this->paragem, "../controller/");
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
                        SET diaAnoRuv = ".$this->diaAnoRuv.", diaMesRuv = ".$this->diaMesRuv.", paragem = ".$this->paragem." 
                        WHERE idpp = ".$this->idpp;
//        echo $sqlAlteraPP;
        try{
            $resultadoAlteraPP = mysql_query($sqlAlteraPP) or die ("Erro comando SQL (Alteração PP). Descrição: ".mysql_error());
            if($resultadoAlteraPP){
                echo "Alterado com sucesso !";
                $atividade = new atividades();
                $atividade->writeLog($_SESSION['usuario'], "Alteração da Meditação. Semana: ".$this->paragem, "../controller/");

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
                break;
                
            case "meditacao":
                $med = "btn-primary";
                $prt = "btn-default";
                $reg = "btn-default";
                $bns = "btn-default";
                break;
            
            case "portal":
                $med = "btn-default";
                $prt = "btn-primary";
                $reg = "btn-default";
                $bns = "btn-default";
                break;
                
            case "registros":
                $med = "btn-default";
                $prt = "btn-default";
                $reg = "btn-primary";
                $bns = "btn-default";
                break;
            
            case "bonus":
                $med = "btn-default";
                $prt = "btn-default";
                $reg = "btn-default";
                $bns = "btn-primary";
                break;
                
        }
            echo "<p style='height: 20px;'>&nbsp;</p>";
            echo "<div class='col-sm-12'>";
            echo "  <div class='btn-group btn-group-justified' role='group'>";
            echo "          <a href='inicio.php?m=pp&tab=meditacao' class='btn $med' style='width: 90px;'>";
            echo "              Meditação";
            echo "          </a>";
//            echo "          <a href='inicio.php?m=pp&tab=portal' class='btn $prt' style='width: 90px;'>";
//            echo "              Portais";
//            echo "          </a>";
            echo "          <a href='inicio.php?m=pp&tab=registros' class='btn $reg' style='width: 90px;'>";
            echo "              Registros";
            echo "          </a>";
            echo "          <a href='inicio.php?m=pp&tab=bonus' class='btn $bns' style='width: 90px;'>";
            echo "              Bônus";
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

        echo "<div class='col-sm-12'>";
//        echo "<label class='alert alert-info' style='width: 100%;'>Meditação</label>";

        $conecta = new conectaBanco();
        $conecta->conecta();
        $sqlPP = "SELECT *, DATE_FORMAT(`dataRegistro`, '%d/%c/%Y') AS dataMeditacao, DATE_FORMAT(`dataRuv`, '%d/%c/%Y') AS dataRuvFormnat 
                  FROM pp
                  WHERE codusuario = ".$this->codusuario;
        
        try{
            $resultadoPP = mysql_query($sqlPP) or die("Erro na execução do comando SQL de consulta meditação. Descrição: ".mysql_error());
            

                if(mysql_num_rows($resultadoPP) > 0){
                    echo "<table class='table table-striped'>";
                    echo "              <tr>";
                    echo "                  <td>";
                    echo "                      <label>Data RUV</label>";
                    echo "                  <td>";
                    echo "                  <td>";
                    echo "                      <label>Semana</label>";
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
                    echo "                      <label>Operação</label>";
                    echo "                  </td>";
/*                    echo "                  <td>";
                    echo "                      <label>&nbsp;</label>";
                    echo "                  </td>";*/
                    echo "              </tr>";
                    while($dadosPP = mysql_fetch_array($resultadoPP)){
                        echo "  <tr>";
                        echo "      <td>";
                        echo            $dadosPP['dataRuvFormnat'];
                        echo "      </td>";
                        echo "      <td>";
                        echo            $dadosPP['paragem'];
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
                        echo "      <a href='inicio.php?m=pp&tab=registros&e=med&id=".$idpp."' alt='Excluir' title='Excluir'>";
                        echo "          <img src='../../images/botaoexcluir.png' id='excluir' title='Excluir'>";
                        echo "      </a>";
                        echo "      <input type='hidden' name='idpp' id='idpp' value='".$idpp."'>";
                        echo "      </td>";
                        echo "  </tr>";
                    }
                    echo "</table>";
                }else{
                        echo "<label class='alert alert-warning' style='text-align: center; width: 600px;'>";
                        echo "  Ops! Sem meditação a mostrar.";
                        echo "  <button type='button' class='close' data-dismiss='alert' aria-label='Fechar'>";
                        echo "      <span aria-hidden='true'> &times;</span>";
                        echo "  </button>";
                        echo "</label><br>";
                }
                echo "</div>";
                $a = new atividades();
                $a->writeLog($_SESSION['usuario'], "Consulta de registros de Meditação.", "../controller/");

                if($this->excluirMeditacao()){
                    echo "<label class='alert alert-success'>Meditação excluída com sucesso!</label>";
                    echo "<meta http-equiv='refresh' content='3;url=inicio.php?m=pp&tab=registros'>";
                }
            
        } catch (Exception $ex) {
            echo "Chamada de exception. Descrição: ".$ex->getMessage();
        }
        
    }
    
    public function telaMeditacao(){

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
            
            echo "<form name='formMeditacao' action='inicio.php?m=pp&tab=meditacao' method='post'>";
//            $this->meditacaoBotao();
            $this->meditacaoCheck();
            echo "          <table class='table' style='text-align: justify;'>";
            echo "              <tr>";
            echo "                  <td>";
            echo "                      <label>Data RUV</label>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <label>Semana</label>";
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
            echo "              </tr>";
            echo "              <tr style='text-align: center;'>";
            echo "                  <td>";
            echo "                      <input type='text' name='dataRuv' id='dataRuv' value='".$this->dataRuv."' class='form-control' style='width: 120px;' $desativaData placeholder='DD/MM/AAAA' required onchange='preencheDataRuv(this.value, \"dataRuv\" )' onkeypress='mascaraData(this)'>";

            echo "                      <input type='hidden' name='dataHoje' id='dataHoje' value='".date('d/m/Y')."' class='form-control' style='width: 120px;' $desativaData placeholder='DD/MM/AAAA' required>";
            echo "                  </td>";
            echo "                  <td>";
            $semana = $this->diaAnoRuv."-".$this->paragem;
            echo "                      <input type='text' name='semana' id='semana' class='form-control' value='".$semana."' style='width: 80px;' required onchange='preencheDataRuv(this.value, \"semana\")'>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <input type='text' name='dia' id='dia' class='form-control' value='".$this->diaRuv."' style='width: 50px;' required onchange='preencheDataRuv(this.value, \"dia\")'>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <input type='text' name='inicio' id='inicio' class='form-control' $marcaInicio required onkeypress='mascara(this)'>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <input type='text' name='termino' id='termino' class='form-control' onblur='calculaTempo()' required onkeypress='mascara(this)'>"; // onchange='calculaTempo()' onkeyup='calculaTempo()'
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <input type='text' name='duracao' id='duracao' class='form-control' style='width: 80px;' readonly='readonly' required>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <input type='text' name='nivel' id='nivel' class='form-control' style='width: 80px;' required>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <input type='text' name='bonus' id='bonus' class='form-control' style='width: 80px;' required>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <input type='text' name='periodo' id='periodo' class='form-control' style='width: 150px;' readonly='readonly' required>";
            echo "                  </td>";
            echo "              </tr>";
            echo "              <tr>";
            echo "                  <td colspan='9'>";
            echo "                      <input type='hidden' id='codusuario' name='codusuario' value='".$_SESSION['idusuario']."'";
            echo "                  </td>";
            echo "              </tr>";
            echo "              <tr>";
            echo "                  <td colspan='9' style='text-align: right;'>";
            echo "                      <a href='inicio.php' class='btn btn-default'>Cancelar</a> ";
            echo "                      <button class='btn btn-primary' type='submit' style='width: 80px;'>Salvar</button>";
            echo "                  </td>";
            echo "              </tr>";
            echo "              <tr>";
            echo "                  <td colspan='9'>";
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
                $a->writeLog($_SESSION['usuario'], "Inclusão de Meditação.", "../controller/");
                $this->verificaPP();
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
                        $a->writeLog($_SESSION['usuario'], "Exclusão de Meditação.", "../controller/");
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
