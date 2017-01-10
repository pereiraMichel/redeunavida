<?php


/**
 * PP do Preenchimento 2
 *
 * @author Debug
 */
class ppPortais {
    
    private $idportal;
    private $diaAnoRuv;
    private $diaRuv;
    private $semana;
    private $sonho;
    private $compSonho;
    private $corpo;
    private $retrospectiva;
    private $compRetrospectiva;
    private $bonus;
    private $codusuario;
    private $dataRegistro;
    
    function getDataRegistro() {
        return $this->dataRegistro;
    }

    function setDataRegistro($dataRegistro) {
        $this->dataRegistro = $dataRegistro;
    }
    
    function getIdportal() {
        return $this->idportal;
    }

    function getDiaAnoRuv() {
        return $this->diaAnoRuv;
    }

    function getDiaRuv() {
        return $this->diaRuv;
    }

    function getSemana() {
        return $this->semana;
    }

    function getSonho() {
        return $this->sonho;
    }

    function getCompSonho() {
        return $this->compSonho;
    }

    function getCorpo() {
        return $this->corpo;
    }

    function getRetrospectiva() {
        return $this->retrospectiva;
    }

    function getCompRetrospectiva() {
        return $this->compRetrospectiva;
    }

    function getBonus() {
        return $this->bonus;
    }

    function getCodusuario() {
        return $this->codusuario;
    }

    function setIdportal($idportal) {
        $this->idportal = $idportal;
    }

    function setDiaAnoRuv($diaAnoRuv) {
        $this->diaAnoRuv = $diaAnoRuv;
    }

    function setDiaRuv($diaRuv) {
        $this->diaRuv = $diaRuv;
    }

    function setSemana($semana) {
        $this->semana = $semana;
    }

    function setSonho($sonho) {
        $this->sonho = $sonho;
    }

    function setCompSonho($compSonho) {
        $this->compSonho = $compSonho;
    }

    function setCorpo($corpo) {
        $this->corpo = $corpo;
    }

    function setRetrospectiva($retrospectiva) {
        $this->retrospectiva = $retrospectiva;
    }

    function setCompRetrospectiva($compRetrospectiva) {
        $this->compRetrospectiva = $compRetrospectiva;
    }

    function setBonus($bonus) {
        $this->bonus = $bonus;
    }

    function setCodusuario($codusuario) {
        $this->codusuario = $codusuario;
    }

