<?php
    require 'nav.php';
    
    require 'database_config/connection.php';

    $Pt_id=0;
    
    if( isset($_POST['submit']) ){
        $Pt_id = $_POST['id'];
    }
    else{
        header('Location: ../tablePlaintiff.php');
    }

    $sql = "SELECT * FROM plaintiffs WHERE Pt_id=".$Pt_id.";";
    
    $rows = (mysqli_query($conn, $sql));
    $row = mysqli_fetch_assoc($rows);
?>


<!DOCTYPE html>
<html>

<head>
    <title>Update PLaintiffs Page</title>
    <meta charset="utf-8">
    <link href="style-sheets/mystyle_insertpage.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="main-wrapper">
        <center>
            <h1><b><u>Update Plaintiff Info</u></b></h1>
        </center>

        <center><img src="images/plaintiff.png" class="avatarRegis" /> </center><br>

        <form class="myform" action="database_config/updatePtinfo.php" method="POST">

            <center><label><u><b>Plaintiff's Info</b></u></label></center><br>
            
            <label>Plaintiff's id:</label><br>
            <input name="Pt_id" type="number" class="inputvalues" value="<?php echo $row['Pt_id'] ?>" required readonly /><br><br>
            
            <label>Plaintiff's Name:</label><br>
            <input name="Pt_name" type="text" class="inputvalues" value="<?php echo $row['Pt_name'] ?>" required readonly /><br><br>

            <label>Gender:</label><br>
            <input name="g" type="text" class="inputvalues"  value="<?php echo $row['Gender'];?>" required readonly/><br><br>

            <label>Age:</label><br>
            <input name="age" type="number" class="inputvalues" value="<?php echo $row['Age'] ?>" min="0" required /><br><br>

            <label>Contact Info:</label><br>
            Email:
            <input name="email" type="email" class="inputvalues" value="<?php echo $row['Email'] ?>" /><br>
            Phone:
            <input name="phone" type="number" class="inputvalues" value="<?php echo $row['Phone'] ?>" required /><br><br>

            <input name="update" type="submit" id="signup_btn" value="Update" /><br><br>

        </form>


    </div>

</body>

</html>