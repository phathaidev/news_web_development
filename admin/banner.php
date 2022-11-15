<?php include('header.php');  ?>
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <h1>
        Banner
      </h1>
    </section>
    <!-- Main content -->
    <section class="container">
    <form action="" method="post" enctype="multipart/form-data">
      <h4>Banner URL</h4> <input type="text" name="url" class="form-control">
      <h4>Banner Image</h4><label>(Recommend Icon Size 1349px * 500px)</label> <input type="file" name="banner" class="form-control"> <br>
      <input type="submit" value="Insert Icon" name="btn_submit_banner" class="btn btn-primary">
      <input type="submit" value="View Icon" name="btn_view_banner" class="btn btn-info">
    </form>
    </section>
  <?php
       
      if(isset($_POST['btn_submit_banner'])) {

        $url  = $_POST['url'];
        $banner = rand(111,999).'-'.$_FILES['banner']['name'];
        $path_image = $_SERVER['DOCUMENT_ROOT'].'/One_news/image/'.$banner; 
        // @Move File Upload
        move_uploaded_file($_FILES['banner']['tmp_name'],$path_image);
        $date= date('y-m-d');
        $sql_insert = "INSERT INTO `tbl_banner`(`banner_url`, `banner_name`, `create_date`,)
         VALUES ('$url','$banner','$date')";
        $result_insert = $con->query($sql_insert);
        if($result_insert) {
          echo "
            <script>alert('One Banner Inserted')</script>
          ";
        }
        else{
          echo "
            <script>alert('Fail Inserted')</script>
          ";
        }

      }

      if(isset($_POST['btn_view_banner'])) {
        $sql_select     = " SELECT * FROM `tbl_banner` ";
        $result_select  = $con->query($sql_select);
        echo "
          <table class='table'>
            <tr>
              <th>ID</th>
              <th>Url</th>
              <th>Banner Image</th>
              <th>Created Date</th>
            </tr>
        ";
        while($row = mysqli_fetch_assoc($result_select)) {
          $id=$row['id'];
  ?>

          <tr>
          <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['banner_url'] ?></td>
            <td><img src="../image/<?php echo $row['banner_name'] ?>" width="50px" height="50px"></td>
            <td><?php echo $row['create_date'] ?></th>
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
               window.location.href='delete_banner.php?del_id='+delId+'';
               return true;
           }
       }
       function updateme(upId){
        window.location.href='update_banner.php?up_id='+upId+'';  
       }
   </script>
<?php include('footer.php');  ?>



