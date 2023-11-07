<?php include("header_1.php");

$dao=new DataAccess();
$i=0;
//$name=$_SESSION['email']; 
if(isset($_SESSION['email']))
{ 
	include("nav2.php");
   
 }
else{
    include("nav1.php");
} ?>


<div class="container">
    <div class="main-body">
    <!-- <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="service.php">Service</a></li>
              <li class="breadcrumb-item active" aria-current="page">SUB-CATEGORY</li>
            </ol>
          </nav> -->

 <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-5">
                <h1 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Category</h1>
                
            </div>
            <div class="row">
                <?php
     
		   $q="select * from roomcategory ";

            $info=$dao->query($q);
            //print_r($info);
           
                        $i=0;          
                         while($i<count($info))
                        
            { $s=$info[$i]["cname"];
                $_SESSION['cname']=$info[$i]["cname"];
            ?>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="cat-item position-relative overflow-hidden rounded mb-2">
                        <img class="img-fluid" src=<?php echo BASE_URL."uploads/".$info[$i]["cimage"];?> alt="" width="100%">
                        <a class="cat-overlay text-white text-decoration-none" href="displayflats.php?id=<?= $info[$i]["cid"]?>">
                            <h4 class="text-white font-weight-medium"><?php echo $info[$i]["cname"]?></h4>
                        
                            
                        </a>
                    </div>
                </div>
                <?php $i++; }?>
            </div>

        </div>
 </div>
 </div>
 </div>
 <?php
  include("footer.php");
 ?>