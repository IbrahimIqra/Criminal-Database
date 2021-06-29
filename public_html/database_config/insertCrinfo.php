<?php
    
    session_start();

	require 'connection.php';

    // if not in session then get out
    if( !isset($_SESSION['user']) ){
        header('Location: LoginPage.php');
    }
    
    if(isset($_POST['insert'])){
        
        $P_id = $_POST['P_id'];
        $Case_id = $_POST['Case_id'];
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
        
        $insert_sql= "INSERT INTO criminals (Case_id,C_name,Gender,Age,Height,Weight,Build,Hair_color,Eye_color,NID,Arrest_date,C_photo) VALUES ('$Case_id','$C_name','$g',$age,$height,$weight,'$build','$hair','$eye',$NID,'$arDate','$img');";
        
        
        $result = mysqli_query($conn, $insert_sql);
        
        if($result){
            header("Location: ../CriminalPage.php?success=done");
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
