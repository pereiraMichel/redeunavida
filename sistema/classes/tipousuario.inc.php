<?php



class tipousuario{
	

private $idTipo;
private $nomeTipo;


	function getIdTipo(){
		return $this->idTipo;
	}

	function getNomeTipo(){
		return $this->nomeTipo;
	}

	function setIdTipo($idTipo){
		$this->idTipo = (int) $idTipo;
	}

	function setNomeTipo($nomeTipo){
		$this->nomeTipo = $nomeTipo;
	}

	public function verificaTipoUsuario(){
		$sqlTipoUsuario = "SELECT * FROM ".TPUSUARIO." WHERE nomeTipo = '".$this->nomeTipo."'";

		try{

			$resultTipoUsuario = mysql_query($sqlTipoUsuario) or die(RETURN_SQL.mysql_error());

		}catch(Exception $ex){
			echo EXECPTION_VERIF.$ex->getMessage();
		}
	}

    public function tabelaTipoUsuario(){

        $conexao = new conectaBanco();
        $conexao->conecta();

        try {
            $sqlTipoTelefone = "SELECT  * FROM tipousuario";
            $resultadoTipoTelefone = mysql_query($sqlTipoTelefone) or die("Erro no comando SQL. Verifique sob o erro: " . mysql_error());

            echo "<table class='table'>";
            echo "  <tr>";
            echo "      <td>";
            echo "          <b>Código</b>";
            echo "      </td>";
            echo "      <td>";
            echo "          <b>Nome</b>";
            echo "      </td>";
            echo "  </tr>";
            while($dadosTipoTelefone = mysql_fetch_array($resultadoTipoTelefone)){
            echo "  <tr>";
            echo "      <td>";
            echo            $dadosTipoTelefone['idTipo'];
            echo "      </td>";
            echo "      <td>";
            echo            $dadosTipoTelefone['nomeTipo'];
            echo "      </td>";
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
        
        
}


