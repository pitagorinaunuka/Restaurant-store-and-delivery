<?php

class message
{
    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $message;

    public function __construct($arr)
    {
        if (!isset($_SESSION['user'])) {
            die("You're not logged in.");
        }
        $this->id = $arr['id'];
        $this->first_name = $arr['first_name'];
        $this->last_name = $arr['last_name'];
        $this->email = $_SESSION['user']->email;
        $this->message = $arr['message'];
    }

    public function store()
    {
        Flight::db()->begin_transaction();
        $sql = "INSERT INTO messages (first_name, last_name, email, message) VALUES ('$this->first_name','$this->last_name','$this->email','$this->message')";
        $result = Flight::db()->query($sql);
        Flight::db()->commit();
    }
}
