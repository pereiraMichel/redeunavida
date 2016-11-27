<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of setenio
 *
 * @author Debug
 */
class setenio {
    
    private $idSetenio;
    private $setenio;
    private $idadeInicial;
    private $idadeFinal;
    
    function getIdSetenio() {
        return $this->idSetenio;
    }

    function getSetenio() {
        return $this->setenio;
    }

    function getIdadeInicial() {
        return $this->idadeInicial;
    }

    function getIdadeFinal() {
        return $this->idadeFinal;
    }

    function setIdSetenio($idSetenio) {
        $this->idSetenio = (int) $idSetenio;
    }

    function setSetenio($setenio) {
        $this->setenio = $setenio;
    }

    function setIdadeInicial($idadeInicial) {
        $this->idadeInicial = (int) $idadeInicial;
    }

    function setIdadeFinal($idadeFinal) {
        $this->idadeFinal = (int) $idadeFinal;
    }

    public function verificaSetenio(){
        
    }
    
    public function ultimoId(){
        
    }
    
    public function novoSetenio(){
        
    }
    
    public function editSetenio(){
        
    }
    
    public function deleteSetenio(){
        
    }
    
    public function tabelaSetenio(){

        $conexao = new conectaBanco();
        $conexao->conecta();

        try {
            $sqlSetenio = "SELECT  * FROM setenio";
            $resultadoSetenio = mysql_query($sqlSetenio) or die("Erro no comando SQL. Verifique sob o erro: " . mysql_error());

            echo "<table class='table'>";
            echo "  <tr>";
            echo "      <td>";
            echo "          Setênio";
            echo "      </td>";
            echo "      <td>";
            echo "          Idade Inicial";
            echo "      </td>";
            echo "      <td>";
            echo "          Idade Final";
            echo "      </td>";
            echo "  </tr>";
            echo "<tr>";
            while($dadosSetenio = mysql_fetch_array($resultadoSetenio)){
                echo "<td>";
                echo    $dadosSetenio['setenio'];
                echo "</td>";
                echo "<td>";
                echo    $dadosSetenio['idadeInicial'];
                echo "</td>";
                echo "<td>";
                echo    $dadosSetenio['idadeFinal'];
                echo "</td>";
            }
            echo "  </tr>";
            echo "</table>";
            echo "      <div style='height: 40px'>&nbsp;</div>";
            echo "      <div class='form-group'>";
            echo "              <div class='col-sm-10' style='text-align:right'>";
            echo "                  <button class='btn btn-default' onclick='javascript: history.go(-1)'>Voltar</button>";
            echo "              </div>";
            echo "      </div>";

        } catch (Exception $ex) {
            echo "Não foi possível efetuar a consulta. Erro exception: " . $ex->getMessage();
        }
    }
}
