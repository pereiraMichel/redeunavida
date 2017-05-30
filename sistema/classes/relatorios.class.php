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
    private $nomeUsuario;
    private $usuarioRelatorio;
    private $nomeUsuarioRelatorio;

    function getNomeUsuarioRelatorio(){
        return $this->nomeUsuarioRelatorio;
    }

    function setNomeUsuarioRelatorio($nomeUsuarioRelatorio){
        $this->nomeUsuarioRelatorio = $nomeUsuarioRelatorio;
    }

    function getUsuarioRelatorio(){
        return $this->usuarioRelatorio;
    }

    function setUsuarioRelatorio($usuarioRelatorio){
        $this->usuarioRelatorio = $usuarioRelatorio;
    }
    
    function getNomeUsuario(){
        return $this->nomeUsuario;
    }

    function setNomeUsuario($nomeusuario){
        $this->nomeUsuario = $nomeusuario;
    }
    
    function getCodusuario() {
        return $this->codusuario;
    }

    function setCodusuario($codusuario) {
        $this->codusuario = $codusuario;
    }


///////////////////////////////////////////////// CONFIGURAÇÕES - NÃO MEXER

    public function relatorio($rel, $nome_relatorio){
//        $estilo = "../../css/estilo.css";
//        $style = file_get_contents($estilo);

        $mpdf = new mPDF('pt','A4',3,'',8,8,5,14,9,9,'P');
        $mpdf->SetDisplayMode('fullpage');

        $mpdf->SetFooter($this->rodape());

        $mpdf->WriteHTML($rel);
        $mpdf->Output("relatorio".$nome_relatorio.".pdf","D"); //DEPOIS DO TESTE, PASSAR PARA D - DOWNLOAD OU ABRIR
                                            // O I CORRESPONDE À ABERTURA NO BROWSER


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

    public function cabecalho($opcao){

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
                $nomeRelatorio = "PRESENÇA-PARAGEM";
                break;
            case "tare":
                $nomeRelatorio = "TAREFAS";
                break;
            case "serv":
                $nomeRelatorio = "SERVIÇOS E EXTRAS";
                break;
            case "usu":
                $nomeRelatorio = "USUÁRIOS";
                break;
            case "ind":
                $nomeRelatorio = "ÍNDICE";
                break;

        }


        return "<table><tr><td><img src='http://www.redeunaviva.rio/images/logoRUV350x250.png' width='140' height='100'></td><td width='50'>&nbsp;</td><td><p style='font-size: 25px;'>RELATÓRIO DE ".$nomeRelatorio."</p></td></tr></table>";
    }

    public function rodape(){
        return date('d/m/Y H:i:s')."| SISRUV - Sistema RedeUnaViva";
    }


