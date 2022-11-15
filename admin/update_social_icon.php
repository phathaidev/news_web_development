<?php include('header.php');  
    //get id from the url
    $getId=$_GET["up_id"];
    //select statement from table social icon
    $selet_icon="SELECT * FROM `tbl_social_icon`";
    //execute the statement
    $selet_icon_query=$con->query($selet_icon);
    $row_icon=mysqli_fetch_assoc($selet_icon_query);
    $id=$row_icon["id"];
    $icon_name=$row_icon["icon_name"];
    $icon_url=$row_icon["icon_url"];
?>

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
       Update Social Icon
      </h1>
    </section>
    <!-- Main content -->
    <section class="container">
    <form action="" method="post" enctype="multipart/form-data">
      <h4>Social Icon Name</h4> <input type="text" name="icon_name" class="form-control" value="<?php echo $icon_name; ?>" required>
      <h4>Social URL</h4> <input type="text" name="url" class="form-control" value="<?php echo $icon_url; ?>" required>
      <h4>Social Icon</h4>(Recommend Icon Size 40px * 40px) <input type="file" name="icon" class="form-control" required> <br>
      <input type="submit" value="Save Change" name="btn_update_icon" class="btn btn-primary">
      
    </form>
    </section>
  <?php
       
      if(isset($_POST['btn_update_icon'])) {
        $name=$_POST["icon_name"];
        $url  = $_POST['url'];
        $icon = rand(111,999).'-'.$_FILES['icon']['name'];
        $path_image = $_SERVER['DOCUMENT_ROOT'].'/One_news/image/'.$icon; 
        
        $date= date('y-m-d');
        $sql_update = " UPDATE `tbl_social_icon` SET `icon_name`='$name',`icon_url`='$url',`icon_image`='$icon',`create_date`='$date' WHERE id=$getId";
        $result_update = $con->query($sql_update);
        if($result_update) {
          // @Move File Upload
          move_uploaded_file($_FILES['icon']['tmp_name'],$path_image);
          echo "
            <script>alert('Social Icon Updated!');
            window.location.href='index.php';
            </script>
            
          ";
        }
        
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
        window.location.href='index.php?up_id='+upId+'';
        
       }
       

   </script>
<?php include('footer.php');  ?>



