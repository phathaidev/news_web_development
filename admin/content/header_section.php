<html>
    <head>
        <title>Hot News</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Battambang&display=swap" rel="stylesheet">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="stylesheet/theme.css">
        <link rel="stylesheet" href="stylesheet/home.css">
        <link rel="stylesheet" href="stylesheet/news_content.css">
    
        <!-- @Aos Animation -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <!-- @font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
    </head>
    <body>
        <div class="content home">
            <!-- @Header Top -->
            <div class="header_top">
                <div class="container">
                    <ul>
                    <?php
                       include("dbConnect.php");
                        $query ="SELECT * FROM `tbl_social_icon`";  
                        $result = mysqli_query($con, $query); 
                        while($row=mysqli_fetch_assoc($result)){
                            $url=$row["icon_url"];
                            $icon_name=$row["icon_name"];
                            $icon_image=$row["icon_image"];
                    
                    ?>
                        <li><a href="<?php echo $url; ?>"><img src="../../image/<?php echo $icon_image; ?>"></a></li>
                       <?php
                        }
                       ?>
                    </ul>
                </div>
            </div>
            <!-- @Header Bottom -->
            <div class="header_bottom">
                <div class="container">
                    <div class="logo">
                    <?php
                    $query_Logo ="SELECT * FROM tbl_logo";  
                    $result_logo = mysqli_query($con, $query_Logo); 
                    $row=mysqli_fetch_assoc($result_logo);
                   $logo_top=$row["logo_top"];
                    ?>
                       <img src="../../image/<?php echo $logo_top; ?>">
                    </div>
                    <ul>
                        <li ><a href="home.php" class="active" >Home</a></li>
                        <?php
                            $select_menu="SELECT * FROM `tbl_menu`";
                            $select_menu_qeury=$con->query($select_menu);
                           while($row_menu=mysqli_fetch_assoc($select_menu_qeury)){
                            $menu_name=$row_menu["menu_name"];
                            $menu_url=$row_menu["menu_url"];
                            echo '
                            <li><a href="'.$menu_url.'">'.$menu_name.'</a></li>
                            
                            ';
                           }
                            
                        
                        ?>
                        
                       
                    </ul>
                </div>
            </div>
         <!--/@Banner -->
         