//validação de formulários


function validaForm(campo){
    
    if(campo.length > 1){
        document.getElementById('ok').style.display = 'block'; 
    }
    
}

function calculaIdade(nascimento){

var dataAtual = new Date();
var anoAtual = dataAtual.getFullYear();
var anoNascParts = nascimento.split('-');
var diaNasc =anoNascParts[2];
var mesNasc =anoNascParts[1];
var anoNasc =anoNascParts[0];
var idade = anoAtual - anoNasc;
var mesAtual = dataAtual.getMonth() + 1; 

//alert("Data Atual: " + dataAtual);
//alert("Ano Atual: " + anoAtual); //2005
//alert("Ano nasc parte: " + anoNascParts);//2005,05,25
//alert("Dia Nascimento: " + diaNasc);//2005
//alert("Mês Nascimento: " + mesNasc);//05
//alert("Ano Nascimento: " + anoNasc);//25
//alert("Idade de acordo com o ano: " + idade);//1990
//alert("Mês atual: " + mesAtual);//08

    if(diaNasc){

        //se mês atual for menor que o nascimento, nao fez aniversario ainda; (26/10/2009) 
        if(mesAtual < mesNasc){
            idade--; 
        }else {
        //se estiver no mes do nasc, verificar o dia
            if(mesAtual === mesNasc){
                if(dataAtual.getDate() < diaNasc ){ 
                //se a data atual for menor que o dia de nascimento ele ainda nao fez aniversario
                    idade--; 
                }
            }
        } 
        document.getElementById("idade").value = idade; //Passo o valor calculado da idade para o campo input hidden
        calculaSetenio(idade);
//        document.getElementById("setenio").value = idade; //Passo o valor calculado da idade para o campo input hidden
//        document.getElementById("idade").innerHTML = idade + " anos";
//        window.location.href = "?menu=perfil&idadeAtual="+idade;
    }   
}

function calculaSetenio(idade){
    if (idade >= 0 && idade <= 6){
        document.getElementById("setenio").value = "1º";
        document.getElementById("codSetenio").value = "1";
    }else if(idade >= 7 && idade <= 13){
        document.getElementById("setenio").value = "2º";
        document.getElementById("codSetenio").value = "2";
    }else if(idade >= 14 && idade <= 20){
        document.getElementById("setenio").value = "3º";
        document.getElementById("codSetenio").value = "3";
    }else if(idade >= 21 && idade <= 27){
        document.getElementById("setenio").value = "4º";
        document.getElementById("codSetenio").value = "4";
    }else if(idade >= 28 && idade <= 34){
        document.getElementById("setenio").value = "5º";
        document.getElementById("codSetenio").value = "5";
    }else if(idade >= 35 && idade <= 41){
        document.getElementById("setenio").value = "6º";
        document.getElementById("codSetenio").value = "6";
    }else if(idade >= 42 && idade <= 48){
        document.getElementById("setenio").value = "7º";
        document.getElementById("codSetenio").value = "7";
    }else if(idade >= 49 && idade <= 55){
        document.getElementById("setenio").value = "8º";
        document.getElementById("codSetenio").value = "8";
    }else if(idade >= 56 && idade <= 62){
        document.getElementById("setenio").value = "9º";
        document.getElementById("codSetenio").value = "9";
    }else if(idade >= 63 && idade <= 69){
        document.getElementById("setenio").value = "10º";
        document.getElementById("codSetenio").value = "10";
    }else if(idade >= 70 && idade <= 76){
        document.getElementById("setenio").value = "11º";
        document.getElementById("codSetenio").value = "11";
    }else if(idade >= 77 && idade <= 83){
        document.getElementById("setenio").value = "12º";
        document.getElementById("codSetenio").value = "12";
    }else if (idade > 83){
        document.getElementById("setenio").value = "";
        document.getElementById("codSetenio").value = "";
    }
}

function ativaSelecaoEstado(){
    document.getElementById("selecionaEstado").style.display="block";
}

function emiteEstadoSelecionado(estado){

    document.getElementByid("estado").value = estado;
    document.getElementById("selecionaEstado").style.display="none";
}

