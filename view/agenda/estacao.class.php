<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of estacao
 *
 * @author Michel Pereira
 */
class estacao {

    public function relacaoEstacao($estacao){
        
        if($estacao == "primavera"){
            echo "<option name='111' value='111'>111</option>";
            echo "<option name='112' value='112'>112</option>";
            echo "<option name='113' value='113'>113</option>";
            echo "<option name='114' value='114'>114</option>";
            echo "<option name='121' value='121'>121</option>";
            echo "<option name='122' value='122'>122</option>";
            echo "<option name='123' value='123'>123</option>";
            echo "<option name='124' value='124'>124</option>";
            echo "<option name='131' value='131'>131</option>";
            echo "<option name='132' value='132'>132</option>";
            echo "<option name='133' value='133'>133</option>";
            echo "<option name='134' value='134'>134</option>";
            echo "<option name='135' value='135'>135</option>";
            
        }else if($estacao === "verao"){
            echo "<option name='211' value='211'>211</option>";
            echo "<option name='212' value='212'>212</option>";
            echo "<option name='213' value='213'>213</option>";
            echo "<option name='214' value='214'>214</option>";
            echo "<option name='221' value='221'>221</option>";
            echo "<option name='222' value='222'>222</option>";
            echo "<option name='223' value='223'>223</option>";
            echo "<option name='224' value='224'>224</option>";
            echo "<option name='231' value='231'>231</option>";
            echo "<option name='232' value='232'>232</option>";
            echo "<option name='233' value='233'>233</option>";
            echo "<option name='234' value='234'>234</option>";
            echo "<option name='235' value='235'>235</option>";
        }else if($estacao === "outono"){
            echo "<option name='311' value='311'>311</option>";
            echo "<option name='312' value='312'>312</option>";
            echo "<option name='313' value='313'>313</option>";
            echo "<option name='314' value='314'>314</option>";
            echo "<option name='321' value='321'>321</option>";
            echo "<option name='322' value='322'>322</option>";
            echo "<option name='323' value='323'>323</option>";
            echo "<option name='324' value='324'>324</option>";
            echo "<option name='331' value='331'>331</option>";
            echo "<option name='332' value='332'>332</option>";
            echo "<option name='333' value='333'>333</option>";
            echo "<option name='334' value='334'>334</option>";
            echo "<option name='335' value='335'>335</option>";
        }else if($estacao === "inverno"){
            echo "<option name='411' value='411'>411</option>";
            echo "<option name='412' value='412'>412</option>";
            echo "<option name='413' value='413'>413</option>";
            echo "<option name='414' value='414'>414</option>";
            echo "<option name='421' value='421'>421</option>";
            echo "<option name='422' value='422'>422</option>";
            echo "<option name='423' value='423'>423</option>";
            echo "<option name='424' value='424'>424</option>";
            echo "<option name='431' value='431'>431</option>";
            echo "<option name='432' value='432'>432</option>";
            echo "<option name='433' value='433'>433</option>";
            echo "<option name='434' value='434'>434</option>";
            echo "<option name='435' value='435'>435</option>";
        }
        
        
    }
    
    public function todasEstacoes(){
        echo "<optgroup label='SEMANA'>";
        echo "  <optgroup label='PRIMAVERA'>";
        echo "      <option name='111' value='111'>111</option>";
        echo "      <option name='112' value='112'>112</option>";
        echo "      <option name='113' value='113'>113</option>";
        echo "      <option name='114' value='114'>114</option>";
        echo "      <option name='121' value='121'>121</option>";
        echo "      <option name='122' value='122'>122</option>";
        echo "      <option name='123' value='123'>123</option>";
        echo "      <option name='124' value='124'>124</option>";
        echo "      <option name='131' value='131'>131</option>";
        echo "      <option name='132' value='132'>132</option>";
        echo "      <option name='133' value='133'>133</option>";
        echo "      <option name='134' value='134'>134</option>";
        echo "      <option name='135' value='135'>135</option>";
        echo "  </optgroup>";
        echo "  <optgroup label='VERÃO'>";
        echo "      <option name='211' value='211'>211</option>";
        echo "      <option name='212' value='212'>212</option>";
        echo "      <option name='213' value='213'>213</option>";
        echo "      <option name='214' value='214'>214</option>";
        echo "      <option name='221' value='221'>221</option>";
        echo "      <option name='222' value='222'>222</option>";
        echo "      <option name='223' value='223'>223</option>";
        echo "      <option name='224' value='224'>224</option>";
        echo "      <option name='231' value='231'>231</option>";
        echo "      <option name='232' value='232'>232</option>";
        echo "      <option name='233' value='233'>233</option>";
        echo "      <option name='234' value='234'>234</option>";
        echo "      <option name='235' value='235'>235</option>";
        echo "  </optgroup>";
        echo "  <optgroup label='OUTONO'>";
        echo "      <option name='311' value='311'>311</option>";
        echo "      <option name='312' value='312'>312</option>";
        echo "      <option name='313' value='313'>313</option>";
        echo "      <option name='314' value='314'>314</option>";
        echo "      <option name='321' value='321'>321</option>";
        echo "      <option name='322' value='322'>322</option>";
        echo "      <option name='323' value='323'>323</option>";
        echo "      <option name='324' value='324'>324</option>";
        echo "      <option name='331' value='331'>331</option>";
        echo "      <option name='332' value='332'>332</option>";
        echo "      <option name='333' value='333'>333</option>";
        echo "      <option name='334' value='334'>334</option>";
        echo "      <option name='335' value='335'>335</option>";
        echo "  </optgroup>";
        echo "  <optgroup label='INVERNO'>";
        echo "      <option name='411' value='411'>411</option>";
        echo "      <option name='412' value='412'>412</option>";
        echo "      <option name='413' value='413'>413</option>";
        echo "      <option name='414' value='414'>414</option>";
        echo "      <option name='421' value='421'>421</option>";
        echo "      <option name='422' value='422'>422</option>";
        echo "      <option name='423' value='423'>423</option>";
        echo "      <option name='424' value='424'>424</option>";
        echo "      <option name='431' value='431'>431</option>";
        echo "      <option name='432' value='432'>432</option>";
        echo "      <option name='433' value='433'>433</option>";
        echo "      <option name='434' value='434'>434</option>";
        echo "      <option name='435' value='435'>435</option>";
        echo "  </optgroup>";
        
        echo "</optgroup>";
    }
    
    
}
