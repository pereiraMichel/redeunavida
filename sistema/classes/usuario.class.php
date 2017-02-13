<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario
 *
 * @author Debug
 */
class usuario {
    
    private $idUsuario;
    private $nomeUsuario;
    private $dataNascimento;
    private $email;
    private $senha;
    private $dataCadastro;
    private $dataAlteracao;
    private $codTipoUsuario;
    
    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getNomeUsuario() {
        return $this->nomeUsuario;
    }

    function getDataNascimento() {
        return $this->dataNascimento;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getDataCadastro() {
        return $this->dataCadastro;
    }

    function getDataAlteracao() {
        return $this->dataAlteracao;
    }

    function getCodTipoUsuario() {
        return $this->codTipoUsuario;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = (int) $idUsuario;
    }

    function setNomeUsuario($nomeUsuario) {
        $this->nomeUsuario = $nomeUsuario;
    }

    function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = md5($senha);
    }

    function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    function setDataAlteracao($dataAlteracao) {
        $this->dataAlteracao = $dataAlteracao;
    }

    function setCodTipoUsuario($codTipoUsuario) {
        $this->codTipoUsuario = (int) $codTipoUsuario;
    }

    public function verificaUsuario(){
                
        $sql = "SELECT COUNT(idUsuario) AS idUsuario FROM tblusuario WHERE email = '".$this->email."'";
        
//        echo $sql."<br>";
        
        try{
            $resultado = mysql_query($sql) or die("Verifica Usuario. ".RETURN_SQL.mysql_error());

            $dados = mysql_fetch_array($resultado);

//            echo "Quantidade de registros: ".mysql_num_rows($resultado)."<br>"; //1
//            echo "ID USUÁRIO: ".$dados['idUsuario']."<br>"; //1
            
            if(mysql_num_rows($resultado) === 0){
                $this->idUsuario = $dados['idUsuario'];
                $this->editUsuario();
            }else{
                $this->novoUsuario();
            }

//            mysql_close($resultado);
            
        } catch (Exception $ex) {
            echo "Erro na execução da verificação do usuário. Erro: ".$ex->getMessage();
        }
        
    }
    
    public function novoUsuario(){
        
        $this->idUsuario = ultimoId::ultimoIdBanco('idUsuario', 'tblusuario');
        
        $sqlNovoUsuario = "INSERT INTO tblusuario(idUsuario, nomeUsuario, email, senha, dataCadastro, dataAlteracao, codTipo) VALUES (".$this->idUsuario.", '".$this->nomeUsuario."', '".$this->email."', '".$this->senha."', '".$this->dataCadastro."', '".$this->dataAlteracao."', ".$this->codTipoUsuario.")";
        
//        echo "SQL Usuário: ".$sqlNovoUsuario."<br>";
        
        
        try{
            $resultadoNovoUsuario = mysql_query($sqlNovoUsuario) or die ("Novo Usuário. ".RETURN_SQL.mysql_error());

            if($resultadoNovoUsuario){
                $perfil = new perfil();

                $perfil->setNome($this->nomeUsuario);
                $perfil->setCodUsuario($this->idUsuario);
                $perfil->setDataAlteracao($this->dataAlteracao);
                $perfil->setCodSetenio(0);
                $perfil->setDataNascimento("0000-00-00");
                $perfil->setDescricao("");
                $perfil->setEstadoCivil("");
                $perfil->setMotivacao("");
                $perfil->setProfissao("");
                $perfil->novoPerfil();

            }

//            mysql_close($resultadoNovoUsuario);
            
        } catch (Exception $ex) {
            echo "Erro na execução do novo usuário. Descrição: ".$ex->getMessage();

        }
        
        
    }
    
    public function editUsuario(){
        
        $sqlEditUsuario = "UPDATE tblusuario SET nomeUsuario='".$this->nomeUsuario."', email='".$this->email."', dataAlteracao='".$this->dataAlteracao."', codTipo=".$this->codTipoUsuario." WHERE idUsuario=".$this->idUsuario;
//        echo "SQL: ".$sqlEditUsuario."<br>";
        try{
             mysql_query($sqlEditUsuario) or die("Edição do Usuário. ".RETURN_SQL.mysql_error());//$resultadoEditUsuario =
             
            
        } catch (Exception $ex) {
            echo "Erro na execução da alteração do usuário. Descrição: ".$ex->getMessage();
        }
    }
    
