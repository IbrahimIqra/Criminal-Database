<?php
    
    require 'nav.php';
    require 'database_config/connection.php';
    
    $table_sql;

    if( @$_GET['cases'] === 'search'){
        $table_sql = "SELECT * FROM cases WHERE Case_id=".$_POST['Case_id'].";";
    }
    else{
        $table_sql = "SELECT * FROM cases;";
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
    <title>Case Files</title>
    <link rel="stylesheet" href="style-sheets/mystyle_table.css" type="text/css">
</head>

<body>

    <h1><u>Cases Table</u></h1>
    <?php
        if( isset($_GET['cng']) || isset($_GET['err'])){
            if(@$_GET['cng'] == 'del'){
                echo "<center><p id='del_notice'>Case Removed</p></center>" ;
            }
            if(@$_GET['cng'] == 'ed'){
                echo "<center><p id='ed_notice'>Case Updated</p></center>" ;
            }
            if(@$_GET['err'] == 'fk'){
                echo "<center><p id='del_notice'>CAN NOT DELETE Case Record while there is a Criminal for the case</p></center>" ;
            }
        }
    ?>
    <center>
        
        <form action="tableCase.php?cases=search" method="POST">
            <input name="Case_id" type=number placeholder="Search by Case_id" required>
            <!--select name=id required>
                <option name="Case_id">Case_id</option>
                <option name="P_id">P_id</option>
                <option name="Case_date">Case_date</option>
                <option name="Crime_type">Crime_type</option>
                <option name="victims">Number of Victims</option>
            </select-->
            <input name="srch" type=submit>
            <br><br>
            <a id="rfrsh" href="tableCase.php">Refresh</a>
        </form>
    </center>


    <table>
        <caption><?php echo '<p><b>'.$totalrows.' rows found!!</b></p>' ?></caption>
        <tr>
            <th>[Case_id]</th>
            <th>[Pt_id]</th>
            <th>[P_id]</th>
            <th>[Case Date]</th>
            <th>[Crime Type]</th>
            <th>[Victims]</th>
            <th>[Description]</th>
            <th>[Update]</th>
            <th>[Delete]</th>
        </tr>

        <?php
            //if any rows found then show them
            if($totalrows > 0){
               //creating an associative array 
               while( $row = mysqli_fetch_assoc($rows) ){
                   
                   echo
                       "<tr>
                            <td>".$row['Case_id']."</td>
                            <td>".$row['Pt_id']."</td>
                            <td>".$row['P_id']."</td>
                            <td>".$row['Case_date']."</td>
                            <td>".$row['Crime_type']."</td>
                            <td>".$row['Victims']."</td>
                            <td>".$row['Description']."</td>
                            
                            <td>
                            <form action='updateCase.php' method='POST'>
                            
                                <input name='id' class='hide' type='number' value=".$row['Case_id'].">
                                
                                <input name='submit' id='editbtn' type='submit' value='UPDATE'>
                                
                            </form>
                            </td>
                            
                            <td>
                            <form action='database_config/del.php?tb=cases' method='POST'>
                                
                                <input name='id' class='hide' type='text' value=".$row['Case_id'].">
                                
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
