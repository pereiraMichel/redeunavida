<?php



class help{
	

	public function telaAjuda(){

		$tamanhoFonte = "font-size: 12px;";

		//echo "<meta http-equiv='refresh' content='5;url=inicio.php?m=help'>";

		echo "<div class='col-sm-12'>";
		echo "	<label>Clique nos links abaixo, para obter a ajuda:</label>";
		echo "</div>";

// QUEBRA DE LINHA
		echo "<div class='col-sm-12'>";
		echo "	<p style='height: 30px;'>&nbsp;</p>";
		echo "</div>";
// FIM QUEBRA DE LINHA

		echo "<div class='col-sm-4'>";
		echo "	<label style='font-weight: bold;'>Registro</label><br>";
		echo "	<a style='font-weight: normal; ".$tamanhoFonte."' href='inicio.php?m=help&t=regMedit'>Meditação</a><br>";
/*
 href='#regMedit' role='button' data-toggle='collapse' aria-expanded='false' aria-controls='regMedit'
		echo "		<div class='collapse' id='regMedit'>";
		echo "			<div class='well'>";
		echo "				Teste Registro Meditação";
		echo "			</div>";
		echo "		</div>";
*/
		echo "	<a style='font-weight: normal; ".$tamanhoFonte."' href='inicio.php?m=help&t=regPortal'>Portal</a><br>";
		echo "	<a style='font-weight: normal; ".$tamanhoFonte."' href='inicio.php?m=help&t=regPresParagem'>Presença-Paragem</a><br>";
		echo "	<a style='font-weight: normal; ".$tamanhoFonte."' href='inicio.php?m=help&t=regTarefa'>Tarefa</a><br>";
		echo "	<a style='font-weight: normal; ".$tamanhoFonte."' href='inicio.php?m=help&t=regServicos'>Serviços</a><br>";
		echo "</div>";

		echo "<div class='col-sm-4'>";
		echo "	<label style='font-weight: bold;'>Relatório</label><br>";
		echo "	<a style='font-weight: normal; ".$tamanhoFonte."' href='inicio.php?m=help&t=relMedit'>Meditação</a><br>";
		echo "	<a style='font-weight: normal; ".$tamanhoFonte."' href='inicio.php?m=help&t=relPortal'>Portal</a><br>";
		echo "	<a style='font-weight: normal; ".$tamanhoFonte."' href='inicio.php?m=help&t=relPresParagem'>Presença-Paragem</a><br>";
		echo "	<a style='font-weight: normal; ".$tamanhoFonte."' href='inicio.php?m=help&t=relTarefa'>Tarefa</a><br>";
		echo "	<a style='font-weight: normal; ".$tamanhoFonte."' href='inicio.php?m=help&t=relServicos'>Serviços e Extras</a><br>";
		echo "	<a style='font-weight: normal; ".$tamanhoFonte."' href='inicio.php?m=help&t=relUsuarios'>Usuários (ADM)</a><br>";
		echo "	<a style='font-weight: normal; ".$tamanhoFonte."' href='inicio.php?m=help&t=relIndice'>Índice</a><br>";
		echo "</div>";

		echo "<div class='col-sm-4'>";
		echo "	<label style='font-weight: bold;'>Configurações</label><br>";
		echo "	<a style='font-weight: normal; ".$tamanhoFonte."' href='inicio.php?m=help&t=configUsuarios'>Usuários (ADM)</a><br>";
		echo "	<a style='font-weight: normal; ".$tamanhoFonte."' href='#configSetenio' role='button' data-toggle='collapse' aria-expanded='false' aria-controls='configSetenio'>Setênio</a><br>";
		echo "		<div class='collapse' id='configSetenio'>";
		echo "			<div class='well'>";
		echo "				O setênio contém uma tabela fixa. Apenas para informação.";
		echo "			</div>";
		echo "		</div>";
		echo "	<a style='font-weight: normal; ".$tamanhoFonte."' href='#configTpTel' role='button' data-toggle='collapse' aria-expanded='false' aria-controls='configTpTel'>Tipos de Telefone</a><br>";
		echo "		<div class='collapse' id='configTpTel'>";
		echo "			<div class='well'>";
		echo "				Os tipos de telefone contém uma tabela fixa. Apenas para informação nos cadastros.";
		echo "			</div>";
		echo "		</div>";
		echo "	<a style='font-weight: normal; ".$tamanhoFonte."' href='#configTpUsu' role='button' data-toggle='collapse' aria-expanded='false' aria-controls='configTpUsu'>Tipos de Usuário</a><br>";
		echo "		<div class='collapse' id='configTpUsu'>";
		echo "			<div class='well'>";
		echo "				Os tipos de usuário contém uma tabela fixa. Apenas para informação nos cadastros de nível do usuário.";
		echo "			</div>";
		echo "		</div>";
		echo "	<a style='font-weight: normal; ".$tamanhoFonte."' href='inicio.php?m=help&t=configPerfil'>Seu Perfil</a><br>";
		echo "	<a style='font-weight: normal; ".$tamanhoFonte."' href='inicio.php?m=help&t=configAtividades'>Atividades</a><br>";
		echo "	<a style='font-weight: normal; ".$tamanhoFonte."' href='inicio.php?m=help&t=configBonificacao'>Bonificação (Valor da bonificação)</a><br>";
		echo "	<a style='font-weight: normal; ".$tamanhoFonte."' href='inicio.php?m=help&t=configBonus'>Configurações de Bônus (ADM)</a><br>";
		echo "	<a style='font-weight: normal; ".$tamanhoFonte."' href='#configGrupos' role='button' data-toggle='collapse' aria-expanded='false' aria-controls='configGrupos'>Grupos</a><br>";
		echo "		<div class='collapse' id='configGrupos'>";
		echo "			<div class='well'>";
		echo "				O grupo contém uma tabela fixa. Apenas para informação nos cadastros de grupos de cada usuário.";
		echo "			</div>";
		echo "		</div>";
		echo "</div>";

		echo "<div class='col-sm-12'>";
		echo "	<p style='height: 40px'>&nbsp;</p>";
		echo "</div>";

		echo "<div class='col-sm-4'>";
		echo "	<label style='font-weight: bold;'>Tabela de Bônus</label><br>";
		echo "	<label style='font-weight: normal; ".$tamanhoFonte."'>Contém um resumo de preenchimento com datas RUV e suas porcentagens</label><br>";
		echo "</div>";

		echo "<div class='col-sm-4'>";
		echo "	&nbsp;";
		echo "</div>";

		echo "<div class='col-sm-4'>";
		echo "	&nbsp;";
		echo "</div>";

	}


