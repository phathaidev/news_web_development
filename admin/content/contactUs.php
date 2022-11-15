<?php include("header_section.php") ?>
<!DOCTYPE html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<html lang="en">
<head>
    <title>Contact Us</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="theme.css">
    <!--Link for boostrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--Link for font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
    <!--AOS Animation-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!--Link for Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Links to css file-->
    <link rel="stylesheet" href="stylesheet/theme.css">
    <!--Links fancy box-->
    <title>Fancy-Box</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <!--Links for jquery validation form-->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <!--Link to css file-->
    <link rel="stylesheet" href="stylesheet/contactUs.css">
</head>

<body>
    
    <!--Contact Section-->
    <section class="contact_form">
        <div class="container">
            <div class="head-wrap">
                <div class="main-title"  data-aos="fade-down"  data-aos-duration="1000">
                    <h2>Contact Us</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5" data-aos="fade-right"  data-aos-duration="1000" >
                    <div class="head-wrap">
                        <div class="main-title">
                            <h4>Get in touch</h4>
                        </div>
                    </div>
                    <div class="description">
                        You don’t download. You’re supposed to copy the HTML code above into your own web page document and also create links to the resources as listed under the ‘Resources’ tab. 
                    </div>
                    <div class="item">
                        <img src="https://img.icons8.com/ios-glyphs/20/000000/bookmark-ribbon.png"/>  &nbsp; Phnom Penh <br>
                        <img src="https://img.icons8.com/ios-glyphs/20/000000/bookmark-ribbon.png"/>  &nbsp;  Preh Sihanuok<br>
                        <img src="https://img.icons8.com/ios-glyphs/20/000000/bookmark-ribbon.png"/>  &nbsp; Seam Reap <br>
                        <img src="https://img.icons8.com/ios-glyphs/20/000000/bookmark-ribbon.png"/>  &nbsp; Kompot
                    </div>
                </div>
                <div class="col-md-7 contact_form" data-aos="fade-left" data-aos-duration="1000" >
                    <div class="head-wrap">
                        <div class="main-title">
                            <h4>contact form</h4>
                        </div>
                    </div>
                    <div class="description">
                        You don’t download. You’re supposed to copy the HTML code above into your own web page document. You’re supposed to copy the HTML code above into.You’re supposed to copy the HTML code above into your own web page document.
                    </div>
                    <form class="form-input" id="form_input" method="post">
                        <div class="form-1 row">
                           
                           
                            <input class="col-md-12" type="text" name="name" placeholder="User name" data-aos="fade-left" data-aos-duration="1300"> 

                           
                        </div> 
                      
                    <div class="form-2 row">
                    
                  
                    <input class="col-12" type="text" name="email" placeholder="Email address" data-aos="fade-left" data-aos-duration="1300">
                  
                    </div>

                    <textarea name="message" id="" cols="73" rows="8" data-aos="fade-up" data-aos-duration="1300" placeholder="Messages"></textarea>
                        <input type="submit" class="btn btn-primary" name="btn_send" value="Send"></input>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
<?php 
if(isset($_POST["btn_send"])){
    include("dbConnect.php");
    $user_name=$_POST["name"];
    $email=$_POST["email"];
    $message=$_POST["message"];
    $date           = date("y-m-d");
    $time =date("h:i:sa");   
    $send_message="INSERT INTO `tbl_feedback`(`name`, `email`, `message`, `date`, `time`) VALUES ('$user_name','$email','$message','$date','$time')";
    $send_message_query=$con->query($send_message);
    if($send_message_query){
        echo '<script>
        swal({
            title: "Done!",
            text: "Thanks for for feedback!",
            icon: "success",
            button: "OK",
          });
        </script>';
    }
    else{
        echo "Not send";
    }

}
 
 


?>





<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
    AOS.init();

    $("#form_input").validate({
  rules: {
    
    name: "required",
    phone: "required",
    email: {
      required: true,
      email: true
    }
  },
  messages: {
    subject: "Please specify your subject.",
    name: "Please specify your name.",
    phone: "Please specify your phone.",
    email: {
      required: "We need your email address to contact you",
      email: "Your email address must be in the format of name@domain.com"
    }
  }
});
  </script>
</html>
<?php include("footer_section.php"); ?>