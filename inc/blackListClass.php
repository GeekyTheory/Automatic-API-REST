<?php
require_once './inc/functions.php';
/**
 * Class to manage our blacklist xml. 
 * 
 * @package  Automatic Api Rest
 * @author   Alejandro Esquiva Rodríguez [@alex_esquiva] <alejandro@geekytheory.com>
 * @license  Apache License, Version 2.0
 * @link     https://github.com/GeekyTheory/Automatic-API-REST
 */
class BlackList{
    
    public $id_item = 0;
    /**
     * Insert a row into the blacklist.xml
     * 
     * @param type $type
     * @param type $table
     * @param type $colum
     */
    function createItem($type,$table,$colum){
        $library = new SimpleXMLElement('xml/blacklist.xml', null, true);
        
        $book = $library->addChild('ITEM');
        $book->addAttribute('ID', $this->getLastIDItem()+1);
        $book->addChild('TYPE', $type);
        $book->addChild('TABLE', $table);
        $book->addChild('COLUMN', $colum);
        echo $library->asXML();
        $library->asXML('xml/blacklist.xml'); 
    }
    
    
    /**
     * Get all the info in one multidimensional array 
     * @return type
     */
    function getAllInfo(){
        $doc = new SimpleXMLElement('xml/blacklist.xml', null, true);
        $count = 0;
        $rawdata = "";
        foreach($doc->ITEM as $ITEM){    
            $dom=dom_import_simplexml($ITEM);
            $rawdata[$count][0] = $dom->getAttribute("ID");
            $rawdata[$count]["ID"] = $dom->getAttribute("ID");
            //$rawdata[$count][1] = $ITEM->TYPE;
            //$rawdata[$count]["TYPE"] = $ITEM->TYPE;
            $rawdata[$count][1] = $ITEM->TABLE;
            $rawdata[$count]["TABLE"] = $ITEM->TABLE;
            $rawdata[$count][2] = $ITEM->COLUMN;
            $rawdata[$count]["COLUMN"] = $ITEM->COLUMN;            
            $count++;
        }
        return $rawdata;
    }
    /**
     * Delete row with id_item how reference
     */
    function deleteItem(){
        $doc = new SimpleXMLElement('xml/blacklist.xml', null, true);
        foreach($doc->ITEM as $ITEM){
            if($ITEM['ID'] == $this->id_item) {
                $dom=dom_import_simplexml($ITEM);
                $dom->parentNode->removeChild($dom);
            }
        }
        echo $doc->asXml('xml/blacklist.xml');
    }
    /**
     * Return last id_item
     * @return int
     */
    function getLastIDItem(){
        $doc = new SimpleXMLElement('xml/blacklist.xml', null, true);
        
        $count = count($doc);
        $count2 = 0;
        
        foreach($doc->ITEM as $ITEM){
            $count2++;
            if($count == $count2){
                $dom=dom_import_simplexml($ITEM);
                return $dom->getAttribute("ID");               
            }
        }
        
        return 0;
    }
    /**
     * Check if exist item about the input arguments
     * @param type $type
     * @param type $table
     * @param type $column
     * @return boolean
     */
    function existItem($type,$table,$column){
        $doc = new SimpleXMLElement('xml/blacklist.xml', null, true);
        
        $count = count($doc);
        $count2 = 0;
        
        foreach($doc->ITEM as $ITEM){    
            if($type==$ITEM->TYPE && $table==$ITEM->TABLE && $column==$ITEM->COLUMN){
                return true;
            }
        }
        return false;
    }
    /**
     * Return Id by parameters
     * 
     * @param type $type
     * @param type $table
     * @param type $column
     * @return int
     */
    function getIDbyParameters($type,$table,$column){
        $doc = new SimpleXMLElement('xml/blacklist.xml', null, true);
        
        $count = count($doc);
        $count2 = 0;
        
        foreach($doc->ITEM as $ITEM){    
            if($type==$ITEM->TYPE && $table==$ITEM->TABLE && $column==$ITEM->COLUMN){
                $dom=dom_import_simplexml($ITEM);
                return $dom->getAttribute("ID");
            }
        }
        return 0;
    }
    /**
     * Display a table with the blacklist
     * @param type $rawdata
     */
    function displayTable($rawdata){
        echo '<table class="table table-striped table-bordered table-condensed">';
        $columnas = count($rawdata[0])/2;
        //echo $columnas;
        $filas = count($rawdata);
        //echo "<br>".$filas."<br>";
        //Añadimos los titulos

        for($i=1;$i<count($rawdata[0]);$i=$i+2){
                next($rawdata[0]);
                
                    echo "<th><b>".key($rawdata[0])."</b></th>";

                next($rawdata[0]);
        }
        
        echo "<th><b>Privacity</b></th>";
        
        $blacklist = new BlackList();
        for($i=0;$i<$filas;$i++){
                echo "<tr>";
                for($j=0;$j<$columnas;$j++){                  
                    echo "<td>".$rawdata[$i][$j]."</td>";  
                    if($j == $columnas-1){
                        $table = $rawdata[$i][$j-1];
                        $column = $rawdata[$i][$j];
                       
                            echo "<td><input id='private$i' type='checkbox' checked=true onchange='updatePrivacity(\"$i\",\"G\",\"$table\",\"$column\")'></td>";
                       
                    }
                }
                echo "</tr>";
        }		
        echo '</table>';
    }
    
}
?>