	public function registroMeditacao(){

		echo "<div class='col-sm-6' align='justify'>";
		echo "	<a href='#inserir'>Inserindo uma Meditação</a><br>";
		echo "	<a href='#consulta'>Consultando uma Meditação</a><br>";
		echo "	<a href='#bonus'>Consultando o bônus da Meditação</a><br>";
		echo "	<a href='#pesquisa'>Pesquisando uma Meditação</a>";
		echo "</div>";

        echo "<div class='col-sm-6'>";
        echo "  <a href='inicio.php?m=help' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

        echo "<div class='col-sm-12' style='height: 50px;'>&nbsp;</div>";

		echo "<div class='col-sm-12' align='justify' id='inserir'>";
		echo "	<label style='font-size: 12px;'>";
		echo "		<b>INSERINDO UMA MEDITAÇÃO</b><br><br>";
		echo "		No registro de Meditação, apresenta-se a imagem abaixo:<br><br>";
		echo "		<img src='../img/imgHelpRuv/RegMeditacao1.png' width='700' height='500' alt='Tela Meditação' title='Tela Meditação'><br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		Nessa tela, nos campos 'Data', 'Semana', 'Dia' e 'Data RUV' são interligados, ou seja, caso digite algum desses campos, os demais citados são alterados, conformar marcação (em vermelho) na imagem abaixo: <br>";
		echo "		<img src='../img/imgHelpRuv/RegMeditacao1.3.png' width='700' height='500' alt='Tela Meditação' title='Tela Meditação'><br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Os botões 'Automático' e 'Manual', têm como função preencher automaticamente ou manualmente os campos 'Data' e 'Data RUV'. Nota-se que o campo 'Início' também é preenchido, de acordo com o horário do sistema ou correspondente ao horário de Brasília, conforme imagem abaixo (os campos em cinza são desabilitados por ser automático):<br>";
		echo "		<img src='../img/imgHelpRuv/RegMeditacao1.2.png' width='700' height='500' alt='Tela Meditação' title='Tela Meditação'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		As tachas 'Início', 'Término', 'Nível' e 'Data', são de preenchimento automático, em exceção do nível. Ao clicar no 'Término', o campo será preenchido automaticamente, correspondendo o horário atual.<br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

        echo "		Os campos 'Início' e 'Término' não têm necessidade de digitar o caracter ':' e, se o horário for menor que 10, deverá digitar o '0' antes da numeração da hora.";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Ao usuário digitar o campo 'Início' e o 'Término', os campos 'Duração', 'Bônus' e 'Período' são preenchidos automaticamente.<br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		Obs.: Basta o usuário digitar e clicar <enter> para pular aos campos seguintes e, quando chegar ao campo 'Nível', irá direto no botão 'Salvar', ocorrendo a mensagem abaixo:<br>";
		echo "		<img src='../img/imgHelpRuv/RegMeditacao3.png' width='700' height='500' alt='Tela Meditação' title='Tela Meditação'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "	</label>";
		echo "</div>";

        echo "<div class='col-sm-12' style='height: 50px;'>&nbsp;</div>";

		echo "<div class='col-sm-12' align='justify' id='consulta'>";
		echo "	<label style='font-size: 12px;'>";
		echo "		<b>CONSULTANDO UMA MEDITAÇÃO</b><br><br>";
		echo "		No registro de Meditação, apresenta-se a imagem abaixo:<br><br>";
		echo "		<img src='../img/imgHelpRuv/RegMeditacao2.png' width='700' height='500' alt='Tela Meditação' title='Tela Meditação'><br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		Nessa tela, aparecem automaticamente os registros do dia corrente, ou seja, do dia ".date("d/m/Y").". Para a consulta dos demais dias, basta selecionar a data RUV (localizados à sua esquerda) e, como complemento, a classificação (ou ordem) dos registros da data RUV selecionada, conforme imagem abaixo:<br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		<img src='../img/imgHelpRuv/RegMeditacao2.1.png' width='700' height='500' alt='Tela Meditação' title='Tela Meditação'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		Obs.: O botão 'X' em vermelho, localizado à direita do registro, é o botão de exclusão. Para excluir o registro, basta clicar no botão e aguardar 2 segundos.<br>";

		echo "	</label>";
        echo "</div>";

        echo "<div class='col-sm-12' style='height: 50px;'>&nbsp;</div>";

		echo "<div class='col-sm-12' align='justify' id='bonus'>";
		echo "	<label style='font-size: 12px;'>";
		echo "		<b>CONSULTANDO O BÔNUS DA MEDITAÇÃO</b><br><br>";
		echo "		Para consultar o bônus da Meditação, basta clicar no item 'Bônus' e selecionar a data RUV (ou todas), que descreverá o total de bônus e o percentual na data RUV, conforme imagem abaixo:<br><br>";
		echo "		<img src='../img/imgHelpRuv/RegMeditacao4.png' width='700' height='500' alt='Tela Meditação' title='Tela Meditação'><br>";

		echo "	</label>";
        echo "</div>";

        echo "<div class='col-sm-12' style='height: 50px;'>&nbsp;</div>";

		echo "<div class='col-sm-12' align='justify' id='pesquisa'>";
		echo "	<label style='font-size: 12px;'>";
		echo "		<b>PESQUISANDO UMA MEDITAÇÃO</b><br><br>";
		echo "		Para pesquisar a Meditação, basta selecionar o 'Pesquisar por' e digitar o campo abaixo, conforme imagem abaixo:<br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		<img src='../img/imgHelpRuv/RegMeditacao5.png' width='700' height='500' alt='Tela Meditação' title='Tela Meditação'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		Feito isso, basta apenas digitar 'enter' clicar 'Pesquisar' que aparecerá o(s) resultado(s), conforme imagem abaixo:<br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		<img src='../img/imgHelpRuv/RegMeditacao5.1.png' width='700' height='500' alt='Tela Meditação' title='Tela Meditação'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		Nota: Na aba 'Pesquisas', só serve para o usuário pesquisar os campos, sem qualquer função de exclusão ou inclusão do registro.<br>";

		echo "	</label>";
        echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <p style='height: 30px;'>&nbsp;</p>";
        echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <a href='inicio.php?m=help' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";
	}

