<a href="http://geekytheory.com/wp-content/uploads/2014/04/Portada1.png"><img class="size-full wp-image-8255 aligncenter" src="http://geekytheory.com/wp-content/uploads/2014/04/Portada1.png" alt="Automatic Api Rest" width="600" height="340" /></a>

&nbsp;
<div class="alert alert-info span8" style="text-align: center; width:100%"><a href="https://github.com/GeekyTheory/Automatic-API-REST/archive/master.zip"><strong> Descargar Automatic Api Rest </strong></a></div>
&nbsp;



<strong><a href="http://automaticapirest.info">Automatic API Rest</a></strong> nace de la necesidad de gestionar los datos entre distintas plataformas de manera sencilla. Una de las cosas que más pereza me daba a la hora de crear una base de datos es tener que crear todas las clases y funciones (Normalmente en PHP) para dar servicio externo (Android, iOS, Python,etc) a la base de datos.
<h2>¿Qué es?</h2>
<a href="http://automaticapirest.info"><strong>Automatic API Rest</strong> </a>es una herramienta <strong>Open Source bajo licencia Apache 2.0</strong> que te permite crear una completa API de tu base de datos MySQL (Por ahora sólo tiene soporte para <strong>MySQL o MariaDB</strong>). Automatic API Rest proporciona una red automática de enlaces proporcionándote la información en formato<strong> JSON o XML</strong> (No implementado todavía).  Mediante un panel de control se podrá escoger qué tablas o campos quieres compartir con tus aplicaciones externamente y cuáles no.

<a href="http://geekytheory.com/wp-content/uploads/2014/04/esquema4.png"><img class="alignnone size-full wp-image-8256" src="http://geekytheory.com/wp-content/uploads/2014/04/esquema4.png" alt="Automatic API Rest" width="800" height="600" /></a>
<h2>Proyecto Open Source</h2>
<a href="http://automaticapirest.info"><strong>Automatic Api Rest</strong> </a>es un proyecto <strong>Open Source</strong>, todo el mundo es bienvenido a colaborar en él. Si queréis colaborar, enviarme un mail, o enviar directamente vuestros Pull Request.

<a title="jsonrepositorio" href="https://github.com/GeekyTheory/Automatic-API-REST" target="_blank"><img class="size-full wp-image-7150 aligncenter" src="http://i0.wp.com/geekytheory.com/wp-content/uploads/2014/02/github-logo.png?resize=580%2C230" alt="github-logo" width="580" height="230" /></a>

&nbsp;
<h2>Instalación</h2>
A continuación se describen los pasos a seguir para la instalación:
<ul>
	<li>Descargar <a href="http://automaticapirest.info" target="_blank">Automatic API Rest</a> desde <a href="https://github.com/GeekyTheory/Automatic-API-REST/archive/master.zip">aquí</a>.</li>
	<li>Extraer el zip y subir todo el directorio a la raíz principal de vuestro servidor</li>
	<li>Abrir el archivo <strong>config.php </strong>y rellenar todos los campos con los credenciales de la base de datos.</li>
	<li>Visitar la direccion <strong>http://tudominio.com/AutomaticaApiRest</strong></li>
</ul>
<h2>Guía de usuario</h2>
Una vez que hemos descargado he instalado <strong><a href="http://automaticapirest.info" target="_blank">Automatic Api Rest</a></strong>, vamos a ir a la dirección del proyecto<strong> http://tudominio.com/AutomaticaApiRest</strong>. Nos encontraremos con la siguiente pantalla:

<a href="http://geekytheory.com/wp-content/uploads/2014/04/Captura12.png"><img class="size-full wp-image-8259 aligncenter" src="http://geekytheory.com/wp-content/uploads/2014/04/Captura12.png" alt="Captura1" width="656" height="504" /></a>

&nbsp;

Aquí tenemos que introducir nuestro usuario y contraseña que hemos establecido en el archivo <strong>config.php. </strong>Por defecto el usuario y contraseña es <strong>admin</strong>.

Una vez que hemos entrado al panel de administración de <strong><a href="http://automaticapirest.info" target="_blank">Automatic API Rest</a></strong>, observamos una pantalla como esta:

<a href="http://geekytheory.com/wp-content/uploads/2014/04/Captura21.png"><img class="alignnone size-full wp-image-8260" src="http://geekytheory.com/wp-content/uploads/2014/04/Captura21.png" alt="Captura2" width="1036" height="592" /></a>

Para mostrar un ejemplo, hemos apuntado a la base de datos por defecto de <strong>WordPress</strong>. Para explicar qué es cada cosa vamos a ir por bloques.
<h3>Navegador</h3>
<a href="http://geekytheory.com/wp-content/uploads/2014/04/Captura31.png"><img class="size-full wp-image-8261 aligncenter" src="http://geekytheory.com/wp-content/uploads/2014/04/Captura31.png" alt="Captura3" width="458" height="60" /></a>
<ul>
	<li><strong>Home</strong>: Enlace al inicio del panel de control.</li>
	<li><strong>Documentation</strong>: Documentación del proyecto.</li>
	<li><strong>Black List</strong>: Gestión de las tablas privadas.</li>
	<li><strong>GitHub</strong>: Enlace al proyecto en GitHub</li>
	<li><strong>Close</strong>: Cierre de la sesión.</li>
