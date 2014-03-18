<?php
include_once 'functions.php';
class Tools{
    function connectDB(){
        
        $conexion = mysqli_connect(SERVER, USER, PASS, DB);
        if($conexion){
        }else{
               echo 'Ha sucedido un error inexperado en la conexion de la base de datos<br>';
        }
        mysqli_query ($conexion,"SET NAMES 'utf8'");
        mysqli_set_charset($conexion, "utf8");
        return $conexion;
    }
    
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

    function disconnectDB($conexion){
       $close = mysqli_close($conexion);
                if($close){
                }else{
                    echo 'Ha sucedido un error inexperado en la desconexion de la base de datos<br>';
                }	
        return $close;
    }

    function getArraySQL($sql){
        //Creamos la conexiÃ³n
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
        return $rawdata;
    }

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
    
    function getFieldsByTable($table){
        
        $conexion = $this->connectDB();
    	
        # Consulta SQL que devuelve los campos de cada tabla
        $campos = mysqli_query($conexion,'SHOW COLUMNS FROM '.$table) or die('Imposible mostrar campos de '.$nombreTabla);

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

    function setCredentials($server,$user,$pass,$db){
        //OBTENEMOS LOS DATOS ACTUALES
        //Extraemos los datos de configuración de xml/config.xml
        $xml = file_get_contents("xml/config.xml");
        $DOM = new DOMDocument('1.0', 'utf-8');
        $DOM->loadXML($xml);
        $config = $DOM->getElementsByTagName('SERVER_CONFIG')->item(0);
        $lastServer = $config->getElementsByTagName("SERVER")->item(0)->nodeValue;
        $lastUser = $config->getElementsByTagName("USER")->item(0)->nodeValue;
        $lastPass = $config->getElementsByTagName("PASS")->item(0)->nodeValue;
        $lastdb = $config->getElementsByTagName("DB")->item(0)->nodeValue;

        //ACTUALIZAMOS EL ARCHIVO xml/config.xml
        $cuerpo = "";
        $filas=file('xml/config.xml');
        for($i=0;$i<count($filas);$i++){
            $filas[$i] = str_replace('<SERVER>'.$lastServer.'</SERVER>','<SERVER>'.$server.'</SERVER>',$filas[$i]);
            $filas[$i] = str_replace('<USER>'.$lastUser.'</USER>','<USER>'.$user.'</USER>',$filas[$i]);
            $filas[$i] = str_replace('<PASS>'.$lastPass.'</PASS>','<PASS>'.$pass.'</PASS>',$filas[$i]);
            $filas[$i] = str_replace('<DB>'.$lastdb.'</DB>','<DB>'.$db.'</DB>',$filas[$i]);
            $cuerpo = $cuerpo.$filas[$i];
        }

        $file=fopen("xml/config.xml","w+");   
        fwrite ($file,$cuerpo); 
        fclose($file);
    }

    function setInitXML($bool){
        //ACTUALIZAMOS EL ARCHIVO xml/config.xml, la etiqueta INIT        

        $cuerpo = "";
        $filas=file('xml/config.xml');
        for($i=0;$i<count($filas);$i++){
            $filas[$i] = str_replace('<INIT>0</INIT>','<INIT>'.$bool.'</INIT>',$filas[$i]);
            $filas[$i] = str_replace('<INIT>1</INIT>','<INIT>'.$bool.'</INIT>',$filas[$i]);
            $cuerpo = $cuerpo.$filas[$i];
        }

        $file=fopen("xml/config.xml","w+");   
        fwrite ($file,$cuerpo); 
        fclose($file);
    
    }
    function getInitXML(){
        //Extraemos los datos de configuración de xml/config.xml
        $xml = file_get_contents("xml/config.xml");
        $DOM = new DOMDocument('1.0', 'utf-8');
        $DOM->loadXML($xml);
        $init = $DOM->getElementsByTagName('INIT')->item(0)->nodeValue;
        return $init;
    }

}



?>

