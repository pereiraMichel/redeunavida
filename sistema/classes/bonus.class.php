<?php

class bonus {

    private $idbonus;
    private $mdt;
    private $pp;
    private $paragem;
    private $avaliacao;
    private $servico;
    private $bonustotal;
    private $codusuario;
    
    function getBonustotal() {
        return $this->bonustotal;
    }

    function setBonustotal($bonustotal) {
        $this->bonustotal = $bonustotal;
    }

    function getParagem() {
        return $this->paragem;
    }

    function setParagem($paragem) {
        $this->paragem = $paragem;
    }
    
    function getIdbonus() {
        return $this->idbonus;
    }

    function setIdbonus($idbonus) {
        $this->idbonus = $idbonus;
    }
    
    function getMdt() {
        return $this->mdt;
    }

    function getPp() {
        return $this->pp;
    }

    function getAvaliacao() {
        return $this->avaliacao;
    }

    function getServico() {
        return $this->servico;
    }

    function setMdt($mdt) {
        $this->mdt = $mdt;
    }

    function setPp($pp) {
        $this->pp = $pp;
    }

    function setAvaliacao($avaliacao) {
        $this->avaliacao = $avaliacao;
    }

    function setServico($servico) {
        $this->servico = $servico;
    }

    function getCodusuario() {
        return $this->codusuario;
    }

    function setCodusuario($codusuario) {
        $this->codusuario = $codusuario;
    }

    public function verificaBonus(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $sqlBonus = "SELECT * FROM bonus WHERE codusuario = ".$this->codusuario;
        
        try{
            $resultadoBonus = mysql_query($sqlBonus) or die ("Não foi possível executar o comando de consulta. Erro: ".mysql_error());
            
            if(mysql_num_rows($resultadoBonus) > 0){
                $this->alteraBonus();
            }else{
                $this->incluiBonus();
            }
            
        }catch(Exception $ex){
            echo "Problemas ao executar. Erro: ".$ex->getMessage();
        }
    }
    
    public function incluiBonus(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $this->idbonus = ultimoId::ultimoIdBanco("idbonus", "bonus");
        
        $sqlInsere = "INSERT INTO bonus (idbonus, mdt, pp, avaliacao, paragem, servico, soma_servico, soma_bonus, cod_usuario)
                      VALUES (".$this->idbonus.", ".$this->mdt.", ".$this->pp.", ".$this->avaliacao.", ".$this->paragem.", ".$this->servico.", ".$this->somaServico.", ".$this->bonustotal.", ".$this->codusuario.")";
        
        try{
            $resultadoIncluiBonus = mysql_query($sqlInsere) or die("Houve um erro no comando SQL. Erro: ".mysql_error());
            
            if($resultadoIncluiBonus){
                return true;
            }
            
            return false;
        } catch (Exception $ex) {
            echo "Erro ao processar o comando. Descrição: ".$ex->getMessage();
        }
        
    }
    
    public function alteraBonus(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $revisaoBonus = new revisaobonus();

        $sqlAlteraBonus = "UPDATE bonus SET mdt = ".$this->mdt.", pp = ".$this->pp.", avaliacao = ".$this->avaliacao.", servico = ".$this->paragem.", soma_servico = ".$this->servico.", soma_bonus = ".$this->bonustotal." WHERE paragem = ".$this->paragem." AND codusuario = ".$this->codusuario;
        
        try{
            $resultadoAlteraBonus = mysql_query($sqlAlteraBonus) or die ("Houve um erro no comando SQL de alteração. Erro: ".mysql_error());
            if($resultadoAlteraBonus){
                if($revisaoBonus->verificaRevisaoBonus()){
                    return true;
                }
            }
            
            return false;
        } catch (Exception $ex) {
            echo "Não foi possível processar o comando de alteração. Erro: ".$ex->getMessage();
        }
        
    }
    
    public function excluiBonus(){
        
    }
    
    //put your code here
}
