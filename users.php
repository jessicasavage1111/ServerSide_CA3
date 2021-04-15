<?php
require_once('database.php');

$user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);

// Get records for selected category
$queryRecords = "SELECT * FROM users
WHERE userID = :user_id
ORDER BY userID";
$statement3 = $db->prepare($queryRecords);
$statement3->bindValue(':user_id', $user_id);
$statement3->execute();
$user = $statement3->fetchAll();
$statement3->closeCursor();
?>
<div class="container">
<?php
include('includes/header.php');
?>
<h1>Users List</h1>

<section>
<!-- display a table of records -->
<table>
<tr>
<th>Username</th>
<th>Password</th>
<th>Delete</th>
</tr>
<?php foreach ($user as $item) : ?>
<tr>
<td><?php echo $item['username']; ?></td>
<td><?php echo $item['password']; ?></td>

<td><form action="delete_user.php" method="post"
id="delete_record_form">
<input type="hidden" name="user_id"
value="<?php echo $item['id']; ?>">
<input class="red-button" type="submit" value="Delete">
</form></td>
</tr>
<?php endforeach; ?>
</table>
</section>
<?php
include('includes/footer.php');
?>