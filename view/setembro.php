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

                                <table  class="table table-condensed" style="font-family: Lato; font-size: 10px; text-align: center">

                                    <tr style="font-size: 15px; text-align: center">
                                        <td class="active" style="width: 50px">&nbsp;</td>
                                        <td style="width: 150px"><b>Domingo</b></td>
                                        <td style="width: 150px"><b>2ª Feira</b></td>
                                        <td style="width: 150px"><b>3ª Feira</b></td>
                                        <td style="width: 150px"><b>4ª Feira</b></td>
                                        <td style="width: 150px"><b>5ª Feira</b></td>
                                        <td style="width: 150px"><b>6ª Feira</b></td>
                                        <td style="width: 150px"><b>Sábado</b></td>
                                    </tr>
                                    <tr>
                                        <td class="active" style="font-size: 15px;">9</td>
                                        <td rowspan="9" class="warning">
                                            <p style="padding-top: 90px; font-family: Lato; font-size: 15px; color: #FF0000">
                                                <b>Jornada Real<br> Mensal</b><br/>
                                                9h às 13h
                                            </p>
                                        </td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td rowspan="19" class="success">
                                            <p style="padding-top: 200px; font-family: Lato; font-size: 15px; color: #FF0000">
                                                <b>Jornada Real<br> Trimestral</b><br/>
                                                9h às 18h
                                            </p>
                                        </td><!-- Sábado -->
                                    </tr>
                                    <tr>
                                        <td class="active" style="text-align: right;">30</td>
