<?php require_once($_SERVER["DOCUMENT_ROOT"]."/misc/site.config.php") ?>
<?php require_once(SITE_ROOT."include/head.php"); ?>
    <?php require_once(SITE_ROOT."include/header-secondary.php"); ?>
        <main>
            <div class="row">
                <div class="large-8 large-prefix-2 large-suffix-2">
                    <h2>The form was send successfully</h2>
                    <a href="/" title="<?php echo $navigation[0]["title"]; ?>" class="btn">Back to home</a>
                </div>
            </div>
        </main>
        <?php include(SITE_ROOT."include/footer.php"); ?>