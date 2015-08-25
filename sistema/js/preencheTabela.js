
$("#tabelaTelefones").on("change", function(){
    $.post("../view/inicio.php?menu=perfil",
        {tabela: $("#tabelaTelefones").val()},
            function(dados){

            $("#tabelaTelefones").empty();
            $("#tabelaTelefones").append(dados);

    });
});



