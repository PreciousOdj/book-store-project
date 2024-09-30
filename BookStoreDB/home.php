<?php
    session_start();

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
    <title>Welcome to Your Online Library</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <header>
        <h1>Welcome, <?php echo $name; ?>!</h1>
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
		<div id="intro-text">
            <p>Welcome to the Online Library! We aim to make books easily accessable to all. Explore our collection of books covering a wide range of subjects. Some of which include, English, Mathematics and Computer Science. Find the perfect resources to enhance your learning experience.</p>
        </div>
		
        <div class="subject">
			<img src="images1.jpg" alt="My Picture">
			
			<a href="login.php">
				<h2>English</h2>
			</a>
            <p>Description: Books relating to English leaning e.g grammer...</p>
        </div>

        <div class="subject">
			<a href="login.php">
				<h2>Computer Science</h2>
			</a>
            <p>Description: Books relating to Computer Science leaning e.g Human Computer Interaction...</p>
        </div>
        

    </main>


    <footer>
        <p>&copy; 2023 Online Library. All rights reserved.</p>
    </footer>

</body>
</html>
