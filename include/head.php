<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php print $config["current-page"]["title"]; ?></title>
        <meta name="description" content="<?php print $config["current-page"]["desc"]; ?>">
        <meta name="author" content="<?php print $text["client"]; ?>">
        <meta property="og:title" content="<?php print $config["current-page"]["title"]; ?>">
        <meta property="og:description" content="<?php print $config["current-page"]["desc"]; ?>">
        <meta property="og:type" content="website">
        <meta property="og:url" content="<?php print $config["url"]; ?>">
        <meta property="og:image" content="/images/social-branding.png">
        <meta property="og:site_name" content="<?php print $config["current-page"]["title"]; ?>">
        <meta name="thumbnail" content="/images/social-branding.png">
        <meta name="theme-color" content="<?php print $text["theme-color"]; ?>">
        <meta name="format-detection" content="telephone=no">
        <meta name="keywords" content="<?php print $text["keywords"]; ?>">
        <base href="<?php print $config["baseurl"]; ?>">
        <link rel="canonical" href="<?php print $config["url"]; ?>">
        <!-- FAVICON -->
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <!-- STYLES -->
        <link rel="stylesheet" href="/css/styles.min.css" media="screen">
    </head>
