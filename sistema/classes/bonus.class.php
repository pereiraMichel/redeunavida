<?php

class bonus {

    private $idbonus;
    private $mdt;
    private $pp;
    private $paragem;
    private $avaliacao;
    private $servico;
    private $bonustotal;
    private $codusuario;
    
    function getBonustotal() {
        return $this->bonustotal;
    }

    function setBonustotal($bonustotal) {
        $this->bonustotal = $bonustotal;
    }

    function getParagem() {
        return $this->paragem;
    }

    function setParagem($paragem) {
        $this->paragem = $paragem;
    }
    
    function getIdbonus() {
        return $this->idbonus;
    }

    function setIdbonus($idbonus) {
        $this->idbonus = $idbonus;
    }
    
    function getMdt() {
        return $this->mdt;
    }

    function getPp() {
        return $this->pp;
    }

    function getAvaliacao() {
        return $this->avaliacao;
    }

    function getServico() {
        return $this->servico;
    }

    function setMdt($mdt) {
        $this->mdt = $mdt;
    }

    function setPp($pp) {
        $this->pp = $pp;
    }

    function setAvaliacao($avaliacao) {
        $this->avaliacao = $avaliacao;
    }

    function setServico($servico) {
        $this->servico = $servico;
    }

    function getCodusuario() {
        return $this->codusuario;
    }

    function setCodusuario($codusuario) {
        $this->codusuario = $codusuario;
    }

    public function verificaBonus(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $sqlBonus = "SELECT * FROM bonus WHERE codusuario = ".$this->codusuario;
        
        try{
            $resultadoBonus = mysql_query($sqlBonus) or die ("Não foi possível executar o comando de consulta. Erro: ".mysql_error());
            
            if(mysql_num_rows($resultadoBonus) > 0){
                $this->alteraBonus();
            }else{
                $this->incluiBonus();
            }
            
        }catch(Exception $ex){
            echo "Problemas ao executar. Erro: ".$ex->getMessage();
        }
    }
    
    public function incluiBonus(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $this->idbonus = ultimoId::ultimoIdBanco("idbonus", "bonus");
        
        $sqlInsere = "INSERT INTO bonus (idbonus, mdt, pp, avaliacao, paragem, servico, soma_servico, soma_bonus, cod_usuario)
                      VALUES (".$this->idbonus.", ".$this->mdt.", ".$this->pp.", ".$this->avaliacao.", ".$this->paragem.", ".$this->servico.", ".$this->somaServico.", ".$this->bonustotal.", ".$this->codusuario.")";
        
        try{
            $resultadoIncluiBonus = mysql_query($sqlInsere) or die("Houve um erro no comando SQL. Erro: ".mysql_error());
            
            if($resultadoIncluiBonus){
                return true;
            }
            
            return false;
        } catch (Exception $ex) {
            echo "Erro ao processar o comando. Descrição: ".$ex->getMessage();
        }
        
    }
    
    public function alteraBonus(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $revisaoBonus = new revisaobonus();

        $sqlAlteraBonus = "UPDATE bonus SET mdt = ".$this->mdt.", pp = ".$this->pp.", avaliacao = ".$this->avaliacao.", servico = ".$this->paragem.", soma_servico = ".$this->servico.", soma_bonus = ".$this->bonustotal." WHERE paragem = ".$this->paragem." AND codusuario = ".$this->codusuario;
        
        try{
            $resultadoAlteraBonus = mysql_query($sqlAlteraBonus) or die ("Houve um erro no comando SQL de alteração. Erro: ".mysql_error());
            if($resultadoAlteraBonus){
                if($revisaoBonus->verificaRevisaoBonus()){
                    return true;
                }
            }
            
            return false;
        } catch (Exception $ex) {
            echo "Não foi possível processar o comando de alteração. Erro: ".$ex->getMessage();
        }
        
    }

