<script>

function number_validation(){
    'use strict';
    var number_name = document.getElementById("delivery_id");
    var number_value = document.getElementById("delivery_id").value;
    var number_length = number_value.length;
    if(number_length === 0 || number_value <= 0 || number_value > 4)
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

$order_id = filter_input(INPUT_POST, 'order_id', FILTER_VALIDATE_INT);
$query = 'SELECT *
          FROM orders
          WHERE orderID = :order_id';
$statement = $db->prepare($query);
$statement->bindValue(':order_id', $order_id);
$statement->execute();
$order = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();
?>
<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>
        <h1>Edit Order Status</h1>

        <h2>Order Summary :</h2>
        <h2>&nbsp;&nbsp;&nbsp;Name : <?php echo $order['name']; ?></h2>
        <h2>&nbsp;&nbsp;&nbsp; Address : <?php echo $order['address']; ?></h2>
        <h2>&nbsp;&nbsp;&nbsp; Email : <?php echo $order['email']; ?></h2>
        <h2>&nbsp;&nbsp;&nbsp; Item : <?php echo $order['foodID']; ?></h2>
        <h2>&nbsp;&nbsp;&nbsp; Quantity : <?php echo $order['number']; ?></h2>

        <p>Enter the number corresponding with the Order Status</p>
        <p> &nbsp;&nbsp;&nbsp;1. Delivered</p>
        <p> &nbsp;&nbsp;&nbsp;2. Dispatched</p>
        <p> &nbsp;&nbsp;&nbsp;3. Order Processing</p>


        <form action="edit_order.php" method="post" enctype="multipart/form-data"
              id="add_record_form">

            <input type="hidden" name="order_id" id="order_id" value="<?php echo $order['orderID']; ?>">

            <label>Order Status:</label>
            <input type="delivery_id" name="delivery_id" id="delivery_id" required onBlur="number_validation()"
                   value="<?php echo $order['deliveryID']; ?>"><span id="number_err"></span>
            <br>
            
            <label>&nbsp;</label>
            <input type="submit" value="Save Changes" class="green-button">
            <br>
        </form>
    <?php
include('includes/footer.php');
?>