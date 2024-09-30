<?php
	/*For My LocalPC*/
	$con = mysqli_connect("localhost", "root", "", "new_library");

	// Check connection
	if (mysqli_connect_errno()) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>