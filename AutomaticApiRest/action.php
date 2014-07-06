<?php
include_once 'inc/functions.php';
require_once("inc/autentification.php");
$blacklist = new BlackList();

if(isset($_GET["a"])){
    if($_GET["a"]=="add"){
    
        $tool = new Tools();
        $fields = $tool->getFieldsByTable($_GET["table"]);
        $num_fields = count($fields);

        if($_GET["column"]=="*"){
            //Get all columns from table
            for($i=0;$i<count($fields);$i++){
                if(!$blacklist->existItem($_GET["type"],$_GET["table"],$fields[$i])){
                    $blacklist->createItem($_GET["type"],$_GET["table"],$fields[$i]);
                }
            }
            $blacklist->createItem($_GET["type"],$_GET["table"],$_GET["column"]);
        }else{
            $blacklist->createItem($_GET["type"],$_GET["table"],$_GET["column"]);
        
            $num_fields_check = 0;
            for($i=0;$i<count($fields);$i++){
                if($blacklist->existItem($_GET["type"],$_GET["table"],$fields[$i])){
                    $num_fields_check++;
                }
            }
            
            if($num_fields == $num_fields_check){
                //Añadimos *
                $blacklist->createItem($_GET["type"],$_GET["table"],"*");
            }
        }
    }
    if($_GET["a"]=="delete"){
        
        if($_GET["column"]=="*"){
            //Get all columns from table
            $tool = new Tools();
            $fields = $tool->getFieldsByTable($_GET["table"]);
            
            for($i=0;$i<count($fields);$i++){
                $id_item = $blacklist->getIDbyParameters($_GET["type"],$_GET["table"],$fields[$i]);
                $blacklist->id_item = $id_item;
                if($id_item!=0)$blacklist->deleteItem();
            }
            //delete *
            $id_item = $blacklist->getIDbyParameters($_GET["type"],$_GET["table"],"*");
            $blacklist->id_item = $id_item;
            if($id_item!=0)$blacklist->deleteItem();
        }else{
            //delete field
            $id_item = $blacklist->getIDbyParameters($_GET["type"],$_GET["table"],$_GET["column"]);
            $blacklist->id_item = $id_item;
            if($id_item!=0)$blacklist->deleteItem();
            //delete *
            $id_item = $blacklist->getIDbyParameters($_GET["type"],$_GET["table"],"*");
            $blacklist->id_item = $id_item;
            if($id_item!=0)$blacklist->deleteItem();
            
        }
        
    }
}