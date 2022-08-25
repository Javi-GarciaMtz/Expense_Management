<?php

include_once '../Managers/MoneyManager.php';

if ( isset($_POST['get_money']) ) {
    $money_manager = new MoneyManager;
    if( $money_manager->connect() ) {
        $data = $money_manager->get_money();

    } else {
        $data = $money_manager->get_error_data();
    }

    echo json_encode( $data );

}