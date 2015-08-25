<?php


class modelTelefone {

    private $idTelefone;
    private $ddd;
    private $telefone;
    private $codTipoTelefone;
    private $codPerfil;
    
    public function getIdTelefone() {
        return $this->idTelefone;
    }

    public function getDdd() {
        return $this->ddd;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getCodTipoTelefone() {
        return $this->codTipoTelefone;
    }

    public function getCodPerfil() {
        return $this->codPerfil;
    }

    public function setIdTelefone($idTelefone) {
        $this->idTelefone = $idTelefone;
    }

    public function setDdd($ddd) {
        $this->ddd = $ddd;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setCodTipoTelefone($codTipoTelefone) {
        $this->codTipoTelefone = $codTipoTelefone;
    }

    public function setCodPerfil($codPerfil) {
        $this->codPerfil = $codPerfil;
    }
    
    public function consultaUltimoRegistro(){
        try{
            $sql = "SELECT MAX(idTelefone) AS idTelefone FROM tbltelefone";
            $resultado = mysql_query($sql);
            
            $dados = mysql_fetch_array($resultado);
            
            $novoId = (int) $dados['idTelefone'] + 1;
            
            $this->idTelefone = $novoId;
            
        } catch (Exception $ex) {
            echo "Erro ao consultar o(s) telefone(s). Erro: ".$ex->getMessage();
        }
    }

    public function consultaTelefonePessoal(){
        try{
            $sql = "SELECT * FROM tbltelefone WHERE codPerfil = ".$this->codPerfil;
            $resultado = mysql_query($sql);
            $dados = mysql_fetch_array($resultado);
            if($dados > 0){
                return true;
            }else{
                return false;
            }
            mysql_close($dados);
            mysql_close($resultado);
            
        } catch (Exception $ex) {
            echo "Erro ao consultar o(s) telefone(s). Erro: ".$ex->getMessage();
        }
    }
    
    public function cadastraTelefone(){
        
        $this->consultaUltimoRegistro();
        
        try{
            $sql = "INSERT INTO tbltelefone (idTelefone, ddd, telefone, codTipoTelefone, codPerfil) "
                    . "VALUES (".$this->idTelefone.", ".$this->ddd.", '".$this->telefone."', ".$this->codTipoTelefone.", ".$this->codPerfil.")";
            
            $resultado = mysql_query($sql);
            
            if($resultado){
                echo "Inserido com sucesso";
            }else{
                echo "Problemas ao cadastrar";
            }
            
        } catch (Exception $ex) {
            echo "Erro ao cadastrar o(s) telefone(s). Erro: ".$ex->getMessage();
        }
        
    }
    
    
}
