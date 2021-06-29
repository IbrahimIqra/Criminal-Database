<?php
    require 'nav.php';
?>


<!DOCTYPE html>
<html>

<head>
    <title>PLaintiffs Page</title>
    <meta charset="utf-8">
    <link href="style-sheets/mystyle_insertpage.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="main-wrapper">
        <center>
            <h1><b><u>Insert Plaintiff Info</u></b></h1>
        </center>

        <?php
                if(isset($_GET['success'])){
                    //if redirected from successful case entry
                    if($_GET['success'] === "caseCreated"){
                        echo '<center><h3 id="success"><b>Case created now enter Plaintiff info</b></h3></center>';
                    }
                }
         ?>

        <center><img src="images/plaintiff.png" class="avatarRegis" /> </center><br>

        <form class="myform" action="database_config/insertPtinfo.php" method="POST">

            <center><label><u><b>Plaintiff's Info</b></u></label></center><br>

            <label>Plaintiff's Name:</label><br>
            <input name="Pt_name" type="text" class="inputvalues" placeholder="enter name" autocomplete="off" required /><br><br>

            <label>Gender:</label><br>
            <label>M:</label>
            <input name="g" type="radio" class="" value="M" required />
            <label>F:</label>
            <input name="g" type="radio" class="" value="F" required /><br>
            <label>Non-binary:</label>
            <input name="g" type="radio" class="" value="N" required /><br><br>

            <label>Age:</label><br>
            <input name="age" type="number" class="inputvalues" placeholder="0" min="0" required /><br><br>

            <label>Contact Info:</label><br>
            Email:
            <input name="email" type="email" class="inputvalues" placeholder="123@abc.com"/><br>
            Phone:
            <input name="phone" type="number" class="inputvalues" placeholder="01XXXXXXXXX" required /><br><br>

            <input name="pt_insert" type="submit" id="signup_btn" value="Insert" /><br><br>

        </form>


    </div>

</body>

</html>