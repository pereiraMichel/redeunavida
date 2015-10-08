<!DOCTYPE html>

<?php
    require_once './view/formulario.php';
    require_once './controller/constantes.php';

    $formulario = new formulario();

?>

<html lang="pt-br">
    <head>
	<meta charset="UTF-8">
	<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
        
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <meta name="description" content="Bootstrap Sub-Menus">
        <meta name="keywords" content="bootstrap dropdown jquery-plugin submenu">
        <meta name="author" content="Vasily A.">
        <meta name="robots" content="nofollow">
        <meta name="google" content="notranslate">        
	<title><?php echo TITULORUV;?></title>

        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        
        
        <link rel="shortcut icon" href="icon/ruv.ico">
        <link rel="icon" type="image/png" href="images/ruvicon.png">
        
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap-submenu.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/docs.css">
	<!--<link rel="stylesheet" href="css/style.css">-->
        
        <script src="js/jquery.js" defer=""></script>
        <script src="js/bootstrap.js" defer=""></script>
        <script src="js/highlight.min.js" defer=""></script>
        <script src="js/bootstrap-submenu.js" defer=""></script>
        <script src="js/docs.js" defer=""></script>
        <!--<script src="js/control.js" defer=""></script>-->

        <script>
            $('.dropdown-submenu > a').submenupicker();
        </script>

        <script type="text/javascript">
                jQuery(document).ready(function($) {
                        $('body').addClass('images');
                });
        </script>
        <style>
            /*html, body, div, iframe {margin: 0px; padding: 0px}*/
            iframe{width: 100%; border: none; position: absolute}
            body{padding-top: 80px;}

        </style>
        <link rel="author" href="autor.txt">      
    </head>
<body>
	<header id="header">
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="text-center">
				<div class="navbar-text-top">
					<div class="col-sm-4" style='padding-left: 150px'>
						<figure class="navbar-logo navbar-left hidden-xs">
							<a href="index.php">
                                                            <img src="images/logoRedeUnaVida.png" title="<?php echo TITULORUVBAIXO; ?>" width="75" height="61">
							</a>
						</figure><!-- /figure -->
					</div><!-- /col-sm-4 -->
                                        
<!--                                        <div class="col-sm-2">
                                            <ul class="nav navbar-nav navbar-right" id="menu">
                                                <li id="agenda">
						<div class="navbar-text navbar-right">
                                                    <a href="agenda.php" class="text-link">
                                                            <button class="btn btn-default">
                                                                <i class="fa fa-dashboard"></i> Agenda
                                                            </button>
                                                    </a>
						</div>
                                        </div>-->

                                        <div class="col-sm-3">
                                            <div class="hidden-sm">
                                                <span>
                                                    <a href="">
                                                        <img src="jr/jrLogomarca.png" title="<?php echo TITULOJRBAIXO; ?>" width="75" height="61" />                                      
                                                    </a>
                                                </span>
                                            </div>
                                            <div class="visible-sm">
                                                <span>
                                                    <a href="">
                                                        <img src="jr/jrLogomarca.png" title="<?php echo TITULOJRBAIXO; ?>" width="75" height="61" />                                      
                                                    </a>
                                                </span>
                                            </div>
                                            <figure class="navbar-logo navbar-left hidden-xs">
                                                    <a href="" style="text-align: center">

                                                    </a>
                                            </figure>
					</div>

					<hr class="visible-xs"><!-- /hr -->
					<br class="visible-xs">
					<div class="col-sm-4" style="padding-right: 10px">
						<div class="navbar-text navbar-right">
                                                    <a href="#" class="text-link">
                                                        <button class="btn btn-primary">
                                                            <i class="fa fa-user"></i> Cadastre-se
                                                        </button>
                                                    </a>
                                                    <a href="sistema/" class="text-link">
                                                            <button class="btn btn-warning">
                                                                    <i class="fa fa-th"></i> Acesso ao Sistema
                                                            </button>
                                                    </a>
						</div>
						<br class="visible-xs">
					</div><!-- /col-sm-4 -->
				</div>
			</div>
		</nav>
	</header><!-- /header -->

	<div id="content">
		<div class="bs-docs-header bs-docs-first">
			<div class="container">
				<h3 class="text-info"><i class="fa fa-book"></i> Formulário de Adesão</h3>
                                <br/>
                                <h3 style="color: blue; font-size: 18px;">Texto Introdutório e Explicativo da Jornada Real</h3><br/>
                                <msall style="text-align: justify">
                        <?php
