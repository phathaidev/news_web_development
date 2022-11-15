<?php 
        include("header_section.php");
        include("dbConnect.php");
        $getId=$_GET["id"];
        $query_newsItem ="SELECT * FROM `tbl_news_post` WHERE news_id=$getId";  
        $result_newsItem = mysqli_query($con, $query_newsItem); 
        $row_newsItem=mysqli_fetch_assoc($result_newsItem);
        $news_id=$row_newsItem["news_id"];
        $news_Title=$row_newsItem["news_Title"];
        $news_description=$row_newsItem["news_description"];
        $news_big_cover=$row_newsItem["news_big_cover"];
        $news_small_cover=$row_newsItem["news_small_cover"];
        $news_date=$row_newsItem["news_date"];
        $news_type=$row_newsItem["news_type"];
        $date_format=date("d-F-Y",strtotime($news_date));
        $news_writer=$row_newsItem["news_writer"];

?>
<section>
<div class="container">
    <div class="row">
        <div class="new_content col-md-8">
            <div class="cover">
                <?php  echo '<img src="../../image/'.$news_big_cover.'">'; ?>
            </div>
            <div class="title">
                <?php echo '<h2>'.$news_Title.'</h2>'; ?>
            </div>
            <div class="date">
                <?php echo '<p>'.$date_format.'</p>'; ?>   
            </div>
                <hr>
            <div class="description">
                <?php echo '<p>'.$news_description.'</p>'; ?>
            </div>
        </div>
        <div class="relate_news col-md-4">
            <?php 
                        $news="SELECT * FROM `tbl_news_post` WHERE news_type='$news_type' AND NOT `news_id`='$getId' ORDER BY news_id DESC LIMIT 6";
                        $query_news=$con->query($news);
                        while($row_news=mysqli_fetch_assoc($query_news)){
                            $news_id=$row_news["news_id"];
                            $news_Title=$row_news["news_Title"];
                            $news_big_cover=$row_news["news_big_cover"];
                         
                            echo '  
        
                <div class="short_relate">
                    <div class="item">
                        <div class="cover">
                            <img src="../../image/'.$news_big_cover.'">
                        </div>
                        <div class="title">
                            <p><a href="news_item.php?id='.$news_id.'">'.$news_Title.'</a></p>
                        </div>
                    </div>
                            <hr>
                </div>

                '; 
            }
        ?>            
        </div>
          
    </div>
</div>

</section>



















<?php include("footer_section.php"); ?>