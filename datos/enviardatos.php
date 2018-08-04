<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "conam";
$chipid = $_POST ['chipid'];
$temperatura = $_POST ['temperatura'];
$humedad = $_POST['humedad'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO sensor_temperatura (dispositivo, temperatura, humedad)
VALUES ('$chipid', '$temperatura', '$humedad')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?> 