<h1><a href="http://automaticapirest.info">Automatic API REST</a></h1>

<a href="http://automaticapirest.info">Automatic API REST</a> is an Open Source Tool to provide you a full API Rest of your Data Base. You can get information externally of your Data Base to interact with your Apps. Automatic API Rest let you to build a JSON and XML trees of your Data Base. You can choose which tables are public and which are private to keep your secret information secure.

Automatic API Rest is a tool to interact with all programing languages which can read a JSON and XML format. Read from JAVA, c++, python (...) all the information from you data base to implement your apps.

<h2>Set Up</h2>
<ul>
	<li>Clone the repository in the root of your server</li>
	<li>Open the file<strong>config.php </strong> and complete all the fields with the server credetncials</li>
	<li>Go to <strong>http://domain.com/AutomaticaApiRest</strong></li>
</ul>

<h2>Documentation</h2>

The following links are slides of workshops that Automatic API REST has been involve.

[Spanish]<a href="http://geekytheory.com/automatic-api-rest/"><strong> Guia de usuario </strong></a>

[Spanish]<a href="http://www.slideshare.net/AlejandroEsquiva/automatic-apirestdroidcon"><strong> Diapositivas sobre la charla de Automatic API REST en el Droidcon Madrid 2014 </strong></a>

[Spanish]<a href="http://www.slideshare.net/AlejandroEsquiva/taller-androidparty"><strong> Taller sobre Automatic API REST en el Android Party 2014 </strong></a>

[Spanish]<a href="http://androidparty.geekytheory.com/material.rar"><strong> Material del Taller </strong></a></div>

<h2>User Guide</h2>
Once we have installed <strong><a href="http://automaticapirest.info" target="_blank">Automatic Api Rest</a></strong>, we are going to go to our main page <strong> http://tudominio.com/AutomaticaApiRest</strong>. 

<a href="http://geekytheory.com/wp-content/uploads/2014/04/Captura12.png"><img class="size-full wp-image-8259 aligncenter" src="http://geekytheory.com/wp-content/uploads/2014/04/Captura12.png" alt="Captura1" width="656" height="504" /></a>

&nbsp;

Here we have to introduce our user and pass which one we have wrote in the <strong>config.php</strong> file.</strong> By default user and pass are <strong>admin</strong>.

<a href="http://geekytheory.com/wp-content/uploads/2014/04/Captura21.png"><img class="alignnone size-full wp-image-8260" src="http://geekytheory.com/wp-content/uploads/2014/04/Captura21.png" alt="Captura2" width="1036" height="592" /></a>

To show an example, we have put Wordpress data base default as example.

<h3>Navigator</h3>
<a href="http://geekytheory.com/wp-content/uploads/2014/04/Captura31.png"><img class="size-full wp-image-8261 aligncenter" src="http://geekytheory.com/wp-content/uploads/2014/04/Captura31.png" alt="Captura3" width="458" height="60" /></a>
<ul>
	<li><strong>Home</strong>: Main page link.</li>
	<li><strong>Documentation</strong>: project documentation.</li>
	<li><strong>Black List</strong>: Private tables management.</li>
	<li><strong>GitHub</strong>: GitHub Link</li>
	<li><strong>Close</strong>: Close Session.</li>
</ul>
<h3>Private Tables Management</h3>
<a href="http://geekytheory.com/wp-content/uploads/2014/04/Captura41.png"><img class="alignnone size-full wp-image-8263" src="http://geekytheory.com/wp-content/uploads/2014/04/Captura41.png" alt="Captura4" width="999" height="431" /></a>

&nbsp;
<ul>
	
	<li><strong>API Link</strong>: API Link where we are going to get all the data in JSON format</li>
	<li><strong>Items</strong>: Amount of Items</li>
	<li><strong>Show Table</strong>: Show a table with the data</li>
	<li><strong>Privacity</strong>: Choose if this table is public or private</li>
</ul>

If we click any table it will display another table with all the fields of the original table.
<h3>Field management</h3>
<a href="http://geekytheory.com/wp-content/uploads/2014/04/Captura51.png"><img class="size-full wp-image-8264 aligncenter" src="http://geekytheory.com/wp-content/uploads/2014/04/Captura51.png" alt="Captura5" width="1004" height="433" /></a>

<h3> Custom Select</h3>

<a href="http://geekytheory.com/wp-content/uploads/2014/04/Captura61.png"><img class="alignnone size-full wp-image-8266" src="http://geekytheory.com/wp-content/uploads/2014/04/Captura61.png" alt="Captura6" width="967" height="216" /></a>We can do a custom select. This is useful if we need just some fields.

<h2>Black List</h2>
<a href="http://geekytheory.com/wp-content/uploads/2014/04/Captura71.png"><img class="alignnone size-full wp-image-8267" src="http://geekytheory.com/wp-content/uploads/2014/04/Captura71.png" alt="Captura7" width="989" height="195" /></a>

<strong>Black List </strong>Show all the tables and fields we have choosen as private

<h2>Hello World in PHP</h2>
<pre class="lang:php decode:true">&lt;?php
//Get JSON from Automatic Api Rest
$json = file_get_contents("API LINK");
//Decode JSON
$json = json_decode($json);

for($i=0;$i&lt;count($json);$i++){
    echo $json[$i]-&gt;campo;
}</pre>

<h2>TO-DO</h2>
<ul>
	<li>Implement XML Format</li>
	<li>Documentation for all the platforms</li>
	<li>Security</li>
	<li>Complex query</li>
</ul>
<h2>Useful links</h2>
<ul>
	<li>Oficial Page: <a href="http://automaticapirest.info">AUTOMATIC API REST</a></li>
	<li>Project ZIP: <a href="https://github.com/GeekyTheory/Automatic-API-REST/archive/master.zip">Download</a></li>
	<li>GitHub: <a href="https://github.com/GeekyTheory/Automatic-API-REST">AUTOMATIC API REST PROJECT</a></li>
	<li>Developer email: <a href="mailto:alejandro@geekytheory.com">alejandro@geekytheory.com</a></li>
	<li>Twitter: <a href="http://twitter.com/alex_esquiva">@alex_esquiva</a></li>
</ul>
