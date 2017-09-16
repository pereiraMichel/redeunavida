<?php


require_once '../conexao/conectaBanco.php';

class funcaoXML{

    public function addPerfil($nome, $dataNascimento, $idade, $codUsuario){
        # Instancia do objeto XMLWriter
        $xml = new XMLWriter;
        # Cria memoria para armazenar a saida
        $xml->openMemory();
        # Inicia o cabeçalho do documento XML
        $xml->startDocument( '1.0' , 'iso-8859-1' );

        # Adiciona/Inicia um Elemento / Nó Pai <item>
        $xml->startElement("perfil");

        #  Adiciona um Nó Filho <quantidade> e valor 8
        $xml->writeElement("nome", $nome);
        $xml->writeElement("datanascimento", $dataNascimento);
        $xml->writeElement("idade", $idade);
        $xml->writeElement("codusuario", $codUsuario);

        #  Finaliza o Nó Pai / Elemento <Item>
        $xml->endElement();

        #  Configura a saida do conteúdo para o formato XML
        header( 'Content-type: text/xml' );

        # Imprime os dados armazenados
        print $xml->outputMemory(true);

        # Salvando o arquivo em disco
        # retorna erro se o header foi definido
        # retorna erro se outputMemory já foi chamado
        $file = fopen("cod".$codUsuario.".xml","w+");
        fwrite($file,$xml->outputMemory(true));
        fclose($file);
    }

    public function calculaSetenio(){
        
        $conecta = new conectaBanco();
        $conecta->conecta();
        try{
            $sql = "SELECT setenio FROM tblsetenio "
                    . "WHERE ".$this->idade." "
                    . "BETWEEN idadeInicial AND idadeFinal";
            $resultado = mysql_query($sql);
            
            if($resultado){
                $dados = mysql_fetch_array($resultado);
                echo "<script>document.getElementById('setenio').value = ".$dados['setenio']."</script>";
            }else if($this->idade > 83){
                echo "<script>document.getElementById('setenio').value='12º';</script>";
            }else{
                echo "<script>document.getElementById('setenio').value='S/N';</script>";
            }
            
        } catch (Exception $ex) {
            echo "Não foi possível realizar a consulta. Erro: ".$ex->getMessage();
        }


    }
 
}