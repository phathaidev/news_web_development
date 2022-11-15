<?php include('header.php') ?>
    <section>
        <div class="news-detail-content">
            <div class="container">
                <div class="row">
                    <?php 
                        $post_id      = $_GET['post_id'];
                        $select_sport = " SELECT * FROM `tbl_news` WHERE id = '$post_id'";
                        $result_sport = $con->query($select_sport);
                        $row_sport = mysqli_fetch_assoc($result_sport);
                        $data_date = $row_sport['date'];
                        $date      = date("d-F-Y", strtotime($data_date));
                        echo '
                            <div class="col-8">
                                <div class="content-detail">
                                    <div class="thumbnail">
                                        <img src="../image/'.$row_sport['image'].'">
                                    </div>
                                    <div class="detail">
                                        <h2 class="title">'.$row_sport['title'].'</h2>
                                        <div class="date"><i class="fa fa-calendar"></i>&nbsp;'.$date.'</div>
                                        <div class="border"></div>
                                        <div class="description">'.$row_sport['description'].'</div>
                                    </div>
                                </div>
                            </div>
                        ';

                    ?>
                    
                    <div class="col-4">
                        <div class="content-latest">
                        <?php 
                            $select_sport = " SELECT * FROM `tbl_news` WHERE type='sport' NOT IN(id = '$post_id') ORDER by id DESC LIMIT 5  ";
                            $result_sport = $con->query($select_sport);
                            while( $row_sport = mysqli_fetch_assoc($result_sport) ){
                                $post_latest_id   = $row_sport['id'];
                                echo '
                                    <div class="item">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="thumbnail">
                                                    <img src="../image/'.$row_sport['thumbnail'].'">
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="detail">
                                                    <h4 class="title"><a href="news-detail.php?post_id='.$post_latest_id.'">'.$row_sport['title'].'</a></h4>
                                                    <div class="description">'.$row_sport['description'].'</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                ';
                             } 
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include('footer.php') ?>