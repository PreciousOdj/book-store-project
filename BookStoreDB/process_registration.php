<?php
			if (isset($_GET['query'])) {
				$search_query = $_GET['query'];
				// Perform your search logic here

				echo "Search results for: $search_query";
			} else {
				echo "No search query provided.";
			}
		?>
