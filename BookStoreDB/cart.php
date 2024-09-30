<?php
    session_start();
    require "dbconfig/config.php";
	
	
    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        // Redirect to the login page if not logged in
        header("Location: login.php");
        exit();
    }

    // User is logged in, retrieve user information
    $user_id = $_SESSION['user_id'];
    $name = $_SESSION['name'];
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <header>
        <h1>Shopping Cart</h1>
    </header>

    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="books2.php">Books</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="cart.php">Cart</a></li>
        </ul>
    </nav>

    <main>
        <h2>Shopping Cart</h2>

        <?php
            // Fetch and display items in the shopping cart
            $user_id = $_SESSION['user_id'];
            $cart_query = "SELECT * FROM cart WHERE Customer_id = $user_id";
            $cart_result = mysqli_query($con, $cart_query);

            if ($cart_result && mysqli_num_rows($cart_result) > 0) {
                while ($cart_row = mysqli_fetch_assoc($cart_result)) {
                    echo "<div class='cart-item'>";
                    echo "<p>Order ID: " . $cart_row['Order_id'] . "</p>";
                    echo "<p>Date: " . $cart_row['Date'] . "</p>";
                    echo "<p>Billing Address: " . $cart_row['Billing_Address'] . "</p>";

                    // Fetch and display books in the cart
					$order_id = $cart_row['Order_id'];
					$cart_books_query = "SELECT GROUP_CONCAT(b.Title) AS BookTitles, SUM(b.Price) AS TotalPrice
										FROM book b
										JOIN cart_book cb ON b.ISBN = cb.ISBN
										WHERE cb.Order_id = $order_id";
					$cart_books_result = mysqli_query($con, $cart_books_query);

					if ($cart_books_result) {
						$cart_books_data = mysqli_fetch_assoc($cart_books_result);

						if (!empty($cart_books_data['BookTitles'])) {
							echo "<p>Books: " . $cart_books_data['BookTitles'] . "</p>";
							echo "<p>Total Price: $" . $cart_books_data['TotalPrice'] . "</p>";
						} else {
							echo "<p>No books in the cart</p>";
						}
					} else {
						echo "Error in query: " . mysqli_error($con);
					}
                }
            } else {
                echo "<p>Your cart is empty</p>";
            }
        ?>

        <a href="payment.php">Proceed to Payment</a>
    </main>
    
    <footer>
        <p>&copy; 2023 Online Library. All rights reserved.</p>
    </footer>

</body>
</html>