<?php

require_once '../conexao/conectaBanco.php';
require_once '../model/modelUsuario.php';

class modelConfig {
    
    private $usuario;
    private $idusuario;
    
    
    function getUsuario() {
        return $this->usuario;
    }

    function getIdusuario() {
        return $this->idusuario;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

        
    public function telaNovoUsuario(){
        $conexao = new conectaBanco();
        $conexao->conecta();
        
        
        echo "<div class='col-xs-9 col-sm-9 placeholder'>";
        echo "<a href='#novoUsuario' role='button' data-toggle='modal' class='text-link' style='text-decoration: none;'>";
        echo "  <button class='btn btn-primary'>Novo Usuário</button>";
        echo "</a>";
        echo "<br><br>";
        echo "  <table class='table table-hover'>";
        echo "      <tr>";
        echo "          <td>";
        echo "              <b>Nome</b>";
        echo "          </td>";
        echo "          <td>";
        echo "              <b>E-mail</b>";
        echo "          </td>";
        echo "          <td>";
        echo "              <b>Acesso</b>";
        echo "          </td>";
        echo "          <td>";
        echo "              <b>Data Cadastro</b>";
        echo "          </td>";
        echo "          <td>";
        echo "              <b>Controle</b>";
        echo "          </td>";
        echo "      </tr>";

        try{
            $sql = "SELECT * FROM tblloginsystems l "
                    . "INNER JOIN tbltipousuario t ON l.codTipoUsuario = t.idTipoUsuario";
            $resultado = mysql_query($sql) or die ("Erro na execução da tabela, fora da sintaxe do MySQL");
            if ($resultado){
                while($dados = mysql_fetch_array($resultado)){
                    echo "<input type='hidden' value='".$dados['idUsuario']."'>";
                    echo "      <tr>";
                    echo "          <td>";
                    echo                $dados['nomeUsuario'];
                    echo "          </td>";
                    echo "          <td>";
                    echo                $dados['emailUsuario'];
                    echo "          </td>";
                    echo "          <td>";
                    echo                $dados['nomeTipoUsuario'];
                    echo "          </td>";
                    echo "          <td>";
                    echo                $dados['dataCadastro'];
                    echo "          </td>";
                    echo "          <td>";
                                    $idusuarioSelecionado = $dados['idUsuario'];
                                    $usuarioSelecionado = $dados['nomeUsuario'];
                    echo "              <a href='#editaUsuario' style='text-decoration: none;'>";
                    echo "                  <button class='btn btn-default btn-xs'>";
                    echo "                      <img src='../../images/editar.png' class='img-responsive' title='Alterar'>";
                    echo "                  </button>";
                    echo "              </a>";
                    echo "              <a href='inicio.php?usuario=".filter_input(INPUT_GET, 'usuario')."&menu=configUsuario&idusuario=".$idusuarioSelecionado."&nomeUsuario=".$usuarioSelecionado."&modal=sim' data-toggle='modal' class='text-link' style='text-decoration: none;'>";
//                    echo "                  <button class='btn btn-default btn-xs'>";
                    echo "                      <img src='../../images/botaoexcluir.png' class='img-responsive' title='Excluir' width='24' height='24'>";
//                     data-target='#excluiUsuario'
//                    echo "                  </button>";
                    echo "              </a>";
                    echo "          </td>";
                    echo "      </tr>";
                    
                }
            }
        } catch (Exception $ex) {
            echo "Erro na transação. Motivo: ".$ex->getMessage();
        }
        
        echo "  </table>";
        echo "</div>";
        $this->novoModalUsuario();
        $this->modalExcluiUsuario();

    }
    
    public function novoModalUsuario(){
        echo "<form name='novoUsuario' action='".$PHP_SELF."' method='post' class='form-horizontal'>";
        echo "    <div class='modal fade' id='novoUsuario' tabindex='-1' role='dialog' aria-labelledby='modalAdesao'>";
        echo "        <div class='modal-dialog' role='document'>";
        echo "            <div class='modal-content'>";
        echo "                <div class='modal-header'>";
        echo "                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "                        <span aria-hidden='true'>&times;</span>";
        echo "                    </button>";
        echo "                    <h4 class='modal-title' id='modalNovoUsuario'><img src='../../images/logoRUV50x51.png'/> Rede Una Vida - <small>Novo Usuário</small></h4>";
        echo "                </div>";
        echo "                <div class='modal-body'>";
                                $cadUsuario = new modelUsuario();
                                $cadUsuario->formularioCadastro();
        echo "                </div>";
        echo "                <div class='modal-footer' style='padding-right: 50px'>";
        echo "                    <button type='button' class='btn btn-default' data-dismiss='modal'>Fechar</button>";
        echo "                    <button type='submit' class='btn btn-primary'>Enviar</button>";
        echo "                </div>";
        echo "                <br/>";
        echo "            </div>";
        echo "        </div>";
        echo "    </div>";
        echo "</form>";
        
        if($_POST){
            $usuario = filter_input(INPUT_POST, 'nome');
            $senha = filter_input(INPUT_POST, 'senha');
            $email = filter_input(INPUT_POST, 'email');
            $tipoAcesso = filter_input(INPUT_POST, 'tipoAcesso');
            $dataCadastro = filter_input(INPUT_POST, 'dataSql');
            
            $cadUsuario->setUsuario($usuario);
            $cadUsuario->setSenha($senha);
            $cadUsuario->setEmail($email);
            $cadUsuario->setCodTipoUsuario($tipoAcesso);
            $cadUsuario->setDataCadastro($dataCadastro);
            
            if($this->verificaUsuario($usuario)){
                $cadUsuario->mensagem("Não foi possível efetuar o cadastro.<br>Usuário existente!");
//                echo "<script>";
//
//                echo "  $('#mensagemErro').modal('hide.bs.modal');";
//
//                echo "</script>";
                
            }else{
                $cadUsuario->cadastraUsuario();
                header("refresh: 0;");
            }
        }
        
    }
    public function modalExcluiUsuario(){
        
        if ($_GET['modal'] === "sim"){
            
        echo "<script>$(document).ready(function(){";
        echo "$('#excluiUsuario').modal('show');";
        echo "});</script>";
        
        echo "<form name='excluiUsuario' action='inicio.php?usuario=".filter_input(INPUT_GET, 'usuario')."&menu=configUsuario' method='post' class='form-horizontal'>";
//        echo "<form name='excluiUsuario' action='".$PHP_SELF."' method='post' class='form-horizontal'>";
        echo "    <div class='modal fade' id='excluiUsuario' tabindex='-1' role='dialog' aria-labelledby='modalExclusao'>";
        echo "        <div class='modal-dialog' role='document'>";
        echo "            <div class='modal-content'>";
        echo "                <div class='modal-header'>";
        echo "                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "                        <span aria-hidden='true'>&times;</span>";
        echo "                    </button>";
        echo "                    <h4 class='modal-title' id='excluiUsuario'><img src='../../images/logoRUV50x51.png'/> Rede Una Vida - <small>Excluir Usuário</small></h4>";
        echo "                </div>";
        echo "                <div class='modal-body'>";
        echo "                      Deseja excluir o usuário ".$_GET['nomeUsuario']."? <br> Todas as informações serão perdidas!";
        echo "                </div>";
        echo "                  <input type='hidden' value='".$_GET['idusuario']."'>";
        echo "                <div class='modal-footer' style='padding-right: 50px'>";
        echo "                    <button type='button' class='btn btn-default' data-dismiss='modal'>Não</button>";
        echo "                    <button type='submit' class='btn btn-primary'>Sim</button>";
        echo "                </div>";
        echo "                <br/>";
        echo "            </div>";
        echo "        </div>";
        echo "    </div>";
        echo "</form>";
        
            if($_POST){
                $cadUsuario = new modelUsuario();
                $idUsuario = filter_input(INPUT_GET, 'idusuario');

//                $cadUsuario->setIdUsuario($idUsuario);
                echo "Id do usuário: ".$idUsuario;
                if($cadUsuario->excluirUsuario($_GET['idusuario'])){
                    header("refresh: 0;");
                }
            }
        }
        
    }
    
    public function verificaUsuario($usuario){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        try{
            $sql = "SELECT * "
                    . "FROM tblloginsystems "
                    . "WHERE nomeUsuario = '".$usuario."' ";

            $resultado = mysql_query($sql);
            $dados = mysql_fetch_array($resultado);

            if($dados > 0){
                return true;
            }else{
                return false;
            }
            
        } catch (Exception $ex) {
            echo "Houve um erro ao validar. Erro: ".$ex->getMessage();
        }
    }

    

    
}
