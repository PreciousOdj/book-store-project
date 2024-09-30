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
        <h1>Books</h1>
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
        <div id="search-bar">
            <form action="books.php" method="get">
                <label for="search">Search:</label>
                <input type="text" id="search" name="query" placeholder="Enter your search term" required>
                <button id="search" name="search" type="submit">Search</button>
            </form>
        </div>
		<div id="search-results">
            <?php
				// Check if a search query is provided
				if(isset($_GET['search'])){
					@$str = $_GET['query'];
					@$query = "SELECT * FROM book WHERE Title LIKE '%$str%'";
					@$query_run = mysqli_query($con, $query);
					if ($query_run) {
                        // Check if there are any results
                        if (mysqli_num_rows($query_run) > 0) {
                            echo "<h2>Search results for: $str</h2>";
                            while ($row = mysqli_fetch_assoc($query_run)) {
                                // Display the results, you can customize this part based on your needs
                                echo "<div class='result-item'>";
                                echo "<strong>Title:</strong> " . $row['Title'] . "<br>";
                                echo "<strong>Year:</strong> " . $row['Published'] . "<br>";
                                echo "<strong>Publisher:</strong> " . $row['publisher'] . "<br>";
								echo "<strong>Edition:</strong> " . $row['edition'] . "<br>";
								echo "<br>"."</div>";
                            }
                        } else {
                            echo "<p>No results found for: $str</p>";
                        }
                    } else {
                        echo "Error in query: " . mysqli_error($con);
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
