<?php

/**
 * Calendário RUV
 *
 * @author Debug
 */
class calendarioRuv {
    
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

    public function configuracaoCalendario(){
        date_default_timezone_set('America/Sao_Paulo');
        
        $estacao = 0;
        $codEstacao = 0;

        $mes = date('m');
        $dia = date('d');
        $ano = date('Y');

        $anoBissexto = $this->anoBisexto();
        
        
        $dataInicio = "09/20/".$ano;
        $dataFim = date('m/d/Y');
//        $calculoData = round((strtotime($dataFim) - strtotime($dataInicio))/(24*60*60), 0) + 1;
        if($anoBissexto == 0){
            //É bissexto
            $calculoData = round((strtotime($dataFim) - strtotime($dataInicio))/-(24*60*60), 0) + 2;
        }else{
            //Não é bissexto
            $calculoData = round((strtotime($dataFim) - strtotime($dataInicio))/-(24*60*60), 0) + 1;
            
        }
        
//        echo "Estou no calculo da data: ".$calculoData;
/*
- Outono: de 21 de março a 21 de junho
- Inverno: de 21 de junho a 23 de setembro
- Primavera: de 23 de setembro a 21 de dezembro
- Verão: de 21 de dezembro a 21 de março
*/
        if($calculoData >= 1 && $calculoData <= 91){
            $estacao = "Primavera";
            $codEstacao = 1;
            
            if($calculoData >= 1 && $calculoData <= 28){
                $mesRuv = 1;
            }else if($calculoData > 28 && $calculoData <= 56){
                $mesRuv = 2;
            }else if($calculoData > 56 && $calculoData <= 91){
                $mesRuv = 3;
            }
        }
        else if($calculoData >= 92 && $calculoData <= 182){
            $estacao = "Verão";
            $codEstacao = 2;

            if($calculoData >= 92 && $calculoData <= 120){
                $mesRuv = 1;
            }else if($calculoData > 120 && $calculoData <= 148){
                $mesRuv = 2;
            }else if($calculoData > 148 && $calculoData <= 182){
                $mesRuv = 3;
            }
        }
        else if($calculoData >= 183 && $calculoData <= 273){
            $estacao = "Outono";
            $codEstacao = 3;

            if($calculoData >= 183 && $calculoData <= 211){
                $mesRuv = 1;
            }else if($calculoData > 211 && $calculoData <= 239){
                $mesRuv = 2;
            }else if($calculoData > 239 && $calculoData <= 273){
                $mesRuv = 3;
            }
        }
        else if($calculoData >= 274 && $calculoData <= 364){
            $estacao = "Inverno";
            $codEstacao = 4;

            if($calculoData >= 274 && $calculoData <= 302){
                $mesRuv = 1;
            }else if($calculoData > 302 && $calculoData <= 330){
                $mesRuv = 2;
            }else if($calculoData > 330 && $calculoData <= 364){
                $mesRuv = 3;
            }
        }
        
        //Cálculo da semana
        
                if($calculoData >= 1 && $calculoData <= 7){
                    $semana = 1;
                }else if($calculoData >= 8 && $calculoData <= 14){
                    $semana = 2;
                }else if($calculoData >= 15 && $calculoData <= 21){
                    $semana = 3;
                }else if($calculoData >= 22 && $calculoData <= 28){
                    $semana = 4;
                }
                else if($calculoData >= 29 && $calculoData <= 35){
                    $semana = 1;
                }else if($calculoData >= 36 && $calculoData <= 42){
                    $semana = 2;
                }else if($calculoData >= 43 && $calculoData <= 49){
                    $semana = 3;
                }else if($calculoData >= 50 && $calculoData <= 56){
                    $semana = 4;
                }
                else if($calculoData >= 57 && $calculoData <= 63){
                    $semana = 1;
                }else if($calculoData >= 64 && $calculoData <= 70){
                    $semana = 2;
                }else if($calculoData >= 71 && $calculoData <= 77){
                    $semana = 3;
                }else if($calculoData >= 78 && $calculoData <= 91){
                    $semana = 4;
                }
                //Verão, de 92 a 182
                else if($calculoData >= 92 && $calculoData <= 98){
                    $semana = 1;
                }else if($calculoData >= 99 && $calculoData <= 105){
                    $semana = 2;
                }else if($calculoData >= 106 && $calculoData <= 112){
                    $semana = 3;
                }else if($calculoData >= 113 && $calculoData <= 119){
                    $semana = 4;
                }
                else if($calculoData >= 120 && $calculoData <= 126){
                    $semana = 1;
                }else if($calculoData >= 127 && $calculoData <= 133){
                    $semana = 2;
                }else if($calculoData >= 134 && $calculoData <= 140){
                    $semana = 3;
                }else if($calculoData >= 141 && $calculoData <= 147){
                    $semana = 4;
                }
                else if($calculoData >= 148 && $calculoData <= 154){
                    $semana = 1;
                }else if($calculoData >= 155 && $calculoData <= 161){
                    $semana = 2;
                }else if($calculoData >= 162 && $calculoData <= 168){
                    $semana = 3;
                }else if($calculoData >= 169 && $calculoData <= 182){
                    $semana = 4;
                }
                //Outono, de 183 a 273
                else if($calculoData >= 183 && $calculoData <= 189){
                    $semana = 1;
                }else if($calculoData >= 190 && $calculoData <= 196){
                    $semana = 2;
                }else if($calculoData >= 197 && $calculoData <= 203){
                    $semana = 3;
                }else if($calculoData >= 204 && $calculoData <= 210){
                    $semana = 4;
                }
                else if($calculoData >= 211 && $calculoData <= 217){
                    $semana = 1;
                }else if($calculoData >= 218 && $calculoData <= 224){
                    $semana = 2;
                }else if($calculoData >= 225 && $calculoData <= 231){
                    $semana = 3;
                }else if($calculoData >= 232 && $calculoData <= 238){
                    $semana = 4;
                }
                else if($calculoData >= 239 && $calculoData <= 245){
                    $semana = 1;
                }else if($calculoData >= 246 && $calculoData <= 252){
                    $semana = 2;
                }else if($calculoData >= 253 && $calculoData <= 259){
                    $semana = 3;
                }else if($calculoData >= 260 && $calculoData <= 273){
                    $semana = 4;
                }
                //Inverno, de 274 a 364
                else if($calculoData >= 274 && $calculoData <= 280){
                    $semana = 1;
                }else if($calculoData >= 281 && $calculoData <= 287){
                    $semana = 2;
                }else if($calculoData >= 288 && $calculoData <= 294){
                    $semana = 3;
                }else if($calculoData >= 295 && $calculoData <= 301){
                    $semana = 4;
                }
                else if($calculoData >= 302 && $calculoData <= 308){
                    $semana = 1;
                }else if($calculoData >= 309 && $calculoData <= 315){
                    $semana = 2;
                }else if($calculoData >= 316 && $calculoData <= 322){
                    $semana = 3;
                }else if($calculoData >= 323 && $calculoData <= 329){
                    $semana = 4;
                }
                else if($calculoData >= 330 && $calculoData <= 336){
                    $semana = 1;
                }else if($calculoData >= 337 && $calculoData <= 343){
                    $semana = 2;
                }else if($calculoData >= 344 && $calculoData <= 350){
                    $semana = 3;
                }else if($calculoData >= 351 && $calculoData <= 364){
                    $semana = 4;
                }

        $anoLetivo = 5;
        if ((date('y') >= "15" || $mes >= "09") || (date('y') == "16" || $mes <= "09")){
            $anoLetivo = 5;
        }else{
            $anoLetivo++;
        }
//        echo "<br>Mês RUV: ".$mesRuv;
        $this->preencheCalendario($anoLetivo, $codEstacao, $mesRuv, $semana, $dia, "&nbsp;");
        
    }
    
