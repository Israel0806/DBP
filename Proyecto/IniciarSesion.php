<?php

header("Content-Type: text/javascript");
$data = json_decode(file_get_contents('php://input'), true);
$servername = "localhost";
$username = "Israel";
$password = "migatafavorita";
$database = "chat";

$conn = new mysqli($servername, $username, $password,$database) or die("Conexion fallida: %s\n". $conn -> error);

$User = $data['Username'];
$pass = $data['Password'];

$sql = "SELECT Username, Password FROM usuario";
				  
$result = $conn->query($sql) or die("Codigo SQL mal hecho: %s\n".$conn->error);

$bool = "0";
while($row = $result->fetch_assoc() )
{
    $IUser 		= $row['Username'];
    $IPassword  = $row['Password'];
//	echo $IUser . " ";
//	echo $IPassword . "\n";
	if($User == $IUser and $pass == $IPassword )
	{
		$bool="1";
		break;
	}
}
if($bool=="1")
{
	echo 1;
//	implode("1");
/*	$file = $DOCUMENT_ROOT. "UsuarioIngresado.html";
	$doc = new DOMDocument();
	$doc->loadHTMLFile($file);*/
}
else
{
	return 0;
//	echo 'Sesion NO Iniciada';
}

$conn->close();

?>


