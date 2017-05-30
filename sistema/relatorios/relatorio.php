<?php


ini_set('display_errors', 1);


include_once "../classes/relatorios.class.php";
include_once '../erros/erros.php';
include_once '../conexao/conectaBanco.php';
include_once '../constante/constanteSistema.php';

/*
pegar variáveis pelo get

*/

$con = new conectaBanco();

$r = new relatorios();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">

	<title>RELATÓRIO</title>

        <link rel="stylesheet" href="../../assets/css/font-awesome.min.css"> <!-- Responsável por emitir figuras -->
        <link rel="stylesheet" href="../../css/font-awesome.min.css"> <!-- Responsável por emitir figuras -->
        
        
        <link rel="shortcut icon" href="../../icon/ruv.ico">
        <link rel="icon" type="image/png" href="../../images/ruvicon.png">
        
        <link rel="stylesheet" href="../../css/bootstrap-responsive_1.css">
	<!--<link rel="stylesheet" href="../../css/bootstrap.min.css">-->
	    <link rel="stylesheet" href="../../css/docs.css">
	    <link rel="stylesheet" href="../../css/bootstrap.css">
        <link rel="stylesheet" href="../css/dashboard.css">
        <link rel="stylesheet" href="../css/styleme.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/estiloMenu.css">
        <link rel="stylesheet" href="../css/simple-sidebar.css">
        <link rel="stylesheet" href="../css/jquery-ui.css">
        <link rel="stylesheet" href="../css/jquery-ui.mnin.css">
        <link rel="stylesheet" href="../css/jquery-ui.structure.css">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />


        <link rel="author" href="../../autor.txt">

       
</head>
    <body>

<?php

/////////////////////////////////////////////////////////////// INÍCIO DO CONTEÚDO DE CONFIGURAÇÃO
/*
    function cabecalho($opcao){

        //echo $opcao;
        $nomeRelatorio = null;

        switch($opcao){
            case "medit":
                $nomeRelatorio = "MEDITAÇÃO";
                break;
            case "port":
                $nomeRelatorio = "PRÁTICA DOS PORTAIS";
                break;
            case "para":
                $nomeRelatorio = "PARAGEM-PRESENÇA";
                break;
            case "tare":
                $nomeRelatorio = "TAREFAS";
                break;
            case "focal":
                $nomeRelatorio = "SERVIÇOS E EXTRAS - FOCALIZAÇÃO";
                break;
            case "pres":
                $nomeRelatorio = "SERVIÇOS E EXTRAS - PRESENÇA";
                break;
            case "servtodas":
                $nomeRelatorio = "SERVIÇOS E EXTRAS - FOCALIZAÇÃO E PRESENÇA";
                break;

        }

        return "<table><tr><td><img src='http://www.redeunaviva.rio/images/logoRUV350x250.png' width='140' height='100'></td><td width='50'>&nbsp;</td><td><p style='font-size: 25px;'>RELATÓRIO DE ".$nomeRelatorio."</p></td></tr></table>";
    }


    function rodape(){
        return date('d/m/Y H:i:s')."| SISRUV - Sistema RedeUnaViva";
    }

    function relatorio($rel){
//        $estilo = "../../css/estilo.css";
//        $style = file_get_contents($estilo);

        $mpdf = new mPDF('pt','A4',3,'',8,8,5,14,9,9,'P');
        $mpdf->SetDisplayMode('fullpage');

        $mpdf->SetFooter($this->rodape());

        $mpdf->WriteHTML($rel);
        $mpdf->Output('arquivo.pdf','I');

//        $this->rodape();

        exit();

    }*/
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

////////////////////////////////////////////////////////////////////// FIM DO CONTEÚDO DE CONFIGURAÇÃO

?>

<label>Está na página do relatório</label>

<?php

// CÓDIGOS MORTOS

