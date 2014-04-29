<?php
require_once 'inc/functions.php';
require_once("autentification.php");
require_once 'mod/header.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$blacklist = new BlackList();
$rawdata = $blacklist->getAllInfo();
if(empty($rawdata)){
    $tool = new Tools();
    $tool->displayError("Not Found", "Empty BlackList");
}else{
    $blacklist->displayTable($rawdata);
}

 require_once 'mod/footer.php';
?>
