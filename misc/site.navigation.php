<?php

function generateNavItem($name, $item, $isFooter = false) {
    if (!$isFooter && isset($item['navExclude']) && $item['navExclude']) {
        return '';
    }

    $isActive = isNavItemActive($item) ? 'active' : '';
    $className = generateClassName($name, $item);

    $liContent = generateLink($name, $item, $isActive);

    if (isset($item['sub'])) {
        $subItemsHTML = '';
        foreach ($item['sub'] as $subName => $subItem) {
            if (isset($subItem['navExclude']) && $subItem['navExclude']) {
                continue;
            }
            
            $subIsActive = isNavItemActive($subItem) ? 'active' : '';
            $subItemsHTML .= generateLink($subName, $subItem, $subIsActive, true);
        }
        
        if (!empty($subItemsHTML)) {
            $liContent = "<span>{$subName}</span><ul class='sub'><li class='$className'>$liContent</li>{$subItemsHTML}</ul>";
            $className .= ' has-sub';
        }
    }

    return "<li class='{$className}'>{$liContent}</li>";
}

function isNavItemActive($item) {
    $requestUri = strtok($_SERVER['REQUEST_URI'], '?');
    if ($item['url'] === '/') {
        return $requestUri === '/';
    }
    return (strpos($requestUri, $item['url']) === 0);
}

function generateClassName($name, $item) {
    $urlPath = trim($item['url'], '/');
    if ($urlPath === '') {
        return str_replace(' ', '-', strtolower($name));
    }
    return str_replace('/', '-', $urlPath);
}

function generateLink($name, $item, $isActiveClass, $sub = false) {
    $aHref = $item['url'];
    if (isset($item['external']) && $item['external']) {
        $aHref .= "' target='_blank";
    }

    $aClasses = [$isActiveClass];
    if (isset($item['class'])) {
        $aClasses = array_merge($aClasses, explode(" ", $item['class']));
    }

    if ($sub) {
        return "<li><a href='{$aHref}' title='{$item['title']}' class='" . implode(' ', $aClasses) . "'>{$name}</a></li>";
    } else {
        return "<a href='{$aHref}' title='{$item['title']}' class='" . implode(' ', $aClasses) . "'>{$name}</a>";
    }

}

// Start output buffering
ob_start();

// Create main navigation
foreach ($navigation as $name => $item) {
    echo generateNavItem($name, $item);
}

// Get the navigation HTML and clean the output buffer
$mainNav = ob_get_clean();

// Start output buffering again for the footer navigation
ob_start();

// Create footer navigation
foreach ($navigation as $name => $item) {
    if (isset($item['footerNav']) && $item['footerNav']) {
        echo generateNavItem($name, $item, true);
    }
}

// Get the footer navigation HTML and clean the output buffer
$footerNav = ob_get_clean();
