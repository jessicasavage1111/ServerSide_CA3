<script>

function email_validation(){
    'use strict';
    var mailformat = /^\w+([\.\-]?\w+)*@\w+([\.\-]?\w+)*(\.\w{2,3})+$/;
    var email_name = document.getElementById("email");
    var email_value = document.getElementById("email").value;
    var email_length = email_value.length;
    if(!email_value.match(mailformat) || email_length === 0)
    {
    document.getElementById('email_err').innerHTML = 'This is not a valid email format.';
    email_name.focus();
    document.getElementById('email_err').style.color = "#FF0000";
    }
    else
    {
    document.getElementById('email_err').innerHTML = 'Valid email format';
    document.getElementById('email_err').style.color = "#00AF33";
    }
    }

    function number_validation(){
    'use strict';
    var number_name = document.getElementById("number");
    var number_value = document.getElementById("number").value;
    var number_length = number_value.length;
    if(number_length === 0 || number_value === 0)
    {
    document.getElementById('number_err').innerHTML = 'This is not a valid quanitity.';
    number_name.focus();
    document.getElementById('number_err').style.color = "#FF0000";
    }
    else
    {
    document.getElementById('number_err').innerHTML = 'Valid quantity';
    document.getElementById('number_err').style.color = "#00AF33";
    }
    }

</script>

<?php
require('database.php');
$query = 'SELECT *
          FROM food
          ORDER BY foodID';
$statement = $db->prepare($query);
$statement->execute();
$food = $statement->fetchAll();
$statement->closeCursor();
?>
<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>
        <h1>Order Food</h1>
        <form action="buy.php" method="post" enctype="multipart/form-data"
              id="add_record_form">

            <label>Product:</label>
            <select name="foodName" id="foodName">
            <?php foreach ($food as $food) : ?>
                <option value="<?php echo $food['foodID']; ?>">
                    <?php echo $food['name']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>
            <br>
            <label>Name:</label>
            <input type="input" name="name" id="name" required placeholder="Customer Name">
            <br>

            <br>
            <label>Address:</label>
            <input type="input" name="address" id="address" required placeholder="Delivery Address">
            <br>

            <br>
            <label>Email:</label>
            <input type="input" name="email" id="email" required onBlur="email_validation()" placeholder="Email"><span id="email_err"></span>
            <br>

            <br>
            <label>Quantity Required:</label>
            <input type="input" name="number" id="number" required onBlur="number_validation()" placeholder="1"><span id="number_err"></span>
            <br>
            
            <label>&nbsp;</label>
            <input id="green-button"type="submit" value="Continue">
            <br>
        </form>
        <p><a href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>