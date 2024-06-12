<?php
header('Content-Type: text/plain');

// Dynamic logic to determine what to disallow or allow
echo "User-agent: *\n";
echo "Disallow: /_essentials/\n";
echo "Disallow: /_settings/\n";
echo "Disallow: /_templates/\n";
// Add more rules as needed

// Dynamically set the sitemap URL
echo "Sitemap: " . $_SERVER['HTTP_HOST'] . "/sitemap.xml\n";
