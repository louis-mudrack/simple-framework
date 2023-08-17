<?php $template = 'main'; require_once($_SERVER["DOCUMENT_ROOT"]."/misc/site.config.php") ?>
<div class="row">
        <div class="large-8 large-prefix-2 large-suffix-2">
            
            <h2>An error occured!</h2>
            <?php
            session_start();

            if (isset($_SESSION['errors'])) {
                foreach ($_SESSION['errors'] as $field => $error) {
                    echo "<p>$error</p>";
                }
                unset($_SESSION['errors']);
            }
            ?>
            <a href="/contact/index" title="<?php echo $navigation[0]["title"]; ?>" class="btn">Back to form</a>
        </div>
    </div>
    <?php require(SITE_ROOT."misc/site.exit.php"); ?>