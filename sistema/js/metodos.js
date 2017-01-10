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
        document.location.href='inicio.php?m=pp&tab=med&t=auto';
    }else if(manual.checked){
        document.location.href='inicio.php?m=pp&tab=med&t=manual';
    }

}

function calculaTempo(){
//    var hora = null;
    var min = null;

    var inicio = document.getElementById('inicio').value;//pega os valores do início, em formato HH:mm
    var termino = document.getElementById('termino').value;//pega os valores do término, em formato HH:mm

    var hora1 = parseInt(inicio.substring(0,2), 10);//pega os valores da hora início
    var min1 = parseInt(inicio.substring(3,5), 10); //pega os valores do min início

    var hora2 = parseInt(termino.substring(0,2), 10); //pega os valores da hora término
    var min2 = parseInt(termino.substring(3,5), 10); //pega os valores do minuto término

    var calculoHora = hora2 - hora1;
    var calculoMinuto = min2 - min1;

    if (hora2 < hora1){
        document.getElementById('erro1').style.display="block";
        document.getElementById('erro2').style.display="none";
    }
    if(calculoMinuto < 1){
//                    alert("Passou pelo minuto menor que 1");
        if(calculoMinuto < 0){
//                   alert("Passou pelo minuto menor que 0");
            min = parseInt(-min, 10);
        }else if(calculoMinuto === 0){
//                    alert("Passou pelo minuto igual a 0");
            min = calculoHora*60;
        }else{
//                    alert("Passou pelo minuto 1");
            min = parseInt(min, 10) + min;
        }
    }else{
//                    alert("Passou pelo minuto maior que 1");
        min = calculoMinuto;
//                    alert("Valor do minuto: " + min);

    }
    document.getElementById('duracao').value = min;
    calculaBonusMeditacao(min);
    conferePeriodo(hora1, min1);
//                var duracao = min + hora;

    if (min >= 60){
        document.getElementById('erro1').style.display="none";
        document.getElementById('erro2').style.display="block";
    }


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
        document.getElementById('dataHoje').value="";
        
    }
    
}

function calculaBonusPortal(selecao){
//    alert(selecao);
    var bonusCorpo = document.getElementById('bonusPortais');
    
    if(selecao === "1"){
        bonusCorpo.value = "0";
    }
    else if(selecao === "2"){
        bonusCorpo.value = "0";
    }
    else if(selecao === "3"){
        bonusCorpo.value = "1";
    }
    else if(selecao === "4"){
        bonusCorpo.value = "2";
    }
    else if(selecao === ""){
        bonusCorpo.value = "0";
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