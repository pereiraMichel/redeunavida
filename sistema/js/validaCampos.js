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
        document.getElementById("idade").innerHTML = idade + " anos";
//        window.location.href = "?menu=perfil&idadeAtual="+idade;
    }   
}