    public function telaBonusMeditacao(){
        $conecta = new conectaBanco();
        $conecta->conecta();

        $semana = filter_input(INPUT_GET, 'sem');
        $p = filter_input(INPUT_GET, 'p');

        $sqlTotalMeditacao = "SELECT SUM(bonus) AS totalBonus
                              FROM pp 
                              WHERE codusuario = ".$this->codusuario;
                              if($p === "med"){
                                  $sqlTotalMeditacao = $sqlTotalMeditacao." AND paragem = '".$semana."'";
                              }
                              //echo $sqlTotalMeditacao;

        $sqlMeditacao = "SELECT paragem FROM pp WHERE codusuario = ".$this->codusuario." GROUP BY paragem";

        try{
            $resultadoResumoMeditacao = mysql_query($sqlTotalMeditacao) or die("Há um erro no comando SQL (Soma Meditação). Descrição: ".mysql_error());
            $resultadoMeditacao = mysql_query($sqlMeditacao) or die("Há um erro no comando SQL (Meditação). Descrição: ".mysql_error());


        echo "<div class='col-sm-12'>";
//        echo "  <label class='alert alert-info' role='alert' style='width: 100%;'>Meditação</label>";
            if(mysql_num_rows($resultadoMeditacao) > 0){
                
                $dadosTotal = mysql_fetch_array($resultadoResumoMeditacao);
                
                $somaPercentual = $dadosTotal['totalBonus']/35;
                $multiplica = $somaPercentual * 100;
                $formatPercentual = number_format($multiplica, 2, ",", ".");

                echo "<table class='table'>";
                echo "  <tr>";
                echo "      <td>";
                echo "          <label>Total Bônus: ".$dadosTotal['totalBonus']."</label>";
                echo "      </td>";
                echo "      <td>";
                echo "          <label>Percentual: ".$formatPercentual."%</label>";
                echo "      </td>";
                echo "  </tr>";
                echo "  <tr>";
                echo "      <td><label>Semana: </label></td>";
                echo "      <td>";
                echo "          <select name='semana' class='form-control' onchange='selecionaPPBonus(this.value, \"med\")'>";
                if($p === "med"){
                echo "              <option value='".$semana."'>".$semana."</option>";
                }
                echo "              <option value=''>&nbsp;</option>";
                echo "              <option value='todos'>Todos</option>";
                while($dadosMeditacao = mysql_fetch_array($resultadoMeditacao)){
                    echo "          <option value='".$dadosMeditacao['paragem']."'>".$dadosMeditacao['paragem']."</option>";
                }
                echo "          </select>";
                echo "      </td>";
                echo "  </tr>";
                echo "  <tr>";
                echo "      <td colspan='2'>";
                echo "          &nbsp;";
                echo "      </td>";
                echo "  </tr>";
                echo "  <tr>";
                echo "      <td colspan='2'>";
                echo "          <div class='progress'>";
                echo "              <div class='progress-bar' role='progressbar' aria-valuenow='".$formatPercentual."' aria-valuemin='0' aria-valuemax='100' style='width: ".$formatPercentual."%; min-width: 3em;'>";
                echo                    $formatPercentual."%";
                echo "              </div>";
                echo "          </div>";
                echo "      </td>";
                echo "  </tr>";
                echo "</table>";
                
                $a = new atividades();
                $a->writeLog($_SESSION['usuario'], "Consulta de bônus de Meditação.", "../controller/");

//                }
            }else{
                echo "<label class='alert alert-warning'>Sem conteúdo de meditação para mostrar.</label>";
            }
        echo "</div>";


        }catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }

    }
    
    public function telaBonusPortal(){
        
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $semana = filter_input(INPUT_GET, 'sem');
        $p = filter_input(INPUT_GET, 'p');

        $sqlTotalPortal = "SELECT SUM(bonus) AS totalBonusPortal
                           FROM portal 
                           WHERE codusuario = ".  $this->codusuario;
                        if($p === "por"){
                            $sqlTotalPortal = $sqlTotalPortal." AND semana = '".$semana."'";
                        }
        
        $sqlPortal = "SELECT semana FROM portal WHERE codusuario = ".$this->codusuario." GROUP BY semana";

        try{
            
            
            $resultadoResumoPortal = mysql_query($sqlTotalPortal) or die("Há um erro no comando SQL (Soma Meditação). Descrição: ".mysql_error());
            
            $resultadoPortal = mysql_query($sqlPortal) or die("Há um erro no comando SQL (Portal). Descrição: ".mysql_error());
            
        //PORTAL
        
        echo "<div class='col-sm-12'>";
//        echo "  <label class='alert alert-info' role='alert' style='width: 100%;'>Portal</label>";
            if(mysql_num_rows($resultadoResumoPortal) > 0){
                $dadosTotalPortal = mysql_fetch_array($resultadoResumoPortal);
                $somaPercentualPortal = $dadosTotalPortal['totalBonusPortal']/42;
                $multiplicaPortal = $somaPercentualPortal * 100;
                $formatNumeroPortal = number_format($multiplicaPortal, 2, ",", ".");

                echo "<table class='table'>";
                echo "  <tr>";
                echo "      <td>";
                echo "          <label>Total Bônus: ".$dadosTotalPortal['totalBonusPortal']."</label>";
                echo "      </td>";
                echo "      <td>";
                echo "          <label>Percentual: ".$formatNumeroPortal."%</label>";
                echo "      </td>";
                echo "  </tr>";
                echo "  <tr>";
                echo "      <td>";
                echo "          <label>Semana</label>";
                echo "      </td>";
                echo "      <td>";
                echo "          <select name='semana' class='form-control' onchange='selecionaPortalBonus(this.value, \"por\")'>";
                if($p === "por"){
                echo "              <option value='".$semana."'>".$semana."</option>";
                }
                echo "              <option value=''>&nbsp;</option>";
                echo "              <option value='todos'>Todos</option>";
                while($dadosMeditacao = mysql_fetch_array($resultadoPortal)){
                    echo "          <option value='".$dadosMeditacao['semana']."'>".$dadosMeditacao['semana']."</option>";
                }
                echo "          </select>";
                echo "      </td>";
                echo "  </tr>";
                echo "  <tr>";
                echo "      <td colspan='2'>";
                echo "          &nbsp;";
                echo "      </td>";
                echo "  </tr>";
                echo "  <tr>";
                echo "      <td colspan='2'>";
                echo "          <div class='progress'>";
                echo "              <div class='progress-bar' role='progressbar' aria-valuenow='".$formatNumeroPortal."' aria-valuemin='0' aria-valuemax='100' style='width: ".$formatNumeroPortal."%; min-width: 3em;'>";
                echo                    $formatNumeroPortal."%";
                echo "              </div>";
                echo "          </div>";
                echo "      </td>";
                echo "  </tr>";
                echo "</table>";
                
            }else{
                echo "<label class='alert alert-warning'>Sem conteúdo de portal para mostrar.</label>";
            }
        echo "</div>"; // fecha o col-sm-6
            
        } catch (Exception $ex) {
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }
        
    }


    public function telaInicialBonus(){
        echo "<div class='col-sm-12'>";

        echo "  <div class='col-sm-4'>";
        echo "      <p>".$this->telaBonusMeditacao()."</p>";
        echo "  </div>";
        echo "  <div class='col-sm-4'>";
        echo "      <p>".$this->telaBonusPortal()."</p>";
        echo "  </div>";
        echo "  <div class='col-sm-4'>";
        echo "      <p>Investimento</p>";
        echo "  </div>";

        echo "  <div class='col-sm-4'>";
        echo "      <p>Paragem-Presença</p>";
        echo "  </div>";
        echo "  <div class='col-sm-4'>";
        echo "      <p>&nbsp;</p>";
        echo "  </div>";
        echo "  <div class='col-sm-4'>";
        echo "      <p>&nbsp;</p>";
        echo "  </div>";
        
        echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <a href='inicio.php' class='btn btn-default'>Voltar</a>";
        echo "</div>";

    }

    public function telaBonusTarefa(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $semana = filter_input(INPUT_GET, 'sem');
        $p = filter_input(INPUT_GET, 'p');

        $sqlTotalTarefa = "SELECT SUM(bonus) AS totalBonusTarefas
                           FROM tarefa 
                           WHERE codusuario = ".  $this->codusuario;
                        if($p === "por"){
                            $sqlTotalTarefa = $sqlTotalTarefa." AND semanaRuv = '".$semana."'";
                        }
        
        $sqlTarefa = "SELECT semanaRuv FROM tarefa WHERE codusuario = ".$this->codusuario." GROUP BY semanaRuv";

        try{
            
            //echo "Total Tarefas: ".$sqlTotalTarefa."<br>";
            $resultadoResumoTarefa = mysql_query($sqlTotalTarefa) or die("Há um erro no comando SQL (Soma Tarefas). Descrição: ".mysql_error());
            
            $resultadoTarefa = mysql_query($sqlTarefa) or die("Há um erro no comando SQL (Tarefas). Descrição: ".mysql_error());
            
        //PORTAL
        
        echo "<div class='col-sm-12'>";
//        echo "  <label class='alert alert-info' role='alert' style='width: 100%;'>Portal</label>";
            if(mysql_num_rows($resultadoResumoTarefa) > 0){
                $dadosTotalTarefa = mysql_fetch_array($resultadoResumoTarefa);
                $somaPercentualTarefa = $dadosTotalTarefa['totalBonusTarefas']/42;
                $multiplicaTarefa = $somaPercentualTarefa * 100;
                $formatNumeroTarefa = number_format($multiplicaTarefa, 2, ",", ".");

                echo "<table class='table'>";
                echo "  <tr>";
                echo "      <td>";
                echo "          <label>Total Bônus: ".$dadosTotalTarefa['totalBonusTarefas']."</label>";
                echo "      </td>";
                echo "      <td>";
                echo "          <label>Percentual: ".$formatNumeroTarefa."%</label>";
                echo "      </td>";
                echo "  </tr>";
                echo "  <tr>";
                echo "      <td>";
                echo "          <label>Semana</label>";
                echo "      </td>";
                echo "      <td>";
                echo "          <select name='semana' class='form-control' onchange='selecionaTarefaBonus(this.value, \"por\")'>";
                if($p === "por"){
                echo "              <option value='".$semana."'>".$semana."</option>";
                }
                echo "              <option value=''>&nbsp;</option>";
                echo "              <option value='todos'>Todos</option>";
                while($dadosTarefa = mysql_fetch_array($resultadoTarefa)){
                    echo "          <option value='".$dadosTarefa['semanaRuv']."'>".$dadosTarefa['semanaRuv']."</option>";
                }
                echo "          </select>";
                echo "      </td>";
                echo "  </tr>";
                echo "  <tr>";
                echo "      <td colspan='2'>";
                echo "          &nbsp;";
                echo "      </td>";
                echo "  </tr>";
                echo "  <tr>";
                echo "      <td colspan='2'>";
                echo "          <div class='progress'>";
                echo "              <div class='progress-bar' role='progressbar' aria-valuenow='".$formatNumeroTarefa."' aria-valuemin='0' aria-valuemax='100' style='width: ".$formatNumeroTarefa."%; min-width: 3em;'>";
                echo                    $formatNumeroTarefa."%";
                echo "              </div>";
                echo "          </div>";
                echo "      </td>";
                echo "  </tr>";
                echo "</table>";
                
            }else{
                echo "<label class='alert alert-warning'>Sem conteúdo de portal para mostrar.</label>";
            }
        echo "</div>"; // fecha o col-sm-6
            
        } catch (Exception $ex) {
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }

    }

    public function telaBonusPresParagem(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $semana = filter_input(INPUT_GET, 'sem');
        $p = filter_input(INPUT_GET, 'p');

        $sqlTotalPresParagem = "SELECT SUM(bonus) AS totalBonusPresParagem
                           FROM presparagem 
                           WHERE codusuario = ".  $this->codusuario;
                           //echo $sqlTotalPresParagem;
                        if($p === "por"){
                            $sqlTotalPresParagem = $sqlTotalPresParagem." AND semanaRuv = '".$semana."'";
                        }
        
        $sqlPresParagem = "SELECT semanaRuv FROM presparagem WHERE codusuario = ".$this->codusuario." GROUP BY semanaRuv";

        try{
            
            //echo "Total Tarefas: ".$sqlTotalTarefa."<br>";
            $resultadoResumoaPresParagem = mysql_query($sqlTotalPresParagem) or die("Há um erro no comando SQL (Soma Presença Paragem). Descrição: ".mysql_error());
            
            $resultadoPresParagem = mysql_query($sqlPresParagem) or die("Há um erro no comando SQL (Presença Paragem). Descrição: ".mysql_error());
            
        //PORTAL
        
        echo "<div class='col-sm-12'>";
//        echo "  <label class='alert alert-info' role='alert' style='width: 100%;'>Portal</label>";
            if(mysql_num_rows($resultadoResumoaPresParagem) > 0){
                $dadosTotalPresParagem = mysql_fetch_array($resultadoResumoaPresParagem);
                $somaPercentualPresParagem = $dadosTotalPresParagem['totalBonusPresParagem']/42;
                $multiplicaPresParagem = $somaPercentualPresParagem * 100;
                $formatNumeroPresParagem = number_format($multiplicaPresParagem, 2, ",", ".");

                echo "<table class='table'>";
                echo "  <tr>";
                echo "      <td>";
                echo "          <label>Total Bônus: ".$dadosTotalPresParagem['totalBonusPresParagem']."</label>";
                echo "      </td>";
                echo "      <td>";
                echo "          <label>Percentual: ".$formatNumeroPresParagem."%</label>";
                echo "      </td>";
                echo "  </tr>";
                echo "  <tr>";
                echo "      <td>";
                echo "          <label>Semana</label>";
                echo "      </td>";
                echo "      <td>";
                echo "          <select name='semana' class='form-control' onchange='selecionaPresParagemBonus(this.value, \"por\")'>";
                if($p === "por"){
                echo "              <option value='".$semana."'>".$semana."</option>";
                }
                echo "              <option value=''>&nbsp;</option>";
                echo "              <option value='todos'>Todos</option>";
                while($dadosPresParagem = mysql_fetch_array($resultadoPresParagem)){
                    echo "          <option value='".$dadosPresParagem['semanaRuv']."'>".$dadosPresParagem['semanaRuv']."</option>";
                }
                echo "          </select>";
                echo "      </td>";
                echo "  </tr>";
                echo "  <tr>";
                echo "      <td colspan='2'>";
                echo "          &nbsp;";
                echo "      </td>";
                echo "  </tr>";
                echo "  <tr>";
                echo "      <td colspan='2'>";
                echo "          <div class='progress'>";
                echo "              <div class='progress-bar' role='progressbar' aria-valuenow='".$formatNumeroPresParagem."' aria-valuemin='0' aria-valuemax='100' style='width: ".$formatNumeroPresParagem."%; min-width: 3em;'>";
                echo                    $formatNumeroPresParagem."%";
                echo "              </div>";
                echo "          </div>";
                echo "      </td>";
                echo "  </tr>";
                echo "</table>";
                
            }else{
                echo "<label class='alert alert-warning'>Sem conteúdo de portal para mostrar.</label>";
            }
        echo "</div>"; // fecha o col-sm-6
            
        } catch (Exception $ex) {
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }

    }

    public function telaBonusServExtras(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $semana = filter_input(INPUT_GET, 'sem');
        $p = filter_input(INPUT_GET, 'p');

        $sqlBonusServ =         "SELECT 
                                    sf.focalizacao,
                                    sf.semanaRuv AS semanaFocalizacao,
                                    (SELECT SUM(bonus) FROM servfocalizacao WHERE codusuario = ".$this->codusuario.") AS totalBonusFocalizacao, 
                                    sp.presenca,
                                    sp.semanaRuv AS semanaPresenca,
                                    (SELECT SUM(bonus) FROM servpresenca WHERE codusuario = ".$this->codusuario.") AS totalBonusPresenca 
                                FROM servfocalizacao sf
                                LEFT JOIN servpresenca sp ON sf.codusuario = sp.codusuario
                                WHERE sf.codusuario = ".$this->codusuario;
                                
                                if(!empty($semana)){
                                    $sqlBonusServ = $sqlBonusServ." AND sf.semanaRuv = '".$semana."' OR sp.semanaRuv = '".$semana."'";
                                }
         
        try{
            
            //echo "SQL: ".$sqlBonusServ."<br>";
            //echo "Total Tarefas: ".$sqlTotalTarefa."<br>";
            $resultadoResumoaServ = mysql_query($sqlBonusServ) or die("Há um erro no comando SQL (Soma Serviços Extras). Descrição: ".mysql_error());

            
        //PORTAL
        
        echo "<div class='col-sm-12'>";
//        echo "  <label class='alert alert-info' role='alert' style='width: 100%;'>Portal</label>";
            if(mysql_num_rows($resultadoResumoaServ) > 0){
                $dadosBonusServ = mysql_fetch_array($resultadoResumoaServ);
                
                $somaFocal = $dadosBonusServ['totalBonusFocalizacao']/42;
                $somaPres = $dadosBonusServ['totalBonusPresenca']/42;
                
                $multiplicaFocal = $somaFocal * 100;
                $multiplicaPres = $somaPres * 100;

                $formatNumeroFocal = number_format($multiplicaFocal, 2, ",", ".");
                $formatNumeroPres = number_format($multiplicaPres, 2, ",", ".");

                echo "<table class='table'>";
                echo "  <tr>";
                echo "      <td>";
                echo "          Focalização";
                echo "      </td>";
                echo "      <td>";
                echo "          Presença";
                echo "      </td>";
                echo "  </tr>";
                echo "  <tr>";
                echo "      <td>";
                echo "          <label>Total Bônus: ".$dadosBonusServ['totalBonusFocalizacao']."</label>";
                echo "      </td>";
                echo "      <td>";
                echo "          <label>Total Bônus: ".$dadosBonusServ['totalBonusPresenca']."</label>";
                echo "      </td>";
                echo "  </tr>";
                echo "  <tr>";
                echo "      <td>";
                echo "          <label>Percentual: ".$formatNumeroFocal."%</label>";
                echo "      </td>";
                echo "      <td>";
                echo "          <label>Percentual: ".$formatNumeroPres."%</label>";
                echo "      </td>";
                echo "  </tr>";
/*                echo "  <tr>";
                echo "      <td>";
                echo "          <label>Semana</label>";
                echo "      </td>";
                echo "      <td>";
                echo "          <select name='semana' class='form-control' onchange='selecionaPresParagemBonus(this.value, \"por\")'>";
                if($p === "por"){
                echo "              <option value='".$semana."'>".$semana."</option>";
                }
                echo "              <option value=''>&nbsp;</option>";
                echo "              <option value='todos'>Todos</option>";
                while($dadosPresParagem = mysql_fetch_array($resultadoPresParagem)){
                    echo "          <option value='".$dadosPresParagem['semanaRuv']."'>".$dadosPresParagem['semanaRuv']."</option>";
                }
                echo "          </select>";
                echo "      </td>";
                echo "  </tr>";
                echo "  <tr>";
                echo "      <td colspan='2'>";
                echo "          &nbsp;";
                echo "      </td>";
                echo "  </tr>";
                echo "  <tr>";
                echo "      <td colspan='2'>";
                echo "          <div class='progress'>";
                echo "              <div class='progress-bar' role='progressbar' aria-valuenow='".$formatNumeroPresParagem."' aria-valuemin='0' aria-valuemax='100' style='width: ".$formatNumeroPresParagem."%; min-width: 3em;'>";
                echo                    $formatNumeroPresParagem."%";
                echo "              </div>";
                echo "          </div>";
                echo "      </td>";
                echo "  </tr>";*/
                echo "</table>";
                
            }else{
                echo "<label class='alert alert-warning'>Sem conteúdo de portal para mostrar.</label>";
            }
        echo "</div>"; // fecha o col-sm-6
            
        } catch (Exception $ex) {
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }

    }

    //put your code here
}
