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

$name_expense = "prueba de gasto desde php 2";
$cost = 23.23;
$date = date("Y-m-d");
$description = "esto es una descriopcion desde php";

$query_insert = "INSERT INTO expenses (id, name, cost, date, description) VALUES (NULL, '".$name_expense."' , '".$cost."' , '".$date."' , '".$description."' )";

// var_dump($query_insert); die();

if ($result = $mysqli->query($query_insert)) {

    var_dump($result);

}



