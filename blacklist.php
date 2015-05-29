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
require_once("inc/autentification.php");
require_once 'mod/header.php';

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
