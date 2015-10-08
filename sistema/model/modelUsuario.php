<?php
define('__ROOT__', dirname(dirname(__FILE__)));

require_once (__ROOT__.'../conexao/conectaBanco.php');

//use conectaBanco;

class modelUsuario {
    
    private $idUsuario;
    private $usuario;
    private $senha;
    private $email;
    private $dataCadastro;
    private $dataUltimaAlteracao;
    private $codTipoUsuario;
    
    function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }
    function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    function setSenha($senha){
        $senhaCriptografada = md5($senha);
        $this->senha = $senhaCriptografada;
    }
    function setEmail($email){
        $this->email = $email;
    }
    function setDataCadastro($dataCadastro){
        $this->dataCadastro = $dataCadastro;
    }
    function setDataUltimaAlteracao($dataUltimaAlteracao){
        $this->dataUltimaAlteracao = $dataUltimaAlteracao;
    }
    function setCodTipoUsuario($codTipoUsuario){
        $this->codTipoUsuario = $codTipoUsuario;
    }
    
    function getUsuario(){
        echo $this->usuario;
    }
    function getIdUsuario(){
        echo $this->idUsuario;
    }
    function getEmailUsuario(){
        echo $this->email;
    }
    function getTipoUsuario(){
        echo $this->codTipoUsuario;
    }

    public function consultaUsuarioPerfil(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        try{
            $sql = "SELECT * "
                    . "FROM tblloginsystems l "
                    . "INNER JOIN tblperfil p ON p.codUsuario = l.idUsuario "
                    . "INNER JOIN tblsetenio s ON p.codSetenio = s.idsetenio "
                    . "WHERE l.idUsuario = ".$this->idUsuario;
            
            $resultado = mysql_query($sql);
            $dados = mysql_fetch_array($resultado);
            
            if($dados < 1){
                echo "<li style='font-size: 11px;'><b>Perfil não preenchido.</b></li>";
                echo "<li style='font-size: 11px;'>&nbsp;</li>";
                echo "<li style='font-size: 11px;'><a href='perfil.php'>Alterar</a></li>";
            }else{
                echo "<li>Profissão: ".$dados['profissao']."</li>";
                echo "<li>Data de Nascimento: ".date("d/m/Y", strtotime($dados['dataNascimento']))."</li>";
                echo "<li>Setênio: ".$dados['setenio']."</li>";
                echo "<li>Descrição: ".$dados['descricao']."</li>";
            }
        } catch (Exception $ex) {
            echo "Houve um erro ao preencher. Erro: ".$ex->getMessage();
        }
    }
    
    public function validaUser($usuario, $senha){ // função para validar o usuário e a senha

        $conecta = new conectaBanco();
        $conecta->conecta();
        
        try{
            $sql = "SELECT * "
                    . "FROM tblloginsystems "
                    . "WHERE nomeUsuario = '".$usuario."' "
                    . "OR emailUsuario = '".$usuario."' "
                    . "AND senha = '".$senha."'";

            $resultado = mysql_query($sql);
            $dados = mysql_fetch_array($resultado);

            if($dados > 0){
                session_start();
                $_SESSION['idusuario'] = $dados['idUsuario'];//Não está gravando
                $_SESSION['usuario'] = $dados['nomeUsuario'];
                $_SESSION['email'] = $dados['emailUsuario'];
                $_SESSION['codTipoUsuario'] = $dados['codTipoUsuario'];
                
                $identifUsuario = base64_encode($_SESSION['idusuario']);
                
                header("Location: ../sistema/view/inicio.php?usuario=".$identifUsuario);
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
    
    public function ultimoRegistro(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        try{
            
            $sql = "SELECT MAX(idUsuario) AS idUsuario FROM tblusuario";
            $resultado = mysql_query($sql);
            $dados = mysql_fetch_array($resultado);
            $novoId = $dados['idUsuario'] + 1;
            
            $this->idUsuario = $novoId;
            
//            mysql_close($resultado);
        } catch (Exception $ex) {
            echo "Houve um erro no novo ID. Erro: ".$ex->getMessage();
        }
        
//        $conecta->desconecta($conecta);
    }
    
    public function cadastraUsuario(){
        $enviado = false;
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        try{
            $sql = "INSERT INTO tblloginsystems (idUsuario, nomeUsuario, emailUsuario, senha, dataCadastro, dataUltimaAlteracao, codTipoUsuario) "
                    . "VALUES ("
                    . $this->idUsuario.", "
                    . "'".$this->usuario."', "
                    . "'".$this->email."', "
                    . "'".$this->senha."', "
                    . "'".$this->dataCadastro."', "
                    . "'".$this->dataUltimaAlteracao."', "
                    . $this->codTipoUsuario.")";
            
            echo "<br>".$sql;
            $resultado = mysql_query($sql) or die ("<br>Erro: ".  mysql_error());
            
            if($resultado){
                $enviado = true;
            }else{
                $enviado = false;
            }
            
        } catch (Exception $ex) {
            echo "Problemas ao inserir os dados. Erro: ".$ex->getMessage();
        }
        
    }
    
    
}
