<?php
    session_start();
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
        <h1>Login</h1>
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
        <div id="container">
            <form action="login.php" method="post">
                <label for="email">Email:</label>
                <input type="email" placeholder="Enter your email" name="email" required>

                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter your password" name="password" required>

                <button id="login" name="login" type="submit">Login</button>
            </form>
            <?php
               if($_SERVER["REQUEST_METHOD"] == "POST"){
				   $email = $_POST['email'];
				   $password = $_POST['password'];
				   $query = "SELECT * FROM customer WHERE Email = '".$email."'";
				   $query_run = mysqli_query($con, $query);
				   
				   if($query_run){
					   if(mysqli_num_rows($query_run)> 0){
						   $row = mysqli_fetch_assoc($query_run);
						   if($password == $row["Password"]) {
								// Store user information in session
								$_SESSION['user_id'] = $row['Customer_id'];
								$_SESSION['name'] = $row['Name'];
								
								// Redirect to library.php
								header("Location: home.php");
						   }else{
							   echo '<script type="text/javascript">alert("Error: Incorrect password.")</script>';
						   }
					   }else{
						   echo '<script type="text/javascript">alert("Error: User not found.")</script>';
					   }
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
