<!DOCTYPE html>

<?php

require_once "../classes/usuario.class.php";

    $identificacao = $_GET['usuario'];

    if($identificacao == ""){
        header("Location: ../index.php");
    }
    
    if($identificacao == '001001110'){
        $autorizaNovo = true;
    }
    
    $usuario = "michel";
//    $usuario = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS);
    $senha = "m1ch3l4p";
    $email = "pereira.michel@gmail.com";
    $dataCadastro = "2015-08-12";
//    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
//    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
//    $dataCadastro = filter_input(INPUT_POST, 'dataCadastro', FILTER_SANITIZE_SPECIAL_CHARS);
    $codTipoUsuario = 1;
    echo "Recebido informações...";
    $modeloUsuario = new modelUsuario();
    echo "<br>Chamada do modelo...";
    $modeloUsuario->setUsuario($usuario);
    $modeloUsuario->setSenha($senha);
    $modeloUsuario->setEmail($email);
    $modeloUsuario->setDataCadastro($dataCadastro);
    $modeloUsuario->setCodTipoUsuario($codTipoUsuario);
    $modeloUsuario->setDataUltimaAlteracao($dataCadastro);
    echo "<br>Setado as informações...";

    $modeloUsuario->ultimoRegistro();
    if($modeloUsuario->cadastraUsuario()){
        echo "Cadastro efetuado com sucesso";
    }else{
        echo "<br>Erro ao ser efetuado o cadastro";
    }
    
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            if($autorizaNovo){
?>      
        <form name="primeirousuario" method="post" action="<?php $PHP_SELF; ?>">
        <p>
            <h3>NOVO USUÁRIO</h3>
        <p>
            Nome: <input type="text" name="login" id="login">
        </p>
        <p>
            E-mail: <input type="email" name="email" id="email">
        </p>
        <p>
            Senha: <input type="password" name="senha" id="senha">
        </p>
        
        <input type="hidden" name="dataCadastro" id="dataCadastro" value="2015-08-05">
        
        <input type="submit" value="Enviar">
        
        </form>
                
<?php                
            }else{
                echo "Recurso não autorizado.";
            }



// put your code here
        ?>
    </body>
</html>
