<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json; charset=UTF-8');


$inputData = file_get_contents('php://input');
$decodedData = json_decode($inputData, true);

if ($decodedData != null) {

    $name = $decodedData['name'];
    $place = $decodedData['place'];
    $time = $decodedData['time'];
    $date = $decodedData['date'];
    $duration = $decodedData['duration'];
    $age = $decodedData['age_group'];
    $category = $decodedData['category'];
    $email=$decodedData['email'];
    $fname=$decodedData['fname'];


    $to_email = $email;
    $subject = "Simple Email Test via PHP";
    $body = "Dear $fname,\n\n";
    $body .= "Thank you for showing interest in the event. Your presence will be highly appreciated🔥🔥. we hope you really enjoy the event.💫💫\n\n";
    $body .= "Event Details:\n";
    $body .= "Name: $name\n";
    $body .= "Place: $place\n";
    $body .= "Time: $time\n";
    $body .= "Date: $date\n";
    $body .= "Duration: $duration\n";
    $body .= "Age Group: $age\n";
    $body .= "Category: $category\n\n";
    $body .= "We look forward to welcoming you to future events.\n\n";
    $body .= "sent with 💖, Evently.";
    $headers = "From: officialeventlyapp@gmail.com";
    
    ini_set('SMTP', 'smtp.gmail.com');
    ini_set('smtp_port', 587);
    
    if (mail($to_email, $subject, $body, $headers)) {
        echo "Email successfully sent to $to_email...";
    } else {
        echo "Email sending failed...";
    }

}

echo "empty data recieved";

?>