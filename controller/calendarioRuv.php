<?php

/**
 * Calendário RUV
 *
 * @author Debug
 */
class calendarioRuv {
    
    private $codusuario;
    
    function getCodusuario() {
        return $this->codusuario;
    }

    function setCodusuario($codusuario) {
        $this->codusuario = $codusuario;
    }

        
    public function anoBisexto(){
        date_default_timezone_set('America/Sao_Paulo');
        //if ( (($ano%4) == 0 && ($ano%100) != 0) || ($ano%400) == 0 )
        $ano = date('Y');
        
        if (($ano%4 == 0) && ($ano%100 != 0) || ($ano%400) == 0){
            return 0;
//            echo "Este ano é bissexto";
//            echo "<br/>";
        }else{
            return 1;
//            echo "Este ano não é bissexto";
//            echo "<br/>";
        }
        
    }
    
    public function configuracaoCalendario($pagina){
        date_default_timezone_set('America/Sao_Paulo');
        
        $estacao = 0;
        $codEstacao = 0;

        $mes = date('m');
        $dia = date('d');
        $ano = date('Y');

        $anoBissexto = $this->anoBisexto();
        
        $anoAnterior = $ano - 1;
        
        $dataInicio = "18-09-".$anoAnterior;
        $dinicio = "18-09-2016";
//        $dataFim = "17-09-2017";
        $dataFim = date('d-m-Y');

        $diferenca = strtotime($dataFim) - strtotime($dinicio);
        
        
//        $diferencaData = floor((strtotime($dataFim) - strtotime($dinicio))/86400);
        
//        echo "Diferença entre datas: ".$diferencaData."<br>";
        
//        $timer = round((strtotime($dataFim) - strtotime($dataInicio))/-(24*60*60), 0);
//        $timer = round((strtotime($dataFim) - strtotime($dataInicio))/-(24*60*60), 0);
        
        $dias = (int) floor($diferenca /(24*60*60));
        
        if($dias >= 366 || $dias >= 365){
            $dias = 1;

        }
//        echo "Dias: ".$dias;
//        $calculoData = $dias;// 276 dias (até 22/06/2016)
//        $dataInicio = "09/20/".$ano;
//        $dataFim = date('m/d/Y');
//        $calculoData = round((strtotime($dataFim) - strtotime($dataInicio))/(24*60*60), 0) + 1;
        if($anoBissexto == 0){
//            //É bissexto
            $calculoData = $dias;
////            $calculoData = round((strtotime($dataFim) - strtotime($dataInicio))/-(24*60*60), 0) + 2;
        }else{
//            //Não é bissexto
            $calculoData = $dias + 1;
////            $calculoData = round((strtotime($dataFim) - strtotime($dataInicio))/-(24*60*60), 0) + 1;
//            
        }
        
//        echo "Estou no calculo da data: ".$calculoData."<br>";
/*
- Outono: de 21 de março a 21 de junho
- Inverno: de 21 de junho a 23 de setembro
- Primavera: de 23 de setembro a 21 de dezembro
- Verão: de 21 de dezembro a 21 de março
*/
        if($calculoData >= 1 and $calculoData <= 91){
            $estacao = "Primavera";
            $codEstacao = 1;
            
            if($calculoData >= 1 and $calculoData <= 28){
                $mesRuv = 1;
            }else if($calculoData > 28 and $calculoData <= 56){
                $mesRuv = 2;
            }else if($calculoData > 56 and $calculoData <= 91){
                $mesRuv = 3;
            }
        }
        else if($calculoData >= 92 and $calculoData <= 182){
            $estacao = "Verão";
            $codEstacao = 2;

            if($calculoData >= 92 and $calculoData <= 119){
                $mesRuv = 1;
            }else if($calculoData >= 120 and $calculoData <= 148){
                $mesRuv = 2;
            }else if($calculoData > 148 and $calculoData <= 182){
                $mesRuv = 3;
            }
        }
        else if($calculoData >= 183 and $calculoData <= 273){
            $estacao = "Outono";
            $codEstacao = 3;

            if($calculoData >= 183 and $calculoData <= 211){
                $mesRuv = 1;
            }else if($calculoData > 211 and $calculoData <= 239){
                $mesRuv = 2;
            }else if($calculoData > 239 and $calculoData <= 273){
                $mesRuv = 3;
            }
        }
        else if($calculoData >= 274 and $calculoData <= 364){
            $estacao = "Inverno";
            $codEstacao = 4;

            if($calculoData >= 274 and $calculoData <= 302){
                $mesRuv = 1;
            }else if($calculoData > 302 and $calculoData <= 330){
                $mesRuv = 2;
            }else if($calculoData > 330 and $calculoData <= 364){
                $mesRuv = 3;
            }
        }
        
        //Cálculo da semana
        //and &&
        //e ||
        
                if($calculoData >= 1 and $calculoData <= 7){
                    $semana = 1;
//                    $semana = $calculoData;
                }else if($calculoData >= 8 and $calculoData <= 14){
                    $semana = 2;//deveria estar aqui..
                }else if($calculoData >= 15 and $calculoData <= 21){
                    $semana = 3;
                }else if($calculoData >= 22 and $calculoData <= 28){
                    $semana = 4;
                }
                else if($calculoData >= 29 and $calculoData <= 35){
                    $semana = 1;
                }else if($calculoData >= 36 and $calculoData <= 42){
                    $semana = 2;
                }else if($calculoData >= 43 and $calculoData <= 49){
                    $semana = 3;
                }else if($calculoData >= 50 and $calculoData <= 56){
                    $semana = 4;
                }
                else if($calculoData >= 57 and $calculoData <= 63){
                    $semana = 1;
                }else if($calculoData >= 64 and $calculoData <= 70){
                    $semana = 2;
                }else if($calculoData >= 71 and $calculoData <= 77){
                    $semana = 3;
                }else if($calculoData >= 78 and $calculoData <= 84){
                    $semana = 4;
                }else if($calculoData >= 85 and $calculoData <= 91){
                    $semana = 5;//1
                }
                
                //Verão, de 92 a 182
                else if($calculoData >= 92 and $calculoData <= 98){
                    $semana = 1;
                }else if($calculoData >= 99 and $calculoData <= 105){
                    $semana = 2;
                }else if($calculoData >= 106 and $calculoData <= 112){
                    $semana = 3;
                }else if($calculoData >= 113 and $calculoData <= 119){
                    $semana = 4;
                }
                else if($calculoData >= 120 and $calculoData <= 126){
                    $semana = 1;
                }else if($calculoData >= 127 and $calculoData <= 133){
                    $semana = 2;
                }else if($calculoData >= 134 and $calculoData <= 140){
                    $semana = 3;
                }else if($calculoData >= 141 and $calculoData <= 147){
                    $semana = 4;
                }
                else if($calculoData >= 148 and $calculoData <= 154){
                    $semana = 1;
                }else if($calculoData >= 155 and $calculoData <= 161){
                    $semana = 2;
                }else if($calculoData >= 162 and $calculoData <= 168){
                    $semana = 3;
                }else if($calculoData >= 169 and $calculoData <= 175){
                    $semana = 4;
                }else if($calculoData >= 176 and $calculoData <= 182){
                    $semana = 5;
                }
                
                //Outono, de 183 a 273
                else if($calculoData >= 183 and $calculoData <= 189){
                    $semana = 1;
                }else if($calculoData >= 190 and $calculoData <= 196){
                    $semana = 2;
                }else if($calculoData >= 197 and $calculoData <= 203){
                    $semana = 3;
                }else if($calculoData >= 204 and $calculoData <= 210){
                    $semana = 4;
                }
                else if($calculoData >= 211 and $calculoData <= 217){
                    $semana = 1;
                }else if($calculoData >= 218 and $calculoData <= 224){
                    $semana = 2;
                }else if($calculoData >= 225 and $calculoData <= 231){
                    $semana = 3;
                }else if($calculoData >= 232 and $calculoData <= 238){
                    $semana = 4;
                }
                else if($calculoData >= 239 and $calculoData <= 245){
                    $semana = 1;
                }else if($calculoData >= 246 and $calculoData <= 252){
                    $semana = 2;
                }else if($calculoData >= 253 and $calculoData <= 259){
                    $semana = 3;
                }else if($calculoData >= 260 and $calculoData <= 266){
                    $semana = 4;
                }else if($calculoData >= 267 and $calculoData <= 273){
                    $semana = 5;
                }
                
                //Inverno, de 274 a 364
                else if($calculoData >= 274 and $calculoData <= 280){
                    $semana = 1;
                }else if($calculoData >= 281 and $calculoData <= 287){
                    $semana = 2;
                }else if($calculoData >= 288 and $calculoData <= 294){
                    $semana = 3;
                }else if($calculoData >= 297 and $calculoData <= 301){
                    $semana = 4;
                }
                else if($calculoData >= 302 and $calculoData <= 308){
                    $semana = 1;
                }else if($calculoData >= 309 and $calculoData <= 315){
                    $semana = 2;
                }else if($calculoData >= 316 and $calculoData <= 322){
                    $semana = 3;
                }else if($calculoData >= 323 and $calculoData <= 329){
                    $semana = 4;
                }
                else if($calculoData >= 330 and $calculoData <= 336){
                    $semana = 1;
                }else if($calculoData >= 337 and $calculoData <= 343){
                    $semana = 2;
                }else if($calculoData >= 344 and $calculoData <= 350){
                    $semana = 3;
                }else if($calculoData >= 351 and $calculoData <= 357){
                    $semana = 4;
                }else if($calculoData >= 358 and $calculoData <= 364){
                    $semana = 5;
                }

        $anoLetivo = date('y');
        $diaInicio = "18";
        $mesInicio = "09";
        $dataMarcadaInicio = date("18/09/2016");
        $dataMarcadaFim = date("17/09/2017");
//        echo $calculoData;
//        if ((date('y') >= "15" || $mes >= "09") || (date('y') == "16" || $mes <= "09")){
        if ((date('d/m/Y') >= $dataMarcadaInicio) and (date('d/m/Y') <= $dataMarcadaFim)){
//        if ((date('d') >= "18" || $mes >= "09")){
            $anoLetivo = $anoLetivo{1};
        }else{
            $anoLetivo = $anoLetivo{1} - 1;
        }
//        $anoLetivo = date('y');
//        echo "<br>Mês RUV: ".$mesRuv;
        if($pagina === "calendario"){
            $this->preencheCalendario($anoLetivo, $codEstacao, $mesRuv, $semana, $dias, "&nbsp;");
        }else if($pagina === "estedia"){
            $this->preencheTempo($anoLetivo, $codEstacao, $mesRuv, $semana, $dias);
        }else if($pagina === "ppMeditacao"){
            $this->calendarioPP($anoLetivo, $mesRuv, $codEstacao, $semana, $dias);
        }else if($pagina === "ppPortal"){
            $this->calendarioPortal($anoLetivo, $mesRuv, $codEstacao, $semana, $dias);
        }else if($pagina === "paragempresenca"){
            $this->calendarioParagem($semana, $mesRuv, $codEstacao);
        }
    }
    
