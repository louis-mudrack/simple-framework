<?php

    // Set the sites navigation
    // current keys are: name, url, title, desc, sub, class, navExclude, external and footerNav

    $navigation = array(
        "Home" => array(
            "url" => "/",
            "title" => "Welcome to Your Business",
            "desc" => "Welcome to Your Business. We offer a wide selection of ... and ...",
        ),
        "Contact" => array(
            "url" => "/contact/index",
            "title" => "Contact us | Your Business",
            "desc" => "Contact us for any questions or inquiries. We are happy to help you find the perfect piece of jewelry or answer any questions you may have.",
            "navExclude" => true,
            "footerNav" => true,
            "sub" => array(
                "Form Confirmation" => array(
                    "url" => "/contact/form-success",
                    "title" => "Form Successfully send | Your Business",
                    "desc" => "Thank you for contacting us. We will get back to you as soon as possible. In the meantime, feel free to browse our website and discover our products.",
                    "noIndex" => true,
                    "navExclude" => true,
                ),
                "Form Error" => array(
                    "url" => "/contact/form-error",
                    "title" => "Form Error | Your Business",
                    "desc" => "There was a problem with your form submission. Please try again. If the problem persists, please contact us directly. We apologize for the inconvenience.",
                    "noIndex" => true,
                    "navExclude" => true,
                )
            )
        )
    );
?>
