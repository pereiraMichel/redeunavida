<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipotelefone
 *
 * @author Debug
 */
class tipotelefone {
    
    private $idTipoTelefone;
    private $nomeTipo;
    private $sigla;
    
    function getIdTipoTelefone() {
        return $this->idTipoTelefone;
    }

    function getNomeTipo() {
        return $this->nomeTipo;
    }

    function getSigla() {
        return $this->sigla;
    }

    function setIdTipoTelefone($idTipoTelefone) {
        $this->idTipoTelefone = $idTipoTelefone;
    }

    function setNomeTipo($nomeTipo) {
        $this->nomeTipo = $nomeTipo;
    }

    function setSigla($sigla) {
        $this->sigla = $sigla;
    }

        
    
    public function tabelaTipoTelefone(){

        $conexao = new conectaBanco();
        $conexao->conecta();

        try {
            $sqlTipoTelefone = "SELECT  * FROM tipotelefone";
            $resultadoTipoTelefone = mysql_query($sqlTipoTelefone) or die("Erro no comando SQL. Verifique sob o erro: " . mysql_error());

            echo "<table class='table'>";
            echo "  <tr>";
            echo "      <td>";
            echo "          <b>Nome</b>";
            echo "      </td>";
            echo "      <td>";
            echo "          <b>Sigla</b>";
            echo "      </td>";
            echo "  </tr>";
            while($dadosTipoTelefone = mysql_fetch_array($resultadoTipoTelefone)){
            echo "  <tr>";
                echo "<td>";
                echo    $dadosTipoTelefone['nomeTipo'];
                echo "</td>";
                echo "<td>";
                echo    $dadosTipoTelefone['sigla'];
                echo "</td>";
            echo "  </tr>";
            }
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
    
    //put your code here
}
