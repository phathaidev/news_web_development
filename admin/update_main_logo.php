<?php include('header.php');  
   //get id from the url
   $getId=$_GET["up_id"];

   
   
?>
    <!-- Content Header (Page header) -->
  
    <section class="content-header">
      <h1>
        Main Logo Update
      </h1>
    </section>
    <!-- Main content -->
    <section class="container">
    <form action="" method="post" enctype="multipart/form-data">
      <h4>Top Logo Image</h4><label>(Recommend Icon Size 250px * 100px)</label><input type="file" name="top_logo" class="form-control" required> <br>
      <h4>Footer Logo Image</h4><label>(Recommend Icon Size 345px * 250px)</label> <input type="file" name="footer_logo" class="form-control" required> <br>
      <input type="submit" value="Save Change" name="btn_update_logo" class="btn btn-success">
      <input type='button' onClick='back()' name='' value='Cancel' class='btn btn-primary'>
    </form>
    </section>
  <?php
       
      if(isset($_POST['btn_update_logo'])) {
        $top_logo = rand(111,999).'-'.$_FILES['top_logo']['name'];
        $footer_logo= rand(111,999).'-'.$_FILES['footer_logo']['name'];
        $path_top_logo = $_SERVER['DOCUMENT_ROOT'].'/One_news/image/'.$top_logo;
        $path_footer_logo = $_SERVER['DOCUMENT_ROOT'].'/One_news/image/'.$footer_logo; 

        // @Move File Upload
        
        $date= date('y-m-d');
        $sql_update = "UPDATE `tbl_logo` SET `logo_top`='$top_logo',`logo_footer`='$footer_logo',`create_date`='$date' WHERE id='$getId'";
        $result_update = $con->query($sql_update);
        if($result_update) {
        move_uploaded_file($_FILES['top_logo']['tmp_name'],$path_top_logo);
        move_uploaded_file($_FILES['footer_logo']['tmp_name'],$path_footer_logo);
          echo "
            <script>alert('Social Icon Updated')</script>
          ";
        }
        else{
          echo "<script>alert('Fail update logo')</script>";
        }

      }
  ?>
<script>
      
       function back(){
        window.location.href='main_logo.php';  
       }
   </script>
<?php include('footer.php');  ?>



