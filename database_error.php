<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>My PHP CRUD application</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<!-- the body section -->
<body>
    <header><h1>My PHP CRUD application</h1></header>

    <main>
        <h1>Database Error</h1>
        <p>Error message: <?php echo $error_message; ?></p>
        <p>&nbsp;</p>
    </main>
    <?php include './includes/footer.php';?>
</body>
</html>