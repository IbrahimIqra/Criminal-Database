<?php
            require 'nav.php';
            require 'database_config/connection.php';

            $cID= $_GET['C_id'];

            $sql= "SELECT * FROM criminals where C_id='$cID'";

            $data = mysqli_query($conn, $sql);

            $total = mysqli_num_rows($data);
                
            if($total != 0){
                
                //need to run this only one time since we'll get only 1 result
                $row = mysqli_fetch_assoc($data);
                
                $cID = $row['C_id'];
                $csID = $row['Case_id'];
                $cN = $row['C_name'];
                $gen = $row['Gender'];
                $age = $row['Age'];
                $hei = $row['Height'];
                $wei = $row['Weight'];
                $bld = $row['Build'];
                $hClr = $row['Hair_color'];
                $eClr = $row['Eye_color'];
                $nID = $row['NID'];
                $AD = $row['Arrest_date'];
            }
            else{
                header('Location: tableCriminal.php');
                exit();
            }

        ?>

<!DOCTYPE html>
<html>

<head>
    <title>Criminal Profile</title>
    <link rel="stylesheet" href="style-sheets/mystyle_crPortable.css" type="text/css">
</head>

	<body>
	    
	    <h1><u>Criminal profile</u></h1>
	    

	    <table align="center">
	    	<center><img src="images/criminal.png" width="20%" height="20%" class="avatar"/> </center><br>
	    	<tr>
	        <th>Criminal iD</th>
	        <td><?php echo $cID ?></td>
	    	</tr>
	    	<tr>
	        <th>Case ID</th>
	        <td><?php echo $csID ?></td>
	    	</tr>
	    	<tr>
	        <th>Name</th>
	        <td><?php echo $cN ?></td>
	    	</tr>
	    	<tr>
	        <th>Gender</th>
	        <td><?php echo $gen ?></td>
	    	</tr>
	    	<tr>
	        <th>Age</th>
	        <td><?php echo $age ?></td>
	    	</tr>
	    	<tr>
	        <th>Height</th>
	        <td><?php echo $hei ?></td>
	    	</tr>
	    	<tr>
	        <th>Weight</th>
	        <td><?php echo $wei ?></td>
	    	</tr>
	    	<tr>
	        <th>Build</th>
	        <td><?php echo $bld ?></td>
	    	</tr>
	    	<tr>
	        <th>Hair color</th>
	        <td><?php echo $hClr ?></td>
	    	</tr>
	    	<tr>
	        <th>Eye color</th>
	        <td><?php echo $eClr ?></td>
	    	</tr>
	    	<tr>
	        <th>NID</th>
	        <td><?php echo $nID ?></td>
	    	</tr>
	    	<tr>
	        <th>Arrest Date</th>
	        <td><?php echo $AD ?></td>
	    	</tr>
	    	<tr>
	            
	    	<?php
	    		 echo "<tr>
                        <th>Options</th>
                        <td>
                        <a href='updateCriminal.php?cID=".$cID."' > Edit </a>
                        <br>
                        
                        <a href='database_config/deleteCrinfo.php?C_id=".$cID." onclick='return checkdelete()' > Delete </a>
                        </td>
                    </tr>";
	    	?>
            
	    </table>
	    
	    <script>
            function checkdelete(){
                return confirm('Are you sure you want to delete data?');
            }
        </script>

	</body>

</html>