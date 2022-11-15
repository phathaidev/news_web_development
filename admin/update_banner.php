<?php include('header.php');
//get id from the url  
$getId=$_GET["up_id"];
$select_banner="SELECT * FROM `tbl_banner` WHERE id='$getId'";
$select_banner_result=$con->query($select_banner);
$row_banner=mysqli_fetch_assoc($select_banner_result);
$banner_url=$row_banner["banner_url"];

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
        Banner Update
      </h1>
    </section>
    <!-- Main content -->
    <section class="container">
    <form action="" method="post" enctype="multipart/form-data">
      <h4>Banner URL</h4> <input type="text" name="url" class="form-control" value="<?php echo $banner_url; ?>">
      <h4>Banner Image</h4><label>(Recommend Icon Size 1349px * 500px)</label> <input type="file" name="banner" class="form-control"> <br>
      <input type="submit" value="Save Change" name="btn_update_banner" class="btn btn-success">
      <input type='button' onClick='back()' name='' value='Cancel' class='btn btn-primary'>
    </form>
    </section>
  <?php
       
      if(isset($_POST['btn_update_banner'])) {
        $url  = $_POST['url'];
        $banner = rand(111,999).'-'.$_FILES['banner']['name'];
        $path_image = $_SERVER['DOCUMENT_ROOT'].'/One_news/image/'.$banner; 
       
        $date= date('y-m-d');
        $sql_update = "UPDATE `tbl_banner` SET `banner_url`='$url',`banner_name`='$banner',`create_date`='$date' WHERE `id`='$getId'";
        $result_update = $con->query($sql_update);
        if($result_update) {
           // @Move File Upload
          move_uploaded_file($_FILES['banner']['tmp_name'],$path_image);
          echo "
            <script>alert('The Banner updated');
            window.location.href='banner.php';
            </script>
          ";
        }else{
          echo "
          <script>alert('The Banner couldn't update')</script>
        ";
        }

      }

      
  ?>
<script>
      
       function back(){
        window.location.href='banner.php';  
       }
   </script>
<?php include('footer.php');  ?>



