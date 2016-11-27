<?php

require_once '../conexao/conectaBanco.php';

class modelEndereco {

    private $idEndereco;
    private $endereco;
    private $numero;
    private $complemento;
    private $bairro;
    private $cidade;
    private $cep;
    private $codEstado;
    private $codPerfil;
    
    public function getIdEndereco() {
        return $this->idEndereco;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getComplemento() {
        return $this->complemento;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getCep() {
        return $this->cep;
    }

    public function getCodEstado() {
        return $this->codEstado;
    }

    public function getCodPerfil() {
        return $this->codPerfil;
    }

    public function setIdEndereco($idEndereco) {
        $this->idEndereco = $idEndereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    public function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function setCodEstado($codEstado) {
        $this->codEstado = $codEstado;
    }

    public function setCodPerfil($codPerfil) {
        $this->codPerfil = $codPerfil;
    }

        
    public function telaEndereco(){
        $conexao = new conectaBanco();
        $conexao->conecta();
        $this->consultaEnderecoPerfil();
//        if(!$this->consultaEnderecoPerfil()){
//            echo "Vazio.";
//        }
        
        echo "<div class='col-xs-12 col-sm-12 placeholder'>";
        echo "  <form class='form-horizontal' style='font-size: 12px;' method='post' name='formperfilend' action='inicio.php?menu=perfilend'>";
        echo "      <div class='form-group'>";
        echo "          <label for='endereco' class='col-sm-2 control-label'>Endereço:</label>";
        echo "              <div class='col-sm-10'>";
        echo "                  <input type='text' class='form-control' name='endereco' id='endereco' placeholder='Endereço' value='".$this->endereco."' required>";
        echo "              </div>";
        echo "      </div>";
        echo "      <div class='form-group'>";
        echo "          <label for='numero' class='col-sm-2 control-label'>Número:</label>";
        echo "              <div class='col-sm-2'>";
        echo "                  <input type='number' class='form-control' name='numero' id='numero' placeholder='Número' value='".$this->numero."' required>";
        echo "              </div>";
        echo "          <label for='complemento' class='col-sm-2 control-label'>Complemento:</label>";
        echo "              <div class='col-sm-2'>";
        echo "                  <input type='text' class='form-control' name='complemento' value='".$this->complemento."' id='complemento' placeholder='Complemento'>";
        echo "              </div>";
        echo "      </div>";
        echo "      <div class='form-group'>";
        echo "          <label for='bairro' class='col-sm-2 control-label'>Bairro:</label>";
        echo "              <div class='col-sm-4'>";
        echo "                  <input type='text' class='form-control' name='bairro' value='".$this->bairro."' id='bairro' placeholder='Bairro' required>";
        echo "              </div>";
        echo "          <label for='cidade' class='col-sm-2 control-label'>Cidade:</label>";
        echo "              <div class='col-sm-4'>";
        echo "                  <input type='text' class='form-control' name='cidade' value='".$this->cidade."' id='cidade' placeholder='Cidade' required>";
        echo "              </div>";
        echo "      </div>";
        echo "      <div class='form-group'>";
        echo "          <label for='estado' class='col-sm-2 control-label'>Estado:</label>";
        echo "              <div class='col-sm-2'>";
        echo "                  <select class='form-control' id='estado' name='estado'>";
        echo "                      <option name=''>A preencher</option>";
//        include_once 'modelEstado.php';
//        if($this->codEstado != ""){//verifica se o código do estado está vazio.
//            echo "Estado diferente de vazio";
////            $consultaEstado = new modelEstado();
////            $consultaEstado->setIdEstado($this->codEstado);
////            $consultaEstado->buscaEstado();
//        echo "<div class='col-sm-3'>";
//        echo "  <input type='button' value='...' class='btn btn-default'>";// onclick='javascript:ativaSelecaoEstado()'
//        echo "      <div style='display:none' id='selecionaEstado'>";
//
//                    try{
//                        $sqlEstado = "SELECT * FROM estado";
//                        $resultadoEstado = mysql_query($sqlEstado) or die ("Problemas na consulta do estado. Erro: ".mysql_error());
//
//                        while($dadosEstado = mysql_fetch_array($resultadoEstado)){
//                            echo "<option class='form-control' name=".$dadosEstado['idEstado']." required onclick='javascript:emiteEstadoSelecionado(this.value)' onkeyup='javascript:emiteEstadoSelecionado(this.value)' onmouseover='javascript:emiteEstadoSelecionado(this.value)'>".$dadosEstado['sigla']."</option>";
//                        }
//
//                    } catch (Exception $ex) {
//                        echo "Problemas na consulta. Código E019.1. Erro: ".$ex->getMessage();
//                    }
//                echo "          </select>";
//                echo "</div>";//fecha o combo de abertura de seleção
//        }else{
//            echo "Estado igual de vazio";
//                try{
//                    $sqlEstado = "SELECT * FROM estado";
//                    $resultadoEstado = mysql_query($sqlEstado) or die("Erro na consulta. Motivo: ".mysql_error());
//
//                    if(mysql_num_rows($resultadoEstado) > 0){
//                    
//                        while($dadosEstado = mysql_fetch_array($resultadoEstado)){
//                            echo "<option class='form-control' name=".$dadosEstado['idEstado']." required>".$dadosEstado['sigla']."</option>";
//                        }
//                    }
//                    else{
//                            echo "<option class='form-control' name=''>Banco Vazio</option>";
//                        
//                    }
//
//                } catch (Exception $ex) {
//                    echo "Problemas na consulta. Código E019.1. Erro: ".$ex->getMessage();
//                }
//        }
        echo "                  </select>";
        echo "              </div>";
        echo "              <div class='form-group'>";
        echo "                  <label for='cep' class='col-sm-2 control-label'>CEP:</label>";
        echo "                      <div class='col-sm-3'>";
        echo "                          <input type='cep' class='form-control' id='cep' value='".$this->cep."' name='cep' placeholder='CEP'>";
        echo "                      </div>";
        echo "              </div>";
        echo "      <div style='height: 40px'>&nbsp;</div>";

//        echo "              </div>";
//        echo "      </div>";
        

//        echo "      <div class='form-group'>";
//        echo "              <div class='col-sm-12' style='text-align:right'>";
//        echo "                  <button class='btn btn-primary btn-xs'>Salvar</button>";
//        echo "              </div>";
//        echo "      </div>";
        echo "      <div class='form-group'>";
//        echo "          <label for='descricao' class='col-sm-2 control-label'>Sobre você:</label>";
        echo "              <div class='col-sm-10' style='text-align:right'>";
        echo "                  <button class='btn btn-default' onclick='javascript: history.go(-1)'>Voltar</button>";
        echo "                  <button class='btn btn-primary' disabled>Salvar</button>";
        echo "              </div>";
        echo "      </div>";
        echo "      <div style='height: 20px'>&nbsp;</div>";
        echo "      <div class='form-group'>";
//        echo "          <label for='descricao' class='col-sm-2 control-label'>Sobre você:</label>";
        echo "              <div class='col-sm-10' style='text-align:right'>";
        echo "                   | <a href='inicio.php?m=perfilsv' class='btn btn-default'>Sobre Você</a> | ";
        echo "                  <a href='inicio.php?m=perfilend' class='btn btn-default active'>Seu Endereço</a> | ";
        echo "                  <a href='inicio.php?m=perfiltel' class='btn btn-default' autocomplete='off'>Telefones</a> | ";
        echo "                  <a href='inicio.php?m=trocasenha' class='btn btn-default' autocomplete='off'>Troca de Senha</a> | ";
        echo "              </div>";
        echo "      </div>";
        
        //Preenche a tabela do endereço
        
        echo "  </form>";
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
    
    public function validaCampos($idPerfil){
        $conexao = new conectaBanco();
        
        $conexao->conecta();
        
        try{
            $sqlVerifica = "SELECT * FROM tblendereco WHERE codPerfil=".$idPerfil;
            echo $sqlVerifica."<br>";
            $resultadoVerifica = mysql_query($sqlVerifica) or die ("Erro no sql. Descrição: ".mysql_error());
            
            if($resultadoVerifica){
                return true;
            }else{
                return false;
            }
            
        } catch (Exception $ex) {
            echo "Erro na execução da consulta. Descrição: ".$ex->getMessage();
        }
        
    }
    
    public function consultaUltimoId(){
        $conexao = new conectaBanco();
        $conexao->conecta();
        try{
            $sqlUltimoId = "SELECT MAX(idEndereco) AS idEndereco FROM tblendereco";
            $resultadoUltimoId = mysql_query($sqlUltimoId) or die ("Não foi possível realizar a consulta [E01]. Erro: ".mysql_error());
            
            $dadosUltimoId = mysql_fetch_array($resultadoUltimoId);
            
            $ultimoId = $dadosUltimoId[idEndereco];
            
            $this->idEndereco = $ultimoId + 1;
            
        } catch (Exception $ex) {
            echo "Erro na consulta. Descrição: ".$ex->getMessage();
        }
        
        
    }
    
    public function cadastraEndereco(){
        $conexao = new conectaBanco();
        $conexao->conecta();
        try{
            $this->consultaUltimoId();
            
            $sqlInclusao = "INSERT INTO tblendereco (idEndereco, endereco, numero, complemento, bairro, cidade, cep, codEstado, codPerfil) "
                    . "VALUES(".$this->idEndereco.", '".$this->endereco."', ".$this->numero.", '".$this->complemento."', '".$this->bairro."', '".$this->cidade."', '".$this->cep."', ".$this->codEstado.", ".$this->codPerfil.")";
            
            echo "Dados preenchidos:<br>";
            echo "Endereço: ".$this->endereco."<br/>";
            echo "Número: ".$this->numero."<br/>";
            echo "Complemento: ".$this->complemento."<br/>";
            echo "Bairro: ".$this->bairro."<br/>";
            echo "Cidade: ".$this->cidade."<br/>";
            echo "CEP: ".$this->cep."<br/>";
            echo "Estado: ".$this->codEstado."<br/>";
            echo "Perfil: ".$this->codPerfil."<br/>";
            
//            $resultadoInclusao = mysql_query($sqlInclusao) or die("Erro na inclusão. Verifique sob o erro: ".mysql_error());
//            if(count($resultadoInclusao) > 0){
//                echo "Cadastro efetuado com sucesso.";
//            }else{
//                echo "O cadastro não foi salvo. Verifique seus dados.";
//            }
            
        } catch (Exception $ex) {
            echo "Erro no cadastro. Descrição: ".$ex->getMessage();
        }
        
    }
    
    public function alteraEndereco(){
        $conexao = new conectaBanco();
        $conexao->conecta();
        try{
            $sqlEdicao = "UPDATE tblendereco SET "
                    . "endereco = '".$this->endereco."', "
                    . "numero = ".$this->numero.", "
                    . "complemento = '".$this->complemento."', "
                    . "bairro = '".$this->bairro."', "
                    . "cidade = '".$this->cidade."', "
                    . "cep = '".$this->cep."', "
                    . "codEstado = ".$this->codEstado." "
                    . "WHERE codPerfil = ".$this->codPerfil;
            $resultado = mysql_query($sqlEdicao) or die ("Não foi possível alterar. Erro: ".mysql_error());
            
            if(count($resultado) > 0){
                echo "Salvo com sucesso!";
            }else{
                echo "Não foi possível salvar. Verifique os dados informados.";
            }
            
        } catch (Exception $ex) {
            echo "Erro na alteração. Descrição: ".$ex->getMessage();
        }
        
    }
    
    public function excluiEndereco(){
        $conexao = new conectaBanco();
        $conexao->conecta();
        try{
            $this->modalEndereco();
            
            $idEndereco = filter_input(INPUT_GET, 'exclui');
            
            if($idEndereco === "sim"){
                $sqlExclui = "DELETE FROM tblendereco WHERE idEndereco = ".$idEndereco;
                $resultadoExclusao = mysql_query($sqlExclui) or die ("Não foi possível excluir. Erro: ".mysql_error());
                if(mysql_num_rows($resultadoExclusao) > 0){
                    echo "Exclusão efetuada com sucesso.";
                }else{
                    echo "Exclusão não efetuada. Verifique os campos.";
                }
                
            }
            
        } catch (Exception $ex) {
            echo "Erro na exclusão. Descrição: ".$ex->getMessage();
        }
        
    }
    
    public function modalEndereco($idEndereco){
        echo "<script>$(document).ready(function(){";
        echo "$('#myModal').modal('show');";
        echo "});</script>";
        
        echo "<!-- Modal -->";
        echo "<form name='formTelefone' method='post' action='inicio.php?usuario=".filter_input(INPUT_GET, 'usuario')."&menu=perfiltel'>";
        echo "<div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>";
        echo "  <div class='modal-dialog' role='document'>";
        echo "    <div class='modal-content'>";
        echo "      <div class='modal-header'>";
        echo "        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        echo "        <h4 class='modal-title' id='myModalLabel'>Confirmação de exclusão</h4>";
        echo "      </div>";
        echo "      <div class='modal-body'>";
        echo "          <input type='hidden' value='".$idEndereco."'>";
        echo "              Deseja excluir o endereço ?";
        echo "      </div>";
        echo "      <div class='modal-footer'>";
        echo "        <a class='btn btn-default' href='inicio.php?usuario=".filter_input(INPUT_GET, 'usuario')."&menu=perfilend'>Não</a>";
        echo "        <a class='btn btn-primary' href='inicio.php?usuario=".filter_input(INPUT_GET, 'usuario')."&menu=perfilend&idendereco".$idEndereco."&exclui=sim'>Sim</a>";
        echo "      </div>";
        echo "    </div>";
        echo "  </div>";
        echo "</div>";
        echo "</form>";
    }
    
    public function consultaEnderecoPerfil(){
        $conexao = new conectaBanco();
        $conexao->conecta();
        try{
            $sql = "SELECT * FROM endereco WHERE codusuario=".$_SESSION['idusuario'];
            $resultado = mysql_query($sql) or die ("Não foi possível consultar o endereço. Erro: ".mysql_error());
            
            if($resultado){
                $dados = mysql_fetch_array($resultado);
                
                $this->endereco = $dados['endereco'];
                $this->numero = $dados['numero'];
                $this->complemento = $dados['complemento'];
                $this->bairro = $dados['bairro'];
                $this->cidade = $dados['cidade'];
                $this->codEstado = $dados['codEstado'];
                $this->cep = $dados['cep'];

            }
            
        } catch (Exception $ex) {
            echo "Não foi possível efetuar a consulta. Erro: ".$ex->getMessage();
        }
    }
    
}
