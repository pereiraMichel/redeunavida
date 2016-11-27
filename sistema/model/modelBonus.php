<?php

/*
 * Tabuleta de Bônus
 */
class modelBonus {
    
    public function telaBonus(){
        $tarefa = filter_input(INPUT_GET, 't');
        
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
        echo "          <a href='inicio.php?m=bonus&t=registros' target='_self'>";
        echo "              <img src='../img/registro1.jpg' title='Registros' width='150' height='150' class='img-responsive'>";
        echo "              <h5>Registros</h5>";
        echo "          </a>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='col-xs-6 col-sm-6 col-md-6 placeholder'>";
        echo "      <div class='text-center'>";
        echo "          <a href='inicio.php?m=bonus&t=indice' target='_self'>";
        echo "              <img src='../img/analiseEstatistica.png' title='Registros' width='150' height='150' class='img-responsive'>";
        echo "              <h5>Índice Investimento</h5>";
        echo "          </a>";
        echo "      </div>";
        echo "  </div>";
        echo "</div>";
        echo "<br/><br/>";
        echo "<div class='row'>";
        echo "  <div class='col-xs-12 col-sm-12 col-md-12' id='btnSairEscolha'>";
        echo "      <a href='javascript: history.go(-1)' target='_self'>";
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
        
        $link = filter_input(INPUT_GET, 'me');
        
        echo "<div class='row'>";
        echo "  <div class='col-xs-12 col-sm-12 col-md-12'>";
        echo "      <form class='form-horizontal' name='formBonus' action='#' method='post'>";
        echo "          <div class='form-group'>";
        echo "              <label class='col-sm-2 control-label'>";
        echo "                  Meditação";
        echo "              </label>";
        echo "              <div class='col-sm-2'>";
        echo "                  <select name='meditacao' class='form-control' onselect='javascript:preenchimento(".$link.", this.value)'>";
        echo "                      <option value='pm'>PM</option>";
        echo "                      <option value='pn'>PN</option>";
        echo "                      <option value='corpo'>Corpo</option>";
        echo "                  </select>";
        echo "              </div>";
        echo "          </div>";
        echo "          <div class='form-group'>";
        echo "              <label class='col-sm-2 control-label'>";
        echo "                  &nbsp;";
        echo "              </label>";
        echo "              <div class='col-sm-2'>";
        echo "                  <select name='tipoMeditacao' class='form-control'>";
        echo "                      <option value='sonho'>Sonho</option>";
        echo "                      <option value='completacao'>Completação</option>";
        echo "                      <option value='retrospectiva'>Retrospectiva</option>";
        echo "                      <option value='exercicio'>Exercício</option>";
        echo "                  </select>";
        echo "              </div>";
        echo "          </div>";
        echo "      </form>";
        echo "  </div>";
        echo "</div>";
        
    }
    
    public function metodoManual(){
        echo "<div class='row'>";
        echo "  <div class='col-xs-12 col-sm-12 col-md-12'>";
        echo "      <form class='form-horizontal' name='formBonus' action='#' method='post'>";
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
        echo "      </form>";
        echo "  </div>";
        echo "</div>";
        
    }
    
    public function registroBonus(){
        echo "<div class='row'>";
        echo "  <div class='col-xs-12 col-sm-12 col-md-12 placeholder'>";
        echo "      <div class='text-center'>";
        echo "          <h4><b>Registro de Bônus - RUV Tabuleta</b></h4>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='col-xs-6 col-sm-6 col-md-6'>";
        echo "      <div align='right'>";
        echo "          <h5>Tipo de Preenchimento: </h5>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='col-xs-6 col-sm-6 col-md-6'>";
        echo "      <div align='left'>";
        
        $metodo = filter_input(INPUT_GET, 'me');
        
        if($metodo != ""){
            $this->metodo($metodo);
        }else{
            echo "      <div class='radio'>";
            echo "          <input type='radio' name='preenchimento' id='automatico' value='automatico' onclick='direcionaBonus(this.value)'> Automático";
//            echo "          <br/>";
            echo "          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            echo "          <input type='radio' name='preenchimento' id='manual' value='manual' onclick='direcionaBonus(this.value)'> Manual";
            echo "      </div>";
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
        echo "      <a href='inicio.php?m=bonus' target='_self'>";
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
