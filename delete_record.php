<?php
require_once('database.php');

// Get IDs
$food_id = filter_input(INPUT_POST, 'food_id', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

// Delete the product from the database
if ($food_id != false && $category_id != false) {
    $query = "DELETE FROM food
              WHERE foodID = :food_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':food_id', $food_id);
    $statement->execute();
    $statement->closeCursor();
}

// display the Product List page
include('index.php');
?>