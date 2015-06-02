<?php
/**
 * Automatic Api Rest
 *
 * @package  Automatic Api Rest
 * @author   Alejandro Esquiva Rodríguez [@alex_esquiva] <alejandro@geekytheory.com>
 * @license  Apache License, Version 2.0
 * @link     https://github.com/GeekyTheory/Automatic-API-REST
 */

require_once 'inc/functions.php';
$objectTools = new Tools();

// QUERY Variables
$method = "";
$table = "";
$columns="";
$order="";
$sort="";
$limit="";
$where="";
$format="";
$option="";

if(isset($_GET["t"])) $table = $_GET["t"];
if(isset($_GET["c"])) $columns = $_GET["c"];
if(isset($_GET["o"])) $order = $_GET["o"];
if(isset($_GET["s"])) $sort = $_GET["s"];
if(isset($_GET["l"])) $limit = $_GET["l"];
if(isset($_GET["w"])) $where = $_GET["w"];
if(isset($_GET["f"])) $format = $_GET["f"];
if(isset($_GET["opt"])) $option = $_GET["opt"];

$objectTools->getData($table,$columns,$order,$sort,$limit,$where,$format,$option);