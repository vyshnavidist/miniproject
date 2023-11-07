<!DOCTYPE html>
<html lang="en">
<head>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="pcss1.css" rel="stylesheet">
</head>

<?php

include("dbcon.php");
require('../config/autoload.php');
$dao=new DataAccess();

$name=$_SESSION['email'];
$sql = "SELECT * FROM cusorder WHERE status=1 and cus_email='$name'";
$result = $conn->query($sql);
$c=0;
$amt= $_SESSION['adv'];
$sql1 = "SELECT * FROM customer WHERE status=1 and cus_email='$name'";
$result1 = $dao->query($sql1);

?>



<script>
function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
</script>
<div id="invoice">

    <div class="toolbar hidden-print">
        <div class="text-right">
            <form>
        <input type="button" onclick="printData();" value="PRINT"  style="
    color: #f7ef96;
    background-color: #171756;
    border-block-color: initial;
    border-left-style: initial;
    border-right-style: initial;" /> 
<a href="index.php">HOME</a>    
</form>
           
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto" id="printTable">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        
                    <img src="img/je.png" style="height: 100px;width: 100px;background-color: black;" data-holder-rendered="true">
                            </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a>
                            JANATHA ENGINEERING
                            </a>
                        </h2>
                        <div>Champanoor, Kerala, India</div>
                        <div>+919847731803</div>
                        <div>janathaengineering96@gmail.com
</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to"><?php echo $result1[0]["cus_name"]; ?></h2>
                        <div class="address"><?php echo $result1[0]["address"]; ?></div>
                        <div class="email"><a href="mailto:john@example.com"><?php echo $result1[0]["cus_email"]; ?></a></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">ADVANCE RECIPT</h1>
                        <div class="date">Date :<?php echo date('Y-m-d',time());?></div>
                        
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-left">DESCRIPTION</th>
                            <th class="text-right">RATE</th>
                            <th class="text-right">QUANTITY</th>
                            <th class="text-right">TOTAL</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php if ($result->num_rows > 0)
                     {
// output data of each row
   while($row = $result->fetch_assoc()) 
   { 
    $c = $row["tprice"];?>
       
    <tr>
    <td class="no">01</td>
    <td class="text-left"><?php echo $row["prt_name"],".........", $row["desp"] ?></td>
    <td class="unit"></td>
    <td class="qty"><?php echo $row["qty"]; ?></td>
    <td class="qty">₹ <?php echo $amt ?></td>
    
</tr> 
<?php    
  }
}?>
                       
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">SUBTOTAL</td>
                            <td>₹ <?php echo $amt ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">TAX 1.5%</td>
                            <td>₹ <?php echo $tax=(.015*($amt)) ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">GRAND TOTAL</td>
                            <td>₹ <?php echo $gt=($tax+$amt) ?></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">This is only advance payment to start the work.<br> Balance amount after the work. </div>
                </div>
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
<?php
$b=$c-$gt;

$sql11 =" UPDATE cusorder SET status=2,balance='$b' WHERE status=1 and cus_email='$name'" ;

if ($conn->query($sql11) === TRUE) {
	echo "<script> alert('Payment Sucessfully');</script> ";
	 
	
	 }
	 ?>
