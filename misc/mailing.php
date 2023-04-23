<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/misc/site.config.php");
if(isset($_POST["submit"])){
    $to = $text["mail"];
    $mail = $_POST["mail"];
    $name = $_POST["name"];
    $business = $_POST["business"];
    $phone = $_POST["phone"];
    $callback = $_POST["callback"];
    $subject = "Form submission";
    $message = $name . $business . $phone . $callback . " wrote the following:" . "\n\n" . $_POST["message"];
    $headers = "From:" . $mail;
    mail($to, $subject, $message, $headers);
    header("Location: ../contact/form-success.php");
    }
?>  