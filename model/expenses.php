<?php

if ( isset($_POST['get_expenses']) ) {

    // var_dump($_POST['getExpenses']);

    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "expense_management";

    $mysqli = new mysqli($server,$user, $password, $database);

    if ($mysqli->connect_errno) {
        echo "Falló la conexión: %s\n".$mysqli->connect_error;
        $data = array(
            'code' => 400,
            'status' => 'error'
        );

    } else {
        if ($result = $mysqli->query("SELECT * FROM expenses")) {

            $expenses = array();
            for ($i=0; $i < $result->num_rows; $i++) {
                $row = $result->fetch_row();
                array_push($expenses, $row);
            }

            $data = array(
                'code' => 200,
                'status' => 'success',
                'expenses' => $expenses
            );

            $result->close();

        } else {
            $data = array(
                'code' => 400,
                'status' => 'error'
            );

        }

    }

    echo json_encode( $data );

}