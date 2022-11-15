<?php
    include("header_section.php");
    include("dbConnect.php");
    $getType=$_GET["type"];
    
    $query_banner ="SELECT * FROM `tbl_banner` LIMIT 1";  
    $result_banner = mysqli_query($con, $query_banner); 
    $row=mysqli_fetch_assoc($result_banner);
    $banner_img=$row["banner_name"];

    
?>
<style>
.col-3{
    margin-bottom:40px;
}
</style>
<section class="banner">
                <div class="thumbnail" data-aos="fade-out" data-aos-duration="3000">
                <img src="../../image/<?php echo $banner_img; ?>">
                </div>
</section>

<section class="sport">
                <div class="container">
                    <div class="title_section">
                  
                        <h1><?php  echo $getType; ?> News</h1>
                    </div>
                    <div class="row">
                    <?php
                          $news="SELECT * FROM `tbl_news_post` WHERE news_type='$getType' ORDER BY news_id DESC";
                          $query_news=$con->query($news);
                            while($row_news=mysqli_fetch_assoc($query_news)){ 
                            $news_id=$row_news["news_id"];
                            $news_Title=$row_news["news_Title"];
                            $news_description=$row_news["news_description"];
                            $news_big_cover=$row_news["news_big_cover"];
                            $news_small_cover=$row_news["news_small_cover"];
                            $news_date=$row_news["news_date"];
                            $date_format=date("d-F-Y",strtotime($news_date));
                            $news_writer=$row_news["news_writer"];
                            echo '
                            <div class="col-3">
                            <div class="item shadow" data-aos="fade-up"  data-aos-duration="1300">
                                <div class="thumbnail">
                                <img src="../../image/'.$news_small_cover.'">
                                </div>
                                <div class="detail">
                                    <h4 class="title"><a href="news_item.php?id='.$news_id.'">'.$news_Title.'</a></h4>
                                    <div class="description">
                                    '.$news_description.'
                                        </div>
                                    <div class="date"><i style="color:red; font-size:12px;">'.$date_format.'</i></div>
                                </div>
                            </div>
                        </div>';}?> 
                    </div>
                </div>
</section>


<?php
    include("footer_section.php");

?>