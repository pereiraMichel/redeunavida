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
    private $codAlteraUsuario;

    function getCodAlteraUsuario(){
        return $this->codAlteraUsuario;
    }

    function setCodAlteraUsuario($codalterausuario){
        $this->codAlteraUsuario = $codalterausuario;
    }
    
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
//        $this->senha = $senha;
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

        $con = new conectaBanco();
        $con->conecta();

        $sqlConsultaUsuario = "SELECT * FROM tblusuario WHERE email = '".$this->email."'";

        try{
            $resultadoSQLConsultaUser = mysql_query($sqlConsultaUsuario) or die ("Erro no comando SQL. Descrição: ".mysql_error());

            if(mysql_num_rows($resultadoSQLConsultaUser) > 0){
                echo "<label class='alert alert-danger'>Existe outro usuário com o e-mail informado.</label>";
                //echo mysql_num_rows($resultadoSQLConsultaUser);
                return false;
            }else{

                $this->idUsuario = ultimoId::ultimoIdBanco('idUsuario', 'tblusuario');
                $id = $this->idUsuario;
                
                $sqlNovoUsuario = "INSERT INTO tblusuario(idUsuario, nomeUsuario, email, senha, dataCadastro, dataAlteracao, codTipo) VALUES (".$this->idUsuario.", '".$this->nomeUsuario."', '".$this->email."', '".$this->senha."', '".$this->dataCadastro."', '".$this->dataAlteracao."', ".$this->codTipoUsuario.")";
                
                //echo "SQL Usuário: ".$sqlNovoUsuario."<br>";
                
                try{
                    $resultadoNovoUsuario = mysql_query($sqlNovoUsuario) or die ("Novo Usuário. ".RETURN_SQL.mysql_error());

                    if($resultadoNovoUsuario){
                        return true;
                    }else{
                        echo "<br><label>Comando não executado.</label>";
                    }
                } catch (Exception $ex) {
                    echo "Erro na execução do novo usuário. Descrição: ".$ex->getMessage();
                }
            }
        }catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }
    }
    
    public function editUsuario(){
        
        $sqlEditUsuario = "UPDATE tblusuario SET nomeUsuario='".$this->nomeUsuario."', email='".$this->email."', dataAlteracao='".$this->dataAlteracao."', codTipo=".$this->codTipoUsuario." WHERE idUsuario=".$this->idUsuario;
//        echo "SQL: ".$sqlEditUsuario."<br>";
        try{
             mysql_query($sqlEditUsuario) or die("Edição do Usuário. ".RETURN_SQL.mysql_error());//$resultadoEditUsuario =
             $a->writeLog($_SESSION['usuario'], "Alteração do Usuário ".$this->nomeUsuario, "../controller/");
                         
            
        } catch (Exception $ex) {
            echo "Erro na execução da alteração do usuário. Descrição: ".$ex->getMessage();
        }
    }
    
    public function deleteUsuario(){
        $conecta = new conectaBanco();
        $conecta->conecta();

        $a = new atividades();
        
        $f = filter_input(INPUT_GET, 'f');
        $id = filter_input(INPUT_GET, 'id');
        
        if($f === "e"){
            $sqlDeleteUsuario = "DELETE FROM tblusuario WHERE idUsuario=".$id;
            $sqlDeletePerfil = "DELETE FROM perfil WHERE codUsuario = ".$id;

            $sqlConsultaUsuario = "SELECT * FROM tblusuario WHERE idUsuario = ".$id;
        
            try{
                $r = mysql_query($sqlConsultaUsuario) or die("Consulta Usuário. ".RETURN_SQL.mysql_error());

                $dataUser = mysql_fetch_array($r);

                $resultadoDeletePerfil = mysql_query($sqlDeletePerfil) or die("Deleta perfil. ".RETURN_SQL.mysql_error());
                $resultadoDeleteUsuario = mysql_query($sqlDeleteUsuario) or die("Deleta usuário. ".RETURN_SQL.mysql_error());

                if($resultadoDeleteUsuario){
                    echo "<div class='col-sm-12'>";
                    echo "  <label class='alert alert-success'>Excluindo perfil e usuário...</label><br>";
                    echo "  <label class='alert alert-success'>Excluído com sucesso !</label><br>";
                    $a->writeLog($_SESSION['usuario'], "Exclusão do Usuário ".$dataUser['nomeUsuario'], "../controller/");
                    echo "  <meta http-equiv='refresh' content='2;url=inicio.php?m=config&t=usis'>";
                    echo "</div>";
                }
                return false;
//                mysql_close($resultadoDeleteUsuario);

            } catch (Exception $ex) {
                echo "Exception ativado. Descrição: ".$ex->getMessage();
            }
        }
        
    }
    
    public function tabelaUsuarioSistema(){
        
        $conexao = new conectaBanco();
        $conexao->conecta();
        
        $tipoUsuarioSelecionado = filter_input(INPUT_GET, "tpu");

        if($tipoUsuarioSelecionado === "todos" or $tipoUsuarioSelecionado === null or $tipoUsuarioSelecionado === ""){
            $sqlPreencheCampo = "SELECT * tipousuario";
            $sqlEscolha = "";
        }else{
            $sqlPreencheCampo = "SELECT * FROM tipousuario WHERE nomeTipo = ".$tipoUsuarioSelecionado;
            $sqlEscolha = " WHERE t.nomeTipo = '".$tipoUsuarioSelecionado."'";
        }

            $sql = "SELECT l.*, t.*, DATE_FORMAT(l.dataCadastro, '%d/%m/%Y') AS dataCadastro 
                    FROM tblusuario l 
                    INNER JOIN tipousuario t ON l.codTipo = t.idTipo 
                    ".$sqlEscolha;

            //echo $sql;
            //echo $sqlPreencheCampo;;

        echo "<div class='col-xs-1 col-sm-1 placeholder'>";
        echo "  &nbsp;";
        echo "</div>";
        echo "<div class='col-xs-10 col-sm-10 placeholder'>";
//        echo "<label class='alert alert-danger'>Em teste</label>";
        echo "<br><br>";
        echo "  <table class='table table-hover'>";
        echo "      <tr>";
        echo "          <td colspan='3'>";
        echo "              <label>Tipo de usuários: ";
        echo "          </td>";
        echo "          <td colspan='2'>";
        echo "              <select name='tpusuarios' id='tpusuarios' class='form-control' onchange='selectUsuarios(this.value)'>";

        if(!empty($tipoUsuarioSelecionado)){
                    echo "<option value='".$tipoUsuarioSelecionado."'>".$tipoUsuarioSelecionado."</option>";
        }

        echo "                  <option value=''></option>";
        echo "                  <option value='TODOS'>Todos</option>";

        $sqlTipoUsuario = "SELECT * FROM tipousuario";

        try{

            $resultadoTipoUsuario = mysql_query($sqlTipoUsuario) or die("Erro no comando SQL do tipo de usuário. Erro: ".mysql_error());

            while($dadosTipoUsuario = mysql_fetch_array($resultadoTipoUsuario)){
                echo "<option value='".$dadosTipoUsuario['nomeTipo']."'>".$dadosTipoUsuario['nomeTipo']."</option>";
            }

        }catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }


        echo "              </select>";
        echo "          </td>";
        echo "      </tr>";
        echo "      <tr>";
        echo "          <td colspan='5'>";
        echo "              &nbsp;";
        echo "          </td>";
        echo "      </tr>";
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
            
            //echo "Tipo Usuário: ".$tipoUsuarioSelecionado."<br>";
            $resultado = mysql_query($sql) or die ("Erro na execução da tabela, fora da sintaxe do MySQL. Erro: ".mysql_error());
            if (mysql_num_rows($resultado) > 0){
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
            }else{
                echo "<tr>";
                echo "  <td colspan='5'>";
                echo "      <label class='alert alert-warning'>Não contém usuários para a consulta.</label>";
                echo "  </td>";
                echo "</tr>";
            }
        } catch (Exception $ex) {
            echo "Erro na transação. Motivo: ".$ex->getMessage();
        }
        
        echo "  </table>";
        echo "</div>";

        echo "          <input type='hidden' name='idSelecionado' id='idSelecionado'>";
        
        echo "      <div class='form-group'>";
        echo "              <div class='col-sm-9' style='text-align:right'>";
        echo "                   | <a href='inicio.php?m=config&t=usis&f=n' class='btn btn-default'><img src='../img/icon-people.png' width='20' height='20'> Novo</a> | ";
        echo "                  <button type='button' onclick='pegaIdAltera(idSelecionado.value)' id='altera' name='altera' class='btn btn-default' disabled><img src='../img/editar.png' width='20' height='20'> Alterar</button> | ";
