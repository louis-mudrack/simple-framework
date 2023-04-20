<?php include("misc/site.config.php") ?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $text["title"]; ?></title>
        <meta name="description" content="<?php echo $text["desc"]; ?>">
        <meta name="author" content="<?php echo $text["client"]; ?>">
        <meta property="og:title" content="<?php echo $text["title"]; ?>">
        <meta property="og:description" content="<?php echo $text["desc"]; ?>">
        <meta property="og:type" content="website">
        <meta property="og:url" content="<?php echo $config["url"]; ?>">
        <meta property="og:image" content="/images/social-branding.png">
        <meta property="og:site_name" content="<?php echo $text["title"]; ?>">
        <meta name="thumbnail" content="/images/social-branding.png">
        <meta name="theme-color" content="<?php echo $config["theme-color"]; ?>">
        <meta name="format-detection" content="telephone=no">
        <meta name="keywords" content="IMPORTANT KEYWORDS GO HERE">
        <base href="<?php echo $config["base-url"]; ?>">
        <link rel="canonical" href="<?php echo $config["url"]; ?>">
        <!-- FAVICON -->
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <!-- STYLES -->
        <link rel="stylesheet" href="/css/styles.min.css" media="screen">
    </head>