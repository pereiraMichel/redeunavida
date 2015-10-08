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
        
//        echo "Cheguei aqui no cadastro.";
        
        $this->consultaUltimoRegistro();
        try{
            $sql = "INSERT INTO tblperfil(idPerfil, nome, descricao, dataNascimento, idade, codUsuario, codSetenio) "
                    . "VALUES (".$this->idPerfil.", '".$this->nomeUsuario."', '".$this->descricao."', '".$this->dataNascimento."', $this->idade, ".$this->codUsuario.", ".$this->codSetenio.")";
            
            echo $sql;
            
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
    
    public function validaCamposPerfil($nome, $dataNascimento, $idade, $codSetenio, $sobreVoce, $codUsuario){

        if($nome != ""){
            $this->nomeUsuario = $nome;
            if($dataNascimento != "" or $dataNascimento != "dd/mm/aaaa"){
                $this->dataNascimento = $dataNascimento;
                $this->idade = $idade;
                $this->codSetenio = $codSetenio;
                /* @var $codUsuario type */
                if($codUsuario != 0){
                    $this->codUsuario = $codUsuario;
                    if($sobreVoce != ""){
                        $this->descricao = $sobreVoce;
                    }else{
                        $this->descricao = "";
                    }

                    $this->cadastraPerfil();

                }else{
                    echo "Código do usuário não localizado.";
                }
            }else{
                echo "Data de Nascimento inválida!";
            }
        }else{
            echo "Campo 'Nome' inválido!";
        }
        
        
    }
    
    public function telaPerfil(){

        $conecta = new conectaBanco();
        $conecta->conecta();
        
        try{
            $sqlConsultaPerfil = "SELECT * FROM tblperfil p "
                    . "INNER JOIN tblsetenio s ON s.idSetenio = p.codSetenio "
                    . " WHERE p.codUsuario = ".base64_decode($_GET['usuario']);
            $resultadoConsulta = mysql_query($sqlConsultaPerfil);

            if($resultadoConsulta > 0){
                $array = mysql_fetch_array($resultadoConsulta);
//                echo $array['nome'];
                $nomeUsuario = $array['nome'];
                $dataNascimento = $array['dataNascimento'];
                $dataNascimentoFormatada = date("d/m/Y", strtotime($dataNascimento));
                $setenio = $array['setenio'];
                $idade = $array['idade'];
                $sobreVoce = $array['descricao'];
                
            }else{
                echo "Vazio";
            }
            

        } catch (Exception $ex) {
            echo "Houve um erro. Erro: ".$ex->getMessage();
        }
        
        echo "<div class='col-xs-9 col-sm-9 placeholder'>";
        echo "  <form class='form-horizontal' style='font-size: 12px;' method='post' name='formperfil' action='".$PHP_SELF."'>";
        echo "      <div class='form-group'>";
        echo "          <label for='nome' class='col-sm-2 control-label'>Nome:</label>";
        echo "              <div class='col-sm-8'>";
        echo "                  <input type='text' name='nomeUsuario' class='form-control' id='nomeUsuario' placeholder='Nome' required onkeyup='javascript:validaForm(this.value)' value='".$nomeUsuario."'>";
        echo "              </div>";
            echo "              <div class='col-sm-2' style='display:none' id='ok' name='ok'>";
            echo "                  <img src='../../images/ok.png' width='30' height='30' title='Ok'>";
            echo "              </div>";
        echo "      </div>";
        echo "      <div class='form-group'>";
        echo "          <label for='dataNascimento' class='col-sm-2 control-label'>Data de Nascimento:</label>";
        echo "              <div class='col-sm-3'>";
        echo "                  <input type='date' class='form-control' id='dataNascimento' name='dataNascimento' onmouseout='javascript:calculaIdade(this.value)' onkeyup='javascript:calculaIdade(this.value) value='".$dataNascimentoFormatada."'>";
        echo "              </div>";
        echo "          <label for='setenio' class='col-sm-2 control-label'>Setênio:</label>";
        echo "              <div class='col-sm-2'>";
        echo "                  <input type='text' class='form-control' id='setenio' disabled value='".$setenio."'>";
        echo "                  <input type='hidden' class='form-control' id='codSetenio' name='codSetenio'>";
        echo "              </div>";
        echo "      </div>";
        echo "      <div class='form-group'>";
        echo "          <label for='idade' class='col-sm-2 control-label'>Idade:</label>";
        echo "              <div class='col-sm-2'>";
//        echo "                  <div id='idade'></div>";
        echo "                  <input type='text' class='form-control' name='idade' id='idade' value='".$idade."'>";
        echo "              </div>";
        echo "      </div>";
        echo "      <div class='form-group'>";
        echo "          <label for='descricao' class='col-sm-2 control-label'>Sobre você:</label>";
        echo "              <div class='col-sm-8'>";
        echo "                  <textarea class='form-control' cols='10' rows='5' id='descricao' name='descricao'>".$sobreVoce."</textarea>";
        echo "              </div>";
        echo "      </div>";
        echo "      <div class='form-group'>";
//        echo "          <label for='descricao' class='col-sm-2 control-label'>Sobre você:</label>";
        echo "              <div class='col-sm-10' style='text-align:right'>";
        echo "                  <button class='btn btn-primary btn-xs'>Salvar</button>";
        echo "              </div>";
        echo "      </div>";
        if($_POST){
        $nome = filter_input(INPUT_POST, "nome");
//            echo "<br>Recebido o nome: ".$nome;
        $dataNascimento = filter_input(INPUT_POST, "dataNascimento");
//            echo "<br>Recebido a data de nascimento: ".$dataNascimento;
        $idade = filter_input(INPUT_POST, "idade");
//            echo "<br>Recebido a idade: ".$idade;
        $codSetenio = filter_input(INPUT_POST, 'codSetenio');
//            echo "<br>Recebido o código do setênio: ".$codSetenio;
        $sobreVoce = filter_input(INPUT_POST, 'descricao');
//            echo "<br>Recebido a descrição: ".$sobreVoce;
        $codUsuario = base64_decode($_GET['usuario']);
//            echo "<br>Recebido o código do usuário: ".$codUsuario;

        echo "      <div class='form-group'>";
//        echo "          <label for='descricao' class='col-sm-2 control-label'>Sobre você:</label>";
        echo "              <div class='col-sm-10' style='text-align:center'>";
        echo                               $this->validaCamposPerfil($nome, $dataNascimento, $idade, $codSetenio, $sobreVoce, $codUsuario);
        echo "              </div>";
        echo "      </div>";
        }


        //Preenche a tabela do perfil
        
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
