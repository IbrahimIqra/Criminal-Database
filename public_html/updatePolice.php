<?php
    require 'nav.php';
    
    require 'database_config/connection.php';

    $P_id=0;
    
    if( isset($_POST['submit']) ){
        $P_id = $_POST['id'];
    }
    else{
        header('Location: ../tablePolice.php');
    }

    $sql = "SELECT * FROM polices WHERE P_id='".$P_id."';";
    
    $rows = (mysqli_query($conn, $sql));
    $row = mysqli_fetch_assoc($rows);
?>


<!DOCTYPE html>
<html>

<head>
    <title>Update Polices Page</title>
    <meta charset="utf-8">
    <link href="style-sheets/mystyle_insertpage.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="main-wrapper">
        <center>
            <h1><u><b>Update Police Info</b></u></h1>
        </center>

        <center><img src="images/police.png" class="avatarRegis" /> </center><br>

        <form class="myform" action="database_config/updatePlinfo.php" method="POST">

            <label>Police ID:</label><br>
            <input name="P_id" type="text" class="inputvalues" value="<?php echo $P_id ?>" required readonly/><br>

            <label>Enter the name:</label><br>
            <input name="P_name" type="text" class="inputvalues" value="<?php echo $row['P_name'] ?>" required readonly/><br><br>

            <label>Gender:</label><br>
            <input name="g" type="text" class="inputvalues"  value="<?php echo $row['Gender'];?>" required readonly/><br><br>

            <label>Age:</label><br>
            <input name="age" type="number" class="inputvalues" value="<?php echo $row['Age']; ?>" min="0" required /><br><br>
            
            <label>Enter email:</label><br>
            <input name="email" type="email" class="inputvalues" value="<?php echo $row['Email']; ?>" required /><br><br>
            
            <label>Image:</label>
            <input name="image" type="file" class="inputvalues" /><br><br>

            <input name="update" type="submit" id="signup_btn" value="Update" /><br><br>

        </form>

    </div>

</body>

</html>