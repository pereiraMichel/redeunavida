<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Telefone
 *
 * @author Debug
 */
class telefone {
    
    private $idTelefone;
    private $telefone;
    private $tipoTelefone;
    private $codUsuario;
    
    function getIdTelefone() {
        return $this->idTelefone;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getTipoTelefone() {
        return $this->tipoTelefone;
    }

    function getCodUsuario() {
        return $this->codUsuario;
    }

    function setIdTelefone($idTelefone) {
        $this->idTelefone = (int) $idTelefone;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setTipoTelefone($tipoTelefone) {
        $this->tipoTelefone = (int) $tipoTelefone;
    }

    function setCodUsuario($codUsuario) {
        $this->codUsuario = (int) $codUsuario;
    }
    
    public function verificaTelefone(){
        $sqlVerificaTelefone = "SELECT * FROM telefone WHERE telefone = '".$this->telefone."' AND codUsuario = ".$this->codUsuario;
        try{
            $resultVerifica = mysql_query($sqlVerificaTelefone) or die("Retorno de erro no comando SQL. Mensagem: ".mysql_error());
            if(mysql_num_rows($resultVerifica) > 0){//Verifica se a quantidade é maior que 0
                $this->editTelefone();//Vai para alteração
            }else{
                $this->novoTelefone();//Vai para inclusão
            }
            
        } catch (Exception $ex) {
            echo "Houve um erro na verificação. Exception: ".$ex->getMessage();
        }
    }

    public function novoTelefone(){
        $sqlNovoTelefone = "INSERE_TELEFONE(".$this->idTelefone.", ".$this->telefone.", ".$this->tipoTelefone.", ".$this->codUsuario.")";
        try{
            $resultNovo = mysql_query($sqlNovoTelefone) or die("Retorno de erro no comando SQL. Mensagem: ".mysql_error());
            if(!$resultNovo){
                echo "Não foi inserido. Verifique os dados com o seu analista.";
            }
            mysql_close($resultNovo);
        } catch (Exception $ex) {
            echo "Houve um erro ao incluir. Exception: ".$ex->getMessage();
        }
    }
        
    public function editTelefone(){
        $sqlEditTelefone = "EDIT_TELEFONE(".$this->idTelefone.", ".$this->telefone.", ".$this->tipoTelefone.", ".$this->codUsuario.")";
        try{
            $resultEdit = mysql_query($sqlEditTelefone) or die("Retorno de erro no comando SQL. Mensagem: ".mysql_error());
            if(!$resultEdit){
                echo "Não foi alterado. Verifique os dados com o seu analista.";
            }
            mysql_close($resultEdit);
        } catch (Exception $ex) {
            echo "Houve um erro ao alterar. Exception: ".$ex->getMessage();
        }
    }
    
    public function deleteTelefone(){
        $sqlDeleteTelefone = "DELETE_TELEFONE(".$this->idTelefone.")";
        try{
            $resultDelete = mysql_query($sqlDeleteTelefone) or die("Retorno de erro no comando SQL. Mensagem: ".mysql_error());
            if(!$resultDelete){
                echo "Não foi excluído. Verifique os dados com o seu analista.";
            }
            mysql_close($resultDelete);
        } catch (Exception $ex) {
            echo "Houve um erro ao excluir. Exception: ".$ex->getMessage();
        }
    }
    //put your code here
}
