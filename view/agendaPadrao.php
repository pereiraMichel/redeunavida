<!DOCTYPE html>

<?php
    require_once 'formulario.php';
    require_once '../controller/constantes.php';

    $formulario = new formulario();

?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>REDE UNA VIDA</title>

        <link rel="stylesheet" href="../css/font-awesome.min.css">
        
        <link rel="shortcut icon" href="../icon/ruv.ico">
        <link rel="icon" type="image/png" href="../images/ruvicon.png">
        
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
        <script type="text/javascript" src="../js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript">
                jQuery(document).ready(function($) {
                        $('body').addClass('images');
                });
        </script>

<!--	<script type="text/javascript" src="./CETAS_files/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="./CETAS_files/back-to-top.js"></script>-->
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			scrolltotop.init();
		});
	</script>        
        
        <link rel="author" href="autor.txt">        
    </head>
    <body style="padding-left: 0px; padding-top: 0px;">
<!--	<header id="header">
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="text-center">
				<div class="navbar-text-top">
					<div class="col-sm-4">
						<figure class="navbar-logo navbar-left hidden-xs">
							<a href="index.php">
								<img src="images/logoRUV50x51.png" title="Rede Una Vida">
							</a>
						</figure> /figure 
					</div> /col-sm-4 

					<div class="col-sm-4">
						<div class="hidden-sm"><span>RUV</span></div>
						<div class="visible-sm"><span>RUV</span></div>
						<div class="navbar-subtext-top hidden-sm">
							 REDE UNA VIDA 
						</div> /hidden-sm 
						<div class="navbar-subtextsm-top visible-sm">
							 REDE UNA VIDA 
						</div> /visible-sm 
					</div> /col-sm-4 

					<hr class="visible-xs"> /hr 
					<br class="visible-xs">
					<div class="col-sm-4">
						<div class="navbar-text navbar-right">
							<a href="https://mail.cetas.com.br:8443" class="text-link">
								<button class="btn btn-primary">
									<i class="fa fa-envelope-o"></i> WebMail
								</button>
							</a>
							<a href="https://cetas.com.br/redmine" class="text-link">
								<button class="btn btn-danger">
									<i class="fa fa-users"></i> Redmine
								</button>
							</a>
                                                        <a href="sistema/" class="text-link">
                                                                <button class="btn btn-warning">
                                                                        <i class="fa fa-th"></i> Acesso ao Sistema
                                                                </button>
                                                        </a>
						</div>
						<br class="visible-xs">
					</div> /col-sm-4 
				</div>
			</div>
		</nav>
	</header> /header -->

<!--	<div id="content">
		<div class="bs-docs-header bs-docs-first">
			<div class="container">-->
				
<!--                            <table  class="table table-condensed" style="font-family: Lato; font-size: 10px; text-align: center">
                                <tr class="danger">
                                    <td><h3 class="text-info"><i class="fa fa-dashboard"></i> AGENDA</h3></td>
                                </tr>
                                <tr class="warning" style="font-family: Lato; font-size: 15px;">
                                    <td>
                                        <small>
                                            <?php
                                            //$filename = "../texto/agenda.xml";

