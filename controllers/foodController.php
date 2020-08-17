<?php

abstract class FController
{
    abstract public function addFood();
    abstract public function createFood();
    abstract public function updateFood($id);
    abstract public function deleteFood();

}

class FoodController extends FController
{
    public function addFood()
    {
        Flight::auth()->checkIfAdmin();
        $sql = "SELECT * FROM foodcategories";
        $result = Flight::db()->query($sql);
        Flight::db()->commit();
        Flight::render('addFood.php', array('categories' => $result, 'food_category' => Flight::request()->data->food_category));
    }
    public function createFood()
    {
        Flight::auth()->checkIfAdmin();
        $food = Flight::request()->data->food_name;
        $category = Flight::request()->data->food_category;
        $checkIfExists = "SELECT * FROM foods WHERE food = '" . $food . "' AND category = '" . $category . "'";
        $result = Flight::db()->query($checkIfExists);
        if ($result->num_rows == 0) {
            //extension and filename
            $fileNameArray = explode(".", Flight::request()->files->food_image['name']);
            $fileName = "";
            $tempArray = $fileNameArray;
            array_pop($tempArray);
            foreach ($tempArray as $array) {
                $fileName .= $array;
            }
            $fileName .= "-" . time();
            $extension = end($fileNameArray);

            $food = Flight::request()->data->food_name;
            $category = Flight::request()->data->food_category;
            $price = Flight::request()->data->food_price;
            $description = Flight::request()->data->food_description;
            $image = $fileName . "." . $extension;
            $sql = "INSERT INTO foods (food, category, price, description, image) VALUES ('$food', '$category', '$price', '$description', '$image')";
            $result = Flight::db()->query($sql);
            Flight::db()->commit();
            //move file
            move_uploaded_file(Flight::request()->files->food_image['tmp_name'], "/xampp/htdocs/food_images/" . $fileName . "." . $extension);
            Flight::redirect('/panel/menu');
        }

    }
    public function updateFood($id)
    {

        Flight::auth()->checkIfAdmin();
        $food = Flight::request()->data->food_name;
        $category = Flight::request()->data->food_category;
        $checkIfExists = "SELECT * FROM foods WHERE id = '" . $id . "'";
        $result = Flight::db()->query($checkIfExists);

        $row = $result->fetch_assoc();
        //extension and filename
        if (Flight::request()->files->food_image['error'] == 0) {
            $fileNameArray = explode(".", Flight::request()->files->food_image['name']);
            $fileName = "";
            $tempArray = $fileNameArray;
            array_pop($tempArray);
            foreach ($tempArray as $array) {
                $fileName .= $array;
            }
            $fileName .= "-" . time();
            $extension = end($fileNameArray);
            $image = $fileName . "." . $extension;

            $food = Flight::request()->data->food_name;
            $category = Flight::request()->data->food_category;
            $price = Flight::request()->data->food_price;
            $description = Flight::request()->data->food_description;

            $sql = "UPDATE foods SET food = '$food', category = '$category', price = '$price', description = '$description', image = '$image' WHERE id = '" . $row['id'] . "'";
            $result = Flight::db()->query($sql);
            move_uploaded_file(Flight::request()->files->food_image['tmp_name'], "/xampp/htdocs/food_images/" . $fileName . "." . $extension);
            Flight::redirect('/panel/menu');
        } else {
            $food = Flight::request()->data->food_name;
            $category = Flight::request()->data->food_category;
            $price = Flight::request()->data->food_price;
            $description = Flight::request()->data->food_description;

            $sql = "UPDATE foods SET food = '$food', category = '$category', price = '$price', description = '$description' WHERE id = '" . $row['id'] . "'";

            $result = Flight::db()->query($sql);
            Flight::redirect('/panel/menu');
        }

    }
    public function deleteFood()
    {
        Flight::auth()->checkIfAdmin();
        $id = Flight::request()->data->food_id;
        $sql = "DELETE FROM foods WHERE id = '$id'";
        $result = Flight::db()->query($sql);
        Flight::db()->commit();
        Flight::redirect('/panel/menu');

    }
}