///////////////////////////////////////////////////////// FIM DAS CONFIGURAÇÕES



        
    public function telaRelatorios(){
        //echo "<meta http-equiv='refresh' content='5;url=inicio.php?m=rela'>";

        echo "<div class='col-sm-12'>";
        echo "  <label class='alert alert-danger'>Em teste</label>";
        echo "</div>";
        echo "<div class='col-sm-12'>";
        echo "  &nbsp;";
        echo "</div>";

        echo "<div class='col-sm-3 placeholder'>";
        echo "    <a href='inicio.php?m=rela&t=medit' class='acesso'>";
        echo "        <img src='../img/meditacao.jpg' class='img-rounded' title='Meditação' width='40' height='40'>";
        echo "        <h5>Meditação</h5>"; // style='font-weight: bold;'
        echo "        <!--<span class='text-muted'>Preencha o bônus.</span>-->";
        echo "    </a>";
        echo "</div>";
        echo "<div class='col-sm-3 placeholder'>";
        echo "    <a href='inicio.php?m=rela&t=port' class='acesso'>";
        echo "        <img src='../img/portal_blue.png' class='img-rounded' title='Prática dos Portais' width='40' height='40'>";
        echo "        <h5>Prática dos Portais</h5>";// style='font-weight: bold;'
        echo "        <!--<span class='text-muted'>Preencha o bônus.</span>-->";
        echo "    </a>";
        echo "</div>";
        echo "<div class='col-sm-3 placeholder'>";
        echo "    <a href='inicio.php?m=rela&t=para' class='acesso'>";
        echo "        <img src='../img/colaboradores.png' class='img-rounded' title='Paragem-Presença' width='40' height='40'>";
        echo "        <h5>Paragem-Presença</h5>";// style='font-weight: bold;'
        echo "        <!--<span class='text-muted'>Preencha o bônus.</span>-->";
        echo "    </a>";
        echo "</div>";
        echo "<div class='col-sm-3 placeholder'>";
        echo "    <a href='inicio.php?m=rela&t=tare' class='acesso'>";
        echo "        <img src='../img/cupomFiscal.png' class='img-rounded' title='Tarefas' width='40' height='40'>";
        echo "        <h5>Tarefas</h5>";// style='font-weight: bold;'
        echo "        <!--<span class='text-muted'>Preencha o bônus.</span>-->";
        echo "    </a>";
        echo "</div>";

        echo "<div class='col-sm-12 placeholder'>";
        echo "  &nbsp;";
        echo "</div>";

        echo "<div class='col-sm-3 placeholder'>";
        echo "    <a href='inicio.php?m=rela&t=serv' class='acesso'>";
        echo "        <img src='../img/text-icon.png' class='img-rounded' title='Serviços e Extras' width='40' height='40'>";
        echo "        <h5>Serviços e Extras</h5>";// style='font-weight: bold;'
        echo "        <!--<span class='text-muted'>Preencha o bônus.</span>-->";
        echo "    </a>";
        echo "</div>";
        echo "<div class='col-sm-3 placeholder'>";
        echo "    <a href='inicio.php?m=rela&t=usu' class='acesso'>";
        echo "        <img src='../img/groupIcon2.png' class='img-rounded' title='Serviços e Extras' width='40' height='40'>";
        echo "        <h5>Usuários - Sistema e Site</h5>";// style='font-weight: bold;'
        echo "        <!--<span class='text-muted'>Preencha o bônus.</span>-->";
        echo "    </a>";
        echo "</div>";
        echo "<div class='col-sm-3 placeholder'>";
        echo "    <a href='inicio.php?m=rela&t=ind' class='acesso'>";
        echo "        <img src='../img/estatistica5.png' class='img-rounded' title='Índice' alt='Índice' width='40' height='40'>";
        echo "        <h5>Índice</h5>";// style='font-weight: bold;'
        echo "        <!--<span class='text-muted'>Preencha o bônus.</span>-->";
        echo "    </a>";
        echo "</div>";
/*
        echo "<div class='col-sm-12 placeholder'>";
        echo "  &nbsp;";
        echo "</div>";
*/        
        echo "<div class='col-sm-12'>";
        echo "  <a href='inicio.php' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";
        
    }
    
    public function telaOpcoes($opcao){
        
        if($opcao === "relmedit"){
            $this->telaRelMeditacao();
        }else if($opcao === "relport"){
            $this->telaRelPortal();
        }else if($opcao === "relpara"){
            $this->telaRelParPres();
        }else if($opcao === "reltare"){
            $this->telaRelTarefas();
        }else if($opcao === "relserv"){
            $this->telaRelServicos();
        }else if($opcao === "relusu"){
            $this->telaRelUsuarios();
        }else if($opcao === "relind"){
            $this->telaRelIndice();
        }
        
    }


    public function camposPesquisa(){
        $conecta = new conectaBanco();
        $conecta->conecta();

        $tipoRelatorio = filter_input(INPUT_GET, 't');
        $usuario = filter_input(INPUT_GET, 'u');

        if(empty($usuario)){
            $this->setUsuarioRelatorio($this->codusuario);
        }else{
            $this->setUsuarioRelatorio($usuario);
        }

        switch($tipoRelatorio){
            case "medit":
            $sqlRel = "SELECT * 
                         FROM pp
                         WHERE codusuario = ".$this->usuarioRelatorio."
                         GROUP BY dataRuv";

            break;

            case "port":
            $sqlRel = "SELECT * 
                         FROM portal
                         WHERE codusuario = ".$this->usuarioRelatorio."
                         GROUP BY dataRuv";

            break;

            case "para":
            $sqlRel = "SELECT * 
                         FROM presparagem
                         WHERE codusuario = ".$this->usuarioRelatorio."
                         GROUP BY dataRuv";

            break;

            case "tare":
            $sqlRel = "SELECT * 
                         FROM tarefa
                         WHERE codusuario = ".$this->usuarioRelatorio."
                         GROUP BY dataRuv";

            break;

            case "serv":

            $sqlRel = "SELECT * 
                         FROM servicos
                         WHERE codusuario = ".$this->usuarioRelatorio."
                         GROUP BY dataRuv";

            break;
        }

        
//        echo $sqlRelPP;
        echo "<div align='center'>";
        echo "<div class='col-sm-3'>";
        echo "  &nbsp;";
        echo "</div>";
        echo "<div class='col-sm-6'>";
        echo "  <form name='formRelatorio' id='formRelatorio' method='post' action='inicio.php?m=rela&t=$tipoRelatorio'>";
        echo "      <table class='table'>";

        $carreira = $_SESSION['nomeTipo'];

        if($carreira === "ADMINISTRADOR" or $carreira === "ANALISTA"){

        $sqlUsuarios = "SELECT * FROM tblusuario";
        $sqlNomeUsuarioRelatorio = "SELECT * FROM tblusuario WHERE idUsuario = ".$this->usuarioRelatorio;

        echo "          <tr>";
        echo "              <td>";
        echo "                  <label>Usuário: </label>";
        echo "              </td>";
        echo "              <td>";
        echo "                  <select name='usuarioRelatorio' id='usuarioRelatorio' class='form-control' onchange='selectUser(this.value, \"$tipoRelatorio\", \"rela\")'>";

        try{

            $resultadoUsuarioSelecionado = mysql_query($sqlNomeUsuarioRelatorio) or die("Erro comando SQL Consulta usuário. Descrição: ".mysql_error());

            $dadoUsuarioSelecionado = mysql_fetch_array($resultadoUsuarioSelecionado);

        echo "                      <option value='".$dadoUsuarioSelecionado['idUsuario']."'>".$dadoUsuarioSelecionado['nomeUsuario']."</option>";
        $this->setNomeUsuarioRelatorio($dadoUsuarioSelecionado['nomeUsuario']);

        }catch(Exception $e){
            echo "Exception ativado. Descrição: ".$e->getMessage();
        }

        
        echo "                      <option value=''></option>";
        
        // RELAÇÃO DE TODOS OS USUÁRIOS
        try{
            $resultadoUsuarios = mysql_query($sqlUsuarios) or die("Erro comando SQL de usuários. Descrição: ".mysql_error());

            if(mysql_num_rows($resultadoUsuarios) > 0){
                while($dadosUsuarios = mysql_fetch_array($resultadoUsuarios)){
                    echo "<option value='".$dadosUsuarios['idUsuario']."'>".$dadosUsuarios['nomeUsuario']."</option>";
                }
            }

        }catch(Exception $ex){
            echo "Execption ativado. Descrição: ".$ex->getMessage();
        }


        echo "                  </select>";
        echo "              </td>";
        echo "          </tr>";
        }

        echo "          <tr>";
        echo "              <td width='150'>";
        echo "                  <label>Data Registro: </label>";
        echo "              </td>";
        echo "              <td>";
        echo "                  <div class='input-group'>";
        echo "                      <input type='text' id='calendario' name='calendario' class='form-control'><div class='input-group-addon'><i class='fa fa-calendar'></i></div>";
        echo "                  </div>";
        echo "              </td>";
        echo "          </tr>";
        echo "          <tr>";
        echo "              <td>";
        echo "                  <label>Data RUV: </label>";
        echo "              </td>";
        echo "              <td>";
        echo "                  <select name='se' id='se' class='form-control'>";
        echo "                      <option value=''></option>";
        echo "                      <option value='todos'>Todos</option>";
        
        try{
            $resultadoRel = mysql_query($sqlRel) or die ("Não foi possível executar o comando SQL. Descrição: ".mysql_error());
            
            while($dadosRel = mysql_fetch_array($resultadoRel)){
                echo "<option value='".$dadosRel['dataRuv']."'>".$dadosRel['dataRuv']."</option>";
            }
        } catch (Exception $ex) {
            echo "Exception ativado. Mensagem: ".$ex->getMessage();
        }
        
        echo "                  </select>";
        echo "              </td>";
        echo "          </tr>";
        echo "          <tr>";
        echo "              <td>";
        echo "                  <label>Classificar por: </label>";
        echo "              </td>";
        echo "              <td>";
        echo "                  <select name='ordem' id='ordem' class='form-control'>";
        echo "                      <option value=''>Sem classificação</option>";
        echo "                      <option value=''></option>";
//        echo "                      <option value='diaRuv'>Dia RUV</option>";
        echo "                      <option value='dataRuv'>Data RUV</option>";
        echo "                      <option value='dataRegistro'>Data Registro</option>";
        if($tipoRelatorio === "medit"){
            $link = "pp";
        echo "                      <option value='inicio'>Início</option>";
        echo "                      <option value='termino'>Término</option>";
        echo "                      <option value='nivel'>Nível</option>";
        echo "                      <option value='periodo'>Período</option>";
        echo "                      <option value='bonus'>Bônus</option>";
        }else if($tipoRelatorio === "port"){
            $link = "port";
        echo "                      <option value='sonho'>Sonho</option>";
        echo "                      <option value='corpo'>Corpo</option>";
        echo "                      <option value='retro'>Retrospectiva</option>";
        echo "                      <option value='bonus'>Bônus</option>";
        }else if($tipoRelatorio === "para"){
            $link = "para";
        echo "                      <option value='descricao'>Presença-Paragem</option>"; 
        echo "                      <option value='status'>Status</option>"; 
        echo "                      <option value='bonus'>Bônus</option>";
        }else if($tipoRelatorio === "tare"){
            $link = "taref";
        echo "                      <option value='tarefa'>Tarefa</option>";
        echo "                      <option value='status'>Status</option>"; 
        echo "                      <option value='bonus'>Bônus</option>";
        }else if($tipoRelatorio === "serv"){
            $link = "serv";
        echo "                      <option value='servico'>Serviços</option>"; 
        echo "                      <option value='opcao'>Status</option>"; 
        echo "                      <option value='outros'>Outros</option>"; 
        echo "                      <option value='bonus'>Bônus</option>";
        }
        echo "                  </select>";
        echo "              </td>";
        echo "          </tr>";
        echo "          <tr>";
        echo "              <td colspan='2'>"; 
        echo "                  <a href='inicio.php?m=rela' class='btn btn-default' style='height: 39px;' title='Voltar' alt='Voltar'>";
        echo "                      <img src='../img/btn_back.png' width='25' height='25' title='Voltar' alt='Voltar'>";
        echo "                  </a>";
        echo "                  <button class='btn btn-default' type='submit'>";
        echo "                      <img src='../img/pdf-icon.png' width='25' height='25' title='Gerar PDF' alt='Gerar PDF'>";
        echo "                  </button>";
        echo "              </td>";
        echo "          </tr>";
        echo "          <tr>";
        echo "              <td>";// colspan='2'
        echo "                  <a href='inicio.php?m=rela' title='Voltar' alt='Voltar' style='color: #000; text-decoration: none;'>";
        echo "                      <label style='width: 53px; font-size: 12px; padding-left: 8px;'>Voltar</label>";
        echo "                  </a>";
        echo "                  <a href='#' onclick='document.getElementById(\"formRelatorio\").submit()' title='Gerar PDF' alt='Gerar PDF' style='color: #000; text-decoration: none;'>";
        echo "                      <label style='font-size: 12px; padding-left: 3px;'>Gerar PDF</label>";
        echo "                  </a>";
        echo "              </td>";
        echo "              <td align='right'>"; 
        echo "                  <a href='inicio.php?m=".$link."' class='btn btn-primary' style='text-align: right;'>";
        echo "                      Registro";
        echo "                  </a>";
        echo "              </td>";
        echo "          </tr>";
        echo "          <tr>";
        echo "              <td colspan='2'>"; 
//        echo "                  <a href='inicio.php?m=".$link."' class='btn btn-primary' style='text-align: right;'>";
//        echo "                      Registro";
//        echo "                  </a>";
        echo "                  &nbsp;";
        echo "              </td>";
        echo "          </tr>";
        echo "      </table>";
        echo "  </form>";
        echo "</div>";
        echo "<div class='col-sm-3'>";
        echo "  &nbsp;";
        echo "</div>";
        echo "</div>";

    }
    public function camposPesquisaUsuarios(){
/*        $conecta = new conectaBanco();
        $conecta->conecta();

        $tipoRelatorio = filter_input(INPUT_GET, 't');
        $usuario = filter_input(INPUT_GET, 'u');


        $sqlRel = "SELECT * FROM tblusuario";*/
        
//        echo $sqlRelPP;
        echo "<div align='center'>";
        echo "<div class='col-sm-3'>";
        echo "  &nbsp;";
        echo "</div>";
        echo "<div class='col-sm-6'>";
        echo "  <form name='formRelatorio' id='formRelatorio' method='post' action='inicio.php?m=rela&t=usu'>";
        echo "      <table class='table'>";
        echo "          <tr>";
        echo "              <td width='150'>";
        echo "                  <label>Data Cadastro: </label>";
        echo "              </td>";
        echo "              <td>";
        echo "                  <div class='input-group'>";
        echo "                      <input type='text' id='calendario' name='calendario' class='form-control'><div class='input-group-addon'><i class='fa fa-calendar'></i></div>";
        echo "                  </div>";
        echo "              </td>";
        echo "          </tr>";
        echo "          <tr>";
        echo "              <td>";
        echo "                  <label>Classificar por: </label>";
        echo "              </td>";
        echo "              <td>";
        echo "                  <select name='ordem' id='ordem' class='form-control'>";
        echo "                      <option value=''>Sem classificação</option>";
        echo "                      <option value=''></option>";
        echo "                      <option value='nomeUsuario'>Nome</option>";
        echo "                      <option value='dataCadastro'>Data Cadastro</option>";
        echo "                      <option value='email'>E-mail</option>";
        echo "                      <option value='nomeTipo'>Tipo Usuário</option>";
        echo "                  </select>";
        echo "              </td>";
        echo "          </tr>";
        echo "          <tr>";
        echo "              <td colspan='2'>"; 
        echo "                  <a href='inicio.php?m=rela' class='btn btn-default' style='height: 39px;' title='Voltar' alt='Voltar'>";
        echo "                      <img src='../img/btn_back.png' width='25' height='25' title='Voltar' alt='Voltar'>";
        echo "                  </a>";
        echo "                  <button class='btn btn-default' type='submit'>";
        echo "                      <img src='../img/pdf-icon.png' width='25' height='25' title='Gerar PDF' alt='Gerar PDF'>";
        echo "                  </button>";
        echo "              </td>";
        echo "          </tr>";
        echo "          <tr>";
        echo "              <td>";// colspan='2'
        echo "                  <a href='inicio.php?m=rela' title='Voltar' alt='Voltar' style='color: #000; text-decoration: none;'>";
        echo "                      <label style='width: 53px; font-size: 12px; padding-left: 8px;'>Voltar</label>";
        echo "                  </a>";
        echo "                  <a href='#' onclick='document.getElementById(\"formRelatorio\").submit()' title='Gerar PDF' alt='Gerar PDF' style='color: #000; text-decoration: none;'>";
        echo "                      <label style='font-size: 12px; padding-left: 3px;'>Gerar PDF</label>";
        echo "                  </a>";
        echo "              </td>";
        echo "              <td align='right'>"; 
        echo "                  <a href='inicio.php?m=config&t=usu' class='btn btn-primary' style='text-align: right;'>";
        echo "                      Registro";
        echo "                  </a>";
        echo "              </td>";
        echo "          </tr>";
        echo "          <tr>";
        echo "              <td colspan='2'>"; 
//        echo "                  <a href='inicio.php?m=".$link."' class='btn btn-primary' style='text-align: right;'>";
//        echo "                      Registro";
//        echo "                  </a>";
        echo "                  &nbsp;";
        echo "              </td>";
        echo "          </tr>";
        echo "      </table>";
        echo "  </form>";
        echo "</div>";
        echo "<div class='col-sm-3'>";
        echo "  &nbsp;";
        echo "</div>";
        echo "</div>";

    }


    public function camposPesquisaIndice(){
        $conecta = new conectaBanco();
        $conecta->conecta();

        $carreira = $_SESSION['nomeTipo'];

        echo "<div align='center'>";

        echo "  <div class='col-sm-12'>";
        echo "      <label class='alert alert-danger'>Em Teste</label>";
        echo "  </div>";

        echo "<div class='col-sm-1'>";
        echo "  &nbsp;";
        echo "</div>";
        echo "<div class='col-sm-10'>";
        echo "  <form name='formRelatorio' id='formRelatorio' method='post' action='inicio.php?m=rela&t=ind'>";
        echo "      <table class='table'>";
        echo "          <tr>";
        echo "              <td width='150'>";
        echo "                  <label>Data Início: </label>";
        echo "              </td>";
        echo "              <td>";
        echo "                  <div class='input-group'>";
        echo "                      <input type='text' id='calendarioInicial' name='calendarioInicial' class='form-control'><div class='input-group-addon'><i class='fa fa-calendar'></i></div>";
        echo "                  </div>";
        echo "              </td>";
//        echo "          </tr>";
//        echo "          <tr>";
        echo "              <td width='150'>";
        echo "                  <label>Data Final: </label>";
        echo "              </td>";
        echo "              <td>";
        echo "                  <div class='input-group'>";
        echo "                      <input type='text' id='calendarioFinal' name='calendarioFinal' class='form-control'><div class='input-group-addon'><i class='fa fa-calendar'></i></div>";
        echo "                  </div>";
        echo "              </td>";
        echo "          </tr>";
        echo "          <tr>";
        echo "              <td width='150'>";
        echo "                  <label>Data RUV: </label>";
        echo "              </td>";
        echo "              <td colspan='3'>";
        echo "                  <div class='input-group'>";
        echo "                      <input type='text' id='dataRuv' name='dataRuv' onkeypress='mascaraDataRuv(this)' class='form-control'>";
        echo "                  </div>";
        echo "              </td>";
        echo "          </tr>";
        echo "          <tr>";
        echo "              <td width='150'>";
        echo "                  <label>Grupos: </label>";
        echo "              </td>";
        echo "              <td colspan='3'>";
        echo "                  <div class='input-group'>";
        echo "                  <select name='grupos' id='grupos' class='form-control'>";
        echo "                      <option value='todos'>Sem classificação</option>";
        echo "                      <option value='todos'></option>";

        $sqlGrupos = "SELECT * FROM grupos WHERE codusuario = ".$_SESSION['idusuario'];

        try{

            $resultadoGrupos = mysql_query($sqlGrupos) or die ("Erro no comando SQL de consulta dos grupos. Descrição: ".mysql_error().".<br>SQL em exercício: ".$sqlGrupos);

            if(mysql_num_rows($resultadoGrupos) > 0){

                while ($dadosGrupos = mysql_fetch_array($resultadoGrupos)){
                    echo "<option value='".$dadosGrupos['idgrupo']."'>".$dadosGrupos['nomeGrupo']."</option>";
                }


            }else{
                echo "<option value='error'>Não possui conteúdo para a consulta.</option>";
            }

        }catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }

