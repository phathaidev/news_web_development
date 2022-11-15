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
                    <span>Email</span> <br> <input type="email" name="email" class="box" placeholder="Email" required>
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

    include("dbConnect.php");
    if(isset($_POST['btn_login'])) {
        $email    = $_POST['email'];
        $password = $_POST['password'];

        $sql_select = " SELECT * FROM `tbl_admin` WHERE `admin_email`= '$email' AND `admin_passwd`= '$password'";
        $result_select =mysqli_query($con,$sql_select);
        $row = mysqli_fetch_assoc( $result_select );
        if($row) {
            $_SESSION['id'] = $row['admin_id'];
            header('Location: index.php');
        }
        else {
            echo " <script>alert('Please Login Again!')</script> ";

        }
      
    }

?>