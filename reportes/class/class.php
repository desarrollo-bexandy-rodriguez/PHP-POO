<?php

class Conectar {

	public static function con() {
		$con = mysql_connect("localhost", "root", "p3lk4x");
		mysql_query("SET NAMES 'utf8'");
		mysql_select_db("php_poo");
		return $con;
	}

// Función para invertir fecha
	public static function invierte_fecha($fecha) {
		$dia = substr($fecha, 8, 2);
		$mes = substr($fecha, 5, 2);
		$anio = substr($fecha, 0, 4);
		$correcta = $dia . "-" . $mes . "-" . $anio;
		return $correcta;
	}

}


class Trabajo {


	private $noticias;

	public function __construct() {
		$this->noticias = array();
	}

  public function get_noticias()
  {
    $sql= "SELECT "
    ." n.titulo,n.detalle,n.fecha,a.nombre,a.correo,a.pais,a.empresa "
    ." FROM "
    ." rnoticias AS n,rautor AS a "
    ." WHERE "
    ." n.autor=a.id_autor ";
    $res = mysql_query($sql,Conectar::con());
    while ($reg = mysql_fetch_assoc($res)) {
      $this->noticias[]=$reg;
    }
    return $this->noticias;
  }

}
?>
