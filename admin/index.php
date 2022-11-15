<?php include('header.php');  ?>
    <!-- Content Header (Page header) -->
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
    </style>
    <section class="content-header">
      <h1>
        Social Icon
      </h1>
    </section>
    <!-- Main content -->
    <section class="container">
    <form action="" method="post" enctype="multipart/form-data">
      <h4>Social Icon Name</h4> <input type="text" name="icon_name" class="form-control">
      <h4>Social URL</h4> <input type="text" name="url" class="form-control">
      <h4>Social Icon</h4>(Recommend Icon Size 40px * 40px) <input type="file" name="icon" class="form-control"> <br>
      <input type="submit" value="Insert Icon" name="btn_submit_icon" class="btn btn-primary">
      <input type="submit" value="View Icon" name="btn_view_icon" class="btn btn-info">
    </form>
    </section>
  <?php
       
      if(isset($_POST['btn_submit_icon'])) {
        $name=$_POST["icon_name"];
        $url  = $_POST['url'];
        $icon = rand(111,999).'-'.$_FILES['icon']['name'];
        $path_image = $_SERVER['DOCUMENT_ROOT'].'/One_news/image/'.$icon; 
        // @Move File Upload
        move_uploaded_file($_FILES['icon']['tmp_name'],$path_image);
        $date= date('y-m-d');
        $sql_insert = " INSERT INTO `tbl_social_icon`(`icon_name`, `icon_url`, `icon_image`, `create_date`)VALUES ('$name','$url','$icon','$date')";
        $result_insert = $con->query($sql_insert);
        if($result_insert) {
          echo "
            <script>alert('Social Icon Inserted')</script>
          ";
        }

      }

      if(isset($_POST['btn_view_icon'])) {
        $sql_select     = " SELECT * FROM `tbl_social_icon` ";
        $result_select  = $con->query($sql_select);
        echo "
          <table class='table'>
            <tr>
              <th>Icon Name</th>
              <th>URL Icon</th>
              <th>Image Name</th>
              <th>Created Date</th>
            </tr>
        ";
        while($row = mysqli_fetch_assoc($result_select)) {
          $id=$row["id"];
  ?>

          <tr>
          <td><?php echo $row['icon_name'] ?></td>
            <td><?php echo $row['icon_url'] ?></td>
            <td><img src="../image/<?php echo $row['icon_image'] ?>" width="30px" height="30px"></td>
            <td><?php echo $row['create_date'] ?></td>
            <td><input type='button' onClick='updateme(<?php echo $id ?>)' name='Update' value='Update' class='btn btn-success'>
                    <input type='button' onClick='deleteme(<?php echo $id ?>)' name='delete' value='Delete' class='btn btn-danger'></td>
                    
          </tr>
  <?php
        }
      echo "</table>";
      }
  ?>

<script>
       function deleteme(delId){
           if(confirm("Are you sure to delete this?")){
               window.location.href='delete_social_icon.php?del_id='+delId+'';
               return true;
           }
       }
       function updateme(upId){
        window.location.href='update_social_icon.php?up_id='+upId+'';  
       }
       

   </script>
<?php include('footer.php');  ?>



