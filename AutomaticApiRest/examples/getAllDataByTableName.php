<?php
//Get JSON from Automatic Api Rest
$json = file_get_contents("http://localhost:80/AutomaticAPI/getData.php?f=json&t=badges");
//Decode JSON
$json = json_decode($json);
//For this example we have a table called badges, we are going to list all the items.
for($i=0;$i<count($json);$i++){
    echo $json[$i]->title."<br>";
}
