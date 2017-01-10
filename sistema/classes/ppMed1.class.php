<?php

/**
 * PP do preenchimento 1
 *
 * @author Debug
 */
class ppMed1 {
    
    //Preenchimento 1
    private $idpp1;
    private $mn;
    private $td;
    private $nn;
    private $md;
    private $soma;
    private $percentual;
    private $codPP;
    private $codusuario;

    private $mesExtenso;
    private $diaSemana;
    private $hora;
    private $duracao;
    private $nivel;
    private $dataRegistro;
    
    
    function getDataRegistro() {
        return $this->dataRegistro;
    }

    function setDataRegistro($dataRegistro) {
        $this->dataRegistro = $dataRegistro;
    }

        
    function getCodusuario() {
        return $this->codusuario;
    }

    function setCodusuario($codusuario) {
        $this->codusuario = $codusuario;
    }

    function getMesExtenso() {
        return $this->mesExtenso;
    }

    function getDiaSemana() {
        return $this->diaSemana;
    }

    function getHora() {
        return $this->hora;
    }

    function getDuracao() {
        return $this->duracao;
    }

    function getNivel() {
        return $this->nivel;
    }
    function setMesExtenso($mesExtenso) {
        $this->mesExtenso = $mesExtenso;
    }

    function setDiaSemana($diaSemana) {
        $this->diaSemana = $diaSemana;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setDuracao($duracao) {
        $this->duracao = $duracao;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }
    
    
    function getPercentual() {
        return $this->percentual;
    }

    function setPercentual($percentual) {
        $this->percentual = $percentual;
    }
    
    function getIdpp1() {
        return $this->idpp1;
    }

    function getMn() {
        return $this->mn;
    }

    function getTd() {
        return $this->td;
    }

    function getNn() {
        return $this->nn;
    }

    function getMd() {
        return $this->md;
    }

    function getSoma() {
        return $this->soma;
    }

    function getCodPP() {
        return $this->codPP;
    }

    function setIdpp1($idpp1) {
        $this->idpp1 = $idpp1;
    }

    function setMn($mn) {
        $this->mn = $mn;
    }

    function setTd($td) {
        $this->td = $td;
    }

    function setNn($nn) {
        $this->nn = $nn;
    }

    function setMd($md) {
        $this->md = $md;
    }

    function setSoma($soma) {
        $this->soma = $soma;
    }

    function setCodPP($codPP) {
        $this->codPP = $codPP;
    }

    public function verificaPP1(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $sqlVerificaPP1 = "SELECT * FROM ppum WHERE codpp = ".$this->codPP." AND codusuario = ".$this->codusuario;
        
        try{
            
            $resultadoVerificaPP = mysql_query($sqlVerificaPP1) or die("Nâo foi possível executar o comando SQL. Erro: ".mysql_error());
            
            if(mysql_num_rows($resultadoVerificaPP) > 0){
                $dadosVerificaPP = mysql_fetch_array($resultadoVerificaPP);
                $this->idpp1 = $dadosVerificaPP['idppum'];
                $this->alteraPP1();
            }else{
                $this->incluiPP1();
            }
            
        } catch (Exception $ex) {
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }
        
    }
    
    public function incluiPP1(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $this->idpp1 = ultimoId::ultimoIdBanco("idppum", "ppum");
        
        $sqlIncluiPP1 = "INSERT INTO ppum 
                         (idppum, mn, td, nn, md, soma, percentual, mesextenso, diasemana, hora, duracao, nivel, codpp, codusuario, dataRegistro)
                         VALUES 
                         (".$this->idpp1.", ".$this->mn.", ".$this->td.", ".$this->nn.", ".$this->md.", ".$this->soma.", 0, '".$this->mesExtenso."', '".$this->diaSemana."', '".$this->hora."', '".$this->duracao."', ".$this->nivel.", ".$this->codPP.", ".$this->codusuario.", '".$this->dataRegistro."')";

//        echo "<br>".$sqlIncluiPP1."<br>";
        
        try{
            
            $resultadoIncluiPP1 = mysql_query($sqlIncluiPP1) or die("Nâo foi possível executar o comando de inclusão SQL. Erro: ".mysql_error());

            if($resultadoIncluiPP1){
                $servico = filter_input(INPUT_GET, 's');
                echo "<meta http-equiv='refresh' content='0;url=inicio.php?m=pp&t=p1&s=".$servico."'>";
            }
            return false;
        } catch (Exception $ex) {
            echo "Exception ativado (Inclusão). Descrição: ".$ex->getMessage();
        }
        
    }
    
    public function alteraPP1(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $sqlAlteraPP1 = "UPDATE ppum 
                         mn = ".$this->mn.", 
                         td = ".$this->td.", 
                         nn = ".$this->nn.", 
                         md = ".$this->md.", 
                         soma = ".$this->soma.", 
                         percentual = ".$this->percentual.", 
                         mesextenso = '".$this->mesExtenso."', 
                         diasemana = '".$this->diaSemana."', 
                         hora = '".$this->hora."', 
                         duracao = '".$this->duracao."', 
                         nivel = ".$this->nivel.", 
                         codpp = ".$this->codPP.", 
                         codusuario = ".$this->codusuario."
                         WHERE idppum = ".$this->idpp1;
        
//        echo "<br>".$sqlAlteraPP1."<br>";
        
        try{
            
            $resultadoAlteraPP1 = mysql_query($sqlAlteraPP1) or die("Nâo foi possível executar o comando de inclusão SQL. Erro: ".mysql_error());

            if($resultadoAlteraPP1){
                return true;
            }
            return false;
        } catch (Exception $ex) {
            echo "Exception ativado (Alteração). Descrição: ".$ex->getMessage();
        }
        
    }
    
    public function telaPP1(){
        
        $conecta = new conectaBanco();
        $conecta->conecta();
        
//        echo "<meta http-equiv='refresh' content='5;url=inicio.php?m=pp&t=p1&s=3'>";
        
        $this->codPP = filter_input(INPUT_GET, 's');
        
        $sqlPPUm = "SELECT *, 
                        (SELECT SUM(soma) 
                        FROM ppum WHERE codpp=".$this->codPP."
                        AND codusuario=".$this->codusuario.") AS somaSemanal,
                        (SELECT SUM(percentual) 
                        FROM ppum WHERE codpp=".$this->codPP."
                        AND codusuario=".$this->codusuario.") AS percentualTotal
                  FROM ppum WHERE codpp = ".$this->codPP." 
                  AND codusuario = ".$this->codusuario;
//        echo "<br>".$sqlPPUm."<br>";

        $sqlPP = "SELECT paragem FROM pp WHERE idpp=".$this->codPP;
        
        $sqlSomaSemanal = "SELECT SUM(soma) AS somaSemanal
                           FROM ppum WHERE codpp=".$this->codPP."
                           AND codusuario=".$this->codusuario;

        
        try{
            $resultadoPPUm = mysql_query($sqlPPUm) or die("Erro na execução do comando SQL de consulta Preenchimento 1. Descrição: ".mysql_error());
            $resultadoPP = mysql_query($sqlPP) or die("Erro na execução do comando SQL de consulta PP. Descrição: ".mysql_error());
            
            $resultadoSoma = mysql_query($sqlSomaSemanal) or die ("Erro na execução do comando SQL de soma. Descrição: ".mysql_error());
            
            $dados = mysql_fetch_array($resultadoPP);
            
            $dadosSoma = mysql_fetch_array($resultadoSoma);
            
            echo "<div class='col-sm-4'>";
            echo "  <label>Mês</label>";
            echo "</div>";
            echo "<div class='col-sm-4'>";
            echo "  <label> Paragem<br>".$dados['paragem']."</label>";
            echo "</div>";
            echo "<div class='col-sm-4'>";
            echo "  <label>Hora <div id='hora'></div></label>";
            echo "</div>";
            echo "<div style='height: 50px;'></div>";
            echo "<div class='col-sm-12'>";
            echo "<form name='formpp' action='inicio.php?m=pp&t=p1&s=".$this->codPP."' method='post'>";
//            if(mysql_num_rows($resultadoPP) > 0){
                echo "<table class='table'>";
                echo "  <tr>";
                echo "      <td>";
                echo "          Mês";
                echo "      </td>";
                echo "      <td>";
                echo "          Semana";
                echo "      </td>";
                echo "      <td>";
                echo "          Data";
                echo "      </td>";
                echo "      <td>";
                echo "          Hora";
                echo "      </td>";
                echo "      <td>";
                echo "          Duração";
                echo "      </td>";
                echo "      <td>";
                echo "          Nível";
                echo "      </td>";
                echo "      <td>";
                echo "          Mn";
                echo "      </td>";
                echo "      <td>";
                echo "          Td";
                echo "      </td>";
                echo "      <td>";
                echo "          Nn";
                echo "      </td>";
                echo "      <td>";
                echo "          Md";
                echo "      </td>";
                echo "      <td>";
                echo "          Soma do dia";
                echo "      </td>";
//                echo "      <td>";
//                echo "          Soma Semanal";
//                echo "      </td>";
//                echo "      <td>";
//                echo "          Percentual";
//                echo "      </td>";
                echo "      <td>";
                echo "          &nbsp;";
                echo "      </td>";
                echo "  </tr>";
                while($dadosPPUm = mysql_fetch_array($resultadoPPUm)){
                    echo "  <tr>";
                    echo "      <td>";
                    echo            $dadosPPUm['mesextenso'];
                    echo "      </td>";
                    echo "      <td>";
                    echo            $dadosPPUm['diasemana'];
                    echo "      </td>";
                    echo "      <td>";
                    echo            $dadosPPUm['dataRegistro'];
                    echo "      </td>";
                    echo "      <td>";
                    echo            $dadosPPUm['hora'];
                    echo "      </td>";
                    echo "      <td>";
                    echo            $dadosPPUm['duracao'];
                    echo "      </td>";
                    echo "      <td>";
                    echo            $dadosPPUm['nivel'];
                    echo "      </td>";
                    echo "      <td>";
                    echo            $dadosPPUm['mn'];
                    echo "      </td>";
                    echo "      <td>";
                    echo            $dadosPPUm['td'];
                    echo "      </td>";
                    echo "      <td>";
                    echo            $dadosPPUm['nn'];
                    echo "      </td>";
                    echo "      <td>";
                    echo            $dadosPPUm['md'];
                    echo "      </td>";
                    echo "      <td>";
                    echo            $dadosPPUm['soma'];
                    echo "      </td>";
//                    echo "      <td>";
//                    echo            $dadosPPUm['somaSemanal'];
//                    echo "      </td>";
//                    echo "      <td>";
//                    echo            $dadosPPUm['percentualTotal'];
//                    echo "      </td>";
                    echo "      <td>";
                                $idppum = $dadosPPUm['idppum'];
                    echo "          <a href='inicio.php?m=pp&t=p1&s=".$this->codPP."&e=".$idppum."'>";
                    echo "              <img src='../../images/botaoexcluir.png'>";
                    echo "          </a>";
                    echo "      </td>";
                    echo "  </tr>";
//                    echo "  <tr>";
//                    echo "      <td colspan='11'>";
//                    echo "          &nbsp;";
//                    echo "      </td>";
//                    echo "  </tr>";
                }
//                echo "<p style='height: 50px;'></p>";
                echo "  <tr>";
                echo "      <td colspan='5'>";
                echo "          <label>Soma da Semana: ".$dadosSoma['somaSemanal'];
                echo "          </label>";
                echo "      </td>";
                echo "      <td colspan='5'>";
                $somaPercentual = $dadosSoma['somaSemanal']/35;
                $multiplica = $somaPercentual * 100;
                echo "          <label>Percentual: ".number_format($multiplica, 2, ",", ".")."%";
//                    $this->percentual = number_format($multiplica, 2, ",", ".");
                echo "          </label>";
                echo "      </td>";
                echo "      <td colspan='1'>";
                echo "          &nbsp;";
                echo "      </td>";
                echo "  </tr>";
                echo "  <tr>";
                echo "      <td colspan='14'>";
                echo "          &nbsp;";
                echo "      </td>";
                echo "  </tr>";
                echo "  <tr>";
                echo "      <td>";
                echo "          <input type='text' placeholder='Mês' id='mes' name='mes' class='form-control' required>";
                echo "      </td>";
                echo "      <td>";
                echo "          <input type='text' placeholder='Semana' id='semana' name='semana' class='form-control' required>";
                echo "      </td>";
                echo "      <td>";
                echo "          <input type='text' placeholder='Data' id='data' name='data' class='form-control' required>";
                echo "      </td>";
                echo "      <td>";
                echo "          <input type='text' placeholder='Hora' id='horaAuto' name='horaAuto' class='form-control' required>";
//                echo "          <div class='checkbox'>";
                $hora = date("H:i:s");
                echo "              <input type='checkbox' onclick='preencheHora()' name='checkHora' id='checkHora'> Automático";
//                echo "          </div>";
                echo "      </td>";
                echo "      <td>";
                echo "          <input type='number' placeholder='Duração' id='duracao' name='duracao' class='form-control' required>";
                echo "      </td>";
                echo "      <td>";
                echo "          <input type='text' placeholder='Nível' id='nivel' name='nivel' class='form-control' required>";
                echo "      </td>";
                echo "      <td>";
                echo "          <input type='number' placeholder='Mn' id='mn' name='mn' class='form-control' onkeyup='javascript: verificaCaracteres(this.value, \"mn\")' required>";
                echo "      </td>";
                echo "      <td>";
                echo "          <input type='number' placeholder='Td' id='td' name='td' class='form-control' onkeyup='javascript: verificaCaracteres(this.value, \"td\")' required>";
                echo "      </td>";
                echo "      <td>";
                echo "          <input type='number' placeholder='Nn' id='nn' name='nn' class='form-control' onkeyup='javascript: verificaCaracteres(this.value, \"nn\")' required>";
                echo "      </td>";
                echo "      <td>";
                echo "          <input type='number' placeholder='Md' id='md' name='md' class='form-control' onkeyup='javascript: verificaCaracteres(this.value, \"md\")' onchange='javascript: calculaPP1();' required>";
                echo "      </td>";
//                echo "      <td>";
//                echo "          <input type='text' placeholder='Md' id='md' name='md' onchange='javascript: calculaPP1();' class='form-control' required>";
//                echo "      </td>";
                echo "      <td>";
                echo "          <input type='text' placeholder='Soma' id='somaDoDia' name='somaDoDia' class='form-control' readonly>";
                echo "      </td>";
                echo "      <td>";
                echo "          &nbsp;";
                echo "          <input type='hidden' id='codpp' name='codpp' value='".$this->codPP."' class='form-control'>";
                echo "          <input type='hidden' id='codusuario' name='codusuario' value='".$_SESSION['idusuario']."' class='form-control'>";
                echo "      </td>";
                echo "  </tr>";
                
                echo "</table>";
                echo "<p style='height: 50px;'></p>";
//                echo "<a class='btn btn-default' href='#'>Consulta</a> | ";
                echo "<a class='btn btn-default' href='inicio.php?m=pp'>Voltar</a> | ";
                echo "<button class='btn btn-primary' type='submit'>Salvar</button>";

            echo "  </form>";
            echo "</div>";
            
            if($_POST){
                
                $mes = addslashes($_POST['mes']);
                $semana = addslashes($_POST['semana']);
                $dataRegistro = addslashes($_POST['data']);
                $hora = addslashes($_POST['horaAuto']);
                $duracao = addslashes($_POST['duracao']);
                $nivel = addslashes($_POST['nivel']);
                $mn = addslashes($_POST['mn']);
                $td = addslashes($_POST['td']);
                $nn = addslashes($_POST['nn']);
                $md = addslashes($_POST['md']);
                $somaDoDia = addslashes($_POST['somaDoDia']);
//                $somasemanal = addslashes($_POST['somasemanal']);
//                $percentual = addslashes($_POST['percentual']);
//                echo "Soma do dia: ".$somaDoDia;
                $this->mesExtenso = $mes;
                $this->diaSemana = $semana;
                $this->dataRegistro = $dataRegistro;
                $this->hora = $hora;
                $this->duracao = $duracao;
                $this->nivel = $nivel;
                $this->mn = $mn;
                $this->td = $td;
                $this->nn = $nn;
                $this->md = $md;
                $this->soma = $somaDoDia;
//                $this->percentual = $percentual;
                
                $this->incluiPP1();
                
            }
        } catch (Exception $ex) {
            echo "Chamada de exception. Descrição: ".$ex->getMessage();
        }
        
        $ePPUm = filter_input(INPUT_GET, 'e');
        
        if($ePPUm <> "" or $ePPUm <> null or $ePPUm <> " "){
            $this->exclusaoPPUm($ePPUm);
        }
    }
    
    public function exclusaoPPUm($num){
        
        if($num){
            $conecta = new conectaBanco();
            $conecta->conecta();
                $sqlExclusaoPPum = "DELETE FROM ppum WHERE idppum=".$num;
                try{
                    $resultadoExclusao = mysql_query($sqlExclusaoPPum) or die("Erro no comando SQL. Descrição: ".mysql_error());
                    if($resultadoExclusao){
                        echo "<p style='heigth: 20px;'>&nbsp;</p>";
                        echo "<label class='alert alert-success' role='alert'>Excluído com sucesso! <a class='btn btn-success' href='inicio.php?m=pp&t=p1&s=".$num."'>OK</button></a>";
                    }else{
                        echo "<div class='alert alert-danger' role='alert'>Não foi excluído</div>";
                    }
                } catch (Exception $ex) {
                    echo "Chamada de exception ativada. Descrição: ".$ex->getMessage();
                }
        }
    }
    
    public function telaNovoPP1(){

        echo "<form name='formNovoPP' class='form-horizontal' action='inicio.php?m=pp&t=npp' method='post'>";
        echo "  <div class='form-group'>";
        echo "      <label class='col-sm-2 control-label'>";
        echo "          Ano RUV";
        echo "      </label>";
        echo "      <div class='col-sm-2'>";
        echo "          <input type='text' name='diaAnoRuv' id='diaAnoRuv' class='form-control' value='".$this->diaAnoRuv."'>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='form-group'>";
        echo "      <label class='col-sm-2 control-label'>";
        echo "          Mês RUV";
        echo "      </label>";
        echo "      <div class='col-sm-2'>";
        echo "          <input type='text' name='diaMesRuv' id='diaMesRuv' class='form-control' value='".$this->diaMesRuv."'>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='form-group'>";
        echo "      <label class='col-sm-2 control-label'>";
        echo "          Paragem";
        echo "      </label>";
        echo "      <div class='col-sm-2'>";
        echo "          <input type='text' name='paragem' id='paragem' class='form-control'>";// value='".$this->paragem."'
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
            $novoAnoRuv = addslashes($_POST['diaAnoRuv']);
            $novoMesRuv = addslashes($_POST['diaMesRuv']);
            $paragem = addslashes($_POST['paragem']);
            $codusuario = addslashes($_SESSION['idusuario']);
            
            $this->setDiaAnoRuv($novoAnoRuv);
            $this->setDiaMesRuv($novoMesRuv);
            $this->setParagem($paragem);
            $this->setCodusuario($codusuario);
            
//            echo "<br>DiaAnoRuv: ".$novoAnoRuv;
//            echo "<br>DiaMêsRuv: ".$novoMesRuv;
//            echo "<br>Paragem: ".$paragem;
//            echo "<br>Cod. Usuário: ".$codusuario;
            
            $this->verificaPP();
            
        }
        
    }
    
        
    //put your code here
}
