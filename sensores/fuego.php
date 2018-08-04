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
	//consulta de datos del sensor
	$sql = mysqli_query($conn, "SELECT * FROM sensor_fuego ORDER BY fecha_senso DESC LIMIT 1;");
 //resultados de la consulta
	while ($result=mysqli_fetch_array($sql)){
		if(($result['status'])==1){ //status de sensor
      echo "<h1 class='no-margins'>Hay Fuego</h1>"; //mensaje que se imprime si el estatus es 1
    }else if(($result['status'])==0){ //status de sensor
      echo "<h1 class='no-margins'>No hay fuego</h1>";//mensaje que se imprime si el estatus es 0
    }
	}
?>
