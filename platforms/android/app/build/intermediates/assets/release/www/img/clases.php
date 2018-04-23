<?php
class Conectar 
{
	public static function con()
	{
		$conexion=mysql_connect("localhost","root","12345678");
		mysql_query("SET NAMES 'utf8'");
		mysql_select_db("sportmatch2");
		return $conexion;
	}
}
class Partido
{
	private $partidos=array();
	private $jugadores=array();
	private $jugadoresVisita=array();
	private $equipos=array();
	private $marcadorlocal=array();
	private $marcadorvisita=array();
	
	
	public function __construct()
	{
			
	}	
	public function add_partido($deporte,$pais,$ciudad,$nombre_cancha,$direccion_cancha,$privacidad,$cuota,$sexo,$x,$y)
	{
		$sql="insert into partido values (null,null,null,'$deporte','$pais','$ciudad','$nombre_cancha',
		'$direccion_cancha',null,'$privacidad','$cuota',null,now(),now(),'$sexo','$x','$y')";
		echo $sql;
		$res=mysql_query($sql,Conectar::con());
		echo "<script type = 'text/javascript'>
		alert('mensaje enviado');
		window.location='vista_partido.php';
		</script>";
	}
	public function get_partidos()
	{
		$sql="select * from partido";
		
		$res=mysql_query($sql,Conectar::con()) or die("Error: " . mysql_error());
		
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->partidos[]=$reg;
		}
			return $this->partidos;
	}	
	public function get_partido_por_id($id)
	{
		
		$sql="select * from partido where id= $id";
		$res=mysql_query($sql,Conectar::con());
		while($reg=mysql_fetch_assoc($res))
		{
			$this->partidos[]=$reg;
			
		}
			return $this->partidos;
			
	}
	public function edit_partido($id,$pais,$ciudad,$nombreCancha,$direccionCancha,$cuota,$fecha,$hora)
	{
		
		$sql="update partido "
		."set "
		."pais='$pais',"
		."ciudad = '$ciudad', "
		."nombre_cancha = '$nombreCancha', "
		."direccion_cancha = '$direccionCancha', "
		."cuota = '$cuota', "
		."fecha = '$hora' "
		." where"
		." id = $id";
		echo $sql;
		$res=mysql_query($sql,Conectar::con());
		echo "<script type='text/javascript'>
		alert('el registro se ha modificado bien');
		window.location='vista_partido.php';
		</script>";
	}
	public function eliminar_partido($id)
	{
		$sql="delete from partido where id=$id";
		$res=mysql_query($sql,Conectar::con());
		echo "<script type='text/javascript'>
		alert('el registro se ha eliminado bien');
		window.location='readjson.html';
		</script>";
	}
	public function buscarPartido($ciudad)
	{
		$sql="select * from partido where ciudad='$ciudad'";
		$res=mysql_query($sql,Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->partidos[]=$reg;
		}
			return $this->partidos;
		
		
	}
	public function getEquipo($id)
	{
		
		$sql="select * from equipo,equipo_has_partido where 
		equipo.id = equipo_has_partido.equipo_id and equipo_has_partido.partido_id=$id";
		$res=mysql_query($sql,Conectar::con());
		while($reg=mysql_fetch_assoc($res))
		{
			$this->equipos[]=$reg;
			
		}
			return $this->equipos;
	}
	public function getNominaLocal($idLocal)
	{
		
		$sql="select * from jugador,jugador_has_equipo where 
		jugador_has_equipo.equipo_id = $idLocal and jugador_has_equipo.jugador_id= jugador.id ";
		$res=mysql_query($sql,Conectar::con());
		while($reg=mysql_fetch_assoc($res))
		{
			$this->jugadores[]=$reg;
			
		}
			return $this->jugadores;
	}
	public function getNominaVisita($idVisita)
	{
		
		$sql="select * from jugador,jugador_has_equipo where 
		jugador_has_equipo.equipo_id = $idVisita and jugador_has_equipo.jugador_id= jugador.id ";
		$res=mysql_query($sql,Conectar::con());
		while($reg=mysql_fetch_assoc($res))
		{
			$this->jugadoresVisita[]=$reg;
			
		}
			return $this->jugadoresVisita;
	}
	public function jq($data)
	{
		
		$sql="UPDATE `jugador` SET user='".$data."' WHERE id=1 ";
		$res=mysql_query($sql,Conectar::con());
		echo $data;
		
	}
	public function add_marcador($puntos,$idequipo)
	{
		
		$sql="UPDATE equipo_has_partido set puntos = $puntos where equipo_id = $idequipo and partido_id = 2";
		$res=mysql_query($sql,Conectar::con());
		
	}
	public function getMarcadorLocal($idequipo,$idpartido)
	{
		
		$sql="select * from equipo_has_partido where equipo_id = $idequipo and partido_id = $idpartido";
		$res=mysql_query($sql,Conectar::con());
		while($reg=mysql_fetch_assoc($res))
		{
			$this->marcadorlocal[]=$reg;
			
		}
			return $this->marcadorlocal;
	}
	public function getMarcadorVisita($idequipo,$idpartido)
	{
		
		$sql="select * from equipo_has_partido where equipo_id = $idequipo and partido_id = $idpartido";
		$res=mysql_query($sql,Conectar::con());
		while($reg=mysql_fetch_assoc($res))
		{
			$this->marcadorvisita[]=$reg;
			
		}
			return $this->marcadorvisita;
	}
	
}
class Jugador
{
	private $jugador=array();
	private $jugadorid=array();
	private $comentariojugador=array();
	private $jugador_asistencia=array();
	
