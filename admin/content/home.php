<?php 
include('header_section.php');
$query_banner ="SELECT * FROM `tbl_banner` LIMIT 1";  
    $result_banner = mysqli_query($con, $query_banner); 
   $row=mysqli_fetch_assoc($result_banner);
   $banner_img=$row["banner_name"];
        
?>
<section class="banner">
                <div class="thumbnail" data-aos="fade-out" data-aos-duration="3000">
                <img src="../../image/<?php echo $banner_img; ?>">
                </div>
            </section>
<!---------------------Socail News -->
<section class="sport" id="Socail">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="head-wrap">
                                <div class="main-title" data-aos="fade-right"  data-aos-duration="1000">
                                    <h2>Socail News</h2>
                                </div>
                                <div class="view-more" data-aos="fade-left"  data-aos-duration="1000">
                                <?php
                            $select_menu="SELECT * FROM `tbl_menu`";
                            $select_menu_qeury=$con->query($select_menu);
                          $row_menu=mysqli_fetch_assoc($select_menu_qeury);
                            $menu_name=$row_menu["menu_name"];
                            $menu_url=$row_menu["menu_url"];
                        ?>
                                    <button class="btn btn-default btn_socail" onclick="toSocial_page()">View More</button>
                                </div>
                            </div>   
                        </div>
                    </div>  
                    <div class="row">
                    <?php
                        $news="SELECT * FROM `tbl_news_post` WHERE news_type='Social' ORDER BY news_id DESC LIMIT 4";
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
<!---------------------Technology News -->
<section class="sport" id="Technology">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="head-wrap">
                                <div class="main-title" data-aos="fade-right"  data-aos-duration="1000">
                                    <h2>Technology News</h2>
                                </div>
                                <div class="view-more" data-aos="fade-left"  data-aos-duration="1000">
                                    <button class="btn btn-default btn_socail" onclick="toTechnology_page()">View More</button>
                                </div>
                            </div>   
                        </div>
                    </div>  
                    <div class="row">
                    <?php
                        $news="SELECT * FROM `tbl_news_post` WHERE news_type='Technology' ORDER BY news_id DESC LIMIT 4";
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
<!---------------------Entertainment News -->
<section class="sport" id="Entertainment">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="head-wrap">
                                <div class="main-title" data-aos="fade-right"  data-aos-duration="1000">
                                    <h2>Entertainment News</h2>
                                </div>
                                <div class="view-more" data-aos="fade-left"  data-aos-duration="1000">
                                    <button class="btn btn-default btn_socail" onclick="toEntertainment_page()"> View More</button>
                                </div>
                            </div>   
                        </div>
                    </div>  
                    <div class="row">
                    <?php
                        $news="SELECT * FROM `tbl_news_post` WHERE news_type='Entertainment' ORDER BY news_id DESC LIMIT 4";
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
<!---------------------Sport News -->
<section class="sport" id="Sport">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="head-wrap">
                                <div class="main-title" data-aos="fade-right"  data-aos-duration="1000">
                                    <h2>Sport News</h2>
                                </div>
                                <div class="view-more" data-aos="fade-left"  data-aos-duration="1000">
                                    <button class="btn btn-default btn_socail" onclick="toSport_page()"> View More</button>
                                </div>
                            </div>   
                        </div>
                    </div>  
                    <div class="row">
                    <?php
                        $news="SELECT * FROM `tbl_news_post` WHERE news_type='Sport' ORDER BY news_id DESC LIMIT 4";
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

<script>
 function toSocial_page(){
         window.location.href='moreNew.php?type=Social';  
}
function toTechnology_page(){
         window.location.href='moreNew.php?type=Technology';  
}
function toEntertainment_page(){
         window.location.href='moreNew.php?type=Entertainment';  
}
function toSport_page(){
         window.location.href='moreNew.php?type=Sport';  
}

</script>
<?php include('footer_section.php')?>
                    