<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of perfil
 *
 * @author Debug
 */
class perfil {
    
    private $idperfil;
    private $nome;
    private $descricao;
    private $codUsuario;
    private $codSetenio;
    
    
    function getIdperfil() {
        return $this->idperfil;
    }

    function getNome() {
        return $this->nome;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getCodUsuario() {
        return $this->codUsuario;
    }

    function getCodSetenio() {
        return $this->codSetenio;
    }

    function setIdperfil($idperfil) {
        $this->idperfil = $idperfil;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    function setCodSetenio($codSetenio) {
        $this->codSetenio = $codSetenio;
    }

    public function verificaPerfil(){
        
    }
    
    public function ultimoId(){
        
    }
    
    public function novoPerfil(){
        
    }
    
    public function editPerfil(){
        
    }
    
    public function deletePerfil(){
        
    }
    
}
