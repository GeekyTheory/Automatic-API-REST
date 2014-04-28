<?php
require_once './inc/functions.php';
class BlackList{
    
    public $id_item = 0;
    
    function createItem($type,$table,$columna){
        //Open blacklist.xml
        $filas=file('./xml/blacklist.xml');
        $cuerpo = "";
        for($i=0;$i<count($filas);$i++){
            $filas[$i] = str_replace(
                    
                    '</BLACK_LIST>',
                    '    <INPUT>
            <ID>
                1
            </ID>
            <TYPE>
                G
            </TYPE>
            <TABLE>
                badge
            </TABLE>
            <COLUMN>
                *2
            </COLUMN>
            </INPUT>

                    </BLACK_LIST>',$filas[$i]);
            $cuerpo = $cuerpo.$filas[$i];
        }
        
        $file=fopen("./xml/blacklist.xml","w+"); 
        fwrite ($file,$cuerpo); 
        fclose($file); 
        echo $file;
        //fwrite ($file,$buffer); 
        //fclose($file); 
    }
    
    //get all the info in one multidimensional array
    function getAllInfo(){
        
    }
    
    //get the info about id_item variable
    function getInfo(){
        
    }
    
    function deleteItem(){
        
    }
    
    function getLastItem(){
        
    }
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

