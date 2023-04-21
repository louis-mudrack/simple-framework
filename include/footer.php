        <footer>
            
        </footer>
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "LocalBusiness",
                "name": "<?php echo $config["current-page"]["title"]; ?>",
                "description": "<?php echo $config["current-page"]["desc"]; ?>",
                "address": {
                    "@type": "PostalAddress",
                    "streetAddress": "<?php echo $text["address"]; ?>",
                    "addressLocality": "<?php echo $text["city"]; ?>",
                    "postalCode": "<?php echo $text["postal"]; ?>",
                    "addressCountry": "<?php echo $text["country"]; ?>"
                },
                "telephone": "<?php echo $text["phone"]; ?>",
                "email": "<?php echo $text["mail"]; ?>",
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
        <script src="/js/site.js"></script>
    </body>
</html>