//                                            @header("Content-Type: text/html; charset=utf-8");
//                                            $xml = simplexml_load_file($filename);
//
//                                            foreach ($xml->texto as $texto) {
//                                                echo $texto->agenda;
//                                                echo "<br>";
//                                            }
                                            ?>
                                        </small>
                                    </td>
                                </tr>
                            </table>-->

                                <table  class="table table-condensed" style="font-family: Lato; font-size: 10px; text-align: center">

                                    <tr style="font-size: 15px; text-align: center">
                                        <td class="active">&nbsp;</td>
                                        <td><b>Domingo</b></td>
                                        <td><b>2ª Feira</b></td>
                                        <td><b>3ª Feira</b></td>
                                        <td><b>4ª Feira</b></td>
                                        <td><b>5ª Feira</b></td>
                                        <td><b>6ª Feira</b></td>
                                        <td><b>Sábado</b></td>
                                    </tr>
                                    <tr>
                                        <td class="active" style="font-size: 15px;">9</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td>&nbsp;</td><!-- Sábado -->                                    
                                    </tr>
                                    <tr>
                                        <td class="active" style="text-align: right;">30</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td>&nbsp;</td><!-- Sábado -->                                    
                                    </tr>
                                    <tr>
                                        <td class="active" style="font-size: 15px;">10</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td>&nbsp;</td><!-- Sábado -->                                    
                                    </tr>
                                    <tr>
                                        <td class="active" style="text-align: right;">30</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td>&nbsp;</td><!-- Sábado -->                                    
                                    </tr>
                                    <tr>
                                        <td class="active" style="font-size: 15px;">11</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td>&nbsp;</td><!-- Sábado -->                                    
                                    </tr>
                                    <tr>
                                        <td class="active" style="text-align: right;">30</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td>&nbsp;</td><!-- Sábado -->                                    
                                    </tr>
                                    <tr>
                                        <td class="active" style="font-size: 15px;">12</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td>&nbsp;</td><!-- Sábado -->                                    
                                    </tr>
                                    <tr>
                                        <td class="active" style="text-align: right;">30</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td>&nbsp;</td><!-- Sábado -->                                    
                                    </tr>
                                    <tr>
                                        <td class="active" style="font-size: 15px;">13</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td>&nbsp;</td><!-- Sábado -->                                    
                                    </tr>
                                    <tr>
                                        <td class="active" style="text-align: right;">30</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td>&nbsp;</td><!-- Sábado -->                                    
                                    </tr>
                                    <tr>
                                        <td class="active" style="font-size: 15px;">14</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td>&nbsp;</td><!-- Sábado -->                                    
                                    </tr>
                                    <tr>
                                        <td class="active" style="text-align: right;">30</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td>&nbsp;</td><!-- Sábado -->                                    
                                    </tr>
                                    <tr>
                                        <td class="active" style="font-size: 15px;">15</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td>&nbsp;</td><!-- Sábado -->                                    
                                    </tr>
                                    <tr>
                                        <td class="active" style="text-align: right;">30</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td>&nbsp;</td><!-- Sábado -->                                    
                                    </tr>
                                    <tr>
                                        <td class="active" style="font-size: 15px;">16</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td>&nbsp;</td><!-- Sábado -->                                    
                                    </tr>
                                    <tr>
                                        <td class="active" style="text-align: right;">30</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td>&nbsp;</td><!-- Sábado -->                                    
                                    </tr>
                                    <tr>
                                        <td class="active" style="font-size: 15px;">17</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td>&nbsp;</td><!-- Sábado -->                                    
                                    </tr>
                                    <tr>
                                        <td class="active" style="text-align: right;">30</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td>&nbsp;</td><!-- Sábado -->                                    
                                    </tr>
                                    <tr>
                                        <td class="active" style="font-size: 15px;">18</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td>&nbsp;</td><!-- Sábado -->                                    
                                    </tr>
                                    <tr>
                                        <td class="active" style="text-align: right;">30</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td>&nbsp;</td><!-- Sábado -->                                    
                                    </tr>
                                    <tr>
                                        <td class="active" style="font-size: 15px;">19</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td>&nbsp;</td><!-- Sábado -->                                    
                                    </tr>
                                    <tr>
                                        <td class="active" style="text-align: right;">30</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td>&nbsp;</td><!-- Sábado -->                                    
                                    </tr>
                                    <tr>
                                        <td class="active" style="font-size: 15px;">20</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td>&nbsp;</td><!-- Sábado -->                                    
                                    </tr>
                                    <tr>
                                        <td class="active" style="text-align: right;">30</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td>&nbsp;</td><!-- Sábado -->                                    
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td>&nbsp;</td><!-- Sábado -->                                    
                                    </tr>
                                </table>
                                
<p style="text-align: center; color: red;">Agenda vazia. Selecione a semana desejável.</p>
                                <br/>

                                <table class="table table-condensed" style="width: 300px;">
                                    <tr>
                                        <td class="info" style="text-align: left;">Atividades semanais</td>
                                    </tr>
                                    <tr>
                                        <td class="warning" style="text-align: center;">Atividades mensais</td>
                                    </tr>
                                    <tr>
                                        <td class="success" style="text-align: right;">Atividades trimestrais</td>
                                    </tr>
                                </table>



</body>
</html>