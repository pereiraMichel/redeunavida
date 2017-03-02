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
//    window.location.href='inicio.php?m=config&t=usis&e=s&id='+usuario;
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
    calculaBonusMeditacao(min);
    conferePeriodo(hora1, min1);
}



function calculaBonusMeditacao(minuto){
    var inputBonus = document.getElementById('bonus');

    if(minuto >= 40){
        inputBonus.value = 1;
    }else if (minuto < 40){
        inputBonus.value = 0;
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

function preencheAutoManualPortal(){
    var auto = document.getElementById('auto');
    var manual = document.getElementById('manual');

    if(auto.checked){
        document.location.href='inicio.php?m=port&tab=portal&t=auto';
    }else if(manual.checked){
        document.location.href='inicio.php?m=port&tab=portal&t=manual';
    }
    
}

function preencheDataRuv(campo, id){

    var semanaRuv = document.getElementById('semana');
    var diaRuvCampo = document.getElementById('dia');
    var dataRuv = document.getElementById('dataRuv');

    var diaRuv = null;
    var mesRuv = null;
    var anoRuv = null;
    var estacao = null;
    var semana = null;
    
    if(id === "dataRuv"){
//        alert("É dataRuv"); //Funciona perfeitamente
        anoRuv = campo.substring(9, 10);
        mesRuv = campo.substring(4, 5);
        diaRuv = campo.substring(1, 2);

        estacao = semanaRuv.value.substring(2, 3);
        semana = semanaRuv.value.substring(4, 5);

        diaRuvCampo.value = diaRuv;
        semanaRuv.value = anoRuv + "-" + estacao + mesRuv + semana;

//Ok. Preenchido corretamente.
    }else if(id === "semana"){

        mesRuv = campo.substring(3, 4);
        anoRuv = campo.substring(0, 1);

        diaRuv = diaRuvCampo.value;

        dataRuv.value = "0" + diaRuv + "/0" + mesRuv + "/201" + anoRuv;

    }else if(id === "dia"){

        mesRuv = dataRuv.value.substring(4, 5); //Correto
        anoRuv = dataRuv.value.substring(9, 10);//Correto
        diaRuv = campo;

        dataRuv.value = "0" + diaRuv + "/0" + mesRuv + "/201" + anoRuv;

    }

    function preencheAutoManualTarefas(){
        alert("Chamou a função");
        var auto = document.getElementById('auto');
        var manual = document.getElementById('manual');

        if(auto.checked){
            document.location.href='inicio.php?m=taref&t=auto';
        }else if(manual.checked){
            document.location.href='inicio.php?m=taref&t=manual';
        }

    }

/*

    var mesRuv = semanaRuv.substring(3, 4);
    var anoRuv = semanaRuv.substring(0, 1);

    dataRuv = "0" + diaRuv + "/0" + mesRuv + "/201" + anoRuv; */
}