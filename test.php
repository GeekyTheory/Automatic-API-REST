<?php

require_once 'inc/functions.php';
$objectTool = new Tools();
echo $objectTool->getCurlJson("http://localhost/api/post/countrylanguage/","Language=amp&CountryCode=AMP");