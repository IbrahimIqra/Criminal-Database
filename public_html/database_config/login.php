<?php
    
    require 'connection.php';
    
    if( isset($_SESSION['user']) ){
        header('Location: HomePage.php');
    }
    
    //procced if the login button is pressed from LoginPage.php
    if(isset($_POST['logged'])){
        
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        
        //writing query
        $query = "SELECT * FROM userinfo WHERE P_id='$user'" ;
        //running query
        $query_run = mysqli_query($conn, $query) or die("Failed to query database ".mysqli_connect_error());
        
        //converting the row values into an associative array
        $row = mysqli_fetch_assoc($query_run);
        
        //checking user_id from the database
        //using password_verify to decrypt and check
        if( $row['P_id']==$user && password_verify($pass, $row['Pass']) ){
        //normal way to decrypt it
        //if( $row['P_id'] === $user && $row['Pass'] === $pass ){
            
            //starting the session and storing the userid in session
            
            session_start();
            
            $_SESSION['user'] = $user;
            
            //giving access to HomePage
            header('location: ../HomePage.php');
        }
        //if the row didn't match
        else{
            header('Location: ../LoginPage.php?error=invalid');
        }
    }
    //if didn't press the button but still in this page then redirect to Index Page
    else{
        header('Location: ../index.html');
    }
    
?>