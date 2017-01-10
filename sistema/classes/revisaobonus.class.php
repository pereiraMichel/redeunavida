<?php

/*
 * Classe de inclusão e alteração da revisão de bonus
 * 
 * 
 */

class revisaobonus {

    private $idrevisaobonus;
    private $somaservico;
    private $somabonustotal;
    private $paragem;
    private $indiceinvestimento;
    
    
    function getIdrevisaobonus() {
        return $this->idrevisaobonus;
    }

    function setIdrevisaobonus($idrevisaobonus) {
        $this->idrevisaobonus = $idrevisaobonus;
    }
    
    function getSomaservico() {
        return $this->somaservico;
    }

    function getSomabonustotal() {
        return $this->somabonustotal;
    }

    function getParagem() {
        return $this->paragem;
    }

    function getIndiceinvestimento() {
        return $this->indiceinvestimento;
    }

    function setSomaservico($somaservico) {
        $this->somaservico = $somaservico;
    }

    function setSomabonustotal($somabonustotal) {
        $this->somabonustotal = $somabonustotal;
    }

    function setParagem($paragem) {
        $this->paragem = $paragem;
    }

    function setIndiceinvestimento($indiceinvestimento) {
        $this->indiceinvestimento = $indiceinvestimento;
    }


    public function verificaRevisaoBonus(){
//        $conecta = new conectaBanco();
//        $conecta->conecta();
        
        $sqlRevisaoBonus = "SELECT * FROM revisaobonus WHERE paragem = ".$this->paragem;
        
        try{
            $resultadoRevisaoBonus = mysql_query($sqlRevisaoBonus) or die ("Não foi possível executar o comando SQL. Erro: ".mysql_error());
            
            if(mysql_num_rows($resultadoRevisaoBonus) > 0){
                $this->alteraRevisaoBonus();
            }else{
                $this->insereRevisaoBonus();
            }
            
        } catch (Exception $ex) {
            echo "Não foi possível executar a revisão. Erro: ".$ex->getMessage();
        }
        
    }
    
    public function insereRevisaoBonus(){
//        $conecta = new conectaBanco();
//        $conecta->conecta();
        
        $this->idrevisaobonus = ultimoId::ultimoIdBanco("idrevisaobonus", "revisaobonus");
        
        $sqlInsereRevisaoBonus = "INSERT INTO revisaobonus (idrevisaobonus, somaservico, somabonustotal, paragem, indiceinvestimento)
                             VALUES (".$this->idrevisaobonus.", ".$this->somaservico.", ".$this->somabonustotal.", ".$this->paragem.", ".$this->indiceinvestimento.")";
        
        try{
            $resultadoInsereBonus = mysql_query($sqlInsereRevisaoBonus) or die ("Não foi possivel executar o comando SQL. Erro: ".mysql_error());
            
            if($resultadoInsereBonus){
                return true;
            }
            
            return false;
        } catch (Exception $ex) {
            echo "Problemas ao executar. Erro: ".$ex->getMessage();
        }
        
    }
    
    public function alteraRevisaoBonus(){
//        $conecta = new conectaBanco();
//        $conecta->conecta();

        $sqlAlteraRevisaoBonus = "UPDATE revisaobonus SET somaservico = ".$this->somaservico.", somabonustotal = ".$this->somabonustotal.", paragem = ".$this->paragem.", indiceinvestimento = ".$this->indiceinvestimento.", WHERE idrevisao = ".$this->idrevisaobonus;
        
        try{
            $resultadoAlteracaoBonus = mysql_query($sqlAlteraRevisaoBonus) or die ("Erro no comando SQL. Descrição: ".mysql_error());
            
            if($resultadoAlteracaoBonus){
                return true;
            }
            
            return false;
            
            
        } catch (Exception $ex) {
            echo "Erro ao processar a alteração. Erro: ".$ex->getMessage();
        }
        
    }
    
    
}