	public function registroPortal(){

		$nomeTela = "Tela Portal";

		echo "<div class='col-sm-6' align='justify'>";
		echo "	<a href='#inserir'>Inserindo um Portal</a><br>";
		echo "	<a href='#consulta'>Consultando um Portal</a><br>";
		echo "	<a href='#bonus'>Consultando o bônus do Portal</a><br>";
		echo "	<a href='#pesquisa'>Pesquisando um Portal</a>";
		echo "</div>";

        echo "<div class='col-sm-6'>";
        echo "  <a href='inicio.php?m=help' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

        echo "<div class='col-sm-12' style='height: 50px;'>&nbsp;</div>";

		echo "<div class='col-sm-12' align='justify' id='inserir'>";
		echo "	<label style='font-size: 12px;'>";
		echo "		<b>INSERINDO UM PORTAL</b><br><br>";
		echo "		No registro da Prática dos Portais, apresenta-se a imagem abaixo:<br><br>";
		echo "		<img src='../img/imgHelpRuv/RegPortal1.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Os botões 'Automático' e 'Manual', têm como função preencher automaticamente ou manualmente o campo 'Data', correspondendo o horário atual, de Brasília. Continuando, basta somente selecionar os campos em 'Sonho', 'Completação', 'Corpo', 'Retrospectiva' e 'Completação'. Feito isso, o Bônus será calculado automaticamente (o campo em cinza é desabilitado por ser automático). Feito isso só basta clicar no botão 'Salvar'.<br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		<img src='../img/imgHelpRuv/RegPortal1.2.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "	</label>";
		echo "</div>";

        echo "<div class='col-sm-12' style='height: 50px;'>&nbsp;</div>";

		echo "<div class='col-sm-12' align='justify' id='consulta'>";
		echo "	<label style='font-size: 12px;'>";
		echo "		<b>CONSULTANDO UM PORTAL</b><br><br>";
		echo "		No registro da prática dos portais, apresenta-se a imagem abaixo:<br><br>";
		echo "		<img src='../img/imgHelpRuv/RegPortal2.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		Nessa tela, aparecem automaticamente os registros do dia corrente, ou seja, do dia ".date("d/m/Y").". Para a consulta dos demais dias, basta selecionar a data RUV (localizados à sua esquerda) e, como complemento, a classificação (ou ordem) dos registros da data RUV selecionada.<br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		Obs.: O botão 'X' em vermelho, localizado à direita do registro, é o botão de exclusão. Para excluir o registro, basta clicar no botão e aguardar 2 segundos.<br>";

		echo "	</label>";
        echo "</div>";

        echo "<div class='col-sm-12' style='height: 50px;'>&nbsp;</div>";

		echo "<div class='col-sm-12' align='justify' id='bonus'>";
		echo "	<label style='font-size: 12px;'>";
		echo "		<b>CONSULTANDO O BÔNUS DO PORTAL</b><br><br>";
		echo "		Para consultar o bônus da prática dos portais, basta clicar no item 'Bônus' e selecionar a data RUV (ou todas), que descreverá o total de bônus e o percentual na data RUV, conforme imagem abaixo:<br><br>";
		echo "		<img src='../img/imgHelpRuv/RegPortal3.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";

		echo "	</label>";
        echo "</div>";

        echo "<div class='col-sm-12' style='height: 50px;'>&nbsp;</div>";

		echo "<div class='col-sm-12' align='justify' id='pesquisa'>";
		echo "	<label style='font-size: 12px;'>";
		echo "		<b>PESQUISANDO UM PORTAL</b><br><br>";
		echo "		Para pesquisar a prática dos portais, basta selecionar o 'Pesquisar por' e digitar o campo abaixo, conforme imagem abaixo:<br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		<img src='../img/imgHelpRuv/RegPortal4.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		Feito isso, basta apenas digitar 'enter' ou clicar 'Pesquisar' que aparecerá o(s) resultado(s), conforme imagem abaixo:<br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		<img src='../img/imgHelpRuv/RegPortal4.1.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		Nota: Na aba 'Pesquisas', só serve para o usuário pesquisar os campos, sem qualquer função de exclusão ou inclusão do registro.<br>";

		echo "	</label>";
        echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <p style='height: 30px;'>&nbsp;</p>";
        echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <a href='inicio.php?m=help' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

	}