function hora(){
var time=new Date(); 
var hour=time.getHours(); 
var minute=time.getMinutes(); 
var second=time.getSeconds(); 
//var second=time.getSeconds(); 

if(hour<10) 
    hour ="0"+hour; 
if(minute<10) 
    minute="0"+minute; 
if(second<10) 
    second="0"+second; 

    var st=hour+":"+minute+":"+second; 
    document.getElementById("hora").innerHTML=st;
    tempo++;	
    setTimeout("hora()", 1000);
    
} 

function initTimer() { // O metodo nativo setInterval executa uma determinada funcao em um determinado tempo 
    setInterval(showTimer,1000); 
}

function _hora(){	
    var texto = "";
    var segundos = parseInt(tempo % 60);	
    var minutos = parseInt(tempo / 60 % 60);	
    var horas = parseInt((tempo / 3600 % 24) - 3);		// Horas.
    
    if(horas === 0){
        texto += "00";
    }else
    if (horas > 0){
        texto += horas;
//        texto += horas + ((horas == 1) ? ":" : ":");
    }		// Minutos.
    if (minutos >= 0 && minutos < 10){
        texto += ":0" + minutos + ":";
    }else
    if (minutos >= 10){ 
        texto += ":" + minutos; 
//        texto += ":" + minutos + ((minutos == 1) ? ":" : ":"); 
    }		// Segundos.
    if(segundos >= 0 && segundos < 10){
        texto += ":0" + segundos;
    }else if (segundos >= 10){
        texto += ":" + segundos;		// Escrever.	
//        texto += segundos + ((segundos == 1) ? "" : "");		// Escrever.	
    }
    hora.innerHTML = texto;	
    tempo++;	
    setTimeout("_hora()", 1000);
    calculaCalendario();
}


