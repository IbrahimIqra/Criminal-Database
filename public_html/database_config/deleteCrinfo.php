<?php
    
    session_start();
    
	require 'connection.php';
    
	$C_id = $_GET['C_id'];
	$sql = "DELETE from criminals where C_id=".$C_id.";";

	if ( mysqli_query($conn,$sql) ) {
				
		echo 
            '<script type="text/javascript">
            alert("Deleted successfully");
            window.location.href = "../homepage.php";
            </script>';
	} 
	else {
	    echo "Error: ".$sql."<br>".mysqli_error($conn);
	}

?>
