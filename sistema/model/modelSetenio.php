<?php

require_once '../conexao/conectaBanco.php';

class modelSetenio {

    private $idSetenio;
    private $setenio;
    private $idadeInicial;
    private $idadeFinal;
    private $idade;
    
    public function getIdade() {
        return $this->idade;
    }

    public function setIdade($idade) {
        $this->idade = $idade;
    }

    public function getIdSetenio() {
        return $this->idSetenio;
    }

    public function getSetenio() {
        return $this->setenio;
    }

    public function getIdadeInicial() {
        return $this->idadeInicial;
    }

    public function getIdadeFinal() {
        return $this->idadeFinal;
    }

    public function setIdSetenio($idSetenio) {
        $this->idSetenio = $idSetenio;
    }

    public function setSetenio($setenio) {
        $this->setenio = $setenio;
    }

    public function setIdadeInicial($idadeInicial) {
        $this->idadeInicial = $idadeInicial;
    }

    public function setIdadeFinal($idadeFinal) {
        $this->idadeFinal = $idadeFinal;
    }


    public function retornaSetenio(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        try{
            $sql = "SELECT setenio FROM tblsetenio "
                    . "WHERE ".$this->idade." "
                    . "BETWEEN idadeInicial AND idadeFinal";
            $resultado = mysql_query($sql);
            
            if($resultado){
                $dados = mysql_fetch_array($resultado);
                echo "<script>document.getElementById('setenio').value = ".$dados['setenio']."</script>";
            }else if($this->idade > 83){
                echo "<script>document.getElementById('setenio').value='12º';</script>";
            }else{
                echo "<script>document.getElementById('setenio').value='S/N';</script>";
            }
            
        } catch (Exception $ex) {
            echo "Não foi possível realizar a consulta. Erro: ".$ex->getMessage();
        }
        
    }
    
    
}