function calculaCalendario(){
    var data = new Date().toLocaleString("UTC",{timeZone:"America/Sao_Paulo"});
    var hoje = data.getDay();
    var dia = data.getDate(); // Pega o dia
    var mes = data.getMonth(); // Pega o mês
    var ano = data.getFullYear(); // Pega o ano
    
    
    meses = new Array(12);
    
    meses[0] = "1";//Janeiro
    meses[1] = "2";//Fevereiro
    meses[2] = "3";//Março
    meses[3] = "4";//Abril
    meses[4] = "5";//Maio
    meses[5] = "6";//Junho
    meses[6] = "7";//Julho
    meses[7] = "8";//Agosto
    meses[8] = "9";//Setembro
    meses[9] = "10";//Outubro
    meses[10] = "11";//Novembro
    meses[11] = "12";//Dezembro
    

    var diaSemana = new Array(7);
    
    diaSemana[0] = "1";//Domingo
    diaSemana[1] = "2";//Segunda
    diaSemana[2] = "3";//Terça
    diaSemana[3] = "4";//Quarta
    diaSemana[4] = "5";//Quinta
    diaSemana[5] = "6";//Sexta
    diaSemana[6] = "7";//Sábado
    
    var diaSemanaExtenso = new Array(7);
    
    diaSemanaExtenso[0] = "Domingo";
    diaSemanaExtenso[1] = "2ª feira";
    diaSemanaExtenso[2] = "3ª feira";
    diaSemanaExtenso[3] = "4ª feira";
    diaSemanaExtenso[4] = "5ª feira";
    diaSemanaExtenso[5] = "6ª feira";
    diaSemanaExtenso[6] = "Sábado";
    
    var estacoesAno = new Array (4);
    
    estacoesAno[0] = "1";//Primavera
    estacoesAno[1] = "2";//Verão
    estacoesAno[2] = "3";//Outono
    estacoesAno[3] = "4";//Inverno
    
    var diasDoAno = (364 - dia)/meses[mes];//No caso, hoje (24/10/2015).
    dataJava.innerHTML = dia + "/" + meses[mes] + "/" + ano + " - " + diaSemanaExtenso[hoje];
    
    ///////////////Lógica para cálculo de estação do ano, considerando 364 dias
    if (diasDoAno >= 1 || diasDoAno < 92){ // Primavera
        estacao.innerHTML = estacoesAno[0];
        if (diasDoAno <= 28){
            mesCalendario.innerHTML = meses[0];
        }else if(diasDoAno > 28 || diasDoAno < 57){
            mesCalendario.innerHTML = meses[1];
        }else if(diasDoAno >= 57 || diasDoAno < 92){
            mesCalendario.innerHTML = meses[2];
        }
    }
    else if(diasDoAno >= 92 || diasDoAno < 183){ // Verão
        estacao.innerHTML = estacoesAno[1];
        if (diasDoAno >= 92 || diasDoAno <= 120){
            mesCalendario.innerHTML = meses[0];
        }
        else if (diasDoAno >= 121 || diasDoAno <= 149){
            mesCalendario.innerHTML = meses[1];
        }
        else if (diasDoAno > 149 || diasDoAno < 183){
            mesCalendario.innerHTML = meses[2];
        }
    }
    else if(diasDoAno >= 183 || diasDoAno < 274){ // Outono
        estacao.innerHTML = estacoesAno[2];
        if (diasDoAno >= 183 || diasDoAno <= 211){
            mesCalendario.innerHTML = meses[0];
        }
        else if (diasDoAno >= 212 || diasDoAno <= 240){
            mesCalendario.innerHTML = meses[1];
        }
        else if (diasDoAno > 240 || diasDoAno < 274){
            mesCalendario.innerHTML = meses[2];
        }
    }
    else if(diasDoAno >= 274 || diasDoAno <= 364){ // Inverno
        estacao.innerHTML = estacoesAno[3];
        if (diasDoAno >= 274 || diasDoAno <= 302){
            mesCalendario.innerHTML = meses[0];
        }
        else if (diasDoAno > 302 || diasDoAno <= 330){
            mesCalendario.innerHTML = meses[1];
        }
        else if (diasDoAno > 330 || diasDoAno < 365){
            mesCalendario.innerHTML = meses[2];
        }
    }
    ////////////////////////////////////////////Fim da lógica de estação do ano
    
    /////////////////////////////////////////////////////Preenchimento da data
    
    
    ////////////////////////////////////////////////////Preenchimento da semana
    
//    semana.innerHTML = pegaSemana;
    
    semana.innerHTML = (diaSemana[hoje]/4)*10;
    
    ///////////////////////////////////////////////////////Preenchimento do mês
    
    
    
    ///////////////////////////////////////////////////////Preenchimento do dia
    
    diasCalendario.innerHTML = diaSemana[hoje];
    
    ///////////////////////////////////////////////////////Preenchimento do ano
    var anoCompleto = ano;
    var anoInicial = 5;
    
    if (diasDoAno > 364){
        anoInicial ++;
    }
    anoCalendario.innerHTML = Math.abs(Math.ceil(anoInicial));
    
    
    
    /////////////////////////////////////////////////////////// controle manual
 
//    var calculoAnoManual = Math.abs(Math.ceil(diasDoAno));
    
    var diasAno = 364 - (meses[mes] * dia); //Quantidade de dias no ano
    var calculoDiasDiferenca = 364 - diasDoAno;
    

//    dataHoje.innerHTML = "Hoje: " + data;
    semanaCalculado.innerHTML = "Semana: " + diaSemana[hoje]; //Semana
    diaHoje.innerHTML = "Dia: " + dia;//Pega data de hoje
    diaCalculado.innerHTML = "Dias do ano (estação): " + Math.abs(Math.ceil(diasDoAno));//Pega os dias // Pega a estação (em 24/10/2015, 34 dias
    mesCalculado.innerHTML = "Mês: " + meses[mes];//Pega Outubro - 10
    anoCalculado.innerHTML = "Ano: " + ano; //Pega o ano
    
    calculoDias.innerHTML = "<b>Cálculo de dias: " + calculoDiasDiferenca + "</b>";
    mesesDias.innerHTML = "Cálculo de meses: " + mes;
    calculoDiasSobra.innerHTML = "Cálculo de dias em sobra: " + diasAno;//139
    
    
    
    // O dia tem 24 horas
    // O mês tem 30 dias
    // O ano tem 12 meses
    
    ///////////////////////////////////////////////////////////////////////////
    

    
    
    
}

function direcionaBonus(link){
//    alert(link);
//    var automatico = document.getElementById("auto").checked;
//    var manual = document.getElementById("manual").checked;
//    
//    if(automatico){
//        alert("Chamou a função automatico");
        window.location.href="inicio.php?m=bonus&t=registros&me="+link;
//    }else if(manual){
////        alert("Chamou a função manual");
//        window.location.href="inicio.php?m=bonus&t=registros&me=manual";
//    }
}

function preenchimento(me, link){
//    alert(link);
    window.location.href="inicio.php?m=bonus&t=registros&me="+me+"&med="+link;
    
}
