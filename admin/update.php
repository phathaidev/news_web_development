<?php
    include("header.php");
    include("dbConnect.php");
    $get_id=$_GET["up_id"];
    $query_select ="SELECT * FROM tbl_news_post WHERE `news_id`=$get_id";  
    $result_select = mysqli_query($con, $query_select); 
    $row=mysqli_fetch_assoc($result_select);
    $tTitle=$row["news_Title"];
    $tdescript=$row["news_description"];
    $type=$row["news_type"];
    $news_writer=$row["news_writer"];
  

?>
<style>
input[type="file"],input[type="text"],.selection{
      width:600px;
    }
    .description{
      width:1100px;
      margin-bottom:15px;
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
    h5{
      font-size=10px;
    }
    </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update News Posted
      </h1>
    </section>
    <!-- Main content -->
    <section class="container" style="padding-bottom: 1rem;">
    <form action="" method="post" enctype="multipart/form-data">
        <h5>Title</h5> <input type="text" name="title" class="form-control" value="<?php echo $tTitle; ?>">
        <h5>Thumbnail (Recommend Icon Size 275px * 275px)</h5> <input type="file" name="small_cover" class="form-control" value="abc">
        <h5>Image (Recommend Icon Size 730px * 400px)</h5> <input type="file" name="big_cover" class="form-control">
        <?php 
          if($type=="Sport"){
            $Sport="selected";
          }
          else if($type=="Social"){
            $Social="selected";
          }
          else if($type=="Entertainment"){
            $Entertainment="selected";
          }
          else if($type=="Technology"){
            $Technology="selected";
          }

          else{
            $Sport="";
            $Social="";
            $Entertainment="";
            $Technology="";
          }

        ?>
        <h5>News Type</h5> <select name="type" class="form-control selection">
            <option value="Sport" <?php echo $Sport?>>Sport</option>
            <option value="Social" <?php echo $Social?>>Social</option>
            <option value="Technology" <?php echo $Technology?>>Technology</option>
            <option value="Entertainment" <?php echo $Entertainment?>>Entertainments</option>
           
            </select>
        
        <h5>Description</h5> <textarea name="description" cols="30" rows="10" class="form-control description"><?php echo $tdescript; ?></textarea>
        <input type="submit" value=" Save Change" name="btn_update_news" class="btn btn-success">
        <input type='button' onClick='back()' name='' value='Cancel' class='btn btn-primary'>
        </form>
        
        <?php
    if(isset($_POST['btn_update_news'])) {

    $title          = $_POST['title'];
    $date           = date("y-m-d");
    $type           = $_POST['type'];
    $writer         = $_POST["writer"];
    $description    = $_POST['description'];

    // @Move Thumbnail
    $small_cover = rand(111,999).$_FILES['small_cover']['name'];
    $path_image_s = $_SERVER['DOCUMENT_ROOT'].'/One_news/image/'.$small_cover; 
    

    // @Move Image
    $big_cover = rand(111,999).$_FILES['big_cover']['name'];
    $path_image_b = $_SERVER['DOCUMENT_ROOT'].'/One_news/image/'.$big_cover; 
  
  
    // $sql_insert = "INSERT INTO `tbl_logo`(`logo_top`, `logo_footer`, `create_date`) VALUES ('dsfsdf','sdfa',2020-10-22)";
    $sql_insert=" UPDATE `tbl_news_post` SET `news_Title`='$title',
    `news_description`='$description',`news_big_cover`='$big_cover',`news_small_cover`='$small_cover',
    `news_date`='$date',`news_type`='$type',`news_writer`='$writer' WHERE `news_id`='$get_id' ";
    
    $result_insert = $con->query($sql_insert);
    if($result_insert) {
      move_uploaded_file($_FILES['small_cover']['tmp_name'],$path_image_s);
      move_uploaded_file($_FILES['big_cover']['tmp_name'],$path_image_b);
      echo "
        <script>alert('Content News has updated .');
        window.location.href='news.php'; </script>
      ";
    }
    else echo "<script>alert('Fail to update News posted .')</script>";
  }  
?>
        <script>
       function back(){
        window.location.href='news.php';  
       }
   </script>
   <?php include('footer.php');  ?>