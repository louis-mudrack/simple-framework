<?php

// Global variables

$text["client"]         = "";
$text["title"]          = "";
$text["desc"]           = "";
$text["address"]        = "";
$text["postal"]    	    = "";
$text["city"]    	    = "";
$text["phone"]          = "";
$text["mail"]           = "";
$text["fax"]      	    = "";
$text["keywords"]       = "";
$text["theme-color"]    = "";

// set basic configurations

// Get the site URL

$config = array(
    "url" => (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"],
    "baseurl" => (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"]
);

// Get the site root

define("SITE_ROOT", $_SERVER["DOCUMENT_ROOT"]."/");

// include the navigation

require_once(SITE_ROOT."misc/site.contents.php");
require_once(SITE_ROOT."misc/site.navigation.php");

// Check if the current page is in our site.contents.php

$current_page = null;
foreach ($navigation as $page) {
    if ($_SERVER["REQUEST_URI"] == $page["url"]) {
        $current_page = $page;
        break;
    }
    if (isset($page["sub"])) {
        foreach ($page["sub"] as $subPage) {
            if ($_SERVER["REQUEST_URI"] == $subPage["url"]) {
                $current_page = $subPage;
                break 2;
            }
        }
    }
}
$config["current-page"] = $current_page;

// Start loading content into template

ob_start();
?>
