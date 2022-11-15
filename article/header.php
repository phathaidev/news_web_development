<html>
    <head>
        <title>Template</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- @Google Font Pop-Pin -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <!-- @Google font Katumruy -->
        <link href="https://fonts.googleapis.com/css2?family=Kantumruy&family=Poppins&display=swap" rel="stylesheet">
        <!-- @Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
        <!-- @Sweet Alert -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- Style CSS -->
        <link rel="stylesheet" href="../style/theme.css">
        <link rel="stylesheet" href="../style/news-detail.css">
        <link rel="stylesheet" href="../style/contact-us.css">
    </head>
    <body>
        <header>
            <div class="header-top">
                <div class="container">
                    <?php 
                        $con            = new mysqli('','root','','db_cms');
                        $sql_select     = " SELECT * FROM `tbl_social` ";
                        $result_select  = $con->query($sql_select);
                        while($row = mysqli_fetch_assoc($result_select)) {
                    ?>

                        <a href="<?php echo $row['social_link'] ?>">
                            <img src="../image/<?php echo $row['thumbnail'] ?>">
                        </a>

                    <?php 
                        }       
                    ?>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    <div class="logo">
                        <img src="http://via.placeholder.com/250x90" alt="">
                    </div>
                    <ul class="menu">
                        <li><a href="<?php $_SERVER['HTTP_HOST']; ?>/cms/article/index.php">Home</a></li>
                        <li><a href="<?php $_SERVER['HTTP_HOST']; ?>/cms/article/contact-us.php">Contact-Us</a></li>
                        <li><a href="<?php $_SERVER['HTTP_HOST']; ?>/cms/article/sport-news.php">Sports</a></li>
                        <li><a href="<?php $_SERVER['HTTP_HOST']; ?>/cms/article/entertainment-news.php">Entertainment</a></li>
                        <li><a href="<?php $_SERVER['HTTP_HOST']; ?>/cms/article/social-news.php">Social</a></li>
                    </ul>
                </div>
            </div>
        </header>