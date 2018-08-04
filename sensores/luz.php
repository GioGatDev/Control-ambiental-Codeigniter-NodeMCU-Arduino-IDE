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
	//consulta de datos de la tabla de la fotoresistencia
	$sql = mysqli_query($conn, "SELECT * FROM sensor_luz ORDER BY fecha_senso DESC LIMIT 1;");
	while ($result=mysqli_fetch_array($sql)){
		if(($result['status'])==1){ //status de sensor
      echo "<h1 class='no-margins'>Luz encendida</h1>"; //mensaje que se imprime si el estatus es 1
    }else if(($result['status'])==0){ //status de sensor
      echo "<h1 class='no-margins'>Luz apagada</h1>";//mensaje que se imprime si el estatus es 0
    }
	}

?>