//        echo "                      <option value='nomeTipo'>Tipo Usuário</option>";
        echo "                  </select>";
        echo "                  </div>";
        echo "              </td>";
        echo "          </tr>";
        echo "          <tr>";
        echo "              <td>";
        echo "                  <label>Classificar por: </label>";
        echo "              </td>";
        echo "              <td colspan='3'>";
        echo "                  <select name='ordem' id='ordem' class='form-control'>";
        echo "                      <option value=''>Sem classificação</option>";
        echo "                      <option value=''></option>";
        if($carreira === "ADMINISTRADOR" or $carreira === "ANALISTA"){
            echo "<option value='usuario'>Usuário</option>";
        }

        echo "                      <option value='dataInicial'>Data Inicial</option>";
        echo "                      <option value='dataFinal'>Data Final</option>";
        echo "                      <option value='dataRuv'>Data RUV</option>";
        echo "                      <option value='nomeGrupo'>Grupo</option>";
        echo "                  </select>";
        echo "              </td>";
        echo "          </tr>";
        echo "          <tr>";
        echo "              <td colspan='4'>"; 
        echo "                  <a href='inicio.php?m=rela' class='btn btn-default' style='height: 39px;' title='Voltar' alt='Voltar'>";
        echo "                      <img src='../img/btn_back.png' width='25' height='25' title='Voltar' alt='Voltar'>";
        echo "                  </a>";
        echo "                  <button class='btn btn-default' type='submit'>";
        echo "                      <img src='../img/pdf-icon.png' width='25' height='25' title='Gerar PDF' alt='Gerar PDF'>";
        echo "                  </button>";
        echo "              </td>";
        echo "          </tr>";
        echo "          <tr>";
        echo "              <td colspan='4'>";// colspan='2'
        echo "                  <a href='inicio.php?m=rela' title='Voltar' alt='Voltar' style='color: #000; text-decoration: none;'>";
        echo "                      <label style='width: 53px; font-size: 12px; padding-left: 8px;'>Voltar</label>";
        echo "                  </a>";
        echo "                  <a href='#' onclick='document.getElementById(\"formRelatorio\").submit()' title='Gerar PDF' alt='Gerar PDF' style='color: #000; text-decoration: none;'>";
        echo "                      <label style='font-size: 12px; padding-left: 3px;'>Gerar PDF</label>";
        echo "                  </a>";
        echo "              </td>";
        echo "              <td align='right'>"; 
//        echo "                  <a href='inicio.php?m=config&t=ind' class='btn btn-primary' style='text-align: right;'>";
        echo "                      &nbsp;"; //Registro
//        echo "                  </a>";
        echo "              </td>";
        echo "          </tr>";
        echo "          <tr>";
        echo "              <td colspan='4'>"; 
//        echo "                  <a href='inicio.php?m=".$link."' class='btn btn-primary' style='text-align: right;'>";
//        echo "                      Registro";
//        echo "                  </a>";
        echo "                  &nbsp;";
        echo "              </td>";
        echo "          </tr>";
        echo "      </table>";
        echo "  </form>";
        echo "</div>";
        echo "<div class='col-sm-1'>";
        echo "  &nbsp;";
        echo "</div>";
        echo "</div>";

    }


