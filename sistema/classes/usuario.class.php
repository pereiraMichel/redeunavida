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
        
    }
    
    public function ultimoId(){
        
    }
    
    public function novoUsuario(){
        
    }
    
    public function editUsuario(){
        
    }
    
    public function deleteUsuario(){
        
    }
    
    
}