/*        echo "<div align='center'>";
        echo "<div class='col-sm-3'>";
        echo "  &nbsp;";
        echo "</div>";
        echo "<div class='col-sm-6'>";
        echo "  <form name='formPP' method='post' action='inicio.php?m=rela&t=port'>";
        echo "      <table class='table'>";
        echo "          <tr>";
        echo "              <td>";
        echo "                  <label>Data: </label>";
        echo "              </td>";
        echo "              <td>";
        echo "                  <div class='input-group'>";
        echo "                      <input type='text' id='calendario' name='calendario' class='form-control'><div class='input-group-addon'><i class='fa fa-calendar'></i></div>";
        echo "                  </div>";
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
            $resultadoRelPortal = mysql_query($sqlRelPortal) or die ("Não foi possível executar o comando SQL. Descrição: ".mysql_error());
            
            while($dadosRelPortal = mysql_fetch_array($resultadoRelPortal)){
                echo "<option value='".$dadosRelPortal['semana']."'>".$dadosRelPortal['semana']."</option>";
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
//        echo "                  <a class='btn btn-default' href='inicio.php?m=rela&t=pp&r=rnav'>";
//        echo "                      <img src='../img/text-icon.png' width='25' height='25' title='Abrir no navegador' alt='Abrir no navegador'>";
//        echo "                  </a>";
        echo "              </td>";
        echo "          </tr>";
        echo "      </table>";
        echo "  </form>";
        echo "</div>";
        echo "<div class='col-sm-3'>";
        echo "  &nbsp;";
        echo "</div>";
        echo "</div>";*/


/*        $sqlRelParPres = "SELECT * 
                     FROM portal
                     WHERE codusuario = ".$this->codusuario."
                     GROUP BY semana";

        echo "<div align='center'>";
        echo "<div class='col-sm-3'>";
        echo "  &nbsp;";
        echo "</div>";
        echo "<div class='col-sm-6'>";
        echo "  <form name='formPP' method='post' action='inicio.php?m=rela&t=para'>";
        echo "      <table class='table'>";
        echo "          <tr>";
        echo "              <td>";
        echo "                  <label>Data: </label>";
        echo "              </td>";
        echo "              <td>";
        echo "                  <div class='input-group'>";
        echo "                      <input type='text' id='calendario' name='calendario' class='form-control'><div class='input-group-addon'><i class='fa fa-calendar'></i></div>";
        echo "                  </div>";
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
            $resultadoRelParPres = mysql_query($sqlRelParPres) or die ("Não foi possível executar o comando SQL. Descrição: ".mysql_error());
            
            while($dadosRelParPres = mysql_fetch_array($resultadoRelParPres)){
                echo "<option value='".$dadosRelParPres['semana']."'>".$dadosRelParPres['semana']."</option>";
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
*/


/*        $sqlRelTarefa = "SELECT * 
                     FROM tarefa
                     WHERE codusuario = ".$this->codusuario."
                     GROUP BY semanaRuv";

                     //echo "SQL: ".$sqlRelTarefa."<br>";
        echo "<div align='center'>";
        echo "<div class='col-sm-3'>";
        echo "  &nbsp;";
        echo "</div>";
        echo "<div class='col-sm-6'>";
        echo "  <form name='formPP' method='post' action='inicio.php?m=rela&t=tare'>";
        echo "      <table class='table'>";
        echo "          <tr>";
        echo "              <td>";
        echo "                  <label>Data: </label>";
        echo "              </td>";
        echo "              <td>";
        echo "                  <div class='input-group'>";
        echo "                      <input type='text' id='calendario' name='calendario' class='form-control'><div class='input-group-addon'><i class='fa fa-calendar'></i></div>";
        echo "                  </div>";
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
            $resultadoRelTarefa = mysql_query($sqlRelTarefa) or die ("Não foi possível executar o comando SQL. Descrição: ".mysql_error());
            
            while($dadosRelTarefa = mysql_fetch_array($resultadoRelTarefa)){
                echo "<option value='".$dadosRelTarefa['semanaRuv']."'>".$dadosRelTarefa['semanaRuv']."</option>";
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
        echo "</div>";*/


