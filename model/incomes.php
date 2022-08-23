<?php

include_once 'connection_db.php';

if( isset($_POST['add_income'])) {

    $conn = new connectionDB();

    if( $conn->connect() ) {
        $data = explode(",", $_POST['add_income']);
        $name_income = $data[0];
        $amount = floatval($data[1]);
        $date = date("Y-m-d");
        $description = $data[2];

        $query = "SELECT * FROM money";
        $result = $conn->query($query);

        if( is_object($result) && $amount > 0 ) {
            $money_at_moment = floatval($result->fetch_row()[1]);
            $money_at_moment += $amount;
            $query_update_money = "UPDATE money SET amount = ".$money_at_moment. " WHERE money.id = 2";

            if( $conn->query($query_update_money) ) {
                $query_insert = "INSERT INTO income (id, name, amount, date, description) VALUES (NULL, '".$name_income."' , '".$amount."' , '".$date."' , '".$description."' )";
                if( $conn->query($query_insert) ) {
                    $data = array(
                            'code' => 200,
                            'status' => 'success'
                        );

                    } else {
                        $money_at_moment -= $amount;
                        $query_update_money = "UPDATE money SET amount = ".$money_at_moment. " WHERE money.id = 2";
                        $conn->query($query_update_money);
                        $data = array(
                            'code' => 400,
                            'status' => 'ERROR: Error al agregar el dinero actual del ingreso.'
                        );

                    }

            } else {
                $data = array(
                    'code' => 400,
                    'status' => 'error',
                    'message' => 'ERROR: Error al actualizar el dinero actual.'
                );

            }

        } else {
            $data = array(
                'code' => 400,
                'status' => 'error',
                'message' => 'ERROR: Error al realizar la consulta o ingreso invalido.'
            );

        }

    } else {
        $data = array(
            'code' => 400,
            'status' => 'error',
            'message' => 'ERROR: Error al realizar la conexión.'
        );

    }

    echo json_encode( $data );

}