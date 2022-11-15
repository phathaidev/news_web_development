<?php include('header.php'); ?>
    <div class="content contact-us">
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
        <!-- @Section Entertainments -->
        <section>
            <div class="container-fluid">
                <div class="content-form">
                    <div class="main-title">Contact Us</div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="wrap-social">
                            <ul>
                                <li><i class="fa fa-phone"></i>&ensp; <a href="tel: 012 333 444"> 012 333 444</a></li>
                                <li><i class="fa fa-envelope"></i>&ensp; <a href="mailto: cmsadmin@gmail.com"> cmsadmin@gmail.com</a></li>
                                <li><i class="fa fa-map-marker"></i>&ensp;
                                    No.រ, Name, Cambodia Post Branch, Address. 1, Sell, Marketing Department, Corner Street 13 & 102, SangKat Wat Phnom, Khan Daun Penh, Phnom Penh.
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="form-wrap">
                            <form method="post">
                                <div class="row">
                                    <div class="col-6"><input type="text" class="box" name="username" required placeholder="Username"></div>
                                    <div class="col-6"><input type="text" class="box" name="email" required placeholder="Email"></div>
                                    <div class="col-6"><input type="text" class="box" name="phone" required placeholder="Phone"></div>
                                    <div class="col-6"><input type="text" class="box" name="address" required placeholder="Address"></div>
                                    <div class="col-12"><textarea name="message" placeholder="Your text message here"></textarea></div>
                                    <div class="col-12">
                                        <div class="btn-wrap">
                                            <input type="submit" name="btn-msg" class="btn" value="Submit Message">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php 

        if(isset($_POST['btn-msg'])) {
            $username = $_POST['username'];
            $email    = $_POST['email'];
            $phone    = $_POST['phone'];
            $address  = $_POST['address'];
            $message  = $_POST['message'];

            $sql_insert = " INSERT INTO `tbl_user_feedback`(`username`, `email`, `phone`, `address`, `message`) VALUES ('$username','$email','$phone','$address','$message') ";
            $result_insert = $con->query($sql_insert);
            if($result_insert) {
                echo '
                    <script> swal("Message sent!", "Thank you for your feedback.", "success");</script>
                ';
            }
        }

    ?>

<?php include('footer.php'); ?>