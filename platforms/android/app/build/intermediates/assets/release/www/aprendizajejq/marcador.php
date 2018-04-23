<html>
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
		formSubmit()
	})
	
	function formSubmit(){
		
		$('#formulario').submit(function(e){
			e.preventDefault()
			var user = $('#usuario').val()
			alert(user);
		    var data = 'user='+user;
			$.ajax({
				url: 'form.php',
				type: 'POST',
				data:  data,
				beforeSend: function(){
					console.log('enviando datos')
				},
				success: function(resp){
					console.log('resp')
				}
			})
		})	
	}
	
	</script>
	
</head>
<body>
	<form id="formulario">
		<label for="usuario">Usuario:</label>
		<input type="text" id="usuario">
		<input type="submit" value="subir">
	</form>
		
</body>
</html>