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
    private $senha;
    private $descricao;
    private $dataAlteracao;
    private $dataNascimento;
    private $profissao;
    private $estadoCivil;
    private $motivacao;
    private $codUsuario;
    private $codSetenio;

    private $email;

    private $idusuario;
    private $senhaAntiga;
    private $confereSenha;
    private $BoolUsuario;

    function getIdusuario(){
        return $this->idusuario;
    }
    function getSenhaAntiga(){
        return $this->senhaAntiga;
    }
    function getConfereSenha(){
        return $this->confereSenha;
    }

    function setIdusuario($idusuario){
        $this->idusuario = $idusuario;
    }
    function setSenhaAntiga($senha_antiga){
        $this->senhaAntiga = $senha_antiga;
    }
    function setConfereSenha($confereSenha){
        $this->confereSenha = $confereSenha;
    }

    function getSenha(){
        return $this->senha;
    }

    function setSenha($senha){
        $this->senha = $senha;
    }

    function getEmail(){
        return $this->email;
    }

    function setEmail($email){
        $this->email = $email;
    }
    
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

    function setBoolUsuario($boolusuario){
        $this->boolUsuario = $boolusuario;
    }

    function getBoolUsuario(){
        return $this->boolUsuario;
    }

    public function verificaPerfil(){
        $sql = "SELECT COUNT(idPerfil) AS idPerfil FROM perfil WHERE codUsuario = ".$_SESSION['idusuario'];

        //echo "Banco: ".$sql."<br>";
        
        try{
            $resultado = mysql_query($sql) or die("Verifica Perfil. ".RETURN_SQL.mysql_error());

            $dados = mysql_fetch_array($resultado);

            if($dados['idPerfil'] === "0"){
                //echo "foi para o novo perfil";
                $this->novoPerfil();
            }else{
                //echo "indo para a edição do perfil. Quantidade de registros: ".mysql_num_rows($resultado);
                $this->atualizaPerfilSobreVoce();
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
        
        $sqlNovoPerfil = "INSERT INTO perfil(idPerfil, nome, descricao, dataAlteracao, dataNascimento, profissao, estadoCivil, motivacao, codUsuario) VALUES (".$this->idperfil.", '".$this->nome."', '".$this->descricao."', '".$this->dataAlteracao."', '".$this->dataNascimento."', '".$this->profissao."', '".$this->estadoCivil."', '".$this->motivacao."', ".$this->codUsuario.")";
        
        //echo $sqlNovoPerfil;
        
        try{
            $resultadoNovoPerfil = mysql_query($sqlNovoPerfil) or die ("Novo Perfil. ".RETURN_SQL.mysql_error());

            if($this->boolUsuario === "usuario"){
                return true;
            }else{
                if($resultadoNovoPerfil){
                    echo "<p style=''>&nbsp;</p>";
                    echo "<label class='alert alert-success'>Salvo com sucesso! Aguarde 2 segundos.</label>";
                    echo "<meta http-equiv='refresh' content='2;url=inicio.php?m=config&t=perf'>";
    //                echo "<br><br><label class='alert alert-success'>Cadastrado com sucesso!</label>";
    //                echo "<meta http-equiv='refresh' content='2;url=inicio.php?m=config&t=usis'>";
                }

            }

            $this->boolUsuario = "";

        } catch (Exception $ex) {
            echo "Erro na execução do novo perfil do usuário. Descrição: ".$ex->getMessage();

        }
        
    }
    
    public function telaTrocaSenha(){

        $e = filter_input(INPUT_GET, 'e'); //Puxa o motivo do erro.
        
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
        echo "      <form class='form-horizontal' action='inicio.php?m=config&t=trocasenha' method='post' id='formTrocaSenha' name='formTrocaSenha'>";
        echo "          <div class='form-group'>";
        echo "              <label for='senhaantiga' class='col-sm-4 control-label'>";
        echo "                  Senha antiga:";
        echo "              </label>";
        echo "              <div class='col-sm-4'>";
        echo "                  <input type='password' name='senhaantiga' id='senhaantiga' class='form-control' onkeydown='enterTab(\"senhanova\", event)'>";
        echo "              </div>";
        echo "          </div>";
        echo "          <div class='form-group'>";
        echo "              <label for='senhanova' class='col-sm-4 control-label'>";
        echo "                  Senha nova:";
        echo "              </label>";
        echo "              <div class='col-sm-4'>";
        echo "                  <input type='password' name='senhanova' id='senhanova' class='form-control' onkeydown='enterTab(\"confirmasenha\", event)'>";
        echo "              </div>";
        echo "          </div>";
        echo "          <div class='form-group'>";
        echo "              <label for='senhanova' class='col-sm-4 control-label'>";
        echo "                  Confirme sua senha:";
        echo "              </label>";
        echo "              <div class='col-sm-4'>";
        echo "                  <input type='password' name='confirmasenha' id='confirmasenha' class='form-control' onkeypress='habilitaBotao();' onkeydown='enterTab(\"salvar\", event)'>";
        echo "              </div>";
        echo "          </div>";
        echo "          <div class='form-group'>";

        echo "              <table class='table'>";
        echo "              <tr>";
        echo "                  <td style='text-align: right;'>";
        echo "                      <a href='inicio.php?m=config&t=perftel' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "                          <img src='../img/btn_back.png' width='25' height='25'>";
        echo "                      </a>";
        echo "                  </td>";
        echo "                  <td style='text-align: left;'>";
        echo "                      <button type='button' class='btn btn-default' id='salvar' name='salvar' disabled onclick='enviaForm(\"formTrocaSenha\")'>";
        echo "                          <img src='../img/save2.png' width='25' height='25'>";
        echo "                      </button>";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td style='text-align: right; padding-right: 12px;'>";
        echo "                      <a href='inicio.php?m=config&t=perftel' title='Voltar' alt='Voltar'>";
        echo "                          <label>Voltar</label>";
        echo "                      </a>";
        echo "                  </td>";
        echo "                  <td style='text-align: left; padding-left: 12px;'>";
        echo "                      <a href='#' onclick='enviaForm(\"formTrocaSenha\")' title='Salvar' alt='Salvar' disabled>";
        echo "                          <label>Salvar</label>";
        echo "                      </a>";
        echo "                  </td>";
        echo "               </tr>";
        echo "               </table>";


/*        echo "              <a href='inicio.php?m=config&t=perftel' style='text-decoration: none;' class='btn btn-default'>";
        echo "                  Voltar";
        echo "              </a>";
        echo "              <button type='button' id='salvar' name='salvar' class='btn btn-primary' disabled onclick='enviaForm(\"formTrocaSenha\")'>";
        echo "                  Salvar";
        echo "              </button>";*/



        echo "          </div>";

        switch ($e) {
            case '1':
                echo "                      <div id='erro1' name='erro1' class='alert alert-danger'>";
                echo "                          Senha antiga inválida";
                echo "                      </div>";
                break;

            case '2':
                echo "                      <div id='erro2' name='erro2' class='alert alert-danger'>";
                echo "                          Confirmação da senha difere com a nova senha.";
                echo "                      </div>";
                break;

            case '3':
                echo "                      <div id='erro3' name='erro3' class='alert alert-danger'>";
                echo "                          Todos os campos devem ser preenchidos.";
                echo "                      </div>";
                break;
            
            default:
               echo "";
                break;
        }

        echo "          <div style='height: 40px'>&nbsp;</div>";
        $this->menuBaixoPerfil();
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
            $this->idusuario = $_SESSION['idusuario'];

            if($senhaNova != $confirmasenha){ //Confere se as senhas estão iguais
                //echo "<meta http-equiv='refresh' content='0;url=inicio.php?m=config&t=trocasenha&e=2'>";
            }else if($senhaAntiga === ""){
                //echo "<meta http-equiv='refresh' content='0;url=inicio.php?m=config&t=trocasenha&e=3'>";
            }else if($senhaNova === ""){
                //echo "<meta http-equiv='refresh' content='0;url=inicio.php?m=config&t=trocasenha&e=3'>";
            }else if($confirmaSenha === ""){
                //echo "<meta http-equiv='refresh' content='0;url=inicio.php?m=config&t=trocasenha&e=3'>";
            }
            
            $senhaCript = md5($senhaAntiga);
            $senhaCriptNova = md5($senhaNova);
            
            $this->setSenha($senhaCript);
//            $this->setSenhaNova($senhaCriptNova);

            $this->alteraSenha($senhaCriptNova);
            
            
        }
        
        
    }

    public function alteraSenha($senhaCriptNova){
        $conexao = new conectaBanco();
        $conexao->conecta();

        try{
            $sqlVerifSenha = "SELECT * FROM tblusuario 
                              WHERE idUsuario = ".$this->idusuario;

            //echo "SQL: ".$sqlVerifSenha."<br>";

            $resultadoVerifSenha = mysql_query($sqlVerifSenha) or die ("Erro na verificação da senha anterior. Erro: ".mysql_error());
            $dadosVerifSenha = mysql_fetch_array($resultadoVerifSenha);
            
            //echo "Senha Antiga: ".$this->senha."<br>";
            //echo "Senha no sistema: ".$dadosVerifSenha['senha'];

            if($this->senha === $dadosVerifSenha['senha']){//se a senha for igual ao do sistema

                try{
                    $sql = "UPDATE tblusuario SET senha = '".$senhaCriptNova."' WHERE idUsuario = ".$this->idusuario;
                    $resultado = mysql_query($sql) or die ("Houve um erro no SQL. Verifique sob o erro ".mysql_error());
                    
                    if($resultado){
                        echo "<label class='alert alert-success'>Senha alterada com sucesso!</label>";
                        //echo "<meta http-equiv='refresh' content='3;URL=inicio.php?m=config&t=trocasenha'>";
                    }
                } catch (Exception $e) {
                    echo "Não foi possível alterar a senha. Erro: ".$e->getMessage();
                }
                
            }else{
                echo "<meta http-equiv='refresh' content='2;url=inicio.php?m=config&t=trocasenha&e=1'>";//senha antiga inválida
            }
            
            
        } catch (Exception $ex) {
            echo "Não foi possível executar a operação. Erro: ".$ex->getMessage();
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
                            DATE_FORMAT(p.dataNascimento,'%d/%m/%Y') AS dataNascimentoFormat, 
                            tu.nomeTipo
                    FROM tblusuario l
                    LEFT JOIN perfil p on l.idUsuario = p.codUsuario
                    INNER JOIN tipousuario tu on tu.idTipo = l.codTipo
                    WHERE l.idUsuario = ".$idusuario;
//                    INNER JOIN setenio s on p.codSetenio = s.idsetenio

            //echo $sql."<br>";
            $resultado = mysql_query($sql) or die("Erro no comando SQL. Verifique sob o erro: " . mysql_error());

            //echo mysql_num_rows($resultado);

            if(mysql_num_rows($resultado) < 1){
                $campoEmail = "E-mail não preenchido";
                $campoTipoAcesso = "Tipo de acesso não selecionado";
                $campoDataNascimento = "Data de nascimento não preenchida";

            }

//           
//            if (mysql_num_rows($resultado) > 0) {
                $_SESSION['perfil'] = $dados['idPerfil'];
                $dados = mysql_fetch_array($resultado);

                echo "<form name='formPerfil' id='formPerfil' method='post' action='inicio.php?m=config&t=perf'>";
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
                echo "  <div class='col-xs-4 col-md-4' style='padding-left: 15px;'>";
                echo "      <h5>";
                echo "          <input type='text' name='email' id='email' value='".$dados['email']."' placeholder='$campoEmail' class='form-control' onkeydown='enterTab(\"dataNascimento\", event)'>";
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
                echo "          <input type='text' value='".$dados['dataNascimentoFormat']."' name='dataNascimento' placeholder='$campoDataNascimento' id='dataNascimento' class='form-control' onkeypress='mascaraData(this)' onkeydown='enterTab(\"descricao\", event)'>";
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
                echo "          &nbsp;";
//                echo "          <b>Setênio</b>: ".$dados['setenio'];
                echo "      </h5>";
                echo "  </div>";
                echo "</div>";
                echo "<div class='row' align='left' style='padding-left: 15px;'>";
                echo "  <div class='col-xs-4 col-md-4'>";
                echo "      <h5>";
                echo "          <label for='descricao' class='control-label'>Sobre você:</label>";
//                echo "          <b>Data de Cadastro</b>: ".$dados['dataAlteracao'];
                echo "      </h5>";
                echo "  </div>";
                echo "  <div class='col-xs-8 col-md-8'>";
                echo "      &nbsp;";
                echo "  </div>";
                echo "</div>";
                echo "<div class='row' align='left'>";// style='padding-left: 15px;'
                echo "  <div class='col-xs-12 col-md-12'>";
                echo "      <div class='form-group'>";
                echo "              <div class='col-sm-5'>";
                echo "                  <textarea class='form-control' placeholder='Sobre você' cols='10' rows='5' id='descricao' name='descricao' onkeydown='enterTab(\"salvar\", event)'>" . $dados['descricao'] . "</textarea>";
                echo "              </div>";
                echo "      </div>";
                echo "  </div>";
                echo "</div>";
                echo "<div class='col-xs-12 col-md-12'><p style='height: 30px;'>&nbsp;</p></div>";
                echo "<div class='col-xs-9 col-md-9' align='left'>";
                $p = new perfil();
                $p->menuBaixoPerfil();
                echo "</div>";
                echo "<div class='col-sm-12'><p style='height: 30px;'>&nbsp;</p></div>";
                echo "<div class='col-sm-6'>&nbsp;</div>";
                echo "<div class='col-sm-6'>";
                echo "      <div class='form-group'>";
                echo "              <div class='col-sm-10' style='text-align:right; padding-right: 150px;'>";

                echo "              <table class='table'>";
                echo "              <tr>";
                echo "                  <td style='text-align: right;'>";
                echo "                      <a href='inicio.php?m=config' class='btn btn-default' title='Voltar' alt='Voltar'>";
                echo "                          <img src='../img/btn_back.png' width='25' height='25'>";
                echo "                      </a>";
                echo "                  </td>";
                echo "                  <td style='text-align: left;'>";
                echo "                      <button type='button' class='btn btn-default' id='salvar' name='salvar' onclick='enviaForm(\"formPerfil\")'>";
                echo "                          <img src='../img/save2.png' width='25' height='25'>";
                echo "                      </button>";
                echo "                  </td>";
                echo "              </tr>";
                echo "              <tr>";
                echo "                  <td style='text-align: right;'>";
                echo "                      <a href='inicio.php?m=config' title='Voltar' alt='Voltar'>";
                echo "                          <label>Voltar</label>";
                echo "                      </a>";
                echo "                  </td>";
                echo "                  <td style='text-align: left;'>";
                echo "                      <a href='#' onclick='enviaForm(\"formPerfil\")' title='Salvar' alt='Salvar'>";
                echo "                          <label>Salvar</label>";
                echo "                  </td>";
                echo "              </tr>";
                echo "              </table>";


/*                echo "      <a href='inicio.php?m=config' class='btn btn-default' target='_self' title='Voltar' alt='Voltar'>";
                echo "          <img src='../img/btn_back.png' width='25' height='25'>";
                echo "      </a>";
                echo "          <br><label style='padding-right: 8px;'>Voltar</label>";
                echo "                  <button class='btn btn-primary' type='submit' id='salvar' name='salvar'>Salvar</button>";
*/                

                echo "              </div>";
                echo "      </div>";
                echo "</div>";
                echo "</form>";

                if($_POST){
                    $email = addslashes(filter_input(INPUT_POST, 'email'));
                    $dataNascimento = addslashes(filter_input(INPUT_POST, 'dataNascimento'));
                    $descricao = addslashes(filter_input(INPUT_POST, 'descricao'));
                    $dataNascimentoConvertida = implode("-", array_reverse(explode("/", $dataNascimento)));

                    if($dataNascimentoConvertida === ""){
                        $dataNascimentoConvertida = "0000-00-00";
                    }

                    $this->setEmail($email);
                    $this->setDataNascimento($dataNascimentoConvertida);
                    $this->setDescricao($descricao);
                    $this->setDataAlteracao(date('Y-m-d'));

/*                    echo "E-mail:".$this->email."<br>";
                    echo "Data Nascimento:".$this->dataNascimento."<br>";
                    echo "Descrição:".$this->descricao."<br>";
*/

                    $this->verificaPerfil();
//                    if($this->verificaPerfil()){
//                        echo "<p style=''>&nbsp;</p>";
//                        echo "<label class='alert alert-success'>Perfil atualizado com sucesso! Aguarde 2 segundos.</label>";
//                        echo "<meta http-equiv='refresh' content='2;url=inicio.php?m=config&t=perf'>";
//                    }

                }
                
                
//            } else {//Direcionar para Sobre você
//                echo "Perfil não preenchido. Preencha os campos para atualização.";
//                echo "<p style='height: 30px;'>&nbsp;</p>";
//                $this->telaPerfil();
//            }
        } catch (Exception $ex) {
            echo "Não foi possível efetuar a consulta. Erro exception: " . $ex->getMessage();
        }
    }

    public function atualizaPerfilSobreVoce(){
        $con = new conectaBanco();
        $con->conecta();
        
        $sqlUpdate = "UPDATE perfil SET descricao = '".$this->descricao."', dataNascimento = '".$this->dataNascimento."' WHERE codUsuario = ".$_SESSION['idusuario'];

        $sqlUpdateUsuario = "UPDATE tblusuario SET email = '".$this->email."' WHERE idUsuario = ".$_SESSION['idusuario'];

//        echo "SQL: ".$sqlUpdate."<br>";
//        echo "SQL: ".$sqlUpdateUsuario."<br>";

        try{

            $resultadoUpdate = mysql_query($sqlUpdate) or die("Erro no comando SQL. Descrição: ".mysql_error());
            $resultadoUpdateUsuario = mysql_query($sqlUpdateUsuario) or die("Erro no comando SQL Usuário. Descrição: ".mysql_error());

            if($resultadoUpdate or $resultadoUpdateUsuario){
                        echo "<p style=''>&nbsp;</p>";
                        echo "<label class='alert alert-success'>Perfil atualizado com sucesso! Aguarde 2 segundos.</label>";
                        echo "<meta http-equiv='refresh' content='2;url=inicio.php?m=config&t=perf'>";
            }

            return false;

        }catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
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
        echo "  <form class='form-horizontal' style='font-size: 12px;' method='post' name='formperfil' action='inicio.php?m=config&t=perfilsv'>";
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
        echo "                  <a class='btn btn-default' href='inicio.php?m=config'>Voltar</a>";
        echo "                  <button class='btn btn-primary'>Salvar</button>";
        echo "              </div>";
        echo "      </div>";
        echo "      <div style='height: 20px'>&nbsp;</div>";
        $this->menuBaixoPerfil();
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
    
    public function menuBaixoPerfil(){
        $a = filter_input(INPUT_GET, 't');

        switch ($a) {
            case 'perf':
                $ativaSobreVoce = " active ";
                $ativaEndereco = "";
                $ativaTelefones = "";
                $ativaTrocaSenha = "";
                break;

            case 'perfend':
                $ativaSobreVoce = "";
                $ativaEndereco = " active ";
                $ativaTelefones = "";
                $ativaTrocaSenha = "";
            break;
            
            case 'perftel':
                $ativaSobreVoce = "";
                $ativaEndereco = "";
                $ativaTelefones = " active ";
                $ativaTrocaSenha = "";
            break;

            case 'trocasenha':
                $ativaSobreVoce = "";
                $ativaEndereco = "";
                $ativaTelefones = "";
                $ativaTrocaSenha = " active ";
            break;

            default:
                $ativaSobreVoce = " active ";
                $ativaEndereco = "";
                $ativaTelefones = "";
                $ativaTrocaSenha = "";
                break;
        }


        echo "      <div class='form-group' align='left'>";
        echo "              <div class='col-sm-10' style='text-align:left'>";
        echo "                   | <a href='inicio.php?m=config&t=perf' class='btn btn-default $ativaSobreVoce''>Sobre Você</a> | ";
        echo "                  <a href='inicio.php?m=config&t=perfend' class='btn btn-default $ativaEndereco'>Seu Endereço</a> | ";
        echo "                  <a href='inicio.php?m=config&t=perftel' class='btn btn-default $ativaTelefones' autocomplete='off'>Telefones</a> | ";
        echo "                  <a href='inicio.php?m=config&t=trocasenha' class='btn btn-default $ativaTrocaSenha' autocomplete='off'>Troca de Senha</a> | ";
        echo "              </div>";
        echo "      </div>";

    }

    public function excluiPerfil(){

        $con = new conectaBanco();
        $con->conecta();


        $sqlExclusaoPerfil = "DELETE FROM perfil WHERE codUsuario = ".$this->codUsuario;

        try{

            $resultadoExclusao = mysql_query($sqlExclusaoPerfil) or die ("Erro no comando SQL de exclusão. Descrição: ".mysql_error());

            if($resultadoExclusao){
                return true;
            }else{
                return false;
            }

        }catch (Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }

    }

}

