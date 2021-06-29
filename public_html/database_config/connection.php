<?php
	
    $servername = "localhost";
    $username = "id10217939_root";
    $password = "rootroot";
    $dbname= "id10217939_criminal_database";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

?>