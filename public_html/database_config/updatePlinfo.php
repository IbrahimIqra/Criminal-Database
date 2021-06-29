<?php
    session_start();
	require 'connection.php';

    // if not in session then get out
    if( !isset($_SESSION['user']) ){
        header('Location: LoginPage.php');
    }
    
    if(isset($_POST['update'])){
        
        $P_id = $_POST['P_id'];
        $Age = $_POST['age'];
        $Email = $_POST['email'];
            
        $sql = "UPDATE polices SET Age=$Age, Email='$Email' WHERE P_id='$P_id'; ";
        
        $result = mysqli_query($conn, $sql);
        
        if($result){
            header("Location: ../tablePolice.php?cng=ed");
            exit();
        }
        else{
            echo 'Error '.mysqli_error($conn);
            //echo $sql;
        }
        
    }
    else{
        header('Locaiton: ../tablePolice.php');
        exit();
    }
    
?>
