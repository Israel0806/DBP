<?php

$host = "localhost";
$username = "Israel";
$password = "migatafavorita";
$database = "chat";

$conn = new mysqli($host, $username, $password, $database) or die("Conexion fallida: %s\n". $conn -> error);

$sql = "SELECT Username FROM usuario";

$result = $conn->query($sql) or die ("Wrong syntax in SQL code %s\n" . $result -> error);

$Users = array();

while($row = $result->fetch_assoc() ) {
    $item = '{"Username": "' . $row["Username"] . '"}';
    array_push($Users, $item);
}
echo "[" . implode(", ", $Users) . "]";

?>
