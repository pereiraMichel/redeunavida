<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of configuracao
 *
 * @author Debug
 */
class configuracao {

    
    public function telaInicialConfig(){

        //echo "<meta http-equiv='refresh' content='5;url=inicio.php?m=config'>";
        
        echo "<div class='row' id='telaEscolha'>";
        echo "  <div class='col-xs-3 col-sm-3 col-md-3'>";
        echo "      <div class='text-center'>";
        echo "          <a href='inicio.php?m=config&t=usis' target='_self'>";
        echo "              <img src='../img/groupIcon2.png' title='Usuários' width='40' height='40' class='img-rounded'>";
        echo "              <h5>Usuários</h5>";
        echo "          </a>";
        echo "      </div>";
        echo "  </div>";
/*        echo "  <div class='col-xs-3 col-sm-3 col-md-3'>";
        echo "      <div class='text-center'>";
        echo "          <a href='inicio.php?m=config&t=usit' target='_self'>";
        echo "              <img src='../img/groupIcon1.png' title='Usuários do Site' width='90' height='90' class='img-rounded'>";
        echo "              <h5>Usuários do Site</h5>";
        echo "          </a>";
        echo "      </div>";
        echo "  </div>";*/
        echo "  <div class='col-xs-3 col-sm-3 col-md-3'>";
        echo "      <div class='text-center'>";
        echo "          <a href='inicio.php?m=config&t=set' target='_self'>";
        echo "              <img src='../../images/setenio2.jpg' title='Setênio' width='40' height='40' class='img-rounded'>";
        echo "              <h5>Setênio</h5>";
        echo "          </a>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='col-xs-3 col-sm-3 col-md-3'>";
        echo "      <div class='text-center'>";
        echo "          <a href='inicio.php?m=config&t=tipotelefone' target='_self'>";
        echo "              <img src='../img/telefone.png' title='Tipos de Telefone' width='40' height='40' class='img-rounded'>";
        echo "              <h5>Tipos de Telefone</h5>";
        echo "          </a>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='col-xs-3 col-sm-3 col-md-3'>";
        echo "      <div class='text-center'>";
        echo "          <a href='inicio.php?m=config&t=tipousuario' target='_self'>";
        echo "              <img src='../img/User-blue.png' title='Usuários do Sistema' width='40' height='40' class='img-rounded'>";
        echo "              <h5>Tipos de Usuário</h5>";
        echo "          </a>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='col-xs-12 col-sm-12 col-md-12' style='height: 30px;'>&nbsp;</div>";
//        echo "  <div class='col-xs-3 col-sm-3 col-md-3'>";
//        echo "      <div class='text-center'>";
//        echo "          <a href='inicio.php?m=config&t=atividade' target='_self'>";
//        echo "              <img src='../img/tarefa.png' title='Atividades' width='90' height='90' class='img-rounded'>";
//        echo "              <h5>Atividades</h5>";
//        echo "          </a>";
//        echo "      </div>";
//        echo "  </div>";
        echo "  <div class='col-xs-3 col-sm-3 col-md-3'>";
        echo "      <div class='text-center'>";
        echo "          <a href='inicio.php?m=config&t=perf'>";
        echo "              <img src='../img/usuario.png' title='Perfil' class='img-rounded' width='40' height='40'>";
        echo "              <h5>Seu Perfil</h5>";
        echo "          </a>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='col-xs-3 col-sm-3 col-md-3'>";
        echo "      <div class='text-center'>";
        echo "          <a href='inicio.php?m=config&t=ativ' target='_self'>";
        echo "              <img src='../img/registro1.jpg' title='Atividades' width='40' height='40' class='img-rounded'>";
        echo "              <h5>Atividades</h5>";
        echo "          </a>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='col-xs-3 col-sm-3 col-md-3'>";
        echo "      <div class='text-center'>";
        echo "          <a href='inicio.php?m=config&t=bon' target='_self'>";
        echo "              <img src='../img/estatistica6.png' title='Bonificação' alt='Bonificação' width='40' height='40' class='img-rounded'>";
        echo "              <h5>Bonificação</h5>";
        echo "          </a>";
        echo "      </div>";
        echo "  </div>";
        $nomeTipoUsuario = $_SESSION['nomeTipo'];

        if(($nomeTipoUsuario === "ADMINISTRADOR") OR ($nomeTipoUsuario === "ANALISTA")){


        echo "  <div class='col-xs-3 col-sm-3 col-md-3'>";
        echo "      <div class='text-center'>";
        echo "          <a href='inicio.php?m=config&t=xb' target='_self'>";
        echo "              <img src='../img/servicos.png' title='Configurações de Bônus' alt='Configurações de Bônus' width='40' height='40' class='img-rounded'>";
        echo "              <h5>Configurações de Bônus</h5>";
        echo "          </a>";
        echo "      </div>";
        echo "  </div>";

        echo "  <div class='col-xs-12 col-sm-12 col-md-12'>";
        echo "      &nbsp;";
        echo "  </div>";

        echo "  <div class='col-xs-3 col-sm-3 col-md-3'>";
        echo "      <div class='text-center'>";
        echo "          <a href='inicio.php?m=config&t=grupos' target='_self'>";
        echo "              <img src='../img/groupIcon1.png' title='Configurações de Grupos' alt='Configurações de Grupos' width='40' height='40' class='img-rounded'>";
        echo "              <h5>Grupos</h5>";
        echo "          </a>";
        echo "      </div>";
        echo "  </div>";

        }
        
        echo "  <div class='col-xs-12 col-sm-12 col-md-12'>";
        echo "      &nbsp;";
        echo "  </div>";

        echo "<br/><br/>";
        echo "  <div class='col-xs-3 col-sm-3 col-md-3'>";
        echo "      <div class='text-center'>";
        echo "          &nbsp;";
        echo "      </div>";
        echo "  </div>";
        echo "</div>";
        echo "<div class='col-xs-12 col-sm-12 col-md-12' style='height: 30px;'>&nbsp;</div>";
        echo "<div class='row'>";
        echo "  <div class='col-xs-12 col-sm-12 col-md-12' id='btnSairEscolha'>";
        echo "      <a href='inicio.php' class='btn btn-default' target='_self' title='Voltar' alt='Voltar'>";
        echo "          <img src='../img/btn_back.png' width='25' height='25'>";
        echo "      </a>";
        echo "          <br><label>Voltar</label>";
        echo "  </div>";
        echo "</div>";
        
    }
    
