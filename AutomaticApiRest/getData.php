<?php


require_once 'inc/functions.php';
$blacklist = new BlackList();
$objectTools = new Tools();

/**
 * check the blacklist
 */
if(isset($_GET["c"])){
    $exist = $blacklist->existItem("G",$_GET["t"],"*"); 
    if(!$exist){
        $exist = $blacklist->existItem("G",$_GET["t"],$_GET["c"]);
    }
}else{
    $exist = $blacklist->existItem("G",$_GET["t"],"*"); 
}

/**
 * If the query is not allowed -> die
 */
if($exist){
    die($objectTools->JSONError(401));
}

/**
 * Create the sql sentence with get parameters
 */

if(isset($_GET["c"])){
    
    //get the fields which are not in the black list
    $fields = explode(",", $_GET["c"]);
    $fields_allowed = "";
    for($i=0;$i<count($fields);$i++){
        if(!$blacklist->existItem("G", $_GET["t"], $fields[$i])){
            if($fields_allowed == ""){
                $fields_allowed = $fields[$i];
            }else{
                $fields_allowed = $fields_allowed.",".$fields[$i];
            }
        }
    }
    
    
    if(isset($_GET["w"])){
        $where = str_replace(":","=",$_GET["w"]);
    }
    
    if(isset($_GET["o"])){
        if(isset($_GET["l"])){
            if(isset($_GET["w"])){
                $sql = "SELECT ".$fields_allowed." FROM ".$_GET["t"]." WHERE $where ORDER BY ".$_GET["o"]." ".$_GET["s"]." LIMIT ".$_GET["l"].";";
            }else{
                $sql = "SELECT ".$fields_allowed." FROM ".$_GET["t"]." ORDER BY ".$_GET["o"]." ".$_GET["s"]." LIMIT ".$_GET["l"].";";
            }
        }else{
            if(isset($_GET["w"])){
                $sql = "SELECT ".$fields_allowed." FROM ".$_GET["t"]." WHERE $where ORDER BY ".$_GET["o"]." ".$_GET["s"].";";
            }else{
                $sql = "SELECT ".$fields_allowed." FROM ".$_GET["t"]." ORDER BY ".$_GET["o"]." ".$_GET["s"].";";
            }
        }
    }else{
        if(isset($_GET["l"])){
            if(isset($_GET["w"])){
                $sql = "SELECT ".$fields_allowed." FROM ".$_GET["t"]." WHERE $where LIMIT ".$_GET["l"].";";
            }else{
                $sql = "SELECT ".$fields_allowed." FROM ".$_GET["t"]." LIMIT ".$_GET["l"].";";
            }
        }else{
            if(isset($_GET["w"])){
                $sql = "SELECT ".$fields_allowed." FROM ".$_GET["t"]." WHERE $where;";
            }else{
                $sql = "SELECT ".$fields_allowed." FROM ".$_GET["t"].";";
            }
        }    
    }

}else{
    //get the fields which are not in the black list
    $fields = $objectTools->getFieldsByTable($_GET["t"]);
    $fields_allowed = "";
    for($i=0;$i<count($fields);$i++){
        if(!$blacklist->existItem("G", $_GET["t"], $fields[$i])){
            if($fields_allowed == ""){
                $fields_allowed = $fields[$i];
            }else{
                $fields_allowed = $fields_allowed.",".$fields[$i];
            }
        }
    }
    
    if(isset($_GET["o"])){
        if(isset($_GET["l"])){
            $sql = "SELECT $fields_allowed FROM ".$_GET["t"]." ORDER BY ".$_GET["o"]." ".$_GET["s"]." LIMIT ".$_GET["l"].";";
        }else{
            $sql = "SELECT $fields_allowed FROM ".$_GET["t"]." ORDER BY ".$_GET["o"]." ".$_GET["s"].";";
        }
    }else{
        if(isset($_GET["l"])){
            $sql = "SELECT $fields_allowed FROM ".$_GET["t"]." LIMIT ".$_GET["l"].";";
        }else{
            $sql = "SELECT $fields_allowed FROM ".$_GET["t"].";";
        }    
    }
}

$function = "";

if(isset($_GET["f"])){
    $function = $_GET["f"];
}else{
    $function = "json";
}

if(isset($_GET["opt"])){
    $opt = $_GET["opt"];
}else{
    $opt = "";
}

if($function=="json"){
    header('Content-Type: application/json');

    if($opt == "numItem"){
        $conexion = $objectTools->connectDB();
        $result = mysqli_query($conexion,$sql);
        $rawdata = mysqli_num_rows($result);
        $objectTools->disconnectDB($conexion);
    }else{
        $rawdata = $objectTools->getArraySQL($sql);
    }

    if(empty($rawdata)) die ($objectTools->JSONError (302));

    $indices = "";
    $count = 0;
    for($i=1;$i<count($rawdata[0]);$i=$i+2){
        next($rawdata[0]);
        $indices[$count] = key($rawdata[0]);
        $count++;
        next($rawdata[0]);
    }
    $json["data"] = $rawdata;
    $json["dbInfo"] = $indices;

    //Clean the page
    ob_end_clean();
    //Output
    echo json_encode($json);
    
}else if($function=="xml"){

}else if($function=="table"){
    require_once 'mod/header.php';
    $objectTools->displayTable($sql);
    require_once 'mod/footer.php';
}else if($function=="tree"){
    require_once 'mod/header.php';
    $rawdata = $objectTools->getArraySQL($sql);

    $keyarray = "";
    $valuearray = "";
    for($i=0;$i<count($rawdata[0]);$i++){
        $keyarray[$i] = key($rawdata[0]);
        next($rawdata[0]);
    }
    for($i=0;$i<count($rawdata);$i++){
        for($j=0;$j<count($rawdata[$i])/2;$j++){
            $valuearray[$i][$j] = $rawdata[$i][$j];
        }
    }
    $data = "";

    echo "<ol>";
    for($i=0;$i<count($valuearray);$i++){
            echo "<li>";
            echo "<br>";
                echo "<ul>";
        $count = 0;
        for($j=0;$j<count($valuearray[$i]);$j++){
                echo "<li><b>".$keyarray[$count]."</b>: ".$valuearray[$i][$j]."</li>";
                $count++;
                echo "<li><b>".$keyarray[$count]."</b>: ".$valuearray[$i][$j]."</li>";
                $count++;
        }
                echo "</ul>";
            echo "</li>";
    }
    echo "</ol>";
    require_once 'mod/footer.php';
}else{
    die($objectTools->JSONError(301));
}

