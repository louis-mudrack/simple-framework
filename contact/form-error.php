<?php $template = 'main'; require_once($_SERVER["DOCUMENT_ROOT"]."/misc/site.config.php") ?>
<?php
session_start();

if (isset($_SESSION['errors'])) {
    foreach ($_SESSION['errors'] as $field => $error) {
        echo "<p>Error in field '$field': $error</p>";
    }

    // Clear the errors from the session
    unset($_SESSION['errors']);
}
?>
<?php require(SITE_ROOT."misc/site.exit.php"); ?>