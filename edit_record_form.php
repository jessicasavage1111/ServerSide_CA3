<?php
require('database.php');

$food_id = filter_input(INPUT_POST, 'food_id', FILTER_VALIDATE_INT);
$query = 'SELECT *
          FROM food
          WHERE foodID = :food_id';
$statement = $db->prepare($query);
$statement->bindValue(':food_id', $food_id);
$statement->execute();
$food = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();
?>
<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>
        <h1>Edit Product</h1>
        <form action="edit_record.php" method="post" enctype="multipart/form-data"
              id="add_record_form">
            <input type="hidden" name="original_image" value="<?php echo $food['image']; ?>" />
            <input type="hidden" name="food_id"
                   value="<?php echo $food['foodID']; ?>">

            <label>Category ID:</label>
            <input type="category_id" name="category_id"
                   value="<?php echo $food['categoryID']; ?>">
            <br>

            <label>Name:</label>
            <input type="input" name="name"
                   value="<?php echo $food['name']; ?>" required>
            <br>

            <label>Expiry Date:</label>
            <input type="date" name="expiryDate"
                   value="<?php echo $food['expiryDate']; ?>">
            <br>

            <label>List Price:</label>
            <input type="input" name="price"
                   value="<?php echo $food['price']; ?>" required>
            <br>

            <label>Image:</label>
            <input type="file" name="image" accept="image/*" required/>
            <br>            
            <?php if ($food['image'] != "") { ?>
            <p><img src="image_uploads/<?php echo $food['image']; ?>" height="150" /></p>
            <?php } ?>
            
            <label>&nbsp;</label>
            <input type="submit" value="Save Changes">
            <br>
        </form>
        <p><a href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>