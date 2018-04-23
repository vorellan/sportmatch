$(document).ready(function(){
		
		// declaro la variable formData e instancio el objeto nativo de javascript new FormData
		// declaro la variable ruta
		var perfil = decodeURI(getUrlVars()["perfil"]);
		var ruta = 'http://smatch.atwebpages.com/procesar-subida2.php';
		var data = 'perfil='+perfil;
		// iniciar el ajax
		$.ajax({
			url: ruta,
			// el metodo para enviar los datos es POST
			type: "POST",
			// colocamos la variable formData para el envio de la imagen
			data: data,
			contentType: false,
			processData: false,
			beforeSend: function() 
			{
			    $('#mensaje2').prepend('<img src="facebook.gif" />');
			},
			success: function(data)
			{
				$('#mensaje2').fadeOut("fast",function(){
					$('#mensaje2').html(data);
				});
				$('#mensaje2').fadeIn("slow");
			} 
		});
	
});