/*        $sqlRelServFocal = "SELECT * 
                     FROM servfocalizacao
                     WHERE codusuario = ".$this->codusuario."
                     GROUP BY semanaRuv";
                     
        $sqlRelServPres = "SELECT * 
                     FROM servpresenca
                     WHERE codusuario = ".$this->codusuario."
                     GROUP BY semanaRuv";

        if($tipo === "focal"){
            $marcaFocal = " checked = 'checked' ";
            $marcaPres = "";
            $marcaTodos = "";
        }else if($tipo === "pres"){
            $marcaFocal = "";
            $marcaPres = " checked = 'checked' ";
            $marcaTodos = "";
        }else if ($tipo === "servtodas"){
            $marcaFocal = "";
            $marcaPres = "";
            $marcaTodos = " checked = 'checked' ";
        }else{
            $marcaFocal = "";
            $marcaPres = "";
            $marcaTodos = "";
        }


        echo "<div align='center'>";
        echo "<div class='col-sm-3'>";
        echo "  &nbsp;";
        echo "</div>";
        echo "<div class='col-sm-6'>";
        echo "  <form name='formPP' method='post' action='inicio.php?m=rela&t=serv'>";
        echo "      <table class='table'>";
        echo "          <tr>";
        echo "              <td>";
        echo "                  <label>Tipo: </label>";
        echo "              </td>";
        echo "              <td>";
        echo "                  <div class='input-group'>";
        echo "                      <input type='radio' id='tipo' name='tipo' value='focal' $marcaFocal onclick='directRelServExtras(this.value)'> Focalização | ";
        echo "                      <input type='radio' id='tipo' name='tipo' value='pres' $marcaPres onclick='directRelServExtras(this.value)'> Presença | ";
        echo "                      <input type='radio' id='tipo' name='tipo' value='servtodas' $marcaTodos onclick='directRelServExtras(this.value)'> Todos ";
        echo "                  </div>";
        echo "              </td>";
        echo "          </tr>";
        echo "          <tr>";
        echo "              <td>";
        echo "                  <label>Data: </label>";
        echo "              </td>";
        echo "              <td>";
        echo "                  <div class='input-group'>";
        echo "                      <input type='text' id='calendario' name='calendario' class='form-control'><div class='input-group-addon'><i class='fa fa-calendar'></i></div>";
        echo "                  </div>";
        echo "              </td>";
        echo "          </tr>";
        echo "          <tr>";
        echo "              <td>";
        echo "                  <label>Semana: </label>";
        echo "              </td>";
        echo "              <td>";

        echo "                  <select name='se' id='se' class='form-control'>";
        echo "                      <option value=''></option>";
        
        switch ($tipo) {
            case 'focal':
                echo "                      <option value='todos'>Todos</option>";
 //               echo "                      </select>";
                
                try{
                    $resultadoRelServFocal = mysql_query($sqlRelServFocal) or die ("Não foi possível executar o comando SQL. Descrição: ".mysql_error());
                    
                    while($dadosRelServFocal = mysql_fetch_array($resultadoRelServFocal)){
                        echo "<option value='".$dadosRelServFocal['semanaRuv']."'>".$dadosRelServFocal['semanaRuv']."</option>";
                    }
                } catch (Exception $ex) {
                    echo "Exception ativado. Mensagem: ".$ex->getMessage();
                }
                break;
            
            case 'pres':
                echo "                      <option value='todos'>Todos</option>";
                
                try{
                    $resultadoRelServPres = mysql_query($sqlRelServPres) or die ("Não foi possível executar o comando SQL. Descrição: ".mysql_error());
                    
                    while($dadosRelServPres = mysql_fetch_array($resultadoRelServPres)){
                        echo "<option value='".$dadosRelServPres['semanaRuv']."'>".$dadosRelServPres['semanaRuv']."</option>";
                    }
                } catch (Exception $ex) {
                    echo "Exception ativado. Mensagem: ".$ex->getMessage();
                }
                break;
            
            default:
                    echo "<option value=''>Tipo não selecionado</option>";
                break;
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
*/


/*        $content = " 

<div class='modal fade' tabindex='-1' role='dialog'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
        <h4 class='modal-title'>Modal title</h4>
      </div>
      <div class='modal-body'>

";

*/


/*            $content .= "        
            <p>One fine body&hellip;</p>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
        <button type='button' class='btn btn-primary'>Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
";*/


