<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Check if the form is submitted and the 'submit' button is clicked
    $id = $_SESSION['idKunde'];
    $selectedSize = $_POST['selectedSize']; // Corrected: Get the selected size from the dropdown

    // Connect to the database
    $dbc = mysqli_connect('localhost', 'root', '', 'skohubben') or die('Error connecting to MySQL server');

    // Get the product ID based on the selected size
    $productIdQuery = "SELECT idProdukter FROM produkter WHERE Størrelse = ? LIMIT 1";
    $productIdStmt = mysqli_prepare($dbc, $productIdQuery);
    mysqli_stmt_bind_param($productIdStmt, "s", $selectedSize);
    mysqli_stmt_execute($productIdStmt);
    $productIdResult = mysqli_stmt_get_result($productIdStmt);

    if ($productRow = mysqli_fetch_assoc($productIdResult)) {
        $productId = $productRow['idProdukter'];

        // Prepare SQL statement to insert the selected product into the cart
        $insertQuery = "INSERT INTO cart (produkt, kunde) VALUES (?, ?)";
        $stmt = mysqli_prepare($dbc, $insertQuery);
        mysqli_stmt_bind_param($stmt, "ii", $productId, $id);
        mysqli_stmt_execute($stmt) or die('Error adding product to cart.');
        mysqli_stmt_close($stmt);
    }

    // Close database connections
    mysqli_close($dbc);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<section id="header">
        <a href="#"><img src="img/skohubben_logo2.png" class="logo" alt="Logo"></a>

        <div>
            <ul id="navbar">
                <li><a href="index1.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="cart.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li>
                    <?php echo $_SESSION['Fulltnavn'] ?>
                </li>
                <li>
                    <?php if ($_SESSION) {
                        echo '<a href="logout.php">log out</a>';
                    } else {
                        echo '<a href="login.php">log in</a>';
                    } ?>
                </li>
                <li id="lg-bag"><a href="cart.php"><i class="far fa-shopping-bag"></i></a></li>
                <a href="#" id="close"><i class="far fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.php"><i class="far fa-shopping-bag"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>


<?php include 'etter.php';?>
</body>
</html>