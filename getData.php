<?php



require_once 'inc/functions.php';



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

    }
}
