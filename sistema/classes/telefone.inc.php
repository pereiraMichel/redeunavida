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
        $this->idTelefone = ultimoId::ultimoId('idTelefone', 'telefone');
        
        $sqlVerificaTelefone = "SELECT * FROM telefone WHERE telefone = '".$this->telefone."' AND codUsuario = ".$this->codUsuario;
        try{
            $resultVerifica = mysql_query($sqlVerificaTelefone) or die(RETURN_SQL.mysql_error());
            if(mysql_num_rows($resultVerifica) > 0){//Verifica se a quantidade é maior que 0
                $this->editTelefone();//Vai para alteração
            }else{
                $this->novoTelefone();//Vai para inclusão
            }
            
        } catch (Exception $ex) {
            echo EXCEPTION_VERIF.$ex->getMessage();
        }
    }

    public function novoTelefone(){
        $sqlNovoTelefone = "INSERT INTO telefone (idTelefone, telefone, tipoTelefone, codUsuario) VALUES (".$this->idTelefone.", '".$this->telefone."', ".$this->tipoTelefone.", ".$this->codUsuario.")";
        try{
            $resultNovo = mysql_query($sqlNovoTelefone) or die(RETURN_SQL.mysql_error());
            if(!$resultNovo){
                echo "Não foi inserido. ".VER_ANALISTA;
            }
            mysql_close($resultNovo);
        } catch (Exception $ex) {
            echo EXCEPTION_INC.$ex->getMessage();
        }
    }
        
    public function editTelefone(){
        $sqlEditTelefone = "UPDATE telefone SET telefone=".$this->telefone.", tipoTelefone=".$this->tipoTelefone.", codUsuario=".$this->codUsuario." WHERE idTelefone=".$this->idTelefone;
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
        $sqlDeleteTelefone = "DELETE FROM telefone WHERE idTelefone=".$this->idTelefone;
//        $sqlDeleteTelefone = "DELETE_TELEFONE(".$this->idTelefone.")";
        try{
            $resultDelete = mysql_query($sqlDeleteTelefone) or die(RETURN_SQL.mysql_error());
            if(!$resultDelete){
                echo "Não foi excluído. ".VER_ANALISTA;
            }
            mysql_close($resultDelete);
        } catch (Exception $ex) {
            echo EXCEPTION_EXC.$ex->getMessage();
        }
    }
    