    public function preencheTempo($ano, $estacao, $mes, $semana, $dia){
        date_default_timezone_set('America/Sao_Paulo');

        $larguraColuna = 5;
        
        $dataJava = date('N');
        
        $dataSemanaJava = array(
            0 => 'Domingo',
            1 => '2ª feira',
            2 => '3ª feira',
            3 => '4ª feira',
            4 => '5ª feira',
            5 => '6ª feira',
            6 => 'Sábado'
        );
        
        $dataSemanaNumerica = array(
            0 => '1',
            1 => '2',
            2 => '3',
            3 => '4',
            4 => '5',
            5 => '6',
            6 => '7'
            
        );
        $this->tempoRuv($ano, $estacao, $mes, $semana, $dataSemanaNumerica[$dataJava]);
    }


    public function preencheCalendario($ano, $estacao, $mes, $semana, $dia, $mensagem){
        date_default_timezone_set('America/Sao_Paulo');

        $larguraColuna = 5;
        
        $dataJava = date('N');
        
        $dataSemanaJava = array(
            7 => 'Domingo',
            1 => '2ª feira',
            2 => '3ª feira',
            3 => '4ª feira',
            4 => '5ª feira',
            5 => '6ª feira',
            6 => 'Sábado'
        );
        
        $dataSemanaNumerica = array(
            7 => '1',
            1 => '2',
            2 => '3',
            3 => '4',
            4 => '5',
            5 => '6',
            6 => '7'
            
        );
//        echo "Data semana: ".$dataSemanaJava[$dataJava];
//        echo "<br>Data Java: ".$dataJava;
//        echo "<br>Mês: ".$mes;
//        echo "Semana: ".$semana;
        echo "      <div class='table-responsive' style='padding-left: 10px;'>";
        echo "          <table class='table table-condensed' style='text-decoration: none;'>";
        echo "              <tr style='background-color: #f1cd8b;'>";
        echo "                  <td colspan='7'>";
        echo "                      <div id='tituloPaginas' style='font-weight: normal;'>Calendário</div>";
        echo "                  </td>";
        echo "              </tr>";
        //Segunda linha

        //Terceira linha
        echo "              <tr>";
        echo "                  <td>";
        echo "                      <label style='color: #FF0000;' for='ano'><b>".$ano."</b></label>";
        echo "                  </td>";
        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <label for='estacao'><b>".$estacao."</b></label>";//Problema
        echo "                  </td>";
        echo "                  <td>";
//        echo "                      <label for='mes'><b>".$estacao."</b></label>";
        echo "                      <label for='mes'><b>".$mes."</b></label>";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <label for='semana'><b>".$semana."</b></label>"; //".$semana." Verificar aqui
        echo "                  </td>";
        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <label style='color: #0000FF' for='dias'><b>".$dataSemanaNumerica[$dataJava]."</b></label>"; //era $dia
//        echo "                      <label style='color: #0000FF' for='dias'><b>".$dataSemanaNumerica[$dataJava]."</b></label>"; //era $dia
        echo "                  </td>";
        echo "              </tr>";
        //Quarta linha
        echo "              <tr class='warning'>";
        echo "                  <td>";
        echo "                      <small>Ano</small>";
        echo "                  </td>";
        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <small>Estação</small>";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <small>Mês</small>";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <small>Semana</small>";
        echo "                  </td>";
        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <small>Dia</small>";
        echo "                  </td>";
        echo "              </tr>";
        //Quinta linha
        echo "              <tr>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td colspan='3'>";
        echo "                      <span><label id='hora'></label></span>";
//        echo "                      <span><b>".date('H')."</b><label id='hora'></label></span>";
        echo "                  </td>";
        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "              </tr>";
        //Sexta linha
        echo "              <tr class='warning'>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td colspan='3'>";
        echo "                      <small>Hora</small>";
        echo "                  </td>";
        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "              </tr>";
        //Sétima linha
        echo "              <tr>";
//        echo "                  <td>";
//        echo "                      &nbsp;";
//        echo "                  </td>";
//        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
//        echo "                      &nbsp;";
//        echo "                  </td>";
        
        echo "                  <td colspan='7'>";
        echo                        "<i>".date('d/m/Y')." - ".$dataSemanaJava[$dataJava]."</i>";///date('d/m/Y');
        echo "                  </td>";

        echo "              </tr>";
        //Oitava linha
//        echo "              <tr class='warning'>";
//
//        echo "                  <td colspan='7'>";
//        echo                        "Quantidade de dias: ".$calculoData;
//        echo "                  </td>";
//
//        echo "              </tr>";
        echo "              <tr class='warning'>";

        echo "                  <td colspan='7'>";
        echo                        $mensagem;
        echo "                  </td>";

        echo "              </tr>";
        echo "          </table>";
        echo "      </div>";
        echo "<p style='height: 30px;'>&nbsp;</p>";
        $this->infor($ano, $estacao, $mes, $semana, $dataSemanaNumerica[$dataJava]);
        
    }
    
