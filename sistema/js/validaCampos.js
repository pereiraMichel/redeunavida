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
        document.getElementById("setenio").value = "12º";
        document.getElementById("codSetenio").value = "12";
    }
}

function ativaSelecaoEstado(){
    document.getElementById("selecionaEstado").style.display="block";
}

function emiteEstadoSelecionado(estado){

    document.getElementByid("estado").value = estado;
    document.getElementById("selecionaEstado").style.display="none";
}