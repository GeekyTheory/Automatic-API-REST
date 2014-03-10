
<?php
require_once 'inc/functions.php';
require_once 'mod/header.php';
$objectTools = new Tools();

if(isset($_POST["server"]) && isset($_POST["user"]) && isset($_POST["pass"]) && isset($_POST["bd"])){

    $objectTools->setCredentials($_POST["server"],$_POST["user"],$_POST["pass"],$_POST["bd"]);          
}    

//PROBAMOS LA CONEXIÓN A LA BASE DE DATOS
require_once 'inc/functions.php';
echo "PRUEBA DE CONEXIÓN: ";

//PONEMOS EL INIT A 1
$objectTools->setInitXML(1);

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
<table id="customTable" class="table table-striped table-bordered table-condensed" cellpadding="0" cellspacing="0" style="margin-top:1%; margin-left:25%; width:50%;">
        <tr>       
            <td width="10%">
                <h4><b>SERVER</b></h4>
            </td>
            <td width="10%">
                <input type="text" name="server" value="<?php echo $server; ?>">
            </td>
        </tr>
        <tr>
            <td width="10%">
                <h4><b>USER</b></h4>
            </td>
            <td width="10%">
               <input type="text" name="user" value="<?php echo $user; ?>">
            </td>
        </tr>
        <tr>
            <td width="10%">
                <h4><b>PASSWORD</b></h4>
            </td>
            <td width="10%">
              <input type="text" name="pass" value="<?php echo $pass; ?>">
            </td>
        </tr>
        <tr>
            <td width="10%">
                <h4><b>DATA BASE</b></h4>
            </td>
            <td width="10%">
               <input type="text" name="bd" value="<?php echo $db; ?>">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit">
            </td>
        </tr>
    </table>
</form>

<?php

 require_once 'mod/footer.php';

 ?>