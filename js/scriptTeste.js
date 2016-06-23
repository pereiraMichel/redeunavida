/* 
 * Java Script - Teste
 */


function mudaCor(opcao){
    var imagem = document.getElementById('imagemRUVCorFundo');
    switch(opcao){
        case "f1":
            imagem.style.backgroundColor = "#1C86EE";
            break;
        case "f2":
            imagem.style.backgroundColor = "#00BFFF";
            break;
        case "f3":
            imagem.style.backgroundColor = "#4F94CD";
            break;
        case "f4":
            imagem.style.backgroundColor = "#00CED1";
            break;
        case "f5":
            imagem.style.backgroundColor = "#436EEE";
            break;
        case "c1":
            imagem.style.backgroundColor = "#00CDCD";
            break;
        case "c2":
            imagem.style.backgroundColor = "#00C5CD";
            break;
        case "c3":
            imagem.style.backgroundColor = "#912CEE";
            break;
        case "c4":
            imagem.style.backgroundColor = "#9F79EE";
            break;
        case "c5":
            imagem.style.backgroundColor = "#87CEEB";
            break;
        case "c6":
            imagem.style.backgroundColor = "#009ACD";
            break;
        case "c7":
            imagem.style.backgroundColor = "#4682B4";
            break;
        case "c8":
            imagem.style.backgroundColor = "#4169E1";
            break;
        case "c9":
            imagem.style.backgroundColor = "#7B68EE";
            break;
        case "a1": //Chocolate
            imagem.style.backgroundColor = "#D2691E";
            break;
        case "a2": // OliverDrab
            imagem.style.backgroundColor = "#6B8E23";
            break;
        case "a3": // OliverDrab
            imagem.style.backgroundColor = "#B03060";
            break;
        case "a4": // OliverDrab
            imagem.style.backgroundColor = "#CD1076";
            break;
        case "a5": // OliverDrab
            imagem.style.backgroundColor = "#EE0000";
            break;
        case "a6": // OliverDrab
            imagem.style.backgroundColor = "#CD4F39";
            break;
        case "a7": // OliverDrab
            imagem.style.backgroundColor = "#00CD66";
            break;
        case "a8": // OliverDrab
            imagem.style.backgroundColor = "#8B5F65";
            break;
        case "a9": // OliverDrab
            imagem.style.backgroundColor = "#CD6889";
            break;
        case "a10": // OliverDrab
            imagem.style.backgroundColor = "#009ACD";
            break;
        case "a11": // OliverDrab
            imagem.style.backgroundColor = "#00688B";
            break;
        case "a12": // OliverDrab
            imagem.style.backgroundColor = "#1874CD";
            break;
        case "a13": // OliverDrab
            imagem.style.backgroundColor = "#104E8B";
            break;
        case "a14": // OliverDrab
            imagem.style.backgroundColor = "#6959CD";
            break;
        case "a15": // OliverDrab
            imagem.style.backgroundColor = "#B22222";
            break;
        case "a16": // OliverDrab
            imagem.style.backgroundColor = "#228B22";
            break;
        case "a17": // OliverDrab
            imagem.style.backgroundColor = "#3CB371";
            break;
        case "a18": // OliverDrab
            imagem.style.backgroundColor = "#8B2252";
            break;
        case "a19": // OliverDrab
            imagem.style.backgroundColor = "#CD2626";
            break;
    }
}

