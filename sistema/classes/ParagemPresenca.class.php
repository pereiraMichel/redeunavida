<?php


/**
 * Description of ParagemPresenca
 *
 * @author Debug
 */
class ParagemPresenca {
    private $idParPre;
    private $semana;
    private $paragem;
    private $selecao;
    private $valor;
    private $data;
    private $codusuario;
    
    function getData() {
        return $this->data;
    }

    function setData($data) {
        $this->data = $data;
    }

    function getIdParPre() {
        return $this->idParPre;
    }

    function getSemana() {
        return $this->semana;
    }

    function getParagem() {
        return $this->paragem;
    }

    function getSelecao() {
        return $this->selecao;
    }

    function getValor() {
        return $this->valor;
    }

    function getCodusuario() {
        return $this->codusuario;
    }

    function setIdParPre($idParPre) {
        $this->idParPre = $idParPre;
    }

    function setSemana($semana) {
        $this->semana = $semana;
    }

    function setParagem($paragem) {
        $this->paragem = $paragem;
    }

    function setSelecao($selecao) {
        $this->selecao = $selecao;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setCodusuario($codusuario) {
        $this->codusuario = $codusuario;
    }

//    public function verificaPP(){
//        $conecta = new conectaBanco();
//        $conecta->conecta();
//        
//        $sqlPP = "SELECT * FROM pp WHERE codusuario = ".$this->codusuario." AND selecao = '".$this->selecao."'";
//        
//        
//        
//    }
    
    public function insereParPres(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $this->idParPre = ultimoId::ultimoIdBanco("idParagem", "paragem");
        
        $sqlInsereParPres = "INSERT INTO paragem 
                             (idParagem, semana, paragem, selecao, total, dataInclusao, codUsuario) 
                             VALUES
                             (".$this->idParPre.", '".$this->semana."', ".$this->paragem.", '".$this->selecao."', ".$this->valor.", '".$this->data."', ".$this->codusuario.")";
        
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
    
    public function telaParagemPresenca(){
        
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
    
    public function telaNovaParagem(){
//        echo "Paragem marcada: ".$this->paragem."<br>";
        echo "<form name='formNovaParagem' class='form-horizontal' action='inicio.php?m=para&t=npar' method='post'>";
        echo "  <div class='form-group'>";
        echo "      <label class='col-sm-2 control-label'>";
        echo "          Semana";
        echo "      </label>";
        echo "      <div class='col-sm-2'>";
        echo "          <input type='text' name='semana' id='semana' class='form-control' value='".$this->semana."'>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='form-group'>";
        echo "      <label class='col-sm-2 control-label'>";
        echo "          Paragem";
        echo "      </label>";
        echo "      <div class='col-sm-2'>";
        echo "          <input type='text' name='paragem' id='paragem' class='form-control'>";
        echo "          <input type='checkbox' name='checkparagem' id='checkparagem' value='".$this->getParagem()."' onclick='preencheParagem(this.value)'> Automático";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='form-group'>";
        echo "      <label class='col-sm-2 control-label'>";
        echo "          Selecione";
        echo "      </label>";
        echo "      <div class='col-sm-2'>";
//        echo "          <input type='text' name='selecao' id='selecao' class='form-control'>";// value='".$this->paragem."'
        echo "          <select name='selecao' id='selecao' class='form-control'>";
        echo "              <option value='RUV-JR'>RUV-JR</option>";
        echo "              <option value='JR'>JR</option>";
        echo "              <option value='JM'>JM</option>";
        echo "              <option value='MC'>MC</option>";
        echo "          </select>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='form-group'>";
        echo "      <label class='col-sm-2 control-label'>";
        echo "          Total";
        echo "      </label>";
        echo "      <div class='col-sm-2'>";
        echo "          <input type='text' name='total' id='total' class='form-control'>";// value='".$this->paragem."'
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
        echo "      <div class='col-sm-10' style='text-align: center;'>";
        echo "          <a href='inicio.php?m=para' class='btn btn-default'>Cancelar</a>";
        echo "          <button class='btn btn-primary' type='submit'>Salvar</button>";
        echo "      </div>";
        echo "  </div>";
        echo "</form>";
        
        if($_POST){
            $semana = addslashes($_POST['semana']);
            $paragem = addslashes($_POST['paragem']);
            $selecao = addslashes($_POST['selecao']);
            $total = addslashes($_POST['total']);
            $data = addslashes($_POST['data']);
            $codusuario = addslashes($_POST['codusuario']);
            
            $this->setSemana($semana);
            $this->setParagem($paragem);
            $this->setSelecao($selecao);
            $this->setValor($total);
            $this->setData($data);
            $this->setCodusuario($codusuario);
//            
//            echo "Usuário post: ".$codusuario;
//            echo "<br>Usuário: ".$this->codusuario;
            
            if ($this->insereParPres()){
                echo "<label class='alert alert-success'>Inserido com sucesso!</label>";
                echo "<meta http-equiv='refresh' content='5;url=inicio.php?m=para'>";
            }
            
        }
        
    }
    public function telaEditParPresenca(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $id = filter_input(INPUT_GET, 'id');
        
        $sqlParPre = "SELECT * FROM paragem WHERE idParagem = ".$id;
        
        $resultadoParPre = mysql_query($sqlParPre) or die("Error. Descrição: ".mysql_error());
        
        $dadosParPre = mysql_fetch_array($resultadoParPre);
        
//        echo "Paragem marcada: ".$this->paragem."<br>";
        echo "<form name='formEditParagem' class='form-horizontal' action='inicio.php?m=para&t=edit&id=".$id."' method='post'>";
        echo "  <div class='form-group'>";
        echo "      <label class='col-sm-2 control-label'>";
        echo "          Semana";
        echo "      </label>";
        echo "      <div class='col-sm-2'>";
        echo "          <input type='text' name='semana' id='semana' class='form-control' value='".$dadosParPre['semana']."'>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='form-group'>";
        echo "      <label class='col-sm-2 control-label'>";
        echo "          Paragem";
        echo "      </label>";
        echo "      <div class='col-sm-2'>";
        echo "          <input type='text' name='paragem' id='paragem' class='form-control' value='".$dadosParPre['paragem']."'>";
//        echo "          <input type='checkbox' name='checkparagem' id='checkparagem' onclick='preencheParagem(this.value)'> Automático";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='form-group'>";
        echo "      <label class='col-sm-2 control-label'>";
        echo "          Selecione";
        echo "      </label>";
        echo "      <div class='col-sm-2'>";
//        echo "          <input type='text' name='selecao' id='selecao' class='form-control'>";// value='".$this->paragem."'
        echo "          <select name='selecao' id='selecao' class='form-control'>";
        echo "              <option value='".$dadosParPre['selecao']."'>".$dadosParPre['selecao']."</option>";
        echo "              <option value=''></option>";
        echo "              <option value='RUV-JR'>RUV-JR</option>";
        echo "              <option value='JR'>JR</option>";
        echo "              <option value='JM'>JM</option>";
        echo "              <option value='MC'>MC</option>";
        echo "          </select>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='form-group'>";
        echo "      <label class='col-sm-2 control-label'>";
        echo "          Total";
        echo "      </label>";
        echo "      <div class='col-sm-2'>";
        echo "          <input type='text' name='total' id='total' class='form-control' value='".$dadosParPre['total']."'>";// value='".$this->paragem."'
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
        echo "      <div class='col-sm-10' style='text-align: center;'>";
        echo "          <a href='inicio.php?m=para' class='btn btn-default'>Cancelar</a>";
        echo "          <button class='btn btn-primary' type='submit'>Salvar</button>";
        echo "      </div>";
        echo "  </div>";
        echo "</form>";
        
        if($_POST){
            $idParagem = $id;
            $semana = addslashes($_POST['semana']);
            $paragem = addslashes($_POST['paragem']);
            $selecao = addslashes($_POST['selecao']);
            $total = addslashes($_POST['total']);
            $data = addslashes($_POST['data']);
            $codusuario = addslashes($_POST['codusuario']);
            
            $this->setSemana($semana);
            $this->setParagem($paragem);
            $this->setSelecao($selecao);
            $this->setValor($total);
            $this->setData($data);
            $this->setCodusuario($codusuario);
            $this->setIdParPre($idParagem);
//            
//            echo "Usuário post: ".$codusuario;
//            echo "<br>Usuário: ".$this->codusuario;
            
            if ($this->alteraParPres()){
                echo "<label class='alert alert-success'>Alterado com sucesso!</label>";
                echo "<meta http-equiv='refresh' content='5;url=inicio.php?m=para'>";
            }
            
        }
        
    }
    
    public function alteraParPres(){
        
        $sqlAlteraParPre = "UPDATE paragem SET semana='".$this->semana."', paragem='".$this->paragem."', selecao='".$this->selecao."', total='".$this->valor."' 
                            WHERE idParagem = ".$this->idParPre;
        
        try{
            $resultadoAlteracao = mysql_query($sqlAlteraParPre) or die ("Erro no comando SQL de alteração da Paragem-Presença");
            
            if($resultadoAlteracao){
                return true;
            }
            return false;
            
        } catch (Exception $ex) {
            echo "Exception ativado. Erro: ".$ex->getMessage();
        }
        
        
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
