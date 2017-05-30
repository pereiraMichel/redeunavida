<?php

// PERTENCERÁ AO GRUPO CONFIGURAÇÕES

class grupos{
	
	private $idgrupos;
	private $nomeGrupos;
	private $codusuario;


	public function getIdgrupos(){
		return $this->idgrupos;
	}

	public function getNomeGrupos(){
		return $this->nomeGrupos;
	}

	public function getCodusuario(){
		return $this->codusuario;
	}

	public function setIdgrupos($idGrupos){
		$this->idgrupos = $idGrupos;
	}

	public function setNomeGrupos($nomeGrupos){
		$this->nomeGrupos = $nomeGrupos;
	}

	public function setCodusuario($codusuario){
		$this->codusuario = $codusuario;
	}


	public function telaGrupos(){

		$con = new conectaBanco();
		$con->conecta();

		echo "<div class='col-sm-12'>";
		
		echo "	<div class='col-sm-3'>";
		echo "		&nbsp;";
		echo "	</div>";
		
		echo "	<div class='col-sm-6'>";
		echo "		<form name='formGrupos' id='formGrupos' method='post' action='inicio.php?m=config&t=grupos'>";
		echo "			<label>Usuários: </label>";
		echo "			<select class='form-control' name='nomeUsuarios' id='nomeUsuarios'>";
		echo "				<option value=''></option>";

		$sqlUsuarios = "SELECT * FROM tblusuario";

		try{

			$resultadoUsuarios = mysql_query($sqlUsuarios) or die ("Erro no Comando SQL. Descrição: ".mysql_error());

			if(mysql_num_rows($resultadoUsuarios) > 0){
				while($dadosUsuarios = mysql_fetch_array($resultadoUsuarios)){
					echo "<option value='".$dadosUsuarios['idUsuario']."'>".$dadosUsuarios['nomeUsuario']."</option>";
				}
			}else{
				echo "<option value=''>Usuários não localizados</option>";
			}

		}catch(Exception $ex){
			echo "Exception ativado. Descrição: ".$ex->getMessage();
		}

		echo "			</select>";
		echo "			";
		echo "			<label>Grupos: </label>";
		echo "			<select class='form-control' name='grupos' id='grupos'>";
		echo "				<option value=''></option>";
		echo "				<option value='RUV'>RUV</option>";
		echo "				<option value='JR-b1'>JR-b1</option>";
		echo "				<option value='JR-b2'>JR-b2</option>";
		echo "				<option value='JR-a'>JR-a</option>";
		echo "			</select>";
		echo "			<br><br>";

        echo "  <table class='table'>";
        echo "  	<tr>";
        echo "      	<td style='text-align: right;'>";
        echo "          	<a href='inicio.php?m=config' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "              	<img src='../img/btn_back.png' width='25' height='25'>";
        echo "              </a>";
        echo "          </td>";
        echo "          <td style='text-align: left;'>";
        echo "          	<button type='button' class='btn btn-default' href='#' id='salvar' name='salvar' onclick='enviaForm(\"formGrupos\")'>";
        echo "              	<img src='../img/save2.png' width='25' height='25'>";
        echo "              </button>";
        echo "          </td>";
        echo "      </tr>";
        echo "      <tr>";
        echo "      	<td style='text-align: right;'>";
        echo "          	<a href='inicio.php?m=config' title='Voltar' alt='Voltar'>";
        echo "              	<label>Voltar</label>";
        echo "              </a>";
        echo "          </td>";
        echo "          <td style='text-align: left;'>";
        echo "          	<a href='#' onclick='enviaForm(\"formGrupos\")' title='Salvar' alt='Salvar'>";
        echo "              	<label>Salvar</label>";
        echo "          	</a>";
        echo "          </td>";
        echo "       </tr>";
        echo "	</table>";

		echo "		</form>";
		echo "	</div>";


		$this->consultaGrupos();

		echo "	<div class='col-sm-3'>";
		echo "		&nbsp;";
		echo "	</div>";

		echo "</div>";

		if($_POST){

			$this->setCodusuario(addslashes(filter_input(INPUT_POST, 'nomeUsuarios')));
			$this->setNomeGrupos(addslashes(filter_input(INPUT_POST, 'grupos')));

			if($this->insereGrupo()){
				echo "<label class='alert alert-success'>Registrado com sucesso ! Aguarde 2 segundos...</label>";
				echo "<meta http-equiv='refresh' content='2;url=inicio.php?m=config&t=grupos'>";
			}

		}

		$e = filter_input(INPUT_GET, 'e');

		if(!empty($e)){

			if($this->excluiGrupo()){
				echo "<label class='alert alert-success'>Excluído com sucesso ! Aguarde 2 segundos...</label>";
				echo "<meta http-equiv='refresh' content='2;url=inicio.php?m=config&t=grupos'>";
			}

		}

	}

