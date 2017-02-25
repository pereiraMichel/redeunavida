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

    //put your code here
}