	public function registroPresParagem(){

		$nomeTela = "Tela Presença-Paragem";

		echo "<div class='col-sm-6' align='justify'>";
		echo "	<a href='#inserir'>Inserindo uma Presença-Paragem</a><br>";
		echo "	<a href='#consulta'>Consultando uma Presença-Paragem</a><br>";
		echo "	<a href='#bonus'>Consultando o bônus da Presença-Paragem</a><br>";
		echo "	<a href='#pesquisa'>Pesquisando uma Presença-Paragem</a>";
		echo "</div>";

        echo "<div class='col-sm-6'>";
        echo "  <a href='inicio.php?m=help' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

        echo "<div class='col-sm-12' style='height: 50px;'>&nbsp;</div>";

		echo "<div class='col-sm-12' align='justify' id='inserir'>";
		echo "	<label style='font-size: 12px;'>";
		echo "		<b>INSERINDO UMA PRESENÇA-PARAGEM</b><br><br>";
		echo "		No registro da Presença-Paragem, apresenta-se a imagem abaixo:<br><br>";
		echo "		<img src='../img/imgHelpRuv/RegPresParagem1.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Nessa tela, nos campos 'Data', 'Data RUV', 'Semana' e 'Dia' são interligados, ou seja, caso digite algum desses campos, os demais citados são alterados automaticamente. Após o preenchimento, selecionar a presença-paragem e selecionar o 'Status', conformar imagem abaixo: <br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		<img src='../img/imgHelpRuv/RegPresparagem1.1.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Feito isso, o campo 'Bônus' será calculado automaticamente. Após isso, só basta clicar no botão 'Salvar'.<br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		<img src='../img/imgHelpRuv/RegPresParagem1.2.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "	</label>";
		echo "</div>";

        echo "<div class='col-sm-12' style='height: 50px;'>&nbsp;</div>";

		echo "<div class='col-sm-12' align='justify' id='consulta'>";
		echo "	<label style='font-size: 12px;'>";
		echo "		<b>CONSULTANDO UMA PRESENÇA-PARAGEM</b><br><br>";
		echo "		No registro da presença-paragem, apresenta-se a imagem abaixo:<br><br>";
		echo "		<img src='../img/imgHelpRuv/RegPresParagem2.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		Nessa tela, aparecem automaticamente os registros do dia corrente, ou seja, do dia ".date("d/m/Y").". Para a consulta dos demais dias, basta selecionar a data RUV (localizados à sua esquerda) e, como complemento, a classificação (ou ordem) dos registros da data RUV selecionada.<br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		Obs.: O botão 'X' em vermelho, localizado à direita do registro, é o botão de exclusão. Para excluir o registro, basta clicar no botão e aguardar 2 segundos.<br>";

		echo "	</label>";
        echo "</div>";

        echo "<div class='col-sm-12' style='height: 50px;'>&nbsp;</div>";

		echo "<div class='col-sm-12' align='justify' id='bonus'>";
		echo "	<label style='font-size: 12px;'>";
		echo "		<b>CONSULTANDO O BÔNUS DA PRESENÇA-PARAGEM</b><br><br>";
		echo "		Para consultar o bônus da presença-paragem, basta clicar no item 'Bônus' e selecionar a data RUV (ou todas), que descreverá o total de bônus e o percentual na data RUV, conforme imagem abaixo:<br><br>";
		echo "		<img src='../img/imgHelpRuv/RegPresParagem3.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";

		echo "	</label>";
        echo "</div>";

        echo "<div class='col-sm-12' style='height: 50px;'>&nbsp;</div>";

		echo "<div class='col-sm-12' align='justify' id='pesquisa'>";
		echo "	<label style='font-size: 12px;'>";
		echo "		<b>PESQUISANDO UMA PRESENÇA-PARAGEM</b><br><br>";
		echo "		Para pesquisar a presença-paragem, basta selecionar o 'Pesquisar por' e digitar o campo abaixo, conforme imagem abaixo:<br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		<img src='../img/imgHelpRuv/RegPresParagem4.1.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		Feito isso, basta apenas digitar 'enter' ou clicar em 'Pesquisar' que aparecerá o(s) resultado(s), conforme imagem abaixo:<br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		<img src='../img/imgHelpRuv/RegPresParagem4.2.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		Nota: Na aba 'Pesquisas', só serve para o usuário pesquisar os campos, sem qualquer função de exclusão ou inclusão do registro.<br>";

		echo "	</label>";
        echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <p style='height: 30px;'>&nbsp;</p>";
        echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <a href='inicio.php?m=help' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

	}

