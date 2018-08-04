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
	//consulta de datos de la tabla sensor de gas
	$sql = mysqli_query($conn, "SELECT * FROM sensor_gas ORDER BY fecha_senso DESC LIMIT 1;");
	//resultados de la consulta
  while ($result=mysqli_fetch_array($sql)){
		if(($result['status'])==1){ //status del sensor
      echo "<h1 class='no-margins'>Hay gas</h1>"; //mensaje que se imprime en el contenedor
    }else if(($result['status'])==0){ //status del sensor
      echo "<h1 class='no-margins'>No hay gas</h1>"; //mensaje que se imprime en el contenedor
    }
	}
?>
