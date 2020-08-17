<?php

class auth
{
    public $logedin = false;
    public $currentUser = null;

    public static $validate = array(
        "email" => array(
            "type" => "email",
            "required" => true),
        "password" => array(
            "type" => "password",
            "required" => true,
        ),
    );
    public function checkIfAdmin($role = "user")
    {
        if (!isset($_SESSION['user'])) {
            // Flight::notLogedIn();
            Flight::redirect('/');
            die();
        }

        $this->currentUser = $_SESSION['user'];

        if ($this->currentUser->role == $role) {
            // Flight::noAccess();
            Flight::redirect('/');
        } else {
            $this->logedin = true;
        }

    }

    public function checkIfUser($role = "user")
    {
        if (!isset($_SESSION['user'])) {
            // Flight::notLogedIn();
            die('not logged in.');
            Flight::redirect('/');
        }

        $this->currentUser = $_SESSION['user'];

        if ($this->currentUser->role == $role) {
            $this->logedin = true;

        } else {
            // Flight::noAccess();
            die("no access.");
            Flight::redirect('/');
        }

    }

    public function check($set = false)
    {
        if ($set == false) {
            if (isset($_SESSION['user'])) {
                Flight::redirect('/');
            }
        } else {
            if (!isset($_SESSION['user'])) {
                Flight::redirect('/');
                die();
            }
        }
    }

    public function online()
    {
        return !($this->currentUser == null);
    }

    public function __construct()
    {
        $this->currentUser = isset($_SESSION['user']) ? $_SESSION['user'] : null;
    }

    public function logout()
    {
        unset($_SESSION['user']);
        Flight::redirect("/");
    }

    public function login()
    {
        $email = Flight::request()->data->email_login;
        $password = Flight::request()->data->password_login;

        $sql = "SELECT * FROM users WHERE email = '$email'";

        $result = Flight::db()->query($sql);

        if ($result == false) {
            Flight::redirect('/');
        }

        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            $_SESSION['user'] = new user($row);
            Flight::redirect('/');
        } else {
            Flight::redirect('/');
        }

    }

    public function register()
    {
        Flight::auth()->check();

        $data = Flight::request()->data;

        $user = new user($data);
        $user->store();
        Flight::redirect("/");
    }
    public function checkEmail()
    {
        $input = Flight::request()->data->email;
        $sql = "SELECT * FROM users WHERE email = '" . $input . "'";
        $result = Flight::db()->query($sql);
        if ($result->num_rows > 0) {
            $available = 0;
        } else {
            $available = 1;
        }
        echo $available;
    }
}
