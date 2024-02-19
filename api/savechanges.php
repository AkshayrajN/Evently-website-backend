<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json; charset=UTF-8');


$inputData = file_get_contents('php://input');
$decodedData = json_decode($inputData, true);


$localhost="localhost";
$username="root";
$pass= '';
$dbname="evently";

$con=mysqli_connect($localhost,$username,$pass,$dbname);
if ($decodedData != null) {

   $user= $decodedData['username'];
   $updatedProfile= $decodedData['profile'];

   $query=" update evently column set profile='$updatedProfile' where username='$user'";

   mysqli_query($con,$query);

}
else{
    print_r(mysqli_error($con));
}