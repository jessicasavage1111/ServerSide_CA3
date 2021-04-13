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
$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>
        <h1>Add Food</h1>
        <form action="add_record.php" method="post" enctype="multipart/form-data"
              id="add_record_form">

            <label>Category:</label>
            <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>
            <label>Name:</label>
            <input type="input" name="name" id="name" required placeholder="Food Item Name" onBlur="name_validation()"><span id="name_err"></span>
            <br>

            <br>
            <label>Expiry Date:</label>
            <input type="date" name="expiryDate" id="date" required>
            <br>

            <label>List Price:</label>
            <input type="input" name="price" id="price" required onBlur="price_validation()" placeholder="0.00"><span id="price_err"></span>
            <br>        
            
            <label>Image:</label>
            <input type="file" name="image" accept="image/*" required/>
            <br>
            
            <label>&nbsp;</label>
            <input type="submit" value="Add Food">
            <br>
        </form>
    <?php
include('includes/footer.php');
?>