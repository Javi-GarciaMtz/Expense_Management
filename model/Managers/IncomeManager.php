<?php

include_once '../connection_db.php';
include_once 'MoneyManager.php';

class IncomeManager {

    private $conn;
    private $message;

    public function __construct() {}

    public function connect() {
        $this->conn = new connectionDB();
        if( $this->conn->connect() ) {
            return true;
        } else {
            $this->message = "Error al realizar la conexión.";
            return false;
        }
    }

    public function get_error_data() {
        return array(
            'code' => 400,
            'status' => 'error',
            'message' => 'ERROR:'.$this->message
        );
    }

    public function add_income($dataPost) {
        $name_income = $dataPost[0];
        $amount = floatval($dataPost[1]);
        $date = date("Y-m-d");
        $description = $dataPost[2];

        $money_manager = new MoneyManager();
        $money_manager->connect();
        $money_manager->mod_money($amount, '+');

        $query_insert = "INSERT INTO income (id, name, amount, date, description) VALUES (NULL, '".$name_income."' , '".$amount."' , '".$date."' , '".$description."' )";

        if( $this->conn->query($query_insert) ) {
            $data = array(
                'code' => 200,
                'status' => 'success'
            );

        } else {
            $data = array(
                'code' => 400,
                'status' => 'error',
                'message' => 'ERROR: Error al agregar el ingreso.'
            );
            $money_manager->mod_money($amount, '-');

        }

        $this->conn->disconnect();
        return $data;

    }

}