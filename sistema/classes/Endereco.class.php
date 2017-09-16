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

    
    public function insereEndereco(){

        $con = new conectaBanco();
        $con->conecta();

        $this->idEndereco = ultimoId::ultimoIdBanco("idEndereco", "endereco");


        $sqlInsere = "INSERT INTO endereco (idEndereco, endereco, complemento, bairro, cidade, estado, cep, codUsuario) 
                      VALUES(".$this->idEndereco.", '".$this->endereco."', '".$this->complemento."', '".$this->bairro."', '".$this->cidade."', '".$this->estado."', '".$this->cep."', ".$_SESSION['idusuario'].")";

        //echo "SQL: ".$sqlInsere."<br>";
        //echo "Id Endereço: ".$this->idEndereco."<br>";

        try{
            $resultadoInserir = mysql_query($sqlInsere) or die("Não foi possível executar o comando de inserir. Verifique sob o erro: ".mysql_error());

            if($resultadoInserir){
                echo "<p style='height: 30px;'>&nbsp;</p>";
                echo "<label class='alert alert-success'>Endereço salvo com sucesso! Aguarde 2 segundos</label>";
                echo "<meta http-equiv='refresh' content='1;url=inicio.php?m=config&t=perfend'>";
                return true;
            }
            return false;

        }catch(Exception $ex){
            echo "Houve um erro na inclusão. Consulte o seu analista de sistemas. Erro: ".$ex->getMessage();
        }
        
    }
    
    public function alteraEndereco(){
        $con = new conectaBanco();
        $con->conecta();

        $sqlAlterar = "UPDATE endereco SET endereco='".$this->endereco."', complemento='".$this->complemento."', bairro='".$this->bairro."', cidade='".$this->cidade."', estado='".$this->estado."', cep='".$this->cep."' WHERE codUsuario=".$_SESSION['idusuario'];

        //echo "SQL: ".$sqlAlterar."<br>";
        
        try{
            $resultadoAlteracao = mysql_query($sqlAlterar) or die ("Houve um erro ao executar o comando de alteração. Erro: ".mysql_error());
            if($resultadoAlteracao){
                echo "<p style='heigth: 30px;'>&nbsp;</p>";
                echo "<label class='alert alert-success'>Endereço salvo com sucesso! Aguarde 2 segundos</label>";
                echo "<meta http-equiv='refresh' content='1;url=inicio.php?m=config&t=perfend'>";
                return true;
            }
            
            return false;
                        
        } catch (Exception $ex) {
            echo "Houve um erro na alteração. Consulte o seu analista de sistemas. Erro: ".$ex->getMessage();
        }
    }
    
    public function excluiEndereco(){
        $con = new conectaBanco();
        $con->conecta();

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

    public function validaEndereco(){
        $con = new conectaBanco();
        $con->conecta();

        $sqlVerificaEndereco = "SELECT * FROM endereco WHERE codUsuario = ".$_SESSION['idusuario'];

        //echo "SQL: ".$sqlVerificaEndereco."<br>";

        try{
            $resultadoVerificaEndereco = mysql_query($sqlVerificaEndereco) or die("Houve um erro no comando SQL (Verifica Endereço). Erro: ".mysql_error());
            if(mysql_num_rows($resultadoVerificaEndereco) > 0){
                $this->alteraEndereco();
            }else{
                $this->insereEndereco();
            }
            //echo "Quantidade: ".mysql_num_rows($resultadoVerificaEndereco);

        }catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }


    }
    
    public function preencheEndereco(){
        $this->setCodPerfil($_SESSION['idusuario']);

        $conexao = new conectaBanco();
        $conexao->conecta();
        
        
        $sqlConsulta = "SELECT * FROM endereco WHERE codUsuario=".$this->codperfil;
        //$sqlConsulta = "SELECT * FROM endereco WHERE codPerfil=".$this->codperfil;
        
//        echo "SQL: ".$sqlConsulta."<br>";

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
                    $endereco = "Endereço não preenchido";
                    $complemento = "Complemento não preenchido";
                    $bairro = "Bairro não preenchido";
                    $cidade = "Cidade não preenchida";
                    $estado = "Estado não preenchido";
                    $cep = "CEP não preenchido";
                }
                
