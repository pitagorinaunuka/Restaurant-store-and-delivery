<?php

class subscription
{
    public $email;

    public function __construct($arr)
    {
        $this->email = $arr['subscribe_email'];
    }

    public function store()
    {
        Flight::db()->begin_transaction();
        $sql = "INSERT INTO subscriptions (email) VALUES ('$this->email')";
        $result = Flight::db()->query($sql);
        Flight::db()->commit();
    }
}
