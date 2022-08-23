<?php

include_once 'connection_db.php';

if ( isset($_POST['get_money']) ) {

    $conn = new connectionDB();

    if( $conn->connect() ) {
        $query = "SELECT * FROM money";
        $result = $conn->query($query);

        if( is_object($result) ) {
            $money_at_moment = floatval($result->fetch_row()[1]);
            $data = array(
                'code' => 200,
                'status' => 'success',
                'money_at' => $money_at_moment
            );
            $conn->disconnect();

        } else {
            $data = array(
                'code' => 400,
                'status' => 'error',
                'message' => 'ERROR: Error al realizar la consulta.'
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