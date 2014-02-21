<?php

require_once 'inc/functions.php';

$objectTools = new Tools();
if(isset($_GET["c"])){
    $sql = "SELECT ".$_GET["c"]." FROM ".$_GET["t"].";";
}else{
    $sql = "SELECT * FROM ".$_GET["t"].";";
}
$rawdata = $objectTools->getArraySQL($sql);
var_dump($rawdata);