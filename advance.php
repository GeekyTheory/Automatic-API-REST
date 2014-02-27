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

    <table class="table table-striped table-bordered table-condensed" cellpadding="0" cellspacing="0">
        <tr>       
            <td>
                <h3>Table</h3>
            </td>
            <td>
                <?php
                    //TABLA
                    echo $_GET["t"];
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <h3>Fields</h3>
            </td>
            <td>
                <!--CAMPOS-->
                <div id ="campos">
                    asas
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <h3>API LINK</h3>
            </td>
            <td>             
                <a target= "_blank" id="camp_link">asas<span id="camp">asasas</span></a>
            </td>
        </tr>
        <tr>
            <td>
                <h3>Limit</h3>
            </td>               
            <td>
                <span>Min</span><input id="" type="number" maxlength="4" size="4">   
                <span>Max</span><input id="" type="number" maxlength="4" size="4">    
            </td>
        </tr>
        <tr>
            <td>
                <h3>Order By</h3>
            </td>               
            <td>
            <select>
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
            </td>
        </tr>
        <tr>
            <td>
                <!--Table-->
                <a target= "_blank" id="table_link">Show Custom Table</span></a>
            </td>
            <td>
                <!--Table-->
                <a target= "_blank" id="advance_link">Advance Custom Results</span></a>
            </td>
        </tr>
    </table>


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

