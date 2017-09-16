<?php


class classTexto {

    public function modalJRPreliminar(){
        echo "<div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>";
        echo "  <div class='modal-dialog' role='document' style='width: 900px;'>";
        echo "      <div class='modal-content'>";
        echo "          <div class='modal-header'>";
        echo "              <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        echo "              <h3 class='modal-title' id='myModalLabel' style='font-weight: bold; text-align: center;'>Convite Jornada Real preliminar</h3>";
        echo "          </div>";
        echo "          <div class='modal-body'>";
//        echo "              ...";
        echo "<p style='text-align: center; font-weight: bold;'>Jornada Real Preliminar</p>";
        echo "<p style='text-align: center; font-weight: bold;'>Inverno</p>";
        echo " 
        <p style='text-align: justify'>
            Cada ser humano no decorrer da existência empreende uma jornada que   pode ser vivenciada em diferentes graus de consciência; de forma mais sonambúlica, até as percepções que demonstram maior lucidez.  Vai depender da disponibilidade e do investimento nas pequenas jornadas do cotidiano. De uma maneira ou de outra, a vida acaba por nos apresentar algumas provações que provocam o nosso despertar.<br>
                A maneira como iniciamos a jornada, não é tão importante quanto o modo como nos comprometemos e nos responsabilizamos pela sua realização. E nisso, só a experiência conta.<br>
                Se você reconhece a necessidade de tentar mudanças pessoais que devem afetar a coletividade, venha refletir conosco sobre a importância do autoconhecimento e da prática meditativa nesse processo.<br>
                Este programa será apresentado em 8 encontros semanais.<br>
                Para participar é preciso preencher a ficha de inscrição (solicite-a através do email <a href='mailto:jrp@redeunaviva.rio'>Fernanda Cappelli (jrp@redeunaviva.rio)</a><br><br>
Informações:<br><br>
Início desta Jornada:  <label style='color: red'>em 12 de julho de 2017</label>.<br>
Dia e horário: <label style='color: red'>4ªs feiras, de 15:00h ás 16:30</label>.<br>
Endereço: <label style='color: red'>sede da RedeUnaViva: Rua Mário Pederneiras, 31</label>.<br>
Somos um grupo de voluntários que não recebe por qualquer serviço prestado. A cobrança visa unicamente a cobrir as despesas de aluguel da sala e gastos para o nosso desenvolvimento.<br>
<label style='color: red'>Investimento: R$120,00(por mês, a cada 4 semanas) ou R$150,00, a ser pago juntamente, com a sua inscrição.</label>
        </p>
";
        echo "          </div>";
        echo "          <div class='modal-footer'>";
        echo "              <button type='button' class='btn btn-default' data-dismiss='modal'>Fechar</button>";
//        echo "              <button type='button' class='btn btn-primary'>Save changes</button>";
        echo "          </div>";
        echo "      </div>";
        echo "  </div>";
        echo "</div>";

    }
    

    public function textoJornadaReal(){
        $fonteGaramond = "font-family: garamond; text-align: justify";
        $fonteTamanho = "font-size: 20px"; // Antes da garamond, 14px
        
        //Primeira parte =======================================================================
/*


        echo "  <div class='tab-content' style='padding-left: 20px; padding-top: 15px;'>";
        echo "      <div role='tabpanel' class='tab-pane active' id='JornadaReal'>";

*/        

        echo "<div class='row' style='color: #1f226d;'>";
        echo "<div style='height: 20px;'></div>";
        echo "<div class='col-xs-6 col-sm-5' style='padding-right: 0; margin-right: 0; width: 50%;'>";
        echo "<ul class='list-inline' style='".$fonteTamanho."; ".$fonteGaramond.";'>";
        echo "  <li>1. A Jornada Real é, por excelência, um caminho espiritual, afinado com o conceito de sadhana da tradição védica, que esclarece que todas as atividades do viver comum podem ser assumidas como oportunidades para o desenvolvimento espiritual  e, por fim, para a própria iluminação.</li>";
        echo "  <li>&nbsp;</li>";
        echo "  <li>2. O programa da Jornada Real (JR), voltado para autoconhecimento, valoriza um investimento diário por parte do interessado, com um encontro semanal em que o focalizador informa as atividades de tal programa.</li>";
        echo "  <li>&nbsp;</li>";
        echo "  <li>3. Seus dois ciclos principais são o diário e o semanal. O diário implica na valorização da prática individual e o semanal, no encontro grupal dos afins para a troca de experiência.</li>";
        echo "  <li>&nbsp;</li>";
        echo "  <li>4. Concebemos a Jornada diária, com dois portais de mudança de consciência como momentos propícios para atividades específicas de autoconhecimento e autotransformação. O portal da noite (PN), onde se realiza a retrospectiva do dia, e o portal da manhã (PM), onde se registram os sonhos. Há recursos próprios para incentivar exercícios de autoterapia com estes conteúdos.</li>";
        echo "</ul>";
        echo "</div>";
        echo "<div class='col-xs-6 col-sm-7' align='center' style='padding-left: 0; margin-left: 0; width: 50%; heigth: 50%;'>";
        echo "  <img src='images/logoJrColor.png' width='400' height='300' class='img-responsive' style='padding-top: 15%;'>";
        echo "</div>";
        echo "</div>"; // Fecha o div class row
        
        //Segunda parte =======================================================================
        
        echo "<div class='row' style='color: #1f226d;'>";
        echo "<div style='height: 20px;'></div>";
        echo "<div class='col-xs-6 col-sm-6' align='center'>";
        echo "  <img src='jr/JRImage1.jpg' width='450' height='611' class='img-responsive'>";
        echo "</div>";
        echo "<div class='col-xs-6 col-sm-6' style='width: 50%;'>";
        echo "<ul class='list-inline' style='".$fonteTamanho."; ".$fonteGaramond.";'>";
        echo "      <li>5. A meditação é prática fundamental em todo o percurso, realizada diariamente, e técnicas específicas são ensinadas.<br>";
        echo "      <br>6. Mensalmente, há atividades de auto-avaliação.";
        echo "      <li>&nbsp;</li>";
        echo "      <li>7. Este programa é passado através de um Livro de Programa, sendo cada estação contemplada com um volume.</li>";
        echo "      <li>&nbsp;</li>";
        echo "      <li>8. O mestre desta jornada é a própria pessoa, e para ela assumir esta função tem como recurso auxiliar os registros diários por escrito, no Livro de Programa, assim como no seu Caderno de Diário.</li>";
        echo "      <li>&nbsp;</li>";
        echo "      <li>9. Estes registros quando consultados, isoladamente ou em série, constituem retorno valioso para as suas periódicas avaliações. Sem estas anotações dificilmente a jornada é realizada a contento.</li>";
        echo "      <li>&nbsp;</li>";
        echo "      <li>10. Além deste Livro, é distribuída uma Tabuleta da Prática, que serve para o registro de algumas das suas atividades e tarefas.</li>";
        echo "      <li>&nbsp;</li>";
        echo "      <li>11. O programa funciona como uma atividade de autoterapia, o que não dispensa uma terapia individual, como recurso afinado, caso a pessoa tenha interesse em fazer ou já a realize.</li>";
        echo "</ul>";
        echo "</div>";
        echo "</div>";

        //Terceira parte
        
        echo "<div class='row' style='color: #1f226d;'>";
        echo "  <div style='height: 20px;'></div>";
        echo "      <div class='col-xs-6 col-sm-6'>";
        echo "          <ul class='list-inline' style='".$fonteTamanho."; ".$fonteGaramond.";'>";
        echo "              <li>";
        echo "                  12. O programa e a sua produção estará presente neste conjunto:";
        echo "                  <br><br>";
        echo "                      a) Livro de Programa – oferecido em 4 volumes, um para cada estação;";
        echo "                  <br>";
        echo "                      b) Tabuleta da Prática – oferecida.";
        echo "                  <br>";
        echo "                      c) Caderno de Diário – próprio.";
        echo "                  <br>";
        echo "                  <br>";
        echo "                  13. A conclusão do ano-Jornada Real ocorre por meio de uma semana de retiro, visando a intensificação da prática deste programa. Sua adesão, apesar de não obrigatória, é fortemente recomendada.";
        echo "              </li>";
        echo "              <li>";
        echo "                  <span  style='padding-left: 20px;'>Como a JR tem a duração de um ano, seguindo as estações, seu curso termina em setembro quando se finaliza o inverno (coincidindo com o feriado de 7 de setembro), com o Retiro anual. Seu objetivo é intensificar a prática deste programa, num lugar apropriado para este tipo de recolhimento – o Espaço de Convivência Morgenlicht (<abbr title='http://www.morgenlicht.com.br'><a href='http://www.morgenlicht.com.br' target='_blank'>http://www.morgenlicht.com.br</a></abbr>). O Morgenlicht, com sua beleza e conforto, oferece um entorno favorável à introspecção e à harmonização dos nossos corpos e mente. A alimentação, cuidada com esmero, associa prazer com leveza, saúde com bem-estar.</span>";
        echo "              </li>";
        echo "          </ul>";
        echo "      </div>";
        echo "  <div class='col-xs-6 col-sm-6' align='center'>";
        echo "      <img src='jr/JRImage3.jpg' width='400' height='561' class='img-responsive'>";
        echo "      <br/>";
        echo "      <img src='jr/JRImage2.jpg' width='400' height='561' class='img-responsive'>";
        echo "  </div>";
        echo "</div>";//Fecha a div row

        //Quarta parte
        
        echo "<div class='row' style='color: #1f226d;'>";
        echo "  <div style='height: 20px;'></div>";
        echo "      <div class='col-xs-6 col-sm-6' align='center'>";
        echo "          <img src='jr/JRImage6.jpg' width='400' height='561' class='img-responsive'>";
        echo "      </div>";
        echo "      <div class='col-xs-6 col-sm-6'>";
        echo "          <ul class='list-inline' style='".$fonteTamanho."; ".$fonteGaramond.";'>";
        echo "              <li>14. A partir de setembro, ofereceremos 2 grupos de encontros semanais, ambos às 5as feiras, com duração de 2 horas. Horários:<br><br>";
        echo "                  1) 14h30<br>";
        echo "                  2) 18h30";
//        echo "              </li>";
//        echo "              <li>&nbsp;</li>";
        echo "              <br><br>";
        echo "              15. Há um encontro mensal, aos domingos, de 9 às 13h, em que se concentra a transmissão do programa do mês. Caso haja vagas, quem frequenta o grupo semanal poderá também participar do grupo mensal, sem custo adicional.</li>";
        echo "              <li>&nbsp;</li>";
        echo "              <li>16. O investimento financeiro é de R$ 50,00 (cinquenta reais) por encontro, pagos mensalmente, no início do período. Em cada estação há 2 meses de 4 semanas, cujo valor é de R$ 200,00 (duzentos reais), e 1 mês de 5 semanas, cujo valor de investimento é de R$ 250,00 (duzentos e cinquenta reais). Este valor é o mesmo para o grupo semanal e para o grupo mensal.</li>";
        echo "              <li>&nbsp;</li>";
        echo "              <li>17. A Jornada Real é parte de um projeto maior – a RedeUnaViva, uma rede espiritual a serviço de uma cultura de paz, organizada sem fins lucrativos. Suas atividades são focalizadas por colaboradores que se dedicam em regime de doação voluntária. A RUV será melhor detalhada em momento oportuno.</li>";
        echo "          </ul>";
        echo "      </div>";
        echo "</div>"; // Fecha o div class row
        
        //Quinta parte
        
        echo "<div class='row' style='color: #1f226d;'>";
        echo "  <div style='height: 20px;'></div>";
        echo "      <div class='col-xs-6 col-sm-6'>";
        echo "          <ul class='list-inline' style='".$fonteTamanho."; ".$fonteGaramond.";'>";
        echo "              <li>";
        echo "                  18. A inscrição é feita mediante preenchimento do Formulário de Adesão (JR). Não há um compromisso de permanência depois de ter sido feita a inscrição. Isto é, caso não esteja satisfeita ou por outros motivos, a pessoa pode desfazer, em qualquer momento, o compromisso de permanecer na jornada.";
        echo "              <br><br>";
        echo "                  19. A sua entrada somente poderá ser feita até dois meses de iniciado. Seu início, em 2016, se dará na semana, cujo domingo é dia 18 de setembro, considerado o primeiro dia da semana.";
        
//        echo "                  19. A conclusão do ano-Jornada Real ocorre por meio de uma semana de retiro, visando a intensificação da prática deste programa. Sua adesão, apesar de não obrigatória, é fortemente recomendada.";
        echo "              </li>";
        echo "          </ul>";
        echo "      </div>";
        echo "  <div class='col-xs-6 col-sm-6' align='center'>";
        echo "      <img src='jr/JRBorboleta.jpg' class='img-responsive' style='width: 400px; height: 561px;'>";
        echo "  </div>";
        echo "</div>";//Fecha a div row
        
        //Sexta parte
        
//        echo "<div class='row' style='color: #1f226d;'>";
//        echo "  <div style='height: 20px;'></div>";
//        echo "      <div class='col-xs-6 col-sm-6' align='center'>";
//        echo "          <img src='images/jrLogoColorRoxoClaro.png' width='300' height='250' class='img-responsive'>";
//        echo "      </div>";
//        echo "  <div class='col-xs-6 col-sm-6'>";
//        echo "      <ul class='list-inline' style='".$fonteTamanho."; ".$fonteGaramond.";'>";
//        echo "              <li>";
//        echo "              <br><br>";
////        echo "                  21. Para se inscrever use o <a href='formAdesao.php' href='_self' style='color: #3F6CA1'>Formulário de Adesão (JR)</a>.";
//        echo "              </li>";
//        echo "          </ul>";
//        echo "  </div>";
//        echo "</div>";//Fecha a div row

    }
    
    public function textoQuemSomos(){
        $tamanhoFonte16="font-size: 20px; font-family: garamond; text-align: justify; color: #1f226d;";
        
        echo "<p style='height: 15px;'>&nbsp;</p>";
        echo "<div class='col-md-1'></div>";
        echo "<div class='col-md-4' style='".$tamanhoFonte16."'>";
        echo "  <div class='row'>";
        echo "      <ul class='list-inline' style='text-align: left;'>";
        echo "          <li>";
        echo "              Somos nove pessoas que,<br/>";
        echo "              com um <i>programa diário de autoconhecimento</i><br/>";
        echo "              cuja prática principal é a meditação,<br/>";
        echo "              visamos a transformação própria e do mundo<br/>";
        echo "              tendo como campo de trabalho<br/>";
        echo "              as desafiadoras relações interpessoais.<br/>";
        echo "          </li>";
        echo "      </ul>";
        echo "  </div>";
        echo "</div>";
        echo "<div class='col-md-2' style='".$tamanhoFonte16."'>";
        echo "  <div class='row'>";
        echo "      &nbsp;";
        echo "  </div>";
        echo "</div>";
        echo "<div class='col-md-4' style='".$tamanhoFonte16."'>";
        echo "  <div class='row'>";
        echo "      <ul class='list-inline' style='text-align: left;'>";
        echo "          <li>";
        echo "              Pela riqueza da experiência compartilhada,<br/>";
        echo "              em reuniões semanais<br/>";
        echo "              que deram consistência à proposta,<br/>";
        echo "              decidimos,<br/>";
        echo "              após sete anos de trabalho,<br/>";
        echo "              divulgar esta <b><i>Jornada Real</i></b><br/>";
        echo "          </li>";
        echo "      </ul>";
        echo "  </div>";
        echo "</div>";
        echo "<div class='col-md-1'></div>";
        echo "<div class='col-md-12'>&nbsp;</div>";

        echo "<div class='col-md-12'>";
        echo "  <div class='text-center' style='".$tamanhoFonte16."; text-align: center;'>";
        echo "      convidando pessoas afins <br/>";
        echo "      a tornarem-se companheiros na <b>RedeUnaViva.</b>";
        echo "  </div>";
        echo "</div>";

        echo "<div class='col-md-12'>&nbsp;</div>";
        echo "<div class='col-md-12'>&nbsp;</div>";
        echo "<div class='col-md-12'>";
        echo "<div class='table-responsive'>";
        echo "  <table class='table table-bordered text-center' style='".$tamanhoFonte16."'>";//table-hover 
        echo "      <tr id='corTabela'>";
        echo "          <td>";
        echo "              <abbr title='didamour@globo.com' style='font-size: 20px; color: #3F6CA1;'><b>Diana D'Amour Alexander</b></abbr>";
        echo "                  <br/><br/>";
        echo "                  <b>Médica</b><br/><br/>";
        echo "                  Focalizadora da Jornada Real<br/>";
        echo "                  Participante da RedeUnaViva";
        echo "          </td>";
        echo "          <td>";
        echo "              <abbr title='depaiva.marcia9@gmail.com' style='font-size: 20px; color: #3F6CA1;'><b>Marcia de Paiva</b></abbr>";
        echo "                  <br/><br/>";
        echo "                  <b>Médica e Docente</b><br/><br/>";
        echo "                  Focalizadora da Jornada Real<br/>";
        echo "                  Participante da RedeUnaViva";
        echo "          </td>";
        echo "          <td>";
        echo "              <abbr title='karis.maria@globo.com' style='font-size: 20px; color: #3F6CA1;'><b>Káris Rodrigues</b></abbr>";
        echo "                  <br/><br/>";
        echo "                  <b>Médica e Professora Universitária</b><br/><br/>";
        echo "                  Focalizadora da Jornada Real<br/>";
        echo "                  Participante da RedeUnaViva";
        echo "          </td>";
        echo "      </tr>";
        echo "      <tr id='corTabela'>";
        echo "          <td>";
        echo "              <abbr title='ligialind@ig.com.br' style='font-size: 20px; color: #3F6CA1;'><b>Ligia Lindbergh</b></abbr>";
        echo "                  <br/><br/>";
        echo "                  <b>Psicoterapeuta Transpessoal</b><br/><br/>";
        echo "                  Focalizadora da Jornada Real<br/>";
        echo "                  Participante da RedeUnaViva";
        echo "          </td>";
        echo "          <td>";
        echo "              <abbr title='luiz.bernal@gmail.com' style='font-size: 20px; color: #3F6CA1;'><b>Luiz Carlos Bernal</b></abbr>";
        echo "                  <br/><br/>";
        echo "                  <b>Médico e Psicoterapeuta</b><br/><br/>";
        echo "                  Idealizador da Jornada Real<br/>";
        echo "                  e da RedeUnaViva";
        echo "          </td>";
        echo "          <td>";
        echo "              <abbr title='carlamfontes@yahoo.com.br' style='font-size: 20px; color: #3F6CA1;'><b>Carla Fontes</b></abbr>";
        echo "                  <br/><br/>";
        echo "                  <b>Psicóloga Clínica</b><br/><br/>";
        echo "                  Focalizadora da Jornada Real<br/>";
        echo "                  Participante da RedeUnaViva";
        echo "          </td>";
        echo "      </tr>";
        echo "      <tr id='corTabela'>";
        echo "          <td>";
        echo "              <abbr title='marialuciapereira2@gmail.com' style='font-size: 20px; color: #3F6CA1;'><b>Maria Lucia Pereira</b></abbr>";
        echo "                  <br/><br/>";
        echo "                  <b>Psicóloga</b><br/><br/>";
        echo "                  Focalizadora da Jornada Real<br/>";
        echo "                  Leitora voluntária de história para criança<br/>";
        echo "                  (Instituto Fernandes Figueira)<br/>";
        echo "                  Participante da RedeUnaViva";
        echo "          </td>";
        echo "          <td>";
        echo "              <abbr title='humbertogabarito@gmail.com' style='font-size: 20px; color: #3F6CA1;'><b>Humberto Alves</b></abbr>";
        echo "                  <br/><br/>";
        echo "                  <b>Empresário</b><br/>";
//        echo "                  Idealizador da Jornada Real<br/>";
        echo "                    <br/>";
        echo "                    Participante da RedeUnaViva";
        echo "          </td>";
        echo "          <td>";
        echo "              <abbr title='fernandacappelli@hotmail.com' style='font-size: 20px; color: #3F6CA1;'><b>Fernanda Seixas</b></abbr>";
        echo "                  <br/><br/>";
        echo "                  <b>Cantora</b><br/><br/>";
        echo "                  Participante da RedeUnaViva<br/>";
        echo "          </td>";
        echo "      </tr>";
        echo "  </table>";
//        echo "<div class='text-center'>";
//        echo "  (A minha apresentação é apenas ";
//        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    
    public function textoYoga(){
        $tamanhoFonte16 = "font-size: 20px; font-family: garamond; text-align: justify; color: #1f226d;";
//        echo "<div class='col-md-1'>";
//        echo "  &nbsp;";
//        echo "</div>";
        echo "<div class='col-sm-12' style='".$tamanhoFonte16."'>";
        echo "  <p>";
        echo "      Segundo <b>Patanjali</b> nos yogasutras, <abbr title='yoga citta vrtti nirodah'><i>yoga citta vrtti nirodah</i></abbr> traduz-se por \"<b>yoga é pacificação das atividades da mente</b>\".<br/>";
        echo "  </p>";
        echo "  <p>";
        echo "      Nesse estado, o praticante desfruta de sua própria natureza e não é mais afetado pelas oscilações da mente.";
        echo "  </p>";
        echo "  <p>";
        echo "      Para se atingir esse estado, não há fórmula fixa, o praticante deve encontrar a prática adequada a ele.<br/>";
        echo "  </p>";
        echo "  <p>";
        echo "      Quando falamos de prática, existem inúmeras tais como a física (<i>asanas</i>), as respiratórias (<i>pranayama</i>), canto de mantras, entre outras.<br/><br/>";
        echo "  </p>";
        
        //Eduardo Quintela
        echo "  <p style='text-align: justify;'>";
        echo "      <abbr title='Eduardo Quintella' style='font-size: 20px; color: #3F6CA1;'><b>Eduardo Quintella</b></abbr> (<a href='mailto:duda.quintella@gmail.com' class='text-link'>duda.quintella@gmail.com</a>)<br/>";
        echo "  <p style='text-align: justify;'>";
        echo "      Pratico yoga desde os 18 anos. Para aprofundar esta investigação além do contato frequente com meus professores, já estive na Índia por duas vezes, para estágios prolongados.<br/>";
        echo "  </p>";
        echo "  <p style='text-align: justify;'>";
        echo "      Como professor, procuro adequar a prática à individualidade de cada aluno para que a desfrute de acordo com as suas possibilidades.";
        echo "  </p>";
        echo "<div class='imageRow' style='padding-left: 25%; padding-right: 25%;'>";
        echo "  <div class='set'>";
        echo "      <div class='single first'>";
        echo "          <a href='galeria/yoga/foto8.jpg' rel='lightbox[plants]' title='Foto 1'>";
        echo "              <img src='galeria/yoga/foto8.jpg' alt='Foto 1 de 2' style='height: 190px; width: 250px;'/>";
        echo "          </a>";
        echo "      </div>";
        echo "      <div class='single last'>";
        echo "          <a href='galeria/yoga/eduardo1.jpg' rel='lightbox[plants]' title='Foto 2'>";
        echo "              <img src='galeria/yoga/eduardo1.jpg' alt='Foto 2 de 2' style='height: 190px; width: 250px;'/>";
        echo "          </a>";
        echo "      </div>";
        echo "  </div>";
        echo "</div>";
        
        //Heiko Hoschke
        echo "<p style='height: 20px;'>&nbsp;</p>";
        echo "  <p style='text-align: justify;'>";
        echo "      <abbr title='Heiko Hoschke' style='font-size: 20px; color: #3F6CA1;'><b>Heiko Hoschke</b></abbr> (<a href='mailto:heikosunwu@yahoo.com.br' class='text-link'>heikosunwu@yahoo.com.br</a>)<br/>";
        echo "  <p style='text-align: justify;'>";
        echo "      Método de yoga baseado no sistema Iyengar com o professor Heiko Roschke<br/>";
        echo "  </p>";
        echo "  <p style='text-align: justify;'>";
        echo "      Agreguei meus conhecimentos como fisioterapeuta e como professor de artes marciais ao método de yoga baseado no sistema Iyengar. Este método prioriza o alongamento e o alinhamento propiciando ao praticante forte consciência corporal, tornando perceptíveis os seus vícios posturais e possibilitando a sua correção.";
        echo "  </p>";
        echo "<div class='imageRow' style='padding-left: 25%; padding-right: 25%;'>";
        echo "  <div class='set'>";
        echo "      <div class='single first'>";
        echo "          <a href='galeria/yoga/heiko1.jpg' rel='lightbox[plants]' title='Foto 1'>";
        echo "              <img src='galeria/yoga/heiko1.jpg' alt='Foto 1 de 2' style='height: 190px; width: 250px;'/>";
        echo "          </a>";
        echo "      </div>";
        echo "      <div class='single last'>";
        echo "          <a href='galeria/yoga/heiko2.jpg' rel='lightbox[plants]' title='Foto 2'>";
        echo "              <img src='galeria/yoga/heiko2.jpg' alt='Foto 2 de 2' style='height: 190px; width: 250px;'/>";
        echo "          </a>";
        echo "      </div>";
        echo "  </div>";
        echo "</div>";
        echo "</div>";
//        echo "<div class='col-md-1'>";
//        echo "  &nbsp;";
//        echo "</div>";
    }
    
    public function preparaDownload($download){
//        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=meditcrista.php&s=1'>";
        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=meditcrista.php?d=$download'>";
        echo "<div class='alert alert-success' role='alert' id='sucesso' style='position: relative; text-align: center;'>Download efetuado com sucesso! Agradecemos o download. <a class='btn btn-success' href='meditcrista.php'>OK</a></div>";
        
    }
    
    public function calculaTempo($start = null){
        $mtime = microtime();
        $mtime = explode(' ', $mtime);
        $mtime = $mtime[1] + $mtime[0];

        if($start = null){
            return $mtime;
        }else{
            return round($mtime - $start, 2);
        }
    }
    
    public function downloaPdf($arquivo){
        
        define('DIR_DOWNLOAD', 'downloads/meditacaocrista/');

//        set_time_limit(0);
//        $endereco = "http://www.redeunaviva.rio";
//         case "pdf": $tipo="application/pdf"; break;
//         case "exe": $tipo="application/octet-stream"; break;
//         case "zip": $tipo="application/zip"; break;
//         case "doc": $tipo="application/msword"; break;
//         case "xls": $tipo="application/vnd.ms-excel"; break;
//         case "ppt": $tipo="application/vnd.ms-powerpoint"; break;
//         case "gif": $tipo="image/gif"; break;
//         case "png": $tipo="image/png"; break;
//         case "jpg": $tipo="image/jpg"; break;
//         case "mp3": $tipo="audio/mpeg"; break;
//         case "php": // deixar vazio por seurança
//         case "htm": // deixar vazio por seurança
//         case "html": // deixar vazio por seurança
             
//        $local = "/downloads/meditacaocrista/";

//        exit;
 //           echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=meditcrista.php?s=108'>";


        $path = DIR_DOWNLOAD.$arquivo;
        
        if(!file_exists($path)){
//            echo "Caminho: ".$path;
//            die ("Arquivo não existente.");
//            echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=meditcrista.php'>";
            echo "<br>Caminho: ".$path;
//            exit;
        }
//        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename="'.$arquivo.'";');
//        header('Content-Type: octet-stream');
        header('Content-Type: application/pdf');
//        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . filesize($path));

//        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
//        header('Pragma: public');
//        header('Expires: 0');
//            header('Content-Description: File Transfer');
//            header('Content-Type: application/pdf');
//            header('Content-Length: '.filesize($arquivo));
//            header('Content-Disposition: attachment; filename="'.$arquivo.'"');
//            header('Content-Transfer-Encoding: binary');
//            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
//            header('Pragma: public');
//            header('Expires: 0');
//            ob-clean();
//            flush();
            //abaixo funcionou normalmente.
        readfile($path);
        //echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=meditcrista.php'>";

    }

    public function modalDownload(){
        
        echo "<!-- Modal -->";
        echo "<div class='modal fade bs-example-modal-sm' id='modalsuccess' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>";
        echo "  <div class='modal-dialog modal-sm' role='document'>";
        echo "      <div class='modal-content'>";
        echo "          <div class='modal-header'>";
        echo "              <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        echo "              <h4 class='modal-title' id='myModalLabel'>Download</h4>";
        echo "          </div>";
        echo "          <div class='modal-body'>";
        echo "              Download efetuado com sucesso!";
        echo "          </div>";
        echo "          <div class='modal-footer'>";
        echo "              <button type='button' class='btn btn-primary'>Save changes</button>";
        echo "          </div>";
        echo "      </div>";
        echo "  </div>";
        echo "</div>";
    }
    
    public function textoMeditacaoCrista(){

        $tamanhoFonte16 = "font-size: 20px";
        $margem = "margin-left: 0px; text-align: justify";
        echo "<div class='row' style='color: #1f226d;'>";
        echo "  <div style='height: 50px;'></div>";
        echo "      <div class='col-xs-6 col-sm-6'>";
        echo "          <ul class='list-inline' style='font-size: 20px; text-align: justify; font-family: garamond;'>";
        echo "              <li>";
        echo "                  <span style='".$margem.";'>";
        echo "                      Amigas e amigos,</b>";
//        echo "                      Em todos os domingos nos encontramos na nossa sede para realizar nossa costumeira e nutridora <b>Meditação Cristã (MC)</b>.";
        echo "                  </span>";
        echo "              <br><br>";
        echo "                  <span style='".$margem.";'>";
        echo "                      Segue abaixo o texto do Evangelho com sua indagação reflexiva, como preparação para a ceia do espírito.";
//        echo "                      No decorrer da semana dispomos aqui o texto do Evangelho com sua indagação reflexiva, como preparação para a ceia do espírito.";
        echo "                  </span>";
        echo "              <br><br>";
        echo "                  <span style='".$margem.";'>";
        echo "                      São todos convidados e bem vindos.<br><br>";
        echo "                  </span>";
        echo "                  <span style='".$margem.";'>";
        echo "                      <b>Visando a sintonia do grupo e o seu melhor aproveitamento, é indicado chegar de 10 a 15 minutos antes do começo da meditação</b>.<br><br>";
        echo "                  </span>";
        echo "                  <span style='".$margem.";'>";
        echo "                      <b>Nesse momento, para a sua reflexão inicial, será distribuído um resumo do entendimento do texto evangélico referenciado.</b><br><br>";
        echo "                  </span>";
        echo "                  <span style='".$margem.";'>";
        echo "                      Com afeto,<br><br>";
        echo "                  </span>";
        echo "                  <span style='".$margem.";'>";
        echo "                      Bernal.<br><br>";
        echo "                  </span>";
        echo "                  <span style='".$margem.";'>";
        echo "                      Endereço: Rua Mário Pederneiras, 31 - Humaitá, Rio de Janeiro/RJ.";
        echo "                  </span>";
//        echo "                  <span style='".$margem.";'>";
//        echo "                      Endereço: Rua Mário Pederneiras, 31 - Humaitá, Rio de Janeiro/RJ.<br><br>";
//        echo "                  </span>";
        echo "              <br><br>";
        echo "                  <p style='color: #31708f; ".$margem.";'><b>DOMINGO - 17 às 19h</b>.</p><br/>";
        echo "                  <a href='contato.php#mapa' target='_self' style='".$margem.";'>Clique aqui</a> para visualização do mapa, indicando como chegar no endereço.";
        echo "              </li>";
        echo "              <li style='font-size: 20px;'>";
        echo "              <br><br>";
//        echo "                  <b>Texto do Evangelho desta semana - 28/08/2016</b><br>";
        echo "                  <b>Texto do Evangelho desta semana - domingo - 27.08.2017<br>";
        echo "                  MC 433</b><br>";
        echo "              <br><br>";
        echo "                  <a role='button' href='downloads/meditacaocrista/MC156Paragem435Convite.pdf' aria=expanded='false' target='_blank' style='".$margem.";'>Clique aqui</a> a partir da 5ª feira anterior para ler o convite da MC do próximo domingo (10.09.2017).";
        echo "              <br><br>";
        echo "                  <a role='button' target='_blank' href='downloads/meditacaocrista/MC154Paragem433.pdf' aria=expanded='false' aria-controls='' style='".$margem.";'>Clique aqui</a> a partir da 3ª feira posterior para ler a MC do domingo passado (27.08.2017).";
        echo "              <br><br>";
        echo "                  Clique na tabela ao lado para fazer download da MC.";
        echo "              <br><br>";
        echo "              </li>";
        echo "          </ul>";
        echo "      </div>";

        echo "      <div class='col-xs-6 col-sm-6' align='center'>";
        echo "          <div style='height: 5px;'>&nbsp;</div>";
        echo "          <img src='images/meditacaoCrista.jpg' width='550' height='500' alt='Meditação Cristã' title='Meditação Cristã' class='img-responsive'>";
        echo "          <p style='height: 20px;'>&nbsp;</p>";
        echo "          <div style='height: 10px; font-family: garamond; font-size: 20px;'>&nbsp;</div>";
        echo "              <table class='table' style='height: 10px; font-family: garamond; font-size: 16px;'>";
        echo "                  <tr>";
        echo "                      <td colspan='10' style='text-align: center; font-weight: bold; font-size: 18px; background-color: #00FFFF;'>";
        echo "                          Clique no número (acompanhado) da data para fazer download";
        echo "                      </td>";
        echo "                  </tr>";
        echo "                  <tr>";
        echo "                      <td colspan='10' style='text-align: center; font-weight: bold; font-size: 18px; background-color: #F5FFFA;'>";
        echo "                          no momento apenas disponível a partir da MC 107";
        echo "                      </td>";
        echo "                  </tr>";
        echo "                  <tr style='text-align: center; background-color: #FFEFD5; height: 60px;'>";
        echo "                      <td width='90'>";
        echo "                          1";
        echo "                      </td>";
        echo "                      <td width='90'>";
        echo "                          2";
        echo "                      </td>";
        echo "                      <td width='90'>";
        echo "                          3";
        echo "                      </td>";
        echo "                      <td width='90'>";
        echo "                          4";
        echo "                      </td>";
        echo "                      <td width='90'>";
        echo "                          5";
        echo "                      </td>";
        echo "                      <td width='90'>";
        echo "                          6";
        echo "                      </td>";
        echo "                      <td width='90'>";
        echo "                          7";
        echo "                      </td>";
        echo "                      <td width='90'>";
        echo "                          8";
        echo "                      </td>";
        echo "                      <td width='90'>";
        echo "                          9";
        echo "                      </td>";
        echo "                      <td width='90'>";
        echo "                          10";
        echo "                      </td>";
        echo "                  </tr>";
        echo "                  <tr style='text-align: center; background-color: #E0FFFF; height: 60px;'>";
        echo "                      <td>";
        echo "                          91";
        echo "                      </td>";
        echo "                      <td>";
        echo "                          92";
        echo "                      </td>";
        echo "                      <td>";
        echo "                          93";
        echo "                      </td>";
        echo "                      <td>";
        echo "                          94";
        echo "                      </td>";
        echo "                      <td>";
        echo "                          95";
        echo "                      </td>";
        echo "                      <td>";
        echo "                          96";
        echo "                      </td>";
        echo "                      <td width='55'>";
        echo "                          97";
        echo "                      </td>";
        echo "                      <td>";
        echo "                          98";
        echo "                      </td>";
        echo "                      <td>";
        echo "                          99";
        echo "                      </td>";
        echo "                      <td>";
        echo "                          100";
        echo "                      </td>";
        echo "                  </tr>";
        echo "                  <tr style='text-align: center; background-color: #FFEFD5; height: 60px;'>";
        echo "                      <td width='90'>";
        echo "                          101";
        echo "                      </td>";
        echo "                      <td width='90'>";
        echo "                          102";
        echo "                      </td>";
        echo "                      <td width='90'>";
        echo "                          103";
        echo "                      </td>";
        echo "                      <td width='90'>";
        echo "                          104";
        echo "                      </td>";
        echo "                      <td width='90'>";
        echo "                          105";
        echo "                      </td>";
        echo "                      <td width='90'>";
        echo "                          106";
        echo "                      </td>";
        echo "                      <td width='90' id='tdHover' title='MC 107 Paragem 113 - 02/10/2016'>";
        echo "                          <a href='meditcrista.php?s=107' id='linkDownloads'>107<p style='font-size: 13px;'>02.10.2016</p></a>";//style='background-color: #FFA07A;'
        echo "                      </td>";
        echo "                      <td width='90' id='tdHover' title='MC 108 Paragem 114 - 09/10/2016'>";
//        echo "                          <a href='/downloads/meditacaocrista/MC108Paragem114.pdf' id='linkDownloads'>108<p style='font-size: 13px;'>09.10.2016</p></a>";//style='background-color: #FFA07A;'
        echo "                          <a href='meditcrista.php?s=108' id='linkDownloads'>108<p style='font-size: 13px;'>09.10.2016</p></a>";//style='background-color: #FFA07A;'
        echo "                      </td>";
        echo "                      <td width='90' id='tdHover' title='MC 109 Paragem 121 - 16/10/2016'>";
        echo "                          <a href='meditcrista.php?s=109' id='linkDownloads'>109<p style='font-size: 13px;'>16.10.2016</p></a>";
        echo "                      </td>";
        echo "                      <td width='90' id='tdHover'>";
        echo "                          <a href='meditcrista.php?s=110' id='linkDownloads'>110<p style='font-size: 13px;'>23.10.2016</p></a>";
        echo "                      </td>";
        echo "                  </tr>";
        echo "                  <tr style='text-align: center; background-color: #E0FFFF; height: 60px;'>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=111' id='linkDownloads'>111<p style='font-size: 13px;'>30.10.2016</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=112' id='linkDownloads'>112<p style='font-size: 13px;'>06.11.2016</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=113' id='linkDownloads'>113<p style='font-size: 13px;'>13.11.2016</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=114' id='linkDownloads'>114<p style='font-size: 13px;'>20.11.2016</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=115' id='linkDownloads'>115<p style='font-size: 13px;'>27.11.2016</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=116' id='linkDownloads'>116<p style='font-size: 13px;'>04.12.2016</p></a>";
        echo "                      </td>";
        echo "                      <td width='55'>";
        echo "                           <a href='meditcrista.php?s=117' id='linkDownloads'>117<p style='font-size: 13px;'>11.12.2016</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=118' id='linkDownloads'>118<p style='font-size: 13px;'>18.12.2016</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=119' id='linkDownloads'>119<p style='font-size: 13px;'>25.12.2016</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=120' id='linkDownloads'>120<p style='font-size: 13px;'>01.01.2017</p></a>";
        echo "                      </td>";
        echo "                  </tr>";
        echo "                  <tr style='text-align: center; background-color: #FFEFD5; height: 60px;'>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=121' id='linkDownloads'>121<p style='font-size: 13px;'>08.01.2017</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=122' id='linkDownloads'>122<p style='font-size: 13px;'>15.01.2017</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=123' id='linkDownloads'>123<p style='font-size: 13px;'>22.01.2017</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=124' id='linkDownloads'>124<p style='font-size: 13px;'>29.01.2017</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=125' id='linkDownloads'>125<p style='font-size: 13px;'>05.02.2017</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=126' id='linkDownloads'>126<p style='font-size: 13px;'>12.02.2017</p></a>";
        echo "                      </td>";
        echo "                      <td width='55' id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=127' id='linkDownloads'>127<p style='font-size: 13px;'>19.02.2017</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=128' id='linkDownloads'>128<p style='font-size: 13px;'>26.02.2017</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=129' id='linkDownloads'>129<p style='font-size: 13px;'>05.03.2017</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=130' id='linkDownloads'>130<p style='font-size: 13px;'>12.03.2017</p></a>";
        echo "                      </td>";
        echo "                  </tr>";

        echo "                  <tr style='text-align: center; background-color: #E0FFFF; height: 60px;'>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=131' id='linkDownloads'>131<p style='font-size: 13px;'>19.03.2017</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=132' id='linkDownloads'>132<p style='font-size: 13px;'>26.03.2017</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=133' id='linkDownloads'>133<p style='font-size: 13px;'>02.04.2017</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=134' id='linkDownloads'>134<p style='font-size: 13px;'>09.04.2017</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=135' id='linkDownloads'>135<p style='font-size: 13px;'>16.04.2017</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=136' id='linkDownloads'>136<p style='font-size: 13px;'>23.04.2017</p></a>";
        echo "                      </td>";
        echo "                      <td width='55' id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=137' id='linkDownloads'>137<p style='font-size: 13px;'>30.04.2017</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=138' id='linkDownloads'>138<p style='font-size: 13px;'>07.05.2017</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=139' id='linkDownloads'>139<p style='font-size: 13px;'>14.05.2017</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=140' id='linkDownloads'>140<p style='font-size: 13px;'>21.05.2017</p></a>";
        echo "                      </td>";
        echo "                  </tr>";
        echo "                  <tr style='text-align: center; background-color: #FFEFD5; height: 60px;'>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=141' id='linkDownloads'>141<p style='font-size: 13px;'>28.05.2017</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=142' id='linkDownloads'>142<p style='font-size: 13px;'>04.06.2017</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=143' id='linkDownloads'>143<p style='font-size: 13px;'>11.06.2017</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=144' id='linkDownloads'>144<p style='font-size: 13px;'>18.06.2017</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=145' id='linkDownloads'>145<p style='font-size: 13px;'>25.06.2017</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=146' id='linkDownloads'>146<p style='font-size: 13px;'>02.07.2017</p></a>";
        echo "                      </td>";
        echo "                      <td>";
        echo "                           147";
        echo "                      </td>";
        echo "                      <td>";
        echo "                           148";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=149' id='linkDownloads'>149<p style='font-size: 13px;'>23.07.2017</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=150' id='linkDownloads'>150<p style='font-size: 13px;'>30.07.2017</p></a>";
        echo "                      </td>";
        echo "                  </tr>";
        
        echo "                  <tr style='text-align: center; background-color: #E0FFFF; height: 60px;'>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=151' id='linkDownloads'>151<p style='font-size: 13px;'>06.08.2017</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=152' id='linkDownloads'>152<p style='font-size: 13px;'>13.08.2017</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=153' id='linkDownloads'>153<p style='font-size: 13px;'>20.08.2017</p></a>";
        echo "                      </td>";
        echo "                      <td id='tdHover'>";
        echo "                           <a href='meditcrista.php?s=154' id='linkDownloads'>154<p style='font-size: 13px;'>27.08.2017</p></a>";
        echo "                      </td>";
        echo "                      <td>";
        echo "                           <a href='#' id='linkDownloads'>155<p style='font-size: 13px;'>&nbsp;</p></a>";
        echo "                      </td>";
        echo "                      <td>";
        echo "                           <a href='#' id='linkDownloads'>156<p style='font-size: 13px;'>&nbsp;</p></a>";
        echo "                      </td>";
        echo "                      <td width='55'>";
        echo "                           <a href='#' id='linkDownloads'>157<p style='font-size: 13px;'>&nbsp;</p></a>";
        echo "                      </td>";
        echo "                      <td>";
        echo "                           <a href='#' id='linkDownloads'>158<p style='font-size: 13px;'>&nbsp;</p></a>";
        echo "                      </td>";
        echo "                      <td>";
        echo "                           <a href='#' id='linkDownloads'>159<p style='font-size: 13px;'>&nbsp;</p></a>";
        echo "                      </td>";
        echo "                      <td>";
        echo "                           <a href='#' id='linkDownloads'>160<p style='font-size: 13px;'>&nbsp;</p></a>";
        echo "                      </td>";
        echo "                  </tr>";


        echo "              </table>";
        
//                    echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=meditcrista.php'>";
            
//            echo "<div class='alert alert-success' role='alert'>Download efetuado com sucesso!</div>";


//        echo "              <meta HTTP-EQUIV='refresh' CONTENT='5;URL=meditcrista.php'>";

//        echo "              <a role='button' data-toggle='collapse' href='#downloads' aria=expanded='false' aria-controls='collapseDownloads'>Download das Composições da MC</a><br>";
//        echo "                  (Textos da MC do número 1 ao 59)";
        echo "          </div>";
        echo "</div>";//Fecha a div row
        
        echo "<div class='collapse' id='downloads'>";
        echo "<div class='row' style='font-family: garamond; font-size: 20px; color: #1f226d;'>";
        echo "  <div class='col-xs-2 col-sm-2 col-md-2'>&nbsp;</div>";
        echo "  <div class='col-xs-8 col-sm-8 col-md-8'>";
        echo "  <div class='text-center'>";
        echo "      <div class='table-responsive'>";
        echo "          <table class='table small'>";
        echo "              <tr style='background-color: #87CEFA;'>";
        echo "                  <td colspan='6'>";
        echo "                      <b>MEDITAÇÃO CRISTÃ - COMPOSIÇÃO</b>";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr class='warning'>";
        echo "                  <td colspan='6'>";
        echo "                      Quando já tiver seu programa, verifique a data de atualização para saber se está atualizado";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td style='background-color: #FFFF00;'>";
        echo "                      Parte 1";
        echo "                  </td>";
        echo "                  <td style='background-color: #DB7093;'>";
        echo "                      Parte 2";
        echo "                  </td>";
        echo "                  <td style='background-color: #93DB70;'>";
        echo "                      Parte 3";
        echo "                  </td>";
        echo "                  <td style='background-color: #6495ED;'>";
        echo "                      Parte 4";
        echo "                  </td>";
        echo "                  <td style='background-color: #FFE4E1;'>";
        echo "                      Parte 5";
        echo "                  </td>";
        echo "                  <td style='background-color: #FFA500;'>";
        echo "                      Parte 6";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr class='warning'>";
        echo "                  <td>";
        echo "                      Atualizado em 30/09/2016";//Parte 1
        echo "                  </td>";
        echo "                  <td>";
        echo "                      Atualizado em ---";//Parte 2
        echo "                  </td>";
        echo "                  <td>";
        echo "                      Atualizado em 26/08/2016";//Parte 3
        echo "                  </td>";
        echo "                  <td>";
        echo "                      Atualizado em ---";//Parte 4
        echo "                  </td>";
        echo "                  <td>";
        echo "                      Atualizado em ---";//Parte 5
        echo "                  </td>";
        echo "                  <td>";
        echo "                      Atualizado em ---";//Parte 6
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      1";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      15";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      19";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      32";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      40";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      50";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr class='warning'>";
        echo "                  <td>";
        echo "                      2";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      16";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      20";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      33";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      41";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      51";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      3";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      17";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      21";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      34";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      42";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      52";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr class='warning'>";
        echo "                  <td>";
        echo "                      4";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      18";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      22";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      35";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      43";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      53";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      5";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      23";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      36";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      44";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      54";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr class='warning'>";
        echo "                  <td>";
        echo "                      6";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      24";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      37";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      45";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      55";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      7";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      25";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      38";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      46";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      56";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr class='warning'>";
        echo "                  <td>";
        echo "                      8";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      26";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      39";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      47";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      57";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      9";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      27";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      48";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      58";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr class='warning'>";
        echo "                  <td>";
        echo "                      10";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      <a href='downloads/meditacaocrista/MC102Paragem433.pdf' style='text-decoration: underline; font-weight: bold;' target='_blank'>28</a>";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      49";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      59";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      11";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      29";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      60";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr class='warning'>";
        echo "                  <td>";
        echo "                      <a href='downloads/meditacaocrista/MC106Paragem112.pdf' style='text-decoration: underline; font-weight: bold;' target='_blank' title='Paragem 112'>12</a>";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      30";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr>";
        echo "                  <td>";
        echo "                      <a href='downloads/meditacaocrista/MC107Paragem113.pdf' style='text-decoration: underline; font-weight: bold;' target='_blank' title='Paragem 113'>13</a>";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      31";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr class='warning'>";
        echo "                  <td>";
        echo "                      14";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      32";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "                  <td>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "              </tr>";
        echo "              <tr style='background-color: #87CEFA;'>";
        echo "                  <td colspan='6'>";
        echo "                      &nbsp;";
        echo "                  </td>";
        echo "              </tr>";
        echo "          </table>";
        echo "      </div>";
        echo "      </div>";
        echo "  </div>";
        echo "  <div class='col-xs-2 col-sm-2 col-md-2'>&nbsp;</div>";
        echo "</div>";
        echo "</div>";
        
        echo "<p style='height: 30px;'>&nbsp;</p>";
        echo "<div class='collapse' id='leitura1'>";
        //Collapse
        $this->textoLeituraMC();//leitura semanal 
        echo "</div>";
        //Dinâmica da reunião
        echo "<div class='row' style='font-family: garamond; font-size: 20px; color: #1f226d;' align='justify'>";
        echo "  <div style='height: 20px;'>&nbsp;</div>";
//        echo "      <div class='col-xs-1 col-sm-1'>&nbsp;</div>";
        echo "      <div class='col-xs-12 col-sm-12'>";
        echo "          <p style='font-size: 20px; font-family: garamond; font-weight: bold; text-align: center;'>";
        echo "              DINÂMICA DA REUNIÃO DA MEDITAÇÃO CRISTÃ (MC)";
        echo "          </p>";
        echo "          <div style='height: 30px;'>&nbsp;</div>";
        echo "          <p style='".$tamanhoFonte16."; text-align: justify; ".$margem.";'>";
        echo "                  Este encontro compreende a reunião de pessoas afins e interessada em aprofundar o significado espiritual do Evangelho e tê-lo como ponto de partida para a vivência meditativa.";
        echo "          </p>";
        echo "          <br/>";
        echo "          <p style='text-align: justify; ".$tamanhoFonte16."; ".$margem.";'>";
        echo "              Há um focalizador que coordena a reunião e os convidados.";
        echo "          </p>";
        echo "          <br/>";
        echo "          <p style='text-align: justify; ".$tamanhoFonte16."; ".$margem.";'>";
        echo "              Como preliminar é oferecido um primeiro texto que contém os versículos do Evangelho que serão analisados e meditados naquele dia.";
        echo "          </p>";
        echo "          <br/>";
        echo "          <p style='text-align: justify; ".$tamanhoFonte16."; ".$margem.";'>";
        echo "              No convite, disposto nos dias que antecedem o domingo do encontro, no site da RUV, encontra-se este primeiro texto.";
        echo "          </p>";
        echo "          <br/>";
        echo "          <p style='text-align: justify; ".$tamanhoFonte16."; ".$margem.";'>";
        echo "              É solicitado aos participantes chegarem de 15 a 10 minutos antes do início da reunião para tomarem conhecimento do conteúdo que será abordado, quando é distribuído um segundo texto. Neste há o desenvolvimento do entendimento do conteúdo dos versículos.";
        echo "          </p>";
        echo "          <br/>";
        echo "          <p style='text-align: justify; ".$tamanhoFonte16."; ".$margem.";'>";
        echo "              A dinâmica da reunião parece com os encontros na sinagoga naquele tempo de Jesus, em que se lia um trecho da Torá e, a seguir, era facultada aos presentes, indistintamente, o uso da palavra, para que expressassem a sua compreensão.";
        echo "          </p>";
        echo "          <br/>";
        echo "          <p style='text-align: justify; ".$tamanhoFonte16."; ".$margem.";'>";
        echo "              Fazemos isto, no entendimento de que qualquer pessoa naquele momento pode veicular, como instrumento, a palavra inspirada e até iluminada, aquela que a maioria ou até mesmo uma única precisa ouvir. E também que a palavra verbalizada precisa ser ouvida, pelo menos por quem a diz.";
        echo "          </p>";
        echo "          <br/>";
        echo "          <p style='text-align: justify; ".$tamanhoFonte16."; ".$margem.";'>";
        echo "              A reunião da Meditação Cristã desenvolve-se dividida em 7 partes:<br/>";
        echo "          </p>";
        echo "          <p style='".$tamanhoFonte16."; text-align: justify;'>";
        echo "              <b>1ª parte: Introdução e Leitura.</b><br/>";
        echo "          </p>";
        echo "          <p style='".$tamanhoFonte16."; text-align: justify;'>";
        echo "              1.	É procedida a leitura da Introdução que expõe, de forma resumida, do tema do estudo do dia.<br/>";
        echo "          </p>";
        echo "          <p style='".$tamanhoFonte16."; text-align: justify;'>";
        echo "              2.	Nesta leitura estão incluídos os versículos escolhidos como fonte para a meditação.<br/><br/>";
        echo "          </p>";
        echo "          <p style='".$tamanhoFonte16."; text-align: justify;'>";
        echo "              <b>2ª parte: Primeira Meditação.</b><br/>";
        echo "          </p>";
        echo "          <p style='".$tamanhoFonte16."; text-align: justify;'>";
        echo "              3.	Há um tempo de 20 minutos de silêncio para uma primeira meditação, em busca da inspiração para a compreensão da palavra sagrada e, se possível, a fruição no seu sentido transcendente.<br/><br/>";
        echo "          </p>";
        echo "          <p style='".$tamanhoFonte16."; text-align: justify;'>";
        echo "              <b>3ª parte: O Comentário Principal.</b><br/>";
        echo "          </p>";
        echo "          <p style='".$tamanhoFonte16."; text-align: justify;'>";
        echo "              4.	O comentador principal é o focalizador da MC, ou um dos seus participantes assíduos, ou um visitante convidado que dispõe de 30 a 40 minutos para expor o que sua inspiração e estudo captaram sobre a passagem em evidência.<br/><br/>";
        echo "          </p>";
        echo "          <p style='".$tamanhoFonte16."; text-align: justify;'>";
        echo "              <b>6ª parte: Os Demais Comentários.</b><br/>";
        echo "          </p>";
        echo "          <p style='".$tamanhoFonte16."; text-align: justify;'>";
        echo "              5.	A palavra é franqueada a qualquer um dos participantes que tem a princípio até 10 minutos para compartilhar com o grupo o seu entendimento. Para isto ele apanha um bastão que fica numa tigela, no centro da sala. Enquanto ele estiver de posse do bastão, apenas ele tem o direito de falar. Se quiser, poderá também formular verbalmente uma pergunta. Ao terminar, ele devolve o bastão à tigela.<br/>";
        echo "          </p>";
        echo "          <p style='".$tamanhoFonte16."; text-align: justify;'>";
        echo "              6.	Os próximos que tiverem o interesse em adicionar outro comentário procedem de forma similar ao do que lhe antecedeu.<br/>";
        echo "          </p>";
        echo "          <p style='".$tamanhoFonte16."; text-align: justify;'>";
        echo "              7.	Se alguém quiser apenas fazer pergunta, esta ou estas deverão ser formuladas por escrito, sendo de responsabilidade do comentador principal responder.<br/>";
        echo "          </p>";
        echo "          <p style='".$tamanhoFonte16."; text-align: justify;'>";
        echo "              8.	 Este deverá também apanhar o bastão e detê-lo enquanto responde. Quando terminar devolve o bastão à tigela.<br/>"; 
        echo "          </p>";
        echo "          <p style='".$tamanhoFonte16."; text-align: justify;'>";
        echo "              9.	Fica aberto ainda um tempo para quem quiser fazer outro comentário, inclusive responder à(s) pergunta(s) formulada(s).<br/>";
        echo "          </p>";
        echo "          <p style='".$tamanhoFonte16."; text-align: justify;'>";
        echo "              10.	Esta parte tem a duração de 40 a 50 minutos.<br/>";
        echo "          </p>";
        echo "          <p style='".$tamanhoFonte16."; text-align: justify;'>";
        echo "              11.	Qualquer comentador poderá falar mais de uma vez, desde que haja tempo hábil.<br/><br/>";
        echo "          </p>";
        echo "          <p style='".$tamanhoFonte16."; text-align: justify;'>";
        echo "              <b>7a parte: a segunda meditação.</b><br/>";
        echo "          </p>";
        echo "          <p style='".$tamanhoFonte16."; text-align: justify;'>";
        echo "              12.	A reunião termina com <b>uma meditação final que dura também 20 minutos</b>, como a inicial. Para esta, o focalizador escolhe um versículo do texto refletido como veículo para o estado meditativo.<br/>";
        echo "          </p>";
        echo "          <p style='".$tamanhoFonte16."; text-align: justify;'>";
        echo "              13.	Na tigela em que fica o bastão são colocados os nomes escritos daquelas pessoas que os presentes desejam que possam ser beneficiadas com o mérito deste encontro. O focalizador conduz <b>a força mental do conjunto para este objetivo</b>, no final desta meditação.<br/>";
        echo "          </p>";
        echo "          <p style='".$tamanhoFonte16."; text-align: justify;'>";
        echo "              14.	O tempo total da MC é de <b>2 horas</b>.<br/>";
        echo "          </p>";
        echo "          <p style='".$tamanhoFonte16."; text-align: justify; ".$margem.";'>";
        echo "              Primamos pela fala reflexiva em vez do debate ou da polêmica.<br/>";
        echo "          </p>";
        echo "          <p style='".$tamanhoFonte16."; text-align: justify; ".$margem.";'>";
        echo "              Evitamos que um fale para contestar o que o outro diz, como se houvesse uma fala mais certa. <br/>";
        echo "          </p>";
        echo "          <p style='".$tamanhoFonte16."; text-align: justify;'>";
        echo "              Valorizamos a fala de qualquer um porque esta tem um valor, mesmo que seja apenas para ele.<br/>";
        echo "          </p>";
        echo "          <p style='".$tamanhoFonte16."; text-align: justify;'>";
        echo "              Se alguém não concordar, não precisa combater o primeiro. Basta, na sua hora, falar o seu pensamento sem, contudo, almejar concordância ou unanimidade.<br/>";
        echo "          </p>";
        echo "          <p style='".$tamanhoFonte16."; text-align: justify; ".$margem.";'>";
        echo "              O uso do bastão é um procedimento valioso, porque produz naturalmente um lapso, mesmo que mínimo, entre uma fala e a seguinte.<br/>";
        echo "          </p>";
        echo "          <p style='".$tamanhoFonte16."; text-align: justify; ".$margem.";'>";
        echo "              Com isto estamos a valorizar muito o silêncio. Às vezes, depois de uma fala, pode haver minutos de silêncio, até que alguém decida fazer uso da palavra de novo. O silêncio espontâneo tem o seu lugar e importância.<br/>";
        echo "          </p>";
        echo "          <p style='".$tamanhoFonte16."; text-align: justify; ".$margem.";'>";
        echo "              O uso da escrita também contribui. Se uma pessoa não tem algo para falar mas apenas uma dúvida, o fato de ter que escrever a ajuda elaborar melhor o que deseja saber.<br/>";
        echo "          </p>";
        echo "          <p style='".$tamanhoFonte16."; text-align: justify; ".$margem.";'>";
        echo "              Tem sido uma experiência singular e enriquecedora esta meditação dominical em que sentimos a presença viva do Cristo,  como Mestre maior.";
        echo "          </p>";
//        echo "              </div>";
//        echo "          </p>";
        echo "      </div>";
//        echo "      <div class='col-xs-1 col-sm-1'>&nbsp;</div>";
        echo "</div>";//Fecha a div row
        
    }
    
    public function textoLeituraMC(){
//        echo "<div class='collapse' id='leitura1'>";
        echo "  <div class='well'>";
            echo "<div class='row' style='font-family: garamond; font-size: 20px; color: #1f226d;'>";
            echo "  <div class='col-xs-12 col-md-12'>";
            echo "      <div class='text-center'>";
            echo "          107. <label style='color: blue;'>RedeUnaViva: Meditação Cristã <label style='color: red;'>102</label> – paragem <label style='color: red;'>113</label> – <label style='color: red;'>02.10.2016</label></label>";
            echo "      </div>";
            echo "      <div align='right' style='padding-right: 50px;'><small>JOÃO 5:30-47</small></div>";
            echo "      <div class='text-center'>";
            echo "          OS TESTEMUNHOS SOBRE O CRISTO";
            echo "      </div>";
            echo "      <div class='table-responsive'>";
            echo "      <table class='table'>";
            echo "          <tr>";
            echo "              <td>";
            echo "                  107.1";
            echo "              </td>";
            echo "              <td>";
            echo "                  <b>Auto-indagação reflexiva e expansiva:</b><br/>";
            echo "                  1. Por que os judeus não aceitam os três testemunhos oferecidos a eles sobre Cristo?<br/>";
            echo "                  2. Por que o Cristo não recebe doutrina dos homens?<br/><br/>";
            echo "                  <b>Ao recolher-me, na hora da meditação, afinando a sintonia com o Mestre:</b><br>";
            echo "                  3. Como me comportar na meditação para não receber as doutrinas humanas, mas, sim, a do Cristo?";
            echo "              </td>";
            echo "          </tr>";
            echo "      </table>";
            echo "      </div>";
            echo "      <div class='text-center' style='color: #CC3299; font-weight: bold;'>João 5:30-47</div>";
            echo "      <br>";
            echo "      <div align='justify' style='color: #CC3299;'>";
            echo "          30. Não posso fazer nada por mim mesmo: conforme ouço, escolho, e minha escolha é justa, porque não procuro minha vontade, mas a vontade do que me enviou.<br/>";
            echo "          31. Seu eu testifico a meu respeito, não é verdadeiro meu testemunho?<br/>";
            echo "          32. Há outro que testifica a meu respeito, e sei que é verdadeiro o testemunho que ele testifica a meu respeito.<br/>";
            echo "          33. Vós enviastes a João e ele testificou a verdade.<br/>";
            echo "          34. Eu porém não recebo testemunho de homem, mas digo estas coisas para que vos salveis.<br/>";
            echo "          35. Ele era a lâmpada que ardia e brilhava: vós quisestes alegrar-vos por uma hora na luz dele.<br/>";
            echo "          36. Eu porém tenho um testemunho maior que o de João: pois as obras que o Pai me deu para que eu as termine, essas obras que produzo, testificam acerca de mim, que o Pai me enviou.<br/>";
            echo "          37. E o Pai que me enviou, esse testificou a meu respeito. Nem a voz dele nunca ouvistes, nem a forma dele vistes.<br/>";
            echo "          38. e não trazeis imanente em vós o seu ensino, porque não confiais em quem ele enviou.<br/>";
            echo "          39. Examinais as Escrituras, porque pensais ter nelas a vida imanente, e são elas que testificam a meu respeito.<br/>";
            echo "          40. E não quereis vir a mim, para que tenhais vida.<br/>";
            echo "          41. Não recebo doutrinha de homens.<br/>";
            echo "          42. mas conheci-vos, e não tendes em vós o amor de Deus.<br/>";
            echo "          43. Eu vim por meu Pai e não me recebeis: se vier outro por si mesmo, esse recebereis.<br/>";
            echo "          44. Como podeis confiar, recebendo uns dos outros uma doutrina, e não procurais a doutrina que vem da parte do único Deus?<br/>";
            echo "          45. Não penseis que vos acusarei ao Pai: há quem vos acuse, Moisés, no qual esperastes.<br/>";
            echo "          46. Pois se tivésseis confiado em Moisés, teríeis confiado em mim, pois de mim escreveu ele.<br/>";
            echo "          47. Se porém não confiais em seus escritos, como confiareis em minhas palavras?<br/>";
            echo "<br/>";
//            echo "          Não que alguém visse ao Pai, a não ser aquele que é de Deus; este tem visto ao Pai.<br>
//                            Na verdade, na verdade vos digo que aquele que crê em mim tem a vida eterna.<br>
//                            Eu sou o pão da vida.<br>
//                            Vossos pais comeram o maná no deserto, e morreram.<br>
//                            Este é o pão que desce do céu, para que o que dele comer não morra.<br>
//                            Eu sou o pão vivo que desceu do céu; se alguém comer deste pão, viverá para sempre; e o pão que eu der é a minha carne, que eu darei pela vida do mundo.<br>
//                            Disputavam, pois, os judeus entre si, dizendo: Como nos pode dar este a sua carne a comer?<br>
//                            Jesus, pois, lhes disse: Na verdade, na verdade vos digo que, se não comerdes a carne do Filho do homem, e não beberdes o seu sangue, não tereis vida em vós mesmos.<br>
//                            Quem come a minha carne e bebe o meu sangue tem a vida eterna, e eu o ressuscitarei no último dia.<br>
//                            Porque a minha carne verdadeiramente é comida, e o meu sangue verdadeiramente é bebida.<br>
//                            Quem come a minha carne e bebe o meu sangue permanece em mim e eu nele.<br>
//                            Assim como o Pai, que vive, me enviou, e eu vivo pelo Pai, assim, quem de mim se alimenta, também viverá por mim.<br>
//                            Este é o pão que desceu do céu; não é o caso de vossos pais, que comeram o maná e morreram; quem comer este pão viverá para sempre.<br>";
//            echo "          <p style='height: 20px;'>&nbsp;</p>";
//            echo "          <div class='text-center' style='color: blue; font-weight: bold;'>João 6:46-58</div>";
            echo "          <p style='height: 20px;'>&nbsp;</p>";
            echo "      </div>";
            echo "      <div class='text-center'>";
            echo "          <label style='color: blue;'>RedeUnaViva: Meditação Cristã <label style='color: red;'> 108 </label> – paragem <label style='color: red;'>114</label> – <label style='color: red;'>09.10.16</label></label><br>";
            echo "          <label style='color: red;'>João 7:1; Marcos 7:1-16; Mateus 15:1-11</label>";
            echo "      </div>";
            echo "  </div>";
            echo "</div>";
        echo "  </div>";
//        echo "</div>";
        
    }
    
    public function textoRetiro(){
        $tamanhoFonte16 = "font-size: 20px; font-family: garamond; text-align: justify;"; //; margin-left: 50px

        echo "<br/><br/>";
        echo "<div style='".$tamanhoFonte16."'>Conclui-se a Jornada Real de cada ano com um Retiro, que serve como avaliação deste percurso pelas 4 estações e preparação para o início de um novo tempo de vivências visando o autoconhecimento.</div><br/>";
        echo "<p style='".$tamanhoFonte16.";'>Funciona também como férias diferentes. Por que diferentes?</p><br/>";
        echo "<p style='".$tamanhoFonte16."'>Férias servem, a princípio, como descanso das atividades rotineiras. Muitas vezes são realizadas através de viagem por lugares desconhecidos, ou até mesmo através de revisitação de lugares já apreciados. De ordinário convidamos pessoas amigas e afins para tal jornada, mas em outras ocasiões até mesmo solitários nos aventuramos pelos caminhos. O lugar destas férias é conhecido, se já o frequentou antes, ou desconhecido, caso trate-se da sua primeira incursão por lá. Irá sozinho, mas acompanhado. Ou vice-versa.</p><br/>";
        echo "<p style='".$tamanhoFonte16.";'>Nosso itinerário mira o Espaço de Convivência Morgenlicht que pode ser conhecido virtualmente com o link do seu site abaixo.</p><br/>";
        
        echo "<p style='".$tamanhoFonte16.";'>O Morgen é um singular espaço de convivência, em beleza e conforto. Oferece um entorno favorável à introspecção e à harmonização dos nossos corpos e mente. A alimentação, cuidada com esmero, associa prazer com leveza, saúde com bem-estar.</p><br/>";
        
        echo "<p style='".$tamanhoFonte16.";'>Esta semana de retiro, em setembro, inicia-se sempre na manhã do sábado, quando procedemos a viagem de ida e termina após o almoço do sábado seguinte quando começa a viagem de retorno. A semana reservada é aquela que contém o feriado do dia 7 de setembro.</p><br/>";
        echo "<p style='".$tamanhoFonte16.";'>Neste tempo são propiciadas 7 jornadas diárias de uma jornada semanal, que constituem os principais ritmos de trabalho para o cultivo da vida interior. É favorecida uma vivência intensiva daquilo que é proposto como Jornada Real.</p><br/>";
        echo "<p style='".$tamanhoFonte16.";'>Os portais da manhã e da noite da jornada diária são momentos propícios de parada para transformar os conteúdos oníricos e as impressões dos acontecimentos diurnos, em encontro com a sabedoria perene.  Como preliminares facilitam a entrada em especiais estados de consciência, descobertos pela  prática da meditação.</p><br/>";
        echo "<p style='".$tamanhoFonte16.";'>Outro importante ciclo contemplado no retiro é o da jornada anual. Na perspectiva do calendário-RUV, o ano inicia-se em setembro, com a primavera, e desenrola-se através das 52 semanas seguintes, que vêm a compor os 13 meses lunares ou os 12 meses-RUV, para terminar com o fim do inverno. O retiro propicia um inventário individual do seu ano de labor a fim de facilitar a compreensão adequada para o investimento a ser realizado no próximo.</p><br/>";
        echo "<br/>";
        echo "<p style='".$tamanhoFonte16.";'><b>SERVIÇO:</b></p><br/>";
        echo "<p style='".$tamanhoFonte16.";'>Como decorrência da filosofia do voluntariado e, portanto, de um trabalho sem fins lucrativos, o valor cobrado serve para pagar os serviços do Morgenlicht e cobrir as despesas relacionadas com a organização do evento. Seu montante é dividido para ser pago mensalmente em oito vezes, de março a outubro.</p><br/>";
        echo "<p style='".$tamanhoFonte16.";'>";
        echo "<a href='http://www.morgenlicht.com.br/site07/portugues/inf.praticas/_private/inf.praticas.pdf' target='_blank'>http://www.morgenlicht.com.br/site07/portugues/inf.praticas/_private/inf.praticas.pdf</a><br/>";
        echo "<a href='http://www.morgenlicht.com.br/site07/portugues/sumario/index.htm' target='_blank'>http://www.morgenlicht.com.br/site07/portugues/sumario/index.htm</a>"; // style='margin-left: 50px;'
        echo "</p>";
        
        
    }
    
    public function textoJornadaMeditacao(){
    $fonteGaramond = "font-family: garamond";
    $tamanhoFonte = "font-size: 20px";
    $espacamento = "padding-left: 50px";
        echo "<div class='col-xs-12 col-sm-12 col-md-12'>";
        echo "  <div class='text-center' style='font-family: garamond; color: #1f226d;'>";
//        echo "  <div class='text-center' style='font-family: garamond; color: #3F6CA1;'>";
        echo "      <img src='images/JR_Image.png' width='60' height='60'/><br>";
        echo "      <span style='color: #1f226d; font-size: 30px;'>";
        echo "          <b>Jornada de Meditação</b><br>";
        echo "      </span>";
        echo "      <span style='color: #1f226d; ".$tamanhoFonte.";'>";
        echo "          <b>Inverno</b><br><br>";
//        echo "          <b>Primavera e Outono</b><br><br>";
        echo "      </span>";
        echo "      <span style='".$tamanhoFonte.";'>";
        echo "          12 encontros para habilitar um modo especial <br>";
        echo "          de funcionamento da mente<br><br>";
        echo "          toque com delicadeza e agilidade o despertar da essência esquecida<br><br>";
        echo "          cultive sua fonte de bem estar <br>";
        echo "          e comprove a experiência da felicidade<br><br><br>";
        echo "      </span>";
        echo "  </div>";
        echo "</div>";
        echo "<div class='col-xs-12 col-sm-12 col-md-12' style='".$fonteGaramond."; color: #1f226d;'>";
        echo "  <div align='justify'>";
        echo "      <span style='font-size: 20px; '>";//antes, era 14, fora da fonte garamond ".$espacamento.";
        echo "          A meditação compõe com a Jornada Real o projeto de ação da RedeUnaViva. Favorece o desenvolvimento espiritual e habilita cada pessoa a disponibilizar sua oferta de benefícios, em prol de um mundo melhor. Contribui sutil e efetivamente para a instalação da já vislumbrada cultura de paz. Embutida na Jornada Real, ela se entrelaça com o processo de autoconhecimento, em prática estendida ao longo de um ano.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; '>";//antes, era 14, fora da fonte garamond ".$espacamento.";
        echo "          Como Jornada de Meditação, disposta em uma estação, é oferecida em 12 encontros semanais. Ao proporcionar, por excelência, o encontro com o mestre interior, incrementa o labor da transformação de si mesmo, a caminho da factível auto-realização. Desta fusão, entre buscador e mestre, emergem sua riqueza em forma de sabedoria e de amor, potencialidade e dádiva de todo ser humano.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; '>";//antes, era 14, fora da fonte garamond ".$espacamento.";
        echo "          Esta Jornada, disponibilizada duas vezes por ano, na primavera e no outono, apresenta sua filosofia e compartilha, em grupo afim, cinco preciosas conduções para este especial estado de consciência.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; '>";//antes, era 14, fora da fonte garamond ".$espacamento.";
        echo "          Se você já apreendeu que sua natureza espiritual almeja vivências que ultrapassam o funcionamento ordinário da mente, se você já pressentiu que há um despertar interior à espera do seu investimento, é possível que tenhamos uma experiência singular a ser permutada nestes encontros.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; '>";//antes, era 14, fora da fonte garamond ".$espacamento.";
        echo "          Para participar é preciso preencher o formulário de adesão (<a href='formAdesao.php' target='_self'>clique aqui</a>).<br><br>";
        echo "      </span>";
        echo "<hr style='border-color: #1f226d;'>";
        echo "      <span style='font-size: 20px;'>";//antes, era 14, fora da fonte garamond ".$espacamento.";
        echo "          Informações:<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px;'>";//antes, era 14, fora da fonte garamond ".$espacamento.";
        echo "          Início da próxima Jornada de Meditação, em <b>26 de junho de 2017</b>.<br><br>";
//        echo "          Início da próxima Jornada de Meditação, em <b>21 de setembro de 2016</b>.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px;'>";//antes, era 14, fora da fonte garamond ".$espacamento.";
        echo "          Dia e horário: <b>2as feiras, de 19:00h às 20:30h</b>.<br><br>";
//        echo "          Dia e horário: <b>4as feiras, de 14:30h às 16h</b>.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px;'>";//antes, era 14, fora da fonte garamond ".$espacamento.";
        echo "          Endereço: <a href='contato.php#mapa' target='_self'>sede da RedeUnaViva</a> (ver à esquerda da barra horizontal, na base desta página ou no mapa, na aba “Contato”).<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px;'>";//antes, era 14, fora da fonte garamond  ".$espacamento.";
        echo "          Somos um grupo de voluntários que não recebe por qualquer serviço prestado. A cobrança visa unicamente cobrir as despesas de aluguel da sala e gastos para o nosso desenvolvimento.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px;'>";//antes, era 14, fora da fonte garamond ".$espacamento.";
        echo "          Investimento: <b>R$ 120,00 </b>(por mês, a cada 4 semanas) ou <b>R$ 240,00</b>, a ser pago juntamente, com a sua inscrição.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px;'>";//antes, era 14, fora da fonte garamond ".$espacamento.";
        echo "          Contamos com sua compreensão e contribuição para o desenvolvimento desta Rede espiritual – a <b>RedeUnaViva</b>. Caso haja interesse em participar, mas dificuldade em arcar com o investimento financeiro, as portas estão abertas para encontrarmos a solução.";
        echo "      </span>";
        echo "  </div>";
        echo "</div>";
    }
    
    public function textoApresentacao(){
//        echo "<meta http-equiv='refresh' content='5;url=apresentacao.php'>";
    $fonteGaramond = "font-family: garamond";
    $tamanhoFonte = "font-size: 20px";
    $espacamento = "padding-left: 50px";
        echo "<div class='col-xs-12 col-sm-12 col-md-12'>";
        echo "  <div class='text-center' style='font-family: garamond; color: #1f226d;'>";
//        echo "  <div class='text-center' style='font-family: garamond; color: #3F6CA1;'>";
        echo "      <span style='color: #1f226d; font-size: 30px;'>";
        echo "          <b>Apresentação do Site</b><br>";
        echo "      </span>";
        echo "  </div>";
        echo "</div>";
        echo "<p style='height: 50px;'>&nbsp;</p>";
        echo "<div class='col-xs-12 col-sm-12 col-md-12' style='".$fonteGaramond."; color: #1f226d;'>";
        echo "  <div align='justify'>";
        echo "      <span style='font-size: 20px; '>";//antes, era 14, fora da fonte garamond ".$espacamento.";
        echo "          1. Seja muito bem-vinda(o) à nossa página na internet. Esta apresentação visa facilitar sua primeira navegação pelo site.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; '>";//antes, era 14, fora da fonte garamond ".$espacamento.";
        echo "          2. Possa sua sintonia nesta visita gerar algum benefício para você ou para qualquer outro ser humano.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; '>";//antes, era 14, fora da fonte garamond ".$espacamento.";
        echo "          3. A <font style='color: red; font-weight: bold;'>RedeUnaViva</font> (RUV) tem por objetivo cooperar para a instalação e expansão de uma Cultura de Paz. Tem como instrumento principal para alcançar tal fim o trabalho de autoconhecimento do seu participante. Visa resultar melhor qualidade de convivência nos nossos grupos de relacionamento pessoal - família, trabalho e sociedade.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; '>";//antes, era 14, fora da fonte garamond ".$espacamento.";
        echo "          4. Todo os que contribuem para o funcionamento da RUV trabalham em regime de voluntariado, dispensando qualquer tipo de remuneração financeira.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; '>";//antes, era 14, fora da fonte garamond ".$espacamento.";
        echo "          5. Para conhecer o conteúdo do site, você NÃO precisa usar os botões à direita, no alto. Comece pelas nove abas do menu que se encontra na barra horizontal inferior, a partir de Home.<br><br>";
        echo "      </span>";
//        echo "<hr style='border-color: #1f226d;'>";
        echo "      <span style='font-size: 20px;'>";//antes, era 14, fora da fonte garamond ".$espacamento.";
        echo "          6. <a href='index.php' style='color: red; text-decoration: none; font-weight: bold;'>Home</a> abre o site e expõe, em banners sequenciados, um resumo da nossa proposta.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px;'>";//antes, era 14, fora da fonte garamond ".$espacamento.";
        echo "          7. <span style='color: red; text-decoration: none; font-weight: bold;'>Apresentação</span> é esta aba do menu em que você se encontra agora.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px;'>";//antes, era 14, fora da fonte garamond ".$espacamento.";
        echo "          8. <span style='color: red; font-weight: bold;'>Programação</span> apresenta nossas cinco atividades principais, cada uma com um texto explicativo: <a href='jornadareal.php' style='font-weight: bold; text-decoration: none;'>Jornada Real</a>; <a href='meditacao.php' style='font-weight: bold; text-decoration: none;'>Jornada de Meditação</a>; <a href='meditcrista.php' style='font-weight: bold; text-decoration: none;'>Meditação Cristã</a>; <a href='redesocialclinica.php' style='font-weight: bold; text-decoration: none;'>Rede Social Clínica</a>; <a href='retiro.php' style='font-weight: bold; text-decoration: none;'>Retiro</a>. E ainda <em>a página</em> <a href='estedia.php' style='font-weight: bold; text-decoration: none;'>Este Dia</a>, em que atualizamos alguma mensagem ou alguma informação que mereça destaque. Nesta página é, ainda, veiculada uma mensagem de celebração, seja por data especial, seja pelo aniversário de pessoa querida vinculada a nós.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px;'>";//antes, era 14, fora da fonte garamond ".$espacamento.";
        echo "          9. Na aba <span style='color: red; font-weight: bold;'>Tempo</span> estão a <font style='font-weight: bold;'>Semana RedeUnaViva</font> - informativo dos horários das atividades (de frequência semanal, mensal e trimestral) nos respectivos dias da semana; a <a href='agenda.php' style='font-weight: bold; text-decoration: none;'>Agenda</a> - os eventos dispostos nos dias do ano-RUV, isto é, de setembro de um ano (início do ano, primavera) a setembro do ano seguinte (fim do ano, inverno). E o <a href='calendario.php' style='font-weight: bold; text-decoration: none;'>Calendário</a> - mostra a data-RUV, e os critérios de marcação desta data.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px;'>";//antes, era 14, fora da fonte garamond ".$espacamento.";
        echo "          10. Na aba <span style='color: red; font-weight: bold;'>Mais</span> encontram-se atividades e grupos afins recomendados.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px;'>";//antes, era 14, fora da fonte garamond ".$espacamento.";
        echo "          11. Na <a href='galeria.php' style='color: red; text-decoration: none; font-weight: bold;'>Galeria</a> fotos expõem um pouco da nossa experiência.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px;'>";//antes, era 14, fora da fonte garamond ".$espacamento.";
        echo "          12. <a href='quemsomos.php' style='color: red; text-decoration: none; font-weight: bold;'>Quem somos</a> identifica o grupo responsável pela RUV.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px;'>";//antes, era 14, fora da fonte garamond ".$espacamento.";
        echo "          13. Através da aba <a href='contato.php' style='color: red; text-decoration: none; font-weight: bold;'>Contato</a> abrimos via de comunicação com os visitantes para receber sua mensagem (com perguntas, sugestões, comentários e outros). Nesta página há o endereço e mapa de localização da nossa sede.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px;'>";//antes, era 14, fora da fonte garamond ".$espacamento.";
        echo "          14. O <a href='https://redeunavivablog.wordpress.com/' style='color: red; text-decoration: none; font-weight: bold;' target='_blank'>Blog</a> como outro canal de comunicação, está sendo preparado para compartilhamento corrido em tempo real.<br><br>";
        echo "      </span>";
        echo "  </div>";
        echo "</div>";
    }
    
    public function textoEsteDia(){
//        echo "<meta http-equiv='refresh' content='5;url=estedia.php'>";
    $fonteGaramond = "font-family: garamond";
    $tamanhoFonte = "font-size: 20px";
    $espacamento = "padding-left: 50px";
        echo "<div class='col-xs-12 col-sm-12 col-md-12'>";
        echo "  <div class='text-center' style='font-family: garamond; color: #1f226d;'>";
//        echo "  <div class='text-center' style='font-family: garamond; color: #3F6CA1;'>";
        echo "      <span style='color: #1f226d; font-size: 30px;'>";
        echo "          <b>Este Dia</b><br>";
        echo "      </span>";
        echo "      <p style='height: 30px;'>&nbsp;</p>";
        echo "      <span style='color: #1f226d; font-size: 18px; font-weight: bold; text-align: center;'>";
        echo "          Hoje é o dia, o precioso tempo de nascer e acordar, de viver e fazer, de morrer e recolher-se<br><br>Que seja auspicioso, a caminho da Autorrealização<br>";
        echo "      </span>";
        echo "      <p style='height: 30px;'>&nbsp;</p>";
        echo "      <span style='color: #1f226d; font-size: 18px; font-weight: bold; text-align: center;'>";
        $calendario = new calendarioRuv();
        $calendario->configuracaoCalendario("estedia");
        echo "      </span>";
        echo "  </div>";
        echo "</div>";

//        echo "<div class='col-xs-12 col-sm-12 col-md-12' style='".$fonteGaramond."; color: #1f226d;'>";
//        echo "  <div align='justify'>";
//        echo "  <p style='height: 50px;'>&nbsp;</p>";
//        echo "      <span style='font-size: 25px; '>";//antes, era 14, fora da fonte garamond ".$espacamento.";
//        echo "          Aniversariante:";
//        echo "      </span>";
//        echo "  </div>";
//        echo "</div>";
    }
    
    public function textoRodaDosSonhos(){
    $fonteGaramond = "font-family: garamond";
    $tamanhoFonte = "font-size: 20px";
    $espacamento = "padding-left: 50px";
        echo "<p style='height: 20px;'>&nbsp;</p>";
        echo "<div class='col-xs-12 col-sm-12 col-md-12'>";
        echo "  <div class='text-center' style='font-family: garamond; color: #1f226d;'>";
        echo "      <span style='".$tamanhoFonte.";'>";
        echo "          descubra como remover obstáculos ao crescimento pessoal <br>";
        echo "          através do poder instrínseco dos sonhos<br><br>";
        echo "          trabalhando os sonhos é possível conhecer padrões inconscientes<br>";
        echo "          que comprometem a saúde psíquica<br><br>";
        echo "          a partilha em grupo afim e cuidadoso enriquece os processos pessoais e coletivos<br><br><br>";
        echo "      </span>";
        echo "  </div>";
        echo "</div>";
        echo "<div class='col-xs-12 col-sm-12 col-md-12' style='".$fonteGaramond."; color: #1f226d;'>";
        echo "  <div align='justify'>";
        echo "      <span style='font-size: 20px; '>";
        echo "          Mensalmente, numa manhã de sábado, reúno-me com um grupo de pessoas interessadas em trabalhar psicologicamente seus sonhos, usando como referência principal uma teoria transpessoal autoral, desenvolvida nas últimas décadas.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; '>";
        echo "          Os sonhos, ampliados através de vivências e análises, contribuem com o processo de autorrealização, incrementando novos elementos para o autoconhecimento.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; '>";
        echo "          Segundo o sistema transpessoal, aos dois períodos naturais da jornada diária - o dia, com sua claridade, e a noite, com sua obscuridade, complementados para formar a unidade do ciclo diário - vinculam-se dois instigantes estados da consciência humana: a vigília, própria do <i>consciente solar</i>, e o onírico, afinado com o <i>inconsciente lunar</i>. Um também é claro, e o outro, sombrio. Um verbal, afirmativo e justificador, e o outro, imagético, alucinante e conspirador. Duas realidades do, subjetivismo que se colam, mais ou menos, com movimentos antagônicos e cooperativos, com a singela propriedade de promover a inteireza do ser humano, desde que criativamente integradas.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; '>";
        echo "          Ao interessado em experimentar este processo, é facultado participar de uma Roda, mediante entrevista prévia. Tanto esta entrevista como sua primeira participação no grupo são oferecidas sem custo financeiro para o interessado. É um grupo aberto não apenas aos profissionais de saúde, mas para todo aquele que se interessa no mergulho interior.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; '>";
        echo "         Contato por e-mail ou por telefone.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; '>";
        echo "          Focalizador: <b>Luiz Carlos Bernal (<a href='mailto:luiz.bernal@gmail.com' style='text-decoration: none;'>luiz.bernal@gmail.com</a>) - Médico e Psicoterapeuta</b>. Mestre pelo HCTE-UFRJ, com o tema vinculado aos estudos da Consciência.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; '>";
        echo "          <b>Informações:</b><br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; '>";
        echo "          Próxima Roda: ver calendário abaixo.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; '>";
        echo "          Horário: <b>de 9h às 13h</b><br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; '>";//antes, era 14, fora da fonte garamond ".$espacamento.";
        echo "          Endereço: <a href='contato.php#mapa' target='_self'>sede da RedeUnaViva</a>.<br><br>";
        echo "      </span>";
        echo "  </div>";
        echo "</div>";
    }
    public function textoRedeSocialClinica(){
    $fonteGaramond = "font-family: garamond";
    $tamanhoFonte = "font-size: 20px";
    $espacamento = "padding-left: 50px";
        echo "<div id='tituloPaginas'> Atendimento Psicológico</div>";
        echo "  <p style='font-family: garamond; font-size: 20px;'>";

        echo "<p style='height: 30px;'>&nbsp;</p>";
        echo "<div class='col-xs-12 col-sm-12 col-md-12' style='".$fonteGaramond."; color: #1f226d;'>";
        echo "  <div align='justify'>";
        echo "      <span style='font-size: 20px; '>";
        echo "          Compartilhando o entendimento de que a psicoterapia é promotora da saúde física, emocional e psíquica, a RUV oferece o serviço de atendimento psicoterapêutico através da Rede Social Clínica. O serviço se destina àqueles cuja condição financeira não se adequa aos valores praticados usualmente no mercado. A Rede Social Clínica é formada por psicólogos e terapeutas - membros da RUV - que dispõem de horários específicos para esse atendimento. Na entrevista inicial é acordado o valor do serviço, assim como também são transmitidas as regras do contrato.";
        echo "      </span>";
        echo "  </div>";
        echo "<p style='height: 30px;'>&nbsp;</p>";
        echo "<div id='tituloPaginas'> Atendimento Médico</div>";
        echo "  <p style='font-family: garamond; font-size: 20px;'>";
        echo "<p style='height: 30px;'>&nbsp;</p>";
        echo "<div class='col-xs-12 col-sm-12 col-md-12' style='".$fonteGaramond."; color: #1f226d;'>";
        echo "  <div align='justify'>";
        echo "      <span style='font-size: 20px; '>";
        echo "          A Rede Social Clínica também oferece a possibilidade de atendimento médico clínico pautado na visão holística da saúde. Valorizando os cuidados preventivos cotidianos, a consulta clínica oferecida pela RUV prioriza orientações nutricionais, inclusão de hábitos de vida compatíveis com a saúde  e  prescrição de medicamentos de natureza fitoterápica e homeopática sempre que possível e necessário, sem exclusão de remédios convencionais.";
        echo "      </span>";
        echo "  </div>";
        
        echo "  <div style='height: 50px;'>&nbsp;</div>";
        echo "  <div class='alert alert-info' role='alert'>";
        echo "      <div class='text-center' style='font-family: garamond; font-size: 20px;'>";
        echo "          Contato para marcar entrevista ou para outras informações no telefone (21) 2266-5690";
        echo "      </div>";
        echo "  </div>";
        
        echo "</div>";
        echo "</p>";
    }
    public function textoTranscursoTranspessoal(){
    $fonteGaramond = "font-family: garamond";
    $tamanhoFonte = "font-size: 20px";
    $espacamento = "padding-left: 50px";
        echo "<p style='height: 20px;'>&nbsp;</p>";
        echo "<div class='col-xs-12 col-sm-12 col-md-12'>";
        echo "  <div class='text-center' style='font-family: garamond; color: #1f226d;'>";
        echo "      <span style='".$tamanhoFonte.";'>";
        echo "          apresenta uma teoria autoral que justifica a estruturação e desenvolvimento da<br>";
        echo "          personalidade em consonância com a realidade espiritual<br><br>";
        echo "          mostra a coincidência da saúde mental com a felicidade<br>";
        echo "          apontando caminhos para a autorrealização<br><br>";
        echo "      </span>";
        echo "  </div>";
        echo "</div>";
        echo "<div class='col-xs-12 col-sm-12 col-md-12' style='".$fonteGaramond."; color: #1f226d;'>";
        echo "  <div align='justify'>";
        echo "      <span style='font-size: 20px; '>";
        echo "          Ao longo das últimas décadas venho desenvolvendo uma teoria psicológica decorrente de particular leitura do Sistema Transpessoal, aplicada com mais especificidade no campo da psicoterapia e do desenvolvimento pessoal.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; '>";
        echo "          O empenho desta teoria, em afinidade com a proposta transpessoal, visa a integração entre a psicologia ocidental, mais formal, e a abordagem espiritual desenvolvida pelas Tradições da Sabedoria Antiga. Além de beber nas fontes da psicanálise e da psicologia analítica, que centram seu trabalho terapêutico no modelo clássico da relação terapeuta-paciente, busquei sua complementação no investimento psicológico da introspecção, sustentado por estes sistemas espirituais, ao longo de milênios. Eles promovem o autoconhecimento para além das fronteiras do ego, a partir da especialíssima e diferente relação a dois - a do mestre com o discípulo.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; '>";
        echo "          Os quatro pilares em que se assenta o Transcurso transpessoal são:<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; margin-left: 25px;'>";
        echo "          Psicodinâmica do ego<br/>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; margin-left: 25px;'>";
        echo "          Cosmogênese do ego<br/>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; margin-left: 25px;'>";
        echo "          Ontogênese do ego<br/>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; margin-left: 25px;'>";
        echo "          Roda das estações da vida";
        echo "      </span>";
        echo "          <br><br>";
        echo "      <span style='font-size: 20px; '>";
        echo "          O Transcurso acontece uma vez por mês, às 6ªs. feiras, no horário de 14h às 18h.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; '>";
        echo "          A meditação, por pressuposto, permeia tanto o campo de estudo como o da prática terapêutica.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; '>";
        echo "          Investigar e testar a teoria com a clínica fez gerar uma forma diferenciada de supervisão em grupo, a Transvisão. Sua frequência é também mensal, às 6ªs feiras, de 14h às 16:30h.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; '>";
        echo "          O ingresso no Transcurso é realizado mediante entrevista prévia e está aberto a todo aquele interessado no tema. A Transvisão é acessível apenas aos profissionais que trabalham em campo afim. Contato por e-mail ou por telefone.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; '>";
        echo "          <b>Informações:</b><br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; '>";
        echo "          Focalizador: <b>Luiz Carlos Bernal (<a href='mailto:luiz.bernal@gmail.com' style='text-decoration: none;'>luiz.bernal@gmail.com</a>) - Médico e Psicoterapeuta</b>. Mestre pelo HCTE-UFRJ, com o tema vinculado aos estudos da Consciência.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; '>";
        echo "          Próximo encontro: ver calendário.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; '>";
        echo "          Horário: <b>de 14h às 18h</b>.<br><br>";
        echo "      </span>";
        echo "      <span style='font-size: 20px; '>";
        echo "          Endereço: <a href='contato.php#mapa' target='_self'>sede da RedeUnaViva</a>.<br><br>";
        echo "      </span>";
        echo "  </div>";
        echo "</div>";
    }
    
}
