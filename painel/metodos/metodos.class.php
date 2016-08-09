<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of metodos
 *
 * @author Debug
 */
class metodos {

    public function telaAcima(){    
        echo "<div class='navbar-header navbar-text-top'>";
        echo "  <div class='container-fluid'>";
        echo "          <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#menu' aria-expanded='false'>";
        echo "              <span class='sr-only'>Menu</span>";
        echo "              <span class='icon-bar'></span>";
        echo "              <span class='icon-bar'></span>";
        echo "              <span class='icon-bar'></span>";
        echo "          </button>";
        echo "          <div class='navbar-subtext-top' style='padding-top: 5px; padding-left: 15px;'>";
        echo "                  <span>";
        echo "                      <img src='../images/logoRUV50x51.png' width='40' height='41'>";
        echo "                  <a href='index.php' style='text-decoration: none; color: #3F6CA1; font-family: arial; font-size: 20;' id='tituloRuv'><img src='../images/letraRUV.png' title='RedeUnaViva' width='150' height='40' style='width: 16%; height: 8%'></a> ";
        echo "                  </span>";
        echo "                  <img src='../images/hanzipenImage.png' width='230' height='23' class='image-responsive' style='width: 20%; height: 20%; padding-bottom: 0px;'>";
        echo "          </div>";
        echo "  </div>";
        echo "</div>";

    }
    
    public function login(){
        
        echo "<form id='contact-form' name='contact-form' method='post' action='#'>";
        echo "  <div class='row wow fadeInUp' data-wow-duration='1000ms' data-wow-delay='300ms'>";
        echo "      <div class='col-sm-6'>";
        echo "          <div class='form-group'>";
        echo "              <input type='text' name='login' class='form-control' placeholder='Login' required='required'>";
        echo "          </div>";
        echo "      </div>";
        echo "      <div class='col-sm-6'>";
        echo "          <div class='form-group'>";
        echo "              <input type='password' name='senha' class='form-control' placeholder='senha' required='required'>";
        echo "          </div>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='form-group'>";
        echo "      <button type='submit' class='btn-submit'>Acessar</button>";
        echo "  </div>";
        echo "</form>";
        
        if($_POST){
            require_once "./classes/Usuario.class.php";
            $user = new Usuario();

            $usuario = addslashes(filter_input(INPUT_POST, 'login'));
            $senha = addslashes(filter_input(INPUT_POST, 'senha'));

            $user->setLogin($usuario);
            $user->setSenha($senha);
            if($user->validaUsuario()){
                echo "<script>";
                echo "  window.location.href='index.php?a=s'";
                echo "</script>";
            }else{
                echo "Não autorizado";
            }
        }
    }
    public function BoasVindas(){
        echo "  <div class='row wow fadeInUp' data-wow-duration='1000ms' data-wow-delay='300ms'>";
        echo "      <div class='col-sm-12' id='titulo'>";
        echo "          Bem-vindo a criação de evento da agenda.";
        echo "      </div>";
        echo "      <p style='height: 30px;'>&nbsp;</p>";
        echo "      <div class='col-sm-12'>";
        echo "          O que deseja fazer?";
        echo "      </div>";
        echo "      <p style='height: 30px;'>&nbsp;</p>";
        echo "      <div class='col-sm-4' id='menu'>";
        echo "          <a href='index.php?a=s&e=c'>Criar um Evento</a>";
        echo "      </div>";
        echo "      <div class='col-sm-4' id='menu'>";
        echo "          <a href='index.php?a=s&e=l'>Listar os eventos</a>";
        echo "      </div>";
        echo "      <div class='col-sm-4' id='menu'>";
        echo "          <a href='index.php'>Sair</a>";
        echo "      </div>";
        echo "  </div>";
        
    }
    
