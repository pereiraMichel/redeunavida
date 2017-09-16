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
    private $nomeGrupo;
    private $usuarioRelatorio;
    private $nomeUsuarioRelatorio;

    function setNomeGrupo($nomeGrupo){
        $this->nomeGrupo = $nomeGrupo;
    }

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

    public function relatorio($rel, $nome_relatorio, $qtdeFolhas = 0){
//        $estilo = "../../css/estilo.css";
//        $style = file_get_contents($estilo);

        $mpdf = new mPDF('pt','A4',3,'',8,8,5,14,9,9,'P');
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetFooter($this->rodape());

//        if($qtdeFolhas > 1){
//        for($i = 0; $i < $qtdeFolhas; $i++){
        $mpdf->WriteHTML($rel);
//            $mpdf->AddPage();
//            $rel.="<div style='page-break-after:always'></div>";
//            $mpdf->WriteHTML($rel);
//            $mpdf->AddPage();
//        }else{
//            $mpdf->WriteHTML($rel);
//        }
        //$mpdf->AddPage();
//        echo "Quantidade de folhas: ".$qtdeFolhas."<br>";
        $mpdf->Output("relatorio".$nome_relatorio.".pdf","D"); //DEPOIS DO TESTE, PASSAR PARA D - DOWNLOAD OU ABRIR
                                            // O I CORRESPONDE À ABERTURA NO BROWSER
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
        $r = date('d/m/Y H:i:s')."| SISRUV - Sistema RedeUnaViva";
        $r.= "<div style='page-break-after:always'></div>";

        return $r;
//        return date('d/m/Y H:i:s')."| SISRUV - Sistema RedeUnaViva";
    }


///////////////////////////////////////////////////////// FIM DAS CONFIGURAÇÕES



        
    public function telaRelatorios(){
        //echo "<meta http-equiv='refresh' content='5;url=inicio.php?m=rela'>";
/*
        echo "<div class='col-sm-12'>";
        echo "  <label class='alert alert-danger'>Em teste</label>";
        echo "</div>";
        echo "<div class='col-sm-12'>";
        echo "  &nbsp;";
        echo "</div>";
*/
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

        if($carreira === "ADMINISTRADOR" or $carreira === "ANALISTA"){
            $autoriza = true;

        }else{
            $autoriza = false;
        }

        $usuarioSelecionado = filter_input(INPUT_GET, 'us');
        $grupoSelecionado = filter_input(INPUT_GET, 'gs');
        $semanaSelecionada = filter_input(INPUT_GET, 'ss');

        $ano_selecionado = filter_input(INPUT_GET, 'a');
        $estacao_selecionado = filter_input(INPUT_GET, 'e');
        $mes_selecionado = filter_input(INPUT_GET, 'mes');
        $semana_selecionada = filter_input(INPUT_GET, 's');
        $tempo = filter_input(INPUT_GET, 'tempo');

        if(!empty($usuarioSelecionado)){
            echo "<style> #aguarda { display: none; } </style>";
            echo "<style> #carregando { display: none; } </style>";
            echo "<style> #user { display: block; } </style>";
            echo "<style> #select_grupos { display: none; } </style>";
            echo "<style> #select_semanas { display: none; } </style>";
            echo "<style> #select_semana { display: none; } </style>";
            echo "<style> #btLimpar { display: none; } </style>";
        }else if (!empty($grupoSelecionado)){
            echo "<style> #carregando { display: none; } </style>";
            echo "<style> #aguarda { display: none; } </style>";
            echo "<style> #user { display: none; } </style>";
            echo "<style> #select_grupos { display: block; } </style>";
            echo "<style> #select_semanas { display: none; } </style>";
            echo "<style> #select_semana { display: none; } </style>";
            echo "<style> #btLimpar { display: none; } </style>";
        }else if (!empty($semanaSelecionada)){
            echo "<style> #carregando { display: none; } </style>";
            echo "<style> #aguarda { display: none; } </style>";
            echo "<style> #select_semanas { display: block; } </style>";
            echo "<style> #user { display: none; } </style>";
            echo "<style> #select_grupos { display: none; } </style>";
            echo "<style> #select_semana { display: block; } </style>";
            echo "<style> #btLimpar { display: none; } </style>";
        }else if (!empty($ano_selecionado) or !empty($estacao_selecionado) or !empty($mes_selecionado) or !empty($semana_selecionada)){
            echo "<style> #carregando { display: none; } </style>";
            echo "<style> #aguarda { display: none; } </style>";
            echo "<style> #select_semanas { display: block; } </style>";
            echo "<style> #user { display: none; } </style>";
            echo "<style> #select_grupos { display: none; } </style>";
            echo "<style> #select_semana { display: block; } </style>";
            echo "<style> #btLimpar { display: block; } </style>";

        }else if (!empty($tempo)){
            echo "<style> #carregando { display: none; } </style>";
            echo "<style> #aguarda { display: none; } </style>";
            echo "<style> #select_semanas { display: block; } </style>";
            echo "<style> #user { display: none; } </style>";
            echo "<style> #select_grupos { display: none; } </style>";
            echo "<style> #select_semana { display: block; } </style>";
            echo "<style> #btLimpar { display: none; } </style>";
        }else{
            echo "<style> #carregando { display: block; } </style>";
            echo "<style> #aguarda { display: block; } </style>";
            echo "<style> #user { display: none; } </style>";
            echo "<style> #select_grupos { display: none; } </style>";
            echo "<style> #select_semanas { display: none; } </style>";
            echo "<style> #select_semana { display: none; } </style>";
            echo "<style> #btLimpar { display: none; } </style>";
        }

        echo "<div align='center'>";

        echo "  <div class='col-sm-12'>";
        echo "      <label class='alert alert-danger'>Em Teste</label>";
        echo "  </div>";

        echo "<div class='col-sm-1'>";
        echo "  &nbsp;";
        echo "</div>";
        echo "<div class='col-sm-10'>";
        echo "  <form name='formRelatorio' id='formRelatorio' method='post' action='#'>";
//inicio.php?m=rela&t=ind

        if($autoriza){
            $metodoJS = " onchange='preencheTipoRelAuto()' ";
        }else{
            $metodoJS = " onchange='preencheTipoRel()' ";
        }

        echo "      <table class='table'>";

        echo "          <tr>";
        echo "              <td>";
        echo "                  <label>Busca por:</label>";
        echo "              </td>";
        echo "              <td colspan='3'>";
        echo "                  <div class='btn-group' data-toggle='buttons'>";
        echo "                  <label class='btn btn-default'>";
        echo "                      <input type='radio' name='relatorio' id='usuario' autocomplete='off' $metodoJS> Usuário";
        echo "                  </label>";
        echo "                      <label class='btn btn-default'>";
        echo "                          <input type='radio' name='relatorio' id='semanaruv' autocomplete='off' $metodoJS onclick='direcionaPagina()'> Tempo"; // onclick='direcionaPagina()'
        echo "                       </label>";
        echo "                       <label class='btn btn-default'>";
        echo "                          <input type='radio' name='relatorio' id='grupos' autocomplete='off' $metodoJS> Grupos";
        echo "                       </label>";
        echo "                  </div>";
        echo "              </td>";
        echo "          </tr>";
/*
        echo "          <tr>";
        echo "              <td colspan='4'>";
        echo "                  &nbsp;";
        echo "              </td>";
        echo "          </tr>"; id='select' style='display:none;'
        */

        echo "          <tr>";
//        echo "              <td>";
//        echo "                  &nbsp;";
//        echo "              </td>";
        echo "              <td colspan='4'>";
//        TELA DE SELEÇÃO DOS CAMPOS DE PESQUISA
        echo "                  <div align='center'>";
        echo "                  <table>";
        echo "                      <tr>";
        echo "                          <td width='40'>";
        echo "                              <img src='../img/carregaRuv.gif' width='30' height='29' id='carregando'>";
        echo "                          </td>";
        echo "                          <td>";
        echo "                              <label id='aguarda' style='font-size: 12px; font-weight: normal;'>Aguardando seleção...</label>";
        echo "                          </td>";
        echo "                      </tr>";
        echo "                  </table>";
        echo "                  </div>";
//        }
        echo "                      <select id='user' name='user' class='form-control' style='width: 200px;' onchange='direcionaUsuario(this.value)'>";
        echo "                          <option value=''>Usuário</option>";
        echo "                          <option value=''></option>";
        if(!$autoriza){
            $sqlUser = " WHERE idUsuario = ".$_SESSION['idusuario'];
        }else{
        echo "                          <option value='todos'>Todos</option>";
            $sqlUser = "";
        }

                $sqlUsuarioSelecionado = "SELECT idUsuario, nomeUsuario FROM tblusuario ".$sqlUser." GROUP BY nomeUsuario";

            try{

                $resultadoUsuarioSelecionado = mysql_query($sqlUsuarioSelecionado) or die ("Comando SQL inváido. Erro: ".mysql_error().". <br>SQL usado: ".$sqlUsuarioSelecionado."<br>");
                
                while($dadosUsuarioSelecionado = mysql_fetch_array($resultadoUsuarioSelecionado)){

                    echo "<option value='".$dadosUsuarioSelecionado['idUsuario']."'>".$dadosUsuarioSelecionado['nomeUsuario']."</option>";
                }

            }catch(Exception $ex){
                echo "Exeption ativado. Descrição: ".$ex->getMessage();
            }

        echo "                      </select>";

        echo "                  <div align='justify' id='select_semana'>";// style='display: none;'
        echo "                  <table class='table'>";
        echo "                      <tr>";
        echo "                          <td>";
        echo "                              <select name='select_ano' class='form-control' onchange='direcionaLink(\"".$_SERVER['REQUEST_URI']."\" , \"ano\", this.value)'>";
        echo "                                  <option value=''>Ano</option>";
        echo "                                  <option value=''></option>";
        echo "                                  <option value='6'>6</option>";
        echo "                                  <option value='7'>7</option>";
//        echo "                                  <option value='8'>8</option>";
        echo "                              </select>";
        echo "                          </td>";
        echo "                          <td width='10' style='text-align: center; font-weight: bold; font-size: 12px;'>";
        echo "                              -";
        echo "                          </td>";
        echo "                          <td>";
        echo "                              <select name='select_estacao' class='form-control' onchange='direcionaLink(\"".$_SERVER['REQUEST_URI']."\" , \"estacao\", this.value)'>";
        echo "                                  <option value=''>Estação</option>";
        echo "                                  <option value=''></option>";
        echo "                                  <option value='1'>Primavera</option>";
        echo "                                  <option value='2'>Verão</option>";
        echo "                                  <option value='3'>Outono</option>";
        echo "                                  <option value='4'>Inverno</option>";
        echo "                              </select>";
        echo "                          </td>";
        echo "                          <td>";
        echo "                              <select name='select_mes' class='form-control' onchange='direcionaLink(\"".$_SERVER['REQUEST_URI']."\" , \"mes\", this.value)'>";
        echo "                                  <option value=''>Mês</option>";
        echo "                                  <option value=''></option>";
        echo "                                  <option value='1'>1</option>";
        echo "                                  <option value='2'>2</option>";
        echo "                                  <option value='3'>3</option>";
        echo "                              </select>";
        echo "                          </td>";
        echo "                          <td>";
        echo "                              <select name='select_semanaRuv' class='form-control' onchange='direcionaLink(\"".$_SERVER['REQUEST_URI']."\" , \"semana\", this.value)'>";
        echo "                                  <option value=''>Semana</option>";
        echo "                                  <option value=''></option>";
        echo "                                  <option value='1'>1</option>";
        echo "                                  <option value='2'>2</option>";
        echo "                                  <option value='3'>3</option>";
        echo "                                  <option value='4'>4</option>";
        echo "                              </select>";
        echo "                          </td>";
        echo "                      </tr>";

        if(!$tempo === "1"){ // INICIA A CONTAGEM DE TEMPO - AMP-ESTACAO|MES|SEMANA


        echo "                      <tr>";
        echo "                          <td colspan='4' style='text-align: right;'>";
        echo "                              &nbsp;";
        echo "                          </td>";
        echo "                          <td style='text-align: right;'>";

        if($ano_selecionado){

        echo "                              <input type='hidden' value='".$ano_selecionado." - X X X' class='form-control col-sm-3' id='campo_semana'>";

        }else if($estacao_selecionado){

        echo "                              <input type='hidden' value='X - ".$estacao_selecionado." X X' class='form-control col-sm-3' id='campo_semana'>";

        }else if($mes_selecionado){

        echo "                              <input type='hidden' value='X - X ".$mes_selecionado." X' class='form-control col-sm-3' id='campo_semana'>";

        }else if($semana_selecionada){

        echo "                              <input type='hidden' value='X - X X ".$semana_selecionada."' class='form-control col-sm-3' id='campo_semana'>";

        }else{
    
        echo "                              &nbsp;";

        }

        echo "                          </td>";
        echo "                      </tr>";
        }

        echo "                  </table>";
        echo "                  </div>";

/*

        echo "                      <select name='select_semanas' id='select_semanas' class='form-control' style='width: 200px;' onchange='direcionaSemana(this.value)'>";
        echo "                          <option value=''>Semana RUV</option>";
        echo "                          <option value=''></option>";
        echo "                          <option value='todos'>Todas</option>";

        if(!$autoriza){
            $sqlCodUsuario = " AND codusuario = ".$_SESSION['idusuario'];
        }else{
            $sqlCodUsuario = "";
        }


        $sqlSemanas = " 
                        SELECT semana FROM pp WHERE bonus IS NOT NULL ".$sqlCodUsuario." GROUP BY semana
                        UNION
                        SELECT semana FROM portal WHERE bonus IS NOT NULL ".$sqlCodUsuario." GROUP BY semana
                        UNION
                        select semanaRuv AS semana FROM presparagem WHERE bonus IS NOT NULL ".$sqlCodUsuario." GROUP BY semanaRuv
                        UNION
                        select semanaRuv AS semana FROM tarefa WHERE bonus IS NOT NULL ".$sqlCodUsuario." GROUP BY semanaRuv
                        UNION
                        SELECT semanaRuv AS semana FROM servicos WHERE bonus IS NOT NULL ".$sqlCodUsuario." GROUP BY semanaRuv
                        ORDER BY semana;
";

        try{

            $resultadoSemanas = mysql_query($sqlSemanas) or die("Erro no comando SQL de semanas. Descrição: ".mysql_error().". SQL em execução: ".$sqlSemanas."<br>");

            if(mysql_num_rows($resultadoSemanas) > 0){
                while($dadosSemanas = mysql_fetch_array($resultadoSemanas)){
                    echo "<option value='".$dadosSemanas['semana']."'>".$dadosSemanas['semana']."</option>";
                }
            }

        }catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }

        echo "                      </select>";

*/


// após selecionar, abrirá a tela abaixo na consulta de grupos
        echo "                  <select name='grupos' id='select_grupos' class='form-control' style='width: 200px;' onchange='direcionaGrupo(this.value)'>";// onchange='selectGrupo(this)'
        echo "                          <option value=''>Grupos</option>";
        echo "                          <option value=''></option>";

        if($autoriza){
        echo "                          <option value='todos'>Todos</option>";
            $sqlGruposAutoriza = "";
        }else{
            $sqlGruposAutoriza = " WHERE codusuario = ".$_SESSION['idusuario'];
        }

        $sqlGrupos = "SELECT idgrupos, nomeGrupo FROM grupos ".$sqlGruposAutoriza." GROUP BY nomeGrupo";

        try{

            $resultadoGrupos = mysql_query($sqlGrupos) or die ("Erro no comando SQL de consulta dos grupos. Descrição: ".mysql_error().".<br>SQL em exercício: ".$sqlGrupos);

            if(mysql_num_rows($resultadoGrupos) > 1){

                while ($dadosGrupos = mysql_fetch_array($resultadoGrupos)){
                    echo "<option value='".$dadosGrupos['idgrupos']."'>".$dadosGrupos['nomeGrupo']."</option>";
                }

                echo "                  </select>";
            }else if(mysql_num_rows($resultadoGrupos) === 1){
                $dadosGruposUnico = mysql_fetch_array($resultadoGrupos);
                    echo "<option value='".$dadosGruposUnico['idgrupos']."'>".$dadosGruposUnico['nomeGrupo']."</option>";
                echo "                  </select>";
            }else{
                echo "<label style='font-weight: normal; font-size: 10px;'>Não possui conteúdo para a consulta.</label>";
            }

        }catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }
        echo "              </td>";
        echo "          </tr>";

