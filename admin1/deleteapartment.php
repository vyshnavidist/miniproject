
<?php	
include("dbcon.php");
$cid = $_GET['id'];
$sql = "update apartment set status=2 where  aid=".$aid;

$conn->query($sql);

 header('location:viewapartment.php');



?>

