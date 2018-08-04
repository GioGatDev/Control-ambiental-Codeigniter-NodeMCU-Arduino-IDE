<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "conam";
	// Crear conexión a base de datos
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Checar status de conexión
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	$sql = mysqli_query($conn, "SELECT * FROM sensor_temperatura ORDER BY fecha_senso DESC LIMIT 1;");

	while ($result=mysqli_fetch_array($sql)){
		$temp = $result['temperatura'];
	}
	echo "<h1 class='no-margins'>".$temp."</h1>";
?>
