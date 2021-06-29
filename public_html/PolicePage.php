<?php
    require 'nav.php';
?>


<!DOCTYPE html>
<html>

<head>
    <title>Polices Page</title>
    <meta charset="utf-8">
    <link href="style-sheets/mystyle_insertpage.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="main-wrapper">
        <center>
            <h1><u><b>Insert New Police Info</b></u></h1>
        </center>

        <?php
            //if successfully inserted then show this
            if(isset($_GET['success'])){
                echo '<center><h3 id="success"><b>Info Successfully Inserted!!!</b></h3></center>';
            }
            //if P_id alreadt exists
            if(isset($_GET['error'])){
                echo '<center><h3 id="failure"><b>P_id already exists<br>Try a different P_id</b></h3></center>';
            }
            
         ?>

        <center><img src="images/police.png" class="avatarRegis" /> </center><br>

        <form class="myform" action="database_config/insertPlinfo.php" method="POST">

            <label>Create New P_id:</label><br>
            <input name="P_id" type="text" class="inputvalues" placeholder="enter new P_id" autofocus autocomplete="off" required /><br>
            
            <label>Create New Password:</label><br>
            <input name="pass" type="password" class="inputvalues" placeholder="enter the password" required /><br><br>
            

            <center><label><u><b>Police Info</b></u></label></center><br>

            <label>Enter the name:</label><br>
            <input name="P_name" type="text" class="inputvalues" placeholder="enter name" autocomplete="off" required /><br><br>

            <label>Gender:</label><br>
            <label>M:</label>
            <input name="g" type="radio" class="" value="M" required />
            <label>F:</label>
            <input name="g" type="radio" class="" value="F" required /><br>
            <label>Non-binary:</label>
            <input name="g" type="radio" class="" value="N" required /><br><br>

            <label>Age:</label><br>
            <input name="age" type="number" class="inputvalues" placeholder="0" min="0" required /><br><br>
            
            <label>Enter email:</label><br>
            <input name="email" type="email" class="inputvalues" placeholder="123@abc.com" autocomplete="off" required /><br><br>
            
            <label>Image:</label>
            <input name="image" type="file" class="inputvalues" /><br><br>

            <input name="p_insert" type="submit" id="signup_btn" value="Insert" /><br><br>

        </form>

    </div>

</body>

</html>