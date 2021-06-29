<?php
    
    require 'nav.php';
    require 'database_config/connection.php';
    
    $table_sql;

    if( @$_GET['polices'] === 'search' ){
        $table_sql = "SELECT * FROM polices WHERE P_id='".$_POST['P_id']."';";
    }
    else{
        $table_sql = "SELECT * FROM polices;";
    }
    
    //running the query
    $rows = mysqli_query($conn, $table_sql);
    //if error running query
    if (!$rows) echo "Error description: " . mysqli_error($conn);
    //getting number of query
    $totalrows = mysqli_num_rows($rows);
    
?>


<!DOCTYPE html>
<html>

<head>
    <title>Police Files</title>
    <link rel="stylesheet" href="style-sheets/mystyle_table.css" type="text/css">
</head>

<body>
   
    <h1><u>Polices Table</u></h1>
    <?php
        if( isset($_GET['cng']) || isset($_GET['err'])){
            if(@$_GET['cng'] == 'del'){
                echo "<center><p id='del_notice'>Police Record Removed</p></center>" ;
            }
            if(@$_GET['cng'] == 'ed'){
                echo "<center><p id='ed_notice'>Police Info Updated</p></center>" ;
            }
            if(@$_GET['err'] == 'fk'){
                echo "<center><p id='del_notice'>CAN NOT DELETE Officer Record while the officer is working on a Case</p></center>" ;
            }
            if(@$_GET['err'] == 'lastid'){
                echo "<center><p id='del_notice'>CAN NOT DELETE the last Officer</p></center>" ;
            }
        }
    ?>
   <center>
        <form action="tablePolice.php?polices=search" method="post">
            <input name="P_id" type=search placeholder="Search by P_id" required>
            <!--select name=id required>
                <option name="Case_id">Case_id</option>
                <option name="P_id">P_id</option>
                <option name="Case_date">Case_date</option>
                <option name="Crime_type">Crime_type</option>
                <option name="victims">Number of Victims</option>
            </select-->
            <input name="srch" type=submit>
            <br><br>
            <a id="rfrsh" href="tablePolice.php">Refresh</a>
        </form>
    </center>
   
    <table>
       <caption><?php echo '<p><b>'.$totalrows.' rows found!!</b></p>' ?></caption>
        <tr>
            <th>[P_id]</th>
            <th>[Name]</th>
            <th>[Gender]</th>
            <th>[Age]</th>
            <th>[Email]</th>
            <th>[Photo]</th>
            <th>[Update]</th>
            <th>[Delete]</th>
        </tr>

        <?php
            if($totalrows > 0){

               while( $row = mysqli_fetch_assoc($rows) ){

                   echo 
                       "<tr>
                            <td>".$row['P_id']."</td>
                            <td>".$row['P_name']."</td>
                            <td>".$row['Gender']."</td>
                            <td>".$row['Age']."</td>
                            <td>".$row['Email']."</td>
                            <td>".$row['P_photo']."</td>
                            <td>
                            <form action='updatePolice.php?' method='POST'>
                            
                                <input name='id' class='hide' type='text' value=".$row['P_id'].">
                                
                                <input name='submit' id='editbtn' type='submit' value='UPDATE'>
                                
                            </form>
                            </td>
                            
                            <td>
                            <form action='database_config/del.php?tb=polices' method='POST'>
                                
                                <input name='id' class='hide' type='text' value='".$row['P_id']."'>
                                
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