<?php

require_once '../conexao/conectaBanco.php';

class modelEstado {

    private $idEstado;
    private $estado;
    private $sigla;
    
    public function getIdEstado() {
        return $this->idEstado;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getSigla() {
        return $this->sigla;
    }

    public function setIdEstado($idEstado) {
        $this->idEstado = $idEstado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setSigla($sigla) {
        $this->sigla = $sigla;
    }


    public function buscaEstado(){
        $conexao = new conectaBanco();
        $conexao->conecta();
        
        try{
            
            $sql = "SELECT * FROM estado WHERE idEstado = ".$this->idEstado;
            $resultado = mysql_query($sql) or die ("Houve um erro na consulta. Erro: ".mysql_error());
            
            if($resultado){
                $dados = mysql_fetch_array($resultado);
                $this->sigla = $dados['sigla'];
                
                echo "<input type='text' class='form-control' value='".$this->sigla."' id='estado' placeholder='Estado' name='estado' required>";
                
            }else{
                echo "Estado não localizado.";
            }
        } catch (Exception $ex) {
            echo "Erro ao consultar o banco. Motivo: ".$ex->getMessage();
        }
        
    }
    
    public function consultaEstadoGeral(){
        $conexao = new conectaBanco();
        $conexao->conecta();
        
    }
    
    
    
}
