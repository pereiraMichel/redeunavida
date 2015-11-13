<?php

require_once 'conexao/conectaBancoSite.php';

class classLoginSite {

    private $idLoginSite;
    private $nome;
    private $dataNascimento;
    private $setenio;
    private $estadoCivil;
    private $profissao;
    private $endereco;
    private $telefone;
    private $email;
    private $dataCadastro;
    private $resumo;
    private $motivacao;
    private $senha;
    private $confirmEmail;
    
    function getConfirmEmail() {
        return $this->confirmEmail;
    }

    function setConfirmEmail($confirmEmail) {
        $this->confirmEmail = $confirmEmail;
    }

    function getNome() {
        return $this->nome;
    }

    function getDataNascimento() {
        return $this->dataNascimento;
    }

    function getSetenio() {
        return $this->setenio;
    }

    function getEstadoCivil() {
        return $this->estadoCivil;
    }

    function getProfissao() {
        return $this->profissao;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getEmail() {
        return $this->email;
    }

    function getDataCadastro() {
        return $this->dataCadastro;
    }

    function getResumo() {
        return $this->resumo;
    }

    function getMotivacao() {
        return $this->motivacao;
    }

    function getSenha() {
        return $this->senha;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    function setSetenio($setenio) {
        $this->setenio = $setenio;
    }

    function setEstadoCivil($estadoCivil) {
        $this->estadoCivil = $estadoCivil;
    }

    function setProfissao($profissao) {
        $this->profissao = $profissao;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    function setResumo($resumo) {
        $this->resumo = $resumo;
    }

    function setMotivacao($motivacao) {
        $this->motivacao = $motivacao;
    }

    function setSenha($senha) {
        $senhaCriptografada = md5($senha);
        $this->senha = $senhaCriptografada;
    }
    
    function getIdLoginSite() {
        return $this->idLoginSite;
    }

    function setIdLoginSite($idLoginSite) {
        $this->idLoginSite = $idLoginSite;
    }

        public function ultimoId(){
        
            $conexao = new conectaBancoSite();
            $conexao->conecta();
            
        try{
            $sql = "SELECT MAX(idLoginSite) AS idLoginSite FROM tblloginsite";
            
            $resultado = mysql_query($sql) or die ("Erro de preenchimento SQL. Erro: ".mysql_error());
            $dados = mysql_fetch_array($resultado);
            
            $id = $dados['idLoginSite'];
            
            $soma = $id + 1;
            
            $this->idLoginSite = $soma;
            
            mysql_close($dados);
            mysql_close($resultado);
            
        } catch (Exception $ex) {
            echo "Ocorreu um erro. ".$ex->getMessage();
        }
        
    }
    
    public function cadastraUsuario(){
        $this->ultimoId();
        
        try{

            $sql = "INSERT INTO tblloginsite "
                    . "(idLoginSite, nomeUsuario, senha, dataCadastro, email, dataNascimento, setenio, estadoCivil, profissao, endereco, telefone, resumo, motivacao, confirmEmail)"
                    . "VALUES (
                      ".$this->idLoginSite.",
                     '".$this->nome."', 
                     '".$this->senha."', 
                     '".$this->dataCadastro."',  
                     '".$this->email."',
                     '".$this->dataNascimento."', 
                     '".$this->setenio."',  
                     '".$this->estadoCivil."',  
                     '".$this->profissao."', 
                     '".$this->endereco."',  
                     '".$this->telefone."', 
                     '".$this->resumo."', 
                     '".$this->motivacao."',  
                     '".$this->confirmEmail."')";
//            echo "<br/>".$sql;
            
            $resultado = mysql_query($sql) or die("Não foi possível inserir os dados. Erro: ".mysql_error());

            if($resultado){
                header("Location: formAdesao.php?mensagem=1");
            }
        } catch (Exception $ex) {
            echo "Ocorreu um erro. ".$ex->getMessage();
        }
        
    }
    
    public function verificaUsuarioEmail($nomeUsuario, $email){
        $conexao = new conectaBancoSite();
        $conexao->conecta();
        try{
            $sql = "SELECT * FROM tblloginsite WHERE nomeUsuario = '".$nomeUsuario."' "
                    . "AND email = '".$email."'";
            $resultado = mysql_query($sql) or die ("Problemas na execução do SQL. Erro: ".mysql_error());
            $dados = mysql_fetch_array($resultado);
            
            if($dados > 0){
                return true;
            }else{
                return false;
            }
            
            
        } catch (Exception $ex) {
            echo "Ocorreu um erro. Erro: ".$ex->getMessage();
        }
        
    }
    
    public function telaLogin($pagina){
        
        echo "<form name='login_site' action='".$pagina."' method='post' class='form-horizontal'>";
        echo "    <div class='modal fade' id='loginSite' tabindex='-1' role='dialog' aria-labelledby='modalAdesao'>";
        echo "        <div class='modal-dialog' role='document'>";
        echo "            <div class='modal-content'>";
        echo "                <div class='modal-header'>";
        echo "                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "                        <span aria-hidden='true'>&times;</span>";
        echo "                    </button>";
        echo "                    <h4 class='modal-title' id='modalSite'><img src='images/logoJrGraficoColor.png' width='32' height='32'/> Jornada Real - <small>Login</small></h4>";
        echo "                </div>";
        echo "                <div class='modal-body'>";
                                $this->formLogin();
        echo "                </div>";
        echo "                <div class='modal-footer' style='padding-right: 50px'>";
        echo "                    <button type='button' class='btn btn-default' data-dismiss='modal'>Fechar</button>";
        echo "                    <button type='submit' class='btn btn-primary'>Entrar</button>";
        echo "                </div>";
        echo "                <br/>";
        echo "            </div>";
        echo "        </div>";
        echo "    </div>";
        echo "</form>";

        if($_POST){
            $usuario = filter_input(INPUT_POST, 'login');
            $senha = filter_input(INPUT_POST, 'senha');
            
            $this->setSenha($senha);
            
            if($this->validaUsuarioSite($usuario, $this->senha)){
                header("Location: ".$pagina."?usuario=".  base64_encode($usuario));
                session_start();
                $_SESSION['usuarioLogado'] = $usuario;
                $_SESSION['logado'] = true;
            }else{
                header("Location: ".$pagina."?erro=1");
            }
            
        }        
        
    }
    
    public function validaUsuarioSite($usuario, $senha){
        $conexao = new conectaBancoSite();
        $conexao->conecta();
        
        try{
            $sql = "SELECT * FROM tblloginsite "
                    . "WHERE (nomeUsuario = '".$usuario."' OR email = '".$usuario."') "
                    . "AND senha = '".$senha."'";
            
            $resultado = mysql_query($sql) or die ("Houve um problema no SQL. Verifique sob o erro: ".mysql_error());
            
            $dados = mysql_fetch_array($resultado);
            
            if($dados > 0){
                return true;
            }else{
                return false;
            }
            
            
        } catch (Exception $ex) {
            echo "Ocorreu um erro de consulta. Descrição técnica: ".$ex->getMessage();
        }
        
        
    }
    
    public function formLogin(){
        echo "<div class='form-group'>";
        echo "  <label for='login' class='col-sm-2 control-label'>";
        echo "      Login";
        echo "  </label>";
        echo "  <div class='col-sm-9'>";
        echo "      <input type='text' class='form-control' id='login' name='login' placeholder='Nome ou E-mail'>";
        echo "  </div>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "  <label for='senha' class='col-sm-2 control-label'>";
        echo "      Senha";
        echo "  </label>";
        echo "  <div class='col-sm-9'>";
        echo "      <input type='password' class='form-control' id='senha' name='senha' placeholder='Senha'>";
        echo "  </div>";
        echo "</div>";
    }
    
}
