<?php 
$errors = '';
$myemail = 'D00227023@student.dkit.ie';//<-----Put your DkIT email address here.
if(empty($_POST['name'])  || 
   empty($_POST['email']) ||
   empty($_POST['date']) ||
   empty($_POST['reason']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$date = $_POST['date'];
$reason = $_POST['reason'];
$message = $_POST['message']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Contact form submission: $name";
	$email_body = "You have received a new message. ".
	" Here are the details:\n Name: $name \n Email: $email_address \n Date: $date \n Reason: $reason \n Message \n $message"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: contact-form-thank-you.html');
} 
?>
<!DOCTYPE HTML> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);

require_once('database.php');

$query = "INSERT INTO contact
                 (name, email, date, reason, message)
              VALUES
                 (:name, :email_address, :date, :reason, :message)";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':email_address', $email_address);
    $statement->bindValue(':date', $date);
    $statement->bindValue(':reason', $reason);
    $statement->bindValue(':message', $message);
    $statement->execute();
    $statement->closeCursor();
?>



</body>
</html>