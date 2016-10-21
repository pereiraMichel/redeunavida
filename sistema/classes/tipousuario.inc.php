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
		$sqlTipoUsuario = "SELECT * FROM tipousuario WHERE nomeTipo = '".$this->$nomeTipo."'";

		try{

			$resultTipoUsuario = mysql_query($sqlTipoUsuario) or die(RETURN_SQL.mysql_error());

		}catch(Exception $ex){
			echo EXECPTION_VERIF.$ex->getMessage();
		}
	}

}


