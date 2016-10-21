<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of balancete
 *
 * @author Debug
 */
class balancete {
    
    private $idBalancete;
    private $anoMes;
    private $mes;
    private $data;
    private $descricao;
    private $entrada;
    private $saida;
    private $saldo;
    private $codUsuario;
    
    function getIdBalancete() {
        return $this->idBalancete;
    }

    function getAnoMes() {
        return $this->anoMes;
    }

    function getData() {
        return $this->data;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getEntrada() {
        return $this->entrada;
    }

    function getSaida() {
        return $this->saida;
    }

    function getSaldo() {
        return $this->saldo;
    }

    function getMes(){
        return $this->mes;
    }

    function setIdBalancete($idBalancete) {
        $this->idBalancete = (int) $idBalancete;
    }

    function setAnoMes($anoMes) {
        $this->anoMes = $anoMes;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setEntrada($entrada) {
        $this->entrada = (double) $entrada;
    }

    function setSaida($saida) {
        $this->saida = (double) $saida;
    }

    function setSaldo($saldo) {
        $this->saldo = (double) $saldo;
    }

    function setMes($mes){
        $this->mes = $mes;
    }

    function getCodUsuario() {
        return $this->codUsuario;
    }

    function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    
    public function ultimoId(){
        $sqlUltimoNumero = "SELECT MAX(idBalancete) AS idBalancete FROM balancete";
        
        try{
            
            $resultUltimoNum = mysql_query($sqlUltimoNumero) or die (RETURN_SQL.mysl_error());

            $dados = mysql_fetch_array(resultUltimoNum);

            $novoId = $dados['idBalancete'] + 1;

            $this->idBalancete = $novoId;

            mysql_close($resultUltimoNum);

        } catch (Exception $ex) {
            echo EXCEPTION_CON.$ex->getMessage();
        }
        
    }


    public function verificaBalancete(){//Verifica se o balancete é para incluir ou alterar
        $sqlVerificaBalancete = "SELECT * FROM balancete WHERE idBalancete = ".$this->balancete;
        try{
            $resultVerificaBalancete = mysql_query($sqlVerificaBalancete) or die(RETURN_SQL.mysql_error());
            if(mysql_num_rows(resultVerificaBalancete) > 0){
                $this->editBalancete();
            }else{
                $this->novoBalancete();
            }
            mysql_close($resultVerificaBalancete);
        }catch(Exception $ex){
            echo EXCEPTION_CON.$ex->getMessage();
        }
    }

    public function novoBalancete(){
        //$this->ultimoId();

        $this->idBalancete = ultimoId::buscaUltimoId('idBalancete', 'balancete');

        $sqlNovoBalancete = "INSERE_BALANCETE(".$this->idBalancete.", ".$this->anoMes.", ".$this->mes.", ".$this->data.", ".$this->descricao.", ".$this->entrada.", ".$this->saida.", ".$this->saldo.", ".$this->codUsuario.")";
        try{
            $resultNovoBalancete = mysql_query($sqlNovoBalancete) or die(RETURN_SQL.mysql_error());
            if(!$resultNovoBalancete){
                echo "Não foi inserido. ".VER_ANALISTA;
            }
            mysql_close($resultNovoBalancete);
        }catch(Exception $ex){
            echo EXCEPTION_INC.$ex->getMessage();
        }
    }
    
    public function editBalancete(){
        $sqlEditBalancete = "EDIT_BALANCETE(".$this->idBalancete.", ".$this->anoMes.", ".$this->mes.", ".$this->data.", ".$this->descricao.", ".$this->entrada.", ".$this->saida.", ".$this->saldo.", ".$this->codUsuario.")";

        try{
            $resultEditBalancete = mysql_query($sqlEditBalancete) or die(RETURN_SQL.mysql_error());
            if(!$resultEditBalancete){
                echo "Não foi alterado. ".VER_ANALISTA;
            }
            mysql_close($resultEditBalancete);
        }catch(Exception $ex){
            echo EXCEPTION_ALT.$ex->getMessage();
        }
    }

    public function deleteBalancete(){
        $sqlDeleteBalancete = "DELETE_BALANCETE(".$this->idBalancete.")";
        try{
            $resultDeleteBalancete = mysql_query($sqlDeleteBalancete) or die(RETURN_SQL.mysql_error());
            if(!$resultDeleteBalancete){
                echo "Não foi excluído. ".VER_ANALISTA;
            }
            mysql_close($resultDeleteBalancete);
        }catch(Exception $ex){
            echo EXCEPTION_EXC.$ex->getMessage();
        }

    }
}
