<?php

$user = $_POST['user'];
include ("clases.php");
$partido=new Partido();
$partido->jq($user);

?>