	public function getJugador($user)
	{
		$sql="select * from jugador where user='$user'";
		$res=mysql_query($sql,Conectar::con());
		while($reg=mysql_fetch_assoc($res))
		{
			$this->jugador[]=$reg;
			
		}
			return $this->jugador;
		
		
	}
	public function getJugadorId($id)
	{
		$sql="select * from jugador where id=$id";
		$res=mysql_query($sql,Conectar::con());
		while($reg=mysql_fetch_assoc($res))
		{
			$this->jugadorid[]=$reg;
			
		}
			return $this->jugadorid;
		
		
	}
	public function getComentarioJugador($id)
	{
		$sql="select * from comentario where jugador_id=$id";
		$res=mysql_query($sql,Conectar::con());
		while($reg=mysql_fetch_assoc($res))
		{
			$this->comentariojugador[]=$reg;
			
		}
			return $this->comentariojugador;
		
		
	}
	public function getJugador2($id)
	{
		$sql="select * from jugador where id='$id'";
		$res=mysql_query($sql,Conectar::con());
		while($reg=mysql_fetch_assoc($res))
		{
			$this->jugador[]=$reg;
			
		}
			return $this->jugador;
		
		
	}
	public function agregarJugador($idjugador,$idequipo,$idpartido)
	{
		$sql="insert into jugador_has_equipo values ('$idjugador','$idequipo')";
		$res=mysql_query($sql,Conectar::con());
		echo "<script type = 'text/javascript'>
		alert('Jugador agregado');
		window.location='entidad_partido.php?id=$idpartido';
		</script>";
		
		
	}
	public function agregarAsistencia($idjugador,$idpartido)
	{
		$sql="UPDATE jugador SET jugador.asistencia_conf = jugador.asistencia_conf + 1 where id = '$idjugador'";
		$res=mysql_query($sql,Conectar::con());
		echo "<script type = 'text/javascript'>
		window.location='entidad_partido.php?id=$idpartido';
		</script>";
		
		
	}
	public function restarAsistencia($idjugador,$idpartido)
	{
		$sql="insert into jugador_has_partido values ($idjugador,$idpartido,'no') ";
		$res=mysql_query($sql,Conectar::con());
		echo "<script type = 'text/javascript'>
		window.location='entidad_partido.php?id=$idpartido';
		</script>";
	
		
	}
	public function getAsistentes($idpartido)
	{
		$sql="select * from jugador_has_partido where partido_id = $idpartido";
		$res=mysql_query($sql,Conectar::con());
		while($reg=mysql_fetch_assoc($res))
		{
			$this->jugador_asistencia[]=$reg;
			
		}
			return $this->jugador_asistencia;
		
		
	}
	
	
	
	
}
?>