<?php

    include('header.php');
    $getId=$_GET["del_id"];
    $delete="DELETE FROM `tbl_menu` WHERE id=$getId";
    $delete_query=$con->query($delete);
    if($delete_query){
        echo '
                <script>alert("Deleted");
                window.location.href="menu_items.php";
                </script>';
                
        
    }
//    header("Location: user-feedback.php");
?>