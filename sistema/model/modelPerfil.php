<?php
//define('__ROOT__', dirname(dirname(__FILE__)));

require_once '../conexao/conectaBanco.php';

//use modelTipoTelefone;

class modelPerfil {

    private $idPerfil;
    private $nomeUsuario;
    private $descricao;
    private $dataNascimento;
    private $idade;
    private $codUsuario;
    private $codSetenio;
    
    public function getIdPerfil() {
        return $this->idPerfil;
    }

    public function getNomeUsuario() {
        return $this->nomeUsuario;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getDataNascimento() {
        return $this->dataNascimento;
    }

    public function getIdade() {
        return $this->idade;
    }

    public function getCodUsuario() {
        return $this->codUsuario;
    }

    public function getCodSetenio() {
        return $this->codSetenio;
    }

    public function setIdPerfil($idPerfil) {
        $this->idPerfil = $idPerfil;
    }

    public function setNomeUsuario($nomeUsuario) {
        $this->nomeUsuario = $nomeUsuario;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    public function setIdade($idade) {
        $this->idade = $idade;
    }

    public function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    public function setCodSetenio($codSetenio) {
        $this->codSetenio = $codSetenio;
    }

        public function consultaPerfil(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $codUsuarioPerfil = (int) $this->codUsuario;
        
        try{
            $sql = "SELECT * FROM tblperfil p "
                    . "INNER JOIN tblestadocivil e ON p.codEstadoCivil = e.idEstadoCivil "
                    . "INNER JOIN tblprofissao pr ON p.codProfissao = pr.idProfissao "
                    . "INNER JOIN tblsetenio s ON p.codSetenio = s.idSetenio "
                    . "INNER JOIN tbltelefone t ON p.codTelefone = t.idTelefone "
                    . "INNER JOIN tbltarefa ta ON p.codTarefa = ta.idTarefa "
                    . "INNER JOIN tblendereco en ON p.codEndereco = en.idEndereco "
                    . "WHERE p.codUsuario=".$codUsuarioPerfil;
            $resultado = mysql_query($sql);
            
            while($dados = mysql_fetch_array($resultado)){
                if(isset($dados['descricao'])){
                    echo "---";
                }else{
                    echo $dados['descricao'];
                }
            }
            
        } catch (Exception $ex) {

        }
        
        
    }
    
    public function consultaUltimoRegistro(){
        try{
            $sql = "SELECT MAX(idPerfil) AS idPerfil FROM tblperfil";
            $resultado = mysql_query($sql);
            
            $dados = mysql_fetch_array($resultado);
            
            $novoId = (int) $dados['idPerfil'] + 1;
            
            $this->idPerfil = $novoId;
            
        } catch (Exception $ex) {
            echo "Erro ao consultar o(s) perfil(s). Erro: ".$ex->getMessage();
        }
        
    }
    
    public function cadastraPerfil(){
        
        
        
        $this->consultaUltimoRegistro();
        try{
            $sql = "INSERT INTO tblperfil(idPerfil, nome, descricao, dataNascimento, idade, codUsuario, codSetenio) "
                    . "VALUES (".$this->idPerfil.", '".$this->nomeUsuario."', '".$this->descricao."', ".$this->codUsuario.", '".$this->dataNascimento."', ".$this->codSetenio.")";
            $resultado = mysql_query($sql);
            if($resultado){
                echo "Cadastrado o perfil.";
                
            }
        } catch (Exception $ex) {
            echo "Erro ao cadastrar o perfil. Erro: ".$ex->getMessage();
        }
    }
    
    public function editaPerfil(){
        
    }
    
    public function validaPreenchimento($valor){
        if(strlen($valor) > 1){
            echo "              <div class='col-sm-2'>";
            echo "                  <img src='../../images/ok.png' width='30' height='30' title='Ok'>";
            echo "              </div>";
        }else{
            echo "              <div class='col-sm-2'>";
            echo "                  Vazio";
            echo "              </div>";
        }
    }
    
    public function telaPerfil(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        echo "<div class='col-xs-9 col-sm-9 placeholder'>";
        echo "  <form class='form-horizontal' style='font-size: 12px;' method='post' name='formperfil'>";
        echo "      <div class='form-group'>";
        echo "          <label for='nome' class='col-sm-2 control-label'>Nome:</label>";
        echo "              <div class='col-sm-8'>";
        echo "                  <input type='text' name='nome' class='form-control' id='nome' placeholder='Nome' required onkeyup='javascript:validaForm(this.value)'>";
        echo "              </div>";
            echo "              <div class='col-sm-2' style='display:none' id='ok' name='ok'>";
            echo "                  <img src='../../images/ok.png' width='30' height='30' title='Ok'>";
            echo "              </div>";
        echo "      </div>";
        echo "      <div class='form-group'>";
        echo "          <label for='dataNascimento' class='col-sm-2 control-label'>Data de Nascimento:</label>";
        echo "              <div class='col-sm-3'>";
        echo "                  <input type='date' class='form-control' id='dataNascimento' name='dataNascimento' onmouseout='javascript:calculaIdade(this.value)' onkeyup='javascript:calculaIdade(this.value)'>";
        echo "                  <div id='idade'></div>";
        echo "              </div>";
        echo "          <label for='setenio' class='col-sm-2 control-label'>Setênio:</label>";
        echo "              <div class='col-sm-2'>";
        echo "                  <input type='text' class='form-control' id='setenio'>";
        echo "              </div>";
        echo "      </div>";
        echo "      <div class='form-group'>";
        echo "          <label for='descricao' class='col-sm-2 control-label'>Sobre você:</label>";
        echo "              <div class='col-sm-8'>";
        echo "                  <textarea class='form-control' cols='10' rows='5' id='descricao' name='descricao'></textarea>";
        echo "              </div>";
        echo "      </div>";
        echo "      <div class='form-group'>";
        echo "          <label for='descricao' class='col-sm-2 control-label'>&nbsp;</label>";
        echo "              <div class='col-sm-8'>";
        echo "                  <button class='btn btn-default' onsubmit='".$this->cadastraPerfil()."'>Salvar</button>";
        echo "              </div>";
        echo "      </div>";

//        echo "      <div class='form-group'>";
//        echo "              <div class='col-sm-3'>";
//        echo "                  <button class='btn btn-default' onclick=''>Salvar</button>";
//        echo "              </div>";
//        echo "      </div>";

        //Preenche a tabela do perfil
        
        echo "      <h3 class='page-header'></h3>";
        echo "      <div class='form-group'>";
        echo "          <label for='endereco' class='col-sm-2 control-label'>Endereço:</label>";
        echo "              <div class='col-sm-10'>";
        echo "                  <input type='text' class='form-control' id='endereco' placeholder='Endereço'>";
        echo "              </div>";
        echo "      </div>";
        echo "      <div class='form-group'>";
        echo "          <label for='numero' class='col-sm-2 control-label'>Número:</label>";
        echo "              <div class='col-sm-2'>";
        echo "                  <input type='number' class='form-control' id='numero' placeholder='Número'>";
        echo "              </div>";
        echo "          <label for='complemento' class='col-sm-2 control-label'>Complemento:</label>";
        echo "              <div class='col-sm-4'>";
        echo "                  <input type='text' class='form-control' id='complemento' placeholder='Complemento'>";
        echo "              </div>";
        echo "      </div>";
        echo "      <div class='form-group'>";
        echo "          <label for='bairro' class='col-sm-2 control-label'>Bairro:</label>";
        echo "              <div class='col-sm-4'>";
        echo "                  <input type='text' class='form-control' id='bairro' placeholder='Bairro'>";
        echo "              </div>";
        echo "          <label for='cidade' class='col-sm-2 control-label'>Cidade:</label>";
        echo "              <div class='col-sm-4'>";
        echo "                  <input type='text' class='form-control' id='cidade' placeholder='Cidade'>";
        echo "              </div>";
        echo "      </div>";
        echo "      <div class='form-group'>";
        echo "          <label for='estado' class='col-sm-2 control-label'>Estado:</label>";
        echo "              <div class='col-sm-2'>";
        echo "                  <select class='form-control' id='estado' name='estado'>";
        

                                    try{
                                        $sqlEstado = "SELECT * FROM tblestado";
                                        $resultadoEstado = mysql_query($sqlEstado);

                                        while($dadosEstado = mysql_fetch_array($resultadoEstado)){
                                            echo "<option class='form-control' name=".$dadosEstado['idEstado'].">".$dadosEstado['sigla']."</option>";
                                        }

                                    } catch (Exception $ex) {
                                        echo "Problemas na consulta. Código E019.1. Erro: ".$ex->getMessage();
                                    }
        
        echo "                  </select>";
        echo "              </div>";
        echo "          <label for='cep' class='col-sm-2 control-label'>CEP:</label>";
        echo "              <div class='col-sm-3'>";
        echo "                  <input type='cep' class='form-control' id='cep' placeholder='CEP'>";
        echo "              </div>";
        echo "      </div>";
        
//        echo "      <div class='form-group'>";
//        echo "              <div class='col-sm-3'>";
//        echo "                  <button class='btn btn-default' onclick=''>Salvar</button>";
//        echo "              </div>";
//        echo "      </div>";
        
        //Preenche a tabela do endereço
        
        echo "      <h3 class='page-header'></h3>";
        echo "      <div class='form-group'>";
        echo "          <label for='cep' class='col-sm-2 control-label'>Telefone:</label>";
        echo "              <div class='col-sm-3'>";
        echo "                  <input type='tel' class='form-control' id='telefone' name='telefone'>";
        echo "              </div>";
        echo "              <div class='col-sm-3'>";
        echo "                  <select class='form-control' id='tipoTelefone' name='tipoTelefone'>";

                                    try{
                                        $sql = "SELECT * FROM tbltipotelefone";
                                        $resultado = mysql_query($sql);

                                        while($dados = mysql_fetch_array($resultado)){
                                            echo "<option name=".$dados['idTipoTelefone'].">".$dados['nomeTipoTelefone']."</option>";
                                        }

                                    } catch (Exception $ex) {
                                        echo "Problemas na consulta. Código E019.1. Erro: ".$ex->getMessage();
                                    }

        echo "                  </select>";
        echo "              </div>";
        echo "              <div class='col-sm-3'>";
        echo "                  <button class='btn btn-default' onclick=''>Ok</button>";
        echo "              </div>";
        echo "      </div>";
        echo "      <div class='form-group'>";
        echo "              <div class='col-sm-8 table-responsive'>";
        echo "                  <table class='table table-hover' width='150' name='tabelaTelefones'>";
        echo "                      <tr>";
        echo "                          <td>";
        echo "                            <b>Telefone</b>";
        echo "                          </td>";
        echo "                          <td>";
        echo "                            <b>Tipo de Telefone</b>";
        echo "                          </td>";
        echo "                      </tr>";
        if(filter_input(INPUT_POST, 'telefone')){
            /* @var $_POST type */
            
                $arrayDados = array("telefone"=>filter_input(INPUT_POST, 'telefone'), "tipoTelefone"=>filter_input(INPUT_POST, 'tipoTelefone'));

                //fazer um busca e inclusão do telefone.

                echo "                      <tr>";
                echo "                          <td name='Telefone'>";
                echo "                            ". $telefone1;
                echo "                          </td>";
                echo "                          <td name='TipoTelefone'>";
                echo "                            ".$tipoTelefone1;
                echo "                          </td>";
                echo "                      </tr>";
                
                
                
//            $aux = 1;
//            echo "                      <tr>";
//            echo "                          <td name='Telefone'>";
//            echo "                            ". $arrayDados["telefone"];
//            echo "                          </td>";
//            echo "                          <td name='TipoTelefone'>";
//            echo "                            ".$arrayDados["tipoTelefone"];
//            echo "                          </td>";
//            echo "                      </tr>";
//            $aux++;

        }
        echo "                  </table>";
        echo "              </div>";
        echo "      </div>";
        echo "  </form>";
        echo "</div>";
    }

//        echo "<div class='col-xs-5 col-sm-5 placeholder'>";
//        echo "  <div class='btn-group' data-toggle='buttons'>";
//        echo "      <label class='btn btn-default'>";
//        echo "          <input type='radio' name='options' id='option1' autocomplete='off' checked> Inclusão";
//        echo "      </label>";
//        echo "      <label class='btn btn-default'>";
//        echo "          <input type='radio' name='options' id='option2' autocomplete='off'> Consulta";
//        echo "      </label>";
//        echo "      <label class='btn btn-default'>";
//        echo "          <input type='radio' name='options' id='option3' autocomplete='off'> Alteração";
//        echo "      </label>";
//        echo "      <label class='btn btn-default'>";
//        echo "          <input type='radio' name='options' id='option3' autocomplete='off'> Exclusão";
//        echo "      </label>";
//        echo "  </div>";
//        echo "</div>";    
    
}
