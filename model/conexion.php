<?php

Class Conexion{

function conectarse(){
	//if (!($link=mysql_connect("10.221.11.4","root","CONTRASEÑA")))
							//("IP o servidor","usuario","contraseña")
    if (!($link=mysql_connect("localhost","root",""))) // si es diferente a true para conectar a la base de datos 
	{
		echo "Error en la conexion.";
		exit();
	}
	if (!mysql_select_db("residentes",$link)) //mysql_select_db - funcion para selecionar la base de datos y como parametros recibe el nombre de la base de datos y la conexion
	{
		echo "Error seleccionando la base de datos.";
		exit();
	}
	return $link;
}

//Funcion para traer todos los compos de una tabla en la DB
public function getColumns($tabla) {
        $fieldnames = array();

        $x = new Conexion();
        $conn = $x->conectarse();

        $result = mysql_query("SHOW COLUMNS FROM " . $tabla, $conn);
        if (!$result) {
            echo 'No se pudo ejecutar la consulta : ' . mysql_error();
            return false;
        }

        if (mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_assoc($result)) {
                /**QUITAR ESTA VALIDACION PARA SISTEMAS DIFERENTES A SICU*/
                if($row['Field']!=="oncreate"){
                    $fieldnames[] = $row['Field'];
                }
            }
        }
        $x->liberaRecurso($result);
        //$x->desconectarse($conn);
        return $fieldnames;
    }


public static function liberaRecurso($res) {
        mysql_free_result($res);
    }

    
}//class Conexion
?>