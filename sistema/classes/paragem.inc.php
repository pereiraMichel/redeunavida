<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of paragem
 *
 * @author Debug
 */
class paragem {
    
    private $idParagem;
    private $paragem;
    private $anoRuv;
    private $mesRuv;
    private $mes;
    private $dia;
    private $diaSemana;
    private $hora;
    private $duracao;
    private $nivel;
    private $codUsuario;
    
    function getIdParagem() {
        return $this->idParagem;
    }

    function getParagem() {
        return $this->paragem;
    }

    function getAnoRuv() {
        return $this->anoRuv;
    }

    function getMesRuv() {
        return $this->mesRuv;
    }

    function getMes() {
        return $this->mes;
    }

    function getDia() {
        return $this->dia;
    }

    function getDiaSemana() {
        return $this->diaSemana;
    }

    function getHora() {
        return $this->hora;
    }

    function getDuracao() {
        return $this->duracao;
    }

    function getNivel() {
        return $this->nivel;
    }

    function getCodUsuario() {
        return $this->codUsuario;
    }

    function setIdParagem($idParagem) {
        $this->idParagem = (int) $idParagem;
    }

    function setParagem($paragem) {
        $this->paragem = $paragem;
    }

    function setAnoRuv($anoRuv) {
        $this->anoRuv = (int) $anoRuv;
    }

    function setMesRuv($mesRuv) {
        $this->mesRuv = (int) $mesRuv;
    }

    function setMes($mes) {
        $this->mes = (int) $mes;
    }

    function setDia($dia) {
        $this->dia = (int) $dia;
    }

    function setDiaSemana($diaSemana) {
        $this->diaSemana = $diaSemana;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setDuracao($duracao) {
        $this->duracao = (int) $duracao;
    }

    function setNivel($nivel) {
        $this->nivel = (double) $nivel;
    }

    function setCodUsuario($codUsuario) {
        $this->codUsuario = (int) $codUsuario;
    }

    public function verificaParagem(){
        $sqlVerificaParagem = "SELECT * FROM paragem WHERE paragem = '".$this->paragem."' AND codUsuario = ".$this->codUsuario;
        try{
            $resultVerifica = mysql_query($sqlVerificaParagem) or die(RETURN_SQL.mysql_error());
            if(mysql_num_rows($resultVerifica) > 0){//Verifica se a quantidade é maior que 0
                $this->editParagem();//Vai para alteração
            }else{
                $this->novaParagem();//Vai para inclusão
            }
            
        } catch (Exception $ex) {
            echo EXCEPTION_VERIF.$ex->getMessage();
        }
    }

    public function novaParagem(){
        $sqlNovaParagem = "INSERE_PARAGEM(".$this->idParagem.", ".$this->paragem.", ".$this->tipoTelefone.", ".$this->codUsuario.")";
        try{
            $resultNovo = mysql_query($sqlNovaParagem) or die(RETURN_SQL.mysql_error());
            if(!$resultNovo){
                echo "Não foi inserido. ".VER_ANALISTA;
            }
            mysql_close($resultNovo);
        } catch (Exception $ex) {
            echo EXCEPTION_INC.$ex->getMessage();
        }
    }
        
    public function editParagem(){
        $sqlEditTelefone = "EDIT_PARAGEM(".$this->idTelefone.", ".$this->telefone.", ".$this->tipoTelefone.", ".$this->codUsuario.")";
        try{
            $resultEdit = mysql_query($sqlEditTelefone) or die(RETURN_SQL.mysql_error());
            if(!$resultEdit){
                echo "Não foi alterado. ".VER_ANALISTA;
            }
            mysql_close($resultEdit);
        } catch (Exception $ex) {
            echo EXCEPTION_ALT.$ex->getMessage();
        }
    }
    
    public function deleteParagem(){
        $sqlDeleteParagem = "DELETE_PARAGEM(".$this->idParagem.")";
        try{
            $resultDelete = mysql_query($sqlDeleteParagem) or die(RETURN_SQL.mysql_error());
            if(!$resultDelete){
                echo "Não foi excluído. ".VER_ANALISTA;
            }
            mysql_close($resultDelete);
        } catch (Exception $ex) {
            echo EXCEPTION_EXC.$ex->getMessage();
        }
    }
    
    static function teste(){
        echo "Testado e funcionando.";
    }
    //put your code here
}
