<?php

//define('__ROOT__', dirname(dirname(__FILE__)));
//
//require_once __ROOT__.'/conexao/conectaBanco.php';
require_once 'conexao/conectaBanco.php';

class modelFoto {
    
    private $idUsuario;
    
    
    function getIdUsuario() {
        return $this->idUsuario;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    
    public function consultaFoto(){
        $conexao = new conectaBanco();
        $conexao->conecta();
        
        try{
            $sql = "SELECT * FROM tblfoto f 
                    INNER JOIN tblloginsystems l ON f.idUsuario = l.codUsuario 
                    WHERE f.codUsuario = ".$this->idUsuario;
            $resultado = mysql_query($sql) or die ("Há um problema no comando SQL. Erro: ".mysql_error());
            $dados = mysql_fetch_array($resultado);
            
            if($dados > 0){
                echo "<img src='".$dados['foto']."' title='".$dados['nomeUsuario']."'>";
            }else{
                echo "<img src='../../images/User-blue.png' width='150' height='150' title=''>";
            }
            
            
        } catch (Exception $ex) {
            echo "Não foi possível efetuar a consulta. Erro: ".$ex->getMessage();
        }
        
    }
    
    
    
    
}
