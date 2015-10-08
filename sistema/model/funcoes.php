<?php

//FUNÇÕES EM PHP


function deletaTelefone($idTelefone, $telefone){
        echo "<!-- Modal -->";
        echo "<div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>";
        echo "  <div class='modal-dialog' role='document'>";
        echo "    <div class='modal-content'>";
        echo "      <div class='modal-header'>";
        echo "        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        echo "        <h4 class='modal-title' id='myModalLabel'>Confirmação de exclusão</h4>";
        echo "      </div>";
        echo "      <div class='modal-body'>";
        echo "          <input type='hidden' value='".$idTelefone."'>";
        echo "              Deseja excluir o telefone ".$telefone." ?";
        echo "      </div>";
        echo "      <div class='modal-footer'>";
        echo "        <button type='button' class='btn btn-default' data-dismiss='modal'>Não</button>";
        echo "        <button type='button' class='btn btn-primary'>Sim</button>";
        echo "      </div>";
        echo "    </div>";
        echo "  </div>";
        echo "</div>";
    
}
