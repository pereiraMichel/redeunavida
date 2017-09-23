/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function pegaUsuarioSist(usuario){
    document.getElementById('idSelecionado').value = usuario;
    $('#altera').removeAttr('disabled');
    $('#exclui').removeAttr('disabled');
    $('#detalhes').removeAttr('disabled');
    //window.location.href='inicio.php?m=config&t=usis&e=s&id='+usuario;
}

function pegaIdAltera(id){
	//alert(id);
	window.location.href="inicio.php?m=config&t=usis&f=a&id="+id;
}

function pegaIdExclui(id){
	window.location.href="inicio.php?m=config&t=usis&f=e&id="+id;
}

function pegaParagemPP(paragem){
    document.getElementById('idpp').value = paragem;
    $('#pp1').removeAttr('disabled');
    $('#pp2').removeAttr('disabled');
//                $('#detalhes').removeAttr('disabled');
}

function direcPP(){
    var checkAuto = document.getElementById('checkPP');
    if(checkAuto.checked === true){
        window.location.href='inicio.php?m=pp&t=npp&auto=true';
    }else{
        window.location.href='inicio.php?m=pp&t=npp';
    }
}
function encaminhaPP(){
    var ppSelect = document.getElementById('idpp').value;

    window.location.href="inicio.php?m=pp&t=p1&s="+ppSelect;

}
function encaminhaPP2(){
    var ppSelect = document.getElementById('idpp').value;

    window.location.href="inicio.php?m=pp&t=p2&s="+ppSelect;

}

function verificaCaracteres(valor, input){
    if(valor < 0 || valor > 4){
        document.getElementById('somaDoDia').value = "Valor inválido";
        document.getElementById(input).value = null;
    }

}

function calculaPP1(){
    var mn = parseInt(document.getElementById('mn').value, 10);
    var td = parseInt(document.getElementById('td').value, 10);
    var nn = parseInt(document.getElementById('nn').value, 10);
    var md = parseInt(document.getElementById('md').value, 10);

    var somaTodos = mn + td + nn + md;

    if(somaTodos > 16){
        document.getElementById('somaDoDia').value = "Acima do limite";
    }else{
        document.getElementById('somaDoDia').value = somaTodos;
    }


}

function calculaPP2(){
    var sh = parseFloat(document.getElementById('sh').value, 10); // Não está aceitando as variáveis
    var shcpt = parseFloat(document.getElementById('shcpt').value, 10);
    var corpo = parseFloat(document.getElementById('corpo').value, 10);
    var rtp = parseFloat(document.getElementById('rtp').value, 10);
    var rtpcpt = parseFloat(document.getElementById('rtpcpt').value, 10); // aqui não passa

    var somaTodos = sh + shcpt + corpo + rtp + rtpcpt;
//                alert("Soma: " + somaTodos);

    document.getElementById('somaDoDia').value = somaTodos;

}

function preencheHora(){
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
//                    document.getElementById("hora").innerHTML=st;

        var checkHora = document.getElementById('checkHora');
    if(checkHora.checked === true){
        document.getElementById('horaAuto').value = st;
    }else{
        document.getElementById('horaAuto').value = "";
    }
}

function preencheParagem(valor){
//                alert(valor);
    var check = document.getElementById('checkparagem');

    if(check.checked === false){
        document.getElementById('paragem').value = '';
    }else{
        document.getElementById('paragem').value = valor;
    }

}

function editaPP(selecao){
    $('#btEdita').removeAttr('disabled');
    $('#btExcluir').removeAttr('disabled');
    document.getElementById('ppSelecionado').value=selecao;
}

function pegaPP(){
    var pp = document.getElementById('ppSelecionado').value;
    document.location.href='inicio.php?m=para&t=edit&id='+pp;
}
function pegaPPExcluir(){
    var pp = document.getElementById('ppSelecionado').value;
    document.location.href='inicio.php?m=para&t=exc&id='+pp;
}

function preencheAutoManualPP(){
//                alert("Chamou a função Auto|Manual");

    var auto = document.getElementById('auto');
    var manual = document.getElementById('manual');

    if(auto.checked){
        document.location.href='inicio.php?m=pp&tab=meditacao&t=auto';
    }else if(manual.checked){
        document.location.href='inicio.php?m=pp&tab=meditacao&t=manual';
    }

}

function calculaTempo(){
//    var hora = null;
    var min = null;
    var duracao = document.getElementById('duracao');

    var inicio = document.getElementById('inicio').value;//pega os valores do início, em formato HH:mm
    var termino = document.getElementById('termino').value;//pega os valores do término, em formato HH:mm

    var hora1 = parseInt(inicio.substring(0,2), 10);//pega os valores da hora início
    var min1 = parseInt(inicio.substring(3,5), 10); //pega os valores do min início

    var hora2 = parseInt(termino.substring(0,2), 10); //pega os valores da hora término
    var min2 = parseInt(termino.substring(3,5), 10); //pega os valores do minuto término

    var calculoHora = hora2 - hora1;
    var calculoMinuto = min2 - min1;
    var tempoHora;
    var tempoMin;


    if(calculoHora > 0){
        tempoHora = calculoHora * 60;
        tempoMin = tempoHora + calculoMinuto;
    }else{
        tempoMin = calculoMinuto;
    }

    var diferencaTempo = tempoMin;

    if (hora1 > hora2){
        document.getElementById('erro1').style.display="block";
        document.getElementById('erro2').style.display="none";
    }else{
        document.getElementById('erro1').style.display="none";
    }
    if (min >= 60){
        document.getElementById('erro1').style.display="none";
        document.getElementById('erro2').style.display="block";
    }

    if(calculoMinuto < 1){
        if(calculoMinuto < 0){
            min = parseInt(-min, 10);
        }else if(calculoMinuto === 0){
            min = calculoHora*60;
        }else{
            min = parseInt(min, 10) + min;
        }
    }else{
        min = calculoMinuto;
    }

    if(diferencaTempo === null){
        diferencaTempo = 0;
        duracao.value = diferencaTempo;
    }else{
        duracao.value = diferencaTempo;
    }
//    alert(diferencaTempo);

    //alert(min);
    calculaBonusMeditacao(min);
    conferePeriodo(hora1, min1);
}



function calculaBonusMeditacao(minuto){
    var inputBonus = document.getElementById('bonus');
    var inputDuracao = document.getElementById('duracao');

    if(inputDuracao.value != ""){
        minuto = inputDuracao.value;
    }
    //alert(minuto);// está vindo minuto corretamente.

    if(minuto < 5){
        inputBonus.value = 0;
    }else if(minuto >= 5 && minuto < 20){
        inputBonus.value = 1;
    }else if(minuto >= 20 && minuto < 40){
        inputBonus.value = 2;
    }else if(minuto >= 40 && minuto < 80){
        inputBonus.value = 3;
    }else if(minuto >= 80){
        inputBonus.value = 4;
    }

}

function conferePeriodo(hora, minuto){
    var periodo = document.getElementById('periodo');

    if(hora >= 6 && hora <= 11){
        if(minuto >= 0 || minuto <= 59){
            periodo.value = "Manhã";
        }
    }
    if(hora >= 12 && hora <= 17){
        if(minuto >= 0 || minuto <= 59){
            periodo.value = "Tarde";
        }
    }
    if(hora >= 18 && hora <= 23){
        if(minuto >= 0 || minuto <= 59){
            periodo.value = "Noite";
        }
    }
    if(hora >= 0 && hora <= 5){
        if(minuto >= 0 || minuto <= 59){
            periodo.value = "Madrugada";
        }
    }

}

