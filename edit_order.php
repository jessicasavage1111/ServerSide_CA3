<?php

// Get the record data
$delivery_id = filter_input(INPUT_POST, 'delivery_id', FILTER_VALIDATE_INT);
$order_id = filter_input(INPUT_POST, 'order_id', FILTER_VALIDATE_INT);

// Validate inputs
if ($delivery_id == NULL || $delivery_id == FALSE || $order_id == NULL ||
$order_id == FALSE) {
$error = "Invalid food data. Check all fields and try again.";
include('error.php');
} 
else {

// If valid, update the record in the database
require_once('database.php');

$query = 'UPDATE orders
SET deliveryID = :delivery_id
WHERE orderID = :order_id';
$statement = $db->prepare($query);
$statement->bindValue(':delivery_id', $delivery_id);
$statement->bindValue(':order_id', $order_id);
$statement->execute();
$statement->closeCursor();

// Display the Product List page
include('orders.php');
}
?>