	public function insereGrupo(){
		$con = new conectaBanco();
		$con->conecta();

		$this->idgrupo = ultimoId::ultimoIdBanco("idgrupos", "grupos");

		$sqlInsereGrupo = "	INSERT INTO grupos (idgrupos, nomeGrupo, codusuario) 
							VALUES (".$this->idgrupo.", '".$this->nomeGrupos."', ".$this->codusuario.")";

		try{
			$resultadoInsere = mysql_query($sqlInsereGrupo) or die ("Erro no comando SQL. Descrição: ".mysql_error()."<br>SQL preenchido: ".$sqlInsereGrupo);

			if($resultadoInsere){
				return true;
			}

			return false;

		}catch(Exception $ex){
			echo "Exception ativado. Descrição: ".$ex->getMessage();
		}

	}

	public function excluiGrupo(){
		$con = new conectaBanco();
		$con->conecta();

		$id = filter_input(INPUT_GET, 'id');

		$sqlDeletaGrupo = "	DELETE FROM grupos WHERE idgrupos = ".$id;

		try{
			$resultadoExclusao = mysql_query($sqlDeletaGrupo) or die ("Erro no comando SQL. Descrição: ".mysql_error()."<br>SQL preenchido: ".$sqlDeletaGrupo);

			if($resultadoExclusao){
				return true;
			}

			return false;

		}catch(Exception $ex){
			echo "Exception ativado. Descrição: ".$ex->getMessage();
		}

	}

	public function consultaGrupos(){
		$con = new conectaBanco();
		$con->conecta();

		$sqlConsultaGrupos = "SELECT * FROM grupos g 
						      LEFT JOIN tblusuario t ON g.codusuario = t.idUsuario 
						      LEFT JOIN tipousuario tp ON t.codTipo = tp.idtipo";


		echo "<div style='height: 50px;'>&nbsp;</div>";
		echo "<table class='table'>";
		echo "	<tr>";
		echo "		<td width='150'>";
		echo "			<label>Usuário</label>";
		echo "		</td>";
		echo "		<td width='100'>";
		echo "			<label>Acesso</label>";
		echo "		</td>";
		echo "		<td width='100'>";
		echo "			<label>Grupo</label>";
		echo "		</td>";
		echo "		<td width='80'>";
		echo "			&nbsp;";
		echo "		</td>";
		echo "	</tr>";
		try{

			$resultadoGrupos = mysql_query($sqlConsultaGrupos) or die ("Erro no comando SQL. Descrição: ".mysql_error()."<br>SQL preenchido: ".$sqlConsultaGrupos);

			if(mysql_num_rows($resultadoGrupos) > 0){

				while ($dadosGrupos = mysql_fetch_array($resultadoGrupos)) {
					echo "<tr>";
					echo "	<td>";
					echo "		<label>".$dadosGrupos['nomeUsuario'];
					echo "	</td>";
					echo "	<td>";
					echo "		<label>".$dadosGrupos['nomeTipo'];
					echo "	</td>";
					echo "	<td>";
					echo "		<label>".$dadosGrupos['nomeGrupo'];
					echo "	</td>";
					echo "	<td>";
					$idgrupo = $dadosGrupos['idgrupos'];
                    echo "      <a href='inicio.php?m=config&t=grupos&id=".$idgrupo."&e=sim'>";
                    echo "  		<img src='../../images/botaoexcluir.png' title='Excluir'>";
					echo "		</a>";
					echo "	</td>";
					echo "</tr>";
				}


			}else{
				echo "<tr>";
				echo "	<td colspan='4'>";
				echo "		<label class='alert alert-danger'>Não foram encontrados usuários filiado aos grupos.</label>";
				echo "	</td>";
				echo "</tr>";
			}


		}catch(Exception $ex){
			echo "Exception ativado. Descrição: ".$ex->getMessage();
		}

		echo "</table>";


	}

}