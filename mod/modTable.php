<?php

echo '<table class="table table-striped table-bordered table-condensed" cellpadding="0" cellspacing="0">
            <thead>

                <th>Table Name</th>
                <th>API Link</th>
                <th>Items</th>
                <th>Show Table</th>
                <th>Privacity</th>
            </thead>
        <tbody>';
    $count_private = 0;
    while($tabla = mysqli_fetch_row($tablas)) {
    $nombreTabla = $tabla[0];
        
        echo '<tr>';
            echo '<td>';
                echo "<a href='?t=".$nombreTabla."'>".$nombreTabla."</a>";
            echo '</td>';
            
            echo '<td>';
                $urlJsonAPI = $pathFolderAPI."/api/get/".$nombreTabla."/";
                echo '<a target="_blank" href="'.$urlJsonAPI.'">';
                echo $urlJsonAPI;
                echo '</a>';
            echo '</td>';
            
            echo '<td>';
                $sql = "Select * FROM ".$nombreTabla.";";
                $result = mysqli_query($conexion,$sql);
                echo $numero = mysqli_num_rows($result);
            echo '</td>';
        
            echo '<td>';
                $urlJson = $pathFolder."/getData.php?f=table&t=".$nombreTabla;
                echo '<a href="'.$urlJson.'" style="color:#fff;" target= "_blank">';
                echo '<img width="30px" src="assets/img/tabla.jpg">';       
                echo '</img>';
                echo '</a>';
            echo '</td>';
        
            echo '<td>';
        
                if($blacklist->existItem("G", $nombreTabla, "*")){
                    echo "<input id='private$count_private' type='checkbox' checked=true onchange='updatePrivacity(\"$count_private\",\"G\",\"$nombreTabla\",\"*\")'>";
                }else{
                    echo "<input id='private$count_private' type='checkbox' onchange='updatePrivacity(\"$count_private\",\"G\",\"$nombreTabla\",\"*\")'>";
                }
                $count_private++;

            echo '</td>';
        echo '</tr>';
    }
     echo '</tbody></table><br />';

