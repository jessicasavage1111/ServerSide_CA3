<script language="JavaScript" src="gen_validatorv31.js" type="text/javascript"></script>
<script>
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

</script>

<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>
        <h1>Contact Us</h1>
        <form action="contact-form-handler.php" method="post" enctype="multipart/form-data"
              id="add_record_form">

            
            <br>
            <label>Name:</label>
            <input type="input" name="name" id="name" required placeholder="Customer Name" onBlur="name_validation()"><span id="name_err"></span>
            <br>

            <br>
            <label>Email:</label>
            <input type="input" name="email" id="email" required onBlur="email_validation()" placeholder="Email"><span id="email_err"></span>
            <br>

            <br>
            <label>Date:</label>
            <input type="date" name="date" id="date" required>
            <br>

            <br>
            <label>Reason for Contact:</label>
            <select name="reason">
                <option> Hello </option>
            </select>
            <br>

            <br>
            <label>Message:</label>
            <textarea required name="message"></textarea>
            <br>        
            
            <br>
            <label>&nbsp;</label>
            <input type="submit" value="Submit">
            <br>
        </form>
        <p><a href="index.php">View Homepage</a></p>
    <?php
include('includes/footer.php');
?>