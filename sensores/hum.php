<?php
	$servername = "localhost";
	$username = "";
	$password = "";
	$dbname = "";
	// Crear conexión a base de datos
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Checar status de conexión
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	//consulta de datos de la tabla sensor de temperatura
	$sql = mysqli_query($conn, "SELECT * FROM sensor_temperatura ORDER BY fecha_senso DESC LIMIT 1;");

	while ($result=mysqli_fetch_array($sql)){
		$hum = $result['humedad'];
	}
	echo "<h1 class='no-margins'>".$hum."</h1>";

?>