    public function deleteUsuario(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $f = filter_input(INPUT_GET, 'f');
        $id = filter_input(INPUT_GET, 'id');
        
        if($f === "e"){
            $sqlDeleteUsuario = "DELETE FROM tblusuario WHERE idUsuario=".$id;
            $sqlDeletePerfil = "DELETE FROM perfil WHERE codUsuario = ".$id;
        
            try{
                mysql_query($sqlDeletePerfil) or die("Deleta perfil. ".RETURN_SQL.mysql_error()); //$resultadoDeletePerfil = 
                $resultadoDeleteUsuario = mysql_query($sqlDeleteUsuario) or die("Deleta usuário. ".RETURN_SQL.mysql_error());

                if($resultadoDeleteUsuario > 0){
                    return true;
                }
                return false;
//                mysql_close($resultadoDeleteUsuario);

            } catch (Exception $ex) {
                echo "Exception ativado. Descrição: ".$ex->getMessage();
            }
        }
        
    }
    
    public function tabelaUsuarioSistema($acesso){
        
        $conexao = new conectaBanco();
        $conexao->conecta();
        
        echo "<div class='col-xs-1 col-sm-1 placeholder'>";
        echo "  &nbsp;";
        echo "</div>";
        echo "<div class='col-xs-10 col-sm-10 placeholder'>";
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
            
            if($acesso === "SISTEMA"){
                $sql = "SELECT l.*, t.*, DATE_FORMAT(l.dataCadastro, '%d/%m/%Y') AS dataCadastro FROM tblusuario l "
                        . "INNER JOIN tipousuario t ON l.codTipo = t.idTipo "
                        . "WHERE t.nomeTipo <> 'SITE'";
            }else if($acesso === "SITE"){
                $sql = "SELECT l.*, t.*, DATE_FORMAT(l.dataCadastro, '%d/%m/%Y') AS dataCadastro FROM tblusuario l "
                        . "INNER JOIN tipousuario t ON l.codTipo = t.idTipo "
                        . "WHERE t.nomeTipo = 'SITE'";
                
            }
            $resultado = mysql_query($sql) or die ("Erro na execução da tabela, fora da sintaxe do MySQL. Erro: ".mysql_error());
            if ($resultado){
                while($dados = mysql_fetch_array($resultado)){
                    echo "<input type='hidden' value='".$dados['idUsuario']."'>";
                    echo "      <tr>";
                    echo "          <td>";
                    echo                $dados['nomeUsuario'];
                    echo "          </td>";
                    echo "          <td>";
                    echo                $dados['email'];
                    echo "          </td>";
                    echo "          <td>";
                    echo                $dados['nomeTipo'];
                    echo "          </td>";
                    echo "          <td>";
                    echo                $dados['dataCadastro'];
                    echo "          </td>";
                    echo "          <td>";
                                    $idusuarioSelecionado = $dados['idUsuario'];
                    echo "          <input type='radio' name='opcao' value='".$idusuarioSelecionado."' onclick='pegaUsuarioSist(this.value)'>";
                    echo "          </td>";
                    echo "      </tr>";
                    
                }
            }
        } catch (Exception $ex) {
            echo "Erro na transação. Motivo: ".$ex->getMessage();
        }
        
        echo "  </table>";
        echo "</div>";

        echo "          <input type='hidden' name='idSelecionado' id='idSelecionado'>";
        
        echo "      <div class='form-group'>";
        echo "              <div class='col-sm-9' style='text-align:right'>";
        echo "                   | <a href='inicio.php?m=config&t=usis&f=n' class='btn btn-primary'>Novo</a> | ";
        echo "                  <a href='inicio.php?m=config&t=usis&f=a&id=$idusuarioSelecionado' id='altera' name='altera' class='btn btn-default' disabled>Alterar</a> | ";
        echo "                  <a href='inicio.php?m=config&t=usis&f=e&id=$idusuarioSelecionado' id='exclui' name='exclui' class='btn btn-default' disabled>Excluir</a>";
        echo "                  <a href='inicio.php?m=config&t=usis&f=d' id='detalhes' name='detalhes' class='btn btn-default' disabled>Detalhes</a>";
        echo "              </div>";
        echo "      </div>";
        echo "<div class='col-xs-1 col-sm-1 placeholder'>";
        echo "  &nbsp;";
        echo "</div>";
        echo "      <div class='form-group'>";
        echo "              <div class='col-sm-12' style='text-align:right'>";
        echo "                  <a href='inicio.php?m=config' id='voltar' name='voltar' class='btn btn-default'>Voltar</a>";
        echo "              </div>";
        echo "      </div>";

