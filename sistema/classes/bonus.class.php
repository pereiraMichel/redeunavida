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

        $a = new atividades();

        $semana = filter_input(INPUT_GET, 'sem');
        $p = filter_input(INPUT_GET, 'p');

        $sqlTotalMeditacao = "SELECT SUM(bonus) AS totalBonus
                              FROM pp 
                              WHERE codusuario = ".$this->codusuario;
                              if($p === "med"){
                                  $sqlTotalMeditacao = $sqlTotalMeditacao." AND dataRuv = '".$semana."'";
                              }
                              //echo $sqlTotalMeditacao;

        $sqlMeditacao = "SELECT dataRuv, diaRuv FROM pp WHERE codusuario = ".$this->codusuario." GROUP BY dataRuv ORDER BY diaRuv";

        try{
            $resultadoResumoMeditacao = mysql_query($sqlTotalMeditacao) or die("Há um erro no comando SQL (Soma Meditação). Descrição: ".mysql_error());
            $resultadoMeditacao = mysql_query($sqlMeditacao) or die("Há um erro no comando SQL (Meditação). Descrição: ".mysql_error());


        echo "<div class='col-sm-12'>";
//        echo "  <label class='alert alert-info' role='alert' style='width: 100%;'>Meditação</label>";
            if(mysql_num_rows($resultadoMeditacao) > 0){
                
                $dadosTotal = mysql_fetch_array($resultadoResumoMeditacao);
                
                $valorPercentual = $a->readXmlBonus("Meditação");
                //echo "valor da porcentagem: ".$valorPercentual;

                $somaPercentual = $dadosTotal['totalBonus']/$valorPercentual;
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
                echo "      <td><label>Data RUV: </label></td>";
                echo "      <td>";

                $tipoMenu = filter_input(INPUT_GET, 'm');

                if($tipoMenu === "bonu"){
                    while($dadosMeditacao = mysql_fetch_array($resultadoMeditacao)){
                        echo $dadosMeditacao['dataRuv']."&nbsp;";
                    }

                }else{
                    echo "          <select name='semana' class='form-control' onchange='selecionaPPBonus(this.value, \"med\")'>";
                    if($p === "med"){
                    echo "              <option value='".$semana."'>".$semana."</option>";
                    }
                    echo "              <option value=''>&nbsp;</option>";
                    echo "              <option value='todos'>Todos</option>";
                    while($dadosMeditacao = mysql_fetch_array($resultadoMeditacao)){
                        echo "          <option value='".$dadosMeditacao['dataRuv']."'>".$dadosMeditacao['dataRuv']."</option>";
                    }
                    echo "          </select>";
                }

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
                
//                $a = new atividades();
//                $a->writeLog($_SESSION['usuario'], "Consulta de bônus de Meditação.", "../controller/");

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

        $a = new atividades();
        
        $semana = filter_input(INPUT_GET, 'sem');
        $p = filter_input(INPUT_GET, 'p');

        $sqlTotalPortal = "SELECT SUM(bonus) AS totalBonusPortal
                           FROM portal 
                           WHERE codusuario = ".  $this->codusuario;
                        if($p === "por"){
                            $sqlTotalPortal = $sqlTotalPortal." AND dataRuv = '".$semana."'";
                        }
        
        $sqlPortal = "SELECT dataRuv, diaRuv FROM portal WHERE codusuario = ".$this->codusuario." GROUP BY dataRuv ORDER BY diaRuv";

        try{
            
            
            $resultadoResumoPortal = mysql_query($sqlTotalPortal) or die("Há um erro no comando SQL (Soma Meditação). Descrição: ".mysql_error());
            
            $resultadoPortal = mysql_query($sqlPortal) or die("Há um erro no comando SQL (Portal). Descrição: ".mysql_error());
            
        //PORTAL
        
        echo "<div class='col-sm-12'>";
//        echo "  <label class='alert alert-info' role='alert' style='width: 100%;'>Portal</label>";
            if(mysql_num_rows($resultadoResumoPortal) > 0){
                $dadosTotalPortal = mysql_fetch_array($resultadoResumoPortal);

                $valorPercentual = $a->readXmlBonus("Portal");

//                echo "Valor percentual: ".$valorPercentual;

                $somaPercentualPortal = $dadosTotalPortal['totalBonusPortal']/$valorPercentual;
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
                echo "          <label>Data RUV: </label>";
                echo "      </td>";
                echo "      <td>";

                $tipoMenu = filter_input(INPUT_GET, 'm');

                if($tipoMenu === "bonu"){
                    while($dadosPortal = mysql_fetch_array($resultadoPortal)){
                        echo $dadosPortal['dataRuv']."&nbsp;";
                    }

                }else{
                echo "          <select name='semana' class='form-control' onchange='selecionaPortalBonus(this.value, \"por\")'>";
                if($p === "por"){
                echo "              <option value='".$semana."'>".$semana."</option>";
                }
                echo "              <option value=''>&nbsp;</option>";
                echo "              <option value='todos'>Todos</option>";
                while($dadosPortal = mysql_fetch_array($resultadoPortal)){
                    echo "          <option value='".$dadosPortal['dataRuv']."'>".$dadosPortal['dataRuv']."</option>";
                }
                echo "          </select>";
                }


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
        echo "      <label class='alert alert-info'>Meditação</label>";
        echo "      <p>".$this->telaBonusMeditacao()."</p>";
        echo "  </div>";
        echo "  <div class='col-sm-4'>";
        echo "      <label class='alert alert-warning'>Prática dos Portais</label>";
        echo "      <p>".$this->telaBonusPortal()."</p>";
        echo "  </div>";
        echo "  <div class='col-sm-4'>";
        echo "      <label class='alert alert-danger'>Tarefas</label>";
        echo "      <p>".$this->telaBonusTarefa()."</p>";
        echo "  </div>";
        echo "</div>";
        echo "<div class='col-sm-12'>";

        echo "  <div class='col-sm-4'>";
        echo "      <label class='alert alert-info'>Paragem-Presença</label>";
        echo "      <p>".$this->telaBonusPresParagem()."</p>";
        echo "  </div>";
        echo "  <div class='col-sm-4'>";
        echo "      <label class='alert alert-warning'>Serviços e Extras</label>";
        echo "      <p>".$this->telaBonusServExtras()."</p>";
        echo "  </div>";
        echo "  <div class='col-sm-4'>";
        echo "      <p>&nbsp;</p>";
        echo "  </div>";
        
        echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <a href='inicio.php' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

    }

    public function telaBonusTarefa(){
        $conecta = new conectaBanco();
        $conecta->conecta();

        $a = new atividades();
        
        $semana = filter_input(INPUT_GET, 'sem');
        $p = filter_input(INPUT_GET, 'p');

        $sqlTotalTarefa = "SELECT SUM(bonus) AS totalBonusTarefas
                           FROM tarefa 
                           WHERE codusuario = ".  $this->codusuario;
                        if($p === "por"){
                            $sqlTotalTarefa = $sqlTotalTarefa." AND dataRuv = '".$semana."'";
                        }
        
        $sqlTarefa = "SELECT dataRuv FROM tarefa WHERE codusuario = ".$this->codusuario." GROUP BY dataRuv";

        try{
            
            //echo "Total Tarefas: ".$sqlTotalTarefa."<br>";
            $resultadoResumoTarefa = mysql_query($sqlTotalTarefa) or die("Há um erro no comando SQL (Soma Tarefas). Descrição: ".mysql_error().". SQL: ".$sqlTotalTarefa);
            
            $resultadoTarefa = mysql_query($sqlTarefa) or die("Há um erro no comando SQL (Tarefas). Descrição: ".mysql_error());
            
        //PORTAL
        
        echo "<div class='col-sm-12'>";
//        echo "  <label class='alert alert-info' role='alert' style='width: 100%;'>Portal</label>";
            if(mysql_num_rows($resultadoResumoTarefa) > 0){
                $dadosTotalTarefa = mysql_fetch_array($resultadoResumoTarefa);

                $valorPercentual = $a->readXmlBonus("Tarefas");

                //echo "Valor Tarefa: ".$valorPercentual;

                $somaPercentualTarefa = $dadosTotalTarefa['totalBonusTarefas']/$valorPercentual;
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
                echo "          <label>Data RUV: </label>";
                echo "      </td>";
                echo "      <td>";

                $tipoMenu = filter_input(INPUT_GET, 'm');

                if($tipoMenu === "bonu"){
                    while($dadosTarefa = mysql_fetch_array($resultadoTarefa)){
                        echo $dadosTarefa['dataRuv']."&nbsp;";
                    }

                }else{
                    echo "          <select name='semana' id='semana' class='form-control' onchange='selecionaTarefaBonus(this.value, \"por\")'>";
                    if($p === "por"){
                    echo "              <option value='".$semana."'>".$semana."</option>";
                    }
                    echo "              <option value=''>&nbsp;</option>";
                    echo "              <option value='todos'>Todos</option>";
                    while($dadosTarefa = mysql_fetch_array($resultadoTarefa)){
                        echo "          <option value='".$dadosTarefa['dataRuv']."'>".$dadosTarefa['dataRuv']."</option>";
                    }
                    echo "          </select>";
                }

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

        $a = new atividades();
        
        $semana = filter_input(INPUT_GET, 'sem');
        $p = filter_input(INPUT_GET, 'p');

        $sqlTotalPresParagem = "SELECT SUM(bonus) AS totalBonusPresParagem
                           FROM presparagem 
                           WHERE codusuario = ".  $this->codusuario;
                           //echo $sqlTotalPresParagem;
                        if($p === "por"){
                            $sqlTotalPresParagem = $sqlTotalPresParagem." AND dataRuv = '".$semana."'";
                        }
        
        $sqlPresParagem = "SELECT dataRuv FROM presparagem WHERE codusuario = ".$this->codusuario." GROUP BY dataRuv ORDER BY dataRuv";

        try{
            
            //echo "Total Tarefas: ".$sqlTotalTarefa."<br>";
            $resultadoResumoaPresParagem = mysql_query($sqlTotalPresParagem) or die("Há um erro no comando SQL (Soma Presença Paragem). Descrição: ".mysql_error());
            
            $resultadoPresParagem = mysql_query($sqlPresParagem) or die("Há um erro no comando SQL (Presença Paragem). Descrição: ".mysql_error());
            
        //PORTAL
        
        echo "<div class='col-sm-12'>";
//        echo "  <label class='alert alert-info' role='alert' style='width: 100%;'>Portal</label>";
            if(mysql_num_rows($resultadoResumoaPresParagem) > 0){
                $dadosTotalPresParagem = mysql_fetch_array($resultadoResumoaPresParagem);

                $valorPercentual = $a->readXmlBonus("Paragem-Presença");

                $somaPercentualPresParagem = $dadosTotalPresParagem['totalBonusPresParagem']/$valorPercentual;
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
                echo "          <label>Data RUV: </label>";
                echo "      </td>";
                echo "      <td>";

                $tipoMenu = filter_input(INPUT_GET, 'm');
                if($tipoMenu === "bonu"){
                while($dadosPresParagem = mysql_fetch_array($resultadoPresParagem)){
                    echo $dadosPresParagem['dataRuv']."&nbsp;";
                }
                }else{
                echo "          <select name='semana' class='form-control' onchange='selecionaPresParagemBonus(this.value, \"por\")'>";
                if($p === "por"){
                echo "              <option value='".$semana."'>".$semana."</option>";
                }
                echo "              <option value=''>&nbsp;</option>";
                echo "              <option value='todos'>Todos</option>";
                while($dadosPresParagem = mysql_fetch_array($resultadoPresParagem)){
                    echo "          <option value='".$dadosPresParagem['dataRuv']."'>".$dadosPresParagem['dataRuv']."</option>";
                }
                echo "          </select>";

                }

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

        $a = new atividades();
        
        $semana = filter_input(INPUT_GET, 'sem');
        $p = filter_input(INPUT_GET, 'p');

        $sqlTotalServicos = "SELECT SUM(bonus) AS totalBonusServicos
                           FROM servicos 
                           WHERE codusuario = ".  $this->codusuario;
                        if($p === "por"){
                            $sqlTotalServicos = $sqlTotalServicos." AND dataRuv = '".$semana."'";
                        }

                        //echo $sqlTotalServicos;
        
        $sqlServicos = "SELECT dataRuv, diaRuv FROM servicos WHERE codusuario = ".$this->codusuario." GROUP BY dataRuv ORDER BY diaRuv";

        //echo $sqlTotalServicos."<br>";

        try{
            
            
            $resultadoResumoServicos = mysql_query($sqlTotalServicos) or die("Há um erro no comando SQL (Soma Serviços). Descrição: ".mysql_error());
            
            $resultadoServicos = mysql_query($sqlServicos) or die("Há um erro no comando SQL (Serviços). Descrição: ".mysql_error());
            
        //PORTAL
        
        echo "<div class='col-sm-12'>";
//        echo "  <label class='alert alert-info' role='alert' style='width: 100%;'>Portal</label>";
            if(mysql_num_rows($resultadoResumoServicos) > 0){
                $dadosTotalServicos = mysql_fetch_array($resultadoResumoServicos);

                $valorPercentual = $a->readXmlBonus("Serviços");

//                echo "Valor percentual: ".$valorPercentual;

                $somaPercentualServicos = $dadosTotalServicos['totalBonusServicos']/$valorPercentual;

//                echo "DadosTotalServiços: ".$dadosTotalServiços['totalBonusServicos'];

                $multiplicaServicos = $somaPercentualServicos * 100;
                $formatNumeroServicos = number_format($multiplicaServicos, 2, ",", ".");

                echo "<table class='table'>";
                echo "  <tr>";
                echo "      <td>";
                echo "          <label>Total Bônus: ".$dadosTotalServicos['totalBonusServicos']."</label>";
                echo "      </td>";
                echo "      <td>";
                echo "          <label>Percentual: ".$formatNumeroServicos."%</label>";
                echo "      </td>";
                echo "  </tr>";
                echo "  <tr>";
                echo "      <td>";
                echo "          <label>Data RUV: </label>";
                echo "      </td>";
                echo "      <td>";

                $tipoMenu = filter_input(INPUT_GET, 'm');

                if($tipoMenu === "bonu"){
                    while($dadosServicos = mysql_fetch_array($resultadoServicos)){
                        echo $dadosServicos['dataRuv']."&nbsp;";
                    }

                }else{
                echo "          <select name='semana' class='form-control' onchange='selecionaServExtras(this.value, \"serv\")'>";
                if($p === "serv"){
                echo "              <option value='".$semana."'>".$semana."</option>";
                }
                echo "              <option value=''>&nbsp;</option>";
                echo "              <option value='todos'>Todos</option>";
                while($dadosServicos = mysql_fetch_array($resultadoServicos)){
                    echo "          <option value='".$dadosServicos['dataRuv']."'>".$dadosServicos['dataRuv']."</option>";
                }
                echo "          </select>";
                }


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
                echo "              <div class='progress-bar' role='progressbar' aria-valuenow='".$formatNumeroServicos."' aria-valuemin='0' aria-valuemax='100' style='width: ".$formatNumeroServicos."%; min-width: 3em;'>";
                echo                    $formatNumeroServicos."%";
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

    public function telaBonificacao(){
        //echo "<meta http-equiv='refresh' content='5;url=inicio.php?m=config&t=bon'>";

        echo "<form name='formBonificacao' id='formBonificacao' method='post' action='inicio.php?m=config&t=bon'>";

        echo "<div class='col-sm-12'>";
//        echo "  <div align='center'>";
//        echo "      <label>Valores de Bônus</label>";
//        echo "  </div>";

        echo "  <div class='col-sm-12' style='height: 30px;'>";
        echo "      &nbsp;";
        echo "  </div>";

        echo "  <div class='col-sm-4' align='center'>";
        echo "      <img src='../img/meditacao.jpg' class='img-responsive' title='Meditação' alt='Meditação' width='55' height='55'>";
        echo "      <label>Meditação</label><br>";
        echo "      <select name='medBonus' id='medBonus' class='form-control' onchange='document.getElementById(\"vlrBonusMed\").value=this.value'>";
        echo "          <option></option>";
        echo "          <option value='0'>Menor que 5 min</option>";
        echo "          <option value='1'>Maior ou igual a 5 min e menor que 20 min</option>";
        echo "          <option value='2'>Maior ou igual a 20 min e menor que 40 min</option>";
        echo "          <option value='3'>Maior ou igual a 40 min e menor que 80 min</option>";
        echo "          <option value='4'>Maior ou igual a 80 min</option>";
        echo "      </select>";
        echo "<br>";
        echo "      <table class='table'>";
        echo "          <tr>";
        echo "              <td>";
        echo "                  <label>Bônus: </label>";
        echo "              </td>";
        echo "              <td>";
        echo "                  <div class='span1'>";
        echo "                      <input type='text' id='vlrBonusMed' name='vlrBonusMed' class='form-control' readonly='readonly'>";
        echo "                  </div>";
        echo "              </td>";
        echo "          </tr>";
        echo "      </table>";
        echo "  </div>";
        echo "  <div class='col-sm-4' align='center'>";
        echo "      <img src='../img/portal_blue.png' class='img-responsive' title='Prática dos Portais' alt='Prática dos Portais' width='62' height='62'>";
        echo "      <label>Prática dos Portais</label>";
        echo "      <select name='medBonus' id='medBonus' class='form-control' onchange='document.getElementById(\"vlrBonusPort\").value=this.value'>";
        echo "          <option></option>";
        echo "          <option value='1'>Sim</option>";
        echo "          <option value='0'>Não</option>";
        echo "          <option value='0'>Nenhum</option>";
        echo "          <option value='0'>Abaixo de 20</option>";
        echo "          <option value='1'>Maior ou igual a 20 min e menor que 40 min</option>";
        echo "          <option value='2'>Acima de 40 min</option>";
        echo "      </select>";
        echo "<br>";
        echo "      <table class='table'>";
        echo "          <tr>";
        echo "              <td>";
        echo "                  <label>Bônus: </label>";
        echo "              </td>";
        echo "              <td>";
        echo "                  <div class='span1'>";
        echo "                      <input type='text' id='vlrBonusPort' name='vlrBonusPort' class='form-control' readonly='readonly'>";
        echo "                  </div>";
        echo "              </td>";
        echo "          </tr>";
        echo "      </table>";
        echo "  </div>";
        echo "  <div class='col-sm-4' align='center'>";
        echo "      <img src='../img/colaboradores.png' class='img-responsive' title='Presença-Paragem' alt='Presença-Paragem' width='42' height='42'>";
        echo "      <label>Presença-Paragem</label>";
        echo "      <select name='medBonus' id='medBonus' class='form-control' onchange='document.getElementById(\"vlrBonusPresPar\").value=this.value'>";
        echo "          <option></option>";
        echo "          <option value='3'>Status - Sim</option>";
        echo "          <option value='0'>Status - Não</option>";
        echo "      </select>";
        echo "<br>";
        echo "      <table class='table'>";
        echo "          <tr>";
        echo "              <td>";
        echo "                  <label>Bônus: </label>";
        echo "              </td>";
        echo "              <td>";
        echo "                  <div class='span1'>";
        echo "                      <input type='text' id='vlrBonusPresPar' name='vlrBonusPresPar' class='form-control' readonly='readonly'>";
        echo "                  </div>";
        echo "              </td>";
        echo "          </tr>";
        echo "      </table>";
        echo "  </div>";

        echo "  <div class='col-sm-12' style='height: 30px;'>";
        echo "      &nbsp;";
        echo "  </div>";

        echo "  <div class='col-sm-4' align='center'>";
        echo "      <img src='../img/cupomFiscal.png' class='img-responsive' title='Tarefas' width='42' height='42' style='text-align: center;'>";
        echo "      <label>Tarefas</label>";
        echo "      <select name='medBonus' id='medBonus' class='form-control' onchange='document.getElementById(\"vlrBonusTarefa\").value=this.value'>";
        echo "          <option></option>";
        echo "          <option value='3'>Status - Sim</option>";
        echo "          <option value='0'>Status - Não</option>";
        echo "      </select>";
        echo "<br>";
        echo "      <table class='table'>";
        echo "          <tr>";
        echo "              <td>";
        echo "                  <label>Bônus: </label>";
        echo "              </td>";
        echo "              <td>";
        echo "                  <div class='span1'>";
        echo "                      <input type='text' id='vlrBonusTarefa' name='vlrBonusTarefa' class='form-control' readonly='readonly'>";
        echo "                  </div>";
        echo "              </td>";
        echo "          </tr>";
        echo "      </table>";
        echo "  </div>";
        echo "  <div class='col-sm-4' align='center'>";
        echo "      <img src='../img/text-icon.png' class='img-responsive' title='Serviços e Extras' width='40' height='40'>";
        echo "      <label>Serviços e Extras</label>";
        echo "      <select name='medBonus' id='medBonus' class='form-control' onchange='document.getElementById(\"vlrBonusServico\").value=this.value'>";
        echo "          <option></option>";
        echo "          <option value='0'>Aguarde</option>";
//        echo "          <option value='0'>Status - Não</option>";
        echo "      </select>";
        echo "<br>";
        echo "      <table class='table'>";
        echo "          <tr>";
        echo "              <td>";
        echo "                  <label>Bônus: </label>";
        echo "              </td>";
        echo "              <td>";
        echo "                  <div class='span1'>";
        echo "                      <input type='text' id='vlrBonusServico' name='vlrBonusServico' class='form-control' readonly='readonly'>";
        echo "                  </div>";
        echo "              </td>";
        echo "          </tr>";
        echo "      </table>";
        echo "  </div>";
        echo "  </div>";
        echo "  <div class='col-sm-4' align='center'>";
        echo "      <label>&nbsp;</label>";
        echo "  </div>";

        echo "</div>"; // Fecha o col-sm-12
        echo "<div class='col-sm-12'>";
        echo "  <a href='inicio.php?m=config' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

        echo "</form>";
    }

}
