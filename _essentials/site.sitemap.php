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

function generateSitemap() {
  $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
  $domainName = $_SERVER['HTTP_HOST'];
  $baseUrl = $protocol . $domainName;

  $urls = [];
  scanDirectory($_SERVER['DOCUMENT_ROOT'], $urls, $baseUrl);

  $sitemap = new SimpleXMLElement('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"></urlset>');

  foreach ($urls as $url) {
      $urlElement = $sitemap->addChild('url');
      $urlElement->addChild('loc', htmlspecialchars($url));

      // Fetch the content of the URL
      $html = file_get_contents($url);
      if ($html) {
          $doc = new DOMDocument();
          @$doc->loadHTML($html);
          $xpath = new DOMXPath($doc);
          $images = $xpath->query("//img");

          foreach ($images as $img) {
              $imgSrc = $img->getAttribute('src');
              // Ensure the image source is absolute
              $imgUrl = (strpos($imgSrc, 'http') === 0) ? $imgSrc : $baseUrl . '/' . ltrim($imgSrc, '/');
              $imageElement = $urlElement->addChild('image:image', null, 'http://www.google.com/schemas/sitemap-image/1.1');
              $imageElement->addChild('image:loc', $imgUrl, 'http://www.google.com/schemas/sitemap-image/1.1');
          }
      }
  }

  // Save the sitemap to the root directory
  $sitemap->asXML($_SERVER["DOCUMENT_ROOT"] . '/sitemap.xml');
}

generateSitemap();
echo "Sitemap generated successfully.";
