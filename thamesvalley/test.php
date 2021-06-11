<?php
$to = "ayden.rust@gmail.com";
$subject = "test";
$message = "this is a test message";
$additional_headers = 'From: no-reply@firstclassplanners.ca' ;

mail($to, $subject, $message, $additional_headers);

?>

<html>
    Email Sent
</html>