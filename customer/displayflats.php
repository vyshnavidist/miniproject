<?php include("header_1.php");

$dao=new DataAccess();
$i=0;
    
if(isset($_SESSION['email']))
{ 
	include("nav2.php");
   $name=$_SESSION['email'];
   $cname= $_SESSION['cname'];
   $_SESSION['cname']=$cname;

 }
else{
    include("nav1.php");
} ?>
 <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-5">
                <h1 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">FLATS</h1>
                
            </div>
            <div class="row">
                <?php
           $cid=$_GET['id']; 
		   $q="select * from flats where  cid=".$cid;

            $info=$dao->query($q);
            //print_r($info);
            
                        $i=0;          
                         while($i<count($info))
                        
            { $s=$info[$i]["fname"];?>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="cat-item position-relative overflow-hidden rounded mb-2">
                        <img class="img-fluid" src=<?php echo BASE_URL."uploads/".$info[$i]["fimage"];?> alt="">
                        <a class="cat-overlay text-white text-decoration-none" href="displayapartments.php?id=<?= $info[$i]["fid"]?>">
                            <h4 class="text-white font-weight-medium"><?php echo $info[$i]["fname"]?></h4>
                            <h4 class="text-white font-weight-medium"><?php echo $info[$i]["flocation"]?></h4>
                            
                        </a>
                    </div>
                </div>
                <?php $i++; }?>
            </div>

        </div>
 </div>
         
 <?php
  include("footer.php");
 ?>