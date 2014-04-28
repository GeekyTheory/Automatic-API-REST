<?php
include_once 'inc/functions.php';
$blacklist = new BlackList();

if(isset($_GET["a"])){
    if($_GET["a"]=="add"){
        /*$blacklist->id_item = 1;
        $blacklist->deleteItem();*/
        $blacklist->createItem($_GET["type"],$_GET["table"],$_GET["column"]);
    }
    if($_GET["a"]=="delete"){
        $id_item = $blacklist->getIDbyParameters($_GET["type"],$_GET["table"],$_GET["column"]);
        $blacklist->id_item = $id_item;
        if($id_item!=0)$blacklist->deleteItem();
    }
}