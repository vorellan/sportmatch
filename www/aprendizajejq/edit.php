<?php
include ("clases.php");
$partido=new Partido();
$var=$field_userid = strip_tags(trim($_POST["editval"]));
$partido->jq($var,$_POST["column"]);



?>