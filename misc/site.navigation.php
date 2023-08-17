<?php

// Loop through the content and create the list items
foreach ($navigation as $item) {
    if (!isset($item['navExclude']) || $item['navExclude'] != true) {
        $li = "<li>";
        $a = "<a href='{$item['url']}' title='{$item['title']}' alt='{$item['title']}'>{$item['name']}</a>";
        if (isset($item['external']) && $item['external']) {
            $a = "<a href='{$item['url']}' title='{$item['title']}' alt='{$item['title']}' target='_blank'>{$item['name']}</a>";
        }
        if (isset($item['class'])) {
            $classes = explode(" ", $item['class']);
            foreach ($classes as $className) {
                $a = str_replace("<a ", "<a class='{$className}' ", $a);
            }
        }
        $li .= $a . "</li>";
        echo $li;
    } elseif (isset($item['footerNav']) && $item['footerNav']) {
        $li = "<li>";
        $a = "<a href='{$item['url']}' title='{$item['title']}' alt='{$item['title']}'>{$item['name']}</a>";
        if (isset($item['external']) && $item['external']) {
            $a = "<a href='{$item['url']}' title='{$item['title']}' alt='{$item['title']}' target='_blank'>{$item['name']}</a>";
        }
        if (isset($item['class'])) {
            $classes = explode(" ", $item['class']);
            foreach ($classes as $className) {
                $a = str_replace("<a ", "<a class='{$className}' ", $a);
            }
        }
        $li .= $a . "</li>";
        echo $li;
    }
    if ($_SERVER['REQUEST_URI'] == $item['url'] && isset($item['noIndex']) && $item['noIndex'] == true) {
        echo "<meta name='robots' content='noindex'>";
    }
}

?>