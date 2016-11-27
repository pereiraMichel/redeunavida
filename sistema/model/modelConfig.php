<?php

require_once '../conexao/conectaBanco.php';
require_once '../model/modelUsuario.php';
require_once '../../view/classFormAdesao.php';

class modelConfig {
    
    private $usuario;
    private $idusuario;
    private $senha;
    
    function getSenha() {
        return $this->senha;
    }

    function setSenha($senha) {
        $senhaCriptografada = md5($senha);
        $this->senha = $senhaCriptografada;
    }
    
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

        
//    public function telaNovoUsuario(){
//        $conexao = new conectaBanco();
//        $conexao->conecta();
//        
//        echo "<div class='col-xs-9 col-sm-9 placeholder'>";
//        echo "<a href='#novoUsuario' role='button' data-toggle='modal' class='text-link' style='text-decoration: none;'>";
//        echo "  <button class='btn btn-primary'>Novo Usuário</button>";
//        echo "</a>";
//        echo "<br><br>";
//        echo "  <table class='table table-hover'>";
//        echo "      <tr>";
//        echo "          <td>";
//        echo "              <b>Nome</b>";
//        echo "          </td>";
//        echo "          <td>";
//        echo "              <b>E-mail</b>";
//        echo "          </td>";
//        echo "          <td>";
//        echo "              <b>Acesso</b>";
//        echo "          </td>";
//        echo "          <td>";
//        echo "              <b>Data Cadastro</b>";
//        echo "          </td>";
//        echo "          <td>";
//        echo "              <b>Controle</b>";
//        echo "          </td>";
//        echo "      </tr>";
//
//        try{
//            $sql = "SELECT l.*, t.*, DATE_FORMAT(l.dataCadastro, '%d/%m/%Y') AS dataCadastro FROM tblusuario l "
//                    . "INNER JOIN tipousuario t ON l.codTipoUsuario = t.idTipo";
//            $resultado = mysql_query($sql) or die ("Erro na execução da tabela, fora da sintaxe do MySQL. Erro: ".mysql_error());
//            if ($resultado){
//                while($dados = mysql_fetch_array($resultado)){
//                    echo "<input type='hidden' value='".$dados['idUsuario']."'>";
//                    echo "      <tr>";
//                    echo "          <td>";
//                    echo                $dados['nomeUsuario'];
//                    echo "          </td>";
//                    echo "          <td>";
//                    echo                $dados['email'];
//                    echo "          </td>";
//                    echo "          <td>";
//                    echo                $dados['nomeTipo'];
//                    echo "          </td>";
//                    echo "          <td>";
//                    echo                $dados['dataCadastro'];
//                    echo "          </td>";
//                    echo "          <td>";
//                                    $idusuarioSelecionado = $dados['idUsuario'];
//                                    $usuarioSelecionado = $dados['nomeUsuario'];
//                    echo "              <a role='button' href='inicio.php?m=configuracoes&t=usersistema&idusuario=".$idusuarioSelecionado."&modalaltera=sim' aria=expanded='false' style='text-decoration: none;'>";
//                    echo "                      <img src='../../images/editar.png' class='img-responsive' title='Alterar'>";
//                    echo "              </a>";
//                    echo "              <a href='inicio.php?m=configUsuario&idusuario=".$idusuarioSelecionado."&nomeUsuario=".$usuarioSelecionado."&modal=sim' data-toggle='modal' class='text-link' style='text-decoration: none;'>";
//                    echo "                      <img src='../../images/botaoexcluir.png' class='img-responsive' title='Excluir' width='24' height='24'>";
////                     data-target='#excluiUsuario'
//                    echo "              </a>";
//                    echo "          </td>";
//                    echo "      </tr>";
//                    
//                }
//            }
//        } catch (Exception $ex) {
//            echo "Erro na transação. Motivo: ".$ex->getMessage();
//        }
//        
//        echo "  </table>";
//        echo "</div>";
//        
//        if(filter_input(INPUT_GET, 'sucessoalteracao')=="sim"){
//            echo "<br/>";
//            echo "<div class='col-xs-12 col-sm-12 col-md-12' style='text-align: left;'>";
//            echo "  <label class='label label-success'>Alteração efetuada com sucesso!</label>";
//            echo "</div>";
//            echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=inicio.php?m=configuracoes&t=usersistema'>";
//        }
//        
//        
//        $this->novoModalUsuario();
//        $this->modalExcluiUsuario("configUsuario");
//        $this->modalEditaUsuario();
//        
//        
//        if(filter_input(INPUT_GET, 'alteracao') == "sim"){
//
//            $this->autorizadaAlteracao();
////            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=inicio.php?menu=configUsuario'>";
//        }
////        if (filter_input(INPUT_GET, 'altera') == "sim"){
////            $this->alteraUsuario("tblloginsystems");
////            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=inicio.php?menu=configUsuario'>";
////        }
//        if (filter_input(INPUT_GET, 'exclui') == "sim"){
//            $this->excluiUsuario("tblloginsystems");
//            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=inicio.php?m=configuracoes&t=usersistema'>";
//        }
//    }
    