//                        $filename = "texto/quemsomos.xml";
//                        
//                        @header("Content-Type: text/html; charset=utf-8");
//                        $xml = simplexml_load_file($filename);
//
//                        foreach($xml->texto as $texto)
//                        {
//                            echo $texto->quemsomos;
//                            echo "<br>";
//                        }

                                    
echo "<p>1. A Jornada Real é, por excelência, um caminho espiritual, afinado com o conceito de sadhana da tradição védica, que esclarece que todas as atividades do viver comum podem ser assumidas como oportunidades para o desenvolvimento espiritual  e, por fim, para a própria iluminação.</p>";echo "<p>2. O programa da Jornada Real (JR), voltado para autoconhecimento, valoriza um investimento diário por parte do interessado, com um encontro semanal em que o focalizador informa as atividades de tal programa.</p>";
echo "<p>3. Seus dois ciclos principais são o diário e o semanal. O diário implica na valorização da prática individual e o semanal, no encontro grupal dos afins para a troca de experiência.</p>";echo "<p>4. Concebemos a Jornada diária, com dois portais de mudança de consciência como momentos propícios para atividades específicas de autoconhecimento e autotransformação. O portal da noite (PN), onde se realiza a retrospectiva do dia, e o portal da manhã (PM), onde se registra os sonhos. Há recursos próprios para incentivar exercícios de autoterapia com estes conteúdos.</p>";
echo "<p>5. A meditação é prática fundamental em todo o percurso, realizada diariamente, e técnicas específicas são ensinadas.</p>";
echo "<p>6. Mensalmente, há atividades de auto-avaliação.</p>";
echo "<p>7. Este programa é passado através de um Livro de Programa, sendo cada estação contemplada com um volume.</p>";
echo "<p>8. O mestre desta jornada é a própria pessoa, e para ela assumir esta função tem como recurso auxiliar os registros diários por escrito, no Livro de Programa, assim como no seu Caderno de Diário.</p>";
echo "<p>9. Estes registros quando consultados, isoladamente ou em série, constituem retorno valioso para as suas periódicas avaliações. Sem estas anotações dificilmente a jornada é realizada a contento.</p>";
echo "<p>10. Além deste Livro, é distribuída uma Tabuleta da Prática, que serve para o registro de algumas das suas atividades e tarefas.</p>";
echo "<p>11. O programa funciona como uma atividade de autoterapia, o que não dispensa uma terapia individual, como recurso afinado, caso a pessoa tenha interesse em fazer ou já a realize.</p>";
echo "<p>12. O programa e a sua produção estará presente neste conjunto:</p>";

echo "<p style='padding-left: 30px;'>a) Livro de Programa – oferecido em 4 volumes, um para cada estação;</p>";

echo "<p style='padding-left: 30px;'>b) Tabuleta da Prática – oferecida.</p>";

echo "<p style='padding-left: 30px;'>c) Caderno de Diário – próprio.</p>";

echo "<p>13. A conclusão do ano-Jornada Real ocorre por meio de uma semana de retiro, visando a intensificação da prática deste programa. Sua adesão, apesar de não obrigatória, é fortemente recomendada.</p>";
echo "<p>14. Como a JR tem a duração de um ano, seguindo as estações, seu curso termina em setembro quando se finaliza o inverno (coincidindo com o feriado de 7 de setembro), com o Retiro anual. Seu objetivo é intensificar a prática deste programa, num lugar apropriado para este tipo de recolhimento – o Espaço de Convivência Morgenlicht (<a href='http://www.morgenlicht.com.br' target='_blank'>http://www.morgenlicht.com.br</a>). O Morgenlicht, com sua beleza e conforto, oferece um entorno favorável à introspecção e à harmonização dos nossos corpos e mente. A alimentação, cuidada com esmero, associa prazer com leveza, saúde com bem-estar.</p>";
echo "<p>15. Atualmente, oferecemos 3 grupos de encontros semanais, com duração de 2 horas:</p>";
echo "<p style='padding-left: 30px;'>1) 3a feira - 18h;</p>";
echo "<p style='padding-left: 30px;'>2) 4a feira - 14h30;</p>";
echo "<p style='padding-left: 30px;'>3) 5a feira - 18h30.</p>";

echo "<p>16. Há um encontro mensal, aos domingos, de 9 às 13h, em que se concentra a transmissão do programa do mês. Caso haja vagas, quem frequenta o grupo semanal, poderá também participar do grupo mensal, sem custo adicional.</p>";

echo "<p>17. O investimento financeiro é R$ 50,00 (cinquenta reais) por encontro, pagos mensalmente, no início do período. Em cada estação há 2 meses de 4 semanas, cujo valor é de R$ 200,00 (duzentos reais), e 1 mês de 5 semanas, cujo valor de investimento é de R$ 250,00 (duzentos e cinquenta reais). Este valor é o mesmo para o grupo semanal e para o grupo mensal.</p>";

echo "<p>18. A Jornada Real é parte de um projeto maior – a RedeUnaViva, uma rede espiritual a serviço de uma cultura de paz, organizada sem fins lucrativos. Suas atividades são focalizadas por colaboradores que se dedicam em regime de doação voluntária. A RUV será melhor detalhada em momento oportuno.</p>";

echo "<p>19. A inscrição é feita mediante preenchimento do Formulário de Adesão, que pode ser conseguido por e-mail. Não há um compromisso de permanência depois de ter sido feita a inscrição. Isto é, caso não esteja satisfeita ou por outros motivos, a pessoa pode desfazer, em qualquer momento, o compromisso de permanecer na Jornada.</p>";

