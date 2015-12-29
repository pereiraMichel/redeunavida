<?php

/*
 * Tabuleta de Bônus
 */
class modelBonus {
    
    public function telaBonus(){
        $tarefa = filter_input(INPUT_GET, 'tarefa');
        
        switch ($tarefa){
            
            case "" : $this->telaInicialBonus();
                break;
            
            case "registros" : $this->registroBonus();
                break;
            
            case "indice" : $this->indiceInvestimento();
                break;
            
        }
        
//        
//        if(filter_input(INPUT_GET, 'tarefa') == "registros"){
//            echo "<script>document.getElementById('telaEscolha').style.display='none'</script>";
//            echo "<script>document.getElementById('btnSairEscolha').style.display='none'</script>";
//            $this->registroBonus();
//        }
//        else if(filter_input(INPUT_GET, 'tarefa') == 'indice'){
//            echo "<script>document.getElementById('telaEscolha').style.display='none'</script>";
//            echo "<script>document.getElementById('btnSairEscolha').style.display='none'</script>";
//            $this->indiceInvestimento();
//        }
        
    }
    
    public function telaInicialBonus(){
        echo "<div class='row' id='telaEscolha'>";
        echo "  <div class='col-xs-6 col-sm-6 col-md-6 placeholder'>";
        echo "      <div class='text-center'>";
        echo "          <a href='inicio.php?menu=bonus&tarefa=registros' target='_self'>";
        echo "              <img src='../img/registro1.jpg' title='Registros' width='150' height='150' class='img-responsive'>";
        echo "              <h5>Registros</h5>";
        echo "          </a>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='col-xs-6 col-sm-6 col-md-6 placeholder'>";
        echo "      <div class='text-center'>";
        echo "          <a href='inicio.php?menu=bonus&tarefa=indice' target='_self'>";
        echo "              <img src='../img/analiseEstatistica.png' title='Registros' width='150' height='150' class='img-responsive'>";
        echo "              <h5>Índice Investimento</h5>";
        echo "          </a>";
        echo "      </div>";
        echo "  </div>";
        echo "</div>";
        echo "<br/><br/>";
        echo "<div class='row'>";
        echo "  <div class='col-xs-12 col-sm-12 col-md-12' id='btnSairEscolha'>";
        echo "      <a href='inicio.php' target='_self'>";
        echo "          <button class='btn btn-default'>";
        echo "              Sair";
        echo "          </button>";
        echo "      </a>";
        echo "  </div>";
        echo "</div>";
        
    }
    
    public function metodo($metodo){
        
        if($metodo == "automatico"){
            $nomeMetodo = "Automático";
        }else{
            $nomeMetodo = "Manual";
        }
        
        echo "      <div align='left'>";
        echo "              <h5>".$nomeMetodo."</h5>";
        echo "      </div>";
        
    }
        