    public function formularioEdicao($nomeUsuario, $emailUsuario, $idTipoUsuario, $tipoUsuario){
        $conexao = new conectaBanco();
        $conexao->conecta();
        
        echo "                  <div class='form-group'>";
        echo "                      <label class='col-sm-2 control-label'>";
        echo                            NOME;
        echo "                      </label>";
        echo "                          <input type='text' class='form-control' name='nomeAltera' id='nome' value='".$nomeUsuario."'>";
        echo "                  </div>";
        echo "                  <div class='form-group'>";
        echo "                      <label class='col-md-2 control-label'>";
        echo                            EMAIL;
        echo "                      </label>";
        echo "                          <input type='email' class='form-control' name='emailAltera' id='email' value='".$emailUsuario."'>";
        echo "                  </div>";
        echo "                  <div class='form-group'>";
        echo "                      <label class='col-sm-2 control-label'>";
        echo                            SENHA;
        echo "                      </label>";
        echo "                          <input type='password' class='form-control' name='senhaAltera' id='senha'>";
        echo "                  </div>";
        echo "                  <div class='form-group'>";
        echo "                      <label class='col-sm-2 control-label'>";
        echo                            ACESSO;
        echo "                      </label>";
        echo "                          <select name='acessoAltera' class='form-control'>";
        echo "                              <option value='".$idTipoUsuario."'>".$tipoUsuario."</option>";
        echo "                              <option value=''>---</option>";
        
                                            try{
                                                $sqlTipoUsuario = "SELECT * FROM tbltipousuario";
                                                $resultadoTipoUsuario = mysql_query($sqlTipoUsuario) or die("Houve um erro no SQL. Erro: ".mysql_error());
                                                while($dadosTipoUsuario = mysql_fetch_array($resultadoTipoUsuario)){
                                                    echo "<option value='".$dadosTipoUsuario['idTipoUsuario']."'>".$dadosTipoUsuario['nomeTipoUsuario']."</option>";
                                                }
                                            } catch (Exception $ex) {
                                                echo "Não foi possível realizar a consulta. Erro: ".$ex->getMessage();
                                            }
        
        echo "                          </select>";
        echo "                  </div>";
        
    }
    
