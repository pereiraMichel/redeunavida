<?php

//require_once '../model/modelFoto.php';

class telas {

    public function menuSuperior($autoriza, $usuario, $idUsuario){

//    $foto = new modelFoto();
//    $foto->setIdUsuario($idUsuario);
    
    echo "<nav class='navbar navbar-default navbar-fixed-top' role='navigation' style='background-color: #D9EDF7'>";
    echo "  <div class='navbar-header navbar-text-top'>";
    echo "      <div class='col-sm-2' style='height: 25px;'>";
    echo "          <div style='padding: 10px 100px 0px 0px;'>";
    echo "              SISTEMA <span>RUV</span>";
    echo "          </div>";
    echo "      </div>";
    echo "  </div>";

    echo "  <div class='collapse navbar-collapse' style='padding-right: 20px;'>";
    echo "      <ul class='nav navbar-nav navbar-right' id='menu' style='font-size: 12px; padding-right: 20px;'>";
    
    echo "          <li id='perfil' class='dropdown'>";
    echo "              <a tabindex='0' data-toggle='dropdown'>";
//    echo "                  <a class='navbar-band' href='#'>";
////    echo                        $foto->consultaFoto();
//    echo "                  </a> ";
    echo "                  <i class='fa fa-user'></i> ";
    echo                        $usuario;
    echo "                  <span class='caret'></span>";
    echo "              </a>";
    echo "              <ul class='dropdown-menu' role='menu' style='font-size: 12px;'>";
    echo "                  <li>";
    echo "                      <a tabindex='0' href='inicio.php?m=perf'>";
    echo "                          Sobre você";
    echo "                      </a>";
    echo "                  </li>";
    echo "                  <li>";
    echo "                      <a tabindex='0' href='inicio.php?m=perfend'>";
    echo "                          Seu endereço";
    echo "                      </a>";
    echo "                  </li>";
    echo "                  <li>";
    echo "                      <a tabindex='0' href='inicio.php?m=perftel'>";
    echo "                          Telefones";
    echo "                      </a>";
    echo "                  </li>";
    echo "                  <li>";
    echo "                      <a tabindex='0' href='inicio.php?m=trocasenha'>";
    echo "                          Troca de Senha";
    echo "                      </a>";
    echo "                  </li>";
    echo "                  <li role='separator' class='divider'>";
    echo "                  </li>";
    echo "                  <li>";
    echo "                      <a href='inicio.php?saida=sim' class='text-danger' style='padding-right: 15px;'>";
    echo "                              <i class='fa fa-power-off'></i> ";
    echo "                                  Sair";
    echo "                      </a>";
    echo "                  </li>";
    echo "              </ul>";
    echo "          </li>";//fecha li perfil


    echo "          <li class='dropdown mega-dropdown'>";//inicia li MenuBar
    echo "              <a id='menu-toggle' class='btn btn-dark btn-lg toggle dropdown-toggle' data-toggle='dropdown'>";
    echo "                  <i class='fa fa-bars'></i>";
    echo "              </a>";
    echo "              <ul class='dropdown-menu' role='menu' style='font-size: 12px;' aria-labelledby='dLabel'>";
    echo "                  <li>";
    echo "                      <a href='inicio.php'>";
    echo "                          <i class='fa icon-home'></i> Início";
    echo "                      </a>";
    echo "                  </li>";
    
    echo "                  <li id='atividade'>";
//    echo "                  <li class='dropdown-submenu' id='atividade'>";
//    echo "                      <a tabindex='0' class='dropdown-toggle' role='button' data-toggle='dropdown'>";
    echo "                      <a tabindex='-1' href='inicio.php?m=atividades'>";
    echo "                          <i class='fa fa-archive'></i> Atividades";
    echo "                      </a>";
//    echo "                      <ul class='dropdown-menu mega-dropdown-menu' style='font-size: 12px;'>";
//    echo "                          <li>";
//    echo "                              <a tabindex='0' href='inicio.php?menu=bonus'>";
//    echo "                                  <i class='fa fa-group'></i> Tabuleta de Bônus";
//    echo "                              </a>";
//    echo "                          </li>";
//    echo "                          <li>";
//    echo "                              <a tabindex='0' href='inicio.php?menu=tarefa'>";
//    echo "                                  <i class='fa fa-clock-o'></i> Tarefas";
//    echo "                              </a>";
//    echo "                          </li>";
//    echo "                      </ul>";
    echo "                  </li>";
    
    echo "                  <li id='relatorio'>";
    echo "                      <a tabindex='0' href='inicio.php?m=rela'>";
    echo "                          <i class='fa fa-list'></i> Relatórios";
    echo "                      </a>";
//    echo "                      <ul class='dropdown-menu' role='menu' style='font-size: 12px;'>";
//    echo "                          <li>";
//    echo "                              <a tabindex='0' href='inicio.php?menu=relbonus'>";
//    echo "                                  Bônus";
//    echo "                              </a>";
//    echo "                          </li>";
//    echo "                          <li>";
//    echo "                              <a tabindex='0' href='inicio.php?menu=reltarefas'>";
//    echo "                                  Tarefas";
//    echo "                              </a>";
//    echo "                          </li>";
//    echo "                          <li>";
//    echo "                              <a tabindex='0' href='inicio.php?menu=reljornadas'>";
//    echo "                                  Jornadas";
//    echo "                              </a>";
//    echo "                          </li>";
//    echo "                          <li>";
//    echo "                              <a tabindex='0' href='inicio.php?menu=relparagem'>";
//    echo "                                  Paragem";
//    echo "                              </a>";
//    echo "                          </li>";
//    echo "                          <li>";
//    echo "                              <a tabindex='0' href='inicio.php?menu=relusuarios'>";
//    echo "                                  Usuários";
//    echo "                              </a>";
//    echo "                          </li>";
//    echo "                      </ul>";//fecha submenu relatórios
    echo "                   </li>";//fecha relatórios

                if($autoriza){
                    echo "  <li id='configuracoes'>";
                    echo "      <a tabindex='0' href='inicio.php?m=config'>";
                    echo "          <i class='fa fa-windows'></i> Configurações";
                    echo "      </a>";
//                    echo "      <ul class='dropdown-menu' role='menu' style='font-size: 12px;'>";
//                    echo "          <li>";
//                    echo "              <a href='inicio.php?menu=configUsuario'>Usuários</a>";
//                    echo "          </li>";
//                    echo "          <li>";
//                    echo "              <a href='inicio.php?menu=configUsuarioSite'>Usuários do Site</a>";
//                    echo "          </li>";
//                    echo "      </ul>";
                    echo "  </li>";//fecha li configurações
                }
            
    echo "                  <li id='suporte'>";
    echo "                      <a href='inicio.php?m=suporte'>";
    echo "                          <i class='fa fa-cloud'></i> ";
    echo "                              Suporte";
    echo "                      </a>";
    echo "                  </li>";//fecha li suporte
    
    echo "              </ul>";//fecha ul MenuBar (dropdown-menu)
    echo "          </li>";//fecha li bar
    echo "      </ul>";//Fecha ul navbar
    echo "  </div>";
    echo "</nav>";
    
        
    }
    
