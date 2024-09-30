<?php
    require "dbconfig/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-BookStore</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <header>
        <h1>Create Account</h1>
    </header>
    
    <nav>
        <ul>
            <li><a href="library.php">Home</a></li>
            <li><a href="books.php">Books</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="create.php">Create Account</a></li>
        </ul>
    </nav>
    
    <main>
        <div id="account">
            <form class="container" action="create.php" method="post">
                <label for="name">Name:</label>
                <input type="text" name="name" required>
                
                <label for="email">Email:</label>
                <input type="email" name="email" required>
                
                <label for="phone">Phone Number:</label>
                <input type="tel" name="phone" placeholder="Enter your phone number" required>

                <label for="address">Billing Address:</label>
                <input type="text" name="address" placeholder="Enter your billing address" required>

				<label for="password">Password:</label>
                <input type="password" name="password" required>

                <label for="confirm_password">Confirm Password:</label>
                <input type="password" name="confirm_password" required>

                <button id="create" name="create" type="submit">Create Account</button>
            </form>
            <?php
                if(isset($_POST['create'])){
					try{
						// Get user input
						$password = $_POST['password'];
						$confirm_password = $_POST['confirm_password'];
						$email = $_POST['email'];
						$name = $_POST['name'];
						$phone_number = $_POST['phone'];
						

						
						// Validate input
						if ($password !== $confirm_password) {
							throw new Exception("Password does not match");
						}

						// Check if the user already exists
						$check_query = "SELECT * FROM customer WHERE Email = '$email'";
						$check_query_run = mysqli_query($con, $check_query);

						if(mysqli_num_rows($check_query_run) > 0){
							throw new Exception("User already exists. Please choose a different email.");
						}

						// If there are no errors, proceed with account creation
						$hashed_password = password_hash($password, PASSWORD_DEFAULT);
						$insert_query = "INSERT INTO customer(Name, Email, Password, PhoneNumber) VALUES ('$name', '$email', '$hashed_password', '$phone_number')";
						$insert_query_run = mysqli_query($con, $insert_query);

						if(!$insert_query_run){
							throw new Exception("Unable to create account. Please try again.");
						}

                        echo '<script type="text/javascript">alert("Account created successfully!")</script>';
                    } catch (Exception $e) {
                        echo '<script type="text/javascript">alert("' . $e->getMessage() . '")</script>';
                    }
					
                }
            ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2023 Online Library. All rights reserved.</p>
    </footer>

</body>
</html>
