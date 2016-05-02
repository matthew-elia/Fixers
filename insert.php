<?php

require("config/connect.php");

$con=mysqli_connect('127.0.0.1', $username, , $password);

if(!$con)
{die("could not connect" . mysqli_error());}
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
}else{
echo "1 record added";
}

mysqli_close($con);
?>

<script type="text/javascript">
    setTimeout(function () {
        window.location = "https://handyman-papyrustigris.c9.io/nycexample.html";
    },5000);
</script>