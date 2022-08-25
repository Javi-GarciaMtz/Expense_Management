<?php

include_once '../Managers/IncomeManager.php';

if ( isset($_POST['add_income']) ) {
    $income_manager = new IncomeManager;

    if( $income_manager->connect() ) {
        $dataPost = explode(",", $_POST['add_income']);
        $data = $income_manager->add_income($dataPost);

    } else {
        $data = $income_manager->get_error_data();
    }

    echo json_encode( $data );

}