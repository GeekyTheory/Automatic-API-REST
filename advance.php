<?php
require_once 'inc/functions.php';
require_once 'mod/header.php';

$urlNow = "http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['PHP_SELF'];
$pathFolder = dirname($urlNow);

echo $pathFolder."/getJson.php?t=".$_GET["t"]."&c=".$_GET["c"];
if(isset($_GET["t"])){
    $objectTools = new Tools();
    $fields = $objectTools->getFieldsByTable($_GET["t"]);
    
}
?>


<label>
    <h3>Limit</h3>
    <span>Min</span><input id="" type="number" maxlength="4" size="4">    
    <span>Max</span><input id="" type="number" maxlength="4" size="4">    
</label>
<label>
    <h3>Order</h3>
    <span>Order By</span>
    <select>
        <option id="" value="default">No Order By</option>
        <?php
            for($i=0; $i<count($fields);$i++){
                echo '<option id="" value="'.$i.'">'.$fields[$i].'</option>';
            }
        ?>
    </select>
    <select name="sentido">
        <option value="asc">ASC</option>
        <option value="desc">DESC</option>
    </select>
    <span></span>
</label>

