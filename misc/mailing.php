<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Initialize an array to store error messages
    $errors = [];

    // Validate the email address
    if (isset($_POST["mail"]) &&!empty($_POST["mail"]) &&!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
        // Invalid email address
        $errors['mail'] = "Please enter a valid email address.";
    }

    // Validate the name
    if (isset($_POST["name"]) &&!empty($_POST["name"]) && strlen($_POST["name"]) > 100) {
        // Name too long
        $errors['name'] = "Your name is too long. Please limit to 100 characters.";
    }

    // Validate the business
    if (isset($_POST["business"]) &&!empty($_POST["business"]) && strlen($_POST["business"]) > 100) {
        // Business too long
        $errors['business'] = "Your business is too long. Please limit to 100 characters.";
    }

    // Validate the phone number
    if (isset($_POST["phone"]) &&!empty($_POST["phone"]) &&!preg_match('/^[0-9]+$/', $_POST["phone"])) {
        // Invalid phone number
        $errors['phone'] = "Please enter a valid phone number using numbers.";
    }

    // Validate the message
    if (isset($_POST["message"]) &&!empty($_POST["message"]) && strlen($_POST["message"]) > 1000) {
        // Message too long
        $errors['message'] = "Your message is too long. Please limit to 1000 characters.";
    }

    // Validate the callback
    if (isset($_POST["callback"]) &&!empty($_POST["callback"]) &&!filter_var($_POST["callback"], FILTER_VALIDATE_BOOLEAN)) {
        // Invalid callback value
        $errors['callback'] = "Please enter a valid callback value (true or false).";
    }

    // Check if there are any errors
    if (!empty($errors)) {
        // Store the errors in the session
        session_start();
        $_SESSION['errors'] = $errors;

        // Redirect to the form-error.php page
        header("Location: form-error.php");
        exit;
    } else {
        // Send the email and redirect to form-success.php
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