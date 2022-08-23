<?php

if ( isset($_POST['get_money']) ) {

    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "expense_management";

    $mysqli = new mysqli($server, $user, $password, $database);

    if ($mysqli->connect_errno) {
        echo "Falló la conexión: %s\n".$mysqli->connect_error;
        $data = array(
            'code' => 400,
            'status' => 'error'
        );

    } else {
        $money_at_moment = 0;
        $result = $mysqli->query("SELECT * FROM money");

        $money_at_moment = floatval($result->fetch_row()[1]);

        $data = array(
            'code' => 200,
            'status' => 'success',
            'money_at' => $money_at_moment
        );

        echo json_encode( $data );
    }

}