function confereCheckMeditacao(){
    
    var cInicio = document.getElementById('checkInicio');
    var cTermino = document.getElementById('checkTermino');
    var cData = document.getElementById('checkData');
    var time=new Date();
    
    if(cInicio.checked){
        //Data | Hora
        var hour=time.getHours(); 
        var minute=time.getMinutes();
        if(hour<10){
            hour ="0"+hour; 
        }
        if(minute<10){ 
            minute="0"+minute;
        }
        var st=hour+":"+minute;
        document.getElementById('inicio').value = st;
        
    }else{
        document.getElementById('inicio').value="";
    }
    
    if(cTermino.checked){
        //Data | Hora
        var hour=time.getHours(); 
        var minute=time.getMinutes();
        if(hour<10){
            hour ="0"+hour; 
        }
        if(minute<10){ 
            minute="0"+minute;
        }
        var st=hour+":"+minute;
        document.getElementById('termino').value = st;
        calculaTempo();
        
    }else{
        document.getElementById('termino').value="";
    }

    if(cData.checked){
        //Data | Hora
        var dia = time.getDate();
        var mes = time.getMonth() + 1;
        var ano = time.getFullYear();
        
        if (dia.toString().length === 1){
            dia = "0" + dia;
        }
        if (mes.toString().length === 1){
            mes = "0" + mes;
        }    
            
        var hoje = dia + "/" + mes + "/" + ano;
        document.getElementById('dataHoje').value = hoje;
        
    }else{
//        document.getElementById('dataHoje').placeholder = "DD/MM/AAAA"; //value="";
//        document.getElementById('dataHoje').value="";
        
    }
    
}

function preencheSonho(selecao){
    var valorBonus = document.getElementById('bonusPortais');
    var bonus = 0;
    
    if (valorBonus.value === ""){
        valorBonus.value = 0;
    }
    
    bonus = parseInt(valorBonus.value) + parseInt(selecao);
    valorBonus.value = bonus;
}

function calculaPortal(){
    var sSonho = document.getElementById('sonho').value;
    var vSonho = document.getElementById('valorSonho');
    
    var compSonho = document.getElementById('compSonho').value;
    var vCompSonho = document.getElementById('valorCompSonho');
    
    var corpo = document.getElementById('corpo').value;
    var vCorpo = document.getElementById('valorCorpo');
    
    var retro = document.getElementById('retrospectiva').value;
    var vRetro = document.getElementById('valorRetro');
    
    var compRetro = document.getElementById('compRetrospectiva').value;
    var vCompRetro = document.getElementById('valorCompRetro');
//    var valorBonus = document.getElementById('bonusPortais').value;
//    var bonus;

//    bonus = parseInt(sSonho.value) + parseInt(compSonho.value) + parseInt(corpo.value) + parseInt(retro.value) + parseInt(compRetro.value);

    if(sSonho === ""){
        vSonho.value = 0;
    }else {
        vSonho.value = sSonho;
    }

    if(compSonho === ""){
        vCompSonho.value = 0;
    }else {
        vCompSonho.value = compSonho;
    }

    if(retro === ""){
        vRetro.value = 0;
    }else {
        vRetro.value = retro;
    }

    if(compRetro === ""){
        vCompRetro.value = 0;
    }else{
        vCompRetro.value = compRetro;
    }

    
    if(corpo === "0"){
        vCorpo.value = 0;
    }else if(corpo === "1"){
        vCorpo.value = 0;
    }else if(corpo === "2"){
        vCorpo.value = 0;
    }else if(corpo === "3"){
        vCorpo.value = 1;
    }else if(corpo === "4"){
        vCorpo.value = 2;
    }

    //alert(corpo);

/*
        vSonho.value = sSonho;
        vCompSonho.value = compSonho;
        vCorpo.value = corpo;
        vRetro.value = retro;
        vCompRetro.value = compRetro;


*/  
    valorTotalPortal(vSonho.value, vCompSonho.value, vCorpo.value, vRetro.value, vCompRetro.value);
    
}

function valorTotalPortal(s, vcs, c, r, vcr){
    var valorBonus = document.getElementById('bonusPortais');
    var bonus = 0;

//    alert(vcs); //Está indo normalmente

    
//    if(vcs === "" || c === "" || r === "" || vcr === ""){
//        bonus = s;
//    }else{
//    bonus = parseInt(bonus) + parseInt(s) + parseInt(vcs) + parseInt(corpo) + parseInt(r) + parseInt(vcr); //verificar se recebe string ou int
//    }

    bonus = parseInt(bonus) + parseInt(s) + parseInt(vcs) + parseInt(c) + parseInt(r) + parseInt(vcr);

    valorBonus.value = bonus;
    
}

function mascara(t){
    var mask = "__:__";
    var i = t.value.length;
    var saida = mask.substring(1,0);
    var texto = mask.substring(i)
    
    if (texto.substring(0,1) != saida){
        t.value += texto.substring(0,1);
    }
 }

 function mascaraData(t){
    var mask = "__/__/____";
    var i = t.value.length;
    var saida = mask.substring(1,0);
    var texto = mask.substring(i)
    
    if (texto.substring(0,1) != saida){
        t.value += texto.substring(0,1);
    }
 }

 function mascaraSemana(t){
    var mask = "_-___";
    var i = t.value.length;
    var saida = mask.substring(1,0);
    var texto = mask.substring(i)
    
    if (texto.substring(0,1) != saida){
        t.value += texto.substring(0,1);
    }
 }
 function mascaraDataRuv(t){
    var mask = "_-___._";
    var i = t.value.length;
    var saida = mask.substring(1,0);
    var texto = mask.substring(i)
    
    if (texto.substring(0,1) != saida){
        t.value += texto.substring(0,1);
    }
 }

 function selecionaTipoTelefone(tipo){
//    if(tipo == "1"){
        document.location.href="inicio.php?m=config&t=perftel&tp=" + tipo;
//    }else if(tipo == "2"){
//        document.location.href="inicio.php?m=config&t=perftel&tp="+tipo;
//    }else if(tipo == "3"){
//        document.location.href="inicio.php?m=config&t=perftel&tp=3";
//    }
 }

 function mascaraTelefone(t){
    var mask = "__-____-____";
    var i = t.value.length;
    var saida = mask.substring(1,0);
    var texto = mask.substring(i)
    
    if (texto.substring(0,1) != saida){
        t.value += texto.substring(0,1);
    }
 }

 function mascaraCelular(t){
    var mask = "__-_____-____";
    var i = t.value.length;
    var saida = mask.substring(1,0);
    var texto = mask.substring(i)
    
    if (texto.substring(0,1) != saida){
        t.value += texto.substring(0,1);
    }
 }

function preencheBonusPortal(selecao){
    var valorBonus = document.getElementById('bonusPortais');
    var bonus = 0;
    
    if (valorBonus.value === ""){
        valorBonus.value = 0;
    }
    
    bonus = parseInt(valorBonus.value) + parseInt(selecao);
    valorBonus.value = bonus;
    
}

function calculaBonusPortal(selecao){
//    alert(selecao);
    var bonusCorpo = document.getElementById('bonusPortais');
    var totalBonusCorpo;
    
    if(selecao === "1"){
        bonusCorpo.value = "0";
        totalBonusCorpo = parseInt(bonusCorpo.value) + 0;
    }
    else if(selecao === "2"){
        bonusCorpo.value = "0";
        totalBonusCorpo = parseInt(bonusCorpo.value) + 0;
    }
    else if(selecao === "3"){
        bonusCorpo.value = "1";
        totalBonusCorpo = parseInt(bonusCorpo.value) + 1;
    }
    else if(selecao === "4"){
        bonusCorpo.value = "2";
        totalBonusCorpo = parseInt(bonusCorpo.value) + 2;
    }
    else if(selecao === ""){
        bonusCorpo.value = "0";
        totalBonusCorpo = parseInt(bonusCorpo.value) + 0;
    }
    
}

