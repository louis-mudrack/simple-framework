<?php

// Loop through the content and create the list items

function createNavItem($item, $isFooter = false) {
    if (isset($item['navExclude']) && $item['navExclude'] == true &&!$isFooter) {
        return;
    }

    $isActive = ($_SERVER['REQUEST_URI'] == $item['url'] || strpos($_SERVER['REQUEST_URI'], $item['url'])!== false)? 'active' : '';
    $className = str_replace('/', '-', trim($item['url'], '/'));
    if ($item['url'] == '/') {
        $className = str_replace(' ', '-', strtolower($item['name']));
    }
    $li = "<li class='{$className}'>";

    if (isset($item['sub'])) {
        $numExcludeSub = 0;
        foreach ($item['sub'] as $subItem) {
            if (isset($subItem['navExclude']) && $subItem['navExclude'] == true) {
                $numExcludeSub++;
            }
        }
        if ($numExcludeSub == count($item['sub'])) {
            $a = "<a href='{$item['url']}' title='{$item['title']}' alt='{$item['title']}' class='{$isActive}'>{$item['name']}</a>";
            $li.= $a;
        } else {
            $li = str_replace("class='{$className}'", "class='{$className} has-sub' ", $li);
            $li.= "<span>{$item['name']}</span>";
            $li.= "<ul class='sub'><li><a href='{$item['url']}' title='{$item['title']}' alt='{$item['title']}' class='{$isActive}'>{$item['name']}</a></li>";
            foreach ($item['sub'] as $subItem) {
                $isActive = ($_SERVER['REQUEST_URI'] == $subItem['url'] || strpos($_SERVER['REQUEST_URI'], $subItem['url'])!== false)? 'active' : '';
                if (isset($subItem['navExclude']) && $subItem['navExclude'] == true) {
                    break;
                }
                $li.= "<li><a href='{$subItem['url']}' title='{$subItem['title']}' alt='{$subItem['title']}' class='{$isActive}'>{$subItem['name']}</a></li>";
            }
            $li.= "</ul>";
        }
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
        $li.= $a;
    }
    $li.= "</li>";

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