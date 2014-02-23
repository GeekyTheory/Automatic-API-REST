<?php 




$configArray = array(   "SERVER"=>"localhost",
                        "USER"=>"root",
                        "PASS"=>"",
                        "DB"=>"geek"
                    ); 

$buffer='<?xml version="1.0" encoding="utf-8"?> 
         <!--CONFIG AUTOMATIC API REST--> 
         <SERVER_CONFIG>'; 

while (list ($etiqueta, $valor) = each ($configArray)): 
  $buffer.="<$etiqueta>$valor</$etiqueta>"; 
endwhile; 
  
$buffer.="</SERVER_CONFIG>"; 
$file=fopen("xml/Config.xml","w+"); 
fwrite ($file,$buffer); 
fclose($file); 

echo "<br><p style='font-size:25px;'>... y finalmente se crea el archivo XML. abrelo dando click  <a href='xml/config.xml'>aqui</a></p> 
      <p style='font-size:25px;'>En caso de no abrirlo actualiza esta pagina.</p>"; 
?>
