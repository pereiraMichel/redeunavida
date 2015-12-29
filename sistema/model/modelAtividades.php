<?php


class modelAtividades {
    
    
    
    public function telaAtividades(){
        
    }
    
    public function telaInicialAtividades(){
        echo "<div class='row' id='telaEscolha'>";
        echo "  <div class='col-xs-6 col-sm-6 col-md-6 placeholder'>";
        echo "      <div class='text-center'>";
        echo "          <a href='inicio.php?menu=atividades&tarefa=tarefas' target='_self'>";
        echo "              <img src='../img/registro1.jpg' title='Registros' width='150' height='150' class='img-responsive'>";
        echo "              <h5>Tarefas</h5>";
        echo "          </a>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='col-xs-6 col-sm-6 col-md-6 placeholder'>";
        echo "      <div class='text-center'>";
        echo "          <a href='inicio.php?menu=atividades&tarefa=bonus' target='_self'>";
        echo "              <img src='../img/analiseEstatistica.png' title='Registros' width='150' height='150' class='img-responsive'>";
        echo "              <h5>Tabuleta de Bônus</h5>";
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
    
}
