<html>
    <head>
        <title>Login Account</title>
        <link rel="stylesheet" href="style/login.css">
    </head>
    <body>
        <div class="login-wrapper">
            <form action="" method="post">
                <fieldset>
                    <h2 class="title">Login Here</h2>
                    <span>Username</span> <br> <input type="text" name="username" class="box" placeholder="Username" required>
                    <span>Password</span> <br> <input type="password" name="password" class="box" placeholder="Password" required>
                    <div class="btn-wrap">
                       <input type="submit" value="Login" name="btn_login" class="btn">
                       <p>OR</p> 
                       <a href="sign-up.php" class="btn">Sign Up</a>
                    </div>
                </fieldset>
            </form>
        </div>
    </body>
</html>

<?php
    session_start();
    if(isset($_POST['btn_login'])) {

        $username   = $_POST['username'];
        $password   = $_POST['password'];
        $con        = new mysqli('','root','','db_cms');
        $sql_select = " SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password' ";
        $result_select = $con->query( $sql_select );
        $row  = mysqli_fetch_assoc( $result_select );

        if(!empty($row)) {
            $_SESSION["id"]   = $row['id'];
            $_SESSION["name"] = $row['username'];
        } else {
         echo " <script>alert('Invalid Username Or Password!')</script> ";
        } 
    }
    if(isset($_SESSION["id"])) {
    header("Location:index.php");
    }
?>