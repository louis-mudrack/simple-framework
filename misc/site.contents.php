<?php

    // Set the sites navigation
    // current keys are: name, url, title, desc, sub, class, navExclude, external and footerNav

    $navigation = array(
        "Home" => array(
            "url" => "/",
            "title" => "Willkommen zu MoonyMystics | Handgemachter Schmuck",
            "desc" => "Willkommen zu MoonyMystics! Wir bieten handgemachten Schmuck, der von der Natur und dem Universum inspiriert ist. Entdecken Sie unsere Kollektionen und finden Sie das perfekte Schmuckstück für sich oder einen geliebten Menschen.",
        ),
        "Produkte" => array(
            "url" => "/all-products",
            "title" => "Alle Produkte | MoonyMystic",
            "desc" => "Entdecken Sie alle unsere Produkte und finden Sie das perfekte Schmuckstück für sich oder einen geliebten Menschen. Von Ohrringen bis zu Halsketten haben wir für jeden etwas dabei.",
        ),
        "Über uns" => array(
            "url" => "/about",
            "title" => "Über uns | MoonyMystics",
            "desc" => "Erfahren Sie mehr über MoonyMystics und unsere Mission, handgemachten Schmuck zu schaffen, der von der Natur und dem Universum inspiriert ist. Wir freuen uns darauf, von Ihnen zu hören!",
        ),
        "Kollektion" => array(
            "url" => "/collection",
            "title" => "Kollektionen | MoonyMystics",
            "desc" => "Entdecken Sie unsere Kollektionen und finden Sie das perfekte Schmuckstück für sich oder einen geliebten Menschen. Jede Kollektion ist von der Natur und dem Universum inspiriert und handgefertigt.",
        ),
        "Bestellung abschließen" => array(
            "url" => "/check-out",
            "title" => "Bestellung abschließen | MoonyMystics",
            "desc" => "Schließen Sie Ihre Bestellung ab und erhalten Sie Ihre handgefertigten Schmuckstücke so schnell wie möglich. Wir freuen uns darauf, Ihnen zu helfen!",
            "navExclude" => true,
        ),
        "Login" => array(
            "url" => "/login",
            "title" => "Login | MoonyMystics",
            "desc" => "Melden Sie sich an, um alle Bestellungen zu sehen und Produkte zu verwalten. Wir freuen uns darauf, Ihnen zu helfen!",
            "navExclude" => true,
        ),
        "Dashboard" => array(
            "url" => "/dashboard",
            "title" => "Dashboard | MoonyMystics",
            "desc" => "Verwalten Sie Ihre Bestellungen und Produkte im Dashboard. Wir freuen uns darauf, Ihnen zu helfen!",
            "navExclude" => true,
        ),
        "Weitere Information" => array(
            "url" => "/infos",
            "title" => "Weitere Informationen bezüglich Lieferung und Bestellung | MoonyMystics",
            "desc" => "Erfahren Sie mehr über Lieferung, Bestellung. Wir freuen uns darauf, Ihnen zu helfen!",
            "navExclude" => true,
        ),
        "Kontakt" => array(
            "url" => "/contact/index",
            "title" => "Kontaktiere uns | MoonyMystics",
            "desc" => "Haben Sie Fragen oder Anregungen? Kontaktieren Sie uns und wir helfen Ihnen gerne weiter. Wir freuen uns darauf, von Ihnen zu hören!",
            "navExclude" => true,
            "footerNav" => true,
            "sub" => array(
                "Formularbestätigung" => array(
                    "url" => "/contact/form-success",
                    "title" => "Formularbestätigung | MoonyMystics",
                    "desc" => "Vielen Dank für Ihre Nachricht! Wir werden uns so schnell wie möglich bei Ihnen melden.",
                    "noIndex" => true,
                    "navExclude" => true,
                ),
                "Formularfehler" => array(
                    "url" => "/contact/form-error",
                    "title" => "Formularfehler | MoonyMystics",
                    "desc" => "Es gab ein Problem beim Senden Ihrer Nachricht. Bitte versuchen Sie es erneut oder kontaktieren Sie uns direkt per E-Mail oder Telefon. Wir entschuldigen uns für die Unannehmlichkeiten.",
                    "noIndex" => true,
                    "navExclude" => true,
                )
            )
        )
    );
?>
