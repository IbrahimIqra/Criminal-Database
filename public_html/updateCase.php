<?php
    require 'nav.php';
    
    require 'database_config/connection.php';

    $Case_id=0;
    
    if( isset($_POST['submit']) ){
        $Case_id = $_POST['id'];
    }
    else{
        header('Location: ../tableCase.php');
    }

    $sql = "SELECT * FROM cases WHERE Case_id=".$Case_id.";";
    
    $rows = (mysqli_query($conn, $sql));
    $row = mysqli_fetch_assoc($rows);
?>


<!DOCTYPE html>
<html>

<head>
    <title>Update Cases Page</title>
    <meta charset="utf-8">
    <link href="style-sheets/mystyle_insertpage.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="main-wrapper">

        <center>
            <h1><b><u>Update a Case</u></b></h1>
        </center>

        <center><img src="images/cases.png" class="avatarRegis" /> </center><br>

        <form class="myform" action="database_config/updateCsinfo.php" method="POST">;
            <label>Case ID:</label><br>
            <input name="Case_id" type="number" value=<?php echo $row['Case_id'] ?> class="inputvalues" readonly>

            <label>Plaintiff ID:</label><br>
            <input name="Pt_id" type="number" value="<?php echo $row['Pt_id'] ?>" class="inputvalues" readonly>
            <br>
            <label>Police ID:</label><br>
            <input name="P_id" type="text" value="<?php echo $row['P_id'] ?>" class="inputvalues" readonly>
            <br><br>

            <center><label><u><b>Case Info</b></u></label></center><br>

            <label>The Date of filing:</label><br>
            <input name="Case_date" type="date" class="inputvalues" value="<?php echo $row['Case_date'] ?>" required readonly /><br><br>

            <label>The Type of Crime:</label><br>
            <input name="c_type" type="text" class="inputvalues" value="<?php echo $row['Crime_type']?>" required /><br><br>

            <label>Number of Victims:</label><br>
            <input name="victims" type="number" class="inputvalues" value="<?php echo $row['Victims'] ?>" min="0" required /><br><br>

            <label>Description of the crime:</label><br>
            <input name="description" value="<?php echo $row['Description']?>" required><br><br>

            <input name="update" type="submit" id="signup_btn" value="Update" />

        </form>


    </div>

</body>

</html>
