<?php
include_once 'functions.php';
/**
 * This class provide all the methods to manage our data base
 * 
 * @package  Automatic Api Rest
 * @author   Alejandro Esquiva Rodríguez [@alex_esquiva] <alejandro@geekytheory.com>
 * @license  Apache License, Version 2.0
 * @link     https://github.com/GeekyTheory/Automatic-API-REST
 */
class Tools{
    /**
     * Connect the data base with the parameters from the config.php, return the instance
     * @return type
     */
    function connectDB(){
        $conexion = mysqli_connect(SERVER, USER, PASS, DB);
        if($conexion){
        }else{
               $this->displayError("Error", "Conection refused");
        }
        mysqli_query ($conexion,"SET NAMES 'utf8'");
        mysqli_set_charset($conexion, "utf8");
        return $conexion;
    }
    /**
     * Try connection
     * @return type
     */
    function tryConnection(){
        //Extraemos los datos de configuración de xml/config.xml
        $xml = file_get_contents("xml/config.xml");
        $DOM = new DOMDocument('1.0', 'utf-8');
        $DOM->loadXML($xml);
        $config = $DOM->getElementsByTagName('SERVER_CONFIG')->item(0);
        $server = $config->getElementsByTagName("SERVER")->item(0)->nodeValue;
        $user = $config->getElementsByTagName("USER")->item(0)->nodeValue;
        $pass = $config->getElementsByTagName("PASS")->item(0)->nodeValue;
        $db = $config->getElementsByTagName("DB")->item(0)->nodeValue;
        
        
        $conexion = mysqli_connect(SERVER, USER, PASS, DB);
        return $conexion;
    }
    /**
     * Disconnect our data base, return a boolean variable with the state
     * @param type $conexion
     * @return type
     */
    function disconnectDB($conexion){
       $close = mysqli_close($conexion);
                if($close){
                }else{
                }	
        return $close;
    }
    /**
     * Return one multidimensional array from a SQL sentence
     * @param type $sql
     * @return type
     */
    function getArraySQL($sql){
        //Creamos la conexiÃ³n
        $conexion = $this->connectDB();
        //generamos la consulta
        if(!$result = mysqli_query($conexion, $sql)) die($this->JSONError(301,  mysqli_error($conexion)));
        $rawdata = array();
        //guardamos en un array multidimensional todos los datos de la consulta
        $i=0;
        while($row = mysqli_fetch_array($result))
        {
            $rawdata[$i] = $row;
            $i++;
        }
        $this->disconnectDB($conexion);
        return $rawdata;
    }
    
    /**
     * Set data from sql sentence
     * @param type $sql
     */
    function setDataBySQL($sql){
    // Init Connexion
	$conexion = $this->connectDB();
	//Set query
	if(!$result = mysqli_query($conexion, $sql)) die($this->JSONError(303,  mysqli_error($conexion)));
	$this->disconnectDB($conexion);
        return $result;
    }
    
    /**
     * Display a table from SQL sentence
     * @param type $sql
     */
    function displayTable($sql){
	//Creamos la conexión
	$conexion = $this->connectDB();
	//generamos la consulta
	if(!$result = mysqli_query($conexion, $sql)) die();
	$rawdata = array();
	//guardamos en un array multidimensional todos los datos de la consulta
	$i=0;
	while($row = mysqli_fetch_array($result))
	{
	    $rawdata[$i] = $row;
	    $i++;
	}
	$this->disconnectDB($conexion);

	//DIBUJAMOS LA TABLA
	echo '<table class="table table-striped table-bordered table-condensed">';
	$columnas = count($rawdata[0])/2;
	//echo $columnas;
	$filas = count($rawdata);
	//echo "<br>".$filas."<br>";
	//Añadimos los titulos
		
	for($i=1;$i<count($rawdata[0]);$i=$i+2){
		next($rawdata[0]);
		echo "<th><b>".key($rawdata[0])."</b></th>";
		next($rawdata[0]);
	}
	for($i=0;$i<$filas;$i++){
		echo "<tr>";
		for($j=0;$j<$columnas;$j++){
			echo "<td>".$rawdata[$i][$j]."</td>";
			
		}
		echo "</tr>";
	}		
	echo '</table>';
    }
    /**
     * Return all the columns from a table
     * @param type $table
     * @return type
     */
    function getFieldsByTable($table){
        
        $conexion = $this->connectDB();
    	
        # Consulta SQL que devuelve los campos de cada tabla
        $campos = mysqli_query($conexion,'SHOW COLUMNS FROM '.$table) or die($this->JSONError(301));

        $this->disconnectDB($conexion);
        
        $count = 0;            
        # Muestra como tabla HTML los detalles de los campos de la tabla correspondiente
        if(mysqli_num_rows($campos)) {
            while($detalles = mysqli_fetch_row($campos)) {
                $myArray[$count] = $detalles[0];   
                $count++;
            }
        }
        
        return $myArray;

    }
    
