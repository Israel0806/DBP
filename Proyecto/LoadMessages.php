<?php

$host = "localhost";
$username = "Israel";
$password = "migatafavorita";
$database = "chat";

$conn = new mysqli($host, $username, $password, $database) or die("Conexion fallida: %s\n". $conn -> error);

$sql = "SELECT Fecha,Texto,Destinatario,Remitente FROM mensaje";

$result = $conn->query($sql) or die ("Wrong syntax in SQL code %s\n" . $result -> error);

$Messages = array();

while($row = $result->fetch_assoc() ) 
{
    $item = '{"Fecha": "' . $row["Fecha"] . '", "Texto": "' . $row["Texto"];
    $item .= '", "Destinatario": "' . $row["Destinatario"];
    $item .= '", "Remitente": "' . $row["Remitente"]. '"}';
    array_push($Messages, $item);
}
echo "[" . implode(", ", $Messages) . "]";

$conn->close();
?>
