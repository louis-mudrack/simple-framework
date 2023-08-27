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

?>