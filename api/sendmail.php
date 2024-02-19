<?php
$to_email = "akshay.dump@gmail.com";
$subject = "Simple Email Test via PHP";
$body = "Hi, This is test email send by PHP Script";
$headers = "From:officialeventlyapp@gmail.com";

ini_set('SMTP', 'smtp.gmail.com');
ini_set('smtp_port', 587);

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}

?>