//        echo "                  <a href='inicio.php?m=config&t=usis&f=a' onclick='javascript:pegaIdAltera(idSelecionado.value)' id='altera' name='altera' class='btn btn-default' disabled>Alterar</a> | ";
        echo "                  <button type='button' id='exclui' onclick='pegaIdExclui(idSelecionado.value)' name='exclui' class='btn btn-default' disabled><img src='../img/botaoexcluir.png' width='20' height='20'> Excluir</a>";
//        echo "                  <a href='inicio.php?m=config&t=usis&f=d' id='detalhes' name='detalhes' class='btn btn-default' disabled>Detalhes</a>";
        echo "              </div>";
        echo "      </div>";
        echo "<div class='col-xs-1 col-sm-1 placeholder'>";
        echo "  &nbsp;";
        echo "</div>";
        echo "      <div class='form-group'>";
        echo "              <div class='col-sm-12' style='text-align:right'>";
        echo "      <a href='inicio.php?m=config' class='btn btn-default' target='_self' title='Voltar' alt='Voltar'>";
        echo "          <img src='../img/btn_back.png' width='25' height='25'>";
        echo "      </a>";
        echo "          <br><label style='padding-right: 8px;'>Voltar</label>";
        echo "              </div>";
        echo "      </div>";

/*        if($this->deleteUsuario()){
        }*/