    public function modalEditaUsuario(){
        $idusuario = filter_input(INPUT_GET, 'idusuario');
        $modal = filter_input(INPUT_GET, 'modalaltera');
        $conexao = new conectaBanco();
        $conexao->conecta();
        
        echo "<div style='height: 30px;'>&nbsp;</div>";
        
        if($modal == "sim"){
        echo "<script>";
        echo "  $(document).ready(function(){";
        echo "      $('#editaUsuario').modal('show');";
        echo "  });";
        echo "</script>";

        //chama o arquivo junto ao banco de dados
        try{
            $sqlConsulta = "SELECT l.*, t.*, DATE_FORMAT(l.dataCadastro, '%d/%m/%Y') AS dataCadastro, DATE_FORMAT(l.dataAlteracao, '%d/%m/%Y') AS dataAlteracao
                            FROM tblusuario l 
                            INNER JOIN tipousuario t ON l.codTipoUsuario = t.idTipoUsuario
                            WHERE l.idUsuario=".filter_input(INPUT_GET, 'idusuario');
            $resultadoConsulta = mysql_query($sqlConsulta) or die("Houve um problema no SQL de consulta. Erro: ".mysql_error());
            $dadosConsulta = mysql_fetch_array($resultadoConsulta);
            
            $nomeUsuario = $dadosConsulta['nomeUsuario'];
            $emailUsuario = $dadosConsulta['emailUsuario'];
            $tipoUsuario = $dadosConsulta['nomeTipoUsuario'];
            $idTipoUsuario = $dadosConsulta['idTipoUsuario'];
            
            
        } catch (Exception $ex) {
            echo "Não foi possível consultar o usuário. Erro: ".$ex->getMessage();
        }
        
        echo "<form class='form=horizontal' action='inicio.php?menu=configUsuario' method='get'>";
        echo "  <input type='hidden' value='configuracoes' id='menu' name='menu'>";
        
        echo "  <div class='modal fade' id='editaUsuario' tabindex='-1' role='dialog' aria-labelledby='modalEdicao'>";
        echo "<div class='modal-dialog' role='document'>";
        echo "  <div class='modal-content'>";
        echo "      <div class='modal-header'>";
        echo "          <button type='button' class='close' data-dismiss='modal' arial-label='Close'><span aria-hidden='true'>&times;</span></button>";
        echo "          <h4 class='modal-title' id='myModalLabel'>Alteração de Usuários</h4>";
        echo "      </div>";
        echo "                <div class='modal-body'>";
                                $this->formularioEdicao($nomeUsuario, $emailUsuario, $idTipoUsuario, $tipoUsuario);
        echo "                </div>";
        echo "                  <input type='hidden' value='".date('Y-m-d')."' id='dataAlteracao' name='dataAlteracao'>";
        echo "                  <input type='hidden' value='".$idusuario."' id='idusuarioaltera' name='idusuarioaltera'>";
        echo "                  <input type='hidden' value='sim' id='alteracao' name='alteracao'>";
        echo "                <div class='modal-footer' style='padding-right: 50px'>";
        echo "              <a href='inicio.php?menu=configuracoes&tarefa=usersistema' target='_self' class='btn btn-default btn-sm'>";
        echo "                  Fechar";
        echo "              </a>";
        echo "              <button type='submit' class='btn btn-primary btn-sm'>Alterar</button>";
//        echo "              <a href='inicio.php?menu=configUsuario&alteracao=sim&nomealtera=$nomeUsuario&emailaltera=$emailUsuario&idtipouser=$idTipoUsuario&tipousuario=$tipoUsuario' class='btn btn-primary btn-sm'>Alterar</a>";
        echo "                </div>";
        echo "            </div>";
        echo "        </div>";
        echo "    </div>";
        
        echo "</form>";
        }
    }
    
    public function autorizadaAlteracao(){
            $idUsuarioEdicao = filter_input(INPUT_GET, 'idusuarioaltera');
            $nomeEdicao = filter_input(INPUT_GET, 'nomeAltera');
            $emailEdicao = filter_input(INPUT_GET, 'emailAltera');
            $senhaEdicao = filter_input(INPUT_GET, 'senhaAltera');
            $dataAlteracaoEdicao = filter_input(INPUT_GET, 'dataAlteracao');
            $acessoEdicao = filter_input(INPUT_GET, 'acessoAltera');

            $senhaAlterar = false;

                if($senhaEdicao != ""){
                    $senhaAlterar = true;
                    $this->setSenha($senhaEdicao);
                    $senhaCriptografada = $this->senha;
                }else{
                    $senhaAlterar = false;
                }

                try{
                    $sql = "UPDATE ".USUARIO." 
                            SET 
                            nomeUsuario='".$nomeEdicao."', 
                            emailUsuario='".$emailEdicao."',
                            dataUltimaAlteracao = '".$dataAlteracaoEdicao."', 
                            codTipoUsuario = ".$acessoEdicao;

                    if($senhaAlterar){
                    $sql = $sql.", senha = '".$this->senha."' 
                                    WHERE idUsuario = ".$idUsuarioEdicao;
                    }else{
                    $sql = $sql."   WHERE idUsuario = ".$idUsuarioEdicao;
                    }
                    
                    $resultado = mysql_query($sql) or die ("Erro do MySQL. Descrição: ".mysql_error().". SQL: ".$sql);
//                    echo $sql;
//                echo "<h1><br/>Id: ".$idUsuarioEdicao."</h1>";
//                echo "<br/>Nome: ".$nomeEdicao;
//                echo "<br/>E-mail: ".$emailEdicao;
//                echo "<br/>dataAlteracaoEdicao: ".$dataAlteracaoEdicao;
//                echo "<br/>acessoEdicao: ".$acessoEdicao;
//                echo "<br/>Senha: ".$senhaEdicao;

//
                    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=inicio.php?menu=configUsuario&sucessoalteracao=sim'>";
//                    echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=inicio.php?menu=configUsuario'>";

                } catch (Exception $ex) {
                    echo "Não foi possível alterar os dados. Erro: ".$ex->getMessage();
                }
            
        
    }
    
