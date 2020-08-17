<?php

abstract class OController
{
    abstract public function orderProcessed();
    abstract public function orderDeleted();
    abstract public function orderSubmit();
}

class OrderController extends OController
{
    public function orderProcessed()
    {
        Flight::auth()->checkIfAdmin();
        $orderID = Flight::request()->data->orderID;
        $sql = "UPDATE orders SET processed = 1 WHERE id = $orderID";
        $result = Flight::db()->query($sql);
        Flight::redirect('/panel');
    }
    public function orderDeleted()
    {
        Flight::auth()->checkIfAdmin();
        $orderID = Flight::request()->data->orderID;
        $sql = "DELETE FROM orders WHERE id = $orderID";
        $result = Flight::db()->query($sql);
        Flight::redirect('/panel');
    }
    public function orderSubmit()
    {
        $set = true;
        Flight::auth()->check($set);
        $food = Flight::request()->data->food;
        $first_name = Flight::request()->data->first_name;
        $last_name = Flight::request()->data->last_name;
        $city = Flight::request()->data->city;
        $address = Flight::request()->data->address;
        $telephone = Flight::request()->data->telephone;
        $quantity = Flight::request()->data->quantity;

        $sql = "INSERT INTO orders (food, first_name, last_name, city, address, telephone, quantity, processed) VALUES ('$food', '$first_name', '$last_name', '$city', '$address', '$telephone', '$quantity', 0)";
        $result = Flight::db()->query($sql);
        Flight::redirect(Flight::request()->referrer);

    }
}


