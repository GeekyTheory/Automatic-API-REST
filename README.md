# Automatic API REST (Beta) -

[Automatic API REST](http://automaticapirest.info/) is an Open Source Tool that will allow you to create a full API REST of your Data Base in seconds. AAR use the native functions of MySQL to abstract your data base and provide the information in different formats (JSON available). Automatic API REST let you to build a JSON and XML tree of your Data Base. You can choose which tables are public and which are private to keep your secret information secure.

Automatic API Rest is a bridge to interact with all programing languages which can read a JSON and XML format, facilitating the communication machine-to-machine (M2M). Read from JAVA, c++, python (...) all the information from you data base to implement your apps.

Visit [Automatic API REST](http://automaticapirest.info/) to view our demo.

[**View DEMO**](http://automaticapirest.info/demo) | [**View Features**](#features) | [**Installation Instructions**](#installation) | [**User Guide**](https://github.com/GeekyTheory/Automatic-API-REST/wiki/User-Guide) | [**Documentation**](https://github.com/GeekyTheory/Automatic-API-REST/wiki/) | [**TO-DO**](#to-do) | [**Links**](#links)

<img src='https://cloud.githubusercontent.com/assets/5300833/7956983/fde3d900-09db-11e5-9f07-5267659282e9.PNG'>

## Features

* Creation of a powerful REST API of your MySQL Data Base in Seconds.
* Management of the API in situ, it is not neccesary an extra database.
* Private tables and columns.
* Well-Design URIs format.
* Custom queries.

## Dependencies

* PHP5
* MySQL
* Apache o Nginx

## Installation

1. [Download the source](http://goo.gl/7kPWWP) or clone the repository in the root folder of your project.
2. Place it in `/var/www/YourWebPage/` (for Apache).
3. Open the file<strong>config.php </strong> and complete all the fields with the server credencials.
4. Replace the file .htaccess in the root folder of your project if your are using Apache. In case you are using Nginx, please follow the intructions attached in /Server-Configuration/ folder.
5. Go to <strong>http://domain.com/Automatic-API-REST</strong>

**Please note: If you have troubles with the privacy system, please allow access to xml folder.**

## Hello World (GET From PHP)
<pre class="lang:php decode:true">&lt;?php
    //Get JSON from Automatic Api Rest
    $apiLink = "http://localhost/api/get/city/";
    $json = file_get_contents($apiLink);
    //Decode JSON
    $json = json_decode($json);
    //Print
    for($i=0;$i&lt;count($json);$i++){
        echo $json[$i].ID;
    }
</pre>

## TO-DO

* Implement XML Format
* Documentation for all the platforms
* Security
* Complex query

## Links
* Oficial Page: <a href="http://automaticapirest.info">AUTOMATIC API REST</a>
* Project ZIP: <a href="https://github.com/GeekyTheory/Automatic-API-REST/archive/master.zip">Download</a>
* GitHub: <a href="https://github.com/GeekyTheory/Automatic-API-REST">AUTOMATIC API REST PROJECT</a>
* Developer email: <a href="mailto:alejandro@geekytheory.com">alejandro@geekytheory.com</a>
* Twitter: <a href="http://twitter.com/alex_esquiva">@alex_esquiva</a>


###License

    Copyright 2014 GeekyTheory (Alejandro Esquiva)

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.
