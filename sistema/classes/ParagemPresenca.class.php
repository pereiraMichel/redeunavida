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
    private $diaAnoRuv;

    function getDiaAnoRuv(){
        return $this->diaAnoRuv;
    }

    function setDiaAnoRuv($dia_anoruv){
        $this->diaAnoRuv = $dia_anoruv;
    }

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
                $pes = "btn-default";
                break;
                
            case "prespara":
                $ppActive = "class = 'active'";
                $regActive = "";
                $bonusActive = "";

                $pp = "btn-primary";
                $reg = "btn-default";
                $bns = "btn-default";
                $pes = "btn-default";
                break;
            
            case "registros":
                $ppActive = "";
                $regActive = "class = 'active'";
                $bonusActive = "";

                $pp = "btn-default";
                $reg = "btn-primary";
                $bns = "btn-default";
                $pes = "btn-default";
                break;
            
            case "bonus":
                $ppActive = "";
                $regActive = "";
                $bonusActive = "class = 'active'";

                $pp = "btn-default";
                $reg = "btn-default";
                $bns = "btn-primary";
                $pes = "btn-default";
                break;

            case "pesquisas":
                $ppActive = "";
                $regActive = "";
                $bonusActive = "class = 'active'";

                $pp = "btn-default";
                $reg = "btn-default";
                $bns = "btn-default";
                $pes = "btn-primary";
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
            echo "          <a href='inicio.php?m=para&tab=pesquisas' class='btn $pes' style='width: 90px;'>";
            echo "              Pesquisas";
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

                case "pesquisas":
                    $pesq = new Pesquisas();
                    $pesq->telaPesquisas('presparagem');
                    break;
                    
            }
            echo "</div>";//fecha o col-sm-12
    }

        
    public function insereParPres(){
        $conecta = new conectaBanco();
        $conecta->conecta();

        $a = new atividades();
        
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
                $a->writeLog($_SESSION['usuario'], "Inclusão da Presença-Paragem. Data RUV: ".$this->dataRuv, "../controller/");

                echo "<label class='alert alert-success'>Presença Paragem salvo com sucesso! Aguarde 2 segundos.</label>";
                echo "<meta http-equiv='refresh' content='2;url=inicio.php?m=para'>";

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
            echo "<script> window.location.href='inicio.php?m=para&".$dataruv_selecionada."&e=11' </script>";
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

                $this->setDataRuv($dadosCalendario['ano']."-".$dadosCalendario['estacao'].$dadosCalendario['diaDoMes'].$dadosCalendario['diaSemana'].".".$dadosCalendario['semana']);
                $this->setSemanaRuv($dadosCalendario['ano']."-".$dadosCalendario['estacao'].$dadosCalendario['diaDoMes'].$dadosCalendario['diaSemana']);
                $this->setDiaRuv($dadosCalendario['semana']);
                if(strlen($diaCalendario) < 2){
                    $diaCalendario = "0".$diaCalendario;
                }
                $this->setDataRegistro($diaCalendario."/".$mesLetivo."/".$anoCalendario);
                //echo "<script>document.getElementById('inicio').focus();</script>";
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
                $this->setSemanaRuv($dadosCalendario['ano']."-".$dadosCalendario['estacao'].$dadosCalendario['diaDoMes'].$dadosCalendario['diaSemana']);
                $this->setDiaRuv($dadosCalendario['semana']);
                //echo "<script>document.getElementById('inicio').focus();</script>";
            }

        }catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }


    }

    
    public function registroPresencaParagem(){
        
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
                case 'presenca':
                        $selecionaOrdem = " ORDER BY t.descricao";
                    break;
                case 'dataregistro':
                        $selecionaOrdem = " ORDER BY p.dataRegistro";
                    break;
                case 'dataruv':
                        $selecionaOrdem = " ORDER BY p.dataRuv";
                    break;
                case 'status':
                        $selecionaOrdem = " ORDER BY p.status";
                    break;
                case 'bonus':
                        $selecionaOrdem = " ORDER BY p.bonus";
                    break;
                
                default:
                        $selecionaOrdem = " ORDER BY dataRuv";
                    break;
            }//fim do switch
