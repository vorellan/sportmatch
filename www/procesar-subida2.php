<?php
header('Access-Control-Allow-Origin:*'); 
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept'); 
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS'); 
$user=$_GET["id"];
$link= $user.".png";


	


?>
<HTML>
    <HEAD>
        <TITLE>Título de la página</TITLE>
        ...
    </HEAD>

    <BODY>
       hola
	<a href="imagenes/2.png"><img border="0" align= "center" src="http://smatch.atwebpages.com/imagenes/2.png" width="100" height="100"></a>
    </BODY>
</HTML>