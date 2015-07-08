<?php


class menu {

    public function menuBaixo(){
    
    echo "	<footer id='footer'>";
    echo "		<nav class='navbar navbar-default navbar-fixed-bottom' role='navigation'>";
    echo "			<div class='navbar-header'>";
    echo "				<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>";
    echo "					<span class='sr-only'>Menu</span>";
    echo "					<span class='icon-bar'></span>";
    echo "					<span class='icon-bar'></span>";
    echo "					<span class='icon-bar'></span>";
    echo "				</button>";
    echo "				<a class='navbar-brand' href='index.php'>";
//<!--					<img src="assets/images/unesp.png" alt="UNESP" class="hidden-sm hidden-xs">
//					<img src="assets/images/unesp_sm.png" alt="UNESP" class="visible-sm visible-xs">-->
    echo "				</a><!-- /navbar-brand -->";
    echo "			</div>";
    echo "			<div class='collapse navbar-collapse' id='example-navbar-collapse'>";
    echo "				<ul class='nav navbar-nav navbar-right' id='menu'>";
    echo "					<li class='active' id='home'>";
    echo "						<a href='index.php'>";
    echo "							<i class='fa icon-home'></i> Home";
    echo "						</a>";
    echo "					</li>";
    echo "					<li id='quemsomos'>";
    echo "						<a href='#'>";
    echo "							<i class='fa fa-book'></i> Quem Somos";
    echo "						</a>";
    echo "					</li>";
    echo "					<li id='programacao'>";
    echo "						<a href='#'>";
    echo "							<i class='fa fa-puzzle-piece'></i> Programação";
    echo "						</a>";
    echo "					</li>";
    echo "					<li id='galeria'>";
    echo "						<a href='#'>";
    echo "							<i class='fa fa-ticket'></i> Galeria";
    echo "						</a>";
    echo "					</li>";
    echo "					<li id='sugestoes'>";
    echo "						<a href='#'>";
    echo "							<i class='fa fa-comment'></i> Sugestões";
    echo "						</a>";
    echo "					</li>";
    echo "					<li id='sistema'>";
    echo "						<a href='#'>";
    echo "							<i class='fa fa-th'></i> Sistema";
    echo "						</a>";
    echo "					</li>";
    echo "					<li class='dropdown'>";
    echo "						<a href='#' class='dropdown-toggle' data-toggle='dropdown'>";
    echo "							<i class='fa fa-globe'></i> Acompanhe";
    echo "						</a>";
    echo "					    <ul class='dropdown-menu'>";
    echo "                                                <li id='agenda'>";
    echo "                                                        <a href='#'>";
    echo "                                                                <i class='fa fa-dashboard'></i> Agenda";
    echo "                                                        </a>";
    echo "                                                </li>";
    echo "                                                <li id='retiro'>";
    echo "                                                        <a href='#'>";
    echo "                                                                <i class='fa fa-group'></i> Retiro";
    echo "                                                        </a>";
    echo "                                                </li>";
    echo "                                                <li id='calendario'>";
    echo "                                                        <a href='#'>";
    echo "                                                                <i class='fa fa-calendar'></i> Calendário";
    echo "                                                        </a>";
    echo "                                                </li>";
    echo "					    </ul>";
    echo "					</li>";
    echo "					<li id='contato'>";
    echo "						<a href='contato.php'>";
    echo "							<i class='fa fa-envelope-o'></i> Contato";
    echo "						</a>";
    echo "					</li>";
    echo "				</ul>";
    echo "			</div>";
    echo "		</nav>";
    echo "	</footer><!-- /footer -->";
    
    }
    
}
