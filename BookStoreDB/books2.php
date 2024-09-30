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
            <li><a href="home.php">Home</a></li>
            <li><a href="books2.php">Books</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="cart.php">Cart</a></li>
        </ul>
    </nav>

    <main>
        <div id="search-bar">
            <form action="books2.php" method="get">
                <label for="search">Search:</label>
                <select name="search_type" id="search_type">
                    <option value="title">Title</option>
                    <option value="author">Author</option>
                    <option value="subject">Subject</option>
                </select>
                <input type="text" id="search" name="query" placeholder="Enter your search term" required>
                <button id="search" name="search" type="submit">Search</button>
            </form>
        </div>

        <div id="search-results">
            <?php
                // Display all books initially
                if (!isset($_GET['search'])) {
                    $query = "SELECT * FROM book";
                    $query_run = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                        echo "<div class='result-item'>";
                        echo "<strong>Title:</strong> " . $row['Title'] . "<br>";
                        echo "<strong>Year:</strong> " . $row['Published'] . "<br>";
                        echo "<strong>Publisher:</strong> " . $row['publisher'] . "<br>";
                        echo "<strong>Edition:</strong> " . $row['edition'] . "<br>";
                        echo "<button onclick='addToCart(" . $row['ISBN'] . ")'>Add to Cart</button>";
                        echo "<br>" . "</div>";
                    }
                }

                // Check if a search query is provided
                if (isset($_GET['search'])) {
                    $str = $_GET['query'];
                    $search_type = $_GET['search_type'];
                    $condition = "";

                    // Define the condition based on the search type
                    switch ($search_type) {
                        case 'title':
                            $condition = "Title LIKE '%$str%'";
                            break;
                        case 'author':
                            $condition = "ISBN = (SELECT ISBN FROM author_book WHERE Author_id = (SELECT Author_id FROM author WHERE Name LIKE '%$str%'))";
                            break;
                        case 'subject':
                            $condition = "ISBN = (SELECT ISBN FROM book_subject WHERE Section_id = (SELECT Section_id FROM subject WHERE section LIKE '%$str%'))";
                            break;
                        default:
                            break;
                    }

                    $query = "SELECT * FROM book WHERE $condition";
                    $query_run = mysqli_query($con, $query);

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
                                echo "<button onclick='addToCart(" . $row['ISBN'] . ")'>Add to Cart</button>";
                                echo "<br>" . "</div>";
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

    <script>
        // JavaScript function to add a book to the cart
        function addToCart(isbn) {
            // You can use AJAX to send the ISBN to the server and update the cart
            // For simplicity, alerting the ISBN for demonstration purposes
            alert("Added to Cart: " + isbn);
        }
    </script>

</body>
</html>
