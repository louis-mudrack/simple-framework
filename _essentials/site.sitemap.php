<?php

if (isset($_GET['generateSitemap'])) {
    function generateSitemap($navigation) {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $domainName = $_SERVER['HTTP_HOST'];
        $baseUrl = $protocol . $domainName;

        $sitemap = new SimpleXMLElement('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"></urlset>');

        foreach ($navigation as $page => $info) {
                $urlElement = $sitemap->addChild('url');
                $urlElement->addChild('loc', htmlspecialchars($baseUrl . $info['url']));
                $lastMod = date('c');
                $urlElement->addChild('lastmod', $lastMod);
                $urlElement->addChild('changefreq', 'monthly');
                $urlElement->addChild('priority', '0.8');
                if (isset($info['sub']) && is_array($info['sub'])) {
                    foreach ($info['sub'] as $subPage => $subInfo) {
                        $subUrlElement = $sitemap->addChild('url');
                        $subUrlElement->addChild('loc', htmlspecialchars($baseUrl . $subInfo['url']));
                        $lastMod = date('c');
                        $subUrlElement->addChild('lastmod', $lastMod);
                        $subUrlElement->addChild('changefreq', 'monthly');
                        $subUrlElement->addChild('priority', '0.8');
                    }
                }
        }

        // Save the sitemap to a file
        $sitemap->asXML('sitemap.xml');
        print '<span class="notification notification-success">Sitemap generated successfully</span>';
    }

    generateSitemap($navigation);
}
