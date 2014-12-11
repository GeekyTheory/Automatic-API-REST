<?php
$object = new Tools();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AUTOMATIC API REST</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/chart.js"></script>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script lang="javascript">
    
    function updatePrivacity(index,type,table,column){
        //alert(table+" "+column);
        var check = document.getElementById("private"+index).checked;
        var action = "";

        if(check){
            action="add";
        }else{
            action="delete";
        }  
        
        var url = 'action.php?a='+action+'&type='+type+'&table='+table+"&column="+column;
        var list = $.ajax({
            url: url, //indicamos la ruta donde se genera la hora
            dataType: 'text',//indicamos que es de tipo texto plano
            async: false     //ponemos el parámetro asyn a falso
        }).responseText;  
    }
    </script>
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <a href="./"><img  class="fa fa-bolt" src="assets/img/logo.png" style="width:100px;" ></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="./">Home</a></li>
              <li class="active"><a href="blacklist.php">Black List</a></li>
              <li class="active"><a href="http://goo.gl/hKTmM2" target="_blank">GitHub</a></li>
              <li class="active"><a target="_blank" href="https://github.com/GeekyTheory/Automatic-API-REST/wiki">Wiki</a></li>
              <li class="active"><a target="_blank" href="https://github.com/GeekyTheory/Automatic-API-REST/issues">Issues</a></li>
              <li class="active"><a href="close.php">Close</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
