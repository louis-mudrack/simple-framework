<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $config["current-page"]["title"]; ?></title>
        <meta name="description" content="<?php echo $config["current-page"]["desc"]; ?>">
        <meta name="author" content="<?php echo $text["client"]; ?>">
        <meta property="og:title" content="<?php echo $config["current-page"]["title"]; ?>">
        <meta property="og:description" content="<?php echo $config["current-page"]["desc"]; ?>">
        <meta property="og:type" content="website">
        <meta property="og:url" content="<?php echo $config["url"]; ?>">
        <meta property="og:image" content="/images/social-branding.png">
        <meta property="og:site_name" content="<?php echo $config["current-page"]["title"]; ?>">
        <meta name="thumbnail" content="/images/social-branding.png">
        <meta name="theme-color" content="<?php echo $config["theme-color"]; ?>">
        <meta name="format-detection" content="telephone=no">
        <meta name="keywords" content="<?php echo $text["keywords"]; ?>">
        <base href="<?php echo $config["baseurl"]; ?>">
        <link rel="canonical" href="<?php echo $config["url"]; ?>">
        <!-- FAVICON -->
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <!-- STYLES -->
        <link rel="stylesheet" href="/css/styles.min.css" media="screen">
    </head>