	public function registroTarefa(){

		$nomeTela = "Tela Tarefas";

		echo "<div class='col-sm-6' align='justify'>";
		echo "	<a href='#inserir'>Inserindo uma Tarefa</a><br>";
		echo "	<a href='#consulta'>Consultando uma Tarefa</a><br>";
		echo "	<a href='#bonus'>Consultando o bônus da Tarefa</a><br>";
		echo "	<a href='#pesquisa'>Pesquisando uma Tarefa</a>";
		echo "</div>";

        echo "<div class='col-sm-6'>";
        echo "  <a href='inicio.php?m=help' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

        echo "<div class='col-sm-12' style='height: 50px;'>&nbsp;</div>";

		echo "<div class='col-sm-12' align='justify' id='inserir'>";
		echo "	<label style='font-size: 12px;'>";
		echo "		<b>INSERINDO UMA TAREFA</b><br><br>";
		echo "		No registro da Tarefa, apresenta-se a imagem abaixo:<br><br>";
		echo "		<img src='../img/imgHelpRuv/RegTarefas1.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Nessa tela, nos campos 'Data', 'Data RUV' e 'Dia' são interligados, ou seja, caso digite algum desses campos, os demais citados são alterados automaticamente. Após o preenchimento, selecionar a tarefa e selecionar o 'Status', conformar imagem abaixo: <br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		<img src='../img/imgHelpRuv/RegTarefas1.1.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Feito isso, o campo 'Bônus' será calculado automaticamente. Após isso, só basta clicar no botão 'Salvar'.<br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		<img src='../img/imgHelpRuv/RegTarefas1.2.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "	</label>";
		echo "</div>";

        echo "<div class='col-sm-12' style='height: 50px;'>&nbsp;</div>";

		echo "<div class='col-sm-12' align='justify' id='consulta'>";
		echo "	<label style='font-size: 12px;'>";
		echo "		<b>CONSULTANDO UMA TAREFA</b><br><br>";
		echo "		No registro da tarefa, apresenta-se a imagem abaixo:<br><br>";
		echo "		<img src='../img/imgHelpRuv/RegTarefas2.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		Nessa tela, aparecem automaticamente os registros do dia corrente, ou seja, do dia ".date("d/m/Y").". Para a consulta dos demais dias, basta selecionar a data RUV (localizados à sua esquerda) e, como complemento, a classificação (ou ordem) dos registros da data RUV selecionada.<br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		Obs.: O botão 'X' em vermelho, localizado à direita do registro, é o botão de exclusão. Para excluir o registro, basta clicar no botão e aguardar 2 segundos.<br>";

		echo "	</label>";
        echo "</div>";

        echo "<div class='col-sm-12' style='height: 50px;'>&nbsp;</div>";

		echo "<div class='col-sm-12' align='justify' id='bonus'>";
		echo "	<label style='font-size: 12px;'>";
		echo "		<b>CONSULTANDO O BÔNUS DA TAREFA</b><br><br>";
		echo "		Para consultar o bônus da presença-paragem, basta clicar no item 'Bônus' e selecionar a data RUV (ou todas), que descreverá o total de bônus e o percentual na data RUV, conforme imagem abaixo:<br><br>";
		echo "		<img src='../img/imgHelpRuv/RegTarefas3.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";

		echo "	</label>";
        echo "</div>";

        echo "<div class='col-sm-12' style='height: 50px;'>&nbsp;</div>";

		echo "<div class='col-sm-12' align='justify' id='pesquisa'>";
		echo "	<label style='font-size: 12px;'>";
		echo "		<b>PESQUISANDO UMA TAREFA</b><br><br>";
		echo "		Para pesquisar a tarefa, basta selecionar o 'Pesquisar por' e digitar o campo abaixo, conforme imagem abaixo:<br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		<img src='../img/imgHelpRuv/RegTarefas4.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		Feito isso, basta apenas digitar 'enter' ou clicar em 'Pesquisar' que aparecerá o(s) resultado(s), conforme imagem abaixo:<br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		<img src='../img/imgHelpRuv/RegTarefas4.1.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		Nota: Na aba 'Pesquisas', só serve para o usuário pesquisar os campos, sem qualquer função de exclusão ou inclusão do registro.<br>";

		echo "	</label>";
        echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <p style='height: 30px;'>&nbsp;</p>";
        echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <a href='inicio.php?m=help' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

	}

