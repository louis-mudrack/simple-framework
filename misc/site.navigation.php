<?php

// Loop through the content and create the list items

function createNavItem($item, $isFooter = false) {
    if (isset($item['navExclude']) && $item['navExclude'] == true && !$isFooter) {
        return;
    }

    $isActive = ($_SERVER['REQUEST_URI'] == $item['url']) ? 'active' : '';
    $className = str_replace('/', '-', trim($item['url'], '/'));
    $li = "<li class='{$className}'>";

    if (isset($item['sub'])) {
        $li .= "<span>{$item['name']}</span>";
        $li .= "<ul>";
        foreach ($item['sub'] as $subItem) {
            $li .= createNavItem($subItem);
        }
        $li .= "</ul>";
    } else {
        $a = "<a href='{$item['url']}' title='{$item['title']}' alt='{$item['title']}' class='{$isActive}'>{$item['name']}</a>";
        if (isset($item['external']) && $item['external']) {
            $a = "<a href='{$item['url']}' title='{$item['title']}' alt='{$item['title']}' target='_blank' class='{$isActive}'>{$item['name']}</a>";
        }
        if (isset($item['class'])) {
            $classes = explode(" ", $item['class']);
            foreach ($classes as $className) {
                $a = str_replace("<a ", "<a class='{$className} ", $a);
            }
        }
        $li .= $a;
    }
    $li .= "</li>";

    return $li;
}

// Start output buffering
ob_start();

// Create main navigation
foreach ($navigation as $item) {
    echo createNavItem($item);
}

// Get the navigation HTML and clean the output buffer
$mainNav = ob_get_clean();

// Start output buffering again for the footer navigation
ob_start();

// Create footer navigation
foreach ($navigation as $item) {
    if (isset($item['footerNav']) && $item['footerNav']) {
        echo createNavItem($item, true);
    }
}

// Get the footer navigation HTML and clean the output buffer
$footerNav = ob_get_clean();

?>