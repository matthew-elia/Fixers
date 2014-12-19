<?php

$username="papyrust";
$password="Lemongate8x*";
$database="papyrust_bounty";

$connection=mysqli_connect("localhost", $username, $password, $database);

if(!$connection)
{die("could not connecct" . mysqli_error());}

?>