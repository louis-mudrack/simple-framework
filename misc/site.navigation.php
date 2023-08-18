<?php

function generateNavItem($item, $isFooter = false) {
    if (!$isFooter && isset($item['navExclude']) && $item['navExclude']) {
        return '';
    }

    $isActive = isNavItemActive($item) ? 'active' : '';
    $className = generateClassName($item);

    $liContent = generateLink($item, $isActive);

    if (isset($item['sub'])) {
        $subItemsHTML = '';
        foreach ($item['sub'] as $subItem) {
            if (isset($subItem['navExclude']) && $subItem['navExclude']) {
                continue;
            }
            
            $subIsActive = isNavItemActive($subItem) ? 'active' : '';
            $subItemsHTML .= generateLink($subItem, $subIsActive);
        }
        
        if (!empty($subItemsHTML)) {
            $liContent = "<span>{$item['name']}</span><ul class='sub'>{$subItemsHTML}</ul>";
            $className .= ' has-sub';
        }
    }

    return "<li class='{$className}'>{$liContent}</li>";
}

function isNavItemActive($item) {
    $requestUri = $_SERVER['REQUEST_URI'];
    return ($requestUri === $item['url'] || strpos($requestUri, $item['url']) !== false);
}

function generateClassName($item) {
    $urlPath = trim($item['url'], '/');
    if ($urlPath === '') {
        return str_replace(' ', '-', strtolower($item['name']));
    }
    return str_replace('/', '-', $urlPath);
}

function generateLink($item, $isActiveClass) {
    $aHref = $item['url'];
    if (isset($item['external']) && $item['external']) {
        $aHref .= "' target='_blank";
    }

    $aClasses = [$isActiveClass];
    if (isset($item['class'])) {
        $aClasses = array_merge($aClasses, explode(" ", $item['class']));
    }

    return "<a href='{$aHref}' title='{$item['title']}' alt='{$item['title']}' class='" . implode(' ', $aClasses) . "'>{$item['name']}</a>";
}

// Start output buffering
ob_start();

// Create main navigation
foreach ($navigation as $item) {
    echo generateNavItem($item);
}

// Get the navigation HTML and clean the output buffer
$mainNav = ob_get_clean();

// Start output buffering again for the footer navigation
ob_start();

// Create footer navigation
foreach ($navigation as $item) {
    if (isset($item['footerNav']) && $item['footerNav']) {
        echo generateNavItem($item, true);
    }
}

// Get the footer navigation HTML and clean the output buffer
$footerNav = ob_get_clean();