    /**
     * Display a box with an error
     * @param type $title
     * @param type $message
     */
    function displayError($title,$message){
            ?>
            <div class="row">
                <div class="col-sm-4">

                </div>
                <div class="col-sm-4">
                    <div class="page-header">
                        <h1><?php echo $title; ?></h1>
                    </div>
                    <div class="alert alert-info">
                        <?php echo $message; ?>
                    </div>
                </div>
                <div class="col-sm-4">

                </div>
            </div>
            <?php
    }
    
    function JSONError($code,$details = ""){
        $json = "";
        
        if($code == 401){
            $error[0] = array("code" => $code,"message" => "Unauthorized");
            $json = array ("errors" => $error);
        }
        if($code == 301){
            $error[0] = array("code" => $code,"message" => "Invalid Parameters: ".$details);
            $json = array ("errors" => $error);
        }
        if($code == 302){
            $error[0]= array("code" => $code,"message" => "Empty Data");
            $json = array ("errors" => $error);
        }
        if($code == 303){
            $error[0]= array("code" => $code,"message" => "Insert data error: ".$details);
            $json = array ("errors" => $error);
        }
        echo json_encode($json);
        
        
    }
    
    function getCurlJson($url,$variablesJson=''){
        $ch = curl_init();                    // Initiate cURL
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $variablesJson);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          //  'Content-Type: application/json',
            //'Content-Length: ' . strlen($variablesJson))
        //);

