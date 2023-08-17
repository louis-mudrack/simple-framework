<?php

// Set the sites navigation
// current keys are: name, url, title, desc, sub, class, navExclude, external and footerNav

$navigation = array(
    array(
        "name" => "Home",
        "url" => "/",
        "title" => "Home | Your Business",
        "desc" => "Some Business Informations go here."
    ),
    array(
        "name" => "Contact",
        "url" => "/contact/index",
        "title" => "",
        "desc" => "Have a question or comment? We'd love to hear from you! Fill out the form below and we'll get back to you as soon as possible."
        "sub" => array(
            array(
                "name" => "Form Success",
                "url" => "/contact/form-success",
                "title" => "Form Success | Your Business",
                "desc" => "Thank you for submitting your form! We'll get back to you as soon as possible. Have a great day!",
                "noIndex" => true,
                "navExclude" => true
            ),
            array(
                "name" => "Form Error",
                "url" => "/contact/form-error",
                "title" => "Form Error | Your Business",
                "desc" => "Something went wrong while submitting the form. We're sorry for the inconvenience. Please try again or contact us directly for assistance.",
                "noIndex" => true,
                "navExclude" => true
            )
        )
    ),
    array(
        "name" => "Legal Data",
        "url" => "/legal-data",
        "title" => "Legal Data | Your Business",
        "desc" => "Need to know what personal data we collect and how we use it? Check out our legal data page to learn more about how we protect your privacy and comply with data protection regulations.",
        "noIndex" => true,
        "navExclude" => true,
        "footerNav" => true
    ),
    array(
        "name" => "Privacy Policy",
        "url" => "/privacy-policy",
        "title" => "Privacy Policy | Your Business",
        "desc" => "We take your privacy seriously. Check out our privacy policy to learn how we collect, use, and protect your personal data.",
        "noIndex" => true,
        "navExclude" => true,
        "footerNav" => true
    )
);

?>