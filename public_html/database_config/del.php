<?php
    
    session_start();
    
    require 'connection.php';
    
    if( !isset($_SESSION['user']) ){
        header('Location: ../LoginPage.php');
    }
    
    if( !isset($_POST['submit']) ){
        header("Location: ../HomePage.php");
    }
    
    //echo $_POST['id'];
    
    $table = $_GET['tb'];

    $col_name;
    
    if($table == 'cases') $col_name = 'Case_id';
    else if($table == 'polices') $col_name = 'P_id';
    else if($table == 'criminals') $col_name = 'C_id';
    else if($table == 'plaintiffs') $col_name = 'Pt_id';
    
    //giving two extra '' cuz P_id is varchar
    if($table == 'polices') $_POST['id']="'".$_POST['id']."'";
    
    $result;
    
    //if it's from police table then we also need to remove the userinfo
    if($table == 'polices'){
        
        //if there's only one P_id left you can't delete it
        //otherwise no one would be able to login
        /*if( mysqli_num_rows(mysqli_query($conn, "SELECT * from userinfo")) === 1){
            // this means only one id is left so u can't delete it
            header('Location: ../tablePolice.php?err=lastid');
            exit();
        }*/
        
        $sql = "DELETE FROM polices WHERE P_id=".$_POST['id'].";";
        $result = mysqli_query($conn,$sql);
        
        if(!$result){
            //1451 is the error number for foreign key checks
            if(mysqli_errno($conn) == 1451){
                header('Location: ../tablePolice.php?err=fk');
            }
            else{
                echo 'Error no.: '.mysqli_errno($conn).'<br>';
                echo 'Error : '.mysqli_error($conn).'<br>';
            }
        }
        
        $sql = "DELETE FROM userinfo WHERE P_id=".$_POST['id'].";";
        $result = mysqli_query($conn,$sql);
        
        if(!$result){
            //1451 is the error number for foreign key checks
            if(mysqli_errno($conn) == 1451){
                header('Location: ../tablePolice.php?err=fk');
            }
            else{
                echo 'Error no.: '.mysqli_errno($conn).'<br>';
                echo 'Error : '.mysqli_error($conn).'<br>';
            }
        }
    }
    else{
        $sql = "DELETE FROM ".$table." WHERE ".$col_name."=".$_POST['id'].";";
        $result = mysqli_query($conn,$sql);
            
        if(!$result){
            //1451 is the error number for foreign key checks
            //Polices table is already checked
            //\Criminals can not get this error
            //error can occur on Plaintiffs & Cases table
            if($table == 'plaintiffs'){
               if(mysqli_errno($conn) == 1451){
                   header('Location: ../tablePlaintiff.php?err=fk');
                   exit();
                }
                else{
                    echo 'Error no.: '.mysqli_errno($conn).'<br>';
                    echo 'Error : '.mysqli_error($conn).'<br>';
                }
            }
            if($table == 'cases'){
                if(mysqli_errno($conn) == 1451){
                header('Location: ../tableCase.php?err=fk');
                }
                else{
                    echo 'Error no.: '.mysqli_errno($conn).'<br>';
                    echo 'Error : '.mysqli_error($conn).'<br>';
                }
            }
        }
    }
    
    //echo $sql;
    
    if($result){
        if($table == 'cases'){
            header('Location: ../tableCase.php?cng=del');
        }
        else if($table == 'polices'){
            header('Location: ../tablePolice.php?cng=del');
        }
        else if($table == 'criminals'){
            header('Location: ../tableCriminal.php?cng=del');
        }
        else if($table == 'plaintiffs'){
            header('Location: ../tablePlaintiff.php?cng=del');
        }
    }
    else{
        echo 'Error: '.mysqli_error($conn);
    }
    
?>