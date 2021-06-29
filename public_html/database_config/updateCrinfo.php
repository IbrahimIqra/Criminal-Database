<?php
    session_start();
	require 'connection.php';

    // if not in session then get out
    if( !isset($_SESSION['user']) ){
        header('Location: LoginPage.php');
    }
    
    if(isset($_POST['update'])){
        $C_id=$_POST['C_id'];
        $C_name = $_POST['C_name'];
        $g = $_POST['g'];
        $age = $_POST['age'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $build = $_POST['build'];
        $hair = $_POST['haircolor'];
        $eye = $_POST['eyecolor'];
        $NID = $_POST['NID'];
        $arDate = $_POST['arDate'];
        $img = $_POST['image'];
        
        $insert_sql= "UPDATE criminals set C_name='$C_name' ,Gender='$g' ,Age=$age ,Height=$height ,Weight=$weight ,Build='$build' ,Hair_color='$hair' ,Eye_color='$eye' ,NID=$NID ,Arrest_date='$arDate' where C_id='$C_id';";
        
        
        $result = mysqli_query($conn, $insert_sql);
        
        if($result){
            header("Location: ../crprofile.php?C_id=$C_id");
            exit();
        }
        
        else{
            echo 'Error '.mysqli_error($conn);
        }
        
    }
    else{
        header('Locaiton: ../CriminalPage.php');
        exit();
    }
    

?>