<!--                                        <td>&nbsp;</td>--><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <!--<td>&nbsp;</td> Sábado -->
                                    </tr>
                                    <tr>
                                        <td class="active" style="font-size: 15px;">10</td>
                                        <!--<td>&nbsp;</td>--><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <!--<td>&nbsp;</td> Sábado -->
                                    </tr>
                                    <tr>
                                        <td class="active" style="text-align: right;">30</td>
                                        <!--<td>&nbsp;</td>--><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <!--<td>&nbsp;</td> Sábado -->
                                    </tr>
                                    <tr>
                                        <td class="active" style="font-size: 15px;">11</td>
                                        <!--<td>&nbsp;</td>--><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <!--<td>&nbsp;</td> Sábado -->
                                    </tr>
                                    <tr>
                                        <td class="active" style="text-align: right;">30</td>
                                        <!--<td>&nbsp;</td>--><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <!--<td>&nbsp;</td> Sábado -->
                                    </tr>
                                    <tr>
                                        <td class="active" style="font-size: 15px;">12</td>
                                        <!--<td>&nbsp;</td>--><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <!--<td>&nbsp;</td> Sábado -->
                                    </tr>
                                    <tr>
                                        <td class="active" style="text-align: right;">30</td>
                                        <!--<td>&nbsp;</td>--><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <!--<td>&nbsp;</td> Sábado -->
                                    </tr>
                                    <tr>
                                        <td class="active" style="font-size: 15px;">13</td>
                                        <!--<td>&nbsp;</td>--><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <!--<td>&nbsp;</td> Sábado -->
                                    </tr>
                                    <tr>
                                        <td class="active" style="text-align: right;">30</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <!--<td>&nbsp;</td> Sábado -->
                                    </tr>
                                    <tr>
                                        <td class="active" style="font-size: 15px;">14</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td>&nbsp;</td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <!--<td>&nbsp;</td> Sábado -->
                                    </tr>
                                    <tr>
                                        <td class="active" style="text-align: right;">30</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td rowspan="5" class="info">
                                            <p style="padding-top: 40px; font-family: Lato; font-size: 15px; color: #FF0000">
                                                <b>JR Semanal</b><br/>
                                                14:30h às 16:30h
                                            </p>                                              
                                        </td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <!--<td>&nbsp;</td> Sábado -->
                                    </tr>
                                    <tr>
                                        <td class="active" style="font-size: 15px;">15</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <!--<td>&nbsp;</td> Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <!--<td>&nbsp;</td> Sábado -->
                                    </tr>
                                    <tr>
                                        <td class="active" style="text-align: right;">30</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <!--<td>&nbsp;</td> Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <!--<td>&nbsp;</td> Sábado -->
                                    </tr>
                                    <tr>
                                        <td class="active" style="font-size: 15px;">16</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <!--<td>&nbsp;</td>  Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <!--<td>&nbsp;</td> Sábado -->
                                    </tr>
                                    <tr>
                                        <td class="active" style="text-align: right;">30</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <!--<td>&nbsp;</td> Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <!--<td>&nbsp;</td> Sábado -->
                                    </tr>
                                    <tr>
                                        <td class="active" style="font-size: 15px;">17</td>
                                        <td rowspan="5" class="info">
                                            <p style="padding-top: 30px; font-family: Lato; font-size: 15px; color: #000000">
                                                <b>Meditação<br> Cristã</b><br>
                                                17h às 19h
                                            </p>                                            
                                        </td> <!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <td class="info" rowspan="3">
                                            <p style="padding-top: 10px; font-family: Lato; font-size: 15px; color: blue">
                                                <b>Yoga</b><br/>
                                                17:30h às 18:30h
                                            </p>  
                                        </td><!-- Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <!--<td>&nbsp;</td> Sábado -->
                                    </tr>
                                    <tr>
                                        <td class="active" style="text-align: right;">30</td>
                                        <!--<td>&nbsp;</td>--><!-- Domingo -->
                                        <td rowspan="4" class="info">
                                            <p style="padding-top: 30px; font-family: Lato; font-size: 15px; color: blue">
                                                <b>Yoga</b><br/>
                                                17:30h às 19h
                                            </p>                                          
                                        </td> <!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <!--<td>&nbsp;</td> Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <!--<td>&nbsp;</td> Sábado -->
                                    </tr>
                                    <tr>
                                        <td class="active" style="font-size: 15px;">18</td>
                                        <!--<td>&nbsp;</td>--><!-- Domingo -->
                                        <!--<td>&nbsp;</td>--><!-- Segunda -->
                                        <td rowspan="5" class="info">
                                            <p style="padding-top: 45px; font-family: Lato; font-size: 15px; color: #FF0000">
                                                <b>JR Semanal</b><br/>
                                                18h às 20h
                                            </p>                                          
                                        </td><!-- Terça -->
                                        <!--<td>&nbsp;</td> Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <!--<td>&nbsp;</td> Sábado -->
                                    </tr>
                                    <tr>
                                        <td class="active" style="text-align: right;">30</td>
                                        <!--<td>&nbsp;</td>--><!-- Domingo -->
                                        <!--<td>&nbsp;</td>--><!-- Segunda -->
                                        <!--<td>&nbsp;</td>--><!-- Terça -->
                                        <td class="info" rowspan="5">
                                            <p style="padding-top: 30px; font-family: Lato; font-size: 15px; color: blueviolet">
                                                <b>RUV</b><br/>
                                                18:30h às 20:30h
                                            </p>
                                        </td><!-- Quarta -->
                                        <td class="info" rowspan="3">
                                            <p style="padding-top: 15px; font-family: Lato; font-size: 15px; color: #000000">
                                                <b>Meditação</b><br/>
                                                18:30h às 19:30h
                                            </p>
                                        </td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td>&nbsp;</td><!-- Sábado -->
                                    </tr>
                                    <tr>
                                        <td class="active" style="font-size: 15px;">19</td>
                                        <!--<td>&nbsp;</td>--><!-- Domingo -->
                                        <!--<td>&nbsp;</td>--><!-- Segunda -->
                                        <!--<td>&nbsp;</td>--><!-- Terça -->
                                        <!--<td>&nbsp;</td> Quarta -->
                                        <!--<td>&nbsp;</td> Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td>&nbsp;</td><!-- Sábado -->
                                    </tr>
                                    <tr>
                                        <td class="active" style="text-align: right;">30</td>
                                        <!--<td>&nbsp;</td>--><!-- Domingo -->
                                        <!--<td>&nbsp;</td>--><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <!--<td>&nbsp;</td> Quarta -->
                                        <td>&nbsp;</td> <!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td>&nbsp;</td><!-- Sábado -->
                                    </tr>
                                    <tr>
                                        <td class="active" style="font-size: 15px;">20</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <!--<td>&nbsp;</td>--><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <!--<td>&nbsp;</td> Quarta -->
                                        <td>&nbsp;</td><!-- Quinta -->
                                        <td>&nbsp;</td><!-- Sexta -->
                                        <td>&nbsp;</td><!-- Sábado -->
                                    </tr>
                                    <tr>
                                        <td class="active" style="text-align: right;">30</td>
                                        <td>&nbsp;</td><!-- Domingo -->
                                        <td>&nbsp;</td><!-- Segunda -->
                                        <td>&nbsp;</td><!-- Terça -->
                                        <!--<td>&nbsp;</td> Quarta -->
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
                                <br/><br/>

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