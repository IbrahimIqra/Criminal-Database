<?php
    require 'nav.php';
?>


<!DOCTYPE html>
<html>

<head>
    <title>Cases Page</title>
    <meta charset="utf-8">
    <link href="style-sheets/mystyle_insertpage.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="main-wrapper">
        
        <?php
            if(isset($_GET['success'])){
                echo
                    '<center><h3 id="success"><b>Plaintiff info Successfully Inserted!!!</b></h3></center>';
            }
        ?>
        
        <center>
            <h1><b><u>File a Case</u></b></h1>
        </center>
        
        <center><img src="images/cases.png" class="avatarRegis" /> </center><br>
        
        <!--starting tag of form and 1st input is inside this php tag-->
        <?php
            //success means user came to this page after filling up a Plaintiff form
            //so the Pt_id was already created in the last page
            if(isset($_GET['success'])){
                if($_GET['success'] === "ptCreated"){
                    //form
                    echo '<form class="myform" action="database_config/insertCsinfo.php?success=ptCreated&Pt_id='.$_GET['Pt_id'].' " method="POST">';
                    //1st input fixed since user came from Pt_id page
                    echo "<label>Pt_id created from plaintiff Page:</label><br>";
                    echo '<input name="Pt_id" type="number" value='.$_GET['Pt_id'].' class="inputvalues" readonly>';
                }
            }
            //otherwise let the user choose the Pt_id
            else{
                echo '<form class="myform" action="database_config/insertCsinfo.php" method="POST">';
                
                echo '<label>Select the Plaintiff id</label>
                      <select name="Pt_id" required>';
                
                require 'database_config/connection.php';
                
                //getting the list of Pt_ids
                $sql = "SELECT Pt_id FROM plaintiffs ORDER BY Pt_id ASC";
                $rows = mysqli_query($conn, $sql);
                
                //if the query didn't run show the error in the options :P
                if (!$rows){
                    echo "<option>Error description: ".mysqli_error($conn)."</option>" ;
                }
                //show the list of Pt_id
                else{
                    echo '<option disabled selected value="">Please select value</option>';
                    while( $row = mysqli_fetch_assoc($rows) ){
                        echo ( "<option name=".$row['Pt_id'].">".$row['Pt_id']."</option>" );
                    }
                }
                
                echo '</select>';
            }
            
        ?>
            
            
            <br>
            <label>Select the Police id:</label><br>
            <select name="P_id" required>
                
                <?php
                    require 'database_config/connection.php';
                    
                    $sql = "SELECT DISTINCT P_id FROM userinfo ORDER BY P_id ASC";
                    $rows = mysqli_query($conn, $sql);
                
                    //if the query didn't run show the error in the options :P
                    if (!$rows){
                        echo "<option>Error description: " . mysqli_error($con)."</option>" ;
                    }
                    //if no P_id found.. Which is impossible anyway
                    else if(mysqli_num_rows($rows) === 0){
                        echo 'if now user found then how the hell did u get here... GET OUT!!!';
                        header('Location: database_config/logout.php');
                    }
                    //show the list of P_id
                    else{
                        echo '<option disabled selected value="">Please select value</option>';
                        while( $row = mysqli_fetch_assoc($rows) ){
                            echo ( "<option name=".$row['P_id'].">".$row['P_id']."</option>" );
                        }
                    }
                ?>
                
            </select>
            <br><br>
            
            <center><label><u><b>Case Info</b></u></label></center><br>
            
            <label>The Date of filing:</label><br>
            <input name="Case_date" type="date" class="inputvalues" placeholder="DD/MM/YYYY" autocomplete="off" required /><br><br>
            
            <label>The Type of Crime:</label><br>
            <input name="C_type" type="text" class="inputvalues" placeholder="crime type" autocomplete="off" required /><br><br>

            <label>Number of Victims:</label><br>
            <input name="victims" type="number" class="inputvalues" placeholder="victims" min="0" required /><br><br>
            
            <label>Describe the crime:</label><br>
            <textarea name="description" rows="5" cols="27" placeholder="Describe Here" required></textarea><br><br>
            
            <input name="cs_insert" type="submit" id="signup_btn" value="File it" />
            
            <!--u get it right?
            the form started at php so ended it with php :P-->
            <?php echo '</form>' ?>
        

    </div>

</body>

</html>