	public function registroServicos(){

		$nomeTela = "Tela Serviços e Extras";

		echo "<div class='col-sm-6' align='justify'>";
		echo "	<a href='#inserir'>Inserindo um Serviço e Extras</a><br>";
		echo "	<a href='#consulta'>Consultando um Serviço e Extras</a><br>";
		echo "	<a href='#bonus'>Consultando o bônus do Serviço e Extras</a><br>";
		echo "	<a href='#pesquisa'>Pesquisando uma Serviço e Extras</a>";
		echo "</div>";

        echo "<div class='col-sm-6'>";
        echo "  <a href='inicio.php?m=help' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

        echo "<div class='col-sm-12' style='height: 50px;'>&nbsp;</div>";

		echo "<div class='col-sm-12' align='justify' id='inserir'>";
		echo "	<label style='font-size: 12px;'>";
		echo "		<b>INSERINDO UM SERVIÇO E EXTRAS</b><br><br>";
		echo "		No registro da Serviços e Extras, apresenta-se a imagem abaixo:<br><br>";
		echo "		<img src='../img/imgHelpRuv/RegServicos1.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Nessa tela, nos campos 'Data', 'Data RUV', 'Semana' e 'Dia' são interligados, ou seja, caso digite algum desses campos, os demais citados são alterados automaticamente. Após o preenchimento, selecionar os serviço, se focalização ou presença, conformar imagem abaixo: <br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		<img src='../img/imgHelpRuv/RegServicos1.2.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Feito isso, o campo 'Bônus' será calculado automaticamente. Após isso, só basta clicar no botão 'Salvar'.<br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		<img src='../img/imgHelpRuv/RegServicos1.3.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		<img src='../img/imgHelpRuv/RegServicos1.4.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "	</label>";
		echo "</div>";

        echo "<div class='col-sm-12' style='height: 50px;'>&nbsp;</div>";

		echo "<div class='col-sm-12' align='justify' id='consulta'>";
		echo "	<label style='font-size: 12px;'>";
		echo "		<b>CONSULTANDO UM SERVIÇO E EXTRAS</b><br><br>";
		echo "		No registro de serviços e extras, apresenta-se a imagem abaixo:<br><br>";
		echo "		<img src='../img/imgHelpRuv/RegServicos2.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		Nessa tela, aparecem automaticamente os registros do dia corrente, ou seja, do dia ".date("d/m/Y").". Para a consulta dos demais dias, basta selecionar a data RUV (localizados à sua esquerda) e, como complemento, a classificação (ou ordem) dos registros da data RUV selecionada.<br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		Obs.: O botão 'X' em vermelho, localizado à direita do registro, é o botão de exclusão. Para excluir o registro, basta clicar no botão e aguardar 2 segundos.<br>";

		echo "	</label>";
        echo "</div>";

        echo "<div class='col-sm-12' style='height: 50px;'>&nbsp;</div>";

		echo "<div class='col-sm-12' align='justify' id='bonus'>";
		echo "	<label style='font-size: 12px;'>";
		echo "		<b>CONSULTANDO O BÔNUS DO SERVIÇO E EXTRAS</b><br><br>";
		echo "		Para consultar o bônus da presença-paragem, basta clicar no item 'Bônus' e selecionar a data RUV (ou todas), que descreverá o total de bônus e o percentual na data RUV, conforme imagem abaixo:<br><br>";
		echo "		<img src='../img/imgHelpRuv/RegServicos3.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";

		echo "	</label>";
        echo "</div>";

        echo "<div class='col-sm-12' style='height: 50px;'>&nbsp;</div>";

		echo "<div class='col-sm-12' align='justify' id='pesquisa'>";
		echo "	<label style='font-size: 12px;'>";
		echo "		<b>PESQUISANDO UM SERVIÇOS E EXTRAS</b><br><br>";
		echo "		Para pesquisar a serviço e extras, basta selecionar o 'Pesquisar por' e digitar o campo abaixo, conforme imagem abaixo:<br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		<img src='../img/imgHelpRuv/RegServicos4.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		Feito isso, basta apenas digitar 'enter' ou clicar em 'Pesquisar' que aparecerá o(s) resultado(s), conforme imagem abaixo:<br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		<img src='../img/imgHelpRuv/RegServicos4.1.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		Nota: Na aba 'Pesquisas', só serve para o usuário pesquisar os campos, sem qualquer função de exclusão ou inclusão do registro.<br>";

		echo "	</label>";
        echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <p style='height: 30px;'>&nbsp;</p>";
        echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <a href='inicio.php?m=help' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

	}

	public function relMeditacao(){

		$nomeTela = "Relatório de Meditação";

		echo "<div class='col-sm-6' align='justify'>";
		echo "	&nbsp;";
		echo "</div>";

        echo "<div class='col-sm-6'>";
        echo "  <a href='inicio.php?m=help' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

        echo "<div class='col-sm-12' style='height: 50px;'>&nbsp;</div>";

		echo "<div class='col-sm-12' align='justify' id='inserir'>";
		echo "	<label style='font-size: 12px;'>";
		echo "		<b>GERANDO UM RELATÓRIO DE MEDITAÇÃO</b><br><br>";
		echo "		No relatório de meditação, apresenta-se a imagem abaixo:<br><br>";
		echo "		<img src='../img/imgHelpRuv/relMeditacao.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Nessa tela, basta selecionar ou preencher qualquer um ou mais campos, para gerar o relatório, conformar imagem abaixo: <br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		<img src='../img/imgHelpRuv/relMeditacao1.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Observação: O campo 'Data RUV' só aparecerá os que foram preenchidos no registro de meditação. <br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Feito isso, você tem a opção de 'Gerar PDF', como imagem abaixo (dessa forma, o usuário poderá optar por baixar ou visualizar no navegador): <br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		<img src='../img/imgHelpRuv/relMeditacao2.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Ou criar um novo registro de meditação, como imagem abaixo:<br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		<img src='../img/imgHelpRuv/relMeditacao3.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "	</label>";
		echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <p style='height: 30px;'>&nbsp;</p>";
        echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <a href='inicio.php?m=help' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

	}

	public function relPortal(){

		$nomeTela = "Relatório de Prática dos Portais";
		$nomeRelatorio = "prática dos portais";

		echo "<div class='col-sm-6' align='justify'>";
		echo "	&nbsp;";
		echo "</div>";

        echo "<div class='col-sm-6'>";
        echo "  <a href='inicio.php?m=help' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

        echo "<div class='col-sm-12' style='height: 50px;'>&nbsp;</div>";

		echo "<div class='col-sm-12' align='justify' id='inserir'>";
		echo "	<label style='font-size: 12px;'>";
		echo "		<b>GERANDO UM RELATÓRIO DE PRÁTICA DOS PORTAIS</b><br><br>";
		echo "		No relatório de ".$nomeRelatorio.", apresenta-se a imagem abaixo:<br><br>";
		echo "		<img src='../img/imgHelpRuv/relPortais.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Nessa tela, basta selecionar ou preencher qualquer um ou mais campos, para gerar o relatório, conformar imagem abaixo: <br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		<img src='../img/imgHelpRuv/relPortais1.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Observação: O campo 'Data RUV' só aparecerá os que foram preenchidos no registro de ".$nomeRelatorio.". <br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Feito isso, você tem a opção de 'Gerar PDF', como imagem abaixo (dessa forma, o usuário poderá optar por baixar ou visualizar no navegador): <br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		<img src='../img/imgHelpRuv/relPortais2.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Ou criar um novo registro de ".$nomeRelatorio.", como imagem abaixo:<br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		<img src='../img/imgHelpRuv/relPortais3.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "	</label>";
		echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <p style='height: 30px;'>&nbsp;</p>";
        echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <a href='inicio.php?m=help' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

	}

