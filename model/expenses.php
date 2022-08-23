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

} else if( isset($_POST['add_expense'])) {

    $data = explode(",", $_POST['add_expense']);

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
        $name_expense = $data[0];
        $cost = floatval($data[1]);
        $date = date("Y-m-d");
        $description = $data[2];

        $money_at_moment = 0;
        $result = $mysqli->query("SELECT * FROM money");

        $money_at_moment = floatval($result->fetch_row()[1]);

        $money_at_moment -= $cost;

        $query_update_money = "UPDATE money SET amount = ".$money_at_moment. " WHERE money.id = 1";
        $mysqli->query($query_update_money);

        $query_insert = "INSERT INTO expenses (id, name, cost, date, description) VALUES (NULL, '".$name_expense."' , '".$cost."' , '".$date."' , '".$description."' )";

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