        if($this->deleteUsuario()){
            echo "<div class='col-sm-12'>";
            echo "  <label class='alert alert-success'>Excluído com sucesso</label>";
            echo "  <meta http-equiv='refresh' content='2;url=inicio.php?m=config&t=usis'>";
            echo "</div>";
        }
//        
//        if(filter_input(INPUT_GET, 'sucessoalteracao')=="sim"){
//            echo "<br/>";
//            echo "<div class='col-xs-12 col-sm-12 col-md-12' style='text-align: left;'>";
//            echo "  <label class='label label-success'>Alteração efetuada com sucesso!</label>";
//            echo "</div>";
//            echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=inicio.php?m=config&t=usis'>";
//        }
        
//        $this->editUsuario();
        
    }
   
    
    public function telaNovoUsuario(){
        
//        echo "<meta http-equiv='refresh' content='5;url=inicio.php?m=config&t=usis&f=n'";
        
        $conecta = new conectaBanco();
        $conecta->conecta();
        echo "<div class='col-xs-12 col-sm-12 placeholder'>";
        echo "  <h4><img src='../../images/logoRUV50x51.png'/> Rede Una Vida - <small>Novo Usuário</small></h4>";
        echo "</div>";
        
        echo "<div class='col-xs-2 col-sm-2 placeholder'>";
        echo "  &nbsp;";
        echo "</div>";
        echo "<div class='col-xs-8 col-sm-8 placeholder'>";
        echo "<form name='novoUsuario' action='#' method='post' class='form-horizontal'>";
        $this->telaFormulario();
        echo "<p style='height: 20px;'>&nbsp;</p>";
        
        echo "  <div style='text-align: center;'>";
        echo "      <a class='btn btn-default' href='inicio.php?m=config&t=usis'>Fechar</a>";
        echo "      <button type='submit' class='btn btn-primary'>Salvar</button>";
        echo "  </div>";
        echo "</form>";
        
        if($_POST){
            $usuario = filter_input(INPUT_POST, 'nome');
            $senha = filter_input(INPUT_POST, 'senha');
            $email = filter_input(INPUT_POST, 'email');
            $tipoAcesso = filter_input(INPUT_POST, 'tipoAcesso');
            $dataCadastro = filter_input(INPUT_POST, 'dataSql');
            
            $this->setNomeUsuario($usuario);
            $this->setSenha($senha);
            $this->setEmail($email);
            $this->setCodTipoUsuario($tipoAcesso);
            $this->setDataCadastro($dataCadastro);
            $this->setDataAlteracao($dataCadastro);
            
            $this->verificaUsuario($email);
            
        }
        echo "</div>";
        echo "<div class='col-xs-2 col-sm-2 placeholder'>";
        echo "  &nbsp;";
        echo "</div>";
        
    }
    public function telaAlteraUsuario(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $id = filter_input(INPUT_GET, 'id');
        
        $sqlUsuario = "SELECT * 
                       FROM tblusuario t
                       INNER JOIN tipousuario tp ON t.codTipo = tp.idTipo
                       WHERE idUsuario = ".$id;
        
        try{
            $resultadoSqlUsuario = mysql_query($sqlUsuario) or die ("Erro no comando SQL de consulta usuário. Descrição: ".mysql_error());
            
            
            
        } catch (Exception $ex) {
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }
        
        echo "<div class='col-xs-1 col-sm-1 placeholder'>";
        echo "  &nbsp;";
        echo "</div>";
        echo "<div class='col-xs-10 col-sm-10 placeholder'>";
        echo "  Alteração do Usuário ".$this->nomeUsuario;
        echo "</div>";
        echo "<div class='col-xs-1 col-sm-1 placeholder'>";
        echo "  &nbsp;";
        echo "</div>";
        
    }
    
    public function telaDetalhesUsuario(){
        echo "<div class='col-xs-1 col-sm-1 placeholder'>";
        echo "  &nbsp;";
        echo "</div>";
        echo "<div class='col-xs-10 col-sm-10 placeholder'>";
        echo "  Exclusão do Usuário ".$this->nomeUsuario;
        echo "</div>";
        echo "<div class='col-xs-1 col-sm-1 placeholder'>";
        echo "  &nbsp;";
        echo "</div>";
        
    }
    
    public function telaFormulario(){
        echo "<div class='tab-pane active' id='tab1'>";
        echo "  <input type='hidden' name='dataSql' id='dataSql' value='" . date('Y-m-d') . "' size='10' readonly='readonly' />";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-2 control-label' style='font-size: 12px;'>" . NOME . "</label>";
        echo "   <div class='col-sm-5'>";
        echo "      <input type='text' name='nome' id='nome'  placeholder='Nome' class='form-control' />";
        echo "   </div>";
        echo "</div>";
        
        echo "<div class='form-group'>";
        echo "   <label class='col-sm-2 control-label' style='font-size: 12px;'>" . SENHA . "</label>";
        echo "   <div class='col-sm-5'>";
        echo "      <input type='password' name='text' id='senha' class='form-control' maxlenght='8' />";
        echo "   </div>";
        echo "   <label class='col-sm-2 control-label' style='font-size: 12px;'>&nbsp;</label>";
        echo "   <div class='col-sm-5' style='color: red; text-align: left;'>";
        echo "      <small>*No máximo 8 alfanuméricos</small>";
        echo "   </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-2 control-label' style='font-size: 12px;'>" . EMAIL . "</label>";
        echo "   <div class='col-sm-5'>";
        echo "      <input type='email' name='email' id='email' placeholder='E-mail' class='form-control' />";
        echo "   </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-2 control-label' style='font-size: 12px;'>" . ACESSO . "</label>";
        echo "   <div class='col-sm-5'>";
        echo "      <select name='tipoAcesso' class='form-control'>";
        
        try{
            $sqlAcesso = "SELECT * FROM tipousuario";
            $resultadoAcesso = mysql_query($sqlAcesso) or die ("Problemas na execução do MySQL. Erro: ".mysql_error());
            if($resultadoAcesso){
                
                while($dadosAcesso = mysql_fetch_array($resultadoAcesso)){
                    echo "<option value='".$dadosAcesso['idTipo']."'>".$dadosAcesso['nomeTipo']."</option>";
                }
                
            }
            
        } catch (Exception $ex) {
            echo "Problemas na execução. Erro: ".$ex->getMessage();
        }
        echo "      </select>";

        echo "   </div>";
        echo "</div>";
        
        echo "<div class='form-group'>";
        echo "   <label class='col-sm-2 control-label' style='font-size: 11px;'>" . DATA . "</label>";
        echo "   <div class='col-sm-2'>";
        echo "      <input type='text' name='data' id='data' value='".date("d/m/Y")."' class='form-control' readonly />";
        echo "   </div>";
        echo "</div>";

        echo "</div>";
        
    }
    
    public function consultaUsuarioPerfil(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        try{
            $sql = "SELECT * "
                    . "FROM tblusuario l "
                    . "INNER JOIN tbHoelperfil p ON p.codUsuario = l.idUsuario "
                    . "INNER JOIN tblsetenio s ON p.codSetenio = s.idsetenio "
                    . "WHERE l.idUsuario = ".$this->idUsuario;
            
            $resultado = mysql_query($sql);
            $dados = mysql_fetch_array($resultado);
            
            if($dados < 1){
                echo "<li style='font-size: 11px;'><b>Perfil não preenchido.</b></li>";
                echo "<li style='font-size: 11px;'>&nbsp;</li>";
                echo "<li style='font-size: 11px;'><a href='perfil.php'>Alterar</a></li>";
            }else{
//                echo "<li>Profissão: ".$dados['profissao']."</li>";
                echo "<li>Data de Nascimento: ".date("d/m/Y", strtotime($dados['dataNascimento']))."</li>";
                echo "<li>Setênio: ".$dados['setenio']."</li>";
                echo "<li>Descrição: ".$dados['descricao']."</li>";
            }
        } catch (Exception $ex) {
            echo "Houve um erro ao preencher. Erro: ".$ex->getMessage();
        }
    }
    
    public function validaUser($usuario){ // função para validar o usuário e a senha

        $conecta = new conectaBanco();
        $conecta->conecta();
        
        try{
            $sql = "SELECT * "
                    . "FROM tblusuario "
                    . "WHERE (nomeUsuario = '".$usuario."' "
                    . "OR email = '".$usuario."') "
                    . "AND senha = '".$this->senha."'";

            $resultado = mysql_query($sql) or die("||| Problemas no SQL. Verifique sob o erro: ".mysql_error()." |||");
            $dados = mysql_fetch_array($resultado);

            if($dados > 0){
                session_start();
                $_SESSION['idusuario'] = $dados['idUsuario'];//Não está gravando
                $_SESSION['usuario'] = $dados['nomeUsuario'];
                $_SESSION['email'] = $dados['email'];
                $_SESSION['codTipoUsuario'] = $dados['codTipo'];
                $_SESSION['logado'] = true;
                
                $identifUsuario = base64_encode($_SESSION['idusuario']);
                
                header("Location: ../sistema/view/inicio.php");//?usuario=".$identifUsuario
//                echo "<br>Sessão ID: ".$_SESSION['idusuario'];//Os campos estão OK
//                echo "<br>Sessão Usuário: ".$_SESSION['usuario'];
//                echo "<br>Sessão E-mail: ".$_SESSION['email'];
//                echo "<br>Sessão Senha: ".$_SESSION['codTipoUsuario'];
            }else{
                header("Location: ../sistema/index.php?erro=1");//Erro usuário

            }
            
        } catch (Exception $ex) {
            echo "Houve um erro ao validar. Erro: ".$ex->getMessage();
        }
        
        
        
    }
    
    
    
}
