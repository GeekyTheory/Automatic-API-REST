<?php
session_start();
if($_SESSION['useradmin']!=USERADMIN || $_SESSION['passadmin']!=PASSADMIN){
    //REEDIRIGIR
    header('Location: login.php');
    die();
}
?>