function confereCheckPortais(){

    var cData = document.getElementById('checkData');
    var time=new Date();
    
    if(cData.checked){
        //Data | Hora
        var dia = time.getDate();
        var mes = time.getMonth() + 1;
        var ano = time.getFullYear();
        
        if (dia.toString().length === 1){
            dia = "0" + dia;
        }
        if (mes.toString().length === 1){
            mes = "0" + mes;
        }    
            
        var hoje = dia + "/" + mes + "/" + ano;
        document.getElementById('dataPortalHoje').value = hoje;
        
    }else{
        document.getElementById('dataPortalHoje').value="";
        
    }

}

function selecionaPPBonus(semana, pp){
    if(semana !== "todos"){
        window.location.href='inicio.php?m=pp&tab=bonus&p='+pp+'&sem='+semana;
    }else{
        window.location.href='inicio.php?m=pp&tab=bonus';
    }
}

function selecionaPortalBonus(semana, pp){
    if(semana !== "todos"){
        window.location.href='inicio.php?m=port&tab=bonus&p='+pp+'&sem='+semana;
    }else{
        window.location.href='inicio.php?m=port&tab=bonus';
    }
}
function selecionaTarefaBonus(semana, pp){
    if(semana !== "todos"){
        window.location.href='inicio.php?m=taref&tab=bonus&p='+pp+'&sem='+semana;
    }else{
        window.location.href='inicio.php?m=taref&tab=bonus';
    }
}

function selecionaPresParagemBonus(semana, pp){
    if(semana !== "todos"){
        window.location.href='inicio.php?m=para&tab=bonus&p='+pp+'&sem='+semana;
    }else{
        window.location.href='inicio.php?m=para&tab=bonus';
    }
}

function selecionaServExtras(semana, pp){
    if(semana !== "todos"){
        window.location.href='inicio.php?m=serv&tab=bonus&p='+pp+'&sem='+semana;
    }else{
        window.location.href='inicio.php?m=serv&tab=bonus';
    }
}

function preencheAutoManualPortal(){
    var auto = document.getElementById('auto');
    var manual = document.getElementById('manual');

    if(auto.checked){
        document.location.href='inicio.php?m=port&tab=portal&t=auto';
    }else if(manual.checked){
        document.location.href='inicio.php?m=port&tab=portal&t=manual';
    }
    
}

