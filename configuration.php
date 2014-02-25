<meta charset="utf-8">  
<?php
    if(isset($_POST["server"]) && isset($_POST["user"]) && isset($_POST["pass"]) && isset($_POST["bd"])){
        //ACTUALIZAMOS EL ARCHIVO xml/config.xml
        $configArray = array(   "SERVER"=>$_POST["server"],
                        "USER"=>$_POST["user"],
                        "PASS"=>$_POST["pass"],
                        "DB"=>$_POST["bd"]
                    ); 

        $buffer='<?xml version="1.0" encoding="utf-8"?> 
         <!--CONFIG AUTOMATIC API REST--> 
             <SERVER_CONFIG>'; 

        while (list ($etiqueta, $valor) = each ($configArray)): 
          $buffer.="<$etiqueta>$valor</$etiqueta>"; 
        endwhile; 

        $buffer.="</SERVER_CONFIG>"; 
        $file=fopen("xml/Config.xml","w+"); 
        fwrite ($file,$buffer); 
        fclose($file); 
        
        
    }
    
    
?>

<?php

//PROBAMOS LA CONEXIÓN A LA BASE DE DATOS
require_once 'inc/functions.php';
echo "PRUEBA DE CONEXIÓN: ";
$objectTools = new Tools();
$bool = $objectTools->tryConnection();
if($bool){
    echo "<span style='color:#00ff00;'>OK</span>";
}else{
    echo "<span style='color:#ff0000;'>ERROR</span>";
}


//Extraemos los datos de configuración de xml/config.xml
$xml = file_get_contents("xml/config.xml");
$DOM = new DOMDocument('1.0', 'utf-8');
$DOM->loadXML($xml);
$config = $DOM->getElementsByTagName('SERVER_CONFIG')->item(0);
$server = $config->getElementsByTagName("SERVER")->item(0)->nodeValue;
$user = $config->getElementsByTagName("USER")->item(0)->nodeValue;
$pass = $config->getElementsByTagName("PASS")->item(0)->nodeValue;
$db = $config->getElementsByTagName("DB")->item(0)->nodeValue;
?>
<form name="formulario" method="post" action="">
    <label>SERVER
        <input type="text" name="server" value="<?php echo $server; ?>">
    </label>
    <br>
    <label>USER
        <input type="text" name="user" value="<?php echo $user; ?>">
    </label>
    <br>
    <label>PASS
        <input type="text" name="pass" value="<?php echo $pass; ?>">
    </label>
    <br>
    <label>BD
        <input type="text" name="bd" value="<?php echo $db; ?>">
    </label>
    <br><input type="submit" value="Actualizar Credenciales">
    <br>
</form>

