<?php
	require 'connection.php';
	
    session_start();

    // if not in session then get out
    if( !isset($_SESSION['user']) ){
        header('Location: LoginPage.php');
    }
    
    if(isset($_POST['pt_insert'])){
        
        $Pt_name = $_POST['Pt_name'];
        $gender = $_POST['g'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        
        //writing the query with the case info
        $insert_sql = "INSERT INTO plaintiffs (Pt_name,Gender,Age,Email,Phone) VALUES ('$Pt_name','$gender','$age','$email','$phone');";
        //running the query
        $result = mysqli_query($conn, $insert_sql);
        
        if($result){
            //getting the Pt_id to redirect to CasePage
            //phone number should be unique for everyone so getting the Pt_id using Phone number
            $sql = "SELECT Pt_id FROM plaintiffs WHERE Phone='".$phone."';" ;
            
            $rows = mysqli_query($conn, $sql);
            
            $row = mysqli_fetch_assoc($rows);
            
            header("Location: ../CasePage.php?success=ptCreated&Pt_id=".$row['Pt_id']);
        }
        else{
            echo $insert_sql;
            echo $result;
            echo 'Error: '.mysqli_error($conn);
        }
        
        
        
    }
    else{
        header('Locaiton: ../CasePage.php');
        exit();
    }
    

?>