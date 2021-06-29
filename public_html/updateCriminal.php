<?php
    require 'nav.php';
    require 'database_config/connection.php';

    @$C_id;
    
    if( isset($_POST['submit']) ){
        $C_id = $_POST['id'];
    }
    if( isset($_GET['cID'])){
        $C_id = $_GET['cID'];
    }
    
    $sql = "SELECT * FROM criminals WHERE C_id=".$C_id.";";
    
    $rows = (mysqli_query($conn, $sql));
    $row = mysqli_fetch_assoc($rows);
    
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Criminals Page</title>
    <meta charset="utf-8">
    <link href="style-sheets/mystyle_insertpage.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="main-wrapper">
        <center><u><h2>Update criminal info</h2></u></center>
         <center><img src="images/criminal.png" class="avatarRegis"/> </center><br>
        
        <form class="myform" action="database_config/updateCrinfo.php" method="POST">
           
            <label>Criminal ID:</label><br>
            <input name="C_id" type="text" class="inputvalues"  value="<?php echo $row['C_id'];?>" placeholder="Criminal's Name" autofocus readonly /><br><br>

            <label>Name:</label><br>
            <input name="C_name" type="text" class="inputvalues"  value="<?php echo $row['C_name'];?>" placeholder="Criminal's Name" autofocus required /><br><br>

            <label>Gender:</label><br>
            <input name="g" type="text" class="inputvalues"  value="<?php echo $row['Gender'];?>" required readonly/><br><br>
            

            <label>Age:</label><br>
            <input name="age" type="text" class="inputvalues" placeholder="0" min="0" value="<?php echo $row['Age'];?>"  required /><br><br>

            <label>Height:(ft)</label><br>
            <input name="height" type="text" class="inputvalues" placeholder="0.0" min="0" step="0.01"  value="<?php echo $row['Height'];?>" required /><br><br>

            <label>Weight:(kg)</label><br>
            <input name="weight" type="text" class="inputvalues" placeholder="0.0" min="0" step="0.01"  value="<?php echo $row['Weight'];?>" required /><br><br>
            
            
            <?php
                if($row['Build']=='Buff'){
                    echo
                        '<label>Build:</label><br>
                        Buff
                        <input name="build" type="radio" class="" value="Buff" required checked /><br>
                        Skinny
                        <input name="build" type="radio" class="" value="Skinny" required /><br>
                        Chubby
                        <input name="build" type="radio" class="" value="Chubby" required /><br><br>';
                }
                else if($row['Build']=='Skinny'){
                    echo
                        '<label>Build:</label><br>
                        Buff
                        <input name="build" type="radio" class="" value="Buff" required /><br>
                        Skinny
                        <input name="build" type="radio" class="" value="Skinny" required checked /><br>
                        Chubby
                        <input name="build" type="radio" class="" value="Chubby" required /><br><br>';
                }
                else{
                    echo
                        '<label>Build:</label><br>
                        Buff
                        <input name="build" type="radio" class="" value="Buff" required /><br>
                        Skinny
                        <input name="build" type="radio" class="" value="Skinny" required /><br>
                        Chubby
                        <input name="build" type="radio" class="" value="Chubby" required checked /><br><br>';
                }
            ?>
            
            
            <label>Hair Color:</label><br>
            <input name="haircolor" type="text" class="inputvalues" placeholder="criminal's hair color"  value="<?php echo $row['Hair_color'];?>" required /><br><br>

            <label>Eye Color:</label><br>
            <input name="eyecolor" type="text" class="inputvalues" placeholder="criminal's eye color"  value="<?php echo $row['Eye_color'];?>" required /><br><br>

            <label>NID:</label><br>
            <input name="NID" type="text" class="inputvalues" placeholder="NID here or 0 if there's none"  value="<?php echo $row['NID'];?>" /><br><br>
            
            <label>Arrest date:</label><br>
            <input name="arDate" type="date" class="inputvalues" placeholder="dd/mm/yyyy"  value="<?php echo $row['Arrest_date'];?>" required /><br><br>

            <label>Image:</label>
            <input name="image" type="file" class="inputvalues" /><br><br>

            <input name="update" type="submit" id="signup_btn" value="update" /><br><br>

        </form>
            
    </div>

</body>

</html>