    public function metodoAutomatico(){
        
        echo "<div class='row'>";
        echo "  <div class='col-xs-12 col-sm-12 col-md-12'>";
        echo "      <form class='form-horizontal' name='formBonus' action='inicio.php?menu=bonus&tarefa=registros&metodo=automatico' method='post'>";
        echo "          <div class='form-group'>";
        echo "              <label class='col-sm-2 control-label'>";
        echo "                  Meditação";
        echo "              </label>";
        echo "              <div class='col-sm-2'>";
        echo "                  <select name='meditacao' class='form-control'>";
        echo "                      <option value='pm'>PM</option>";
        echo "                      <option value='pn'>PN</option>";
        echo "                      <option value='corpo'>Corpo</option>";
        echo "                  </select>";
        echo "              </div>";
        echo "              <div class='col-sm-2'>";
        echo "                  <select name='tipoMeditacao' class='form-control'>";
        echo "                      <option value='pm'>PM</option>";
        echo "                      <option value='pn'>PN</option>";
        echo "                      <option value='corpo'>Corpo</option>";
        echo "                  </select>";
        echo "              </div>";
        echo "          </div>";
//        echo "          <div class='table-responsive'>";
//        echo "              <table class='table'>";
//        echo "                  <tr>";
//        echo "                      <td>";
//        echo "                          Meditação";
//        echo "                      </td>";
//        echo "                      <td>";
//        echo "                          &nbsp;";
//        echo "                      </td>";
//        echo "                      <td>";
//        echo "                          Início";
//        echo "                      </td>";
//        echo "                      <td>";
//        echo "                          Término";
//        echo "                      </td>";
//        echo "                      <td>";
//        echo "                          Duração";
//        echo "                      </td>";
//        echo "                      <td>";
//        echo "                          Nível";
//        echo "                      </td>";
//        echo "                  </tr>";
//        echo "                  <tr>";
//        echo "                      <td for='meditacao'>";
//        echo "                          PM";
//        echo "                      </td>";
//        echo "                      <td for='atividade'>";
//        echo "                          Sonho";
//        echo "                      </td>";
//        echo "                      <td for='inicio'>";
//        echo "                          <input type='checkbox' name='inicioSonho' id='inicioSonho'>";
//        echo "                      </td>";
//        echo "                      <td for='termino'>";
//        echo "                          <input type='checkbox' name='terminoSonho' id='terminoSonho'>";
//        echo "                      </td>";
//        echo "                      <td for='duracao'>";
//        echo "                          <input type='text' class='col-sm-3' name='duracaoSonho' id='duracaoSonho'>";
//        echo "                      </td>";
//        echo "                      <td for='nivel'>";
//        echo "                          <input type='text' class='col-sm-3' name='nivelSonho' id='nivelSonho'>";
//        echo "                      </td>";
//        echo "                  </tr>";
//        echo "                  <tr>";
//        echo "                      <td for='meditacao'>";
//        echo "                          &nbsp;";
//        echo "                      </td>";
//        echo "                      <td for='atividade'>";
//        echo "                          Completação";
//        echo "                      </td>";
//        echo "                      <td for='inicio'>";
//        echo "                          <input type='checkbox' name='inicioCompletacao' id='inicioCompletacao'>";
//        echo "                      </td>";
//        echo "                      <td for='termino'>";
//        echo "                          <input type='checkbox' name='terminoCompletacao' id='terminoCompletacao'>";
//        echo "                      </td>";
//        echo "                      <td for='duracao'>";
//        echo "                          <input type='text' class='col-sm-3' name='duracaoCompletacao' id='duracaoSonho'>";
//        echo "                      </td>";
//        echo "                      <td for='nivel'>";
//        echo "                          <input type='text' class='col-sm-3' name='nivelCompletacao' id='nivelSonho'>";
//        echo "                      </td>";
//        echo "                  </tr>";
//        echo "                  <tr>";
//        echo "                      <td for='meditacao'>";
//        echo "                          PN"; //Parte Noite
//        echo "                      </td>";
//        echo "                      <td for='atividade'>";
//        echo "                          Retrospectiva";
//        echo "                      </td>";
//        echo "                      <td for='inicio'>";
//        echo "                          <input type='checkbox' name='inicioRetrospectiva' id='inicioRetrospectiva'>";
//        echo "                      </td>";
//        echo "                      <td for='termino'>";
//        echo "                          <input type='checkbox' name='terminoRetrospectiva' id='terminoRetrospectiva'>";
//        echo "                      </td>";
//        echo "                      <td for='duracao'>";
//        echo "                          <input type='text' class='col-sm-3' name='duracaoRetrospectiva' id='duracaoRetrospectiva'>";
//        echo "                      </td>";
//        echo "                      <td for='nivel'>";
//        echo "                          <input type='text' class='col-sm-3' name='nivelRetrospectiva' id='nivelRetrospectiva'>";
//        echo "                      </td>";
//        echo "                  </tr>";
//        echo "              </table>";
//        echo "          </div>";
        echo "      </form>";
        echo "  </div>";
        echo "</div>";
        
    }
    
    public function metodoManual(){
        
    }
    
    public function registroBonus(){
        echo "<div class='row'>";
        echo "  <div class='col-xs-12 col-sm-12 col-md-12 placeholder'>";
        echo "      <div class='text-center'>";
//        echo "              <img src='../img/registro1.jpg' title='Registros' width='150' height='150' class='img-responsive'>";
        echo "              <h4><b>Registro de Bônus - RUV Tabuleta</b></h4>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='col-xs-6 col-sm-6 col-md-6'>";
        echo "      <div align='right'>";
        echo "          <h5>Tipo de Preenchimento: </h5>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='col-xs-6 col-sm-6 col-md-6'>";
        echo "      <div align='left'>";
        
        $metodo = filter_input(INPUT_GET, 'metodo');
        
        if($metodo != ""){
            $this->metodo($metodo);
            
        }else{
            echo "          <div class='radio'>";
            echo "              <input type='radio' name='preenchimento' id='automatico' value='automatico' onclick='javascript:direcionaBonus()'> Automático";
            echo "              <br/>";
            echo "              <input type='radio' name='preenchimento' id='manual' value='manual' onclick='javascript:direcionaBonus()'> Manual";
            echo "          </div>";
        }
        echo "      </div>";
        echo "  </div>";
        echo "</div>";
        echo "<br/><br/>";
        
        if($metodo == "automatico"){
            $this->metodoAutomatico();
        }
        
        echo "<br/><br/>";
        
        echo "<div class='row'>";
        echo "  <div class='col-xs-12 col-sm-12 col-md-12'>";
        echo "      <a href='inicio.php?menu=bonus' target='_self'>";
        echo "          <button class='btn btn-default'>";
        echo "              Sair";
        echo "          </button>";
        echo "      </a>";
        echo "  </div>";
        echo "</div>";
        
        
    }
    
    public function indiceInvestimento(){
        
    }
    
}
