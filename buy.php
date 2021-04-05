<?php

// Get the product data
$food_id = filter_input(INPUT_POST, 'food_id', FILTER_VALIDATE_INT);
$name = filter_input(INPUT_POST, 'name');
$address = filter_input(INPUT_POST, 'address');
$email = filter_input(INPUT_POST, 'email');
$number = filter_input(INPUT_POST, 'number', FILTER_VALIDATE_INT);

// Validate inputs
if ($name == null || $address == null || $email == null || $number == null || $number == false ) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
    exit();
} else {
    
    require_once('database.php');

    // Add the product to the database 
    $query = "INSERT INTO order
                 (foodID, name, address, email, number)
              VALUES
                 (:food_id, :name, :address, :email, :number)";
    $statement = $db->prepare($query);
    $statement->bindValue(':food_id', $food_id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':number', $number);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');
}