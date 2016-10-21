<?php

class ultimoId{


    public function ultimoId($id, $tabela){
    	
        $sqlUltimoNumero = "SELECT MAX(".$id.") AS ".$id." FROM ".$tabela;
        
        try{
            
            $resultUltimoNum = mysql_query($sqlUltimoNumero) or die (RETURN_SQL.mysl_error());

            $dados = mysql_fetch_array(resultUltimoNum);

            $novoId = $dados['id'] + 1;

            return $novoId;

            mysql_close($resultUltimoNum);

        } catch (Exception $ex) {
            echo EXCEPTION_CON.$ex->getMessage();
        }
        
    }
	



}