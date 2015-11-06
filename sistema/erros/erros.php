<?php

//Classes de erros.


class erros {
    
    public function error404(){
        echo "<br/><br/>";
        echo "<div class='col-xs-12 col-md-12 col-sm-12'>";
        echo "  <div class='alert alert-danger'>";
        echo "      A página não pode ser exibida. Pode estar em manutenção. Lamentamos o transtorno, o problema está em etapa de solução.";
        echo "  </div>";
        echo "<br/><br/>";
        echo "  <a href='inicio.php' class='btn btn-primary btn-sm'>Voltar à página inicial</a>";
        echo "</div>";
        
    }
    
    
}
