<?php
require_once('database.php');

// Get IDs
$user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);
// Delete the product from the database
if ($user_id != false) {
    $query = "DELETE FROM users
              WHERE id = :user_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $statement->closeCursor();
}

// display the Product List page
include('users.php');
?>