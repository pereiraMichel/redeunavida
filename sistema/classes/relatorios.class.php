<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of relatorios
 *
 * @author Debug
 */
class relatorios {
    
    private $codusuario;
    
    
    function getCodusuario() {
        return $this->codusuario;
    }

    function setCodusuario($codusuario) {
        $this->codusuario = $codusuario;
    }

        
    public function telaRelatorios(){
        echo "<div class='col-xs-6 col-sm-4 placeholder'>";
        echo "    <a href='inicio.php?m=rela&t=pp' class='acesso'>";
        echo "        <img src='../img/registrar2.png' class='img-responsive' title='PP' width='60' height='60'>";
        echo "        <h4>PP</h4>";
        echo "        <!--<span class='text-muted'>Preencha o bônus.</span>-->";
        echo "    </a>";
        echo "</div>";
        echo "<div class='col-xs-6 col-sm-4 placeholder'>";
        echo "    <a href='#' class='acesso'>";
        echo "      &nbsp;";
        echo "    </a>";
        echo "</div>";
        echo "<div class='col-xs-6 col-sm-4 placeholder'>";
        echo "    <a href='#' class='acesso'>";
        echo "      &nbsp;";
        echo "    </a>";
        echo "</div>";
        echo "<div class='col-xs-6 col-sm-12'>";
        echo "  <a href='inicio.php' class='btn btn-default'>";
        echo "      Voltar";
        echo "  </a>";
        echo "</div>";
        
    }
    
    public function telaOpcoes($opcao){
        
        if($opcao === "pp"){
            $this->telaPP();
        }
        
    }
    
