<?php
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (!empty($_POST['choosing-submit'])) {
        $iphoneType = filter_var($_POST['select_iphone'] , FILTER_SANITIZE_STRING);
        $iphone_color = filter_var($_POST['color'] , FILTER_SANITIZE_STRING);
        $name =filter_var( $_POST['name'] , FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'] , FILTER_SANITIZE_EMAIL);
        $phone = filter_var($_POST['phone'] , FILTER_SANITIZE_NUMBER_INT);
        $problem = filter_var($_POST['problem'] , FILTER_SANITIZE_STRING);
        $address = filter_var($_POST['address'] , FILTER_SANITIZE_STRING);
        $name_ed = True;
        $email_ed = True;
        $phone_ed =True;
        $problem_ed  = True;
        $address_ed = True;
        if(strlen($name) == 0){
          $name_error = "Your Field Can't be empty";
          $name_ed = True;
        }
        elseif(strlen($name) <= 3){
          $name_error = "Your Name should be more than 3 Characters";
          $name_ed = True;
        }
        else {
          $name_ed = false;
        }
        if(strlen($email) == 0){
          $email_error = "Your Field Can't be empty";
          $email_ed = True;
        }
        else if(strlen($email) <= 4){
          $email_error = "Your email should be more than 5 Characters and contain @ symbol";
          $email_ed = True;
        }
        else {
          $email_ed = false;
        }
        if(strlen($phone) == 0){
          $phone_error = "Your Field Can't be empty";
          $phone_ed = True;
        }
        else if(strlen($phone) < 11 ||  strlen($phone) > 11){
          $phone_error = "Your Phone number should equal 11 numbers";
          $phone_ed = True;
        }
        else {
          $phone_ed = false;
        }
        if(strlen($problem) == 0){
          $problem_error = "Your Field Can't be empty";
          $problem_ed = True;
        }
        else if(strlen($problem) <= 10){
          $problem_error = "Your Phone number should equal 10 Characters";
          $problem_ed = True;
        }
        else {
          $problem_ed = false;
        }
        if(strlen($address) == 0){
          $address_error = "Your Field Can't be empty";
          $address_ed  = True;
        }
        else if(strlen($address) <= 15){
          $address_error = "Your Address should equal 15 Characters";
          $address_ed  = True;
        }
        else {
          $address_ed = false;
        }
        if($name_ed || $email_ed || $phone_ed || $address_ed || $problem_ed){
            $faild = "<div class='alert alert-danger success'><p>Thers is Some Thing Wrong</p></div>";
        }
        else {
          $success = "<div class='alert alert-success success'><p>Successful request</p></div>";
          $company_mail = "tarek@mz.com.eg";
          $subject = "New Order";
          $msg = "Mr ".$name." want to fix his ".$iphone_color." ".$iphoneType." with a problem in".$problem."\n"."and his phone number is ".$phone." and his address is \n".$address;
          mail($company_mail , $subject ,$msg ,  "Requesting Order");
          $name = "";
          $phone = "";
          $email = "";
          $problem = "";
          $address = "";
        }
      }
      elseif (!empty($_POST['subscribe'])) {
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
    <link href="https://fonts.googleapis.com/css?family=Dhurjati" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=BioRhyme+Expanded" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">


  </head>
  <body>
    <!-- <div class="loading-page">
      <i class="fas fa-cog fa-4x fa-spin"></i>
      <h3>Loading...</h3>
    </div> -->
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
          <a class="navbar-brand pull-left" href="#"><p>Yallaa <span>Fix</span></p></a>
          <!-- <p>Yallaa <span>Fix</span></p> -->
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="mynavbar">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
            <li><a href="contact.php" data-value="footer" class="contact">Contact</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>
    <!-- End NavBar -->
    <!--Start Main Header  -->
    <header class="main-header text-center">
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
    </header>
    <!--End Main Header  -->
    <!-- Start How it works -->
    <section class="how-it-works">
       <div class="container">
         <div class="row">
           <div class="col-lg-3">
             <h1><span>H</span/>ow <br> it <span>W</span>orks ? </h1>
             <h1>Very <span>S</span>imple<h1>
           </div>
           <div class="col-lg-3">
             <i class="fas fa-laptop fa-3x"></i>
             <strong>Book Us </strong>
             <p>You can book an iFixer through our website or by calling us on 01067818181.</p>
           </div>
           <div class="col-lg-3">
             <i class="fas fa-car fa-3x"></i>
             <strong>We come to you </strong>
             <p>There's no need to stop what you're doing to have your iPhone repaired - we'll meet you at your house, office or a nearby café.</p>
           </div>
           <div class="col-lg-3">
             <i class="fas fa-thumbs-up fa-3x"></i>
             <strong>Lifetime Warranty</strong>
             <p>It's a risk-free experience; your repair is backed by the iFix Lifetime Warranty system.</p>
           </div>
         </div>
       </div>
    </section>
    <!--End How it works  -->
    <!-- Start Choose Your Phone -->
    <section class="choose-your-phone text-center">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <h1>Choose Your Device</h1>
            </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <div class="col-xs-6">
              <img class="img-responsive" src="images/iphone-choice.png" alt="Iphone">
              <button type="button" class="btn btn-primary iphone" data-value="#form">IPhone</button>
            </div>
            <div class="col-xs-6 text-center">
              <img  class="img-responsive" src= "images/other-choice.png" alt="Other">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Other</button>
              <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                  <div class="modal-content">
                    <h2>Coming Soon</h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End Chhose Your Phone  -->
    <section class="if_success text-center">
      <div class="container">
        <div class="row">
          <?php if(isset($success)){ ?>
          <div class="modal fade" id="global-modal" role="dialog">
              <div class="modal-dialog modal-lg">
                <!--Modal Content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" style="margin-top: -16px; font-size: 28px;" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body" style="padding: 0;">
                    <?php
                      echo $success;
                    } ?>
                  </div>
                </div>
              </div>
          </div>
          <?php if(isset($faild)){ ?>
          <div class="modal fade" id="global-modal" role="dialog">
              <div class="modal-dialog modal-lg">
                <!--Modal Content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" style="margin-top: -16px; font-size: 28px;" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body" style="padding: 0;">
                    <?php
                      echo $faild;
                      echo "<br> <button class='btn btn-danger class btn_faild'>Check Your Errors</button>";
                    } ?>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>
    <section class="request-order  text-center" id="form">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <h1> Request Your Order</h1>
          </div>
          <div class="col-xs-12">
              <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="choosing_form">
                <label>IPhone Type </label>
                <select name="select_iphone" class = "form-control">
                  <option value="iphone5">IPHONE5</option>
                  <option value="iphone5s">IPHONE5S</option>
                  <option value="iphon5ce">IPHONE5C</option>
                  <option value="iphone6">IPHONE6</option>
                  <option value="iphone6plus">IPHONE6PLUS</option>
                  <option value="iphone6s">IPHONE6S</option>
                  <option value="iphone6splus">IPHONE6SPLUS</option>
                  <option value="iphone7">IPHONE7</option>
                  <option value="iphone7s">IPHONE7S</option>
                  <option value="iphone7splus">IPHONE7SPLUS</option>
                  <option value="iphone8">IPHONE8</option>
                  <option value="iphone8s">IPHONE8S</option>
                  <option value="iphonex">IPHONEX</option>
              </select>
              <label>IPhone Color</label>
              <select name="color" class = "form-control">
                <option value="white">White</option>
                <option value="black">Black</option>
                <option value="gold">Gold</option>
              </select>
              <div class="fomr-group">

              <textarea class="form-control" required name="problem" placeholder="What is your problem"></textarea>
              <div class="custom-alert alert alert-danger"></div>
              <?php if(isset($problem_error )){ ?>
                <div class="alert alert-warning"><p><?php echo $problem_error; ?></div>
                <?php }?>
              </div>
              <div class="fomr-group">
              <input class="form-control" type="name" name="name" required placeholder="Your Name" maxlength="15" value = "<?php if(isset($name)) echo $_POST['name'] ?>">
              <div class="custom-alert alert alert-danger"></div>
              <?php if(isset($name_error )){ ?>
                <div class="alert alert-warning"><p><?php echo $name_error; ?></div>
                <?php }?>
                </div>
                <div class="fomr-group">
              <input class="form-control" type="tel" name="phone"  required placeholder="Your Mobile Phone" maxlength="11" pattern="\d*" value = "<?php if(isset($phone)) echo $_POST['phone'] ?>">
              <div class="custom-alert alert alert-danger"></div>
              <?php if(isset($phone_error )){ ?>
                <div class="alert alert-warning"><p><?php echo $phone_error; ?></div>
                <?php }?>
                </div>
                <div class="fomr-group">
              <input type="email" class="form-control" name="email" value = "<?php if(isset($email)) echo $_POST['email'] ?>" required placeholder="Enter Valid Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
              <div class="custom-alert alert alert-danger"></div>
              <?php if(isset($email_error)){ ?>
                <div class="alert alert-warning"><p><?php echo $email_error; ?></div>
                <?php }?>
                </div>
                <div class="fomr-group">
              <input type="text" class="form-control" name="address" required placeholder="Enter Your Address" value = "<?php if(isset($address)) echo $_POST['address'] ?>">
              <div class="custom-alert alert alert-danger"></div>
              <?php if(isset($address_error)){ ?>
                <div class="alert alert-warning"><p><?php echo $address_error; ?></div>
                <?php }?>
                </div>
              <input type="submit" class="form-control btn btn-success btn-block" name="choosing-submit" value="Submit">
              </form>
          </div>
        </div>
      </div>
    </section>
    <!--Start Mother board fixing  -->
    <section class="mother_board text-center">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <h2>Do You Know ?</h2>
            <p class="lead">We also fixing MotherBoards of any device Contact us to know more !</p>
          </div>
        </div>
      </div>
    </section>
    <!--End  Mother Board fixing -->
    <!--Start issues  -->
    <section class="issues ">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-xs-12">
            <h1>You're a couple of steps away from a fully-repaired iPhone.</h1>
            <p>We'll fix any of these issues.</p>
          </div>
          <div class="col-md-6 col-xs-12">
            <img src="images/iphone-issues.png" class="img-responsive" alt="iphone_issues">
          </div>
        </div>
      </div>
    </section>
    <!-- End issues -->
    <!--Start ultimate footer  -->
    <footer class="ultimate-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-xs-12">
            <img src="images/brand.png" alt="Brand Logo" class="img-responsive">
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
          <div class="col-md-3 col-xs-12">
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
  </body>
</html>
