<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of autoavaliacao
 *
 * @author Debug
 */
class autoavaliacao {
    
    private $idautoavaliacao;
    private $descricao;
    private $paragem;
    private $bonustarefa;
    private $codusuario;
    
    function getIdautoavaliacao() {
        return $this->idautoavaliacao;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getParagem() {
        return $this->paragem;
    }

    function getBonustarefa() {
        return $this->bonustarefa;
    }

    function getCodusuario() {
        return $this->codusuario;
    }

    function setIdautoavaliacao($idautoavaliacao) {
        $this->idautoavaliacao = $idautoavaliacao;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setParagem($paragem) {
        $this->paragem = $paragem;
    }

    function setBonustarefa($bonustarefa) {
        $this->bonustarefa = $bonustarefa;
    }

    function setCodusuario($codusuario) {
        $this->codusuario = $codusuario;
    }

    public function telaAutoAvaliacao(){
        $conecta = new conectaBanco();
        $conecta->conecta();
        $sqlTelaAutoAvaliacao = "SELECT * FROM autoavaliacao WHERE codUsuario = ".$this->codusuario;
        
//        echo $sqlTelaAutoAvaliacao."<br>";
        $sqlSomaTotal = "SELECT SUM(bonustarefa) AS totalBonus FROM autoavaliacao WHERE codUsuario = ".$this->codusuario."";
        
        try{
            $resultadoTelaAvaliacao = mysql_query($sqlTelaAutoAvaliacao) or die("Erro na execução do comando SQL de consulta Auto-Avaliação. Descrição: ".mysql_error());
            
            $resultadoSomaTotal = mysql_query($sqlSomaTotal) or die("Erro na execução do comando SQL do valor total. Descrição: ".mysql_error());
           $dadosValorTotal = mysql_fetch_array($resultadoSomaTotal);//pega o valor total da sql 2
           
           $percentual = $dadosValorTotal['totalBonus']/(18*11.5);
           $p = $percentual * 100;
           
            echo "<div class='col-sm-12'>";
            if(mysql_num_rows($resultadoTelaAvaliacao) > 0){
            echo "<p style='height: 10px;'>&nbsp;</p>";
            echo "<div class='col-sm-4'>";
            echo "  <label>Total Geral: ".$dadosValorTotal['totalGeral']."</label>";
            echo "</div>";
            echo "<div class='col-sm-4'>";
            echo "  <label>Percentual: ".number_format($p, 2, ",", ".")."%"."</label>";
            echo "</div>";
            echo "<div class='col-sm-4'>";
            echo "  <label>&nbsp;</label>";
            echo "</div>";
            echo "<p style='height: 30px;'>&nbsp;</p>";
                echo "<table class='table'>";
                echo "  <tr>";
                echo "      <td>";
                echo "          Semana";
                echo "      </td>";
                echo "      <td>";
                echo "          Paragem";
                echo "      </td>";
                echo "      <td>";
                echo "          Seleção";
                echo "      </td>";
                echo "      <td>";
                echo "          Total";
                echo "      </td>";
                echo "      <td>";
                echo "          Selecione";
                echo "      </td>";
                echo "  </tr>";
                while($dadosAutoAval = mysql_fetch_array($resultadoTelaAvaliacao)){
                    echo "  <tr>";
                    echo "      <td>";
                    echo            $dadosAutoAval['semana'];
                    echo "      </td>";
                    echo "      <td>";
                    echo            $dadosAutoAval['paragem'];
                    echo "      </td>";
                    echo "      <td>";
                    echo            $dadosAutoAval['selecao'];
                    echo "      </td>";
                    echo "      <td>";
                    echo            $dadosAutoAval['total'];
                    echo "      </td>";
                    echo "      <td>";
                                    $idautoavaliacao = $dadosAutoAval['idautoavaliacao'];
                    echo "          <input type='radio' name='opcao' value='".$idautoavaliacao."' onclick='editaAutoAval(this.value)'>";
                    echo "      </td>";
                    echo "  </tr>";
                }
                echo "</table>";
                echo "<input type='hidden' name='idpp' id='idpp'>";
                echo "<a class='btn btn-primary' href='inicio.php?m=aval&t=naval' id='novopp'>Novo</a> | ";
                echo "<a class='btn btn-default' href='javascript:pegaAutoAval(".$idautoavaliacao.")' id='btEdita' disabled>Editar</a> | ";
                echo "<a class='btn btn-default' href='javascript:pegaAutoAvalExcluir(".$idautoavaliacao.")' id='btExcluir' disabled>Excluir</a> | ";
                echo "<a class='btn btn-default' href='inicio.php'>Voltar</a>";
                echo "<input type='hidden' id='ppSelecionado' name='ppSelecionado'>";
            }else{
                echo "<label><h3>Ops!</h3> Não localizamos a sua auto-avaliação. Vamos preencher?</label><br>";
                echo "<div style='height: 40px;'>&nbsp;</div>";
//                echo "<div class='btn-group' data-toggle='buttons'>";
                echo "  <a class='btn btn-default' style='width: 80px;' href='inicio.php?m=aval&t=naval'>";
                echo "      Vamos !";
                echo "  </a>";
                echo "  <a class='btn btn-default' style='width: 80px;' href='inicio.php'>";
                echo "      Depois";
                echo "  </a>";
//                echo "</div>";
            }
            
            echo "</div>";
            
        } catch (Exception $ex) {
            echo "Chamada de exception. Descrição: ".$ex->getMessage();
        }
        
    }

    
    //put your code here
}
