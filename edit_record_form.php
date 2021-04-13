<script>

function price_validation(){
    'use strict';
    var priceformat = "[0-9]+(\.){0,1}[0-9]*";
    var price = document.getElementById("price");
    var price_value = document.getElementById("price").value;
    var price_length = price_value.length;
    if(!price_value.match(priceformat) || price_length === 0)
    {
    document.getElementById('price_err').innerHTML = ' This is not a valid price format. ';
    price.focus();
    document.getElementById('price_err').style.color = "#FF0000";
    }
    else
    {
    document.getElementById('price_err').innerHTML = ' Valid price format';
    document.getElementById('price_err').style.color = "#00AF33";
    }
    }

    function name_validation(){
    'use strict';
    var nameformat = "[a-zA-Z ]+$";
    var name = document.getElementById("name");
    var name_value = document.getElementById("name").value;
    var name_length = name_value.length;
    if(!name_value.match(nameformat) || name_length === 0)
    {
    document.getElementById('name_err').innerHTML = ' This is not a valid name format. ';
    name.focus();
    document.getElementById('name_err').style.color = "#FF0000";
    }
    else
    {
    document.getElementById('name_err').innerHTML = ' Valid name format';
    document.getElementById('name_err').style.color = "#00AF33";
    }
    }

</script>

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
                   value="<?php echo $food['name']; ?>" required id="name" onBlur="name_validation()"><span id="name_err"></span>
            <br>

            <label>Expiry Date:</label>
            <input type="date" name="expiryDate" id="date" required
                   value="<?php echo $food['expiryDate']; ?>">
            <br>

            <label>List Price:</label>
            <input type="input" name="price"
                   value="<?php echo $food['price']; ?>" required id="price" onBlur="price_validation()"><span id="price_err"></span>
            <br>

            <label>Image:</label>
            <input type="file" name="image" accept="image/*"/>
            <br>            
            <?php if ($food['image'] != "") { ?>
            <p><img src="image_uploads/<?php echo $food['image']; ?>" height="150" /></p>
            <?php } ?>
            
            <label>&nbsp;</label>
            <input type="submit" value="Save Changes" class="green-button">
            <br>
        </form>
    <?php
include('includes/footer.php');
?>