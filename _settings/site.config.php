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

require_once(SITE_ROOT."_settings/site.contents.php");
require_once(SITE_ROOT."_essentials/site.navigation.php");

// Check if the current page is in our site.contents.php

$current_page = null;
foreach ($navigation as $name => $page) {
    if ($_SERVER["REQUEST_URI"] == $page["url"]) {
        $current_page = $page;
        $current_page['name'] = $name;
        break;
    }
    if (isset($page["sub"])) {
        foreach ($page["sub"] as $subName => $subPage) {
            if ($_SERVER["REQUEST_URI"] == $subPage["url"]) {
                $current_page = $subPage;
                $current_page['name'] = $subName;
                break 2;
            }
        }
    }
}
$config["current-page"] = $current_page;

// functions for the body classes

require_once(SITE_ROOT."_essentials/bodyClasses.php");
$templateName = $template;
$currentSite = $config["current-page"]["name"];
$currentUrl = $config["current-page"]["url"];

// Start loading content into template

ob_start();
?>