//                echo "  <div class='col-xs-12 col-md-12' style='padding-left: 15px; text-align: justify;'>";
//                echo "      <h5>";
//                echo "          <b>Telefones</b>: ";
//                echo "      </h5>";
//                echo "  </div>";
//                if($dados['idPerfil'] != ""){
//                $sqlTelefone = "SELECT telefone FROM telefone t "
//                        . "INNER JOIN tblusuario tu ON t.codUsuario = tu.idUsuario "
//                        . "INNER JOIN perfil p ON p.codUsuario = tu.idUsuario";
//                $resultadoTelefone = mysql_query($sqlTelefone) or die("Houve um erro no SQL da consulta do perfil. Erro: ".mysql_error());
//                
//                if(mysql_num_rows($resultadoTelefone) > 0){
//                
//                while($dadosTelefone = mysql_fetch_array($resultadoTelefone)){
//                    echo "      <h5>";
//                    echo            $dadosTelefone['telefone'];
//                    echo "      </h5>";
//                }
//                }else{
//                    echo "      <h5>";
//                    echo "           Telefone(s) Inexistente(s).";
//                    echo "      </h5>";
//                }
//                echo "  </div>";

    public function telaTelefone(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        echo "<div class='col-xs-9 col-sm-9 placeholder'>";
        echo "  <form class='form-horizontal' style='font-size: 12px;' method='post' name='formperfil' action='inicio.php?m=perftel'>";
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
        echo "                  <label for='telefone' class='col-sm-2 control-label'>Telefone:</label>";
        echo "                  <div class='col-sm-3'>";
        echo "                      <input type='tel' class='form-control' id='telefone' name='telefone'>";
        echo "                  </div>";
        echo "                  <div class='col-sm-3' s>";
        echo "                      <select class='form-control' id='tipoTelefone' name='tipoTelefone'>";

                                    try{
                                        $sql = "SELECT * FROM tipotelefone";
                                        $resultado = mysql_query($sql) or die ("Não foi possível executar o comando de consulta. Erro: ".mysql_error());
                                        if(mysql_num_rows($resultado) > 0){
                                            echo "<option name=''></option>";

                                        while($dados = mysql_fetch_array($resultado)){
                                            echo "<option name='".$dados['idTipoTelefone']."'>".$dados['nomeTipo']."</option>";
                                        }
                                        
                                        }else{
                                            echo "<option name=''>Vazio</option>";
                                            
                                        }

                                    } catch (Exception $ex) {
                                        echo "Problemas na consulta. Código E019.1. Erro: ".$ex->getMessage();
                                    }

        echo "                  </select>";
        echo "              </div>";
        echo "              <div class='col-sm-3'>";
        echo "                  <button class='btn btn-default'>Ok</button>";
        echo "              </div>";
        echo "      </div>";
        echo "      <div class='form-group'>";
        echo "              <div class='col-sm-8 table-responsive'>";
        echo "                  <table class='table table-hover' width='150' name='tabelaTelefones'>";
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
        echo "                            <b>Operações</b>";
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
        echo "                  <button class='btn btn-default' onclick='javascript: history.go(-1)'>Voltar</button>";
        echo "                  <button class='btn btn-primary'>Salvar</button>";
        echo "              </div>";
        echo "      </div>";
        echo "      <div style='height: 40px'>&nbsp;</div>";
        
        if($_POST){

            /* @var $_POST type */
            
                $telefone = filter_input(INPUT_POST, 'telefone');
                $tipoTelefone = filter_input(INPUT_POST, 'tipoTelefone');
                $this->codPerfil = $_SESSION['idusuario'];
                
                $sqlTipoTelefone = "SELECT * FROM tbltipotelefone WHERE nomeTipoTelefone = '".$tipoTelefone."'";
                $resultadoTipoTelefone = mysql_query($sqlTipoTelefone);
                $dadosTipoTelefone = mysql_fetch_array($resultadoTipoTelefone);
                
                $this->codTipoTelefone = $dadosTipoTelefone['idTipoTelefone'];
                
                $this->telefone = $telefone;
                
                $this->cadastraTelefone();
                echo "<meta HTTP-EQUIV='Refresh' CONTENT='3; URL=".$PHP_SELF."'>";
        }
        echo "  </form>";
        echo "</div>";
        echo "<div class='col-xs-9 col-md-9' align='left'>";
        echo "  <div class='btn-group' role='group' aria-label='...'>";
        echo "      <a href='inicio.php?m=perf' style='text-decoration: none;'>";
        echo "          <button class='btn btn-default'>";
        echo "              Sobre você";
        echo "          </button>";
        echo "      </a>";
        echo "      <a href='inicio.php?m=perfend' style='text-decoration: none;'>";
        echo "          <button class='btn btn-default'>";
        echo "              Seu endereço";
        echo "          </button>";
        echo "      </a>";
        echo "      <a href='#' style='text-decoration: none;'>";
        echo "          <button class='btn btn-default' disabled>";
        echo "              Telefones";
        echo "          </button>";
        echo "      </a>";
        echo "      <a href='inicio.php?m=trocasenha' style='text-decoration: none;'>";
        echo "          <button class='btn btn-default'>";
        echo "              Troca de Senha";
        echo "          </button>";
        echo "      </a>";
        echo "  </div>";
        echo "</div>";
        
        if(filter_input(INPUT_GET, 'exclui') === "sim"){
            try{
                $sqlExclusao = "DELETE FROM tbltelefone WHERE idTelefone = ". filter_input(INPUT_GET, 'idtelefone');
                echo "<h1 style='text-align: right;'>".$sqlExclusao."</h1>";
                $resultado = mysql_query($sqlExclusao) or die("Erro. Motivo: ".  mysql_error());
                /* @var $resultado type */
                if ($resultado) {
                    echo "<h1>Exclusão efetuada com sucesso!</h1>";
                    header("Location: inicio.php?menu=perfiltel");
                    echo "<meta HTTP-EQUIV='Refresh' CONTENT='3; URL=".$PHP_SELF."'>";

                } else {
                    header("Location: inicio.php?menu=perfiltel&erro=2");
                }
            } catch (Exception $ex) {
                echo "Não foi possível excluir o telefone. Erro: ".$ex->getMessage();
            }
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
                    $resultadoTelefone = mysql_query($sqlTelefone) or die("Erro no comando SQL. Descrição: ".mysql_error());

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
                            echo "                            ".$dadosTelefone['nomeTipoTelefone'];
                            echo "                          </td>";
                            echo "                          <td name='Operacoes'  data-target='#myModal'>";
                            $idTelefoneSelecionado = $dadosTelefone['idTelefone'];
                            $telefoneSelecionado = $dadosTelefone['telefone'];
                            
                            echo "<a data-toggle='modal' href='inicio.php?menu=perfiltel&idtelefone=".$idTelefoneSelecionado."&telefone=".$telefoneSelecionado."&modal=sim'>";

                            echo "  <img src='../../images/botaoexcluir.png' title='Excluir' data-target='#myModal'>";
                            
                            echo "</a>";
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