///////////////////////////////////////////////// INÍCIO DAS TELAS

    public function telaRelMeditacao(){
        
        $conecta = new conectaBanco();
        $conecta->conecta();
        
        $this->camposPesquisa();


        if($_POST){

            $dataRuvConvertida = implode("-", array_reverse(explode("/", filter_input(INPUT_POST, 'calendario'))));

            $tipo = "rel";
            $data = addslashes($dataRuvConvertida);
            $semana = addslashes(filter_input(INPUT_POST, 'se'));
            $ordem = addslashes(filter_input(INPUT_POST, 'ordem'));
            $usuarioRelatorio = addslashes(filter_input(INPUT_POST, 'usuarioRelatorio'));

            if($dataRuvConvertida === ""){
                $data = "todos";
            }
            if(empty($semana)){
                $semana = "todos";
            }

//            header("Location: ../relatorios/relatorio.php?m=rela&t=medit&o=$tipo&d=$data&se=$semana", "_blank");
            header("Location: inicio.php?m=rela&t=medit&o=$tipo&d=$data&se=$semana&ord=$ordem&u=$usuarioRelatorio");

//            echo "<meta http-equiv='refresh' content='0;url=../relatorios/relatorio.php?m=rela&t=medit&o=$tipo&d=$data&se=$semana'>";

        }

        $opcao = filter_input(INPUT_GET, 'o');
        $dia = filter_input(INPUT_GET, 'd');
        $sem = filter_input(INPUT_GET, 'se');
        $ord = filter_input(INPUT_GET, 'ord');
        $usu = filter_input(INPUT_GET, 'u');

        if($opcao === "rel"){
            //echo "Chegou à opção.";
            $this->conteudoMeditacao($dia, $sem, $this->usuarioRelatorio, $this->nomeUsuarioRelatorio, $ord, $usu);
        }

    }

    public function telaRelPortal(){

        $conecta = new conectaBanco();
        $conecta->conecta();

        $this->camposPesquisa();


        if($_POST){

            $dataRuvConvertida = implode("-", array_reverse(explode("/", filter_input(INPUT_POST, 'calendario'))));

            $tipo = "rel";
            $data = addslashes($dataRuvConvertida);
            $semana = addslashes(filter_input(INPUT_POST, 'se'));
            $ordem = addslashes(filter_input(INPUT_POST, 'ordem'));
            $usuarioRelatorio = addslashes(filter_input(INPUT_POST, 'usuarioRelatorio'));

            if(empty($dataRuvConvertida)){
                $data = "todos";
            }
            if(empty($semana)){
                $semana = "todos";
            }

            header("Location: inicio.php?m=rela&t=port&o=$tipo&d=$data&se=$semana&ord=$ordem&u=$usuarioRelatorio");

//            $this->conteudoPP($tipo, $data, $semama);
        }

        $opcao = filter_input(INPUT_GET, 'o');
        $dia = filter_input(INPUT_GET, 'd');
        $sem = filter_input(INPUT_GET, 'se');
        $ord = filter_input(INPUT_GET, 'ord');
        $usu = filter_input(INPUT_GET, 'u');

        if($opcao === "rel"){
            $this->conteudoPortal($dia, $sem, $this->usuarioRelatorio, $this->nomeUsuarioRelatorio, $ord, $usu);
        }
    }

    public function telaRelParPres(){
        $conecta = new conectaBanco();
        $conecta->conecta();

        $this->camposPesquisa();

        if($_POST){

            $dataRuvConvertida = implode("-", array_reverse(explode("/", filter_input(INPUT_POST, 'calendario'))));

            $tipo = "rel";
            $data = addslashes($dataRuvConvertida);
            $semana = addslashes(filter_input(INPUT_POST, 'se'));
            $ordem = addslashes(filter_input(INPUT_POST, 'ordem'));
            $usuarioRelatorio = addslashes(filter_input(INPUT_POST, 'usuarioRelatorio'));

            if(empty($dataRuvConvertida)){
                $data = "todos";
            }

            if(empty($semana)){
                $semana = "todos";
            }

            header("Location: inicio.php?m=rela&t=para&o=$tipo&d=$data&se=$semana&ord=$ordem&u=$usuarioRelatorio");

//            $this->conteudoPP($tipo, $data, $semama);
        }

        $opcao = filter_input(INPUT_GET, 'o');
        $dia = filter_input(INPUT_GET, 'd');
        $sem = filter_input(INPUT_GET, 'se');
        $ord = filter_input(INPUT_GET, 'ord');
        $usu = filter_input(INPUT_GET, 'u');

        if($opcao === "rel"){
            $this->conteudoParPres($dia, $sem, $this->usuarioRelatorio, $this->nomeUsuarioRelatorio, $ord, $usu);
        }
        
    }

    public function telaRelTarefas(){
        $conecta = new conectaBanco();
        $conecta->conecta();

        $this->camposPesquisa();

        if($_POST){

            $dataRuvConvertida = implode("-", array_reverse(explode("/", filter_input(INPUT_POST, 'calendario'))));

            $tipo = "rel";
            $data = addslashes($dataRuvConvertida);
            $semana = addslashes(filter_input(INPUT_POST, 'se'));
            $ordem = addslashes(filter_input(INPUT_POST, 'ordem'));
            $usuarioRelatorio = addslashes(filter_input(INPUT_POST, 'usuarioRelatorio'));

            if(empty($dataRuvConvertida)){
                $data = "todos";
            }
            if(empty($semana)){
                $semana = "todos";
            }
            if(empty($ordem)){
                $ordem = "todos";
            }

            header("Location: inicio.php?m=rela&t=tare&o=$tipo&d=$data&se=$semana&ord=$ordem&u=$usuarioRelatorio");

//            $this->conteudoPP($tipo, $data, $semama);
        }

        $opcao = filter_input(INPUT_GET, 'o');
        $dia = filter_input(INPUT_GET, 'd');
        $sem = filter_input(INPUT_GET, 'se');
        $ord = filter_input(INPUT_GET, 'ord');
        $usu = filter_input(INPUT_GET, 'U');

        if($opcao === "rel"){
            $this->conteudoTarefa($dia, $sem, $this->usuarioRelatorio, $this->nomeUsuarioRelatorio, $ord, $usu);
        }
        
    }


    public function telaRelServicos(){
        $conecta = new conectaBanco();
        $conecta->conecta();

//        $tipo = filter_input(INPUT_GET, 'tipo');

        $this->camposPesquisa();

        if($_POST){

            $dataRuvConvertida = implode("-", array_reverse(explode("/", filter_input(INPUT_POST, 'calendario'))));

            $tipo = "rel";
            $data = addslashes($dataRuvConvertida);
            $semana = addslashes(filter_input(INPUT_POST, 'se'));
            $ordem = addslashes(filter_input(INPUT_POST, 'ordem'));
            $usuarioRelatorio = addslashes(filter_input(INPUT_POST, 'usuarioRelatorio'));

            if(empty($dataRuvConvertida)){
                $data = "todos";
            }
            if(empty($semana)){
                $semana = "todos";
            }
            if(empty($ordem)){
                $ordem = "todos";
            }

            header("Location: inicio.php?m=rela&t=serv&o=$tipo&d=$data&se=$semana&ord=$ordem&u=$usuarioRelatorio");
        }

        $opcao = filter_input(INPUT_GET, 'o');
        $dia = filter_input(INPUT_GET, 'd');
        $sem = filter_input(INPUT_GET, 'se');
        $ord = filter_input(INPUT_GET, 'ord');
        $usu = filter_input(INPUT_GET, 'u');

        if($opcao === "rel"){
            $this->conteudoServicos($dia, $sem, $this->usuarioRelatorio, $this->nomeUsuarioRelatorio, $ord, $usu);
        }
        
    }
    public function telaRelUsuarios(){
        $conecta = new conectaBanco();
        $conecta->conecta();

//        $tipo = filter_input(INPUT_GET, 'tipo');

        $this->camposPesquisaUsuarios();

        if($_POST){

            $dataCadastroConvertida = implode("-", array_reverse(explode("/", filter_input(INPUT_POST, 'calendario'))));

            $tipo = "rel";
            $data = addslashes($dataCadastroConvertida);
            $ordem = addslashes(filter_input(INPUT_POST, 'ordem'));
            $usuarioRelatorio = $_SESSION['usuario'];

            if(empty($dataCadastroConvertida)){
                $data = "todos";
            }

            if(empty($ordem)){
                $ordem = "todos";
            }

            header("Location: inicio.php?m=rela&t=usu&o=$tipo&d=$data&ord=$ordem&u=$usuarioRelatorio");
        }

        $opcao = filter_input(INPUT_GET, 'o');
        $d = filter_input(INPUT_GET, 'd');
        $ord = filter_input(INPUT_GET, 'ord');
        $usu = filter_input(INPUT_GET, 'u');

        if($opcao === "rel"){
            $this->conteudoUsuario($d, $usu, $ord);
        }
        
    }

    public function telaRelIndice(){
        $conecta = new conectaBanco();
        $conecta->conecta();

//        $tipo = filter_input(INPUT_GET, 'tipo');

        $this->camposPesquisaIndice();

        if($_POST){

            $dataInicialConvertida = implode("-", array_reverse(explode("/", filter_input(INPUT_POST, 'calendarioInicial'))));
            $dataFinalConvertida = implode("-", array_reverse(explode("/", filter_input(INPUT_POST, 'calendarioFinal'))));
            $dataRUV = filter_input(INPUT_POST, 'dataRuv');

            $tipo = "&o=rel";
            $dataInicial = addslashes($dataInicialConvertida);
            $dataFinal = addslashes($dataFinalConvertida);
            $dataRuv = addslashes($dataRUV);
            $grupo = addslashes(filter_input(INPUT_POST, 'grupo'));
            $ordem = addslashes(filter_input(INPUT_POST, 'ordem'));
            $usuarioRelatorio = "&u=".$_SESSION['usuario'];

            if(!empty($dataInicialConvertida)){
                $dataInicial = "&di=".$dataInicial;
            }else{
                $dataInicial = "";
            }
            if(!empty($dataFinalConvertida)){
                $dataFinal = "&df=".$dataFinal;
            }else{
                $dataFinal = "";
            }
            if(!empty($dataRUV)){
                $dataRUV = "&dr=".$dataRUV;
            }else{
                $dataRUV = "";
            }

            if(empty($grupo)){
                $grupo = "todos";
            }

            if(empty($ordem)){
                $ordem = "todos";
            }

            header("Location: inicio.php?m=rela&t=ind".$tipo.$dataInicial.$dataFinal.$dataRUV."&ord=$ordem&g=$grupo".$usuarioRelatorio);
        }

        $opcao = filter_input(INPUT_GET, 'o');
        $di = filter_input(INPUT_GET, 'di');
        $df = filter_input(INPUT_GET, 'df');
        $dr = filter_input(INPUT_GET, 'dr');
        $gru = filter_input(INPUT_GET, 'g');
        $ord = filter_input(INPUT_GET, 'ord');
        $usu = filter_input(INPUT_GET, 'u');

        if($opcao === "rel"){
            $this->conteudoIndice($di, $df, $dr, $gru, $usu, $ord);
        }
        

    }

