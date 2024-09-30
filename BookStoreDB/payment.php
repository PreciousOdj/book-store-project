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
	

    // Process the payment (in a real-world scenario, you would use a payment gateway)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Perform the payment processing here (not implemented in this example)

        // Clear the cart after successful payment
        $_SESSION['cart'] = array();
        header("Location: payment_success.php"); // Redirect to a success page
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <!-- Header Section -->
    <header>
        <h1>Payment</h1>
    </header>

    <!-- Navigation Section -->
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="books2.php">Books</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="cart.php">Cart</a></li>
        </ul>
    </nav>

    <!-- Main Content Section -->
    <main>
        <div id="payment-form">
            <h2>Payment Details</h2>
            <form action="payment.php" method="post">
                <!-- Include payment fields (e.g., credit card details) here -->
                <label for="card_number">Card Number:</label>
                <input type="text" id="card_number" name="card_number" required>
                
                <label for="expiry_date">Expiry Date:</label>
                <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YY" required>

                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" required>

                <button type="submit">Submit Payment</button>
            </form>
        </div>
    </main>
    
    <!-- Footer Section -->
    <footer>
        <p>&copy; 2023 Online Library. All rights reserved.</p>
    </footer>

</body>
</html>
