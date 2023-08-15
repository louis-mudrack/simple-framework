<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Initialize an array to store error messages
    $errors = [];

    // Validate the email address
    if (empty($_POST["mail"]) || !filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
        // Invalid email address
        $errors['mail'] = "Please enter a valid email address.";
    }

    // Validate the name
    if (empty($_POST["name"]) || strlen($_POST["name"]) > 100) {
        // Name too long
        $errors['name'] = "Your name is too long. Please limit to 100 characters.";
    }

    // Validate the business
    if (empty($_POST["business"]) || strlen($_POST["business"]) > 100) {
        // Business too long
        $errors['business'] = "Your business is too long. Please limit to 100 characters.";
    }

    // Validate the phone number
    if (empty($_POST["phone"]) || !preg_match('/^[0-9]+$/', $_POST["phone"])) {
        // Invalid phone number
        $errors['phone'] = "Please enter a valid phone number.";
    }

    // Validate the message
    if (empty($_POST["message"]) || strlen($_POST["message"]) > 1000) {
        // Message too long
        $errors['message'] = "Your message is too long. Please limit to 1000 characters.";
    }

    // Validate the callback
    if (!empty($_POST["callback"]) && !filter_var($_POST["callback"], FILTER_VALIDATE_BOOLEAN)) {
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
        //...
    }
}
?>