<?php


class revisao {

    private $idrevisao;
    private $somabonus;
    private $somaparagem;
    private $somaavaliacao;
    private $somapp;
    private $somatotal;
    private $percentual;
    private $somasemana; //divide por 35
    private $codusuario;
    private $paragem;
    private $servico;
    
    
    function getParagem() {
        return $this->paragem;
    }

    function setParagem($paragem) {
        $this->paragem = $paragem;
    }

        function getCodusuario() {
        return $this->codusuario;
    }

    function setCodusuario($codusuario) {
        $this->codusuario = $codusuario;
    }

    function getIdrevisao() {
        return $this->idrevisao;
    }

    function getSomabonus() {
        return $this->somabonus;
    }

    function getSomaparagem() {
        return $this->somaparagem;
    }

    function getSomaavaliacao() {
        return $this->somaavaliacao;
    }

    function getSomapp() {
        return $this->somapp;
    }

    function getSomasomatotal() {
        return $this->somasomatotal;
    }

    function getPercentual() {
        return $this->percentual;
    }

    function getSomasemana() {
        return $this->somasemana/35;
    }

    function setIdrevisao($idrevisao) {
        $this->idrevisao = $idrevisao;
    }

    function setSomabonus($somabonus) {
        $this->somabonus = $somabonus;
    }

    function setSomaparagem($somaparagem) {
        $this->somaparagem = $somaparagem;
    }

    function setSomaavaliacao($somaavaliacao) {
        $this->somaavaliacao = $somaavaliacao;
    }

    function setSomapp($somapp) {
        $this->somapp = $somapp;
    }

    function setSomatotal($somatotal) {
        $this->somasomatotal = $somatotal;
    }

    function setPercentual($percentual) {
        $this->percentual = $percentual;
    }

    function setSomasemana($somasemana) {
        $this->somasemana = $somasemana;
    }

    
    public function verificaRevisao(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $sqlRevisao = "SELECT * FROM revisao WHERE codusuario = ".$this->codusuario." AND paragem = ".$this->paragem;
        
        try{
            $resultadoRevisao = mysql_query($sqlRevisao) or die ("Não foi possível executar o comando SQL. Erro: ".mysql_error());
            
            if(mysql_num_rows($resultadoRevisao) > 0){
                $this->alteraRevisao();
            }else{
                $this->insereRevisao();
            }
            
        } catch (Exception $ex) {
            echo "Não foi possível executar a revisão. Erro: ".$ex->getMessage();
        }
        
    }
    
    public function insereRevisao(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $this->idrevisao = ultimoId::ultimoIdBanco("idrevisao", "revisao");
        
        $sqlInsereRevisao = "INSERT INTO revisao (idrevisao, somabonus, somaparagem, somaavaliacao, somapp, somatotal, percentual, somasemana, paragem, codusuario)
                             VALUES (".$this->idrevisao.", ".$this->somabonus.", ".$this->somaparagem.", ".$this->somaavaliacao.", ".$this->somapp.", ".$this->somatotal.", ".$this->percentual.", ".$this->somasemana.", ".$this->paragem.", ".$this->codusuario.")";
        
        try{
            $resultadoInsere = mysql_query($sqlInsereRevisao) or die ("Não foi possivel executar o comando SQL. Erro: ".mysql_error());
            
            if($resultadoInsere){
                return true;
            }
            
            return false;
        } catch (Exception $ex) {

        }
        
    }
    
    public function alteraRevisao(){
        $conecta = new conectaBanco();
        $conecta->conecta();

        $sqlAlteraRevisao = "UPDATE revisao SET somabonus = ".$this->somabonus.", somaparagem = ".$this->somaparagem.", somaavaliacao = ".$this->somaavaliacao.", somaapp = ".$this->somapp.", somatotal = ".$this->somatotal.", percentual = ".$this->percentual.", somasemana = ".$this->somasemana." WHERE idrevisao = ".$this->idrevisao;
        
        try{
            $resultadoAlteracao = mysql_query($sqlAlteraRevisao) or die ("Erro no comando SQL. Descrição: ".mysql_error());
            
            if($resultadoAlteracao){
                return true;
            }
            
            return false;
            
            
        } catch (Exception $ex) {
            echo "Erro ao processar a alteração. Erro: ".$ex->getMessage();
        }
        
    }
    
    //put your code here
}