    private function identificaNavegador(){
            $ip = $_SERVER['REMOTE_ADDR'];

            $u_agent = $_SERVER['HTTP_USER_AGENT'];
            $bname = 'Unknown';
            $platform = 'Unknown';
            $version= "";

            if (preg_match('/linux/i', $u_agent)) {
                $platform = 'Linux';
            }
            elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
                $platform = 'Mac';
            }
            elseif (preg_match('/windows|win32/i', $u_agent)) {
                $platform = 'Windows';
            }


            if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
            {
                $bname = 'Internet Explorer';
                $ub = "MSIE";
            }
            elseif(preg_match('/Firefox/i',$u_agent))
            {
                $bname = 'Mozilla Firefox';
                $ub = "Firefox";
            }
            elseif(preg_match('/Chrome/i',$u_agent))
            {
                $bname = 'Google Chrome';
                $ub = "Chrome";
            }
            elseif(preg_match('/AppleWebKit/i',$u_agent))
            {
                $bname = 'AppleWebKit';
                $ub = "Opera";
            }
            elseif(preg_match('/Safari/i',$u_agent))
            {
                $bname = 'Apple Safari';
                $ub = "Safari";
            }

            elseif(preg_match('/Netscape/i',$u_agent))
            {
                $bname = 'Netscape';
                $ub = "Netscape";
            }

            $known = array('Version', $ub, 'other');
            $pattern = '#(?<browser>' . join('|', $known) .
            ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
            if (!preg_match_all($pattern, $u_agent, $matches)) {
            }


            $i = count($matches['browser']);
            if ($i != 1) {
                if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
                    $version= $matches['version'][0];
                }
                else {
                    $version= $matches['version'][1];
                }
            }
            else {
                $version= $matches['version'][0];
            }

            // check if we have a number
            if ($version==null || $version=="") {$version="?";}

            $Browser = array(
                    'userAgent' => $u_agent,
                    'name'      => $bname,
                    'version'   => $version,
                    'platform'  => $platform,
                    'pattern'    => $pattern
            );

            $navegador = "Navegador: " . $Browser['name'] . " " . $Browser['version'];
            $so = "SO: " . $Browser['platform'];

            /* Para finalizar coloquei aqui o meu insert para salvar na base de dados... Não fiz nada para mostrar em tela, pois só uso para fins de log do sistema  */
    }
    
    
}
