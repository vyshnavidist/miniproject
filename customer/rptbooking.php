<?php
 include("header_1.php");
//session_start();
if(isset($_SESSION['email']))
{ 

	include("nav2.php");
}?>
<?php
//require('../config/autoload.php'); 
include("dbcon.php");
?>

<?php
$dao=new DataAccess();
   $name=$_SESSION['email'] ;

   if(isset($_POST["home"]))
{
     header('location:header.php');
}
if(!isset($_SESSION['email']))
   {
	   header('location:login.php');
	   }
	   else
	   { 
	  
	   
	    ?>
       
       
       
       
 <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
            
            <H1><center> BOOKING DETAILS </center> </H1>
                <table  border="1" class="table" style="margin-top:100px;">
                    <tr>
                        
                        <th>Sl No</th>
                        <th>Apartment NO</th>
                      
                        <th>Category</th>
                        <th>Booking DATE</th>
                    
                    </tr>
<?php
    
    $actions=array(
    
    
       // 'delete'=>array('label'=>'Cancel','link'=>'canceldoc.php','params'=>array('id'=>'bid'),'attributes'=>array('class'=>'btn btn-success'))
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('bid')
        
        
    );

   $condition="email='".$name."' and status=2";
   
   $join=array(
       
    );  
	$fields=array('bid','aid','cname','bdate');

    $users=$dao->selectAsTable($fields,'cbooking as c',$condition,$join,$actions,$config);
    
    echo $users;
                                     
    ?>

             
                </table>
            </div>    


          
<form action="" method="POST" enctype="multipart/form-data">



</form>


            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->

<?php } ?>