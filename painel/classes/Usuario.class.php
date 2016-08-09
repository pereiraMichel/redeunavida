<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Debug
 */
class Usuario {
    
    private $login;
    private $senha;
    private $autoriza;
    
    public function setLogin($login){
        $this->login = $login;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function setAutoriza($autoriza){
        $this->autoriza = $autoriza;
    }
    
    public function validaUsuario(){
        if($this->login === "admRuv" && $this->senha === "12345678"){
            $this->setAutoriza(true);
            return $this->autoriza;
        }else{
            $this->setAutoriza(false);
            return $this->autoriza;
        }
    }
    
    
    
}
