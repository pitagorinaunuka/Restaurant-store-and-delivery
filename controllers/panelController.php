<?php

abstract class PController
{
    abstract public function showPanel();
}

class PanelController extends PController
{
    public function showPanel()
    {
        Flight::auth()->checkIfAdmin();
        $messagesSql = "SELECT * FROM messages";
        $messagesResult = Flight::db()->query($messagesSql);
        $usersSql = "SELECT * FROM users";
        $usersResult = Flight::db()->query($usersSql);
        $ordersSql = "SELECT * FROM orders WHERE processed = 0";
        $ordersResult = Flight::db()->query($ordersSql);
        Flight::render('panel.php', array('messages' => $messagesResult, 'users' => $usersResult, 'pendingOrders' => $ordersResult));
    }
}