function mudaCorMenu(opcao){
    var imagem = document.getElementById('menuSup');
    var imagem2 = document.getElementById('menuInf');
    switch(opcao){
        case "f1":
            imagem.style.backgroundColor = "#1C86EE";
            imagem2.style.backgroundColor = "#1C86EE";
            break;
        case "f2":
            imagem.style.backgroundColor = "#00BFFF";
            imagem2.style.backgroundColor = "#00BFFF";
            break;
        case "f3":
            imagem.style.backgroundColor = "#4F94CD";
            imagem2.style.backgroundColor = "#4F94CD";
            break;
        case "f4":
            imagem.style.backgroundColor = "#00CED1";
            imagem2.style.backgroundColor = "#00CED1";
            break;
        case "f5":
            imagem.style.backgroundColor = "#436EEE";
            imagem2.style.backgroundColor = "#436EEE";
            break;
        case "c1":
            imagem.style.backgroundColor = "#00CDCD";
            imagem2.style.backgroundColor = "#00CDCD";
            break;
        case "c2":
            imagem.style.backgroundColor = "#00C5CD";
            imagem2.style.backgroundColor = "#00C5CD";
            break;
        case "c3":
            imagem.style.backgroundColor = "#912CEE";
            imagem2.style.backgroundColor = "#912CEE";
            break;
        case "c4":
            imagem.style.backgroundColor = "#9F79EE";
            imagem2.style.backgroundColor = "#9F79EE";
            break;
        case "c5":
            imagem.style.backgroundColor = "#87CEEB";
            imagem2.style.backgroundColor = "#87CEEB";
            break;
        case "c6":
            imagem.style.backgroundColor = "#009ACD";
            imagem2.style.backgroundColor = "#009ACD";
            break;
        case "c7":
            imagem.style.backgroundColor = "#4682B4";
            imagem2.style.backgroundColor = "#4682B4";
            break;
        case "c8":
            imagem.style.backgroundColor = "#4169E1";
            imagem2.style.backgroundColor = "#4169E1";
            break;
        case "c9":
            imagem.style.backgroundColor = "#7B68EE";
            imagem2.style.backgroundColor = "#7B68EE";
            break;
        case "a1": //Chocolate
            imagem.style.backgroundColor = "#D2691E";
            imagem2.style.backgroundColor = "#D2691E";
            break;
        case "a2": // OliverDrab
            imagem.style.backgroundColor = "#6B8E23";
            imagem2.style.backgroundColor = "#6B8E23";
            break;
        case "a3": // OliverDrab
            imagem.style.backgroundColor = "#B03060";
            imagem2.style.backgroundColor = "#B03060";
            break;
        case "a4": // OliverDrab
            imagem.style.backgroundColor = "#CD1076";
            imagem2.style.backgroundColor = "#CD1076";
            break;
        case "a5": // OliverDrab
            imagem.style.backgroundColor = "#EE0000";
            imagem2.style.backgroundColor = "#EE0000";
            break;
        case "a6": // OliverDrab
            imagem.style.backgroundColor = "#CD4F39";
            imagem2.style.backgroundColor = "#CD4F39";
            break;
        case "a7": // OliverDrab
            imagem.style.backgroundColor = "#00CD66";
            imagem2.style.backgroundColor = "#00CD66";
            break;
        case "a8": // OliverDrab
            imagem.style.backgroundColor = "#8B5F65";
            imagem2.style.backgroundColor = "#8B5F65";
            break;
        case "a9": // OliverDrab
            imagem.style.backgroundColor = "#CD6889";
            imagem2.style.backgroundColor = "#CD6889";
            break;
        case "a10": // OliverDrab
            imagem.style.backgroundColor = "#009ACD";
            imagem2.style.backgroundColor = "#009ACD";
            break;
        case "a11": // OliverDrab
            imagem.style.backgroundColor = "#00688B";
            imagem2.style.backgroundColor = "#00688B";
            break;
        case "a12": // OliverDrab
            imagem.style.backgroundColor = "#1874CD";
            imagem2.style.backgroundColor = "#1874CD";
            break;
        case "a13": // OliverDrab
            imagem.style.backgroundColor = "#104E8B";
            imagem2.style.backgroundColor = "#104E8B";
            break;
        case "a14": // OliverDrab
            imagem.style.backgroundColor = "#6959CD";
            imagem2.style.backgroundColor = "#6959CD";
            break;
        case "a15": // OliverDrab
            imagem.style.backgroundColor = "#B22222";
            imagem2.style.backgroundColor = "#B22222";
            break;
        case "a16": // OliverDrab
            imagem.style.backgroundColor = "#228B22";
            imagem2.style.backgroundColor = "#228B22";
            break;
        case "a17": // OliverDrab
            imagem.style.backgroundColor = "#3CB371";
            imagem2.style.backgroundColor = "#3CB371";
            break;
        case "a18": // OliverDrab
            imagem.style.backgroundColor = "#8B2252";
            imagem2.style.backgroundColor = "#8B2252";
            break;
        case "a19": // OliverDrab
            imagem.style.backgroundColor = "#CD2626";
            imagem2.style.backgroundColor = "#CD2626";
            break;
    }
}