    public function telaEditaUsuarioSite(){
        $conexao = new conectaBanco();
        $conexao->conecta();
        
        try{
            $sql = "";
        } catch (Exception $ex) {
            echo "Não foi possível alterar os dados. Erro: ".$ex->getMessage();
        }
        
    }
    
    public function telaNovoUsuarioSite(){
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
        echo "              <b>&nbsp;</b>";
        echo "          </td>";
        echo "      </tr>";

        try{
            $sql = "SELECT * FROM usuariosite l ";
            $resultado = mysql_query($sql) or die ("Erro na execução da tabela, fora da sintaxe do MySQL. Erro: ".mysql_error());
            if ($resultado){
                while($dados = mysql_fetch_array($resultado)){
                    echo "<input type='hidden' value='".$dados['idLoginSite']."'>";
                    echo "      <tr>";
                    echo "          <td>";
                    echo                $dados['nomeUsuario'];
                    echo "          </td>";
                    echo "          <td>";
                    echo                $dados['email'];
                    echo "          </td>";
                    echo "          <td>";
                    echo "              Site";
                    echo "          </td>";
                    echo "          <td>";
                    echo                $dados['dataCadastro'];
                    echo "          </td>";
                    echo "          <td>";
                                    $idusuarioSelecionado = $dados['idLoginSite'];
                                    $usuarioSelecionado = $dados['nomeUsuario'];
                    echo "              <a href='#editaUsuario' style='text-decoration: none;'>";
                    echo "                      <img src='../../images/editar.png' class='img-responsive' title='Alterar'>";
                    echo "              </a>";
                    echo "              <a href='inicio.php?menu=configUsuarioSite&idusuario=".$idusuarioSelecionado."&nomeUsuario=".$usuarioSelecionado."&modal=sim' data-toggle='modal' class='text-link' style='text-decoration: none;'>";
                    echo "                      <img src='../../images/botaoexcluir.png' class='img-responsive' title='Excluir' width='24' height='24'>";
//                     data-target='#excluiUsuario'
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
        $this->novoModalUsuarioSite();
        $this->modalExcluiUsuarioSite();
        
        if (filter_input(INPUT_GET, 'exclui') == "sim"){
            $this->excluiUsuario("usuariosite");
            echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=inicio.php?m=configUsuarioSite'>";


        }

    }
    
    public function novoModalUsuario(){
        echo "<form name='novoUsuario' action='inicio.php?m=configuracoes&t=usersistema' method='post' class='form-horizontal'>";
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
        echo "                    <button type='submit' class='btn btn-primary'>Salvar</button>";
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
            $cadUsuario->setDataUltimaAlteracao($dataCadastro);
            
            if($this->verificaUsuario($usuario)){
                $cadUsuario->mensagem("Não foi possível efetuar o cadastro.<br>Usuário existente!");

                
            }else{
                $cadUsuario->cadastraUsuario();
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=inicio.php?menu=configuracoes&tarefa=usersistema'>";

            }
        }
        
    }
    public function novoModalUsuarioSite(){
        echo "<form name='novoUsuario' action='inicio.php?menu=configuracoes&tarefa=usersite' method='post' class='form-horizontal'>";
        echo "    <div class='modal fade' id='novoUsuario' tabindex='-1' role='dialog' aria-labelledby='modalAdesao'>";
        echo "        <div class='modal-dialog' role='document'>";
        echo "            <div class='modal-content'>";
        echo "                <div class='modal-header'>";
        echo "                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "                        <span aria-hidden='true'>&times;</span>";
        echo "                    </button>";
        echo "                    <h4 class='modal-title' id='modalNovoUsuario'><img src='../../images/logoRUV50x51.png'/> Rede Una Vida - <small>Novo Usuário Site</small></h4>";
        echo "                </div>";
        echo "                <div class='modal-body'>";
                                $cadUsuarioSite = new classformAdesao();
                                $cadUsuarioSite->formularioAdesao();
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
            
            $cadUsuario = new modelUsuario();
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
                echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=inicio.php?menu=configUsuario'>";
            }
        }
        
    }
    public function modalExcluiUsuario($menu){
        
        if (filter_input(INPUT_GET, 'modal') == "sim"){
            
        echo "<script>";
        echo "  $(document).ready(function(){";
        echo "      $('#excluiUsuario').modal('show');";
        echo "  });";
        echo "</script>";
        
        echo "<form name='excluiUsuario' action='inicio.php?menu=".$menu."' method='post' class='form-horizontal'>";
//        echo "<form name='excluiUsuario' action='".$PHP_SELF."' method='post' class='form-horizontal'>";
        echo "    <div class='modal fade' id='excluiUsuario' tabindex='-1' role='dialog' aria-labelledby='modalExclusao'>";
        echo "        <div class='modal-dialog' role='document'>";
        echo "            <div class='modal-content'>";
        echo "                <div class='modal-header'>";
        echo "                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "                        <span aria-hidden='true'>&times;</span>";
        echo "                    </button>";
        echo "                    <h4 class='modal-title' id='tituloExcluiUsuario'><img src='../../images/logoRUV50x51.png'/> Rede Una Vida - <small>Excluir Usuário</small></h4>";
        echo "                </div>";
        echo "                <div class='modal-body'>";
        echo "                      Deseja excluir o usuário ".filter_input(INPUT_GET,'nomeUsuario')."? <br> Todas as informações serão perdidas!";
        echo "                </div>";
        echo "                  <input type='hidden' value='".filter_input(INPUT_GET,'idusuario')."' name='idUsuarioExclui' id='idUsuarioExclui'>";
        echo "                <div class='modal-footer' style='padding-right: 50px'>";
        echo "                      <a href='inicio.php?menu=configUsuario' class='btn btn-default' >";//data-dismiss='modal'
        echo "                          Não";
        echo "                      </a>";
        echo "                    <a href='inicio.php?menu=".$menu."&idusuario=".filter_input(INPUT_GET, 'idusuario')."&exclui=sim' type='submit' class='btn btn-primary'>Sim</a>";
        echo "                </div>";
        echo "            </div>";
        echo "        </div>";
        echo "    </div>";
        echo "</form>";
        
        
        }
    }
    public function modalExcluiUsuarioSite(){
        
        if (filter_input(INPUT_GET, 'modal') == "sim"){
            
        echo "<script>";
        echo "  $(document).ready(function(){";
        echo "      $('#excluiUsuarioSite').modal('show');";
        echo "  });";
        echo "</script>";
        
        echo "<form name='excluiUsuariosite' action='inicio.php?menu=configUsuarioSite' method='get' class='form-horizontal'>";
//        echo "<form name='excluiUsuario' action='".$PHP_SELF."' method='post' class='form-horizontal'>";
        echo "    <div class='modal fade' id='excluiUsuarioSite' tabindex='-1' role='dialog' aria-labelledby='modalExclusao'>";
        echo "        <div class='modal-dialog' role='document'>";
        echo "            <div class='modal-content'>";
        echo "                <div class='modal-header'>";
        echo "                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "                        <span aria-hidden='true'>&times;</span>";
        echo "                    </button>";
        echo "                    <h4 class='modal-title' id='tituloExcluiUsuario'><img src='../../images/logoRUV50x51.png'/> Rede Una Vida - <small>Excluir Usuário</small></h4>";
        echo "                </div>";
        echo "                <div class='modal-body'>";
        echo "                      Deseja excluir o usuário ".filter_input(INPUT_GET,'nomeUsuario')."? <br> Todas as informações serão perdidas!";
        echo "                </div>";
        echo "                  <input type='hidden' value='".filter_input(INPUT_GET,'idusuario')."' name='idUsuarioExclui' id='idUsuarioExclui'>";
        echo "                <div class='modal-footer' style='padding-right: 50px'>";
        echo "                      <a href='inicio.php?menu=configUsuario' class='btn btn-default' >";//data-dismiss='modal'
        echo "                          Não";
        echo "                      </a>";
        echo "                    <a href='inicio.php?menu=configUsuarioSite&idusuario=".filter_input(INPUT_GET, 'idusuario')."&exclui=sim' type='submit' class='btn btn-primary'>Sim</a>";
        echo "                </div>";
        echo "            </div>";
        echo "        </div>";
        echo "    </div>";
        echo "</form>";
        }
    }
    
