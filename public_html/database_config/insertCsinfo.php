<?php
    session_start();
	require 'connection.php';

    // if not in session then get out
    if( !isset($_SESSION['user']) ){
        header('Location: LoginPage.php');
    }
    
    if(isset($_POST['cs_insert'])){
        
        $Pt_id = $_POST['Pt_id'];
        $P_id = $_POST['P_id'];
        $Case_date = $_POST['Case_date'];
        $C_type = $_POST['C_type'];
        $victims = $_POST['victims'];
        $description = $_POST['description'];
        
        //IMPORTANT
        //correcting quote,single quote etc..
        $description = addslashes($description);
        
        //inserting the case info
        $insert_sql = "INSERT INTO cases (Pt_id,P_id,Case_date,Crime_type,Victims,Description) VALUES ('$Pt_id','$P_id','$Case_date','$C_type','$victims','$description');";
        
        $result = mysqli_query($conn, $insert_sql);
        
        if($result){
            
            if(isset($_GET['success'])){
                header("Location: ../HomePage.php?success=ptCreated");
            }
            else{
                header("Location: ../HomePage.php?success=csCreated");
            }
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