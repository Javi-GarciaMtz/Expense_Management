<?php

class MoneyManager {

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
        // revisar posibles salidas y desconectar la db
    }

    public function get_money() {}

}