echo "<p>20. A sua entrada somente poderá ser feita até dois meses de iniciado. Seu início, em 2015, se dará na semana, cujo domingo é dia 20 de setembro, considerado o primeiro dia da semana.</p>";

echo "<p>21. Para se inscrever use o Formulário de Adesão (JR).</p><br/><br/>";
                                                            ?>
				</small>
			</div>
		</div>
        </div>

<!-- Parte de baixo da página -->
	<footer id="footer">
		<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Menu</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
                            <a class="navbar-brand" href="contato.php" style="padding: 0px 0px 0px 10px;">
                                    <small>
                                        <h5>

                                            <?php
                                                echo ENDERECOORGAO;
                                                echo "<br>".TELEFONEORGAO;
                                            ?>
                                        </h5>
                                    </small>
				</a>
  </div>

<div class="collapse navbar-collapse" style="padding-right: 10px;">
    <ul class="nav navbar-nav navbar-right" id="menu">
        <li id="home">
                <a href="<?php echo HOMELINK;  ?>">
                        <i class="fa icon-home"></i> Home
                </a>
        </li>
      <li class="dropdown">
        <a tabindex="0" data-toggle="dropdown"><i class="fa fa-puzzle-piece"></i> Programação<span class="caret"></span></a>

        <!-- role="menu": fix moved by arrows (Bootstrap dropdown) -->
        <ul class="dropdown-menu" role="menu">
          <li class="dropdown-submenu">
            <a tabindex="0" data-toggle="dropdown">Jornada Real</a>

            <ul class="dropdown-menu">
                <li><a tabindex="0" href="<?php echo PRIMAVERALINK;  ?>">Primavera</a></li>
                <li><a tabindex="0" href="<?php echo VERAOLINK;  ?>">Verão</a></li>
                <li><a tabindex="0" href="<?php echo OUTONOLINK;  ?>">Outono</a></li>
                <li><a tabindex="0" href="<?php echo INVERNOLINK;  ?>">Inverno</a></li>

            </ul>
          </li>

          <li><a tabindex="0" href="<?php echo MEDITACAOLINK;  ?>">Meditação</a></li>
          <li><a tabindex="0" href="<?php echo MEDITCRISTALINK;  ?>">Meditação Cristã</a></li>
          <li><a tabindex="0" href="<?php echo RETIROLINK;  ?>">Retiro</a></li>

        </ul>
      </li>
      <li class="dropdown">
        <a tabindex="0" data-toggle="dropdown"><i class="fa fa-clock-o"></i> Tempo<span class="caret"></span></a>

        <!-- role="menu": fix moved by arrows (Bootstrap dropdown) -->
        <ul class="dropdown-menu" role="menu">
            <li>
                <a tabindex="0" href="<?php echo AGENDALINK;  ?>" target="_self"><i class="fa fa-dashboard"></i> Agenda</a>
            </li>
            <li>
                <a tabindex="0" href="<?php echo CALENDARIOLINK;  ?>" target="_self"><i class="fa fa-calendar"></i> Calendário</a>
            </li>
        </ul>
      </li>
      <li class="dropdown">
        <a tabindex="0" data-toggle="dropdown"><i class="fa fa-puzzle-piece"></i> Sugestões<span class="caret"></span></a>

        <!-- role="menu": fix moved by arrows (Bootstrap dropdown) -->
        <ul class="dropdown-menu" role="menu">
            <li>
              <a tabindex="0" href="<?php echo YOGALINK;  ?>"> Yoga</a>
            </li>
            <li>
                <a tabindex="0" href="<?php echo RODASONHOSLINK;  ?>"> Roda dos Sonhos</a>
            </li>
            <li>
                <a tabindex="0" href="<?php echo TRANSPESSOALLINK;  ?>"> Transpessoal</a>
            </li>
        </ul>
      </li>
        <li id="galeria">
            <a href="<?php echo GALERIALINK;  ?>">
                        <i class="fa fa-ticket"></i> Galeria
                </a>
        </li>
        <li id="quemsomos" class="active">
            <a href="<?php echo "#";  ?>" target="_self">
                        <i class="fa fa-book"></i> Quem Somos
                </a>
        </li>
        <li id="contato">
                <a href="<?php echo CONTATOLINK;  ?>">
                        <i class="fa fa-envelope-o"></i> Contato
                </a>
        </li>
        <li id="blog">
                <a href="<?php echo BLOGLINK;  ?>">
                        <i class="fa fa-link"></i> Blog
                </a>
        </li>
        <li id="">
                <a href="#">
                        <i class="fa fa-2x"></i> &nbsp;
                </a>
        </li>
    </ul>
        </div>
</nav>
	</footer>
<!-- EOF -->
<div id="topcontrol" title="Voltar ao topo" style="position: fixed; bottom: 55px; right: 4px; opacity: 0; cursor: pointer;">
    <img src="images/up.png" style="width:30px; height:30px"></div>
<div id="topcontrol" title="Voltar ao topo" style="position: fixed; bottom: 55px; right: 4px; opacity: 0; cursor: pointer;">
    <img src="images/up.png" style="width:30px; height:30px">
</div>


</body>
</html>