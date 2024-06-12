<?php

function scanDirectory($directory, &$urls, $baseUrl) {
    $files = scandir($directory);
    foreach ($files as $file) {
        if ($file == '.' || $file == '..') continue;
        $path = $directory . '/' . $file;
        if (is_dir($path)) {
            scanDirectory($path, $urls, $baseUrl);
        } else if (preg_match('/\.(php|html)$/', $file)) {
            // Assuming URLs are directly mapped to file paths
            $urlPath = str_replace($_SERVER['DOCUMENT_ROOT'], '', $path);
            $urls[] = $baseUrl . $urlPath;
        }
    }
}

if (isset($_GET['generateSitemap'])) {
    function generateSitemap() {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $domainName = $_SERVER['HTTP_HOST'];
        $baseUrl = $protocol . $domainName;

        $urls = [];
        scanDirectory($_SERVER['DOCUMENT_ROOT'], $urls, $baseUrl);

        $sitemap = new SimpleXMLElement('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"></urlset>');

        foreach ($urls as $url) {
            $urlElement = $sitemap->addChild('url');
            $urlElement->addChild('loc', htmlspecialchars($url));
            $lastMod = date('c');
            $urlElement->addChild('lastmod', $lastMod);
            $urlElement->addChild('changefreq', 'monthly');
            $urlElement->addChild('priority', '0.8');
        }

        // Save the sitemap to a file
        $sitemap->asXML('sitemap.xml');
        echo '<span class="framework-alert">Sitemap generated successfully.</span>';
    }

    generateSitemap();
}
