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
    private $dataRuv;

    function getDataRuv(){
        return $this->dataRuv;
    }

    function setDataRuv($dataRuv){
        $this->dataRuv = $dataRuv;
    }
    
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
        $tab = filter_input(INPUT_GET, 'tab');
        $mensagem = filter_input(INPUT_GET, 'msg');
            
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
            
        $tab = filter_input(INPUT_GET, 'tab');
        
        switch($tab){
            default :
                $prt = "btn-primary";
                $reg = "btn-default";
                $bns = "btn-default";
                $pes = "btn-default";
                break;
                
            case "portal":
                $prt = "btn-primary";
                $reg = "btn-default";
                $bns = "btn-default";
                $pes = "btn-default";
                break;
                
            case "registros":
                $prt = "btn-default";
                $reg = "btn-primary";
                $bns = "btn-default";
                $pes = "btn-default";
                break;
            
            case "bonus":
                $prt = "btn-default";
                $reg = "btn-default";
                $bns = "btn-primary";
                $pes = "btn-default";
                break;
                
            case "pesquisas":
                $prt = "btn-default";
                $reg = "btn-default";
                $bns = "btn-default";
                $pes = "btn-primary";
                break;
                
        }
            echo "<p style='height: 20px;'>&nbsp;</p>";
            echo "<div class='col-sm-12'>";
            echo "  <div class='btn-group btn-group-justified' role='group'>";
            echo "          <a href='inicio.php?m=port&tab=portal' class='btn $prt' style='width: 90px;'>";
            echo "              Portal";
            echo "          </a>";
            echo "          <a href='inicio.php?m=port&tab=registros' class='btn $reg' style='width: 90px;'>";
            echo "              Registros";
            echo "          </a>";
            echo "          <a href='inicio.php?m=port&tab=bonus' class='btn $bns' style='width: 90px;'>";
            echo "              Bônus";
            echo "          </a>";
            echo "          <a href='inicio.php?m=port&tab=pesquisas' class='btn $pes' style='width: 90px;'>";
            echo "              Pesquisas";
            echo "          </a>";
            echo "  </div>";
            echo "  <p style='height: 20px;'>&nbsp;</p>";
            
            switch ($tab){
                default:
                    echo "<div id='portal'>";
                    $this->formPortal();
                    echo "</div>";
                    break;
                
                case "registros":
                    $this->telaConsultaPortal();
                    break;

                case "bonus":
                    echo "<div id='bonus'>";
                    $bonus = new bonus();
                    $bonus->setCodusuario($this->codusuario);
                    $bonus->telaBonusPortal();
                    echo "</div>";
                    break;

                case "pesquisas":
                    $pesq = new Pesquisas();
                    $pesq->telaPesquisas('portal');
                    break;
                    
            }
            echo "</div>";//fecha o col-sm-12
            
            echo "</div>";
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
            echo "<script> window.location.href='inicio.php?m=port&".$dataruv_selecionada."&e=11' </script>";
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
                $this->setSemana($this->diaAnoRuv."-".$dadosCalendario['estacao'].$dadosCalendario['diaDoMes'].$dadosCalendario['diaSemana']);
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
                $this->setSemana($dadosCalendario['ano']."-".$dadosCalendario['estacao'].$dadosCalendario['diaDoMes'].$dadosCalendario['diaSemana']);
                $this->setDiaRuv($dadosCalendario['semana']);
                //echo "<script>document.getElementById('inicio').focus();</script>";
            }

        }catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }


    }

    public function formPortal(){

        $t = filter_input(INPUT_GET, 't');

        $data = filter_input(INPUT_GET, 'd');
        $dataruv_selecionada = filter_input(INPUT_GET, 'dr');
        $dia_selecionado = filter_input(INPUT_GET, 'dia');
        $semana_selecionada = filter_input(INPUT_GET, 'sem');

        if ($t === "auto"){
            $marcaAuto = " readonly";
        }else{
            $marcaAuto = "";
        }

        if(!empty($data)){
            $this->setDataRegistro($data);
            $this->validaData($this->dataRegistro);
        }
        if(!empty($dataruv_selecionada)){
            $this->setDataRuv($dataruv_selecionada);
            $this->validaDiaDataRuv($this->dataRuv);
        }

            echo "<form name='formPortal' id='formPortal' action='inicio.php?m=port&tab=portal' method='post'>";
            $this->portaisCheck();
            echo "          <table class='table'>";
            echo "              <tr>";
            echo "                  <td style='width: 160px;'>";
            echo "                      <label>Data";
            echo "                          <div class='input-group'>";
            echo "                              <input type='text' name='calendario' id='calendario' value='".$this->dataRegistro."' class='form-control' $desativaData placeholder='DD/MM/AAAA' required onkeyup='somenteNumeros(this)' onkeydown='enterTab(\"dataRuv\", event)' onchange='enterCampoRuv(\"data\", \"port\", this.value);'><div class='input-group-addon'><i class='fa fa-calendar'></i></div>";

            echo "                          </div>";

//            echo "                          <input type='text' name='dataPortalHoje' id='dataPortalHoje' value='".date('d/m/Y')."' class='form-control' style='width: 120px;' $desativaData placeholder='DD/MM/AAAA' required onkeypress='mascaraData(this)' onkeydown='enterTab(\"dataRuv\", event)' onkeyup='somenteNumeros(this)' maxlength='10' $marcaAuto>";
            echo "                      </label>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <label>Data RUV";
            echo "                          <input type='text' name='dataRuv' id='dataRuv' value='".$this->dataRuv."' class='form-control' style='width: 120px;' $desativaData placeholder='A-EMS.D' required onchange='enterCampoRuv(\"dataRuv\", \"port\", this.value);' onkeypress='mascaraDataRuv(this)' onkeydown='enterTab(\"semana\", event)' onkeyup='somenteNumeros(this)' maxlength='7'>";
            echo "                      </label>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <label>Semana";
            echo "                          <input type='text' name='semana' id='semana' class='form-control' value='".$this->semana."' style='width: 80px;' required onkeypress='mascaraSemana(this)' onkeydown='enterTab(\"dia\", event)' onchange='enterCampoRuv(\"semana\", \"port\", this.value);' onkeyup='somenteNumeros(this)' maxlength='5'>";
            echo "                      </label>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <label>Dia";
            echo "                          <input type='text' name='dia' id='dia' class='form-control' value='".$this->diaRuv."' style='width: 50px;' onchange='enterCampoRuv(\"dia\", \"port\", this.value);' required onkeydown='enterTab(\"sonho\", event)' onkeyup='somenteNumeros(this)'>"; // 
            echo "                      </label>";
            echo "                  </td>";
            echo "              </tr>";
            echo "          </table>";
            echo "          <table class='table'>";
            echo "              <tr>";
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
            echo "              <tr>";
            echo "                  <td width='100px'>";
            echo "                      <select class='form-control' name='sonho' id='sonho' onchange='calculaPortal()'>";//preencheSonho(this.value)
            echo "                          <option value=''>&nbsp;</option>";
            echo "                          <option value='1'>Sim</option>";
            echo "                          <option value='0'>Não</option>";
            echo "                      </select>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <select class='form-control' name='compSonho' id='compSonho' onchange='calculaPortal()'>";// onchange='preencheBonusPortal(this.value)'
            echo "                          <option value=''>&nbsp;</option>";
            echo "                          <option value='1'>Sim</option>";
            echo "                          <option value='0'>Não</option>";
            echo "                      </select>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <select class='form-control' name='corpo' id='corpo' onchange='calculaPortal()'>";// onchange='calculaBonusPortal(this.value)'
            echo "                          <option value='0'>&nbsp;</option>";
            echo "                          <option value='1'>Nenhum</option>";
            echo "                          <option value='2'>Abaixo de 20 min</option>";
            echo "                          <option value='3'>Maior ou igual a 20 min e menor que 40 min</option>";
            echo "                          <option value='4'>Acima de 40 min</option>";
            echo "                      </select>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <select class='form-control' name='retrospectiva' id='retrospectiva' onchange='calculaPortal()'>";// onchange='preencheBonusPortal(this.value)'
            echo "                          <option value=''>&nbsp;</option>";
            echo "                          <option value='1'>Sim</option>";
            echo "                          <option value='0'>Não</option>";
            echo "                      </select>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <select class='form-control' name='compRetrospectiva' id='compRetrospectiva' onchange='calculaPortal()'>";
            echo "                          <option value=''>&nbsp;</option>";
            echo "                          <option value='1'>Sim</option>";
            echo "                          <option value='0'>Não</option>";
            echo "                      </select>";
            echo "                  </td>";
            echo "                  <td>";
            echo "                      <input type='text' name='bonusPortais' id='bonusPortais' class='form-control' style='width: 50px;' readonly='readonly' value='0'>";
            echo "                  </td>";
            echo "              </tr>";
            echo "              <tr>";
            echo "                  <td colspan='9'>";
            echo "                      <input type='hidden' id='codusuario' name='codusuario' value='".$_SESSION['idusuario']."'>";
            echo "                      <input type='hidden' id='valorSonho' name='valorSonho'>";
            echo "                      <input type='hidden' id='valorCompSonho' name='valorCompSonho'>";
            echo "                      <input type='hidden' id='valorCorpo' name='valorCorpo'>";
            echo "                      <input type='hidden' id='valorRetro' name='valorRetro'>";
            echo "                      <input type='hidden' id='valorCompRetro' name='valorCompRetro'>";
            echo "                  </td>";
            echo "              </tr>";

            echo "              <tr>";
            echo "                  <td colspan='7'>";
            echo "                      &nbsp;";
            echo "                  </td>";
            echo "                  <td style='text-align: right;'>";
            echo "                      <a href='inicio.php' class='btn btn-default' title='Voltar' alt='Voltar'>";
            echo "                          <img src='../img/btn_back.png' width='25' height='25'>";
            echo "                      </a>";
            echo "                  </td>";
            echo "                  <td style='text-align: left;'>";
            echo "                      <button type='button' class='btn btn-default' href='#' id='salvar' name='salvar' onclick='enviaForm(\"formPortal\")'>";
            echo "                          <img src='../img/save2.png' width='25' height='25'>";
            echo "                      </button>";
            echo "                  </td>";
            echo "              </tr>";
            echo "              <tr>";
            echo "                  <td colspan='7'>";
            echo "                      &nbsp;";
            echo "                  </td>";
            echo "                  <td style='text-align: right;'>";
            echo "                      <a href='inicio.php' title='Voltar' alt='Voltar'>";
            echo "                          <label>Voltar</label>";
            echo "                      </a>";
            echo "                  </td>";
            echo "                  <td style='text-align: left;'>";
            echo "                      <a href='#' onclick='enviaForm(\"formPortal\")' title='Salvar' alt='Salvar'>";
            echo "                          <label>Salvar</label>";
            echo "                      </a>";
            echo "                  </td>";
            echo "              </tr>";


/*            echo "              <tr>";
            echo "                  <td colspan='9' style='text-align: right;'>";
            echo "                      <a href='inicio.php' class='btn btn-default'>Cancelar</a> ";
            echo "                      <button class='btn btn-primary' type='button' onclick='enviaForm(\"formPortal\")' style='width: 80px;'>Salvar</button>";
            echo "                  </td>";
            echo "              </tr>";*/
            echo "              <tr>";
            echo "                  <td colspan='9'>";
            echo "                      <div id='erro1' name='erro1' class='alert alert-danger' style='display: none;'>";
            echo "                          Data Inválida";
            echo "                      </div>";
            echo "                      <div id='erro2' name='erro2' class='alert alert-danger' style='display: none;'>";
            echo "                          Data RUV Inválida. Preencha corretamente e somente números";
            echo "                      </div>";
            echo "                      <div id='erro3' name='erro3' class='alert alert-danger' style='display: none;'>";
            echo "                          Semana RUV Inválido.";
            echo "                      </div>";
            echo "                      <div id='erro4' name='erro4' class='alert alert-danger' style='display: none;'>";
            echo "                          Dia RUV Inválido. Preencha corretamente ou preencha a Data RUV. Somente números.";
            echo "                      </div>";
            echo "                      <div id='erro5' name='erro5' class='alert alert-danger' style='display: none;'>";
            echo "                          Sonho Inválido.";
            echo "                      </div>";
            echo "                      <div id='erro6' name='erro6' class='alert alert-danger' style='display: none;'>";
            echo "                          Completação do sonho Inválido.";
            echo "                      </div>";
            echo "                      <div id='erro7' name='erro7' class='alert alert-danger' style='display: none;'>";
            echo "                          Corpo inválido.";
            echo "                      </div>";
            echo "                      <div id='erro8' name='erro8' class='alert alert-danger' style='display: none;'>";
            echo "                          Retrospectiva Inválida.";
            echo "                      </div>";
            echo "                      <div id='erro9' name='erro9' class='alert alert-danger' style='display: none;'>";
            echo "                          Completação da Retrospectiva Inválida.";
            echo "                      </div>";
            echo "                      <div id='erro10' name='erro10' class='alert alert-danger' style='display: none;'>";
            echo "                          Bônus Inválido. Selecione o sonho, completação do sonho, corpo, retrospectiva e/ ou completação da retrospectiva.";
            echo "                      </div>";
            if($error = filter_input(INPUT_GET, 'e')){
                if($error === "11"){
                    echo "<meta http-equiv='refresh' content='3;url=inicio.php?m=port'>";
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
            $tab = filter_input(INPUT_GET, 'tab');
//            $novoNivel = str_replace(",",".", filter_input(INPUT_POST, 'nivel'));
            $dataConvertida = implode("-", array_reverse(explode("/", filter_input(INPUT_POST, 'calendario'))));
            //$dataRUVConvertida = implode("-", array_reverse(explode("/", filter_input(INPUT_POST, 'dataRuv'))));

            $this->dataRegistro = addslashes($dataConvertida);
//            $this->diaAnoRuv = addslashes(filter_input(INPUT_POST, 'diaAnoRuv'));
            $this->diaRuv = addslashes(filter_input(INPUT_POST, 'dia'));
            $this->semana = addslashes(filter_input(INPUT_POST, 'semana'));
            $this->sonho = addslashes(filter_input(INPUT_POST, 'sonho'));
            $this->compSonho = addslashes(filter_input(INPUT_POST, 'compSonho'));
            $this->corpo = addslashes(filter_input(INPUT_POST, 'corpo'));
            $this->retrospectiva = addslashes(filter_input(INPUT_POST, 'retrospectiva'));
            $this->compRetrospectiva = addslashes(filter_input(INPUT_POST, 'compRetrospectiva'));
            $this->bonus = addslashes(filter_input(INPUT_POST, 'bonusPortais'));
            $this->codusuario = addslashes(filter_input(INPUT_POST, 'codusuario'));
            $this->dataRuv = addslashes(filter_input(INPUT_POST, 'dataRuv'));

/*            if($tab === "portal"){
                
                if(empty($this->sonho)){
                    echo "<label class='alert alert-danger'>Sonho não selecionado. Por favor, selecione 'Sim' ou 'Não'.</label>";
                }else if (empty($this->compSonho)){
                    echo "<label class='alert alert-danger'>Completação do Sonho não selecionado. Por favor, selecione 'Sim' ou 'Não'.</label>";
                    echo "<p>".$this->compSonho."</p>";
                }else if (empty($this->corpo)){
                    echo "<label class='alert alert-danger'>Corpo não selecionado. Por favor, selecione 'Sim' ou 'Não'.</label>";

                }else if (empty($this->retrospectiva)){
                    echo "<label class='alert alert-danger'>Retrospectiva não selecionada. Por favor, selecione 'Sim' ou 'Não'.</label>";
                }else if (empty($this->compRetrospectiva)){
                    echo "<label class='alert alert-danger'>Completação da Retrospectiva não selecionado. Por favor, selecione 'Sim' ou 'Não'.</label>";

                }else{*/
                    if($this->sonho === "1"){
                        $this->sonho = "Sim";
                    }else{
                        $this->sonho = "Não";
                    }

                    if($this->compSonho === "1"){
                        $this->compSonho = "Sim";
                    }else{
                        $this->compSonho = "Não";
                    }

                    if($this->corpo === "0"){
                        $this->corpo = "";
                    }else if($this->corpo === "1"){
                        $this->corpo = "Nenhum";
                    }else if($this->corpo === "2"){
                        $this->corpo = "Abaixo de 20 min";
                    }else if($this->corpo === "3"){
                        $this->corpo = "Maior ou igual a 20 min e menor que 40 min";
                    }else if($this->corpo === "4"){
                        $this->corpo = "Igual ou acima de 40 min";
                    }

                    if($this->retrospectiva === "1"){
                        $this->retrospectiva = "Sim";
                    }else{
                        $this->retrospectiva = "Não";
                    }

                    if($this->compRetrospectiva === "1"){
                        $this->compRetrospectiva = "Sim";
                    }else{
                        $this->compRetrospectiva = "Não";
                    }


                //}

                    $this->novoPortal();
            //}
        }
        
    }
    
    public function novoPortal(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        $a = new atividades();
        
        $this->idportal = ultimoId::ultimoIdBanco("idportal", "portal");
        
        $sqlInserePortal = "INSERT INTO portal (idportal, diaAnoRuv, diaRuv, semana, sonho, compSonho, corpo, retro, compRetro, bonus, codusuario, dataRegistro, dataRuv) 
                        VALUES (".$this->idportal.", ".$this->diaAnoRuv.", ".$this->diaRuv.", '".$this->semana."', '".$this->sonho."', '".$this->compSonho."', '".$this->corpo."', '".$this->retrospectiva."', '".$this->compRetrospectiva."', ".$this->bonus.", ".$this->codusuario.", '".$this->dataRegistro."', '".$this->dataRuv."')";
        //echo $sqlInserePortal."<br>";
        try{
            $resultadoInserePortal = mysql_query($sqlInserePortal) or die ("Erro comando SQL (Inclusão Portal). Descrição: ".mysql_error());
            if($resultadoInserePortal){
                $a->writeLog($_SESSION['usuario'], "Inclusão da Prática dos Portais. Data RUV: ".$this->dataRuv, "../controller/");
                echo "<label class='alert alert-success'>Portal salvo com sucesso! Aguarde 2 segundos</label>";
                echo "<meta http-equiv='refresh' content='2;url=inicio.php?m=port&tab=portal'>";
                return true;
            }
            return false;
        } catch (Exception $ex) {
            echo "Chamada de exception ativada. Não foi possível inserir. Exepction: ".$ex->getMessage();
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
            
            echo "<div class='col-sm-7'>";
            echo "  <table>";
            echo "      <tr>";
            echo "          <td>";
            echo "          <div class='btn-group' data-toggle='buttons'>";
            echo "              <label class='btn btn-default $auto'>";
            echo "                  <input type='radio' name='opcao' id='auto' name='auto' onchange='preencheAutoManualPortal()'> Automático";
            echo "              </label>";
            echo "              <label class='btn btn-default $manual' style='width: 95px;'>";
            echo "                  <input type='radio' name='opcao' id='manual' name='manual' onchange='preencheAutoManualPortal()'> Manual";
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

    public function telaConsultaPortal(){

        $s = filter_input(INPUT_GET, 's');
        $ordem = filter_input(INPUT_GET, 'o');
        $a = new atividades();


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
                case 'sonho':
                        $selecionaOrdem = " ORDER BY sonho";
                    break;
                case 'compSonho':
                        $selecionaOrdem = " ORDER BY compSonho";
                    break;
                case 'corpo':
                        $selecionaOrdem = " ORDER BY corpo";
                    break;
                case 'retro':
                        $selecionaOrdem = " ORDER BY retro";
                    break;
                case 'compRetro':
                        $selecionaOrdem = " ORDER BY compRetro";
                    break;
                case 'bonus':
                        $selecionaOrdem = " ORDER BY bonus";
                    break;
                
                default:
                        $selecionaOrdem = " ORDER BY dataRuv";
                    break;
            }//fim do switch
//        }

        echo "<div class='col-sm-12'>";
//        echo "<label class='alert alert-info' role='alert' style='width: 100%;'>Portal</label>";

        $conecta = new conectaBanco();
        $conecta->conecta();
        $sqlPortal = "SELECT *, DATE_FORMAT(`dataRegistro`, '%d/%m/%Y') AS dataInclusao 
                  FROM portal
                  WHERE codusuario = ".$this->codusuario.$selecionaDataRuv.$selecionaOrdem;

        $sqlResumoPortal = "SELECT dataRuv, diaRuv FROM portal WHERE codusuario = ".$this->codusuario." GROUP BY dataRuv ORDER BY diaRuv, dataRuv";

        //echo $sqlPortal;
        
        try{
            $resultadoPortal = mysql_query($sqlPortal) or die("Erro na execução do comando SQL de consulta portal. Descrição: ".mysql_error());

            $resultadoResumoPortal = mysql_query($sqlResumoPortal) or die ("Erro na execução do comando SQL do resumo de portal. Descrição: ".mysql_error());
            

                    echo "<table class='table table-striped'>";
                    echo "  <tr>";
                    echo "      <td>";
                    echo "          <label>Selecionar Data-RUV</label>";
                    echo "      </td>";
                    echo "      <td>";
                    echo "          <select name='sDataRuv' id='sDataRuv' class='form-control' onchange='registroSelecao(this.value, \"port\")'>";
                    if(!empty($s)){
                        echo "          <option value='".$s."'>".$s."</option>";
                    }
                    echo "              <option value='Todos'></option>";
                    echo "              <option value='Todos'>Todos</option>";

                    while($dadosResumoPortal = mysql_fetch_array($resultadoResumoPortal)){
                    echo "              <option value='".$dadosResumoPortal['dataRuv']."'>".$dadosResumoPortal['dataRuv']."</option>";
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
                        if($ordem == "diaruv"){
                            echo "<option value='diaruv'>Dia RUV</option>";
                        }
                        else if($ordem == "sonho"){
                            echo "<option value='sonho'>Sonho</option>";
                        }
                        else if($ordem == "compSonho"){
                            echo "<option value='compSonho'>Completação - Sonho</option>";
                        }
                        else if($ordem == "corpo"){
                            echo "<option value='corpo'>Corpo</option>";
                        }else 
                        if($ordem == "retro"){
                            echo "<option value='retro'>Retrospectiva</option>";
                        }else 
                        if($ordem == "compRetro"){
                            echo "<option value='compRetro'>Completação - Retrospectiva</option>";
                        }else 
                        if($ordem == "bonus"){
                            echo "<option value='bonus'>Bônus</option>";
                        }
                    }
                    echo "              <option value=''></option>";
                    echo "              <option value='diaruv'>Dia RUV</option>";
                    echo "              <option value='sonho'>Sonho</option>";
                    echo "              <option value='compSonho'>Completação - Sonho</option>";
                    echo "              <option value='corpo'>Corpo</option>";
                    echo "              <option value='retro'>Retrospectiva</option>";
                    echo "              <option value='compRetro'>Completação - Retrospectiva</option>";
                    echo "              <option value='bonus'>Bônus</option>";
                    echo "          </select>";
                    echo "      </td>";
                    echo "  </tr>";
                    echo "</table>";

                if(mysql_num_rows($resultadoPortal) > 0){
                    echo "<table class='table table-striped'>";
                    echo "              <tr>";
                    echo "                  <td>";
                    echo "                      <label>Data RUV</label>";
                    echo "                  </td>";
//                    echo "                  <td>";
//                    echo "                      <label>Semana</label>";
//                    echo "                  </td>";
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
                    echo "                  <td>";
                    echo "                      <label>&nbsp;</label>";
                    echo "                  </td>";
                    echo "              </tr>";
                        while($dadosPP = mysql_fetch_array($resultadoPortal)){
                            echo "  <tr>";
                            echo "      <td>";
                            echo            $dadosPP['dataRuv'];
                            echo "      </td>";
//                            echo "      <td>";
//                            echo            $dadosPP['semana'];
//                            echo "      </td>";
                            echo "      <td>";
                            echo            $dadosPP['diaRuv'];
                            echo "      </td>";
                            echo "      <td>";
                            echo            $dadosPP['sonho'];
                            echo "      </td>";
                            echo "      <td>";
                            echo            $dadosPP['compSonho'];
                            echo "      </td>";
                            echo "      <td>";
                            echo            $dadosPP['corpo'];
                            echo "      </td>";
                            echo "      <td>";
                            echo            $dadosPP['retro'];
                            echo "      </td>";
                            echo "      <td>";
                            echo            $dadosPP['compRetro'];
                            echo "      </td>";
                            echo "      <td>";
                            echo            $dadosPP['bonus'];
                            echo "      </td>";
                            echo "      <td>";
                            $idportal = $dadosPP['idportal'];
                            echo "      <a href='inicio.php?m=port&tab=registros&e=por&id=".$idportal."' alt='Excluir' title='Excluir'>";
                            echo "          <img src='../../images/botaoexcluir.png' id='excluir' title='Excluir'>";
                            echo "      </a>";
                            echo "      <input type='hidden' name='idportal' id='idportal' value='".$idportal."'>";
                            echo "      </td>";
                            echo "  </tr>";
                        }
                        echo "</table>";
                    }else{
                        echo "<label class='alert alert-warning' style='text-align: center; width: 600px;'>";
                        echo "  Ops! Sem portal do dia ".date('d/m/Y').". Selecione a data RUV acima, para demais consultas.";
                        echo "  <button type='button' class='close' data-dismiss='alert' aria-label='Fechar'>";
                        echo "      <span aria-hidden='true'> &times;</span>";
                        echo "  </button>";
                        echo "</label><br>";
                    }
//                    echo "</div>";
            
            if($this->excluirPortal()){
                $a->writeLog($_SESSION['usuario'], "Exclusão da prática dos portais. Data RUV: ".$this->dataRuv, "../controller/");

                echo "<label class='alert alert-success'>Portal excluído com sucesso! Aguarde 2 segundos</label>";
                echo "<meta http-equiv='refresh' content='1;url=inicio.php?m=port&tab=registros'>";
            }
            
        } catch (Exception $ex) {
            echo "Chamada de exception. Descrição: ".$ex->getMessage();
        }
        echo "</div>";//fecha a div col-sm-6
    }
    
    public function excluirPortal(){
        $e = filter_input(INPUT_GET, 'e');
        $id = filter_input(INPUT_GET, 'id');
        
//        if($tabela === "portal"){
            if($e === "por"){
                $conecta = new conectaBanco();
                $conecta->conecta();

                $sqlDeletaPP = "DELETE FROM portal WHERE idportal=".$id;

                try{

                    $resultadoDeletaPP = mysql_query($sqlDeletaPP) or die ("Erro no comando de exclusão. Descrição: ".mysql_error());

                    if($resultadoDeletaPP){
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
    
}
