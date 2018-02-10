<?php
// Check if the user come from POST Request
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $user_name = filter_var( $_POST['user'] , FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['Email'] , FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['Phone'] ,FILTER_SANITIZE_NUMBER_INT );
    $message = filter_var($_POST['message'] ,FILTER_SANITIZE_STRING);
     $un_error = true;
     $e_erorr = true;
     $p_error = true;
     $m_error = true;

  $FormErrors  = array();
  if(strlen($user_name) < 4){
    $user_error = "Your user name should be more than or equal 4";
    $un_error = true;
    $user_name = " ";
  }
  else {
    $un_error = false;
  }
  if(strlen($email) < 7){
    $mail_error = "Please Enter Valid Mail";
    $email = " ";
    $m_error = true;
  }
  else {
    $m_error = false;
  }
  if(strlen($phone) < 11){
    $phone_error = "Your Phone number should be at least 11 numbers";
    $phone = " ";
    $p_error = true;
  }
  else {
    $p_error = false;
  }
  if(strlen($message) < 20){
    $message_error = "Your Message Should Contain More Than 20 Characters";
    $message = " ";
    $m_error = true;
  }
  else {
    $m_error = false;
  }
  if( $un_error || $m_error || $p_error || $m_error){

  }
  else {
    $success= "<div class='alert alert-success custom-success text-center'><p>We Have Recieved Your Email</p></div>";
    $msg = "tset";
    mail("tarek@mz.com.eg" , "Inquire" ,$msg ,  "Issues");
    $user_name = "";
    $email = "";
    $phone = "";
    $message = "";
  }
  if (!empty($_POST['subscribe'])) {
    $mail = $_POST['email'];
    $company_mail = "tarek@mz.com.eg";
    $subject = "News subbscribtion";
    $msg = "this email ".$mail." want to keep updated with your news";
    mail($company_mail , $subject , $msg ,  "news subscribe");
  }
}

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mobile Fixing Company</title>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Font Awesome Library -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact.css">
    <link href="https://fonts.googleapis.com/css?family=Dhurjati" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=BioRhyme+Expanded" rel="stylesheet">

  </head>
  <body>
    <!-- Start NavBar -->
    <nav class="navbar navbar-inverse navbar-fixed-top ">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mynavbar" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Brand</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="mynavbar">
          <ul class="nav navbar-nav navbar-right">
            <li ><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
            <li class="active"><a href="#" data-value="footer" class="contact">Contact</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>
    <!-- End NavBar -->
    <!--Start Main Header  -->
    <!-- <header class="main-header text-center">
      <div class="container">
        <div class="row">
          <div id="content" class="col-xs-12">
            <div class="row">
              <div class="col-xs-12"><h1>fix your phone in under 30 minutes anywhere <wbr>backed by a Lifetime Warranty</h1></div>
            </div>
            <div class="row">
              <div class="col-xs-12"><button class="btn btn-success order" data-value=".choose-your-phone">Order Now</button></div>
            </div>
        </div>
      </div>
    </div>
    </header> -->
    <!--End Main Header  -->
    <section class="contact_us text-center">
        <div class="container">
            <h1 class="text-center"> Contact US</h1>
            <?php if(isset($success)){
              echo $success;
            } ?>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="my_form">

              <div class="form-group">
                    <input class="form-control" type="name" name="user" placeholder= "Enter Your Name"
                    value="<?php if(isset($user_name))echo $user_name ?>" required>
                    <?php  if(isset($user_error)){ ?>
                      <div class="error alert alert-warning">
                        <?php  echo "<p>" . $user_error ."</p>"; ?>
                  </div>
                <?php } ?>
                <div class="alert alert-warning  custom-alert"></div>
            </div>
                  <div class="form-group">
                        <input class="form-control" type="email" name="Email" placeholder="Enter Valid Mail"
                        required value="<?php if(isset($email))echo $email ?>">
                        <?php  if(isset($mail_error)){ ?>
                          <div class="error alert alert-warning">
                            <?php  echo "<p>" . $mail_error ."</p>"; ?>
                      </div>
                    <?php } ?>
                    <div class="alert alert-warning  custom-alert"><p>Your user name should be more than or equal 4</p></div>
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="tel" name="Phone" value="<?php if(isset($phone))echo $phone ?>"
                     placeholder="Enter Your Phone" required>
                    <?php  if(isset($phone_error)){ ?>
                      <div class="error alert alert-warning">
                        <?php  echo "<p>" . $phone_error ."</p>"; ?>
                  </div>
                <?php } ?>
                <div class="alert alert-warning  custom-alert"><p>Your user name should be more than or equal 4</p></div>
              </div>
              <div class="form-group">
                    <textarea class="form-control" name="message" value="<?php if(isset($message))echo $message ?>"
                     placeholder="Enter Your Holder"></textarea>
                      <?php  if(isset($message_error)){ ?>
                        <div class="error alert alert-warning">
                          <?php  echo "<p>" . $message_error ."</p>"; ?>
                    </div>
                  <?php } ?>
                  <div class="custom-alert alert alert-warning"></div>
              </div>
                <input class="btn btn-success btn-block" type="submit" value="Send Message">
            </form>
        </div>
  </section>
    <!--Start ultimate footer  -->
    <footer class="ultimate-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-2 col-xs-12">
            <h1>Logo</h1>
          </div>
          <div class="col-md-4 col-xs-12">
            <h3>About</h3>
            <p>iFix is a new mobile repair concept brought to you by a team of Egyptian mobile experts and technology enthusiasts. We understand how precious your mobile device is to you, which is why we're here to the rescue! Our team of professional and highly-qualified technicians promises to have your problems
              fixed wherever you are, in no more than 30 minutes.</p>
          </div>
          <div class="col-md-2 col-xs-12">
            <h3>Contact</h3>
            <p>Working Hours Everyday (except Fridays & National Holidays)10.00 am to 8.00 pm</p>
            <p>Headquarters  Ground Floor, Villa 519, A Zone-South of Police AcademyNew Cairo, Egypt</p>
            <p>Call us on 010 67 81 81 81</p>
            <p>Don't Want to talk? Email us! info@ifixegypt.com</p>
          </div>
          <div class="col-md-4 col-xs-12">
            <h3>Follow us</h3>
            <i class="fab fa-facebook fa-3x"></i>
            <i class="fab fa-instagram fa-3x"></i>
            <p>Subscibe to our newsletter and get access to exclusive discounts and prizes!</p>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
              <input type="email"  name="email" required placeholder="Enter Your Email" class="form-control">
              <input type="submit" value="Subscribe" class="btn btn-primary btn-block" name="subscribe">
             </form>
          </div>
        </div>
      </div>
    </footer>
    <!--End ultimate footer  -->
    <!-- Jquery CDN -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/contact.js"></script>
  </body>
</html>