// COMEÇA A APARECER AS BUSCAS ATRAVÉS DAS SELEÇÕES ACIMA

        if($usuarioSelecionado){ // BUSCA DE USUÁRIOS

            if($usuarioSelecionado === "todos"){
                $codUsuarioSelecionado = "";
                $codBuscaGrupoUsuarioSelecionado = "";
                $codBuscaUsuarioSelecionado = "";
                $marcaChecked = " checked='checked'";
            }else{
                $codUsuarioSelecionado = "AND codusuario = ".$usuarioSelecionado;
                $codBuscaGrupoUsuarioSelecionado = "WHERE codusuario = ".$usuarioSelecionado;
                $codBuscaUsuarioSelecionado = "WHERE idUsuario = ".$usuarioSelecionado;
                $marcaChecked = "";
                $marcaChecked = " checked='checked'";
            }

            $sqlBuscaSemana = "

                SELECT semana FROM pp WHERE bonus IS NOT NULL ".$codUsuarioSelecionado." GROUP BY semana
                UNION
                SELECT semana FROM portal WHERE bonus IS NOT NULL ".$codUsuarioSelecionado." GROUP BY semana
                UNION
                select semanaRuv AS semana FROM presparagem WHERE bonus IS NOT NULL ".$codUsuarioSelecionado." GROUP BY semanaRuv
                UNION
                select semanaRuv AS semana FROM tarefa WHERE bonus IS NOT NULL ".$codUsuarioSelecionado." GROUP BY semanaRuv
                UNION
                SELECT semanaRuv AS semana FROM servicos WHERE bonus IS NOT NULL ".$codUsuarioSelecionado." GROUP BY semanaRuv;

            "; // RELAÇÃO DE SEMANAS RUV

            $sqlBuscaGrupos = "SELECT idgrupos, nomeGrupo FROM grupos ".$codBuscaGrupoUsuarioSelecionado." GROUP BY nomeGrupo"; // RELAÇÃO DE GRUPOS
            $sqlBuscaUsuario = "SELECT idUsuario, nomeUsuario FROM tblusuario ".$codBuscaUsuarioSelecionado." GROUP BY nomeUsuario"; // RELAÇÃO DE USUÁRIOS, A SABER DO NOME.
        echo "          <tr>";

            try{

                $resultadoBuscaUsuario = mysql_query($sqlBuscaUsuario) or die ("Erro no comando SQL de busca de semana. Descrição: ".mysql_error().". SQL: ".$sqlBuscaUsuario);
                $resultadoBuscaSemana = mysql_query($sqlBuscaSemana) or die ("Erro no comando SQL de busca de semana. Descrição: ".mysql_error().". SQL: ".$sqlBuscaSemana);
                $qtdBuscaSemana = mysql_num_rows($resultadoBuscaSemana);

                $resultadoBuscaGrupos = mysql_query($sqlBuscaGrupos) or die ("Erro no comando SQL de busca de grupos. Descrição: ".mysql_error().". SQL: ".$sqlBuscaGrupos);
                $qtdBuscaGrupos = mysql_num_rows($resultadoBuscaGrupos);

                $qtdBuscaUsuarios = mysql_num_rows($resultadoBuscaUsuario);


        echo "              <td>";
        echo "                  <div class='checkbox'>";
                if($qtdBuscaUsuarios === 1){
                    $dadosUsuario = mysql_fetch_array($resultadoBuscaUsuario);
        echo "                  <input type='checkbox' value='".$dadosUsuario['idUsuario']."' name='lista_user[]' $marcaChecked> ";
        echo "                      <label style='font-weight: normal;'>
                                        ".$dadosUsuario['nomeUsuario']."
                                    </label>
                                    <br>";
//        echo "                  <input type='checkbox' value='".$dadosUsuario['idUsuario']."' name='lista_user[]' $marcaChecked> <label style='font-weight: normal;'>".$dadosUsuario['nomeUsuario']."</label><br>";
                }else if($qtdBuscaUsuarios > 1){
                    while($dadosUsuario = mysql_fetch_array($resultadoBuscaUsuario)){
                        echo "  <input type='checkbox' value='".$dadosUsuario['idUsuario']."' name='lista_user[]' $marcaChecked > <label style='font-weight: normal;'>".$dadosUsuario['nomeUsuario']."</label><br>";

                    }
                }
        echo "                  </div>";

        echo "              </td>";
        echo "              <td>";
        echo "                  <div class='checkbox'>";
                if($qtdBuscaSemana === 1){
                    $dadosBuscaSemana = mysql_fetch_array($resultadoBuscaSemana);
                    echo " <label style='font-weight: normal;'>".$dadosBuscaSemana['semana']."</label>";
//                    echo " <input type='checkbox' value='".$dadosBuscaSemana['semana']."' $marcaChecked name='lista_semana[]'> <label style='font-weight: normal;'>".$dadosBuscaSemana['semana']."</label>";
                }else if($qtdBuscaSemana > 1){

                    while($dadosBuscaSemana = mysql_fetch_array($resultadoBuscaSemana)){
                        echo " <label style='font-weight: normal;'>".$dadosBuscaSemana['semana']."</label><br>";
//                        echo "  <input type='checkbox' value='".$dadosBuscaSemana['semana']."' name='lista_semana[]' $marcaChecked> <label style='font-weight: normal;'>".$dadosBuscaSemana['semana']."</label><br>";

                    }
                }
        echo "                  </div>";

        echo "              </td>";
        echo "              <td>";
        echo "                  <div class='checkbox'>";
                if($qtdBuscaGrupos === 1){
                    $dadosBuscaGrupos = mysql_fetch_array($resultadoBuscaGrupos);
                    echo "<label style='font-weight: normal;'>".$dadosBuscaGrupos['nomeGrupo']."</label><br>";
//                    echo "<input type='checkbox' value='".$dadosBuscaGrupos['idgrupos']."' name='lista_grupos[]' $marcaChecked> <label style='font-weight: normal;'>".$dadosBuscaGrupos['nomeGrupo']."</label><br>";

                }else if($qtdBuscaGrupos > 1){
                    while($dadosBuscaGrupos = mysql_fetch_array($resultadoBuscaGrupos)){
                        echo "<label style='font-weight: normal;'>".$dadosBuscaGrupos['nomeGrupo']."</label><br>";
                    }
                }else{
                    echo "<label style='font-weight: normal;'>Não foi localizado o grupo para este usuário</label>";
                }
        echo "                  </div>";
        echo "              </td>";
            }catch(Exeption $ex){
                echo "Error. Descrição: ".$ex->getMessage();
            }


        echo "          </tr>";
// FECHA USUÁRIO
// INICIA GRUPO
        }else if($grupoSelecionado){

            if($grupoSelecionado === "todos"){
                $sqlgrupo = "";
                $buscaGrupo = "";
            }else{
                $sqlgrupo = " WHERE idgrupos = ".$grupoSelecionado;
                $buscaGrupo = " AND g.idgrupos = ".$grupoSelecionado;
            }

            //checkbox = $_post['meucheckbox'] ? 'Marcado (true)' : 'Desmarcado (false)';

            $sqlBuscaUsuario = "SELECT t.idUsuario, t.nomeUsuario FROM tblusuario t 
                                LEFT JOIN grupos g ON t.idUsuario = g.codusuario"
                                .$sqlgrupo." 
                                GROUP BY nomeUsuario";

            if($grupoSelecionado === "todos"){
                $sqlgrupo = "";
            }else{
                $sqlgrupo = " WHERE idgrupos = ".$grupoSelecionado;
            }

            $sqlBuscaSemana = "
                SELECT p.semana FROM pp p
                LEFT JOIN grupos g ON p.codusuario = g.codusuario
                LEFT JOIN tblusuario t ON t.idUsuario = g.codusuario
                WHERE p.bonus IS NOT NULL ".$buscaGrupo." GROUP BY p.semana
                UNION
                SELECT por.semana FROM portal por
                LEFT JOIN grupos g ON por.codusuario = g.codusuario
                LEFT JOIN tblusuario t ON t.idUsuario = g.codusuario
                WHERE por.bonus IS NOT NULL ".$buscaGrupo." GROUP BY por.semana
                UNION
                SELECT prp.semanaRuv FROM presparagem prp
                LEFT JOIN grupos g ON prp.codusuario = g.codusuario
                LEFT JOIN tblusuario t ON t.idUsuario = g.codusuario
                WHERE prp.bonus IS NOT NULL ".$buscaGrupo." GROUP BY prp.semanaRuv
                UNION
                SELECT tar.semanaRuv FROM tarefa tar
                LEFT JOIN grupos g ON tar.codusuario = g.codusuario
                LEFT JOIN tblusuario t ON t.idUsuario = g.codusuario
                WHERE tar.bonus IS NOT NULL ".$buscaGrupo." GROUP BY tar.semanaRuv
                UNION
                SELECT serv.semanaRuv FROM servicos serv
                LEFT JOIN grupos g ON serv.codusuario = g.codusuario
                LEFT JOIN tblusuario t ON t.idUsuario = g.codusuario
                WHERE serv.bonus IS NOT NULL ".$buscaGrupo." GROUP BY serv.semanaRuv
            ";

            $sqlBuscaGrupos = "SELECT idgrupos, nomeGrupo FROM grupos ".$sqlgrupo." GROUP BY nomeGrupo";

            $resultadoBuscaGrupos = mysql_query($sqlBuscaGrupos) or die("Erro no comando SQL. Descrição: ".$sqlBuscaGrupos);

//            $dadosGrupoSelecionado = mysql_fetch_array($resultadoBuscaGrupos);
/*
            if($grupoSelecionado === "todos"){
                $nomeGrupo = "Todos";
            }else{
                $nomeGrupo = $dadosGrupo['nomeGrupo'];
            }
            */
//
/*        echo "          <tr>";
        echo "              <td colspan='4'>";
        echo "                  <label style='font-weight: normal; font-size: 14px;'>Grupo selecionado: <b></b></label>";
        echo "              </td>";
        echo "          </tr>";
*/
        echo "          <tr>";
        echo "              <td colspan='2'>";
        //echo "Grupo: ".$grupoSelecionado;
            try{

        echo "  <div class='checkbox'>";
        while ($dadosGrupo = mysql_fetch_array($resultadoBuscaGrupos)){
        echo "      <input type='checkbox' value='".$dadosGrupo['idgrupos']."' name='lista_grupos[]' checked='checked'> ".$dadosGrupo['nomeGrupo']."<br>";

        }
        echo "  </div>";
        echo "              </td>";
        echo "              <td>";

                $resultadoBuscaSemana = mysql_query($sqlBuscaSemana) or die ("Erro no comando SQL de busca de semana. Descrição: ".mysql_error().". SQL: ".$sqlBuscaSemana);
                $qtdBuscaSemana = mysql_num_rows($resultadoBuscaSemana);
        echo "  <div class='checkbox'>";
                if($qtdBuscaSemana === 1){
                    $dadosBuscaSemana = mysql_fetch_array($resultadoBuscaSemana);
        echo "      <label style='font-weight: normal; font-size: 14px;'> ".$dadosBuscaSemana['semana']."</label>";
//        echo "      <input type='checkbox' value='".$dadosBuscaSemana['semana']."' name='lista_semana[]'> ".$dadosBuscaSemana['semana'];
        echo "  </div>";
                }else if($qtdBuscaSemana > 1){
                    while($dadosBuscaSemana = mysql_fetch_array($resultadoBuscaSemana)){
        echo "      <label style='font-weight: normal; font-size: 14px;'> ".$dadosBuscaSemana['semana']."</label><br>";

//                        echo "  <input type='checkbox' value='".$dadosBuscaSemana['semana']."' name='lista_semana[]'> ".$dadosBuscaSemana['semana']."<br>";
                    }
        echo "  </div>";
                }else{
                    echo "<label style='font-weight: normal;'>Não foi localizado a semana para este usuário</label>";
                }
        echo "              </td>";
        echo "              <td>";

                $resultadoBuscaUsuario = mysql_query($sqlBuscaUsuario) or die ("Erro no comando SQL de busca de usuário. Descrição: ".mysql_error().". SQL: ".$sqlBuscaUsuario);
                $qtdBuscaUsuarios = mysql_num_rows($resultadoBuscaUsuario);

        echo "  <div class='checkbox'>";
                if($qtdBuscaUsuarios === 1){
                    $dadosBuscaUsuario = mysql_fetch_array($resultadoBuscaUsuario);
        echo "  <label style='font-weight: normal; font-size: 14px;'> ".$dadosBuscaUsuario['nomeUsuario']."</label>";
//        echo "  <input type='checkbox' value='".$dadosBuscaUsuario['idUsuario']."' name='lista_user[]'> ".$dadosBuscaUsuario['nomeUsuario'];
        echo "  </div>";
                }else if($qtdBuscaUsuarios > 1){
                    while($dadosBuscaUsuario = mysql_fetch_array($resultadoBuscaUsuario)){
        echo "  <label style='font-weight: normal; font-size: 14px;'> ".$dadosBuscaUsuario['nomeUsuario']."</label><br>";
//                        echo "  <input type='checkbox' value='".$dadosBuscaUsuario['idUsuario']."' name='lista_user[]'> ".$dadosBuscaUsuario['nomeUsuario']."<br>";
                    }
        echo "  </div>";
                }else{
                    echo "<label style='font-weight: normal; font-size: 10px;'>Não foi localizado a semana para este usuário</label>";
                }
        echo "              </td>";
            }catch(Exeption $ex){
                echo "Error. Descrição: ".$ex->getMessage();
            }


        echo "          </tr>";
//FECHA GRUPO
//INICIA SEMANA

        }else if($semanaSelecionada){

            if($semanaSelecionada === "todos"){

                if($autoriza){ // administrador
                    $sqlComplementaSemana = "
                    GROUP BY t.nomeUsuario
                    ";
                    $restricao = "";
                }else{
                    $sqlComplementaSemana = "
                    WHERE
                    t.idUsuario = ".$_SESSION['idusuario']." 
                    GROUP BY t.nomeUsuario
                    ";
                    $restricao = "AND codusuario = ".$_SESSION['idusuario'];
                }

                $codSemanaSelecionada = "";
                $codSemanaRuvSelecionada = "";

                $codUsuarioSelecionado = "";

            }else{
                if($autoriza){
                    $sqlComplementaSemana = " 
                    WHERE 
                        p.semana = '".$semanaSelecionada."' OR
                        por.semana = '".$semanaSelecionada."' OR
                        prp.semanaRuv = '".$semanaSe8lecionada."' OR
                        tar.semanaRuv = '".$semanaSelecionada."' OR
                        serv.semanaRuv = '".$semanaSelecionada."'
                    GROUP BY t.nomeUsuario
                    ";
                    $restricao = "";
                }else{
                    $sqlComplementaSemana = " 
                    WHERE 
                        t.idUsuario = ".$_SESSION['idusuario']." AND 
                        p.semana = '".$semanaSelecionada."' OR
                        por.semana = '".$semanaSelecionada."' OR
                        prp.semanaRuv = '".$semanaSe8lecionada."' OR
                        tar.semanaRuv = '".$semanaSelecionada."' OR
                        serv.semanaRuv = '".$semanaSelecionada."'
                    GROUP BY t.nomeUsuario
                    ";
                    $restricao = "AND codusuario = ".$_SESSION['idusuario'];
                }

                $codSemanaSelecionada = " AND semana = '".$semanaSelecionada."'";
                $codSemanaRuvSelecionada = " AND semanaRuv = '".$semanaSelecionada."'";
            }

            $sqlBuscaSemana = "

                SELECT semana FROM pp WHERE bonus IS NOT NULL ".$codSemanaSelecionada." ".$restricao." GROUP BY semana
                UNION
                SELECT semana FROM portal WHERE bonus IS NOT NULL ".$codSemanaSelecionada." ".$restricao." GROUP BY semana
                UNION
                SELECT semanaRuv AS semana FROM presparagem WHERE bonus IS NOT NULL ".$codSemanaRuvSelecionada." ".$restricao." GROUP BY semanaRuv
                UNION
                SELECT semanaRuv AS semana FROM tarefa WHERE bonus IS NOT NULL ".$codSemanaRuvSelecionada." ".$restricao." GROUP BY semanaRuv
                UNION
                SELECT semanaRuv AS semana FROM servicos WHERE bonus IS NOT NULL ".$codSemanaRuvSelecionada." ".$restricao." GROUP BY semanaRuv
                ORDER BY semana


            "; // RELAÇÃO DE SEMANAS RUV

            $sqlBuscaUsuario = "
                SELECT t.idUsuario, t.nomeUsuario
                FROM tblusuario t
                LEFT JOIN pp p ON p.codusuario = t.idUsuario
                LEFT JOIN portal por ON por.codusuario = t.idUsuario
                LEFT JOIN presparagem prp ON prp.codusuario = t.idUsuario
                LEFT JOIN tarefa tar ON tar.codusuario = t.idUsuario
                LEFT JOIN servicos serv ON serv.codusuario = t.idUsuario
            ".$sqlComplementaSemana;


            $sqlBuscaGrupos = "
                SELECT g.idgrupos, g.nomeGrupo
                FROM grupos g
                LEFT JOIN tblusuario t ON g.codusuario = t.idUsuario
                LEFT JOIN pp p ON p.codusuario = t.idUsuario
                LEFT JOIN portal por ON por.codusuario = t.idUsuario
                LEFT JOIN presparagem prp ON prp.codusuario = t.idUsuario
                LEFT JOIN tarefa tar ON tar.codusuario = t.idUsuario
                LEFT JOIN servicos serv ON serv.codusuario = t.idUsuario

            ".$sqlComplementaSemana;

        echo "          <tr>";
        echo "              <td colspan='4'>";
        echo "                  <label style='font-size: 12px;'>Semana Selecionada: <b>".$semanaSelecionada."</b></label>";
        echo "              </td>";
        echo "          </tr>";
        echo "          <tr>";

        echo "              <td>";

            try{

                $resultadoBuscaSemana = mysql_query($sqlBuscaSemana) or die ("Erro no comando SQL de busca de semana (Principal). Descrição: ".mysql_error().". SQL: ".$sqlBuscaSemana);
                $qtdBuscaSemana = mysql_num_rows($resultadoBuscaSemana);

                $resultadoBuscaGrupos = mysql_query($sqlBuscaGrupos) or die ("Erro no comando SQL de busca de grupos. Descrição: ".mysql_error().". SQL: ".$sqlBuscaGrupos);
                $qtdBuscaGrupos = mysql_num_rows($resultadoBuscaGrupos);

                $resultadoBuscaUsuario = mysql_query($sqlBuscaUsuario) or die ("Erro no comando SQL de busca de usuário. Descrição: ".mysql_error().". SQL: ".$sqlBuscaUsuario);
                $qtdBuscaUsuarios = mysql_num_rows($resultadoBuscaUsuario);

                //echo "Quantidade de busca de grupos: ".$qtdBuscaGrupos;

                echo "<div class='checkbox'>";
                if($qtdBuscaSemana === 1){
                    $dadosBuscaSemana = mysql_fetch_array($resultadoBuscaSemana);
                    echo "<input type='checkbox' value='".$dadosBuscaSemana['semana']."' style='font-weight: normal; font-size: 10px;' name='lista_semana[]' checked='checked'>".$dadosBuscaSemana['semana'];
                echo "</div>";
                }else if($qtdBuscaSemana > 1){
                    while($dadosBuscaSemana = mysql_fetch_array($resultadoBuscaSemana)){
                        echo "  <input type='checkbox' value='".$dadosBuscaSemana['semana']."' name='lista_semana[]' checked='checked'>".$dadosBuscaSemana['semana']."<br>";
                    }
                echo "</div>";

                }else{
                    echo "<label style='font-weight: normal; font-size: 10px;'>Não foi localizado a semana para este usuário</label>";
                }
                echo "              </td>";

                echo "              <td>";
                echo "<div class='checkbox'>";

                if($qtdBuscaGrupos === 1){
                    $dadosBuscaGrupos = mysql_fetch_array($resultadoBuscaGrupos);
                        echo "  <label style='font-weight: normal; font-size: 12px;'> ".$dadosBuscaGrupos['nomeGrupo']."</label>";
//                        echo "  <input type='checkbox' style='font-weight: normal; font-size: 10px;' name='lista_grupos[]'> ".$dadosBuscaGrupos['nomeGrupo'];
                echo "</div>";
                }else if($qtdBuscaGrupos > 1){
                    while($dadosBuscaGrupos = mysql_fetch_array($resultadoBuscaGrupos)){
                        echo "  <label style='font-weight: normal; font-size: 12px;'> ".$dadosBuscaGrupos['nomeGrupo']."</label><br>";
//                        echo "  <input type='checkbox' value='".$dadosBuscaGrupos['idgrupos']."' name='lista_grupos[]'> ".$dadosBuscaGrupos['nomeGrupo']."<br>";
                    }
                echo "</div>";

                }else{
                    echo "<label style='font-weight: normal; font-size: 10px;'>Não foi localizado a grupos para a(s) semana(s) selecionada(s).</label>";
                }

        echo "              </td>";
        echo "              <td>";
                echo "<div class='checkbox'>";
                if($qtdBuscaUsuarios === 1){
                    $dadosBuscaUsuario = mysql_fetch_array($resultadoBuscaUsuario);
                    echo "<input type='checkbox' value='".$dadosBuscaUsuario['idUsuario']."' style='font-weight: normal; font-size: 10px;' name='lista_user[]' checked='checked'>".$dadosBuscaUsuario['nomeUsuario'];
                echo "</div>";
                }else if($qtdBuscaUsuarios > 1){
                    while($dadosBuscaUsuario = mysql_fetch_array($resultadoBuscaUsuario)){
                        echo "  <input type='checkbox' value='".$dadosBuscaUsuario['idUsuario']."' name='lista_user[]' checked='checked'>".$dadosBuscaUsuario['nomeUsuario']."<br>";
                    }
                echo "</div>";

                }else{
                    echo "<label style='font-weight: normal; font-size: 10px;'>Não foi localizado a semana para este usuário</label>";
                }
        echo "              </td>";


            }catch(Exeption $ex){
                echo "Error. Descrição: ".$ex->getMessage();
            }

        } // FECHA SEMANA RUV SELECIONADA

        //////////////////////////////////////////////////////////////// INICIA O TEMPO
        else if($tempo === "1"){

            if($autoriza){ // administrador
                $sqlComplementaSemana = "
                GROUP BY t.nomeUsuario
                ";
                $restricao = "";
            }else{
                $sqlComplementaSemana = "
                WHERE
                t.idUsuario = ".$_SESSION['idusuario']." 
                GROUP BY t.nomeUsuario
                ";
                $restricao = "AND codusuario = ".$_SESSION['idusuario'];
            }


            if ($ano_selecionado){ // SOMENTE ANO

                $sql_selecao = " AND semana LIKE '".$ano_selecionado."____%' ";
                $sql_selecao_ruv = " AND semanaRuv LIKE '".$ano_selecionado."____%' ";

                $campo_semana_selecionada = " ".$ano_selecionado." - X X X";

                if($estacao_selecionado){
                    if($mes_selecionado){
                        if($semana_selecionada){
                            
                            $sql_selecao = " AND semana LIKE '".$ano_selecionado."-".$estacao_selecionado.$mes_selecionado.$semana_selecionada."%' ";
                            $sql_selecao_ruv = " AND semanaRuv LIKE '".$ano_selecionado."-".$estacao_selecionado.$mes_selecionado.$semana_selecionada."%' ";

                            $campo_semana_selecionada = " ".$ano_selecionado." - ".$estacao_selecionado." ".$mes_selecionado." ".$semana_selecionada;
                        }else{
                            $sql_selecao = " AND semana LIKE '".$ano_selecionado."-".$estacao_selecionado.$mes_selecionado."_%' ";
                            $sql_selecao_ruv = " AND semanaRuv LIKE '".$ano_selecionado."-".$estacao_selecionado.$mes_selecionado."_%' ";

                            $campo_semana_selecionada = " ".$ano_selecionado." - ".$estacao_selecionado." ".$mes_selecionado." X";
                        }
                    }else{
                        $sql_selecao = " AND semana LIKE '".$ano_selecionado."-".$estacao_selecionado."__%' ";
                        $sql_selecao_ruv = " AND semanaRuv LIKE '".$ano_selecionado."-".$estacao_selecionado."__%' ";

                        $campo_semana_selecionada = " ".$ano_selecionado." - ".$estacao_selecionado." X X";
                    }
                }else{
                    $sql_selecao = " AND semana LIKE '".$ano_selecionado."____%' ";
                    $sql_selecao_ruv = " AND semanaRuv LIKE '".$ano_selecionado."____%' ";

                    $campo_semana_selecionada = " ".$ano_selecionado." - X X X";
                }

            }else if($estacao_selecionado){ // SOMENTE ESTAÇÃO

                $sql_selecao = " AND semana LIKE '__".$estacao_selecionado."__%' ";
                $sql_selecao_ruv = " AND semanaRuv LIKE '__".$estacao_selecionado."__%' ";

                $campo_semana_selecionada = " X - ".$estacao_selecionado." X X";

                if($ano_selecionado){
                    $sql_selecao = " AND semana LIKE '".$ano_selecionado."-".$estacao_selecionado."__%' ";
                    $sql_selecao_ruv = " AND semanaRuv LIKE '".$ano_selecionado."-".$estacao_selecionado."__%' ";

                    $campo_semana_selecionada = " ".$ano_selecionado." - ".$estacao_selecionado." X X";

                    if($mes_selecionado){

                        $sql_selecao = " AND semana LIKE '".$ano_selecionado."-".$estacao_selecionado.$mes_selecionado."_%' ";
                        $sql_selecao_ruv = " AND semanaRuv LIKE '".$ano_selecionado."-".$estacao_selecionado.$mes_selecionado."_%' ";

                        $campo_semana_selecionada = " ".$ano_selecionado." - ".$estacao_selecionado." ".$mes_selecionado." X";

                        if($semana_selecionada){

                            $sql_selecao = " AND semana LIKE '".$ano_selecionado."-".$estacao_selecionado.$mes_selecionado.$semana_selecionada."%' ";
                            $sql_selecao_ruv = " AND semanaRuv LIKE '".$ano_selecionado."-".$estacao_selecionado.$mes_selecionado.$semana_selecionada."%' ";

                            $campo_semana_selecionada = " ".$ano_selecionado." - ".$estacao_selecionado." ".$mes_selecionado." X";

                        }else{

                            $sql_selecao = " AND semana LIKE '".$ano_selecionado."-".$estacao_selecionado.$mes_selecionado."_%' ";
                            $sql_selecao_ruv = " AND semanaRuv LIKE '".$ano_selecionado."-".$estacao_selecionado.$mes_selecionado."_%' ";

                            $campo_semana_selecionada = " ".$ano_selecionado." - ".$estacao_selecionado." ".$mes_selecionado." X";
                        }

                    }else{

                        $sql_selecao = " AND semana LIKE '".$ano_selecionado."-".$estacao_selecionado."__%' ";
                        $sql_selecao_ruv = " AND semanaRuv LIKE '".$ano_selecionado."-".$estacao_selecionado."__%' ";

                        $campo_semana_selecionada = " ".$ano_selecionado." - ".$estacao_selecionado." X X";

                    }

                }else{

                    $sql_selecao = " AND semana LIKE '__".$estacao_selecionado."__%' ";
                    $sql_selecao_ruv = " AND semanaRuv LIKE '__".$estacao_selecionado."__%' ";

                    $campo_semana_selecionada = " X - ".$estacao_selecionado." X X";
                }

            }else if($mes_selecionado){

                $sql_selecao = " AND semana LIKE '___".$mes_selecionado."_%' ";
                $sql_selecao_ruv = " AND semanaRuv LIKE '___".$mes_selecionado."_%' ";
                $campo_semana_selecionada = " X - X ".$mes_selecionado." X";

                if($ano_selecionado){

                    $sql_selecao = " AND semana LIKE '".$ano_selecionado."-_".$mes_selecionado."_%' ";
                    $sql_selecao_ruv = " AND semanaRuv LIKE '".$ano_selecionado."-_".$mes_selecionado."_%' ";
                    $campo_semana_selecionada = " ".$ano_selecionado." - X ".$mes_selecionado." X";

                    if($estacao_selecionado){
                        $sql_selecao = " AND semana LIKE '".$ano_selecionado."-".$estacao_selecionado.$mes_selecionado."_%' ";
                        $sql_selecao_ruv = " AND semanaRuv LIKE '".$ano_selecionado."-".$estacao_selecionado.$mes_selecionado."_%' ";
                        $campo_semana_selecionada = " ".$ano_selecionado." - ".$estacao_selecionado." ".$mes_selecionado." X";

                        if($semana_selecionada){
                            $sql_selecao = " AND semana LIKE '".$ano_selecionado."-".$estacao_selecionado.$mes_selecionado.$semana_selecionada."%' ";
                            $sql_selecao_ruv = " AND semanaRuv LIKE '".$ano_selecionado."-".$estacao_selecionado.$mes_selecionado.$semana_selecionada."%' ";
                            $campo_semana_selecionada = " ".$ano_selecionado." - ".$estacao_selecionado." ".$mes_selecionado." ".$semana_selecionada;

                        }else{
                            $sql_selecao = " AND semana LIKE '".$ano_selecionado."-".$estacao_selecionado.$mes_selecionado."_%' ";
                            $sql_selecao_ruv = " AND semanaRuv LIKE '".$ano_selecionado."-".$estacao_selecionado.$mes_selecionado."_%' ";
                            $campo_semana_selecionada = " ".$ano_selecionado." - ".$estacao_selecionado." ".$mes_selecionado." X";
                        }
                    }else{
                        $sql_selecao = " AND semana LIKE '___".$mes_selecionado."_%' ";
                        $sql_selecao_ruv = " AND semanaRuv LIKE '___".$mes_selecionado."_%' ";
                        $campo_semana_selecionada = " X - X ".$mes_selecionado." X";

                    }
                }else{
                    $sql_selecao = " AND semana LIKE '___".$mes_selecionado."_%' ";
                    $sql_selecao_ruv = " AND semanaRuv LIKE '___".$mes_selecionado."_%' ";
                    $campo_semana_selecionada = " X - X ".$mes_selecionado." X";
                }


            }else if($semana_selecionada){

                $sql_selecao = " AND semana LIKE '____".$semana_selecionada."%' ";
                $sql_selecao_ruv = " AND semanaRuv LIKE '____".$semana_selecionada."%' ";
                $campo_semana_selecionada = " X - X X ".$semana_selecionada;

                if($ano_selecionado){

                    if($estacao_selecionado){

                        if($mes_selecionado){
                            $sql_selecao = " AND semana LIKE '".$ano_selecionado."-".$estacao_selecionado.$mes_selecionado.$semana_selecionada."%' ";
                            $sql_selecao_ruv = " AND semanaRuv LIKE '".$ano_selecionado."-".$estacao_selecionado.$mes_selecionado.$semana_selecionada."%' ";
                            $campo_semana_selecionada = " ".$ano_selecionado." - ".$estacao_selecionado." ".$mes_selecionado." ".$semana_selecionada;

                        }else{// se não tiver mês
                            $sql_selecao = " AND semana LIKE '".$ano_selecionado."-".$estacao_selecionado."_".$semana_selecionada."%' ";
                            $sql_selecao_ruv = " AND semanaRuv LIKE '".$ano_selecionado."-".$estacao_selecionado."_".$semana_selecionada."%' ";
                            $campo_semana_selecionada = " ".$ano_selecionado." - ".$estacao_selecionado." X ".$semana_selecionada;
                        }


                    }else{
                        $sql_selecao = " AND semana LIKE '".$ano_selecionado."-__".$semana_selecionada."%' ";
                        $sql_selecao_ruv = " AND semanaRuv LIKE '".$ano_selecionado."-__".$semana_selecionada."%' ";
                        $campo_semana_selecionada = " ".$ano_selecionado." - X X ".$semana_selecionada;
                    }

                }else{
                    $sql_selecao = " AND semana LIKE '____".$semana_selecionada."%' ";
                    $sql_selecao_ruv = " AND semanaRuv LIKE '____".$semana_selecionada."%' ";
                    $campo_semana_selecionada = " X - X X ".$semana_selecionada;
                }

            }

            $sqlBuscaSemana = "

                SELECT semana FROM pp WHERE bonus IS NOT NULL ".$sql_selecao." ".$restricao." GROUP BY semana
                UNION
                SELECT semana FROM portal WHERE bonus IS NOT NULL ".$sql_selecao." ".$restricao." GROUP BY semana
                UNION
                SELECT semanaRuv AS semana FROM presparagem WHERE bonus IS NOT NULL ".$sql_selecao_ruv." ".$restricao." GROUP BY semanaRuv
                UNION
                SELECT semanaRuv AS semana FROM tarefa WHERE bonus IS NOT NULL ".$sql_selecao_ruv." ".$restricao." GROUP BY semanaRuv
                UNION
                SELECT semanaRuv AS semana FROM servicos WHERE bonus IS NOT NULL ".$sql_selecao_ruv." ".$restricao." GROUP BY semanaRuv
                ORDER BY semana


            "; // RELAÇÃO DE SEMANAS RUV

            //echo $sqlBuscaSemana;

            $sqlBuscaUsuario = "
                SELECT t.idUsuario, t.nomeUsuario
                FROM tblusuario t
                LEFT JOIN pp p ON p.codusuario = t.idUsuario
                LEFT JOIN portal por ON por.codusuario = t.idUsuario
                LEFT JOIN presparagem prp ON prp.codusuario = t.idUsuario
                LEFT JOIN tarefa tar ON tar.codusuario = t.idUsuario
                LEFT JOIN servicos serv ON serv.codusuario = t.idUsuario
            ".$sqlComplementaSemana;


            $sqlBuscaGrupos = "
                SELECT g.idgrupos, g.nomeGrupo
                FROM grupos g
                LEFT JOIN tblusuario t ON g.codusuario = t.idUsuario
                LEFT JOIN pp p ON p.codusuario = t.idUsuario
                LEFT JOIN portal por ON por.codusuario = t.idUsuario
                LEFT JOIN presparagem prp ON prp.codusuario = t.idUsuario
                LEFT JOIN tarefa tar ON tar.codusuario = t.idUsuario
                LEFT JOIN servicos serv ON serv.codusuario = t.idUsuario

            ".$sqlComplementaSemana;

        echo "          <tr>";
        echo "              <td colspan='4' style='text-align: center;'>";
        echo "                  <label style='font-size: 12px;'<b>".$campo_semana_selecionada."</b></label>"; //" <button type='button' class='btn btn-default btn-xs'>limpar</button></label>";//>Semana Selecionada: 
        echo "                  <div style='padding-left: 46%; padding-right: 40%;'>";
        echo "                  <button type='button' class='btn btn-default btn-xs' onclick='limpaBuscaSemana()' id='btLimpar'>";
        echo "                      <i class='fa fa-times'></i> Limpar";//trash-o
        echo "                  </button>";
        echo "                  </div>";

        echo "              </td>";
        echo "          </tr>";
        echo "          <tr>";

        echo "              <td>";

            try{

                $resultadoBuscaSemana = mysql_query($sqlBuscaSemana) or die ("Erro no comando SQL de busca de semana (Principal). Descrição: ".mysql_error().". SQL: ".$sqlBuscaSemana);
                $qtdBuscaSemana = mysql_num_rows($resultadoBuscaSemana);

                $resultadoBuscaGrupos = mysql_query($sqlBuscaGrupos) or die ("Erro no comando SQL de busca de grupos. Descrição: ".mysql_error().". SQL: ".$sqlBuscaGrupos);
                $qtdBuscaGrupos = mysql_num_rows($resultadoBuscaGrupos);

                $resultadoBuscaUsuario = mysql_query($sqlBuscaUsuario) or die ("Erro no comando SQL de busca de usuário. Descrição: ".mysql_error().". SQL: ".$sqlBuscaUsuario);
                $qtdBuscaUsuarios = mysql_num_rows($resultadoBuscaUsuario);

                //echo "Quantidade de busca de grupos: ".$qtdBuscaGrupos;

                echo "<div class='checkbox'>";
                if($qtdBuscaSemana === 1){
                    $dadosBuscaSemana = mysql_fetch_array($resultadoBuscaSemana);
                    echo "<input type='checkbox' value='".$dadosBuscaSemana['semana']."' style='font-weight: normal; font-size: 10px;' name='lista_semana[]' checked='checked'>".$dadosBuscaSemana['semana'];
                echo "</div>";
                }else if($qtdBuscaSemana > 1){
                    while($dadosBuscaSemana = mysql_fetch_array($resultadoBuscaSemana)){
                        echo "  <input type='checkbox' value='".$dadosBuscaSemana['semana']."' name='lista_semana[]' checked='checked'>".$dadosBuscaSemana['semana']."<br>";
                    }
                echo "</div>";

                }else{
                    echo "<label style='font-weight: normal; font-size: 10px;'>Não foi localizado a semana para este usuário</label>";
                }
                echo "              </td>";

                echo "              <td>";
                echo "<div class='checkbox'>";

                if($qtdBuscaGrupos === 1){
                    $dadosBuscaGrupos = mysql_fetch_array($resultadoBuscaGrupos);
                        echo "  <label style='font-weight: normal; font-size: 12px;'> ".$dadosBuscaGrupos['nomeGrupo']."</label>";
//                        echo "  <input type='checkbox' style='font-weight: normal; font-size: 10px;' name='lista_grupos[]'> ".$dadosBuscaGrupos['nomeGrupo'];
                echo "</div>";
                }else if($qtdBuscaGrupos > 1){
                    while($dadosBuscaGrupos = mysql_fetch_array($resultadoBuscaGrupos)){
                        echo "  <label style='font-weight: normal; font-size: 12px;'> ".$dadosBuscaGrupos['nomeGrupo']."</label><br>";
//                        echo "  <input type='checkbox' value='".$dadosBuscaGrupos['idgrupos']."' name='lista_grupos[]'> ".$dadosBuscaGrupos['nomeGrupo']."<br>";
                    }
                echo "</div>";

                }else{
                    echo "<label style='font-weight: normal; font-size: 10px;'>Não foi localizado a grupos para a(s) semana(s) selecionada(s).</label>";
                }

        echo "              </td>";
        echo "              <td>";
                echo "<div class='checkbox'>";
                if($qtdBuscaUsuarios === 1){
                    $dadosBuscaUsuario = mysql_fetch_array($resultadoBuscaUsuario);
                    echo "<input type='checkbox' value='".$dadosBuscaUsuario['idUsuario']."' style='font-weight: normal; font-size: 10px;' name='lista_user[]' checked='checked'>".$dadosBuscaUsuario['nomeUsuario'];
                echo "</div>";
                }else if($qtdBuscaUsuarios > 1){
                    while($dadosBuscaUsuario = mysql_fetch_array($resultadoBuscaUsuario)){
                        echo "  <input type='checkbox' value='".$dadosBuscaUsuario['idUsuario']."' name='lista_user[]' checked='checked'>".$dadosBuscaUsuario['nomeUsuario']."<br>";
                    }
                echo "</div>";

                }else{
                    echo "<label style='font-weight: normal; font-size: 10px;'>Não foi localizado a semana para este usuário</label>";
                }
        echo "              </td>";


            }catch(Exeption $ex){
                echo "Error. Descrição: ".$ex->getMessage();
            }

        }



        echo "          <tr>";
        echo "              <td colspan='4'>";
        echo "                  &nbsp;";
        echo "              </td>";
        echo "          </tr>";

        echo "          </tbody>";

        echo "          <tr>";
        echo "              <td colspan='3'>"; 
        echo "                  <a href='inicio.php?m=rela' class='btn btn-default' style='height: 39px;' title='Voltar' alt='Voltar'>";
        echo "                      <img src='../img/btn_back.png' width='25' height='25' title='Voltar' alt='Voltar'>";
        echo "                  </a>";
        echo "                  <button class='btn btn-default' type='submit'>";
        echo "                      <img src='../img/pdf-icon.png' width='25' height='25' title='Gerar PDF' alt='Gerar PDF'>";
        echo "                  </button>";
        echo "              </td>";
        echo "              <td>";
