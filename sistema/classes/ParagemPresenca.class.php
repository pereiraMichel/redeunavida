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
            echo "          <a href='inicio.php?m=prespara' class='btn $pp' style='width: 90px;'>";
            echo "              Presença-Paragem";
            echo "          </a>";
            echo "          <a href='inicio.php?m=prespara&tab=registros' class='btn $reg' style='width: 90px;'>";
            echo "              Registros";
            echo "          </a>";
            echo "          <a href='inicio.php?m=prespara&tab=bonus' class='btn $bns' style='width: 90px;'>";
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
                    $this->telaBonusTarefas();
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
                             (".$this->idpresparagem.", '".$this->dataRuv."', '".$this->semanaRuv."', ".$this->pp.", '".$this->status."', ".$this->bonus.", '".$this->dataRegistro."', ".$this->codusuario." )";
        
//        echo $sqlInsereParPres."<br>";
        
        try{
            
            $resultadoInsereParPres = mysql_query($sqlInsereParPres) or die("Problemas de inserir, no comando SQL. Erro: ".mysql_error());
            
            if($resultadoInsereParPres){
                return true;
            }
            return false;
        } catch (Exception $ex) {
            echo "Exception ativado (Inserir Paragem-Presença). Erro: ".$ex->getMessage();
        }
        
    }
    public function excluiParPres(){
        
        $conecta = new conectaBanco();
        $conecta->conecta();
        $sqlExcluiParPres = "DELETE FROM paragem WHERE idParagem = ".$this->idParPre;
        
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
    
    public function registroPresencaParagem(){
        
        $conecta = new conectaBanco();
        $conecta->conecta();
        $sqlTelaPP = "SELECT * FROM paragem WHERE codUsuario = ".$this->codusuario;
        
        $sqlSomaTotal = "SELECT SUM(total) AS totalGeral FROM paragem WHERE codUsuario = ".$this->codusuario."";
        
        try{
            $resultadoTelaParagem = mysql_query($sqlTelaPP) or die("Erro na execução do comando SQL de consulta paragem. Descrição: ".mysql_error());
            
            $resultadoSomaTotal = mysql_query($sqlSomaTotal) or die("Erro na execução do comando SQL do valor total. Descrição: ".mysql_error());
           $dadosValorTotal = mysql_fetch_array($resultadoSomaTotal);//pega o valor total da sql 2
           
           $percentual = $dadosValorTotal['totalGeral']/(18*11.5);
           $p = $percentual * 100;
           
            echo "<div class='col-sm-12'>";
            echo "<p style='height: 10px;'>&nbsp;</p>";
            if(mysql_num_rows($resultadoTelaParagem) > 0){
            echo "<div class='col-sm-4'>";
            echo "  <label>Total Geral: ".$dadosValorTotal['totalGeral']."</label>";
            echo "</div>";
            echo "<div class='col-sm-4'>";
            echo "  <label>Percentual: ".number_format($p, 2, ",", ".")."%"."</label>";
            echo "</div>";
            echo "<div class='col-sm-4'>";
            echo "  <label>&nbsp;</label>";
            echo "</div>";
            echo "<p style='height: 30px;'>&nbsp;</p>";
                echo "<table class='table'>";
                echo "  <tr>";
                echo "      <td>";
                echo "          Semana";
                echo "      </td>";
                echo "      <td>";
                echo "          Paragem";
                echo "      </td>";
                echo "      <td>";
                echo "          Seleção";
                echo "      </td>";
                echo "      <td>";
                echo "          Total";
                echo "      </td>";
                echo "      <td>";
                echo "          Selecione";
                echo "      </td>";
                echo "  </tr>";
                while($dadosPP = mysql_fetch_array($resultadoTelaParagem)){
                    echo "  <tr>";
                    echo "      <td>";
                    echo            $dadosPP['semana'];
                    echo "      </td>";
                    echo "      <td>";
                    echo            $dadosPP['paragem'];
                    echo "      </td>";
                    echo "      <td>";
                    echo            $dadosPP['selecao'];
                    echo "      </td>";
                    echo "      <td>";
                    echo            $dadosPP['total'];
                    echo "      </td>";
                    echo "      <td>";
                                    $idparagem = $dadosPP['idParagem'];
                    echo "          <input type='radio' name='opcao' value='".$idparagem."' onclick='editaPP(this.value)'>";
                    echo "      </td>";
                    echo "  </tr>";
                }
                echo "</table>";
                echo "<input type='hidden' name='idpp' id='idpp'>";
                echo "<a class='btn btn-primary' href='inicio.php?m=para&t=npar' id='novopp'>Novo PP</a> | ";
                echo "<a class='btn btn-default' href='javascript:pegaPP(".$idparagem.")' id='btEdita' disabled>Editar</a> | ";
                echo "<a class='btn btn-default' href='javascript:pegaPPExcluir(".$idparagem.")' id='btExcluir' disabled>Excluir</a> | ";
                echo "<a class='btn btn-default' href='inicio.php'>Voltar</a>";
                echo "<input type='hidden' id='ppSelecionado' name='ppSelecionado'>";
            }else{
                echo "<label><h3>Ops!</h3> Não localizamos a sua paragem-presença. Vamos preencher?</label><br>";
                echo "<div style='height: 40px;'>&nbsp;</div>";
//                echo "<div class='btn-group' data-toggle='buttons'>";
                echo "  <a class='btn btn-default' style='width: 80px;' href='inicio.php?m=para&t=npar'>";
                echo "      Vamos !";
                echo "  </a>";
                echo "  <a class='btn btn-default' style='width: 80px;' href='inicio.php'>";
                echo "      Depois";
                echo "  </a>";
//                echo "</div>";
            }
            
            echo "</div>";
            
        } catch (Exception $ex) {
            echo "Chamada de exception. Descrição: ".$ex->getMessage();
        }
    }
    
    public function telaNovaParagemPresenca(){

        $con = new conectaBanco();
        $con->conecta();

        $sqlTabPP = "SELECT * FROM tabpp";

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
            echo "                      <input type='text' name='semana' id='semana' class='form-control' value='".$semanaRuv."' style='width: 80px;' required onchange='preencheDataRuv(this.value, \"semana\")'>";
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
            echo "                          <option name=''>Não selecionado</option>";
            echo "                          <option name=''></option>";
            
            try{

                $resultTabPP = mysql_query($sqlTabPP) or die("Erro no comando SQL de consulta Tarefas do Sistema. Erro: ".mysql_error());

                if(mysql_num_rows($resultTabPP) > 0){

                    while($dadosTabPP = mysql_fetch_array($resultTabPP)){
                        echo "<option value=".$dadosTabPP['idtabpp'].">".$dadosTabPP['descricao']."</option>";
                    }


                }

            }catch(Exception $ex){
                echo "Exception ativado. Descrição: ".$ex->getMessage();
            }


            echo "                      </select>";
            echo "                  </td>";
            echo "                  <td>";

            echo "                      <input type='radio' name='opcao' value='sim'> Sim   |   ";
            echo "                      <input type='radio' name='opcao' value='nao'> Não";
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

    public function telaExcluiParPresenca(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $id = filter_input(INPUT_GET, 'id');
        
        $sqlParPre = "SELECT * FROM paragem WHERE idParagem = ".$id;
        
        $resultadoParPre = mysql_query($sqlParPre) or die("Error. Descrição: ".mysql_error());
        
        $dadosParPre = mysql_fetch_array($resultadoParPre);
        
//        echo "Paragem marcada: ".$this->paragem."<br>";
        echo "<form name='formEditParagem' class='form-horizontal' action='inicio.php?m=para&t=exc&id=".$id."' method='post'>";
        echo "  <div class='form-group'>";
        echo "      <label class='col-sm-2 control-label'>";
        echo "          Semana";
        echo "      </label>";
        echo "      <div class='col-sm-2'>";
        echo "          <label>".$dadosParPre['semana']."</label>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='form-group'>";
        echo "      <label class='col-sm-2 control-label'>";
        echo "          Paragem";
        echo "      </label>";
        echo "      <div class='col-sm-2'>";
        echo "          <label>".$dadosParPre['paragem']."</label>";
//        echo "          <input type='checkbox' name='checkparagem' id='checkparagem' onclick='preencheParagem(this.value)'> Automático";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='form-group'>";
        echo "      <label class='col-sm-2 control-label'>";
        echo "          Selecione";
        echo "      </label>";
        echo "      <div class='col-sm-2'>";
//        echo "          <input type='text' name='selecao' id='selecao' class='form-control'>";// value='".$this->paragem."'
        echo "          <label>".$dadosParPre['selecao']."</label>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='form-group'>";
        echo "      <label class='col-sm-2 control-label'>";
        echo "          Total";
        echo "      </label>";
        echo "      <div class='col-sm-2'>";
        echo "          <label>".$dadosParPre['total']."</label>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='form-group'>";
        echo "      <label class='col-sm-2 control-label'>";
        echo "          &nbsp;";
        echo "      </label>";
        echo "      <div class='col-sm-2'>";
        
        echo "          <input type='hidden' name='data' id='data' class='form-control' value='".date('Y-m-d')."'>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='form-group'>";
        echo "      <label class='col-sm-2 control-label'>";
        echo "          &nbsp;";
        echo "      </label>";
        echo "      <div class='col-sm-2'>";
        
        echo "          <input type='hidden' name='codusuario' id='codusuario' class='form-control' value='".$_SESSION['idusuario']."'>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='form-group'>";
        echo "      <label class='col-sm-4 control-label'>";
        echo "          Deseja excluir a informação acima ?";
        echo "      </label>";
        echo "  </div>";
        echo "  <div class='form-group'>";
        echo "      <div class='col-sm-10' style='text-align: center;'>";
        echo "          <a href='inicio.php?m=para' class='btn btn-default'>Não</a>";
        echo "          <button class='btn btn-primary' type='submit'>Sim</button>";
        echo "      </div>";
        echo "  </div>";
        echo "</form>";
        
        if($_POST){
            $idParagem = $id;
            
            $this->setIdParPre($idParagem);
//            
//            echo "Usuário post: ".$codusuario;
//            echo "<br>Usuário: ".$this->codusuario;
            
            if ($this->excluiParPres()){
                echo "<label class='alert alert-success'>Excluído com sucesso!</label>";
                echo "<meta http-equiv='refresh' content='5;url=inicio.php?m=para'>";
            }
            
        }
        
    }
    //put your code here
}
