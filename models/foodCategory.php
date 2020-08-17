<?php

class foodCategory
{
    public $category;

    public function __construct($arr)
    {
        if (!isset($_SESSION['user'])) {
            die("You're not logged in.");
        }
        $this->category = $arr['food_category'];
    }

    public function store()
    {
        Flight::db()->begin_transaction();
        $sql = "INSERT INTO foodcategories (category) VALUES ('$this->category')";
        $result = Flight::db()->query($sql);
        Flight::db()->commit();
    }
}
