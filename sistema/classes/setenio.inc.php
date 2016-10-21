<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of setenio
 *
 * @author Debug
 */
class setenio {
    
    private $idSetenio;
    private $setenio;
    private $idadeInicial;
    private $idadeFinal;
    
    function getIdSetenio() {
        return $this->idSetenio;
    }

    function getSetenio() {
        return $this->setenio;
    }

    function getIdadeInicial() {
        return $this->idadeInicial;
    }

    function getIdadeFinal() {
        return $this->idadeFinal;
    }

    function setIdSetenio($idSetenio) {
        $this->idSetenio = (int) $idSetenio;
    }

    function setSetenio($setenio) {
        $this->setenio = $setenio;
    }

    function setIdadeInicial($idadeInicial) {
        $this->idadeInicial = (int) $idadeInicial;
    }

    function setIdadeFinal($idadeFinal) {
        $this->idadeFinal = (int) $idadeFinal;
    }

    public function verificaSetenio(){
        
    }
    
    public function ultimoId(){
        
    }
    
    public function novoSetenio(){
        
    }
    
    public function editSetenio(){
        
    }
    
    public function deleteSetenio(){
        
    }
}