//                echo "Estado preenchido: ".$this->estado;
                echo "<form name='formPerfilEnd' id='formPerfilEnd' action='inicio.php?m=config&t=perfend' method='post'>";
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
                echo "      <input type='text' name='endereco' id='endereco' value='".$this->endereco."' placeholder='$endereco' class='form-control' onkeydown='enterTab(\"complemento\", event)'>";
                echo "  </div>";
                echo "  <div class='col-xs-3 col-md-3' style='padding-left: 15px;'>";
                echo "      <input type='text' name='complemento' id='complemento' value='".$this->complemento."' placeholder='$complemento' class='form-control' onkeydown='enterTab(\"bairro\", event)'>";
                echo "  </div>";
                echo "</div>";
                echo "<div style='height: 30px;'>";
                echo "  &nbsp;";
                echo "</div>";
                echo "<div class='row' align='left' style='padding-left: 15px;'>";
                echo "  <div class='col-xs-3 col-md-3'>";
                echo "      <input type='text' name='bairro' id='bairro' value='".$this->bairro."' placeholder='$bairro' class='form-control' onkeydown='enterTab(\"cidade\", event)'>";
                echo "  </div>";
                echo "</div>";
                echo "<div style='height: 30px;'>";
                echo "  &nbsp;";
                echo "</div>";
                echo "<div class='row' align='left' style='padding-left: 15px;'>";
                echo "  <div class='col-xs-3 col-md-3'>";
                echo "      <input type='text' name='cidade' id='cidade' value='".$this->cidade."' class='form-control' placeholder='$cidade' onkeydown='enterTab(\"estado\", event)'>";
                echo "  </div>";
                echo "  <div class='col-xs-2 col-md-2'>";
                if($this->estado == ""){
                    echo "<select name='estado' id='estado' class='form-control'>";
                    echo "  <option value=''>Selecione o estado</option>";
                    echo "  <option value='AC'>AC</option>";
                    echo "  <option value='AL'>AL</option>";
                    echo "  <option value='AP'>AP</option>";
                    echo "  <option value='AM'>AM</option>";
                    echo "  <option value='BA'>BA</option>";
                    echo "  <option value='CE'>CE</option>";
                    echo "  <option value='DF'>DF</option>";
                    echo "  <option value='ES'>ES</option>";
                    echo "  <option value='GO'>GO</option>";
                    echo "  <option value='MA'>MA</option>";
                    echo "  <option value='MT'>MT</option>";
                    echo "  <option value='MS'>MS</option>";
                    echo "  <option value='MG'>MG</option>";
                    echo "  <option value='PA'>PA</option>";
                    echo "  <option value='PB'>PB</option>";
                    echo "  <option value='PR'>PR</option>";
                    echo "  <option value='PE'>PE</option>";
                    echo "  <option value='PI'>PI</option>";
                    echo "  <option value='RJ'>RJ</option>";
                    echo "  <option value='RN'>RN</option>";
                    echo "  <option value='RS'>RS</option>";
                    echo "  <option value='RO'>RO</option>";
                    echo "  <option value='RR'>RR</option>";
                    echo "  <option value='SC'>SC</option>";
                    echo "  <option value='SP'>SP</option>";
                    echo "  <option value='SE'>SE</option>";
                    echo "  <option value='TO'>TO</option>";
                    echo "</select>";
                }else{
                    echo "      <input type='text' name='estado' id='estado' value='".$this->estado."' class='form-control' maxlenght='2' onkeydown='enterTab(\"salvar\", event)'>";
                }
                echo "  </div>";
                echo "  <div class='col-xs-8 col-md-8'>";
                echo "      &nbsp;";
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
                echo "                      <a href='inicio.php?m=config&t=perf' class='btn btn-default' title='Voltar' alt='Voltar'>";
                echo "                          <img src='../img/btn_back.png' width='25' height='25'>";
                echo "                      </a>";
                echo "                  </td>";
                echo "                  <td style='text-align: left;'>";
                echo "                      <button type='button' class='btn btn-default' href='#' id='salvar' name='salvar'  onclick='enviaForm(\"formPerfilEnd\")'>";
                echo "                          <img src='../img/save2.png' width='25' height='25'>";
                echo "                      </button>";
                echo "                  </td>";
                echo "              </tr>";
                echo "              <tr>";
                echo "                  <td style='text-align: right;'>";
                echo "                      <a href='inicio.php?m=config&t=perf title='Voltar' alt='Voltar'>";
                echo "                          <label>Voltar</label>";
                echo "                      </a>";
                echo "                  </td>";
                echo "                  <td style='text-align: left;'>";
                echo "                      <a href='#' onclick='enviaForm(\"formPerfilEnd\")' title='Salvar' alt='Salvar'>";
                echo "                          <label>Salvar</label>";
                echo "                      </a>";
                echo "                  </td>";
                echo "              </tr>";
                echo "              </table>";

/*
                echo "                  <a class='btn btn-default' href='inicio.php?m=config'>Voltar</a>";
                echo "                  <button class='btn btn-primary' type='submit' id='salvar' name='salvar'>Salvar</button>";
                
*/
                echo "              </div>";
                echo "      </div>";
                echo "</div>";
                echo "</form>";                


        if($_POST){
            $this->setEndereco(filter_input(INPUT_POST, 'endereco'));
//            $this->numero(filter_input(INPUT_POST, 'numero');
            $this->setComplemento(filter_input(INPUT_POST, 'complemento'));
            $this->setBairro(filter_input(INPUT_POST, 'bairro'));
            $this->setCidade(filter_input(INPUT_POST, 'cidade'));
            $this->setEstado(filter_input(INPUT_POST, 'estado'));
            $this->setCep(filter_input(INPUT_POST, 'cep'));
            $this->setCodperfil(filter_input(INPUT_GET, $_SESSION['idusuario']));


            if($this->validaEndereco()){
                echo "Endereço salvo com sucesso! Aguarde 2 segundos";
                echo "<meta http-equiv='refresh' content='1;url=inicio.php?m=config&t=perfend'>";
            }
        }//fecha o if post
        
                
            }
            
        } catch (Exception $ex) {
            echo "Houve um erro na consulta do endereço. Erro: ".$ex->getMessage();
        }
    }
    
    
}
