<?php include('header.php');  ?>
        <!-- @Section Main Banner -->
        <section>
            <div class="main-banner">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <img src="http://via.placeholder.com/1350x500" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- @Section Sports -->
        <section>
            <div class="container-fluid">
                <div class="content-item">
                    <div class="main-title">Sport News</div>
                    <div class="row">
                        <?php 
                            $select_sport = " SELECT * FROM `tbl_news` WHERE type='sport' ORDER by id DESC LIMIT 4 ";
                            $result_sport = $con->query($select_sport);
                            while( $row_sport = mysqli_fetch_assoc($result_sport) ){
                                $post_id   = $row_sport['id'];
                                $data_date = $row_sport['date'];
                                $date      = date("d-F-Y", strtotime($data_date));
                                echo '
                                    <div class="col-3">
                                        <div class="item shadow">
                                            <div class="thumbnail">
                                                <img src="../image/'.$row_sport['thumbnail'].'" >
                                            </div>
                                            <div class="detail">
                                                <a href="news-detail.php?post_id='.$post_id.'">
                                                    <h4 class="title">'.$row_sport['title'].'</h4>
                                                </a>
                                                <div class="description">'.$row_sport['description'].'</div>
                                                <div class="date"><i class="fa fa-calendar"></i> '.$date.'</div>
                                            </div>
                                        </div>
                                    </div>
                                ';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- @Section Entertainments -->
        <section>
            <div class="container-fluid">
                <div class="content-item">
                    <div class="main-title">Entertainments News</div>
                    <div class="row">
                        <?php 
                            $select_enter = " SELECT * FROM `tbl_news` WHERE type='entertainment' ORDER by id DESC LIMIT 4 ";
                            $result_enter = $con->query($select_enter);
                            while( $row_enter = mysqli_fetch_assoc($result_enter) ){
                                $post_id   = $row_enter['id'];
                                $data_date = $row_enter['date'];
                                $date      = date("d-F-Y", strtotime($data_date));
                                echo '
                                    <div class="col-3">
                                        <div class="item shadow">
                                            <div class="thumbnail">
                                                <img src="../image/'.$row_enter['thumbnail'].'" >
                                            </div>
                                            <div class="detail">
                                                <a href="news-detail.php?post_id='.$post_id.'">
                                                    <h4 class="title">'.$row_enter['title'].'</h4>
                                                </a>
                                                <div class="description">'.$row_enter['description'].'</div>
                                                <div class="date"><i class="fa fa-calendar"></i> '.$date.'</div>
                                            </div>
                                        </div>
                                    </div>
                                ';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>
<?php include('footer.php') ?>

