<?php

if( isset($_POST['add_income'])) {
    $data = explode(",", $_POST['add_income']);

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
        $name_income = $data[0];
        $amount = floatval($data[1]);
        $date = date("Y-m-d");
        $description = $data[2];

        $money_at_moment = 0;
        $result = $mysqli->query("SELECT * FROM money");
        $money_at_moment = floatval($result->fetch_row()[1]);
        $money_at_moment += $amount;

        $query_update_money = "UPDATE money SET amount = ".$money_at_moment. " WHERE money.id = 1";
        $mysqli->query($query_update_money);

        $query_insert = "INSERT INTO income (id, name, amount, date, description) VALUES (NULL, '".$name_income."' , '".$amount."' , '".$date."' , '".$description."' )";

        if ($result = $mysqli->query($query_insert)) {

            if($result) {
                $data = array(
                    'code' => 200,
                    'status' => 'success'
                );
            } else {
                $data = array(
                    'code' => 400,
                    'status' => 'error'
                );

            }

        }

        echo json_encode( $data );
    }
}