    public function excluiUsuario($tabela){
        
        $conexao = new conectaBanco();
        $conexao->conecta();
        
        $idUsuario = filter_input(INPUT_GET, 'idusuario');

        try{
            $sql = "DELETE FROM ".$tabela." WHERE idUsuario = ".$idUsuario;
//            echo $sql;
            $resultado = mysql_query($sql) or die("<h3>Erro no SQL. Erro: ".mysql_error()."</h3>");

            mysql_close($resultado);

        } catch (Exception $ex) {
            echo "Exception adicionada. Motivo: ".$ex->getMessage();
        }
        
    }
    
    public function verificaUsuario($usuario){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        try{
            $sql = "SELECT * "
                    . "FROM tblusuario "
                    . "WHERE nomeUsuario = '".$usuario."' ";

            $resultado = mysql_query($sql) or die ("Erro na execução do SQL. Descrição: ".mysql_error());
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
    
    public function telaTrocaSenha(){
        
        echo "  <div class='form-group'>";
        echo "      <div class='row' style='padding-left: 15px;'>";
        echo "          <div class='col-xs-12 col-md-12' align='center'>";
        echo "              <h3>";
        echo "                  Usuário: ".$_SESSION['usuario'];
        echo "              </h3>";
        echo "          </div>";
        echo "          <div class='col-xs-8 col-md-8' style='padding-left: 15px;'>";
        echo "              &nbsp;";
        echo "          </div>";
        echo "      </div>";
        echo "   </div>";
        echo "<div class='row'>";
        echo "  <div class='col-xs-2 col-md-2'>";
        echo "  </div>";
        echo "  <div class='col-xs-8 col-md-8'>";
        echo "      <form class='form-horizontal' action='inicio.php?menu=trocasenha' method='post'>";
        echo "          <div class='form-group'>";
        echo "              <label for='senhaantiga' class='col-sm-4 control-label'>";
        echo "                  Senha antiga:";
        echo "              </label>";
        echo "              <div class='col-sm-4'>";
        echo "                  <input type='password' name='senhaantiga' id='senhaantiga' class='form-control'>";
        echo "              </div>";
        echo "          </div>";
        echo "          <div class='form-group'>";
        echo "              <label for='senhanova' class='col-sm-4 control-label'>";
        echo "                  Senha nova:";
        echo "              </label>";
        echo "              <div class='col-sm-4'>";
        echo "                  <input type='password' name='senhanova' id='senhanova' class='form-control'>";
        echo "              </div>";
        echo "          </div>";
        echo "          <div class='form-group'>";
        echo "              <label for='senhanova' class='col-sm-4 control-label'>";
        echo "                  Confirme sua senha:";
        echo "              </label>";
        echo "              <div class='col-sm-4'>";
        echo "                  <input type='password' name='confirmasenha' id='confirmasenha' class='form-control'>";
        echo "              </div>";
        echo "          </div>";
        echo "          <div class='form-group'>";
        echo "              <a href='inicio.php' style='text-decoration: none;'>";
        echo "                  <button type='button' class='btn btn-default'>Voltar</button>";
        echo "              </a>";
        echo "              <a href='#' style='text-decoration: none;'>";
        echo "                  <button type='submit' class='btn btn-primary' disabled>Salvar</button>";
        echo "              </a>";
        echo "          </div>";
        echo "          <div style='height: 40px'>&nbsp;</div>";
        echo "          <div class='form-group' align='left'>";
        echo "              <div class='col-sm-12' style='text-align: center;'>";
        echo "                   | <a href='inicio.php?m=perf' class='btn btn-default'>Sobre Você</a> | ";
        echo "                  <a href='inicio.php?m=perfend' class='btn btn-default'>Seu Endereço</a> | ";
        echo "                  <a href='inicio.php?m=perftel' class='btn btn-default'>Telefones</a> | ";
        echo "                  <a href='#' class='btn btn-default active'>Troca de Senha</a> | ";
        echo "              </div>";
        echo "          </div>";
        echo "      </form>";
        echo "  </div>";
        echo "  <div class='col-xs-2 col-md-2'>";
        echo "      &nbsp;";
        echo "  </div>";
        echo "</div>";
        
        if($_POST){
            
            $senhaAntiga = filter_input(INPUT_POST, 'senhaantiga');
            $senhaNova = filter_input(INPUT_POST, 'senhanova');
            $confirmaSenha = filter_input(INPUT_POST, 'confirmasenha');
            $idusuario = $_SESSION['idusuario'];
            
            $senhaVerificacao = md5($senhaAntiga);
            
            $this->setSenha($senhaNova);
            
            if($confirmaSenha != $senhaNova){
                echo "<p class='bg-danger'><label class='label label-danger'>As senhas não conferem. Verifique a nova senha e a confirmação.</label></p>";
                echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=inicio.php?menu=trocasenha'>";
            }else{
            
            
            $conexao = new conectaBanco();
            $conexao->conecta();
            
            try{
                $sqlVerifSenha = "SELECT * FROM ".USUARIO." 
                                  WHERE idUsuario = ".$idusuario;
                
                $resultadoVerifSenha = mysql_query($sqlVerifSenha) or die ("Erro na verificação da senha anterior. Erro: ".mysql_error());
                $dadosVerifSenha = mysql_fetch_array($resultadoVerifSenha);
                
                if($senhaVerificacao === $dadosVerifSenha['senha']){//se a senha for igual ao do sistema
//                    mysql_close($dadosVerifSenha);
//                    mysql_close($resultadoVerifSenha);//fecha o sql anterior
                    //Comando para alteração da senha
                    try{
                        $sql = "UPDATE ".USUARIO." SET senha = '".$this->senha."' WHERE idUsuario = ".$idusuario;
                        $resultado = mysql_query($sql) or die ("Houve um erro no SQL. Verifique sob o erro ".mysql_error());
                        
                        if($resultado){
                            echo "<p class='bg-success'><label class='label label-success'>Senha alterada com sucesso!</label></p>";
                            echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=inicio.php'>";
                        }
                    } catch (Exception $e) {
                        echo "Não foi possível alterar a senha. Erro: ".$e->getMessage();
                    }
                    
                    
                }else{
//                    
//                    echo "<br>Usuário: ".$idusuario;
//                    echo "<br>Senha a verificar: ".$senhaVerificacao;
//                    echo "<br>Senha do sistema: ".$dadosVerifSenha['senha'];
                    
                echo "<p class='bg-danger'><label class='label label-danger'>A senha informada não confere. Verifique a sua senha ou contate o seu administrador.</label></p>";
                echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=inicio.php?menu=trocasenha'>";
                }
                
                
            } catch (Exception $ex) {
                echo "Não foi possível executar a operação. Erro: ".$ex->getMessage();
            }
            }
            
        }
        
        
    }
    
    public function telaInicialConfig(){
    
        
        
    }
    

    
}
