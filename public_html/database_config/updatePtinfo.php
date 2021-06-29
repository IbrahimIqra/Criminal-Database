<?php
    session_start();
	require 'connection.php';

    // if not in session then get out
    if( !isset($_SESSION['user']) ){
        header('Location: LoginPage.php');
    }
    
    if(isset($_POST['update'])){
        
        $Pt_id = $_POST['Pt_id'];
        $Age = $_POST['age'];
        $Email = $_POST['email'];
        $Phone = $_POST['phone'];
            
        $sql = "UPDATE plaintiffs SET Age=$Age, Email='$Email', Phone=$Phone WHERE Pt_id='$Pt_id'; ";
        
        $result = mysqli_query($conn, $sql);
        
        if($result){
            header("Location: ../tablePlaintiff.php?cng=ed");
            exit();
        }
        else{
            echo 'Error '.mysqli_error($conn);
            //echo $sql;
        }
        
    }
    else{
        header('Locaiton: ../tablePlaintiff.php');
        exit();
    }
    
?>
