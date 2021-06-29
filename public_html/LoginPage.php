<?php
    
    session_start();
    
    if( isset($_SESSION['user']) ){
        header('Location: HomePage.php');
    }
?>

<!DOCTYPE html>
<html id="login">

<head>
    <title>Login Page</title>
    <meta charset="utf-8">
    <link href="style-sheets/mystyle_login.css" rel="stylesheet" type="text/css">
</head>

<body>

    <h1 id="top">Criminal Database</h1>

    <div class="login-box">

        <h1>Sign in</h1>
        
        <?php
            if(isset($_GET['error'])){
                if($_GET['error'] == 'invalid'){
                    echo
                    '<form id=myform action="database_config/login.php" method="post">
                        <div class="textbox">
                            <input name="user" class="userpass" type="text" placeholder="Username" autofocus autocomplete="off" required>
                            <span class="wrong">Invalid!</span><br>
                            <input name="pass" class="userpass" type="password" placeholder="Password" required>
                            <span class="wrong">Invalid!</span><br>
                        </div>
                        <input name="logged" id="login_btn" type="submit" value="login">
                    </form>';
                }
            }
            else{
                echo
                '<form id=myform action="database_config/login.php" method="post">
                    <div class="textbox">
                        <input name="user" class="userpass" type="text" placeholder="Username" autofocus autocomplete="off" required><br>
                        <input name="pass" class="userpass" type="password" placeholder="Password" required><br>
                    </div>
                    <input name="logged" id="login_btn" type="submit" value="login">
                </form>';
            }
        ?>

    </div>


</body>

</html>