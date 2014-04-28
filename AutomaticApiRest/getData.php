<?php



require_once 'inc/functions.php';
$blacklist = new BlackList();
if(isset($_GET["c"])){
    $exist = $blacklist->existItem("G",$_GET["t"],"*"); 
    if(!$exist){
        $exist = $blacklist->existItem("G",$_GET["t"],$_GET["c"]);
    }
}else{
    $exist = $blacklist->existItem("G",$_GET["t"],"*"); 
}

if($exist){
    die("Private Data");
}

$objectTools = new Tools();

if(isset($_GET["c"])){
    if(isset($_GET["o"])){
        if(isset($_GET["l"])){
            $sql = "SELECT ".$_GET["c"]." FROM ".$_GET["t"]." ORDER BY ".$_GET["o"]." ".$_GET["s"]." LIMIT ".$_GET["l"].";";
        }else{
            $sql = "SELECT ".$_GET["c"]." FROM ".$_GET["t"]." ORDER BY ".$_GET["o"]." ".$_GET["s"].";";
        }
    }else{
        if(isset($_GET["l"])){
            $sql = "SELECT ".$_GET["c"]." FROM ".$_GET["t"]." LIMIT ".$_GET["l"].";";
        }else{
            $sql = "SELECT ".$_GET["c"]." FROM ".$_GET["t"].";";
        }    
    }

}else{
    if(isset($_GET["o"])){
        if(isset($_GET["l"])){
            $sql = "SELECT * FROM ".$_GET["t"]." ORDER BY ".$_GET["o"]." ".$_GET["s"]." LIMIT ".$_GET["l"].";";
        }else{
            $sql = "SELECT * FROM ".$_GET["t"]." ORDER BY ".$_GET["o"]." ".$_GET["s"].";";
        }
    }else{
        if(isset($_GET["l"])){
            $sql = "SELECT * FROM ".$_GET["t"]." LIMIT ".$_GET["l"].";";
        }else{
            $sql = "SELECT * FROM ".$_GET["t"].";";
        }    
    }
}

if(isset($_GET["f"])){
    if($_GET["f"]=="json"){
        $rawdata = $objectTools->getArraySQL($sql);
        
        echo json_encode($rawdata);
    }
    if($_GET["f"]=="xml"){

    }
    if($_GET["f"]=="table"){
        require_once 'mod/header.php';
        $objectTools->displayTable($sql);
        require_once 'mod/footer.php';
    }
    if($_GET["f"]=="tree"){
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
    }
}
