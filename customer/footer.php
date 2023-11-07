<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ECOURSES - Online Courses HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
   <?php
   $dao=new DataAccess();
   if(isset($_SESSION['email']))
 { 
    $name=$_SESSION['email'];
    $a=2;
  }
 else{
    $name="unknown";
    $a=1;
 }
   
   $elements=array("feeb"=>"");
    $form=new FormAssist($elements,$_POST);

$labels=array('feeb'=>"Customer feedback");

$rules=array(
  "feeb"=>array("required"=>true,"minlength"=>3,"maxlength"=>190)
);
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["sub"]))
{

if($validator->validate($_POST))
{
	
$data=array(

        'feedb'=>$_POST['feeb'],
        'status'=>$a,
        'cus_email'=>$name
    );
    if($dao->insert($data,'feedback'))
    {
        
echo "<script> alert('feedback submitted successfully');</script> ";
//echo"<script> location.replace('index.php'); </script>";
    }
    else
        {
           echo "<script> alert('submittion failed');</script> ";
            
        }       
}
}
?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white pt-4 pr-sm-3 px-lg-5" style="margin-top: 90px;">
        <div class="row pt-12">
            <div class="col-lg-6 col-md-12">
                        <h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px;">Get In Touch</h5>
                        <p><i class="fa fa-map-marker-alt mr-2"></i>Angamaly, Kerala, India</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+919847731803</p>
                        <p><i class="fa fa-envelope mr-2"></i>vsrgroup@gmail.com</p>
                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-outline-light btn-square" href="https://www.instagram.com/janathaengineering/" style="color: #6064ee;border-block-color: initial;"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-light btn-square" href="https://wa.me/+919847731803" style="color: #1be468;border-block-color: initial;"><i class="fab fa-whatsapp"></i></a>
                        </div>
            </div>
                    <div class="col-md-5 mb-5">
                     <form method="POST">
                       <h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px;">FEEDBACK</h5>
                                <div class="w-100">
                                    <div class="input-group">
                                        <textarea class="form-control border-0 py-3 px-4" rows="5" name="feeb" placeholder="feedback" required="required" data-validation-required ></textarea>
                                            <div class="input-group-append">
                                                <button class="btn btn-primary px-4" name="sub">Submit</button>
                                            </div>
                                    </div>
                                </div>
                     </form> 
                    </div>
        </div>
    </div>
   <!-- <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white">&copy; <a href="#">Domain Name</a>. All Rights Reserved. Designed by <a href="https://htmlcodex.com">HTML Codex</a>
                </p>
            </div>
            <div class="col-lg-6 text-center text-md-right">
                <ul class="nav d-inline-flex">
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Privacy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Terms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Help</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
     Footer End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>