    public function infor($ano, $estacao, $mes, $semana, $diaSemana){
        
        if($estacao == 1){
            $nomeEstacao = "primavera";
        }else if($estacao == 2){
            $nomeEstacao = "verão";
        }else if($estacao == 3){
            $nomeEstacao = "outono";
        }else if($estacao == 4){
            $nomeEstacao = "inverno";
        }
        
        echo "<div class='table-responsive' style='padding-left: 10px;' id='helpCalendario'>";
        echo "  <table class='table' style='text-decoration: none; border: #f1cd8b 2px solid;'>";
        echo "      <tr style='background-color: #00BFFF; border: #f1cd8b 2px solid;'>";
        echo "          <td colspan='3'>";
        echo "              <div id='tituloPaginas' style='font-weight: bold; font-size: 18px;'>Os números do Calendário-RUV</div>";
        echo "          </td>";
        echo "      </tr>";
        echo "      <tr style='background-color: #fff; border: #f1cd8b 2px solid;'>";
        echo "          <td style='width: 150px;'>";
        echo "              <div style='font-weight: normal;'>ano</div>";
        echo "              <div style='font-weight: normal;'>estação</div>";
        echo "              <div style='font-weight: normal;'>mês</div>";
        echo "              <div style='font-weight: normal;'>semana</div>";
        echo "              <div style='font-weight: normal;'>dia (da semana)</div>";
        echo "          </td>";
        echo "          <td style='width: 90px;'>";
        echo "              <div style='font-weight: normal;'>1 a 5</div>";
        echo "              <div style='font-weight: normal;'>1 a 4</div>";
        echo "              <div style='font-weight: normal;'>1 a 3</div>";
        echo "              <div style='font-weight: normal;'>1 a 5</div>";
        echo "              <div style='font-weight: normal;'>1 a 7</div>";
        echo "          </td>";
        echo "          <td>";
        echo "              <div style='font-weight: normal;'>tempo de existência da RUV</div>";
        echo "              <div style='font-weight: normal;'>primavera = 1 / Verão = 2 / outono = 3 / inverno = 4</div>";
        echo "              <div style='font-weight: normal;'>cada um dos três meses da estação</div>";
        echo "              <div style='font-weight: normal;'>os dois primeiros meses têm 4 semanas e o terceiro mês, 5 semanas</div>";
        echo "              <div style='font-weight: normal;'>são os 7 dias da semana, começando no domingo, que é 1</div>";
        echo "          </td>";
        echo "      </tr>";
        echo "      <tr style='background-color: #fff; border: #f1cd8b 2px solid;'>";
        echo "          <td colspan='3'>";
        echo "              <div style='font-weight: normal;'>&nbsp;</div>";
        echo "          </td>";
        echo "      </tr>";
        echo "      <tr style='background-color: #fff; border: #f1cd8b 2px solid;'>";
        echo "          <td colspan='3'>";
        echo "              <div style='font-weight: normal; text-align: left;'>Exemplo:</div>";
        echo "          </td>";
        echo "      </tr>";
        echo "      <tr style='background-color: #fff; border: #f1cd8b 2px solid;'>";
        echo "          <td>";
//        echo "                  <div style='font-weight: normal;'>".$ano."-".$estacao.$estacao.$semana.".".$diaSemana."</div>";
        echo "                  <div style='font-weight: normal;'>".$ano."-".$estacao.$mes.$semana.".".$diaSemana."</div>";
        echo "          </td>";
        echo "          <td>";
        echo "              &nbsp;";
        echo "          </td>";
        echo "          <td>";
        echo "                  <div style='font-weight: normal;'>";
        echo                        $ano."º ano RUV";
        echo "                  </div>";
        echo "                  <div style='font-weight: normal;'>";
        echo                        $estacao."ª estação = ".$nomeEstacao;
        echo "                  </div>";
        echo "                  <div style='font-weight: normal;'>";
//        echo                        $estacao."º mês da estação";
        echo                        $mes."º mês da estação";
        echo "                  </div>";
        echo "                  <div style='font-weight: normal;'>";
        echo                        $semana."ª semana";
        echo "                  </div>";
        echo "                  <div style='font-weight: normal;'>";
        echo                        $diaSemana."º dia da semana, dia ".$diaSemana;
        echo "                  </div>";
        echo "          </td>";
        echo "      </tr>";
        echo "  </table>";
        echo "</div>";
        
    }
    
