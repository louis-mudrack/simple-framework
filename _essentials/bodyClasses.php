<?php
function bodyClasses($templateName, $currentSite, $currentUrl) {
    if ($currentUrl == '/') {
        $currentUrl = 'index';
    }
    $currentUrlParts = str_replace('/', ' ', $currentUrl);
    $currentUrl = ltrim(rtrim(str_replace('/', '-', $currentUrl), '-'), '-');
    $classes = array($templateName. '-template', $currentSite, $currentUrl, $currentUrlParts);
    $uniqueClasses = array_unique($classes);
    // Return the classes as a string
    return implode(' ', $uniqueClasses);
}

function getUserPlatformAndBrowser() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $platforms = array(
        'Windows' => 'windows', 
        'Macintosh' => 'mac', 
        'iPhone' => 'iphone', 
        'Android' => 'android',
        'Linux' => 'linux'
    );
    $browsers = array(
        'Chrome' => 'chrome', 
        'Firefox' => 'firefox', 
        'Safari' => 'safari', 
        'Opera' => 'opera', 
        'MSIE' => 'ie', 
        'Edge' => 'edge'
    );

    $platform_class = 'unknown-platform';
    $browser_class = 'unknown-browser';

    foreach ($platforms as $key => $value) {
        if (strpos($user_agent, $key) !== false) {
            $platform_class = $value;
            break;
        }
    }

    foreach ($browsers as $key => $value) {
        if (strpos($user_agent, $key) !== false) {
            $browser_class = $value;
            break;
        }
    }

    return $platform_class . ' ' . $browser_class;
}

?>
