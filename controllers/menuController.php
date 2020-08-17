<?php

abstract class MController
{
    abstract public function showMenu();
    abstract public function addCategory();
    abstract public function createFoodCategory();
    abstract public function deleteFoodCategory();
    abstract public function addFoodView();
    abstract public function viewFood($id);

}

class MenuController extends MContoller
{
    public function showMenu()
    {
        Flight::auth()->checkIfAdmin();

        $sql = "SELECT * FROM foodcategories ORDER BY category ASC";
        $result = Flight::db()->query($sql);
        Flight::db()->commit();

        Flight::render('menu.php', array('result' => $result));
    }
    public function addCategory()
    {
        Flight::auth()->checkIfAdmin();
        Flight::render('addCategory.php');
    }
    public function createFoodCategory()
    {
        Flight::auth()->checkIfAdmin();

        $data = Flight::request()->data;

        $foodCategory = new foodCategory($data);
        $foodCategory->store();
        Flight::redirect("/panel/menu");
    }
    public function deleteFoodCategory()
    {
        Flight::auth()->checkIfAdmin();

        $data = Flight::request()->data;
        $foodsOfCategorySql = "SELECT * FROM foods WHERE category = '" . $data->categoryID . "'";
        $foodsOfCategory = Flight::db()->query($foodsOfCategorySql);
        foreach ($foodsOfCategory as $food) {
            $orders = "DELETE FROM orders WHERE food = '" . $food['id'] . "'";
            $result = Flight::db()->query($orders);
            $foodDeleteSql = "DELETE FROM foods WHERE id = '" . $food['id'] . "'";
            $foodDeleteResult = Flight::db()->query($foodDeleteSql);
        }

        $sql = "DELETE FROM foodcategories WHERE id = '" . $data->categoryID . "'";
        $result = Flight::db()->query($sql);
        Flight::db()->commit();
        Flight::redirect(Flight::request()->referrer);
    }
    public function addFoodView()
    {
        Flight::auth()->checkIfAdmin();
        Flight::render('addFood.php');
    }
    public function viewFood($id)
    {
        Flight::auth()->checkIfAdmin();
        $sql = "SELECT * FROM foods WHERE id = $id";
        $result = Flight::db()->query($sql);
        $food = $result->fetch_assoc();
        Flight::db()->commit();
        unset($sql);
        unset($result);
        $sql = "SELECT * FROM foodcategories";
        $categories = Flight::db()->query($sql);
        Flight::db()->commit();

        Flight::render('showFood.php', array('food' => $food, 'categories' => $categories));
    }
}
