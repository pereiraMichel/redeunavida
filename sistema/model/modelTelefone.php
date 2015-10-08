<?php


class modelTelefone {

    private $idTelefone;
    private $telefone;
    private $codTipoTelefone;
    private $codPerfil;
    private $autorizaExclusao = false;
    
    public function getIdTelefone() {
        return $this->idTelefone;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getCodTipoTelefone() {
        return $this->codTipoTelefone;
    }

    public function getCodPerfil() {
        return $this->codPerfil;
    }

    public function setIdTelefone($idTelefone) {
        $this->idTelefone = $idTelefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setCodTipoTelefone($codTipoTelefone) {
        $this->codTipoTelefone = $codTipoTelefone;
    }

    public function setCodPerfil($codPerfil) {
        $this->codPerfil = $codPerfil;
    }
    
    public function consultaUltimoRegistro(){
        try{
            $sql = "SELECT MAX(idTelefone) AS idTelefone FROM tbltelefone";
            $resultado = mysql_query($sql);
            
            $dados = mysql_fetch_array($resultado);
            
            $novoId = (int) $dados['idTelefone'] + 1;
            
            $this->idTelefone = $novoId;
            
        } catch (Exception $ex) {
            echo "Erro ao consultar o(s) telefone(s). Erro: ".$ex->getMessage();
        }
    }
    
    public function verificaTelefone(){
        try{
            $sqlVerificaTelefone="SELECT telefone FROM tbltelefone WHERE telefone = '".$this->telefone."'";
            $resultadoVerifica = mysql_query($sqlVerificaTelefone);
            $dadosResultado = mysql_fetch_array($resultadoVerifica);
            
            if($dadosResultado > 0){
                return true;
            }else{
                return false;
            }
            
        } catch (Exception $ex) {
            echo "Problemas na verificação do telefone. Erro: ".$ex->getMessage();
            return false;
        }
    }

    public function consultaTelefonePessoal(){
        
                try{
                    $sqlTelefone = "SELECT * FROM tbltelefone t "
                            . "INNER JOIN tbltipotelefone tp ON tp.idTipoTelefone = t.codTipoTelefone "
                            . "WHERE t.codPerfil = ".base64_decode($_GET['usuario'])." "
                            . "ORDER BY t.idTelefone";
                    
                    $resultadoTelefone = mysql_query($sqlTelefone);

                        
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
                            
//                            echo "<a data-toggle='modal' data-target='#myModal' href='".$this->deletaTelefone($idTelefoneSelecionado, $telefoneSelecionado)."'>";
//                            echo "<a data-toggle='modal' href='".$this->deletaTelefone(true, filter_input(INPUT_GET, 'usuario'), $idTelefoneSelecionado, $telefoneSelecionado)."'>";
//                            echo "<a data-toggle='modal' data-target='#myModal' onclick='javascript:excluirTelefone(".$idTelefoneSelecionado.", \"$telefoneSelecionado\")'>";
                            echo "<a data-toggle='modal' href='inicio.php?usuario=".filter_input(INPUT_GET, 'usuario')."&menu=perfiltel&idtelefone=".$idTelefoneSelecionado."&telefone=".$telefoneSelecionado."&modal=sim'>";

                            echo "  <img src='../../images/botaoexcluir.png' title='Excluir' data-target='#myModal'>";
                            
                            echo "</a>";
                            echo "                          </td>";
                            echo "                      </tr>";
                        }
                        
                } catch (Exception $ex) {
                    echo "Erro ao efetuar a consulta. Código do erro: ".$ex->getMessage();

                }

    }
    
    public function cadastraTelefone(){
        
        if($this->verificaTelefone()){
            echo "<br />";
            echo "<p class='alert alert-danger'>";
            echo "Telefone existente.";
//            echo "<button type='button' class='close' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
            echo "</p>";
            echo "<br />";
            
        }else{
        
        $this->consultaUltimoRegistro();
        
        try{
            $sql = "INSERT INTO tbltelefone (idTelefone, telefone, codTipoTelefone, codPerfil) "
                    . "VALUES (".$this->idTelefone.", '".$this->telefone."', ".$this->codTipoTelefone.", ".$this->codPerfil.")";
            
            $resultado = mysql_query($sql) or die("<h1 style='text-align: right;'>Erro. Motivo: ".mysql_error()."</h1>");
            
            if(!$resultado){
//                echo "Inserido com sucesso";
                echo "Problemas ao cadastrar";
            }
            
        } catch (Exception $ex) {
            echo "Erro ao cadastrar o(s) telefone(s). Erro: ".$ex->getMessage();
        }
        }
    }
    
    
    public function telaTelefone(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
//        echo "<script src='../../js/validaCampos.js' defer=''></script>";
        
        echo "<div class='col-xs-9 col-sm-9 placeholder'>";
        echo "  <form class='form-horizontal' style='font-size: 12px;' method='post' name='formperfil' action='".$PHP_SELF."'>";
        echo "      <div class='form-group'>";
        echo "          <label for='telefone' class='col-sm-2 control-label'>Telefone:</label>";
        echo "              <div class='col-sm-3'>";
        echo "                  <input type='tel' class='form-control' id='telefone' name='telefone'>";
        echo "              </div>";
        echo "              <div class='col-sm-3'>";
        echo "                  <select class='form-control' id='tipoTelefone' name='tipoTelefone'>";

                                    try{
                                        $sql = "SELECT * FROM tbltipotelefone";
                                        $resultado = mysql_query($sql);

                                        while($dados = mysql_fetch_array($resultado)){
                                            echo "<option name=".$dados['idTipoTelefone'].">".$dados['nomeTipoTelefone']."</option>";
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
        
        if($_POST){

            /* @var $_POST type */
            
                $telefone = filter_input(INPUT_POST, 'telefone');
                $tipoTelefone = filter_input(INPUT_POST, 'tipoTelefone');
                $this->codPerfil = base64_decode($_GET['usuario']);
                
                $sqlTipoTelefone = "SELECT * FROM tbltipotelefone WHERE nomeTipoTelefone = '".$tipoTelefone."'";
                $resultadoTipoTelefone = mysql_query($sqlTipoTelefone);
                $dadosTipoTelefone = mysql_fetch_array($resultadoTipoTelefone);
                
                $this->codTipoTelefone = $dadosTipoTelefone['idTipoTelefone'];
                
                $this->telefone = $telefone;
                
                $this->cadastraTelefone();
                echo "<meta HTTP-EQUIV='Refresh' CONTENT='3; URL=".$PHP_SELF."'>";
        }
        echo "                  </table>";
        echo "              </div>";
        echo "      </div>";
        echo "  </form>";
        echo "</div>";
        
        if(filter_input(INPUT_GET, 'exclui') === "sim"){
            try{
                $sqlExclusao = "DELETE FROM tbltelefone WHERE idTelefone = ". filter_input(INPUT_GET, 'idtelefone');
                echo "<h1 style='text-align: right;'>".$sqlExclusao."</h1>";
                $resultado = mysql_query($sqlExclusao) or die("Erro. Motivo: ".  mysql_error());
                /* @var $resultado type */
                if ($resultado) {
                    echo "<h1>Exclusão efetuada com sucesso!</h1>";
                    header("Location: inicio.php?usuario=".filter_input(INPUT_GET, 'usuario')."&menu=perfiltel");
                    echo "<meta HTTP-EQUIV='Refresh' CONTENT='3; URL=".$PHP_SELF."'>";

                } else {
                    header("Location: inicio.php?usuario=".filter_input(INPUT_GET, 'usuario')."&menu=perfiltel&erro=2");
                }
            } catch (Exception $ex) {
                echo "Não foi possível excluir o telefone. Erro: ".$ex->getMessage();
            }
        }

        
    }
    
    public function deletaTelefone($idTelefone, $telefone){
        
        echo "<script>$(document).ready(function(){";
        echo "$('#myModal').modal('show');";
        echo "});</script>";
        
        echo "<!-- Modal -->";
//        echo "<form name='formTelefone' method='post' action='".$PHP_SELF."'>";
        echo "<form name='formTelefone' method='post' action='inicio.php?usuario=".filter_input(INPUT_GET, 'usuario')."&menu=perfiltel'>";
        echo "<div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>";
        echo "  <div class='modal-dialog' role='document'>";
        echo "    <div class='modal-content'>";
        echo "      <div class='modal-header'>";
        echo "        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        echo "        <h4 class='modal-title' id='myModalLabel'>Confirmação de exclusão</h4>";
        echo "      </div>";
        echo "      <div class='modal-body'>";
        echo "          <input type='hidden' value='".$idTelefone."'>";
        echo "              Deseja excluir o telefone $telefone ?";
//        echo "              Deseja excluir o telefone ".$telefone." ?";
        echo "      </div>";
        echo "      <div class='modal-footer'>";
        echo "        <a class='btn btn-default' href='inicio.php?usuario=".filter_input(INPUT_GET, 'usuario')."&menu=perfiltel'>Não</a>";
        echo "        <a class='btn btn-primary' href='inicio.php?usuario=".filter_input(INPUT_GET, 'usuario')."&menu=perfiltel&idtelefone=".$idTelefone."&telefone=".$telefone."&exclui=sim'>Sim</a>";
        echo "      </div>";
        echo "    </div>";
        echo "  </div>";
        echo "</div>";
        echo "</form>";
        
        }

}
