<?php
require_once('database.php');

// Get category ID
if (!isset($delivery_id)) {
$delivery_id = filter_input(INPUT_GET, 'delivery_id', 
FILTER_VALIDATE_INT);
if ($delivery_id == NULL || $delivery_id == FALSE) {
$delivery_id = 1;
}
}

// Get name for current category
$queryDelivery = "SELECT * FROM deliveries
WHERE deliveryID = :delivery_id";
$statement1 = $db->prepare($queryDelivery);
$statement1->bindValue(':delivery_id', $delivery_id);
$statement1->execute();
$delivery = $statement1->fetch();
$statement1->closeCursor();
$delivery_name = $delivery['progress'];

// Get all categories
$queryAllDeliveries = 'SELECT * FROM deliveries
ORDER BY deliveryID';
$statement2 = $db->prepare($queryAllDeliveries);
$statement2->execute();
$deliveries = $statement2->fetchAll();
$statement2->closeCursor();

// Get records for selected category
$queryRecords = "SELECT * FROM orders
WHERE deliveryID = :delivery_id
ORDER BY orderID";
$statement3 = $db->prepare($queryRecords);
$statement3->bindValue(':delivery_id', $delivery_id);
$statement3->execute();
$order = $statement3->fetchAll();
$statement3->closeCursor();

// $food_id = filter_input(INPUT_POST, 'food_id', FILTER_VALIDATE_INT);

// Get records for selected category
// $queryRecords = "SELECT * FROM food
// WHERE foodID = :food_id";
// $statement4 = $db->prepare($queryRecords);
// $statement4->bindValue(':food_id', $food_id);
// $statement4->execute();
// $food = $statement4->fetchAll();
// $statement4->closeCursor();
?>
<div class="container">
<?php
include('includes/header.php');
?>
<h1>Order List</h1>

<aside>
<!-- display a list of categories -->
<h2>Order Status</h2>
<nav>
<ul>
<?php foreach ($deliveries as $delivery) : ?>
<li><a href="?delivery_id=<?php echo $delivery['deliveryID']; ?>">
<?php echo $delivery['progress']; ?>
</a>
</li>
<?php endforeach; ?>
</ul>
</nav>          
</aside>

<section>
<!-- display a table of records -->
<h2><?php echo $delivery_name; ?></h2>
<table>
<tr>
<th>Name</th>
<th>Address</th>
<th>Email</th>
<th>Item</th>
<th>Quantity</th>
<th>Change Status</th>
</tr>
<?php foreach ($order as $item) : ?>
<tr>
<td><?php echo $item['name']; ?></td>
<td><?php echo $item['address']; ?></td>
<td><?php echo $item['email']; ?></td>
<td><?php echo $item['foodID']; ?></td>
<td class="right"><?php echo $item['number']; ?></td>

<td><form action="edit_order_form.php" method="post"
id="delete_record_form">
<input type="hidden" name="order_id"
value="<?php echo $item['orderID']; ?>">
<input type="hidden" name="order_id"
value="<?php echo $item['orderID']; ?>">
<input class="green-button" type="submit" value="Edit">
</form></td>
</tr>
<?php endforeach; ?>
</table>
</section>
<?php
include('includes/footer.php');
?>