    public function telaPortais(){
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
            
            echo "<form name='formMeditacao' action='inicio.php?m=pp&tab=portal' method='post'>";
            $this->portaisCheck();
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
            echo "                      <label>Sonho</label>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <label>Completação</label>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <label>Corpo</label>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <label>Retrospectiva</label>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <label>Completação</label>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <label>Bônus</label>";
            echo "                  </td>";
            echo "              </tr>";
            echo "              <tr style='text-align: center;'>";
            echo "                  <td>";
            echo "                      <input type='text' name='dataPortalHoje' id='dataPortalHoje' value='".date('d/m/Y')."' class='form-control' style='width: 100px;' $desativaData>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <input type='text' name='semana' id='semana' class='form-control' value='".  $this->diaAnoRuv."-".$this->semana."' style='width: 80px;'>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <input type='text' name='dia' id='dia' class='form-control' value='".$this->diaRuv."' style='width: 50px;'>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <select class='form-control' name='sonho'>";
            echo "                          <option value=''>&nbsp;</option>";
            echo "                          <option value='Sim'>Sim</option>";
            echo "                          <option value='Não'>Não</option>";
            echo "                      </select>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <select class='form-control' name='compSonho'>";
            echo "                          <option value=''>&nbsp;</option>";
            echo "                          <option value='Sim'>Sim</option>";
            echo "                          <option value='Não'>Não</option>";
            echo "                      </select>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <select class='form-control' name='corpo' onchange='calculaBonusPortal(this.value)'>";
            echo "                          <option value=''>&nbsp;</option>";
            echo "                          <option value='1'>Nenhum</option>";
            echo "                          <option value='2'>Abaixo de 20 min</option>";
            echo "                          <option value='3'>Maior ou igual a 20 min e menor que 40 min</option>";
            echo "                          <option value='4'>Acima de 40 min</option>";
            echo "                      </select>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <select class='form-control' name='retrospectiva'>";
            echo "                          <option value=''>&nbsp;</option>";
            echo "                          <option value='Sim'>Sim</option>";
            echo "                          <option value='Não'>Não</option>";
            echo "                      </select>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <select class='form-control' name='compRetrospectiva'>";
            echo "                          <option value=''>&nbsp;</option>";
            echo "                          <option value='Sim'>Sim</option>";
            echo "                          <option value='Não'>Não</option>";
            echo "                      </select>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <input type='text' name='bonusPortais' id='bonusPortais' class='form-control' style='width: 150px;' readonly='readonly'>";
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
//            $novoNivel = str_replace(",",".", filter_input(INPUT_POST, 'nivel'));
            $dataConvertida = implode("-", array_reverse(explode("/", filter_input(INPUT_POST, 'dataPortalHoje'))));

            $this->dataRegistro = addslashes($dataConvertida);
            $this->diaAnoRuv = addslashes(filter_input(INPUT_POST, 'diaAnoRuv'));
            $this->diaRuv = addslashes(filter_input(INPUT_POST, 'diaRuv'));
            $this->semana = addslashes(filter_input(INPUT_POST, 'semana'));
            $this->sonho = addslashes(filter_input(INPUT_POST, 'sonho'));
            $this->compSonho = addslashes(filter_input(INPUT_POST, 'compSonho'));
            $this->corpo = addslashes(filter_input(INPUT_POST, 'corpo'));
            $this->retrospectiva = addslashes(filter_input(INPUT_POST, 'retrospectiva'));
            $this->compRetrospectiva = addslashes(filter_input(INPUT_POST, 'compRetrospectiva'));
            $this->bonus = addslashes(filter_input(INPUT_POST, 'bonus'));
            $this->codusuario = addslashes(filter_input(INPUT_POST, 'codusuario'));
            
            $this->novoPortal();
        }
        
    }

    
    public function novoPortal(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $this->idportal = ultimoId::ultimoIdBanco("idportal", "portal");
        
        $sqlInserePortal = "INSERT INTO portal (idportal, diaAnoRuv, diaRuv, semana, sonho, compSonho, corpo, retrospectiva, compRetrospectiva, bonus, codusuario, dataRegistro) 
                        VALUES (".$this->idportal.", ".$this->diaAnoRuv.", ".$this->diaRuv.", '".$this->semana."', '".$this->sonho."', '".$this->compSonho."', '".$this->retrospectiva."', '".$this->compRetrospectiva."', ".$this->bonus.", ".$this->codusuario.", '".$this->dataRegistro."')";
        echo $sqlInserePortal."<br>";
        try{
            $resultadoInserePortal = mysql_query($sqlInserePortal) or die ("Erro comando SQL (Inclusão Portal). Descrição: ".mysql_error());
            if($resultadoInserePortal){
//                echo "<meta http-equiv='refresh' content='0;url=inicio.php?m=pp&tab=portal&msg=s'>";
//                return true;
            }else{
//                echo "<meta http-equiv='refresh' content='0;url=inicio.php?m=pp&tab=portal&msg=n'>";
                echo "Houve um erro.<br>";
                echo $resultadoInserePortal."<br>";
            }
//            return false;
        } catch (Exception $ex) {
            echo "Chamada de exception ativada. Não foi possível inserir. Exepction: ".$ex->getMessage();
        }
        
        
    }
    
    public function excluiPortal(){
        $e = filter_input(INPUT_GET, 'e');
        $id = filter_input(INPUT_GET, 'id');
        
        if($e === "s"){
            $conecta = new conectaBanco();
            $conecta->conecta();
            
            $sqlDeletaPP = "DELETE FROM portal WHERE idportal=".$id;
            
            try{
                
                $resultadoDeletaPP = mysql_query($sqlDeletaPP) or die ("Erro no comando de exclusão. Descrição: ".mysql_error());
                
                if($resultadoDeletaPortal){
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

    public function portaisCheck(){
        
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
            echo "              <input type='checkbox' name='checkData' id='checkData' $dataMarcada onclick='confereCheckPortais()'> Data";
            echo "          </td>";
            echo "      </tr>";
            echo "      <tr>";
            echo "          <td colspan='6'>";
            echo "              &nbsp;";
            echo "          </td>";
            echo "      </tr>";
            echo "  </table>";
            echo "</div>";
            echo "      <p style='height: 20px;'>&nbsp;</p>";
        
    }

    
}
