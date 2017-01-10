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
        
        $sqlVerificaPP = "SELECT COUNT(idpp) as quantidade FROM pp WHERE codusuario = ".$this->codusuario." AND paragem = '".$this->paragem."'";
        $sqlVerificaPeriodo = "SELECT periodo FROM pp WHERE codusuario = ".$this->codusuario." AND paragem = '".$this->paragem."'";
        
//        echo $sqlVerificaPP;
        try{
            $resultadoVerificaPP = mysql_query($sqlVerificaPP) or die ("Comando SQL não executado. Erro: ".mysql_error());
            $resultadoVerificaPeriodo = mysql_query($sqlVerificaPeriodo) or die ("Comando SQL não executado (Consulta período). Erro: ".mysql_error());
            
            $dadosQuantidade = mysql_fetch_array($resultadoVerificaPP);
            $dadosPeriodo = mysql_fetch_array($resultadoVerificaPeriodo);
            
            if($dadosQuantidade['quantidade'] > 4){
                echo "<label class='alert alert-danger'>Não é possível incluir mais de 4 lançamentos para esta semana. Se necessário, exclua um e insira outro.</label>";
                
            }else if($dadosPeriodo['periodo'] === $this->periodo){
                echo "<label class='alert alert-danger'>O período da ".$this->periodo." já foi cadastrado. Por favor, preencha outro ou exclua o recente.</label>";
                
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
        
        $sqlInserePP = "INSERT INTO pp (idpp, diaAnoRuv, diaRuv, paragem, dataRegistro, duracao, nivel, bonus, periodo, inicio, termino, codusuario) 
                        VALUES (".$this->idpp.", ".$this->diaAnoRuv.", ".$this->diaRuv.", '".$this->paragem."', '".$this->dataRegistro."', ".$this->duracao.", ".$this->nivel.", ".$this->bonus.", '".$this->periodo."', '".$this->inicio."', '".$this->termino."', ".$this->codusuario.")";
//        echo $sqlInserePP."<br>";
        try{
            $resultadoInserePP = mysql_query($sqlInserePP) or die ("Erro comando SQL (Inclusão PP). Descrição: ".mysql_error());
            if($resultadoInserePP){
                echo "<label class='alert alert-success'>Salvo com sucesso!</label>";
                echo "<meta http-equiv='refresh' content='3;url=inicio.php?m=pp&tab=med'>";
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
                return true;
            }
            return false;
        } catch (Exception $ex) {
            echo "Chamada de exception ativada. Não foi possível alterar. Exepction: ".$ex->getMessage();
        }
        
        
    }

    public function telaPP(){
            
        $tab = filter_input(INPUT_GET, 'tab');
        
            echo "  <p style='height: 20px;'>&nbsp;</p>";
            echo "<div class='col-sm-12'>";
            echo "  <div class='btn-group'>";
//            echo "  <ul class='nav nav-tabs' role='tablist'>";
//            echo "      <li role='presentation'>";
            echo "          <a href='inicio.php?m=pp&tab=meditacao' class='btn btn-default' style='width: 90px;'>";// aria-controls='meditacao' role='tab' data-toggle='tab'
            echo "              Meditação";
            echo "          </a>";
//            echo "      </li>";
//            echo "      <li role='presentation'>";
            echo "          <a href='inicio.php?m=pp&tab=portais' class='btn btn-default' style='width: 90px;'>";
            echo "              Portais";
            echo "          </a>";
//            echo "      </li>";
//            echo "      <li role='presentation'>";
            echo "          <a href='inicio.php?m=pp&tab=registros' class='btn btn-default' style='width: 90px;'>";
            echo "              Registros";
            echo "          </a>";
//            echo "      </li>";
//            echo "      <li role='presentation'>";
            echo "          <a href='inicio.php?m=pp&tab=bonus' class='btn btn-default' style='width: 90px;'>";
            echo "              Bônus";
            echo "          </a>";
//            echo "      </li>";
//            echo "  </ul>";
            echo "  </div>";
            echo "  <p style='height: 20px;'>&nbsp;</p>";
//            echo "  <div class='tab-content' style='text-align: justify;'>";
            
            switch ($tab){
                default:
                    echo "<div id='meditacao'>";
                    $this->telaMeditacao();
                    echo "</div>";
                    break;
                    
                case "portais":
                    echo "<div id='portais'>";
                    $portais = new ppPortais();
                    $portais->setDiaAnoRuv($this->diaAnoRuv);
                    $portais->setDiaRuv($this->diaRuv);
                    $portais->setSemana($this->paragem);
                    $portais->setCodusuario($this->codusuario);
                    $portais->telaPortais();
                    echo "</div>";
                    break;
                
                case "registros":
                    $this->telaRegistros();
                    break;

                    
            }
//            echo "  <div class='tab-content' style='text-align: justify;'>";
//            echo "      <div role='tabpanel' class='tab-pane fade' id='meditacao'>";
////            echo "          Meditação";
//                            $this->telaMeditacao();
//            echo "      </div>";
//            echo "      <div role='tabpanel' class='tab-pane fade' id='portais'>";
////            echo "          Portais";
////            if($tab === "portais"){
//                $portais = new ppPortais();
//                $portais->setDiaAnoRuv($this->diaAnoRuv);
//                $portais->setDiaRuv($this->diaRuv);
//                $portais->setSemana($this->paragem);
//                $portais->setCodusuario($this->codusuario);
//                $portais->telaPortais();
////            }
//            echo "      </div>";
//            echo "      <div role='tabpanel' class='tab-pane fade' id='registro'>";
////            echo "          Registro";
//                            $this->telaRegistros();
//            echo "      </div>";
//            echo "      <div role='tabpanel' class='tab-pane fade' id='tabbonus'>";
////            echo "          Bônus";
//                            $this->telaBonus();
//            echo "      </div>";
//            echo "  </div>";//fecha o tab-content
//            echo "  <p style='height: 20px;'>&nbsp;</p>";
            echo "</div>";//fecha o col-sm-12
            
            echo "<div class='col-sm-12'>";
            
//            $tab = filter_input(INPUT_GET, 'tab');
//            $mens = filter_input(INPUT_GET, 'msg');
//            $tabela = null;
//            if($tab === "portal"){
//                $tabela = "Portal";
//            }else if($tab === "medit"){
//                $tabela = "Meditação";
//            }
            
//            if($mens === "s"){
//                echo "<label class='alert alert-success'>".$tabela." salvo com sucesso!</label>";
//                echo "<meta http-equiv='refresh' content='3;url=inicio.php?m=pp'>";
//            }else if($mens === "n"){
//                echo "<label class='alert alert-danger'>Ocorreu um erro ao salvar ".$tabela."</label>";
//                echo "<meta http-equiv='refresh' content='3;url=inicio.php?m=pp'>";
//            }
            
            echo "</div>";
            
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
            echo "<div class='col-sm-7'>";
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
            echo "<div class='col-sm-5'>";
            echo "  <div class='col-sm-3'>";
            $conecta = new conectaBanco();
            $conecta->conecta();

            $sqlTotal = "SELECT SUM(bonus) AS total FROM pp WHERE codusuario = ".$this->codusuario." AND paragem = ".$this->paragem;

            try{
                $resultadoTotal = mysql_query($sqlTotal) or die("Problemas no comando SQL, de consulta total. Descrição: ".mysql_error());

                $dadosPPTotal = mysql_fetch_array($resultadoTotal);

            echo "      <label>";
            echo "          Total Bônus: ".$dadosPPTotal['total'];
            echo "      </label>";
            echo "  </div>";
            echo "  <div class='col-sm-2'>";
            echo "      <label>";
            echo "          Percentual: ";
            echo "      </label>";
            echo "  </div>";

            } catch (Exception $ex) {
                echo "Exception ativado. Descrição: ".$ex->getMessage();
            }
            echo "</div>";
            echo "      <p style='height: 20px;'>&nbsp;</p>";
        
    }
    
    public function telaRegistros(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        $sqlPP = "SELECT *, DATE_FORMAT(`dataRegistro`, '%d/%c/%Y') AS dataInclusao FROM pp WHERE codusuario = ".$this->codusuario;
        
//        echo $sqlPP;
        echo "<div class='col-sm-12'>";
        echo "<label>Meditação</label>";
        
        try{
            $resultadoPP = mysql_query($sqlPP) or die("Erro na execução do comando SQL de consulta PP. Descrição: ".mysql_error());
            
            echo "<div class='col-sm-12'>";
            
            if(mysql_num_rows($resultadoPP) > 0){
                echo "<table class='table table-striped'>";
            echo "              <tr>";
            echo "                  <td>";
            echo "                      <label>Data</label>";
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
            echo "                  <td>";
            echo "                      <label>&nbsp;</label>";
            echo "                  </td>";
            echo "              </tr>";
                while($dadosPP = mysql_fetch_array($resultadoPP)){
                    echo "  <tr>";
                    echo "      <td>";
                    echo            $dadosPP['dataInclusao'];
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
                    echo "      <a href='inicio.php?m=pp&tab=med&e=s&id=".$idpp."' alt='Excluir' title='Excluir'>";
                    echo "          <img src='../../images/botaoexcluir.png' id='excluir' title='Excluir'>";
                    echo "      </a>";
                    echo "      <input type='hidden' name='idpp' id='idpp' value='".$idpp."'>";
                    echo "      </td>";
                    echo "  </tr>";
                }
                echo "</table>";


            }else{
                echo "<label class='alert alert-warning' style='text-align: center;'>Ops! Sem meditação a mostrar.</label><br>";
            }
            
            echo "</div>";
            $this->excluirMeditacao();
        } catch (Exception $ex) {
            echo "Chamada de exception. Descrição: ".$ex->getMessage();
        }
        echo "</div>";
        echo "<div class='col-sm-12'>";
        echo "  <label>Portais</label>";
        echo "</div>";
    }
    
    public function telaMeditacao(){

        $conecta = new conectaBanco();
        $conecta->conecta();
        $tar = filter_input(INPUT_GET, "t");
            
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
            
            echo "<form name='formMeditacao' action='inicio.php?m=pp' method='post'>";
//            $this->meditacaoBotao();
            $this->meditacaoCheck();
            echo "          <table class='table'>";
            echo "              <tr>";
            echo "                  <td>";
            echo "                      <label>Data</label>";
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
            echo "                      <input type='text' name='dataHoje' id='dataHoje' value='".date('d/m/Y')."' class='form-control' style='width: 100px;' $desativaData>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <input type='text' name='semana' id='semana' class='form-control' value='".$this->diaAnoRuv."-".$this->paragem."' style='width: 80px;'>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <input type='text' name='dia' id='dia' class='form-control' value='".$this->diaRuv."' style='width: 50px;'>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <input type='time' name='inicio' id='inicio' class='form-control' $marcaInicio>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <input type='time' name='termino' id='termino' class='form-control' onblur='calculaTempo()' onchange='calculaTempo()' onkeyup='calculaTempo()'>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <input type='text' name='duracao' id='duracao' class='form-control' style='width: 80px;' readonly='readonly'>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <input type='text' name='nivel' id='nivel' class='form-control' style='width: 80px;'>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <input type='text' name='bonus' id='bonus' class='form-control' style='width: 80px;'>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <input type='text' name='periodo' id='periodo' class='form-control' style='width: 150px;' readonly='readonly'>";
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
            echo "                      <div id='erro1' name='erro1' class='alert alert-danger' style='display: none;'>Hora do Início superior a Hora do Término</div>";
            echo "                      <div id='erro1' name='erro2' class='alert alert-danger' style='display: none;'>Não é permitido duração acima de 1 hora</div>";
            echo "                  </td>";
            echo "              </tr>";
            echo "          </table>";
            echo "</form>";

        if($_POST){
            $novoNivel = str_replace(",",".", filter_input(INPUT_POST, 'nivel'));
            $dataConvertida = implode("-", array_reverse(explode("/", filter_input(INPUT_POST, 'dataHoje'))));

            $this->dataRegistro = addslashes($dataConvertida);
            $this->paragem = addslashes(filter_input(INPUT_POST, 'semana'));
            $this->duracao = addslashes(filter_input(INPUT_POST, 'duracao'));
            $this->nivel = addslashes($novoNivel);
            $this->bonus = addslashes(filter_input(INPUT_POST, 'bonus'));
            $this->periodo = addslashes(filter_input(INPUT_POST, 'periodo'));
            $this->inicio = addslashes(filter_input(INPUT_POST, 'inicio'));
            $this->termino = addslashes(filter_input(INPUT_POST, 'termino'));
            $this->codusuario = addslashes(filter_input(INPUT_POST, 'codusuario'));
            
            $this->verificaPP();
        }
        
    }
    
    public function excluirMeditacao(){
        $e = filter_input(INPUT_GET, 'e');
        $id = filter_input(INPUT_GET, 'id');
        
        if($e === "s"){
            $conecta = new conectaBanco();
            $conecta->conecta();
            
            $sqlDeletaPP = "DELETE FROM pp WHERE idpp=".$id;
            
            try{
                
                $resultadoDeletaPP = mysql_query($sqlDeletaPP) or die ("Erro no comando de exclusão. Descrição: ".mysql_error());
                
                if($resultadoDeletaPP){
                    echo "<label class='alert alert-success'>Excluído com sucesso!</label>";
                    echo "<meta http-equiv='refresh' content='3;url=inicio.php?m=pp'>";
                }else{
                    echo "<label class='alert alert-success'>Excluído com sucesso!</label>";
                }
                
            } catch (Exception $ex) {
                echo "Exception acionado. Descrição: ".$ex->getMessage();
            }
            
        }
        
    }

    public function telaBonus(){
        
    }
    

    
    public function telaNovoPP(){
        
        $auto = filter_input(INPUT_GET, 'auto');
        
        if($auto){
            $data = $this->dataRegistro;
            $anoRuv = $this->diaAnoRuv;
            $semanaRuv = $this->paragem;
            $diaRuv = $this->diaRuv;
            $check = "checked='true'";
        }else{
            $data = "";
            $anoRuv = "";
            $semanaRuv = "";
            $diaRuv = "";
            $check = "";
        }
        
        echo "<form name='formNovoPP' class='form-horizontal' action='inicio.php?m=pp&t=npp' method='post'>";
        echo "  <div class='form-group'>";
        echo "      <label class='col-sm-2 control-label'>";
        echo "          Data";
        echo "      </label>";
        echo "      <div class='col-sm-2'>";
        echo "          <input type='text' name='data' id='data' class='form-control' value='$data'>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='form-group'>";
        echo "      <label class='col-sm-2 control-label'>";
        echo "          Ano-RUV";
        echo "      </label>";
        echo "      <div class='col-sm-2'>";
        echo "          <input type='text' name='diaAnoRuv' id='diaAnoRuv' class='form-control' value='$anoRuv'>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='form-group'>";
        echo "      <label class='col-sm-2 control-label'>";
        echo "          Semana-RUV";
        echo "      </label>";
        echo "      <div class='col-sm-2'>";
        echo "          <input type='text' name='paragem' id='paragem' class='form-control' value='$semanaRuv'>";// value='".$this->paragem."'
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='form-group'>";
        echo "      <label class='col-sm-2 control-label'>";
        echo "          Dia-RUV";
        echo "      </label>";
        echo "      <div class='col-sm-2'>";
        echo "          <input type='text' name='diaRuv' id='diaRuv' class='form-control' value='$diaRuv'>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='form-group'>";
        echo "      <label class='col-sm-3 control-label'>";
        echo "          Preencher tudo automaticamente <input type='checkbox' name='checkPP' id='checkPP' $check onclick='javascript: direcPP();'>";
        echo "      </label>";
        echo "      <div class='col-sm-2'>";
        echo "          &nbsp;";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='form-group'>";
        echo "      <label class='col-sm-2 control-label'>";
        echo "          &nbsp;";
        echo "      </label>";
        echo "      <div class='col-sm-2'>";
        
        echo "          <input type='hidden' name='codusuario' id='codusuario' class='form-control' placeholder='".$_SESSION['idusuario']."'>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='form-group'>";
        echo "      <div class='col-sm-10' style='text-align: center;'>";
        echo "          <a href='inicio.php?m=pp' class='btn btn-default'>Cancelar</a>";
        echo "          <button class='btn btn-primary' type='submit'>Salvar</button>";
        echo "      </div>";
        echo "  </div>";
        echo "</form>";
        
        if($_POST){

            $data = addslashes($_POST['data']);
            $anoruv = addslashes($_POST['diaAnoRuv']);
            $semana = addslashes($_POST['paragem']);
            $diaruv = addslashes($_POST['diaRuv']);
            $codusuario = addslashes($_SESSION['idusuario']);
            
            $this->setDataRegistro($data);
            $this->setDiaAnoRuv($anoruv);
            $this->setDiaRuv($diaruv);
            $this->setParagem($semana);
            $this->setCodusuario($codusuario);
            
            $this->incluiPP();
            
        }
        
    }
    
    //put your code here
}
