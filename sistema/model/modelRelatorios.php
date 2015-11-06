<?php

//Relatório de Bônus, Relatório de Tarefas, Relatório de Jornadas, Relatório de Paragem e
//Relatório de Usuários

require_once '../conexao/conectaBanco.php';


class modelRelatorios {
    
    public function relBonus(){
        $conexao = new conectaBanco();
        $conexao->conecta();
        
        try{
            
        } catch (Exception $ex) {
            echo "Não foi possível efetuar a consulta. Verifique sob o erro: ".$ex->getMessage();
        }
        
        
    }
    
    public function relTarefas(){
        $conexao = new conectaBanco();
        $conexao->conecta();
        
        try{
            
        } catch (Exception $ex) {
            echo "Não foi possível efetuar a consulta. Verifique sob o erro: ".$ex->getMessage();
        }
    }
    
    public function relJornadas(){
        $conexao = new conectaBanco();
        $conexao->conecta();
        
        try{
            
        } catch (Exception $ex) {
            echo "Não foi possível efetuar a consulta. Verifique sob o erro: ".$ex->getMessage();
        }
    }
    
    public function relParagem(){
        $conexao = new conectaBanco();
        $conexao->conecta();
        
        try{
            
        } catch (Exception $ex) {
            echo "Não foi possível efetuar a consulta. Verifique sob o erro: ".$ex->getMessage();
        }
    }
    
    public function relUsuarios(){
        $conexao = new conectaBanco();
        $conexao->conecta();
        
        try{
            
            $sql = "SELECT 
                        * 
                    FROM 
                        tblloginsystems l, 
                        tblloginsite s";
            
            $resultado = mysql_query($sql) or die ("Erro na execução do SQL. Verifique sob erro: ".mysql_error());
            
            
            
            
        } catch (Exception $ex) {
            echo "Não foi possível efetuar a consulta. Verifique sob o erro: ".$ex->getMessage();
        }
    }
    
    
}
