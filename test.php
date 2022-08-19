<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "expense_management";

$mysqli = new mysqli($server,$user, $password, $database);

// Comprobar la conexión
if ($mysqli->connect_errno) {
    echo "Falló la conexión: %s\n".$mysqli->connect_error;
}

// Prueba de obtención de datos
if ($result = $mysqli->query("SELECT * FROM expenses")) {

    for ($i=0; $i < $result->num_rows; $i++) {
        $row = $result->fetch_row();
        var_dump($row);
    }

    // $result->close();
}



