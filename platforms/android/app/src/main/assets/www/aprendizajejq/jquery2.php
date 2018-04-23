<html>
    <head>
        <title>Ejemplo</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script>
		$(function(){
			//acknowledgement message
			var message_status = $("#status");
			$("td[contenteditable=true]").blur(function(){
				
				var field_userid = $(this).attr("id") ;
				var value = $(this).text() ;
				alert (value);
				$.post('ajax.php' ,  value, function(data){
					if(data != '')
					{
						message_status.show();
						message_status.text("Marcador actualizado");
						//hide the message
						setTimeout(function(){message_status.hide()},3000);
						
					}
				});
			});
		});
		</script>
        
    </head>

    <body>
	<div id="status"></div>
	<table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>City</th>
      </tr>
    </thead>
    <tbody>
      <tr class="odd">
        <td>1</td>
        <td id="first_name:1" contenteditable="true">Karthikeyan</td>
        <td id="last_name:1" contenteditable="true">K</td>
        <td id="city:1" contenteditable="true">Chennai</td>
      </tr>
      <tr>
        <td>2</td>
        <td id="first_name:2" contenteditable="true">Facebook</td>
        <td id="last_name:2" contenteditable="true">Inc</td>
        <td id="city:2" contenteditable="true">California</td>
      </tr>
      <tr class="odd">
        <td>3</td>
        <td id="first_name:3" contenteditable="true">W3lessons</td>
        <td id="last_name:3" contenteditable="true">Blog</td>
        <td id="city:3" contenteditable="true">Chennai, India</td>
      </tr>
    </tbody>
 </table>
        
    </body>
</html>