    public function telaPP(){
        
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $sqlRelPP = "SELECT * 
                     FROM pp p
                     INNER JOIN portal po ON po.codusuario = p.codusuario
                     WHERE p.codusuario = ".$this->codusuario."
                     GROUP BY p.paragem";
        
//        echo $sqlRelPP;
        echo "<div align='center'>";
        echo "<div class='col-sm-3'>";
        echo "  &nbsp;";
        echo "</div>";
        echo "<div class='col-sm-6'>";
        echo "  <form name='formPP' method='post' action='inicio.php?m=rela&t=pp'>";
        echo "      <table class='table'>";
        echo "          <tr>";
        echo "              <td>"; 
        echo "                  <label>Tipo: </label>";
        echo "              </td>";
        echo "              <td>";
        echo "                  <input type='radio' name='o' id='medit' value='medit'> Meditação";
        echo "                  <input type='radio' name='o' id='port' value='port'> Portal";
        echo "                  <input type='radio' name='o' id='todos' value='todo'> Todos";
        echo "              </td>";
        echo "          </tr>";
        echo "          <tr>";
        echo "              <td>";
        echo "                  <label>Data: </label>";
        echo "              </td>";
        echo "              <td>";
//        echo "                  <input type='number' name='dia' id='dia'>";
        echo "                  <select name='d' id='d' class='form-control'>";
        echo "                      <option value=''></option>";
        echo "                      <option value='1'>1</option>";
        echo "                      <option value='2'>2</option>";
        echo "                      <option value='3'>3</option>";
        echo "                      <option value='4'>4</option>";
        echo "                      <option value='5'>5</option>";
        echo "                      <option value='6'>6</option>";
        echo "                      <option value='7'>7</option>";
        echo "                      <option value='8'>8</option>";
        echo "                      <option value='9'>9</option>";
        echo "                      <option value='10'>10</option>";
        echo "                      <option value='11'>11</option>";
        echo "                      <option value='12'>12</option>";
        echo "                      <option value='13'>13</option>";
        echo "                      <option value='14'>14</option>";
        echo "                      <option value='15'>15</option>";
        echo "                      <option value='16'>16</option>";
        echo "                      <option value='17'>17</option>";
        echo "                      <option value='18'>18</option>";
        echo "                      <option value='19'>19</option>";
        echo "                      <option value='20'>20</option>";
        echo "                      <option value='21'>21</option>";
        echo "                      <option value='22'>22</option>";
        echo "                      <option value='23'>23</option>";
        echo "                      <option value='24'>24</option>";
        echo "                      <option value='25'>25</option>";
        echo "                      <option value='26'>26</option>";
        echo "                      <option value='27'>27</option>";
        echo "                      <option value='28'>28</option>";
        echo "                      <option value='29'>29</option>";
        echo "                      <option value='30'>30</option>";
        echo "                      <option value='31'>31</option>";
        echo "                  </select>";
        echo "              </td>";
        echo "          </tr>";
        echo "          <tr>";
        echo "              <td>";
        echo "                  <label>Semana: </label>";
        echo "              </td>";
        echo "              <td>";
        echo "                  <select name='se' id='se' class='form-control'>";
        echo "                      <option value=''></option>";
        echo "                      <option value='todos'>Todos</option>";
        
        try{
            $resultadoRelPP = mysql_query($sqlRelPP) or die ("Não foi possível executar o comando SQL. Descrição: ".mysql_error());
            
            while($dadosRelPP = mysql_fetch_array($resultadoRelPP)){
                echo "<option value='".$dadosRelPP['paragem']."'>".$dadosRelPP['paragem']."</option>";
            }
        } catch (Exception $ex) {
            echo "Exception ativado. Mensagem: ".$ex->getMessage();
        }
        
        echo "                  </select>";
        echo "              </td>";
        echo "          </tr>";
        echo "          <tr>";
        echo "              <td colspan='2'>"; 
        echo "                  <a href='inicio.php?m=rela' class='btn btn-default'>Voltar</a>";
        echo "                  <button class='btn btn-default' type='submit'>";
        echo "                      <img src='../img/pdf-icon.png' width='25' height='25' title='Gerar PDF' alt='Gerar PDF'>";
        echo "                  </button>";
        echo "                  <a class='btn btn-default' href='inicio.php?m=rela&t=pp&r=rnav'>";
        echo "                      <img src='../img/text-icon.png' width='25' height='25' title='Abrir no navegador' alt='Abrir no navegador'>";
        echo "                  </a>";
        echo "              </td>";
        echo "          </tr>";
        echo "      </table>";
        echo "  </form>";
        echo "</div>";
        echo "<div class='col-sm-3'>";
        echo "  &nbsp;";
        echo "</div>";
        echo "</div>";

        if($_POST){
            $tipo = addslashes(filter_input(INPUT_POST, 'o'));
            $data = addslashes(filter_input(INPUT_POST, 'd'));
            $semana = addslashes(filter_input(INPUT_POST, 'se'));

            header("Location: inicio.php?m=rela&t=pp&o=$tipo&d=$data&se=$semana");

//            $this->conteudoPP($tipo, $data, $semama);
        }

        $opcao = filter_input(INPUT_GET, 'o');
        $dia = filter_input(INPUT_GET, 'd');
        $sem = filter_input(INPUT_GET, 'se');


        if($opcao <> ""){// and $dia <> "" and $sem <> ""
            $this->conteudoPP($opcao, $dia, $sem);
        }

    }

    public function cabecalho($opcao){
        return "<table><tr><td><img src='http://www.redeunaviva.rio/images/logoRUV350x250.png' width='140' height='100'></td><td><p style='font-size: 25px;'>RELATÓRIO DE ".$opcao."</p></td></tr></table>";
    }

    public function rodape(){
        return date('d/m/Y H:i:s')."| SISRUV - Sistema RedeUnaViva";
    }

