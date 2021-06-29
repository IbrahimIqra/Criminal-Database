<?php
    
    session_start();
	require 'connection.php';

    // if not in session then get out
    if( !isset($_SESSION['user']) ){
        header('Location: LoginPage.php');
    }
    
    if(isset($_POST['p_insert'])){
        
        $P_id = $_POST['P_id'];
        $pass = $_POST['pass'];
        $P_name = $_POST['P_name'];
        $g = $_POST['g'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $img = $_POST['image'];
        
        //encrypting the password
        $pass_hashed = password_hash($pass, PASSWORD_DEFAULT);
        
        //checking if the P_id already exists
        $chk_sql = "SELECT P_id FROM userinfo WHERE P_id='".$P_id."'";
        $rows = mysqli_query($conn, $chk_sql);
        
        if (!$rows){
            echo "Error description: ".mysqli_error($con);
        }
        //yaay no user matched so it's accepted
        if(mysqli_num_rows($rows) === 0){
            
            //query for userinfo using hash
            $insert_sql = "INSERT INTO userinfo VALUES ('$P_id','$pass_hashed');";
            //query for userinfo without hash
            //$insert_sql = "INSERT INTO userinfo VALUES ('$P_id','$pass');";
            //running the query
            $result = mysqli_query($conn, $insert_sql);
            //if it didn't work then show the error
            if(!$result){
                echo 'Error '.mysqli_error($conn);//nope
            }
            
            
            //query for police info
            $insert_sql = "INSERT INTO polices (P_id,P_name,Gender,Age,Email,P_photo) VALUES ('$P_id','$P_name','$g','$age','$email','$img');";
            //runningt the query
            $result = mysqli_query($conn, $insert_sql);
            //checking if it worked
            if($result){
                header("Location: ../PolicePage.php?success=done");//success
            }
            else{
                echo 'Error '.mysqli_error($conn);//failure
            }
        }
        //it means there's already a user with the name
        else{
            header("Location: ../PolicePage.php?error=userexists");
        }
        
        
        
    }
    else{
        header('Locaiton: ../PolicePage.php');
        exit();
    }
    

?>