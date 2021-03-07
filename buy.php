<?php

// Get the product data
$name = filter_input(INPUT_POST, 'name');
$address = filter_input(INPUT_POST, 'address');
$email = filter_input(INPUT_POST, 'email');
$foodName = filter_input(INPUT_POST, 'foodName');
$number = filter_input(INPUT_POST, 'number', FILTER_VALIDATE_INT);

// Validate inputs
if ($name == null || $foodName == null ||
    $address == null || $email == null || $number == null || $number == false ) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
    exit();
} else {
    
    require_once('database.php');

    // Add the product to the database 
    $query = "INSERT INTO order
                 (name, address, email, foodName, number)
              VALUES
                 (:name, :address, :email, :foodName, :number)";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':foodName', $foodName);
    $statement->bindValue(':number', $number);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');
}