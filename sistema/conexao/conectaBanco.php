<?php

class conectaBanco {

//        private $usuario = "sec_login";
//        private $senha = "y9kwbLCk";
    //Web
//        private $usuario = "root_ruv";
//        private $senha = "M1ch3l4p";
//        private $servidor = "mysql524.umbler.com";
//        private $database = "ruv";
    // Internto
        private $usuario = "root";
        private $senha = "m1ch3l";
        private $servidor = "localhost";
        private $database = "ruv";
    
//y9kwbLCk    
    public function conecta(){

        try{
            $conecta = mysql_connect($this->servidor, $this->usuario, $this->senha);
            mysql_select_db($this->database, $conecta);
            mysql_set_charset('utf8', $conecta);
//            echo "<br>Conexão efetuada com sucesso.";
        }catch(Exception $e){
            throw new Exception("Problemas na conexão. Mensagem de erro: ".$e->getMessage());
        }
        
    }
    
//    public function desconecta($conecta){
//        mysql_close($conecta);
//    }

    public function iniciaSessao(){
        session_start();
    }
    

}
