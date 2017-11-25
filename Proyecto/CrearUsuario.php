<?php

//ini_set( 'display_errors', 0 );
header("Content-Type: text/javascript");
$data = json_decode(file_get_contents('php://input'), true);
$dataserver = "localhost";
$username = "Israel";
$password = "migatafavorita";
$database = "chat";
$conn = new mysqli($dataserver, $username, $password,$database) or die("Conexion fallida: %s\n". $conn -> error);

/*$sql = "SELECT codigo, nombres, apellido_paterno, apellido_materno, fecha_nacimiento FROM alumno";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$sql = "UPDATE alumno SET ";
	$sql .= "nombres='" . $data["nombres"] . "',";
	$sql .= "apellido_paterno='" . $data["apellido_paterno"] . "',";
	$sql .= "apellido_paterno='" . $data["apellido_paterno"] . "',";
	$sql .= "fecha_nacimiento='" . $data["fecha_nacimiento"] . "'";
	$sql .= "WHERE codigo='" . $data["codigo"] . "'";
}
else {
$sql = "INSERT INTO alumno (codigo, nombres, apellido_paterno, fecha_nacimiento) ";
$sql .= " VALUES ('" . $data["codigo"] . "', '" . $data["nombres"] . "', '";
$sql .= $data["apellido_paterno"] . "', '" . $data["fecha_nacimiento"] . "')";
}
*/
$sql = "INSERT INTO usuario (Username, Password, Nombre, Apellidos, Fecha_de_Nacimiento)";
$sql .= " VALUES ('" .$data["Username"]. "', '" .$data["Password"]. "', '" .$data["Nombre"]. "',
				  '" .$data["Apellidos"]. "', '" .$data["Fecha"]. "')";
				  
$result = $conn->query($sql);

if ($result === TRUE) {
	echo '{"Codigo": "' . $data["Codigo"] . '"}';
}
else {
	echo '{"error": "No se pudo guardar el alumno"}';
}
$conn->close();
?>