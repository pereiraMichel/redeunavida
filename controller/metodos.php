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

}