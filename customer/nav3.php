
<head>
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

<?php 
 if(isset($_SESSION['email']))
 {
    $name=$_SESSION['email'];
 }
 else{
   // $name="USER";
 }
  ?>
<!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="d-flex align-items-center justify-content-between bg-secondary w-100 text-decoration-none" data-toggle="collapse" href="#navbar-vertical" style="height: 67px; padding: 0 30px;">
         <!--           <h5 class="text-primary m-0"><i class="fa fa-book-open mr-2"></i>  </h5>-->
                    <i class="fa fa-angle-down text-primary"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 9;">
                    <div class="navbar-nav w-100">
                    <a href="profile.php" class="nav-item nav-link">PROFILE</a>
                    <a href="vorder.php" class="nav-item nav-link">ORDERS</a>

                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0"><span class="text-primary">VSR</span>GROUP</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav py-0">
                            <a href="nav1.php" class="nav-item nav-link"><i class="fas fa-home"></i> Home</a>
                            <a href="rptbooking.php" class="nav-item nav-link">View Booking</a>
                            <a href="cancel.php" class="nav-item nav-link">Cancel</a>
                            <a href="viewcancel.php" class="nav-item nav-link">View Cancel</a>
                            <!--<div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Custom design</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="design.php" class="dropdown-item">Propose design</a>
                                    <a href="viewdis.php" class="dropdown-item">Designs</a>
                                </div>
                            </div>-->
                        </div>
                        <a class="btn btn-primary py-2 px-4 ml-auto d-none d-lg-block" href="login.php">Log Out</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->