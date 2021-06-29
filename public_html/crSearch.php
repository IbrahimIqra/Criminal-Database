<?php
    require 'nav.php';
    require 'database_config/connection.php';
    
    if( !(isset($_GET['submitbtn'])) ){
        header('Location: HomePage.php');
        exit();
    }
    
	$cID = $_GET['cID'];
    
	$sql= "SELECT * FROM criminals WHERE C_id =".$cID.";";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
    
    
	if($resultCheck > 0){
        
       //merging four tables
	   $sql= "SELECT * FROM (((criminals inner join cases on criminals.Case_id=cases.Case_id) inner join polices on polices.P_id = cases.P_id)) inner join plaintiffs on plaintiffs.pt_id=cases.pt_id where C_id=".$cID.";";
        
       $data = mysqli_query($conn, $sql);
        
	   $total = mysqli_num_rows($data);
		
       if($total != 0){
            while( $row = mysqli_fetch_assoc($data) ){
                
                $cID = $row['C_id'];
                $csID = $row['Case_id'];
                $cN = $row['C_name'];
                $gen = $row['Gender'];
                $pID = $row['P_id'];
                $pN = $row['P_name'];
                $AD = $row['Arrest_date'];
                $cT = $row['Crime_type'];
                $vic = $row['Victims'];
                $pTID = $row['Pt_id'];
                $pTN = $row['Pt_name'];
            }
        }
    }
    else{
        echo '<script type="text/javascript">
            alert("Criminal ID does not  exist. '.$resultCheck.' results found");
            history.go(-1);
            </script>';
    }
?>

<!DOCTYPE html>
<html>


<head>
    <title>Search Merge Result</title>
    <link rel="stylesheet" href="style-sheets/mystyle_crPortable.css" type="text/css">
</head>

<body>

    <h1><u>Merged Result</u></h1>


    <table align="center">
        <tr>
            <th>Criminal ID</th>
            <td><?php echo $cID ?></td>
        </tr>      
        <tr>
            <th>Criminal name</th>
            <td><?php echo $cN ?></td>
        </tr>
        <tr>
            <th>Gender</th>
            <td><?php echo $gen ?></td>
        </tr>
        <tr>
            <th>Case ID</th>
            <td><?php echo $csID ?></td>
        </tr>
        <tr>
            <th>Police ID</th>
            <td><?php echo $pID ?></td>
        </tr>
        <tr>
            <th>Police Name</th>
            <td><?php echo $pN ?></td>
        </tr>
        <tr>
            <th>Arrest date</th>
            <td><?php echo $AD ?></td>
        </tr>
        <tr>
            <th>Crime Type</th>
            <td><?php echo $cT ?></td>
        </tr>
        <tr>
            <th>Victims</th>
            <td><?php echo $vic ?></td>
        </tr>
        <tr>
            <th>Plaintiff ID</th>
            <td><?php echo $pTID ?></td>
        </tr>
        <tr>
            <th>Plaintiff name</th>
            <td><?php echo $pTN ?></td>
        </tr>
        <tr>
            <th>Options</th>
            <?php
	        echo "<td><a href='crprofile.php?C_id=".$cID."'>View criminal Profle</a></td>";
			?>
        </tr>
        
    </table>
    
</body>

</html>