    public function menuBaixo($usuario){
	echo "<nav class='navbar navbar-default navbar-fixed-bottom' role='navigation' style='background-color: #D9EDF7'>";
	echo "  <div class='text-center'>";
        echo "          <div class='col-xs-6 col-sm-6'>";
        echo "                      <a href='inicio.php'>";
        echo "                          <img src='../../images/logoRedeUnaVida.png' title='".TITULORUVBAIXO."' width='75' height='61'>";
        echo "                      </a>";
	echo "          </div>";
        echo "          <div class='col-xs-6 col-sm-6'>";
        echo "                      <a href='inicio.php'>";
        echo "                          <img src='../../images/logoJrColor.png' title='".TITULOJRBAIXO."' width='75' height='61' />";
        echo "                      </a>";
        echo "          </div>";
//        echo "              <div class='hidden-sm'>";
//        echo "                  Bem-vindo, <span>".$usuario."</span>";
////                                                    echo "Bem-vindo, <span>".$_SESSION['usuario']."</span>";
//        echo "              </div>";
//	echo "          </div>";
//	echo "          <hr class='visible-xs'><!-- /hr -->";
//	echo "          <br class='visible-xs'>";
        //_SESSION['usuario']
//        echo "          <div class='col-sm-4'>";
//	echo "              <div class='navbar-text navbar-right'>";
//        echo "                  <a href='inicio.php?saida=sim' class='text-danger' style='padding-right: 15px;'>";
//        echo "                      <button class='btn btn-danger'>";
//        echo "                          <i class='fa fa-power-off'></i> ";
//        echo "                              Sair";
//        echo "                      </button>";
//        echo "                  </a>";
//	echo "              </div>";
//        echo "              <br class='visible-xs'>";
//	echo "          </div><!-- /col-sm-4 -->";
//        echo "      </div>";
	echo "  </div>";//Centraliza as imagens
	echo "</nav>";
        
    }
    
    
    public function menuBars(){
    echo "<a id='menu-toggle' href='#' class='btn btn-dark btn-lg toggle'><i class='fa fa-bars'></i></a>";
    echo "<nav id='sidebar-wrapper'>";
    echo "  <ul class='sidebar-nav'>";
    echo "      <a id='menu-close' href='#' class='btn btn-light btn-lg pull-right toggle'><i class='fa fa-times'></i></a>";
    echo "      <li class='sidebar-brand dropdown' data-toggle='dropdown'>";
    echo "          <i class='fa fa-user'></i> ";
    echo                $usuario;
    echo "              <span class='caret'></span>";
    echo "              <ul class='dropdown-menu' role='menu' style='font-size: 12px;'>";
    echo "                  <li>";
    echo "                      <a tabindex='0' href='inicio.php?m=perfilsv'>";
    echo "                          Sobre você";
    echo "                      </a>";
    echo "                  </li>";
    echo "                  <li>";
    echo "                      <a tabindex='0' href='inicio.php?m=perfilend'>";
    echo "                          Seu endereço";
    echo "                      </a>";
    echo "                  </li>";
    echo "                  <li>";
    echo "                      <a tabindex='0' href='inicio.php?m=perfiltel'>";
    echo "                          Telefones";
    echo "                      </a>";
    echo "                  </li>";
    echo "                  <li>";
    echo "                      <a tabindex='0' href='inicio.php?m=trocasenha'>";
    echo "                          Troca de Senha";
    echo "                      </a>";
    echo "                  </li>";
    echo "                  <li role='separator' class='divider'>";
    echo "                  </li>";
    echo "                  <li>";
    echo "                      <a href='inicio.php?saida=sim' class='text-danger' style='padding-right: 15px;'>";
//    echo "                          <button class='btn btn-danger'>";
    echo "                              <i class='fa fa-power-off'></i> ";
    echo "                                  Sair";
//    echo "                          </button>";
    echo "                      </a>";
    echo "                  </li>";
    echo "              </ul>";
    echo "      </li>";
    echo "      <li id='home'>";
    echo "          <a href='inicio.php'>";
    echo "              <i class='fa icon-home'></i> Início";
    echo "          </a>";
    echo "      </li>";
    echo "      <li>";
    echo "          <a href='#top' onclick = $('#menu-close').click(); >Início</a>";
    echo "      </li>";
//            <li>
//                <a href="#about" onclick = $("#menu-close").click(); >About</a>
//            </li>
//            <li>
//                <a href="#services" onclick = $("#menu-close").click(); >Services</a>
//            </li>
//            <li>
//                <a href="#portfolio" onclick = $("#menu-close").click(); >Portfolio</a>
//            </li>
//            <li>
//                <a href="#contact" onclick = $("#menu-close").click(); >Contact</a>
//            </li>
    echo "  </ul>";
    echo "</nav>";
        
    }
    
