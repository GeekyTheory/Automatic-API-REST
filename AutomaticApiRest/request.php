<?php

require_once 'inc/functions.php';

$blacklist = new BlackList();
$objectTools = new Tools();
//URL EXAMPLE
//http://localhost/Automatic-API-REST/AutomaticApiRest/request/method/get/action/table/name/NAMETABLE

$params = array();
$parts = explode('/', $_SERVER['REQUEST_URI']);

for ($i = 0; $i < count($parts); $i = $i + 2) {
    
    $params[$parts[$i]] = $parts[$i + 1];
}

$_GET = $params;

$method = $_GET["method"];
$action = $_GET["action"];

$name = $_GET["name"];

if ($action == 'table') {
    $actionGet = "t";
}

$filename = "http://" . $_SERVER['SERVER_NAME'] . DIRAPI . $method . "Data.php?$actionGet=$name";
echo $objectTools->getCurlJson($filename);

?> 