/*        if($f === "a"){
            $this->telaAlteraUsuario($idusuarioSelecionado);
            //echo "<script>window.location.href='inicio.php?m=config&t=usis&f=a&id='".$idusuarioSelecionado."'</script>";
        }else if($f === "e"){
            $this->telaExcluirUsuario($idusuarioSelecionado);
        }*/


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
        $a = new atividades();

        $conecta = new conectaBanco();
        $conecta->conecta();
        echo "<div class='col-xs-12 col-sm-12 placeholder'>";
        echo "  <h4><img src='../../images/logoRUV50x51.png'/> Rede Una Vida - <small>Novo Usuário</small></h4>";
        echo "</div>";
        
        echo "<div class='col-xs-2 col-sm-2 placeholder'>";
        echo "  &nbsp;";
        echo "</div>";
        echo "<div class='col-xs-8 col-sm-8 placeholder'>";
        echo "<form name='novoUsuario' id='novoUsuario' action='inicio.php?m=config&t=usis&f=n' method='post' class='form-horizontal'>";
        $this->telaFormulario();
        echo "<p style='height: 20px;'>&nbsp;</p>";
        
        echo "  <div style='text-align: center;'>";
        echo "      <table class='table'>";
        echo "          <tr>";
        echo "                  <td style='text-align: right;'>";
        echo "                      <a href='inicio.php?m=config&t=usis' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "                          <img src='../img/btn_back.png' width='25' height='25'>";
        echo "                      </a>";
        echo "                  </td>";
        echo "                  <td style='text-align: left;'>";
        echo "                      <button type='button' class='btn btn-default' id='salvar' name='salvar' onclick='enviaForm(\"novoUsuario\")'>";// onclick='enviaForm(\"novoUsuario\")'
        echo "                          <img src='../img/save2.png' width='25' height='25'>";
        echo "                      </button>";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td style='text-align: right;'>";
        echo "                      <a href='inicio.php?m=config&t=usis' title='Voltar' alt='Voltar'>";
        echo "                          <label>Voltar</label>";
        echo "                      </a>";
        echo "                  </td>";
        echo "                  <td style='text-align: left;'>";
        echo "                      <a href='#' onclick='enviaForm(\"novoUsuario\")' title='Salvar' alt='Salvar'>";
        echo "                          <label>Salvar</label>";
        echo "                      </a>";
        echo "                  </td>";
        echo "          </tr>";
        echo "      </table>";
