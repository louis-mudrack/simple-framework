<?php
header('Content-Type: text/plain');

echo "User-agent: *\n";
echo "Disallow: /_essentials/\n";
echo "Disallow: /_settings/\n";
echo "Disallow: /_templates/\n";

echo "Sitemap: " . $_SERVER['HTTP_HOST'] . "/sitemap.xml\n";
