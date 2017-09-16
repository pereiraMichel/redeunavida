<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Telefone
 *
 * @author Debug
 */
class telefone {
    
    private $idTelefone;
    private $telefone;
    private $tipoTelefone;
    private $codUsuario;
    
    function getIdTelefone() {
        return $this->idTelefone;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getTipoTelefone() {
        return $this->tipoTelefone;
    }

    function getCodUsuario() {
        return $this->codUsuario;
    }

    function setIdTelefone($idTelefone) {
        $this->idTelefone = (int) $idTelefone;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setTipoTelefone($tipoTelefone) {
        $this->tipoTelefone = (int) $tipoTelefone;
    }

    function setCodUsuario($codUsuario) {
        $this->codUsuario = (int) $codUsuario;
    }
    
    public function verificaTelefone(){

        $con = new conectaBanco();
        $con->conecta();
        //$this->idTelefone = ultimoId::ultimoIdBanco('idTelefone', 'telefone');
        
        $sqlVerificaTelefone = "SELECT * FROM telefone WHERE telefone = '".$this->telefone."' AND codUsuario = ".$this->codUsuario;
//        $sqlVerificaTelefone = "SELECT * FROM telefone WHERE idTelefone = 11 AND codUsuario = ".$this->codUsuario;

        //echo "SQL Verifica telefone: ".$sqlVerificaTelefone."<br>"; //Apresenta registro.

        try{
            $resultVerificacao = mysql_query($sqlVerificaTelefone) or die("Problema na consulta de verificação de telefone. Descrição: ".mysql_error());
            //echo "Quantidade de registros: ".mysql_num_rows($resultVerificacao)."<br>";
            if(mysql_num_rows($resultVerificacao) > 0){//Verifica se a quantidade é maior que 0
//                if($this->editTelefone()){//Vai para alteração
                    echo "<label class='alert alert-danger'>Telefone existente.</label>";
                    echo "<meta http-equiv='refresh' content='2;url=inicio.php?m=config&t=perftel'>";
//                }
            }else{
                if($this->novoTelefone()){//Vai para inclusão
                    echo "<label class='alert alert-success'>Salvo com sucesso! Aguarde 2 segundos...</label>";
                    echo "<meta http-equiv='refresh' content='2;url=inicio.php?m=config&t=perftel'>";
                }
            }
            
        } catch (Exception $ex) {
            echo EXCEPTION_VERIF.$ex->getMessage();
        }
    }

    public function novoTelefone(){
        $con = new conectaBanco();
        $con->conecta();

        $this->idTelefone = ultimoId::ultimoIdBanco("idTelefone", "telefone");

        $sqlNovoTelefone = "INSERT INTO telefone (idTelefone, telefone, tipoTelefone, codUsuario) VALUES (".$this->idTelefone.", '".$this->telefone."', ".$this->tipoTelefone.", ".$this->codUsuario.")";

//        echo "SQL Insere: ".$sqlNovoTelefone."<br>";
        try{
            $resultNovo = mysql_query($sqlNovoTelefone) or die("Erro no comando SQL no registro de telefone. Descrição: ".mysql_error());
            if($resultNovo){
                return true;
            }
            return false;
        } catch (Exception $ex) {
            echo EXCEPTION_INC.$ex->getMessage();
        }
    }
        
    public function editTelefone(){
        $sqlEditTelefone = "UPDATE telefone SET telefone=".$this->telefone.", tipoTelefone=".$this->codTipoTelefone.", codUsuario=".$this->codUsuario." WHERE idTelefone=".$this->idTelefone;
//        $sqlEditTelefone = "EDIT_TELEFONE(".$this->idTelefone.", ".$this->telefone.", ".$this->tipoTelefone.", ".$this->codUsuario.")";
        try{
            $resultEdit = mysql_query($sqlEditTelefone) or die(RETURN_SQL.mysql_error());
            if(!$resultEdit){
                echo "Não foi alterado. ".VER_ANALISTA;
            }
            mysql_close($resultEdit);
        } catch (Exception $ex) {
            echo EXCEPTION_ALT.$ex->getMessage();
        }
    }
    
    public function deleteTelefone(){
        $con = new conectaBanco();
        $con->conecta();

        $e = filter_input(INPUT_GET, 'e');

        if($e === "sim"){
            $this->idTelefone = filter_input(INPUT_GET, 'id');

            $sqlDeleteTelefone = "DELETE FROM telefone WHERE idTelefone=".$this->idTelefone;
            //echo "SQL: ".$sqlDeleteTelefone."<br>";
            try{
                $resultDelete = mysql_query($sqlDeleteTelefone) or die(RETURN_SQL.mysql_error());
                if($resultDelete){
                    return true;//echo "Não foi excluído. ".VER_ANALISTA;
                }
                return false;
            } catch (Exception $ex) {
                echo EXCEPTION_EXC.$ex->getMessage();
            }
        }
    }
    

    public function telaTelefone(){
        $conecta = new conectaBanco();
        $conecta->conecta();

        $tp = filter_input(INPUT_GET, 'tp');
        
        echo "<div class='col-xs-9 col-sm-9 placeholder'>";
        echo "  <form class='form-horizontal' style='font-size: 12px;' method='post' name='formperfil' action='inicio.php?m=config&t=perftel'>";
        echo "      <div class='form-group'>";
        echo "          <div class='row' align='left' style='padding-left: 15px;'>";
        echo "              <div class='col-xs-4 col-md-4'>";
        echo "                  <h3>";
        echo "                      Usuário: ".$_SESSION['usuario'];
        echo "                  </h3>";
        echo "              </div>";
        echo "              <div class='col-xs-8 col-md-8' style='padding-left: 15px;'>";
        echo "                  &nbsp;";
        echo "              </div>";
        echo "          </div>";
        echo "      </div>";
        echo "      <div class='col-xs-9 col-sm-9 placeholder'>";
        echo "          <form class='form-horizontal' style='font-size: 12px;' method='post' name='formperfil' action='inicio.php?m=perftel'>";
        echo "              <div class='form-group'>";
        echo "                  <div class='col-sm-12'>";
        echo "                      <table>";
        echo "                          <tr>";
        echo "                              <td width='120'>";
        echo "                                  <label for='telefone'>Tipo de telefone: </label>";
        echo "                              </td>";
        echo "                              <td colspan='2'>";
        echo "                                  <select class='form-control' id='tipoTelefone' name='tipoTelefone' onchange='selecionaTipoTelefone(this.value)'>";

        switch ($tp) {
            case '1':
                    $mascara = " onkeypress = 'mascaraTelefone(this)'";
                    $desabilita = "";
                    echo "<script> document.getElementById('telefone').focus(); </script>";
                    echo "<option value='1'>Residencial</option>";
                break;
            case '2':
                    $mascara = " onkeypress='mascaraTelefone(this)'";
                    $desabilita = "";
                    echo "<script> document.getElementById('telefone').focus(); </script>";
                    echo "<option value='2'>Comercial</option>";
                break;
            case '3':
                    $mascara = " onkeypress='mascaraCelular(this)'";
                    echo "<script> document.getElementById('telefone').focus(); </script>";
                    echo "<option value='3'>Celular</option>";
                break;
            
            default:
                    $mascara = "";
                    $desabilita = "disabled";
                # code...
                break;
        }
//        echo "                                      <option value='1'>Residencial</option>";
//        echo "                                      <option value='2'>Comercial</option>";
//        echo "                                      <option value='3'>Celular</option>";

                                                    try{
                                                        $sql = "SELECT * FROM tipotelefone";
                                                        $resultado = mysql_query($sql) or die ("Não foi possível executar o comando de consulta. Erro: ".mysql_error());
                                                        if(mysql_num_rows($resultado) > 0){
                                                            echo "<option value=''></option>";

                                                        while($dados = mysql_fetch_array($resultado)){
                                                            echo "<option value='".$dados['idTipoTelefone']."'>".$dados['nomeTipo']."</option>";
                                                        }
                                                        
                                                        }else{
                                                            echo "<option value=''>Vazio</option>";
                                                            
                                                        }

                                                    } catch (Exception $ex) {
                                                        echo "Problemas na consulta. Código E019.1. Erro: ".$ex->getMessage();
                                                    }

        echo "                                  </select>";
        echo "                              </td>";
        echo "                          </tr>";
        echo "                          <tr>";
        echo "                              <td colspan='3'>";
        echo "                                  &nbsp;";
        echo "                              </td>";
        echo "                          </tr>";
        echo "                          <tr>";
        echo "                              <td>";
        echo "                                  <label for='telefone' class='col-sm-2 control-label'>Telefone:</label>";
        echo "                              </td>";
        echo "                              <td>";
        echo "                                  <input type='tel' class='form-control' id='telefone' name='telefone' $mascara $desabilita onkeyup='somenteNumeros(this)' onkeydown='enterTab(\"btok\", event)' maxlength='9'>";
        echo "                              </td>";
        echo "                              <td>";
        echo "                                  <button class='btn btn-default' id='btok' name='btok'>Ok</button>";
        echo "                              </td>";
        echo "                          </tr>";
        echo "                  </table>";
        echo "                  </div>";
        echo "                  <div class='col-sm-12'>";
        echo "                      &nbsp;";
        echo "                  </div>";
        echo "      </div>";
        echo "      <div class='form-group'>";
        echo "              <div class='col-sm-8 table-responsive'>";
        echo "                  <table class='table table-hover' width='200' name='tabelaTelefones'>";
        echo "                      <tr>";
        echo "                          <td>";
        echo "                            <b>Nº Ordem</b>";
        echo "                          </td>";
        echo "                          <td>";
        echo "                            <b>Telefone</b>";
        echo "                          </td>";
        echo "                          <td>";
        echo "                            <b>Tipo de Telefone</b>";
        echo "                          </td>";
        echo "                          <td>";
        echo "                            <b>&nbsp;</b>";
        echo "                          </td>";
        echo "                      </tr>";
        //Consulta os telefones cadastrados
        $this->consultaTelefonePessoal();
        echo "                  </table>";
        echo "              </div>";
        echo "      </div>";
        echo "      <div style='height: 40px'>&nbsp;</div>";
        echo "      <div class='form-group'>";
//        echo "          <label for='descricao' class='col-sm-2 control-label'>Sobre você:</label>";
        echo "              <div class='col-sm-10' style='text-align:right'>";
        echo "                      <a href='inicio.php?m=config&t=perfend' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "                          <img src='../img/btn_back.png' width='25' height='25'>";
        echo "                      </a>";
        echo "                      <br>";
        echo "                      <a href='inicio.php?m=config&t=perfend title='Voltar' alt='Voltar' style='padding-right: 10px;'>";
        echo "                          <label>Voltar</label>";
        echo "                      </a>";

/*        echo "                  <a class='btn btn-default' href='inicio.php?m=config&t=perfend'>Voltar</a>";*/
//        echo "                  <button class='btn btn-primary'>Salvar</button>";
        echo "              </div>";
        echo "      </div>";
        echo "      <div style='height: 40px'>&nbsp;</div>";
        
        if($_POST){

            /* @var $_POST type */

                $this->telefone = filter_input(INPUT_POST, 'telefone');
                $this->tipoTelefone = filter_input(INPUT_POST, 'tipoTelefone');
                $this->codUsuario = $_SESSION['idusuario'];

//                echo "ID: ".$this->idTelefone."<br>";
//                echo "Telefone: ".$this->telefone."<br>";
//                echo "Tipo: ".$this->tipoTelefone."<br>";
//                echo "Código de Usuário: ".$this->codUsuario."<br>";
                
/*                $sqlTipoTelefone = "SELECT * FROM tipotelefone WHERE nomeTipo = '".$this->tipoTelefone."'";
                //echo "SQL: ".$sqlTipoTelefone."<br>";
                try{
                    $resultadoTipoTelefone = mysql_query($sqlTipoTelefone) or die("Erro no comando SQL (Inserir telefone): ".mysql_error());
                    $dadosTipoTelefone = mysql_fetch_array($resultadoTipoTelefone);
                    
                    $this->codTipoTelefone = $dadosTipoTelefone['idTipoTelefone'];
                
                }catch(Exception $ex){
                    echo "Exception ativado. Descrição: ".$ex->getMessage();
                }
                */
/*                if($this->novoTelefone()){//Vai para inclusão
                    echo "O retorno é true";
                    echo "<label class='alert alert-success'>Salvo com sucesso! Aguarde 2 segundos...</label>";
                    echo "<meta http-equiv='refresh' content='2;url=inicio.php?m=config&t=perftel'>";
                }*/
                $this->verificaTelefone();
//                if($this->verificaTelefone()){
//                    echo "<meta http-equiv='refresh' content='0;url=inicio.php?m=config&t=perftel'>";//$PHP_SELF
//                }
        }
        echo "  </form>";
        echo "</div>";
        echo "<div class='col-xs-12 col-md-12' align='left'>";
        $p = new perfil();
        $p->menuBaixoPerfil();
        echo "</div>";
        
            if($this->deleteTelefone()){
                //echo "Retorna true";
                    echo "<meta http-equiv='refresh' content='0;url=inicio.php?m=config&t=perftel'>";
//            }else{
//                echo "Retorna false";
            }
    }


    public function consultaTelefonePessoal(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
                try{
                    $sqlTelefone = "SELECT * FROM telefone t "
                            . "INNER JOIN tipotelefone tp ON tp.idTipoTelefone = t.tipoTelefone "
                            . "WHERE t.codUsuario = ".$_SESSION['idusuario']." "
                            . "ORDER BY t.idTelefone";
                    
//                    echo $sqlTelefone."<br>";
                    $resultadoTelefone = mysql_query($sqlTelefone) or die("Erro no comando SQL (Consulta Telefone). Descrição: ".mysql_error());

                    if(mysql_num_rows($resultadoTelefone) > 0){
                        while($dadosTelefone = mysql_fetch_array($resultadoTelefone)){
                            echo "                      <tr>";
                            echo "                          <td name='Telefone'>";
                            echo "                            ". $dadosTelefone['idTelefone'];
                            echo "                          </td>";
                            echo "                          <td name='Telefone'>";
                            echo "                            ". $dadosTelefone['telefone'];
                            echo "                          </td>";
                            echo "                          <td name='TipoTelefone'>";
                            echo "                            ".$dadosTelefone['nomeTipo'];
                            echo "                          </td>";
                            echo "                          <td name='Operacoes'  data-target='#myModal'>";
                            $idTelefoneSelecionado = $dadosTelefone['idTelefone'];
                            $telefoneSelecionado = $dadosTelefone['telefone'];
                            
                            echo "                              <a href='inicio.php?m=config&t=perftel&id=".$idTelefoneSelecionado."&e=sim'>";

                            echo "                                  <img src='../../images/botaoexcluir.png' title='Excluir'>";
                            
                            echo "                              </a>";
                            echo "                          </td>";
                            echo "                      </tr>";
                        }
                    }else{
                        echo "<tr>";
                        echo "  <td colspan='4'>";
                        echo "      &nbsp;";
                        echo "  </td>";
                        echo "</tr>";
                    }
                        
                } catch (Exception $ex) {
                    echo "Erro ao efetuar a consulta. Código do erro: ".$ex->getMessage();

                }

    }
    
    
    
    //put your code here
}