    public function conteudoPodre(){
//    echo "          </li>";

    
//    echo "          <li id='home'>";
//    echo "              <a href='inicio.php'>";
//    echo "                  <i class='fa icon-home'></i> Início";
//    echo "              </a>";
//    echo "          </li>";
//    echo "          <li id='perfil' class='dropdown'>";
//    echo "              <a tabindex='0' data-toggle='dropdown'>";
//    echo "                  <i class='fa fa-user'></i> Perfil";
//    echo "                  <span class='caret'></span>";
//    echo "              </a>";
//    echo "              <ul class='dropdown-menu' role='menu' style='font-size: 12px;'>";
//    echo "                  <li>";
//    echo "                      <a tabindex='0' href='inicio.php?menu=perfilsv'>";
//    echo "                          Sobre você";
//    echo "                      </a>";
//    echo "                  </li>";
//    echo "                  <li>";
//    echo "                      <a tabindex='0' href='inicio.php?menu=perfilend'>";
//    echo "                          Seu endereço";
//    echo "                      </a>";
//    echo "                  </li>";
//    echo "                  <li>";
//    echo "                      <a tabindex='0' href='inicio.php?menu=perfiltel'>";
//    echo "                          Telefones";
//    echo "                      </a>";
//    echo "                  </li>";
//    echo "                  <li>";
//    echo "                      <a tabindex='0' href='inicio.php?menu=trocasenha'>";
//    echo "                          Troca de Senha";
//    echo "                      </a>";
//    echo "                  </li>";
//    echo "              </ul>";
//    echo "          </li>";
//    echo "          <li class='dropdown' id='atividade'>";
//    echo "              <a tabindex='0' data-toggle='dropdown'>";
//    echo "                  <i class='fa fa-archive'></i> Atividades";
//    echo "                  <span class='caret'></span>";
//    echo "              </a>";
//    echo "                  <!-- role='menu': fix moved by arrows (Bootstrap dropdown) -->";
//    echo "              <ul class='dropdown-menu' role='menu' style='font-size: 12px;'>";
//    echo "                  <li>";
//    echo "                      <a tabindex='0' href='inicio.php?menu=bonus'>";
//    echo "                          <i class='fa fa-group'></i> Tabuleta de Bônus";
//    echo "                      </a>";
//    echo "                  </li>";
//    echo "                  <li>";
//    echo "                      <a tabindex='0' href='inicio.php?menu=tarefa'>";
//    echo "                          <i class='fa fa-clock-o'></i> Tarefas";
//    echo "                      </a>";
//    echo "                  </li>";
//    echo "                  <!--<li><a tabindex='0' href='inicio.php?menu=jornada'><i class='fa fa-flag'></i> Jornadas</a></li>-->";
//    echo "                  <!--<li><a tabindex='0' href='inicio.php?menu=paragem'><i class='fa fa-share'></i> Paragem</a></li>-->";
//    echo "              </ul>";
//    echo "          </li>";
//    echo "          <li id='relatorio'>";
//    echo "              <a tabindex='0' data-toggle='dropdown'>";
//    echo "                  <i class='fa fa-list'></i> Relatórios";
//    echo "                  <span class='caret'></span>";
//    echo "              </a>";
//    echo "              <ul class='dropdown-menu' role='menu' style='font-size: 12px;'>";
////    echo "                  <li class='dropdown-submenu'>";
//    echo "                  <li>";
//    echo "                      <a tabindex='0' href='inicio.php?menu=relbonus'>";
//    echo "                          Bônus";
//    echo "                      </a>";
//    echo "                  </li>";
//    echo "                  <li>";
//    echo "                      <a tabindex='0' href='inicio.php?menu=reltarefas'>";
//    echo "                          Tarefas";
//    echo "                      </a>";
//    echo "                  </li>";
//    echo "                  <li>";
//    echo "                      <a tabindex='0' href='inicio.php?menu=reljornadas'>";
//    echo "                          Jornadas";
//    echo "                      </a>";
//    echo "                  </li>";
//    echo "                  <li>";
//    echo "                      <a tabindex='0' href='inicio.php?menu=relparagem'>";
//    echo "                          Paragem";
//    echo "                      </a>";
//    echo "                  </li>";
//    echo "                  <li>";
//    echo "                      <a tabindex='0' href='inicio.php?menu=relusuarios'>";
//    echo "                          Usuários";
//    echo "                      </a>";
//    echo "                  </li>";
////    echo "                  <!-- Apresentará usuários do sistema e do site -->";
//    echo "              </ul>";
//    echo "          </li>";
//
//                if($autoriza){
//                    echo "<li id='configuracoes'>";
//                    echo "  <a tabindex='0' data-toggle='dropdown'>";
//                    echo "      <i class='fa fa-windows'></i> Configurações";
//                    echo "      <span class='caret'></span>";
//                    echo "  </a>";
//                    echo "          <ul class='dropdown-menu' role='menu' style='font-size: 12px;'>";
//                    echo "              <li>";
//                    echo "                  <a href='inicio.php?menu=configUsuario'>Usuários</a>";
//                    echo "              </li>";
//                    echo "              <li>";
//                    echo "                  <a href='inicio.php?menu=configUsuarioSite'>Usuários do Site</a>";
//                    echo "              </li>";
//                    echo "          </ul>";
//                    echo "</li>";
//                }
//            
//    echo "          <li id='relatorio'>";
//    echo "              <a href='inicio.php?menu=suporte'>";
//    echo "                  <i class='fa fa-cloud'></i> ";
//    echo "                  Suporte";
//    echo "              </a>";
//    echo "          </li>";
//    echo "      </ul>";        
    }
    
}
