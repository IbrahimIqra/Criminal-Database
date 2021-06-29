<?php
    session_start();
    require 'connection.php';
    
    //which table to search
    $table = $_GET['from'];
    
    $id;
    //select the id depending on the table
    if($table = 'Cases'){
        $id = "Case_id";
    }
    else if($table = "Criminals"){
        $id = "C_id";
    }
    else if($table = "Polices"){
        $id = "P_id";
    }
    else if($table = "Plaintiffs"){
        $id = "Pt_id";
    }
    else{//if custom url then get back to table
        header ('Location: ../HomePage.php');
    }
    
    
    
    
    
    $sql = "SELECT * FROM ".$table." WHERE ".$id."=".$_POST[$id].";";
    
    echo $sql;
    
    mysqli_query($conn, $sql);
    
    $rows = mysqli_query($conn, $sql);

    if (!$rows) echo("Error description: " . mysqli_error($conn));
    
    $totalrows = mysqli_num_rows($rows);
    
    echo $totalrows;
    
    //if any rows found then show them
    if($totalrows > 0){
    //creating an associative array 
    while( $row = mysqli_fetch_assoc($rows) ){

    echo 
      "<tr>
        <td>".$row['Case_id']."</td>
        <td>".$row['P_id']."</td>
        <td>".$row['Case_date']."</td>
        <td>".$row['Crime_type']."</td>
        <td>".$row['Victims']."</td>
        <td>".$row['Description']."</td>
       </tr>";
               }

            }
    
    
    header('Location: ../tableSearch');
?>
