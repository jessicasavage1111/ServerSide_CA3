<?php
    require_once('database.php');
    // Get all categories
    $query = 'SELECT * FROM categories
              ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
?>
<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>PHP CRUD</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<!-- the body section -->
<body>
    <header><h1>PHP CRUD</h1></header>
    <main>
    <h1>Categories</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <!-- Retrieve data as an associative array and output as a foreach loop  -->
        <?php foreach ($categories as $category) : ?>
        <tr>
            <td><?php echo $category['categoryName']; ?></td>
            <td>
                <form action="delete_category.php" method="post"
                      id="delete_record_form">
                    <input type="hidden" name="category_id"
                           value="<?php echo $category['categoryID']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <h2>Add Category</h2>
    <form action="add_category.php" method="post"
          id="add_category_form">
        <label>Name:</label>
        <input type="input" name="name">
        <input id="add_category_button" type="submit" value="Add">
    </form>
    <br>
    <p><a href="index.php">Homepage</a></p>
    </main>
    <?php include './includes/footer.php';?>
</body>
</html>