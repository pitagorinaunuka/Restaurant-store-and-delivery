<?php

abstract class UController
{
    abstract public function deleteUser($id);
}

class UserController extends UController
{
    public function deleteUser($id)
    {
        Flight::auth()->checkIfAdmin();
        $sql = "DELETE FROM users WHERE id = $id";
        $result = Flight::db()->query($sql);
        Flight::redirect('/panel');
    }
}
