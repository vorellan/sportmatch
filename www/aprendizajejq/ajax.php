<?php
include ("clases.php");
$partido=new Partido();
foreach($_POST as $field_name => $val)
	{
		//clean post values
		
		$partido->jq($field_name);
		
	}




?>