/*


    public function consultaRelatorioFocalizacao($sqlConsultaFocalizacao, $sqlTotalFocalizacao){
        //    echo $sqlConsultaFocalizacao."<br>";
        try{
            $resultPesqFocal = mysql_query($sqlConsultaFocalizacao) or die ("Há um erro no comando SQL (Serviços e Extras - Focalização). Erro: ".mysql_error());
            $resultTotalPesqFocal = mysql_query($sqlTotalFocalizacao) or die ("Há um erro no comando SQL (Total Serviços e Extras = Focalização). Erro: ".mysql_error());


//            $content.="<hr style='background-color: #BFE0F1;' size='2' noshade='noshade'>";
            $content.="<table class='table'>";
            
            if(mysql_num_rows($resultPesqFocal) > 0){

                $dadosTotalFocal = mysql_fetch_array($resultTotalPesqFocal);
                $content.=  
                "
                    <tr>
                        <td colspan='7'>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td colspan='7'>
                            <p style='font-size: 15px; font-weight: bold; text-align: justify;'>FOCALIZAÇÃO</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='7'>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td colspan='7'>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Data RUV</p>
                        </td>
                        <td style='width: 110px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Semana RUV</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Serviço</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Opção</p>
                        </td>
                        <td style='width: 200px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Outros</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Bônus</p>
                        </td>
                        <td>
                            <p style='font-size: 15px;'>&nbsp;</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='7'>
                            &nbsp;
                        </td>
                    </tr>

                ";
                    while($dadosPesquisa = mysql_fetch_array($resultPesqFocal)){
                        $content.="
                            <tr>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['dataRuvFocal']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['semanaRuv']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['servico']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['opcaofocalizacao']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['outros']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['bonus']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                                ";
                    }
                    $content.=" 
                        <tr>
                            <td colspan='7' style='height: 30px;'>
                                &nbsp;
                            </td>
                        </tr>
                        <tr style='background-color: #dee0fc;'>
                            <td colspan='7'>
                                <p style='font-size: 15px; text-align: center; color: #3a44a8; height: 30px; font-weight: bold;'>Total Bônus: 
                                ".$dadosTotalFocal['totalBonusFocalizacao']."</p>
                            </td>
                        </tr>
                    ";
                }else{
                    //echo mysql_num_rows($resultPesqMed);
                        $content.=" 
                        <tr>
                            <td colspan='7' style='height: 30px;'>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>        
                            <td colspan='7'>        
                                <p style='font-size: 15px;'> Não foi possível localizar a meditação para os campos selecionados.</p>       
                            </td>        
                        </tr>        
                        ";
                }
            $content.=" 
                <tr>
                    <td colspan='7' style='height: 30px;'>
                        &nbsp;
                    </td>
                </tr>
            ";
            $content.="</table>";
            //$this->relatorio($content);

            return $content;
            
        }catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }

    }


    public function consultaRelatorioPresenca($sqlConsultaPresenca, $sqlTotalPresenca){
        try{
            $resultPesqPres = mysql_query($sqlConsultaPresenca) or die ("Há um erro no comando SQL (Serviços e Extras - Presença). Erro: ".mysql_error());
            $resultTotalPres = mysql_query($sqlTotalPresenca) or die ("Há um erro no comando SQL (Total Serviços e Extras - Presença). Erro: ".mysql_error());

            
//            $content.="<hr style='background-color: #BFE0F1;' size='2' noshade='noshade'>";
            $content.="<table class='table'>";
            
            if(mysql_num_rows($resultTotalPres) > 0){

                $dadosTotalPres = mysql_fetch_array($resultTotalPres);
                $content.=  
                "
                    <tr>
                        <td colspan='7'>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td colspan='7'>
                            <p style='font-size: 15px; font-weight: bold; text-align: justify;'>PRESENÇA</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='7'>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td colspan='7'>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Data RUV</p>
                        </td>
                        <td style='width: 110px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Semana RUV</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Serviço</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Opção</p>
                        </td>
                        <td style='width: 200px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Outros</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Bônus</p>
                        </td>
                        <td>
                            <p style='font-size: 15px;'>&nbsp;</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='7'>
                            &nbsp;
                        </td>
                    </tr>

                ";
                    while($dadosPesquisaPres = mysql_fetch_array($resultPesqPres)){
                        $content.="
                            <tr>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisaPres['dataRuvPres']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisaPres['semanaRuv']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisaPres['servico']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisaPres['opcaopresenca']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisaPres['outros']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisaPres['bonus']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                                ";
                    }
                    $content.=" 
                        <tr>
                            <td colspan='7' style='height: 30px;'>
                                &nbsp;
                            </td>
                        </tr>
                        <tr style='background-color: #dee0fc;'>
                            <td colspan='7'>
                                <p style='font-size: 15px; text-align: center; color: #3a44a8; height: 30px; font-weight: bold;'>Total Bônus: 
                                ".$dadosTotalPres['totalBonusPresenca']."</p>
                            </td>
                        </tr>
                    ";
                }else{
                    //echo mysql_num_rows($resultPesqMed);
                        $content.=" 
                        <tr>
                            <td colspan='9' style='height: 30px;'>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>        
                            <td colspan='9'>        
                                <p style='font-size: 15px;'> Sem Serviços e Extras - Presença para mostrar.</p>       
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
            ";
            $content.="</table>";
//            $this->relatorio($content);

            return $content;
            
        }catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }

    }




*/


// FIM DOS CÓDIGOS MORTOS

?>    
    </body>
</html>
