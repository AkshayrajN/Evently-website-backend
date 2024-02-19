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

// var_dump($decodedData);
if ($decodedData != null) {
$con=mysqli_connect($localhost,$username,$pass,$dbname);
$event_name=$decodedData['festName'];
$event_place=$decodedData['place'];
$event_time=$decodedData['time'];
$event_date=$decodedData['date'];
$event_duration=$decodedData['duration'];
$event_age=$decodedData['ageGroup'];
$event_cat=$decodedData['category'];
$event_dress=$decodedData['dressCode'];
$event_conctno=$decodedData['contactNo'];
$event_desc=$decodedData['discription'];

// echo ''.$event_name.''.$event_place;

$sql="INSERT INTO `events`( `event_name`, `event_place`, `event_time`, `event_date`, `duration`, `age_group`, `category`, `dress_code`, `contact_no`, `description`) 
VALUES ('$event_name','$event_place','$event_time','$event_date','$event_duration','$event_age','$event_cat','$event_dress','$event_conctno','$event_desc')";
$res=mysqli_query($con,$sql);
if($res==true){
$response = array('Status' => 200, 'message' => 'Succesfully connected');
echo json_encode($response);
}
else{

    $response = array('Status' => 200, 'message' => 'not inserted');
    echo json_encode($response);
    }


}

 else {
    $response = array('Status' => 403, 'message' => 'Data not inserted');
    echo json_encode($response);

}
?>