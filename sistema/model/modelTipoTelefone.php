<?php

require_once '../conexao/conectaBanco.php';

class modelTipoTelefone {

    private $idTipoTelefone;
    private $nomeTipoTelefone;
    
    public function getIdTipoTelefone() {
        return $this->idTipoTelefone;
    }

    public function getNomeTipoTelefone() {
        return $this->nomeTipoTelefone;
    }

    public function setIdTipoTelefone($idTipoTelefone) {
        $this->idTipoTelefone = $idTipoTelefone;
    }

    public function setNomeTipoTelefone($nomeTipoTelefone) {
        $this->nomeTipoTelefone = $nomeTipoTelefone;
    }

    public function comboTipoTelefone(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        try{
            $sql = "SELECT * FROM tbltipotelefone";
            $resultado = mysql_query($sql);
            
            while($dados = mysql_fetch_array($resultado)){
                echo "<option name=".$dados['idTipoTelefone'].">".$dados['nomeTipoTelefone']."</option>";
            }
            
        } catch (Exception $ex) {
            echo "Problemas na consulta. Código E019.1. Erro: ".$ex->getMessage();
        }
    }
    
}
