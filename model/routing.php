<?php

include_once 'Managers/ExpensesManager.php';

if ( isset($_POST['get_expenses_all']) ) {
    $expenses_manager = new ExpensesManager;
    if( $expenses_manager->connect() ) {
        $data = $expenses_manager->get_expenses_all();

    } else {
        $data = $expenses_manager->get_error_data();
    }

    echo json_encode( $data );

} else if ( isset($_POST['add_expense']) ) {
    $expenses_manager = new ExpensesManager;
    if( $expenses_manager->connect() ) {
        $dataPost = explode(",", $_POST['add_expense']);
        $data = $expenses_manager->add_expense($dataPost);

    } else {
        $data = $expenses_manager->get_error_data();
    }

    echo json_encode( $data );

} else if( isset($_POST['get_expenses_month']) ) {
    $expenses_manager = new ExpensesManager;
    if( $expenses_manager->connect() ) {
        $dataPost = explode(",", $_POST['get_expenses_month']);
        $data = $expenses_manager->get_expenses_month($dataPost);

    } else {
        $data = $expenses_manager->get_error_data();
    }

    echo json_encode( $data );

}