<?php
//require_once("php7_mysql_shim.php");
class conectaBanco {

//        private $usuario = "sec_login";
//        private $senha = "y9kwbLCk";
    //Web
/*       
        private $usuario = "redeunaviva";
        private $senha = "ut6EyRtd";
        private $servidor = "mysql102.prv.f1.k8.com.br";
        //private $servidor = "mysql:mysql.redeunaviva.rio";
        //private $servidor = "mysql:mysql111.prv.f1.k8.com.br";
        //amysql.redeunaviva.rio (servidor de administração do banco)
        private $database = "redeunaviva";


*/
    // Interno
 
        private $usuario = "root";
        private $senha = "m1ch3l4p";
        private $servidor = "localhost";
        private $database = "redeunaviva";
    
//y9kwbLCk    
    public function conecta(){
        error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
        try{
            $conecta = mysql_connect($this->servidor, $this->usuario, $this->senha);
            mysql_select_db($this->database, $conecta);
            mysql_set_charset('utf8', $conecta);
           // echo "<br>Conexão efetuada com sucesso.";
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

    public function conectaBancoPDO(){

        $usuario = "root";
        $senha = "m1ch3l4p";
        $servidor = "localhost";
        $database = "redeunaviva";

        $pdo = new PDO("mysql:host=".$servidor.";dbname=".$database, $usuario, $senha);

        return $pdo;
    }
    

}
