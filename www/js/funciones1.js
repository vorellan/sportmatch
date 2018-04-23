function limpiar()
{
	document.form.reset();
	document.form.nom.focus();
	
	
}

function validar()
{
	var form = document.form;
	if(form.nom.value == 0)
	{
		
		alert("ingrese su nombre");
		form.nom.value = "";
		form.nom.focus();
		return false;
		
	}
	if(form.texto.value == 0)
	{
		
		alert("ingrese su mensaje");
		form.texto.value = "";
		form.texto.focus();
		return false;
		
	}
	form.submit();
	
	
	
}
function cambiar(id, color)
{
	document.getElementById(id).style.backgroundColor=color;
}

function eliminar(url)
{   
	
	
	if(confirm("Realmente desea eliminar ?"))
	{
		window.location=url;
		
	}
	
	
}
function agregar(url)
{   
	
	
	if(confirm("Desea ser parte de este equipo ?"))
	{
		window.location=url;
		
		
	}
	
	
}
