<?php

$username="papyrustigris";
$password="";
$database="c9";

$connection=mysqli_connect('127.0.0.1', $username, $password, $database);

if(!$connection)
{die("could not connect" . mysqli_error());}

?>