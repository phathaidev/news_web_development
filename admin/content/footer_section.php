<div class="footer-wrap" >
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="banner">
                                    <div class="thumbnail">
                                    <?php
                                        $query_Logo ="SELECT * FROM tbl_logo";  
                                        $result_logo = mysqli_query($con, $query_Logo); 
                                        $row=mysqli_fetch_assoc($result_logo);
                                        $logo_footer=$row["logo_footer"];
                                    ?>
                                        <a href="home.php"><img src="../../image/<?php echo $logo_footer; ?>"></a>
                                         </div>
                                </div>
                            </div>
                        <div class="col-md-3">
                            <div class="quicklink">
                                <h4 class="title">Quick Link</h4>
                                <ul class="menu">
                                    <li class="menu-item"><a href="home.php"><i class="fa fa-home"></i>&ensp;Home</a></li>
                                    <?php
                                    $select_menu="SELECT * FROM `tbl_menu`";
                                    $select_menu_qeury=$con->query($select_menu);
                                    while($row_menu=mysqli_fetch_assoc($select_menu_qeury)){
                                    $menu_name=$row_menu["menu_name"];
                                    $menu_url=$row_menu["menu_url"];
                                    echo '
                                    <li><a href="'.$menu_url.'"><i class="fas fa-hand-point-right"></i>&ensp;'.$menu_name.'</a></li>
                                    
                                    ';
                           }
                            
                        
                        ?> </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="contact">
                                <h4 class="title">Contact Us</h4>
                                <div class="social-icon">
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
                        </div>
                        <div class="col-md-3">
                            <div class="address">
                                <h4 class="title">Address</h4>
                                <p class="description">
                                    No.44Eo, Street 67, Phsar Thmey 2, Daun Penh, Phnom Penh, Cambodia.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
</body>
<!-- @Aos Animation -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    AOS.init();
        AOS.init();
    $(document).ready(function(){
        $('.item_hide').hide();
        $('.menu-content').hide();
        $('.btn_socail_mobile_less').hide();
       $('.btn_Technology_mobile_less').hide();
       $('.btn_entertaiment_mobile_less').hide();
        $('.option-drop-menu').click(function(){
            $('.menu-content').slideToggle('4000');
        });
        $('.btn_socail').click(function(){
            $('.item_hide_socail').slideToggle('4000');
        })
        $('.btn_Technology').click(function(){
            $('.item_hide_technology').slideToggle("4000");
            
        });
        $('.btn_entertaiment').click(function(){
            $('.item_hide_entertaiment').slideToggle("4000");
            
        });
        //
        $('.btn_socail_mobile_more').click(function(){
            $('.btn_socail_mobile_more').hide();
            $('.btn_socail_mobile_less').show();
        });
        $('.btn_socail_mobile_less').click(function(){
            $('.item_hide_socail').hide();
            $('.btn_socail_mobile_more').show();
            $('.btn_socail_mobile_less').hide();
        });

        //
        $('.btn_Technology_mobile_more').click(function(){
            $('.btn_Technology_mobile_more').hide();
            $('.btn_Technology_mobile_less').show();
        });
        $('.btn_Technology_mobile_less').click(function(){
            $('.btn_Technology_mobile_more').show();
            $('.btn_Technology_mobile_less').hide();
            $('.item_hide_technology').hide('4000');
        });
        //
        $('.btn_entertaiment_mobile_more').click(function(){
            $('.btn_entertaiment_mobile_more').hide();
            $('.btn_entertaiment_mobile_less').show();
        });
        $('.btn_entertaiment_mobile_less').click(function(){
            $('.btn_entertaiment_mobile_more').show();
            $('.btn_entertaiment_mobile_less').hide();
            $('.item_hide_entertaiment').hide('4000');
        });
         
    });
    //Scrolling navbar top effect
    window.onscroll=function(){
		var header_top=document.querySelector(".header_top");
		var header_bottom=document.querySelector(".header_bottom");
            if(window.pageYOffset>header_top.offsetHeight){
                header_bottom.style.width="100%";
                header_bottom.style.overFlow="hiden"
                header_bottom.style.position='fixed';
                header_bottom.style.top=0;
                header_bottom.marginBottom=header_bottom.offsetWeight + "px";

            }
            else{
                header_bottom.style.position='';
                header_bottom.style.top='';
                header_bottom.marginBottom="";
            }
        }
</script>
</html>