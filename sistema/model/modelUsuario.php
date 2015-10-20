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
            
            $sql = "SELECT MAX(idUsuario) AS idUsuario FROM tblloginsystems";
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
        
        $this->ultimoRegistro();
        
        $this->dataUltimaAlteracao = $this->dataCadastro;
        
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

    
    public function formularioCadastro(){
        echo "<div class='tab-pane active' id='tab1'>";
        echo "  <input type='hidden' name='dataSql' id='dataSql' value='" . date('Y/m/d') . "' size='10' readonly='readonly' />";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-2 control-label' style='font-size: 11px;'>" . NOME . "</label>";
        echo "   <div class='col-sm-10'>";
        echo "      <input type='text' name='nome' id='nome'  placeholder='Nome' class='form-control' />";
        echo "   </div>";
        echo "</div>";
        
        echo "<div class='form-group'>";
        echo "   <label class='col-sm-2 control-label' style='font-size: 11px;'>" . SENHA . "</label>";
        echo "   <div class='col-sm-10'>";
        echo "      <input type='password' name='text' id='senha' class='form-control' maxlenght='8' />";
        echo "   </div>";
        echo "   <label class='col-sm-2 control-label' style='font-size: 11px;'>&nbsp;</label>";
        echo "   <div class='col-sm-10' style='color: red; text-align: left;'>";
        echo "      <small>*No máximo 8 alfanuméricos</small>";
        echo "   </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-2 control-label' style='font-size: 11px;'>" . EMAIL . "</label>";
        echo "   <div class='col-sm-10'>";
        echo "      <input type='email' name='email' id='email' placeholder='E-mail' class='form-control' />";
        echo "   </div>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "   <label class='col-sm-2 control-label' style='font-size: 11px;'>" . ACESSO . "</label>";
        echo "   <div class='col-sm-10'>";
        echo "      <select name='tipoAcesso' class='form-control'>";
        
        try{
            $sqlAcesso = "SELECT * FROM tbltipousuario";
            $resultadoAcesso = mysql_query($sqlAcesso) or die ("Problemas na execução do MySQL. Erro: ".mysql_error());
            if($resultadoAcesso){
                
                while($dadosAcesso = mysql_fetch_array($resultadoAcesso)){
                    echo "<option value='".$dadosAcesso['idTipoUsuario']."'>".$dadosAcesso['nomeTipoUsuario']."</option>";
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
        echo "   <div class='col-sm-10'>";
        echo "      <input type='text' name='data' id='data' value='".date("d/m/Y")."' class='form-control' readonly />";
        echo "   </div>";
        echo "</div>";

        echo "</div>";
        
    }
    
    
    public function mensagem($mensagem){

        echo "<script>$(document).ready(function(){";
        echo "$('#mensagemUsuario').modal('show');";
        echo "});</script>";        
        
        echo "    <div class='modal fade' id='mensagemUsuario' tabindex='-1' role='dialog' aria-labelledby='mensagemErro'>";
        echo "        <div class='modal-dialog' role='document'>";
        echo "            <div class='modal-content'>";
        echo "                <div class='modal-header'>";
        echo "                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "                        <span aria-hidden='true'>&times;</span>";
        echo "                    </button>";
        echo "                    <h4 class='modal-title' id='mensagemErro'><img src='../../images/logoRUV50x51.png'/> Rede Una Vida - <small>Novo Usuário</small></h4>";
        echo "                </div>";
        echo "                <div class='modal-body'>";

        echo                    $mensagem;
        
        echo "                </div>";
        echo "                <div class='modal-footer' style='padding-right: 50px'>";
        echo "                    <button type='button' class='btn btn-default' data-dismiss='modal'>Fechar</button>";
//        echo "                    <button type='submit' class='btn btn-primary'>Enviar</button>";
        echo "                </div>";
        echo "                <br/>";
        echo "            </div>";
        echo "        </div>";
        echo "    </div>";
        
//        echo "<script>";
//        echo "  $('#mensagemErro').exec();";
//        echo "</script>";
    }
    
    function excluirUsuario($idusuario){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        try{
            $sql = "DELETE FROM tblloginsystems WHERE idUsuario = ".$idusuario;
            echo $sql;
//            $resultado = mysql_query($sql) or die ("<br>Erro: ".  mysql_error());
            
//            echo "<script> alert(".$resultado.")</script>";
            
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
