

<?php	
include("dbcon.php");
$bid = $_GET['id'];
$sql = "update cbooking set status=3 where  bid=".$bid;

$conn->query($sql);

 header('location:viewcancel.php');



?>

