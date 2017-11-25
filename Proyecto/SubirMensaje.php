<?php

header("Content-Type: text/javascript");
$data = json_decode(file_get_contents('php://input'), true);

// datos de mi JSON
$fecha = $data['Fecha'];
$texto = $data['Texto'];
$remitente= $data['Remitente'];
$destinatario = $data['Destinatario'];

$host = "localhost";
$username = "Israel";
$password = "migatafavorita";
$database = "chat";

$conn = new mysqli($host, $username, $password, $database) or die("Conexion fallida: %s\n". $conn -> error);

// Sacar cod de remitente
$sql = "SELECT Codigo FROM usuario WHERE Username='$remitente' ";
$result = $conn->query($sql) or die ("Wrong syntax in SQL code %s\n" . $result -> error);
$row = $result->fetch_assoc();
$codRemitente = $row["Codigo"];

// Sacar cod de destinatario
$sql = "SELECT Codigo FROM usuario WHERE Username='$destinatario' ";
$result = $conn->query($sql) or die ("Wrong syntax in SQL code %s\n" . $result -> error);
$row = $result->fetch_assoc();
$codDestinatario = $row["Codigo"];

// Insertar mensaje
$sql = "INSERT INTO mensaje (Fecha, Texto, Remitente, CodRemitente, Destinatario, CodDestinatario)
		VALUES ('$fecha', '$texto', '$remitente','$codRemitente', '$destinatario', '$codDestinatario')";

$result = $conn->query($sql);

$conn->close();
?>