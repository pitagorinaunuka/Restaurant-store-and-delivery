<?php

class user
{
    public $id;
    public $first_name;
    public $last_name;
    public $email;
    private $password;
    public $role = 'user';

    public static $validate = array(
        "first_name" => array(
            "type" => "text",
            "required" => true),
        "last_name" => array(
            "type" => "text",
            "required" => true),
        "email" => array(
            "type" => "email",
            "required" => true,
            "unique" => true),
    );

    public function __construct($arr)
    {
        $this->id = $arr['id'];
        $this->first_name = $arr['first_name'];
        $this->last_name = $arr['last_name'];
        $this->email = $arr['email'];
        $this->password = $arr['password'];
        $this->role = $arr['role'];
    }

    public function store()
    {
        Flight::db()->begin_transaction();
        $password = password_hash("$this->password", PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (first_name, last_name, email, password, role) VALUES ('$this->first_name','$this->last_name','$this->email','$password','user')";
        $result = Flight::db()->query($sql);
        Flight::db()->commit();
    }

    public function update()
    {
        Flight::db()->begin_transaction();
        $sql = "UPDATE user SET first_name = '$this->first_name', last_name = '$this->last_name', email = '$this->email' WHERE id='$this->id'";

        $result = Flight::db()->query($sql);

        if ($result == false) {
            Flight::db()->rollback();
            return false;
        }
        Flight::db()->commit();

        return true;
    }
}
