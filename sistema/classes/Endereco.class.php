<?php

class Endereco {

    private $idendereco;
    private $endereco;
    private $complemento;
    private $bairro;
    private $cidade;
    private $estado;
    private $cep;
    private $codperfil;
    
    function getIdendereco() {
        return $this->idendereco;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getComplemento() {
        return $this->complemento;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getEstado() {
        return $this->estado;
    }

    function getCep() {
        return $this->cep;
    }

    function getCodperfil() {
        return $this->codperfil;
    }

    function setIdendereco($idendereco) {
        $this->idendereco = (int) $idendereco;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }

    function setCodperfil($codperfil) {
        $this->codperfil = (int) $codperfil;
    }

    public function verificaEndereco(){
        $sqlVerifica = "SELECT endereco FROM endereco WHERE codPerfil = ".$this->codperfil;
        
        $resultadoVerificacao = mysql_query($sqlVerifica) or die ("Não foi possível executar o comando. Verifique sob o erro: ".mysql_error());
        
        if(mysql_num_rows($resultadoVerificacao) > 0){
            $this->alteraEndereco();
        }else{
            $this->insereEndereco();
        }
        
    }
    
    public function insereEndereco(){
        $sqlInsere = "INSERT INTO endereco (idEndereco, endereco, complemento, bairro, cidade, estado, cep, codPerfil) 
                      VALUES(".$this->idendereco.", '".$this->endereco."', '".$this->complemento."', '".$this->bairro."', '".$this->cidade."', '".$this->estado."', '".$this->cep."', ".$this->codperfil.")";
        try{
            $resultadoInserir = mysql_query($sqlInsere) or die("Não foi possível executar o comando de inserir. Verifique sob o erro: ".mysql_error());

            if($resultadoInserir){
                return true;
            }
            return false;

        }catch(Exception $ex){
            echo "Houve um erro na inclusão. Consulte o seu analista de sistemas. Erro: ".$ex->getMessage();
        }
        
    }
    
    public function alteraEndereco(){
        $sqlAlterar = "UPDATE endereco SET endereco='".$this->endereco."', complemento='".$this->complemento."', bairro='".$this->bairro."', cidade='".$this->cidade."', estado='".$this->estado."', cep='".$this->cep."' WHERE idEndereco=".$this->idendereco;
        
        try{
            $resultadoAlteracao = mysql_query($sqlAlterar) or die ("Houve um erro ao executar o comando de alteração. Erro: ".mysql_error());
            if($resultadoAlteracao){
                return true;
            }
            
            return false;
                        
        } catch (Exception $ex) {
            echo "Houve um erro na alteração. Consulte o seu analista de sistemas. Erro: ".$ex->getMessage();
        }
    }
    
    public function excluiEndereco(){
        $sqlExclusao = "DELETE FROM endereco WHERE idEndereco = ".$this->idendereco;
        
        try{
            $resultadoExclusao = mysql_query($sqlExclusao) or die("Houve um erro ao executar o comando de exclusão. Erro: ".mysql_error());
            
            if($resultadoExclusao){
                return true;
            }
            return false;
            
        } catch (Exception $ex) {
            echo "Houve um erro na exclusão. Exception: ".$ex->getMessage();
        }
    }
    
    public function preencheEndereco(){
        $idusuario = $_SESSION['idusuario'];

        $conexao = new conectaBanco();
        $conexao->conecta();
        
        
        $sqlConsulta = "SELECT * FROM endereco WHERE codUsuario=".$idusuario;
//        $sqlConsulta = "SELECT * FROM endereco WHERE codPerfil=".$this->codperfil;
        
        try{
            
            $resultadoConsulta = mysql_query($sqlConsulta) or die("Houve um erro ao executar o comando de consulta. Erro: ".mysql_error());
            if($resultadoConsulta){
                $dadosConsulta = mysql_fetch_array($resultadoConsulta);
                
                $this->endereco = $dadosConsulta['endereco'];
                $this->complemento = $dadosConsulta['complemento'];
                $this->bairro = $dadosConsulta['bairro'];
                $this->cidade = $dadosConsulta['cidade'];
                $this->estado = $dadosConsulta['estado'];
                $this->cep = $dadosConsulta['cep'];
                
                if(mysql_num_rows($resultadoConsulta) === 0){
                    $this->endereco = "Endereço não preenchido";
                    $this->complemento = "Complemento não preenchido";
                    $this->bairro = "Bairro não preenchido";
                    $this->cidade = "Cidade não preenchida";
                    $this->estado = "Estado não preenchido";
                    $this->cep = "CEP não preenchido";
                }
                

                echo "<div class='row' align='left' style='padding-left: 15px;'>";
                echo "  <div class='col-xs-4 col-md-4'>";
                echo "      <h3>";
                echo "          Usuário: ".$_SESSION['usuario'];
                echo "      </h3>";
                echo "  </div>";
                echo "  <div class='col-xs-8 col-md-8' style='padding-left: 15px;'>";
                echo "      &nbsp;";
                echo "  </div>";
                echo "</div>";
                echo "<div class='row' align='left' style='padding-left: 15px;'>";
                echo "  <div class='col-xs-5 col-md-5' style='padding-left: 15px;'>";
                echo "      <input type='text' name='endereco' id='endereco' placeholder='".$this->endereco."' class='form-control'>";
                echo "  </div>";
                echo "  <div class='col-xs-3 col-md-3' style='padding-left: 15px;'>";
                echo "      <input type='text' name='complemento' id='endereco' placeholder='".$this->complemento."' class='form-control'>";
                echo "  </div>";
                echo "</div>";
                echo "<div style='height: 30px;'>";
                echo "  &nbsp;";
                echo "</div>";
                echo "<div class='row' align='left' style='padding-left: 15px;'>";
                echo "  <div class='col-xs-3 col-md-3'>";
                echo "      <input type='text' name='bairro' id='bairro' placeholder='".$this->bairro."' class='form-control'>";
                echo "  </div>";
                echo "</div>";
                echo "<div style='height: 30px;'>";
                echo "  &nbsp;";
                echo "</div>";
                echo "<div class='row' align='left' style='padding-left: 15px;'>";
                echo "  <div class='col-xs-3 col-md-3'>";
                echo "      <input type='text' name='cidade' id='cidade' placeholder='".$this->cidade."' class='form-control'>";
                echo "  </div>";
                echo "  <div class='col-xs-2 col-md-2'>";
                echo "      <input type='text' name='cidade' id='cidade' placeholder='".$this->estado."' class='form-control' maxlenght='2'>";
                echo "  </div>";
                echo "  <div class='col-xs-8 col-md-8'>";
                echo "      &nbsp;";
                echo "  </div>";
                echo "      <div class='form-group'>";
                echo "              <div class='col-sm-10' style='text-align:right; padding-right: 150px;'>";
                echo "                  <button class='btn btn-default' onclick='javascript: history.go(-1)'>Voltar</button>";
                echo "                  <button class='btn btn-primary'>Salvar</button>";
                echo "              </div>";
                echo "      </div>";
                echo "</div>";
                echo "<div class='col-xs-12 col-md-12'><p style='height: 30px;'>&nbsp;</p></div>";
                echo "<div class='col-xs-9 col-md-9' align='left'>";
                echo "  <div class='btn-group' role='group' aria-label='...'>";
                echo "      <a href='inicio.php?m=perf' style='text-decoration: none;' disabled>";
                echo "          <button class='btn btn-default'>";
                echo "              Sobre você";
                echo "          </button>";
                echo "      </a>";
                echo "      <a href='#' style='text-decoration: none;'>";
                echo "          <button class='btn btn-default' disabled>";
                echo "              Seu endereço";
                echo "          </button>";
                echo "      </a>";
                echo "      <a href='inicio.php?m=perftel' style='text-decoration: none;'>";
                echo "          <button class='btn btn-default'>";
                echo "              Telefones";
                echo "          </button>";
                echo "      </a>";
                echo "      <a href='inicio.php?m=trocasenha' style='text-decoration: none;'>";
                echo "          <button class='btn btn-default'>";
                echo "              Troca de Senha";
                echo "          </button>";
                echo "      </a>";
                echo "  </div>";
                echo "</div>";

        if($_POST){
            $this->endereco = filter_input(INPUT_POST, 'endereco');
            $this->numero = filter_input(INPUT_POST, 'numero');
            $this->complemento = filter_input(INPUT_POST, 'complemento');
            $this->bairro = filter_input(INPUT_POST, 'bairro');
            $this->cidade = filter_input(INPUT_POST, 'cidade');
            $this->cep = filter_input(INPUT_POST, 'cep');
            $this->codPerfil = filter_input(INPUT_GET, 'idusuario');
//            $this->codEstado = filter_input(INPUT_POST, 'estado');
            
            try{
                $sqlEstadoSelecionado = "SELECT idEstado FROM tblestado WHERE sigla = '".filter_input(INPUT_POST, 'estado')."'";
                $resultadoEstadoSelecionado = mysql_query($sqlEstadoSelecionado) or die("Erro no estado. Mensagem: ".mysql_error());
                if($resultadoEstadoSelecionado){
                    $dadoEstadoSelecionado = mysql_fetch_array($resultadoEstadoSelecionado);
                    $this->codEstado = $dadoEstadoSelecionado['idEstado'];
                }
                
            } catch (Exception $ex) {
                echo "Erro na execução do sql. Mensagem: ".$ex->getMessage();
            }
            
            if($this->validaCampos($this->codPerfil)){
                $this->alteraEndereco();
                echo "<meta HTTP-EQUIV='Refresh' CONTENT='3; URL=".PHP_SELF."'>";

            }else{
                $this->cadastraEndereco();
                echo "<meta HTTP-EQUIV='Refresh' CONTENT='3; URL=".PHP_SELF."'>";
            }

            
        }
        
                
            }
            
        } catch (Exception $ex) {
            echo "Houve um erro na consulta do endereço. Erro: ".$ex->getMessage();
        }
    }
    
    
}
