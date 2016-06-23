<?php

class metodos{

    public function menuDrop(){

        echo "<div class='btn-group-vertical' role='group'>";
//        echo "  <a id='dLabel' data-target='#' href='#' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>";
        echo "<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
        echo "      MENU";
        echo "      <span class='caret'></span>";
        echo "</button>";
//        echo "  </a>";//<ul class="dropdown-menu" aria-labelledby="dropdownMenu4">
        echo "  <ul class='dropdown-menu'>";
        echo "      <li>Menu1</li>";
        echo "      <li>Menu2</li>";
//        echo "      <li>Menu3</li>";
//        echo "      <li>Menu4</li>";
//        echo "      <li>Menu5</li>";
        echo "  </ul>";
        echo "</div>";
        
//        				<li class="dropdown">
//						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
//							<i class="fa fa-globe"></i> Acompanhe
//						</a>
//					    <ul class="dropdown-menu">
//                                                <li id="agenda">
//                                                    <a href="agenda.php">
//                                                                <i class="fa fa-dashboard"></i> Agenda
//                                                        </a>
//                                                </li>
//					    </ul>
//					</li>

    }
    
    public function modalAviso(){
        echo "<div class='modal fade' id='avisoMais' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>";
        echo "  <div class='modal-dialog' role='document'>";
        echo "      <div class='modal-content'>";
        echo "          <div class='modal-header'>";
        echo "              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
        echo "                  <span aria-hidden='true'>&times;</span>";
        echo "              </button>";
        echo "              <h4 class='modal-title' id='myModalLabel' style='color: #3F6CA1;'>";
        echo "                  <img src='images/logoRUV50x51.png'/> RedeUnaViva - <small style='color: #3F6CA1;'>Sobre MAIS...</small></h4>";
        echo "          </div>";
        echo "          <div class='modal-body'>";
        $this->avisoMais();
        echo "          </div>";
        echo "          <div class='modal-footer' style='padding-right: 50px;'>";
        echo "               <button type='button' class='btn btn-primary' data-dismiss='modal'>Entendi</button>";
        echo "          </div>";
        echo "          <br/>";
        echo "      </div>";
        echo "  </div>";
        echo "</div>";
    }

    public function avisoMais(){
        echo "<div style='text-align: justify;'>";
        echo "As atividades aqui sugeridas são indicadas devido à sua afinidade com a proposta da RedeUnaViva.<br/><br/>";
        echo "No entanto, elas são particulares e de responsabilidade exclusiva dos profissionais que as oferecem e mantém.<br/><br/>";
        echo "A RUV não possui qualquer ingerência sobre o seu funcionamento. Qualquer dúvida ou dificuldade na sua utilização deverá ser resolvida entre o usuário e o responsável pela atividade. Mas somos sensíveis às críticas e, portanto, aberto aos seus comentários, que pesarão na indicação por nós feita.<br/><br/>";
        echo "Indicamos, até o momento:<br/><br/>";
        echo "<span style='color: red; font-weight: bold;'>Yoga</span> com os professores Eduardo Quintela e Heiko Hoschke.<br/><br/>";
        echo "<span style='color: red; font-weight: bold;'>Roda dos Sonhos</span> e <span style='color: red; font-weight: bold;'>Transcurso Transpessoal</span> que são duas atividades coordenadas pelo idealizador da RUV, Luiz Carlos Bernal, constituindo parte do seu trabalho de profissional autônomo, médico e psicoterapeuta.";
        echo "</div>";
    }
    
    public function tabelaAtividades(){
        echo "<table class='table table-condensed' style='width: 300px;'>";
        echo "  <tr>";
        echo "      <td class='info' style='text-align: left;'>Atividades semanais</td>";
        echo "  </tr>";
        echo "  <tr>";
        echo "      <td class='warning' style='text-align: center;'>Atividades mensais</td>";
        echo "  </tr>";
        echo "  <tr>";
        echo "      <td class='success' style='text-align: right;'>Atividades trimestrais</td>";
        echo "  </tr>";
        echo "  <tr>";
        echo "      <td class='warning' style='text-align: center;'>Jornada de Meditação (Primavera e Outono)</td>";
        echo "  </tr>";
        echo "</table>";
        
    }

    
}