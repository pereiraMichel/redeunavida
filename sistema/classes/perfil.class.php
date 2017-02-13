<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of perfil
 *
 * @author Debug
 */
class perfil {
    
    private $idperfil;
    private $nome;
    private $descricao;
    private $dataAlteracao;
    private $dataNascimento;
    private $profissao;
    private $estadoCivil;
    private $motivacao;
    private $codUsuario;
    private $codSetenio;
    
    
    function getDataAlteracao() {
        return $this->dataAlteracao;
    }

    function getDataNascimento() {
        return $this->dataNascimento;
    }

    function getProfissao() {
        return $this->profissao;
    }

    function getEstadoCivil() {
        return $this->estadoCivil;
    }

    function getMotivacao() {
        return $this->motivacao;
    }

    function setDataAlteracao($dataAlteracao) {
        $this->dataAlteracao = $dataAlteracao;
    }

    function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    function setProfissao($profissao) {
        $this->profissao = $profissao;
    }

    function setEstadoCivil($estadoCivil) {
        $this->estadoCivil = $estadoCivil;
    }

    function setMotivacao($motivacao) {
        $this->motivacao = $motivacao;
    }

    function getIdperfil() {
        return $this->idperfil;
    }

    function getNome() {
        return $this->nome;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getCodUsuario() {
        return $this->codUsuario;
    }

    function getCodSetenio() {
        return $this->codSetenio;
    }

    function setIdperfil($idperfil) {
        $this->idperfil = $idperfil;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    function setCodSetenio($codSetenio) {
        $this->codSetenio = $codSetenio;
    }

    public function verificaPerfil(){
        $sql = "SELECT COUNT(idPerfil) AS idPerfil FROM perfil WHERE codUsuario = ".$this->codUsuario;
        
        try{
            $resultado = mysql_query($sql) or die("Verifica Perfil. ".RETURN_SQL.mysql_error());

            $dados = mysql_fetch_array($resultado);

            if($dados > 0){
//                echo "indo para a edição do perfil.";
                $this->editPerfil();
            }else{
                $this->novoPerfil();
            }
            
        } catch (Exception $ex) {
            echo "Erro na execução da verificação do perfil do usuário. Erro: ".$ex->getMessage();
        }
        
    }
    
    public function novoPerfil(){
        $this->idperfil = ultimoId::ultimoIdBanco('idPerfil', 'perfil');
        
        if($this->dataNascimento === "0000-00-00"){
            $this->setCodSetenio(1);
        }
        
        $sqlNovoPerfil = "INSERT INTO perfil(idPerfil, nome, descricao, dataAlteracao, dataNascimento, profissao, estadoCivil, motivacao, codUsuario, codSetenio) VALUES (".$this->idperfil.", '".$this->nome."', '".$this->descricao."', '".$this->dataAlteracao."', '".$this->dataNascimento."', '".$this->profissao."', '".$this->estadoCivil."', '".$this->motivacao."', ".$this->codUsuario.", ".$this->codSetenio.")";
        
//        echo "";
        
        try{
            $resultadoNovoPerfil = mysql_query($sqlNovoPerfil) or die ("Novo Perfil. ".RETURN_SQL.mysql_error());

            if($resultadoNovoPerfil){
                
                echo "<br><br><label class='alert alert-success'>Cadastrado com sucesso!</label>";
                echo "<meta http-equiv='refresh' content='2;url=inicio.php?m=config&t=usis'>";
            }
            
        } catch (Exception $ex) {
            echo "Erro na execução do novo perfil do usuário. Descrição: ".$ex->getMessage();

        }
        
    }
    
    public function telaTrocaSenha(){
        
        echo "  <div class='form-group'>";
        echo "      <div class='row' style='padding-left: 15px;'>";
        echo "          <div class='col-xs-12 col-md-12' align='center'>";
        echo "              <h3>";
        echo "                  Usuário: ".$_SESSION['usuario'];
        echo "              </h3>";
        echo "          </div>";
        echo "          <div class='col-xs-8 col-md-8' style='padding-left: 15px;'>";
        echo "              &nbsp;";
        echo "          </div>";
        echo "      </div>";
        echo "   </div>";
        echo "<div class='row'>";
        echo "  <div class='col-xs-2 col-md-2'>";
        echo "  </div>";
        echo "  <div class='col-xs-8 col-md-8'>";
        echo "      <form class='form-horizontal' action='inicio.php?menu=trocasenha' method='post'>";
        echo "          <div class='form-group'>";
        echo "              <label for='senhaantiga' class='col-sm-4 control-label'>";
        echo "                  Senha antiga:";
        echo "              </label>";
        echo "              <div class='col-sm-4'>";
        echo "                  <input type='password' name='senhaantiga' id='senhaantiga' class='form-control'>";
        echo "              </div>";
        echo "          </div>";
        echo "          <div class='form-group'>";
        echo "              <label for='senhanova' class='col-sm-4 control-label'>";
        echo "                  Senha nova:";
        echo "              </label>";
        echo "              <div class='col-sm-4'>";
        echo "                  <input type='password' name='senhanova' id='senhanova' class='form-control'>";
        echo "              </div>";
        echo "          </div>";
        echo "          <div class='form-group'>";
        echo "              <label for='senhanova' class='col-sm-4 control-label'>";
        echo "                  Confirme sua senha:";
        echo "              </label>";
        echo "              <div class='col-sm-4'>";
        echo "                  <input type='password' name='confirmasenha' id='confirmasenha' class='form-control'>";
        echo "              </div>";
        echo "          </div>";
        echo "          <div class='form-group'>";
        echo "              <a href='inicio.php' style='text-decoration: none;'>";
        echo "                  <button type='button' class='btn btn-default'>Voltar</button>";
        echo "              </a>";
        echo "              <a href='#' style='text-decoration: none;'>";
        echo "                  <button type='submit' class='btn btn-primary' disabled>Salvar</button>";
        echo "              </a>";
        echo "          </div>";
        echo "          <div style='height: 40px'>&nbsp;</div>";
        echo "          <div class='form-group' align='left'>";
        echo "              <div class='col-sm-12' style='text-align: center;'>";
        echo "                   | <a href='inicio.php?m=perf' class='btn btn-default'>Sobre Você</a> | ";
        echo "                  <a href='inicio.php?m=perfend' class='btn btn-default'>Seu Endereço</a> | ";
        echo "                  <a href='inicio.php?m=perftel' class='btn btn-default'>Telefones</a> | ";
        echo "                  <a href='#' class='btn btn-default active'>Troca de Senha</a> | ";
        echo "              </div>";
        echo "          </div>";
        echo "      </form>";
        echo "  </div>";
        echo "  <div class='col-xs-2 col-md-2'>";
        echo "      &nbsp;";
        echo "  </div>";
        echo "</div>";
        
        if($_POST){
            
            $senhaAntiga = filter_input(INPUT_POST, 'senhaantiga');
            $senhaNova = filter_input(INPUT_POST, 'senhanova');
            $confirmaSenha = filter_input(INPUT_POST, 'confirmasenha');
            $idusuario = $_SESSION['idusuario'];
            
            $senhaVerificacao = md5($senhaAntiga);
            
            $this->setSenha($senhaNova);
            
            if($confirmaSenha != $senhaNova){
                echo "<p class='bg-danger'><label class='label label-danger'>As senhas não conferem. Verifique a nova senha e a confirmação.</label></p>";
                echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=inicio.php?menu=trocasenha'>";
            }else{
            
            
            $conexao = new conectaBanco();
            $conexao->conecta();
            
            try{
                $sqlVerifSenha = "SELECT * FROM ".USUARIO." 
                                  WHERE idUsuario = ".$idusuario;
                
                $resultadoVerifSenha = mysql_query($sqlVerifSenha) or die ("Erro na verificação da senha anterior. Erro: ".mysql_error());
                $dadosVerifSenha = mysql_fetch_array($resultadoVerifSenha);
                
                if($senhaVerificacao === $dadosVerifSenha['senha']){//se a senha for igual ao do sistema
//                    mysql_close($dadosVerifSenha);
//                    mysql_close($resultadoVerifSenha);//fecha o sql anterior
                    //Comando para alteração da senha
                    try{
                        $sql = "UPDATE ".USUARIO." SET senha = '".$this->senha."' WHERE idUsuario = ".$idusuario;
                        $resultado = mysql_query($sql) or die ("Houve um erro no SQL. Verifique sob o erro ".mysql_error());
                        
                        if($resultado){
                            echo "<p class='bg-success'><label class='label label-success'>Senha alterada com sucesso!</label></p>";
                            echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=inicio.php'>";
                        }
                    } catch (Exception $e) {
                        echo "Não foi possível alterar a senha. Erro: ".$e->getMessage();
                    }
                    
                    
                }else{
//                    
//                    echo "<br>Usuário: ".$idusuario;
//                    echo "<br>Senha a verificar: ".$senhaVerificacao;
//                    echo "<br>Senha do sistema: ".$dadosVerifSenha['senha'];
                    
                echo "<p class='bg-danger'><label class='label label-danger'>A senha informada não confere. Verifique a sua senha ou contate o seu administrador.</label></p>";
                echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=inicio.php?menu=trocasenha'>";
                }
                
                
            } catch (Exception $ex) {
                echo "Não foi possível executar a operação. Erro: ".$ex->getMessage();
            }
            }
            
        }
        
        
    }

    
    public function telaPerfilPrincipal() {

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
                    INNER JOIN tipousuario tu on tu.idTipo = l.codTipo
                    INNER JOIN setenio s on p.codSetenio = s.idsetenio
                    WHERE l.idUsuario = ".$idusuario;
//            echo $sql."<br>";
            $resultado = mysql_query($sql) or die("Erro no comando SQL. Verifique sob o erro: " . mysql_error());
            $dados = mysql_fetch_array($resultado);
//           
            if ($dados > 0) {
                $_SESSION['perfil'] = $dados['idPerfil'];
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
                echo "  <div class='col-xs-4 col-md-4' style='padding-left: 15px;'>";
                echo "      <h5>";
                echo "          <input type='text' name='email' id='email' placeholder='".$dados['email']."' class='form-control'>";
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
                    echo "          <input type='text' placeholder='Data de nascimento não preenchida.' name='dataNascimento' id='dataNascimento' class='form-control'>";
                }else{
                    echo "          <input type='text' placeholder='".$dados['dataNascimento']."' name='dataNascimento' id='dataNascimento' class='form-control'>";
                }
                echo "      </h5>";
                echo "  </div>";
                echo "  <div class='col-xs-2 col-md-2'>";
                echo "      <h5>";
                echo "          &nbsp;";
//                echo "          <b>Tipo de Usuário</b>: ".$dados['nomeTipo'];
                echo "      </h5>";
                echo "  </div>";
                echo "  <div class='col-xs-6 col-md-6'>";
                echo "      <h5>";
                echo "          <b>Setênio</b>: ".$dados['setenio'];
                echo "      </h5>";
                echo "  </div>";
                echo "</div>";
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
                echo "<div class='row' align='left'>";// style='padding-left: 15px;'
                echo "  <div class='col-xs-12 col-md-12'>";
                echo "      <div class='form-group'>";
//                echo "          <label for='descricao' class='col-sm-4 control-label'>Sobre você:</label>";
                echo "              <div class='col-sm-5'>";
                echo "                  <textarea class='form-control' placeholder='Sobre você' cols='10' rows='5' id='descricao' name='descricao'>" . $dados['descricao'] . "</textarea>";
                echo "              </div>";
                echo "      </div>";
                echo "  </div>";
                echo "</div>";
                echo "<div class='col-xs-12 col-md-12'><p style='height: 30px;'>&nbsp;</p></div>";
                echo "<div class='col-xs-9 col-md-9' align='left'>";
                echo "  <div class='btn-group' role='group' aria-label='...'>";
                echo "      <a href='#' style='text-decoration: none;' disabled>";
                echo "          <button class='btn btn-default' disabled>";
                echo "              Sobre você";
                echo "          </button>";
                echo "      </a>";
                echo "      <a href='inicio.php?m=perfend' style='text-decoration: none;'>";
                echo "          <button class='btn btn-default'>";
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
                    . "INNER JOIN tipousuario tp ON tp.idTipo = u.codTipo "
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
//                $codPerfil = $array['codPerfil'];
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
        echo "              <div class='col-sm-10' style='text-align:right'>";
        echo "                  <button class='btn btn-default' onclick='javascript: history.go(-1)'>Voltar</button>";
        echo "                  <button class='btn btn-primary'>Salvar</button>";
        echo "              </div>";
        echo "      </div>";
        echo "      <div style='height: 20px'>&nbsp;</div>";
        echo "      <div class='form-group'>";
        echo "              <div class='col-sm-10' style='text-align:right'>";
        echo "                   | <a href='inicio.php?m=perf' class='btn btn-default active''>Sobre Você</a> | ";
        echo "                  <a href='inicio.php?m=perfend' class='btn btn-default'>Seu Endereço</a> | ";
        echo "                  <a href='inicio.php?m=perftel' class='btn btn-default' autocomplete='off'>Telefones</a> | ";
        echo "                  <a href='inicio.php?m=trocasenha' class='btn btn-default' autocomplete='off'>Troca de Senha</a> | ";
        echo "              </div>";
        echo "      </div>";
        if ($_POST) {
            $nome = filter_input(INPUT_POST, "nomeUsuario");
            $dataNascimento = filter_input(INPUT_POST, "dataNascimento");
            $tipoUsuario = filter_input(INPUT_POST, "tipoUsuario");
            $codSetenio = filter_input(INPUT_POST, 'codSetenio');
            $sobreVoce = filter_input(INPUT_POST, 'descricao');
            $codUsuario = $_SESSION['idusuario'];
            $this->validaCamposPerfil($nome, $dataNascimento, $tipoUsuario, $codSetenio, $sobreVoce, $codUsuario);
        }


        //Preenche a tabela do perfil

        echo "  </form>";
        echo "</div>";
    }
    
}