//        echo "      <a class='btn btn-default' href='inicio.php?m=config&t=usis'>Fechar</a>";
//        echo "      <button type='submit' class='btn btn-primary'>Salvar</button>";
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
            
            if($this->novoUsuario()){
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
                $perfil->setBoolUsuario("usuario");
                
                if($perfil->novoPerfil()){
                    $a->writeLog($_SESSION['usuario'], "Inclusão do Usuário ".$this->nomeUsuario, "../controller/");
                    echo "<p style=''>&nbsp;</p>";
                    echo "<label class='alert alert-success'>Salvo com sucesso! Aguarde 2 segundos.</label>";
                    echo "<meta http-equiv='refresh' content='2;url=inicio.php?m=config&t=usis'>";
                }

            }
//            $this->verificaUsuario($email);
            
        }
        echo "</div>";
        echo "<div class='col-xs-2 col-sm-2 placeholder'>";
        echo "  &nbsp;";
        echo "</div>";
        
    }
    public function telaAlteraUsuario(){
        //echo "<meta http-equiv='refresh' content='5;url=inicio.php?m=config&t=usis&f=a&id=4'>";
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $id = filter_input(INPUT_GET, 'id');
        
        $sqlUsuario = "SELECT * 
                       FROM tblusuario t
                       INNER JOIN tipousuario tp ON t.codTipo = tp.idTipo
                       WHERE idUsuario = ".$id;
        
        try{
            $resultadoSqlUsuario = mysql_query($sqlUsuario) or die ("Erro no comando SQL de consulta usuário. Descrição: ".mysql_error());

            $dados_usuario = mysql_fetch_array($resultadoSqlUsuario);

            $this->nomeUsuario = $dados_usuario['nomeUsuario'];
            $this->email = $dados_usuario['email'];
            $this->codAlteraUsuario = $dados_usuario['idUsuario'];
            
            
        } catch (Exception $ex) {
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }

/**/    echo "<div class='col-xs-2 col-sm-2 placeholder'>";
        echo "  &nbsp;";
        echo "</div>";
        echo "<div class='col-xs-8 col-sm-8 placeholder'>";
        echo "<form name='formAlteraUsuario' id='formAlteraUsuario' method='post' action='inicio.php?m=config&t=usis&f=a&id=$id' class='form-horizontal'>";
        echo "  <div class='form-group'>";
        echo "      <label for='nome_usuario' class='col-sm-3 control-label'>Usuário: </label>";
        echo "      <div class='col-sm-5'>";
        echo "          <input type='text' class='form-control' id='nome_usuario' name='nome_usuario' placeholder='".$this->nomeUsuario."' readonly='readonly' disabled>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='form-group'>";
        echo "      <label for='email' class='col-sm-3 control-label'>E-mail: </label>";
        echo "      <div class='col-sm-5'>";
        echo "          <input type='text' class='form-control' id='email' name='email' value='".$this->email."' onkeydown='enterTab(\"senha\", event)'>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='form-group'>";
        echo "      <label for='senha' class='col-sm-3 control-label'>Nova Senha: </label>";
        echo "      <div class='col-sm-5'>";
        echo "          <input type='password' class='form-control' id='senha' name='senha' placeholder='Máximo 8 caracteres.' maxlenght='8' onkeydown='enterTab(\"salvar\", event)'>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='form-group'>";
        echo "      <label for='tipousuario' class='col-sm-3 control-label'>Tipo Usuário: </label>";
        echo "      <div class='col-sm-5'>";
        echo "      <select name='tipousuario' class='form-control'>";
        echo "          <option value='".$dados_usuario['idTipo']."'>".$dados_usuario['nomeTipo']."</option>";
        echo "          <option value=''></option>";
        try{
            $sqlTipoUsuario = "SELECT * FROM tipousuario";

            $resultadoTipoUsuario = mysql_query($sqlTipoUsuario) or die("Erro no comando SQL. Erro: ".mysql_error());

            while($dados_tipousuario = mysql_fetch_array($resultadoTipoUsuario)){
                echo "<option value='".$dados_tipousuario['idTipo']."'>".$dados_tipousuario['nomeTipo']."</option>";
            }

        }catch(Exception $e){
            echo "Exception ativado. Descrição: ".$e->getMessage();
        }


        echo "      </select>";
        echo "      </div>";
        echo "  </div>";//fecha o form-group
        echo "<input type='hidden' class='form-control' id='codusuario' name='codusuario' placeholder='".$this->codAlteraUsuario."'>";
        echo "<input type='hidden' class='form-control' id='dataAlteracao' name='dataAlteracao' value='".date('Y-m-d')."'>";
        echo "  <div class='form-group'>";
        echo "      <table class='table'>";
        echo "          <tr>";
        echo "                  <td style='text-align: right;'>";
        echo "                      <a href='inicio.php?m=config&t=usis' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "                          <img src='../img/btn_back.png' width='25' height='25'>";
        echo "                      </a>";
        echo "                  </td>";
        echo "                  <td style='text-align: left;'>";
        echo "                      <button type='button' class='btn btn-default' id='salvar' name='salvar' onclick='enviaForm(\"formAlteraUsuario\");'>";//enviaForm(\"alteraUsuario\"); //alert(\"Chamou a função\")
        echo "                          <img src='../img/save2.png' width='25' height='25'>";
        echo "                      </button>";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td style='text-align: right;'>";
        echo "                      <a href='inicio.php?m=config&t=usis' title='Voltar' alt='Voltar'>";
        echo "                          <label>Voltar</label>";
        echo "                      </a>";
        echo "                  </td>";
        echo "                  <td style='text-align: left;'>";
        echo "                      <a href='#' onclick='enviaForm(\"formAlteraUsuario\");' title='Salvar' alt='Salvar'>";
        echo "                          <label>Salvar</label>";
        echo "                      </a>";
        echo "                  </td>";
        echo "          </tr>";
        echo "      </table>";
//        echo "      <a href='inicio.php?m=config&t=usis' class='btn btn-default'>Cancelar</a> ";
//        echo "      <button class='btn btn-primary' type='submit' style='width: 80px;'>Salvar</button>";
        echo "  </div>";
        echo "</form>";
        echo "<br>";



        echo "</div>";
        echo "<div class='col-xs-2 col-sm-2 placeholder'>";
        echo "  &nbsp;";
        echo "</div>";


        if($_POST){

            $this->setDataAlteracao(addslashes(filter_input(INPUT_POST, 'dataAlteracao')));
            //$this->codAlteraUsuario = addslashes(filter_input(INPUT_POST, 'codusuario'));
            $this->setEmail(addslashes(filter_input(INPUT_POST, 'email')));
            $this->setCodTipoUsuario(addslashes(filter_input(INPUT_POST, 'tipousuario')));
            $this->setSenha(addslashes(filter_input(INPUT_POST, 'senha')));

/*            echo "Data Alteração: ".$this->dataAlteracao."<br>";
            echo "Código Usuário: ".$this->codAlteraUsuario."<br>";
            echo "E-mail: ".$this->email."<br>";
            echo "Código Tipo Usuário: ".$this->codTipoUsuario."<br>";
            echo "Senha: ".$this->senha."<br>";*/


            if($this->alteraUsuario()){
                echo "<label class='alert alert-success'>Usuário alterado com sucesso!</label>";
                echo "<meta http-equiv='refresh' content='2;url='inicio.php?m=config&t=usis'>";
            }else{
                echo "<label class='alert alert-danger'>Erro ao alterar o usuário.</label>";
            }


        }

    }

    public function alteraUsuario(){
        if(!empty($this->senha)){
            $alteraSenha = ", senha = '".$this->senha."'";
        }else{
            $alteraSenha = "";
        }


        try{
            $sqlAlteraUsuario = "UPDATE tblusuario SET email = '".$this->email."', dataAlteracao = '".$this->dataAlteracao."', codTipo = ".$this->codTipoUsuario."$alteraSenha  WHERE idUsuario = ".$this->codAlteraUsuario;

            //echo "<br>SQL: ".$sqlAlteraUsuario;

            $resultadoAlteracao = mysql_query($sqlAlteraUsuario) or die ("Erro no comando SQL de alteração do usuário. Descrição: ".mysql_error());

            if($resultadoAlteracao){
                return true;
            }
            return false;

        }catch(Exception $e){
            echo "Exception ativado. Descrição: ".$e->getMessage();
        }
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
        echo "      <input type='text' name='nome' id='nome'  placeholder='Nome' class='form-control' onkeydown='enterTab(\"senha\", event)' />";
        echo "   </div>";
        echo "</div>";
        
        echo "<div class='form-group'>";
        echo "   <label class='col-sm-2 control-label' style='font-size: 12px;'>" . SENHA . "</label>";
        echo "   <div class='col-sm-5'>";
        echo "      <input type='password' name='senha' id='senha' class='form-control' maxlenght='8' onkeydown='enterTab(\"email\", event)' />";
        echo "   </div>";
        echo "   <label class='col-sm-2 control-label' style='font-size: 12px;'>&nbsp;</label>";
        echo "   <div class='col-sm-5' style='color: red; text-align: left;'>";
        echo "      <small>*No máximo 8 alfanuméricos</small>";
        echo "   </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-2 control-label' style='font-size: 12px;'>" . EMAIL . "</label>";
        echo "   <div class='col-sm-5'>";
        echo "      <input type='email' name='email' id='email' onkeydown='enterTab(\"salvar\", event)' placeholder='E-mail' class='form-control' />";
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
        echo "   <div class='col-sm-3'>";
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
            $sql = "SELECT u.*, tp.nomeTipo "
                    . "FROM tblusuario u "
                    . "INNER JOIN tipousuario tp ON u.codTipo = tp.idtipo "
                    . "WHERE (u.nomeUsuario = '".$usuario."' "
                    . "OR u.email = '".$usuario."') "
                    . "AND u.senha = '".$this->senha."'";

                    //echo "SQL comando Usuário: ".$sql;

            $resultado = mysql_query($sql) or die("Problemas no SQL. Verifique sob o erro: ".mysql_error()." |||");
            $dados = mysql_fetch_array($resultado);

            if($dados > 0){
                session_start();
                $_SESSION['idusuario'] = $dados['idUsuario'];//Não está gravando
                $_SESSION['usuario'] = $dados['nomeUsuario'];
                $_SESSION['email'] = $dados['email'];
                $_SESSION['codTipoUsuario'] = $dados['codTipo'];
                $_SESSION['nomeTipo'] = $dados['nomeTipo'];
                $_SESSION['logado'] = true;
                
                $identifUsuario = base64_encode($_SESSION['idusuario']);
                
                $atividade = new atividades();
                $atividade->writeLog($_SESSION['usuario'], "Entrada no sistema", "controller/");
                //$atividade->writeUsuarioXml($_SESSION['usuario'], "Entrada no sistema", date('d/m/Y'), date('H:i:s'));

                header("Location: ../sistema/view/inicio.php");//?usuario=".$identifUsuario


//                echo "<br>Sessão ID: ".$_SESSION['idusuario'];//Os campos estão OK
//                echo "<br>Sessão Usuário: ".$_SESSION['usuario'];
//                echo "<br>Sessão E-mail: ".$_SESSION['email'];
//                echo "<br>Sessão Senha: ".$_SESSION['codTipoUsuario'];
            }else{
                header("Location: ../sistema/index.php?erro=1");//Erro usuário
                //echo "Comando não executado";

            }
            
        } catch (Exception $ex) {
            echo "Houve um erro ao validar. Erro: ".$ex->getMessage();
        }
        
        
        
    }
    
    
    
}