//        echo "                  &nbsp;"; ///// E-MAIL
        echo "                  <a class='btn btn-default' href='#'>";
        echo "                      <img src='../img/analiseEstatistica.png' width='25' height='25' title='Gerar Gráfico' alt='Gerar Gráfico'>";
        echo "                  </a>";
//        echo "                  <a href='#' class='btn btn-default' style='height: 39px;' title='Enviar E-mail' alt='Enviar E-mail'>";
//        echo "                      <img src='../img/webmail.png' width='25' height='28' title='Enviar E-mail' alt='Enviar E-mail'>";
//        echo "                  </a>";
        echo "              </td>";
        echo "          </tr>";
        echo "          <tr>";
        echo "              <td colspan='3'>";// colspan='2'
        echo "                  <a href='inicio.php?m=rela' title='Voltar' alt='Voltar' style='color: #000; text-decoration: none;'>";
        echo "                      <label style='width: 53px; font-size: 10px; padding-left: 10px;'>Voltar</label>";
        echo "                  </a>";
        echo "                  <a href='#' title='Gerar PDF' alt='Gerar PDF' style='color: #000; text-decoration: none;'>";
        echo "                      <label style='font-size: 10px; padding-left: 3px;'>Gerar PDF</label>";
        echo "                  </a>";
        echo "              </td>";
        echo "              <td>";
        echo "                  <a href='#' title='Gerar Gráfico' alt='Gerar Gráfico' style='color: #000; text-decoration: none;'>";
        echo "                      <label style='font-size: 10px; padding-left: 3px;'>Gerar Gráfico</label>";
        echo "                  </a>";
