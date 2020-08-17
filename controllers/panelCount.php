<?php

abstract class PCount
{
    abstract public function totalUsers();
    abstract public function totalMessages();
    abstract public function totalPendingOrders();
    abstract public function totalOrders();
}

class PanelCount extends PCount
{
    public function totalUsers()
    {
        Flight::auth()->checkIfAdmin();
        $sql = "SELECT * FROM users";
        $result = Flight::db()->query($sql);
        return $result->num_rows;
    }

    public function totalMessages()
    {
        Flight::auth()->checkIfAdmin();
        $sql = "SELECT * FROM messages";
        $result = Flight::db()->query($sql);
        return $result->num_rows;
    }
    public function totalPendingOrders()
    {
        Flight::auth()->checkIfAdmin();
        $sql = "SELECT * FROM orders WHERE processed = 0";
        $result = Flight::db()->query($sql);
        return $result->num_rows;
    }
    public function totalOrders()
    {
        Flight::auth()->checkIfAdmin();
        $sql = "SELECT * FROM orders";
        $result = Flight::db()->query($sql);
        return $result->num_rows;
    }
}
