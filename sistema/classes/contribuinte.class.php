<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contribuinte
 *
 * @author Debug
 */
class contribuinte {
    
    private $idContribuinte;
    private $mes;
    private $estacao;
    private $valor;
    private $total;
    private $codUsuarioContribuinte;
    private $codJornada;
    private $codUsuario;
    
    function getIdContribuinte() {
        return $this->idContribuinte;
    }

    function getMes() {
        return $this->mes;
    }

    function getEstacao() {
        return $this->estacao;
    }

    function getValor() {
        return $this->valor;
    }

    function getTotal() {
        return $this->total;
    }

    function getCodUsuarioContribuinte() {
        return $this->codUsuarioContribuinte;
    }

    function getCodJornada() {
        return $this->codJornada;
    }

    function getCodUsuario() {
        return $this->codUsuario;
    }

    function setIdContribuinte($idContribuinte) {
        $this->idContribuinte = $idContribuinte;
    }

    function setMes($mes) {
        $this->mes = $mes;
    }

    function setEstacao($estacao) {
        $this->estacao = $estacao;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setTotal($total) {
        $this->total = $total;
    }

    function setCodUsuarioContribuinte($codUsuarioContribuinte) {
        $this->codUsuarioContribuinte = $codUsuarioContribuinte;
    }

    function setCodJornada($codJornada) {
        $this->codJornada = $codJornada;
    }

    function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    public function verificaContribuinte(){
        
    }
    
    public function ultimoId(){
        
    }
    
    public function novoContribuinte(){
        
    }
    
    public function editContribuinte(){
        
    }
    
    public function deleteContribuinte(){
        
    }
    
}
