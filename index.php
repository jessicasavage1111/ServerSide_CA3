<?php
require_once('database.php');

// Get category ID
if (!isset($category_id)) {
$category_id = filter_input(INPUT_GET, 'category_id', 
FILTER_VALIDATE_INT);
if ($category_id == NULL || $category_id == FALSE) {
$category_id = 1;
}
}

// Get name for current category
$queryCategory = "SELECT * FROM categories
WHERE categoryID = :category_id";
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$statement1->closeCursor();
$category_name = $category['categoryName'];

// Get all categories
$queryAllCategories = 'SELECT * FROM categories
ORDER BY categoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get records for selected category
$queryRecords = "SELECT * FROM food
WHERE categoryID = :category_id
ORDER BY foodID";
$statement3 = $db->prepare($queryRecords);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$food = $statement3->fetchAll();
$statement3->closeCursor();
?>
<div class="container">
<?php
include('includes/header.php');
?>
<h1>Food List</h1>

<aside>
<!-- display a list of categories -->
<h2>Categories</h2>
<nav>
<ul>
<?php foreach ($categories as $category) : ?>
<li><a href=".?category_id=<?php echo $category['categoryID']; ?>">
<?php echo $category['categoryName']; ?>
</a>
</li>
<?php endforeach; ?>
</ul>
</nav>          
</aside>

<section>
<!-- display a table of records -->
<h2><?php echo $category_name; ?></h2>
<table>
<tr>
<th>Image</th>
<th>Name</th>
<th>Expiry Date</th>
<th>Price</th>
<th>Delete</th>
<th>Edit</th>
<th>Buy</th>
</tr>
<?php foreach ($food as $item) : ?>
<tr>
<td><img src="image_uploads/<?php echo $item['image']; ?>" width="100px" height="100px" /></td>
<td><?php echo $item['name']; ?></td>
<td><?php echo $item['expiryDate']; ?></td>
<td class="right"><?php echo $item['price']; ?></td>

<td><form action="delete_record.php" method="post"
id="delete_record_form">
<input type="hidden" name="food_id"
value="<?php echo $item['foodID']; ?>">
<input type="hidden" name="category_id"
value="<?php echo $item['categoryID']; ?>">
<input class="red-button" type="submit" value="Delete">
</form></td>

<td><form action="edit_record_form.php" method="post"
id="delete_record_form">
<input type="hidden" name="food_id"
value="<?php echo $item['foodID']; ?>">
<input type="hidden" name="category_id"
value="<?php echo $item['categoryID']; ?>">
<input class="blue-button" type="submit" value="Edit">
</form></td>
<td><form action="buy_form.php" method="post"
id="delete_record_form">
<input type="hidden" name="food_id"
value="<?php echo $item['foodID']; ?>">
<input type="hidden" name="category_id"
value="<?php echo $item['categoryID']; ?>">
<input class="green-button" type="submit" value="Buy">
</form></td>
</tr>
<?php endforeach; ?>
</table>
</section>
<?php
include('includes/footer.php');
?>