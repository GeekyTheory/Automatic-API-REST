<?php
/**
 * Automatic Api Rest
 *
 * @package  Automatic Api Rest
 * @author   Alejandro Esquiva Rodríguez [@alex_esquiva] <alejandro@geekytheory.com>
 * @license  Apache License, Version 2.0
 * @link     https://github.com/GeekyTheory/Automatic-API-REST
 */

require_once 'config.php';
$usr4 = "";
if(isset($_POST["user"])){
    $user = $_POST["user"];
    $pass = $_POST["password"];
    $msg_error = "";

    if($user == USERADMIN){
        if($pass == PASSADMIN){
            //HABILITAR SESSION
            session_start();
            $_SESSION['useradmin'] = $user;
            $_SESSION['passadmin'] = $pass;

            //REEDIRIGIR
            header('Location: ./');
        }else{
            $msg_error = "INCORRECT PASS";
        }
    }else{
            $msg_error = "INCORRECT USER";
    }

    echo "<script>alert('$msg_error');</script>";
}
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> 
<html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Login and Registration Form with HTML5 and CSS3</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Automatic Api Rest" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="Login/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="Login/css/style.css" />
		<link rel="stylesheet" type="text/css" href="Login/css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <header>
                
            </header>
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form action="" method="POST" autocomplete="on"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="user" class="uname" data-icon="u" > Your username </label>
                                    <input id="usrid" name="user" required="required" type="text" placeholder="myusername"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                
                                <p class="login button"> 
                                    <input type="submit" value="Login" /> 
								</p>
                            </form>
                        </div>		
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>
