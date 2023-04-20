<?php

// Main variables
$text["client"]     = "";
$text["title"]     = "";
$text["desc"]     = "";
$text["address"]    = "";
$text["postal"]    	= "";
$text["city"]    	= "";
$text["phone"]      = "";
$text["mail"]       = "";
$text["fax"]      	= "";

// set basic configurations

$config["theme-color"] = "#ccc";

// Get the site URL

$config["url"] = "";
$config["base-url"] = "";

if(isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on") {
    $ssl = "https";
} else {
    $ssl = "http";
}

$config["url"] .= $ssl."://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
$config["baseurl"] .= $ssl."://".$_SERVER["HTTP_HOST"];
?>