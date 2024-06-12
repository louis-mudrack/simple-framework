<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php print $config["current-page"]["title"]; ?></title>
        <meta name="description" content="<?php print $config["current-page"]["desc"]; ?>">
        <meta name="author" content="<?php print $config["client"]; ?>">
        <meta property="og:title" content="<?php print $config["current-page"]["title"]; ?>">
        <meta property="og:description" content="<?php print $config["current-page"]["desc"]; ?>">
        <meta property="og:type" content="website">
        <meta property="og:url" content="<?php print $config["url"]; ?>">
        <meta property="og:image" content="/images/social-branding.png">
        <meta property="og:site_name" content="<?php print $config["current-page"]["title"]; ?>">
        <meta name="thumbnail" content="/images/social-branding.png">
        <meta name="theme-color" content="<?php print $config["theme-color"]; ?>">
        <meta name="format-detection" content="telephone=no">
        <meta name="keywords" content="<?php print $config["keywords"]; ?>">
        <base href="<?php print $config["baseurl"]; ?>">
        <link rel="canonical" href="<?php print $config["url"]; ?>">
        <!-- FAVICON -->
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <!-- STYLES -->
        <link rel="stylesheet" href="/css/styles.min.css" media="screen">
    </head>
    <body class="<?php echo bodyClasses($templateName, $currentSite, $currentUrl); ?>">
        <nav class="nav">
            <div class="row">
                <div class="col large-3 logo">
                    <a href="/" title="<?php echo $navigation["Home"]["title"]; ?>">YourBusiness</a>
                </div>
                <div class="col large-9">
                    <ul class="navi">
                        <?php echo $mainNav; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="mobile-nav">
            <div class="row">
                <div class="col default-4 logo">
                    <a href="/" title="<?php echo $navigation["Home"]["title"]; ?>">YourBusiness</a>
                </div>
                <div class="col default-8 flex-end">
                    <input type="checkbox" name="mobile-nav" id="mobile-nav">
                    <label for="mobile-nav">
                        <span></span>
                        <span></span>
                        <span></span>
                    </label>
                    <ul>
                        <?php echo $mainNav; ?>
                    </ul>
                </div>
            </div>
        </div>
        <header>

        </header>
        <main>
            <?php echo isset($templateContent) ? $templateContent : ''; ?>
            <?php if ($config["current-page"]["name"] === "Contact"):?>
                <p>This specific content is displayed when page is contact</p>
            <?php endif;?>
        </main>
        <footer>
            <div class="row">
                <div class="col small-4 large-6 contact-list">
                    <a href="mailto:<?php echo $config["mail"]; ?>"><i></i><?php print $config["mail"]; ?></a>
                </div>
                <div class="col small-7 large-5 small-suffix-1 large-suffix-1">
                    <ul>
                        <?php echo $footerNav; ?>
                    </ul>
                </div>
            </div>
        </footer>
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "LocalBusiness",
                "name": "<?php echo $config["current-page"]["title"]; ?>",
                "description": "<?php echo $config["current-page"]["desc"]; ?>",
                "address": {
                    "@type": "PostalAddress",
                    "streetAddress": "<?php echo $config["address"]; ?>",
                    "addressLocality": "<?php echo $config["city"]; ?>",
                    "postalCode": "<?php echo $config["postal"]; ?>",
                    "addressCountry": "<?php echo $config["country"]; ?>"
                },
                "telephone": "<?php echo $config["phone"]; ?>",
                "email": "<?php echo $config["mail"]; ?>",
                "url": "<?php echo $config["url"]; ?>",
                "image": "<?php echo $config["baseurl"]; ?>/images/social-branding.png",
                "openingHours": "Mo,Tu,We,Th,Fr 10:00-18:00",
                "openingHoursSpecification": [{
                    "@type": "OpeningHoursSpecification",
                    "dayOfWeek": [
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday"
                    ],
                    "opens": "10:00",
                    "closes": "18:00"
                }],
                "sameAs": [
                    "https://twitter.com/your-twitter",
                    "https://www.instagram.com/your-instagram/",
                    "https://www.linkedin.com/in/your-linkedin"
                ]
            }
        </script>
        <script src="/js/site.js" type="module"></script>
    </body>
</html>
