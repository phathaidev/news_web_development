
<form action="" method="post">
Name: <input type="text" name="user_name" id=""> <br>
Email: <input type="email" name="user_email" id=""> <br>
Message <textarea name="message" id="" cols="30" rows="10"></textarea>
<input type="submit" name="btn_send" id="" value="Send">
<input type="submit" name="btn_view" id="" value="View All Feedback">
</form>

<?php 
   $con = mysqli_connect('localhost:3308','root','','etec') or die("Error Connection.");
    if(isset($_POST["btn_send"])){
        
        $name=$_POST["user_name"];
        $email=$_POST["user_email"];
        $message=$_POST["message"];
        $date= date('y-m-d');
        $time= date("h:i:sa");
        $sql_insert = "INSERT INTO `tbl_feedback`(`name`, `email`, `message`, `date`, `time`)
                    VALUES ('$name','$email','$message','$date','$time')";
        $rs_insert  = $con->query($sql_insert);
    if($rs_insert) {
        echo " <script>alert('Sent a Message')</script> ";
    }
    else{
        echo "<script>alert('Fail Send');</script>";
    }
    }
    if(isset($_POST["btn_view"])){
        $sql_select     = " SELECT * FROM `tbl_feedback` ";
        $result_select  = $con->query($sql_select);
        echo "
          <table class='table' border='1px'>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Message</th>
              <th>Date</th>
              <th>Time</th>
              
            </tr>
        ";
        while($row = mysqli_fetch_assoc($result_select)) {
    ?>
            <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['message'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td><?php echo $row['time'] ?></td>
            </tr>
    
    <?php
}
echo "</table>";
}

?>