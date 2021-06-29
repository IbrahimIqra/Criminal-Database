<?php
    
    require 'nav.php';
    require 'database_config/connection.php';
    
    $table_sql;
    
    if( @$_GET['criminals'] === 'search' ){
        $table_sql = "SELECT * FROM criminals WHERE C_id=".$_POST['C_id'].";";
    }
    else{
        $table_sql = "SELECT * FROM criminals;";
    }
    
    //running the query
    $rows = mysqli_query($conn, $table_sql);
    //if error running query
    if (!$rows) echo "Error description: ".mysqli_error($conn);
    //getting number of query
    $totalrows = mysqli_num_rows($rows);
    
?>


<!DOCTYPE html>
<html>

<head>
    <title>Criminal Files</title>
    <link rel="stylesheet" href="style-sheets/mystyle_table.css" type="text/css">
</head>

<body>
    
    <h1><u>Criminals Table</u></h1>
    <?php
        if(isset($_GET['cng'])){
            if(@$_GET['cng'] == 'del'){
                echo "<center><p id='del_notice'>Criminal Record Removed</p></center>" ;
            }
            if(@$_GET['cng'] == 'ed'){
                echo "<center><p id='ed_notice'>Criminal Record Updated</p></center>" ;
            }
        }
    ?>
    <center>
        <form action="tableCriminal.php?criminals=search" method="post">
            <input name="C_id" type=number placeholder="Search by C_id" required>
            <!--select name=id required>
                <option name="Case_id">Case_id</option>
                <option name="P_id">P_id</option>
                <option name="Case_date">Case_date</option>
                <option name="Crime_type">Crime_type</option>
                <option name="victims">Number of Victims</option>
            </select-->
            <input name="srch" type=submit>
            <br><br>
            <a id="rfrsh" href="tableCriminal.php">Refresh</a>
        </form>
    </center>

    <table>
       <caption><?php echo '<p><b>'.$totalrows.' rows found!!</b></p>' ?></caption>
        <tr>
            <th>[C_id]</th>
            <th>[Case_id]</th>
            <th>[Name]</th>
            <th>[Gender]</th>
            <th>[Age]</th>
            <th>[Height]</th>
            <th>[Weight]</th>
            <th>[Build]</th>
            <th>[Hair Color]</th>
            <th>[Eye Color]</th>
            <th>[NID]</th>
            <th>[Arrest Date]</th>
            <th>[Photo]</th>
            <th>[Update]</th>
            <th>[Delete]</th>
        </tr>

        <?php
            if($totalrows > 0){

               while( $row = mysqli_fetch_assoc($rows) ){

                   echo 
                       "<tr>
                            <td>".$row['C_id']."</td>
                            <td>".$row['Case_id']."</td>
                            <td>".$row['C_name']."</td>
                            <td>".$row['Gender']."</td>
                            <td>".$row['Age']."</td>
                            <td>".$row['Height']."</td>
                            <td>".$row['Weight']."</td>
                            <td>".$row['Build']."</td>
                            <td>".$row['Hair_color']."</td>
                            <td>".$row['Eye_color']."</td>
                            <td>".$row['NID']."</td>
                            <td>".$row['Arrest_date']."</td>
                            <td>".$row['C_photo']."</td>
                            <td>
                            <form action='updateCriminal.php' method='POST'>
                            
                                <input name='id' class='hide' type='number' value=".$row['C_id'].">
                                
                                <input name='submit' id='editbtn' type='submit' value='UPDATE'>
                                
                            </form>
                            </td>
                            
                            <td>
                            <form action='database_config/del.php?tb=criminals' method='POST'>
                                
                                <input name='id' class='hide' type='text' value=".$row['C_id'].">
                                
                                <input name='submit' id='deletebtn' type='submit' value='DELETE' onclick='return checkdelete()'>
                                
                            </form>
                            </td>
                        </tr>";
               }

            }

        ?>

    </table>
    
    <script>
        function checkdelete(){
            return confirm('Are you sure you want to delete data?');
        }
    </script>
    
</body>

</html>
