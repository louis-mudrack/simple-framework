<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate the email address
    if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
        // Invalid email address
        $error_mail = "Please enter a valid email address.";
    }

    // Validate the name
    if (strlen($_POST["name"]) > 100) {
        // Name too long
        $error_name = "Your name is too long. Please limit to 100 characters.";
    }

    // Validate the business
    if (strlen($_POST["business"]) > 100) {
        // Business too long
        $error_business = "Your business is too long. Please limit to 100 characters.";
    }

    // Validate the phone number
    if (!preg_match('/^[0-9]$/', $_POST["phone"])) {
        // Invalid phone number
        $error_phone = "Please enter a valid phone number.";
    }

    // Validate the message
    if (strlen($_POST["message"]) > 1000) {
        // Message too long
        $error_message = "Your message is too long. Please limit to 1000 characters.";
    }

    // Validate the callback
    if (!empty($_POST["callback"]) &&!filter_var($_POST["callback"], FILTER_VALIDATE_BOOLEAN)) {
        // Invalid callback value
        $error_callback = "Please enter a valid callback value (true or false).";
    }

    // Check if there are any errors
    if (isset($error_mail) || isset($error_name) || isset($error_business) || isset($error_phone) || isset($error_message) || isset($error_callback)) {
        // Display the form again with errors
        //...
    } else {
        require_once($_SERVER["DOCUMENT_ROOT"]."/misc/site.config.php");
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
}
?>