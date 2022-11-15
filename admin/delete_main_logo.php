<?php

    include('header.php');
    $getId=$_GET["del_id"];
    $delete="DELETE FROM `tbl_logo` WHERE id=$getId";
    $delete_query=$con->query($delete);
    if($delete_query){
        echo '
                <script>alert("deleted");
                window.location.href="main_logo.php";
                </script>';
                
        
    }
//    header("Location: user-feedback.php");
?>