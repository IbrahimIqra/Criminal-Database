<?php
    require 'nav.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Criminal Database Homepage</title>
    <link href="style-sheets/mystyle_homepage.css" rel="stylesheet" type="text/css">
</head>

<body>

    <center>
        <h1>Welcome to the HomePage</h1>
        <!--search by criminal id @Hasib-->
        <form class="srch" action="crSearch.php" method="GET">

            <label>Search criminal</label><br><br>

            <input name="cID" type="number" placeholder="Search by Criminal ID" required />

            <input name="submitbtn" type="submit" value="Search" /><br><br>

        </form>
        <!--search by criminal name @Hasib-->
        <form class="srch" action="cNSearch.php" method="GET">

            <input name="cN" type="text" placeholder="Search by Criminal Name" required>

            <input name="submitbtn" id="sub" type="submit" value="Search">

        </form>

    </center>

    <div class="wrapper">
        <span id="Crime">
            <button form="ptbtn" type="submit">Insert Plaintiffs info</button>
        </span>
        <span id="Plaintiff">
            <button form="pbtn" type="submit">Insert Polices info</button>
        </span>

        <br><br>

        <span id="Case">
            <button form="csbtn" type="submit">Insert Cases info</button>
        </span>
        <span id="Police">
            <button form="cbtn" type="submit">Insert Criminals info</button>
        </span>

    </div>
    
    <div class="guide">

    <?php
        //if came to HomePage after inserting some info then show this
        if(isset($_GET['success'])){
            //If Plaintiff and Case info inserted
            if($_GET['success'] === "ptCreated"){
                echo '<div id="success"><h3>Plaintiff and Case Info Inserted!!!</h3></div>';
            }//If Case info inserted
            if($_GET['success'] === "csCreated"){
                echo '<div id="success"><h3>Case Info Inserted!!!</h3></div>';
            }
        }
        else{
        //if came to HomePage normally then show this
        echo '<center>
            <b><u><h2>Instructions</h2></u></b>
            
            <p>When a <b>Plaintiff</b> comes to police station. Register his/her info and file the <b>Case</b> according to the details given by the plaintiff.</p>

            <p>Catch the <b>Criminal</b> and register his/her info.</p>
            <p>If a new <b>Police</b> joins the station register his/her info.</p>

            <p>NOTE: CASE MUST BE FILED IF A PLAINTIFF COMES TO THE POLICE STATION</p>
        </center>';
         }
    ?>
    
    </div>
         
    <!--These forms won't be displayed because of Display: none -->
    <span class="forms">
        <form id=pbtn action="PolicePage.php"></form>
        <form id=cbtn action="CriminalPage.php"></form>
        <form id=csbtn action="CasePage.php"></form>
        <form id=ptbtn action="PlaintiffPage.php"></form>
        <form id=table action="ViewTablePage.php"></form>
    </span>

</body>

</html>