    public function conteudoPP($opcao, $data, $semana){

        $conecta = new conectaBanco();
        $conecta->conecta();

        $relatorio = null;
        $onde = null;

        $content = ob_get_clean();
        $content = utf8_encode($content);

        $sqlConsultaMeditacao = "SELECT * FROM pp";
        $sqlConsultaPortal = "SELECT * FROM portal";
        
        //Total Meditação e Portal
        $sqlTotalMeditacao = "SELECT SUM(bonus) AS totalBonusMeditacao FROM pp";
        $sqlTotalPortal = "SELECT SUM(bonus) AS totalBonusPortal FROM portal";
        
//        echo $opcao;
        if($opcao === "medit"){
            $relatorio = "PP";
                if(!$semana === "todos"){
                    $sqlSemana = "";
                    $onde = "";
                }else{
                    $sqlSemana = " paragem = ".$semana;
                    $onde = " WHERE ";
                }
                if(!$data === "todos"){
                    $sqlData = "";
                }else{
                    if(!$onde === null){
                        $sqlData = $onde." diaRuv = ".$data;
                    }else{
                        $sqlData = " diaRuv = ".$data;
                    }
                }
                
                
                
                    $sqlConsultaMeditacao = $sqlConsultaMeditacao.$sqlData.$sqlSemana;
                    $sqlTotalMeditacao = $sqlTotalMeditacao.$sqlData.$sqlSemana;
//                    $sqlConsultaMeditacao = $sqlConsultaMeditacao." WHERE paragem='".$semana."'";
//                    $sqlTotalMeditacao = $sqlTotalMeditacao." WHERE paragem='".$semana."'";
        }else if($opcao === "port"){
            $relatorio = "PORTAL";
            $sqlConsultaPortal = $sqlConsultaPortal." WHERE semana='".$semana."' AND diaRuv = ".$data;
            $sqlTotalPortal = $sqlTotalPortal." WHERE semana='".$semana."'";
                if(!$data === "todos"){
                    $sqlConsultaPortal = $sqlConsultaPortal." AND diaRuv = ".$data;
                    $sqlTotalPortal = $sqlTotalPortal." AND diaRuv = ".$data;
                }
        }else if($opcao === "todo"){
            $relatorio = "PP e PORTAL";
        }

        $content = $this->cabecalho($relatorio);
//        
//        echo "Normal: ".$sqlConsultaMeditacao."<br>";
//        echo "Total: ".$sqlTotalMeditacao."<br>";
//        echo "Data: ".$data."<br>";
        try{
            $resultPesqMed = mysql_query($sqlConsultaMeditacao) or die ("Há um erro no comando SQL (Meditação). Erro: ".mysql_error());
            $resultTotalPesqMed = mysql_query($sqlTotalMeditacao) or die ("Há um erro no comando SQL (Meditação - Total). Erro: ".mysql_error());
            
            $resultPesqPortal = mysql_query($sqlConsultaPortal) or die ("Há um erro no comando SQL (Portal). Erro: ".mysql_error());
            $resultTotalPesqPortal = mysql_query($sqlTotalPortal) or die ("Há um erro no comando SQL (Portal - Total). Erro: ".mysql_error());
            
            $content.="<hr style='background-color: #BFE0F1;' size='2' noshade='noshade'>";
            $content.="<table class='table'>";
            
//            echo $sqlTotalMeditacao;
//            echo $sqlTotalTotalPesqPortal;
            
            //MEDITAÇÃO
            if(mysql_num_rows($resultPesqMed) > 0 and ($opcao === "medit" or $opcao === "todo")){
                $dadosTotalMed = mysql_fetch_array($resultTotalPesqMed);
                $content.=  
                "
                    <tr>
                        <td colspan='9'>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td colspan='9'>
                            <p style='font-size: 20px;'>Meditação</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='9'>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center;'>Dia</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center;'>Semana</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center;'>Data</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center;'>Início</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center;'>Término</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center;'>Duração</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center;'>Bônus</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center;'>Período</p>
                        </td>
                        <td>
                            <p style='font-size: 15px;'>&nbsp;</p>
                        </td>
                    </tr>
                ";
                    while($dadosPesquisa = mysql_fetch_array($resultPesqMed)){
                        $content.="
                            <tr>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['diaRuv']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['paragem']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['dataRegistro']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['inicio']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['termino']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['duracao']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['bonus']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['periodo']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                                ";
                    }
                    $content.=" 
                        <tr>
                            <td colspan='9' style='height: 30px;'>
                                &nbsp;
                            </td>
                        </tr>
                        <tr style='background-color: #dee0fc;'>
                            <td colspan='9'>
                                <p style='font-size: 15px; text-align: center; color: #3a44a8; height: 30px;'>Total Bônus: 
                                ".$dadosTotalMed['totalBonusMeditacao']."</p>
                            </td>
                        </tr>
                    ";
                }else{
                    if($opcao === "medit"){
                        $content.=" 
                        <tr>
                            <td colspan='9' style='height: 30px;'>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>        
                            <td colspan='9'>        
                                <p style='font-size: 15px;'> Não foi possível localizar a meditação para os campos selecionados.</p>       
                            </td>        
                        </tr>        
                        ";
                    }else{
                        $content.="";
                    }
                }
            $content.=" 
                <tr>
                    <td colspan='9' style='height: 30px;'>
                        &nbsp;
                    </td>
                </tr>
            ";
            // PORTAL
            if(mysql_num_rows($resultPesqPortal) > 0 and ($opcao === "port" or $opcao === "todo")){
                $dadosTotalPortal = mysql_fetch_array($resultTotalPesqPortal);
                $content.=  
                "
                <tr>
                    <td colspan='9'>
                        <hr style='background-color: #fff; width: 50%; text-align: center; border-top: 1px dashed #BFE0F1;' size='1'>
                    </td>
                </tr>

                    <tr>
                        <td colspan='9'>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td colspan='9'>
                            <p style='font-size: 20px;'>Portal</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='9'>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center;'>Dia</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center;'>Semana</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center;'>Data</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center;'>Sonho</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center;'>Completação</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center;'>Corpo</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center;'>Retrospectiva</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center;'>Completação</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center;'>Bônus</p>
                        </td>
                    </tr>
                ";
                    while($dadosPesquisaPortal = mysql_fetch_array($resultPesqPortal)){
                        $content.="
                            <tr>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisaPortal['diaRuv']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisaPortal['semana']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisaPortal['dataCadastro']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisaPortal['sonho']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisaPortal['compSonho']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisaPortal['corpo']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisaPortal['retro']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisaPortal['compRetro']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisaPortal['bonus']."</p>
                                </td>
                            </tr>
                                ";
                    $content.=" 
                        <tr>
                            <td colspan='9' style='height: 30px;'>
                                &nbsp;
                            </td>
                        </tr>
                        <tr style='background-color: #dee0fc;'>
                            <td colspan='9'>
                                <p style='font-size: 15px; text-align: center; color: #3a44a8; height: 30px;'>Total Bônus: 
                                ".$dadosTotalPortal['totalBonusPortal']."</p>
                            </td>
                        </tr>
                    ";
                    }
                }else{
                    if($opcao === "port"){
                    $content.=" 
                    <tr>        
                        <td>        
                            <p style='font-size: 15px;'> Não foi possível localizar o portal para os campos selecionados.</p>       
                        </td>        
                    </tr>        
                    ";
                    }
                }
            $content.="</table>";
            $this->relatorioPP($content);
            
        }catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }




    }

    public function relatorioPP($rel){
//        $estilo = "../../css/estilo.css";
//        $style = file_get_contents($estilo);

        $mpdf = new mPDF('pt','A4',3,'',8,8,5,14,9,9,'P');
        $mpdf->SetDisplayMode('fullpage');

//        $mpdf->SetHTMLHeader($this->cabecalho());
        $mpdf->SetFooter($this->rodape());

//        $mpdf->WriteHTML($style,1);
        $mpdf->WriteHTML($rel);
        $mpdf->Output('arquivo.pdf','I');

//        $this->rodape();

        exit();

    }
/*

//        $style = file_get_contents($estilo);
//        $estilo = "../../css/style.css";
//        $estilo = "../../css/estilo.css";

        $mpdf = new mPDF('pt','A4',3,'',8,8,5,14,9,9,'P');
//        $mpdf->AddPage('P');
        $mpdf->SetDisplayMode('fullpage');

//        $mpdf->SetHTMLHeader($header);
//        $mpdf->SetFooter('{DATE j/m/Y&nbsp; H:i}|{PAGENO}/{nb}|SISRUV - Sistema RedeUnaViva');

//        $mpdf->WriteHTML($style,1);

        $mpdf->WriteHTML($content);
        $mpdf->Output('arquivo.pdf','I');
        exit();


*/    
    //put your code here
}