    public function preencheCalendario($ano, $estacao, $mes, $semana, $dia, $mensagem){
        date_default_timezone_set('America/Sao_Paulo');

        $larguraColuna = 5;
        echo "      <div class='table-responsive' style='padding-left: 10px;'>";
        echo "          <table class='table' style='text-decoration: none;'>";
        echo "              <tr style='background-color: #FFFF00;'>";
        echo "                  <td colspan='7'>";
        echo "                      <b>Calendário - RUV</b>";
        echo "                  </td>";
        echo "              </tr>";
        //Segunda linha
//        echo "              <tr class='warning'>";
//        echo "                  <td>";
//        echo "                      &nbsp;";
//        echo "                  </td>";
//        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
//        echo "                      &nbsp;";
//        echo "                  </td>";
//        echo "                  <td colspan='3'>";
//        echo "                      &nbsp;";
//        echo "                  </td>";
//        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
//        echo "                      &nbsp;";
//        echo "                  </td>";
//        echo "                  <td>";
//        echo "                      &nbsp;";
//        echo "                  </td>";
//        echo "              </tr>";
        //Terceira linha
        echo "              <tr>";
        echo "                  <td>";
        echo "                      <label style='color: #FF0000;' for='ano'><b>".$ano."</b></label>";
        echo "                  </td>";
        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <label for='estacao'><b>".$estacao."</b></label>";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <label for='mes'><b>".$mes."</b></label>";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <label for='semana'><b>".$semana."</b></label>";
        echo "                  </td>";
        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <label style='color: #0000FF' for='dias'><b>".$dia."</b></label>";
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
        
        echo "                  <td colspan='7'>";
        echo                        "<i>".date('d/m/Y')." - ".$dataSemanaJava[$dataJava]."</i>";///date('d/m/Y');
        echo "                  </td>";
//        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
//        echo "                      &nbsp;";
//        echo "                  </td>";
//        echo "                  <td>";
//        echo "                      &nbsp;";
//        echo "                  </td>";
        echo "              </tr>";
        //Oitava linha
        echo "              <tr class='warning'>";
//        echo "                  <td>";
//        echo "                      &nbsp;";
//        echo "                  </td>";
//        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
//        echo "                      &nbsp;";
//        echo "                  </td>";
        echo "                  <td colspan='7'>";
        echo                        $mensagem;
        echo "                  </td>";
//        echo "                  <td style='width: ".$larguraColuna."px; background-color: #00BFFF'>";
//        echo "                      &nbsp;";
//        echo "                  </td>";
//        echo "                  <td>";
//        echo "                      &nbsp;";
//        echo "                  </td>";
        echo "              </tr>";
        echo "          </table>";
        echo "      </div>";
        
    }
    
    
    
    
}
