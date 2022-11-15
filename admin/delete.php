<?php
       include("dbConnect.php");
       $get_id=$_GET["del_id"];
       $delete="DELETE FROM tbl_news_post WHERE `news_id`=$get_id";
       $re_de=$con->query($delete) or die("<script>alert('Fail delete');</script>");
       header("Location: dataTable.php");

 ?>
