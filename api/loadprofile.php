<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json; charset=UTF-8');

$localhost="localhost";
$username="root";
$pass= '';
$dbname="evently";

$con=mysqli_connect($localhost,$username,$pass,$dbname);
$inputData = file_get_contents('php://input');
$decodedData = json_decode($inputData, true);
var_dump($decodedData);
$uname =$decodedData['username'];
$query="select * from users where username='$uname'";

$result=mysqli_query($con,$query);

$row=mysqli_fetch_assoc($result);
$response =array('firstName'=>$row['first_name'],'lastName'=>$row['last_name'],'email'=>$row['email'],'userame'=>$row['username']);
echo json_encode($response);

print_r($row);


?>