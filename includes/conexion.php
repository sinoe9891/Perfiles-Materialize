<?php
$mysqli = new mysqli("localhost","root","","graduat3s");
	 //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos

	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		echo "conexion fallo";
		exit();
	}

		if (!$mysqli->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $mysqli->error);
    exit();

//ESTO ES MODIFICAR REGISTRO
function update( $id, $idz, $family, $subfamily, $tribe, $genus, $species, $locality_data, $deremination_label )
{

	global $mysqli;
	$sql = "UPDATE entomologia3 SET family = '{$family}', subfamily = '{$subfamily}' , genus = '{$genus}', tribe = '{$tribe}', species = '{$species}', locality_data = '{$locality_data}', deremination_label = '{$deremination_label}' WHERE idz = '{$idz}'";
	$mysqli->query( $sql );
}

} ?>