//////////////////////////////////////////////// FIM DAS TELAS


//////////////////////////////////////////////// INÍCIO DOS CONTEÚDOS


    public function conteudoMeditacao($data, $semana, $codusuario, $usuario, $ordem){

        $conecta = new conectaBanco();
        $conecta->conecta();

        $onde = null;

        $content = ob_get_clean();
        $content = utf8_encode($content);

        $sqlConsultaMeditacao = "   SELECT *, DATE_FORMAT(dataRegistro, '%d/%m/%Y') AS dataRegistroFormat 
                                    FROM pp 
                                    WHERE codusuario = ".$codusuario;

        $sqlTotalMeditacao = "SELECT SUM(bonus) AS totalBonusMeditacao FROM pp WHERE codusuario = ".$codusuario;
        
        if($semana === "todos"){
            $sqlSemana = "";
            $onde = "";
        }else{
            if(!empty($data)){
                $sqlSemana = " AND dataRuv = '".$semana."'";
            }else{
                $sqlSemana = " dataRuv = '".$semana."'";
            }
        }


        if($data === "todos"){
            $sqlData = "";
        }else{
            if(!empty($semana)){
                $sqlData = " AND dataRegistro = '".$data."'";
            }else{
                $sqlData = " dataRegistro = '".$data."'";
            }
        }

        if($ordem === ""){
            $sqlOrdem = "";
        }else{
            $sqlOrdem = " ORDER BY ".$ordem;
        }

        switch ($ordem) {
            case 'dataRuv':
                    $nomeOrdem = "Data RUV";
                break;
            case 'dataRegistro':
                    $nomeOrdem = "Data Registro";
                break;
            case 'sonho':
                    $nomeOrdem = "Sonho";
                break;
            case 'corpo':
                    $nomeOrdem = "Corpo";
                break;
            case 'retro':
                    $nomeOrdem = "Retrospectiva";
                break;
            case 'bonus':
                    $nomeOrdem = "Bônus";
                break;
            case 'todos':
                    $nomeOrdem = "Sem ordem";
                break;
            case '':
                    $nomeOrdem = "Sem ordem";
                break;
        }

                
        $sqlConsultaMeditacao = $sqlConsultaMeditacao.$sqlSemana.$sqlData.$sqlOrdem;
        $sqlTotalMeditacao = $sqlTotalMeditacao.$sqlSemana.$sqlData;

        //echo "SQL: ".$sqlConsultaMeditacao."<br>";

        $content = $this->cabecalho("medit");

        try{
            $resultPesqMed = mysql_query($sqlConsultaMeditacao) or die ("Há um erro no comando SQL (Meditação). Erro: ".mysql_error());
            $resultTotalPesqMed = mysql_query($sqlTotalMeditacao) or die ("Há um erro no comando SQL (Total Meditação). Erro: ".mysql_error());
            
            $content.="<hr style='background-color: #BFE0F1;' size='2' noshade='noshade'>";
            $content.="<table class='table'>";
            
            $content.="        <tr>
                        <td colspan='9'>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td colspan='4'>
                            <p style='font-size: 15px; font-weight: bold; text-align: justify;'>Usuário: ".$usuario."</p>
                        </td>
                        <td colspan='5'>
                            <p style='font-size: 15px; font-weight: bold; text-align: justify;'>Ordenado por: ".$nomeOrdem."</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='9'>
                            &nbsp;
                        </td>
                    </tr>";
            //MEDITAÇÃO
            if(mysql_num_rows($resultPesqMed) > 0){

                $dadosTotalMed = mysql_fetch_array($resultTotalPesqMed);
                $content.=  
                "
                    <tr>
                        <td colspan='9'>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Dia</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Data RUV</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Data Registro</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Início</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Término</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Duração</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Bônus</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Período</p>
                        </td>
                        <td>
                            <p style='font-size: 15px;'>&nbsp;</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='9'>
                            &nbsp;
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
                                    <p style='font-size: 15px;'>".$dadosPesquisa['dataRuv']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['dataRegistroFormat']."</p>
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
                                <p style='font-size: 15px; text-align: center; color: #3a44a8; height: 30px; font-weight: bold;'>Total Bônus: 
                                ".$dadosTotalMed['totalBonusMeditacao']."</p>
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
                                <p style='font-size: 15px;'> Não foi possível localizar a meditação para os campos selecionados.</p>       
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
            
            $this->relatorio($content, "Meditacao");


            
        }catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }

    }


    public function conteudoPortal($data, $semana, $codusuario, $usuario, $ordem){
        $conecta = new conectaBanco();
        $conecta->conecta();

        $onde = null;

        $content = ob_get_clean();
        $content = utf8_encode($content);

        $sqlConsultaPortal = "   SELECT *, DATE_FORMAT(dataRegistro, '%d/%m/%Y') AS dataRegistroFormat
                                    FROM portal 
                                    WHERE codusuario = ".$codusuario;

        $sqlTotalPortal = "SELECT SUM(bonus) AS totalBonusPortal FROM portal WHERE codusuario = ".$codusuario;
        
        if($semana === "todos"){
            $sqlSemana = "";
            $onde = "";
        }else{
            if(!empty($data)){
                $sqlSemana = " AND semana = '".$semana."'";
            }else{
                $sqlSemana = " semana = '".$semana."'";
            }
        }


        if($data === "todos"){
            $sqlData = "";
        }else{
            if(!empty($semana)){
                $sqlData = " AND dataRuv = '".$data."'";
            }else{
                $sqlData = " dataRuv = '".$data."'";
            }
        }

        if($ordem === ""){
            $sqlOrdem = "";
        }else{
            $sqlOrdem = " ORDER BY ".$ordem;

        }

        switch ($ordem) {
            case 'dataRuv':
                    $nomeOrdem = "Data RUV";
                break;
            case 'dataRegistro':
                    $nomeOrdem = "Data Registro";
                break;
            case 'sonho':
                    $nomeOrdem = "Sonho";
                break;
            case 'corpo':
                    $nomeOrdem = "Corpo";
                break;
            case 'retro':
                    $nomeOrdem = "Retrospectiva";
                break;
            case 'bonus':
                    $nomeOrdem = "Bônus";
                break;
            case 'todos':
                    $nomeOrdem = "Sem ordem";
                break;
            case '':
                    $nomeOrdem = "Sem ordem";
                break;
        }
                
        $sqlConsultaPortal = $sqlConsultaPortal.$sqlSemana.$sqlData.$sqlOrdem;
        $sqlTotalPortal = $sqlTotalPortal.$sqlSemana.$sqlData;

        //echo "SQL: ".$sqlConsultaPortal."<br>";
        //echo "SQL Total: ".$sqlTotalPortal."<br>";

        $content = $this->cabecalho("port");

        try{
            $resultPesqPortal = mysql_query($sqlConsultaPortal) or die ("Há um erro no comando SQL (Portal). Erro: ".mysql_error());
            $resultTotalPesqPortal = mysql_query($sqlTotalPortal) or die ("Há um erro no comando SQL (Total Portal). Erro: ".mysql_error());
            
            $content.="<hr style='background-color: #BFE0F1;' size='2' noshade='noshade'>";
            $content.="<table class='table'>";
            $content.= " 
                    <tr>
                        <td colspan='9'>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td colspan='4'>
                            <p style='font-size: 15px; font-weight: bold; text-align: justify;'>Usuário: ".$usuario."</p>
                        </td>
                        <td colspan='5'>
                            <p style='font-size: 15px; font-weight: bold; text-align: justify;'>Ordenado por : ".$nomeOrdem."</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='9'>
                            &nbsp;
                        </td>
                    </tr>
            ";


            if(mysql_num_rows($resultPesqPortal) > 0){

                $dadosTotalPortal = mysql_fetch_array($resultTotalPesqPortal);
                $content.=  
                "
                    <tr>
                        <td colspan='9'>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Data RUV</p>
                        </td>
                        <td style='width: 90px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Data Registro</p>
                        </td>
                        <td style='width: 60px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Sonho</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Completação</p>
                        </td>
                        <td style='width: 180px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Corpo</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Retrospectiva</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Completação</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Bônus</p>
                        </td>
                        <td>
                            <p style='font-size: 15px;'>&nbsp;</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='9'>
                            &nbsp;
                        </td>
                    </tr>

                ";
                    while($dadosPesquisa = mysql_fetch_array($resultPesqPortal)){
                        $content.="
                            <tr>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['dataRuv']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['dataRegistroFormat']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['sonho']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['compSonho']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['corpo']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['retro']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['compRetro']."</p>
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
                            <td colspan='9' style='height: 30px;'>
                                &nbsp;
                            </td>
                        </tr>
                        <tr style='background-color: #dee0fc;'>
                            <td colspan='9'>
                                <p style='font-size: 15px; text-align: center; color: #3a44a8; height: 30px; font-weight: bold;'>Total Bônus: 
                                ".$dadosTotalPortal['totalBonusPortal']."</p>
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
                                <p style='font-size: 15px;'> Não foi possível localizar a prática dos portais para os campos selecionados.</p>       
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
            $this->relatorio($content, "Portal");
            
        }catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }

    }


    public function conteudoParPres($data, $semana, $cod_usuario, $nome_usuario, $ordem){
        $conecta = new conectaBanco();
        $conecta->conecta();

        $onde = null;

        $content = ob_get_clean();
        $content = utf8_encode($content);

        $sqlConsultaPresParagem = "  SELECT *, DATE_FORMAT(p.dataRegistro, '%d/%m/%Y') AS dataRegistroFormat, t.descricao AS nomePresenca
                                FROM presparagem p
                                INNER JOIN tabpresparagem t ON p.pp = t.idtabpresparagem
                                WHERE p.codUsuario = ".$cod_usuario;

        $sqlTotalPresParagem = "SELECT SUM(p.bonus) AS totalBonusPresParagem FROM presparagem p WHERE p.codUsuario = ".$cod_usuario;
        
        if($semana === "todos"){
            $sqlSemana = "";
            $onde = "";
        }else{
            if(!empty($data)){
                $sqlSemana = " AND p.dataRuv = '".$semana."'"; // ESTÁ APARECENDO
            }else{
                $sqlSemana = " p.sdataRuv = '".$semana."'";
            }
        }


        if($data === "todos"){
            $sqlData = "";
        }else{
            if(!empty($semana)){
                $sqlData = " AND p.dataRegistro = '".$data."'";
            }else{
                $sqlData = " p.dataRegistro = '".$data."'";
            }
        }
                
        if($ordem === ""){
            $sqlOrdem = "";
        }else{
            if($ordem === "descricao"){
                $sqlOrdem = " ORDER BY t.".$ordem;
            }else{
                $sqlOrdem = " ORDER BY p.".$ordem;
            }

        }

        switch ($ordem) {
            case 'dataRuv':
                    $nomeOrdem = "Data RUV";
                break;
            case 'dataRegistro':
                    $nomeOrdem = "Data Registro";
                break;
            case 'descricao':
                    $nomeOrdem = "Presença-Paragem";
                break;
            case 'status':
                    $nomeOrdem = "Status";
                break;
            case 'bonus':
                    $nomeOrdem = "Bônus";
                break;
            case 'todos':
                    $nomeOrdem = "Sem ordem";
                break;
            case '':
                    $nomeOrdem = "Sem ordem";
                break;
            
        }
        $sqlConsultaPresParagem = $sqlConsultaPresParagem.$sqlSemana.$sqlData.$sqlOrdem;
        $sqlTotalPresParagem = $sqlTotalPresParagem.$sqlSemana.$sqlData;

        //echo "SQL: ".$sqlConsultaPresParagem."<br>";
        //echo "SQL: ".$sqlTotalPresParagem."<br>";

        $content = $this->cabecalho("para");

        $content.="<hr style='background-color: #BFE0F1;' size='2' noshade='noshade'>";

        $content .= "
                <table>
                    <tr>
                        <td width='270'>
                            <p style='font-size: 15px; font-weight: bold; text-align: justify;'>Usuário: ".$nome_usuario."</p>
                        </td>
                        <td>
                            <p style='font-size: 15px; font-weight: bold; text-align: justify;'>Ordenado por : ".$nomeOrdem."</p>
                        </td>
                    </tr>
                </table>
        ";
        //echo "SQL: ".$sqlConsultaTarefa."<br>";

        try{
            $resultPesqPresParagem = mysql_query($sqlConsultaPresParagem) or die ("Há um erro no comando SQL (Presença - Paragem). Erro: ".mysql_error());
            $resultTotalPesqPresParagem = mysql_query($sqlTotalPresParagem) or die ("Há um erro no comando SQL (Total Presença - Paragem). Erro: ".mysql_error());

            $content.="<table class='table'>";
            
            if(mysql_num_rows($resultPesqPresParagem) > 0){

                $dadosTotalPresParagem = mysql_fetch_array($resultTotalPesqPresParagem);
                $content.=  
                "
                    <tr>
                        <td colspan='6'>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td colspan='6'>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td colspan='6'>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Data RUV</p>
                        </td>
                        <td style='width: 110px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Data Registro</p>
                        </td>
                        <td style='width: 350px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Presença-Paragem</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Status</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Bônus</p>
                        </td>
                        <td>
                            <p style='font-size: 15px;'>&nbsp;</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='6'>
                            &nbsp;
                        </td>
                    </tr>

                ";
                    while($dadosPesquisa = mysql_fetch_array($resultPesqPresParagem)){
                        $content.="
                            <tr>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['dataRuv']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['dataRegistroFormat']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['nomePresenca']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['status']."</p>
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
                                ".$dadosTotalPresParagem['totalBonusPresParagem']."</p>
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
                                <p style='font-size: 15px;'> Não foi possível localizar as tarefas para os campos selecionados.</p>       
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
            $this->relatorio($content, "PresencaParagem");
            
        }catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }

    }
    

    public function conteudoTarefa($data, $semana, $cod_usuario, $nome_usuario, $ordem){
        $conecta = new conectaBanco();
        $conecta->conecta();

        $onde = null;

        $content = ob_get_clean();
        $content = utf8_encode($content);

        $sqlConsultaTarefa = "  SELECT *, DATE_FORMAT(t.dataRegistro, '%d/%m/%Y') AS dataRegistroFormatada
                                FROM tarefa t
                                INNER JOIN tarefasistema ts ON t.codTarefa = ts.idtarefasistema  
                                WHERE codusuario = ".$cod_usuario;

        $sqlTotalTarefa = "SELECT SUM(bonus) AS totalBonusTarefa FROM tarefa WHERE codusuario = ".$cod_usuario;
        
        if($semana === "todos"){
            $sqlSemana = "";
            $onde = "";
        }else{
            if(!empty($data)){
                $sqlSemana = " AND dataRuv = '".$semana."'";
            }else{
                $sqlSemana = " dataRuv = '".$semana."'";
            }
        }


        if($data === "todos"){
            $sqlData = "";
        }else{
            if(!empty($semana)){
                $sqlData = " AND dataRegistro = '".$data."'";
            }else{
                $sqlData = " dataRegistro = '".$data."'";
            }
        }
                
        if($ordem === "" or $ordem === "todos"){
            $sqlOrdem = "";
        }else{
            if($ordem === "tarefa"){
                $sqlOrdem = " ORDER BY ts.".$ordem;
            }else{
                $sqlOrdem = " ORDER BY t.".$ordem;
            }

        }

        switch ($ordem) {
            case 'dataRuv':
                    $nomeOrdem = "Data RUV";
                break;
            case 'dataRegistro':
                    $nomeOrdem = "Data Registro";
                break;
            case 'descricao':
                    $nomeOrdem = "Tarefa";
                break;
            case 'status':
                    $nomeOrdem = "Status";
                break;
            case 'bonus':
                    $nomeOrdem = "Bônus";
                break;
            case 'todos':
                    $nomeOrdem = "Sem ordem";
                break;
            case '':
                    $nomeOrdem = "Sem ordem";
                break;
            
        }

        $sqlConsultaTarefa = $sqlConsultaTarefa.$sqlSemana.$sqlData.$sqlOrdem;
        $sqlTotalTarefa = $sqlTotalTarefa.$sqlSemana.$sqlData;

        //echo "SQL: ".$sqlConsultaTarefa."<br>";

        $content = $this->cabecalho("tare");

        $content.="<hr style='background-color: #BFE0F1;' size='2' noshade='noshade'>";

        $content .= "
                <table>
                    <tr>
                        <td width='270'>
                            <p style='font-size: 15px; font-weight: bold; text-align: justify;'>Usuário: ".$nome_usuario."</p>
                        </td>
                        <td>
                            <p style='font-size: 15px; font-weight: bold; text-align: justify;'>Ordenado por : ".$nomeOrdem."</p>
                        </td>
                    </tr>
                </table>
        ";
        //echo "SQL: ".$sqlConsultaTarefa."<br>";

        try{
            $resultPesqTarefa = mysql_query($sqlConsultaTarefa) or die ("Há um erro no comando SQL (Tarefas). Erro: ".mysql_error());
            $resultTotalPesqMTarefa = mysql_query($sqlTotalTarefa) or die ("Há um erro no comando SQL (Total Tarefas). Erro: ".mysql_error());

            $content.="<table class='table'>";
            
            //MEDITAÇÃO
            if(mysql_num_rows($resultPesqTarefa) > 0){

                $dadosTotalTarefa = mysql_fetch_array($resultTotalPesqMTarefa);
                $content.=  
                "
                    <tr>
                        <td colspan='6'>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td colspan='6'>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td colspan='6'>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Data RUV</p>
                        </td>
                        <td style='width: 110px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Data Registro</p>
                        </td>
                        <td style='width: 350px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Tarefa</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Status</p>
                        </td>
                        <td style='width: 100px;'>
                            <p style='font-size: 15px; text-align: center; font-weight: bold;'>Bônus</p>
                        </td>
                        <td>
                            <p style='font-size: 15px;'>&nbsp;</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='6'>
                            &nbsp;
                        </td>
                    </tr>

                ";
                    while($dadosPesquisa = mysql_fetch_array($resultPesqTarefa)){
                        $content.="
                            <tr>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['dataRuv']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['dataRegistroFormatada']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['tarefa']."</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>".$dadosPesquisa['status']."</p>
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
                                ".$dadosTotalTarefa['totalBonusTarefa']."</p>
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
                                <p style='font-size: 15px;'> Não foi possível localizar as tarefas para os campos selecionados.</p>       
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
            $this->relatorio($content, "Tarefas");
            
        }catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }

    }
    

    public function conteudoServicos($data, $semana, $codusuario, $usuario, $ordem){

        $conecta = new conectaBanco();
        $conecta->conecta();

        $onde = null;

        $content = ob_get_clean();
        $content = utf8_encode($content);

        $sqlConsultaServicos = "SELECT * , DATE_FORMAT(dataRegistro, '%d/%m/%Y') AS dataRegistroFormat
                                FROM servicos 
                                WHERE codusuario = ".$codusuario;


        $sqlTotalServicos = "SELECT 
                            (SELECT SUM(bonus) FROM servicos WHERE codusuario = ".$codusuario." AND servico = 'Focalização') AS totalBonusFocalizacao, 
                            (SELECT SUM(bonus) FROM servicos WHERE codusuario = ".$codusuario." AND servico = 'Presença') AS totalBonusPresenca 
                            FROM servicos WHERE codusuario = ".$codusuario;
        // Total de Bônus

        //echo $opcaoServ;

        $content = $this->cabecalho("serv");

        if($semana === "todos"){
            $sqlSemana = "";
            $onde = "";
        }else{
            if(!empty($data)){
                $sqlSemana = " AND dataRuv = '".$semana."'";
            }else{
                $sqlSemana = " dataRuv = '".$semana."'";
            }
        }


        if($data === "todos"){
            $sqlData = "";
        }else{
            if(!empty($semana)){
                $sqlData = " AND dataRegistro = '".$data."'";
            }else{
                $sqlData = " dataRegistro = '".$data."'";
            }
        }

        if($ordem === "" or $ordem === "todos"){
            $sqlOrdem = "";
        }else{
            $sqlOrdem = " ORDER BY ".$ordem;

        }

        switch ($ordem) {
            case 'dataRuv':
                    $nomeOrdem = "Data RUV";
                break;
            case 'dataRegistro':
                    $nomeOrdem = "Data Registro";
                break;
            case 'servico':
                    $nomeOrdem = "Serviços";
                break;
            case 'opcao':
                    $nomeOrdem = "Status";
                break;
            case 'outros':
                    $nomeOrdem = "Outros";
                break;
            case 'bonus':
                    $nomeOrdem = "Bônus";
                break;
            case 'todos':
                    $nomeOrdem = "Sem ordem";
                break;
            case '':
                    $nomeOrdem = "Sem ordem";
                break;
            
        }

                $sqlConsultaServicos = $sqlConsultaServicos.$sqlSemana.$sqlData.$sqlOrdem; // Consulta Focalização com parâmetros


                try{
                    $resultServico = mysql_query($sqlConsultaServicos) or die ("Há um erro no comando SQL (Serviços e Extras - Consulta). Erro: ".mysql_error());
                    $resultTotalServico = mysql_query($sqlTotalServicos) or die ("Há um erro no comando SQL (Total Serviços e Extras). Erro: ".mysql_error());
                    
                    $content.="<hr style='background-color: #BFE0F1;' size='2' noshade='noshade'>";
                    $content.="<table class='table'>";
                    
                    $content.=" 

                            <tr>
                                <td colspan='7'>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td colspan='4'>
                                    <p style='font-size: 15px; font-weight: bold; text-align: justify;'>Usuário: ".$usuario."</p>
                                </td>
                                <td colspan='3'>
                                    <p style='font-size: 15px; font-weight: bold; text-align: justify;'>Ordenado por : ".$nomeOrdem."</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='7'>
                                    &nbsp;
                                </td>
                            </tr>

                    ";

                    if(mysql_num_rows($resultServico) > 0){

                        $dadosTotal = mysql_fetch_array($resultTotalServico);
                        $content.=  
                        "
                            <tr>
                                <td colspan='7'>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td style='width: 100px;'>
                                    <p style='font-size: 15px; text-align: center; font-weight: bold;'>Data RUV</p>
                                </td>
                                <td style='width: 130px;'>
                                    <p style='font-size: 15px; text-align: center; font-weight: bold;'>Data Registro</p>
                                </td>
                                <td style='width: 100px;'>
                                    <p style='font-size: 15px; text-align: center; font-weight: bold;'>Serviço</p>
                                </td>
                                <td style='width: 100px;'>
                                    <p style='font-size: 15px; text-align: center; font-weight: bold;'>Status</p>
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
                            while($dadosPesquisa = mysql_fetch_array($resultServico)){
                                $content.="
                                    <tr>
                                        <td>
                                            <p style='font-size: 15px;'>".$dadosPesquisa['dataRuv']."</p>
                                        </td>
                                        <td>
                                            <p style='font-size: 15px;'>".$dadosPesquisa['dataRegistroFormat']."</p>
                                        </td>
                                        <td>
                                            <p style='font-size: 15px;'>".$dadosPesquisa['servico']."</p>
                                        </td>
                                        <td>
                                            <p style='font-size: 15px;'>".$dadosPesquisa['opcao']."</p>
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
                            } // fim while

                            if($dadosTotal['totalBonusFocalizacao'] === null){
                                $totalFocalizacao = 0;
                            }else{
                                $totalFocalizacao = $dadosTotal['totalBonusFocalizacao'];
                            }
                            if($dadosTotal['totalBonusPresenca'] === null){
                                $totalPresenca = 0;
                            }else{
                                $totalPresenca = $dadosTotal['totalBonusPresenca'];
                            }

                            $content.=" 
                                <tr>
                                    <td colspan='7' style='height: 30px;'>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr style='background-color: #dee0fc;'>
                                    <td colspan='4'>
                                        <p style='font-size: 15px; text-align: center; color: #3a44a8; height: 30px; font-weight: bold;'>Total Bônus Focalização: 
                                        ".$totalFocalizacao."</p>
                                    </td>
                                    <td colspan='3'>
                                        <p style='font-size: 15px; text-align: center; color: #3a44a8; height: 30px; font-weight: bold;'>Total Bônus Presença: 
                                        ".$totalPresenca."</p>
                                    </td>
                                </tr>
                            ";
                        }else{
                            //echo mysql_num_rows($resultPesqMed); //
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
                    $this->relatorio($content, "Servicos");
                    
                }catch(Exception $ex){
                    echo "Exception ativado. Descrição: ".$ex->getMessage();
                } // fim try / catch
            }


    public function conteudoUsuario($data, $usuario, $ordem){

        $conecta = new conectaBanco();
        $conecta->conecta();

        $content = ob_get_clean();
        $content = utf8_encode($content);

        $sqlConsultaUsuarios = "SELECT * , DATE_FORMAT(dataCadastro, '%d/%m/%Y') AS dataCadastroFormat
                                FROM tblusuario t
                                INNER JOIN tipousuario tp ON t.codTipo = tp.idTipo";


        $sqlTotalUsuarios = "SELECT COUNT(idUsuario) AS totalUsuarios FROM tblusuario";
        // Total de Bônus

        //echo $opcaoServ;

        $content = $this->cabecalho("usu");

        if($data === "todos" or $data === ""){
            $sqlData = "";
        }else{

            $sqlData = " WHERE dataCadastro = '".$data."'";
        }


        if($ordem === "" or $ordem === "todos"){
            $sqlOrdem = "";
        }else{
            $sqlOrdem = " ORDER BY ".$ordem;

        }

        switch ($ordem) {
            case 'email':
                    $nomeOrdem = "E-mail";
                break;
            case 'dataCadastro':
                    $nomeOrdem = "Data Cadastro";
                break;
            case 'nomeUsuario':
                    $nomeOrdem = "Nome";
                break;
            case 'nomeTipo':
                    $nomeOrdem = "Tipo de Acesso";
                break;
            case 'todos':
                    $nomeOrdem = "Sem ordem";
                break;
            case '':
                    $nomeOrdem = "Sem ordem";
                break;
            
        }

                $sqlConsultaUsuarios = $sqlConsultaUsuarios.$sqlData.$sqlOrdem; // Consulta Focalização com parâmetros
                $sqlTotalUsuarios = $sqlTotalUsuarios.$sqlData;

                try{
                    $resultUsuarios = mysql_query($sqlConsultaUsuarios) or die ("Há um erro no comando SQL (Usuários - Consulta). Erro: ".mysql_error());
                    $resultTotalUsuarios = mysql_query($sqlTotalUsuarios) or die ("Há um erro no comando SQL (Total Usuários). Erro: ".mysql_error());
                    
                    $content.="<hr style='background-color: #BFE0F1;' size='2' noshade='noshade'>";
                    $content.="<table class='table'>";
                    
                    $content.=" 

                            <tr>
                                <td colspan='7'>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td colspan='2'>
                                    <p style='font-size: 15px; font-weight: bold; text-align: justify;'>Usuário: ".$usuario."</p>
                                </td>
                                <td colspan='3'>
                                    <p style='font-size: 15px; font-weight: bold; text-align: justify;'>Ordenado por : ".$nomeOrdem."</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='7'>
                                    &nbsp;
                                </td>
                            </tr>

                    ";

                    if(mysql_num_rows($resultUsuarios) > 0){

                        $dadosTotal = mysql_fetch_array($resultTotalUsuarios);
                        $content.=  
                        "
                            <tr>
                                <td colspan='5'>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td style='width: 150px;'>
                                    <p style='font-size: 15px; text-align: center; font-weight: bold;'>Nome</p>
                                </td>
                                <td style='width: 200px;'>
                                    <p style='font-size: 15px; text-align: center; font-weight: bold;'>E-mail</p>
                                </td>
                                <td style='width: 180px;'>
                                    <p style='font-size: 15px; text-align: center; font-weight: bold;'>Data Cadastro</p>
                                </td>
                                <td style='width: 150px;'>
                                    <p style='font-size: 15px; text-align: center; font-weight: bold;'>Tipo de Acesso</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='5'>
                                    &nbsp;
                                </td>
                            </tr>

                        ";
                            while($dadosPesquisa = mysql_fetch_array($resultUsuarios)){
                                $content.="
                                    <tr>
                                        <td>
                                            <p style='font-size: 15px;'>".$dadosPesquisa['nomeUsuario']."</p>
                                        </td>
                                        <td>
                                            <p style='font-size: 15px;'>".$dadosPesquisa['email']."</p>
                                        </td>
                                        <td>
                                            <p style='font-size: 15px;'>".$dadosPesquisa['dataCadastroFormat']."</p>
                                        </td>
                                        <td>
                                            <p style='font-size: 15px;'>".$dadosPesquisa['nomeTipo']."</p>
                                        </td>
                                        <td>
                                            <p style='font-size: 15px;'>&nbsp;</p>
                                        </td>
                                    </tr>
                                        ";
                            } // fim while

                            if($dadosTotal['totalUsuarios'] === null){
                                $totalUsuarios = 0;
                            }else{
                                $totalUsuarios = $dadosTotal['totalUsuarios'];
                            }

                            $content.=" 
                                <tr>
                                    <td colspan='7' style='height: 30px;'>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr style='background-color: #dee0fc;'>
                                    <td colspan='7'>
                                        <p style='font-size: 15px; text-align: center; color: #3a44a8; height: 30px; font-weight: bold;'>Total de Usuários: 
                                        ".$totalUsuarios."</p>
                                    </td>
                                </tr>
                            ";
                        }else{
                            //echo mysql_num_rows($resultPesqMed); //
                                $content.=" 
                                <tr>
                                    <td colspan='7' style='height: 30px;'>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>        
                                    <td colspan='7'>        
                                        <p style='font-size: 15px;'> Não foi possível localizar o(s) usuário(s) para os campos selecionados.</p>       
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
                    $this->relatorio($content, "Usuários");
                    
                }catch(Exception $ex){
                    echo "Exception ativado. Descrição: ".$ex->getMessage();
                } // fim try / catch
            }

    public function conteudoIndice($dataInicial, $dataFinal, $dataRuv, $grupo, $usuarioRelatorio, $ordem){

        $conecta = new conectaBanco();
        $conecta->conecta();

        $content = ob_get_clean();
        $content = utf8_encode($content);

        $sqlConsultaIndice = "SELECT * 
                              FROM tblusuario t
                              INNER JOIN tipousuario tp ON t.codTipo = tp.idTipo 
                              LEFT JOIN grupos g ON g.codusuario = t.idUsuario
                              WHERE t.idUsuario = ".$usuarioRelatorio;


        $sqlTotais = "SELECT COUNT(idUsuario) AS totalUsuarios FROM tblusuario";
        // Total de Bônus

        //echo $opcaoServ;

        $content = $this->cabecalho("ind");

        if($data === "todos" or $data === ""){
            $sqlData = "";
        }else{

            $sqlData = " WHERE dataCadastro = '".$data."'";
        }


        if($ordem === "" or $ordem === "todos"){
            $sqlOrdem = "";
        }else{
            $sqlOrdem = " ORDER BY ".$ordem;

        }

        switch ($ordem) {
            case 'email':
                    $nomeOrdem = "E-mail";
                break;
            case 'dataCadastro':
                    $nomeOrdem = "Data Cadastro";
                break;
            case 'nomeUsuario':
                    $nomeOrdem = "Nome";
                break;
            case 'nomeTipo':
                    $nomeOrdem = "Tipo de Acesso";
                break;
            case 'todos':
                    $nomeOrdem = "Sem ordem";
                break;
            case '':
                    $nomeOrdem = "Sem ordem";
                break;
            
        }

                $sqlConsultaUsuarios = $sqlConsultaUsuarios.$sqlData.$sqlOrdem; // Consulta Focalização com parâmetros
                $sqlTotalUsuarios = $sqlTotalUsuarios.$sqlData;

                try{
                    $resultUsuarios = mysql_query($sqlConsultaUsuarios) or die ("Há um erro no comando SQL (Usuários - Consulta). Erro: ".mysql_error());
                    $resultTotalUsuarios = mysql_query($sqlTotalUsuarios) or die ("Há um erro no comando SQL (Total Usuários). Erro: ".mysql_error());
                    
                    $content.="<hr style='background-color: #BFE0F1;' size='2' noshade='noshade'>";
                    $content.="<table class='table'>";
                    
                    $content.=" 

                            <tr>
                                <td colspan='7'>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td colspan='2'>
                                    <p style='font-size: 15px; font-weight: bold; text-align: justify;'>Usuário: ".$usuario."</p>
                                </td>
                                <td colspan='3'>
                                    <p style='font-size: 15px; font-weight: bold; text-align: justify;'>Ordenado por : ".$nomeOrdem."</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='7'>
                                    &nbsp;
                                </td>
                            </tr>

                    ";

                    if(mysql_num_rows($resultUsuarios) > 0){

                        $dadosTotal = mysql_fetch_array($resultTotalUsuarios);
                        $content.=  
                        "
                            <tr>
                                <td colspan='5'>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td style='width: 150px;'>
                                    <p style='font-size: 15px; text-align: center; font-weight: bold;'>Nome</p>
                                </td>
                                <td style='width: 200px;'>
                                    <p style='font-size: 15px; text-align: center; font-weight: bold;'>E-mail</p>
                                </td>
                                <td style='width: 180px;'>
                                    <p style='font-size: 15px; text-align: center; font-weight: bold;'>Data Cadastro</p>
                                </td>
                                <td style='width: 150px;'>
                                    <p style='font-size: 15px; text-align: center; font-weight: bold;'>Tipo de Acesso</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='5'>
                                    &nbsp;
                                </td>
                            </tr>

                        ";
                            while($dadosPesquisa = mysql_fetch_array($resultUsuarios)){
                                $content.="
                                    <tr>
                                        <td>
                                            <p style='font-size: 15px;'>".$dadosPesquisa['nomeUsuario']."</p>
                                        </td>
                                        <td>
                                            <p style='font-size: 15px;'>".$dadosPesquisa['email']."</p>
                                        </td>
                                        <td>
                                            <p style='font-size: 15px;'>".$dadosPesquisa['dataCadastroFormat']."</p>
                                        </td>
                                        <td>
                                            <p style='font-size: 15px;'>".$dadosPesquisa['nomeTipo']."</p>
                                        </td>
                                        <td>
                                            <p style='font-size: 15px;'>&nbsp;</p>
                                        </td>
                                    </tr>
                                        ";
                            } // fim while

                            if($dadosTotal['totalUsuarios'] === null){
                                $totalUsuarios = 0;
                            }else{
                                $totalUsuarios = $dadosTotal['totalUsuarios'];
                            }

                            $content.=" 
                                <tr>
                                    <td colspan='7' style='height: 30px;'>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr style='background-color: #dee0fc;'>
                                    <td colspan='7'>
                                        <p style='font-size: 15px; text-align: center; color: #3a44a8; height: 30px; font-weight: bold;'>Total de Usuários: 
                                        ".$totalUsuarios."</p>
                                    </td>
                                </tr>
                            ";
                        }else{
                            //echo mysql_num_rows($resultPesqMed); //
                                $content.=" 
                                <tr>
                                    <td colspan='7' style='height: 30px;'>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>        
                                    <td colspan='7'>        
                                        <p style='font-size: 15px;'> Não foi possível localizar o(s) usuário(s) para os campos selecionados.</p>       
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
                    $this->relatorio($content, "Usuários");
                    
                }catch(Exception $ex){
                    echo "Exception ativado. Descrição: ".$ex->getMessage();
                } // fim try / catch

    }


}// Fecha classe
