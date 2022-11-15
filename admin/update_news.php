<?php include('header.php');  ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        News Post
      </h1>
    </section>
    <!-- Main content -->
    <section class="container" style="padding-bottom: 1rem;">
    <form action="" method="post" enctype="multipart/form-data">
        <h4>Title</h4> <input type="text" name="title" class="form-control">
        <h4>Thumbnail (Recommend Icon Size 275px * 275px)</h4> <input type="file" name="small_cover" class="form-control">
        <h4>Image (Recommend Icon Size 730px * 400px)</h4> <input type="file" name="big_cover" class="form-control">
        <h4>News Type</h4> <select name="type" class="form-control selection">
            <option value="Social">Social</option>
            <option value="Technology">Technology</option>
            <option value="Sport">Sport</option>
            <option value="Entertainment">Entertainment</option>
            </select>
        <h4>News Writer</h4> 
        <?php
            $selectwriter ="SELECT * FROM `tbl_admin`";
            $result_selectwriter=$con->query($selectwriter);
        ?>
         <!-- </select> -->
         <select name="writer" id="" class="form-control selection">
         <?php while($row_news= mysqli_fetch_assoc($result_selectwriter)):; ?>
          <option value="<?php echo $row_news["admin_name"]; ?>"><?php echo $row_news["admin_name"]; ?></option>
          <?php endwhile; ?>
         </select>
        <h4>Description</h4> <textarea name="description" cols="30" rows="10" class="form-control description"></textarea>
        <input type="submit" value="Post News" name="btn_post_news" class="btn btn-primary"  style="padding-bottom: 1rem;">
        <a name="btn_view_table" class="btn btn-success"  style="padding-bottom: 1rem; width:100px" href="dataTable.php">View</a>
    </form>

  <?php

      if(isset($_POST['btn_post_news'])) {

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
        $sql_insert="INSERT INTO `tbl_news_post` (`news_id`, `news_Title`, `news_description`, `news_big_cover`, `news_small_cover`, `news_date`, `news_type`, `news_writer`) VALUES
         (NULL, '$title', '$description', '$big_cover', '$small_cover', '$date', '$type', '$writer')";
        // "INSERT INTO `tbl_news`(`news_Title`, `news_description`, `news_big_cover`, `news_small_cover`, `news_date`, `news_type`, `news_writer`) 
        //                 -- VALUES ('$title','$description','$big_cover','$small_cover','$date','$type','$writer;')
        //                 VALUES('hdfa','sdfsd','sdfas','dsfasdf','2020-05-10','sdf','sdfadfasd')";
        
        $result_insert = $con->query($sql_insert);
        if($result_insert) {
          move_uploaded_file($_FILES['small_cover']['tmp_name'],$path_image_s);
          move_uploaded_file($_FILES['big_cover']['tmp_name'],$path_image_b);
          echo "

            <script>alert('Content News have posted .')</script>
          ";
        }
        else echo "<script>alert('Fail to post News .')</script>";
        

      }  
  ?>

<?php include('footer.php');  ?>


