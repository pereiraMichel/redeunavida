<?php
/*
 * 
 * @param int $tamanho
 * @return string;
 * 
*/

function abreSessao(){
    session_start();
}

function geraSaltAleatorio($tamanho = 22){
    return substr(sha1(mt_rand()), 0, $tamanho);
}

function senha($senha){
    $salt = geraSaltAleatorio();
    
    $hash = md5($senha, $salt);
    
    for ($i = 0; $i < 1000; $i++){
        $hash = md5($hash);
    }
}

//Conter arquivos que poderão ser inclusos em casos de uso de GET
function arquivosPermitidos(){
    $permitidos = array('home.php', 'contato.php', 'inicio.php');
    
    if(isset($_GET['pagina']) and (array_search($_GET['pagina'], $permitidos) != false)){
        $arquivo = $_GET['pagina'];
    }else{
        $arquivo = 'home.php';
    }
    
    include ($arquivo);//inclui o arquivo
    
    //mysql_real_escape_string() > evita o SQL Injection
    //exemplo: $parametro = mysql_real_escape_string($_GET['nome']);
    
}