</ul>
<h3>Gestión de Tablas</h3>
<a href="http://geekytheory.com/wp-content/uploads/2014/04/Captura41.png"><img class="alignnone size-full wp-image-8263" src="http://geekytheory.com/wp-content/uploads/2014/04/Captura41.png" alt="Captura4" width="999" height="431" /></a>

&nbsp;
<ul>
	<li><strong>Table Name</strong>: Nombre de la tabla de la base de datos.</li>
	<li><strong>API Link</strong>: Dirección de la API donde vamos a consultar todos los datos en formato JSON de la tabla.</li>
	<li><strong>Items</strong>: Número de Items que tiene la tabla.</li>
	<li><strong>Show Table</strong>: Mostrar una tabla con los datos de la tabla seleccionada</li>
	<li><strong>Privacity</strong>: Esta casilla muestra si la tabla es pública o privada, en caso de que sea privada el enlace no funcionará.</li>
</ul>
Si pulsamos sobre cualquier tabla de la base de datos, nos dirigiremos a otra tabla con los campos de la base de datos
<h3>Gestión de campos</h3>
<a href="http://geekytheory.com/wp-content/uploads/2014/04/Captura51.png"><img class="size-full wp-image-8264 aligncenter" src="http://geekytheory.com/wp-content/uploads/2014/04/Captura51.png" alt="Captura5" width="1004" height="433" /></a>
<ul>
	<li><strong>Column</strong>: Nombre del campo de la tabla seleccionada</li>
	<li><strong>API Link</strong>: Enlace que genera un <strong>JSON</strong> con toda la información del campo encapsulado.</li>
	<li><strong>Show Table</strong>: Ver una tabla con los datos del campo seleccionado.</li>
	<li><strong>Select</strong>: Consulta personalizada (Ver siguiente punto).</li>
	<li><strong>Privacity</strong>: Privacidad del campo</li>
</ul>
<h3> Consulta Personalizada</h3>
Si seleccionamos la casilla <strong>select</strong> de algún campo, nos aparecerá la siguiente tabla de configuración:

<a href="http://geekytheory.com/wp-content/uploads/2014/04/Captura61.png"><img class="alignnone size-full wp-image-8266" src="http://geekytheory.com/wp-content/uploads/2014/04/Captura61.png" alt="Captura6" width="967" height="216" /></a>Observamos que podemos personalizar la consulta de datos, si por ejemplo sólo nos interesa el <strong>ID y el nombre</strong> de los últimos 5 registros de la tabla <strong>users</strong> generamos un enlace que exactamente nos ofrezca eso.
<h2>Black List</h2>
<a href="http://geekytheory.com/wp-content/uploads/2014/04/Captura71.png"><img class="alignnone size-full wp-image-8267" src="http://geekytheory.com/wp-content/uploads/2014/04/Captura71.png" alt="Captura7" width="989" height="195" /></a>

La <strong>Black List </strong>muestra todos las tablas y columnas que no permitimos obtener los datos. Desde esta misma tabla podemos eliminar los registros de la Black List.
<h2>Hello World en PHP</h2>
Un ejemplo de uso de Automatic API Rest en PHP es el siguiente:
<pre class="lang:php decode:true">&lt;?php
//Get JSON from Automatic Api Rest
$json = file_get_contents("API LINK");
//Decode JSON
$json = json_decode($json);

for($i=0;$i&lt;count($json);$i++){
    echo $json[$i]-&gt;campo;
}</pre>
En este ejemplo obtenemos un JSON de la API LINK que queramos. una vez obtenido el JSON lo codificamos y mostramos aquellos campos que nos interesa.
<h2>Líneas Futuras</h2>
Los siguientes puntos son las tareas que quedan por hacer para que el proyecto este finalizado del todo.
<ul>
	<li>Implementar salida de datos con XML</li>
	<li>Crear documentación para cada plataforma.</li>
	<li>Implementar una seguridad más robusta y fiable.</li>
	<li>Codificar los datos de salida.</li>
	<li>Dar soporte a consultas complejas, WHERE, INNER, etc.</li>
</ul>
<h2>Enlaces de Interés</h2>
<ul>
	<li>Página oficial del proyecto: <a href="http://automaticapirest.info">AUTOMATIC API REST</a></li>
	<li>Descarga del proyecto: <a href="https://github.com/GeekyTheory/Automatic-API-REST/archive/master.zip">DESCARGAR</a></li>
	<li>GitHub: <a href="https://github.com/GeekyTheory/Automatic-API-REST">AUTOMATIC API REST PROJECT</a></li>
	<li>Correo del desarrollador: <a href="mailto:alejandro@geekytheory.com">alejandro@geekytheory.com</a></li>
	<li>Twitter del desarrollador: <a href="http://twitter.com/alex_esquiva">@alex_esquiva</a></li>
</ul>
Y esto es todo espero que os haya gustado el proyecto, a la vez os animo a que colaboréis con el en lo que podáis.