//        echo "                  &nbsp;"; ///// E-MAIL
//        echo "                  <a href='#' style='height: 39px; color: #000; text-decoration: none;' title='Enviar E-mail' alt='Enviar E-mail'>";
//        echo "                      <label style='font-size: 10px; padding-left: 5px;'>Enviar E-mail</label>";
//        echo "                  </a>";
        echo "              </td>";
//        echo "              <td align='right'>"; 
//        echo "                  <a href='inicio.php?m=config&t=ind' class='btn btn-primary' style='text-align: right;'>";
//        echo "                      &nbsp;"; //Registro
//        echo "                  </a>";
//        echo "              </td>";
        echo "          </tr>";
        echo "          <tr>";
        echo "              <td colspan='4'>";
        echo "                  &nbsp;";
        echo "              </td>";
        echo "          </tr>";
        echo "      </table>";
        echo "      <table>";
        echo "          <tr>";
        echo "              <td colspan='4'>";
        echo "                  <div id='carregaRuv' style='text-align: center; display:none;'>";
        echo "                      <img src='../img/carregaRuv.gif' width='35' height='34'>";
//        echo "                      <label>Carregando...</label>";
        echo "                  </div>"; 
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

            $tipo = "&o=rel";
            $semana = $_REQUEST['lista_semana'];
            $user = $_REQUEST['lista_user'];
            $grupo = $_REQUEST['lista_grupos'];
