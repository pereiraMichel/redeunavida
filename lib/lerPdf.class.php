<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of lerPdf
 *
 * @author Debug
 */
class lerPdf {
    
function pdf2text($filename) { 

    // Read the data from pdf file
    $infile = @file_get_contents($filename, FILE_BINARY); 
    if (empty($infile)) 
        return ""; 

    // Get all text data.
    $transformations = array(); 
    $texts = array(); 

    // Get the list of all objects.
    preg_match_all("#obj(.*)endobj#ismU", $infile, $objects); 
    $objects = @$objects[1]; 

    // Select objects with streams.
    for ($i = 0; $i < count($objects); $i++) { 
        $currentObject = $objects[$i]; 

        // Check if an object includes data stream.
        if (preg_match("#stream(.*)endstream#ismU", $currentObject, $stream)) { 
            $stream = ltrim($stream[1]); 

            // Check object parameters and look for text data. 
            $options = getObjectOptions($currentObject); 
//            $options = getObjectOptions($currentObject); 
            if (!(empty($options["Length1"]) && empty($options["Type"]) && empty($options["Subtype"]))) 
                continue; 

            // So, we have text data. Decode it.
            $data = getDecodedStream($stream, $options);  
            if (strlen($data)) { 
                if (preg_match_all("#BT(.*)ET#ismU", $data, $textContainers)) { 
                    $textContainers = @$textContainers[1]; 
                    getDirtyTexts($texts, $textContainers); 
                } else 
                    getCharTransformations($transformations, $data); 
            } 
        } 

    } 

    // Analyze text blocks taking into account character transformations and return results. 
    return getTextUsingTransformations($texts, $transformations); 
}    
    
    //put your code here
}
