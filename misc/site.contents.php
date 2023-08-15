<?php

// Set the sites navigation

$navigation = array(
    array(
        "url" => "/",
        "title" => "",
        "desc" => ""
    ),
    array(
        "url" => "/contact/index",
        "title" => "",
        "desc" => ""
    ),
    array(
        "url" => "/contact/form-success",
        "title" => "",
        "desc" => ""
    ),
    array(
        "url" => "/contact/form-error",
        "title" => "",
        "desc" => ""
    ),
    array(
        "url" => "/legal-data",
        "title" => "",
        "desc" => ""
    ),
    array(
        "url" => "/privacy-policy",
        "title" => "",
        "desc" => ""
    )
);

// Encode Navigation to JSON
$json = json_encode($navigation);
file_put_contents("misc/navi.json", $json)

?>