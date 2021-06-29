<?php    
    session_start();

    // if not in session then get out
    if( !isset($_SESSION['user']) ){
        header('Location: LoginPage.php');
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="style-sheets/mystyle_nav.css" rel="stylesheet" type="text/css">
</head>

<body>
     
     <ul class="nav">
        <li><a href="HomePage.php">Home</a></li>
        <li><a href="tableCriminal.php?criminals">Criminals</a></li>
        <li><a href="tablePolice.php?polices">Polices</a></li>
        <li><a href="tableCase.php?cases">Cases</a></li>
        <li><a href="tablePlaintiff.php?plaintiffs">Plaintiffs</a></li>
        <a id="lgout" href="database_config/logout.php"> Logout </a>
     </ul>
   
   
</body>

</html>