    public function criaEvento(){
        echo "<div class='well'>";
        echo "<form id='form-horizontal' name='contact-form' method='post' action='#'>";
        echo "  <div class='row wow fadeInUp' data-wow-duration='1000ms' data-wow-delay='300ms'>";
        echo "      <div class='col-sm-12' id='subtitulo'>";
        echo "          NOVO EVENTO";
        echo "      </div>";
        echo "      <p style='height: 30px;'>&nbsp;</p>";
        echo "      <div class='control-group'>";
        echo "          <label class='control-label'>";
        echo "              Título:";
        echo "          </label>";
        echo "          <div class='control'>";
        echo "              <textarea rows='5' name='titulo'></textarea>";
        echo "          </div>";
        echo "      </div>";
        echo "      <p style='height: 30px;'>&nbsp;</p>";
        echo "      <div class='control-group'>";
        echo "          <label class='control-label'>";
        echo "              Data:";
        echo "          </label>";
        echo "          <div class='control'>";
        echo "              <input type='text' name='data'>";
        echo "          </div>";
        echo "      </div>";
        echo "      <p style='height: 30px;'>&nbsp;</p>";
        echo "      <div class='control-group'>";
        echo "          <label class='control-label'>";
        echo "              Hora Início:";
        echo "          </label>";
        echo "          <div class='control'>";
        echo "              <select name='horaInicio' id='horaInicio'>";
        echo "                  <option value='08:00'>08:00</option>";
        echo "                  <option value='08:00'>08:30</option>";
        echo "                  <option value='08:00'>09:00</option>";
        echo "                  <option value='08:00'>09:30</option>";
        echo "                  <option value='08:00'>10:00</option>";
        echo "                  <option value='08:00'>10:30</option>";
        echo "                  <option value='08:00'>11:00</option>";
        echo "                  <option value='08:00'>11:30</option>";
        echo "                  <option value='08:00'>12:00</option>";
        echo "                  <option value='08:00'>12:30</option>";
        echo "                  <option value='08:00'>13:00</option>";
        echo "                  <option value='08:00'>13:30</option>";
        echo "                  <option value='08:00'>14:00</option>";
        echo "                  <option value='08:00'>14:30</option>";
        echo "                  <option value='08:00'>15:00</option>";
        echo "                  <option value='08:00'>15:30</option>";
        echo "                  <option value='08:00'>16:00</option>";
        echo "                  <option value='08:00'>16:30</option>";
        echo "                  <option value='08:00'>17:00</option>";
        echo "                  <option value='08:00'>17:30</option>";
        echo "                  <option value='08:00'>18:00</option>";
        echo "                  <option value='08:00'>18:30</option>";
        echo "                  <option value='08:00'>19:00</option>";
        echo "                  <option value='08:00'>19:30</option>";
        echo "                  <option value='08:00'>20:00</option>";
        echo "                  <option value='08:00'>20:30</option>";
        echo "                  <option value='08:00'>21:00</option>";
        echo "                  <option value='08:00'>21:30</option>";
        echo "                  <option value='08:00'>22:00</option>";
        echo "                  <option value='08:00'>22:30</option>";
        echo "              </select>";
        echo "          </div>";
        echo "      </div>";
        echo "      <p style='height: 30px;'>&nbsp;</p>";
        echo "      <div class='control-group'>";
        echo "          <label class='control-label'>";
        echo "              Hora Final:";
        echo "          </label>";
        echo "          <div class='control'>";
        echo "              <select name='horaFinal' id='horaFinal'>";
        echo "                  <option value='08:00'>08:00</option>";
        echo "                  <option value='08:00'>08:30</option>";
        echo "                  <option value='08:00'>09:00</option>";
        echo "                  <option value='08:00'>09:30</option>";
        echo "                  <option value='08:00'>10:00</option>";
        echo "                  <option value='08:00'>10:30</option>";
        echo "                  <option value='08:00'>11:00</option>";
        echo "                  <option value='08:00'>11:30</option>";
        echo "                  <option value='08:00'>12:00</option>";
        echo "                  <option value='08:00'>12:30</option>";
        echo "                  <option value='08:00'>13:00</option>";
        echo "                  <option value='08:00'>13:30</option>";
        echo "                  <option value='08:00'>14:00</option>";
        echo "                  <option value='08:00'>14:30</option>";
        echo "                  <option value='08:00'>15:00</option>";
        echo "                  <option value='08:00'>15:30</option>";
        echo "                  <option value='08:00'>16:00</option>";
        echo "                  <option value='08:00'>16:30</option>";
        echo "                  <option value='08:00'>17:00</option>";
        echo "                  <option value='08:00'>17:30</option>";
        echo "                  <option value='08:00'>18:00</option>";
        echo "                  <option value='08:00'>18:30</option>";
        echo "                  <option value='08:00'>19:00</option>";
        echo "                  <option value='08:00'>19:30</option>";
        echo "                  <option value='08:00'>20:00</option>";
        echo "                  <option value='08:00'>20:30</option>";
        echo "                  <option value='08:00'>21:00</option>";
        echo "                  <option value='08:00'>21:30</option>";
        echo "                  <option value='08:00'>22:00</option>";
        echo "                  <option value='08:00'>22:30</option>";
        echo "              </select>";
        echo "          </div>";
        echo "      </div>";
        echo "      <p style='height: 30px;'>&nbsp;</p>";
        echo "  </div>";
        echo "</form>";        
        echo "</div>";        
    }
    
    public function listaEvento(){
        ini_set("memory_limit", "24M");
        
        
        
    }
    
}
