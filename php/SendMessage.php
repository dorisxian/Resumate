<?php
session_start();
if(isset($_POST['send'])) {
    $siteEmail = "rpiresumate@gmail.com";
    $name = $_POST['name'];
    $emailer = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    //counteract early stops
    //see http://php.net/manual/en/function.mail.php under the Parameters>message heading
    $message = str_replace("\n.", "\n..", $message);
    
    $headers = 'From: ' . $emailer . '' . "\r\n" . 'Reply-To: ' . $emailer . '' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
    
    mail($siteEmail, $subject, $message, $headers);
}
?>