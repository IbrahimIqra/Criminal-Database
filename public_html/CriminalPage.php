<?php
    require 'nav.php';
?>


<!DOCTYPE html>
<html>

<head>
    <title>Criminals Page</title>
    <meta charset="utf-8">
    <link href="style-sheets/mystyle_insertpage.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="main-wrapper">
        <center>
            <h1><u><b>Insert new criminal info</b></u></h1>
        </center>

        <?php
            if(isset($_GET['success'])){
                echo
                    '<center><h3 id="success"><b>Info Successfully Inserted!!!</b></h3></center>';
            }
         ?>

        <center><img src="images/criminal.png" class="avatarRegis" /> </center><br>

        <form class="myform" action="database_config/insertCrinfo.php" method="POST">

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
            <br>
            <label>Select the Case_id:</label><br>
            <select name="Case_id" required>
                
                <?php
                    require 'database_config/connection.php';
                    
                    $sql = "SELECT DISTINCT Case_id FROM cases ORDER BY Case_id ASC";
                    $rows = mysqli_query($conn, $sql);
                
                    //if the query didn't run show the error in the options :P
                    if (!$rows){
                        echo "<option>Error description: " . mysqli_error($con)."</option>" ;
                    }
                    //show the list of id
                    else{
                        echo '<option disabled selected value="">Please select value</option>';
                        while( $row = mysqli_fetch_assoc($rows) ){
                            echo ( "<option name=".$row['Case_id'].">".$row['Case_id']."</option>" );
                        }
                    }
                ?>
                
            </select>
            <br><br>
            
            <center><label><u><b>Criminal's Info</b></u></label></center><br>

            <label>Name:</label><br>
            <input name="C_name" type="text" class="inputvalues" placeholder="Criminal's Name" autofocus required /><br><br>

            <label>Gender:</label><br>
            <label>M:</label>
            <input name="g" type="radio" class="" value="M" required />
            <label>F:</label>
            <input name="g" type="radio" class="" value="F" required /><br>
            <label>Non-binary:</label>
            <input name="g" type="radio" class="" value="N" required /><br><br>

            <label>Age:</label><br>
            <input name="age" type="number" class="inputvalues" placeholder="0" min="0" required /><br><br>

            <label>Height:(ft)</label><br>
            <input name="height" type="number" class="inputvalues" placeholder="0.0" min="0" step="0.01" required /><br><br>

            <label>Weight:(kg)</label><br>
            <input name="weight" type="number" class="inputvalues" placeholder="0.0" min="0" step="0.01" required /><br><br>

            <label>Build:</label><br>
            Buff
            <input name="build" type="radio" class="" value="Buff" required /><br>
            Skinny
            <input name="build" type="radio" class="" value="Skinny" required /><br>
            Chubby
            <input name="build" type="radio" class="" value="Chubby" required /><br><br>

            <label>Hair Color:</label><br>
            <input name="haircolor" type="text" class="inputvalues" placeholder="criminal's hair color" required /><br><br>

            <label>Eye Color:</label><br>
            <input name="eyecolor" type="text" class="inputvalues" placeholder="criminal's eye color" required /><br><br>

            <label>NID:</label><br>
            <input name="NID" type="number" class="inputvalues" placeholder="NID here or 0 if there's none" required /><br><br>

            <label>Arrest date:</label><br>
            <input name="arDate" type="date" class="inputvalues" placeholder="DD/MM/YYYY" required /><br><br>

            <label>Image:</label>
            <input name="image" type="file" class="inputvalues" /><br><br>

            <input name="insert" type="submit" id="signup_btn" value="Insert" /><br><br>

        </form>

    </div>

</body>

</html>