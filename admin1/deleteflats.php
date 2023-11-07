

<?php	
include("dbcon.php");
$cid = $_GET['id'];
$sql = "update flats set status=2 where  fid=".$fid;

$conn->query($sql);

 header('location:viewflats.php');



?>

