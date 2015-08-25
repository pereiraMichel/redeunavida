<?php


class controlUsuario {
    
    private $usuario;
    private $senha;
    
    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function getUsuario(){
        echo $this->usuario;
    }
    
    public function getSenha(){
        echo $this->senha;
    }
    
    public function validaUsuario(){

        try{
        echo "<br>Validando ".  $this->usuario;
        echo "<br>Validando ".  $this->senha;//Parou aqui.

        if ($this->usuario != "" || $this->senha != ""){
            return true;
        }else{
            return false;
        }
        
        }  catch (Exception $ex){
            echo "Houve um erro: ".$ex->getMessage();
        }
        
    }

    
    
    
    
    
}