	public function relPresParagem(){

		$nomeTela = "Relatório de Presença-Paragem";
		$nomeRelatorio = "presença-paragem";

		echo "<div class='col-sm-6' align='justify'>";
		echo "	&nbsp;";
		echo "</div>";

        echo "<div class='col-sm-6'>";
        echo "  <a href='inicio.php?m=help' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

        echo "<div class='col-sm-12' style='height: 50px;'>&nbsp;</div>";

		echo "<div class='col-sm-12' align='justify' id='inserir'>";
		echo "	<label style='font-size: 12px;'>";
		echo "		<b>GERANDO UM RELATÓRIO DE PRESENÇA-PARAGEM</b><br><br>";
		echo "		No relatório de ".$nomeRelatorio.", apresenta-se a imagem abaixo:<br><br>";
		echo "		<img src='../img/imgHelpRuv/relPresParagem.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Nessa tela, basta selecionar ou preencher qualquer um ou mais campos, para gerar o relatório, conformar imagem abaixo: <br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		<img src='../img/imgHelpRuv/relPresParagem1.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Observação: O campo 'Data RUV' só aparecerá os que foram preenchidos no registro de ".$nomeRelatorio.". <br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Feito isso, você tem a opção de 'Gerar PDF', como imagem abaixo (dessa forma, o usuário poderá optar por baixar ou visualizar no navegador): <br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		<img src='../img/imgHelpRuv/relPresParagem2.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Ou criar um novo registro de ".$nomeRelatorio.", como imagem abaixo:<br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		<img src='../img/imgHelpRuv/relPresParagem3.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "	</label>";
		echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <p style='height: 30px;'>&nbsp;</p>";
        echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <a href='inicio.php?m=help' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

	}

	public function relTarefa(){

		$nomeTela = "Relatório de Tarefa";
		$nomeRelatorio = "tarefa";

		echo "<div class='col-sm-6' align='justify'>";
		echo "	&nbsp;";
		echo "</div>";

        echo "<div class='col-sm-6'>";
        echo "  <a href='inicio.php?m=help' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

        echo "<div class='col-sm-12' style='height: 50px;'>&nbsp;</div>";

		echo "<div class='col-sm-12' align='justify' id='inserir'>";
		echo "	<label style='font-size: 12px;'>";
		echo "		<b>GERANDO UM RELATÓRIO DE TAREFA</b><br><br>";
		echo "		No relatório de ".$nomeRelatorio.", apresenta-se a imagem abaixo:<br><br>";
		echo "		<img src='../img/imgHelpRuv/relTarefas.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Nessa tela, basta selecionar ou preencher qualquer um ou mais campos, para gerar o relatório, conformar imagem abaixo: <br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		<img src='../img/imgHelpRuv/relTarefas1.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Observação: O campo 'Data RUV' só aparecerá os que foram preenchidos no registro de ".$nomeRelatorio.". <br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Feito isso, você tem a opção de 'Gerar PDF', como imagem abaixo (dessa forma, o usuário poderá optar por baixar ou visualizar no navegador): <br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		<img src='../img/imgHelpRuv/relTarefas2.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Ou criar um novo registro de ".$nomeRelatorio.", como imagem abaixo:<br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		<img src='../img/imgHelpRuv/relTarefas3.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "	</label>";
		echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <p style='height: 30px;'>&nbsp;</p>";
        echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <a href='inicio.php?m=help' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

	}

	public function relServicos(){

		$nomeTela = "Relatório de Serviços e Extras";
		$nomeRelatorio = "serviços e extras";

		echo "<div class='col-sm-6' align='justify'>";
		echo "	&nbsp;";
		echo "</div>";

        echo "<div class='col-sm-6'>";
        echo "  <a href='inicio.php?m=help' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

        echo "<div class='col-sm-12' style='height: 50px;'>&nbsp;</div>";

		echo "<div class='col-sm-12' align='justify' id='inserir'>";
		echo "	<label style='font-size: 12px;'>";
		echo "		<b>GERANDO UM RELATÓRIO DE SERVIÇOS E EXTRAS</b><br><br>";
		echo "		No relatório de ".$nomeRelatorio.", apresenta-se a imagem abaixo:<br><br>";
		echo "		<img src='../img/imgHelpRuv/relServicos.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Nessa tela, basta selecionar ou preencher qualquer um ou mais campos, para gerar o relatório, conformar imagem abaixo: <br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		<img src='../img/imgHelpRuv/relServicos1.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Observação: O campo 'Data RUV' só aparecerá os que foram preenchidos no registro de ".$nomeRelatorio.". <br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Feito isso, você tem a opção de 'Gerar PDF', como imagem abaixo (dessa forma, o usuário poderá optar por baixar ou visualizar no navegador): <br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		<img src='../img/imgHelpRuv/relServicos2.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Ou criar um novo registro de ".$nomeRelatorio.", como imagem abaixo:<br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		<img src='../img/imgHelpRuv/relServicos3.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "	</label>";
		echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <p style='height: 30px;'>&nbsp;</p>";
        echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <a href='inicio.php?m=help' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

	}

