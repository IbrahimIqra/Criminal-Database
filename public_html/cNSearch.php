<?php
    require 'nav.php';
    
    if( !isset( $_GET['submitbtn'] ) ){
        header('Location: HomePage.php');
    }
    
?>

<!DOCTYPE html>
<html>

<head>
    <title>Search Merge Result</title>
    <link rel="stylesheet" href="style-sheets/mystyle_crPortable.css" type="text/css">
</head>

<body>

    <h1><u>Criminal and Related Info</u></h1>


    <table align="center">
        <tr>
            <th>[C_id]</th>
            <th>[C_name]</th>
            <th>[Plaintiff ID]</th>
            <th>[Plaintiff name]</th>
            <th>[Involved Case_id]</th>
            <th>[Police ID]</th>
            <th>[Police Name]</th>
            <th>[Crime Type]</th>
            <th>[Victims]</th>
            <th>[Arrest Date]</th>
            <th>[Options]</th>

        </tr>
        <?php
            require 'database_config/connection.php';
            
            $cN = $_GET['cN'];
            $sql = "SELECT * FROM criminals WHERE C_name ='$cN';";
        
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if($resultCheck > 0){
                
               $sql= "SELECT * FROM (((criminals inner join cases on criminals.Case_id=cases.Case_id) inner join polices on polices.P_id = cases.P_id)) inner join plaintiffs on plaintiffs.pt_id=cases.pt_id where C_name='$cN';";
                
               $data = mysqli_query($conn, $sql);
                
               $total = mysqli_num_rows($data);
                
               if($total != 0){
                    while( $row = mysqli_fetch_assoc($data) ){
                        
                         echo 
                       "<tr>
                            <td>".$row['C_id']."</td>
                            <td>".$row['C_name']."</td>
                            <td>".$row['Pt_id']."</td>
                            <td>".$row['Pt_name']."</td>
                            <td>".$row['Case_id']."</td>
                            <td>".$row['P_id']."</td>
                            <td>".$row['P_name']."</td>
                            <td>".$row['Crime_type']."</td>
                            <td>".$row['Victims']."</td>
                            <td>".$row['Arrest_date']."</td>
                            
                            <td><a href='crprofile.php?C_id=".$row['C_id']."' >Criminal Profile </a>'.</td>
                        </tr>";
                    }
                }
            }
            else{
                echo '<script type="text/javascript">
                    alert("Criminal name does not  exist. '.$resultCheck.' results found");
                    history.go(-1);
                    </script>';
            }
        ?>
        
    </table>
    
</body>

</html>