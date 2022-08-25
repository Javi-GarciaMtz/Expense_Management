<?php

class connectionDB{

    private $server;
    private $user;
    private $password;
    private $database;
    private $conn;

    public function __construct(){
        $this->server = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->database = "expense_management";

        // $this->server = "localhost";
        // $this->user = "id17104529_testing";
        // $this->password = "7v{ImI1*kp&Vqdl~";
        // $this->database = "id17104529_expense_management";

    }

    public function connect(){
        $this->conn = new mysqli($this->server, $this->user, $this->password, $this->database);

        if ( $this->conn->connect_errno ) {
            $data = false;
        } else {
            $data = true;
        }

        return $data;

    }

    public function disconnect(){
        if( $this->conn->close() ) {
            $data = true;
        } else {
            $data = false;
        }

        return $data;
    }

    public function query($sql){
        $result = $this->conn->query($sql);
        return $result;
    }

}




