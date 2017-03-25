<?php


/**
 * Description of ParagemPresenca
 *
 * @author Michel Pereira
 */
class ParagemPresenca {

    private $idpresparagem;
    private $dataRuv;
    private $semanaRuv;
    private $pp;
    private $status;
    private $bonus;
    private $dataRegistro;
    private $codusuario;
    private $diaRuv;

    function getDiaRuv(){
        return $this->diaRuv;
    }

    function setDiaRuv($diaruv){
        $this->diaRuv = $diaruv;
    }

    function getIdpresparagem() {
        return $this->idpresparagem;
    }

    function getDataRuv() {
        return $this->dataRuv;
    }

    function getSemanaRuv() {
        return $this->semanaRuv;
    }

    function getPp() {
        return $this->pp;
    }

    function getStatus() {
        return $this->status;
    }

    function getBonus() {
        return $this->bonus;
    }

    function getDataRegistro() {
        return $this->dataRegistro;
    }

    function getCodusuario() {
        return $this->codusuario;
    }

    function setIdpresparagem($idpresparagem) {
        $this->idpresparagem = $idpresparagem;
    }

    function setDataRuv($dataRuv) {
        $this->dataRuv = $dataRuv;
    }

    function setSemanaRuv($semanaRuv) {
        $this->semanaRuv = $semanaRuv;
    }

