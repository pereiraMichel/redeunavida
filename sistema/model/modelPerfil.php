<?php

//define('__ROOT__', dirname(dirname(__FILE__)));

require_once '../conexao/conectaBanco.php';
include_once 'modelTipoUsuario.php';

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

    public function consultaPerfil() {
        $conecta = new conectaBanco();
        $conecta->conecta();

        $codUsuarioPerfil = (int) $this->codUsuario;
// "INNER JOIN tblendereco en ON p.codEndereco = en.idEndereco "
        try {
            $sql = "SELECT * FROM tblperfil p "
                    . "INNER JOIN tblestadocivil e ON p.codEstadoCivil = e.idEstadoCivil "
                    . "INNER JOIN tblprofissao pr ON p.codProfissao = pr.idProfissao "
                    . "INNER JOIN tblsetenio s ON p.codSetenio = s.idSetenio "
                    . "INNER JOIN tbltelefone t ON p.codTelefone = t.idTelefone "
                    . "INNER JOIN tbltarefa ta ON p.codTarefa = ta.idTarefa "
                    . "WHERE p.codUsuario=" . $codUsuarioPerfil;
            $resultado = mysql_query($sql);

            while ($dados = mysql_fetch_array($resultado)) {
                if (isset($dados['descricao'])) {
                    echo "---";
                } else {
                    echo $dados['descricao'];
                }
            }
        } catch (Exception $ex) {
            
        }
    }

    public function consultaUltimoRegistro() {
        try {
            $sql = "SELECT MAX(idPerfil) AS idPerfil FROM tblperfil";
            $resultado = mysql_query($sql);

            $dados = mysql_fetch_array($resultado);

            $novoId = (int) $dados['idPerfil'] + 1;

            $this->idPerfil = $novoId;
        } catch (Exception $ex) {
            echo "Erro ao consultar o perfil. Erro: " . $ex->getMessage();
        }
    }

    public function cadastraPerfil() {

//        echo "Cheguei aqui no cadastro.";

        $this->consultaUltimoRegistro();
        try {
            $sql = "INSERT INTO perfil(idPerfil, nome, descricao, dataNascimento, idade, codUsuario, codSetenio) "
                    . "VALUES (" . $this->idPerfil . ", '" . $this->nomeUsuario . "', '" . $this->descricao . "', '" . $this->dataNascimento . "', $this->idade, " . $this->codUsuario . ", " . $this->codSetenio . ")";

//            echo $sql;

            $resultado = mysql_query($sql);
            if ($resultado) {
                echo "<div class='text-center'><label class='label label-success'>Cadastrado o perfil.</label></div>";
            }
        } catch (Exception $ex) {
            echo "<div class='text-center'><label class='label label-danger'>Erro ao cadastrar o perfil. Erro: " . $ex->getMessage()."</label></div>";
        }
    }

    public function editaPerfil() {
        
    }

    public function validaPreenchimento($valor) {
        if (strlen($valor) > 1) {
            echo "              <div class='col-sm-2'>";
            echo "                  <img src='../../images/ok.png' width='30' height='30' title='Ok'>";
            echo "              </div>";
        } else {
            echo "              <div class='col-sm-2'>";
            echo "                  Vazio";
            echo "              </div>";
        }
    }

    public function validaCamposPerfil($nome, $dataNascimento, $tipoUsuario, $codSetenio, $sobreVoce, $codUsuario) {

        if ($nome != "") {
//            echo "Nome digitado: ".$nome;
            $this->nomeUsuario = $nome;
            if ($dataNascimento != "" or $dataNascimento != "dd/mm/aaaa") {
                $this->dataNascimento = $dataNascimento;
                $this->idade = $idade;
                $this->codSetenio = $codSetenio;
                /* @var $codUsuario type */
                if ($codUsuario != 0) {
                    $this->codUsuario = $codUsuario;
                    if ($sobreVoce != "") {
                        $this->descricao = $sobreVoce;
                    } else {
                        $this->descricao = "";
                    }

                    $this->cadastraPerfil();
                } else {
                    echo "Código do usuário não localizado.";
                }
            } else {
                echo "Data de Nascimento inválida!";
            }
        } else {
            echo "<label class='label label-danger'>Campo 'Nome' inválido!</label>";
        }
    }

    public function telaPerfilPrincipal() {

//        $tipoUsuario = new modelTipoUsuario();

        $idusuario = $_SESSION['idusuario'];

        $conexao = new conectaBanco();
        $conexao->conecta();

        try {
            $sql = "SELECT  l.nomeUsuario, l.email,
                            DATE_FORMAT(l.dataCadastro,'%d/%m/%Y') AS dataCadastro, p.idPerfil, 
                            p.nome, p.descricao, 
                            DATE_FORMAT(p.dataNascimento,'%d/%m/%Y') AS dataNascimento, 
                            s.setenio, tu.nomeTipo
                    FROM tblusuario l
                    INNER JOIN perfil p on l.idUsuario = p.codUsuario
                    INNER JOIN tipousuario tu on tu.idTipo = l.codTipoUsuario
                    INNER JOIN setenio s on p.codSetenio = s.idsetenio
                    WHERE l.idUsuario = ".$idusuario;
//            echo $sql."<br>";
            $resultado = mysql_query($sql) or die("Erro no comando SQL. Verifique sob o erro: " . mysql_error());
            $dados = mysql_fetch_array($resultado);
//           
            if ($dados > 0) {

                echo "<div class='row' align='left' style='padding-left: 15px;'>";
                echo "  <div class='col-xs-4 col-md-4'>";
                echo "      <h3>";
                echo "          Usuário: ".$dados['nomeUsuario'];
                echo "      </h3>";
                echo "  </div>";
                echo "  <div class='col-xs-8 col-md-8' style='padding-left: 15px;'>";
                echo "      &nbsp;";
                echo "  </div>";
                echo "</div>";
                echo "<div class='row' align='left' style='padding-left: 15px;'>";
                echo "  <div class='col-xs-4 col-md-4'>";
                echo "      <h4>";
                echo            $dados['nome'];
                echo "      </h4>";
                echo "  </div>";
                echo "  <div class='col-xs-8 col-md-8' style='padding-left: 15px;'>";
                echo "      &nbsp;";
                echo "  </div>";
                echo "</div>";
                echo "<div class='row' align='left' style='padding-left: 15px;'>";
                echo "  <div class='col-xs-4 col-md-4' style='padding-left: 15px;'>";
                echo "      <h5>";
                echo            $dados['email'];
                echo "      </h5>";
                echo "  </div>";
                echo "  <div class='col-xs-8 col-md-8' style='padding-left: 15px;'>";
                echo "      <h5>";
                echo "          <abbr title='Tipo de Acesso'>";
                echo                $dados['nomeTipo'];
                echo "          </abbr>";
                echo "      </h5>";
                echo "  </div>";
                echo "</div>";
                echo "<div class='row' align='left' style='padding-left: 15px;'>";
                echo "  <div class='col-xs-4 col-md-4'>";
                echo "      <h5>";
                if ($dados['dataNascimento'] === "" or $dados['dataNascimento'] === "00/00/0000"){
                    echo "          <b>Data de nascimento</b>: Não preenchida.";
                }else{
                    echo "          <b>Data de nascimento</b>: ".$dados['dataNascimento'];
                }
                echo "      </h5>";
                echo "  </div>";
                echo "  <div class='col-xs-2 col-md-2'>";
                echo "      <h5>";
                echo "          <b>Tipo de Usuário</b>: ".$dados['nomeTipo'];
                echo "      </h5>";
                echo "  </div>";
                echo "  <div class='col-xs-6 col-md-6'>";
                echo "      <h5>";
                echo "          <b>Setênio</b>: ".$dados['setenio'];
                echo "      </h5>";
                echo "  </div>";
                echo "</div>";
                echo "  <div class='col-xs-12 col-md-12' style='padding-left: 15px; text-align: justify;'>";
                echo "      <h5>";
                echo "          <b>Telefones</b>: ";
                echo "      </h5>";
                $sqlTelefone = "SELECT telefone FROM telefone t "
                        . "INNER JOIN tblusuario tu ON t.codUsuario = tu.idUsuario "
                        . "INNER JOIN perfil p ON p.codUsuario = tu.idUsuario";
                $resultadoTelefone = mysql_query($sqlTelefone) or die("Houve um erro no SQL da consulta do perfil. Erro: ".mysql_error());
                
                if(mysql_num_rows($resultadoTelefone) > 0){
                
                while($dadosTelefone = mysql_fetch_array($resultadoTelefone)){
                    echo "      <h5>";
                    echo            $dadosTelefone['telefone'];
                    echo "      </h5>";
                }
                }else{
                    echo "      <h5>";
                    echo "           Telefone(s) Inexistente(s).";
                    echo "      </h5>";
                }
                echo "  </div>";
                echo "<div class='row' align='left' style='padding-left: 15px;'>";
                echo "  <div class='col-xs-4 col-md-4'>";
                echo "      <h5>";
                echo "          <b>Data de Cadastro</b>: ".$dados['dataCadastro'];
                echo "      </h5>";
                echo "  </div>";
                echo "  <div class='col-xs-8 col-md-8'>";
                echo "      &nbsp;";
                echo "  </div>";
                echo "</div>";
                echo "<div class='col-xs-12 col-md-12'><p style='height: 30px;'>&nbsp;</p></div>";
                echo "<div class='col-xs-12 col-md-12' align='left'>";
                echo "  <div class='btn-group' role='group' aria-label='...'>";
                echo "      <a href='inicio.php?m=perfsv' style='text-decoration: none;'>";
                echo "          <button class='btn btn-default'>";
                echo "              Sobre você";
                echo "          </button>";
                echo "      </a>";
//                echo "      <a href='inicio.php?menu=perfilend' style='text-decoration: none;'>";
//                echo "          <button class='btn btn-default'>";
//                echo "              Seu endereço";
//                echo "          </button>";
//                echo "      </a>";
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
                
                
            } else {//Direcionar para Sobre você
                echo "Perfil não preenchido. Preencha os campos para atualização.";
                echo "<p style='height: 30px;'>&nbsp;</p>";
                $this->telaPerfil();
            }
        } catch (Exception $ex) {
            echo "Não foi possível efetuar a consulta. Erro exception: " . $ex->getMessage();
        }
    }

    public function telaPerfil() {

        $conecta = new conectaBanco();
        $conecta->conecta();

        try {
            $sqlConsultaPerfil = "SELECT *, DATE_FORMAT(p.dataNascimento, '%d/%m/%Y') AS dataNascimento FROM perfil p "
                    . "INNER JOIN tblusuario u ON p.codUsuario = u.idUsuario "
                    . "INNER JOIN tipousuario tp ON tp.idTipo = u.codTipoUsuario "
                    . "INNER JOIN setenio s ON s.idSetenio = p.codSetenio "
                    . " WHERE p.codUsuario = " . $_SESSION['idusuario'];
//            echo $sqlConsultaPerfil."<br>";
            $resultadoConsulta = mysql_query($sqlConsultaPerfil) or die ("Não foi possível executar a ação devido ao erro de comando SQL. Erro: ".mysql_error());

            if ($resultadoConsulta > 0) {
                $array = mysql_fetch_array($resultadoConsulta);
//                echo $array['nome'];
                $nomeUsuario = $array['nome'];
                $dataNascimento = $array['dataNascimento'];
//                $dataNascimentoFormatada = date("d/m/Y", strtotime($dataNascimento));
                $setenio = $array['setenio'];
                $tipoUsuario = $array['nomeTipo'];
                $sobreVoce = $array['descricao'];
            } else {
                echo "Vazio";
            }
        } catch (Exception $ex) {
            echo "Houve um erro. Erro: " . $ex->getMessage();
        }

        echo "<div class='col-xs-9 col-sm-9 placeholder'>";
        echo "  <form class='form-horizontal' style='font-size: 12px;' method='post' name='formperfil' action='inicio.php?menu=perfilsv'>";
        echo "      <div class='form-group'>";
        echo "          <label for='nome' class='col-sm-2 control-label'>Nome:</label>";
        echo "              <div class='col-sm-8'>";
        echo "                  <input type='text' name='nomeUsuario' class='form-control' id='nomeUsuario' placeholder='Nome' required onkeyup='javascript:validaForm(this.value)' value='" . $nomeUsuario . "'>";
        echo "              </div>";
        echo "              <div class='col-sm-2' style='display:none' id='ok' name='ok'>";
        echo "                  <img src='../../images/ok.png' width='30' height='30' title='Ok'>";
        echo "              </div>";
        echo "      </div>";
        echo "      <div class='form-group'>";
        echo "          <label for='dataNascimento' class='col-sm-2 control-label'>Data de Nascimento:</label>";
        echo "              <div class='col-sm-3'>";
                            if($dataNascimento != ""){
        echo "                  <input type='text' class='form-control' id='dataNascimento' name='dataNascimento' value='" . $dataNascimento . "'>";
                            }else{
        echo "                  <input type='date' class='form-control' id='dataNascimento' name='dataNascimento' onmouseout='javascript:calculaIdade(this.value)' onkeyup='javascript:calculaIdade(this.value) value='" . $dataNascimento . "'>";
                            }
        echo "              </div>";
        echo "          <label for='setenio' class='col-sm-2 control-label'>Setênio:</label>";
        echo "              <div class='col-sm-2'>";
        echo "                  <input type='text' class='form-control' id='setenio' disabled value='" . $setenio . "'>";
        echo "                  <input type='hidden' class='form-control' id='codSetenio' name='codSetenio'>";
        echo "              </div>";
        echo "      </div>";
        echo "      <div class='form-group'>";
        echo "          <label for='idade' class='col-sm-2 control-label'>Tipo de Usuário:</label>";
        echo "              <div class='col-sm-2'>";
//        echo "                  <div id='idade'></div>";
        echo "                  <input type='text' class='form-control' name='tipoUsuario' id='tipoUsuario' value='" . $tipoUsuario . "'>";
        echo "              </div>";
        echo "      </div>";
        echo "      <div class='form-group'>";
        echo "          <label for='descricao' class='col-sm-2 control-label'>Sobre você:</label>";
        echo "              <div class='col-sm-8'>";
        echo "                  <textarea class='form-control' cols='10' rows='5' id='descricao' name='descricao'>" . $sobreVoce . "</textarea>";
        echo "              </div>";
        echo "      </div>";
        echo "      <div class='form-group'>";
//        echo "          <label for='descricao' class='col-sm-2 control-label'>Sobre você:</label>";
        echo "              <div class='col-sm-10' style='text-align:right'>";
        echo "                  <button class='btn btn-default' onclick='javascript: history.go(-1)'>Voltar</button>";
        echo "                  <button class='btn btn-primary'>Salvar</button>";
        echo "              </div>";
        echo "      </div>";
        echo "      <div style='height: 20px'>&nbsp;</div>";
        echo "      <div class='form-group'>";
//        echo "          <label for='descricao' class='col-sm-2 control-label'>Sobre você:</label>";
        echo "              <div class='col-sm-10' style='text-align:right'>";
        echo "                   | <a href='inicio.php?m=perfilsv' class='btn btn-default active''>Sobre Você</a> | ";
        echo "                  <a href='inicio.php?m=perfilend' class='btn btn-default'>Seu Endereço</a> | ";
        echo "                  <a href='inicio.php?m=perfiltel' class='btn btn-default' autocomplete='off'>Telefones</a> | ";
        echo "                  <a href='inicio.php?m=trocasenha' class='btn btn-default' autocomplete='off'>Troca de Senha</a> | ";
        echo "              </div>";
        echo "      </div>";
        if ($_POST) {
            $nome = filter_input(INPUT_POST, "nomeUsuario");
//            echo "<br>Recebido o nome: ".$nome;
            $dataNascimento = filter_input(INPUT_POST, "dataNascimento");
//            echo "<br>Recebido a data de nascimento: ".$dataNascimento;
            $tipoUsuario = filter_input(INPUT_POST, "tipoUsuario");
//            echo "<br>Recebido a idade: ".$idade;
            $codSetenio = filter_input(INPUT_POST, 'codSetenio');
//            echo "<br>Recebido o código do setênio: ".$codSetenio;
            $sobreVoce = filter_input(INPUT_POST, 'descricao');
//            echo "<br>Recebido a descrição: ".$sobreVoce;
            $codUsuario = $_SESSION['idusuario'];
//            echo "<br>Recebido o código do usuário: ".$codUsuario;

//            echo "      <div class='form-group'>";
////        echo "          <label for='descricao' class='col-sm-2 control-label'>Sobre você:</label>";
//            echo "              <div class='col-sm-10' style='text-align:center'>";
            echo $this->validaCamposPerfil($nome, $dataNascimento, $tipoUsuario, $codSetenio, $sobreVoce, $codUsuario);
//            echo "              </div>";
//            echo "      </div>";
        }


        //Preenche a tabela do perfil

        echo "  </form>";
        echo "</div>";
    }
   
}
