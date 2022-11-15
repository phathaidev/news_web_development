<?php

    include('header.php');
    $getId=$_GET["del_id"];
    $delete="DELETE FROM `tbl_banner` WHERE id=$getId";
    $delete_query=$con->query($delete);
    if($delete_query){
        echo '
                <script>alert("deleted");
                window.location.href="banner.php";
                </script>';
                
        
    }
?>