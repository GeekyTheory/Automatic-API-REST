<table id="customTable" class="table table-striped table-bordered table-condensed" cellpadding="0" cellspacing="0" style="margin-top:1%;">
        <tr>       
            <td width="10%">
                <h4><b>Table</b></h4>
            </td>
            <td width="40%">
                <?php
                    //TABLA
                    echo $_GET["t"];
                ?>
            </td>
            <td width="10%">
                <h4><b>Columns</b></h4>
            </td>
            <td width="40%">
                <!--CAMPOS-->
                <div id ="campos">
                    
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <h4><b>API Link</b></h4>
            </td>
            <td colspan="3">             
                <a target= "_blank" id="camp_link"><span id="camp"></span></a>
            </td>
        </tr>
        <tr>
            <td>
                <h4><b>Limit</b></h4>
            </td>               
            <td>
                <span>Min: </span><input id="min" type="text" maxlength="4" size="4" oninput="customSelect('<?php echo $num_campos;?>')">
                <span>Max: </span><input id="max" type="text" maxlength="4" size="4" oninput="customSelect('<?php echo $num_campos;?>')">
            </td>
            <td>
                <h4><b>Order By</b></h4>
            </td>               
            <td>
                <select id="order" onchange="customSelect('<?php echo $num_campos;?>')">
                    <option value="default">No Order By</option>
                    <?php
                        for($i=0; $i<count($fields);$i++){
                            echo '<option id="" value="'.$fields[$i].'">'.$fields[$i].'</option>';
                        }
                    ?>
                </select>
                <select id="sense" onchange="customSelect('<?php echo $num_campos;?>')">
                    <option value="asc">ASC</option>
                    <option value="desc">DESC</option>
                </select>
            </td>
        </tr>
        <tr >
            <td>
                <h4><b>Where</b></h4>
            </td>               
            <td id="whererow" colspan="3">
               <div id="wherebox">

                   <select id="where" onchange="customSelect('<?php echo $num_campos;?>')">
                        <option value="default">No Where</option>
                        <?php
                            for($i=0; $i<count($fields);$i++){
                                echo '<option id="" value="'.$fields[$i].'">'.$fields[$i].'</option>';
                            }
                        ?>
                    </select>

                    <select id="operation" onchange="customSelect('<?php echo $num_campos;?>')">
                        <option value="=">=</option>
                        <option value="<>"><></option>
                        <option value=">">></option>
                        <option value="<"><</option>
                    </select>

                    <select id="type" onchange="customSelect('<?php echo $num_campos;?>')">
                        <option value="Text">Text</option>
                        <option value="Numeric">Numeric</option>
                    </select>

                    <input id="condition" type="text" maxlength="200" size="50" oninput="customSelect('<?php echo $num_campos;?>')">

                    <select id="added" onchange="customSelect('<?php echo $num_campos;?>')">
                        <option value="default">More...</option>
                        <option value="and">AND</option>
                        <option value="or">OR</option>
                        <option value="delete">Delete</option>
                    </select>
               </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <!--Table-->
                <button type="button" class="btn btn-theme btn-lg">
                    <a style="color:#fff;" target= "_blank" id="table_link">Show Custom Table</span></a>
                </button>
                
            </td>
            <td colspan="2">
                <!--Table-->
                <button type="button" class="btn btn-theme btn-lg">
                    <a  style="color:#fff;" target= "_blank" id="tree_link">Show JSON Tree</span></a>
                </button>
            </td>
        </tr>
        
    </table>
