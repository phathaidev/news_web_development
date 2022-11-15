<?php include('header.php');  ?>
    <!-- Content Header (Page header) -->
    

    <section class="content-header">
      <h1>
        Main Logo
      </h1>
    </section>
    <!-- Main content -->
    <section class="container">
    <form action="" method="post" enctype="multipart/form-data">
      <h4>Top Logo Image</h4><label>(Recommend Icon Size 250px * 100px)</label><input type="file" name="top_logo" class="form-control" > <br>
      <h4>Footer Logo Image</h4><label>(Recommend Icon Size 345px * 250px)</label> <input type="file" name="footer_logo" class="form-control"> <br>
      <input type="submit" value="Insert Icon" name="btn_submit_logo" class="btn btn-primary">
      <input type="submit" value="View Icon" name="btn_view_logo" class="btn btn-info">
    </form>
    </section>
  <?php
       
      if(isset($_POST['btn_submit_logo'])) {
        $top_logo = rand(111,999).'-'.$_FILES['top_logo']['name'];
        $footer_logo= rand(111,999).'-'.$_FILES['footer_logo']['name'];
        $path_top_logo = $_SERVER['DOCUMENT_ROOT'].'/One_news/image/'.$top_logo;
        $path_footer_logo = $_SERVER['DOCUMENT_ROOT'].'/One_news/image/'.$footer_logo; 

        // @Move File Upload
        move_uploaded_file($_FILES['top_logo']['tmp_name'],$path_top_logo);
        move_uploaded_file($_FILES['footer_logo']['tmp_name'],$path_footer_logo);
        $date= date('y-m-d');
        $sql_insert = "INSERT INTO `tbl_logo`(`logo_top`, `logo_footer`, `create_date`) VALUES ('$top_logo','$footer_logo','$date')";
        $result_insert = $con->query($sql_insert);
        if($result_insert) {
          echo "
            <script>alert('Social Icon Inserted')</script>";
        }
        else{
          echo "<script>alert('Fail Upload logo')</script>";
        }
      }
      if(isset($_POST['btn_view_logo'])) {
        $sql_select     = " SELECT * FROM `tbl_logo` ";
        $result_select  = $con->query($sql_select);
        echo "
          <table class='table'>
            <tr>
              <th>ID</th>
              <th>Logo Top</th>
              <th>Logo Footer</th>
              <th>Created Date</th>
            </tr>
        ";
        while($row = mysqli_fetch_assoc($result_select)) {
          $id=$row['id'];
  ?>

          <tr>
            <td><?php echo $row['id'] ?></td>
            <td><img src="../image/<?php echo $row['logo_top'] ?>" width="50px" height="50px"></td>
            <td><img src="../image/<?php echo $row['logo_footer'] ?>" width="50px" height="50px"></td>
            <td><?php echo $row['create_date']; ?></td>
            <td>
            <input type='button' onClick='updateme(<?php echo $id ?>)' name='Update' value='Update' class='btn btn-success'>
            <input type='button' onClick='deleteme(<?php echo $id ?>)' name='delete' value='Delete' class='btn btn-danger'>
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
               window.location.href='delete_main_logo.php?del_id='+delId+'';
               return true;
           }
       }
       function updateme(upId){
        window.location.href='update_main_logo.php?up_id='+upId+'';  
       }
   </script>
<?php include('footer.php');  ?>



