<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/misc/site.config.php");
if(isset($_POST["submit"])){
    $to = $text["mail"];
    $mail = $_POST["mail"];
    $name = $_POST["name"];
    $business = $_POST["business"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];
    $callback = $_POST["callback"];
    $subject = "Form submission";
    $header  = "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html; charset=utf-8\r\n";
    $header .= "X-Mailer: PHP ". phpversion();
    $text = "
    <html>
        <body>
            <table>
                <tr>
                    <td>Name:</td>
                    <td>$name</td>
                </tr>
                <tr>
                    <td>E-Mail:</td>
                    <td>$mail</td>
                </tr>
                <tr>
                    <td>Business:</td>
                    <td>$business</td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td>$phone</td>
                </tr>
                <tr>
                    <td>Call back:</td>
                    <td>$callback</td>
                </tr>
                <tr>
                    <td>Message:</td>
                    <td>$message</td>
                </tr>
            </table>
        </body>
    </html>
    ";
    mail($to, $subject, $text, $header);
    header("Location: ../contact/form-success.php");
    }
?>  