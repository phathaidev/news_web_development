<?php include('header.php');  ?>
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
        Menu Items
      </h1>
    </section>
    <!-- Main content -->
    <section class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <h4>Menu Item Name:</h4> <input type="text" name="mItem_name" class="form-control">
      <h4>Menu Item URL</h4> <input type="text" name="mItem_url" class="form-control">
      <input type="submit" value="Insert Icon" name="submut_menu_item" class="btn btn-primary">
      <input type="submit" value="View Icon" name="view_menu_items" class="btn btn-info">
    </form>
    </section>
    <?php
       
       if(isset($_POST['submut_menu_item'])) {
        $item_name=$_POST["mItem_name"];
         $item_url= $_POST['mItem_url'];
         $sql_insert = "INSERT INTO `tbl_menu`(`menu_name`, `menu_url`) VALUES ('$item_name','$item_url')";
         $result_insert = $con->query($sql_insert);
         if($result_insert) {
           echo "
             <script>alert('One Menu Item Inserted')</script>
           ";
         }else {
            echo "
            <script>alert('Fail to insert Menu Item')</script>
          ";
         }
 
       }
 
       if(isset($_POST['view_menu_items'])) {
         $sql_select     = " SELECT * FROM `tbl_menu` ";
         $result_select  = $con->query($sql_select);
         echo "
           <table class='table'>
             <tr>
               <th>ID</th>
               <th>Menu Item Name</th>
               <th>Menu Item Url</th>
             </tr>
         ";
         while($row = mysqli_fetch_assoc($result_select)) {
           $id=$row['id'];
   ?>
 
           <tr>
           <td><?php echo $row['id'] ?></td>
             <td><?php echo $row['menu_name'] ?></td>
             <td><?php echo $row['menu_url'] ?></th>
             <td>
             <input type='button' onClick='deleteme(<?php echo $id ?>)' name='delete' value='Delete' class='btn btn-danger'>
             <input type='button' onClick='updateme(<?php echo $id ?>)' name='Update' value='Update' class='btn btn-success'>
             
             </td>
           
           </tr>
   <?php
         }
       echo "</table>";
       }
   ?>
 <script>
        function deleteme(delId){
            if(confirm("Are you sure to delete this?")){
                window.location.href='delete_menu_item.php?del_id='+delId+'';
                return true;
            }
        }
        function updateme(upId){
         window.location.href='update_menu_items.php?up_id='+upId+'';  
        }
    </script>
 <?php include('footer.php');  ?>
 