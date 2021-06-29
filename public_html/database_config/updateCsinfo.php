<?php
    session_start();
	require 'connection.php';

    // if not in session then get out
    if( !isset($_SESSION['user']) ){
        header('Location: LoginPage.php');
    }
    
    if( isset($_POST['update']) ){
        
        $Case_id = $_POST['Case_id'];
        $Crime_type = $_POST['c_type'];
        $Victims = $_POST['victims'];
        $Description = $_POST['description'];
            
        $sql = "UPDATE cases SET Crime_type='$Crime_type', Victims=$Victims, Description='$Description' WHERE Case_id=$Case_id; ";
        
        $result = mysqli_query($conn, $sql);
        
        if($result){
            header("Location: ../tableCase.php?cng=ed");
            exit();
        }
        else{
            echo 'Error '.mysqli_error($conn);
            //echo $sql;
        }
        
    }
    else{
        header('Locaiton: ../tableCase.php');
        exit();
    }
    
?>
