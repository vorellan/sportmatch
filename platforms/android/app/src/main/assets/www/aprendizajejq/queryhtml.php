<?php
include ("clases.php");
?>
<head>
      <title>PHP MySQL Inline Editing using jQuery Ajax</title>
		<style>
			body{width:610px;}
			.current-row{background-color:#B24926;color:#FFF;}
			.current-col{background-color:#1b1b1b;color:#FFF;}
			.tbl-qa{width: 100%;font-size:0.9em;background-color: #f5f5f5;}
			.tbl-qa th.table-header {padding: 5px;text-align: left;padding:10px;}
			.tbl-qa .table-row td {padding:10px;background-color: #FDFDFD;}
		</style>
		<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
		<script>
		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
		} 
		
		function saveToDatabase(editableObj,column,id) {
			alert (editableObj.innerHTML);
			$(editableObj).css("background","#FFF url(img/loader.gif) no-repeat right");
			$.ajax({
				url: "edit.php",
				type: "POST",
				data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
				success: function(data){
					$(editableObj).css("background","#FDFDFD");
				}        
		   });
		}
		</script>
    </head>
<body>
<table class="tbl-qa">
  <thead>
	  <tr>
		<th class="table-header" width="10%">Q.No.</th>
		<th class="table-header">user</th>
		<th class="table-header">Answer</th>
	  </tr>
  </thead>
  <tbody>
  <?php
  $jugador= new Jugador();
  $resultadoJugador = $jugador->getJugador("jc");
  echo $resultadoJugador[0]["user"];
  for ($i=0;$i<sizeof($resultadoJugador);$i++)
  {
  ?>
	  <tr class="table-row">
				
				<td contenteditable="true" onBlur="saveToDatabase(this,'user','<?php echo $resultadoJugador[0]["id"]; ?>')" onClick="showEdit(this);"><?php echo $resultadoJugador[0]["user"]; ?></td>
				<td contenteditable="true" onBlur="saveToDatabase(this,'answer','<?php echo $faq[$k]["id"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["answer"]; ?></td>
			  </tr>
<?php
}
?>
  </tbody>
</table>
</body>
</html>