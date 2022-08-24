<?php

include_once 'connection_db.php';

class ExpensesManager {

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

    public function get_expenses_all() {
        $query = "SELECT * FROM expenses";
        $result = $this->conn->query($query);
        if( is_object($result) ) {
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

        } else {
            $data = array(
                'code' => 400,
                'status' => 'error',
                'message' => 'ERROR: Error al obtener los gastos.'
            );

        }

        $this->conn->disconnect();
        return $data;

    }

    // -------------------- ESTO SE DEBE MOVER A MONEY
    public function mod_money($amount, $add_or_sub) {
        $money_at_moment = 0;
        $result = $this->conn->query("SELECT * FROM money");

        $money_at_moment = floatval($result->fetch_row()[1]);

        if( $add_or_sub == '-') {
            $money_at_moment -= $amount;
        } else if($add_or_sub == '+') {
            $money_at_moment += $amount;
        }

        $query_update_money = "UPDATE money SET amount = ".$money_at_moment. " WHERE money.id = 1";

        $this->conn->query($query_update_money);

    }
    // ----------------------- TODO ESTO AAAAAAAAA

    public function add_expense($dataPost) {
        $name_expense = $dataPost[0];
        $cost = floatval($dataPost[1]);
        $date = date("Y-m-d");
        $description = $dataPost[2];

        $this->mod_money($cost, '-');

        $query_insert = "INSERT INTO expenses (id, name, cost, date, description) VALUES (NULL, '".$name_expense."' , '".$cost."' , '".$date."' , '".$description."' )";

        if( $this->conn->query($query_insert) ) {
            $data = array(
                'code' => 200,
                'status' => 'success'
            );

        } else {
            $data = array(
                'code' => 400,
                'status' => 'error',
                'message' => 'ERROR: Error al agregar el gasto.'
            );

        }

        $this->conn->disconnect();
        return $data;

    }

    public function get_expenses_month($dataPost) {
        $month = $dataPost[0];
        $year = $dataPost[1];

        $query = "SELECT * FROM expenses WHERE MONTH(date) = '".$month."' AND YEAR(date) = '".$year."'";

        if( $result = $this->conn->query($query) ) {
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

        } else {
            $data = array(
                'code' => 400,
                'status' => 'error',
                'message' => 'ERROR: Error no hay gastos en ese mes.'
            );

        }

        $this->conn->disconnect();
        return $data;

    }

}