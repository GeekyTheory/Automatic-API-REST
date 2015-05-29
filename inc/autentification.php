<?php
/**
* Automatic Api Rest
* 
* @package  Automatic Api Rest
* @author   Alejandro Esquiva Rodríguez [@alex_esquiva] <alejandro@geekytheory.com>
* @license  Apache License, Version 2.0
* @link     https://github.com/GeekyTheory/Automatic-API-REST
*/
session_start();
if($_SESSION['useradmin']!=USERADMIN || $_SESSION['passadmin']!=PASSADMIN){
    //REEDIRIGIR
    header('Location: login.php');
    die();
}
?>