    public function tempoRuv($ano, $estacao, $mes, $semana, $diaSemana){
//        echo "<meta http-equiv='refresh' content='5;url=estedia.php'>";
        
        $dia = date('d')-0;
        $data = date('n');
        
        $anoJava = date('Y');
        $mesJava = array(
            1 => "Janeiro",
            2 => "Fevereiro",
            3 => "Março",
            4 => 'Abril',
            5 => 'Maio',
            6 => 'Junho',
            7 => 'Julho',
            8 => 'Agosto',
            9 => 'Setembro',
            10 => 'Outubro',
            11 => 'Novembro',
            12 => 'Dezembro'
            
        );
//        echo "<div style='text-align: center;'>";
        echo "          <table style='color: red; font-weight: bold;' width='100%'>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      <p style='color: red;'>Dia: ".$dia." de ".$mesJava[$data]." de ".$anoJava."</p>";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <div>Tempo-RUV: ".$ano."-".$estacao.$mes.$semana.".".$diaSemana."</div>";
        echo "                  </td>";
        echo "              </tr>";
        echo "          </table>";
//        echo "</div>";
        
    }
    
    public function calendarioPP($anoLetivo, $mesRuv, $estacao, $semana, $dias = null){
        $pp = new ppMeditacao();
        $dataJava = date('N');
        
        $dataSemanaJava = array(
            7 => 'Domingo',
            1 => '2ª feira',
            2 => '3ª feira',
            3 => '4ª feira',
            4 => '5ª feira',
            5 => '6ª feira',
            6 => 'Sábado'
        );
        
        $dataSemanaNumerica = array(
            7 => '1',
            1 => '2',
            2 => '3',
            3 => '4',
            4 => '5',
            5 => '6',
            6 => '7'
            
        );
        $dias = $dataSemanaNumerica[$dataJava];
//        echo "Ano Letivo: ".$anoLetivo."<br>";
//        echo "Mês RUV: ".$mesRuv."<br>";
//        echo "Estação: ".$estacao."<br>";
//        echo "Semana: ".$semana."<br>";
//        echo "Dias: ".$dias."<br>";
        echo "<label>Semana | Calendário RUV: ".$estacao.$mesRuv.$semana."</label>";
//        echo "<br><label>Dia: ".$dias."</label>";
        
//        $paragem = $estacao.$mesRuv.$semana;
        $paragem = $estacao.$mesRuv.$semana;
        
        $pp->setDiaAnoRuv($anoLetivo);
        $pp->setDataRegistro(date("d/m/Y"));
        $pp->setDataRuv("0".$dias."/0".$mesRuv."/201".$anoLetivo);
//        $pp->setDiaMesRuv($mesRuv);
        $pp->setParagem($paragem);
        $pp->setDiaRuv($dias); 
        $pp->setCodusuario($this->codusuario);
        
        $pp->telaPP();
        
//        echo "<script>alert(".$anoLetivo.")</script>"; //Está indo normal.
        
    }
    public function calendarioPortal($anoLetivo, $mesRuv, $estacao, $semana, $dias = null){
        $portal = new ppPortais();
        $dataJava = date('N');
        
        $dataSemanaJava = array(
            7 => 'Domingo',
            1 => '2ª feira',
            2 => '3ª feira',
            3 => '4ª feira',
            4 => '5ª feira',
            5 => '6ª feira',
            6 => 'Sábado'
        );
        
        $dataSemanaNumerica = array(
            7 => '1',
            1 => '2',
            2 => '3',
            3 => '4',
            4 => '5',
            5 => '6',
            6 => '7'
            
        );
        $dias = $dataSemanaNumerica[$dataJava];
//        echo "Ano Letivo: ".$anoLetivo."<br>";
//        echo "Mês RUV: ".$mesRuv."<br>";
//        echo "Estação: ".$estacao."<br>";
//        echo "Semana: ".$semana."<br>";
//        echo "Dias: ".$dias."<br>";
        echo "<label>Semana | Calendário RUV: ".$estacao.$mesRuv.$semana."</label>";
//        echo "<br><label>Dia: ".$dias."</label>";
        
//        $paragem = $estacao.$mesRuv.$semana;
        $paragem = $estacao.$mesRuv.$semana;
        
        $portal->setDiaAnoRuv($anoLetivo);
        $portal->setDiaRuv($dias);
        $portal->setSemana($paragem);
        $portal->setDataRuv("0".$dias."/0".$mesRuv."/201".$anoLetivo);
        $portal->setCodusuario($this->codusuario);
        $portal->telaPortais();
        
    }
    public function calendarioParagem($semana, $mesRuv, $estacao){
        $paragem = new ParagemPresenca();
        
        $parag = $estacao.$mesRuv.$semana;
        
        $paragem->setParagem($parag);

//        echo "Ano Letivo: ".$anoLetivo."<br>";
//        echo "Mês RUV: ".$mesRuv."<br>";
//        echo "Estação: ".$estacao."<br>";
//        echo "Semana: ".$semana."<br>";
//        echo "Dias: ".$dias."<br>";
        echo "<label>Paragem: ".$parag."</label>";

        $paragem->telaNovaParagem();
        
//        $pp = $estacao.$mesRuv.$semana;
//        
//        $paragem->setDiaAnoRuv($anoLetivo);
//        $paragem->setDiaMesRuv($mesRuv);
//        
//        $paragem->telaNovoPP();
        
//        echo "<script>alert(".$anoLetivo.")</script>"; //Está indo normal.
        
    }
    
}