//        }

        $sqlTelaPP = "  SELECT p.*, DATE_FORMAT(p.dataRegistro, '%d/%m/%Y') as dataRegFormat, t.descricao FROM presparagem p 
                        INNER JOIN tabpresparagem t ON p.pp = t.idtabpresparagem 
                        WHERE p.codUsuario = ".$this->codusuario.$selecionaDataRuv.$selecionaOrdem;

        $sqlResumoPresParagem = "SELECT dataRuv FROM presparagem WHERE codUsuario = ".$this->codusuario." GROUP BY dataRuv ORDER BY dataRuv";

        //echo "SQL: ".$sqlTelaPP."<br>";

        //echo $sqlResumoPresParagem."<br>";
        
        //$sqlSomaTotal = "SELECT SUM(bonus) AS totalGeral FROM presparagem WHERE codUsuario = ".$this->codusuario."";
        
        try{
//            echo "SQL consulta paragem: ".$sqlTelaPP."<br>";
            $resultadoTelaParagem = mysql_query($sqlTelaPP) or die("Erro na execução do comando SQL de consulta paragem. Descrição: ".mysql_error());

            $resultadoResumoParagem = mysql_query($sqlResumoPresParagem) or die ("Erro na execução do comando SQL do resumo de paragem. Descrição: ".mysql_error());
           
            echo "<div class='col-sm-12'>";
                    echo "<table class='table table-striped'>";
                    echo "  <tr>";
                    echo "      <td>";
                    echo "          <label>Selecionar Data-RUV</label>";
                    echo "      </td>";
                    echo "      <td>";
                    echo "          <select name='sDataRuv' id='sDataRuv' class='form-control' onchange='registroSelecao(this.value, \"para\")'>";
                    if(!empty($s)){
                        echo "          <option value='".$s."'>".$s."</option>";
                    }
                    echo "              <option value='Todos'></option>";
                    echo "              <option value='Todos'>Todos</option>";

                    while($dadosResumoPresParagem = mysql_fetch_array($resultadoResumoParagem)){
                    echo "              <option value='".$dadosResumoPresParagem['dataRuv']."'>".$dadosResumoPresParagem['dataRuv']."</option>";
                    }
                    echo "          </select>";
                    echo "      </td>";
                    echo "      <td>";
                    echo "          <label>Classificar por: </label>";
                    echo "      </td>";
                    echo "      <td>";
                    //$dominio = null;
                    $servidor = $_SERVER['REQUEST_URI'];
                    echo "          <select name='classificacao' class='form-control' onchange='ordemSQL(this.value, \"$servidor\", \"meditacao\")'>"; // disabled
                    if(!empty($ordem)){
                        if($ordem == "presenca"){
                            echo "<option value='presenca'>Presença-Paragem</option>";
                        }
                        else if($ordem == "dataruv"){
                            echo "<option value='dataruv'>Data RUV</option>";
                        }
                        else if($ordem == "dataregistro"){
                            echo "<option value='dataregistro'>Data Registro</option>";
                        }
                        else if($ordem == "status"){
                            echo "<option value='status'>Status</option>";
                        }else 
                        if($ordem == "bonus"){
                            echo "<option value='bonus'>Bônus</option>";
                        }
                    }
                    echo "              <option value=''></option>";
                    echo "              <option value='presenca'>Presença-Paragem</option>";
                    echo "              <option value='dataruv'>Data RUV</option>";
                    echo "              <option value='dataregistro'>Data Registro</option>";
                    echo "              <option value='status'>Status</option>";
                    echo "              <option value='bonus'>Bônus</option>";
                    echo "          </select>";
                    echo "      </td>";
                    echo "  </tr>";
                    echo "</table>";

            if(mysql_num_rows($resultadoTelaParagem) > 0){


            echo "<p style='height: 10px;'>&nbsp;</p>";
                echo "<table class='table'>";
                echo "  <tr>";
                echo "      <td>";
                echo "          Data RUV";
                echo "      </td>";
                echo "      <td>";
                echo "          Data Registro";
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
                    echo            $dadosPP['dataRuv'];
                    echo "      </td>";
                    echo "      <td>";
                    echo            $dadosPP['dataRegFormat'];
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
                        echo "<label class='alert alert-warning' style='text-align: center; width: 600px;'>";
                        echo "  Ops! Sem presença paragem do dia ".date('d/m/Y').". Selecione a data RUV acima, para demais consultas.";
                        echo "  <button type='button' class='close' data-dismiss='alert' aria-label='Fechar'>";
                        echo "      <span aria-hidden='true'> &times;</span>";
                        echo "  </button>";
                        echo "</label><br>";
            }
            
            echo "</div>";
            
        } catch (Exception $ex) {
            echo "Chamada de exception. Descrição: ".$ex->getMessage();
        }

        if($this->excluiParPres()){
            $a->writeLog($_SESSION['usuario'], "Exclusão da Presença-Paragem. Data RUV: ".$this->dataRuv, "../controller/");

            echo "<br><br>";
            echo "<label class='alert alert-success'>Paragem Presença excluída com sucesso! Aguarde 1 segundo.</label>";
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

        $data = filter_input(INPUT_GET, 'd');
        $dataruv_selecionada = filter_input(INPUT_GET, 'dr');
        $dia_selecionado = filter_input(INPUT_GET, 'dia');
        $semana_selecionada = filter_input(INPUT_GET, 'sem');

        if(!empty($data)){
            $this->setDataRegistro($data);
            $this->validaData($this->dataRegistro);
        }
        if(!empty($dataruv_selecionada)){
            $this->setDataRuv($dataruv_selecionada);
            $this->validaDiaDataRuv($this->dataRuv);
        }

            //$this->setDataRuv($dataruv_selecionada);

            echo "<form name='formParPres' id='formParPres' action='inicio.php?m=para' method='post'>";
            echo "          <table class='table' style='text-align: justify; border: none;'>";
            echo "              <tr>";
            echo "                  <td width='200'>";
            echo "                      <label>Data Registro";

            echo "                          <div class='input-group'>";
            echo "                              <input type='text' name='calendario' id='calendario' value='".$this->dataRegistro."' class='form-control' $desativaData placeholder='DD/MM/AAAA' required onkeyup='somenteNumeros(this)' onkeydown='enterTab(\"dataRuv\", event)' onchange='enterCampoRuv(\"data\", \"para\", this.value);'><div class='input-group-addon'><i class='fa fa-calendar'></i></div>";

            echo "                          </div>";

            echo "                      </label>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <label>Data RUV";
            echo "                          <input type='text' name='dataRuv' id='dataRuv' value='".$this->dataRuv."' class='form-control' style='width: 120px;' placeholder='A-EMS.D' required onchange='enterCampoRuv(\"dataRuv\", \"para\", this.value);' onkeypress='mascaraDataRuv(this)' onkeydown='enterTab(\"semana\", event)' onkeyup='somenteNumeros(this)' maxlength='7'>";

            echo "                      </label>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <label>Semana";
            //$semana = $this->diaAnoRuv."-".$this->semana;
            echo "                          <input type='text' name='semana' id='semana' class='form-control' value='".$this->semanaRuv."' style='width: 80px;' required onkeypress='mascaraSemana(this)' onkeydown='enterTab(\"dia\", event)' onchange='enterCampoRuv(\"semana\", \"para\", this.value);' onkeyup='somenteNumeros(this)' maxlength='5'>";
            echo "                      </label>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <label>Dia";
            echo "                          <input type='text' name='dia' id='dia' class='form-control' value='".$this->diaRuv."' style='width: 50px;' required onkeydown='enterTab(\"tarefas\", event)' onkeyup='somenteNumeros(this)'  onchange='enterCampoRuv(\"dia\", \"para\", this.value);'>"; // 
            echo "                      </label>";
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
            echo "                      <select name='tarefas' id='tarefas' class='form-control'>";
            echo "                          <option value=''>Não selecionado</option>";
            echo "                          <option value=''></option>";
           
            try{

                $sqlTabPP = "SELECT * FROM tabpresparagem";

                $resultTabPP = mysql_query($sqlTabPP) or die ("Erro no comando SQL de consulta Paragem-Presença do Sistema. Erro: ".mysql_error());

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

            echo "                      <input type='radio' name='opcao' id='opcao' value='Sim' onchange='calculaBonusTarefa(this.value)'> Sim   |   ";
            echo "                      <input type='radio' name='opcao' id='opcao' value='Não' onchange='calculaBonusTarefa(this.value)'> Não";
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
            echo "                  <td>";
            echo "                      &nbsp;";
            echo "                  </td>";
            echo "                  <td style='text-align: right;'>";
            echo "                      <a href='inicio.php' class='btn btn-default' title='Voltar' alt='Voltar'>";
            echo "                          <img src='../img/btn_back.png' width='25' height='25'>";
            echo "                      </a>";
            echo "                  </td>";
            echo "                  <td style='text-align: left;'>";
            echo "                      <button type='button' class='btn btn-default' href='#' id='salvar' name='salvar' onclick='enviaForm(\"formParPres\")'>";
            echo "                          <img src='../img/save2.png' width='25' height='25'>";
            echo "                      </button>";
            echo "                  </td>";
            echo "              </tr>";
            echo "              <tr>";
            echo "                  <td>";
            echo "                      &nbsp;";
            echo "                  </td>";
            echo "                  <td style='text-align: right;'>";
            echo "                      <a href='inicio.php' title='Voltar' alt='Voltar'>";
            echo "                          <label>Voltar</label>";
            echo "                      </a>";
            echo "                  </td>";
            echo "                  <td style='text-align: left;'>";
            echo "                      <a href='#' onclick='enviaForm(\"formParPres\")' title='Salvar' alt='Salvar'>";
            echo "                          <label>Salvar</label>";
            echo "                      </a>";
            echo "                  </td>";
            echo "              </tr>";

            /*
            echo "              <tr>";
            echo "                  <td colspan='3' style='text-align: right;'>";
            echo "                      <a href='inicio.php' class='btn btn-default'>Cancelar</a> ";
            echo "                      <button class='btn btn-primary' type='button' onclick='enviaForm(\"formParPres\")' style='width: 80px;'>Salvar</button>";
            echo "                  </td>";
            echo "              </tr>";
            */
            echo "              <tr>";
            echo "                  <td colspan='3'>";
            echo "                      <div id='erro1' name='erro1' class='alert alert-danger' style='display: none;'>";
            echo "                          Data de registro vazia";
            echo "                      </div>";
            echo "                      <div id='erro2' name='erro2' class='alert alert-danger' style='display: none;'>";
            echo "                          Data RUV vazia";
            echo "                      </div>";
            echo "                      <div id='erro3' name='erro3' class='alert alert-danger' style='display: none;'>";
            echo "                          Semana RUV vazia";
            echo "                      </div>";
            echo "                      <div id='erro4' name='erro4' class='alert alert-danger' style='display: none;'>";
            echo "                          Discriminação não selecionada";
            echo "                      </div>";
            echo "                      <div id='erro5' name='erro5' class='alert alert-danger' style='display: none;'>";
            echo "                          Status não selecionado";
            echo "                      </div>";
            echo "                      <div id='erro6' name='erro6' class='alert alert-danger' style='display: none;'>";
            echo "                          Bônus não calculado. Selecione o Status";
            echo "                      </div>";
            if($error = filter_input(INPUT_GET, 'e')){
                if($error === "11"){
                    echo "<meta http-equiv='refresh' content='3;url=inicio.php?m=para'>";
            echo "                      <div id='erro11' name='erro11' class='alert alert-danger'>";
            echo "                          O dia não pode ser maior que 8.";
            echo "                      </div>";
                }
            }
            echo "                  </td>";
            echo "              </tr>";
            echo "          </table>";
            echo "</form>";

        if($_POST){
            //$novoNivel = str_replace(",",".", filter_input(INPUT_POST, 'nivel'));
            $dataConvertida = implode("-", array_reverse(explode("/", filter_input(INPUT_POST, 'calendario'))));
            $dataRuvConvertida = implode("-", array_reverse(explode("/", filter_input(INPUT_POST, 'dataRuv'))));

            $this->dataRuv = addslashes($dataRuvConvertida);
            $this->semanaRuv = addslashes(filter_input(INPUT_POST, 'semana'));
            $this->pp = addslashes(filter_input(INPUT_POST, 'tarefas'));
            $this->status = addslashes(filter_input(INPUT_POST, 'opcao'));
            $this->bonus = addslashes(filter_input(INPUT_POST, 'bonus'));
            $this->dataRegistro = addslashes($dataConvertida);
            $this->codusuario = addslashes(filter_input(INPUT_POST, 'codusuario'));

//           if(empty($this->dataRuv) or empty($this->semanaRuv) or empty($this->pp) or empty($this->status) or empty($this->bonus)){
//                echo "<label class='alert alert-danger'>Favor preencher todos os dados.</label>";
//            }else{
            $this->insereParPres();
//            }
        }
    }
    //put your code here
}
