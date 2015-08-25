<?php
define('__ROOT__', dirname(dirname(__FILE__)));

require_once (__ROOT__.'../conexao/conectaBanco.php');

class modelTipoUsuario {

    private $idTipoUsuario;
    private $nomeTipoUsuario;
    
    public function setIdTipoUsuario($tipousuario){
        $this->idTipoUsuario = $tipousuario;
    }
    
    public function setNomeTipoUsuario($nomeTipoUsuario){
        $this->nomeTipoUsuario = $nomeTipoUsuario;
    }
    
    public function consultaGeralTipoUsuario(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $sql = "SELECT * FROM tbltipousuario";
        try{
            $resultado = mysql_query($sql);
            
            while($dados = mysql_fetch_array($resultado)){
                echo $dados['nomeTipoUsuario'];
            }
            
            
        } catch (Exception $ex) {
            echo "Houve um problema na consulta geral do tipo de usuário. Consulte o analista. Erro: ".$ex->getMessage();
        }
    }
    
    public function consultaTipoUsuario(){
        
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $sql = "SELECT * FROM tbltipousuario "
                ."WHERE idTipoUsuario=".$this->idTipoUsuario;
        
        try{
            $resultado = mysql_query($sql);
            $dados = mysql_fetch_array($resultado);
            
            if($dados > 0){
                echo $dados['nomeTipoUsuario'];
            }else{
                echo "Tipo de Usuário inválido.";
            }
            
        } catch (Exception $ex) {
            echo "Houve um problema na consulta do tipo de usuário. Consulte o analista. Erro: ".$ex->getMessage();
        }
        
        
        
        
    }
    
    
    
}