//            $semana = addslashes(filter_input(INPUT_POST, 'lista_semana'));
//            $user = addslashes(filter_input(INPUT_POST, 'lista_user'));
//            $grupo = addslashes(filter_input(INPUT_POST, 'lista_grupos'));


        $us = filter_input(INPUT_GET, 'us');
        $ss = filter_input(INPUT_GET, 'ss');
        $gs = filter_input(INPUT_GET, 'gs');

        $a = 0;

        $content = ob_get_clean();
        $content = $this->cabecalho("ind");


        if(!empty($us)){

            $content = ob_get_clean();
            $content = utf8_encode($content);
            $content = $this->cabecalho("ind");


                foreach ($user as $u) {
                $sqlTabela = "
                                SELECT t.idUsuario, t.nomeUsuario, g.nomeGrupo 
                                FROM tblusuario t 
                                LEFT JOIN grupos g ON g.codusuario = t.idUsuario
                                WHERE idUsuario = ".$u."
                                GROUP BY t.nomeUsuario
                                ORDER BY t.nomeUsuario
                                ";

                $sqlSemanas = "
                                SELECT p.semana FROM pp p WHERE p.codusuario = ".$u." AND p.bonus IS NOT NULL
                                UNION
                                SELECT por.semana FROM portal por WHERE por.codusuario = ".$u." AND por.bonus IS NOT NULL
                                UNION
                                SELECT prp.semanaRuv FROM presparagem prp WHERE prp.codusuario = ".$u." AND prp.bonus IS NOT NULL
                                UNION
                                SELECT tar.semanaRuv FROM tarefa tar WHERE tar.codusuario = ".$u." AND tar.bonus IS NOT NULL
                                UNION
                                SELECT serv.semanaRuv FROM servicos serv WHERE serv.codusuario = ".$u." AND serv.bonus IS NOT NULL
                
                                ";                

                $resultadoSQLTabela = mysql_query($sqlTabela) or die("Problemas na tabela. Erro: ".mysql_error().". SQL: ".$sqlTabela."<br>");
                $resultadoSQLSemanas = mysql_query($sqlSemanas) or die("Problemas na tabela de semanas. Erro: ".mysql_error().". SQL: ".$sqlSemanas."<br>");
    
                while($dados_tabela = mysql_fetch_array($resultadoSQLTabela)){
                    $content.="<hr style='background-color: #BFE0F1;' size='2' noshade='noshade'>";
                    $content.="<table class='table'>";
                    $content.="
                            <tr>
                                <td colspan='10'>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                            <tr style='background-color: rgba(205,192,176, 0.2)'>
                                <td colspan='2' style='padding-left: 10px;' width='200'>
                                    <p style='font-size: 15px;'><b>".$dados_tabela['nomeUsuario']."</b></p>
                                </td>
                                <td colspan='8'>
                                    <p style='font-size: 15px;'>Grupo: <b>".$dados_tabela['nomeGrupo']."</b></p>
                                </td>
                            </tr>
                        </table>
                    ";
                    $a ++;

                }

                    while($dados_semanas = mysql_fetch_array($resultadoSQLSemanas)) {
//                    foreach ($semana as $s) {
        try{


                $sqlSomaAcumulados = "
                                      SELECT 
                                      (SELECT SUM(bonus) FROM pp WHERE bonus IS NOT NULL) AS totalGeralMeditacao,
                                      (SELECT SUM(bonus) FROM portal WHERE bonus IS NOT NULL) AS totalGeralPortal,
                                      (SELECT SUM(bonus) FROM presparagem WHERE bonus IS NOT NULL) AS totalGeralPresParagem,
                                      (SELECT SUM(bonus) FROM tarefa WHERE bonus IS NOT NULL) AS totalGeralTarefas,
                                      (SELECT SUM(bonus) FROM servicos WHERE bonus IS NOT NULL) AS totalGeralServicos
                                      ";



                $resultSomaAcumulados = mysql_query($sqlSomaAcumulados) or die ("Há um erro no comando SQL (Total Índices). Erro: ".mysql_error(). "<br>SQL preenchido: ".$sqlSomaAcumulados."<br>");

                $dadosTotal = mysql_fetch_array($resultSomaAcumulados);
                
                if($dadosTotal['totalGeralMeditacao'] === null or $dadosTotal['totalGeralMeditacao'] === ""){
                    $totalGeralMeditacao = 0;
                }else{
                    $totalGeralMeditacao = $dadosTotal['totalGeralMeditacao'];
                }

                if($dadosTotal['totalGeralPortal'] === null or $dadosTotal['totalGeralPortal'] === ""){
                    $totalGeralPortal = 0;
                }else{
                    $totalGeralPortal = $dadosTotal['totalGeralPortal'];
                }

                if($dadosTotal['totalGeralPresParagem'] === null or $dadosTotal['totalGeralPresParagem'] === ""){
                    $totalGeralPresParagem = 0;
                }else{
                    $totalGeralPresParagem = $dadosTotal['totalGeralPresParagem'];
                }

                if($dadosTotal['totalGeralTarefas'] === null or $dadosTotal['totalGeralTarefas'] === ""){
                    $totalGeralTarefas = 0;
                }else{
                    $totalGeralTarefas = $dadosTotal['totalGeralTarefas'];
                }

                if($dadosTotal['totalGeralServicos'] === null or $dadosTotal['totalGeralServicos'] === ""){
                    $totalGeralServicos = 0;
                }else{
                    $totalGeralServicos = $dadosTotal['totalGeralServicos'];
                }

                $totalGeralBonus = $totalGeralMeditacao + $totalGeralPortal + $totalGeralPresParagem + $totalGeralTarefas;



                    if($s === ""){
                        $sqlSemana = "";
                        $sqlSemanaRuv = "";
                    }else{
                        $sqlSemana = "AND semana = '".$dados_semanas['semana']."'";
                        $sqlSemanaRuv = "AND semanaRuv = '".$dados_semanas['semana']."'";
                    }

                    $sqlSoma = "
                            SELECT 
                            (SELECT SUM(bonus) FROM pp where bonus IS NOT NULL AND codusuario = ".$u." ".$sqlSemana.") AS totalMeditacao,
                            (SELECT SUM(bonus) FROM portal where bonus IS NOT NULL AND codusuario = ".$u." ".$sqlSemana.") AS totalPortal,
                            (SELECT SUM(bonus) FROM presparagem where bonus IS NOT NULL AND codusuario = ".$u." ".$sqlSemanaRuv.") AS totalPresParagem,
                            (SELECT SUM(bonus) AS semana FROM tarefa where bonus IS NOT NULL AND codusuario = ".$u." ".$sqlSemanaRuv.") AS totalTarefas,
                            (SELECT SUM(bonus) AS semana FROM servicos where bonus IS NOT NULL AND codusuario = ".$u." ".$sqlSemanaRuv.") AS totalServicos
                            ";

                            //echo $sqlSoma;
                    $resultadoSQLSoma = mysql_query($sqlSoma) or die("Problemas na tabela de soma. Erro: ".mysql_error().". SQL: ".$sqlSoma."<br>");

                    while($dados_soma = mysql_fetch_array($resultadoSQLSoma)){


                    $totalBonusSemana = $dados_soma['totalMeditacao'] + $dados_soma['totalPortal'] + $dados_soma['totalPresParagem'] + $dados_soma['totalTarefas'];

//                    $percentualSemana = 0;
                    $percentualSemana = ($totalBonusSemana/$totalGeralBonus)*100;

                    $totalIndiceInvestimento = $totalBonusSemana/4;
//                    $totalIndiceInvestimento = $dados_soma['totalServicos'] + $totalBonusSemana;

                    $valorIndice = 11.033;

                    $indiceInvestimento = $totalIndiceInvestimento;
//                    $indiceInvestimento = ($totalIndiceInvestimento/$valorIndice);

                    $content.="<table class='table'>";
                    $content.=" 
                            <tr>
                                <td colspan='10'>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td width='50px'>
                                    <p style='font-size: 15px;'>".$dados_semanas['semana']."</p>
                                </td>
                                <td style='background-color: rgba(99,154,203,0.7); text-align: center;' width='50px'>
                                    <p style='font-size: 15px;'>".$dados_soma['totalMeditacao']."</p>
                                </td>
                                <td style='background-color: rgba(199,207,0,0.7); text-align: center;' width='50px'>
                                    <p style='font-size: 15px;'>".$dados_soma['totalPortal']."</p>
                                </td>
                                <td style='background-color: rgba(213,174,117,0.7); text-align: center;' width='50px'>
                                    <p style='font-size: 15px;'>".$dados_soma['totalPresParagem']."</p>
                                </td>
                                <td style='background-color: rgba(71,216,112,0.7); text-align: center;' width='50px'>
                                    <p style='font-size: 15px;'>".$dados_soma['totalTarefas']."</p>
                                </td>
                                <td style='background-color: rgba(212,174,255,0.7); text-align: center;' width='50px'>
                                    <p style='font-size: 15px;'>".$dados_soma['totalServicos']."</p>
                                </td>
                                <td style='background-color: rgba(215,129,161,0.5); text-align: center;' width='70'>
                                    <p style='font-size: 15px;'>".$totalBonusSemana."</p>
                                </td>
                                <td style='background-color: rgba(144,255,255,0.5); text-align: center;' width='70'>
                                    <p style='font-size: 15px;'>".number_format($percentualSemana, 2, ',', '.')."%</p>
                                </td>
                                <td style='background-color: rgba(63,189,216,0.5); width: 70px; text-align: center;'>
                                    <p style='font-size: 15px;'>".number_format($indiceInvestimento, 2, ',', '.')."%</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                            </table>
                    "; // Informa os usuários
                }//fecha while soma
                //}//fecha while

        }//fecha try
        catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }

                    }
                }

                $content.="
                        <table class='table'>
                            <tr>
                                <td colspan='2'>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='2'>
                                    <p style='font-size: 15px;'>Informativo</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='2'>
                                    <hr size='2'>
                                </td>
                            </tr>
                            <tr>
                                <td width='250'>
                                    <p style='font-size: 15px;'>Meditação</p>
                                </td>
                                <td width='50px' style='background-color: rgba(99,154,203,0.7); text-align: center;'>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td width='250'>
                                    <p style='font-size: 15px;'>Portal</p>
                                </td>
                                <td style='background-color: rgba(199,207,0,0.7); text-align: center;' width='50px'>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td width='250'>
                                    <p style='font-size: 15px;'>Presença-Paragem</p>
                                </td>
                                <td style='background-color: rgba(213,174,117,0.7); text-align: center;' width='50px'>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td width='250'>
                                    <p style='font-size: 15px;'>Tarefas</p>
                                </td>
                                <td style='background-color: rgba(71,216,112,0.7); text-align: center;' width='50px'>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td width='250'>
                                    <p style='font-size: 15px;'>Serviços</p>
                                </td>
                                <td style='background-color: rgba(212,174,255,0.7); text-align: center;' width='50px'>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td width='250'>
                                    <p style='font-size: 15px;'>Total</p>
                                </td>
                                <td style='background-color: rgba(215,129,161,0.5); text-align: center;' width='70'>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td width='250'>
                                    <p style='font-size: 15px;'>Percentual Semana</p>
                                </td>
                                <td style='background-color: rgba(144,255,255,0.5); text-align: center;' width='70'>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td width='250'>
                                    <p style='font-size: 15px;'>Índice Investimento</p>
                                </td>
                                <td style='background-color: rgba(63,189,216,0.5); width: 70px; text-align: center;'>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                        </table>

                ";

        $this->relatorio($content, "indice", $a);



        }else if(!empty($semana)){
//        }else if(!empty($ss)){

                $content = ob_get_clean();
                $content = utf8_encode($content);
                $content = $this->cabecalho("ind");

                foreach ($user as $u) {

                $sqlTabela = "
                                SELECT t.idUsuario, t.nomeUsuario, g.nomeGrupo 
                                FROM tblusuario t 
                                LEFT JOIN grupos g ON g.codusuario = t.idUsuario
                                WHERE idUsuario = ".$u."
                                GROUP BY t.nomeUsuario
                                ORDER BY t.nomeUsuario
                                ";

                $resultadoSQLTabela = mysql_query($sqlTabela) or die("Problemas na tabela. Erro: ".mysql_error().". SQL: ".$sqlTabela."<br>");
//                    $content .= "<div style='page-break-after:always'></div>";
    
                while($dados_tabela = mysql_fetch_array($resultadoSQLTabela)){
                    $content.="<hr style='background-color: #BFE0F1;' size='2' noshade='noshade'>";
                    $content.="<table class='table'>";
                    $content.="
                            <tr>
                                <td colspan='10'>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                            <tr style='background-color: rgba(205,192,176, 0.2)'>
                                <td colspan='2' style='padding-left: 10px;' width='200'>
                                    <p style='font-size: 15px;'><b>".$dados_tabela['nomeUsuario']."</b></p>
                                </td>
                                <td colspan='8'>
                                    <p style='font-size: 15px;'>Grupo: <b>".$dados_tabela['nomeGrupo']."</b></p>
                                </td>
                            </tr>
                        </table>
                    ";
                $a ++;
                $_SESSION['id_usuario_tabela'] = $dados_tabela['idUsuario'];
                } // fecha while tabela

                    foreach ($semana as $s) {
            try{


                if($s === ""){
                    $sqlSemana = "";
                    $sqlSemanaRuv = "";
                }else{
                    $sqlSemana = "AND semana = '".$s."'";
                    $sqlSemanaRuv = "AND semanaRuv = '".$s."'";
                }

                $sqlSoma = "
                        SELECT 
                        (SELECT SUM(bonus) FROM pp where bonus IS NOT NULL AND codusuario = ".$_SESSION['id_usuario_tabela']." ".$sqlSemana.") AS totalMeditacao,
                        (SELECT SUM(bonus) FROM portal where bonus IS NOT NULL AND codusuario = ".$_SESSION['id_usuario_tabela']." ".$sqlSemana.") AS totalPortal,
                        (SELECT SUM(bonus) FROM presparagem where bonus IS NOT NULL AND codusuario = ".$_SESSION['id_usuario_tabela']." ".$sqlSemanaRuv.") AS totalPresParagem,
                        (SELECT SUM(bonus) AS semana FROM tarefa where bonus IS NOT NULL AND codusuario = ".$_SESSION['id_usuario_tabela']." ".$sqlSemanaRuv.") AS totalTarefas,
                        (SELECT SUM(bonus) AS semana FROM servicos where bonus IS NOT NULL AND codusuario = ".$_SESSION['id_usuario_tabela']." ".$sqlSemanaRuv.") AS totalServicos
                        ";
                        
                            //echo $sqlSoma;

                $sqlSomaAcumulados = "
                                      SELECT 
                                      (SELECT SUM(bonus) FROM pp WHERE bonus IS NOT NULL) AS totalGeralMeditacao,
                                      (SELECT SUM(bonus) FROM portal WHERE bonus IS NOT NULL) AS totalGeralPortal,
                                      (SELECT SUM(bonus) FROM presparagem WHERE bonus IS NOT NULL) AS totalGeralPresParagem,
                                      (SELECT SUM(bonus) FROM tarefa WHERE bonus IS NOT NULL) AS totalGeralTarefas,
                                      (SELECT SUM(bonus) FROM servicos WHERE bonus IS NOT NULL) AS totalGeralServicos
                                      ";



                $resultSomaAcumulados = mysql_query($sqlSomaAcumulados) or die ("Há um erro no comando SQL (Total Índices). Erro: ".mysql_error(). "<br>SQL preenchido: ".$sqlSomaAcumulados."<br>");

                $dadosTotal = mysql_fetch_array($resultSomaAcumulados);
                
                if($dadosTotal['totalGeralMeditacao'] === null or $dadosTotal['totalGeralMeditacao'] === ""){
                    $totalGeralMeditacao = 0;
                }else{
                    $totalGeralMeditacao = $dadosTotal['totalGeralMeditacao'];
                }

                if($dadosTotal['totalGeralPortal'] === null or $dadosTotal['totalGeralPortal'] === ""){
                    $totalGeralPortal = 0;
                }else{
                    $totalGeralPortal = $dadosTotal['totalGeralPortal'];
                }

                if($dadosTotal['totalGeralPresParagem'] === null or $dadosTotal['totalGeralPresParagem'] === ""){
                    $totalGeralPresParagem = 0;
                }else{
                    $totalGeralPresParagem = $dadosTotal['totalGeralPresParagem'];
                }

                if($dadosTotal['totalGeralTarefas'] === null or $dadosTotal['totalGeralTarefas'] === ""){
                    $totalGeralTarefas = 0;
                }else{
                    $totalGeralTarefas = $dadosTotal['totalGeralTarefas'];
                }

                if($dadosTotal['totalGeralServicos'] === null or $dadosTotal['totalGeralServicos'] === ""){
                    $totalGeralServicos = 0;
                }else{
                    $totalGeralServicos = $dadosTotal['totalGeralServicos'];
                }

                $totalGeralBonus = $totalGeralMeditacao + $totalGeralPortal + $totalGeralPresParagem + $totalGeralTarefas;


                $resultadoSQLSoma = mysql_query($sqlSoma) or die("Problemas na tabela de soma. Erro: ".mysql_error().". SQL: ".$sqlSoma."<br>");

                    while($dados_soma = mysql_fetch_array($resultadoSQLSoma)){


                    $totalBonusSemana = $dados_soma['totalMeditacao'] + $dados_soma['totalPortal'] + $dados_soma['totalPresParagem'] + $dados_soma['totalTarefas'];

//                    $percentualSemana = 0;
                    $percentualSemana = ($totalBonusSemana/$totalGeralBonus)*100;

                    $totalIndiceInvestimento = $totalBonusSemana;
//                    $totalIndiceInvestimento = $dados_soma['totalServicos'] + $totalBonusSemana;

                    $valorIndice = 4;
//                    $valorIndice = 11.033;

                    $indiceInvestimento = ($totalIndiceInvestimento/$valorIndice);

                    $content.="<table class='table'>";
                    $content.=" 
                            <tr>
                                <td colspan='10'>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td width='50px'>
                                    <p style='font-size: 15px;'>".$s."</p>
                                </td>
                                <td style='background-color: rgba(99,154,203,0.7); text-align: center;' width='50px'>
                                    <p style='font-size: 15px;'>".$dados_soma['totalMeditacao']."</p>
                                </td>
                                <td style='background-color: rgba(199,207,0,0.7); text-align: center;' width='50px'>
                                    <p style='font-size: 15px;'>".$dados_soma['totalPortal']."</p>
                                </td>
                                <td style='background-color: rgba(213,174,117,0.7); text-align: center;' width='50px'>
                                    <p style='font-size: 15px;'>".$dados_soma['totalPresParagem']."</p>
                                </td>
                                <td style='background-color: rgba(71,216,112,0.7); text-align: center;' width='50px'>
                                    <p style='font-size: 15px;'>".$dados_soma['totalTarefas']."</p>
                                </td>
                                <td style='background-color: rgba(212,174,255,0.7); text-align: center;' width='50px'>
                                    <p style='font-size: 15px;'>".$dados_soma['totalServicos']."</p>
                                </td>
                                <td style='background-color: rgba(215,129,161,0.5); text-align: center;' width='70'>
                                    <p style='font-size: 15px;'>".$totalBonusSemana."</p>
                                </td>
                                <td style='background-color: rgba(144,255,255,0.5); text-align: center;' width='70'>
                                    <p style='font-size: 15px;'>".number_format($percentualSemana, 2, ',', '.')."%</p>
                                </td>
                                <td style='background-color: rgba(63,189,216,0.5); width: 70px; text-align: center;'>
                                    <p style='font-size: 15px;'>".number_format($indiceInvestimento, 2, ',', '.')."%</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                            </table>
                    "; // Informa as semanas

                }//fecha while soma

        }//fecha try
        catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }

                    } // fecha foreach semanas
                    $content.="
                            <table class='table'>
                                <tr>
                                    <td colspan='2'>
                                        <p style='font-size: 15px;'>&nbsp;</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='2'>
                                        <p style='font-size: 15px;'>Informativo</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='2'>
                                        <hr size='2'>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='250'>
                                        <p style='font-size: 15px;'>Meditação</p>
                                    </td>
                                    <td width='50px' style='background-color: rgba(99,154,203,0.7); text-align: center;'>
                                        <p style='font-size: 15px;'>&nbsp;</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='250'>
                                        <p style='font-size: 15px;'>Portal</p>
                                    </td>
                                    <td style='background-color: rgba(199,207,0,0.7); text-align: center;' width='50px'>
                                        <p style='font-size: 15px;'>&nbsp;</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='250'>
                                        <p style='font-size: 15px;'>Presença-Paragem</p>
                                    </td>
                                    <td style='background-color: rgba(213,174,117,0.7); text-align: center;' width='50px'>
                                        <p style='font-size: 15px;'>&nbsp;</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='250'>
                                        <p style='font-size: 15px;'>Tarefas</p>
                                    </td>
                                    <td style='background-color: rgba(71,216,112,0.7); text-align: center;' width='50px'>
                                        <p style='font-size: 15px;'>&nbsp;</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='250'>
                                        <p style='font-size: 15px;'>Serviços</p>
                                    </td>
                                    <td style='background-color: rgba(212,174,255,0.7); text-align: center;' width='50px'>
                                        <p style='font-size: 15px;'>&nbsp;</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='250'>
                                        <p style='font-size: 15px;'>Total</p>
                                    </td>
                                    <td style='background-color: rgba(215,129,161,0.5); text-align: center;' width='70'>
                                        <p style='font-size: 15px;'>&nbsp;</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='250'>
                                        <p style='font-size: 15px;'>Percentual Semana</p>
                                    </td>
                                    <td style='background-color: rgba(144,255,255,0.5); text-align: center;' width='70'>
                                        <p style='font-size: 15px;'>&nbsp;</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='250'>
                                        <p style='font-size: 15px;'>Índice Investimento</p>
                                    </td>
                                    <td style='background-color: rgba(63,189,216,0.5); width: 70px; text-align: center;'>
                                        <p style='font-size: 15px;'>&nbsp;</p>
                                    </td>
                                </tr>
                            </table>

                    ";
                    $content .= "<div style='page-break-after:always'></div>";
                    $content .= $this->cabecalho("ind");
                } // fecha foreach usuários

        $this->relatorio($content, "indice", $a); 



        }else if(!empty($gs)){ // ===================================================================== GRUPOS
            $content = ob_get_clean();
            $content = utf8_encode($content);
            $content = $this->cabecalho("ind");


                foreach ($grupo as $g) {
                $sqlTabela = "
                                SELECT t.idUsuario, t.nomeUsuario, g.nomeGrupo 
                                FROM tblusuario t 
                                LEFT JOIN grupos g ON g.codusuario = t.idUsuario
                                WHERE idgrupos = ".$g."
                                GROUP BY t.nomeUsuario
                                ORDER BY t.nomeUsuario
                                ";

                $resultadoSQLTabela = mysql_query($sqlTabela) or die("Problemas na tabela. Erro: ".mysql_error().". SQL: ".$sqlTabela."<br>");
    
                while($dados_tabela = mysql_fetch_array($resultadoSQLTabela)){
                    $content.="<hr style='background-color: #BFE0F1;' size='2' noshade='noshade'>";
                    $content.="<table class='table'>";
                    $content.="
                            <tr>
                                <td colspan='10'>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                            <tr style='background-color: rgba(205,192,176, 0.2)'>
                                <td colspan='2' style='padding-left: 10px;' width='200'>
                                    <p style='font-size: 15px;'><b>".$dados_tabela['nomeUsuario']."</b></p>
                                </td>
                                <td colspan='8'>
                                    <p style='font-size: 15px;'>Grupo: <b>".$dados_tabela['nomeGrupo']."</b></p>
                                </td>
                            </tr>
                        </table>
                    ";
                $sqlSemanas = "
                                SELECT p.semana FROM pp p WHERE p.codusuario = ".$dados_tabela['idUsuario']." AND p.bonus IS NOT NULL
                                UNION
                                SELECT por.semana FROM portal por WHERE por.codusuario = ".$dados_tabela['idUsuario']." AND por.bonus IS NOT NULL
                                UNION
                                SELECT prp.semanaRuv FROM presparagem prp WHERE prp.codusuario = ".$dados_tabela['idUsuario']." AND prp.bonus IS NOT NULL
                                UNION
                                SELECT tar.semanaRuv FROM tarefa tar WHERE tar.codusuario = ".$dados_tabela['idUsuario']." AND tar.bonus IS NOT NULL
                                UNION
                                SELECT serv.semanaRuv FROM servicos serv WHERE serv.codusuario = ".$dados_tabela['idUsuario']." AND serv.bonus IS NOT NULL
                
                                ";
                $_SESSION['id_usuario_tabela'] = $dados_tabela['idUsuario'];

                $a++;
                } // fecha while tabela

                $resultadoSQLSemanas = mysql_query($sqlSemanas) or die("Problemas na tabela de semanas. Erro: ".mysql_error().". SQL: ".$sqlSemanas."<br>");

                    while($dados_semanas = mysql_fetch_array($resultadoSQLSemanas)) {
//                    foreach ($semana as $s) {
        try{


                $sqlSomaAcumulados = "
                                      SELECT 
                                      (SELECT SUM(bonus) FROM pp WHERE bonus IS NOT NULL) AS totalGeralMeditacao,
                                      (SELECT SUM(bonus) FROM portal WHERE bonus IS NOT NULL) AS totalGeralPortal,
                                      (SELECT SUM(bonus) FROM presparagem WHERE bonus IS NOT NULL) AS totalGeralPresParagem,
                                      (SELECT SUM(bonus) FROM tarefa WHERE bonus IS NOT NULL) AS totalGeralTarefas,
                                      (SELECT SUM(bonus) FROM servicos WHERE bonus IS NOT NULL) AS totalGeralServicos
                                      ";



                $resultSomaAcumulados = mysql_query($sqlSomaAcumulados) or die ("Há um erro no comando SQL (Total Índices). Erro: ".mysql_error(). "<br>SQL preenchido: ".$sqlSomaAcumulados."<br>");

                $dadosTotal = mysql_fetch_array($resultSomaAcumulados);
                
                if($dadosTotal['totalGeralMeditacao'] === null or $dadosTotal['totalGeralMeditacao'] === ""){
                    $totalGeralMeditacao = 0;
                }else{
                    $totalGeralMeditacao = $dadosTotal['totalGeralMeditacao'];
                }

                if($dadosTotal['totalGeralPortal'] === null or $dadosTotal['totalGeralPortal'] === ""){
                    $totalGeralPortal = 0;
                }else{
                    $totalGeralPortal = $dadosTotal['totalGeralPortal'];
                }

                if($dadosTotal['totalGeralPresParagem'] === null or $dadosTotal['totalGeralPresParagem'] === ""){
                    $totalGeralPresParagem = 0;
                }else{
                    $totalGeralPresParagem = $dadosTotal['totalGeralPresParagem'];
                }

                if($dadosTotal['totalGeralTarefas'] === null or $dadosTotal['totalGeralTarefas'] === ""){
                    $totalGeralTarefas = 0;
                }else{
                    $totalGeralTarefas = $dadosTotal['totalGeralTarefas'];
                }

                if($dadosTotal['totalGeralServicos'] === null or $dadosTotal['totalGeralServicos'] === ""){
                    $totalGeralServicos = 0;
                }else{
                    $totalGeralServicos = $dadosTotal['totalGeralServicos'];
                }

                $totalGeralBonus = $totalGeralMeditacao + $totalGeralPortal + $totalGeralPresParagem + $totalGeralTarefas;



                    if($s === ""){
                        $sqlSemana = "";
                        $sqlSemanaRuv = "";
                    }else{
                        $sqlSemana = "AND semana = '".$dados_semanas['semana']."'";
                        $sqlSemanaRuv = "AND semanaRuv = '".$dados_semanas['semana']."'";
                    }

                    $sqlSoma = "
                            SELECT 
                            (SELECT SUM(bonus) FROM pp where bonus IS NOT NULL AND codusuario = ".$_SESSION['id_usuario_tabela']." ".$sqlSemana.") AS totalMeditacao,
                            (SELECT SUM(bonus) FROM portal where bonus IS NOT NULL AND codusuario = ".$_SESSION['id_usuario_tabela']." ".$sqlSemana.") AS totalPortal,
                            (SELECT SUM(bonus) FROM presparagem where bonus IS NOT NULL AND codusuario = ".$_SESSION['id_usuario_tabela']." ".$sqlSemanaRuv.") AS totalPresParagem,
                            (SELECT SUM(bonus) AS semana FROM tarefa where bonus IS NOT NULL AND codusuario = ".$_SESSION['id_usuario_tabela']." ".$sqlSemanaRuv.") AS totalTarefas,
                            (SELECT SUM(bonus) AS semana FROM servicos where bonus IS NOT NULL AND codusuario = ".$_SESSION['id_usuario_tabela']." ".$sqlSemanaRuv.") AS totalServicos
                            ";

                            //echo $sqlSoma;
                    $resultadoSQLSoma = mysql_query($sqlSoma) or die("Problemas na tabela de soma. Erro: ".mysql_error().". SQL: ".$sqlSoma."<br>");

                    while($dados_soma = mysql_fetch_array($resultadoSQLSoma)){


                    $totalBonusSemana = $dados_soma['totalMeditacao'] + $dados_soma['totalPortal'] + $dados_soma['totalPresParagem'] + $dados_soma['totalTarefas'];

//                    $percentualSemana = 0;
                    $percentualSemana = ($totalBonusSemana/$totalGeralBonus)*100;

                    $totalIndiceInvestimento = $totalBonusSemana;
//                    $totalIndiceInvestimento = $dados_soma['totalServicos'] + $totalBonusSemana;

                    $valorIndice = 4;
//                    $valorIndice = 11.033;

                    $indiceInvestimento = ($totalIndiceInvestimento/$valorIndice);

                    $content.="<table class='table'>";
                    $content.=" 
                            <tr>
                                <td colspan='10'>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td width='50px'>
                                    <p style='font-size: 15px;'>".$dados_semanas['semana']."</p>
                                </td>
                                <td style='background-color: rgba(99,154,203,0.7); text-align: center;' width='50px'>
                                    <p style='font-size: 15px;'>".$dados_soma['totalMeditacao']."</p>
                                </td>
                                <td style='background-color: rgba(199,207,0,0.7); text-align: center;' width='50px'>
                                    <p style='font-size: 15px;'>".$dados_soma['totalPortal']."</p>
                                </td>
                                <td style='background-color: rgba(213,174,117,0.7); text-align: center;' width='50px'>
                                    <p style='font-size: 15px;'>".$dados_soma['totalPresParagem']."</p>
                                </td>
                                <td style='background-color: rgba(71,216,112,0.7); text-align: center;' width='50px'>
                                    <p style='font-size: 15px;'>".$dados_soma['totalTarefas']."</p>
                                </td>
                                <td style='background-color: rgba(212,174,255,0.7); text-align: center;' width='50px'>
                                    <p style='font-size: 15px;'>".$dados_soma['totalServicos']."</p>
                                </td>
                                <td style='background-color: rgba(215,129,161,0.5); text-align: center;' width='70'>
                                    <p style='font-size: 15px;'>".$totalBonusSemana."</p>
                                </td>
                                <td style='background-color: rgba(144,255,255,0.5); text-align: center;' width='70'>
                                    <p style='font-size: 15px;'>".number_format($percentualSemana, 2, ',', '.')."%</p>
                                </td>
                                <td style='background-color: rgba(63,189,216,0.5); width: 70px; text-align: center;'>
                                    <p style='font-size: 15px;'>".number_format($indiceInvestimento, 2, ',', '.')."%</p>
                                </td>
                                <td>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                            </table>
                    "; // Informa os dados

                    SetFileFormat("png");

                    #Indicamos o títul do gráfico e o título dos dados no eixo X e Y do mesmo
                    $grafico->SetTitle("Indíce de Investimento");
                    $grafico->SetXTitle("Eixo X");
                    $grafico->SetYTitle("Eixo Y");


                    #Definimos os dados do gráfico
                    $dados = array(
                            array('Janeiro', 10),
                            array('Fevereiro', 5),
                            array('Março', 4),
                            array('Abril', 8),
                            array('Maio', 7),
                            array('Junho', 5),
                    );

                    $grafico->SetDataValues($dados);
                     
                    #Neste caso, usariamos o gráfico em barras
                    $grafico->SetPlotType("bars");

                    #Exibimos o gráfico
//                    $grafico->DrawGraph();

                    $content.=$grafico;

                }//fecha while soma
                //}//fecha while

        }//fecha try
        catch(Exception $ex){
            echo "Exception ativado. Descrição: ".$ex->getMessage();
        }

                    }
                }

                $content.="
                        <table class='table'>
                            <tr>
                                <td colspan='2'>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='2'>
                                    <p style='font-size: 15px;'>Informativo</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='2'>
                                    <hr size='2'>
                                </td>
                            </tr>
                            <tr>
                                <td width='250'>
                                    <p style='font-size: 15px;'>Meditação</p>
                                </td>
                                <td width='50px' style='background-color: rgba(99,154,203,0.7); text-align: center;'>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td width='250'>
                                    <p style='font-size: 15px;'>Portal</p>
                                </td>
                                <td style='background-color: rgba(199,207,0,0.7); text-align: center;' width='50px'>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td width='250'>
                                    <p style='font-size: 15px;'>Presença-Paragem</p>
                                </td>
                                <td style='background-color: rgba(213,174,117,0.7); text-align: center;' width='50px'>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td width='250'>
                                    <p style='font-size: 15px;'>Tarefas</p>
                                </td>
                                <td style='background-color: rgba(71,216,112,0.7); text-align: center;' width='50px'>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td width='250'>
                                    <p style='font-size: 15px;'>Serviços</p>
                                </td>
                                <td style='background-color: rgba(212,174,255,0.7); text-align: center;' width='50px'>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td width='250'>
                                    <p style='font-size: 15px;'>Total</p>
                                </td>
                                <td style='background-color: rgba(215,129,161,0.5); text-align: center;' width='70'>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td width='250'>
                                    <p style='font-size: 15px;'>Percentual Semana</p>
                                </td>
                                <td style='background-color: rgba(144,255,255,0.5); text-align: center;' width='70'>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td width='250'>
                                    <p style='font-size: 15px;'>Índice Investimento</p>
                                </td>
                                <td style='background-color: rgba(63,189,216,0.5); width: 70px; text-align: center;'>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                        </table>

                ";

        $this->relatorio($content, "indice", $a);


        } // fecha else if (grupos)


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
                    $this->relatorio($content, "Usuarios");
                    
                }catch(Exception $ex){
                    echo "Exception ativado. Descrição: ".$ex->getMessage();
                } // fim try / catch
            }

    public function conteudoIndice(){

/*

$dataInicial, $dataFinal, $dataRuv, $usuario, $semana, $grupo

SELECT 
    t.idUsuario, t.nomeUsuario, t.email, tp.nomeTipo, g.nomeGrupo,
    p.dataRuv, po.dataRuv, prp.dataRuv, tar.dataRuv, serv.dataRuv,
    (SELECT SUM(bonus) FROM pp p WHERE p.codusuario = t.idUsuario) AS totalMeditacao,
    (SELECT SUM(bonus) FROM portal po WHERE po.codusuario = t.idUsuario) AS totalPortal,
    (SELECT SUM(bonus) FROM presparagem prp WHERE prp.codusuario = t.idUsuario) AS totalPresParagem,
    (SELECT SUM(bonus) FROM tarefa tar WHERE tar.codusuario = t.idUsuario) AS totalTarefas,
    (SELECT SUM(bonus) FROM servicos serv WHERE serv.codusuario = t.idUsuario) AS totalServicos
FROM tblusuario t
INNER JOIN tipousuario tp ON t.codTipo = tp.idTipo
LEFT JOIN grupos g ON g.codusuario = t.idUsuario
LEFT JOIN pp p ON p.codusuario = t.idUsuario AND p.dataRuv = '6-321.4'
LEFT JOIN portal po ON po.codusuario = t.idUsuario AND po.dataRuv = p.dataRuv
LEFT JOIN presparagem prp ON prp.codusuario = t.idUsuario AND prp.dataruv = p.dataRuv
LEFT JOIN tarefa tar ON tar.codusuario = t.idUsuario AND tar.dataRuv = p.dataRuv
LEFT JOIN servicos serv ON serv.codusuario = t.idUsuario AND serv.dataRuv = p.dataRuv;


*/                              
        $conecta = new conectaBanco();
        $conecta->conecta();

        $content = ob_get_clean();
        $content = utf8_encode($content);

        $content = $this->cabecalho("ind");
/*
        if($dataRuv === "todos" or $dataRuv === "" or $dataRuv === null){
            $sqlDataMeditacao = "";
            $sqlDataPortal = "";
            $sqlDataPresPara = "";
            $sqlDataTarefas = "";
            $sqlDataServicos = "";
        }else{
            $sqlDataMeditacao = " AND p.dataRuv = '".$dataRuv."'";
            $sqlDataPortal = " AND po.dataRuv = '".$dataRuv."'";
            $sqlDataPresPara = " AND prp.dataRuv = '".$dataRuv."'";
            $sqlDataTarefas = " AND tar.dataRuv = '".$dataRuv."'";
            $sqlDataServicos = " AND serv.dataRuv = '".$dataRuv."'";
        }


        if($ordem === "" or $ordem === "todos"){
            $sqlOrdem = "ORDER BY med.dataRuv";
        }else{
            $sqlOrdem = " ORDER BY med.dataRuv AND ".$ordem;

        }

        switch ($ordem) {
            case 'grupo':
                    $nomeOrdem = "Grupo";
                break;
            case 'dataRuv':
                    $nomeOrdem = "Data RUV";
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
*/
        $sqlIndice = "
                    SELECT t.idUsuario, t.nomeUsuario, g.nomeGrupo
                    FROM tblusuario t
                    LEFT JOIN grupos g ON g.codusuario = t.idUsuario
                    ";


        $sqlSomaAcumulados = "SELECT 
                              (SELECT SUM(bonus) FROM pp) AS totalGeralMeditacao,
                              (SELECT SUM(bonus) FROM portal) AS totalGeralPortal,
                              (SELECT SUM(bonus) FROM presparagem) AS totalGeralPresParagem,
                              (SELECT SUM(bonus) FROM tarefa) AS totalGeralTarefas,
                              (SELECT SUM(bonus) FROM servicos) AS totalGeralServicos";


                try{

                    $resultIndice = mysql_query($sqlIndice) or die ("Há um erro no comando SQL (Índice Usuário). Erro: ".mysql_error()."<br>SQL preenchido: ".$sqlIndice."<br>");



                    $resultSomaAcumulados = mysql_query($sqlSomaAcumulados) or die ("Há um erro no comando SQL (Total Índices). Erro: ".mysql_error(). "<br>SQL preenchido: ".$sqlSomaAcumulados."<br>");



                    $dadosTotal = mysql_fetch_array($resultSomaAcumulados);

                    
                    if($dadosTotal['totalGeralMeditacao'] === null or $dadosTotal['totalGeralMeditacao'] === ""){
                        $totalGeralMeditacao = 0;
                    }else{
                        $totalGeralMeditacao = $dadosTotal['totalGeralMeditacao'];
                    }

                    if($dadosTotal['totalGeralPortal'] === null or $dadosTotal['totalGeralPortal'] === ""){
                        $totalGeralPortal = 0;
                    }else{
                        $totalGeralPortal = $dadosTotal['totalGeralPortal'];
                    }

                    if($dadosTotal['totalGeralPresParagem'] === null or $dadosTotal['totalGeralPresParagem'] === ""){
                        $totalGeralPresParagem = 0;
                    }else{
                        $totalGeralPresParagem = $dadosTotal['totalGeralPresParagem'];
                    }

                    if($dadosTotal['totalGeralTarefas'] === null or $dadosTotal['totalGeralTarefas'] === ""){
                        $totalGeralTarefas = 0;
                    }else{
                        $totalGeralTarefas = $dadosTotal['totalGeralTarefas'];
                    }

                    if($dadosTotal['totalGeralServicos'] === null or $dadosTotal['totalGeralServicos'] === ""){
                        $totalGeralServicos = 0;
                    }else{
                        $totalGeralServicos = $dadosTotal['totalGeralServicos'];
                    }

                    $totalGeralBonus = $totalGeralMeditacao + $totalGeralPortal + $totalGeralPresParagem + $totalGeralTarefas;


                    $content.="<hr style='background-color: #BFE0F1;' size='2' noshade='noshade'>";


///////////////////////////////////////////////////////////////////////////// SEMANA RUV

                    $content .= "
                            <table class='table'>

                            <tr>
                                <td colspan='10'>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr style='background-color: #dee0fc;'>
                                <td colspan='10'>
                                    <p style='font-size: 15px; font-weight: bold; color: #3a44a8;'>ACUMULADO - ANALÍTICO (Por Semana RUV)</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='10'>
                                    &nbsp;
                                </td>
                            </tr>

                            ";

                            while($dadosPesquisa = mysql_fetch_array($resultIndice)){ // Já tem o usuário e o grupo

                                $sqlSemanas = " 
                                            SELECT semana FROM pp WHERE bonus IS NOT NULL AND codusuario = ".$dadosPesquisa['idUsuario']." GROUP BY semana
                                            UNION
                                            SELECT semana FROM portal WHERE bonus IS NOT NULL AND codusuario = ".$dadosPesquisa['idUsuario']." GROUP BY semana
                                            UNION
                                            select semanaRuv FROM presparagem WHERE bonus IS NOT NULL AND codusuario = ".$dadosPesquisa['idUsuario']." GROUP BY semanaRuv
                                            UNION
                                            select semanaRuv FROM tarefa WHERE bonus IS NOT NULL AND codusuario = ".$dadosPesquisa['idUsuario']." GROUP BY semanaRuv
                                            UNION
                                            SELECT semanaRuv FROM servicos WHERE bonus IS NOT NULL AND codusuario = ".$dadosPesquisa['idUsuario']." GROUP BY semanaRuv

                                              ";


                                if($dadosPesquisa['nomeGrupo'] === null or $dadosPesquisa['nomeGrupo'] === ""){
                                    $grupo = "Sem grupo";
                                }else{
                                    $grupo = $dadosPesquisa['nomeGrupo'];
                                }

                                $content.=" 
                                        <tr>
                                            <td colspan='10'>
                                                <p style='font-size: 15px;'>&nbsp;</p>
                                            </td>
                                        </tr>
                                        <tr style='background-color: rgba(205,192,176, 0.2)'>
                                            <td colspan='2' style='padding-left: 10px;'>
                                                <p style='font-size: 15px;'><b>".$dadosPesquisa['nomeUsuario']."</b></p>
                                            </td>
                                            <td colspan='8'>
                                                <p style='font-size: 15px;'>Grupo: <b>".$grupo."</b></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan='10'>
                                                &nbsp;
                                            </td>
                                        </tr>
                                "; // Informa os usuários*/
                        $resultSemanas = mysql_query($sqlSemanas) or die ("Há um erro no comando SQL (Semanas). Erro: ".mysql_error()."<br>SQL preenchido: ".$sqlSemanas."<br>");

                            while($dadosSemanaRuv = mysql_fetch_array($resultSemanas)){ // Informa as semanas que têm bônus
// SUM(por.bonus) AS totalPortal, // LEFT JOIN portal por ON por.codusuario = t.idUsuario
//p.semana = '".$dadosSemanaRuv['semana']."'
                                 

                                $sqlIndiceSemanaRuv = " 

                                SELECT t.nomeUsuario, g.nomeGrupo, p.semana, por.semana, prp.semanaRuv, tar.semanaRuv, serv.semanaRuv,
                                (SELECT SUM(p.bonus) FROM pp p WHERE p.codusuario = t.idUsuario AND p.semana = '".$dadosSemanaRuv['semana']."') AS totalMeditacao,
                                (SELECT SUM(por.bonus) FROM portal por WHERE por.codusuario = t.idUsuario AND por.semana = '".$dadosSemanaRuv['semana']."') AS totalPortal,
                                (SELECT SUM(prp.bonus) FROM presparagem prp WHERE prp.codusuario = t.idUsuario AND prp.semanaRuv = '".$dadosSemanaRuv['semana']."') AS totalPresParagem,
                                (SELECT SUM(tar.bonus) FROM tarefa tar WHERE tar.codusuario = t.idUsuario AND tar.semanaRuv = '".$dadosSemanaRuv['semana']."') AS totalTarefas,
                                (SELECT SUM(serv.bonus) FROM servicos serv WHERE serv.codusuario = t.idUsuario AND serv.semanaRuv = '".$dadosSemanaRuv['semana']."') AS totalServicos
                                FROM tblusuario t
                                LEFT JOIN grupos g ON g.codusuario = t.idUsuario
                                LEFT JOIN pp p ON p.codusuario = t.idUsuario  AND p.bonus IS NOT NULL
                                LEFT JOIN portal por ON por.codusuario = t.idUsuario AND por.bonus IS NOT NULL
                                LEFT JOIN presparagem prp ON prp.codusuario = t.idUsuario AND prp.bonus IS NOT NULL
                                LEFT JOIN tarefa tar ON tar.codusuario = t.idUsuario AND tar.bonus IS NOT NULL
                                LEFT JOIN servicos serv ON serv.codusuario = t.idUsuario AND serv.bonus IS NOT NULL
                                WHERE t.idUsuario = ".$dadosPesquisa['idUsuario']."
                                GROUP BY t.idUsuario
                                ";
//AND p.semana IS NOT NULL AND por.semana IS NOT NULL AND prp.semanaRuv IS NOT NULL
                            $resultadoSemanaRuv = mysql_query($sqlIndiceSemanaRuv) or die ("Erro no comando SQL (Semana RUV). Descrição: ".mysql_error().". SQL Utilizado: ".$sqlIndiceSemanaRuv);


                            while($conteudoSemana = mysql_fetch_array($resultadoSemanaRuv)){

                                if($conteudoSemana['nomeGrupo'] === null or $conteudoSemana['nomeGrupo'] === ""){
                                    $grupoSemana = "Sem grupo";
                                }else{
                                    $grupoSemana = $conteudoSemana['nomeGrupo'];
                                }

                                $totalBonusSemana = $conteudoSemana['totalMeditacao'] + $conteudoSemana['totalPortal'] + $conteudoSemana['totalPresParagem'] + $conteudoSemana['totalTarefas'];

                                // + $conteudoSemana['totalServicos']

                                $percentualSemana = ($totalBonusSemana/$totalGeralBonus)*100;

                                $totalIndiceInvestimento = $conteudoSemana['totalServicos'] + $totalBonusSemana;

                                $valorIndice = 11.033;

                                $indiceInvestimento = ($totalIndiceInvestimento/$valorIndice);


                                $content.="

                                    <tr>
                                        <td colspan='10'>
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width='50px'>
                                            <p style='font-size: 15px;'>".$dadosSemanaRuv['semana']."</p>
                                        </td>
                                        <td style='background-color: rgba(99,154,203,0.7); text-align: center;' width='50px'>
                                            <p style='font-size: 15px;'>".$conteudoSemana['totalMeditacao']."</p>
                                        </td>
                                        <td style='background-color: rgba(199,207,0,0.7); text-align: center;' width='50px'>
                                            <p style='font-size: 15px;'>".$conteudoSemana['totalPortal']."</p>
                                        </td>
                                        <td style='background-color: rgba(213,174,117,0.7); text-align: center;' width='50px'>
                                            <p style='font-size: 15px;'>".$conteudoSemana['totalPresParagem']."</p>
                                        </td>
                                        <td style='background-color: rgba(71,216,112,0.7); text-align: center;' width='50px'>
                                            <p style='font-size: 15px;'>".$conteudoSemana['totalTarefas']."</p>
                                        </td>
                                        <td style='background-color: rgba(212,174,255,0.7); text-align: center;' width='50px'>
                                            <p style='font-size: 15px;'>".$conteudoSemana['totalServicos']."</p>
                                        </td>
                                        <td style='background-color: rgba(215,129,161,0.5); text-align: center;' width='70'>
                                            <p style='font-size: 15px;'>".$totalBonusSemana."</p>
                                        </td>
                                        <td style='background-color: rgba(144,255,255,0.5); text-align: center;' width='70'>
                                            <p style='font-size: 15px;'>".number_format($percentualSemana, 2, ',', '.')."%</p>
                                        </td>
                                        <td style='background-color: rgba(63,189,216,0.5); width: 70px; text-align: center;'>
                                            <p style='font-size: 15px;'>".number_format($indiceInvestimento, 2, ',', '.')."%</p>
                                        </td>
                                        <td>
                                            <p style='font-size: 15px;'>&nbsp;</p>
                                        </td>
                                    </tr>
                                        ";

                                    } // fecha while conteudo semana
//number_format($indiceInvestimento, 2, ',', '.')

                        } // FECHA WHILE SEMANA RUV
                        } // fecha while índice

                        $content .= " 
                                        </table>

                        ";

//////////////////////////////////////////////////////////////////////////////// ACUMULADOS
                    $content.="

                    <table class='table'>
                            <tr>
                                <td colspan='10' style='height: 50px;'>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr style='background-color: #dee0fc;'>
                                <td colspan='10'>
                                    <p style='font-size: 15px; font-weight: bold; color: #3a44a8;'>ACUMULADO - SINTÉTICO</p>
                                </td>
                            </tr>

                                ";


                                $sqlIndiceAcumulados = " 
                                    SELECT t.idUsuario, t.nomeUsuario, t.email, tp.nomeTipo, g.nomeGrupo,
                                    (SELECT SUM(bonus) FROM pp p WHERE p.codusuario = t.idUsuario ) AS totalMeditacao, 
                                    (SELECT SUM(bonus) FROM portal po WHERE po.codusuario = t.idUsuario ) AS totalPortal, 
                                    (SELECT SUM(bonus) FROM presparagem prp WHERE prp.codusuario = t.idUsuario ) AS totalPresParagem, 
                                    (SELECT SUM(bonus) FROM tarefa tar WHERE tar.codusuario = t.idUsuario ) AS totalTarefas, 
                                    (SELECT SUM(bonus) FROM servicos serv WHERE serv.codusuario = t.idUsuario ) AS totalServicos
                                    FROM tblusuario t
                                    INNER JOIN tipousuario tp ON t.codTipo = tp.idTipo
                                    LEFT JOIN grupos g ON g.codusuario = t.idUsuario

                                ";

                                $resultadoIndiceAcumulados = mysql_query($sqlIndiceAcumulados) or die("Erro no comando SQL - Índice Meditação. Descrição: ".mysql_error().". SQL: ".$sqlIndiceMeditacao);

                                    while($dadosCamposAcumulados = mysql_fetch_array($resultadoIndiceAcumulados)){

                                        if($dadosCamposAcumulados['nomeGrupo'] === null or $dadosCamposAcumulados['nomeGrupo'] === ""){
                                            $grupo = "Sem grupo";
                                        }else{
                                            $grupo = $dadosCamposAcumulados['nomeGrupo'];
                                        }


                                        $totalMeditacao = $dadosCamposAcumulados['totalMeditacao'];
                                        $totalPortal = $dadosCamposAcumulados['totalPortal'];
                                        $totalPresParagem = $dadosCamposAcumulados['totalPresParagem'];
                                        $totalTarefas = $dadosCamposAcumulados['totalTarefas'];
                                        $totalServicos = $dadosCamposAcumulados['totalServicos'];

                                        if($totalMeditacao === null or $totalMeditacao === ""){
                                            $totalMeditacao = 0;
                                        }
                                        if($totalPortal === null or $totalPortal === ""){
                                            $totalPortal = 0;
                                        }
                                        if($totalPresParagem === null or $totalPresParagem === ""){
                                            $totalPresParagem = 0;
                                        }
                                        if($totalTarefas === null or $totalTarefas === ""){
                                            $totalTarefas = 0;
                                        }
                                        if($totalServicos === null or $totalServicos === ""){
                                            $totalServicos = 0;
                                        }

                                        $totalGeralBonusIndividual = $totalMeditacao + $totalPortal + $totalPresParagem + $totalTarefas + $totalServicos;

                                        $totalPercentual = ($totalGeralBonusIndividual/$totalGeralBonus)*100;

                                        $content.="

                                            <tr>
                                                <td colspan='10'>
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style='padding-left: 10px;'>
                                                    <p style='font-size: 15px;'>".$dadosCamposAcumulados['nomeUsuario']."</p>
                                                </td>
                                                <td width='100px'>
                                                    <p style='font-size: 15px;'>".$grupo."</p>
                                                </td>
                                                <td style='background-color: rgba(99,154,203,0.7); text-align: center;' width='50px'>
                                                    <p style='font-size: 15px;'>".$totalMeditacao."</p>
                                                </td>
                                                <td style='background-color: rgba(199,207,0,0.7); text-align: center;' width='50px'>
                                                    <p style='font-size: 15px;'>".$totalPortal."</p>
                                                </td>
                                                <td style='background-color: rgba(213,174,117,0.7); text-align: center;' width='50px'>
                                                    <p style='font-size: 15px;'>".$totalPresParagem."</p>
                                                </td>
                                                <td style='background-color: rgba(71,216,112,0.7); text-align: center;' width='50px'>
                                                    <p style='font-size: 15px;'>".$totalTarefas."</p>
                                                </td>
                                                <td style='background-color: rgba(212,174,255,0.7); text-align: center;' width='50px'>
                                                    <p style='font-size: 15px;'>".$totalServicos."</p>
                                                </td>
                                                <td width='50px' style='background-color: rgba(215,129,161,0.5); text-align: center;'>
                                                    <p style='font-size: 15px;'>".$totalGeralBonusIndividual."</p>
                                                </td>
                                                <td width='80px' style='background-color: rgba(144,255,255,0.5); text-align: center;'>
                                                    <p style='font-size: 15px;'>".number_format($totalPercentual, 2, ',', '.')."%</p>
                                                </td>
                                                <td>
                                                    <p style='font-size: 15px;'>&nbsp;</p>
                                                </td>
                                            </tr>

                                                ";

                                    } // fecha while campos Meditação


                            $content.=" 
                                <tr>
                                    <td colspan='10' style='height: 30px;'>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr style='background-color: #dee0fc;'>
                                    <td colspan='2'>
                                        <p style='font-size: 15px; color: #3a44a8; height: 30px; font-weight: bold;'>
                                            Total Acumulado
                                        </p>
                                    </td>
                                    <td style='text-align: center;'>
                                        <p style='font-size: 15px; color: #3a44a8; height: 30px; font-weight: bold;'> 
                                            ".$totalGeralMeditacao."
                                        </p>
                                    </td>
                                    <td style='text-align: center;'>
                                        <p style='font-size: 15px; color: #3a44a8; height: 30px; font-weight: bold;'> 
                                            ".$totalGeralPortal."
                                        </p>
                                    </td>
                                    <td style='text-align: center;'>
                                        <p style='font-size: 15px; color: #3a44a8; height: 30px; font-weight: bold;'>
                                            ".$totalGeralPresParagem."
                                        </p>
                                    </td>
                                    <td style='text-align: center;'>
                                        <p style='font-size: 15px; color: #3a44a8; height: 30px; font-weight: bold;'>
                                            ".$totalGeralTarefas."
                                        </p>
                                    </td>
                                    <td style='text-align: center;'>
                                        <p style='font-size: 15px; color: #3a44a8; height: 30px; font-weight: bold;'>
                                            ".$totalGeralServicos."
                                        </p>
                                    </td>
                                    <td style='text-align: center;' colspan='3'>
                                        <p style='font-size: 15px; color: #3a44a8; height: 30px; font-weight: bold;'>
                                           &nbsp;
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='10' style='height: 30px;'>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='10' style='height: 30px;'>
                                        <p style='font-size: 15px; color: #3a44a8; height: 30px; font-weight: bold;'>
                                            Total de Bônus: ".$totalGeralBonus."
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='10' style='height: 30px;'>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='10' style='height: 30px;'>
                                        <div style='font-size: 20px; font-weight: bold;'>Informativo</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='10' style='height: 30px;'>
                                        <hr size='2' width='100%'>;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style='font-size: 15px;'>Meditação</div>
                                    </td>
                                    <td style='background-color: rgba(99,154,203,0.7); width: 50px;'>
                                        &nbsp;
                                    </td>
                                    <td colspan='8'>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style='font-size: 15px;'>Prática dos Portais</div>
                                    </td>
                                    <td style='background-color: rgba(199,207,0,0.7); width: 50px;'>
                                        &nbsp;
                                    </td>
                                    <td colspan='8'>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style='font-size: 15px;'>Paragem-Presença</div>
                                    </td>
                                    <td style='background-color: rgba(213,174,117,0.7); width: 50px;'>
                                        &nbsp;
                                    </td>
                                    <td colspan='8'>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style='font-size: 15px;'>Tarefas</div>
                                    </td>
                                    <td style='background-color: rgba(71,216,112,0.7); width: 50px;'>
                                        &nbsp;
                                    </td>
                                    <td colspan='8'>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style='font-size: 15px;'>Serviços</div>
                                    </td>
                                    <td style='background-color: rgba(212,174,255,0.7); width: 50px;'>
                                        &nbsp;
                                    </td>
                                    <td colspan='8'>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style='font-size: 15px;'>Bônus Total</div>
                                    </td>
                                    <td style='background-color: rgba(215,129,161,0.5); width: 50px;'>
                                        &nbsp;
                                    </td>
                                    <td colspan='8'>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style='font-size: 15px;'>Porcentagem</div>
                                    </td>
                                    <td style='background-color: rgba(144,255,255,0.5); width: 50px;'>
                                        &nbsp;
                                    </td>
                                    <td colspan='8'>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style='font-size: 15px;'>Índice Investimento</div>
                                    </td>
                                    <td style='background-color: rgba(63,189,216,0.5); width: 50px;'>
                                        &nbsp;
                                    </td>
                                    <td colspan='8'>
                                        &nbsp;
                                    </td>
                                </tr>
                            ";

                    $content.="</table>";
                    $this->relatorio($content, "Indice");

                }catch(Exception $ex){
                    echo "Exception ativado. Descrição: ".$ex->getMessage();
                } // fim try / catch

    }



    public function relatConteudoIndiceUsuario($idusuario = 0, $semana = "", $grupo = 0){
        $content = ob_get_clean();
//        $content = utf8_encode($content);
        $content = $this->cabecalho("ind"); // Está indo 2 x


        try{


//            for($i = 0; $i < sizeof($idusuario); $i ++ ){


                $sqlTabela = "
                                SELECT t.idUsuario, t.nomeUsuario, p.semana, sum(p.bonus) AS bonus, g.nomeGrupo 
                                FROM tblusuario t 
                                LEFT JOIN grupos g ON g.codusuario = t.idUsuario
                                LEFT JOIN pp p ON p.codusuario = t.idUsuario AND p.bonus IS NOT NULL
                                WHERE idUsuario = ".$idusuario."
                                AND semana = '".$semana."'
                                GROUP BY t.nomeUsuario
                                ORDER BY p.semana";
/*
                if(!$semana === 0){
                    $sqlSemana = "AND semana = '".$semana."'";
                    $sqlSemanaRuv = "AND semanaRuv = '".$semana."'";
                }

                $sqlSomaAcumulados = "SELECT 
                                      (SELECT SUM(bonus) FROM pp where codusuario = ".$idusuario." ".$sqlSemana.") AS totalGeralMeditacao,
                                      (SELECT SUM(bonus) FROM portal where codusuario = ".$idusuario." ".$sqlSemana.") AS totalGeralPortal,
                                      (SELECT SUM(bonus) FROM presparagem where codusuario = ".$idusuario." ".$sqlSemanaRuv.") AS totalGeralPresParagem,
                                      (SELECT SUM(bonus) FROM tarefa where codusuario = ".$idusuario." ".$sqlSemanaRuv.") AS totalGeralTarefas,
                                      (SELECT SUM(bonus) FROM servicos where codusuario = ".$idusuario." ".$sqlSemanaRuv.") AS totalGeralServicos";

*/
                $resultadoSQLTabela = mysql_query($sqlTabela) or die("Problemas na tabela. Erro: ".mysql_error().". SQL: ".$sqlTabela."<br>");

                while($dados_tabela = mysql_fetch_array($resultadoSQLTabela)){

                    $content.="<hr style='background-color: #BFE0F1;' size='2' noshade='noshade'>";
                    $content.="<table class='table'>";

                    $content.=" 
                            <tr>
                                <td colspan='10'>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                            <tr style='background-color: rgba(205,192,176, 0.2)'>
                                <td colspan='2' style='padding-left: 10px;'>
                                    <p style='font-size: 15px;'><b>".$dados_tabela['nomeUsuario']."</b></p>
                                </td>
                                <td colspan='8'>
                                    <p style='font-size: 15px;'>Grupo: <b>".$dados_tabela['nomeGrupo']."</b></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='10'>
                                    &nbsp;
                                </td>
                            </tr>
                            </table>
                    "; // Informa os usuários

                    //echo "VALOR DA SEMANA: ".$semana."<br>";
/*
                    if($semana === ""){
                        $sqlSemana = "";
                        $sqlSemanaRuv = "";
                    }else{
                        $sqlSemana = "AND semana = '".$semana."'";
                        $sqlSemanaRuv = "AND semanaRuv = '".$semana."'";
                    }

                    $sqlSomaAcumulados = "SELECT 
                                          (SELECT SUM(bonus) FROM pp where bonus IS NOT NULL AND codusuario = ".$dados_tabela['idUsuario']." ".$sqlSemana.") AS totalGeralMeditacao,
                                          (SELECT SUM(bonus) FROM portal where bonus IS NOT NULL AND codusuario = ".$dados_tabela['idUsuario']." ".$sqlSemana.") AS totalGeralPortal,
                                          (SELECT SUM(bonus) FROM presparagem where bonus IS NOT NULL AND codusuario = ".$dados_tabela['idUsuario']." ".$sqlSemanaRuv.") AS totalGeralPresParagem,
                                          (SELECT SUM(bonus) AS semana FROM tarefa where bonus IS NOT NULL AND codusuario = ".$dados_tabela['idUsuario']." ".$sqlSemanaRuv.") AS totalGeralTarefas,
                                          (SELECT SUM(bonus) AS semana FROM servicos where bonus IS NOT NULL AND codusuario = ".$dados_tabela['idUsuario']." ".$sqlSemanaRuv.") AS totalGeralServicos";

                    //echo "<br>SQL da SEMANA: ".$sqlSomaAcumulados."<br>";

                    $resultadoSomaAcumulados = mysql_query($sqlSomaAcumulados) or die("Problemas na tabela de Soma. Erro: ".mysql_error().". SQL: ".$sqlSomaAcumulados."<br>");

                    while($dados_semana = mysql_fetch_array($resultadoSomaAcumulados)){

                    $content.=" 
                            <tr>
                                <td colspan='10'>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='10'>
                                    <p style='font-size: 15px;'>Semana: <b>".$semana."</b></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='10'>
                                    <p style='font-size: 15px;'>&nbsp;</p>
                                </td>
                            </tr>
                            <tr style='background-color: rgba(205,192,176, 0.2)'>
                                <td colspan='2' style='padding-left: 10px;'>
                                    <p style='font-size: 15px;'>Meditação: <b>".$dados_semana['totalGeralMeditacao']."</b></p>
                                </td>
                                <td colspan='2'>
                                    <p style='font-size: 15px;'>Portal: <b>".$dados_semana['totalGeralPortal']."</b></p>
                                </td>
                                <td colspan='2'>
                                    <p style='font-size: 15px;'>Paragem-Presença: <b>".$dados_semana['totalGeralPresParagem']."</b></p>
                                </td>
                                <td colspan='2'>
                                    <p style='font-size: 15px;'>Tarefas: <b>".$dados_semana['totalGeralTarefas']."</b></p>
                                </td>
                                <td colspan='2'>
                                    <p style='font-size: 15px;'>Serviços: <b>".$dados_semana['totalGeralServicos']."</b></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='10'>
                                    &nbsp;
                                </td>
                            </tr>
                            </table>
                    "; // Informa as semanas

//                    echo $content;

                    } //fecha o while da semana

*/
                    $this->relatorio($content, "Indice");
                    }// fecha o while dos usuários
//                    $this->relatorio($content, "Indice");

//                    $content .= $this->cabecalho("ind");
                    //$this->relatorio($content, "Indice");
//                $content .= ob_get_clean();
                    //echo $content;

           //     }//fecha o for

//                echo "<br>==================================================";
//                echo "<br>|              Fim da consulta                   |";
//                echo "<br>==================================================";
                // O DADOS ESTÃO INDO CORRETAMENTE, INCLUSIVE ARRAY (BACKUP - telaRelIndiceUsuarioBackup())

        }//fecha try
        catch(Exception $ex){
            echo "Exception ativado. Erro: ".$ex->getMessage();
        }
/*
        $conecta = new conectaBanco();
        $conecta->conecta();

        $content = ob_get_clean();
        $content = utf8_encode($content);

        $content = $this->cabecalho("ind");
*/

//        $this->relatorio($content, "Indice");

    }// end relatConteudoIndiceUsuario

    public function telaRelIndiceUsuarioBackup(){

        $conecta = new conectaBanco();
        $conecta->conecta();

        $content = ob_get_clean();
        $content = utf8_encode($content);

        $content = $this->cabecalho("ind");
/*
        if(!empty($semana)){
            $sqlClassSemana = "AND semana = '".$semana."'";
            $sqlClassSemanaRuv = "AND semanaRuv = '".$semana."'";
        }else{
            $sqlClassSemana = "";
            $sqlClassSemanaRuv = "AND semanaRuv = '".$semana."'";
        }
*/
        for ($i = 0; $i < sizeof($idusuario); $i ++){

//        foreach ($idusuario as $usuario) {
            $sqlUsuarios = "SELECT t.idUsuario, t.nomeUsuario, g.nomeGrupo 
                            FROM tblusuario t 
                            LEFT JOIN grupos g ON g.codusuario = t.idUsuario
                            WHERE t.idUsuario = ".$idusuario[$i];

                            //echo "SQL Usuário: ".$sqlUsuarios."<br>";
        $sqlSomaAcumulados = "SELECT 
                              (SELECT SUM(bonus) FROM pp where codusuario = ".$idusuario[$i]." ".$sqlClassSemana.") AS totalGeralMeditacao,
                              (SELECT SUM(bonus) FROM portal where codusuario = ".$idusuario[$i]." ".$sqlClassSemana.") AS totalGeralPortal,
                              (SELECT SUM(bonus) FROM presparagem where codusuario = ".$idusuario[$i]." ".$sqlClassSemanaRuv.") AS totalGeralPresParagem,
                              (SELECT SUM(bonus) FROM tarefa where codusuario = ".$idusuario[$i]." ".$sqlClassSemanaRuv.") AS totalGeralTarefas,
                              (SELECT SUM(bonus) FROM servicos where codusuario = ".$idusuario[$i]." ".$sqlClassSemanaRuv.") AS totalGeralServicos";
/*
        $sqlUsuarios = "SELECT t.idUsuario, t.nomeUsuario, g.nomeGrupo 
                        FROM tblusuario t 
                        LEFT JOIN grupos g ON g.codusuario = t.idUsuario
                        WHERE t.idUsuario = ".$idusuario;

                        //echo "SQL Usuário: ".$sqlUsuarios."<br>";
*/
/*
        $sqlSomaAcumulados = "SELECT 
                              (SELECT SUM(bonus) FROM pp where codusuario = ".$idusuario." ".$sqlClassSemana.") AS totalGeralMeditacao,
                              (SELECT SUM(bonus) FROM portal where codusuario = ".$idusuario." ".$sqlClassSemana.") AS totalGeralPortal,
                              (SELECT SUM(bonus) FROM presparagem where codusuario = ".$idusuario." ".$sqlClassSemanaRuv.") AS totalGeralPresParagem,
                              (SELECT SUM(bonus) FROM tarefa where codusuario = ".$idusuario." ".$sqlClassSemanaRuv.") AS totalGeralTarefas,
                              (SELECT SUM(bonus) FROM servicos where codusuario = ".$idusuario." ".$sqlClassSemanaRuv.") AS totalGeralServicos";
*/
                try{

                    $resultUsuario = mysql_query($sqlUsuarios) or die ("Há um erro no comando SQL (Nome Usuário). Erro: ".mysql_error(). "<br>SQL preenchido: ".$sqlUsuarios."<br>");

                    $resultSomaAcumulados = mysql_query($sqlSomaAcumulados) or die ("Há um erro no comando SQL (Total Índices). Erro: ".mysql_error(). "<br>SQL preenchido: ".$sqlSomaAcumulados."<br>");


                    $dadosUsuario = mysql_fetch_array($resultUsuario);

                    $dadosTotal = mysql_fetch_array($resultSomaAcumulados);

                    
                    if($dadosTotal['totalGeralMeditacao'] === null or $dadosTotal['totalGeralMeditacao'] === ""){
                        $totalGeralMeditacao = 0;
                    }else{
                        $totalGeralMeditacao = $dadosTotal['totalGeralMeditacao'];
                    }

                    if($dadosTotal['totalGeralPortal'] === null or $dadosTotal['totalGeralPortal'] === ""){
                        $totalGeralPortal = 0;
                    }else{
                        $totalGeralPortal = $dadosTotal['totalGeralPortal'];
                    }

                    if($dadosTotal['totalGeralPresParagem'] === null or $dadosTotal['totalGeralPresParagem'] === ""){
                        $totalGeralPresParagem = 0;
                    }else{
                        $totalGeralPresParagem = $dadosTotal['totalGeralPresParagem'];
                    }

                    if($dadosTotal['totalGeralTarefas'] === null or $dadosTotal['totalGeralTarefas'] === ""){
                        $totalGeralTarefas = 0;
                    }else{
                        $totalGeralTarefas = $dadosTotal['totalGeralTarefas'];
                    }

                    if($dadosTotal['totalGeralServicos'] === null or $dadosTotal['totalGeralServicos'] === ""){
                        $totalGeralServicos = 0;
                    }else{
                        $totalGeralServicos = $dadosTotal['totalGeralServicos'];
                    }

                    $totalGeralBonus = $totalGeralMeditacao + $totalGeralPortal + $totalGeralPresParagem + $totalGeralTarefas;


                    $content.="<hr style='background-color: #BFE0F1;' size='2' noshade='noshade'>";


///////////////////////////////////////////////////////////////////////////// SEMANA RUV

                    $content .= "
                            <table class='table'>

                            <tr>
                                <td colspan='10'>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr style='background-color: #dee0fc;'>
                                <td colspan='10'>
                                    <p style='font-size: 15px; font-weight: bold; color: #3a44a8;'>ACUMULADO - ANALÍTICO (Por Semana RUV)</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='10'>
                                    &nbsp;
                                </td>
                            </tr>

                            ";

/*
                                if($dadosPesquisa['nomeGrupo'] === null or $dadosPesquisa['nomeGrupo'] === ""){
                                    $grupo = "Sem grupo";
                                }else{
                                    $grupo = $dadosPesquisa['nomeGrupo'];
                                }
*/
                                $content.=" 
                                        <tr>
                                            <td colspan='10'>
                                                <p style='font-size: 15px;'>&nbsp;</p>
                                            </td>
                                        </tr>
                                        <tr style='background-color: rgba(205,192,176, 0.2)'>
                                            <td colspan='2' style='padding-left: 10px;'>
                                                <p style='font-size: 15px;'><b>".$dadosUsuario['nomeUsuario']."</b></p>
                                            </td>
                                            <td colspan='8'>
                                                <p style='font-size: 15px;'>Grupo: <b>".$dadosUsuario['nomeGrupo']."</b></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan='10'>
                                                &nbsp;
                                            </td>
                                        </tr>
                                "; // Informa os usuários

                    if(!empty($semana)){
                        $sqlSemanaSelecionada = " AND semana = '".$semana."' ";
                        $sqlSemanaRuvSelecionada = " AND semanaRuv = '".$semana."' ";
                    }else{
                        $sqlSemanaSelecionada = "";
                        $sqlSemanaRuvSelecionada = "";
                    }

                        $sqlSemanas = " 
                                    SELECT semana FROM pp WHERE bonus IS NOT NULL AND codusuario = ".$dadosUsuario['idUsuario'].$sqlSemanaSelecionada." GROUP BY semana
                                    UNION
                                    SELECT semana FROM portal WHERE bonus IS NOT NULL AND codusuario = ".$dadosUsuario['idUsuario'].$sqlSemanaSelecionada."  GROUP BY semana
                                    UNION
                                    select semanaRuv FROM presparagem WHERE bonus IS NOT NULL AND codusuario = ".$dadosUsuario['idUsuario'].$sqlSemanaRuvSelecionada." GROUP BY semanaRuv
                                    UNION
                                    select semanaRuv FROM tarefa WHERE bonus IS NOT NULL AND codusuario = ".$dadosUsuario['idUsuario'].$sqlSemanaRuvSelecionada." GROUP BY semanaRuv
                                    UNION
                                    SELECT semanaRuv FROM servicos WHERE bonus IS NOT NULL AND codusuario = ".$dadosUsuario['idUsuario'].$sqlSemanaRuvSelecionada." GROUP BY semanaRuv

                                      ";
                                      //echo "<br>SQL: ".$sqlSemanas."<br>";
                                
                        $resultSemanas = mysql_query($sqlSemanas) or die ("Há um erro no comando SQL (Semanas). Erro: ".mysql_error()."<br>SQL preenchido: ".$sqlSemanas."<br>");

                        while($dadosSemanaRuv = mysql_fetch_array($resultSemanas)){



//                            while($dadosSemanaRuv = mysql_fetch_array($resultSemanas)){ // Informa as semanas que têm bônus
// SUM(por.bonus) AS totalPortal, // LEFT JOIN portal por ON por.codusuario = t.idUsuario
//p.semana = '".$dadosSemanaRuv['semana']."'
                                 

//                                 if(!empty($semana) and !$semana === "todos"){
                                    $sqlCampoMeditacao = " AND p.semana = '".$dadosSemanaRuv['semana']."' ";
                                    $sqlCampoPortal = " AND por.semana = '".$dadosSemanaRuv['semana']."' ";;
                                    $sqlCampoPresParagem = " AND prp.semanaRuv = '".$dadosSemanaRuv['semana']."' ";;
                                    $sqlCampoTarefas = " AND tar.semanaRuv = '".$dadosSemanaRuv['semana']."' ";;
                                    $sqlCampoServicos = " AND serv.semanaRuv = '".$dadosSemanaRuv['semana']."' ";;
//                                 }

                                $sqlIndiceSemanaRuv = " 

                                SELECT t.nomeUsuario, g.nomeGrupo, p.semana, por.semana, prp.semanaRuv, tar.semanaRuv, serv.semanaRuv,
                                (SELECT SUM(p.bonus) FROM pp p WHERE p.codusuario = t.idUsuario ".$sqlCampoMeditacao.") AS totalMeditacao,
                                (SELECT SUM(por.bonus) FROM portal por WHERE por.codusuario = t.idUsuario ".$sqlCampoPortal.") AS totalPortal,
                                (SELECT SUM(prp.bonus) FROM presparagem prp WHERE prp.codusuario = t.idUsuario ".$sqlCampoPresParagem.") AS totalPresParagem,
                                (SELECT SUM(tar.bonus) FROM tarefa tar WHERE tar.codusuario = t.idUsuario ".$sqlCampoTarefas.") AS totalTarefas,
                                (SELECT SUM(serv.bonus) FROM servicos serv WHERE serv.codusuario = t.idUsuario ".$sqlCampoServicos.") AS totalServicos
                                FROM tblusuario t
                                LEFT JOIN grupos g ON g.codusuario = t.idUsuario
                                LEFT JOIN pp p ON p.codusuario = t.idUsuario  AND p.bonus IS NOT NULL
                                LEFT JOIN portal por ON por.codusuario = t.idUsuario AND por.bonus IS NOT NULL
                                LEFT JOIN presparagem prp ON prp.codusuario = t.idUsuario AND prp.bonus IS NOT NULL
                                LEFT JOIN tarefa tar ON tar.codusuario = t.idUsuario AND tar.bonus IS NOT NULL
                                LEFT JOIN servicos serv ON serv.codusuario = t.idUsuario AND serv.bonus IS NOT NULL
                                WHERE t.idUsuario = ".$idusuario."
                                GROUP BY t.idUsuario
                                ";
//AND p.semana IS NOT NULL AND por.semana IS NOT NULL AND prp.semanaRuv IS NOT NULL
                            $resultadoSemanaRuv = mysql_query($sqlIndiceSemanaRuv) or die ("Erro no comando SQL (Semana RUV). Descrição: ".mysql_error().". SQL Utilizado: ".$sqlIndiceSemanaRuv);


                            while($conteudoSemana = mysql_fetch_array($resultadoSemanaRuv)){

                                if($conteudoSemana['nomeGrupo'] === null or $conteudoSemana['nomeGrupo'] === ""){
                                    $grupoSemana = "Sem grupo";
                                }else{
                                    $grupoSemana = $conteudoSemana['nomeGrupo'];
                                }

                                $totalBonusSemana = $conteudoSemana['totalMeditacao'] + $conteudoSemana['totalPortal'] + $conteudoSemana['totalPresParagem'] + $conteudoSemana['totalTarefas'];

                                // + $conteudoSemana['totalServicos']

                                $percentualSemana = ($totalBonusSemana/$totalGeralBonus)*100;
//                                $percentualSemana = ($totalBonusSemana/$totalGeralBonus)*100;

                                $totalIndiceInvestimento = $conteudoSemana['totalServicos'] + $totalBonusSemana;

                                $valorIndice = 11.033;

                                $indiceInvestimento = ($totalIndiceInvestimento/$valorIndice);


                                $content.="

                                    <tr>
                                        <td colspan='10'>
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width='50px'>
                                            <p style='font-size: 15px;'>".$dadosSemanaRuv['semana']."</p>
                                        </td>
                                        <td style='background-color: rgba(99,154,203,0.7); text-align: center;' width='50px'>
                                            <p style='font-size: 15px;'>".$conteudoSemana['totalMeditacao']."</p>
                                        </td>
                                        <td style='background-color: rgba(199,207,0,0.7); text-align: center;' width='50px'>
                                            <p style='font-size: 15px;'>".$conteudoSemana['totalPortal']."</p>
                                        </td>
                                        <td style='background-color: rgba(213,174,117,0.7); text-align: center;' width='50px'>
                                            <p style='font-size: 15px;'>".$conteudoSemana['totalPresParagem']."</p>
                                        </td>
                                        <td style='background-color: rgba(71,216,112,0.7); text-align: center;' width='50px'>
                                            <p style='font-size: 15px;'>".$conteudoSemana['totalTarefas']."</p>
                                        </td>
                                        <td style='background-color: rgba(212,174,255,0.7); text-align: center;' width='50px'>
                                            <p style='font-size: 15px;'>".$conteudoSemana['totalServicos']."</p>
                                        </td>
                                        <td style='background-color: rgba(215,129,161,0.5); text-align: center;' width='70'>
                                            <p style='font-size: 15px;'>".$totalBonusSemana."</p>
                                        </td>
                                        <td style='background-color: rgba(144,255,255,0.5); text-align: center;' width='70'>
                                            <p style='font-size: 15px;'>".number_format($percentualSemana, 2, ',', '.')."%</p>
                                        </td>
                                        <td style='background-color: rgba(63,189,216,0.5); width: 70px; text-align: center;'>
                                            <p style='font-size: 15px;'>".number_format($indiceInvestimento, 2, ',', '.')."%</p>
                                        </td>
                                        <td>
                                            <p style='font-size: 15px;'>&nbsp;</p>
                                        </td>
                                    </tr>
                                        ";

                                    } // fecha while conteudo semana
//number_format($indiceInvestimento, 2, ',', '.')
                        }

                        //} // FECHA WHILE SEMANA RUV
                        //} // fecha while índice

                        $content .= " 
                                        </table>

                        ";

//////////////////////////////////////////////////////////////////////////////// ACUMULADOS
                    $content.="

                    <table class='table'>
                            <tr>
                                <td colspan='10' style='height: 50px;'>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr style='background-color: #dee0fc;'>
                                <td colspan='10'>
                                    <p style='font-size: 15px; font-weight: bold; color: #3a44a8;'>ACUMULADO - SINTÉTICO</p>
                                </td>
                            </tr>

                                ";


                                $sqlIndiceAcumulados = " 
                                    SELECT t.idUsuario, t.nomeUsuario, t.email, tp.nomeTipo, g.nomeGrupo,
                                    (SELECT SUM(bonus) FROM pp p WHERE p.codusuario = t.idUsuario ) AS totalMeditacao, 
                                    (SELECT SUM(bonus) FROM portal po WHERE po.codusuario = t.idUsuario ) AS totalPortal, 
                                    (SELECT SUM(bonus) FROM presparagem prp WHERE prp.codusuario = t.idUsuario ) AS totalPresParagem, 
                                    (SELECT SUM(bonus) FROM tarefa tar WHERE tar.codusuario = t.idUsuario ) AS totalTarefas, 
                                    (SELECT SUM(bonus) FROM servicos serv WHERE serv.codusuario = t.idUsuario ) AS totalServicos
                                    FROM tblusuario t
                                    INNER JOIN tipousuario tp ON t.codTipo = tp.idTipo
                                    LEFT JOIN grupos g ON g.codusuario = t.idUsuario
                                    WHERE t.idUsuario = ".$idusuario."

                                ";

                                $resultadoIndiceAcumulados = mysql_query($sqlIndiceAcumulados) or die("Erro no comando SQL - Índice Meditação. Descrição: ".mysql_error().". SQL: ".$sqlIndiceMeditacao);

                                    while($dadosCamposAcumulados = mysql_fetch_array($resultadoIndiceAcumulados)){

                                        if($dadosCamposAcumulados['nomeGrupo'] === null or $dadosCamposAcumulados['nomeGrupo'] === ""){
                                            $grupo = "Sem grupo";
                                        }else{
                                            $grupo = $dadosCamposAcumulados['nomeGrupo'];
                                        }


                                        $totalMeditacao = $dadosCamposAcumulados['totalMeditacao'];
                                        $totalPortal = $dadosCamposAcumulados['totalPortal'];
                                        $totalPresParagem = $dadosCamposAcumulados['totalPresParagem'];
                                        $totalTarefas = $dadosCamposAcumulados['totalTarefas'];
                                        $totalServicos = $dadosCamposAcumulados['totalServicos'];

                                        if($totalMeditacao === null or $totalMeditacao === ""){
                                            $totalMeditacao = 0;
                                        }
                                        if($totalPortal === null or $totalPortal === ""){
                                            $totalPortal = 0;
                                        }
                                        if($totalPresParagem === null or $totalPresParagem === ""){
                                            $totalPresParagem = 0;
                                        }
                                        if($totalTarefas === null or $totalTarefas === ""){
                                            $totalTarefas = 0;
                                        }
                                        if($totalServicos === null or $totalServicos === ""){
                                            $totalServicos = 0;
                                        }

                                        $totalGeralBonusIndividual = $totalMeditacao + $totalPortal + $totalPresParagem + $totalTarefas + $totalServicos;

                                        $totalPercentual = ($totalGeralBonusIndividual/$totalGeralBonus)*100;

                                        $content.="

                                            <tr>
                                                <td colspan='10'>
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style='padding-left: 10px;'>
                                                    <p style='font-size: 15px;'>".$dadosCamposAcumulados['nomeUsuario']."</p>
                                                </td>
                                                <td width='100px'>
                                                    <p style='font-size: 15px;'>".$grupo."</p>
                                                </td>
                                                <td style='background-color: rgba(99,154,203,0.7); text-align: center;' width='50px'>
                                                    <p style='font-size: 15px;'>".$totalMeditacao."</p>
                                                </td>
                                                <td style='background-color: rgba(199,207,0,0.7); text-align: center;' width='50px'>
                                                    <p style='font-size: 15px;'>".$totalPortal."</p>
                                                </td>
                                                <td style='background-color: rgba(213,174,117,0.7); text-align: center;' width='50px'>
                                                    <p style='font-size: 15px;'>".$totalPresParagem."</p>
                                                </td>
                                                <td style='background-color: rgba(71,216,112,0.7); text-align: center;' width='50px'>
                                                    <p style='font-size: 15px;'>".$totalTarefas."</p>
                                                </td>
                                                <td style='background-color: rgba(212,174,255,0.7); text-align: center;' width='50px'>
                                                    <p style='font-size: 15px;'>".$totalServicos."</p>
                                                </td>
                                                <td width='50px' style='background-color: rgba(215,129,161,0.5); text-align: center;'>
                                                    <p style='font-size: 15px;'>".$totalGeralBonusIndividual."</p>
                                                </td>
                                                <td width='80px' style='background-color: rgba(144,255,255,0.5); text-align: center;'>
                                                    <p style='font-size: 15px;'>".number_format($totalPercentual, 2, ',', '.')."%</p>
                                                </td>
                                                <td>
                                                    <p style='font-size: 15px;'>&nbsp;</p>
                                                </td>
                                            </tr>

                                                ";

                                    } // fecha while campos Meditação


                            $content.=" 
                                <tr>
                                    <td colspan='10' style='height: 30px;'>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr style='background-color: #dee0fc;'>
                                    <td colspan='2'>
                                        <p style='font-size: 15px; color: #3a44a8; height: 30px; font-weight: bold;'>
                                            Total Acumulado
                                        </p>
                                    </td>
                                    <td style='text-align: center;'>
                                        <p style='font-size: 15px; color: #3a44a8; height: 30px; font-weight: bold;'> 
                                            ".$totalGeralMeditacao."
                                        </p>
                                    </td>
                                    <td style='text-align: center;'>
                                        <p style='font-size: 15px; color: #3a44a8; height: 30px; font-weight: bold;'> 
                                            ".$totalGeralPortal."
                                        </p>
                                    </td>
                                    <td style='text-align: center;'>
                                        <p style='font-size: 15px; color: #3a44a8; height: 30px; font-weight: bold;'>
                                            ".$totalGeralPresParagem."
                                        </p>
                                    </td>
                                    <td style='text-align: center;'>
                                        <p style='font-size: 15px; color: #3a44a8; height: 30px; font-weight: bold;'>
                                            ".$totalGeralTarefas."
                                        </p>
                                    </td>
                                    <td style='text-align: center;'>
                                        <p style='font-size: 15px; color: #3a44a8; height: 30px; font-weight: bold;'>
                                            ".$totalGeralServicos."
                                        </p>
                                    </td>
                                    <td style='text-align: center;' colspan='3'>
                                        <p style='font-size: 15px; color: #3a44a8; height: 30px; font-weight: bold;'>
                                           &nbsp;
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='10' style='height: 30px;'>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='10' style='height: 30px;'>
                                        <p style='font-size: 15px; color: #3a44a8; height: 30px; font-weight: bold;'>
                                            Total de Bônus: ".$totalGeralBonus."
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='10' style='height: 30px;'>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='10' style='height: 30px;'>
                                        <div style='font-size: 20px; font-weight: bold;'>Informativo</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='10' style='height: 30px;'>
                                        <hr size='2' width='100%'>;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style='font-size: 15px;'>Meditação</div>
                                    </td>
                                    <td style='background-color: rgba(99,154,203,0.7); width: 50px;'>
                                        &nbsp;
                                    </td>
                                    <td colspan='8'>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style='font-size: 15px;'>Prática dos Portais</div>
                                    </td>
                                    <td style='background-color: rgba(199,207,0,0.7); width: 50px;'>
                                        &nbsp;
                                    </td>
                                    <td colspan='8'>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style='font-size: 15px;'>Paragem-Presença</div>
                                    </td>
                                    <td style='background-color: rgba(213,174,117,0.7); width: 50px;'>
                                        &nbsp;
                                    </td>
                                    <td colspan='8'>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style='font-size: 15px;'>Tarefas</div>
                                    </td>
                                    <td style='background-color: rgba(71,216,112,0.7); width: 50px;'>
                                        &nbsp;
                                    </td>
                                    <td colspan='8'>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style='font-size: 15px;'>Serviços</div>
                                    </td>
                                    <td style='background-color: rgba(212,174,255,0.7); width: 50px;'>
                                        &nbsp;
                                    </td>
                                    <td colspan='8'>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style='font-size: 15px;'>Bônus Total</div>
                                    </td>
                                    <td style='background-color: rgba(215,129,161,0.5); width: 50px;'>
                                        &nbsp;
                                    </td>
                                    <td colspan='8'>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style='font-size: 15px;'>Porcentagem</div>
                                    </td>
                                    <td style='background-color: rgba(144,255,255,0.5); width: 50px;'>
                                        &nbsp;
                                    </td>
                                    <td colspan='8'>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style='font-size: 15px;'>Índice Investimento</div>
                                    </td>
                                    <td style='background-color: rgba(63,189,216,0.5); width: 50px;'>
                                        &nbsp;
                                    </td>
                                    <td colspan='8'>
                                        &nbsp;
                                    </td>
                                </tr>
                            ";

                    $content.="</table>";
                    $this->relatorio($content, "Indice");

                }catch(Exception $ex){
                    echo "Exception ativado. Descrição: ".$ex->getMessage();
                } // fim try / catch
        }// fim for

    }


}// Fecha classe