function preencheDataRuv(campo, id, classe){


    var semanaRuv = document.getElementById('semana');
    var semanaMed = document.getElementById('semanaRuvMed');
    var diaRuvCampo = document.getElementById('dia');
    var dataRuv = document.getElementById('dataRuv');

//dataRuvPort    var novoMesRuv = null;

    var diaRuv = null;
    var mesRuv = null;
    var anoRuv = null;
    var estacao = null;
    var semana = null;
    var novoAno = null;

//    anoRuv = campo.substring(0, 1); // Ano correto
//    mesRuv = campo.substring(3, 4); // Mês correto
//    diaRuv = campo.substring(6, 7); // Dia correto
//    estacao = campo.substring(2, 3); // Estação correto
//    semana = campo.substring(4, 5); // Semana correta


    if(id === "dataRuv"){

        anoRuv = campo.substring(0, 1); // Ano correto
        mesRuv = campo.substring(3, 4); // Mês correto
        diaRuv = campo.substring(6, 7); // Dia correto
        estacao = campo.substring(2, 3); // Estação correto
        semana = campo.substring(4, 5); // Semana correta

        if (classe === "meditacao"){
            semanaMed.value = anoRuv + "-" + estacao + mesRuv + semana;
        }else if(classe === "portal"){
            semanaRuv.value =  anoRuv + "-" + estacao + mesRuv + semana;
        }else if(classe === "tarefas"){
            semanaRuv.value =  anoRuv + "-" + estacao + mesRuv + semana;
        }else if(classe === "servicos"){
            semanaRuv.value =  anoRuv + "-" + estacao + mesRuv + semana;
        }

        //semanaRuv.value = anoRuv + "-" + estacao + mesRuv + semana;
        diaRuvCampo.value = diaRuv;

    }else if(id === "dia"){

        anoRuv = dataRuv.value.substring(0, 1); // Ano correto
        mesRuv = dataRuv.value.substring(3, 4); // Mês correto
        estacao = dataRuv.value.substring(2, 3); // Estação correto
        semana = dataRuv.value.substring(4, 5); // Semana correta
        //alert(anoRuv);
        dataRuv.value = anoRuv + "-" + estacao + mesRuv + semana + "." + diaRuvCampo.value;

    }else if(id === "semana"){

        anoRuv = campo.substring(0, 1); // Ano correto
        mesRuv = campo.substring(3, 4); // Mês correto
        estacao = campo.substring(2, 3); //Estação correta
        semana = campo.substring(4, 5); // Semana correta

        dataRuv.value = anoRuv + "-" + estacao + mesRuv + semana + "." + diaRuvCampo.value;

    }

//    var mesReal = null;
    /*
    if(id === "dataRuv"){
//        alert("É dataRuv"); //Funciona perfeitamente

        anoRuv = campo.substring(9, 10);
        mesRuv = campo.substring(4, 5);
        diaRuv = campo.substring(1, 2);

        var dataPreenchida = campo.split("/"); //dataRuv.value;

        var diasemana = new Date(dataPreenchida[0], dataPreenchida[1], dataPreenchida[2]);//.toString()


        var diaData = diasemana.getDay();

//        alert(diaData);

        var semanaReal = new Array(7);
            semanaReal[0] = "1";
            semanaReal[1] = "2"; 
            semanaReal[2] = "3"; 
            semanaReal[3] = "4"; 
            semanaReal[4] = "5"; 
            semanaReal[5] = "6"; 
            semanaReal[6] = "7";

//        alert(semanaReal[diaData]);

        estacao = semanaRuv.value.substring(2, 3);
        semana = semanaRuv.value.substring(4, 5);

        novoAno = parseInt(anoRuv) - 1;

        if(mesRuv >= 1 && mesRuv <=3){
            if(mesRuv == 1){
                novoMesRuv = 1;
            }else if(mesRuv == 2){
                novoMesRuv = 2;
            }else if(mesRuv == 3){
                novoMesRuv = 3;
            }
        }else if(mesRuv >= 4 && mesRuv <= 6){
            if(mesRuv == 4){
                novoMesRuv = 1;

            }else if(mesRuv == 5){
                novoMesRuv = 2;

            }else if(mesRuv == 6){
                novoMesRuv = 3;

            }
        }else if(mesRuv >= 7 && mesRuv <= 9){
            if(mesRuv == 7){
                novoMesRuv = 1;
            }else if(mesRuv == 8){
                novoMesRuv = 2;
            }else if(mesRuv == 9){
                novoMesRuv = 3;
            }
        }else if(mesRuv >= 10 && mesRuv <= 12){
            if(mesRuv == 10){
                novoMesRuv = 1;
            }else if(mesRuv == 11){
                novoMesRuv = 2;
            }else if(mesRuv == 12){
                novoMesRuv = 3;
            }
        }

        //alert(novoMesRuv);

        diaRuvCampo.value = semanaReal[diaData];
        semanaRuv.value = novoAno + "-" + estacao + novoMesRuv + semana;

//Ok. Preenchido corretamente.
    }else if(id === "semana"){

        var time = new Date();

        var mes = time.getMonth() + 1;

        mesRuv = campo.substring(3, 4);
        anoRuv = campo.substring(0, 1);


        if(mes >= 1 && mes <=3){
            if(mesRuv == 1){
                novoMesRuv = 1;
            }else if(mesRuv == 2){
                novoMesRuv = 2;
            }else if(mesRuv == 3){
                novoMesRuv = 3;
            }
        }else if(mes >= 4 && mes <= 6){
            if(mesRuv == 1){
                novoMesRuv = 4;

            }else if(mesRuv == 2){
                novoMesRuv = 5;

            }else if(mesRuv == 3){
                novoMesRuv = 6;

            }
        }else if(mes >= 7 && mes <= 9){
            if(mesRuv == 1){
                novoMesRuv = 7;
            }else if(mesRuv == 2){
                novoMesRuv = 8;
            }else if(mesRuv == 3){
                novoMesRuv = 9;
            }
        }else if(mesRuv >= 10 && mesRuv <= 12){
            if(mesRuv == 1){
                novoMesRuv = 10;
            }else if(mesRuv == 2){
                novoMesRuv = 11;
            }else if(mesRuv == 3){
                novoMesRuv = 12;
            }
        }

//        alert("Passou pelo mês");

        dataRuvDia = dataRuv.value;

        diaRuvNovo = dataRuvDia.substring(0, 2);

        novoAno = parseInt(anoRuv) + 1;

        if(novoMesRuv.length > 1){
            if(diaRuvNovo.length > 1){
                dataRuv.value = diaRuvNovo + "/" + novoMesRuv + "/201" + novoAno;
            }else{
                dataRuv.value = "0" + diaRuvNovo + "/" + novoMesRuv + "/201" + novoAno;
            }
        }else{
            if(diaRuvNovo.length > 1){
                dataRuv.value = diaRuvNovo + "/0" + novoMesRuv + "/201" + novoAno;
            }else{
                dataRuv.value = "0" + diaRuvNovo + "/0" + novoMesRuv + "/201" + novoAno;

            }
        }


    }else if(id === "dia"){

        mesRuv = dataRuv.value.substring(4, 5); //Correto
        anoRuv = dataRuv.value.substring(9, 10);//Correto
        diaRuv = campo;

        var mudaCampo = parseInt(diaRuv) + 8;

        if (mudaCampo.length > 1 || mesRuv.length > 1){
            dataRuv.value = mudaCampo + "/" + mesRuv + "/201" + anoRuv;
        }else{
            dataRuv.value = "0" + mudaCampo + "/0" + mesRuv + "/201" + anoRuv;
        }

    }*/


/*

    var mesRuv = semanaRuv.substring(3, 4);
    var anoRuv = semanaRuv.substring(0, 1);

    dataRuv = "0" + diaRuv + "/0" + mesRuv + "/201" + anoRuv; */
}

    function preencheAutoManualTarefas(){
        //alert("Chamou a função");
        var auto = document.getElementById('auto');
        var manual = document.getElementById('manual');

        if(auto.checked){
            document.location.href='inicio.php?m=taref&t=auto';
        }else if(manual.checked){
            document.location.href='inicio.php?m=taref&t=manual';
        }

    }

    function validaServicos(servidor, valor){

        var link = null;

        if(valor == "focalizacao"){
            link = "focal";
        }else if(valor == "presenca"){
            link = "pres";
        }

/*        var url = null;
        url = window.location;

        url = url.toString();
        url = url.split("#");

        var link = "inicio." + url[1];*/

        if(valor === "focalizacao"){
            document.location.href = servidor + "&tipo=" + link;
//            document.location.href= "inicio." + url[1] + "&tipo=focal";
        }else if(valor === "presenca"){
            document.location.href = servidor + "&tipo=" + link;
        }

    }

    function calculaBonusTarefa(valor){
        //alert(valor);
        var campoBonus = document.getElementById('bonus');

        if(valor === "Sim"){
            campoBonus.value = 3;
        }else{
            campoBonus.value = 0;
        }
    }
    function calculaBonusServ(valor){
        //alert(valor);
        var campoBonus = document.getElementById('bonusServ');

        if(valor === "Sim"){
            campoBonus.value = 3;
        }else{
            campoBonus.value = 0;
        }

        if(valor === "Individual"){
            campoBonus.value = 0;
        }else{
            campoBonus.value = 0;
        }
    }

    function directRelServExtras(link){
        window.location.href="inicio.php?m=rela&t=serv&tipo="+link;
    }


    function direcionaPesquisa(){

    var meditacao = document.getElementById('med');
    var portal = document.getElementById('por');
    var parpres = document.getElementById('prp');
    var tarefa = document.getElementById('tar');
    var servicos = document.getElementById('ser');

        if(meditacao.checked){
            document.location.href='inicio.php?m=pesq&p=med';
        }else if(portal.checked){
            document.location.href='inicio.php?m=pesq&p=por';
        }else if(parpres.checked){
            document.location.href='inicio.php?m=pesq&p=prp';
        }else if(tarefa.checked){
            document.location.href='inicio.php?m=pesq&p=tar';
        }else if(servicos.checked){
            document.location.href='inicio.php?m=pesq&p=ser';
        }

;
    }

    function enterTab(inputId, evento){

        evento = evento || window.event;

        var key = evento.keyCode || evento.which;

        if(key == '13'){
            document.getElementById(inputId).focus();
            document.getElementById(inputId).select();
        }

    }

    function somenteNumeros(input){
        var er = /[^0-9-/:.]/;
        er.lastIndex = 0;
        var campo = input;
        if(er.test(campo.value)){
            campo.value = "";
        }
    }

    function enviaForm(form){
        //alert(form);
 
        if(form == "formMeditacao"){
            if(confereMeditacao()){
                document.getElementById(form).submit();
            }
        }else if(form == "formPortal"){
            if(conferePortal()){
                //alert(form);
                document.getElementById(form).submit();
            }
        }else if(form == "formParPres"){
            if(confereParPres()){
                document.getElementById(form).submit();
            }
        }else if(form == "formTarefas"){
            if(confereTarefas()){
                document.getElementById(form).submit();
            }
        }else if(form == "formServExtras"){
            if(confereServ()){
                //alert(form);
                document.getElementById(form).submit();
            }
        }else if(form == "formTrocaSenha"){
            if(confereTrocaSenha()){
                document.getElementById(form).submit();
            }
        }else if(form == "formPerfilEnd"){
            if(confereEndereco()){
                document.getElementById(form).submit();
            }
        }else if(form == "formPerfil"){
            if(conferePerfil()){
                document.getElementById(form).submit();
//            }else{
//                alert("Houve um problema.");
            }
        }else if(form == "novoUsuario"){
            if(confereUsuario()){
                document.getElementById(form).submit();
//            }else{
//                alert("Houve um problema.");
            }
        }else if(form == "formAlteraUsuario"){
            if(confereUsuario()){
                document.getElementById(form).submit();
            }else{
                alert("Houve um problema.");
            }
        }else if(form == "formConfigBonus"){
//            alert("Está no formConfigBonus");
            if(confereConfigBonus()){
                document.getElementById(form).submit();
            }else{
                alert("Houve um problema.");
            }
        }else if(form == "formGrupos"){
            if(confereGrupos()){
                document.getElementById(form).submit();
            }
        }else if(form == "form_adesao"){
            if(confereAdesao()){
                document.getElementById(form).submit();
            }
        }else if(form == "formRelatorio"){
            if(confereRelIndice()){
                alert("O retorno foi true");
                //document.getElementById(form).submit();
            }
        }

    }

    function confereRelIndice(){
        var carregando = document.getElementById("carregaRuv").style;

        carregando.display = 'block';

        return false;

    }

    function confereAdesao(){
        var error1 = document.getElementById("error1").style;
        var error2 = document.getElementById("error2").style;
        var error3 = document.getElementById("error3").style;
        var error4 = document.getElementById("error4").style;
        var error5 = document.getElementById("error5").style;
        var error6 = document.getElementById("error6").style;
        var error7 = document.getElementById("error7").style;
        var error8 = document.getElementById("error8").style;
        var error9 = document.getElementById("error9").style;
        var error10 = document.getElementById("error10").style;

        var nome = document.getElementById('nome');
        var dataNascimento = document.getElementById('calendario');
        var estadoCivil = document.getElementById('estadoCivil');
        var profissao = document.getElementById('profissao');
        var endereco = document.getElementById('enderecoAdesao');
        var telefone = document.getElementById('telefone');
        var email = document.getElementById('email');
        var dataCadastro = document.getElementById('dataCadastro');
        var resumo = document.getElementById('resumo');
        var motivacao = document.getElementById('motivacao');

            if(nome.value == ""){
                nome.focus();
                nome.select();
                error1.display = "block";
                error2.display = "none";
                error3.display = "none";
                error4.display = "none";
                error5.display = "none";
                error6.display = "none";
                error7.display = "none";
                error8.display = "none";
                error9.display = "none";
                error10.display = "none";
                return false;
            }else if(dataNascimento.value == ""){
                dataNascimento.focus();
                dataNascimento.select();
                error1.display = "none";
                error2.display = "block";
                error3.display = "none";
                error4.display = "none";
                error5.display = "none";
                error6.display = "none";
                error7.display = "none";
                error8.display = "none";
                error9.display = "none";
                error10.display = "none";
                return false;
            }else if(estadoCivil.value == ""){
                estadoCivil.focus();
                estadoCivil.select();
                error1.display = "none";
                error2.display = "none";
                error3.display = "block";
                error4.display = "none";
                error5.display = "none";
                error6.display = "none";
                error7.display = "none";
                error8.display = "none";
                error9.display = "none";
                error10.display = "none";
                return false;
            }else if(profissao.value == ""){
                profissao.focus();
                profissao.select();
                error1.display = "none";
                error2.display = "none";
                error3.display = "none";
                error4.display = "block";
                error5.display = "none";
                error6.display = "none";
                error7.display = "none";
                error8.display = "none";
                error9.display = "none";
                error10.display = "none";
                return false;
            }else if(endereco.value == ""){
                endereco.focus();
                endereco.select();
                error1.display = "none";
                error2.display = "none";
                error3.display = "none";
                error4.display = "none";
                error5.display = "block";
                error6.display = "none";
                error7.display = "none";
                error8.display = "none";
                error9.display = "none";
                error10.display = "none";
                return false;
            }else if(telefone.value == ""){
                telefone.focus();
                telefone.select();
                error1.display = "none";
                error2.display = "none";
                error3.display = "none";
                error4.display = "none";
                error5.display = "none";
                error6.display = "block";
                error7.display = "none";
                error8.display = "none";
                error9.display = "none";
                error10.display = "none";
                return false;
            }else if(email.value == ""){
                email.focus();
                email.select();
                error1.display = "none";
                error2.display = "none";
                error3.display = "none";
                error4.display = "none";
                error5.display = "none";
                error6.display = "none";
                error7.display = "block";
                error8.display = "none";
                error9.display = "none";
                error10.display = "none";
                return false;
            }else if(dataCadastro.value == ""){
                dataCadastro.focus();
                dataCadastro.select();
                error1.display = "none";
                error2.display = "none";
                error3.display = "none";
                error4.display = "none";
                error5.display = "none";
                error6.display = "none";
                error7.display = "none";
                error8.display = "block";
                error9.display = "none";
                error10.display = "none";
                return false;
            }else if(resumo.value == ""){
                resumo.focus();
                resumo.select();
                error1.display = "none";
                error2.display = "none";
                error3.display = "none";
                error4.display = "none";
                error5.display = "none";
                error6.display = "none";
                error7.display = "none";
                error8.display = "none";
                error9.display = "block";
                error10.display = "none";
                return false;
            }else if(motivacao.checked == false){
                motivacao.focus();
                motivacao.select();
                error1.display = "none";
                error2.display = "none";
                error3.display = "none";
                error4.display = "none";
                error5.display = "none";
                error6.display = "none";
                error7.display = "none";
                error8.display = "none";
                error9.display = "none";
                error10.display = "block";
                return false;
            }
            return true;
    }

    function confereGrupos(){
        return true;
    }
    function confereConfigBonus(){
        return true;
    }

    function confereUsuario(){
        var email = document.getElementById('email');

        return true;
    }

    function conferePerfil(){
        var email = document.getElementById('email');
        var dataNascimetno = document.getElementById('dataNascimento');
        var descricao = document.getElementById('descricao');

        return true;
    }
    function confereEndereco(){
        var endereco = document.getElementById('endereco');
        var complemento = document.getElementById('complemento');
        var bairro = document.getElementById('bairro');
        var cidade = document.getElementById('cidade');
        var estado = document.getElementById('estado');

        return true;
    }

    function confereTrocaSenha(){
        var senhaAntiga = document.getElementById('senhaantiga');
        var senhaNova = document.getElementById('senhanova');

        if(senhaAntiga.value == ""){
            senhaAntiga.focus();
            senhaAntiga.select();
            return false;
        }

        if(senhaNova.value == ""){
            senhaNova.focus();
            senhaNova.select();
            return false;
        }

        return true;

    }

    function confereMeditacao(){

        var error1 = document.getElementById('erro1').style;
        var error2 = document.getElementById('erro2').style;
        var error3 = document.getElementById('erro3').style;
        var error4 = document.getElementById('erro4').style;
        var error5 = document.getElementById('erro5').style;
        var error6 = document.getElementById('erro6').style;
        var error7 = document.getElementById('erro7').style;
        var error8 = document.getElementById('erro8').style;
        var error9 = document.getElementById('erro9').style;
        var error10 = document.getElementById('erro10').style;

        var cal = document.getElementById('calendario');
        var dataRuv = document.getElementById('dataRuv');
        var semanaRuv = document.getElementById('semanaRuvMed');
        var diaRuv = document.getElementById('dia');
        var inicio = document.getElementById('inicio');
        var termino = document.getElementById('termino');
        var duracao = document.getElementById('duracao');
        var nivel = document.getElementById('nivel');
        var bonus = document.getElementById('bonus');
        var periodo = document.getElementById('periodo');

        if(cal.value == ""){
            error1.display = "block";
            error2.display = "none";
            error3.display = "none";
            error4.display = "none";
            error5.display = "none";
            error6.display = "none";
            error7.display = "none";
            error8.display = "none";
            error9.display = "none";
            error10.display = "none";

            cal.focus();
            cal.select();
            return false;
        }

        if(dataRuv.value == ""){
            error1.display = "none";
            error2.display = "none";
            error3.display = "none";
            error4.display = "none";
            error5.display = "none";
            error6.display = "none";
            error7.display = "none";
            error8.display = "none";
            error9.display = "none";
            error10.display = "block";

            dataRuv.focus();
            dataRuv.select();
            return false;
        }

        if(semanaRuv.value == ""){
            error1.display = "none";
            error2.display = "none";
            error3.display = "none";
            error4.display = "none";
            error5.display = "none";
            error6.display = "none";
            error7.display = "none";
            error8.display = "block";
            error9.display = "none";
            error10.display = "none";

            semanaRuv.focus();
            semanaRuv.select();
            return false;
        }

        if(diaRuv.value == ""){
            error1.display = "none";
            error2.display = "none";
            error3.display = "none";
            error4.display = "none";
            error5.display = "none";
            error6.display = "none";
            error7.display = "none";
            error8.display = "none";
            error9.display = "block";
            error10.display = "none";


            diaRuv.focus();
            diaRuv.select();
            return false;
        }

        if(inicio.value === ""){
            error1.display = "none";
            error2.display = "block";
            error3.display = "none";
            error4.display = "none";
            error5.display = "none";
            error6.display = "none";
            error7.display = "none";
            error8.display = "none";
            error9.display = "none";
            error10.display = "none";

            inicio.focus();
            inicio.select();
            return false;
        }
        if(termino.value === ""){
            error1.display = "none";
            error2.display = "none";
            error3.display = "block";
            error4.display = "none";
            error5.display = "none";
            error6.display = "none";
            error7.display = "none";
            error8.display = "none";
            error9.display = "none";
            error10.display = "none";

            termino.focus();
            termino.select();
            return false;
        }
        if(duracao.value === ""){
            error1.display = "none";
            error2.display = "none";
            error3.display = "none";
            error4.display = "block";
            error5.display = "none";
            error6.display = "none";
            error7.display = "none";
            error8.display = "none";
            error9.display = "none";
            error10.display = "none";

            duracao.focus();
            duracao.select();
            return false;
        }
        if(nivel.value === ""){
            error1.display = "none";
            error2.display = "none";
            error3.display = "none";
            error4.display = "none";
            error5.display = "block";
            error6.display = "none";
            error7.display = "none";
            error8.display = "none";
            error9.display = "none";
            error10.display = "none";

            nivel.focus();
            nivel.select();
            return false;
        }
        if(bonus.value === ""){
            error1.display = "none";
            error2.display = "none";
            error3.display = "none";
            error4.display = "none";
            error5.display = "none";
            error6.display = "block";
            error7.display = "none";
            error8.display = "none";
            error9.display = "none";
            error10.display = "none";

            bonus.focus();
            bonus.select();
            return false;
        }
        if(periodo.value === ""){
            error1.display = "none";
            error2.display = "none";
            error3.display = "none";
            error4.display = "none";
            error5.display = "none";
            error6.display = "none";
            error7.display = "block";
            error8.display = "none";
            error9.display = "none";
            error10.display = "none";

            periodo.focus();
            periodo.select();
            return false;
        }
//            alert("Passou pelos campos. retorno true");

        return true;

    }

    function conferePortal(){
        var error1 = document.getElementById('erro1').style;
        var error2 = document.getElementById('erro2').style;
        var error3 = document.getElementById('erro3').style;
        var error4 = document.getElementById('erro4').style;
        var error5 = document.getElementById('erro5').style;
        var error6 = document.getElementById('erro6').style;
        var error7 = document.getElementById('erro7').style;
        var error8 = document.getElementById('erro8').style;
        var error9 = document.getElementById('erro9').style;
        var error10 = document.getElementById('erro10').style;

        var cal = document.getElementById('calendario');
        var dataRuv = document.getElementById('dataRuv');
        var semanaRuv = document.getElementById('semana');
        var diaRuv = document.getElementById('dia');

        var sonho = document.getElementById('sonho');
        var compSonho = document.getElementById('compSonho');
        var corpo = document.getElementById('corpo');
        var retro = document.getElementById('retrospectiva');
        var compRetro = document.getElementById('compRetrospectiva');
        var bonus = document.getElementById('bonusPortais');

        if(cal.value == ""){
            error1.display = "block";
            error2.display = "none";
            error3.display = "none";
            error4.display = "none";
            error5.display = "none";
            error6.display = "none";
            error7.display = "none";
            error8.display = "none";
            error9.display = "none";
            error10.display = "none";

            cal.focus();
            cal.select();
            return false;
        }

        if(dataRuv.value == ""){
//            alert("Está na data ruv");
            error1.display = "none";
            error2.display = "block";
            error3.display = "none";
            error4.display = "none";
            error5.display = "none";
            error6.display = "none";
            error7.display = "none";
            error8.display = "none";
            error9.display = "none";
            error10.display = "none";

            dataRuv.focus();
            dataRuv.select();
            return false;
        }

        if(semanaRuv.value == ""){
            error1.display = "none";
            error2.display = "none";
            error3.display = "block";
            error4.display = "none";
            error5.display = "none";
            error6.display = "none";
            error7.display = "none";
            error8.display = "none";
            error9.display = "none";
            error10.display = "none";

            semanaRuv.focus();
            semanaRuv.select();
            return false;
        }

        if(diaRuv.value == ""){
            error1.display = "none";
            error2.display = "none";
            error3.display = "none";
            error4.display = "block";
            error5.display = "none";
            error6.display = "none";
            error7.display = "none";
            error8.display = "none";
            error9.display = "none";
            error10.display = "none";

            diaRuv.focus();
            diaRuv.select();
            return false;
        }

        if(sonho.value == ""){
            //alert(sonho.value);
            error1.display = "none";
            error2.display = "none";
            error3.display = "none";
            error4.display = "none";
            error5.display = "block";
            error6.display = "none";
            error7.display = "none";
            error8.display = "none";
            error9.display = "none";
            error10.display = "none";

            sonho.focus();
            sonho.select();
            return false;
        }
        if(compSonho.value == ""){
            error1.display = "none";
            error2.display = "none";
            error3.display = "none";
            error4.display = "none";
            error5.display = "none";
            error6.display = "block";
            error7.display = "none";
            error8.display = "none";
            error9.display = "none";
            error10.display = "none";

            compSonho.focus();
            compSonho.select();
            return false;
        }
        if(corpo.value == ""){
            error1.display = "none";
            error2.display = "none";
            error3.display = "none";
            error4.display = "none";
            error5.display = "none";
            error6.display = "none";
            error7.display = "block";
            error8.display = "none";
            error9.display = "none";
            error10.display = "none";

            corpo.focus();
            corpo.select();
            return false;
        }
        if(retro.value == ""){
            error1.display = "none";
            error2.display = "none";
            error3.display = "none";
            error4.display = "none";
            error5.display = "none";
            error6.display = "none";
            error7.display = "none";
            error8.display = "block";
            error9.display = "none";
            error10.display = "none";

            retro.focus();
            retro.select();
            return false;
        }
        if(compRetro.value == ""){
            error1.display = "none";
            error2.display = "none";
            error3.display = "none";
            error4.display = "none";
            error5.display = "none";
            error6.display = "none";
            error7.display = "none";
            error8.display = "none";
            error9.display = "block";
            error10.display = "none";

            compRetro.focus();
            compRetro.select();
            return false;
        }
        if(bonus.value == ""){
            error1.display = "none";
            error2.display = "none";
            error3.display = "none";
            error4.display = "none";
            error5.display = "none";
            error6.display = "none";
            error7.display = "none";
            error8.display = "none";
            error9.display = "none";
            error10.display = "block";

            compRetro.focus();
            compRetro.select();
            return false;

        }

        return true;

    }

    function confereParPres(){
        var cal = document.getElementById('calendario');
        var dataRuv = document.getElementById('dataRuv');
        var semanaRuv = document.getElementById('semana');
        var diaRuv = document.getElementById('dia');

        var tarefas = document.getElementById('tarefas');
        var opcao = document.getElementById('opcao');
        var bonus = document.getElementById('bonus');

        if(cal.value == ""){
            cal.focus();
            cal.select();
            return false;
        }

        if(dataRuv.value == ""){
            dataRuv.focus();
            dataRuv.select();
            return false;
        }

        if(semanaRuv.value == ""){
            semanaRuv.focus();
            semanaRuv.select();
            return false;
        }

        if(diaRuv.value == ""){
            diaRuv.focus();
            diaRuv.select();
            return false;
        }

        if (tarefas.value == ""){
            tarefas.focus();
            tarefas.select();
            return false;
        }

        if (opcao.checked == false){
            opcao.focus();
            opcao.select();
            return false;
        }

        if (bonus.value == ""){
            opcao.focus();
            opcao.select();
            return false;
        }

//        alert(opcao.value);
        return true;
    }

    function confereTarefas(){

        var erro1 = document.getElementById('erro1').style;
        var erro2 = document.getElementById('erro2').style;
        var erro3 = document.getElementById('erro3').style;
        var erro4 = document.getElementById('erro4').style;
        var erro5 = document.getElementById('erro5').style;
        var erro6 = document.getElementById('erro6').style;

        //alert("Chegou ao form tarefas");
        var dataHoje = document.getElementById('calendario');
        var dataRuv = document.getElementById('dataRuv');
        var semanaRuv = document.getElementById('semana');
//        var diaRuv = document.getElementById('dia');

        var descricao = document.getElementById('descricaoTarefas');
        var status = document.getElementById('status');
        var bonus = document.getElementById('bonus');

//        alert("Estou na conferência");

        if(dataHoje.value == ""){
            erro1.display = 'block';
            erro2.display = 'none';
            erro3.display = 'none';
            erro4.display = 'none';
            erro5.display = 'none';
            erro6.display = 'none';

            dataHoje.focus();
            dataHoje.select();
            return false;
        }

        if(dataRuv.value == ""){
            erro1.display = 'none';
            erro2.display = 'block';
            erro3.display = 'none';
            erro4.display = 'none';
            erro5.display = 'none';
            erro6.display = 'none';

            dataRuv.focus();
            dataRuv.select();
            return false;
        }

        if(semanaRuv.value == ""){
            erro1.display = 'none';
            erro2.display = 'none';
            erro3.display = 'block';
            erro4.display = 'none';
            erro5.display = 'none';
            erro6.display = 'none';

            semanaRuv.focus();
            semanaRuv.select();
            return false;
        }

        if(descricao.value === ""){
            erro1.display = 'none';
            erro2.display = 'none';
            erro3.display = 'none';
            erro4.display = 'block';
            erro5.display = 'none';
            erro6.display = 'none';

            descricao.focus();
            descricao.select();
            return false;
        }

        if(status.checked == false){
            erro1.display = 'none';
            erro2.display = 'none';
            erro3.display = 'none';
            erro4.display = 'none';
            erro5.display = 'block';
            erro6.display = 'none';

            status.focus();
            status.select();
            return false;
        }
        
        if(bonus.value === ""){
            erro1.display = 'none';
            erro2.display = 'none';
            erro3.display = 'none';
            erro4.display = 'none';
            erro5.display = 'none';
            erro6.display = 'block';

            status.focus();
            status.select();
            return false;
        }
        return true;
    }

    function confereServ(){

//        alert("Chegou no confere Serviços");

        var erro1 = document.getElementById('erro1').style;
//        alert("Erro1 localizado");
        var erro2 = document.getElementById('erro2').style;
//        alert("Erro 2 localizado");
        var erro3 = document.getElementById('erro3').style;
//        alert("Erro 3 localizado");
        var erro4 = document.getElementById('erro4').style;
//        alert("Erro 4 localizado");
        var erro5 = document.getElementById('erro5').style;
//        alert("Erro 5 localizado");
        var erro6 = document.getElementById('erro6').style;
//        alert("Erro 6 localizado");
        var erro7 = document.getElementById('erro7').style;
//        alert("Erro 7 localizado");
        var erro8 = document.getElementById('erro8').style;
//        alert("Erro 8 localizado");
        var erro9 = document.getElementById('erro9').style;
//        alert("Erro 9 localizado");
        var erro10 = document.getElementById('erro10').style;
//        alert("Erro 10 localizado");

        var dataRegistro = document.getElementById('calendario');
//        alert("Calendário localizado");
        var dataRuv = document.getElementById('dataRuv');
//        alert("Data ruv localizada");
        var semanaRuv = document.getElementById('semana');
//        alert("Semana ruv localizada");
        var diaRuv = document.getElementById('dia');
//        alert("Dia ruv localizado");

        var tipo = document.getElementById('tipo');
//        alert("Tipo localizado");
        var servico = document.getElementById('servico');
//        alert("Serviço localizado");
        var opcao = document.getElementById('opcaoServ');
//        alert("Opção localizado");
        var outros = document.getElementById('outros');
//        alert("Outros localizado");
        var bonus = document.getElementById('bonusServ');
//        alert("Bônus localizado");
//        var status = document.getElementById('');
//        alert("Status localizado");

        //alert("Estou na conferência");

        if(dataRegistro.value == ""){
//            alert("Chegou data registro");
            erro1.display = "none";
            erro2.display = "none";
            erro3.display = "none";
            erro4.display = "none";
            erro5.display = "none";
            erro6.display = "none";
            erro7.display = "none";
            erro8.display = "none";
            erro9.display = "none";
            erro10.display = "block";

            dataRegistro.focus();
            dataRegistro.select();
            return false;
        }

        if(dataRuv.value == ""){
//            alert("Chegou data ruv");
            erro1.display = "none";
            erro2.display = "none";
            erro3.display = "none";
            erro4.display = "none";
            erro5.display = "none";
            erro6.display = "none";
            erro7.display = "block";
            erro8.display = "none";
            erro9.display = "none";
            erro10.display = "none";

            dataRuv.focus();
            dataRuv.select();
            return false;
        }

        if(semanaRuv.value == ""){
//            alert("Chegou semana ruv");
            erro1.display = "none";
            erro2.display = "none";
            erro3.display = "none";
            erro4.display = "none";
            erro5.display = "none";
            erro6.display = "none";
            erro7.display = "none";
            erro8.display = "block";
            erro9.display = "none";
            erro10.display = "none";

            semanaRuv.focus();
            semanaRuv.select();
            return false;
        }

        if(diaRuv.value == ""){
//            alert("Chegou dia ruv");
            erro1.display = "none";
            erro2.display = "none";
            erro3.display = "none";
            erro4.display = "none";
            erro5.display = "none";
            erro6.display = "none";
            erro7.display = "none";
            erro8.display = "none";
            erro9.display = "block";
            erro10.display = "none";

            diaRuv.focus();
            diaRuv.select();
            return false;
        }

        if(tipo.value == ""){
//            alert("Chegou tipo");
            erro1.display = "block";
            erro2.display = "none";
            erro3.display = "none";
            erro4.display = "none";
            erro5.display = "none";
            erro6.display = "none";
            erro7.display = "none";
            erro8.display = "none";
            erro9.display = "none";
            erro10.display = "none";

            tipo.focus();
            tipo.select();
            return false;
        }
        if(servico.value == ""){
//            alert("Chegou serviço");
            erro1.display = "none";
            erro2.display = "block";
            erro3.display = "none";
            erro4.display = "none";
            erro5.display = "none";
            erro6.display = "none";
            erro7.display = "none";
            erro8.display = "none";
            erro9.display = "none";
            erro10.display = "none";

            servico.focus();
            servico.select();
            return false;
        }
        if(opcao.value == ""){
//            alert("Chegou status");
            erro1.display = "none";
            erro2.display = "none";
            erro3.display = "block";
            erro4.display = "none";
            erro5.display = "none";
            erro6.display = "none";
            erro7.display = "none";
            erro8.display = "none";
            erro9.display = "none";
            erro10.display = "none";

            opcao.focus();
            opcao.select();
            return false;

        }

        if(bonus.value == ""){
//            alert("Chegou bonus");
            erro1.display = "none";
            erro2.display = "none";
            erro3.display = "none";
            erro4.display = "none";
            erro5.display = "block";
            erro6.display = "none";
            erro7.display = "none";
            erro8.display = "none";
            erro9.display = "none";
            erro10.display = "none";

            opcao.focus();
            opcao.select();
            return false;
        }
        if(outros.value == ""){
//            alert("Chegou outros");
            erro1.display = "none";
            erro2.display = "none";
            erro3.display = "none";
            erro4.display = "block";
            erro5.display = "none";
            erro6.display = "none";
            erro7.display = "none";
            erro8.display = "none";
            erro9.display = "none";
            erro10.display = "none";

            outros.focus();
            outros.select();
            return false;
        }

        return true;


    }

    function registrosTab(classe, tab, selecao, valor){

        window.location.href='inicio.php?m=' + classe + '&tab=' + tab + '&' + selecao + '=' + valor;
    }

    function registroSelecao(dataruv, classe){

        if(dataruv === ""){
            window.location.href='inicio.php?m=' + classe + '&tab=registros';
        }else{
            window.location.href='inicio.php?m=' + classe + '&tab=registros&s=' + dataruv;
        }
    }

    function ordemSQL (selecao, link, classe){

                window.location.href = link + "&o=" + selecao;

    }

    function registroSelecaoServ(dataruv, classe){

        if(dataruv === "todos"){
            window.location.href='inicio.php?m=serv&tab=registros';
        }else{
            window.location.href='inicio.php?m=serv&tab=registros$c=' + classe + '&s=' + dataruv;
        }
    }

    function preencheConsultaUsuario(usuario, classe){

    }

    function preencheTipoPesquisa(tipo, classe){
        window.location.href="inicio.php?m=" + classe + "&tab=pesquisas&tpesq=" + tipo;
    }

    function enterTabData(inputId, link, data, evento){

        evento = evento || window.event;

        var key = evento.keyCode || evento.which;

        if(key == '13'){
            document.getElementById(inputId).focus();
            document.getElementById(inputId).select();
        }

        //mascaraData(data);

        document.location.href="inicio.php?m=" + link + "&d=" + data;

    }

    function enterTabDataNominal(inputId, link, data){ //, dataruv, evento

        evento = evento || window.event;

        var key = evento.keyCode || evento.which;

        if(key == '13'){
            document.getElementById(inputId).focus();
            document.getElementById(inputId).select();
        }
        document.location.href="inicio.php?m=" + link + "&d=" + data;

    }

    function enterCampoRuv(input, link, campo){
        //alert(campo);

        switch(input){

            case "data":
                if (campo != ""){
                    window.location.href="inicio.php?m=" + link + "&d=" + campo;
                }
                break;

            case "dia":
            //alert("Dia, a trabalhar");
                if(link === "pp"){
                    var semanaruv = document.getElementById('semanaRuvMed');
                }else if(link === "port"){
                    var semanaruv = document.getElementById('semana');
                }else{
                    var semanaruv = document.getElementById('semana');
                }

                var dataRuv = semanaruv.value + "." + campo;

                if(campo != ""){
                        window.location.href="inicio.php?m=" + link + "&dr=" + dataRuv;
                }
                break;

            case "semana":
                var diaruv = document.getElementById('dia');

                var dataRuv = campo + "." + diaruv.value

                if(campo != ""){
                        window.location.href="inicio.php?m=" + link + "&dr=" + dataRuv;
                }
            break;

            case "dataRuv":
                    document.location.href="inicio.php?m=" + link + "&dr=" + campo;
                break;


        }

    }

    function habilitaBotao(){
        document.getElementById('salvar').disabled = false;

    }

    function selectUser(usuario, classe, menu){
        window.location.href="inicio.php?m="+menu+"&t="+classe+"&u="+usuario;
    }

    function selectUsuarios(caminho){

        window.location.href="inicio.php?m=config&t=usis&tpu="+caminho;

    }

    function selecionaUsuarioIndice(user){
        window.location.href="inicio.php?m=rela&t=ind&u="+user;

    }
    function selectGrupo(grupo){
        //alert(grupo.value);

        if(grupo.value == null || grupo.value == ""){
            window.location.href= "inicio.php?m=rela&t=ind&g=sg";

        }else{
            window.location.href= "inicio.php?m=rela&t=ind&g=" + grupo.value;
        }


    }

    function preencheTipoRelAuto(){

        var checkUsuario = document.getElementById('usuario').checked;
        var checkSemana = document.getElementById('semanaruv').checked;
        var checkGrupos = document.getElementById('grupos').checked;

        var usuario = document.getElementById('user').style;
        var semana = document.getElementById('select_semana').style;
//        var semanas = document.getElementById('select_semanas').style;
        var grupos = document.getElementById('select_grupos').style;
        var aguardando = document.getElementById('aguarda').style;
        var carregando = document.getElementById('carregando').style;

        if(checkUsuario){
            carregando.display='none';
            aguardando.display='none';
            usuario.display = "block";
            grupos.display = "none";
            semana.display = "none";
//            semanas.display = "none";
            nulo.display = "none";
            //checkUsuario.selected();
        }
        else if(checkSemana){
            carregando.display='none';
            aguardando.display='none';
            usuario.display = "none";
            grupos.display = "none";
            semana.display = "block";
//            semanas.display = "block";
            nulo.display = "none";
        }
        else if(checkGrupos){
            carregando.display='none';
            aguardando.display='none';
            usuario.display = "none";
            grupos.display = "block";
            semana.display = "none";
//            semanas.display = "none";
            nulo.display = "none";
        }
//        else{
//            usuario.display = "none";
//            semana.display = "none";
//            grupos.display = "none";
//            nulo.display = "block";
//        }
    }

    function preencheTipoRel(){

        var checkSemana = document.getElementById('semanaruv').checked;
        var checkGrupos = document.getElementById('grupos').checked;

        var semana = document.getElementById('select_semana').style;
//        var semana = document.getElementById('select_semanas').style;
        var grupos = document.getElementById('select_grupos').style;
        var aguardando = document.getElementById('aguarda').style;
        var carregando = document.getElementById('carregando').style;
        
        if(checkSemana){
            carregando.display='none';
            aguardando.display='none';
            semana.display = "block";
            grupos.display = "none";
            semana.display = "none";
            nulo.display = "none";
        }
        else if(checkGrupos){
            carregando.display='none';
            aguardando.display='none';
            semana.display = "none";
            grupos.display = "block";
            semana.display = "none";
            nulo.display = "none";
        }
//        else{
//            usuario.display = "none";
//            semana.display = "none";
//            grupos.display = "none";
//            nulo.display = "block";
//        }
    }

    function direcionaPagina(){
        window.location.href='inicio.php?m=rela&t=ind&tempo=1';
    }

    function direcionaUsuario(link){
        window.location.href="inicio.php?m=rela&t=ind&us=" + link;
    }

    function direcionaGrupo(link){
        window.location.href="inicio.php?m=rela&t=ind&gs=" + link;
    }

    function direcionaSemana(link){
        window.location.href="inicio.php?m=rela&t=ind&ss=" + link;
    }

    function direcionaLink(link, opcao, valor){

        var campo_link = "&tempo=1";

        if (opcao == "ano"){
            window.location.href = link + "&a=" + valor;
        }else if(opcao == "estacao"){
            window.location.href = link + "&e=" + valor;
        }else if(opcao == "mes"){
            window.location.href = link + "&mes=" + valor;
        }else if(opcao = "semana"){
            window.location.href = link + "&s=" + valor;
        }
    }

    function limpaBuscaSemana(){
        window.location.href="inicio.php?m=rela&t=ind&tempo=1";
    }

/*

        var ano = document.getElementById('select_ano').style;
        var estacao = document.getElementById('select_estacao').style;
        var mes = document.getElementById('select_mes').style;
        var sem = document.getElementById('select_semana').style;


*/