        $result = curl_exec($ch);
	    return $result;
    }

    function getData($table,$columns="",$order="",$sort="",$limit="",$where="",$format="",$option=""){
		
        $blacklist = new BlackList();

        /**
         * check the blacklist
         */
        if($columns!=""){
            $exist = $blacklist->existItem("G",$table,"*");
            if(!$exist){
                $exist = $blacklist->existItem("G",$table,$columns);
            }
        }else{
            $exist = $blacklist->existItem("G",$table,"*");
        }

        /**
         * If the query is not allowed -> die
         */
        if($exist){
            die($this->JSONError(401));
        }

        /**
         * Create the sql sentence with the input parameters
         */
		
	if (strpos($columns,'?') !== false) {
		$columns = "";
	}

        if($columns!=""){

            //get the fields which are not in the black list
            $fields = explode(",", $columns);
            $fields_allowed = "";
            for($i=0;$i<count($fields);$i++){
                if(!$blacklist->existItem("G", $table, $fields[$i])){
                    if($fields_allowed == ""){
                        $fields_allowed = $fields[$i];
                    }else{
                        $fields_allowed = $fields_allowed.",".$fields[$i];
                    }
                }
            }


            if($where!=""){
                $where = str_replace(":","=",$where);
            }

            if($order!=""){
                if($limit!=""){
                    if($where!=""){
                        $sql = "SELECT ".$fields_allowed." FROM ".$table." WHERE $where ORDER BY ".$order." ".$sort." LIMIT ".$limit.";";
                    }else{
                        $sql = "SELECT ".$fields_allowed." FROM ".$table." ORDER BY ".$order." ".$sort." LIMIT ".$limit.";";
                    }
                }else{
                    if($where!=""){
                        $sql = "SELECT ".$fields_allowed." FROM ".$table." WHERE $where ORDER BY ".$order." ".$sort.";";
                    }else{
                        $sql = "SELECT ".$fields_allowed." FROM ".$table." ORDER BY ".$order." ".$sort.";";
                    }
                }
            }else{
                if($limit!=""){
                    if($where!=""){
                        $sql = "SELECT ".$fields_allowed." FROM ".$table." WHERE $where LIMIT ".$limit.";";
                    }else{
                        $sql = "SELECT ".$fields_allowed." FROM ".$table." LIMIT ".$limit.";";
                    }
                }else{
                    if($where!=""){
                        $sql = "SELECT ".$fields_allowed." FROM ".$table." WHERE $where;";
                    }else{
                        $sql = "SELECT ".$fields_allowed." FROM ".$table.";";
                    }
                }
            }

        }else{
            //get the fields which are not in the black list
            $fields = $this->getFieldsByTable($table);
            $fields_allowed = "";
            for($i=0;$i<count($fields);$i++){
                if(!$blacklist->existItem("G", $table, $fields[$i])){
                    if($fields_allowed == ""){
                        $fields_allowed = $fields[$i];
                    }else{
                        $fields_allowed = $fields_allowed.",".$fields[$i];
                    }
                }
            }

            if($order!=""){
                if($limit!=""){
                    $sql = "SELECT $fields_allowed FROM ".$table." ORDER BY ".$order." ".$sort." LIMIT ".$limit.";";
                }else{
                    $sql = "SELECT $fields_allowed FROM ".$table." ORDER BY ".$order." ".$sort.";";
                }
            }else{
                if($limit!=""){
                    $sql = "SELECT $fields_allowed FROM ".$table." LIMIT ".$limit.";";
                }else{
                    $sql = "SELECT $fields_allowed FROM ".$table.";";
                }
            }
        }

        $function = "";

        if($format!=""){
            $function = $format;
        }else{
            $function = "json";
        }

        if($option!=""){
            $opt = $option;
        }else{
            $opt = "";
        }

        if($function=="json"){
            header('Content-Type: application/json');

            if($opt == "numItem"){
                $conexion = $this->connectDB();
                $result = mysqli_query($conexion,$sql);
                $rawdata = mysqli_num_rows($result);
                $this->disconnectDB($conexion);
            }else{
                $rawdata = $this->getArraySQL($sql);
            }

            if(empty($rawdata)) die ($this->JSONError (302));

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
            $this->displayTable($sql);
            require_once 'mod/footer.php';
        }else if($function=="tree"){
            require_once 'mod/header.php';
            $rawdata = $this->getArraySQL($sql);

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
            die($this->JSONError(301));
        }

    }

    function postData($table,$post_parameters){

        $blacklist = new BlackList();
        /**
         * check the blacklist
         */
        $values = "";
        $columns = "";
        $values_array = "";
        $columns_array = "";
        $first_iteration = true;
        $counter = 0;
        while( list( $field, $value ) = each( $post_parameters )) {
            // Detect if it is a text or number
            $value = (is_numeric($value) ? $value : "'".$value."'");
            // join the string with (,) ie: value1,value2,value3
            $values .= ($first_iteration ? $value : ",".$value);
            $columns .= ($first_iteration  ? $field : ",".$field);
            $values_array[$counter] = $value;
            $columns_array[$counter] = $field;
            $first_iteration = false;
            $counter++;
        }

        if($blacklist->existItem("G",$table,"*")) die($this->JSONError(401));
        if(!empty($post_parameters)){
            for($i=0;$i<count($columns_array);$i++){
                if ($blacklist->existItem("G", $table, $columns_array[$i])) die($this->JSONError(401));
            }
        }

        /**
         * Create the sql sentence with the post parameters
         */

        if($values != ""){
            $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        }

        $function = "json";
        if($function=="json"){
            header('Content-Type: application/json');

            $result = $this->setDataBySQL($sql);

            if(!$result) die ($this->JSONError (303));
            $indices = "";
            $rawdata = "";
            var_dump($columns_array);
            for($i=0;$i<count($columns_array);$i++){
                $rawdata[0][$i] = $values_array[$i];
                $rawdata[0][$columns_array[$i]] = $values_array[$i];
                $indices[$i] = $columns_array[$i];
                $i++;
            }

            $json["data"] = $rawdata;
            $json["dbInfo"] = $indices;

            echo json_encode($json);
        }else if($function=="xml"){

        }else{
            die($this->JSONError(301));
        }
    }

}
?>