    function setPp($pp) {
        $this->pp = $pp;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setBonus($bonus) {
        $this->bonus = $bonus;
    }

    function setDataRegistro($dataRegistro) {
        $this->dataRegistro = $dataRegistro;
    }

    function setCodusuario($codusuario) {
        $this->codusuario = $codusuario;
    }

    public function telaInicialPresencaParagem(){
        $tab = filter_input(INPUT_GET, 'tab');
        
        switch($tab){
            default :
                $ppActive = "class = 'active'";
                $regActive = "";
                $bonusActive = "";

                $pp = "btn-primary";
                $reg = "btn-default";
                $bns = "btn-default";
                break;
                
            case "prespara":
                $ppActive = "class = 'active'";
                $regActive = "";
                $bonusActive = "";

                $pp = "btn-primary";
                $reg = "btn-default";
                $bns = "btn-default";
                break;
            
            case "registros":
                $ppActive = "";
                $regActive = "class = 'active'";
                $bonusActive = "";

                $pp = "btn-default";
                $reg = "btn-primary";
                $bns = "btn-default";
                break;
            
            case "bonus":
                $ppActive = "";
                $regActive = "";
                $bonusActive = "class = 'active'";

                $pp = "btn-default";
                $reg = "btn-default";
                $bns = "btn-primary";
                break;
                
        }
            echo "<p style='height: 20px;'>&nbsp;</p>";
            echo "<div class='col-sm-12'>";
            echo "  <div class='btn-group btn-group-justified' role='group'>";
            echo "          <a href='inicio.php?m=para' class='btn $pp' style='width: 90px;'>";
            echo "              Presença-Paragem";
            echo "          </a>";
            echo "          <a href='inicio.php?m=para&tab=registros' class='btn $reg' style='width: 90px;'>";
            echo "              Registros";
            echo "          </a>";
            echo "          <a href='inicio.php?m=para&tab=bonus' class='btn $bns' style='width: 90px;'>";
            echo "              Bônus";
            echo "          </a>";
            echo "  </div>";
            echo "  <p style='height: 20px;'>&nbsp;</p>";
            
            switch ($tab){
                default:
                    echo "<div id='prespara'>";
                    $this->telaNovaParagemPresenca();
                    echo "</div>";
                    break;

                case "registros":
                    $this->registroPresencaParagem();
                    break;

                case "bonus":
                    clearstatcache();
                    $b = new bonus();
                    $b->setCodusuario($this->codusuario);
                    $b->telaBonusPresParagem();
                    break;
                    
            }
            echo "</div>";//fecha o col-sm-12
    }

        
    public function insereParPres(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $this->idParPre = ultimoId::ultimoIdBanco("idpresparagem", "presparagem");
        
        $sqlInsereParPres = "INSERT INTO presparagem 
                             (idpresparagem, dataRuv, semanaRuv, pp, status, bonus, dataRegistro, codUsuario) 
                             VALUES
                             (".$this->idParPre.", '".$this->dataRuv."', '".$this->semanaRuv."', ".$this->pp.", '".$this->status."', ".$this->bonus.", '".$this->dataRegistro."', ".$this->codusuario." )";
        
//        echo $sqlInsereParPres."<br>";
        
        try{
            
            $resultadoInsereParPres = mysql_query($sqlInsereParPres) or die("Problemas de inserir, no comando SQL. Erro: ".mysql_error());
            
            if($resultadoInsereParPres){
                //return true;
                echo "<label class='alert alert-success'>Incluso com sucesso!</label>";
                echo "<meta http-equiv='refresh' url='3;inicio.php?m=para'>";

            }
            return false;
        } catch (Exception $ex) {
            echo "Exception ativado (Inserir Paragem-Presença). Erro: ".$ex->getMessage();
        }
        
    }
    public function excluiParPres(){
        
        $conecta = new conectaBanco();
        $conecta->conecta();

        $id = filter_input(INPUT_GET, 'id');

        if(!empty($id)){

            $sqlExcluiParPres = "DELETE FROM presparagem WHERE idpresparagem = ".$id;

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
    
    public function registroPresencaParagem(){
        
        $conecta = new conectaBanco();
        $conecta->conecta();
        $sqlTelaPP = "  SELECT p.*, DATE_FORMAT(p.dataRuv, '%d/%m/%Y') as dataRuvFormat, t.descricao FROM presparagem p 
                        INNER JOIN tabpresparagem t ON p.pp = t.idtabpresparagem 
                        WHERE p.codUsuario = ".$this->codusuario;
        
        $sqlSomaTotal = "SELECT SUM(bonus) AS totalGeral FROM presparagem WHERE codUsuario = ".$this->codusuario."";
        
        try{
//            echo "SQL consulta paragem: ".$sqlTelaPP."<br>";
            $resultadoTelaParagem = mysql_query($sqlTelaPP) or die("Erro na execução do comando SQL de consulta paragem. Descrição: ".mysql_error());


//            $resultadoSomaTotal = mysql_query($sqlSomaTotal) or die("Erro na execução do comando SQL do valor total. Descrição: ".mysql_error());
//           $dadosValorTotal = mysql_fetch_array($resultadoSomaTotal);//pega o valor total da sql 2
           
//           $percentual = $dadosValorTotal['totalGeral']/(18*11.5);
//           $p = $percentual * 100;
           
            echo "<div class='col-sm-12'>";
//            echo "<p style='height: 0px;'>&nbsp;</p>";
            if(mysql_num_rows($resultadoTelaParagem) > 0){
/*            echo "<div class='col-sm-4'>";
            echo "  <label>Total Geral: ".$dadosValorTotal['totalGeral']."</label>";
            echo "</div>";
            echo "<div class='col-sm-4'>";
            echo "  <label>Percentual: ".number_format($p, 2, ",", ".")."%"."</label>";
            echo "</div>";
            echo "<div class='col-sm-4'>";
            echo "  <label>&nbsp;</label>";
            echo "</div>";*/
            echo "<p style='height: 10px;'>&nbsp;</p>";
                echo "<table class='table'>";
                echo "  <tr>";
                echo "      <td>";
                echo "          Data RUV";
                echo "      </td>";
                echo "      <td>";
                echo "          Semana RUV";
                echo "      </td>";
                echo "      <td>";
                echo "          Presença-Paragem";
                echo "      </td>";
                echo "      <td>";
                echo "          Status";
                echo "      </td>";
                echo "      <td>";
                echo "          Bônus";
                echo "      </td>";
                echo "      <td>";
                echo "          &nbsp;";
                echo "      </td>";
                echo "  </tr>";
                while($dadosPP = mysql_fetch_array($resultadoTelaParagem)){
                    echo "  <tr>";
                    echo "      <td>";
                    echo            $dadosPP['dataRuvFormat'];
                    echo "      </td>";
                    echo "      <td>";
                    echo            $dadosPP['semanaRuv'];
                    echo "      </td>";
                    echo "      <td>";
                    echo            $dadosPP['descricao'];
                    echo "      </td>";
                    echo "      <td>";
                    echo            $dadosPP['status'];
                    echo "      </td>";
                    echo "      <td>";
                    echo            $dadosPP['bonus'];
                    echo "      </td>";
                    echo "      <td>";
                    $idpresparagem = $dadosPP['idpresparagem'];
                    echo "      <a href='inicio.php?m=para&tab=registros&e=s&id=".$idpresparagem."' alt='Excluir' title='Excluir'>";
                    echo "          <img src='../../images/botaoexcluir.png' id='excluir' title='Excluir'>";
                    echo "      </a>";
                    echo "      <input type='hidden' name='idpresparagem' id='idpresparagem' value='".$idpresparagem."'>";
                    echo "      </td>";
                    echo "  </tr>";
                }
                echo "</table>";
                //echo "<a class='btn btn-default' href='inicio.php'>Voltar</a>";
            }else{
                echo "<label><h3>Ops!</h3> Não localizamos a sua paragem-presença. Vamos preencher?</label><br>";
                echo "<div style='height: 40px;'>&nbsp;</div>";
                echo "  <a class='btn btn-default' style='width: 80px;' href='inicio.php?m=para'>";
                echo "      Vamos !";
                echo "  </a>";
                echo "  <a class='btn btn-default' style='width: 80px;' href='inicio.php'>";
                echo "      Depois";
                echo "  </a>";
            }
            
            echo "</div>";
            
        } catch (Exception $ex) {
            echo "Chamada de exception. Descrição: ".$ex->getMessage();
        }

        if($this->excluiParPres()){
            echo "<br><br>";
            echo "<label class='alert alert-success'>Excluído com sucesso!.</label>";
            echo "<meta http-equiv='refresh' content='1;url=inicio.php?m=para&tab=registros'>";
        }

        echo "</div>";//fecha a div col-sm-12
        
    }
    
    public function telaNovaParagemPresenca(){

        $con = new conectaBanco();
        $con->conecta();

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

            echo "<form name='formTarefas' action='inicio.php?m=para' method='post'>";
            echo "          <table class='table' style='text-align: justify; border: none;'>";
            echo "              <tr>";
            echo "                  <td width='30'>";
            echo "                      <label>Data RUV</label>";
            echo "                  </td>";
            echo "                  <td width='100'>";
            echo "                      <input type='text' name='dataRuv' id='dataRuv' value='".$this->dataRuv."' class='form-control' style='width: 120px;' $desativaData placeholder='DD/MM/AAAA' required onchange='preencheDataRuv(this.value, \"dataRuv\" )' onkeypress='mascaraData(this)'>";
            echo "                      <input type='hidden' name='dataHoje' id='dataHoje' value='".date('d/m/Y')."' class='form-control' style='width: 120px;' $desativaData placeholder='DD/MM/AAAA' required>";

            echo "                  </td>";
            echo "                  <td width='30'>";
            echo "                      <label>Semana RUV</label>";
            echo "                  </td>";
            echo "                  <td width='100'>";
            echo "                      <input type='text' name='semana' id='semana' class='form-control' value='".$this->semanaRuv."' style='width: 80px;' required onchange='preencheDataRuv(this.value, \"semana\")' onkeypress='mascaraSemana(this)'>";
            echo "                  </td>";
            echo "                  <td width='20'>";
            echo "                      <label>Dia RUV</label>";
            echo "                  </td>";
            echo "                  <td width='100'>";
            echo "                      <input type='text' name='dia' id='dia' class='form-control' value='".$this->diaRuv."' style='width: 50px;' required onchange='preencheDataRuv(this.value, \"dia\")'>";
            echo "                  </td>";
            echo "              </tr>";

            echo "          </table>";

            echo "          <table class='table' style='text-align: justify;'>";

            echo "              <tr>";
            echo "                  <td>";
            echo "                      <label>Presença-Paragem</label>";
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
            echo "                      <select name='tarefas' class='form-control'>";
            echo "                          <option value=''>Não selecionado</option>";
            echo "                          <option value=''></option>";
           
            try{

                $sqlTabPP = "SELECT * FROM tabpresparagem";

                $resultTabPP = mysql_query($sqlTabPP) or die ("Erro no comando SQL de consulta Tarefas do Sistema. Erro: ".mysql_error());

                if(mysql_num_rows($resultTabPP) > 0){

                    while($dadosTabPP = mysql_fetch_array($resultTabPP)){
                       echo "<option value=".$dadosTabPP['idtabpresparagem'].">".$dadosTabPP['descricao']."</option>";
                    } // fecha while


                } // fecha if mysql_num_rows

            }catch(Exception $ex){
                echo "Exception ativado. Descrição: ".$ex->getMessage();
            }


            echo "                      </select>";
            echo "                  </td>";
            echo "                  <td>";

            echo "                      <input type='radio' name='opcao' value='Sim' onchange='calculaBonusTarefa(this.value)'> Sim   |   ";
            echo "                      <input type='radio' name='opcao' value='Não' onchange='calculaBonusTarefa(this.value)'> Não";
            echo "                  </td>";

            echo "                  <td colspan='3'>";
            echo "                      <input type='text' name='bonus' id='bonus' class='form-control' readonly='readonly' style='width: 80px;' required>";
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
            //$novoNivel = str_replace(",",".", filter_input(INPUT_POST, 'nivel'));
            $dataConvertida = implode("-", array_reverse(explode("/", filter_input(INPUT_POST, 'dataHoje'))));
            $dataRuvConvertida = implode("-", array_reverse(explode("/", filter_input(INPUT_POST, 'dataRuv'))));

            $this->dataRuv = addslashes($dataRuvConvertida);
            $this->semanaRuv = addslashes(filter_input(INPUT_POST, 'semana'));
            $this->pp = addslashes(filter_input(INPUT_POST, 'tarefas'));
            $this->status = addslashes(filter_input(INPUT_POST, 'opcao'));
            $this->bonus = addslashes(filter_input(INPUT_POST, 'bonus'));
            $this->dataRegistro = addslashes($dataConvertida);
            $this->codusuario = addslashes(filter_input(INPUT_POST, 'codusuario'));

            if(empty($this->dataRuv) or empty($this->semanaRuv) or empty($this->pp) or empty($this->status) or empty($this->bonus)){
                echo "<label class='alert alert-danger'>Favor preencher todos os dados.</label>";
            }else{
                $this->insereParPres();
            }
        }
    }
    //put your code here
}