	public function relUsuarios(){

		$nomeTela = "Relatório de Usuários";
		$nomeRelatorio = "usuários";

		echo "<div class='col-sm-6' align='justify'>";
		echo "	&nbsp;";
		echo "</div>";

        echo "<div class='col-sm-6'>";
        echo "  <a href='inicio.php?m=help' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

        echo "<div class='col-sm-12' style='height: 50px;'>&nbsp;</div>";

		echo "<div class='col-sm-12' align='justify' id='inserir'>";
		echo "	<label style='font-size: 12px;'>";
		echo "		<b>GERANDO UM RELATÓRIO DE USUÁRIOS</b><br><br>";
		echo "		No relatório de ".$nomeRelatorio.", restrito somente a administradores, têm como função apresentar todos os usuários do sistema. Apresenta-se a imagem abaixo:<br><br>";
		echo "		<img src='../img/imgHelpRuv/relUsuarios.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Nessa tela, basta selecionar ou preencher qualquer um ou mais campos, para gerar o relatório, conformar imagem abaixo: <br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		<img src='../img/imgHelpRuv/relUsuarios1.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

//		echo "		Observação: O campo 'Data RUV' só aparecerá os que foram preenchidos no registro de ".$nomeRelatorio.". <br>";

//        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Feito isso, você tem a opção de 'Gerar PDF', como imagem abaixo (dessa forma, o usuário poderá optar por baixar ou visualizar no navegador): <br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		<img src='../img/imgHelpRuv/relUsuarios2.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Ou criar um novo registro de ".$nomeRelatorio.", como imagem abaixo:<br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		<img src='../img/imgHelpRuv/relUsuarios3.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "	</label>";
		echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <p style='height: 30px;'>&nbsp;</p>";
        echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <a href='inicio.php?m=help' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

	}

	public function relIndice(){

		echo "<div class='col-sm-12'";
		echo "	<label>Ajuda sobre Relatório de Índice</label>";
		echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <a href='inicio.php?m=help' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

	}

	public function configUsuarios(){

		$nomeTela = "Configuração de Usuários";
		$nomeRelatorio = "usuários";

		echo "<div class='col-sm-6' align='justify'>";
		echo "	&nbsp;";
		echo "</div>";

        echo "<div class='col-sm-6'>";
        echo "  <a href='inicio.php?m=help' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

        echo "<div class='col-sm-12' style='height: 50px;'>&nbsp;</div>";

		echo "<div class='col-sm-12' align='justify' id='inserir'>";
		echo "	<label style='font-size: 12px;'>";
		echo "		<b>CONFIGURANDO UM USUÁRIO (EM DESENVOLVIMENTO)</b><br><br>";
		echo "		No relatório de ".$nomeRelatorio.", restrito somente a administradores, têm como função apresentar todos os usuários do sistema. Apresenta-se a imagem abaixo:<br><br>";
		echo "		<img src='../img/imgHelpRuv/relUsuarios.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Nessa tela, basta selecionar ou preencher qualquer um ou mais campos, para gerar o relatório, conformar imagem abaixo: <br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		<img src='../img/imgHelpRuv/relUsuarios1.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

//		echo "		Observação: O campo 'Data RUV' só aparecerá os que foram preenchidos no registro de ".$nomeRelatorio.". <br>";

//        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Feito isso, você tem a opção de 'Gerar PDF', como imagem abaixo (dessa forma, o usuário poderá optar por baixar ou visualizar no navegador): <br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		<img src='../img/imgHelpRuv/relUsuarios2.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "		Ou criar um novo registro de ".$nomeRelatorio.", como imagem abaixo:<br>";

        echo "  	<p style='height: 10px;'>&nbsp;</p>";
		echo "		<img src='../img/imgHelpRuv/relUsuarios3.png' width='700' height='500' alt='".$nomeTela."' title='".$nomeTela."'><br>";
        echo "  	<p style='height: 10px;'>&nbsp;</p>";

		echo "	</label>";
		echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <p style='height: 30px;'>&nbsp;</p>";
        echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <a href='inicio.php?m=help' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

	}

	public function configPerfil(){

		echo "<div class='col-sm-12'";
		echo "	<label>Ajuda sobre Configuração de Perfil</label>";
		echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <a href='inicio.php?m=help' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

	}

	public function configAtividades(){

		echo "<div class='col-sm-12'";
		echo "	<label>Ajuda sobre Configuração de Atividades</label>";
		echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <a href='inicio.php?m=help' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

	}

	public function configBonificacao(){

		echo "<div class='col-sm-12'";
		echo "	<label>Ajuda sobre Configuração de Bonificação</label>";
		echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <a href='inicio.php?m=help' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

	}

	public function configBonus(){

		echo "<div class='col-sm-12'";
		echo "	<label>Ajuda sobre Configuração de Bônus</label>";
		echo "</div>";

        echo "<div class='col-sm-12'>";
        echo "  <a href='inicio.php?m=help' class='btn btn-default' title='Voltar' alt='Voltar'>";
        echo "      <img src='../img/btn_back.png' width='25' height='25'>";
        echo "  </a>";
        echo "<br><label style='padding-top: 0px;'>Voltar</label>";
        echo "</div>";

	}



}