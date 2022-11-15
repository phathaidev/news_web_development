<?php include('header.php'); 
     $getId=$_GET["up_id"];
     $select_menu="SELECT * FROM `tbl_menu` WHERE `id`='$getId'";
      $result_menu=$con->query($select_menu);
      $row_menu= mysqli_fetch_assoc($result_menu);
      $menu_name=$row_menu["menu_name"];
      $menu_url=$row_menu["menu_url"];
?>
<style>
    input[type="file"],input[type="text"]{
      width:600px;
    }
    .content-header{
      margin-bottom:0;
    }
    .content-header h1{
      text-decoration:underline;
    }
    .container label{
      font-weight:normal;
      font-style:italic;
    }
    input[type="submit"]{
      margin-top:20px;
    }
    </style>

    <section class="content-header">
      <h1>
        Update Menu Items
      </h1>
    </section>
    <!-- Main content -->
    <section class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <h4>Menu Item Name:</h4> <input type="text" name="mItem_name" class="form-control" value="<?php echo $menu_name; ?>">
      <h4>Menu Item URL</h4> <input type="text" name="mItem_url" class="form-control" value="<?php echo $menu_url; ?>">
      <input type="submit" value="Update" name="update_menu_item" class="btn btn-primary">
      <input type="submit" value="Cancel" name="cancel" class="btn btn-info" onclick="cancel()">
    </form>
    </section>
    <?php
       
       if(isset($_POST['update_menu_item'])) {
        $item_name=$_POST["mItem_name"];
         $item_url= $_POST['mItem_url'];
         
         $sql_update="UPDATE `tbl_menu` SET `menu_name`='$item_name',`menu_url`='$item_url' WHERE id='$getId'";
         $result_update = $con->query($sql_update);
         if($result_update) {
           echo "
             <script>alert('One Menu Item Updated')
             window.location.href='menu_items.php';
             </script>
           ";
         }else {
            echo "
            <script>alert('Fail to Update Menu Item')</script>
          ";
         }
       }
       if(isset($_POST["cancel"])){
        echo "
        <script>
        window.location.href='menu_items.php';
        </script>
      ";
       }
   ?>
 <script>
       
        function cancel(){
         window.location.href="menu_items.php";  
        }
    </script>
 <?php include('footer.php');  ?>
 