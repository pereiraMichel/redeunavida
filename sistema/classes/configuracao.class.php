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
        
        echo "<div class='row' id='telaEscolha'>";
        echo "  <div class='col-xs-3 col-sm-3 col-md-3'>";
        echo "      <div class='text-center'>";
        echo "          <a href='inicio.php?m=config&t=usis' target='_self'>";
        echo "              <img src='../img/groupIcon2.png' title='Usuários do Sistema' width='90' height='90' class='img-rounded'>";
        echo "              <h5>Usuários do Sistema</h5>";
        echo "          </a>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='col-xs-3 col-sm-3 col-md-3'>";
        echo "      <div class='text-center'>";
        echo "          <a href='inicio.php?m=config&t=usit' target='_self'>";
        echo "              <img src='../img/groupIcon1.png' title='Usuários do Site' width='90' height='90' class='img-rounded'>";
        echo "              <h5>Usuários do Site</h5>";
        echo "          </a>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='col-xs-3 col-sm-3 col-md-3'>";
        echo "      <div class='text-center'>";
        echo "          <a href='inicio.php?m=config&t=set' target='_self'>";
        echo "              <img src='../../images/setenio2.jpg' title='Setênio' width='90' height='90' class='img-rounded'>";
        echo "              <h5>Setênio</h5>";
        echo "          </a>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='col-xs-3 col-sm-3 col-md-3'>";
        echo "      <div class='text-center'>";
        echo "          <a href='inicio.php?m=config&t=tipotelefone' target='_self'>";
        echo "              <img src='../img/telefone.png' title='Tipos de Telefone' width='90' height='90' class='img-rounded'>";
        echo "              <h5>Tipos de Telefone</h5>";
        echo "          </a>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='col-xs-12 col-sm-12 col-md-12' style='height: 30px;'>&nbsp;</div>";
        echo "  <div class='col-xs-3 col-sm-3 col-md-3'>";
        echo "      <div class='text-center'>";
        echo "          <a href='inicio.php?m=config&t=tipousuario' target='_self'>";
        echo "              <img src='../img/User-blue.png' title='Usuários do Sistema' width='90' height='90' class='img-rounded'>";
        echo "              <h5>Tipos de Usuário</h5>";
        echo "          </a>";
        echo "      </div>";
        echo "  </div>";
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
        echo "          &nbsp;";
//        echo "          <a href='inicio.php?menu=configuracoes&tarefa=setenio' target='_self'>";
//        echo "              <img src='../img/groupIcon1.png' title='Setênio' width='90' height='90' class='img-rounded'>";
//        echo "              <h5>Setênio</h5>";
//        echo "          </a>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='col-xs-3 col-sm-3 col-md-3'>";
        echo "      <div class='text-center'>";
        echo "          &nbsp;";
        echo "      </div>";
        echo "  </div>";
        echo "</div>";
        echo "<br/><br/>";
        echo "<div class='row'>";
        echo "  <div class='col-xs-12 col-sm-12 col-md-12' id='btnSairEscolha'>";
        echo "      <a href='inicio.php' target='_self'>";
        echo "          <button class='btn btn-default'>";
        echo "              Voltar";
        echo "          </button>";
        echo "      </a>";
        echo "  </div>";
        echo "</div>";
        
    }
    
    
    
    
}
