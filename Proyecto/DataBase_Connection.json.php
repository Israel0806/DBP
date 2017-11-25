<?php

$servername = "localhost";
$username = "Israel";
$password = "migatafavorita";
$database = "chat";


// Create connection
$conn = new mysqli($servername, $username, $password, $database)/*check connection*/ or die("Conexion fallida: %s\n". $conn -> error);

$sql = "SELECT Codigo, Username, Password, Nombre, Apellidos, Fecha_de_Nacimiento FROM usuario";
$result = $conn->query($sql) or die($conn->error);
$Users = array();

while($row = $result->fetch_assoc() ) {
    $codigo = $row["Codigo"];
    $item = '{"Codigo": "' . $codigo . '", "Nombre": "' . $row["Nombre"];
    $item .= '", "Username": "' . $row["Username"];
    $item .= '", "Password": "' . $row["Password"];
    $item .= '", "Nombre": "' . $row["Nombre"];
    $item .= '", "Apellidos": "' . $row["Apellidos"];
    $item .= '", "Fecha": "' . $row["Fecha_de_Nacimiento"]. '"}';
    array_push($Users, $item);
}
echo "[" . implode(", ", $Users) . "]";
$conn->close();

?> 




















