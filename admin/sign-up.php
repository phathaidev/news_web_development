<html>
    <head>
        <title>Sign Up Account</title>
        <link rel="stylesheet" href="style/sign-up.css">
    </head>
    <body>
        <div class="sign-up-wrapper">
            <form action="" method="post" enctype="multipart/form-data">
                <fieldset>
                    <h2 class="title">Create Account Here</h2>
                    <span>Username</span> <br> <input type="text" name="username" class="box" placeholder="Username" required>
                    <span>Gender</span> <br> <input type="radio" name="gender" id="" value="Male" checked><label class="gender">Male</label>
                                            <input type="radio" name="gender" id="" value="Female"> <label class="gender">Female</label> <br>
                    <span>Email</span> <br> <input type="email" name="email" class="box" placeholder="Email" required>
                    <span>Password</span> <br> <input type="password" name="password" class="box" placeholder="Password" required>
                    <span>Confirm Password</span> <br> <input type="password" name="re_password" class="box" placeholder="Re-Password" required>
                    <span>Profile Image</span><br><input type="file" name="admin_img" class="form-control" required> <br>
                    <div class="btn-wrap">
                       <input type="submit" value="Sign Up" name="btn_sign_up" class="btn">
                       <p>OR</p> 
                       <a href="login.php" class="btn">Login Now</a>
                    </div>
                </fieldset>
            </form>
        </div>
    </body>
</html>

<?php
        include("dbConnect.php");

if(isset($_POST['btn_sign_up'])) {

    $username   = $_POST['username'];
    $genger     = $_POST['gender'];
    $email      = $_POST['email'];
    $password   = $_POST['password'];
    $re_password= $_POST['re_password'];
    $admin_img = rand(111,999).'-'.$_FILES['admin_img']['name'];
    $path_image = $_SERVER['DOCUMENT_ROOT'].'/One_news/admin_images/'.$admin_img; 
       
    if($password != $re_password){
        echo "Please check your password";
        
    }
    else{
    $sql_insert = "INSERT INTO `tbl_admin`(`admin_name`, `admin_gender`, `admin_email`, `admin_passwd`, `admin_img`)
                    VALUES ('$username','$genger','$email','$password','$admin_img')";
    $rs_insert  = $con->query($sql_insert);
    if($rs_insert) {
         // @Move File Upload
         move_uploaded_file($_FILES['admin_img']['tmp_name'],$path_image);
        echo " <script>alert('Your Account Created, Please click on login now for login your account')</script> ";
    }
    else{
        echo "<script>alert('Couldn't Signup!')</script>";
    }
    }

}

?>