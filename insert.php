<?php
$con=mysqli_connect('localhost','papyrust','Lemongate8x*','papyrust_bounty');

if(!$con)
{die("could not connecct" . mysqli_error());}
$user = mysqli_real_escape_string($con, $_POST['user']);
$msg = mysqli_real_escape_string($con, $_POST['msg']);
$lat = mysqli_real_escape_string($con, $_POST['lat']);
$lng = mysqli_real_escape_string($con, $_POST['lng']);
$address = mysqli_real_escape_string($con, $_POST['address']);
$amount = mysqli_real_escape_string($con, $_POST['amount']);

$sql="INSERT INTO posts (user, msg, lat, lng, address, amount)
VALUES ('$user','$msg', '$lat', '$lng' ,'$address', '$amount')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "1 record added";

mysqli_close($con);
?>