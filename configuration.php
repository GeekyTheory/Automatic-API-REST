<?php
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
<form>
    <label>SERVER
        <input type="text" value="<?php echo $server; ?>">
    </label>
    <br>
    <label>USER
        <input type="text" value="<?php echo $user; ?>">
    </label>
    <br>
    <label>PASS
        <input type="text" value="<?php echo $pass; ?>">
    </label>
    <br>
    <label>BD
        <input type="text" value="<?php echo $db; ?>">
    </label>
    <br>
</form>